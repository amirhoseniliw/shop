<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل مدیریت - فروشگاه شما</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" />

  <style>
    body {
      font-family: 'Tahoma', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      background-color: #343a40;
    }

    .sidebar a {
      color: white;
      padding: 12px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover, .sidebar .active {
      background-color: #495057;
    }

    @media (min-width: 992px) {
      .sidebar {
        position: fixed;
        height: 100vh;
        width: 250px;
      }

      .main-content {
        margin-right: 250px;
      }

      .navbar {
        margin-right: 250px;
      }
    }

    @media (max-width: 991px) {
      .sidebar {
        position: relative;
      }
    }

    @media (max-width: 768px) {
      .table thead {
        display: none;
      }

      .table tbody tr {
        display: block;
        margin-bottom: 1rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
      }

      .table tbody td {
        display: flex;
        justify-content: space-between;
        padding: 6px 10px;
        border-bottom: 1px dashed #ccc;
      }

      .table tbody td::before {
        content: attr(data-label);
        font-weight: bold;
        color: #444;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container-fluid">
      <button class="btn btn-outline-dark d-lg-none" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
        <i class="fas fa-bars"></i>
      </button>
      <span class="ms-3 fw-bold">پنل مدیریت</span>
      <div class="ms-auto d-flex gap-2">
        <button class="btn btn-primary"><i class="fas fa-user-circle"></i> <?= $user['username'] ?> - مدیر</button>
        <a href="<?= $this->url('/Home') ?>" class="btn btn-outline-primary">انتقال به سایت</a>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="collapse d-lg-block sidebar bg-dark pt-4" id="sidebarMenu">
    <h5 class="text-center text-white mb-4">فروشگاه شما</h5>
    <a href="<?= $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?= $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?= $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?= $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?= $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته‌بندی</a>
    <a href="<?= $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?= $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام‌ها</a>
    <a href="<?= $this->url('/adders_panel_admin/show_all') ?>"><i class="fas fa-money-bill"></i> قیمت پست</a>
    <a href="<?= $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
    <a href="<?= $this->url('/Code_panel_admin') ?>"><i class="fas fa-gift"></i> بازدید </a>
  </div>

  <!-- Main Content -->
  <div class="main-content pt-5 px-3">
    <div id="dashboard">
      <h2>داشبورد</h2>
      <p>به پنل مدیریت خوش آمدید!</p>

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
              <p class="card-text"><?= number_format($sum_sell['total_sales'] ?? 0) ?> تومان</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-white bg-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">سفارش‌های پرداخت‌شده</h5>
              <p class="card-text"><?= $cunt_orders['paid_orders'] ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-white bg-danger mb-3">
            <div class="card-body">
              <h5 class="card-title">تیکت‌های باز</h5>
              <p class="card-text">null</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Products -->
    <div id="products" class="mt-4">
      <h2>محصولات</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead class="table-light">
            <tr>
              <th>شناسه</th>
              <th>نام</th>
              <th>قیمت</th>
              <th>موجودی</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($posts as $post): ?>
              <tr>
                <td data-label="شناسه"><?= $post['product_id'] ?></td>
                <td data-label="نام"><?= $post['name'] ?></td>
                <td data-label="قیمت"><?= $post['price'] ?> تومان</td>
                <td data-label="موجودی" style="color: <?= $post['stock_qty'] <= 5 ? 'red' : 'green' ?>;">
                  <?= $post['stock_qty'] ?>
                </td>
                <td data-label="عملیات">
                  <a href="<?= $this->url('/Products/products_edit/' . $post['product_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
                  <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id'] ?>)">حذف</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    function deleteRecord(id) {
      if (confirm('آیا اطمینان دارید؟')) {
        window.location.href = 'Products_panel_admin/products_delete/' + id;
      } else {
        alert('عملیات حذف لغو شد.');
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
