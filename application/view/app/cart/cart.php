<?php $this->include('app.layouts.header' , compact('categories')); ?>
<?php 
$message_error = $this->flash('error');
$message_success = $this->flash('success');
if(isset($message_success) ){
   ?>
<div id="success-message" class="alert alert-success " role="alert"><?= $message_success ?></div>
 <?php }?>
<?php if(isset($message_error) ){
   ?>
<div id="error-message" class="alert alert-danger " role="alert"><?= $message_error ?></div>
<?php }?>
<style>
  #success-message,
  #error-message {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 300px;
    z-index: 1050;
    opacity: 1;
    transition: opacity 1s ease;
  }

  #error-message {
    top: 60px; /* فاصله بین پیام موفقیت و خطا */
  }
</style>

<script>
  function showSuccess(text) {
    const msg = document.getElementById('success-message');
    msg.textContent = text;
    msg.classList.remove('d-none');
    msg.style.opacity = '1';
    setTimeout(() => {
      msg.style.opacity = '0';
      setTimeout(() => msg.classList.add('d-none'), 1000);
    }, 10000);
  }

  function showError(text) {
    const msg = document.getElementById('error-message');
    msg.textContent = text;
    msg.classList.remove('d-none');
    msg.style.opacity = '1';
    setTimeout(() => {
      msg.style.opacity = '0';
      setTimeout(() => msg.classList.add('d-none'), 1000);
    }, 10000);
  }
