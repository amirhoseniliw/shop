<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشتریان - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-3IkaL3UUPK2B0LPxG6+JcZssNm2s6rU1GQq9Ixu6EVtRxg2H3U/MK9yA3FQqh4pl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93Hdxr+GEeJeO2E+z6fB5OecEN7FiFWsf6+WwuvJe45Mi9wW0gGpEd+3+ZJp5j" crossorigin="anonymous"></script>

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

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-right: 0;
                padding: 10px;
            }
            .navbar {
                margin-right: 0;
            }
            table thead {
                display: none;
            }
            table tbody, table tr, table td {
                display: block;
                width: 100%;
            }
            table tr {
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                padding: 1rem;
                border-radius: 10px;
                background: #f8f9fa;
            }
            table td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 0.5rem;
            }
            img {
                width: 100%;
                max-width: 150px;
                height: auto;
            }
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
    <a href="<?php $this->url('/adders_panel_admin/show_all') ?>"><i class="fas fa-money-bill"></i>  قیمت پست ها  </a>
    <a href="<?php $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

<div class="main-content">
    <div class="position-relative" style="height: 100px;"> <!-- والد باید position-relative داشته باشه -->
    <a href="<?= $this->url('/Users_panel_admin/print' ) ?>" class="btn btn-success btn-sm px-3 rounded-pill d-inline-flex align-items-center shadow-sm position-absolute top-0 end-0 m-2">
        <i class="bi bi-bar-chart-line fs-5 ms-1"></i>
        گزارش‌گیری
    </a>
</div>
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
                    <th>عکس پروف</th>
                    <th>رمز</th>
                    <th>آخرین تغییرات</th>
                    <th>وضعیت</th>
                    <th>تایپ</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user ){ ?>
                <tr <?php if ($user['user_type'] == 'admin') { echo 'style="border: 2px red solid;"'; } ?>>
                    <td data-label="شناسه مشتری"><?= $user['user_id'] ?></td>
                    <td data-label="نام"><?= $user['username'] ?> </td>
                    <td data-label="ایمیل"><?= $user['email'] ?></td>
                    <td data-label="شماره تلفن"><?= $user['phone_number'] ?></td>
                    <td data-label="عکس پروف"><?php if (!empty($user['img_prof'])): ?>
    <img src="<?php $this->asset($user['img_prof']) ?>" alt="عکس کاربر" width="100">
<?php else: ?>
    <span>عکسی بارگذاری نشده</span>
<?php endif; ?>
                    <td data-label="رمز"><?php echo substr($user['password'], 1, 8) ?></td>
                    <td data-label="آخرین تغییرات"><?php echo $this->jalaliData($user['updated_at']) ?></td>
                    <td data-label="وضعیت">
                        <?php if ($user['status'] == 'inactive') { ?>
                            <a href="<?php $this->url('/Users_panel_admin/status/' . $user['user_id']) ?>"><button class="btn btn-success btn-sm">فعال</button></a><p>غیر فعال</p>
                        <?php } else { ?>
                            <a href="<?php $this->url('/Users_panel_admin/status/' . $user['user_id']) ?>"><button class="btn btn-danger btn-sm">غیر فعال</button></a><p>فعال هست </p>
                        <?php } ?>
                    </td>
                    <td data-label="تایپ">
                        <?php if ($user['user_type'] == 'customer') { ?>
                            <a href="<?php $this->url('/Users_panel_admin/user_type/' . $user['user_id']) ?>"><button class="btn btn-success btn-sm">ادمین</button></a><p> کاربر عادی </p>
                        <?php } else { ?>
                            <a href="<?php $this->url('/Users_panel_admin/user_type/' . $user['user_id']) ?>"><button class="btn btn-danger btn-sm">کاربر عادی</button></a><p> ادمین </p>
                        <?php } ?>
                    </td>
                    <td data-label="عملیات">
                        <a href="<?php $this->url('/Users_panel_admin/usersEdit/' . $user['user_id']) ?>"><button class="btn btn-warning btn-sm">ویرایش</button></a>
                        <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $user['user_id'] ?>)">حذف</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="<?php $this->url('/Users_panel_admin/users_add') ?>"><button class="btn btn-success mt-3">افزودن مشتری جدید</button></a>
    </div>
    <a style="float: left;" href="<?php $this->url('/Panel_admin') ?>" class="btn btn-secondary back-button">بازگشت</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>  
function deleteRecord(id) {  
    const confirmation = confirm('آیا اطمینان دارید که می‌خواهید کاربر  را حذف کنید؟');  
    if (confirmation) {  
        window.location.href = 'Users_panel_admin/usersDelete/' + id;  
    } else {  
        alert('عملیات حذف لغو شد.');  
    }  
}  
</script>
</body>
</html>
