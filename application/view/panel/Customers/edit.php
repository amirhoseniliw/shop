<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش مشتری - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        
        <h1 class="text-center">ویرایش مشتری</h1>
        <form class="mt-4" action="<?php $this->url('/users/usersUpdate/'  . $user['user_id'])?>" method="post"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label for="customerName" class="form-label">نام مشتری</label>
                <input type="text" class="form-control" id="customerName" name="username" value="<?= $user['username'] ?>">
            </div>

            <div class="mb-3">
                <label for="customerEmail" class="form-label">ایمیل مشتری</label>
                <input type="email" class="form-control" id="customerEmail" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="customerEmail" class="form-label">رمز مشتری</label>
                <input type="text" class="form-control" id="customerEmail" name="password" value="<?= $user['password'] ?>">
            </div>
            <div class="mb-3">
                <label for="customerPhone" class="form-label">شماره تلفن مشتری</label>
                <input type="text" class="form-control" id="customerPhone" name="phone_number" value="<?= $user['phone_number'] ?>">
            </div>

            <div class="mb-3">
                <label for="customerAddress" class="form-label">آدرس مشتری</label>
                <textarea class="form-control" id="customerAddress" name="address" rows="3"><?= $user['address'] ?></textarea>
            </div>
            <div class="mb-3">  
    <label for="status" class="form-label">وضعیت:</label>  
    <select name="status" id="status" class="form-select" required>  
        <option value="active" <?php if($user['status'] == 'active') {echo "selected";} ?>>فعال</option>  
        <option value="inactive" <?php if ($user['status'] == 'inactive') echo "selected"; ?>>غیرفعال</option>  
    </select>  
</div>  
<div class="mb-3">  
    <label for="user_type" class="form-label">عنوان کاربر :</label>  
    <select name="user_type" id="status" class="form-select" required>  
        <option value="active" <?php if($user['user_type'] == 'regular') {echo "selected";} ?>>کاربر عادی</option>  
        <option value="inactive" <?php if ($user['user_type'] == 'admin') echo "selected"; ?>>ادمین</option>  
    </select>  
</div>  
<div class="mb-3">
   <a href="<?php $this->asset($user['img_prof']); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php $this->asset($user['img_prof']) ?>" alt="error" width="100" style="border-radius: 50px;"> </a>
   <input type="file" name="img_prof" class="form-control" id="customerPhone">
   </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
            <a href="customers_page.html" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>