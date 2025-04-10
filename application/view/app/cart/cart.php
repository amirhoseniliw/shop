
<?php $this->include('app.layouts.header' , compact('categories')); ?>

<div class="content mt-3">
    <div class="container-fluid">

        <div class="payment_navigtions">
            <div class="checkout-headers">
                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="<?php $this->url('/cart/index') ?>" class="nav-link">
                                <span>1</span>
                                <p>سبد خرید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php $this->url('/cart/checkout') ?>" class="nav-link">
                                <span>2</span>
                                <p>صورتحساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <span>3</span>
                                <p>جزییات پرداخت</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <h2 class="title-font main-color-one-color mt-4 h4">سبد خرید شما <span class="main-color-three-color">(<?php if(isset($_SESSION['cart'])) {echo $count = count($_SESSION['cart']);} else {echo"0";}?> کالا)</span>
            </h2>
        </div>

    </div>

    <div class="container-fluid">
        <div class="cart-product">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="cart-product-item">
                        <div class="content-box">
                            <div class="container-fluid">
                                <div class="responsive-table">
                                    <table class="table table-bordered site-tbl">
                                        <thead>
                                        <tr>
                                            <th class="h5 text-center">عملیات</th>
                                            <th class="h5 text-center" colspan="2">تصویر</th>
                                            <th class="h5 text-center">محصول</th>
                                            <th class="h5 text-center">تعداد</th>
                                            <th class="h5 text-center">قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         
                                            <?php $Total_Price = 0 ;
                                             foreach($orders as $order) {
                                                 $Total_Price += $order['price'] * $order['count']; ?>?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <a href="<?php $this->url('/cart/delete_on_list/' . $order['id'] ) ?>" data-bs-toggle="tooltip" class="p-4" data-bs-placement="top" data-bs-title="حذف محصول از سبد خرید">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            </td>
                                            <td colspan="2" class="text-center align-middle">
                                                <a href="">
                                                    <img src="<?php echo $this->asset($order['img']) ?>" width="100" alt="">
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <h5 class="fw-light"><?= $order['name'] ?> </h5>

                                                <div class="d-flex flex-lg-row flex-column mt-4 justify-content-start  align-items-lg-center align-items-start">
                                                    <div class="item d-flex align-items-center">
                                                        <div class="icon"><i class="bi bi-shop"></i></div>
                                                        <div class="saller-name mx-2">فروشنده:</div>
                                                        <div class="saller-name text-muted">تحریر خیام</div>
                                                    </div>
                                                 
                                                     
                                                        <div class="saller-name mx-2">رنگ:</div>
                                                        <div class="saller-name text-muted">
                                                            <div class="product-meta-color-items mt-0" style="line-height: 1">
                                                                <span class="seller-color" style="background: <?php if($order['color'] == 'hue' || $order['color'] == '' ) { echo('linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);');} else {echo $order['color'] ;}?>"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </td>
                                            <td class="counter text-center align-middle">
                                              <p style="font-size: 20px; "><?= $order['count']?> </p></td>
                                            <td class="text-center align-middle">
                                                <h5 class="title-font main-color-one-color h2 mb-0"><?php echo $this->formatPrice( $order['price'] * $order['count']) ?> <span class="mb-0 text-muted-two font-14 fw-lighter">تومان</span></h5>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row gy-4">
                       
                        <div class="col-xl-3" style="margin: auto;">
                            <div class="content-box">
                                <div class="container-fluid">
                                    <div class="item">
                                        <div class="factor">
                                            <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                                <h5 class="mb-0 h6">مجموع</h5>
                                                <p class="mb-0 font-18"><?= $Total_Price ?> تومان</p>
                                            </div>

                                            <div class="action mt-3 d-flex align-items-center justify-content-center">
                                                <a href="<?php $this->url('/cart/checkout') ?>"
                                                   class="btn main-color-one-bg w-100">تسویه
                                                    حساب</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->include('app.layouts.footer'); ?>


