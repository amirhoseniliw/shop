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
<body style="background-color:#eef1f4;">
<!-- start content -->
<div class="content">
    <div class="container-fluid">
        <div class="auth">
            <div class="auth-logo text-center my-4"><img src="assets/img/logo.png" width="180" alt=""></div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="content-box auth-front">
                        <div class="container-fluid">
                            <div class="auth-action text-center">
                                <a href="<?php $this->url('/auth/login') ?>" class="btn btn-lg bg-white shadow-md fw-bold font-18">ورود به سایت</a>
                                <a href="<?php $this->url('/auth/register') ?>" class="btn btn-lg font-18 ms-2">عضویت در سایت</a>
                            </div>

                            <div class="auth-form mt-80 py-4">
                                <form action="">
                                    
                                    <div class="mb-4 form-avatar text-center">
                                        <img src="assets/img/user-avatar.svg" width="100" alt="">
                                    </div>

                                    <div class="comment-item mb-3">
                                        <input type="text" class="form-control" id="floatingInputEmail">
                                        <label for="floatingInputEmail" class="form-label label-float">  نام کاربری خود را وارد نمایید   
                                            </label>
                                    </div>

                                    <div class="comment-item mt-4 position-relative">
                                        <input type="password" class="form-control" id="floatingInputPasswd">
                                        <label for="floatingInputPasswd" class="form-label label-float">رمز عبور خود را
                                            وارد
                                            کنید</label>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="form-check my-4">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                    <label class="form-check-label mt-1" for="flexCheckChecked">
                                                        مرا به خاطر بسپار
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <a href="<?php $this->url('/Auth/otp_sms') ?>">فراموشی رمزعبور</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn main-color-one-bg w-100 py-3">
                                            ثبت نام در سایت
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

<div class="mobile-footer d-lg-none d-table justify-content-center shadow-box bg-white position-fixed bottom-0 p-2 w-100" style="z-index: 100;table-layout: fixed;">
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
                <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge" style="right:-40%;bottom:-5px;">0</span>
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
                <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge" style="right:-60%;bottom:-5px;">0</span>
            </div>
            <span class="mt-1 font-12 fw-bold mf-link-title">مقایسه</span>
        </a></li>
        <li class="d-table-cell"><a class="mf-link nav-link text-center" data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart">
            <div class="position-relative mf-link-icon d-table mx-auto">
                <span class="d-block mf-link-icon"><i class="bi bi-bag font-20"></i></span>
                <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge" style="right:-60%;bottom:-5px;">0</span>
            </div>
            <span class="mt-1 font-12 fw-bold mf-link-title">سبد خرید</span>
        </a></li>
    </ul>
</div>

<!-- /mobile menu fixed -->



<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle-5.3.2.min.js"></script>
<script src="assets/js/plugin/otp-sms/otp-input.js"></script>
<script src="assets/js/plugin/otp-loader/script.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>
