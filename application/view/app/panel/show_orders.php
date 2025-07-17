<?php 
$this->include('app.layouts.header', ['user' => $user, 'categories' => $categories]); 
$this->include('app.layouts.sidbor', ['user' => $user]); 
?>

<style>
  .product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
  }

  .color-box {
    width: 20px;
    height: 20px;
    border-radius: 4px;
    display: inline-block;
    border: 1px solid #aaa;
  }

  @media (max-width: 768px) {
    .table thead {
      display: none;
    }

    .table tbody tr {
      display: block;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 12px;
      padding: 10px;
      background: #fff;
    }

    .table tbody td {
      display: flex;
      justify-content: space-between;
      padding: 8px 10px;
      border: none;
      border-bottom: 1px dashed #eee;
      font-size: 14px;
    }

    .table tbody td::before {
      content: attr(data-label);
      font-weight: bold;
      color: #555;
    }
  }
</style>

<div class="container py-4" style="max-width: 1000px;">
  <h3 class="text-center mb-4">جزئیات سفارش‌ها</h3>

  <?php if (!empty($orders)) {
    $totalOrderAmount = 0;
  ?>
    <div class="table-responsive">
      <table class="table text-center align-middle">
        <thead class="table-light">
          <tr>
            <th>نام محصول</th>
            <th>نام برند</th>
            <th>توضیحات</th>
            <th>قیمت محصول</th>
            <th>موجودی</th>
            <th>عکس</th>
            <th>رنگ</th>
            <th>تعداد</th>
            <th>قیمت واحد</th>
            <th>قیمت کل</th>
            <th>تاریخ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $order) {
            $totalOrderAmount += (int)$order['total_price'];
          ?>
            <tr>
              <td data-label="نام محصول"><?= htmlspecialchars($order['name']) ?></td>
              <td data-label="برند"><?= htmlspecialchars($order['brand']) ?></td>
              <td data-label="توضیحات"><?= htmlspecialchars($order['description']) ?></td>
              <td data-label="قیمت"><?= number_format($order['price']) ?> تومان</td>
              <td data-label="موجودی"><?= (int)$order['stock_qty'] ?></td>
              <td data-label="تصویر">
                <?php if (!empty($order['image_url'])): ?>
                  <img src="<?= $this->asset($order['image_url']) ?>" class="product-image">
                <?php else: ?>
                  <span class="text-muted">ندارد</span>
                <?php endif; ?>
              </td>
              <td data-label="رنگ">
                <?php
                  $hex = trim($order['hex_value'] ?? '');
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
              <td data-label="تعداد"><?= (int)$order['quantity'] ?></td>
              <td data-label="قیمت واحد"><?= number_format($order['unit_price']) ?> تومان</td>
              <td data-label="قیمت کل"><?= number_format($order['total_price']) ?> تومان</td>
              <td data-label="تاریخ"><?= $this->jalaliData($order['created_at']) ?></td>
            </tr>
          <?php } ?>
          <tr class="table-success fw-bold">
            <td colspan="9" class="text-end">جمع کل + هزینه پست</td>
            <td colspan="2"><?= number_format($totalOrderAmount + (int)$post) ?> تومان</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-4 text-center">
      <a href="<?= $this->url('/UserPanel') ?>" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-arrow-right"></i> بازگشت به پنل
      </a>
    </div>

  <?php } else { ?>
    <div class="alert alert-info text-center">هیچ سفارشی یافت نشد.</div>
  <?php } ?>
</div>

<?php $this->include('app.layouts.footer'); ?>
