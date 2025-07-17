<!DOCTYPE html>  
<html lang="fa">  

<head>  
    <meta charset="UTF-8">  
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png'); ?>">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>تایید حساب</title>  

    <!-- SweetAlert CSS & JS -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>  

    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f9;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            margin: 0;  
        }  

        .container {  
            background-color: #fff;  
            border-radius: 8px;  
            padding: 20px;  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  
            width: 100%;  
            max-width: 400px;  
        }  

        h2 {  
            text-align: center;  
            margin-bottom: 20px;  
        }  

        .input-field {  
            width: 100%;  
            padding: 10px;  
            margin: 10px 0;  
            border-radius: 4px;  
            border: 1px solid #ddd;  
            font-size: 16px;  
        }  

        .btn {  
            width: 100%;  
            padding: 12px;  
            background-color: #4CAF50;  
            color: white;  
            border: none;  
            border-radius: 4px;  
            font-size: 16px;  
            cursor: pointer;  
        }  

        .btn:hover {  
            background-color: #45a049;  
        }  

        #resend-btn {  
            display: none;  
            margin-top: 10px;  
            padding: 12px;  
            background-color: #2196F3;  
            color: white;  
            border: none;  
            border-radius: 4px;  
            font-size: 16px;  
            cursor: pointer;  
        }  

        #timer {  
            text-align: center;  
            margin-top: 10px;  
        }  
    </style>  
</head>  

<body>  

    <div class="container">  
        <h2>وارد کردن کد تایید</h2>  
        <form id="verification-form" method="post" action="<?php echo $this->url('/auth/password/' . $mobile); ?>">  
            <input type="text" id="verification-code" class="input-field" placeholder="کد تایید را وارد کنید" required>  
            <input type="hidden" id="php-code" value="<?php echo $verification_code; ?>">  
            <button type="submit" class="btn">تایید</button>  
        </form>  
        <div id="timer">زمان باقی‌مانده: <span id="time">120</span> ثانیه</div>  
        <button id="resend-btn">ویرایش شماره و ارسال دوباره کد</button>  
    </div>  

    <script>  
        // متغیرها  
        let timeLeft = 120; // زمان تایمر (ثانیه)  
        const timerElement = document.getElementById('time');  
        const form = document.getElementById('verification-form');  
        const phpCode = document.getElementById('php-code').value;  
        const inputCode = document.getElementById('verification-code');  
        const resendButton = document.getElementById('resend-btn');  

        // تابع برای شروع تایمر  
        const startTimer = () => {  
            const timerId = setInterval(() => {  
                timeLeft--;  
                timerElement.textContent = timeLeft;  

                if (timeLeft <= 0) {  
                    clearInterval(timerId);  
                    // اگر زمان تمام شود، دکمه ارسال مجدد را نمایش می‌دهیم  
                    resendButton.style.display = 'block';  
                    document.getElementById('timer').style.display = 'none'; // مخفی کردن تایمر  
                }  
            }, 1000);  
        };  

        // شروع تایمر  
        startTimer();  

        // ارسال فرم  
        form.addEventListener('submit', (e) => {  
          e.preventDefault(); // جلوگیری از ارسال فرم برای بررسی کد  

if (inputCode.value !== phpCode) {  
    // نمایش پیام خطا اگر کد صحیح نیست  
    swal("خطا!", "کد وارد شده اشتباه است. لطفاً دوباره امتحان کنید.", "error");  
} else {  
    // اگر کد صحیح است، درخواست POST برای تنظیم سشن ارسال کنید  
    fetch('<?php echo $this->url('/auth/set_session'); ?>', {  
        method: 'POST',  
        headers: {  
            'Content-Type': 'application/json'  
        },  
        body: JSON.stringify({ status: true }) // ارسال وضعیت صحیح  
    }).finally(() => {  
        // بعد از هر شرایطی (موفق یا ناموفق) فرم را ارسال کنید  
        form.submit(); // ارسال فرم  
    });  
}  
});  
</script>  

</body>  

</html>  