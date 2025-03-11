<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
    <title>لوازم التحریر خیام</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="" property="og:title">
    <meta content="" property="og:type">
    <meta content="" property="og:url">
    <meta content="" property="og:image">

    <!-- Place favicon.ico in the root directory -->

    <link href="<?php $this->asset('css/normalize.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('font/bootstrap-icon/bootstrap-icons.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/countdown/countdown.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/rasta-contact/style.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/mega-menu.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/responsive.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

    <meta content="#f4f5f9" name="theme-color">
    <style>  
    .top-header-user-panel {  
        display: flex;  
        align-items: center;  
        background-color: #f0f0f0; /* رنگ پس‌زمینه */  
        border: 2px solid #0E1935; /* رنگ و ضخامت مرز */  
        border-radius: 5px; /* شعاع گوشه‌ها */  
        padding: 10px; /* فاصله داخلی */  
        text-decoration: none; /* حذف خط زیر */  
        color: #0E1935; /* رنگ متن */  
        transition: background-color 0.3s, transform 0.2s; /* افکت‌های تغییر رنگ */  
    }  

    .top-header-user-panel:hover {  
        background-color: #e0e0e0; /* رنگ پس‌زمینه حین هاور */  
        transform: scale(1.05); /* کوچک کردن دکمه */  
    }  

    .top-header-user-panel-icon {  
        margin-right: 8px; /* فاصله بین آیکن و متن */  
    }  
</style>  
</head>

<body>

<!--header-->

