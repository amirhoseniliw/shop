<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="فروشگاه شما">
    <title>پنل مدیریت - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            transition: background-color 0.2s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #495057;
        }
        .main-content {
            margin-right: 250px;
            padding: 20px;
        }
        .navbar {
            margin-right: 250px;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .gallery {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .color-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 120px;
        }
        .color-box {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .color-container .color-id {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-wrapper {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
        }
        input[type="text"], input[type="number"], button {
            padding: 12px;
            margin: 8px;
            border: none;
            border-radius: 8px;
            width: calc(100% - 16px);
        }
        button {
            background: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .color_input{
            width: 80%;
           
        }
        select {  
            width: 100%;
            padding: 10px; /* فاصله داخلی */  
            border: 2px solid #007bff; /* حاشیه */  
            border-radius: 5px; /* گرد کردن گوشه‌ها */  
            background-color: #f8f9fa; /* رنگ پس‌زمینه */  
            font-size: 16px; /* اندازه فونت */  
            color: #333; /* رنگ متن */  
            cursor: pointer; /* نشان دادن اشاره‌گر به عنوان کلیک‌پذیر */  
        }  

        select:focus {  
            border-color: #0056b3; /* تغییر رنگ حاشیه هنگام تمرکز */  
            outline: none; /* حذف outline پیش‌فرض */  
        }  

        option {  
            padding: 10px; /* فاصله داخلی گزینه‌ها */  
        } 
        select {
        padding: 10px;
        /* حاشیه داخلی */
        width: 250px;
        /* عرض دلخواه */
        border: 1px solid #ccc;
        /* حاشیه */
        border-radius: 4px;
        /* گوشه‌های گرد */
        font-size: 16px;
        /* اندازه فونت */
        text-align: right;
        /* تراز متن به سمت راست */
        background-color: #fff;
        /* رنگ پس‌زمینه */
        appearance: none;
        /* غیرفعال کردن ظاهر پیش‌فرض مرورگر */
        cursor: pointer;
        /* نشانگر ماوس */
    }

    /* ایجاد یک پیکان برای dropdown */
    .select-wrapper {
        position: relative;
        display: inline-block;
    }
    .select-wrapper:after {
        content: '▼';
        /* پیکان رو به پایین */
        position: absolute;
        right: 10px;
        /* فاصله از سمت راست */
        top: 50%;
        /* مرکز کردن عمودی */
        transform: translateY(-50%);
        /* جابجایی به مرکز عمودی */
        pointer-events: none;
        /* غیرفعال کردن رویدادهای ماوس برای پیکان */
    }
    .delete-btn {
        position: absolute;
        top: 2px;
        right: 5px;
        background: red;
        /* رنگ پس‌زمینه */
        color: white;
        /* رنگ متن */
        border: none;
        /* بدون حاشیه */
        border-radius: 50%;
        /* دکمه گرد */
        width: 25px;
        /* عرض دکمه */
        height: 25px;
        /* ارتفاع دکمه */
        cursor: pointer;
        /* نشانگر ماوس */
        display: flex;
        /* فعال کردن Flexbox */
        align-items: center;
        /* مرکز کردن عمودی */
        justify-content: center;
        /* مرکز کردن افقی */
        font-size: 12px;
        /* اندازه فونت */
    }

    .delete-btn i {
        font-size: 14px;
        /* اندازه آیکون */
    }

    </style>
</head>
<body>

<div class="sidebar">
    <div class="text-center py-4">
        <h4>فروشگاه شما</h4>
    </div>
    <a href="<?php $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
    <a href="<?php $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام ها </a>

    <a href="<?php $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

<div class="main-content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="m-0">پنل مدیریت</h5>
            <div class="ms-auto">
                <button class="btn btn-primary"><i class="fas fa-user-circle"></i> مدیر</button>
            </div>
        </div>
    </nav>




       
    </style> 
    <p>نام محصول </p>
        <h2><?= $post['name']  ?></h2>
        <br>
    
    
    
    <h2>مدیریت رنگ‌های محصول</h2>

    <div class="gallery">
        <?php foreach($colors as $color) { ?>

        <div class="color-container">
            <div class="color-box" style="background: <?php if($color['Front'] !== 'true'){ echo ($color['hex_value']); }
            else {echo('linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);');} ?>;"></div>
            <span class="color-id">کد: <?= $color['color_id'] ?></span>
            <span class="color-id">نام: <?= $color['titel_name'] ?></span>
            <span>تعداد: <?= $color['stock'] ?></span>
            <a href="<?php $this->url('/Products_panel_admin/delete_color/' .  $color['color_id']) ?>" title="حذف عکس "><button
                        class="delete-btn"><i class="fas fa-times"></i></button></a>
        </div>
        <?php } ?>
        <!-- رنگ‌های بیشتر -->
    </div>
    
    <div class="form-wrapper">
        <div class="form-container">
            <h3>آپدیت تعداد رنگ</h3>
            <form   method="post" action="<?php $this->url('/Products_panel_admin/update_color/' . $post['product_id']) ?>">
                <input type="text" name="color_id" placeholder="کد رنگ را وارد کنید">
                <input type="number" name="stock" placeholder="تعداد جدید را وارد کنید">
                <button type="submit">آپدیت</button>
            </form>
        </div>
        
        <div class="form-container">
            <h3>افزودن رنگ جدید</h3>
            <form method="post" action="<?php $this->url('/Products_panel_admin/color_stor/' . $post['product_id']) ?>">
                <input type="text" name="color_name" placeholder="نام رنگ را  انگلیسی وارد کنید">
                <input type="text" name="titel_name" placeholder="نام رنگ را فارسی وارد کنید">
                <label for="color">کد رنگی را انتخاب کنید </label>
                <input class="color_input" name="hex_value" type="color" placeholder="کد رنگ (HEX) را وارد کنید">
                <label for="Front">جور هست یا نیست </label>
                <select name="Front" required>        
                  <option value="true" >جور هست </option>  
                  <option value="false" selected>جور نیست </option>  
              </select>  
              <input type="number" name="stock" placeholder="تعداد جدید را وارد کنید">

                <button type="submit">افزودن</button>
            </form>
        </div>
    </div>
    <a href="<?php $this->url('/Products_panel_admin') ?> "> <button class="back-btn">بازگشت</button></a>

</body>
</html>
