<?php $this->include('app.layouts.header'); ?>

    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            padding: 20px;  
            text-align: right; /* راست‌چین کردن محتوا */  
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
            border-radius: 50%; /* دایره‌ای کردن عکس پروفایل */  
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
        .verification-box {  
            display: none;  
            margin-top: 15px;  
            border: 1px solid #ddd;  
            padding: 15px;  
            background-color: #f9f9f9;  
            border-radius: 4px;  
        }  
    </style>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">  

<div class="content">
    <div class="container-fluid">

        <div class="custom-filter d-lg-none d-block">
            <button class="btnbtn btnbtn-filter-float border-0 main-color-one-bg shadow-box px-4 rounded-3 position-fixed" style="z-index: 999;bottom:80px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="bi bi-list font-20 fw-bold text-white"></i>
                <span class="d-block font-14 text-white">منو</span>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">منو</h5>
                    <button type="button" class="btnbtn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="position-sticky top-0">
                        <div class="penel-nav-seller">
                            <div class="profile-box mb-3 d-flex flex-column justify-content-center align-items-center">
                                <div class="profile-box-image">
                                    <img src="assets/img/user-avatar.svg" alt="">
                                </div>
                                <div class="profile-box-desc mt-2">
                                    <h6 class="text-center"><?= $user['username'] ?></h6>
                                    <p class=""><?= $user['phone_number'] ?></p>
                                </div>
                            </div>
                            <div class="panel-nav-nav">
                                <ul class="rm-item-menu navbar-nav">
                                    <li class="nav-item active"><a href="<?php $this->url('/Userpanel') ?>" class="nav-link"><i class="bi bi-house box-icon"></i><span>پروفایل <small class="badge rounded-pill bg-warning text-dark">5</small></span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php $this->url('/Userpanel/edit_profil') ?>" class="nav-link"><i class="bi bi-menu-app box-icon"></i><span>ویرایش اطلاعات</span></a>
                                      
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-cart-check box-icon"></i>سفارش های من </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-pin-map box-icon"></i>آدرس های من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-bell box-icon"></i>پیام ها و اطلاعیه ها</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-chat-dots box-icon"></i>نظرات من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-question-circle box-icon"></i>درخواست پشتیبانی</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-heart box-icon"></i>محصولات مورد علاقه</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-gift box-icon"></i>کد های تخفیف من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-arrow-right-square box-icon"></i>خروج از حساب کاربری</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="position-sticky top-0">
                    <div class="penel-nav-seller">
                        <div class="profile-box mb-3 d-flex flex-column justify-content-center align-items-center">
                            <div class="profile-box-image">
                                <img src="assets/img/user-avatar.svg" alt="">
                            </div>
                            <div class="profile-box-desc mt-2">
                                <h6 class="text-center"><?= $user['username'] ?></h6>
                                <p class=""><?= $user['phone_number'] ?></p>
                            </div>
                        </div>
                        <div class="panel-nav-nav">
                            <ul class="rm-item-menu navbar-nav">
                                <li class="nav-item active"><a href="<?php $this->url('/Userpanel') ?>" class="nav-link"><i class="bi bi-house box-icon"></i><span>پروفایل <small class="badge rounded-pill bg-warning text-dark">5</small></span> </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php $this->url('/Userpanel/edit_profil') ?>" class="nav-link"><i class="bi bi-pencil box-icon"></i><span>ویرایش اطلاعات </span></a>
                                   
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-cart-check box-icon"></i>سفارش های من </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-pin-map box-icon"></i>آدرس های من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-bell box-icon"></i>پیام ها و اطلاعیه ها</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-chat-dots box-icon"></i>نظرات من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-question-circle box-icon"></i>درخواست پشتیبانی</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-heart box-icon"></i>محصولات مورد علاقه</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-gift box-icon"></i>کد های تخفیف من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-arrow-right-square box-icon"></i>خروج از حساب کاربری</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
<div class="container">  
    <h2>ویرایش پروفایل</h2>  
    <div class="profile-picture">  
        <img src="<?php echo $this->asset($user['img_prof']) ?>" alt="img prof ">  
    </div>  
    <div class="form-group">  
        <label for="username">نام کاربری</label>  
        <input type="text" id="username" placeholder=" نام کاربری  را وارد کنید" value="<?= $user['username'] ?>">  
    </div>  
    <div class="form-group">  
        <label for="email">ایمیل</label>  
        <input type="email" id="email" placeholder="ایمیل را وارد کنید" value="<?php echo $user['email'] != "" ? $user['email'] : '! ایمیلی وارد نشده است '; ?>">  
    </div>  
    <div class="form-group">  
        <label for="phone">شماره تلفن</label>  
        <input type="tel" id="phone" placeholder="شماره تلفن را وارد کنید" value="<?= $user['phone_number'] ?>">  
    </div>  
    <div class="form-group">  
        <label for="profile-picture">عکس کاربر</label>  
        <input type="file" id="profile-picture">  
    </div>  
    <button class="btnbtn" id="edit-button">ویرایش</button>  

    <div class="verification-box" id="verification-box">  
        <label for="verification-code">کد تایید</label>  
        <input type="text" id="verification-code" placeholder="کد تایید را وارد کنید">  
    </div>  
    <button class="btnbtn" id="confirm-button" style="display:none;">تایید</button>  
</div>  

<script>  
    document.getElementById('edit-button').addEventListener('click', function() {  
        document.getElementById('verification-box').style.display = 'block';  
        document.getElementById('confirm-button').style.display = 'block';  
        // اینجا می‌توانید کد ارسال کد تایید را اضافه کنید  
    });  

    document.getElementById('confirm-button').addEventListener('click', function() {  
        const code = document.getElementById('verification-code').value;  
        // اینجا می‌توانید اعتبارسنجی کد تایید را انجام دهید  
        if (code === '1234') { // این فقط یک مثال است  
            alert('پروفایل با موفقیت ویرایش شد!');  
        } else {  
            alert('کد تایید نادرست است.');  
        }  
    });  
</script>  
<?php $this->include('app.layouts.footer'); ?>
