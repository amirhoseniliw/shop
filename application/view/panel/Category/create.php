<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ایجاد دسته‌بندی</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">ایجاد دسته‌بندی جدید</h1>
    <form action="<?php $this->url('/Category_panel_admin/store') ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="categoryName" class="form-label">نام دسته‌بندی</label>
        <input type="text" class="form-control" id="categoryName" name="name" placeholder="نام دسته‌بندی را وارد کنید">
      </div>
      <div class="mb-3">
        <label for="categoryName" class="form-label">توضیحات  دسته‌بندی</label>
        <input type="text" class="form-control" id="categoryName" name="description" placeholder="توضیحات رو وارد کنید ">
      </div>
      <div class="mb-3">
        <label for="categoryImage" class="form-label">آپلود تصویر</label>
        <input type="file" class="form-control" id="categoryImage" name="img_url">
      </div>
      <div class="mb-3">
    
      </div>
      <button type="submit" class="btn btn-success">ذخیره</button>
      <a href="<?php $this->url('/Category_panel_admin') ?>" class="btn btn-secondary">بازگشت</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
