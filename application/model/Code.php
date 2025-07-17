<?php

namespace application\model;
class Code extends Model {
   
public function find_code($code){
    $query = "SELECT * FROM `discount_codes` 
              WHERE `code` = ? 
              AND `is_active` = 1 
              AND `used_count` < `usage_limit`
              AND `expire_date` > NOW()";
              
    $result = $this->query($query, [$code])->fetch();
    $this->closeConnection();
    return $result;
}


  public function update_used_count($code) {
    $query = "UPDATE `discount_codes` 
              SET `used_count` = `used_count` + 1, 
                  `updated_at` = NOW() 
              WHERE `code` = ?";
    $this->execute($query, [$code]);
    $this->closeConnection();
}

}