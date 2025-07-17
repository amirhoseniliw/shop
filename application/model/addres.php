<?php

namespace application\model;

class addres extends Model
{
    public function all()
    { $query = "SELECT * FROM `addresses`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel($id) {
        $query = "
        SELECT 
            addresses.*, 
            city.name AS city_name, 
            city.postal_price, 
            province.name AS province_name 
        FROM addresses
        LEFT JOIN city ON addresses.city_id = city.id
        LEFT JOIN province ON addresses.province_id = province.id
        WHERE addresses.UserID = ?;
    ";
    
    
        $result = $this->query($query, [$id])->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function getPostalPriceByAddressId($address_id) {
        $query = "
            SELECT city.postal_price
            FROM addresses
            LEFT JOIN city ON addresses.city_id = city.id
            WHERE addresses.address_id = ?
            LIMIT 1
        ";
        
        $result = $this->query($query, [$address_id])->fetch();
    
        $this->closeConnection();
        
        // اگر نتیجه پیدا شد، مقدار قیمت پستی را برگردان، وگرنه صفر
        return $result ? $result['postal_price'] : 0;
    }
    
    
    public function insert($id_user ,$values)
    {
        $query = "INSERT INTO `addresses` ( `UserID`, `AddressText`, `province_id`, `city_id`, `PostalCode`, `Title`, `CreatedAt`) VALUES (?,?,?,?,?,?,NOW());";
        $params = array_merge([$id_user], array_values($values));  
        $this->execute($query, $params);  
        $this->closeConnection();
    }
    public function delete($id) {
        $query = "DELETE FROM `addresses` WHERE `address_id` = ? ;";
        $this->execute($query ,[$id]);
        $this->closeConnection();

    }
}