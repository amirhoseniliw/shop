<?php

namespace application\model;

use InvalidArgumentException;

class messages extends Model
{
    public function all()
    { $query = "SELECT * FROM `messages`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel_mess($id){
        $query = "SELECT m.*, u.username, u.img_prof , u.phone_number  FROM `messages` m JOIN `users` u ON m.sender_id = u.user_id WHERE m.chat_id = ? ORDER BY `message_id`;";  
        $result = $this->query($query, [$id])->fetchAll();
    
        $this->closeConnection();
        return $result;
    }
    public function allPanel_chath($id){
        $query = "SELECT c.*, u.username FROM `chats` c JOIN `users` u ON c.user_id = u.user_id WHERE c.user_id = ?;   ";  
        $result = $this->query($query, [$id])->fetchAll();
        
            $this->closeConnection();
            return $result;
        }
        public function find_chath($id){
            $query = "SELECT * FROM `chats` WHERE `chat_id` = ?";  
            $result = $this->query($query, [$id])->fetch();
            
                $this->closeConnection();
                return $result;
            }
        
    public function my_send($id){
        $query = "SELECT * FROM `messages` WHERE `sender_id` =  ? ;  ";  
        $result = $this->query($query, [$id])->fetchAll();
        
            $this->closeConnection();
            return $result;
        }
        public function admin_send($id){
            $query = "SELECT * FROM `messages` WHERE `sender_id` <>  ? ;  ";  
            $result = $this->query($query, [$id])->fetchAll();
            
                $this->closeConnection();
                return $result;
            }
            
            public function insert_chat($id_user)
            {
                $query = "INSERT INTO `chats` (`user_id` , `created_at`) VALUES (?,NOW());";
                $params = array_merge([$id_user]);  
                $this->execute($query, $params);  
                $this->closeConnection();
            }
            public function insert($chat_id, $id_user, $values)  
            {  
                $query = "INSERT INTO `messages` (`chat_id`, `sender_id`, `title`, `message`, `created_at`) VALUES (?, ?, ?, ?, NOW());";  
                $params = array_merge([$chat_id, $id_user], array_values($values));  
                $this->execute($query, $params);  
                $this->closeConnection();  
            } 
            public function update_chat($chat_id, $field, $values)  
            {  
                $query = "UPDATE `chats` SET `$field` = ? WHERE `chat_id` = ?";  
                $params = [$values, $chat_id];   
                $this->execute($query, $params);  
                $this->closeConnection();  
            } 
            
       
}