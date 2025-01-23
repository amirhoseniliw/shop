<?php 
  
namespace System\Bootstrap;  
require 'vendor/autoload.php'; // بارگذاری خودکار Composer  

class Autoload {  
    public function autoloader() {  
        spl_autoload_register(function($className) {  
            // تبدیل نام فضا به مسیر دایرکتوری  
            $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);  
            
            // تعیین مسیر دقیق فایل با استفاده از حروف کوچک برای پسوند  
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/TahrirKhayam/' . $className . '.php';  
            
            // بررسی وجود فایل  
            if (file_exists($filePath)) {  
                include_once $filePath;  
            } else {  
                throw new \Exception("Class file '$filePath' not found.");  
            }  
        });  
    }  
}