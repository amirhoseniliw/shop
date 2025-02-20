<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشتریان - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
        .btn {
            border-radius: 20px;

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
    <div class="container mt-5">
        <h1 class="text-center">مشتریان</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>شناسه مشتری</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>شماره تلفن</th>
                    <th> عکس پروف</th>
                    <th>آدرس</th>
                    <th>رمز</th>
                    <th>اخرین  تغییرات </th>
                    <th>وضعیت </th>
                    <th>تایپ </th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $this->dd($users);
                ?>
                <?php foreach ($users as $user ){ ?>
                <tr  <?php if ($user['user_type'] == 'admin') { echo 'style="border: 2px red solid;"'; } ?>>
                    <td><?= $user['user_id'] ?></td>
                    <td><?= $user['username'] ?> </td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone_number'] ?></td>
                    <td><img src="<?php $this->asset($user['img_prof']) ?>" alt="error" width="100"></td>
                    <td><?= $user['address'] ?></td>
                    <td><?php echo substr($user['password'] , 1 , 8)  ?></td>
                    <td><?php echo $this->jalaliData($user['updated_at']) ?></td>
                     <td>
                                    <?php if ($user['status'] == 'inactive') { ?>
                                        <a href="<?php $this->url('/users/status/' . $user['user_id']) ?>"><button class="btn btn-success btn-sm">فعال</button></a><p>غیر فعال</p>
                                    <?php } else { ?>
                                        <a href="<?php $this->url('/users/status/' . $user['user_id']) ?>"> <button class="btn btn-danger btn-sm">غیر فعال</button></a><p>فعال هست </p><?php } ?>
                                </td>
                                <td>
                                    <?php if ($user['user_type'] == 'regular') { ?>
                                        <a href="<?php $this->url('/users/user_type/' . $user['user_id']) ?>"><button class="btn btn-success btn-sm">ادمین</button></a><p> کاربر عادی </p>
                                    <?php } else { ?>
                                        <a href="<?php $this->url('/users/user_type/' . $user['user_id']) ?>"> <button class="btn btn-danger btn-sm">کاربر عادی</button></a><p> ادمین </p><?php } ?>
                                </td>


                    <td>
                       <a href="<?php $this->url('/users/usersEdit/' . $user['user_id'] )?>"> <button class="btn btn-warning btn-sm">ویرایش</button></a>
 <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $user['user_id']?>)">حذف</button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="<?php $this->url('/users/users_add') ?>"><button class="btn btn-success mt-3">افزودن مشتری جدید</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <a style="float: left;" href="<?php $this->url('/panel') ?>" class="btn btn-secondary back-button">بازگشت</a>
    <script>  
    function deleteRecord(id) {  
        // جعبه تأیید  
        const confirmation = confirm('آیا اطمینان دارید که می‌خواهید کاربر  را حذف کنید؟');  
        if (confirmation) {  
            // کاربر تأیید کرد، به آدرس حذف بروید  
            window.location.href = 'users/usersDelete/' + id;  
        } else {  
            // کاربر کنسل کرد  
            alert('عملیات حذف لغو شد.');  
        }  
    }  
</script> 
</body>
</html>
