<?php

namespace Application\Controllers;

class Auth extends Controller{
    public function login(){
       

        return $this->View('app.auth.login');
        

    }
    public function register(){
       

        // $this->dd($categories);
        return $this->View('app.auth.register');

    }
    public function otp_sms(){
       

        // $this->dd($categories);
        return $this->View('app.auth.otp-sms');

    }
    public function send_mss(){   
        $verification_code  = rand(10000, 99999) ;
  
        // اطلاعات احراز هویت  
        $apiKey = 'USvet6AabDekmTc81jqeTXYOAsjiNldCeXJwnz6cKS4SLxib'; // توکن API خود را اینجا قرار دهید  
        $url = 'https://api.sms.ir/v1/send/bulk';  
        $massege = "با سلام کد تایید شما "."\n" . $verification_code;  
        
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
        if ( $_SESSION['status'] != true){
            return $this->redirect('auth/login');
            $_SESSION['status'] = false;
        }
        else {
        return $this->View('app.auth.password', compact('mobail'));
        $_SESSION['status'] = false;

    }}
    public function update_password()
    {
       
    }
}
?>  