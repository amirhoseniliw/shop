<?php

namespace application\model;

class messages extends Model
{
    public function all()
    { $query = "SELECT * FROM `messages`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel($id){
    $query = "SELECT * FROM `messages` WHERE `UserID` =  ? ;  ";  
    $result = $this->query($query, [$id])->fetchAll();
    
        $this->closeConnection();
        return $result;
    }
    public function insert($id_user ,$values)
    {
        $query = "INSERT INTO `addresses` (`UserID` , `AddressText` , `Title`,  `CreatedAt`) VALUES (?,?,?,NOW());";
        $params = array_merge([$id_user], array_values($values));  
        $this->execute($query, $params);  
        $this->closeConnection();
    }
    public function delete($id) {
        $query = "DELETE FROM `addresses` WHERE `AddressID` = ? ;";
        $this->execute($query ,[$id]);
        $this->closeConnection();

    }
}