<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="فروشگاه شما">
    <title>پنل مدیریت - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    .image-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .image-container img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
    }

    .image-container .image-id {
        margin-top: 5px;
        font-size: 14px;
        color: #555;
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

    input[type="file"],
    input[type="text"],
    button {
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

    .back-btn {
        margin-top: 20px;
        padding: 12px 20px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: p ointer;
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

    /* استایل برای گزینه‌ها */
    option {
        padding: 10px;
        /* حاشیه داخلی برای گزینه‌ها */
        font-size: 16px;
        /* اندازه فونت گزینه‌ها */
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
                <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="m-0">پنل مدیریت</h5>
                <div class="ms-auto">
                    <button class="btn btn-primary"><i class="fas fa-user-circle"></i> مدیر</button>
                </div>
            </div>
        </nav>
        <p>نام محصول </p>
        <h2><?= $post['name']  ?></h2>
        <br>
        <h2>گالری محصولات</h2>
        <div class="gallery">

            <?php foreach($img_posts as $img_post) {?>
            <div class="image-container">
                <img src="<?php $this->asset($img_post['image_url']) ?>" alt="محصول">
                <span class="image-id">ID: <?= $img_post['image_id'] ?></span>
                <span class="image-id">alt: <?= $img_post['alt_text'] ?></span>
                <a href="<?php $this->url('/Products_panel_admin/delete_img/' .  $img_post['image_id']) ?>" title="حذف عکس "><button
                        class="delete-btn"><i class="fas fa-times"></i></button></a>
            </div>
            <?php } ?>
            <!-- تصاویر بیشتر -->
        </div>

        <div class="form-wrapper">
            <div class="form-container">
                <h3>آپدیت تصویر</h3>
                <form action="<?php $this->url('/Products_panel_admin/update_img/' . $post['product_id'])  ?>" method="post"
                    enctype="multipart/form-data">
                    <label for="image_id">کد تصویر را انتخاب کنید:</label>
                    <select name="image_id" id="image_id" required>
                        <option value="" disabled selected>کد تصویر را انتخاب کنید</option> 
                        <?php foreach($img_posts as $img_post) {?>
                        <option value="<?= $img_post['image_id'] ?>"> <?= $img_post['image_id'] ?> </option>
                       <?php } ?>
                        <!-- می‌توانید گزینه‌های بیشتری اضافه کنید -->
                    </select>
                    <input type="file" name="image_url" accept="image/*" required>
                    <input type="text" name="alt_text" placeholder="توضیحات" required>

                    <button type="submit">آپلود</button>
                </form>
            </div>

            <div class="form-container">
                <h3>افزودن تصویر جدید</h3>
                <form action="<?php $this->url('/Products_panel_admin/img_stor/' .  $post['product_id']) ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="image_url" accept="image/*" required>
                    <input type="text" name="alt_text" placeholder="توضیحات " required>

                    <button type="submit">افزودن</button>
                </form>
            </div>
        </div>
        <a href="<?php $this->url('/Products_panel_admin') ?> "> <button class="back-btn">بازگشت</button></a>
</body>

</html>