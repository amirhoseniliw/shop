<?php $mass  = ($this->flash('not_find'));
$massall = ($this->flash('not_find_all'));
 ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت محصولات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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
    <div class="container mt-5">
        <h1 class="text-center mb-4">مدیریت محصولات</h1>

        <!-- دکمه اضافه کردن محصول جدید -->
        <div class="text-end">
            <a href="<?php $this->url('/Products/products_create') ?>" class="btn btn-primary add-button">ایجاد محصول جدید</a>
        </div>

        <!-- بخش جستجو و فیلتر -->
        <div class="card mb-4">
        
            <div class="card-header bg-primary text-white">
                <h5>جستجو و فیلتر محصولات</h5>
            </div><p style="color: red;text-align: center;"><?php if($massall) {echo $massall ;}?></p>
            <div class="card-body">
                <!-- <form class="row g-3" method="post" action="<?php $this->url('/Products/product_find')?>" >
                    <div class="col-md-4">
                        <label for="productName" class="form-label">نام محصول</label>
                        <input type="text" id="productName" name="name" class="form-control" placeholder="نام محصول را وارد کنید">
                    </div>
                    <div class="col-md-4">
                        <label for="brand" class="form-label">برند</label>
                        <input type="text" id="brand" name="brand" class="form-control" placeholder="برند محصول را وارد کنید">
                    </div>
                    <div class="col-md-4">
                        <label for="categoryId" class="form-label">آیدی محصول</label>
                        <input type="text" id="categoryId" name="product_id" class="form-control" placeholder="آیدی دسته‌بندی را وارد کنید">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">اعمال فیلتر</button>
                    </div> 
                </form> -->
                <form class="row g-3" method="post" action="<?php $this->url('/Products/product_find')?>"> <!-- آدرس فایل پردازش -->  
    <div class="col-md-4">  
        <label for="productName" class="form-label">نام محصول</label>  
        <input type="text" name="productName" id="productName" class="form-control" placeholder="نام محصول را وارد کنید">  
    </div>  
    <div class="col-md-4">  
        <label for="brand" class="form-label">برند</label>  
        <input type="text" name="brand" id="brand" class="form-control" placeholder="برند محصول را وارد کنید">  
    </div>  
    <div class="col-md-12">  
        <button type="submit" class="btn btn-primary">جستجو براساس نام و برند</button>  
    </div>  
</form>  

<hr>  

<p style="color: red; text-align: center;"><?php if($mass) {echo $mass ;}?></p>
<!-- فرم جستجوی بر اساس آیدی -->  
<form class="row g-3" method="post" action="<?php $this->url('/Products/product_find')?>"> <!-- آدرس فایل پردازش -->  
    <div class="col-md-4">  
        <label for="productId" class="form-label">آیدی محصول</label>  
        <input type="text" name="productId" id="productId" class="form-control" placeholder="آیدی محصول را وارد کنید">  
    </div>  
    <div class="col-md-12">  
        <button type="submit" class="btn btn-primary">جستجو براساس آیدی</button>  
    </div>  
</form>  
            </div>
        </div>

        <!-- جدول نمایش محصولات -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5>لیست محصولات</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>آیدی</th>
                            <th>ایدی کاربر </th>
                            <th>نام محصول</th>
                            <th>برند</th>
                            <th>توضیحات</th>
                            <th>عکس</th>
                            <th>رنگ</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>نام دسته‌بندی</th>
                            <th>بازدید</th>
                            <th>پرفروش</th>
                            <th>انتخاب شده</th>
                            <th>وضعیت</th>
                            <th>تاریخ اخرین تغییرات  </th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post) { ?>
                            <a>
                                <td><?= $post['product_id'] ?></td>
                                <td><?= $post['user_id'] ?></td>
                                <td><?= $post['name'] ?></td>
                                <td><?= $post['brand'] ?></td>
                                <td><?= $post['description'] ?></td>
                              
                                <td>  <?php   $imageUrlsArrays = explode(',', $post['image_urls']);
                                foreach ($imageUrlsArrays as $imageUrlsArray){          ?>
                                    <a href="<?= $this->asset($imageUrlsArray) ?>" target="_blank"><img src="<?= $this->asset($imageUrlsArray) ?>" alt="محصول" width="80"></a> <?php } ?></td>
                                   
                               <td> <?php   $colors = explode(',', $post['colors']);
                               
                                foreach ($colors as $color){ ?><div style="width: 30px; height: 30px; background: <?php if($color == 'hue') { echo('linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);');} else {echo $color ;}?>;"></div><br>
                                <?php } ?>
                            </td>
                                <td><?= $post['price'] ?> تومان</td>
                                <td><?= $post['stock_qty'] ?></td>
                                <td><?= $post['categoryname'] ?></td>
                                <td><?= $post['view'] ?></td>
                               
                                <td>
                                    <?php if ($post['Bestseller'] == 0) { ?>
                                        <a href="<?php $this->url('/Products/products_Bestseller/' . $post['product_id']) ?>"><button class="btn btn-success btn-sm">افزودن</button></a><p>نیست</p>
                                    <?php } else { ?>
                                        <a href="<?php $this->url('/Products/products_Bestseller/' . $post['product_id']) ?>"> <button class="btn btn-danger btn-sm">حذف</button></a><p>هست</p><?php } ?>
                                </td>
                                <td>
                                    <?php if ($post['Selected'] == 0) { ?>
                                        <a href="<?php $this->url('/Products/products_Selected/' . $post['product_id']) ?>"> <button class="btn btn-success btn-sm">افزودن</button></a><p>نیست</p>
                                    <?php } else { ?>
                                        <a href="<?php $this->url('/Products/products_Selected/' . $post['product_id']) ?>"> <button class="btn btn-danger btn-sm">حذف</button></a> <p>هست</p><?php } ?>
                                </td>
                                <td> <?php if ($post['status'] == 'disable') { ?>
                                        <a href="<?php $this->url('/Products/products_status/' . $post['product_id']) ?>"> <button class="btn btn-success btn-sm">فعال</button></a> <p>فعال نیست</p>
                                    <?php } else { ?>
                                        <a href="<?php $this->url('/Products/products_status/' . $post['product_id']) ?>"> <button class="btn btn-danger btn-sm">غیرفعال</button></a> <p>فعال است</p><?php } ?>
                                </td>
                                <td><?php echo $this->jalaliData($post['updated_at']) ?></td>
                                <td>
                                    <a href="<?php $this->url('/Products/products_edit/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">ویرایش</button></a>
                                    <a href="<?php $this->url('/Products/add_mor_img/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">  عکس </button></a>
                                    <a href="<?php $this->url('/Products/add_color/' . $post['product_id']) ?>"><button class="btn btn-warning btn-sm">  رنگ </button></a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?= $post['product_id']?>)">حذف</button>
                                </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- دکمه بازگشت -->
    <a href="<?php $this->url('/panel') ?>" class="btn btn-secondary back-button">بازگشت</a>
    <script>  
    function deleteRecord(id) {  
        // جعبه تأیید  
        const confirmation = confirm('آیا اطمینان دارید که می‌خواهید رکورد را حذف کنید؟');  
        if (confirmation) {  
            // کاربر تأیید کرد، به آدرس حذف بروید  
            window.location.href = 'products/products_delete/' + id;  
        } else {  
            // کاربر کنسل کرد  
            alert('عملیات حذف لغو شد.');  
        }  
    }  
</script>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>