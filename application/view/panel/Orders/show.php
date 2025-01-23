<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات سفارش</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">جزئیات سفارش</h1>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5>اطلاعات سفارش</h5>
            </div>
            <div class="card-body">
                <p><strong>شماره سفارش:</strong> <?= $order['order_id'] ?></p>
                <p><strong>نام مشتری:</strong> <?= $order['nameuser'] ?></p>
                <p><strong>تاریخ سفارش:</strong> <?php echo $this->jalaliData($order['updated_at']) ;?></p>
                <p><strong>مبلغ کل:</strong> <?=$order['unit_price'] ?> تومان</p>
                <p> <strong> وضعیت :</strong>
                
                <?php if($order['status'] == 'pending') {?>
                            <span class="badge bg-warning">در انتظار </span>
                            <?php } elseif ($order['status'] == 'completed') {  ?>
                            <span class="badge bg-success">کامل شد </span> <?php } else { ?>
                            <span class="badge bg-danger">لغو شد</span> <?php }?></p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                <h5>جزئیات محصولات</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
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
                            <td><?= $order['product_name'] ?></td>
                            <td><img src="<?= $this->asset($order['image_url']) ?>" alt="محصول" width="50"></td>
                            <td><?= $order['quantity'] ?></td>
                            <td><?= $order['product_brand'] ?></td>
                            <td><?= $order['unit_price'] ?> تومان</td>
                            <td><?= $order['total_price'] ?> تومان</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="<?php $this->url('/orders') ?>" class="btn btn-secondary">بازگشت به لیست سفارش‌ها</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
