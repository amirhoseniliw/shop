<?php  
// در ابتدا، کد تصادفی را تولید و ذخیره کنید  

$this->include('app.layouts.header');   
$this->include('app.layouts.sidbor', ['user' => $user]);   
$error = $this->flash('error');
$success = $this->flash('success');

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
    .profile-picture {  
        display: flex;  
        justify-content: center;  
        margin-bottom: 15px;  
    }  
    .profile-picture img {  
        width: 100px;  
        height: 100px;  
        border-radius: 50%;  
        object-fit: cover;  
    }  
    .form-group {  
        margin-bottom: 15px;  
    }  
    label {  
        display: block;  
        margin-bottom: 5px;  
    }  
    input[type="text"],  
    input[type="email"],  
    input[type="tel"],  
    input[type="file"] {  
        width: 100%;  
        padding: 10px;  
        border: 1px solid #ddd;  
        border-radius: 4px;  
        text-align: center;  
    }  
    .btnbtn {  
        background-color: #28a745;  
        color: white;  
        padding: 10px;  
        border: none;  
        border-radius: 5px;  
        cursor: pointer;  
        width: 100%;  
    }  
    .btnbtn:hover {  
        background-color: #218838;  
    }  
    .message {  
        padding: 10px;  
        border-radius: 5px;  
        margin-bottom: 15px;  
        text-align: center;  
        transition: opacity 0.5s ease;  
    }  
    .message_success {  
        background-color: #d4edda;  
        color: #155724;  
        border: 1px solid #c3e6cb;  
    }  
    .message_error {  
        background-color: #f8d7da;  
        color: #721c24;  
        border: 1px solid #f5c6cb;  
    }  
</style>  

<div class="container">  
    <h2>ویرایش پروفایل</h2>  
    
    <!-- نمایش پیام‌ها -->  
    <div id="message" class="message_error" style="display: none;">  
        <p id="message-text"><?= $error ?></p>  
    </div>  
    <div id="message" class="message_success" style="display: none;">  
        <p id="message-text"><?= $success , 'ddd' ?></p>  
    </div>  
    <div class="profile-picture">  
        <img src="<?php echo $user['img_prof'] != "" ? $this->asset($user['img_prof']) : $this->asset('/img_site/icon/user.jpg'); ?>" alt="img prof ">  
    </div>  

    <form action="<?php $this->url('/UserPanel/send_code') ?>" method="post" enctype="multipart/form-data">  
        <div class="form-group">  
            <label for="username">نام کاربری</label>  
            <input type="text" id="username" name="username" placeholder="نام کاربری را وارد کنید" value="<?= htmlspecialchars($user['username']) ?>">  
        </div>  

        <div class="form-group">  
            <label for="email">ایمیل</label>  
            <input type="email" id="email" name="email" placeholder="ایمیل را وارد کنید" value="<?= htmlspecialchars($user['email'] ?? '') ?>">  
        </div>  

        <div class="form-group">  
            <label for="phone">شماره تلفن</label>  
            <input type="tel" id="phone" name="phone" placeholder="شماره تلفن را وارد کنید" value="<?= htmlspecialchars($user['phone_number']) ?>">  
        </div>  

        <div class="form-group">  
            <label for="profile-picture">عکس کاربر</label>  
            <input type="file" id="profile-picture" name="profile_picture">  
        </div>  

        <button type="submit" class="btnbtn">ویرایش</button>  
    </form>  
</div>  

<script>  
    function showMessage(type, message) {  
        const messageDiv = document.getElementById('message');  
        const messageText = document.getElementById('message-text');  
        
        messageDiv.className = 'message ' + type;  
        messageText.innerText = message;  
        messageDiv.style.display = 'block';  

        setTimeout(() => {  
            messageDiv.style.opacity = '0'; // انیمیشن محو شدن  
            setTimeout(() => {  
                messageDiv.style.display = 'none'; // پنهان کردن بعد از انیمیشن  
                messageDiv.style.opacity = '1'; // تنظیم مجدد برای بار بعدی  
            }, 500);  
        }, 2000);  
    }  

    // مثال برای استف
</script>  

<?php $this->include('app.layouts.footer'); ?>