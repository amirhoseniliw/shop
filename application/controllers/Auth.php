<?php

namespace Application\Controllers;

class Auth extends Controller{

    public function login(){
       

        // $this->dd($categories);
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
    public function send_mss()  
    {  $verification_code = rand(10000, 99999); // تولید کد 5 رقمی تصادفی  

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
            return $this->redirect('auth/code');

        }  
        
        // بستن cURL session  
        curl_close($ch);  
    }
public function code()  {
    return $this->View('app.auth.code');

}
    // متد برای بررسی کد تأیید
    public function verify_code()
    {
     global   $verification_code ;

    }
}
?>  