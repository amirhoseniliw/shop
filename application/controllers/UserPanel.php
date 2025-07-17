<?php

namespace application\controllers;

use application\model\Users as UsersModel;
use application\model\Orders as OrdersModel;
use application\model\addres as AssersModel;
use application\model\favorites as favoritesModel;
use application\model\messages as messagesModel;
use application\model\Category as CategoryModel;
use application\model\Products as ProductsModel;

use PHPMailer\PHPMailer\POP3;

class UserPanel extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    }
  }
  public function index()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    $oders = new OrdersModel();
    $customer_orders = $oders->get_all_customer_orders_by_user($user_id);
    $Count_favoites = new favoritesModel();
    $Count_favoites = $Count_favoites->find_all_count($user_id);
    $oders = new OrdersModel();
    $count_customer_orders = $oders->count_customer_orders_by_user($user_id);
    $count_Products = new ProductsModel();
    $count_Products = $count_Products->count_all();
    $ob_category = new CategoryModel();
    $count_categories = $ob_category->count_all();
    // $this->dd($custemer_orders);
    return $this->view("app.panel.index", compact('user', 'categories', 'customer_orders', 'count_categories' , 'Count_favoites' , 'count_customer_orders' , 'count_Products'));
  }
  public function show_orders($code, $postal_price)
  {
    $orders = new OrdersModel();
    $orders = $orders->show_by_delivery_code($code);
    $post = $postal_price;
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.show_orders", compact('orders', 'post', 'user', 'categories'));
  }
  public function factor($id)
  {
    $orderModel = new OrdersModel();
    $customer_order = $orderModel->get_find_customer_order($id);
    if (!$customer_order) {
      die('سفارش یافت نشد.');
    }
    $orderModel = new OrdersModel();
    $orders = $orderModel->show_by_delivery_code($customer_order['delivery_code']);
    if (!$orders) {
      die('محصولی برای این سفارش یافت نشد.');
    }

    // بررسی یا ساخت فاکتور
    $factorModel = new OrdersModel();
    $factor = $factorModel->find_by_order_id($id);
    if (!$factor) {
      $factorModel = new OrdersModel();

      $lastNumber = $factorModel->get_last_factor_number();
      $newNumber = $lastNumber + 1;
      $factor_number = 'fa_' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);  // fa_0001 تا fa_9999
      $factorModel = new OrdersModel();
      $factor_id = $factorModel->create([
        'order_id' => $id,
        'factor_number' => $factor_number
      ]);
      $factorModel = new OrdersModel();

      $factor = $factorModel->find_by_order_id($id);
    }
    // نمایش فاکتور
    return $this->view("app.panel.factor", [
      'orders' => $orders,
      'customer_orders' => $customer_order,
      'factor' => $factor
    ]);
  }
  public function latest_order()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $oders = new OrdersModel();
    $customer_orders = $oders->get_all_customer_orders_by_user($user_id);
    $user = new UsersModel();
    $user = $user->find($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.latest_order", compact('user', 'customer_orders', 'categories'));
  }
  public function order_detail($id)
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $orders = new OrdersModel();
    $orders = $orders->find($id);
    $user = new UsersModel();
    $user = $user->find($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.order_detail", compact('user', 'orders', 'categories'));
  }
  public function edit_profil()
  {
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.edit", compact('user', 'categories'));
  }
  //!---------------------------------------------------
  public function send_code()
  {
      // اگر فرم خالی ارسال شده باشد
      if (empty($_POST)) {
          $this->flash('error', 'لطفا اطلاعات را وارد کنید!');
          return $this->redirect('UserPanel/edit_profil');
      }
  
      // بررسی لاگین بودن کاربر
      $user_id = $_SESSION['user_id'] ?? null;
      if (!$user_id) {
          return $this->redirect('Auth/login');
      }
  
      $userModel = new UsersModel();
      $user = $userModel->find($user_id);
  
      // مقادیر جدید را فقط اگر وارد شده‌اند، استفاده می‌کنیم
      $username = !empty($_POST['username']) ? $_POST['username'] : $user['username'];
      $email    = !empty($_POST['email'])    ? $_POST['email']    : $user['email'];
      $phone    = !empty($_POST['phone_number']) ? $_POST['phone_number'] : $user['phone_number'];
  
      // بررسی ایمیل جدید (اگر تغییر کرده باشد)
      if (!empty($_POST['email']) && $_POST['email'] !== $user['email']) {
        $userModel = new UsersModel();

          if ($userModel->find_email($_POST['email'])) {
              $this->flash('error', 'این ایمیل قبلاً ثبت شده است.');
              return $this->redirect('UserPanel/edit_profil');
          }
      }
  
      // بررسی شماره موبایل جدید (اگر تغییر کرده باشد)
      if (!empty($_POST['phone_number']) && $_POST['phone_number'] !== $user['phone_number']) {
        $userModel = new UsersModel();

          if ($userModel->find_mob($_POST['phone_number'])) {
              $this->flash('error', 'این شماره متعلق به کاربر دیگری است.');
              return $this->redirect('UserPanel/edit_profil');
          }
      }
  
      // مدیریت تصویر پروفایل اگر ارسال شده باشد
      if (!empty($_FILES['img_prof']['name'])) {
          // حذف عکس قبلی اگر موجود باشد
          if (!empty($user['img_prof'])) {
              $this->removeImage($user['img_prof']);

          }
  
          // ذخیره تصویر جدید
          $savedPath = $this->saveImage($_FILES['img_prof'], '/img/users');
          if ($savedPath) {
              $_POST['img_prof'] = str_replace('public/', '', $savedPath);
          }
      }
  
      // تولید کد تأیید جدید (همیشه تولید شود)
      $_SESSION['verification_code'] =(string) rand(10000, 99999);
  
      $current_time = time();
      $cooldown = 120; // 2 دقیقه به ثانیه
  
      // بررسی فاصله زمانی بین دو ارسال
      if (isset($_SESSION['last_code_sent_time']) && ($current_time - $_SESSION['last_code_sent_time']) < $cooldown) {
          $remain = $cooldown - ($current_time - $_SESSION['last_code_sent_time']);
          $this->flash('error', "لطفاً " . floor($remain / 60) . " دقیقه و " . ($remain % 60) . " ثانیه صبر کنید.");
          $categories = (new CategoryModel())->all_cat_post();
          return $this->view("app.panel.code_update", compact('user', 'categories'));
      }
  
      // بررسی تعداد دفعات مجاز ارسال در روز
      $today = date('Y-m-d');
      if (!isset($_SESSION['resend_date']) || $_SESSION['resend_date'] != $today) {
          $_SESSION['resend_count'] = 0;
          $_SESSION['resend_date'] = $today;
      }
      if ($_SESSION['resend_count'] >= 5) {
          $this->flash('error', 'شما به سقف 5 بار ارسال کد در روز رسیده‌اید.');
          $categories = (new CategoryModel())->all_cat_post();
          return $this->view("app.panel.code_update", compact('user', 'categories'));
      }
  
      // ارسال کد تأیید به شماره کاربر (حتماً شماره جدید)
      $this->sendMessage([$_SESSION['verification_code']], $phone , 337421);
  
      // ذخیره اطلاعات جدید در سشن برای مرحله بعد
      $_SESSION['info'] = [
          'username' => $username,
          'email'    => $email,
          'phone'    => $phone,
          'img_prof' => $_POST['img_prof'] ?? $user['img_prof'],
      ];
  
      // بروزرسانی زمان و دفعات ارسال
      $_SESSION['last_code_sent_time'] = $current_time;
      $_SESSION['resend_count']++;
  
      $this->flash('error_suc', 'کد تأیید با موفقیت ارسال شد.');
      $categories = (new CategoryModel())->all_cat_post();
      return $this->view("app.panel.code_update", compact('user', 'categories'));
  }
  
  
  public function verify_code()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('Auth/login');
    } else {
      if ($_SESSION['verification_code'] != $_POST['verification_code']) {

        $this->flash('error', 'کد تایید اشتباه است');
        return $this->redirect('UserPanel/edit_profil');

      } else {
        $user = new UsersModel();
        $user = $user->update_panel_info($_SESSION['user_id'], $_SESSION['info']);
        $this->flash('success', 'اطلاعات با موفقیت ویرایش شد');
        unset($_SESSION['verification_code']);

        return $this->redirect('UserPanel/edit_profil');
      }
    }
  }

  public function address()
  {

    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $adders = new AssersModel();
    $adders = $adders->allPanel($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.address", compact('user', 'adders', 'categories'));
  }
  public function create_address()
  {

    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.address_create", compact('user', 'categories'));
  }
  public function stor_addres()
  {

    $user_id = $_SESSION['user_id'];
    $adders = new AssersModel();
    $adders = $adders->insert($user_id, $_POST);
    return $this->redirect('UserPanel/address');
  }
  public function delete_adders($id)
  {
    $adders = new AssersModel();
    $adders = $adders->delete($id);
    return $this->redirect('UserPanel/address');
  }
  public function favorites()
  {
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $favorite = new favoritesModel();
    $favorite = $favorite->allPanel($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.favorites", compact('user', 'favorite', 'categories'));
  }
  public function delete_favorites($id)
  {

    $favorite = new favoritesModel();
    $favorite = $favorite->delete($id);
    return $this->redirect('UserPanel/favorites');
  }
  public function ticket()
  {
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $messages = new messagesModel();
    $chaths = $messages->allPanel_chath($user_id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.ticket", compact('user', 'chaths', 'categories'));
  }
  public function create_Chath()
  {
    $user_id = $_SESSION['user_id'];
    $messages = new messagesModel();
    $chaths = $messages->insert_chat($user_id);
    return $this->redirect('UserPanel/ticket');
  }

  public function ticket_single_show($id)
  {
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $messages = new messagesModel();
    $messages = $messages->allPanel_mess($id);
    $chath = new messagesModel();
    $chath = $chath->find_chath($id);
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();
    return $this->view("app.panel.ticket_single", compact('user',  'messages', 'chath', 'categories'));
  }
  public function send_messaged($id)
  {
    $user_id = $_SESSION['user_id'];

    $messages = new messagesModel();
    $message = $messages->insert($id, $user_id, $_POST);
    $chaths = new messagesModel();
    $chaths = $chaths->find_chath($id);
    if ($chaths['titel'] == "") {

      $messages = new messagesModel();
      $chaths = $messages->update_chat($id, 'titel', $_POST['title']);
    }
    return $this->redirect('UserPanel/ticket_single_show/' . $id);
  }
}
