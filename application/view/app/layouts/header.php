



<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
<title><?= isset($title) && !empty($title) ? $title : 'لوازم التحریر خیام' ?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
 <meta name="robots" content="index, follow">
<meta name="google-site-verification" content="-EuW0rjT9j173rG6b6Rr6k2leZGpqHKyKB3kxtDpVas" />
  <!-- Open Graph (برای اشتراک‌گذاری در شبکه‌های اجتماعی) -->
<meta property="og:title" content="<?= isset($title) && !empty($title) ? $title : 'فروشگاه لوازم التحریر خیام' ?>">
  <meta property="og:description" content="خرید آنلاین بهترین لوازم‌التحریر مدرسه و اداری با ارسال سریع">
  <meta property="og:url" content="https://tahrirkhayam.ir/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="لوازم التحریر خیام">
  <meta property="og:image" content="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
<meta name="keywords" content="لوازم التحریر، فروشگاه لوازم التحریر، خرید لوازم التحریر آنلاین، دفتر مشق، خودکار رنگی، مداد رنگی، کیف مدرسه، لوازم تحریر فانتزی، فروشگاه نوشت‌افزار خیام">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="فروشگاه لوازم التحریر خیام">
  <meta name="twitter:description" content="فروش آنلاین لوازم‌التحریر با قیمت مناسب و ارسال سریع">
  <meta name="twitter:image" content="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

    <!-- Place favicon.ico in the root directory -->

    <link href="<?php $this->asset('css/normalize.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('font/bootstrap-icon/bootstrap-icons.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/countdown/countdown.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/rasta-contact/style.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>"
        rel="stylesheet">
    <link href="<?php $this->asset('css/mega-menu.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?php $this->asset('css/responsive.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
  <link rel="canonical" href="https://tahrirkhayam.ir/">
<meta name="description" content="فروشگاه تحریر خیام، ارائه دهنده انواع لوازم التحریر، نوشت‌افزار، دفتر، خودکار و لوازم مدرسه با بهترین قیمت. خرید آسان و سریع به صورت آنلاین.">

    <meta content="#f4f5f9" name="theme-color">
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Store",
  "name": "تحریر خیام",
  "url": "https://tahrirkhayam.ir/",
  "logo": "https://tahrirkhayam.ir/assets/images/logo.png",
  "description": "فروشگاه آنلاین لوازم التحریر خیام - خرید انواع نوشت‌افزار و لوازم مدرسه",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "IR"
  }
}
</script>

    <style>
    .top-header-user-panel {
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        /* رنگ پس‌زمینه */
        border: 2px solid #0E1935;
        /* رنگ و ضخامت مرز */
        border-radius: 5px;
        /* شعاع گوشه‌ها */
        padding: 10px;
        /* فاصله داخلی */
        text-decoration: none;
        /* حذف خط زیر */
        color: #0E1935;
        /* رنگ متن */
        transition: background-color 0.3s, transform 0.2s;
        /* افکت‌های تغییر رنگ */
    }

    .top-header-user-panel:hover {
        background-color: #e0e0e0;
        /* رنگ پس‌زمینه حین هاور */
        transform: scale(1.05);
        /* کوچک کردن دکمه */
    }

    .top-header-user-panel {  
    border:  none;
    display: flex; /* نمایش FLEX برای چیدمان */  
    align-items: center; /* تراز عمودی */  
    text-decoration: none; /* حذف خط زیر متن */  
    color: #0E1935; /* رنگ متن */  
    padding: 10px 15px; /* فاصله داخلی */  
    border-radius: 5px; /* گوشه‌های گرد */  
    transition: background-color 0.3s ease, color 0.3s ease; /* انیمیشن تغییر رنگ */  
    cursor: pointer; /* نشانگر ماوس به شکل اشاره‌گر */  
}  

.top-header-user-panel:hover {  
    background-color: rgba(74, 144, 226, 0.3); /* رنگ پس‌زمینه در حالت هاور */  
    color: #003366; /* تغییر رنگ متن در حالت هاور */  
}  

.top-header-user-panel-icon {  
    margin-right: 8px; /* فاصله بین آیکون و متن */  
}  

.top-header-user-panel-text {  
    display: inline; /* نمایش متن در کنار آیکون */  
}  

