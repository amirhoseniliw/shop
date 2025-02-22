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
        input[type="file"], input[type="text"], button {
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
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="text-center py-4">
        <h4>فروشگاه شما</h4>
    </div>
    <a href="<?php $this->url('/panel') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/products') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/orders') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/users') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/category') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
    <a href="<?php $this->url('/reports') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/chats_panel') ?>"><i class="fas fa-comment"></i> پیام ها </a>
    <a href="<?php $this->url('/settings') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
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

    <h2>گالری محصولات</h2>
    <div class="gallery">
        <div class="image-container">
            <img src="https://via.placeholder.com/150" alt="محصول">
            <span class="image-id">ID: 12345</span>
            <button class="delete-btn">×</button>
        </div>
        <div class="image-container">
            <img src="https://via.placeholder.com/150" alt="محصول">
            <span class="image-id">ID: 67890</span>
            <button class="delete-btn">×</button>
        </div>
        <!-- تصاویر بیشتر -->
    </div>
    
    <div class="form-wrapper">
        <div class="form-container">
            <h3>آپدیت تصویر</h3>
            <form>
                <input type="text" placeholder="کد تصویر را وارد کنید">
                <input type="file" accept="image/*">
                <button type="submit">آپلود</button>
            </form>
        </div>
        
        <div class="form-container">
            <h3>افزودن تصویر جدید</h3>
            <form>
                <input type="file" accept="image/*">
                <button type="submit">افزودن</button>
            </form>
        </div>
    </div>
    <button class="back-btn" onclick="window.history.back();">بازگشت</button>
</body>
</html>
