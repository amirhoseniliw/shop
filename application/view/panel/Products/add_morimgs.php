<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="فروشگاه شما">
    <title>پنل مدیریت - فروشگاه شما</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            padding-top: 20px;
            z-index: 1000;
        }

        .main-content {
            margin-right: 250px;
            padding: 20px;
        }

        .navbar {
            margin-right: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content,
            .navbar {
                margin-right: 0;
                padding: 15px;
            }
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            transition: background-color 0.2s;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            justify-content: center;
        }

        .image-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 150px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .image-id {
            margin-top: 5px;
            font-size: 14px;
            color: #555;
        }

        .delete-btn {
            position: absolute;
            top: 2px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .form-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
        }

        input[type="file"],
        input[type="text"],
        button,
        select {
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 8px;
            width: 100%;
        }

        button {
            background: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .back-btn {
            margin-top: 20px;
            padding: 12px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        select {
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #fff;
            appearance: none;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '▼';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="text-center py-4">
            <h4>فروشگاه شما</h4>
        </div>
        <a href="<?php $this->url('/Panel_admin') ?>" class="active"><i class="fas fa-tachometer-alt"></i> داشبورد</a>
        <a href="<?php $this->url('/Products_panel_admin') ?>"><i class="fas fa-box"></i> محصولات</a>
        <a href="<?php $this->url('/Orders_panel_admin') ?>"><i class="fas fa-shopping-cart"></i> سفارش‌ها</a>
        <a href="<?php $this->url('/Users_panel_admin') ?>"><i class="fas fa-users"></i> مشتریان</a>
        <a href="<?php $this->url('/Category_panel_admin') ?>"><i class="fas fa-folder"></i> دسته بندی ها</a>
        <a href="<?php $this->url('/reports_panel_admin') ?>"><i class="fas fa-chart-line"></i> گزارش‌ها</a>
        <a href="<?php $this->url('/chats_panel_admin') ?>"><i class="fas fa-comment"></i> پیام ها</a>
        <a href="<?php $this->url('/Settings_panel_admin') ?>"><i class="fas fa-cogs"></i> تنظیمات</a>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="m-0">پنل مدیریت</h5>
                <div class="ms-auto">
                    <button class="btn btn-primary"><i class="fas fa-user-circle"></i> مدیر</button>
                </div>
            </div>
        </nav>

        <p>نام محصول</p>
        <h2><?= $post['name'] ?></h2>

        <h2 class="mt-4">گالری محصولات</h2>
        <div class="gallery">
            <?php foreach ($img_posts as $img_post) { ?>
                <div class="image-container">
                    <img src="<?php $this->asset($img_post['image_url']) ?>" alt="محصول">
                    <span class="image-id">ID: <?= $img_post['image_id'] ?></span>
                    <span class="image-id">alt: <?= $img_post['alt_text'] ?></span>
                    <a href="<?php $this->url('/Products_panel_admin/delete_img/' . $img_post['image_id']) ?>" title="حذف عکس">
                        <button class="delete-btn"><i class="fas fa-times"></i></button>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="form-wrapper">
            <div class="form-container">
                <h3>آپدیت تصویر</h3>
                <form action="<?php $this->url('/Products_panel_admin/update_img/' . $post['product_id']) ?>" method="post" enctype="multipart/form-data">
                    <label for="image_id">کد تصویر را انتخاب کنید:</label>
                    <select name="image_id" id="image_id" required>
                        <option value="" disabled selected>کد تصویر را انتخاب کنید</option>
                        <?php foreach ($img_posts as $img_post) { ?>
                            <option value="<?= $img_post['image_id'] ?>"><?= $img_post['image_id'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="file" name="image_url" accept="image/*" required>
                    <input type="text" name="alt_text" placeholder="توضیحات" required>
                    <button type="submit">آپلود</button>
                </form>
            </div>

           <div class="form-container">
    <h3>افزودن تصویر جدید</h3>
    <form id="addImageForm" method="post" enctype="multipart/form-data">
        <input type="file" id="imageInput" accept="image/*" required>
        <input type="text" id="altText" name="alt_text" value="<?= $post['name'] ?>" placeholder="توضیحات" required>
        <button type="submit">افزودن</button>
    </form>
    <canvas id="canvas" style="display: none;"></canvas>
</div>
        </div>

        <a href="<?php $this->url('/Products_panel_admin') ?>">
            <button class="back-btn">بازگشت</button>
        </a>
    </div>

  <script>
    const form = document.getElementById('addImageForm');
    const imageInput = document.getElementById('imageInput');
    const altInput = document.getElementById('altText');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const file = imageInput.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (event) {
            const img = new Image();
            img.onload = function () {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);

               const fontSize = Math.floor(canvas.width * 0.05); // 5٪ از عرض
               ctx.font = `bold ${fontSize}px Tahoma`;
                ctx.fillStyle = "rgba(0,0,0)";
                ctx.textAlign = "left";
                ctx.fillText("فروشگاه تحریر خیام", 20, img.height - 20);

                canvas.toBlob(function (blob) {
    const newFile = new File([blob], file.name, { type: "image/jpeg" });
    const formData = new FormData();
    formData.append("image_url", newFile);
    formData.append("alt_text", altInput.value);

    fetch("<?php $this->url('/Products_panel_admin/img_stor/' . $post['product_id']) ?>", {
        method: "POST",
        body: formData
    })
    .then(res => res.ok ? location.reload() : alert("ارسال با خطا مواجه شد"))
    .catch(() => alert("خطا در ارسال"));
}, "image/jpeg", 0.95);

            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>


</body>

</html>
