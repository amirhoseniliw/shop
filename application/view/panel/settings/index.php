<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تنظیمات - فروشگاه شما</title>
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
    <a href="<?php $this->url('/panel') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/products') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/orders') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/users') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/category') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
    <a href="<?php $this->url('/reports') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/settings') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
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
        <div class="container mt-5">
            <h1 class="text-center">تنظیمات</h1>

            <div class="row mt-4">
                <!-- تنظیمات عمومی -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5>تنظیمات عمومی</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= $this->url('/settings/update/' . $settings['setting_id']) ?>"
                                method="post">
                                <div class="mb-3">
                                    <label for="storeName" class="form-label">نام فروشگاه</label>
                                    <input type="text" id="storeName" class="form-control"
                                        placeholder="نام فروشگاه خود را وارد کنید" name="setting_name"
                                        value="<?= $settings['setting_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="storePhone" class="form-label">تلفن فروشگاه</label>
                                    <input type="tel" id="storePhone" class="form-control"
                                        placeholder="شماره تلفن فروشگاه" name="setting_number"
                                        value="<?= $settings['setting_number'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="storeEmail" class="form-label">ایمیل فروشگاه</label>
                                    <input type="email" id="storeEmail" class="form-control"
                                        placeholder="ایمیل فروشگاه خود را وارد کنید" name="setting_email"
                                        value="<?= $settings['setting_email'] ?>">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- تنظیمات امنیتی -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-warning text-dark">
                            <h5>تنظیمات امنیتی</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">رمز عبور فعلی</label>
                                    <input type="password" id="currentPassword" class="form-control"
                                        placeholder="رمز عبور فعلی خود را وارد کنید">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">رمز عبور جدید</label>
                                    <input type="password" id="newPassword" class="form-control"
                                        placeholder="رمز عبور جدید خود را وارد کنید">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">تایید رمز عبور جدید</label>
                                    <input type="password" id="confirmPassword" class="form-control"
                                        placeholder="رمز عبور جدید را دوباره وارد کنید">
                                </div>
                                <button type="submit" class="btn btn-warning">ذخیره تغییرات</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- تنظیمات اعلان‌ها -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5>تنظیمات اعلان‌ها</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">
                                        دریافت اعلان‌ها از طریق ایمیل
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">
                                        دریافت اعلان‌ها از طریق پیامک
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                    <label class="form-check-label" for="pushNotifications">
                                        دریافت اعلان‌ها از طریق پوش نوتیفیکیشن
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">ذخیره تغییرات</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>