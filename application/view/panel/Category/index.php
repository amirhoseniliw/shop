<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نمایش دسته‌بندی‌ها</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
  <style>
    body {
      font-family: 'Vazir', sans-serif;
      direction: rtl;
    }

    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: white;
      position: fixed;
      width: 250px;
      top: 0;
      right: 0;
      padding-top: 20px;
      transition: all 0.3s ease;
      z-index: 1000;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 15px;
      transition: background-color 0.2s;
    }

    .sidebar a:hover,
    .sidebar .active {
      background-color: #495057;
    }

    .main-content {
      margin-right: 270px;
      padding: 20px;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main-content {
        margin-right: 0;
      }

      .category-card {
        margin-bottom: 20px;
      }

      .sidebar .close-btn {
        display: block;
        position: absolute;
        top: 10px;
        left: 10px;
        background: none;
        border: none;
        color: white;
        font-size: 20px;
      }
    }

    .sidebar .close-btn {
      display: none; /* فقط در موبایل نمایش داده شود */
    }

    .category-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <!-- دکمه بستن فقط در موبایل -->
  <button class="close-btn d-md-none" onclick="toggleSidebar()">
    <i class="fas fa-times"></i>
  </button>

  <div class="text-center py-4">
    <h4>فروشگاه شما</h4>
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

<!-- Toggle Sidebar Button (Mobile Only) -->
<button class="btn btn-dark d-md-none m-3" onclick="toggleSidebar()">
  <i class="fas fa-bars"></i>
</button>

<!-- Main Content -->
<div class="main-content">
  <div class="container mt-5">
    <h1 class="text-center mb-4">دسته‌بندی‌ها</h1>
    <div class="text-end mb-3">
      <a href="<?php $this->url('/Category_panel_admin/create') ?>" class="btn btn-primary">ایجاد دسته‌بندی جدید</a>
    </div>

    <!-- Desktop Table -->
    <div class="d-none d-md-block">
      <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>شناسه</th>
            <th>نام دسته‌بندی</th>
            <th>توضیحات</th>
            <th>تصویر</th>
            <th>تاریخ ساخت</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($categories as $category) { ?>
          <tr>
            <td><?= $category['category_id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td><?= $category['description'] ?></td>
            <td>
              <img src="<?php echo $this->asset($category['img_url'] ?: '/img_site/default.png') ?>" alt="تصویر" class="img-thumbnail category-image">
            </td>
            <td><?php echo $this->jalaliData($category['updated_at']) ?></td>
            <td>
              <a href="<?php $this->url('/Category_panel_admin/edit/' . $category['category_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
              <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $category['category_id'] ?>)">حذف</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- Mobile Cards -->
    <div class="d-block d-md-none">
      <?php foreach($categories as $category) { ?>
        <div class="card category-card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= $category['name'] ?></h5>
            <p class="card-text"><?= $category['description'] ?></p>
            <img src="<?php echo $this->asset($category['img_url'] ?: '/img_site/default.png') ?>" class="img-thumbnail mb-3 category-image" alt="تصویر دسته‌بندی">
            <p>تاریخ: <?= $this->jalaliData($category['updated_at']) ?></p>
            <a href="<?php $this->url('/Category_panel_admin/edit/' . $category['category_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
            <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $category['category_id'] ?>)">حذف</button>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
</div>

<script>
  function deleteRecord(id) {
    if (confirm('آیا اطمینان دارید که می‌خواهید این دسته را حذف کنید؟')) {
      window.location.href = 'category_panel_admin/Delete/' + id;
    }
  }

  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('show');
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
