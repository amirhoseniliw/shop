<?php

namespace Application\Controllers;

use application\model\Users as UsersModel;

class Auth extends Controller
{
    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            unset($_SESSION['cart']);
            return $this->redirect('home/index');
        }
    }
    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            return $this->redirect('home/index');
        }

        return $this->View('app.auth.login');
    }
    public function Check_login()
    {
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $code = $_POST['captcha'];

        $user = new UsersModel();
        $user = $user->find_login($phone_number);

        if ($code !=  $_SESSION['captcha']) {
            $this->flash('login_errors', 'عدد را به صورت صحیح وارد کنید !');
            return $this->redirect('Auth/login');
        } else {
            if ($user == "") {
                $this->flash('login_errors', ' کاربری با این نام کاربری  یافت نشد !');
                return $this->redirect('Auth/login');
            } else {
                if ($this->verify_password($password, $user['password']) && $user['phone_number'] == $phone_number) {

                    $_SESSION['user_id'] = $user['user_id'];
                    return $this->redirect('home/index');
                } else {
                    $this->flash('login_errors', ' رمز شما اشتباه می باشد !');
                    return $this->redirect('Auth/login');
                }
            }
        }
    }
    public function register()
    {

        if (isset($_SESSION['user_id'])) {
            return $this->redirect('home/index');
        }
        // $this->dd($categories);
        return $this->View('app.auth.register');
    }
    public function otp_sms()
    {


        // $this->dd($categories);
        return $this->View('app.auth.otp-sms');
    }
    public function send_mss()
    {
        $code = $_POST['captcha'];


        if ($code !=  $_SESSION['captcha']) {
            $this->flash('not_find_user', 'عدد را به صورت صحیح وارد کنید ');
            return $this->redirect('Auth/otp_sms');
        }
        $current_time = time(); // زمان فعلی  
        $time_limit = 120; // دو دقیقه به ثانیه  

        if (!isset($_SESSION['last_send_time'])) {
            $_SESSION['last_send_time'] = 0; // مقدار اولیه برای اولین بار  
        }

        if ($current_time - $_SESSION['last_send_time'] < $time_limit) {  
            $this->flash('not_find_user', '! لطفا دو دقیقه بعد تلاش کنید ');  
            return $this->redirect('Auth/otp_sms');  


        }   else {

        if (isset($_POST)) {
            $user = new UsersModel();
            $userData = $user->find_mob($_POST['phone']);

            if ($userData == "") {
                $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');
                return $this->redirect('Auth/otp_sms');
            }



            if (!isset($_POST['phone']) || empty($_POST['phone'])) {
                $this->flash('not_find_user', 'شماره موبایل ارسال نشده است.');

                return $this->redirect('Auth/otp_sms');
            }
            $verification_code = rand(10000, 99999);
            $message = "با سلام کد تایید شما " . "\n" . $verification_code;
            $mobile = $_POST['phone'];
            $status = $this->sendMessage($message, $mobile);

            if ($status == true) {
                 $mobile = $_POST['phone'];
                $_SESSION['last_send_time'] = $current_time; // به روز رسانی زمان ارسال  
                return $this->View('app.auth.code', compact('verification_code', 'mobile'));
            }
        }}
    }
    public function set_session()  
    {  
      
     
            $_SESSION['status'] = true;  
    
       
    }  
    // متد برای بررسی کد تأیید
    public function password($mobail)
    {
        if ($_SESSION['status'] != true) {
            $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');
            $_SESSION['status'] = false;
            return $this->redirect('Auth/otp_sms');
        } else {
            $_SESSION['status'] = false;

            return $this->View('app.auth.password', compact('mobail'));
        }
    }
    public function update_password($mobail)
    {
        $user = new UsersModel();
        $user = $user->find_mob($mobail);
        if ($user == "") {
            $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');
            return $this->redirect('Auth/otp_sms');
        } else {

            $password  = $this->hash_password($_POST['password']);
            $user = new UsersModel();
            $user = $user->update_password($mobail, $password);
            return $this->redirect('Auth/login');
        }
    }
    public function register_Check()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];
        if (!isset($_POST)) {
            $this->flash('register_error', 'لطفا اطلاعات رو به درستی وارد کنید !');
            return $this->redirect('Auth/register');
        } else {
            $user = new UsersModel();
            $user = $user->find_mob($phone_number);
            if ($user != "") {
                $this->flash('register_error', 'شما از قبل  سایت ثبت نام کرده اید !');
                return $this->redirect('Auth/register');
            } else {
                $user = new UsersModel();
                $user = $user->find_username($username);
                if ($user != "") {
                    $this->flash('register_error', '!شما از قبل در سایت ثبت  کرده اید ');
                    return $this->redirect('Auth/register');
                } else {
                    $_POST['password'] = $this->hash_password($_POST['password']);
                    $user = new UsersModel();
                    $user = $user->insert($_POST);
                    $user = new UsersModel();
                    $user = $user->find_username($username);
                    $_SESSION['user_id'] = $user['user_id'];
                    return $this->redirect('home/login');
                }
            }
        }
    }
}
