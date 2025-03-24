<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نمایش دسته‌بندی‌ها</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
        font-family: 'Vazir', sans-serif;
        direction: rtl; /* تنظیم جهت متن برای زبان فارسی */
    }
    .btn {
        border-radius: 20px;
        text-align: center; /* متن دکمه‌ها در وسط قرار بگیرد */
    }
    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        position: fixed;
        width: 250px;
        right: 20px; /* فاصله از لبه سمت راست */
        top: 0;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* ایجاد سایه */
        border-radius: 0 10px 10px 0; /* گوشه‌های گرد در سمت چپ */
    }
    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 15px;
        transition: background-color 0.2s;
        text-align: right; /* متن لینک‌ها راست‌چین شود */
    }
    .sidebar a:hover {
        background-color: #495057;
    }
    .sidebar .active {
        background-color: #495057;
    }
    .main-content {
        margin-right: 270px; /* تطابق با فاصله سایدبار + فاصله آن از لبه */
        padding: 20px;
        text-align: right; /* تمام متن‌ها در محتوای اصلی راست‌چین شوند */
    }
    .navbar {
        margin-right: 270px; /* تطابق با سایدبار */
    }
    table {
        text-align: right; /* تنظیم متن جدول به سمت راست */
    }
    th, td {
        text-align: right; /* متن‌ها داخل سلول‌های جدول راست‌چین شوند */
    }
</style>


</head>
<body>
  <!-- سایدبار -->
  <div class="sidebar">
    <div class="text-center py-4">
        <h4>فروشگاه شما</h4>
    </div>
    <a href="<?php $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
    <a href="<?php $this->url('/reports') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام ها </a>

    <a href="<?php $this->url('/settings') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

  <!-- محتوای اصلی -->
  <div class="main-content">
    <div class="container mt-5">
      <h1 class="text-center mb-4">دسته‌بندی‌ها</h1>
      <div class="text-end mb-3">
        <a href="<?php $this->url('/category/create') ?>" class="btn btn-primary">ایجاد دسته‌بندی جدید</a>
      </div>
      <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>شناسه</th>
            <th>نام دسته‌بندی</th>
            <th> توضیحات </th>
            <th>تصویر</th>
            <th>تاریخ ساخت</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category) {?>
          <tr>
            <td><?= $category['category_id'] ?></td>
            <td><?= $category['name'] ?> </td>
            <td><?= $category['description'] ?> </td>
            <td>
              <img src="<?php echo $this->asset($category['img_url']) ?>" alt="تصویر دسته‌بندی" class="img-thumbnail" style="width: 100px; height: 100px;">
            </td>
            <td><?php  echo $this->jalaliData($category['updated_at']) ?></td>
            <td>
              <a href="<?php $this->url('/category/edit/' . $category['category_id'] ) ?>" class="btn btn-warning btn-sm">ویرایش</a>
              <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $category['category_id'] ?>)">حذف</button>
            </td>
          </tr>
<?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <script>  
    function deleteRecord(id) {  
        // جعبه تأیید  
        const confirmation = confirm('آیا اطمینان دارید که می‌خواهید کاربر  را حذف کنید؟');  
        if (confirmation) {  
            // کاربر تأیید کرد، به آدرس حذف بروید  
            window.location.href = 'category/Delete/' + id;  
        } else {  
            // کاربر کنسل کرد  
            alert('عملیات حذف لغو شد.');  
        }  
    }  
</script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
