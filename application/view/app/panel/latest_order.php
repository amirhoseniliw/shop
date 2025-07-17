<?php $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
$this->include('app.layouts.sidbor', ['user' => $user] ); 
?>
<style>
    @media (max-width: 768px) {
  .table-responsive table,
  .table-responsive thead,
  .table-responsive tbody,
  .table-responsive th,
  .table-responsive td,
  .table-responsive tr {
    display: block;
    width: 100%;
  }

  .table-responsive thead {
    display: none;
  }

  .table-responsive td {
    text-align: right;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #ddd;
    position: relative;
  }

  .table-responsive td::before {
    content: attr(data-label);
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 5px;
  }

  .table-responsive tr {
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
  }
}

</style>
<div class="col-lg-9">
    <div class="panel-latest-order mt-4">
        <div class="section-title">
            <div class="section-title-title">
                <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> سفارشات </span></h3>
            </div>
        </div>

        <div class="table-responsive shadow-box roundedTable p-0">
            <table class="table main-table rounded-0">
                <thead class="text-center">
                    <tr>
                        <th class="title-font">شماره سفارش</th>
                        <th class="title-font">کد تحویل سفارش</th>
                        <th class="title-font">تاریخ ثبت سفارش</th>
                        <th class="title-font">مبلغ پرداختی</th>
                        <th class="title-font">وضعیت سفارش</th>
                        <th class="title-font">فاکتور</th>
                        <th class="title-font">جزییات</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($customer_orders as $customer_order) { ?>
                        <tr>
                            <td class="font-14" data-label="شماره سفارش"><?= $customer_order['id'] ?></td>
                            <td class="font-14" data-label="کد تحویل سفارش"><?= $customer_order['delivery_code'] ?></td>
                            <td class="font-14" data-label="تاریخ ثبت سفارش"><?php echo $this->jalaliData($customer_order['created_at']) ?></td>
                            <td class="font-14" data-label="مبلغ پرداختی"><b><?= number_format($customer_order['total_amount']) . ' تومان' ?></b></td>
                            <td class="font-14" data-label="وضعیت سفارش">
                                <?php if ($customer_order['status'] == 'Paid'): ?>
                                    <span class="badge bg-success">پرداخت شده</span>
                                <?php elseif ($customer_order['status'] == 'InTransit'): ?>
                                    <span class="badge bg-primary">در حال ارسال</span>
                                <?php elseif ($customer_order['status'] == 'Delivered'): ?>
                                    <span class="badge bg-info text-dark">تحویل داده‌شده</span>
                                <?php elseif ($customer_order['status'] == 'canceled'): ?>
                                    <span class="badge bg-danger">لغو شده</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">نامشخص</span>
                                <?php endif; ?>
                            </td>
                            <td data-label="فاکتور">
                                <a href="<?= $this->url('/UserPanel/factor/' . $customer_order['id']) ?>" class="btn btn-outline-dark btn-sm d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path d="M5 7h6v1H5V7zm0 2h6v1H5V9zm0 2h4v1H5v-1z"/>
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5H9.5V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
                                    </svg>
                                    فاکتور
                                </a>
                            </td>
                            <td class="font-14" data-label="جزییات">
                                <a href="<?php $this->url('/UserPanel/show_orders/' . $customer_order['delivery_code'] .'/' . $customer_order['postal_price']) ?>" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->include('app.layouts.footer'); ?>
