<?php
session_start();

// کانفیگ اصلی
require_once __DIR__ . '/../config.php';

// بارگذاری اتولودر
require_once __DIR__ . '/Autoload.php';

$autoload = new \system\bootstrap\Autoload();
$autoload->autoloader(); // بسیار حیاتی

// اجرای روتینگ
$router = new \system\router\Routing();
$router->run();

