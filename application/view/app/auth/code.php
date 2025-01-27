<!DOCTYPE html>  
<html lang="fa">  
<head>  
  <meta charset="UTF-8">  
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
      display: none; /* مخفی کردن دکمه ارسال مجدد در ابتدا */  
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
  <form id="verification-form">  
    <input type="text" class="input-field" placeholder="کد تایید را وارد کنید" required>  
    <button type="submit" class="btn">تایید</button>  
  </form>  
  <div id="timer" style="text-align: center; margin-top: 10px;">زمان باقی‌مانده: <span id="time">120</span> ثانیه</div>  
  <button id="resend-btn">ارسال مجدد کد</button>  
</div>  

<script>  
  let timeLeft = 120; // زمان اولیه برای تایمر (60 ثانیه)  
  const timerElement = document.getElementById('time');  
  const resendButton = document.getElementById('resend-btn');  

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

  // نمایش دکمه ارسال مجدد وقتی کاربر روی آن کلیک کند  
  resendButton.addEventListener('click', () => {  
    alert("کد جدید ارسال شد!"); // اینجا می‌توانید منطق ارسال مجدد کد را اضافه کنید  
    timeLeft = 120; // ریست کردن زمان  
    timerElement.textContent = timeLeft;  
    resendButton.style.display = 'none'; // مخفی کردن دکمه ارسال مجدد  
    document.getElementById('timer').style.display = 'block'; // نمایش تایمر دوباره  
    startTimer(); // شروع تایمر دوباره  
  });  
</script>  

</body>  
</html>