<?php $mass = $this->flash('verification_error'); ?>  
<!doctype html>  
<html class="no-js" dir="rtl" lang="Fa_IR">  

<head>  
    <meta charset="utf-8">  
    <title>تأیید شماره تلفن</title>  
    <meta name="description" content="">  
    <meta content="width=device-width, initial-scale=1" name="viewport">  

    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">  
    <link href="<?php echo $this->asset('css/normalize.css') ?>" rel="stylesheet">  
    <link href="<?php echo $this->asset('font/bootstrap-icon/bootstrap-icons.min.css') ?>" rel="stylesheet">  
    <link href="<?php echo $this->asset('css/bootstrap.min.css') ?>" rel="stylesheet">  
    <link href="<?php echo $this->asset('css/style.css') ?>" rel="stylesheet">  
    <link href="<?php echo $this->asset('css/responsive.css') ?>" rel="stylesheet">  

    <meta content="#f4f5f9" name="theme-color">  
    <style>  
        .alert-custom {  
            position: fixed;  
            top: -30px;  
            right: 20px;  
            z-index: 9999;  
            display: none;  
            background-color: #f8d7da;  
            color: #721c24;  
            padding: 10px 20px;  
            border-radius: 5px;  
            border: 1px solid #f5c6cb;  
        }  

        body {  
            background-color: #eef1f4;  
        }  

        .toast {  
            position: fixed;  
            top: 10%;  
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

        #timer {  
            display: none; /* مخفی تا زمانی که دکمه ارسال مجدد کلیک شود */  
            text-align: center;  
            margin-top: 10px;  
        }  
    </style>  
</head>  

<body>  

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

                                <div class="auth-form mt-80 py-4" style="margin: 0;">  
                                    <form id="verificationForm" action="<?php echo $this->url('/auth/register_Check') ?>"  
                                        method="post">  

                                        <?php if (!empty($mass)){ ?>  
                                        <span class="alert-custom" id="error-message">  
                                            <?php echo $mass; ?>  
                                        </span>  
                                        <?php } ?>  

                                        <div class="comment-item mb-3">  
                                        <input type="text" class="form-control" id="verificationCode"  
                                                name="verification_code" required>  
                                            <label for="verificationCode" class="form-label label-float">کد تأیید را  
                                                وارد کنید</label>  
                                        </div>  

                                        <div class="form-group mb-0">  
                                            <button type="submit" class="btn main-color-one-bg w-100 py-3">تأیید کد  
                                            </button>  
                                        </div>  
                                    </form>  
                                    <div class="form-group mt-3 text-center">  
                                        <button class="btn btn-link" id="resend-button">ارسال دوباره کد</button>  
                                        <div id="timer">زمان باقی‌مانده: <span id="time">120</span> ثانیه</div>  
                                    </div>  
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
        document.getElementById("verificationForm").addEventListener("submit", function(event) {  
            event.preventDefault();  
            const verificationCode = document.getElementById("verificationCode").value;  

            // بررسی اینکه کد تأیید وارد شده صحیح است یا نه  
            if (verificationCode.length === 0) {  
                showToast("لطفاً کد تأیید را وارد کنید.", "error");  
                return;  
            }  

            showToast("در حال ارسال ...", "success");  
            setTimeout(() => this.submit(), 1500); // ارسال فرم بعد از 1.5 ثانیه  
        });  

        document.getElementById("resend-button").addEventListener("click", function() {  
            showToast("کد تأیید دوباره ارسال شد.", "success");  
            startTimer(); // شروع تایمر  
            // در اینجا می‌توانید کد مربوط به ارسال دوباره کد را اجرا کنید  
        });  

        function startTimer() {  
            let timeLeft = 120; // 120 ثانیه  
            const timerElement = document.getElementById('time');  
            const timerDisplay = document.getElementById('timer');  
            timerDisplay.style.display = 'block'; // نمایش تایمر   

            const timerId = setInterval(() => {  
                timeLeft--;  
                timerElement.textContent = timeLeft;  

                if (timeLeft <= 0) {  
                    clearInterval(timerId);  
                    timerDisplay.style.display = 'none'; // مخفی کردن تایمر  
                    showToast("می‌توانید دوباره کد را ارسال کنید.", "success");  
                }  
            }, 1000);  
        }  

        // با بارگذاری صفحه، پیام نشان داده می‌شود  
        window.onload = function() {  
            var errorMessage = document.getElementById('error-message');  
            if (errorMessage) {  
                errorMessage.style.display = 'inline-block'; // نمایش پیام خطا   

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