<?php

namespace application\model\panel;

class Orders extends Model
{
    public function all()
    { $query = "SELECT * FROM `orders`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel(){
        $query = "SELECT orders.*, users.username AS nameuser, products.name AS product_name, GROUP_CONCAT(DISTINCT colors.hex_value) AS colors, GROUP_CONCAT(DISTINCT product_images.image_url) AS image_urls FROM orders LEFT JOIN users ON users.user_id = orders.user_id LEFT JOIN products ON products.product_id = orders.product_id LEFT JOIN colors ON colors.product_id = products.product_id LEFT JOIN product_images ON product_images.product_id = products.product_id GROUP BY orders.order_id, users.username, products.name";  
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function find($id)  
    {  
        $query = "  
        SELECT   
            orders.*,   
            users.username AS username,   
            products.name AS name,   
            products.brand AS brand,  
            GROUP_CONCAT(DISTINCT product_images.image_url SEPARATOR ', ') AS image_urls,  
            addresses.Title AS address_body,  
            addresses.AddressText AS   address_title
        FROM   
            orders   
        LEFT JOIN   
            users ON users.user_id = orders.user_id   
        LEFT JOIN   
            products ON products.product_id = orders.product_id  
        LEFT JOIN   
            product_images AS product_images ON product_images.product_id = products.product_id  
        LEFT JOIN   
            addresses ON addresses.AddressID = orders.id_address  
        WHERE   
            orders.order_id = ?  
        GROUP BY   
            orders.order_id;  
    ";   
    
        $result = $this->query($query, [$id])->fetch();  
        $this->closeConnection();  
        return $result;  
    }  
    public function edit_find($id)
    {
        $query = "SELECT * FROM orders WHERE order_id = ? ;";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    public function update($id , $values)
    {
        $query = "UPDATE `orders` SET `user_id`= ? , `product_id`= ? , `quantity`= ? , `unit_price`= ? , `total_price`= ? ,`total_price_int`= ? , `status`= ? , `updated_at`= NOW() WHERE `order_id` = ?;";
        $this->execute($query ,array_merge( array_values($values), [$id]));
        $this->closeConnection();
       
     
    }
    public function update_butten($id, $field, $value) {  
        // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
        $query = "UPDATE `orders` SET `$field` = ? WHERE `order_id` = ?;";  
        
        // از تابع execute استفاده کنید  
        $this->execute($query, [$value, $id]);  
        
        // بستن ارتباط  
        $this->closeConnection();  
    }  
    public function count() {  
        // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
        $query = "SELECT  COUNT(CASE WHEN status = 'completed' THEN 1 END) AS completed_orders, COUNT(CASE WHEN status = 'canceled' THEN 1 END) AS canceled_orders, COUNT(CASE WHEN status = 'pending' THEN 1 END) AS pending_orders , COUNT(*) AS total_orders FROM orders;";  
        // از تابع execute استفاده کنید  
        $result = $this->query($query )->fetch();
        $totalOrders = $result['total_orders'];
    
        $completedPercentage = $totalOrders > 0 ? ($result['completed_orders'] / $totalOrders) * 100 : 0;
        $canceledPercentage = $totalOrders > 0 ? ($result['canceled_orders'] / $totalOrders) * 100 : 0;
        $pendingPercentage = $totalOrders > 0 ? ($result['pending_orders'] / $totalOrders) * 100 : 0;
    
        // بستن ارتباط
        $this->closeConnection();
        
        // برگرداندن نتیجه
        return [
            'completed_orders' => $result['completed_orders'],
            'completed_percentage' => $completedPercentage,
            'canceled_orders' => $result['canceled_orders'],
            'canceled_percentage' => $canceledPercentage,
            'pending_orders' => $result['pending_orders'],
            'pending_percentage' => $pendingPercentage
        ];
    
    }   
    public function sum_sell()
    {
        $query = "SELECT SUM(total_price_int) AS total_sales FROM orders; ";
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
}
