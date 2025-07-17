<?php
namespace system\traits;

trait Redirect
{
// هدایت به یک مسیر خاص با در نظر گرفتن پروتکل
protected function redirect($url)
{
    // حذف / اضافی از ابتدای مسیر
    $url = ltrim($url, '/');

    // تشخیص خودکار پروتکل (http یا https)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

    // ساخت مسیر کامل
    $location = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/tahrirkhayam/' . $url;

    header('Location: ' . $location);
    exit; // بسیار مهم برای قطع ادامه اجرای کد
}
// هدایت به صفحه قبلی (back)
protected function back()
{
    if (!empty($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // اگر صفحه قبل نبود، بره به صفحه اصلی یا یک صفحه پیش‌فرض
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $fallback = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/tahrirkhayam/';
        header('Location: ' . $fallback);
    }

    exit; // مهم برای توقف اجرای اسکریپت
}

    protected function dd($value)
    {
       echo "<pre>";
       var_dump($value);
       echo "</pre>";
       exit;
    }

}
