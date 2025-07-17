<?php

// آدرس سایت در حالت لوکال (بدون دامنه)
$base_url = "http://localhost/tahrirkhayam/";
// مسیر ریشه سایت (در صورتی که index.php در مسیر tahrirkhayam باشه)
$base_dir = "/tahrirkhayam/";

// گرفتن route فعلی از آدرس
$tmp = explode('?', $_SERVER['REQUEST_URI']);

$current_route = ltrim(str_replace($base_dir, '', $tmp[0]), '/');
unset($tmp);

// اطلاعات اتصال به دیتابیس لوکال
$dbHost     = 'localhost';
$dbName     = 'tahrirkh_db';
$dbUsername = 'amirhoseniliw';
$dbPassword = '@Amirrima2'; // در محیط لوکال مشکلی نیست، اما روی هاست حتماً رمز رو محافظت کن