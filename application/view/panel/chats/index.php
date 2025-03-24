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
        margin: 20px;
        background-color: #f0f2f5;
        text-align: center;
    }

    h2 {
        color: #333;
        animation: fadeIn 1s ease-in-out;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        animation: slideUp 0.7s ease-in-out;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    button {
        padding: 8px 12px;
        margin: 2px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
    }

    button:hover {
        background-color: #007bff;
        color: white;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
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
    <a href="<?php $this->url('/Category_panel_admin_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
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

        <body>
            <h2>لیست چت‌ها</h2>
            <table>
                <thead>
                    <tr>
                        <th>عنوان چت</th>
                        <th>کاربر</th>
                        <th>تاریخ ساخت</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($chats as $chat){?>
                    <tr>
                        <td><?= $chat['titel'] ?></td>
                        <td><?= $chat['username'] ?></td>
                        <td><?php echo $this->jalaliData($chat['created_at']) ?></td>
                        <?php if($chat['status'] == 'open') {?>
                        <td style="border: 2px solid green;">باز است </td>
                        <?php } else { ?>
                        <td style="border: 2px solid red;">بسته شده </td>
                        <?php }?>
                        <td>
                          <a href="<?php $this->url('/chats_panel_admin/chang_status/' . $chat['chat_id'])?>">  <button>تغییر وضعیت</button></a>
                          <a href="<?php $this->url('/chats_panel_admin/open_chat/' . $chat['chat_id'])?>">  <button>باز کردن چت</button></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </body>

</html>