<?php

namespace application\controllers;

use application\model\Users as UsersModel;
use application\model\Orders as OrdersModel;
use application\model\addres as AssersModel;
use application\model\favorites as favoritesModel;
use application\model\messages as messagesModel;
use PHPMailer\PHPMailer\POP3;

class UserPanel extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    }
  }
  public function index()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.index", compact('user'));

  }
 
  
  public function edit_profil()
  {

    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.edit", compact('user'));
  }
  public function send_code()
  {
    if (empty($_POST)) {  
      // بررسی اینکه آیا هیچ داده‌ای ارسال نشده است  
      $this->flash('error', 'لطفا اطلاعات رو به درستی وارد کنید !');  
      return $this->redirect('Userpanel/edit_profil');  
  } else {  
      // اگر ایمیل وجود داشته باشد  
      if (!empty($_POST['email'])) {  
          $user_id = $_SESSION['user_id'];  
          $userModel = new UsersModel();  
          // بررسی وجود ایمیل در پایگاه داده  
          $userEmail = $userModel->find_email($_POST['email']);  
          if ($userEmail != '') {  
              $this->flash('error', 'این ایمیل از قبل استفاده شده است ! ');  
              return $this->redirect('Userpanel/edit_profil');  
          }  
      }   
      
      // اگر شماره تلفن وجود داشته باشد  
      if (!empty($_POST['phone_number'])) {  
      
          $user_id = $_SESSION['user_id'];  
          $userModel = new UsersModel();  
          // بررسی وجود شماره تلفن در پایگاه داده  
          $userPhone = $userModel->find_mob($_POST['phone_number']);   
          
          if ($userPhone != "") {  
              $this->flash('error', 'این شماره متعلق به کاربر دیگریست !');  
              return $this->redirect('Userpanel/edit_profil');  
          }   
      }  
     
      // در اینجا می‌توانیم اطلاعات کاربر را بروزرسانی کنیم  
      $user_id = $_SESSION['user_id'];     
      $userModel = new UsersModel();  
      $user = $userModel->find($user_id);  
      $username = !empty($_POST['username']) ? $_POST['username'] : $user['username'];  
      $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];  
      $phone_number = !empty($_POST['phone_number']) ? $_POST['phone_number'] : $user['phone_number'];  
      $img_prof = !empty($_FILES['img_prof']['name']) ? $_FILES['img_prof'] : $user['img_prof'];  
      
   
      // ذخیره اطلاعات کاربر در جلسه  

      // تولید کد تأیید  
      if (!isset($_SESSION['verification_code'])) {  
          $_SESSION['verification_code'] = rand(10000, 99999); // تولید کد 5 رقمی  
      }  
  
      // بررسی ورود کاربر  
      if (!isset($_SESSION['user_id'])) {  
          return $this->redirect('auth/login');  
      } else {  
          $current_time = time(); // زمان فعلی  
          $two_minutes = 120; // زمان 2 دقیقه (به ثانیه)  
  
          // بررسی زمان آخرین ارسال کد  
          if (!isset($_SESSION['last_code_sent_time'])) {  
              $_SESSION['last_code_sent_time'] = 0; // مقداردهی اولیه  
          } else {  
              // اگر کمتر از 2 دقیقه گذشته باشد  
              if ($current_time - $_SESSION['last_code_sent_time'] < $two_minutes) {  
                  $remaining_time = ($two_minutes - ($current_time - $_SESSION['last_code_sent_time']));  
                  $this->flash('error', 'لطفاً ' . intval($remaining_time / 60) . ' دقیقه و ' . ($remaining_time % 60) . ' ثانیه دیگر منتظر بمانید تا کد جدید ارسال شود.');  
                  return $this->view("app.panel.code_update", compact('user'));  
              }   
          }  
  
          // مدیریت ارسال تعداد کد تأیید  
          $current_date = date('Y-m-d'); // تاریخ فعلی  
          if (!isset($_SESSION['resend_count']) || $_SESSION['resend_date'] != $current_date) {  
              $_SESSION['resend_count'] = 0; // بازنشانی تعداد ارسال  
              $_SESSION['resend_date'] = $current_date; // ذخیره تاریخ فعلی  
          } else {  
              // بررسی تعداد ارسال کد  
              if ($_SESSION['resend_count'] >= 70) {  
                  $this->flash('error', 'شما حداکثر ۵ بار در روز می‌توانید کد تأیید دریافت کنید. لطفاً بعداً تلاش کنید.');  
                  return $this->view("app.panel.code_update", compact('user'));  
              } else {  
                  // ارسال کد تأیید  
                  $code = $_SESSION['verification_code'];  
                  $message = 'کد تایید شما برای ویرایش اطلاعات ' . $code . ' می باشد';  
                  $this->sendMessage($message, $user['phone_number']); 
                
                  if($img_prof != null){
                    $user_id = $_SESSION['user_id'];
                    $users = new UsersModel();
                    $user = $users->find($user_id);
                    $this->removeImage($user['img_prof']);
                    $_POST['img_prof'] =  $this->saveImage($img_prof , '/img/users');
                    $_POST['img_prof'] = str_replace( 'public/' , "",$_POST['img_prof'] ); }
                    $_SESSION['info'] = [$username, $email, $phone_number,  $_POST['img_prof']];  

                  // به‌روزرسانی زمان آخرین ارسال کد  
                  $_SESSION['last_code_sent_time'] = $current_time;  
                  $_SESSION['resend_count']++;  
                  $this->flash('error_suc', 'کد تأیید جدید با موفقیت ارسال شد!');  
  
                  return $this->view("app.panel.code_update", compact('user'));  
              }  
          }  
      }  
  }  
  }
  public function verify_code()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    } else {
      if ($_SESSION['verification_code'] != $_POST['verification_code']) {

        $this->flash('error', 'کد تایید اشتباه است');
      } else {
        $user = new UsersModel();
        $user = $user->update_panel_info($_SESSION['user_id'], $_SESSION['info']);
        $this->flash('success', 'اطلاعات با موفقیت ویرایش شد');
        return $this->redirect('Userpanel/edit_profil');
      }
    }
  }
  public function latest_order()
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $orders = new OrdersModel();
    $orders = $orders->allPanel($user_id);
    $user = new UsersModel();
    $user = $user->find($user_id);

    return $this->view("app.panel.latest_order", compact('user' , 'orders'));

  }
  public function order_detail($id)
  {
    if (!isset($_SESSION['user_id'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['user_id'];
    $orders = new OrdersModel();
    $orders = $orders->find($id);
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.order_detail", compact('user' , 'orders'));

  }
  public function address()
  {
  
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $adders = new AssersModel();
    $adders = $adders->allPanel($user_id);
    return $this->view("app.panel.address", compact('user' , 'adders'));

  }
  public function create_address()
  {
   
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
   
    return $this->view("app.panel.address_create", compact('user'));

  }
  public function stor_addres()
  {
   
    $user_id = $_SESSION['user_id'];
    $adders = new AssersModel();
    $adders = $adders->insert($user_id , $_POST);
    return $this->redirect('Userpanel/address');

  }
  public function delete_adders($id)
  {
    $adders = new AssersModel();
    $adders = $adders->delete($id);
    return $this->redirect('Userpanel/address');

  }
  public function favorites()
  {
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    $favorite = new favoritesModel();
    $favorite = $favorite->allPanel($user_id);
    
    return $this->view("app.panel.favorites", compact('user' , 'favorite'));

  }
  public function delete_favorites($id)
  {
   
    $favorite = new favoritesModel();
    $favorite = $favorite->delete($id);
    return $this->redirect('Userpanel/favorites');


  }
  public function ticket()
  {
    $user_id = $_SESSION['user_id'];
    $user = new UsersModel();
    $user = $user->find($user_id);
  $messages = new messagesModel();
   $chaths = $messages->allPanel_chath($user_id);
    return $this->view("app.panel.ticket", compact('user' , 'chaths'));

  }
  public function create_Chath()
  {
    $user_id = $_SESSION['user_id'];
    $messages = new messagesModel();
    $chaths = $messages->insert_chat($user_id);
    return $this->redirect('Userpanel/ticket' );
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
    return $this->view("app.panel.ticket_single", compact('user' ,  'messages' , 'chath'));

  }
  public function send_messaged($id) {
   $user_id = $_SESSION['user_id'];

    $messages = new messagesModel();
    $message = $messages->insert($id , $user_id , $_POST);
    $chaths = new messagesModel();
    $chaths = $chaths->find_chath($id);
    if($chaths['titel'] == "") {
      
      $messages = new messagesModel();
      $chaths = $messages->update_chat($id , 'titel' , $_POST['title']);
    }
   return $this->redirect('Userpanel/ticket_single_show/'. $id );


  }
  
}
