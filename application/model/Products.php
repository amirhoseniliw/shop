<?php

namespace application\model;

use Exception;
use InvalidArgumentException;

class Products extends Model
{
    public function all()
    { $query = "SELECT * FROM `products` WHERE `status` = 'enable' ";
        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
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
    
        // ساخت کوئری
        $query = "SELECT * FROM `products` WHERE `$fildes` = ? AND `status` = 'enable' LIMIT 0, $int;";
    
        // اجرای کوئری با پارامترها
        $result = $this->query($query, [$values])->fetchAll();
    
        // بستن اتصال
        $this->closeConnection();
    
        return $result;
    }
    
    
//!------------------------------------------------------------------------------------------------
  
    // public function update($id, $values) {
    //     $query= "UPDATE `products` SET `name` = ?,`brand` = ? , `description` = ?, `price` = ?, `stock_qty` = ?, `view` = ?, `Selected` = ?, `Bestseller` = ?, `status` = ?,`category_id` = ?,`image_url` = ?, `updated_at` = NOW() WHERE `product_id` = ? ";
    //     $this->execute($query ,array_merge( array_values($values), [$id]));
    //     $this->closeConnection();
    // }
    // public function update_butten($id, $field, $value) {  
    //     // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
    //     $query = "UPDATE `products` SET `$field` = ? WHERE `product_id` = ?;";  
        
    //     // از تابع execute استفاده کنید  
    //     $this->execute($query, [$value, $id]);  
        
    //     // بستن ارتباط  
    //     $this->closeConnection();  
    // }  

  
}
