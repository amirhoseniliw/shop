<?php

namespace application\model\panel;
class addresses extends Model {
    public function all_city(){
        $query= "SELECT * FROM `city`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function all_province(){
        $query= "SELECT * FROM `province`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function update_postal_price($id_city , $price)  {
        $query= "UPDATE `city` SET `postal_price` = ? ,  `updated_at` = now() WHERE `id` = ? ";
        $this->execute($query ,[$price, $id_city]);
        $this->closeConnection();
        
    }
    public function find_city($id){
        $query= "SELECT `postal_price` FROM `city` Where `id` = ?";
        $result = $this->query($query , [$id])->fetchAll();
        $this->closeConnection();
        return $result;
    }
   
}