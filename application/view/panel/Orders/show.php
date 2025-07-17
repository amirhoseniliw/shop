<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات سفارش</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        @media (max-width: 768px) {
            .table-responsive-custom {
                display: none;
            }
            .mobile-card {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .mobile-card {
                display: none;
            }
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">جزئیات سفارش</h1>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>اطلاعات سفارش</h5>
        </div>
        <div class="card-body">
            <p><strong>شماره سفارش:</strong> <?= $order['order_id'] ?></p>
            <p><strong>نام مشتری:</strong> <?= $order['username'] ?></p>
            <p><strong>تاریخ سفارش:</strong> <?= $this->jalaliData($order['updated_at']) ?></p>
            <p><strong>مبلغ کل:</strong> <?= number_format($order['unit_price']) ?> تومان</p>
            <p><strong>وضعیت:</strong>
                <?php if ($order['status'] == 'pending') { ?>
                    <span class="badge bg-warning">در انتظار</span>
                <?php } elseif ($order['status'] == 'completed') { ?>
                    <span class="badge bg-success">کامل شد</span>
                <?php } else { ?>
                    <span class="badge bg-danger">لغو شد</span>
                <?php } ?>
            </p>
            <p><strong>آدرس ارسال:</strong></p>
            <p><strong>عنوان:</strong> <?= $order['address_title'] ?></p>
            <p><strong>آدرس دقیق:</strong> <?= $order['address_body'] ?></p>
        </div>
    </div>

    <!-- Desktop Table -->
    <div class="card table-responsive-custom">
        <div class="card-header bg-secondary text-white">
            <h5>جزئیات محصولات</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>عکس</th>
                    <th>تعداد</th>
                    <th>برند</th>
                    <th>قیمت واحد</th>
                    <th>قیمت کل</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $order['name'] ?></td>
                    <td>
                        <?php $imageUrlsArrays = explode(',', $order['image_urls']);
                        foreach ($imageUrlsArrays as $img): ?>
                            <img src="<?= $this->asset(trim($img)) ?>" alt="محصول" width="50">
                        <?php endforeach; ?>
                    </td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['brand'] ?></td>
                    <td><?= number_format($order['unit_price']) ?> تومان</td>
                    <td><?= number_format($order['total_price']) ?> تومان</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile Card -->
    <div class="mobile-card">
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                <h6>جزئیات محصول</h6>
            </div>
            <div class="card-body">
                <p><strong>نام:</strong> <?= $order['name'] ?></p>
                <p><strong>برند:</strong> <?= $order['brand'] ?></p>
                <p><strong>تعداد:</strong> <?= $order['quantity'] ?></p>
                <p><strong>قیمت واحد:</strong> <?= number_format($order['unit_price']) ?> تومان</p>
                <p><strong>قیمت کل:</strong> <?= number_format($order['total_price']) ?> تومان</p>
                <div>
                    <strong>عکس‌ها:</strong><br>
                    <?php foreach ($imageUrlوsArrays as $img): ?>
                        <img src="<?= $this->asset(trim($img)) ?>" alt="محصول" class="mb-2" width="80">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="<?= $this->url('/Orders_panel_admin') ?>" class="btn btn-secondary">بازگشت به لیست سفارش‌ها</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