<div class="header">
    <div class="container-fluid">
        <div class="top-header">
            <div class="row gx-0 align-items-center gy-4">
                <div class="d-lg-none d-block col-sm-4 col-2 order-lg-5 order-1">
                    <div class="d-flex align-items-center">
                        <div class="responsive-menu d-lg-none d-block">
                            <button aria-controls="responsive menu" class="btn border-0 p-0 btn-responsive-menu" data-bs-target="#responsiveMenu" data-bs-toggle="offcanvas" type="button">
                                <i class="bi bi-list font-30"></i>
                            </button>
                            <div aria-labelledby="responsive menu" class="offcanvas offcanvas-start" id="responsiveMenu" tabindex="-1">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasRightLabel">لوازم التحریر  خیام</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas" type="button"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <a class="text-center d-block mb-3" href="">
                                        <img alt="" class="img-fluid" src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" width="200">
                                    </a>
                                    <div class="header-bottom-form mb-4 w-100">
                                        <div class="search-form">
                                            <form action="<?php $this->url('/search') ?>" method="post">
                                                <div class="search-filed">
                                                    <input class="form-control search-input" name="text_search" placeholder="جستجوی محصولات ..." type="text">
                                                    <button class="btn search-btn main-color-one-bg rounded-3" type="submit"><i class="bi bi-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <ul class="rm-item-menu navbar-nav">
                                        <li class="nav-item bg-ul-f7"><a class="nav-link" href="<?php $this->url('/home/index') ?>">صفحه
                                            اصلی</a>
                                        </li>
                                        <li class="nav-item bg-ul-f7">
                                            <a class="nav-link" href=""> نوشت افزار </a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">انواع</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">مداد</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">پاک کن</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">خودکار</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">خط کش</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">غلط گیر </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">برند</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">بیک</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">سی کلاس</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">پالمو</a>
                                                        </li><li class="nav-item"><a class="nav-link" href="">کیان </a>
                                                        </li><li class="nav-item"><a class="nav-link" href="">پیکاسو</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">فابر کاستر</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item bg-ul-f7">
                                            <a class="nav-link" href="">تبلت</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">کشور</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">ژاپن</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">کره
                                                            جنوبی</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">آمریکایی</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">بر اساس رده بندی</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">لمسی</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">دانش
                                                            آموزی</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">مخصوص
                                                            بازی</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item bg-ul-f7">
                                            <a class="nav-link" href="">لپتاپ</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">برند</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">ایسر</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">مایکروسافت</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">ایسوس</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">اپل</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">سونی</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="">بر اساس قیمت</a>
                                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                    <ul class="navbar-nav h-0 bg-ul-f7">
                                                        <li class="nav-item"><a class="nav-link" href="">ارزان</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">اقتصادی</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="">گران</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item bg-ul-f7">
                                            <a class="nav-link" href="">صفحات</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0">
                                                <li><a href="index.html">صفحه اصلی</a></li>
                                                <li class="nav-item"><a class="nav-link" href="product.html">صفحه
                                                    محصول</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="category.html">صفحه
                                                    دسته
                                                    بندی</a></li>
                                                <li class="nav-item"><a class="nav-link" href="cart.html">صفحه سبد
                                                    خرید</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="search.html">صفحه
                                                    جستجو</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="category-product-row.html">دسته بندی
                                                    محصولات خطی</a></li>
                                                <li class="nav-item"><a class="nav-link" href="404.html">صفحه
                                                    404</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="login.html">صفحه
                                                    ورود</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="register.html">صفحه
                                                    ثبت
                                                    نام</a></li>
                                                <li class="nav-item"><a class="nav-link" href="forget.html">صفحه
                                                    فراموشی
                                                    رمز
                                                    عبور</a></li>
                                                <li class="nav-item"><a class="nav-link" href="blog.html">صفحه
                                                    وبلاگ</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="blog-detail.html">صفحه
                                                    جزییات
                                                    وبلاگ</a></li>
                                                <li class="nav-item"><a class="nav-link" href="compare.html">صفحه
                                                    مقایسه
                                                    محصول</a></li>
                                                <li class="nav-item"><a class="nav-link" href="checkout.html">پرداخت
                                                    مرحله
                                                    ای</a></li>
                                                <li class="nav-item"><a class="nav-link" href="payment-ok.html">پرداخت
                                                    موفق</a></li>
                                                <li class="nav-item"><a class="nav-link" href="payment-nok.html">پرداخت
                                                    ناموفق</a></li>
                                                <li class="nav-item"><a class="nav-link" href="product-not-found.html">محصول
                                                    ناموجود</a></li>
                                                <li class="nav-item"><a class="nav-link" href="empty-cart.html">سبد
                                                    خرید
                                                    خالی</a></li>
                                                <li class="nav-item"><a class="nav-link" href="dashboard.html">
                                                    داشبورد
                                                    کاربری</a></li>
                                                <li class="nav-item"><a class="nav-link" href="order.html">سفارشات</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="favorite.html">محصولات
                                                    مورد
                                                    علاقه</a></li>
                                                <li class="nav-item"><a class="nav-link" href="notification.html">اطلاعیه</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="comments.html">نظرات</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="address.html">آدرس
                                                    ها</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="last-seen.html">آخرین
                                                    بازدید
                                                    ها</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="top-header-logo d-lg-block d-none">
                            <a href="<?php $this->url('/home') ?>">
                                <img alt="" src="<?php echo $this->asset('/img_site/icon/icon.png') ?> " title="صفحه اصلی">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-7 order-lg-1 order-2">
                    <div class="top-header-logo">
                        <a href="<?php $this->url('/home') ?>">
                            <img src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" width="100" alt="صفحه اصلی" title="صفحه اصلی">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-2 order-4">
                    <div class="search-form">
                        <form  action="<?php $this->url('/search') ?>" method="post">
                            <div class="search-filed">
                                <input type="text" placeholder="محصول خود را جستجو کنید" name="text_search" class="form-control search-input">
                                <button type="submit" class="top-header-search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path d="M12.9742 12.1508L12.9742 12.1508L11.2255 10.4458C12.1333 9.42855 12.6838 8.09702 12.6838 6.63956C12.6838 3.43893 10.0316 0.85 6.76692 0.85C3.50227 0.85 0.85 3.43893 0.85 6.63956C0.85 9.84018 3.50227 12.4291 6.76692 12.4291C8.11591 12.4291 9.36008 11.9872 10.3557 11.243L12.1375 12.9806L12.1372 12.9809L12.1456 12.9879L12.1955 13.0299L12.1952 13.0302L12.2042 13.0367C12.4363 13.2047 12.7646 13.1861 12.9753 12.9795C13.2087 12.7507 13.2081 12.3789 12.9742 12.1508ZM2.03826 6.63956C2.03826 4.09064 4.15218 2.01864 6.76692 2.01864C9.38167 2.01864 11.4956 4.09064 11.4956 6.63956C11.4956 9.18848 9.38167 11.2605 6.76692 11.2605C4.15218 11.2605 2.03826 9.18848 2.03826 6.63956Z" fill="#0E1935" stroke="#0E1935" stroke-width="0.3"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-3 order-lg-3 order-3">
                    <!-- <div>عکس ایکون پنل </div> -->
                    <div class="top-header-auth">
                        <?php   if(!isset($_SESSION['user_id'])){ ?>
                        <a href="<?php $this->url('/Auth/login') ?>" class="top-header-auth-login btn">
                        <span class="top-header-auth-login-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9705 5.46829C12.9705 7.67106 11.2043 9.43733 9 9.43733C6.79642 9.43733 5.02951 7.67106 5.02951 5.46829C5.02951 3.26552 6.79642 1.5 9 1.5C11.2043 1.5 12.9705 3.26552 12.9705 5.46829ZM9 16.5C5.74678 16.5 3 15.9712 3 13.9312C3 11.8905 5.76404 11.3804 9 11.3804C12.254 11.3804 15 11.9092 15 13.9492C15 15.99 12.236 16.5 9 16.5Z" fill="#0E1935"></path>
                            </svg>
                        </span>
                            <span class="top-header-auth-login-text">ثبت نام / ورود</span>
                        </a>
                        <?php } else { ?>
                            <a href="<?php $this->url('/Userpanel') ?>" class="top-header-user-panel btn">  
    <span class="top-header-user-panel-icon">  
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">  
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" fill="#0E1935"/>  
        </svg>  
    </span>  
    <span class="top-header-user-panel-text">پنل کاربری</span>  
</a> 
                            <?php }?>
                        <a class="top-header-cart btn" data-bs-toggle="offcanvas" href="" role="button" aria-controls="offcanvasCart">
                        <span class="top-header-cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.591 8.42484H12.6669C12.9816 8.42484 13.2289 8.16461 13.2289 7.8508C13.2289 7.52934 12.9816 7.27677 12.6669 7.27677H10.591C10.2762 7.27677 10.0289 7.52934 10.0289 7.8508C10.0289 8.16461 10.2762 8.42484 10.591 8.42484ZM15.1324 4.44562C15.5896 4.44562 15.8893 4.60635 16.1891 4.95843C16.4889 5.3105 16.5413 5.81565 16.4739 6.27412L15.7619 11.295C15.627 12.2602 14.8177 12.9712 13.8659 12.9712H5.68979C4.69307 12.9712 3.86871 12.1913 3.78627 11.181L3.09681 2.83755L1.96519 2.63855C1.66543 2.58498 1.45559 2.28648 1.50805 1.98032C1.56051 1.66728 1.85278 1.45987 2.16004 1.50655L3.9474 1.78133C4.2022 1.82801 4.38955 2.04156 4.41204 2.30179L4.55443 4.01624C4.57691 4.26193 4.77176 4.44562 5.01157 4.44562H15.1324ZM5.56973 14.1809C4.94023 14.1809 4.43062 14.7014 4.43062 15.3443C4.43062 15.9795 4.94023 16.5 5.56973 16.5C6.19175 16.5 6.70135 15.9795 6.70135 15.3443C6.70135 14.7014 6.19175 14.1809 5.56973 14.1809ZM14.0007 14.1809C13.3712 14.1809 12.8616 14.7014 12.8616 15.3443C12.8616 15.9795 13.3712 16.5 14.0007 16.5C14.6227 16.5 15.1323 15.9795 15.1323 15.3443C15.1323 14.7014 14.6227 14.1809 14.0007 14.1809Z" fill="#0E1935"></path>
                            </svg>
                        </span>
                            <span class="top-header-cart-icon-text">سبد خرید</span>
                            <span class="top-header-cart-counter badge bg-white text-dark ms-1 font-16">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/header-->

