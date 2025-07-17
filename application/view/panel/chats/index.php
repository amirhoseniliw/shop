<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل مدیریت - فروشگاه شما</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
    }

    .sidebar {
      background-color: #343a40;
      color: white;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      right: 0;
      padding-top: 1rem;
      z-index: 1050;
      transition: right 0.3s ease;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 15px;
      transition: background-color 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #495057;
    }

    .main-content {
      margin-right: 250px;
      padding: 20px;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 20px;
      background: none;
      border: none;
      color: white;
      display: none;
    }

    @media (max-width: 768px) {
      .sidebar {
        right: -250px;
      }

      .sidebar.show {
        right: 0;
      }

      .main-content {
        margin-right: 0;
      }

      .close-btn {
        display: block;
      }
    }

    .chat-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
      padding: 15px;
      text-align: right;
    }

    .chat-card p {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>

  <!-- سایدبار -->
  <div class="sidebar" id="sidebarMenu">
    <button class="close-btn" id="closeSidebar"><i class="fas fa-times"></i></button>
    <div class="text-center py-3">
      <h5>فروشگاه شما</h5>
    </div>
    <a href="<?php $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته‌بندی‌ها</a>
    <a href="<?php $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام‌ها</a>
    <a href="<?php $this->url('/adders_panel_admin/show_all') ?>"><i class="fas fa-money-bill"></i> قیمت پست‌ها</a>
    <a href="<?php $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
  </div>

  <!-- محتوای اصلی -->
  <div class="main-content">
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

    <div class="container">
      <h4 class="mb-4 text-center">لیست چت‌ها</h4>

      <!-- برای دسکتاپ -->
      <div class="d-none d-md-block">
        <table class="table table-bordered text-center align-middle">
          <thead class="table-primary">
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
              <td class="<?= $chat['status'] == 'open' ? 'text-success' : 'text-danger' ?>">
                <?= $chat['status'] == 'open' ? 'باز است' : 'بسته شده' ?>
              </td>
              <td>
                <a href="<?php $this->url('/chats_panel_admin/chang_status/' . $chat['chat_id'])?>">
                  <button class="btn btn-sm btn-warning">تغییر وضعیت</button>
                </a>
                <a href="<?php $this->url('/chats_panel_admin/open_chat/' . $chat['chat_id'])?>">
                  <button class="btn btn-sm btn-info text-white">باز کردن چت</button>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- برای موبایل -->
      <div class="d-md-none">
        <?php foreach($chats as $chat){ ?>
        <div class="chat-card">
          <p><strong>عنوان:</strong> <?= $chat['titel'] ?></p>
          <p><strong>کاربر:</strong> <?= $chat['username'] ?></p>
          <p><strong>تاریخ:</strong> <?= $this->jalaliData($chat['created_at']) ?></p>
          <p><strong>وضعیت:</strong>
            <?= $chat['status'] == 'open' ? '<span class="text-success">باز است</span>' : '<span class="text-danger">بسته شده</span>' ?>
          </p>
          <div class="d-flex justify-content-end mt-2">
            <a href="<?php $this->url('/chats_panel_admin/chang_status/' . $chat['chat_id'])?>">
              <button class="btn btn-sm btn-warning me-2">تغییر وضعیت</button>
            </a>
            <a href="<?php $this->url('/chats_panel_admin/open_chat/' . $chat['chat_id'])?>">
              <button class="btn btn-sm btn-info text-white">باز کردن چت</button>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- اسکریپت‌ها -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const closeBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebarMenu');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });

    closeBtn.addEventListener('click', () => {
      sidebar.classList.remove('show');
    });
  </script>
</body>

</html>
