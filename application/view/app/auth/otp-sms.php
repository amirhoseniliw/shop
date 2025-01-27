<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ورود به حساب</title>
  <style>
    /* استایل های عمومی */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    
    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
    }

    /* استایل فیلد ورودی */
    .input-field {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
    }

    /* استایل دکمه */
    .btn {
      width: 100%;
      padding: 14px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      box-sizing: border-box;
    }

    .btn:hover {
      background-color: #45a049;
    }

    /* استایل ریسپانسیو */
    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }
      h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2>وارد کردن شماره تلفن</h2>
  <form method="post" action="<?php $this->url('/auth/send_mss') ?>">
    <input type="tel" class="input-field" name="phone" placeholder="شماره تلفن خود را وارد کنید" required pattern="^[0-9]{11}$" maxlength="11">
    <button type="submit" class="btn">ارسال کد تایید</button>
  </form>
</div>

</body>
</html>
