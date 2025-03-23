<?php 
$mass  = $this->flash('login_errors');
$captcha_number = rand(1000, 9999); // تولید یک عدد تصادفی بین 1000 و 9999  
$_SESSION['captcha'] = $captcha_number; // ذخیره عدد در SESSION 
 ?>
<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
    <title> ورود</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="" property="og:title">
    <meta content="" property="og:type">
    <meta content="" property="og:url">
    <meta content="" property="og:image">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
    <link href="<?php $this->asset('css/normalize.css')?>" rel="stylesheet">
    <link href="<?php $this->asset('font/bootstrap-icon/bootstrap-icons.min.css')?>" rel="stylesheet">
    <link href="<?php $this->asset('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php $this->asset('css/style.css" rel="stylesheet')?>">
    <link href="<?php $this->asset('css/responsive.css')?>" rel="stylesheet">
    <meta content="#f4f5f9" name="theme-color">
</head>
<style>
.code_captcha {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.input_code_captcha {
    width: 60%;
    height: 10%;
    border: none;
    border-bottom: 2px solid blue;
    outline: none;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    display: block;
    margin: auto;
}
.alert-custom {  
            position: fixed;  
            top: 20px;  
            right: 20px;  
            z-index: 9999;  
            display: none; /* در ابتدا مخفی است */  
            background-color: #f8d7da; /* پس‌زمینه خطا */  
            color: #721c24; /* رنگ متن */  
            padding: 10px 20px; /* پدینگ */  
            border-radius: 5px; /* گوشه‌های گرد */  
            border: 1px solid #f5c6cb; /* خط دور */  
        }  

</style>

<body style="background-color:#eef1f4;">
    <!-- start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="auth">
                <div class="auth-logo text-center my-4"><img src="<?php echo $this->asset('/img_site/icon/tahrirKhayam.png') ?>" width="180" alt=""></div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="content-box auth-front">
                            <div class="container-fluid">
                                <div class="auth-action text-center">
                                    <a href="<?php $this->url('/auth/login') ?>"
                                        class="btn btn-lg bg-white shadow-md fw-bold font-18">ورود به سایت</a>
                                    <a href="<?php $this->url('/auth/register') ?>"
                                        class="btn btn-lg font-18 ms-2">عضویت در سایت</a>
                                </div>

                                <div class="auth-form mt-100 py-4" style="margin-top: 30%;">
                                    <form action="<?php $this->url('/auth/Check_login') ?>" method="post">

                                        <div class="mb-4 form-avatar text-center">
                                            <img src="<?php echo $this->asset('/img_site/icon/avatar.png') ?>"
                                                width="100" alt="">
                                        </div>

                                        <div class="comment-item mb-3">
                                            <input type="text" class="form-control" id="floatingInputEmail"
                                                name="phone_number">
                                            <label for="floatingInputEmail" class="form-label label-float">  شماره تلفن 
                                                خود را وارد نمایید
                                            </label>
                                        </div>

                                        <div class="comment-item mt-4 position-relative">
                                            <input type="password" class="form-control" id="floatingInputPasswd"
                                                name="password">
                                            <label for="floatingInputPasswd" class="form-label label-float">رمز عبور خود
                                                را
                                                وارد
                                                کنید</label>
                                        </div>

                                        <?php if (!empty($mass)){ ?>
                                        <span class="alert-custom" id="error-message">
                                            <?php echo $mass; ?>
                                        </span>
                                        <?php }?>


                                        <label style="font-size: 20px;" for="captcha">برای ورود به سایت عدد را وارد کنید
                                        </label>
                                        <div class="code_captcha"><?=$captcha_number?></div>

                                        <input type="text" id="captcha" name="captcha" class="input_code_captcha"
                                            required>

                                        <!-- دکمه Refresh -->
                                        
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <a href="<?php $this->url('/Auth/otp_sms') ?>" style="float: right; margin: 10px; color: blue;">فراموشی
                                                        رمزعبور</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn main-color-one-bg w-100 py-3">
                                                ورود به سایت
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end content -->

    <br><br><br><br><br><br><br>


    <!-- start mobile menu fixed -->

    <div class="mobile-footer d-lg-none d-table justify-content-center shadow-box bg-white position-fixed bottom-0 p-2 w-100"
        style="z-index: 100;table-layout: fixed;">
        <ul class="d-table-row">
            <li class="d-table-cell pointer" onclick="topFunction()">
                <div class="mf-link nav-link text-center">
                    <span class="d-block mf-link-icon"><i class="bi bi-chevron-up font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">بالا</span>
                </div>
            </li>
            <li class="d-table-cell"><a href="" class="mf-link nav-link text-center">
                    <div class="mf-link-icon position-relative d-table mx-auto">
                        <i class="bi bi-heart font-20"></i>
                        <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                            style="right:-40%;bottom:-5px;">0</span>
                    </div>
                    <span class="mt-1 font-12 fw-bold mf-link-title">علاقه مندی ها</span>
                </a></li>
            <li class="d-table-cell"><a href="" class="mf-link nav-link text-center">
                    <span class="d-block mf-link-icon"><i class="bi bi-house font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">صفحه اصلی</span>
                </a></li>
            <li class="d-table-cell"><a href="" class="mf-link nav-link text-center">
                    <div class="position-relative mf-link-icon d-table mx-auto">
                        <span class="d-block mf-link-icon"><i class="bi bi-arrow-left-right font-20"></i></span>
                        <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                            style="right:-60%;bottom:-5px;">0</span>
                    </div>
                    <span class="mt-1 font-12 fw-bold mf-link-title">مقایسه</span>
                </a></li>
            <li class="d-table-cell"><a class="mf-link nav-link text-center" data-bs-toggle="offcanvas"
                    href="#offcanvasCart" role="button" aria-controls="offcanvasCart">
                    <div class="position-relative mf-link-icon d-table mx-auto">
                        <span class="d-block mf-link-icon"><i class="bi bi-bag font-20"></i></span>
                        <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                            style="right:-60%;bottom:-5px;">0</span>
                    </div>
                    <span class="mt-1 font-12 fw-bold mf-link-title">سبد خرید</span>
                </a></li>
        </ul>
    </div>

    <!-- /mobile menu fixed -->


    <script>
    // با بارگذاری صفحه، پیام نشان داده می‌شود  
    window.onload = function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'inline-block'; // پیام خطا را نشان می‌دهد  

            // پس از 5 ثانیه پیام را ناپدید می‌کند  
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 5000); // 5000 میلی ثانیه = 5 ثانیه  
        }
    };
    </script>

    <script src="<?php $this->asset('js/vendor/modernizr-3.11.2.min.js')?>"></script>
    <script src="<?php $this->asset('js/vendor/jquery-3.7.1.min.js')?>"></script>
    <script src="<?php $this->asset('js/vendor/bootstrap.bundle-5.3.2.min.js')?>"></script>
    <script src="<?php $this->asset('js/plugin/otp-sms/otp-input.js')?>"></script>
    <script src="<?php $this->asset('js/plugin/otp-loader/script.js')?>"></script>
    <script src="<?php $this->asset('js/plugins.js')?>"></script>
    <script src="<?php $this->asset('js/main.js')?>"></script>


</body>

</html>