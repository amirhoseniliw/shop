<?php 
$mass  = ($this->flash('not_find'));
$massall = ($this->flash('not_find_all'));
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت محصولات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-3IkaL3UUPK2B0LPxG6+JcZssNm2s6rU1GQq9Ixu6EVtRxg2H3U/MK9yA3FQqh4pl" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93Hdxr+GEeJeO2E+z6fB5OecEN7FiFWsf6+WwuvJe45Mi9wW0gGpEd+3+ZJp5j" crossorigin="anonymous"></script>

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
            z-index: 999;
        }

        .add-button {
            margin-bottom: 20px;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px 14px;
            }

            .card h5 {
                font-size: 1.1rem;
            }

            .table th,
            .table td {
                font-size: 0.8rem;
                padding: 8px;
            }

            .back-button {
                left: 10px;
                bottom: 10px;
            }

            .table-responsive table thead {
                display: none;
            }

            .table-responsive table tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                border-radius: 10px;
                padding: 10px;
                background-color: #fff;
            }

            .table-responsive table tbody tr td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 6px 10px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .table-responsive table tbody tr td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #333;
            }

            .table-responsive table tbody tr td:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">مدیریت محصولات</h1>
<div class="position-relative" style="height: 100px;"> <!-- والد باید position-relative داشته باشه -->
    <a href="<?= $this->url('/Products_panel_admin/print_all' ) ?>" class="btn btn-success btn-sm px-3 rounded-pill d-inline-flex align-items-center shadow-sm position-absolute top-0 end-0 m-2">
        <i class="bi bi-bar-chart-line fs-5 ms-1"></i>
        گزارش‌گیری
    </a>
</div>


        <div class="text-end">
            <a href="<?= $this->url('/Products_panel_admin/products_create') ?>" class="btn btn-primary add-button">ایجاد محصول جدید</a>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>جستجو و فیلتر محصولات</h5>
            </div>
            <p style="color: red;text-align: center;">
                <?php if ($massall) echo $massall; ?>
            </p>
            <div class="card-body">
                <form class="row g-3" method="post" action="<?= $this->url('/Products_panel_admin/product_find') ?>">
                    <div class="col-12 col-md-4">
                        <label for="productName" class="form-label">نام محصول</label>
                        <input type="text" name="productName" id="productName" class="form-control" placeholder="نام محصول را وارد کنید">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="brand" class="form-label">برند</label>
                        <input type="text" name="brand" id="brand" class="form-control" placeholder="برند محصول را وارد کنید">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">جستجو براساس نام و برند</button>
                    </div>
                </form>

                <hr>

                <p style="color: red; text-align: center;">
                    <?php if ($mass) echo $mass; ?>
                </p>

                <form class="row g-3" method="post" action="<?= $this->url('/Products_panel_admin/product_find') ?>">
                    <div class="col-12 col-md-4">
                        <label for="productId" class="form-label">آیدی محصول</label>
                        <input type="text" name="productId" id="productId" class="form-control" placeholder="آیدی محصول را وارد کنید">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">جستجو براساس آیدی</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5>لیست محصولات</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>آیدی</th>
                                <th>آیدی کاربر</th>
                                <th>نام محصول</th>
                                <th>برند</th>
                                <th>توضیحات</th>
                                <th>عکس</th>
                                <th>رنگ</th>
                                <th>قیمت</th>
                                <th>موجودی</th>
                                <th>نام دسته‌بندی</th>
                                <th>بازدید</th>
                                <th>پرفروش</th>
                                <th>انتخاب شده</th>
                                <th>وضعیت</th>
                                <th>تاریخ تغییر</th>
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
                                    <td><?= mb_strimwidth(strip_tags($post['description']), 0, 30, '...') ?></td>
                                    <td>
                                        <?php 
                                        if ($post['image_urls']) {
                                            $images = explode(',', $post['image_urls']);
                                            foreach ($images as $img) { ?>
                                                <a href="<?=  $this->asset($img)  ?>" target='_blank'><img src="<?=  $this->asset($img)  ?>" alt='محصول' width='60'></a> 
                                        <?php }
                                        } else {
                                            echo "<span class='text-danger'>عکس ندارد</span>";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($post['colors']) {
                                            foreach (explode(',', $post['colors']) as $color) {
                                                $bg = ($color === 'hue') 
                                                    ? 'linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet)' 
                                                    : $color;
                                                echo "<div style='width: 30px; height: 30px; background: {$bg}; margin: auto;'></div><br>";
                                            }
                                        } else {
                                            echo "<span class='text-danger'>رنگ ندارد</span>";
                                        } ?>
                                    </td>
                                    <td><?= number_format($post['price']) ?> تومان</td>
                                    <td 
                                        data-bs-toggle="tooltip"
                                        data-bs-html="true"
                                        title="<?php
                                            $tooltip = '';
                                            foreach ($colors_posts_stock as $item) {
                                                if ($item['product_id'] == $post['product_id']) {
                                                    $tooltip .= '<div><strong>' . $item['titel_name'] . '</strong>: ' . $item['stock'] . '</div>';
                                                }
                                            }
                                            echo htmlspecialchars($tooltip, ENT_QUOTES, 'UTF-8');
                                        ?>">
                                        <?= $post['stock_qty'] ?>
                                    </td>
                                    <td><?= $post['categoryname'] ?></td>
                                    <td><?= $post['view'] ?></td>
                                    <td>
                                        <?php if ($post['Bestseller'] == 0) { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_Bestseller/' . $post['product_id']) ?>"><button class="btn btn-success btn-sm">افزودن</button></a>
                                            <p>نیست</p>
                                        <?php } else { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_Bestseller/' . $post['product_id']) ?>"><button class="btn btn-danger btn-sm">حذف</button></a>
                                            <p>هست</p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($post['Selected'] == 0) { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_Selected/' . $post['product_id']) ?>"><button class="btn btn-success btn-sm">افزودن</button></a>
                                            <p>نیست</p>
                                        <?php } else { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_Selected/' . $post['product_id']) ?>"><button class="btn btn-danger btn-sm">حذف</button></a>
                                            <p>هست</p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($post['status'] == 'disable') { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_status/' . $post['product_id']) ?>"><button class="btn btn-success btn-sm">فعال</button></a>
                                            <p>فعال نیست</p>
                                        <?php } else { ?>
                                            <a href="<?= $this->url('/Products_panel_admin/products_status/' . $post['product_id']) ?>"><button class="btn btn-danger btn-sm">غیرفعال</button></a>
                                            <p>فعال است</p>
                                        <?php } ?>
                                    </td>
                                    <td><?= $this->jalaliData($post['updated_at']) ?></td>
                                    <td>
                                        <a href="<?= $this->url('/Products_panel_admin/products_edit/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">ویرایش</button></a>
                                        <a href="<?= $this->url('/Products_panel_admin/add_mor_img/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">عکس</button></a>
                                        <a href="<?= $this->url('/Products_panel_admin/add_color/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">رنگ</button></a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id'] ?>)">حذف</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= $this->url('/Panel_admin') ?>" class="btn btn-secondary back-button">بازگشت</a>

    <script>
        function deleteRecord(id) {
            if (confirm('آیا اطمینان دارید که می‌خواهید رکورد را حذف کنید؟')) {
                window.location.href = 'Products_panel_admin/products_delete/' + id;
            } else {
                alert('عملیات حذف لغو شد.');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
