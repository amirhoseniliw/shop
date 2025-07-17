<?php $this->include('app.layouts.header' , compact('categories')); ?>


<div class="content mt-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card col-md-4 bg-white shadow-md p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75"  fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </div>
                <div class="text-center">
                    <h1>پرداخت ناموفق</h1>
                    <p>مشتری گرامی پرداخت شما با مشکل مواجه شد اگر مبلغی کسر شده است تا مدت 48 ساعت برگشت داده میشه</p>
                    <a href="<?php $this->url('/UserPanel/ticket') ?>" ><h2>برای پیگیری در بخش پنل کاربر به پشتبانی تیکت بدین ! </h2></a>
                    <p>کد رهگیری: <?php echo $_SESSION['payment_result']['errors']['message'] ?? 'نامشخص'; ?></p>
                   <a href="<?php $this->url('cart') ?>"> <button class="btn btn-danger mt-3">پرداخت دوباره</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /content -->


<!-- start footer -->

<?php $this->include('app.layouts.footer'); ?>