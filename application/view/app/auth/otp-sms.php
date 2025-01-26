<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>فراموشی رمز عبور</title>  
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">  
    <style>  
        body {  
            font-family: 'Vazirmatn', sans-serif;  
            background-color: #e0f7fa;  
            margin: 0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            padding: 20px;  
        }  
        .code{
            text-align: right;
        }
        .number{
            text-align: center;
        }
        .container {  
            background: white;  
            padding: 30px;  
            border-radius: 10px;  
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);  
            width: 100%;  
            max-width: 400px;  
            text-align: right;  
        }  
        h2 {  
            text-align: center;  
            color: #00796b;  
        }  
        label {  
            font-size: 14px;  
            margin-bottom: 5px;  
            display: block;  
        }  
        input[type="text"], input[type="submit"] {  
            width: 100%;  
            padding: 10px;  
            margin: 10px 0;  
            border: 1px solid #00796b;  
            border-radius: 5px;  
            font-size: 16px;  
        }  
        input[type="submit"] {  
            background-color: #00796b;  
            color: white;  
            cursor: pointer;  
            transition: background-color 0.3s;  
        }  
        input[type="submit"]:hover {  
            background-color: #004d40;  
        }  
        .hidden {  
            display: none;  
        }  
        #phone-display {  
            margin: 20px 0;  
            font-size: 18px;  
            color: #00796b;  
            text-align: center;  
        }  
        #timer {  
            font-size: 18px;  
            text-align: center;  
            color: red;  
        }  
        #edit-phone-btn {  
            margin-top: 10px;  
            padding: 10px;  
            width: 100%;  
            background-color: #ffca28;  
            color: #000;  
            border: none;  
            border-radius: 5px;  
            font-size: 16px;  
            cursor: pointer;  
            transition: background-color 0.3s;  
        }  
        #edit-phone-btn:hover {  
            background-color: #ffc107;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h2>دریافت کد تایید</h2>  
        <form id="forgot-password-form">  
            <label for="phone">شماره تلفن:</label>  
            <input type="text" id="phone" name="phone" class="number" placeholder="0912xxxxxxx" required>  
            <input type="submit" value="دریافت کد">  
        </form>  

        <div id="phone-display" class="hidden"></div>  
        <div id="verification-section" class="hidden">  
            <label for="code">کد تایید:</label>  
            <input type="text" id="code" class="code" name="code" placeholder="کد دریافتی را وارد کنید" required>  
            <input type="submit" value="تایید" id="verify-btn">  
        </div>  
        <div id="timer" class="hidden"></div>  
        <button id="edit-phone-btn" class="hidden">ویرایش شماره تلفن</button>  
    </div>  

    <script>  
        const form = document.getElementById('forgot-password-form');  
        const verificationSection = document.getElementById('verification-section');  
        const phoneDisplay = document.getElementById('phone-display');  
        const timerDisplay = document.getElementById('timer');  
        const verifyButton = document.getElementById('verify-btn');  
        const editButton = document.getElementById('edit-phone-btn');  

        let countdownInterval;  

        form.addEventListener('submit', (e) => {  
            e.preventDefault();  
            const phone = document.getElementById('phone').value;  

            // مخفی کردن ورودی شماره تلفن و دکمه  
            form.classList.add('hidden');  

            // نمایش شماره تلفن  
            phoneDisplay.textContent = `شماره تلفن شما: ${phone}`;  
            phoneDisplay.classList.remove('hidden');  

            // نمایش دکمه ویرایش  
            editButton.classList.remove('hidden');  

            verificationSection.classList.remove('hidden'); // نمایش بخش ورود کد تایید  
            
            // شروع شمارش معکوس دو دقیقه‌ای  
            startTimer(120); // 120 ثانیه  
        });  

        const startTimer = (duration) => {  
            let timer = duration, minutes, seconds;  
            countdownInterval = setInterval(() => {  
                minutes = parseInt(timer / 60, 10);  
                seconds = parseInt(timer % 60, 10);  
    
                // فرمت زمان به صورت دو رقمی  
                seconds = seconds < 10 ? "0" + seconds : seconds;  
    
                timerDisplay.textContent = `زمان باقی‌مانده: ${minutes}:${seconds}`;  
                timerDisplay.classList.remove('hidden');  
    
                if (--timer < 0) {  
                    clearInterval(countdownInterval);  
                    timerDisplay.textContent = "زمان شما به پایان رسید!";  
                    verifyButton.disabled = true; // غیرفعال کردن دکمه تایید  
                }  
            }, 1000);  
        };  

        verifyButton.addEventListener('click', (e) => {  
            e.preventDefault();  
            // منطق تایید کد برای بررسی صحت کد وارد شده  
            alert("کد تایید بررسی شد!"); // نمایش پیغام تأیید (شبیه‌سازی)  
        });  

        editButton.addEventListener('click', () => {  
            // نمایش فرم و پنهان کردن نمایش شماره تلفن و دکمه ویرایش  
            form.classList.remove('hidden');  
            phoneDisplay.classList.add('hidden');  
            editButton.classList.add('hidden');  
            verificationSection.classList.add('hidden'); // پنهان کردن بخش کد تایید  
            timerDisplay.classList.add('hidden'); // پنهان کردن تایمر  

            // متوقف کردن تایمر  
            clearInterval(countdownInterval);  
        });  
    </script>  
</body>  
</html>