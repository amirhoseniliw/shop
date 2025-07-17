<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت محصولات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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

        .add-button {
            margin-bottom: 20px;
        }

        .desktop-table {
            display: block;
        }

        .mobile-table {
            display: none;
        }

        @media (max-width: 768px) {
            .desktop-table {
                display: none;
            }

            .mobile-table {
                display: block;
            }

            .mobile-product {
                background: #fff;
                padding: 15px;
                border-radius: 12px;
                box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                font-size: 0.9rem;
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
                color: #444;
            }

            .mobile-actions {
                text-align: center;
                margin-top: 10px;
            }

            .mobile-actions .btn {
                margin: 2px;
                font-size: 0.8rem;
                padding: 4px 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">مدیریت محصولات</h1>

        <!-- دکمه‌ها -->
        <div class="text-end mb-3">
            <a href="<?php $this->url('/Products_panel_admin/products_create') ?>" class="btn btn-primary add-button">ایجاد محصول جدید</a>
            <a href="<?php $this->url('/Products_panel_admin') ?>" class="btn btn-secondary">بازگشت</a>
        </div>

        <!-- نمایش برای دسکتاپ (جدول افقی) -->
        <div class="card desktop-table">
            <div class="card-header bg-secondary text-white">
                <h5>لیست محصولات</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>آیدی</th>
                            <th>آیدی کاربر</th>
                            <th>نام</th>
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
                        <tr>
                            <td><?= $posts['product_id'] ?></td>
                            <td><?= $posts['user_id'] ?></td>
                            <td><?= $posts['name'] ?></td>
                            <td><?= $posts['brand'] ?></td>
                            <td><?= $posts['description'] ?></td>
                            <td><?= $posts['price'] ?> تومان</td>
                            <td><?= $posts['stock_qty'] ?></td>
                            <td><?= $posts['category'] ?></td>
                            <td><?= $posts['view'] ?></td>
                            <td><?= $posts['Bestseller'] ? '✅' : '❌' ?></td>
                            <td><?= $posts['Selected'] ? '✅' : '❌' ?></td>
                            <td><?= $posts['status'] == 'disable' ? 'غیرفعال' : 'فعال' ?></td>
                            <td><?= $this->jalaliData($posts['updated_at']) ?></td>
                            <td>
                                <a href="<?php $this->url('/Products_panel_admin/products_edit/' . $posts['product_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
                                <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $posts['product_id'] ?>)">حذف</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- نمایش برای موبایل (عمودی) -->
        <div class="mobile-table">
            <div class="mobile-product">
                <div class="row"><div class="col-5 label">آیدی:</div><div class="col-7"><?= $posts['product_id'] ?></div></div>
                <div class="row"><div class="col-5 label">آیدی کاربر:</div><div class="col-7"><?= $posts['user_id'] ?></div></div>
                <div class="row"><div class="col-5 label">نام:</div><div class="col-7"><?= $posts['name'] ?></div></div>
                <div class="row"><div class="col-5 label">برند:</div><div class="col-7"><?= $posts['brand'] ?></div></div>
                <div class="row"><div class="col-5 label">توضیحات:</div><div class="col-7"><?= $posts['description'] ?></div></div>
                <div class="row"><div class="col-5 label">قیمت:</div><div class="col-7"><?= $posts['price'] ?> تومان</div></div>
                <div class="row"><div class="col-5 label">موجودی:</div><div class="col-7"><?= $posts['stock_qty'] ?></div></div>
                <div class="row"><div class="col-5 label">دسته‌بندی:</div><div class="col-7"><?= $posts['category'] ?></div></div>
                <div class="row"><div class="col-5 label">بازدید:</div><div class="col-7"><?= $posts['view'] ?></div></div>
                <div class="row"><div class="col-5 label">پرفروش:</div><div class="col-7"><?= $posts['Bestseller'] ? '✅' : '❌' ?></div></div>
                <div class="row"><div class="col-5 label">منتخب:</div><div class="col-7"><?= $posts['Selected'] ? '✅' : '❌' ?></div></div>
                <div class="row"><div class="col-5 label">وضعیت:</div><div class="col-7"><?= $posts['status'] == 'disable' ? 'غیرفعال' : 'فعال' ?></div></div>
                <div class="row"><div class="col-5 label">تاریخ:</div><div class="col-7"><?= $this->jalaliData($posts['updated_at']) ?></div></div>
                <div class="mobile-actions">
                    <a href="<?php $this->url('/Products_panel_admin/products_edit/' . $posts['product_id']) ?>" class="btn btn-warning btn-sm">ویرایش</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $posts['product_id'] ?>)">حذف</button>
                </div>
            </div>
        </div>
    </div>

    <a href="<?php $this->url('/Panel_admin') ?>" class="btn btn-secondary back-button">بازگشت</a>

    <script>
        function deleteRecord(id) {
            if (confirm('آیا اطمینان دارید که می‌خواهید این محصول را حذف کنید؟')) {
                window.location.href = 'products_delete/' + id;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
