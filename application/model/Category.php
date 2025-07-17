<?php

namespace application\model;
class Category extends Model {
    public function all(){
        $query= "SELECT * FROM `categories`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function count_all(){
        $query= "SELECT COUNT(*) as count FROM `categories`";
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
 
    public function find($id){
        $query = "SELECT * FROM `categories` WHERE `category_id` =  ? ";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function all_cat_post(){
        $query = "SELECT c.name AS category_name,c.img_url AS img_url, c.category_id as category_id, COUNT(p.product_id ) AS post_count FROM categories c LEFT JOIN products p ON c.category_id  = p.category_id GROUP BY c.category_id , c.name ORDER BY c.name;";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function update($id , $values){
        $query= "UPDATE `categories` SET `name` = ? , `description` = ?, `updated_at` = now() WHERE `id` = ? ";
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
    }
    public function delete($id){
        $query = "DELETE FROM `categories` WHERE `id` = ? ;";
        $this->execute($query ,[$id]);
        $this->closeConnection();
    }
}