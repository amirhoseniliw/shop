<?php

namespace System\Traits;

use Exception;
use Melipayamak\MelipayamakApi;

trait send_massage
{
   protected function sendMessage(array $args, string $mobile, int $bodyId): bool {
    $url = 'https://console.melipayamak.com/api/send/shared/0fa12774472e4598b39e23ba9e07cda2__5';

    $data = array(
        'bodyId' => $bodyId,
        'to'     => $mobile,
        'args'   => $args // آرایه‌ای از مقدارهای جایگزین برای قالب
    );

    $data_string = json_encode($data);

    $ch = curl_init($url);                          
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                      
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        // لاگ خطا یا مدیریت خطا
        error_log('Curl error: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }

    curl_close($ch);

    // در صورت نیاز بررسی پاسخ API
    // $decoded = json_decode($response, true);

    return true;
}


        
      
    
    


}  
