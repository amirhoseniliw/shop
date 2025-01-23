<?php

namespace System\Traits;
use Exception;
use Parsidev\Jalali\jDate;  

trait View {
    protected function view($dir , $vars = null){

        $dir = str_replace('.' , '/',$dir);
        if($vars)
        extract($vars);
        $path = realpath(dirname(__FILE__) . "/../../application/view/".$dir.".php");
        if(file_exists($path)){
            return require_once($path);
        }
        else
        echo "this view [".$dir."] not exist";
    }
protected function asset($dir){
    global $base_url ;
    $path = $base_url . "public/" . $dir;
    echo $path;
}
protected function include($dir , $vars = null){
    $dir = str_replace('.' , '/',$dir);
    if($vars)
    extract($vars);
    $path = realpath(dirname(__FILE__) . "/../../application/view/".$dir.".php");
    if(file_exists($path)){
        return require_once($path);
    }
    else
    echo "this view [".$dir."] not exist";
}
protected function url($url){
if ( $url[0] == '/') {
    $url = substr($url , 1 , strlen($url) -1);
    global $base_url;
    echo $base_url . $url ;
}
}


protected function jalaliData($date) {  
    try {  
        return jDate::forge($date)->format('Y/m/d') . ' & ' . jDate::forge($date)->format('H:i:s');  
        $month = jDate::forge($date)->format('m'); // استخراج ماه
        return ['full_date' => $formattedDate, 'month' => $month];
    } catch (Exception $e) {  
        return 'Error: ' . $e->getMessage(); // مدیریت خطا  
    }  
}  
protected function formatPrice($price) {  
    // اطمینان حاصل کردن از اینکه قیمت یک عدد است  
    if (!is_numeric($price)) {  
        return "قیمت نامعتبر است";  
    }  

    // فرمت‌دهی قیمت به فرمت تومان  
    $formattedPrice = number_format($price);  
    
    // بازگشت قیمت فرمت شده  
    return $formattedPrice;  
}  

}