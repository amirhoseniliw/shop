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
                <button class="btn btn-primary"><i class="fas fa-user-circle"></i><span><?php echo " " . $user['username'] ?></span>   مدیر</button>
            </div>
        </div>
    </nav>

    <div id="dashboard">
        <h2>داشبورد</h2>
        <p>به پنل مدیریت خوش آمدید! در اینجا می‌توانید فروشگاه خود را مدیریت کنید.</p>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">تعداد محصولات</h5>
                        <p class="card-text"><?= $count_posts['total_products'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">مجموع فروش</h5>
                        <p class="card-text"><?= $sum_sell['total_sales'] ?>   تومان </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">سفارش‌های معلق</h5>
                        <p class="card-text"><?= $cunt_orders['pending_orders'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">مشکلات مشتریان</h5>
                        <p class="card-text">null</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="products" class="mt-4">
        <h2>محصولات</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>شناسه محصول</th>
                    <th>نام</th>
                    <th>قیمت</th>
                    <th>موجودی</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post){ ?>
                    <tr>
                    <td><?= $post['product_id'] ?></td>
                    <td><?= $post['name'] ?></td>
                    <td><?= $post['price'] ?> تومان </td>
                    <td <?php if($post['stock_qty'] <= 5) {echo 'style="color: red;"';} else {echo 'style="color: green;"';} ?>><?= $post['stock_qty'] ?></td>
                    <td>
                      <a href="<?php $this->url('/Products/products_edit/' . $post['product_id']) ?>">  <button class="btn btn-warning btn-sm">ویرایش</button></a>
                        <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id']?>)">حذف</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- بخش‌های بیشتری را در صورت نیاز اضافه کنید -->
</div>
<script>  
    function deleteRecord(id) {  
        // جعبه تأیید  
        const confirmation = confirm('آیا اطمینان دارید که می‌خواهید رکورد را حذف کنید؟');  
        if (confirmation) {  
            // کاربر تأیید کرد، به آدرس حذف بروید  
            window.location.href = 'Products_panel_admin/products_delete/' + id;  
        } else {  
            // کاربر کنسل کرد  
            alert('عملیات حذف لغو شد.');  
        }  
    }  
</script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
