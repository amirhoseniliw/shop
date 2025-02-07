<?php  
$this->include('app.layouts.header');   
$this->include('app.layouts.sidbor', ['user' => $user]);   
$error = $this->flash('error');  
$error_suc = $this->flash('error_suc');  
?>  

<style>  
    body {  
        font-family: Arial, sans-serif;  
        background-color: #f4f4f4;  
        padding: 20px;  
        text-align: right;  
    }  
    .container {  
        background: white;  
        padding: 20px;  
        border-radius: 5px;  
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        max-width: 400px;  
        margin: auto;  
    }  
    h2 {  
        text-align: center;  
    }  
    .form-group {  
        margin-bottom: 15px;  
    }  
    label {  
        display: block;  
        margin-bottom: 5px;  
    }  
    input[type="text"] {  
        width: 100%;  
        padding: 10px;  
        border: 1px solid #ddd;  
        border-radius: 4px;  
        text-align: center;  
    }  
    .btnbtn {  
        background-color: #007bff;  
        color: white;  
        padding: 10px;  
        border: none;  
        border-radius: 5px;  
        cursor: pointer;  
        width: 100%;  
    }  
    .btnbtn:hover {  
        background-color: #0056b3;  
    }  
    .message-box {  
    text-align: center;  
    margin-bottom: 15px;  
    padding: 10px;  
    border-radius: 5px;  
    background-color: #ffcccc;  
    color: red;  
    border: 1px solid red;  
}  
.message-box2 {  
    text-align: center;  
    margin-bottom: 15px;  
    padding: 10px;  
    border-radius: 5px;  
    background-color:rgb(76, 226, 30);  
    color: blue;  
    border: 1px solid greenyellow;  
}  
</style>  

<div class="container">  
    <h2>تأیید ویرایش اطلاعات</h2>  
    <p>لطفاً کد تأییدی که برای شما ارسال شده را وارد کنید:</p>  
    <?php if(!empty( $error)){ ?>
    <div class="message-box" id="error-message"><?= $error ?></div>  
    <?php }?>
    <?php if(!empty( $error_suc)){ ?>
    <div class="message-box2" id="error-message"><?= $error_suc ?></div>  
    <?php }?>
    <form action="<?php $this->url('/Userpanel/verify_code') ?>" method="post">  
        <div class="form-group">  
            <label for="verification-code">کد تأیید</label>  
            <input type="text" id="verification-code" name="verification_code" placeholder="کد را وارد کنید" required>  
        </div>  
        <button type="submit" class="btnbtn">ارسال</button>  
        <button onclick="location.reload();" class="btnbtn" style="margin-top: 15px;">ارسال مجدد کد تأیید</button>  

    </form>  
</div>  



<?php $this->include('app.layouts.footer'); ?>
