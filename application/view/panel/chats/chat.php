<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت - فروشگاه شما</title>
    <meta name="author" content="فروشگاه شما">
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 250px;
            z-index: 1050;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
        }

        .main-content {
            margin-right: 250px;
            padding: 20px;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-right: 0;
            }
        }

        .back-link {
            display: block;
            width: fit-content;
            margin: 20px auto;
            background-color: aqua;
            border: 2px solid aquamarine;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .close-btn {
            display: none;
            text-align: left;
            padding: 10px;
        }

        @media (max-width: 992px) {
            .close-btn {
                display: block;
            }
        }
        .img_prof {
                    width: 40px;

        }
    </style>
    <style>
.comment {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    clear: both;
}

.comment img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-left: 10px;
    margin-right: 10px;
}

.comment-body {
    border-radius: 10px;
    padding: 15px;
    border: 1px solid #ccc;
    font-size: 14px;
    max-width: 80%;
    word-wrap: break-word;
}

.comment.active {
    flex-direction: row-reverse;
}

.comment.active .comment-body {
    background-color: #d1ecf1; /* آبی برای پیام‌های مدیر */
    border-color: #bee5eb;
    text-align: right;
}

.comment:not(.active) .comment-body {
    background-color: #d4edda; /* سبز برای پیام‌های کاربران */
    border-color: #c3e6cb;
    text-align: right;
}

.comment-footer {
    font-size: 12px;
    margin-top: 8px;
    color: #555;
    display: flex;
    justify-content: space-between;
}

@media (max-width: 576px) {
    .comment-body {
        max-width: 100%;
    }
}
</style>

</head>

<body>

<!-- سایدبار -->
<div class="sidebar" id="sidebarMenu">
    <div class="text-center py-3">
        <h5>فروشگاه شما</h5>
    </div>
    <div class="close-btn">
        <button class="btn btn-danger w-100" onclick="toggleSidebar()">بستن منو</button>
    </div>
    <a href="<?php $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی‌ها</a>
    <a href="<?php $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام‌ها</a>
    <a href="<?php $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

<!-- نوار بالا -->
<nav class="navbar navbar-light bg-light shadow-sm mb-4">
    <div class="container-fluid">
        <button class="btn btn-outline-dark d-lg-none" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        <h5 class="m-0">پنل مدیریت</h5>
        <div class="ms-auto">
            <button class="btn btn-primary"><i class="fas fa-user-circle"></i> مدیر</button>
        </div>
    </div>
</nav>

<!-- محتوای اصلی -->
<div class="main-content">
    <!-- پیام‌ها -->
    <div class="container-fluid">
       <?php foreach($messages as $message ) { 
    $is_admin = $message['sender_id'] == $_SESSION['admin_id'];
?>
<div class="comment <?= $is_admin ? 'active' : '' ?>">
    <div class="comment-author-ava">
        <img src="<?php !empty($message['img_prof']) ? $this->asset($message['img_prof']) : $this->asset('img_site/icon/avatar.png') ?>" alt="Avatar">
    </div>
    <div class="comment-body">
        <u><p class="text-center mb-1"><?= $message['title'] ?></p></u>
        <p class="comment-text"><?= $message['message'] ?></p>
        <div class="comment-footer">
            <span><?= $message['username'] ?></span>
            <span><?= $this->jalaliData($message['created_at']) ?></span>
        </div>
    </div>
</div>
<?php } ?>


        <?php if($chath['status'] != 'open') { ?>
            <div class="alert alert-danger text-center mt-4">تیکت بسته شده است و امکان ارسال پاسخ جدید وجود ندارد</div>
        <?php } else { ?>
            <h5 class="mb-3 mt-5">ارسال پیام</h5>
            <form action="<?php $this->url('/chats_panel_admin/send_messaged_panel/' . $chath['chat_id']) ?>" method="post">
                <div class="form-group">
                    <label>عنوان :</label>
                    <input type="text" name="title" class="form-control my-2" placeholder="عنوان پیام" required>
                    <label>متن پیام :</label>
                    <textarea name="message" class="form-control" rows="6" placeholder="پیام خود را بنویسید..." required></textarea>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success px-4">ارسال پیام</button>
                </div>
            </form>
        <?php } ?>

        <a class="back-link" href="<?php $this->url('chats_panel_admin') ?>">بازگشت به صفحه چت‌ها</a>
    </div>
</div>

<!-- اسکریپت‌ها -->
<script>
    function toggleSidebar() {
        document.getElementById('sidebarMenu').classList.toggle('show');
    }

    document.getElementById('toggleSidebar').addEventListener('click', toggleSidebar);
</script>

</body>
</html>
