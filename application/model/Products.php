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
        AND p.`status` = 'enable'  
    GROUP BY p.product_id;";  
    $result = $this->query($query, [$id])->fetch();  
    $this->closeConnection();  
    return $result;  
} 
//!-----------------------------------------------------------------------for search 
// گران ترین
public function find_most_expensive($name)  
{  
    $query = "SELECT   
        p.*,   
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`name` LIKE ?   
    AND p.`status` = 'enable'  
    GROUP BY p.product_id    
    ORDER BY p.price DESC;";  

    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  
//ارزان ترین 
public function find_most_cheap($name)  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`name` LIKE ?  
    AND p.`status` = 'enable' 
        GROUP BY p.product_id     
    ORDER BY p.price ASC ;";  
    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  
//پر فروش
public function find_bestseller_products($name)  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`Bestseller` = 1  
      AND p.`status` = 'enable'  
      AND p.`name` LIKE ?  
    GROUP BY p.product_id;";  
    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  
//محبوب 
public function find_most_viewed($name = '')  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`name` LIKE ?  
     AND p.`status` = 'enable'  
     GROUP BY p.product_id    
    ORDER BY p.view DESC ;";  
    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  
//انتخابب شده 
public function find_selected_products($name)  
{  
    $query = "SELECT   
        p.*,  
        (SELECT `name` FROM `categories` WHERE `categories`.`category_id` = p.`category_id`) AS category,  
        GROUP_CONCAT(DISTINCT ph.image_url) AS photo_file_names,  
        GROUP_CONCAT(DISTINCT ph.alt_text) AS alt_texts  
    FROM `products` p  
    LEFT JOIN `product_images` ph ON p.product_id = ph.product_id  
    WHERE p.`Selected` = 1  
      AND p.`status` = 'enable'  
       AND p.`name` LIKE ?  
    GROUP BY p.product_id;";  
    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
}  

// کلش 
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
    AND p.`status` = 'enable'  
    GROUP BY p.product_id;";  
    $result = $this->query($query, ["%$name%"])->fetchAll();  
    $this->closeConnection();  
    return $result;  
} 
public function count_all()
    {   $query = "SELECT COUNT(*) AS total_products FROM products WHERE `status` = 'enable'; ";
      
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
    public function category()
    { 
          $query = "  
        SELECT c.*, COUNT(p.product_id) AS product_count  
        FROM categories c  
        LEFT JOIN products p ON c.category_id  = p.category_id  
        GROUP BY c.category_id   
    ";  
      
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
public function findColorsByProductId($id)  
{  
    $query = "SELECT *  
    FROM `colors` 
    WHERE product_id = ?
    AND  `status` = 'enable'  
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
        $query= "UPDATE `products` SET `view` = `view` + 1 WHERE `product_id` = ? AND `status` = 'enable'";
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
