<?php 
namespace application\model\panel;

class Setting extends Model
{
    public function all()
    { $query = "SELECT * FROM `settings`";
        // $query = "SELECT *,( SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`. `cat_id`) as 'category_name' FROM `articles`";
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
    public function find($id)
    {
        $query = "SELECT * FROM `settings` WHERE `setting_id` = ?";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
  
    public function update($id, $values) {
        $query = "UPDATE `settings` SET `setting_name`= ? ,`setting_number`= ? ,`setting_email`= ? ,`updated_at`= NOW() WHERE `setting_id` = ? ";  
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
    }}