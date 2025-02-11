<?php

namespace application\model;

class favorites extends Model
{
 
    public function allPanel($id){
    $query = "SELECT p.* , w.* FROM wishlist w JOIN products p ON w.product_id = p.product_id WHERE w.user_id = ?  ;";  
    $result = $this->query($query, [$id])->fetchAll();
    
        $this->closeConnection();
        return $result;
    }
  
    public function delete($id) {
        $query = "DELETE FROM `wishlist` WHERE `wishlist_id` = ? ;";
        $this->execute($query ,[$id]);
        $this->closeConnection();

    }
}