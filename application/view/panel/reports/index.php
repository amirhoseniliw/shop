<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارشات فروشگاهی</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            direction: rtl;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-top: 40px;
        }

        .header h1 {
            font-size: 2em;
            color: #333;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .card-header {
            font-size: 1.6em;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .col {
            flex: 1;
        }

        /* برای نمودار */
        .chart-container {
            position: relative;
            height: 300px;
            border-radius: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .chart-bar {
            position: absolute;
            bottom: 0;
            width: 40px;
            background-color: #4CAF50;
            border-radius: 5px 5px 0 0;
            text-align: center;
            color: #fff;
            padding-top: 10px;
        }

        /* نمودار فروش هفتگی */
        .weekly-sales {
            display: flex;
            justify-content: space-between;
            height: 300px;
            padding: 20px;
        }

        .weekly-sales .bar {
            width: 40px;
            background-color: #4CAF50;
            border-radius: 5px 5px 0 0;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            position: relative;
        }

        .weekly-sales .bar span {
            position: absolute;
            bottom: -25px;
            color: #333;
        }

        /* نمودار درآمد ماهانه */
        .monthly-revenue {
            display: flex;
            justify-content: space-between;
            height: 300px;
            padding: 20px;
        }

        .monthly-revenue .bar {
            width: 40px;
            background-color: #FF6347;
            border-radius: 5px 5px 0 0;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            position: relative;
        }

        .monthly-revenue .bar span {
            position: absolute;
            bottom: -25px;
            color: #333;
        }

        /* جداول */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* سبک‌دهی به جدول وضعیت سفارش‌ها */
        .status-table td {
            font-size: 1.1em;
        }

        .status-table .completed {
            background-color: #28a745;
            color: white;
        }

        .status-table .pending {
            background-color: #ffc107;
            color: white;
        }

        .status-table .canceled {
            background-color: #dc3545;
            color: white;
        }
        .btn {
            border-radius: 20px;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }

        .add-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>گزارشات فروشگاهی</h1>
    </div>

    <!-- بخش فروش هفتگی -->
    <div class="card">
        <div class="card-header">فروش هفتگی</div>
        <div class="card-body">
            <div class="weekly-sales">
                <div class="bar" style="height: 10px;">
                    <span>شنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>یکشنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>دوشنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>سه‌شنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>چهارشنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>پنج‌شنبه</span>
                </div>
                <div class="bar" style="height: 10px;">
                    <span>جمعه</span>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش محصولات پرفروش -->
    <div class="container">
        <h2>محصولات پرفروش</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام محصول</th>
                        <th>تعداد فروش</th>
                        <th>قیمت (تومان)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($products) {
                       
                    ?>
                  <?php
                  $int = 0 ;
                  foreach($products AS $product) {
                    $int += 1;
                   ?>
                  
                    <tr>
                        <td><?= $int ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['total_sales'] ?></td>
                        <td><?= $product['price'] *  $product['total_sales'] ?></td>
                    </tr>
                     
                 <?php  } }
                 else {?>


    <h2 style="color: red; ">رکوردی وجود ندارد :(</h2>

<?php }?>


                </tbody>
            </table>
        </div>
    </div>

    <!-- گزارش درآمد ماهانه -->
    <!-- <div class="card">
        <div class="card-header">درآمد ماهانه</div>
        <div class="card-body">
            <div class="monthly-revenue">
                <div class="bar" style="height: 30%;">
                    <span>فروردین</span>
                </div>
                <div class="bar" style="height: 50%;">
                    <span>اردیبهشت</span>
                </div>
                <div class="bar" style="height: 60%;">
                    <span>خرداد</span>
                </div>
                <div class="bar" style="height: 80%;">
                    <span>تیر</span>
                </div>
                <div class="bar" style="height: 70%;">
                    <span>مرداد</span>
                </div>
                <div class="bar" style="height: 90%;">
                    <span>شهریور</span>
                </div>
                <div class="bar" style="height: 85%;">
                    <span>مهر</span>
                </div>
                <div class="bar" style="height: 95%;">
                    <span>آبان</span>
                </div>
                <div class="bar" style="height: 100%;">
                    <span>آذر</span>
                </div>
                <div class="bar" style="height: 110%;">
                    <span>دی</span>
                </div>
                <div class="bar" style="height: 120%;">
                    <span>بهمن</span>
                </div>
                <div class="bar" style="height: 130%;">
                    <span>اسفند</span>
                </div>
            </div>
        </div>
    </div> -->

    <!-- گزارش وضعیت سفارش‌ها -->
    <div class="card">
        <div class="card-header">وضعیت سفارش‌ها</div>
        <div class="card-body">
            <table class="status-table">
                <thead>
                    <tr>
                        <th>وضعیت</th>
                        <th>تعداد</th>
                        <th>درصد</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="completed">
                        <td>تحویل شده</td>
                        <td><?= $orders['completed_orders'] ?></td>
                        <td><?= $orders['completed_percentage'] ?>%</td>
                    </tr>
                    <tr class="pending">
                        <td>در انتظار</td>
                        <td><?= $orders['pending_percentage'] ?></td>
                        <td><?= $orders['pending_percentage'] ?>%</td>
                    </tr>
                    <tr class="canceled">
                        <td>لغو شده</td>
                        <td><?= $orders['canceled_orders'] ?></td>
                        <td><?= $orders['canceled_percentage'] ?>%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>
<a href="<?php $this->url('/panel') ?>" class="btn btn-secondary back-button">بازگشت</a>
