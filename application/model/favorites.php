<?php

namespace application\model;

class favorites extends Model
{
 
    public function allPanel($id) {  
        $query = "  
            SELECT p.*, w.*, GROUP_CONCAT(pi.image_url) AS images   
            FROM wishlist w   
            JOIN products p ON w.product_id = p.product_id   
            LEFT JOIN product_images pi ON p.product_id = pi.product_id   
            WHERE w.user_id = ? AND p.status = 'enable'  
            GROUP BY p.product_id, w.id;"; // به‌جای w.id می‌توانید از w.user_id استفاده کنید  
    
        $result = $this->query($query, [$id])->fetchAll();  
        
        $this->closeConnection();  
        return $result;  
    }  
    public function find_all($id_user) {  
        $query = "SELECT * FROM `wishlist` WHERE `user_id` = ? ";  
        $result = $this->query($query, [$id_user ])->fetchAll();  
        
        $this->closeConnection();  
        return $result;  
    } 
    public function find($id_user , $id_product) {  
        $query = "SELECT * FROM `wishlist` WHERE `user_id` = ? AND `product_id` = ?";  
        $result = $this->query($query, [$id_user , $id_product])->fetch();  
        
        $this->closeConnection();  
        return $result;  
    } 
   public function insert($id_user , $id_product) {
        $query = "INSERT INTO `wishlist` ( `user_id`, `product_id`, `created_at`) VALUES (?,?, NOW())";
        $this->execute($query ,[$id_user ,$id_product ]);
        $this->closeConnection();

    }
    public function delete_home($id_user , $id_product) {
        $query = "DELETE FROM `wishlist`  WHERE `user_id` = ? AND `product_id` = ? ;";
        $this->execute($query ,[$id_user , $id_product]);
        $this->closeConnection();

    }
    public function delete($id) {
        $query = "DELETE FROM `wishlist` WHERE `id` = ? ;";
        $this->execute($query ,[$id]);
        $this->closeConnection();

    }
}