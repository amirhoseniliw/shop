<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>جزئیات سفارش‌ها</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
            top: 0;
            right: 0;
            z-index: 1050;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-right: 250px;
            padding: 20px;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .color-box {
            width: 25px;
            height: 25px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
        }

        .sidebar-toggle {
            display: none;
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
                padding: 10px;
            }

            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 10px;
                right: 10px;
                background-color: #343a40;
                color: white;
                border: none;
                padding: 10px 15px;
                z-index: 1100;
                border-radius: 5px;
            }

            .table {
                display: none;
            }

            .responsive-cards .card {
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                padding: 1rem;
                border-radius: 0.5rem;
                background-color: #fff;
            }

            .responsive-cards .card-title {
                font-weight: bold;
            }

            .responsive-cards .row > div {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>

<body>

<button class="sidebar-toggle d-md-none" onclick="document.querySelector('.sidebar').classList.toggle('show')">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar">
    <div class="text-center py-4">
        <h4>فروشگاه شما</h4>
    </div>
    <a href="<?= $this->url('/Panel_admin') ?>"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?= $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?= $this->url('/Orders_panel_admin') ?>" class="active"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?= $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?= $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته‌بندی‌ها</a>
    <a href="<?= $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?= $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام‌ها</a>
    <a href="<?= $this->url('/adders_panel_admin/show_all') ?>"><i class="fas fa-money-bill"></i> قیمت پست‌ها</a>
    <a href="<?= $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

<div class="main-content">
    <div class="container mt-4">
        <h3 class="mb-4 text-center">جزئیات سفارش‌ها</h3>

        <?php if (!empty($orders)) {
            $totalOrderAmount = 0;
        ?>
            <div class="d-none d-md-block table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>نام محصول</th>
                            <th>نام برند</th>
                            <th>توضیحات</th>
                            <th>قیمت خود محصول</th>
                            <th>تعداد موجودی</th>
                            <th>عکس</th>
                            <th>رنگ</th>
                            <th>تعداد سفارش</th>
                            <th>قیمت واحد</th>
                            <th>قیمت کل</th>
                            <th>تاریخ ساخت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) {
                            $totalOrderAmount += (int)$order['total_price'];
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($order['name']) ?></td>
                                <td><?= htmlspecialchars($order['brand']) ?></td>
                                <td><?= htmlspecialchars($order['description']) ?></td>
                                <td><?= number_format($order['price']) ?> تومان</td>
                                <td><?= (int)$order['stock_qty'] ?></td>
                                <td>
                                    <?php if (!empty($order['image_url'])): ?>
                                        <img src="<?= $this->asset($order['image_url']) ?>" class="product-image">
                                    <?php else: ?>
                                        <span class="text-muted">ندارد</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $hex = isset($order['hex_value']) ? trim($order['hex_value']) : '';
                                    $hex = htmlspecialchars($hex);
                                    if ($hex === 'hue') {
                                        $style = 'background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);';
                                    } elseif (preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $hex)) {
                                        $style = "background: $hex;";
                                    } else {
                                        $style = "background: #ccc;";
                                    }
                                    echo "<span class='color-box' style=\"$style\"></span>";
                                    ?>
                                </td>
                                <td><?= (int)$order['quantity'] ?></td>
                                <td><?= number_format($order['unit_price']) ?> تومان</td>
                                <td><?= number_format($order['total_price']) ?> تومان</td>
                                <td><?= $this->jalaliData($order['created_at']) ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="table-success fw-bold">
                            <td colspan="9" class="text-end">جمع کل سفارش‌ها + هزینه پست</td>
                            <td colspan="2"><?= number_format($totalOrderAmount + (int)$post) ?> تومان</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="responsive-cards d-md-none">
                <?php foreach ($orders as $order) {
                    $totalOrderAmount += (int)$order['total_price'];
                ?>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($order['name']) ?></h5>
                            <p><strong>برند:</strong> <?= htmlspecialchars($order['brand']) ?></p>
                            <p><strong>توضیحات:</strong> <?= htmlspecialchars($order['description']) ?></p>
                            <p><strong>قیمت محصول:</strong> <?= number_format($order['price']) ?> تومان</p>
                            <p><strong>موجودی:</strong> <?= (int)$order['stock_qty'] ?></p>
                            <p><strong>عکس:</strong><br>
                                <?php if (!empty($order['image_url'])): ?>
                                    <img src="<?= $this->asset($order['image_url']) ?>" class="product-image">
                                <?php else: ?>
                                    <span class="text-muted">ندارد</span>
                                <?php endif; ?>
                            </p>
                            <p><strong>رنگ:</strong>
                                <?php
                                $hex = isset($order['hex_value']) ? trim($order['hex_value']) : '';
                                $hex = htmlspecialchars($hex);
                                if ($hex === 'hue') {
                                    $style = 'background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);';
                                } elseif (preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $hex)) {
                                    $style = "background: $hex;";
                                } else {
                                    $style = "background: #ccc;";
                                }
                                echo "<span class='color-box' style=\"$style\"></span>";
                                ?>
                            </p>
                            <p><strong>تعداد:</strong> <?= (int)$order['quantity'] ?></p>
                            <p><strong>قیمت واحد:</strong> <?= number_format($order['unit_price']) ?> تومان</p>
                            <p><strong>قیمت کل:</strong> <?= number_format($order['total_price']) ?> تومان</p>
                            <p><strong>تاریخ ساخت:</strong> <?= $this->jalaliData($order['created_at']) ?></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="alert alert-success mt-3 text-center">
                    جمع کل سفارش‌ها + پست: <?= number_format($totalOrderAmount + (int)$post) ?> تومان
                </div>
            </div>

            <a href="<?= $this->url('/Orders_panel_admin') ?>" class="btn btn-sm btn-outline-primary mt-3">
                <i class="fas fa-eye"></i> بازگشت 
            </a>
        <?php } else { ?>
            <div class="alert alert-info text-center">هیچ سفارشی یافت نشد.</div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
