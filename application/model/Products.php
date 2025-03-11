<?php

namespace application\model;

use Exception;
use InvalidArgumentException;

class Products extends Model
{
    public function all()
    {
         $query = "SELECT   
    p.*,  
    GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
    GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts,  
    GROUP_CONCAT(DISTINCT c.hex_value) AS color_names  
     FROM `products` p  
      LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
      LEFT JOIN `colors` c ON p.product_id = c.product_id  
      WHERE p.`status` = 'enable'  
       GROUP BY p.product_id;";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find($id)  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`product_id` = ?  
    GROUP BY p.product_id;";  
    $result = $this->query($query, [$id])->fetch();  
    $this->closeConnection();  
    return $result;  
} 
public function find_for_search($name)  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`name` LIKE  ?  
    GROUP BY p.product_id;";  
    $result = $this->query($query, [$name])->fetchAll();  fdefefef
    $this->closeConnection();  
    return $result;  
} 
public function count_all()
    {   $query = "SELECT COUNT(*) AS total_products FROM products; ";
      
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
    public function category()
    {   $query = "SELECT COUNT(*) AS total_products FROM products; ";
      
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
public function findColorsByProductId($id)  
{  
    $query = "SELECT *  
    FROM `colors` 
    WHERE product_id = ?  
    ORDER BY titel_name DESC;";  
    $result = $this->query($query, [$id])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  
    public function find_all($fildes, $values, $int)  
    {  
        // تعریف فیلدهای مجاز  
        $allowedFields = ['id', 'name', 'Selected', 'Bestseller'];  
    
        // بررسی معتبر بودن نام فیلد  
        if (!in_array($fildes, $allowedFields)) {  
            throw new Exception("Invalid field name");  
        }  
    
        // اطمینان از اینکه مقدار $int یک عدد صحیح است  
        $int = (int)$int;  
    
        // ساخت کوئری با JOIN برای جداول photos و colors  
        $query = "SELECT   
    p.*,  
    GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
    GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts,  
    GROUP_CONCAT(DISTINCT c.hex_value) AS color_names  
FROM `products` p  
LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
LEFT JOIN `colors` c ON p.product_id = c.product_id  
WHERE p.`$fildes` = ? AND p.`status` = 'enable'  
GROUP BY p.product_id  
LIMIT 0, $int;  ";  
    
        // اجرای کوئری با پارامترها  
        $result = $this->query($query, [$values])->fetchAll();  
    
        // بستن اتصال  
        $this->closeConnection();  
    
        return $result;  
    }  
    
    
//!------------------------------------------------------------------------------------------------
  
    public function update_view($id) {
        $query= "UPDATE `products` SET `view` = `view` + 1 WHERE `product_id` = ? ";
        $this->execute($query , [$id]);
        $this->closeConnection();
    }
    // public function update_butten($id, $field, $value) {  
    //     // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
    //     $query = "UPDATE `products` SET `$field` = ? WHERE `product_id` = ?;";  
        
    //     // از تابع execute استفاده کنید  
    //     $this->execute($query, [$value, $id]);  
        
    //     // بستن ارتباط  
    //     $this->closeConnection();  
    // }  

  
}
