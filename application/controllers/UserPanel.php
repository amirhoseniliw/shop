<?php

namespace application\controllers;

use application\model\Users as UsersModel;

class UserPanel extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['id_user'])) {
      return $this->redirect('auth/login');
    }
  }
  public function index()
  {
    if (!isset($_SESSION['id_user'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['id_user'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.index", compact('user'));
  }
  public function edit_profil()
  {

    if (!isset($_SESSION['id_user'])) {
      return $this->redirect('auth/login');
    }
    $user_id = $_SESSION['id_user'];
    $user = new UsersModel();
    $user = $user->find($user_id);
    return $this->view("app.panel.edit", compact('user'));
  }
  public function send_code()
  {
    if (!isset($_POST)) {
      $this->flash('error', 'لطفا اطلاعات رو به درستی وارد کنید !');
      return $this->redirect('Userpanel/edit_profil');
    } else {
      if($_POST['email'] != ""){
      $user_id = $_SESSION['id_user'];
      $user = new UsersModel();
      $user = $user->find_email($_POST['email']);

      if ($user != '') {
        $this->flash('error', 'این ایمیل از قبل استفاده شده است ! ' );
        return $this->redirect('Userpanel/edit_profil');
      } 
    }
      else {
        $user_id = $_SESSION['id_user'];
      $user = new UsersModel();
      $user = $user->find_mob($_POST['phone_number']);
      if ($user != "") {
        $this->flash('error', 'این شماره متلق به کاربر دیگریست !');
        return $this->redirect('Userpanel/edit_profil');
      } 
        $user_id = $_SESSION['id_user'];
        $user = new UsersModel();
        $user = $user->find($user_id);
       
       
        $username = isset($_POST['username']) ? $_POST['username'] : $user['username'];
        $email = isset($_POST['email']) ? $_POST['email'] : $user['email'];
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : $user['phone_number'];
        $img_prof = isset($_POST['img_prof']) ? $_POST['img_prof'] : $user['img_prof'];
        $_SESSION['info'] = [$username, $email, $phone_number, $img_prof];
        $user = new UsersModel();
        $user = $user->find_mob($phone_number);
        if ($user = "") {
          $this->flash('register_error', '');
          return $this->redirect('Auth/register');
        } else {
          $user = new UsersModel();
          $user = $user->find_username($username);
          if ($user != "") {
            $this->flash('register_error', '!شما از قبل در سایت ثبت  کرده اید ');
            return $this->redirect('Auth/register');
          }
          //!---------------------------
          if (!isset($_SESSION['verification_code'])) {
            $_SESSION['verification_code'] = rand(10000, 99999); // تولید کد 5 رقمی  
          }
          if (!isset($_SESSION['id_user'])) {
            return $this->redirect('auth/login');
          } else {

            $current_time = time(); // زمان فعلی  
            $two_minutes = 120; // زمان 2 دقیقه (به ثانیه)  

            if (!isset($_SESSION['last_code_sent_time'])) {
              $_SESSION['last_code_sent_time'] = 0; // اگر وجود ندارد، مقداردهی اولیه می‌شود  
            } else {
              if ($current_time - $_SESSION['last_code_sent_time'] < $two_minutes) {
                // اگر کمتر از 2 دقیقه گذشته باشد  
                $remaining_time = ($two_minutes - ($current_time - $_SESSION['last_code_sent_time']));

                // نمایش پیام خطا و بازگشت به صفحه فعلی  

                $user_id = $_SESSION['id_user'];
                $user = new UsersModel();
                $user = $user->find($user_id);
                $this->flash('error', 'لطفاً ' . intval($remaining_time / 60) . ' دقیقه و ' . ($remaining_time % 60) . ' ثانیه دیگر منتظر بمانید تا کد جدید ارسال شود.');

                return $this->view("app.panel.code_update", compact('user'));
              } else {
                $current_date = date('Y-m-d'); // تاریخ فعلی  
                if (!isset($_SESSION['resend_count']) || $_SESSION['resend_date'] != $current_date) {
                  $_SESSION['resend_count'] = 0; // بازنشانی تعداد ارسال  
                  $_SESSION['resend_date'] = $current_date; // ذخیره تاریخ فعلی  
                } else {
                  // بررسی تعداد ارسال کد  
                  if ($_SESSION['resend_count'] >= 5) {
                    $this->flash('error', 'شما حداکثر ۵ بار در روز می‌توانید کد تأیید دریافت کنید. لطفاً بعداً تلاش کنید.');
                    $user_id = $_SESSION['id_user'];
                    $user = new UsersModel();
                    $user = $user->find($user_id);
                    return $this->view("app.panel.code_update", compact('user'));
                  } else {
                    // اگر زمان کافی سپری شده باشد  
                    $code = $_SESSION['verification_code'];
                    $mass = 'کد تایید شما برای ویرایش اطلاعات '  . $code . ' می باشد';
                    $user_id = $_SESSION['id_user'];
                    $user = new UsersModel();
                    $user = $user->find($user_id);
                    $this->sendMessage($mass, $user['phone_number']);

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
       }
      }
    }
  }
  public function verify_code()
  {
    if (!isset($_SESSION['id_user'])) {
      return $this->redirect('auth/login');
    } else {
      if ($_SESSION['verification_code'] != $_POST['verification_code']) {

        $this->flash('error', 'کد تایید اشتباه است');
      } else {
        $user = new UsersModel();
        $user = $user->update_panel_info($_SESSION['id_user'], $_SESSION['info']);
        $this->flash('success', 'اطلاعات با موفقیت ویرایش شد');
        return $this->redirect('Userpanel/edit_profil');
      }
    }
  }
}
