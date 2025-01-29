<?php $mass  = ($this->flash('not_find_user'));
 ?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

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
    .btn_back{
      margin-top: 10px;
      width: 40%;
      padding: 14px;
      background-color:rgb(32, 12, 217);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      box-sizing: border-box;
    }
    .btn_back:hover{
      background-color:rgb(137, 127, 220);

    }
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
    .span{
      color:  red;
      font-size: 15px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
float: right;   
margin-bottom: 10px; }
  </style>
</head>
<body>

<div class="container">
  <h2>وارد کردن شماره تلفن</h2>
  <form method="post" action="<?php $this->url('/auth/send_mss') ?>">
    <input type="tel" class="input-field" name="phone" placeholder="شماره تلفن خود را وارد کنید" required pattern="^[0-9]{11}$" maxlength="11">
   <?php if($mass != ''){ ?> <span class="span"><?= $mass ?></span><?php }?>
    <button type="submit" class="btn">ارسال کد تایید</button>
  <a href="<?php $this->url('/auth/login') ?>">  <button type="button" class="btn_back">بازگشت</button></a>

  </form>
</div>

</body>
</html>
