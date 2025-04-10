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
            unset($_SESSION['admin_id']);
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
        $code = $_POST['captcha'];

      
        if ($code !=  $_SESSION['captcha']) {
            $this->flash('login_errors', 'عدد را به صورت صحیح وارد کنید !');
            return $this->redirect('Auth/login');
        } else {
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
                    $message = "با سلام و احترام، " . $username . " عزیز,\n\n" .  
           "شما با موفقیت به حساب کاربری خود وارد شدید.\n\n" .  
           "از خدمات فروشگاه لوازم‌التحریر خیام بهره‌مند شوید و در صورت نیاز به کمک، ما در خدمت شما هستیم.\n\n" .  
           "با آرزوی موفقیت،\n" .  
           "فروشگاه لوازم‌التحریر خیام\n";  
           $status = $this->sendMessage($message, $phone_number);

                    if($user['user_type'] = "admin") {
                        $_SESSION['admin_id'] = $user['user_id'];
                        $_SESSION['user_id'] = $user['user_id'];
                        
                        return $this->redirect('Panel_admin/index');
                    }
                    else {
                    $_SESSION['user_id'] = $user['user_id'];
                    return $this->redirect('home/index');
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
                $verification_code = rand(10000, 99999);
                $username = $userData['username'];
                $message = "با سلام و احترام، " . $username . " عزیز,\n\n" .  
                "کد تایید شما برای بازیابی رمز عبور: " . $verification_code . "\n\n" .  
                "لطفاً این کد را با دقت وارد کنید.\n\n" .  
                "با آرزوی موفقیت،\n" .  
                "فروشگاه لوازم‌التحریر خیام\n";                  $mobile = $_POST['phone'];
                $status = $this->sendMessage($message, $mobile);

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
           
            $message = "با سلام و احترام، " . $user['username'] . " عزیز,\n\n" .  
           "رمز عبور شما با موفقیت تغییر یافت.\n\n" .  
           "لطفاً در حفظ رمز عبور جدید خود دقت کنید و از آن در ورود به حساب کاربری استفاده نمایید.\n\n" .  
           "با آرزوی موفقیت،\n" .  
           "فروشگاه لوازم‌التحریر خیام\n";  
            $status = $this->sendMessage($message, $mobail);
            $password  = $this->hash_password($_POST['password']);
            $user = new UsersModel();
            $user = $user->update_password($mobail, $password);
            return $this->redirect('Auth/login');
        }
    }
    //! chack code for register of accant -------------------------------
    public function register_Check()
    {

        $verification_code = $_POST['verification_code'];
        if ($_SESSION['verification_code']  !=  $verification_code) {
            $this->flash('verification_error', 'لطفا کد  رو به درستی وارد کنید !');
            return $this->redirect('Auth/code_register');
        } else {
            $info_user = $_SESSION['info_user'];
            unset($info_user['captcha']);

            $username = $info_user['username'];
            $info_user['password'] = $this->hash_password($info_user['password']);
            $user = new UsersModel();
            $user = $user->insert($info_user);
            $user = new UsersModel();
            $user = $user->find_username($username);
            $mobile = $info_user['phone_number'];
            $message = "با سلام و احترام، " . $username . " عزیز,\n\n" .  
           "ثبت‌نام شما با موفقیت انجام شد.\n\n" .  
           "حال می‌توانید با نام کاربری و رمز عبور خود وارد حساب کاربری شوید.\n" .  
           "از خدمات فروشگاه لوازم‌التحریر خیام بهره‌مند شوید و در صورت نیاز به کمک، ما در خدمت شما هستیم.\n\n" .  
           "با آرزوی موفقیت،\n" .  
           "فروشگاه لوازم‌التحریر خیام\n";  
            $status = $this->sendMessage($message, $mobile);

            $_SESSION['user_id'] = $user['user_id'];
            return $this->redirect('home');
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
            $code = $_POST['captcha'];
            if ($_SESSION['captcha'] != $code) {
                $this->flash('register_error', 'لطفا کد  را  به درستی وارد کنید !');
                return $this->redirect('Auth/register');
            }

           
            $username = $_POST['username'];

            $phone_number = $_POST['phone_number'];
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
                }
                }
            }
            $verification_code = rand(10000, 99999);
            $_SESSION['verification_code'] = $verification_code;
            $message = "با سلام و احترام، " . $username . " عزیز,\n\n" .  
            "شما به صفحه ثبت‌نام خوش آمدید.\n\n" .  
            "کد تأیید شما: " . $verification_code . "\n\n" .  
            "لطفاً اطلاعات خود را با دقت وارد کنید تا ثبت‌ نام شما انجام شود.\n\n" .  
            "برای اطلاعات بیشتر و پشتیبانی می‌توانید با شماره زیر تماس بگیرید:\n" .  
            "شماره پشتیبانی: 09918694588\n" .  
            "آدرس:اذربایجان شرقی / مرند / سردار ملی    فروشگاه لوازم‌التحریر خیام\n" .  
            "کانال تلگرام: @khayame_station\n" .  
            "روبیکا: @khayame_station\n\n" .  
            "با آرزوی موفقیت،\n" .  
            "فروشگاه لوازم‌التحریر خیام\n";  
            $status = $this->sendMessage($message,  $phone_number);
            if ($status == true) {

                $_SESSION['last_send_time'] = $current_time; // به روز رسانی زمان ارسال  
                return $this->View('app.auth.code_register');
            }
        }
    }
}
