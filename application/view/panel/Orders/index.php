<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سفارش‌ها - پنل مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: "IRANSans", Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
            right: 0;
            top: 0;
            padding-top: 60px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            transition: background-color 0.2s;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
        }

        .main-content {
            margin-right: 250px;
            padding: 20px;
        }

        .navbar {
            margin-right: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 0;
            }
            .main-content,
            .navbar {
                margin-right: 0;
            }
            table {
                display: none;
            }
            .card-order {
                display: block;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="text-center py-3">
        <h5>فروشگاه شما</h5>
    </div>
    <a href="<?= $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?= $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?= $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?= $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?= $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته‌بندی‌ها</a>
    <a href="<?= $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?= $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام‌ها</a>
    <a href="<?= $this->url('/adders_panel_admin/show_all') ?>"><i class="fas fa-money-bill"></i> قیمت پست‌ها</a>
    <a href="<?= $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>

<div class="main-content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
        <div class="container-fluid">
            <h5 class="m-0">مدیریت سفارشات پرداخت شده</h5>
        </div>
    </nav>

    <div class="container">
        <h3 class="mb-4 text-center">پرداخت‌های ثبت شده</h3>

        <!-- نمایش دسکتاپ -->
        <table class="table table-bordered table-hover text-center align-middle d-none d-md-table">
            <thead class="table-dark">
                <tr>
                    <th>کد تحویل</th>
                    <th>مشتری</th>
                    <th>شماره تلفن</th>
                    <th>آدرس</th>
                    <th>کد پستی</th>
                    <th>هزینه ارسال</th>
                    <th>تاریخ</th>
                    <th>وضعیت</th>
                    <th>جزئیات</th>
                    <th>تغییر وضعیت</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer_orders as $co): ?>
                    <tr>
                        <td><?= $co['delivery_code'] ?></td>
                        <td><?= $co['user_name'] ?></td>
                        <td><?= $co['phone_number'] ?></td>
                        <td><?= $co['province_name'] . " - " . $co['city_name'] . " - " .$co['address_title'] ?></td>
                        <td><?= $co['PostalCode'] ?></td>
                        <td><?= number_format($co['postal_price']) . ' تومان' ?></td>
                        <td><?= $this->jalaliData($co['created_at']) ?></td>
                        <td>
                            <span class="badge <?= match($co['status']) {
                                'InTransit' => 'bg-info',
                                'Delivered' => 'bg-success',
                                'canceled' => 'bg-danger',
                                'Paid' => 'bg-primary',
                                default => 'bg-secondary',
                            } ?>">
                                <?= match($co['status']) {
                                    'InTransit' => 'در حال ارسال',
                                    'Delivered' => 'تحویل داده شده',
                                    'canceled' => 'لغو شده',
                                    'Paid' => 'پرداخت‌شده',
                                    default => 'نامشخص',
                                } ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= $this->url('/Orders_panel_admin/show_orders/' . $co['delivery_code'] . '/' . $co['postal_price']) ?>" class="btn btn-sm btn-outline-secondary">نمایش</a>
                            <a href="<?= $this->url('/Orders_panel_admin/factor/' . $co['id']) ?>" class="btn btn-sm btn-outline-success">فاکتور</a>
                        </td>
                        <td>
                            <select class="form-select form-select-sm change-status" data-code="<?= $co['delivery_code'] ?>">
                                <option value="">وضعیت جدید</option>
                                <option value="InTransit" <?= $co['status'] === 'InTransit' ? 'selected' : '' ?>>در حال ارسال</option>
                                <option value="Delivered" <?= $co['status'] === 'Delivered' ? 'selected' : '' ?>>تحویل داده‌شده</option>
                                <option value="canceled" <?= $co['status'] === 'canceled' ? 'selected' : '' ?>>لغو شده</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- نمایش موبایل -->
        <div class="d-block d-md-none">
            <?php foreach ($customer_orders as $co): ?>
                <div class="card card-order border mb-3">
                    <div class="card-body">
                        <p><strong>کد تحویل:</strong> <?= $co['delivery_code'] ?></p>
                        <p><strong>مشتری:</strong> <?= $co['user_name'] ?> - <?= $co['phone_number'] ?></p>
                        <p><strong>آدرس:</strong> <?= $co['province_name'] . " - " . $co['city_name'] . " - " . $co['address_title'] ?></p>
                        <p><strong>کد پستی:</strong> <?= $co['PostalCode'] ?></p>
                        <p><strong>هزینه ارسال:</strong> <?= number_format($co['postal_price']) ?> تومان</p>
                        <p><strong>تاریخ:</strong> <?= $this->jalaliData($co['created_at']) ?></p>
                        <p><strong>وضعیت:</strong>
                            <span class="badge <?= match($co['status']) {
                                'InTransit' => 'bg-info',
                                'Delivered' => 'bg-success',
                                'canceled' => 'bg-danger',
                                'Paid' => 'bg-primary',
                                default => 'bg-secondary',
                            } ?>">
                                <?= match($co['status']) {
                                    'InTransit' => 'در حال ارسال',
                                    'Delivered' => 'تحویل داده شده',
                                    'canceled' => 'لغو شده',
                                    'Paid' => 'پرداخت‌شده',
                                    default => 'نامشخص',
                                } ?>
                            </span>
                        </p>
                        <div class="mb-2">
                            <a href="<?= $this->url('/Orders_panel_admin/show_orders/' . $co['delivery_code'] . '/' . $co['postal_price']) ?>" class="btn btn-sm btn-outline-secondary">نمایش</a>
                            <a href="<?= $this->url('/Orders_panel_admin/factor/' . $co['id']) ?>" class="btn btn-sm btn-outline-success">فاکتور</a>
                        </div>
                        <select class="form-select form-select-sm change-status" data-code="<?= $co['delivery_code'] ?>">
                            <option value="">وضعیت جدید</option>
                            <option value="InTransit" <?= $co['status'] === 'InTransit' ? 'selected' : '' ?>>در حال ارسال</option>
                            <option value="Delivered" <?= $co['status'] === 'Delivered' ? 'selected' : '' ?>>تحویل داده‌شده</option>
                            <option value="canceled" <?= $co['status'] === 'canceled' ? 'selected' : '' ?>>لغو شده</option>
                        </select>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('change', '.change-status', function () {
        const $this = $(this);
        const code = $this.data('code');
        const newStatus = $this.val();

        if (!newStatus) return;

        const baseUrl = "<?= $this->url('/Orders_panel_admin/change_status/') ?>";

        $.ajax({
            url: baseUrl + code + '/' + newStatus,
            method: 'POST',
            success: function () {
                alert('وضعیت با موفقیت تغییر کرد!');
                location.reload();
            },
            error: function (xhr) {
                alert('خطا در تغییر وضعیت سفارش!');
            }
        });
    });
</script>

</body>
</html>
