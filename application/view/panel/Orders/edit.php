<!DOCTYPE html>  
<html lang="fa">  
<head>  
<link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">

    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>ویرایش سفارش</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <style>  
        body {  
            background-color: #f8f9fa;  
        }  
        .container {  
            margin-top: 50px;  
        }  
        .card {  
            padding: 20px;  
            border-radius: 10px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }  
        .form-group label {  
            font-weight: bold;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <div class="card">  
            <h3 class="text-center">ویرایش سفارش</h3>  
            <form action="<?php $this->url('/Orders_panel_admin/update/' . $order['order_id']) ?>" method="post">  
                <div class="form-group">  
                    <label for="user_id">شناسه کاربر:</label>  
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $order['user_id'] ?>" required>  
                </div>  
                <div class="form-group">  
                    <label for="product_id">شناسه محصول:</label>  
                    <input type="text" class="form-control" id="product_id" name="product_id" value="<?= $order['product_id'] ?>" required>  
                </div>  
                <div class="form-group">  
                    <label for="quantity">کمیت:</label>  
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $order['quantity'] ?>" required>  
                </div>  
                <div class="form-group">  
                    <label for="unit_price">قیمت واحد:</label>  
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="<?= $order['unit_price'] ?>" required>  
                </div>  
                <div class="form-group">  
                    <label for="total_price">قیمت کل:</label>  
                    <input type="text" class="form-control" id="total_price" name="total_price" value="<?= $order['total_price'] ?>" readonly>  
                </div>  

                <!-- ورودی مخفی برای قیمت کل -->  
                <input type="hidden" id="hidden_total_price" name="total_price_int" value="">  

                <div class="form-group">  
                    <label for="status">وضعیت:</label>  
                    <select class="form-control" id="status" name="status" required>  
                        <option value="pending"  <?php if($order['status'] == 'pending') { echo 'selected'; }?>>در حال انتظار</option>  
                        <option value="completed" <?php if($order['status'] == 'completed') { echo 'selected'; }?>>کامل شده</option>  
                        <option value="canceled" <?php if($order['status'] == 'canceled') { echo 'selected'; }?>>لغوشده</option>  
                    </select>  
                </div>  
                <button type="submit" class="btn btn-primary btn-block">ذخیره تغییرات</button>  
            </form>  
        </div>  
    </div>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <script>  
        // تابع برای فرمت‌دهی قیمت  
        function formatPrice(value) {  
            const parts = value.split('.');  
            let wholePart = parts[0];  
            // اضافه کردن / هر 3 رقم  
            wholePart = wholePart.replace(/\B(?=(\d{3})+(?!\d))/g, "/");  
            return parts.length > 1 ? wholePart + '.' + parts[1] : wholePart;  
        }  

        // به‌روزرسانی قیمت کل  
        function updateTotalPrice() {  
            const quantity = document.getElementById('quantity').value;  
            const unitPriceField = document.getElementById('unit_price');  
            const unitPrice = unitPriceField.value.replace(/[^0-9.]/g, ''); // حذف هر کاراکتر غیر عددی  
            const totalPriceField = document.getElementById('total_price');  
            const hiddenTotalPriceField = document.getElementById('hidden_total_price');  

            // محاسبه قیمت کل  
            const totalPrice = (quantity * unitPrice).toFixed(2); // قیمت کل با دو رقم اعشار  

            // فرمت‌دهی و به‌روزرسانی فیلد قیمت کل  
            totalPriceField.value = formatPrice(totalPrice);  
            hiddenTotalPriceField.value = totalPrice; // به‌روزرسانی فیلد مخفی  

            // فرمت‌دهی قیمت واحد  
            unitPriceField.value = formatPrice(unitPrice);  
        }  

        // افزودن شنونده به فیلدها  
        document.getElementById('quantity').addEventListener('input', updateTotalPrice);  
        document.getElementById('unit_price').addEventListener('input', updateTotalPrice);  
    </script>  
</body>  
</html>  