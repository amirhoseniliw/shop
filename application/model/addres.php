<?php

namespace application\model;

class adders extends Model
{
    public function all()
    { $query = "SELECT * FROM `addresses`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel($id){
    $query = "SELECT * FROM `addresses` WHERE `user_id` =  ? ;  ";  
    $result = $this->query($query, [$id])->fetchAll();
    
        $this->closeConnection();
        return $result;
    }}