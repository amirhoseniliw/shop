<?php $this->include('app.layouts.header' , compact('categories')); ?>

<!-- start content -->
<div class="content mt-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card col-md-4 bg-white shadow-md p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75"
                         fill="currentColor" class="bi bi-check-circle main-color-green-color" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>پرداخت موفق</h1>
                    <p>کاربر گرامی پرداخت شما با موفقیت انجام شد</p>
                    <p>کد رهگیری: <?php echo $_SESSION['ref_id']; ?></p>

                    <!-- دکمه مشاهده فاکتور -->
                    <a href="<?php $this->url('/cart/factor/' . $customer_id) ?>" class="btn btn-success mt-3">مشاهده فاکتور</a>

                    <!-- نمایش شمارش معکوس -->
                    <p class="mt-3 text-muted">در حال انتقال به فاکتور در <span id="counter">10</span> ثانیه...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- اسکریپت شمارش معکوس و ریدایرکت -->
<script>
    let counter = 10;
    const interval = setInterval(() => {
        counter--;
        document.getElementById("counter").textContent = counter;
        if (counter === 0) {
            clearInterval(interval);
            window.location.href = "<?php $this->url('/cart/factor/' . $customer_id) ?>";
        }
    }, 1000);
</script>

<!-- end content -->

<?php $this->include('app.layouts.footer'); ?>
