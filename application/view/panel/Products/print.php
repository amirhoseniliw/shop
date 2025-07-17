<?php
// $posts = [...]; // داده‌های محصولات
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-3IkaL3UUPK2B0LPxG6+JcZssNm2s6rU1GQq9Ixu6EVtRxg2H3U/MK9yA3FQqh4pl" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<!-- Bootstrap JavaScript (اختیاری) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93Hdxr+GEeJeO2E+z6fB5OecEN7FiFWsf6+WwuvJe45Mi9wW0gGpEd+3+ZJp5j" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <style>
        body {
            font-family: Vazirmatn, Tahoma;
            padding: 20px;
            background: #fff;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }
        th {
            background: #f2f2f2;
        }
        .color-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 1px;
            border: 1px solid #ccc;
        }
        .thumb {
            width: 45px;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 0 4px #ccc;
        }
        .all-images {
            font-size: 9px;
            margin-top: 2px;
            direction: ltr;
            text-align: left;
            word-break: break-word;
            max-width: 120px;
            overflow-wrap: break-word;
        }
        @media print {
            body {
                zoom: 75%; /* تا جدول از صفحه نزنه بیرون */
            }
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

<h2 style="            text-align: center;
">لیست محصولات در سایت </h2>
<div class="d-flex">
    <a href="javascript:history.back()" class="btn btn-outline-dark btn-sm px-3 rounded-pill d-inline-flex align-items-center shadow-sm ms-auto">
        <i class="bi bi-arrow-right-short fs-5 ms-1"></i>
        بازگشت
    </a>
</div>
<table>
    <thead>
        <tr>
            <th>شناسه</th>
            <th>تصویر</th>
            <th>نام محصول</th>
            <th>دسته‌بندی</th>
            <th>برند</th>
            <th>قیمت (تومان)</th>
            <th>موجودی</th>
            <th>تعداد رنگ</th>
            <th>رنگ‌ها</th>
            <th>بازدید</th>
            <th>پرفروش؟</th>
            <th>آخرین تغییرات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $item): ?>
            <tr>
                <td><?= $item['product_id'] ?></td>
                <td>
                    <?php
                        $imgs = explode(',', $item['image_urls']);
                        $firstImg = trim($imgs[0]);
                        ob_start();
$this->asset($firstImg);
$imgSrc = ob_get_clean();
echo '<img src="' . $imgSrc . '" class="thumb"><br>';
                      
                       
                    ?>
                </td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars(trim($item['categoryname'])) ?></td>
                <td><?= htmlspecialchars($item['brand']) ?></td>
                <td><?= number_format($item['price']) ?></td>
                <td><?= $item['stock_qty'] ?></td>
                <td><?= count(explode(',', $item['colors'])) ?></td>
                <td>
                    <?php
                        $colors = explode(',', $item['colors']);
                        foreach ($colors as $c) {
                            if (!empty(trim($c))) {
                                echo '<span> ' . htmlspecialchars($c) . '</span>';
                            }
                        }
                    ?>
                </td>
                <td><?= $item['view'] ?></td>
                <td><?= $item['Bestseller'] === '1' ? '✅' : '❌' ?></td>
                <td>
    <?php echo 'ایجاد: ' . $this->jalaliData($item['created_at']) . '<br>آپدیت: ' . $this->jalaliData($item['updated_at']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<button onclick="window.print()">🖨 چاپ</button>



</body>
</html>
