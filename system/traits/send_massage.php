<?php

namespace System\Traits;

trait send_massage
{
   protected function sendMessage($messageText, $mobiles) {  
        // URL آدرس API  
        $lineNumber = '30007487132973';
        $apiUrl = 'https://api.sms.ir/v1/send/bulk'; // جایگزین با URL واقعی  
    
        // داده‌هایی که باید ارسال شوند  
        $data = [  
            'lineNumber' => $lineNumber,  
            'messageText' => $messageText,  
            'mobiles' => [
                $mobiles
                ]
        ];  
    
        // آغاز cURL  
        $ch = curl_init($apiUrl);  
    
        // تنظیمات cURL  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_POST, true);  
        
        // تنظیم هدرها  
        curl_setopt($ch, CURLOPT_HTTPHEADER, [  
            'Content-Type: application/json', // نوع محتوا JSON  
            'x-api-key: USvet6AabDekmTc81jqeTXYOAsjiNldCeXJwnz6cKS4SLxib', // کلید API  
        ]);  
    
        // ارسال داده‌ها به عنوان JSON  
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
    
        // ارسال درخواست  
        $response = curl_exec($ch);  
    
        // بررسی خطاها  
        if (curl_errno($ch)) {  
            echo 'Error: ' . curl_error($ch);  
        } else {  
            // پردازش پاسخ  
            $responseData = json_decode($response, true);  
            
            // بررسی موفقیت  
            if (isset($responseData['status']) && $responseData['status'] === 'success') {  
                return 'پیام با موفقیت ارسال شد!';  
            } else {  
                return 'خطا در ارسال پیام: ' . ($responseData['error'] ?? 'اطلاعات کافی نیست');  
 }
}
  curl_close($ch);  
}  


}  
