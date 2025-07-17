<?php 
namespace system\bootstrap;

// بارگذاری Composer autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

class Autoload {
    public function autoloader() {
        spl_autoload_register(function($className) {

            // اگر کلاس داخل vendor (مثل Dompdf) باشه، بزار Composer لودش کنه
            if (strpos($className, 'Dompdf') === 0 || strpos($className, 'FontLib') === 0 || strpos($className, 'Svg') === 0) {
                return;
            }

            // مسیر ریشه پروژه
            $baseDir = realpath(__DIR__ . '/../../');

            // تبدیل namespace به مسیر فایل
            $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
            $filePath = $baseDir . DIRECTORY_SEPARATOR . $className . '.php';

            if (file_exists($filePath)) {
                include_once $filePath;
            } else {
                throw new \Exception("Class file '$filePath' not found.");
            }
        });
    }
}
