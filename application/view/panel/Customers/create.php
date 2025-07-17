<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ساخت مشتری - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
       .btn {
            border-radius: 20px;
            text-decoration: none;
            background-color: #2196F3;
            color: white;
            padding: 10px;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }
        body {  
            font-family: 'Vazir', sans-serif;  
            background-color: #f2f2f2;  
            color: #333;  
            margin: 0;  
            padding: 0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            overflow: hidden; /* جلوگیری از اسکرول خود بدنه */  
        }  

        .container {  
            background-color: #fff;  
            border-radius: 8px;  
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);  
            padding: 20px;  
            max-height: 90vh; /* حداکثر ارتفاع برای container */  
            width: 400px;  
            overflow-y: auto; /* فعال کردن اسکرول عمودی در صورت نیاز */  
        }  

        h1 {  
            text-align: center;  
            margin-bottom: 20px;  
            color: #4CAF50;  
        }  

        label {  
            margin-top: 10px;  
            display: block;  
            font-weight: bold;  
            margin-bottom: 5px;  
        }  

        input[type="text"],  
        input[type="number"],  
        input[type="url"],  
        textarea,  
        select {  
            width: 100%;  
            padding: 10px;  
            margin-bottom: 20px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            box-sizing: border-box;  
        }  

        input[type="checkbox"] {  
            margin-left: 10px;  
        }  

        input[type="submit"] {  
            background-color: #4CAF50;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 100%;  
            font-size: 16px;  
            margin-bottom: 10px;  
        }  

        input[type="button"] {  
            background-color: #2196F3;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 48%;  
            font-size: 16px;  
            margin-top: 10px;  
            margin-right: 4%;  
        }  

        input[type="button"]:hover {  
            background-color: #1976D2;  
        }  

        .checkbox-label {  
            display: flex;  
            align-items: center;  
            margin-bottom: 15px;  
        }  
        
        .button-container {  
            display: flex;  
            justify-content: space-between; /* افقی قرار دادن دکمه‌ها */  
        }  
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">ساخت مشتری</h1>
        <form class="mt-4" action="<?php $this->url('/Users_panel_admin/user_stor') ?>" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
                <label for="customerName" class="form-label">نام مشتری</label>
                <input type="text" class="form-control" id="customerName" name="username">
            </div>
            <div class="mb-3">
                <label for="customerEmail" class="form-label">ایمیل مشتری</label>
                <input type="email" class="form-control" id="customerEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="customerName" class="form-label">رمز مشتری</label>
                <input type="text" class="form-control" id="customerName" name="password">
            </div>
            <div class="mb-3">
                <label for="customerPhone" class="form-label">شماره تلفن مشتری</label>
                <input type="text" class="form-control" id="customerPhone" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="customerName" class="form-label">عکس مشتری</label>
                <input type="file" class="form-control" id="customerName" name="img_prof">
            </div>
            <div class="mb-3">
                <label for="customerAddress" class="form-label">آدرس مشتری</label>
                <textarea class="form-control" id="customerAddress" rows="3" name="address"></textarea>
            </div>
            <label for="status">وضعیت:</label>  
            <select name="status" required>  
                <option value="active">فعال</option>  
                <option value="inactive">غیرفعال</option>  
            </select> 
             <label for="status">نوع:</label>  
            <select name="user_type" required>  
                <option value="regular">کاربر عادی</option>  
                <option value="admin">ادمین</option>  
            </select>  

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
            <a href="<?php $this->url('/Users_panel_admin') ?>" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
