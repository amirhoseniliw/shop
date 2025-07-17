<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>چاپ لیست کاربران</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            direction: rtl;
            font-family: "Vazirmatn", "Tahoma", sans-serif;
            font-size: 13px;
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 15mm;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
            table {
                page-break-inside: auto;
                width: 100% !important;
                table-layout: fixed;
                word-wrap: break-word;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }

        table {
            width: 100%;
        }

        table th,
        table td {
            text-align: right !important;
            vertical-align: middle !important;
            font-size: 12px;
            padding: 6px;
        }

        img.rounded-circle {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-white p-3 text-end">

<div class="d-flex justify-content-between align-items-center mb-4 no-print">
    <a href="javascript:history.back()" class="btn btn-outline-dark btn-sm px-3 rounded-pill d-inline-flex align-items-center shadow-sm">
        <i class="bi bi-arrow-right-short fs-5 ms-1"></i>
        بازگشت
    </a>
    <button onclick="window.print()" class="btn btn-success btn-sm px-3 rounded-pill d-inline-flex align-items-center shadow-sm">
        <i class="bi bi-printer fs-5 ms-1"></i>
        چاپ صفحه
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-end">
        <thead class="table-light">
        <tr>
            <th>کد</th>
            <th>عکس</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>تلفن</th>
            <th>نوع</th>
            <th>وضعیت</th>
            <th>تعداد خرید ها </th>
            <th>آدرس کامل</th>
            <th>تاریخ ثبت‌نام</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <?php
            $fullAddress = $user['state_name'] . ' - ' . $user['city_name'] . ' - ' . $user['latest_address'];
            ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                
                <td><?php if (!empty($user['img_prof'])): ?>
    <img src="<?= $user['img_prof'] ?>" class="rounded-circle">
<?php else: ?>
    <img src="<?php $this->asset('/img_site/icon/avatar.png'); ?>" class="rounded-circle">
<?php endif; ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= $user['email'] ?: '—' ?></td>
                <td><?= htmlspecialchars($user['phone_number']) ?></td>
                <td><?= $user['user_type'] === 'admin' ? 'ادمین' : 'مشتری' ?></td>
                <td><?= $user['status'] === 'active' ? 'فعال' : 'غیرفعال' ?></td>
                <td><?= $user['paid_order_count'] ?></td>
                <td><?= htmlspecialchars($fullAddress) ?></td>
                <td><?php echo $this->jalaliData( $user['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
