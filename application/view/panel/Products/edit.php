<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>ویرایش محصول جدید</title>  
    <link href="https://fonts.googleapis.com/css2?family=Vazir&display=swap" rel="stylesheet">  
    <style>  
    .btn {
            border-radius: 20px;
            text-decoration: none;
            background-color: #2196F3;
            color: white;
            padding: 10px;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }
        body {  
            font-family: 'Vazir', sans-serif;  
            background-color: #f2f2f2;  
            color: #333;  
            margin: 0;  
            padding: 0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            overflow: hidden; /* جلوگیری از اسکرول خود بدنه */  
        }  

        .container {  
            background-color: #fff;  
            border-radius: 8px;  
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);  
            padding: 20px;  
            max-height: 90vh; /* حداکثر ارتفاع برای container */  
            width: 400px;  
            overflow-y: auto; /* فعال کردن اسکرول عمودی در صورت نیاز */  
        }  

        h1 {  
            text-align: center;  
            margin-bottom: 20px;  
            color: #4CAF50;  
        }  

        label {  
            margin-top: 10px;  
            display: block;  
            font-weight: bold;  
            margin-bottom: 5px;  
        }  

        input[type="text"],  
        input[type="number"],  
        input[type="url"],  
        textarea,  
        select {  
            width: 100%;  
            padding: 10px;  
            margin-bottom: 20px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            box-sizing: border-box;  
        }  

        input[type="checkbox"] {  
            margin-left: 10px;  
        }  

        input[type="submit"] {  
            background-color: #4CAF50;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 100%;  
            font-size: 16px;  
            margin-bottom: 10px;  
        }  

        input[type="button"] {  
            background-color: #2196F3;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 48%;  
            font-size: 16px;  
            margin-top: 10px;  
            margin-right: 4%;  
        }  

        input[type="button"]:hover {  
            background-color: #1976D2;  
        }  

        .checkbox-label {  
            display: flex;  
            align-items: center;  
            margin-bottom: 15px;  
        }  
        
        .button-container {  
            display: flex;  
            justify-content: space-between; /* افقی قرار دادن دکمه‌ها */  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>ویرایش محصول </h1>  
        <form action="<?php $this->url('/products/products_update/' .$post['product_id']) ?>" method="post" enctype="multipart/form-data" >  
           

            <label for="name">نام محصول:</label>  
            <input type="text" name="name" required value="<?= $post['name'] ?>">  
            <label for="name">نام برند:</label>  
            <input type="text" name="brand" required value="<?= $post['brand'] ?>">  

            <label for="description">توضیحات محصول:</label>  
            <textarea name="description" required><?= $post['description'] ?></textarea>  

            <label for="price">قیمت:</label>  
            <input type="number" name="price" value="<?= $post['price'] ?>" required>  

            <label for="stock_qty">مقدار موجودی:</label>  
            <input type="number" name="stock_qty" value="<?= $post['stock_qty'] ?>" required>  

            <label for="view">بازدید </label>  
            <input type="number" name="view" value="<?= $post['view'] ?>" required> 
            
            
            <div class="checkbox-label">  
                <label for="selected">انتخاب شده:</label>  
            </div>  
        
            <div class="button-container">  
            <select name="selected" required> 
                  
                <option value="1" <?php if( $post['Selected'] == 1){echo "selected";?>>فعال</option>  
                <option value="0" <?php } else echo"selected"?>>غیرفعال</option>  
            </select>  
            </div>   


            <label for="Bestseller">پر فروش :</label>  
            <div class="button-container">  
            <select name="Bestseller" required>        
                  <option value="1" <?php if( $post['Bestseller'] == 1){echo "selected";?>>فعال</option>  
                  <option value="0" <?php } else echo"selected"?>>غیرفعال</option>  
              </select>  
            </div>  
          

            <label for="status">وضعیت:</label>  
            <select name="status" required>  
            <option value="enable" <?php if( $post['status'] == 'enable'){echo "selected";?>>فعال</option>  
                  <option value="disable" <?php } else echo"selected"?>>غیرفعال</option>  
              </select>  

            <label for="category_id">شناسه دسته بندی:</label>  
            <select name="category_id" required>
                <?php  foreach ($categories as $category){?>
                <option value="<?= $category['category_id']?>" <?php if($category['category_id'] == $post['category_id']){echo 'selected';} ?>><?= $category['name']?></option>  
<?php }?> 
            </select>  

          
                </br>
            <img src="<?php $this->asset($post['image_url']) ?>" alt="error" width="80">

            <input type="submit" value="ویرایش">  
        </form>  
        <a href="<?php $this->url('/products') ?>" class="btn btn-secondary back-button" >بازگشت</a>

    </div>  


</body>  
</html>