<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="فروشگاه شما">
    <title>پنل مدیریت - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <link href="<?php $this->asset('css/style.css') ?>" rel="stylesheet">

    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
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
    <a href="<?php $this->url('/Category_panel_admin_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
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
    <div class="col-lg-9" style="width: 100%;">
    <div class="position-sticky top-0">
        <div class="panel-latest-order">

            <div class="row gy-3">

                <div class="col-12">
                    <div class="slider-parent rounded-3 py-4">
                        <div class="container-fluid">
                            <!-- Messages-->
                            <?php foreach($messages as $message ) {?>
                            <div
                                class="comment <?php if($message['sender_id'] == $_SESSION['admin_id']) echo "active" ?>">
                                <div class="comment-author-ava"><img src="<?php $this->asset($message['img_prof']) ?>"
                                        alt="Avatar"></div>
                                <div class="comment-body"
                                    style="width: 50%;  <?php if($message['sender_id'] !== $_SESSION['admin_id']) echo "margin-right: 50%;" ?>">
                                    <u>
                                        <p style="text-align: center;"><?= $message['title'] ?></p>
                                    </u>
                                    <p class="comment-text">
                                        <?= $message['message'] ?>
                                    </p>
                                    <div class="comment-footer"><span
                                            class="comment-meta"><?= $message['username'] ?></span>
                                        <div class="comment-date float-end"><span
                                                class="comment-meta"><?php  echo $this->jalaliData($message['created_at']) ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php }?>


                            <?php if($chath['status'] != 'open') {?>

                            <div class="my-4">
                                <div class="alert alert-danger text-center">
                                    تیکت بسته شده است و امکان ارسال پاسخ جدید وجود ندارد
                                </div>
                            </div>

                            <?php } else {?>
                            <!-- Reply Form-->
                            <h5 class="mb-3">ارسال پیام</h5>
                            <form action="<?php $this->url('/chats_panel_admin/send_messaged_panel/' . $chath['chat_id']) ?>"
                                method="post">
                                <div class="form-group">
                                    <span style="font-size: 20px;">عنوان :</span>
                                    <input type="text" class="form-control form-control-rounded w-50 mx-auto my-2 "
                                        name="title" placeholder="عنوان پیام خود را بنویسید !" required>
                                    <span style="font-size: 20px;">متن اصلی پیغام : </span>

                                    <textarea name="message" class="form-control form-control-rounded" id="review_text"
                                        rows="8" placeholder="پیام خود را وارد کنید..." required></textarea>
                                </div>

                        </div>
                        <div class="text-right">
                            <button class="btn py-3 px-5 main-color-one-bg" type="submit">ارسال پیام</button>
                        </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<a style="text-decoration: none; color: black; background-color: aqua; border: 2px solid aquamarine; padding: 10px ; margin: 10px ;" href="<?php $this->url('chats_panel_admin') ?>">بازگشت به صفحه چت ها </a>