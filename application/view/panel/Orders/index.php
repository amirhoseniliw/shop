<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سفارش‌ها - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        position: fixed;
        width: 250px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 15px;
        transition: background-color 0.2s;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .sidebar .active {
        background-color: #495057;
    }

    .main-content {
        margin-right: 250px;
        padding: 20px;
    }

    .navbar {
        margin-right: 250px;
    }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="text-center py-4">
        <h4>فروشگاه شما</h4>
    </div>
    <a href="<?php $this->url('/panel') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
    <a href="<?php $this->url('/products') ?>"><i class="fas fa-box"></i> محصولات</a>
    <a href="<?php $this->url('/orders') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
    <a href="<?php $this->url('/users') ?>"><i class="fas fa-users"></i> مشتریان</a>
    <a href="<?php $this->url('/category') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
    <a href="<?php $this->url('/reports') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
    <a href="<?php $this->url('/settings') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
</div>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="m-0">پنل مدیریت</h5>
                <div class="ms-auto">
                    <button class="btn btn-primary"><i class="fas fa-user-circle"></i> مدیر</button>
                </div>
            </div>
        </nav>
        <div class="container mt-5 refreshDiv" id="refreshDiv">
            <h1 class="text-center">سفارش‌ها</h1>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>شماره سفارش</th>
                        <th>نام مشتری</th>
                        <th>تاریخ آخرین ویرایش</th>
                        <th>مبلغ</th>
                        <th>مبلغ کل</th>
                        <th>نام محصول</th>
                        <th>عکس محصول</th>
                        <th>تعداد</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['nameuser'] ?></td>
                        <td><?php echo $this->jalaliData($order['updated_at']) ?></td>
                        <td><?= $order['unit_price'] ?></td>
                        <td><?= $order['total_price'] ?></td>
                        <td><?= $order['product_name'] ?></td>
                        <td><img src="<?php echo $this->asset($order['image_url']) ?>" alt="محصول" width="50"></td>
                        <td><?= $order['quantity'] ?></td>
                        <td> 
                            <input type="hidden" class="item_id" value="<?= $order['order_id'] ?>">
                            <?php if($order['status'] == 'pending') {?>
                            <span class="badge bg-warning">در انتظار </span>
                            <?php } elseif ($order['status'] == 'completed') {  ?>
                            <span class="badge bg-success">کامل شد </span> <?php } else { ?>
                            <span class="badge bg-danger">لغو شد</span> <?php }?>
                            <button class="btn btn-warning btn-sm save1" id="refreshButton">کامل شد</button>
                        </td>
                        <td>
                            <a href="<?php echo $this->url('/orders/show/' . $order['order_id']) ?>">
                                <button class="btn btn-info btn-sm">مشاهده</button>
                            </a>
                            <a href="<?php echo $this->url('/orders/edit/' . $order['order_id']) ?>">
                                <button class="btn btn-primary btn-sm">ویرایش</button>
                            </a>
                            <input type="hidden" class="item_id" value="<?= $order['order_id'] ?>">
                            <button class="btn btn-danger btn-sm save">لغو</button>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
   $('.save').click(function() {  
    let id = $(this).siblings('.item_id').val();   
    let url = `orders/status_cancel/${id}`;  

    // ارسال درخواست AJAX به سرور  
    $.ajax({  
        url: url,  
        method: 'POST',  
        data: {},  
        success: function(response) {  
            alert('وضعیت سفارش با ID ' + id + ' تغییر کرد.');  

            // به‌روزرسانی DOM بدون رفرش کامل صفحه  
            // مثال: حذف عنصر سفارش با این ID  
            $(`#order-${id}`).remove(); // فرض کنید عنصر سفارش دارای شناسه `order-ID` است  

            // یا اگر شما نیاز به بروز کردن محتویات دارید، می‌توانید از این روش استفاده کنید:  
            // $('#status-' + id).text('وضعیت جدید'); // اگر یک عنصر برای وضعیت داشته باشید  
        },  
        error: function(jqXHR, textStatus, errorThrown) {  
            console.error('Error:', textStatus, errorThrown);  
            alert('مشکلی پیش آمد: ' + errorThrown);  
        }  
    });  
});  
    $('.save1').click(function() {
        let id = $(this).siblings('.item_id').val(); // به‌دست آوردن ID از دکمه خواهر  
        let url = `orders/status_finsh/${id}`; // ساخت URL با شناسه و اطمینان از / در ابتدای آن  

        // ارسال درخواست AJAX به سرور  
        $.ajax({
            url: url, // آدرس فایل PHP  
            method: 'POST', // مطمئن شوید که سرور از POST پشتیبانی می‌کند  
            data: {}, // در اینجا هیچ داده‌ای ارسال نمی‌شود  
            success: function(response) {
                alert('وضعیت سفارش با ID ' + id + ' تغییر کرد.');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown); // اطلاعات بیشتر در مورد خطا  
                alert('مشکلی پیش آمد: ' + errorThrown);
            }
        });
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>