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
    { $query = "SELECT products.*, categories.name AS categoryname, GROUP_CONCAT(product_images.image_url) AS image_urls FROM products LEFT JOIN categories ON products.category_id = categories.category_id LEFT JOIN product_images ON products.product_id = product_images.product_id GROUP BY products.product_id, categories.name;";
        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
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
    
//!------------------------------------------------------------------------------------------------
public function insert_img($values)
{
    $query = "INSERT INTO `product_images`(`product_id`, `image_url`, `alt_text`, `created_at`) VALUES (?,?,?, NOW())";
    $this->execute($query , array_values($values));
    $this->closeConnection();
}
public function update_img($values)
{
    $query = "INSERT INTO `product_images`(`product_id`, `image_url`, `alt_text`, `created_at`) VALUES (?,?,?, NOW())";
    $this->execute($query , array_values($values));
    $this->closeConnection();
}
public function delete_img($id) {  
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
