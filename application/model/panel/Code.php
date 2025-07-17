<?php

namespace application\model\panel;
class Code extends Model {
    public function all_panel(){
        $query= "SELECT * , (SELECT `username` FROM `users` WHERE `users`.`user_id` = `discount_codes`.`user_id`) as username_user FROM `discount_codes`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find($id){
        $query= "SELECT * FROM `discount_codes` Where `id` = ?";
        $result = $this->query($query , [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
 
 public function update($id , $values) {
    $query = "UPDATE `discount_codes` 
              SET `code` = ?, `description` = ?, `discount_type` = ?, `discount_value` = ?, 
                  `usage_limit` = ?, `expire_date` = ?, `user_id` = ?, `is_active` = ?, 
                  `updated_at` = now() 
              WHERE `id` = ?";

    // آرایه مقادیر به ترتیب
    $params = [
        $values['code'],
        $values['description'],
        $values['discount_type'],
        $values['discount_value'],
        $values['usage_limit'],
        $values['expire_date'],
        $values['user_id'],
        $values['is_active'],
        $id
    ];

    $this->execute($query, $params);
    $this->closeConnection();
}
 public function insert($values){
        $query = "INSERT INTO `discount_codes` (`code`, `description`,`discount_type` ,`discount_value` ,`usage_limit` ,`expire_date` ,`user_id` ,`is_active` , `created_at`) VALUES (?, ?, ?, ? , ? , ? , ? , ? ,  NOW());";
        $this->execute($query, array_values($values));
        $this->closeConnection();
    }
  
   public function update_status($id , $value)  {
    $query= "UPDATE `discount_codes` SET `is_active` = ? , `updated_at` = now() WHERE `id` = ? ";
        $this->execute($query ,array_merge( [$value],[$id]));
        $this->closeConnection();
   }
  public function update_used_count($id) {
    $query = "UPDATE `discount_codes` 
              SET `used_count` = `used_count` + 1, 
                  `updated_at` = NOW() 
              WHERE `id` = ?";
    $this->execute($query, [$id]);
    $this->closeConnection();
}

}