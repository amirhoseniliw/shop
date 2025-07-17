<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>فاکتور خرید</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdn.fontcdn.ir/Font/Persian/Vazirmatn/Vazirmatn.css" rel="stylesheet">

  <style>
    body {
        font-family: 'Vazirmatn', sans-serif;    direction: rtl;
    text-align: right;
      font-size: 11px;
      background-color: #fff;
      padding: 20px;
    }

    .invoice-container {
      max-width: 960px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 60px;
      margin-bottom: 10px;
    }

    .header h4 {
      font-weight: bold;
      margin: 0;
    }

    .meta-info {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .meta-info div {
      font-size: 12px;
    }

    .info-box {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 15px;
    }

    .info-title {
      font-weight: bold;
      margin-bottom: 8px;
      font-size: 12px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 4px;
    }

    .info-content p {
      margin: 0;
      font-size: 11px;
    }

    table {
      font-size: 10px;
    }

    table th, table td {
      text-align: center;
      padding: 6px;
    }

    .summary-box {
      border: 1px solid #ccc;
      padding: 10px;
      margin-top: 10px;
      font-size: 12px;
    }

    .note-box {
      margin-top: 10px;
      font-size: 10px;
      color: #555;
      border: 1px dashed #999;
      padding: 8px;
    }

    .signature {
      margin-top: 40px;
      font-size: 11px;
    }

    @media print {
      .print-btn {
        display: none;
      }

      body {
        margin: 0;
      }
    }

    .print-btn {
      text-align: center;
      margin-top: 20px;
    }
  </style>

</head>
<body>
<div class="invoice-container" id="invoice">

  <!-- سربرگ -->
  <div class="header">
    <img src="<?php echo $this->asset('/img_site/icon/icon.png') ?>" alt="لوگو">
    <h4>فاکتور رسمی فروش کالا</h4>
  </div>

  <!-- اطلاعات فنی -->
  <div class="meta-info">
  <div>شماره فاکتور: <strong><?=  $factor['factor_number'] .'#' ?></strong></div>
  <div>تاریخ صدور: <strong><?php echo $this->jalaliData($factor['created_at']) ?></strong></div>


  </div>

  <!-- مشخصات طرفین -->
  <div class="row">
    <div class="col-md-6">
      <div class="info-box">
        <div class="info-title">مشخصات فروشنده</div>
        <div class="info-content">
          <p>نام: فروشگاه تحریر خیام </p>
          <p>شماره تماس: 04142264340</p>
          <p>آدرس: اذربایجان شرقی  مرند</p>
          <p>کدپستی: 5413956353</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="info-box">
        <div class="info-title">مشخصات خریدار</div>
        <div class="info-content">
          <p>نام:  <?=  $customer_orders['user_name'] ?></p>
          <p>شماره تماس: <?=  $customer_orders['phone_number'] ?></p>
          <p>ادرس کامل :  <?= $customer_orders['province_name'] . ' - ' . $customer_orders['city_name'] . ' - ' . $customer_orders['address_title'] ?></p>
          <p>کدپستی: <?= $customer_orders['PostalCode'] ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- جدول کالا -->
  <table class="table table-bordered table-sm mt-2">
    <thead class="table-secondary">
      <tr>
        <th>نام محصول</th>
        <th>برند</th>
        <th>توضیح</th>
        <th>رنگ</th>
        <th>تعداد</th>
        <th>قیمت واحد</th>
        <th>قیمت کل</th>
      </tr>
    </thead>
    <tbody>
        <?php 
     
       $total_price_all = 0;
       foreach($orders as $order){
           $total_price_all += $order['total_price'];
       ?>
      <tr>
        <td><?= $order['name'] ?></td>
        <td><?= $order['brand'] ?></td>
        <td><?= $order['description'] ?></td>
        <td><?= $order['titel_name'] ?></td>
        <td><?= $order['quantity'] ?></td>
        <td><?=  number_format($order['unit_price']) .' ' . 'تومان ' ?></td>
        <td><?= number_format($order['total_price'] ) .' ' . 'تومان ' ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- جمع مبلغ -->
  <?php
$postal_price = $customer_orders['city_postal_price'];
$final_total = $total_price_all + $postal_price;
?>

<div class="summary-box text-center" style="font-size:12px;">
  <strong>جمع محصولات:</strong> <?= number_format($total_price_all) ?> تومان |
  <strong>هزینه ارسال:</strong> <?= number_format($postal_price) ?> تومان |
  <strong>مبلغ نهایی:</strong> <?= number_format($final_total) ?> تومان
</div>

<div class="summary-box mt-2">
  <h6><strong>کد تحویل سفارشات:</strong> <?= $customer_orders['delivery_code'] ?> </h6>
</div>


  <!-- یادداشت -->
  <div class="note-box" style="text-align: center;"><b>
فروشگاه ما همیشه بهترین هارو برای شما میخواهد </b>
</div>

  <!-- امضا -->
  <div class="signature">
    <p><strong>امضای فروشنده:</strong> </p>
  </div>
</div>

<!-- دکمه چاپ -->
<div class="print-btn">
  <button onclick="window.print()" class="btn btn-outline-success btn-sm">چاپ فاکتور</button>
</div>

</body>
</html>
