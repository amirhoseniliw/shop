<?php

namespace Application\Controllers;

use application\model\Users as UsersModel;

class Auth extends Controller
{
    public function login()
    {


        return $this->View('app.auth.login');
    }
    public function Check_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $code = $_POST['captcha'];
      
        $user = new UsersModel();
        $user = $user->find_login($username);

        if  ($code !=  $_SESSION['captcha'] ) {
            $this->flash('login_errors', 'عدد را به صورت صحیح وارد کنید !');
            return $this->redirect('Auth/login');
        } else {
            if ($user == "") {
                $this->flash('login_errors', ' کاربری با این نام کاربری  یافت نشد !');
                return $this->redirect('Auth/login');
            }
             else {
                if ($this->verify_password($password, $user['password']) && $user['username'] == $username) {

                    $_SESSION['id_user'] = $user['user_id'];
                    return $this->redirect('home/index');
                }
                else{
                    $this->flash('login_errors', ' رمز شما اشتباه می باشد !');
                return $this->redirect('Auth/login');
                }
            }
        }
    }
    public function register()
    {


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
        if(isset($_POST)){
        $user = new UsersModel();
        $user = $user->find_mob($_POST['phone']);
        if ($user == "") {
            $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');
            return $this->redirect('Auth/otp_sms');
        }

        $verification_code  = rand(10000, 99999);

        // اطلاعات احراز هویت  
        $apiKey = 'USvet6AabDekmTc81jqeTXYOAsjiNldCeXJwnz6cKS4SLxib'; // توکن API خود را اینجا قرار دهید  
        $url = 'https://api.sms.ir/v1/send/bulk';
        $massege = "با سلام کد تایید شما " . "\n" . $verification_code;

        if (!isset($_POST['phone']) || empty($_POST['phone'])) {
            echo 'شماره موبایل ارسال نشده است.';
            return;
        }

        $mobail = $_POST['phone'];

        // داده‌های پیام  
        $data = [
            'lineNumber' => '30007487132973', // شماره خط  
            'messageText' => $massege, // متن پیام  
            'mobiles' => [
                $mobail // شماره گیرنده  
            ]
        ];

        // ایجاد یک cURL session  
        $ch = curl_init($url);

        // تنظیمات cURL  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "X-API-KEY: $apiKey" // هدر توکن امنیتی  
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // ارسال داده‌ها به صورت JSON  

        // ارسال درخواست  
        $response = curl_exec($ch);

        // بررسی خطاها  
        if (curl_errno($ch)) {
            echo 'خطا در ارسال درخواست: ' . curl_error($ch);
        } else {
            return $this->View('app.auth.code', compact('verification_code', 'mobail'));
        }
    }

        // بستن cURL session  
        curl_close($ch);
    }
    public function set_session()
    {
        session_start();
        $_SESSION['status'] = true;
    }
    // متد برای بررسی کد تأیید
    public function password($mobail)
    {
        if ($_SESSION['status'] != true) {
            return $this->redirect('Auth/otp_sms');
            $this->flash('not_find_user', '! کاربری با این مشخصات یافت نشد ');

            $_SESSION['status'] = false;
        } else {
            return $this->View('app.auth.password', compact('mobail'));
            $_SESSION['status'] = false;
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
    public function register_Check(){
        echo "hi";
    }
}