<!-- start mega menu -->

<div class="mega-menu-parent">
    <div class="container-fluid">
        <div class="top-menu-parent d-lg-block d-none">
            <div class="row">
                <div class="col-lg-9">
                    <div class="top-menu-menu">
                        <ul class="navbar-nav align-items-center">
                            <li class="position-relative m-0"></li>
                            <li class="nav-item main-menu-head "><a href="" class="nav-link f-600">
                                <i class="bi bi-list"></i>
                                مگا تب منو
                            </a>
                                <ul class="main-menu mega-container">
                                    <li class=""><a href=""><i class="bi bi-phone"></i>
                                        موبایل</a>
                                        <ul class="main-menu-sub back-menu" style=" background: #fff url('assets/img/mega-img-1.jpg') no-repeat;background-size: 260px !important;">
                                            <li><a class="title my-flex-baseline" href="">برند های مختلف گوشی</a>
                                            </li>
                                            <li><a href="">گوشی اپل</a></li>
                                            <li><a href="">گوشی سامسونگ</a></li>
                                            <li><a href="">گوشی شیائومی</a></li>
                                            <li><a href="">گوشی بلک بری</a></li>
                                            <li><a href="">گوشی ایرانی</a></li>
                                            <li><a class="title my-flex-baseline" href="">گوشی بر اساس قیمت</a></li>
                                            <li><a href="">گوشی تا 2 میلیون</a></li>
                                            <li><a href="">گوشی تا 5 میلیون</a></li>
                                            <li><a href="">گوشی تا 10 میلیون</a></li>
                                            <li><a href="">گوشی تا 12 میلیون</a></li>
                                            <li><a href="">گوشی تا 15 میلیون</a></li>
                                            <li><a class="title my-flex-baseline" href="">گوشی براساس حافظه
                                                داخلی</a></li>
                                            <li><a href="">گوشی تا 16 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 32 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 64 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 128 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 256 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 512 گیگابایت</a></li>
                                            <li><a href="">گوشی تا 1 ترابایت</a></li>
                                            <li><a class="title my-flex-baseline" href="">گوشی براساس کاربری</a>
                                            </li>
                                            <li><a href="">گوشی اقتصادی</a></li>
                                            <li><a href="">گوشی دانش آموزی</a></li>
                                            <li><a href="">گوشی لاکچری</a></li>
                                            <li><a href="">گوشی پرچمدار</a></li>
                                        </ul>
                                    </li>
                                    <li class="main-menu-sub-active-li"><a href=""><i class="bi bi-tablet"></i> تبلت</a>
                                        <ul class="main-menu-sub back-menu" style=" background: #fff url('assets/img/mega-img-2.jpg') no-repeat;background-size: 260px !important;">
                                            <li class=""><a class="title my-flex-baseline" href="">برند های مختلف تبلت</a>
                                            </li>
                                            <li><a href="">تبلت اپل</a></li>
                                            <li class=""><a href="">تبلت سامسونگ</a></li>
                                            <li class=""><a href="">تبلت شیائومی</a></li>
                                            <li class=""><a href="">تبلت بلک بری</a></li>
                                            <li class=""><a href="">تبلت ایرانی</a></li>
                                            <li class=""><a class="title my-flex-baseline" href="">تبلت بر اساس قیمت</a></li>
                                            <li class=""><a href="">تبلت تا 2 میلیون</a></li>
                                            <li class=""><a href="">تبلت تا 5 میلیون</a></li>
                                            <li><a href="">تبلت تا 10 میلیون</a></li>
                                            <li><a href="">تبلت تا 12 میلیون</a></li>
                                            <li><a href="">تبلت تا 15 میلیون</a></li>
                                            <li><a class="title my-flex-baseline" href="">تبلت براساس حافظه
                                                داخلی</a></li>
                                            <li><a href="">تبلت تا 16 گیگابایت</a></li>
                                            <li><a href="">تبلت تا 32 گیگابایت</a></li>
                                            <li><a href="">تبلت تا 64 گیگابایت</a></li>
                                            <li><a href="">تبلت تا 128 گیگابایت</a></li>
                                            <li class=""><a href="">تبلت تا 256 گیگابایت</a></li>
                                            <li class=""><a href="">تبلت تا 512 گیگابایت</a></li>
                                            <li><a href="">تبلت تا 1 ترابایت</a></li>
                                            <li class=""><a class="title my-flex-baseline" href="">تبلت براساس کاربری</a>
                                            </li>
                                            <li class=""><a href="">گتبلتوشی اقتصادی</a></li>
                                            <li><a href="">تبلت دانش آموزی</a></li>
                                            <li><a href="">تبلت لاکچری</a></li>
                                            <li><a href="">تبلت پرچمدار</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href=""><i class="bi bi-shield"></i>آنتی ویروس</a>
                                        <ul class="main-menu-sub back-menu" style=" background: #fff url('assets/img/mega-img-3.jpg') no-repeat;background-size: 260px !important;">
                                            <li><a class="title my-flex-baseline" href="">براساس برند</a></li>
                                            <li><a href="">نود 32</a></li>
                                            <li><a href="">کسپر اسکای</a></li>
                                            <li><a href="">360 سکوریتی</a></li>
                                            <li><a href="">بیت دیفیندر</a></li>
                                            <li><a href="">ایمن</a></li>
                                            <li><a class="title my-flex-baseline" href="">براساس ویندوز</a></li>
                                            <li><a href="">ویندوز 7</a></li>
                                            <li><a href="">ویندوز 8</a></li>
                                            <li><a href="">ویندوز 8.1</a></li>
                                            <li><a href="">ویندوز 10</a></li>
                                            <li><a href="">ویندوز 11</a></li>
                                            <li><a class="title my-flex-baseline" href="">براساس برند</a></li>
                                            <li><a href="">نود 32</a></li>
                                            <li><a href="">کسپر اسکای</a></li>
                                            <li><a href="">360 سکوریتی</a></li>
                                            <li><a href="">بیت دیفیندر</a></li>
                                            <li><a href="">ایمن</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href=""><i class="bi bi-laptop"></i>لبتاپ</a>
                                        <ul class="main-menu-sub back-menu" style=" background: #fff url('assets/img/mega-img-4.jpg') no-repeat;background-size: 260px !important;">
                                            <li><a href="">لبتاپ اپل</a></li>
                                            <li><a href="">لبتاپ سامسونگ</a></li>
                                            <li><a href="">لبتاپ شیائومی</a></li>
                                            <li><a href="">لبتاپ بلک بری</a></li>
                                            <li><a href="">لبتاپ ایرانی</a></li>
                                            <li><a class="title my-flex-baseline" href="">لبتاپ بر اساس قیمت</a>
                                            </li>
                                            <li><a href="">لبتاپ تا 2 میلیون</a></li>
                                            <li><a href="">لبتاپ تا 5 میلیون</a></li>
                                            <li><a href="">لبتاپ تا 10 میلیون</a></li>
                                            <li><a href="">لبتاپ تا 12 میلیون</a></li>
                                            <li><a href="">لبتاپ تا 15 میلیون</a></li>
                                            <li><a class="title my-flex-baseline" href="">لبتاپ براساس حافظه
                                                داخلی</a></li>
                                            <li><a href="">لبتاپ تا 16 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 32 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 64 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 128 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 256 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 512 گیگابایت</a></li>
                                            <li><a href="">لبتاپ تا 1 ترابایت</a></li>
                                            <li><a class="title my-flex-baseline" href="">لبتاپ براساس کاربری</a>
                                            </li>
                                            <li><a href="">لبتاپ اقتصادی</a></li>
                                            <li><a href="">لبتاپ دانش آموزی</a></li>
                                            <li><a href="">لبتاپ لاکچری</a></li>
                                            <li><a href="">لبتاپ پرچمدار</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href=""><i class="bi bi-tag"></i>پر فروش ترین ها</a>
                                        <ul class="main-menu-sub back-menu" style=" background: #fff url('assets/img/mega-img-5.jpg') no-repeat;background-size: 260px !important;">
                                            <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 </a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 </a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 </a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 </a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">زیر منو شماره 1</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link f-600 border-animate fromCenter">
                                <i class="bi bi-tablet"></i>
                                مگا لیست منو
                            </a>
                                <ul class="list-unstyled shadow-lg back-menu sub-menu mega-container" style="background: #fff url('assets/img/mega-img-6.jpg') no-repeat;background-size: 260px !important;">
                                    <li><a href="" class="title">بـرند</a></li>
                                    <li><a href="">سامـسونگ</a></li>
                                    <li><a href="">اپـل</a></li>
                                    <li><a href="">شیـائومی</a></li>
                                    <li><a href="">ال جی</a></li>
                                    <li><a href="">وان پـلاس</a></li>
                                    <li><a href="">جی ال ایـکس</a></li>
                                    <li><a href="">هـو آوی</a></li>
                                    <li><a href="">بلک بـری</a></li>
                                    <li><a href="">توشـیبا</a></li>
                                    <li><a href="">دایـناکورد</a></li>
                                    <li><a href="" class="title">براساس رده بندی </a>
                                    </li>
                                    <li><a href="">دکـمه ای</a></li>
                                    <li><a href="">لـمسـی</a></li>
                                    <li><a href="">نـظـامی</a></li>
                                    <li><a href="">ضـد آب</a></li>
                                    <li><a href="">مسـافرتی</a></li>
                                    <li><a href="">خـارنی</a></li>
                                    <li><a href="" class="title">براساس کشور </a></li>
                                    <li><a href="">ایران</a></li>
                                    <li><a href="">ژاپن</a></li>
                                    <li><a href="">فرانسه</a></li>
                                    <li><a href="">کره جنوبی</a></li>
                                    <li><a href="">آمریکا</a></li>
                                    <li><a href="">سوئد</a></li>
                                    <li><a href="">تایوان</a></li>
                                    <li><a href="" class="title">براساس رنگ</a></li>
                                    <li><a href="">قرمز</a></li>
                                    <li><a href="">قهوه ای</a></li>
                                    <li><a href="">سبز</a></li>
                                    <li><a href="">بنفش</a></li>
                                    <li><a href="">نارنجی</a></li>
                                    <li><a href="">نیلی</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link f-600 border-animate fromCenter"><i class="bi bi-menu-app"></i>منو ساده</a>
                                <ul class="level-one">
                                    <li><a href="">منو شماره 1</a></li>
                                    <li><a href="">منو شماره 2</a></li>
                                    <li class="position-relative"><a href="">منو شماره 3 <i class="bi bi-chevron-left"></i></a>
                                        <ul class="level-two">
                                            <li><a href="">زیر منو شماره 1</a></li>
                                            <li><a href="">2 زیر منو شماره </a></li>
                                            <li><a href="">3 زیر منو شماره </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">منو شماره 4</a></li>
                                    <li><a href="">منو شماره 5</a></li>
                                    <li><a href="">منو شماره 6</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link border-animate f-600 fromCenter">
                                    <i class="bi bi-tag"></i>تخفیف ها و پیشنهاد ها
                                </a>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link f-600 border-animate fromCenter">
                                <i class="bi bi-question-octagon"></i>
                                سوالی
                                دارید</a>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link f-600 border-animate fromCenter">
                                <i class="bi bi-bag-heart"></i>
                                در استادینو
                                بفروشید</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex align-items-center justify-content-end top-header-call d-xl-flex d-none">
                        <div class="top-header-call-title me-3">
                            <h6 class="text-center h5">09918694588</h6>
                            <p class="text-muted">پشتیبانی 24 ساعته</p>
                        </div>
                        <div class="top-header-call-icon">
                            <i class="bi bi-telephone-forward fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>