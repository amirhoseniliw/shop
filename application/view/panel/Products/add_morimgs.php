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
            font-family: 'Arial', sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  

        .container {  
            max-width: 600px;  
            margin: auto;  
            background: #fff;  
            padding: 20px;  
            border-radius: 8px;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  

        h1 {  
            text-align: center;  
            color: #333;  
        }  

        .form-group {  
            margin-bottom: 15px;  
        }  

        label {  
            display: block;  
            margin-bottom: 5px;  
            font-weight: bold;  
        }  

        input[type="file"] {  
            width: 100%;  
            padding: 10px;  
            border: 1px solid #ccc;  
            border-radius: 5px;  
            font-size: 16px;  
        }  

        button {  
            width: 100%;  
            padding: 10px;  
            background-color: #28a745;  
            border: none;  
            border-radius: 5px;  
            color: white;  
            font-size: 16px;  
            cursor: pointer;  
        }  

        button:hover {  
            background-color: #218838;  
        }  

        .message {  
            display: none;  
            margin-top: 15px;  
            text-align: center;  
            font-weight: bold;  
        }  

        .success {  
            color: green;  
        }  

        .product-info {  
            margin-top: 20px;  
            text-align: center;  
        }  

        .product-image {  
            max-width: 100%;  
            border-radius: 5px;  
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


    <div class="container">  
        <h1>اضافه کردن عکس محصول</h1>  

        <div class="product-info"> 
            <h2 id="productName"><?= $post['name']  ?> <span>محصول مورد نظر</span></h2>  
            <img id="currentProductImage" class="product-image" src="<?php $this->asset($post['image_url']) ?>" alt="Sample Product" width="200" />  
            <!--  به جای "your-image-url.jpg" آدرس عکس خود را قرار دهید -->  
        </div>  

        <form id="imageForm">  
            <div class="form-group">  
                <label for="image">بارگذاری عکس جدید:</label>  
                <input type="file" id="image" name="image" accept="image/*" required>  
            </div>  
            <button type="submit">اضافه کردن عکس</button>  
        </form>  
        <div id="message" class="message"></div>  
    </div>  

    <script>  
        document.getElementById('imageForm').addEventListener('submit', function (e) {  
            e.preventDefault();  
            const productImage = document.getElementById('image').files[0];  

            // نمایش عکس جدید  
            const reader = new FileReader();  
            reader.onload = function (event) {  
                document.getElementById('currentProductImage').src = event.target.result;  
            }  
            reader.readAsDataURL(productImage);  

            document.getElementById('message').textContent = 'عکس جدید به محصول اضافه شد.';  
            document.getElementById('message').classList.add('success');  
            document.getElementById('message').style.display = 'block';  
        });  
    </script>  
</body>  
</html>