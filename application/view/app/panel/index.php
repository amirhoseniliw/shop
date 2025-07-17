<?php $this->include('app.layouts.header', ['user' => $user, 'categories' => $categories]);
$this->include('app.layouts.sidbor', ['user' => $user]); ?>


<div class="col-lg-9">
    <div class="alert px-3 alert-light shadow-box py-4 rounded-4 alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <img src="assets/img/bell.png" class="bell-icon" alt="">
            <h5 class="title-font"> توجه</h5>
        </div>
        <p class="mt-3 text-justify">سفارش های شما با کد تحول به شما تحول داده میشود !</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row gy-3">
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="meta-box">
                    <div class="meta-box-icon">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <div class="meta-box-desc">
                        <p>سفارش های پرداخت شده </p>
                        <h5><?= $count_customer_orders['count'] ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="meta-box">
                    <div class="meta-box-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="meta-box-desc">
                        <p>محصولات مورد علاقه</p>

                        <h5><?= $Count_favoites['count'] ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="meta-box">
                    <div class="meta-box-icon">
                        <i class="bi bi-send"></i>
                    </div>
                    <div class="meta-box-desc">
                        <p>محصولات موجود در سایت </p>
                        <h5><?= $count_Products['total_products'] ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="meta-box">
                    <div class="meta-box-icon">
                        <i class="bi bi-repeat"></i>
                    </div>
                    <div class="meta-box-desc">
                        <p>دسته بندی ها </p>
                        <h5><?= $count_categories['count'] ?></h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="panel-latest-order mt-4">
    <div class="section-title">
        <div class="row gy-3 align-items-center">
            <div class="col-sm-8">
                <div class="section-title-title">
                    <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> سفارشات </span></h3>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="section-title-link text-sm-end text-start">
                    <a class="btn btn-title font-13 rounded-pill" href=""> مشاهده همه</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-3">
        <?php foreach ($customer_orders as $customer_order) { ?>
            <div class="col-12">
                <div class="shadow-box rounded-4 p-3 bg-white d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-column">
                            <span class="text-muted small">شماره سفارش</span>
                            <strong><?= $customer_order['id'] ?></strong>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="text-muted small">کد تحویل</span>
                            <strong><?= $customer_order['delivery_code'] ?></strong>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-column mt-2">
                            <span class="text-muted small">تاریخ ثبت</span>
                            <strong><?= $this->jalaliData($customer_order['created_at']) ?></strong>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <span class="text-muted small">مبلغ پرداختی</span>
                            <strong><?= number_format($customer_order['total_amount']) . ' تومان' ?></strong>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-2">
                        <div class="d-flex flex-column">
                            <span class="text-muted small">وضعیت سفارش</span>
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
                        </div>

                        <div class="d-flex gap-2 mt-2">
                            <a href="<?= $this->url('/UserPanel/factor/' . $customer_order['id']) ?>" class="btn btn-outline-dark btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-file-earmark-text"></i> فاکتور
                            </a>
                            <a href="<?php $this->url('/UserPanel/show_orders/' . $customer_order['delivery_code'] .'/' . $customer_order['postal_price']) ?>" class="btn border-0 main-color-one-bg waves-effect waves-light">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</div>


<?php $this->include('app.layouts.footer'); ?>