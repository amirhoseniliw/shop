<?php

namespace application\model\panel;

class Users extends Model
{
    public function all()
    { $query = "SELECT * FROM `users`";
        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find($id)
    {
        $query = "SELECT * FROM `users` WHERE `user_id` = ?";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function insert($values)
    {
        $query = "INSERT INTO `users`(`username`, `email`, `password`, `phone_number`, `address`, `status`, `user_type`,`img_prof`, `created_at`) VALUES (?,?,?,?,?,?,?,?,NOW());";
        $this->execute($query , array_values($values));
        $this->closeConnection();
    }
    public function update($id, $values) {
        $query = "UPDATE `users` SET `username` = ?, `email` = ?, `password` = ?, `phone_number` = ?, `address` = ?, `status` = ?, `user_type` = ?, `img_prof` = ?, `updated_at` = NOW() WHERE `user_id` = ?;";  
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
    }
    public function delete($id) {
        $query = "DELETE FROM `users` WHERE `user_id` = ? ;";
        $this->execute($query ,[$id]);
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