</script>

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
                                        <thead> <?php if($orders !== 0){ ?>
                                        <tr>
                                            <th class="h5 text-center">عملیات</th>
                                            <th class="h5 text-center" colspan="2">تصویر</th>
                                            <th class="h5 text-center">محصول</th>
                                            <th class="h5 text-center">تعداد</th>
                                            <th class="h5 text-center">قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $Total_Price = 0 ;
                                            foreach($orders as $order) {
                                            $Total_Price += $order['price'] * $order['count']; ?>?>
                                        <tr>
                                            <td data-label="عملیات" class="text-center align-middle">
                                                <a href="<?php $this->url('/cart/delete_on_list/' . $order['id'] ) ?>" data-bs-toggle="tooltip" class="p-4" data-bs-placement="top" data-bs-title="حذف محصول از سبد خرید">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            </td>
                                            <td data-label="تصویر" colspan="2" class="text-center align-middle">
                                                <a href="">
                                                    <img src="<?php echo $this->asset($order['img']) ?>" width="100" alt="">
                                                </a>
                                            </td>
                                            <td data-label="محصول" class="align-middle">
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
                                            </td>
                                            <td data-label="تعداد" class="counter text-center align-middle">
                                              <p style="font-size: 20px; "><?= $order['count']?> </p>
                                            </td>
                                            <td data-label="قیمت کل" class="text-center align-middle">
                                                <h5 class="title-font main-color-one-color h2 mb-0"><?php echo $this->formatPrice( $order['price'] * $order['count']) ?> <span class="mb-0 text-muted-two font-14 fw-lighter">تومان</span></h5>
                                            </td>
                                        </tr>
                                        <?php } } else {?>
                                        <p style="color : red; text-align: center;">شما هیچ محصولی در سبد خرید ندارید !</p>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                      <div class="cart-action">
    <div class="search-form mt-4">
        <div class="section-title-title mb-3">
            <h2 class="title-font h3">کد<span class="main-color-one-color"> تخفیف </span></h2>
        </div>
        <?php $discountCode = $_SESSION['discount_value']['code'] ?? null; ?>

<?php if (!$discountCode): ?>
    <form id="discountForm" action="<?php echo $this->url('/cart/applyDiscountCode'); ?>" method="POST">
        <div class="search-filed">
            <input type="text" name="discount_code" id="discountCode" placeholder="اعمال کد تخفیف" class="form-control search-input" required>
            <button type="submit" class="top-header-search-btn">
                <i class="bi bi-plus-circle"></i>
            </button>
        </div>
    </form>
<?php else: ?>
    <div class="search-filed">
        <input type="text" class="form-control search-input" value="کد اعمال شده: <?php echo htmlspecialchars($discountCode); ?>" disabled>
        <a href="<?php echo $this->url('/cart/removeDiscountCode'); ?>" class="top-header-search-btn" title="حذف کد تخفیف">
            <i class="bi bi-x-circle text-danger"></i>
        </a>
    </div>
<?php endif; ?>

        <div id="discountMessage" style="margin-top:10px; color:red;"></div>
    </div>
</div>

                <div class="col-12">
                    <div class="row gy-4">
                       <?php if($orders !== 0 ) { ?>



<div class="col-xl-3" style="margin: auto;">
                            <div class="content-box">
                                <div class="container-fluid">
                                    <div class="item">
                                        <div class="factor">
                                            <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                                <h5 class="mb-0 h6">مجموع</h5>
                                                <p class="mb-0 font-18"><?= number_format($Total_Price ) ?> تومان</p>
                                            </div>
                                            <?php if(isset($_SESSION['discount_value'])){ ?>
                                            <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                                <h5 class="mb-0 h6">تخفیف کالا ها</h5>
                                                <p class="mb-0 font-18"> <?= number_format($_SESSION['discount_value']['discountAmount']) ?>تومان</p>
                                            </div>
                                            <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                                <h5 class="mb-0 h6">مجموع</h5>
                                                <p class="mb-0 font-18"><?=  number_format($Total_Price - $_SESSION['discount_value']['discountAmount'])?> تومان</p>
                                            </div>
                                                        <?php } ?>
                                            <div class="action mt-3 d-flex align-items-center justify-content-center">
                                                <a href="<?php $this->url('/cart/checkout') ?>"
                                                   class="btn main-color-one-bg w-100">تسویه حساب</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                       
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cart-action {
width: 30%;
margin: auto;
    justify-content: center;
    align-items: center;
    background-color: #fdfaf6; /* رنگ پس‌زمینه ملایم */
}

.cart-action .search-form {
    background-color: #e3f2fd; /* آبی روشن که چشم‌گیره ولی ملایم */
    border: 1px solid #64b5f6;
    border-radius: 12px;
}

.cart-action .section-title-title h2 {
    color: #1565c0; /* آبی تیره برای تیتر */
}

.cart-action .main-color-one-color {
    color: #d32f2f; /* قرمز برای تاکید روی کلمه "تخفیف" */
}

.cart-action .search-input {
    border-color: #90caf9;
}

.cart-action .search-input:focus {
    border-color: #1976d2;
}

.cart-action .top-header-search-btn {
    background-color: #1976d2;
    color: white;
}

.cart-action .top-header-search-btn:hover {
    background-color: #0d47a1;
}

@media (max-width: 768px) {
  .responsive-table table,
  .responsive-table thead,
  .responsive-table tbody,
  .responsive-table th,
  .responsive-table td,
  .responsive-table tr {
    display: block;
    width: 100%;
  }

  .responsive-table thead tr {
    display: none;
  }

  .responsive-table td {
    text-align: right;
    padding: 10px;
    position: relative;
    border: none;
    border-bottom: 1px solid #ccc;
  }

  .responsive-table td::before {
    content: attr(data-label);
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #333;
  }
}
</style>
<!-- <script>
document.getElementById('discountForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const codeInput = document.getElementById('discountCode');
    const messageBox = document.getElementById('discountMessage');
    const code = codeInput.value.trim();

    if(code === '') {
        messageBox.style.color = 'red';
        messageBox.textContent = 'لطفا کد تخفیف را وارد کنید.';
        return;
    }

    fetch('<?php $this->url('/cart/code_of') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'discount_code=' + encodeURIComponent(code)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            messageBox.style.color = 'green';
            messageBox.textContent = data.message;

            // اگر می‌خوای مبلغ تخفیف رو به روز کنی، اینجا می‌تونی کد بزنی
            // مثلا بروزرسانی المان مجموع قیمت
            // document.querySelector('.factor .font-18').textContent = data.new_price + ' تومان';
        } else {
            messageBox.style.color = 'red';
            messageBox.textContent = data.message;
        }
    })
    .catch(() => {
        messageBox.style.color = 'red';
        messageBox.textContent = 'خطا در ارتباط با سرور. لطفا دوباره تلاش کنید.';
    });
});
</script> -->

<?php $this->include('app.layouts.footer'); ?>