/* نمایش فقط آیکون زمانی که صفحه کوچک است */  
@media (max-width: 600px) {  
    .top-header-user-panel-text {  
        display: none; /* پنهان کردن متن */  
    }  

    .top-header-user-panel-icon {  
        margin: 0; /* حذف فاصله */  
    }  
}  

  .loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0d1117;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    z-index: 9999;
    transition: opacity 0.6s ease;
  }

  .loader-content {
    text-align: center;
  }

  .logo-wrapper {
    margin-bottom: 20px;
    animation: pulse 2s infinite;
  }

  .logo-spin {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    animation: spin 2s linear infinite;
  }

  .loading-text {
    font-family: 'Vazirmatn', 'Courier New', Courier, monospace;
    font-size: 1.1rem;
    color: #00e5ff;
  }

  @keyframes spin {
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
  }

  @keyframes pulse {
    0%, 100% { transform: scale(1);}
    50% { transform: scale(1.05);}
  }
  
</style>

<style>
.kh-marquee-container {
  width: 100%;
  overflow: hidden;
  background: linear-gradient(to left, #9c27b0, #e91e63);
  color: #fff;
  font-family: 'Vazirmatn', sans-serif;
  font-size: 20px;
  top: 0;

  
  z-index: 9999;
  height: 60px;
  display: flex;
  align-items: center;
}

.kh-marquee-track {
  display: inline-block;
  white-space: nowrap;
  animation: scrollText 80s linear infinite;
}

.kh-marquee-track a {
  color: #fff;
  text-decoration: none;
  margin: 0 25px;
  display: inline-block;
}

.kh-marquee-track a:hover {
  color: #ffff00;
  text-decoration: underline;
}

@keyframes scrollText {
  0%   { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
</style>



</head>

<body>

    <!--header-->
<!-- Loader Overlay -->
<div id="loader" class="loader-overlay">
  <div class="loader-content">
    <div class="logo-wrapper">
      <img src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" alt="لوگوی سایت" class="logo-spin">
    </div>
    <p class="loading-text">در حال بارگذاری...</p>
  </div>
</div>

<div class="kh-marquee-container">
  <div class="kh-marquee-track">
  
  </div>

</div>


    <div class="header">
        <div class="container-fluid">
            <div class="top-header">
                <div class="row gx-0 align-items-center gy-4">
                    <div class="d-lg-none d-block col-sm-4 col-2 order-lg-5 order-1">
                        <div class="d-flex align-items-center">
                            <div class="responsive-menu d-lg-none d-block">
                                <button aria-controls="responsive menu" class="btn border-0 p-0 btn-responsive-menu"
                                    data-bs-target="#responsiveMenu" data-bs-toggle="offcanvas" type="button">
                                    <i class="bi bi-list font-30"></i>
                                </button>
                                <div aria-labelledby="responsive menu" class="offcanvas offcanvas-start"
                                    id="responsiveMenu" tabindex="-1">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasRightLabel">لوازم التحریر خیام</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas"
                                            type="button"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <a class="text-center d-block mb-3" href="">
                                            <img alt="" class="img-fluid"
                                                src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" width="200">
                                        </a>
                                        <div class="header-bottom-form mb-4 w-100">
                                            <div class="search-form">
                                                <form action="<?php $this->url('/search/index/'. 'cheap') ?>"
                                                    method="post">
                                                    <div class="search-filed">
                                                        <input class="form-control search-input" name="text_search"
                                                            placeholder="جستجوی محصولات ..." type="text">
                                                        <button class="btn search-btn main-color-one-bg rounded-3"
                                                            type="submit"><i class="bi bi-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <ul class="rm-item-menu navbar-nav">
                                            <li class="nav-item bg-ul-f7"><a class="nav-link"
                                                    href="<?php $this->url('/Home/index') ?>">صفحه
                                                    اصلی</a>
                                            </li>
                                            <li class="nav-item bg-ul-f7">
                                                <a class="nav-link" href="<?php $this->url('/product/category/0') ?>">
                                                    دسته بندی محصولات </a>
                                                <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                <ul class="navbar-nav h-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?php $this->url('/product/category/0') ?>">انواع</a>
                                                        <span class="showSubMenu"><i
                                                                class="bi bi-chevron-left"></i></span>
                                                        <ul class="navbar-nav h-0 bg-ul-f7">
                                                            <?php foreach ($categories as $category) {?>
                                                            <li class="nav-item"><a style="display: inline;"
                                                                    href="<?php $this->url('/product/category/' . $category['category_id']) ?>"><?= $category['category_name'] ?></a>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>


                                            <li class="nav-item bg-ul-f7">
                                                <a class="nav-link" href="">صفحات</a>
                                                <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                <ul class="navbar-nav h-0">
                                                    <li><a href="<?php $this->url('/Home/index') ?>">صفحه اصلی</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/product/index/cheap') ?>">صفحه
                                                            محصول</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/product/category/0') ?>">صفحه
                                                            دسته
                                                            بندی</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/cart/index') ?>">صفحه سبد
                                                            خرید</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/search/index/cheap') ?>">صفحه
                                                            جستجو</a>
                                                    </li>


                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/Auth/login') ?>">صفحه
                                                            ورود</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/Auth/register') ?>">صفحه
                                                            ثبت
                                                            نام</a></li>

                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/Home/abut_us') ?>">درباره ما

                                                        </a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/Home/abut_us') ?>">ارتباط با ما

                                                        </a></li>


                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/UserPanel') ?>">
                                                            داشبورد
                                                            کاربری</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/cart/index') ?>">سفارشات</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="<?php $this->url('/UserPanel/favorites') ?>">محصولات
                                                            مورد
                                                            علاقه</a></li>


                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="top-header-logo d-lg-block d-none">
                                <a href="<?php $this->url('/Home') ?>">
                                    <img alt="" src="<?php echo $this->asset('/img_site/icon/icon.png') ?> "
                                        title="صفحه اصلی">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-7 order-lg-1 order-2">
                        <div class="top-header-logo">
                            <a href="<?php $this->url('/Home') ?>">
                                <img src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" width="100"
                                    alt="صفحه اصلی" title="صفحه اصلی">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 order-lg-2 order-4">
                        <div class="search-form">
                            <form action="<?php $this->url('/search/index/'. 'cheap') ?>" method="post">
                                <div class="search-filed">
                                    <input type="text" placeholder="محصول خود را جستجو کنید" name="text_search"
                                        class="form-control search-input">
                                    <button type="submit" class="top-header-search-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path
                                                d="M12.9742 12.1508L12.9742 12.1508L11.2255 10.4458C12.1333 9.42855 12.6838 8.09702 12.6838 6.63956C12.6838 3.43893 10.0316 0.85 6.76692 0.85C3.50227 0.85 0.85 3.43893 0.85 6.63956C0.85 9.84018 3.50227 12.4291 6.76692 12.4291C8.11591 12.4291 9.36008 11.9872 10.3557 11.243L12.1375 12.9806L12.1372 12.9809L12.1456 12.9879L12.1955 13.0299L12.1952 13.0302L12.2042 13.0367C12.4363 13.2047 12.7646 13.1861 12.9753 12.9795C13.2087 12.7507 13.2081 12.3789 12.9742 12.1508ZM2.03826 6.63956C2.03826 4.09064 4.15218 2.01864 6.76692 2.01864C9.38167 2.01864 11.4956 4.09064 11.4956 6.63956C11.4956 9.18848 9.38167 11.2605 6.76692 11.2605C4.15218 11.2605 2.03826 9.18848 2.03826 6.63956Z"
                                                fill="#0E1935" stroke="#0E1935" stroke-width="0.3"></path>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.9705 5.46829C12.9705 7.67106 11.2043 9.43733 9 9.43733C6.79642 9.43733 5.02951 7.67106 5.02951 5.46829C5.02951 3.26552 6.79642 1.5 9 1.5C11.2043 1.5 12.9705 3.26552 12.9705 5.46829ZM9 16.5C5.74678 16.5 3 15.9712 3 13.9312C3 11.8905 5.76404 11.3804 9 11.3804C12.254 11.3804 15 11.9092 15 13.9492C15 15.99 12.236 16.5 9 16.5Z"
                                            fill="#0E1935"></path>
                                    </svg>
                                </span>
                                <span class="top-header-auth-login-text">ثبت نام / ورود</span>
                            </a>
                            <?php } else { ?>
                            <a href="<?php echo $this->url('/UserPanel'); ?>" class="top-header-user-panel btn">
                                <span class="top-header-user-panel-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z"
                                            fill="#0E1935" />
                                    </svg>
                                </span>
                                <span class="top-header-user-panel-text">پنل کاربری</span>
                            </a>
                            <?php }?>
                            <?php if(!empty($_SESSION['admin_id'])) { ?>
                            <a class="top-header-cart btn" href="<?php $this->url("/Panel_admin");  ?>">انتقال به پنل
                            </a>
                            <?php } ?>
                            <a class="top-header-cart btn" data-bs-toggle="offcanvas" href="#offcanvasCart"
                                role="button" aria-controls="offcanvasCart">

                                <span class="top-header-cart-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.591 8.42484H12.6669C12.9816 8.42484 13.2289 8.16461 13.2289 7.8508C13.2289 7.52934 12.9816 7.27677 12.6669 7.27677H10.591C10.2762 7.27677 10.0289 7.52934 10.0289 7.8508C10.0289 8.16461 10.2762 8.42484 10.591 8.42484ZM15.1324 4.44562C15.5896 4.44562 15.8893 4.60635 16.1891 4.95843C16.4889 5.3105 16.5413 5.81565 16.4739 6.27412L15.7619 11.295C15.627 12.2602 14.8177 12.9712 13.8659 12.9712H5.68979C4.69307 12.9712 3.86871 12.1913 3.78627 11.181L3.09681 2.83755L1.96519 2.63855C1.66543 2.58498 1.45559 2.28648 1.50805 1.98032C1.56051 1.66728 1.85278 1.45987 2.16004 1.50655L3.9474 1.78133C4.2022 1.82801 4.38955 2.04156 4.41204 2.30179L4.55443 4.01624C4.57691 4.26193 4.77176 4.44562 5.01157 4.44562H15.1324ZM5.56973 14.1809C4.94023 14.1809 4.43062 14.7014 4.43062 15.3443C4.43062 15.9795 4.94023 16.5 5.56973 16.5C6.19175 16.5 6.70135 15.9795 6.70135 15.3443C6.70135 14.7014 6.19175 14.1809 5.56973 14.1809ZM14.0007 14.1809C13.3712 14.1809 12.8616 14.7014 12.8616 15.3443C12.8616 15.9795 13.3712 16.5 14.0007 16.5C14.6227 16.5 15.1323 15.9795 15.1323 15.3443C15.1323 14.7014 14.6227 14.1809 14.0007 14.1809Z"
                                            fill="#0E1935"></path>
                                    </svg>
                                </span>
                                <span class="top-header-cart-icon-text">سبد خرید</span>
                                <span class="top-header-cart-counter badge bg-white text-dark ms-1 font-16">
                                    <?php if(isset($_SESSION['cart'])) {echo $count = count($_SESSION['cart']);} else {echo"0";} ?>
                                </span>
                            </a>
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

                                    <li class="nav-item"><a href="" class="nav-link f-600 border-animate fromCenter"><i
                                                class="bi bi-menu-app"></i>دسته بندی ها </a>
                                        <ul class="level-one">
                                            <?php foreach($categories as $category) { ?>
                                            <li><a style="display: inline;"
                                                    href="<?php $this->url('/product/category/' . $category['category_id']) ?>"><?= $category['category_name'] ?></a>
                                                <img style="display: inline;  float: left; "
                                                    src="<?php echo $this->asset($category['img_url']) ?>" alt="error"
                                                    width="30">
                                            </li>

                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php $this->url('/product/index/cheap') ?>"
                                            class="nav-link border-animate f-600 fromCenter">
                                            <i class="bi bi-grid"></i>دیدن کل محصولات
                                        </a>
                                    </li>
                                    <li class="nav-item"><a href="<?php $this->url('/Home/abut_us') ?>"
                                            class="nav-link f-600 border-animate fromCenter">
                                            <i class="bi bi-chat"></i>
                                            ارتباط با ما
                                        </a>
                                    </li>
                                    <li class="nav-item"><a href="<?php $this->url('/Home/abut_us') ?>"
                                            class="nav-link f-600 border-animate fromCenter">
                                            <i class="bi bi-info-circle"></i>
                                            درباره ما
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center justify-content-end top-header-call d-xl-flex d-none">
                                <div class="top-header-call-title me-3">
                                    <h6 class="text-center h5">09399376644</h6>
                                    <p class="text-muted">پشتیبانی در وقت اداری </p>
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