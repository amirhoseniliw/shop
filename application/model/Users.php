<?php

namespace application\model;

class Users extends Model
{
    public function all()
    { $query = "SELECT * FROM `users`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find_login($username)
    {
        $query = "SELECT * FROM `users` WHERE `username` = ?";
        $result = $this->query($query, [$username])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function find_mob($mobail)
    {
        $query = "SELECT `username` FROM `users` WHERE `phone_number` = ?";
        $result = $this->query($query, [$mobail])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function insert($values)
    {
        $query = "INSERT INTO `users`(`username`, `password`, `phone_number`, `created_at`) VALUES (?,?,?,NOW());";
        $this->execute($query , array_values($values));
        $this->closeConnection();
    }
    public function update_password($mobail, $values) {
        $query = "UPDATE `users` SET  `password` = ?  , `updated_at` = NOW() WHERE `phone_number` = ?;";  
        $this->execute($query ,array_merge( array_values($values), [$mobail]));
        $this->closeConnection();
    }
    public function update($id, $values) {
        $query = "UPDATE `users` SET `username` = ?, `email` = ?, `password` = ?, `phone_number` = ?, `address` = ?, `status` = ?, `user_type` = ?, `img_prof` = ?, `updated_at` = NOW() WHERE `user_id` = ?;";  
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
    }
   
    public function update_butten($id, $field, $value) {  
        // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
        $query = "UPDATE `users` SET `$field` = ? WHERE `user_id` = ?;";  
        
        // از تابع execute استفاده کنید  
        $this->execute($query, [$value, $id]);  
        
        // بستن ارتباط  
        $this->closeConnection();  
    }  
}
