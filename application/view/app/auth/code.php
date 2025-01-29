
<!DOCTYPE html>  
<html lang="fa">  
<head>  
  <meta charset="UTF-8">  
  <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>تایید حساب</title>  
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
  </style>  
</head>  
<body>  

<div class="container">  
  <h2>وارد کردن کد تایید</h2>  
  <form id="verification-form" method="post" action="<?php $this->url('/auth/password/' . $mobail) ?>">  
    <input type="text" id="verification-code" class="input-field" placeholder="کد تایید را وارد کنید" required>  
    <input type="hidden" id="php-code" value="<?php echo $verification_code; ?>">  
    <button type="submit" class="btn">تایید</button>  
  </form>  
  <div id="timer" style="text-align: center; margin-top: 10px;">زمان باقی‌مانده: <span id="time">120</span> ثانیه</div>  
  <button id="resend-btn"> ویرایش شماره و ارسال دوباره کد </button>  
</div>  

<script>  
  let timeLeft = 120; // زمان اولیه برای تایمر (60 ثانیه)  
  const timerElement = document.getElementById('time');  
  const resendButton = document.getElementById('resend-btn');  
  const form = document.getElementById('verification-form');  
  const phpCode = document.getElementById('php-code').value;  
  const inputCode = document.getElementById('verification-code');  

  // تابع برای شروع تایمر  
  const startTimer = () => {  
    const timerId = setInterval(() => {  
      timeLeft--;  
      timerElement.textContent = timeLeft;  

      if (timeLeft <= 0) {  
        clearInterval(timerId);  
        resendButton.style.display = 'block'; // نمایش دکمه ارسال مجدد  
        document.getElementById('timer').style.display = 'none'; // مخفی کردن تایمر  
      }  
    }, 1000);  
  };  

  // شروع تایمر  
  startTimer();  

  // بررسی کد تایید قبل از ارسال فرم  
  form.addEventListener('submit', (e) => {  
    if (inputCode.value !== phpCode) {  
      e.preventDefault(); // جلوگیری از ارسال فرم  
      alert('کد وارد شده اشتباه است. لطفاً دوباره امتحان کنید.');  
    } else {  
      // اگر کد صحیح است، یک درخواست ایجکس برای تنظیم سشن ارسال کنید  
      e.preventDefault();  
      fetch('<?php $this->url('/auth/set_session') ?>', {  
        method: 'POST',  
        headers: { 'Content-Type': 'application/json' },  
        body: JSON.stringify({ status: true })  
      })  
      .then(response => {  
        if (response.ok) {  
          form.submit();  
        } else {  
          alert('مشکلی پیش آمده است. لطفاً دوباره تلاش کنید.');  
        }  
      });  
    }  
  });  

  // نمایش دکمه ارسال مجدد وقتی کاربر روی آن کلیک کند  
  resendButton.addEventListener('click', () => {  
    window.location.href = '<?php $this->url('/auth/send_mss') ?>';  
  });  
</script>  

</body>  
</html>