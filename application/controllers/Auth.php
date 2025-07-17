<?php

namespace application\controllers;

use application\model\Users as UsersModel;

class Auth extends Controller
{
    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            unset($_SESSION['cart']);
            unset($_SESSION['admin_id']);
            return $this->redirect('Home/index');
        }
    }
    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            return $this->redirect('Home/index');
        }

        return $this->View('app.auth.login');
    }
    public function Check_login()
    {
        $code = $_POST['captcha'];

      
        if ($code !=  $_SESSION['captcha']) {
            $this->flash('login_errors', 'عدد را به صورت صحیح وارد کنید !');

            return $this->redirect('Auth/login');
        }
         else {
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $user = new UsersModel();
        $user = $user->find_login($phone_number);
        $user_ob = new UsersModel();
        $user_status = $user_ob->find_login_status($phone_number);
        if ($user == "") {

                $this->flash('login_errors', ' کاربری با این نام کاربری  یافت نشد !');
                return $this->redirect('Auth/login');
            } else {
              if($user_status == null ){

            $this->flash('login_errors', '  حساب کاربری شما غیر فعال می باشد   !');
            return $this->redirect('Auth/login');
        }
            
                if ($this->verify_password($password, $user['password']) && $user['phone_number'] == $phone_number) {
                    $username = $user['username'];

                   $status = $this->sendMessage([$username] , $phone_number , 337407);
                    if($user['user_type'] == "admin") {
                        $_SESSION['admin_id'] = $user['user_id'];
                        $_SESSION['user_id'] = $user['user_id'];

                        return $this->redirect('Panel_admin');
                    }
                    else {
                    $_SESSION['user_id'] = $user['user_id'];
                    return $this->redirect('Home');
                    }
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
            return $this->redirect('Home/index');
        }
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
        } else {

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
                $verification_code = (string) rand(10000, 99999);
                $username = $userData['username'];
                $mobile = $_POST['phone'];
                                   $status = $this->sendMessage([$username , $verification_code] , $mobile , 337408);


                if ($status == true) {
                    $mobile = $_POST['phone'];
                    $_SESSION['last_send_time'] = $current_time; // به روز رسانی زمان ارسال  
                    return $this->View('app.auth.code', compact('verification_code', 'mobile'));
                }
            }
        }
    }
    public function set_session()
    {


        $_SESSION['status'] = true;
    }
    // public function test(){
    //     $username = 'امیر ';
    //     $verification_code = '12345';
    //     $mobile = '09399376644' ;
    //                                       $status = $this->sendMessage([ '12345'] , $mobile , 337421);
    //                                       echo $status ;

    // }
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
    //! update password for forget password 
    public function update_password($mobail)
    {
        $user = new UsersModel();
        $user = $user->find_mob($mobail);
        if ($user == "") {
            $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');
            return $this->redirect('Auth/otp_sms');
        } else {
           

            $status = $this->sendMessage([$user['username']], $mobail , 337409);
            $password  = $this->hash_password($_POST['password']);
            $user = new UsersModel();
            $user = $user->update_password($mobail, $password);
            return $this->redirect('Auth/login');
        }
    }
    //! chack code for register of accant -------------------------------
    public function register_Check($code)
    {

        $verification_code = $_POST['verification_code'];
        if ($code  !=  $verification_code) {
            $this->flash('verification_error', 'لطفا کد  رو به درستی وارد کنید !');
            return $this->redirect('Auth/code_register');
        } else {
            $info_user = $_SESSION['info_user'];
            unset($info_user['captcha']);

            $username = $info_user['username'];
            $info_user['password'] = $this->hash_password($info_user['password']);
            // $this->dd($info_user);
            $user = new UsersModel();
            $user = $user->insert($info_user);
          
            $mobile = $info_user['phone_number'];
         

            $status = $this->sendMessage([$username], $mobile , 337486);

            $_SESSION['user_id'] = $user;
            return $this->redirect('Home');
        }
    }
    //! ofter register page sent code ----------------------------------------------------------------------------------
    public function code_register()
    {    
        if(empty($_POST['phone_number']))
            {    $_POST  = $_SESSION['info_user']; 

        }
        if (!isset($_POST)) {

            $this->flash('register_error', 'لطفا اطلاعات رو به درستی وارد کنید !');
            return $this->redirect('Auth/register');
        } else {
            $current_time = time(); // زمان فعلی  
            $time_limit = 120; // دو دقیقه به ثانیه  

            if (!isset($_SESSION['last_send_time'])) {
                $_SESSION['last_send_time'] = 0; // مقدار اولیه برای اولین بار  
            }

            if ($current_time - $_SESSION['last_send_time'] < $time_limit) {  
                                

                $this->flash('register_error', '! لطفا دو دقیقه بعد تلاش کنید ');  
                return $this->redirect('Auth/register');  


            }   else {
            if (!isset($_POST['phone_number']) || empty($_POST['phone_number'])) {
                $this->flash('register_error', 'شماره موبایل ارسال نشده است.');
                   

                return $this->redirect('Auth/register');
            }


            $_SESSION['info_user'] = $_POST;

            $username = $_POST['username'];

            $phone_number = $_POST['phone_number'];
            $user = new UsersModel();
            $user = $user->find_mob($phone_number);
            if ($user != "") {
                $this->flash('register_error', 'شما از قبل  سایت ثبت نام کرده اید !');
                return $this->redirect('Auth/register');
            }
            }
         
            $verification_code =(string) rand(10000, 99999);
            $_SESSION['verification_code'] = $verification_code;
            $message = $username . " عزیز\n" .
            "کد تأیید ثبت‌نام شما: " . $verification_code . "\n" .
            "09399376644\n" .
            "آدرس: مرند، سردار ملی، فروشگاه خیام\n" .
            "تلگرام و روبیکا: @khayame_station";
 
            $status = $this->sendMessage([$username , $verification_code],  $phone_number , 337410);
            if ($status == true) {

                // $_SESSION['last_send_time'] = $current_time; // به روز رسانی زمان ارسال  
                return $this->View('app.auth.code_register' , compact('verification_code'));
            }
        }
    }
}
