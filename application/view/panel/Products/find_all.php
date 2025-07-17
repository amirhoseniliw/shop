<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت محصولات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            border-radius: 20px;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }

        /* مخفی کردن جدول دسکتاپ در موبایل */
        @media (max-width: 768px) {
            .desktop-table {
                display: none;
            }
        }

        /* مخفی کردن جدول موبایل در دسکتاپ */
        @media (min-width: 769px) {
            .mobile-table {
                display: none;
            }
        }

        .mobile-product {
            border: 1px solid #ccc;
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
        }

        .mobile-product .row {
            border-bottom: 1px solid #eee;
            padding: 6px 0;
        }

        .mobile-product .row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">مدیریت محصولات</h1>

    <div class="text-end mb-3">
        <a href="<?php $this->url('/Products_panel_admin/products_create') ?>" class="btn btn-primary">ایجاد محصول جدید</a>
        <a href="<?php $this->url('/Products_panel_admin') ?>" class="btn btn-secondary">بازگشت</a>
    </div>

    <!-- جدول دسکتاپ -->
    <div class="card desktop-table">
        <div class="card-header bg-secondary text-white">
            لیست محصولات
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>آیدی</th>
                        <th>ایدی کاربر</th>
                        <th>نام محصول</th>
                        <th>برند</th>
                        <th>توضیحات</th>
                        <th>قیمت</th>
                        <th>موجودی</th>
                        <th>دسته‌بندی</th>
                        <th>بازدید</th>
                        <th>پرفروش</th>
                        <th>منتخب</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <td><?= $post['product_id'] ?></td>
                        <td><?= $post['user_id'] ?></td>
                        <td><?= $post['name'] ?></td>
                        <td><?= $post['brand'] ?></td>
                        <td><?= $post['description'] ?></td>
                        <td><?= $post['price'] ?> تومان</td>
                        <td><?= $post['stock_qty'] ?></td>
                        <td><?= $post['category'] ?></td>
                        <td><?= $post['view'] ?></td>
                        <td><?= $post['Bestseller'] ? '✅' : '❌' ?></td>
                        <td><?= $post['Selected'] ? '✅' : '❌' ?></td>
                        <td><?= $post['status'] == 'disable' ? 'غیرفعال' : 'فعال' ?></td>
                        <td><?= $this->jalaliData($post['updated_at']) ?></td>
                        <td>
                            <a href="<?php $this->url('/Products_panel_admin/products_edit/' . $post['product_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
                            <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id'] ?>)">حذف</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- نمایش عمودی برای موبایل -->
    <div class="mobile-table">
        <?php foreach ($posts as $post) { ?>
        <div class="mobile-product">
            <div class="row"><div class="col-5 label">آیدی:</div><div class="col-7"><?= $post['product_id'] ?></div></div>
            <div class="row"><div class="col-5 label">آیدی کاربر:</div><div class="col-7"><?= $post['user_id'] ?></div></div>
            <div class="row"><div class="col-5 label">نام محصول:</div><div class="col-7"><?= $post['name'] ?></div></div>
            <div class="row"><div class="col-5 label">برند:</div><div class="col-7"><?= $post['brand'] ?></div></div>
            <div class="row"><div class="col-5 label">توضیحات:</div><div class="col-7"><?= $post['description'] ?></div></div>
            <div class="row"><div class="col-5 label">قیمت:</div><div class="col-7"><?= $post['price'] ?> تومان</div></div>
            <div class="row"><div class="col-5 label">موجودی:</div><div class="col-7"><?= $post['stock_qty'] ?></div></div>
            <div class="row"><div class="col-5 label">دسته‌بندی:</div><div class="col-7"><?= $post['category'] ?></div></div>
            <div class="row"><div class="col-5 label">بازدید:</div><div class="col-7"><?= $post['view'] ?></div></div>
            <div class="row"><div class="col-5 label">پرفروش:</div><div class="col-7"><?= $post['Bestseller'] ? '✅' : '❌' ?></div></div>
            <div class="row"><div class="col-5 label">منتخب:</div><div class="col-7"><?= $post['Selected'] ? '✅' : '❌' ?></div></div>
            <div class="row"><div class="col-5 label">وضعیت:</div><div class="col-7"><?= $post['status'] == 'disable' ? 'غیرفعال' : 'فعال' ?></div></div>
            <div class="row"><div class="col-5 label">تاریخ:</div><div class="col-7"><?= $this->jalaliData($post['updated_at']) ?></div></div>
            <div class="row mt-2">
                <div class="col text-end">
                    <a href="<?php $this->url('/Products_panel_admin/products_edit/' . $post['product_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id'] ?>)">حذف</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<a href="<?php $this->url('/Panel_admin') ?>" class="btn btn-secondary back-button">بازگشت</a>

<script>
    function deleteRecord(id) {
        if (confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟')) {
            window.location.href = 'products_delete/' + id;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
