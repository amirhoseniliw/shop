<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ویرایش دسته‌بندی</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">ویرایش دسته‌بندی</h1>
    <form action="<?php $this->url('/Category_panel_admin/update/' .$category['category_id'] ) ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="categoryName" class="form-label">نام دسته‌بندی</label>
        <input type="text" class="form-control" id="categoryName" name="name" value="<?= $category['name'] ?>">
      </div>
      <div class="mb-3">
        <label for="categoryName" class="form-label">توضیحات دسته‌بندی</label>
        <input type="text" class="form-control" id="categoryName" name="description" value="<?= $category['description'] ?>">
      </div>
      <div class="mb-3">
        <label for="categoryImage" class="form-label">تصویر فعلی</label>
        <div class="mb-3">
          <img src="<?php echo $this->asset($category['img_url']) ?>" alt="تصویر دسته‌بندی" class="img-thumbnail" style="width: 150px; height: 150px;">
        </div>
        <label for="categoryImage" class="form-label">آپلود تصویر جدید</label>
        <input type="file" class="form-control" id="categoryImage" name="img_url">
      </div>
     
      <button type="submit" class="btn btn-warning">ذخیره تغییرات</button>
      <a href="<?php $this->url('/Category_panel_admin') ?>" class="btn btn-secondary">بازگشت</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
