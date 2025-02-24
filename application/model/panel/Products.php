<?php

namespace application\model\panel;

use Exception;
use InvalidArgumentException;

class Products extends Model
{
    public function all()
    { $query = "SELECT * FROM `products`";
        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel()
    { 
        $query = "SELECT products.*, categories.name AS categoryname, GROUP_CONCAT(DISTINCT product_images.image_url) AS image_urls, GROUP_CONCAT(DISTINCT colors.hex_value) AS colors FROM products LEFT JOIN categories ON products.category_id = categories.category_id LEFT JOIN product_images ON products.product_id = product_images.product_id LEFT JOIN colors ON products.product_id = colors.product_id GROUP BY products.product_id, categories.name;";        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function count_all()
    {   $query = "SELECT COUNT(*) AS total_products FROM products; ";
      
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
    public function find_bestseller()
    {   $query = "SELECT oi.product_id, p.name, p.price, SUM(oi.quantity) AS total_sales FROM orders oi JOIN products p ON oi.product_id = p.product_id JOIN orders o ON oi.order_id = o.order_id WHERE o.status = 'completed' AND p.Bestseller = 1 GROUP BY oi.product_id, p.name, p.price ORDER BY total_sales DESC LIMIT 10;";
      
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find($id)
    {
        $query = "SELECT *, (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = `products`.`category_id` ) as category FROM `products` WHERE `product_id` = ?  ";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function find_all($fildes , $values)
    {
        $query = "SELECT * FROM `products` WHERE `$fildes` = ?";
        $result = $this->query($query, [$values])->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function filter($search_name = null  , $search_brand = null )
    {

        $query = "SELECT * , (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = `products`.`category_id` ) as category FROM `products` WHERE `name` LIKE ?  AND `brand` LIKE ? ";  
        $params = [$search_name, $search_brand];  
        $result = $this->query($query, $params)->fetchAll();  
        $this->closeConnection();
        return $result;
    }
    
//!------------------------------------------------------------------------------------------------ img
public function insert_img($id ,$values)
{
    $query = "INSERT INTO `product_images`(`product_id`,  `alt_text`, `image_url`, `created_at`) VALUES (?,?,?, NOW())";
    $params = array_merge([$id] ,array_values($values) );  
    $this->execute($query, $params);  
    $this->closeConnection();  
}
public function find_img($id)
{
    $query = "SELECT * FROM `product_images` WHERE `product_id` =  ?";
    $result = $this->query($query, [$id])->fetchAll();
    $this->closeConnection();
    return $result;
}
public function find_img_update( $id_img)
{
    $query = "SELECT * FROM `product_images` WHERE  `image_id` = ? ";
    $result = $this->query($query, [$id_img])->fetch();
    $this->closeConnection();
    return $result;
}
public function update_img($id, $values)  
{  
    $query = "UPDATE `product_images` SET `alt_text`= ?, `image_url`= ?, `created_at`= NOW() WHERE `image_id` = ?";  
    // ایجاد آرایه جدید با ترکیب مقادیر و شناسه تصویر  
    $params = array_merge(array_values($values), [$id]);  
    $this->execute($query, $params);  
    $this->closeConnection();  
}  
public function delete_img($id) {  
    // اطمینان از اینکه id معتبر است  
    if (!is_numeric($id)) {  
        throw new InvalidArgumentException("Product ID باید یک عدد باشد.");  
    }  

    $query = "DELETE FROM `product_images` WHERE `image_id` = ?";  

    // اجرای کوئری  
    if ($this->execute($query, [$id])) {  
        // در صورت موفقیت، اتصال را ببندید  
        $this->closeConnection();  
        return true; // می‌توانید یک مقدار true برگردانید در صورت موفقیت  
    } else {  
        // در صورت عدم موفقیت، می‌توانید یک خطای مناسب را مدیریت کنید  
        throw new Exception("عملیات حذف با موفقیت انجام نشد.");  
    }  
} 
//!-------------------------------------------------------------------colors 
public function insert_color($id ,$values)
{
    $query = "INSERT INTO `colors`(`product_id`, `color_name`, `titel_name`, `hex_value`, `Front`, `stock` ,`created_at`) VALUES (?,?,?,?,?,?,NOW())";
    $params = array_merge([$id] ,array_values($values) );  
    $this->execute($query, $params);  
    $this->closeConnection();  
}
public function find_color($id)  
{  
    $query = "SELECT * FROM `colors` WHERE product_id = ?";
                $result = $this->query($query, [$id])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}
public function find_color_update($color_id)
{
    $query = "SELECT * FROM `colors` WHERE  `color_id` = ? ";
    $result = $this->query($query, [$color_id])->fetch();
    $this->closeConnection();
    return $result;
}
public function update_color($id, $values)  
{  
    $query = "UPDATE `colors` SET `stock`= ?, `created_at`= NOW() WHERE `color_id` = ?";  
    // ایجاد آرایه جدید با ترکیب مقادیر و شناسه تصویر  
    $params =[ $values, $id];  
    $this->execute($query, $params);  
    $this->closeConnection();  
}  
public function delete_color($id) {  
    // اطمینان از اینکه id معتبر است  
    if (!is_numeric($id)) {  
        throw new InvalidArgumentException("Product ID باید یک عدد باشد.");  
    }  

    $query = "DELETE FROM `colors` WHERE `color_id` = ?";  

    // اجرای کوئری  
    if ($this->execute($query, [$id])) {  
        // در صورت موفقیت، اتصال را ببندید  
        $this->closeConnection();  
        return true; // می‌توانید یک مقدار true برگردانید در صورت موفقیت  
    } else {  
        // در صورت عدم موفقیت، می‌توانید یک خطای مناسب را مدیریت کنید  
        throw new Exception("عملیات حذف با موفقیت انجام نشد.");  
    }  
} 

//!-------------------------------------------------------------------------products
    public function insert($values)
    {
        $query = "INSERT INTO `products` (`user_id`,`name`,`brand` ,`description`,`price`,`stock_qty`,`view`,`Selected`, `Bestseller`, `status`,`category_id`, `created_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, NOW());";
        $this->execute($query , array_values($values));
        $this->closeConnection();
    }
    public function update($id, $values) {
        $query= "UPDATE `products` SET `name` = ?,`brand` = ? , `description` = ?, `price` = ?, `stock_qty` = ?, `view` = ?, `Selected` = ?, `Bestseller` = ?, `status` = ?,`category_id` = ? , `updated_at` = NOW() WHERE `product_id` = ? ";
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
    }
    public function update_butten($id, $field, $value) {  
        // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
        $query = "UPDATE `products` SET `$field` = ? WHERE `product_id` = ?;";  
        
        // از تابع execute استفاده کنید  
        $this->execute($query, [$value, $id]);  
        
        // بستن ارتباط  
        $this->closeConnection();  
    }  

    public function delete($id) {  
        // اطمینان از اینکه id معتبر است  
        if (!is_numeric($id)) {  
            throw new InvalidArgumentException("Product ID باید یک عدد باشد.");  
        }  
    
        $query = "DELETE FROM `products` WHERE `product_id` = ?";  
    
        // اجرای کوئری  
        if ($this->execute($query, [$id])) {  
            // در صورت موفقیت، اتصال را ببندید  
            $this->closeConnection();  
            return true; // می‌توانید یک مقدار true برگردانید در صورت موفقیت  
        } else {  
            // در صورت عدم موفقیت، می‌توانید یک خطای مناسب را مدیریت کنید  
            throw new Exception("عملیات حذف با موفقیت انجام نشد.");  
        }  
    } 
}
