<?php $mass = $this->flash('register_error'); ?>
<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
    <title>ثبت نام</title>
    <meta name="description" content="">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
    <link href="<?php echo $this->asset('css/normalize.css') ?>" rel="stylesheet">
    <link href="<?php echo $this->asset('font/bootstrap-icon/bootstrap-icons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo $this->asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo $this->asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo $this->asset('css/responsive.css') ?>" rel="stylesheet">

    <!-- شامل CSS Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <meta content="#f4f5f9" name="theme-color">
    <style>
    .alert-custom {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: none;
        /* در ابتدا مخفی است */
        background-color: #f8d7da;
        /* پس‌زمینه خطا */
        color: #721c24;
        /* رنگ متن */
        padding: 10px 20px;
        /* پدینگ */
        border-radius: 5px;
        /* گوشه‌های گرد */
        border: 1px solid #f5c6cb;
        /* خط دور */
    }
    .toast {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s, visibility 0.5s;
            z-index: 1000;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
        }

        .toast.error {
            background-color: #e74c3c;
        }

        .toast.success {
            background-color: #2ecc71;
        }

    </style>
</head>

<body style="background-color:#eef1f4;">

    <!-- start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="auth">
                <div class="auth-logo text-center my-4">
                    <img src="<?php echo $this->asset('/img_site/icon/tahrirKhayam.png') ?>" width="180" alt="">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="content-box auth-front auth-front-reg">
                            <div class="container-fluid">
                                <div class="auth-action text-center">
                                    <a href="<?php echo $this->url('/auth/login') ?>" class="btn btn-lg font-18">ورود به
                                        سایت</a>
                                    <a href="<?php echo $this->url('/auth/register') ?>"
                                        class="btn btn-lg bg-white shadow-md fw-bold font-18 ms-2">عضویت در سایت</a>
                                </div>

                                <div class="auth-form mt-80 py-4" style="margin-top: 30%;">
                                    <form id="passwordForm" action="<?php echo $this->url('/auth/register_Check') ?>"
                                        method="post">

                                        <div class="mb-4 form-avatar text-center">
                                            <img src="<?php echo $this->asset('/img_site/icon/avatar.png') ?>"
                                                width="100" alt="">
                                        </div>
                                        <?php if (!empty($mass)){ ?>
                                        <span class="alert-custom" id="error-message">
                                            <?php echo $mass; ?>
                                        </span>
                                        <?php } ?>
                                        <div class="comment-item mb-3">
                                            <input type="text" class="form-control" id="floatingInputEmail"
                                                name="username" required>
                                            <label for="floatingInputEmail" class="form-label label-float">نام کاربری
                                                خود را وارد کنید</label>
                                        </div>
                                        <div class="comment-item mb-3">
                                            <input type="text" class="form-control" id="floatingInputPhone"
                                                name="phone_number" required>
                                            <label for="floatingInputPhone" class="form-label label-float">تلفن خود را
                                                وارد کنید</label>
                                        </div>

                                        <div class="comment-item mt-4 position-relative">
                                            <input type="password" class="form-control" id="floatingInputPasswd"
                                                name="password" required>
                                            <label for="floatingInputPasswd" class="form-label label-float">رمز عبور خود
                                                را وارد کنید</label>
                                        </div>

                                        <div class="comment-item mt-4 position-relative">
                                            <input type="password" class="form-control" id="floatingInputPasswdRe"
                                                 required>
                                            <label for="floatingInputPasswdRe" class="form-label label-float">رمز عبور
                                                خود را تکرار کنید</label>
                                        </div>

                                        <div class="form-check my-4">
                                            <div class="d-flex">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked" required>
                                                <label class="form-check-label mt-1 font-14" for="flexCheckChecked">
                                                    <a href="" class="text-info font-14">شرایط و قوانین</a> استفاده از
                                                    سایت فروشگاه خیام را مطالعه نموده و با کلیه موارد آن موافقم.
                                                </label>
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
    <div class="toast" id="toast"></div>

    <script>
    document.getElementById("passwordForm").addEventListener("submit", function(event) {
        event.preventDefault();
        const newPassword = document.getElementById("floatingInputPasswd").value;
        const confirmPassword = document.getElementById("floatingInputPasswdRe").value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordRegex.test(newPassword)) {
            showToast("رمز عبور باید حداقل 8 کاراکتر باشد و شامل عدد، حرف بزرگ و کوچک باشد.", "error");
            return;
        }
        if (newPassword !== confirmPassword) {
            showToast("رمزها با هم مطابقت ندارند.", "error");
            return;
        }

        showToast("  در حال انجام  ...", "success");
        setTimeout(() => this.submit(), 1500);
    });

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
    function showToast(message, type = "error") {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.className = `toast ${type} show`;
            setTimeout(() => {
                toast.className = "toast";
            }, 3000);
        }
    </script>



</body>

</html>