<?php  
 $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
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
        margin-bottom: 15px;  
        padding: 15px;  
        border: 1px solid #dc3545;  
        color: #dc3545;  
        background-color: #f8d7da;  
        border-radius: 5px;  
        display: none; /* مخفی بودن به‌طور پیش‌فرض */  
        text-align: right;  
    }  
    .message.success {  
    background-color: #d4edda; /* پس‌زمینه سبز روشن */  
    border-color: #c3e6cb; /* رنگ مرز */  
    color: #155724; /* رنگ متن */  
}  
</style>  

<div class="container">  
    <h2>ویرایش پروفایل</h2>  

    <div id="message" class="message" style="display: <?= !empty($error) || !empty($success) ? 'block' : 'none'; ?>;">  
        <p id="message-text">  
            <?= !empty($error) ? htmlspecialchars($error) : htmlspecialchars($success) ?>  
        </p>  
    </div>  

    <div class="profile-picture">  
        <img src="<?php echo $user['img_prof'] != "" ? $this->asset($user['img_prof']) : $this->asset('/img_site/icon/user.jpg'); ?>" alt="img prof ">  
    </div>  

    <form id="profile-form" action="<?php $this->url('/UserPanel/send_code') ?>" method="post" enctype="multipart/form-data">  
        <div class="form-group">  
            <label for="username">نام کاربری</label>  
            <p><?= htmlspecialchars($user['username']) ?></p>  
            <input type="text" id="username" name="username" placeholder="نام کاربری جدید را وارد کنید" value="">  
        </div>  

        <div class="form-group">  
            <label for="email">ایمیل</label>   
            <p><?= $user['email'] ?? ' ایمیلی وارد نشده است !'?></p>  
            <input type="email" id="email" name="email" placeholder="ایمیل جدید را وارد کنید" value="">  
        </div>  

        <div class="form-group">  
            <label for="phone">شماره تلفن</label>  
            <p><?= htmlspecialchars($user['phone_number']) ?></p>  
            <input type="tel" id="phone" name="phone_number" placeholder="شماره تلفن جدید را وارد کنید" value="">  
        </div>  

        <div class="form-group">  
            <label for="profile-picture">عکس کاربر</label>  
            <input type="file" id="profile-picture" name="img_prof">  
        </div>        
        <button type="submit" class="btnbtn">ویرایش</button>  
    </form>  
</div>  

<script>  
document.getElementById('profile-form').addEventListener('submit', function(event) {  
    const originalUsername = "<?= htmlspecialchars($user['username']) ?>";  
    const originalEmail = "<?= htmlspecialchars($user['email']) ?>";  
    const originalPhone = "<?= htmlspecialchars($user['phone_number']) ?>";  

    const newUsername = document.getElementById('username').value.trim();  
    const newEmail = document.getElementById('email').value.trim();  
    const newPhone = document.getElementById('phone').value.trim();  
    const img = document.getElementById('profile-picture').value.trim();  

    let errorMessage = '';  
    if (newUsername === '' && newEmail === '' && newPhone === '' && img === '') {  
        errorMessage += "لطفاً حداقل یک فیلد را پر کنید.\n";  
    }   
    // بررسی ورودی‌ها  
    if (newUsername === originalUsername) {  
        errorMessage += "نام کاربری جدید نمی‌تواند برابر با نام کاربری فعلی باشد.\n";  
    }  
        
    if (newEmail !== '' && newEmail === originalEmail) {  
        errorMessage += "ایمیل جدید نمی‌تواند برابر با ایمیل فعلی باشد.\n";  
    }  
        
    if (newPhone === originalPhone) {  
        errorMessage += "شماره تلفن جدید نمی‌تواند برابر با شماره تلفن فعلی باشد.\n";  
    }  

    // اگر خطایی وجود داشت، ارسال فرم را متوقف کنید  
    if (errorMessage) {  
        event.preventDefault(); // جلوگیری از ارسال فرم  
        document.getElementById('message-text').innerText = errorMessage.trim(); // نمایش پیام خطا  
        document.getElementById('message').style.display = 'block'; // نمایش div پیام  
    } else {  
        document.getElementById('message').style.display = 'none'; // در صورت عدم وجود خطا، مخفی کردن پیام  
    }  
});  

// نمایش پیام‌ها در صورت وجود  
const messageDiv = document.getElementById('message');  

// اگر پیام خطا وجود دارد  
if (<?php echo json_encode(!empty($error)); ?>) {  
    messageDiv.style.display = 'block';  
    messageDiv.classList.remove('success'); // حذف کلاس موفقیت در صورت وجود  
    messageDiv.classList.add('error'); // افزودن کلاس خطا  
    document.getElementById('message-text').innerText = '<?= addslashes($error) ?>';  
}   
// اگر پیام موفقیت وجود دارد  
else if (<?php echo json_encode(!empty($success)); ?>) {  
    messageDiv.style.display = 'block';  
    messageDiv.classList.remove('error'); // حذف کلاس خطا در صورت وجود  
    messageDiv.classList.add('success'); // افزودن کلاس موفقیت  
    document.getElementById('message-text').innerText = '<?= addslashes($success) ?>';  
}  
</script>  

<?php $this->include('app.layouts.footer'); ?>