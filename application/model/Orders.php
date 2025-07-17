<?php

namespace application\model;

class Orders extends Model
{
    public function create($data)
    {
        $sql = "INSERT INTO invoices (customer_order_id, factor_number,  created_at)
                VALUES (:order_id, :factor_number,  NOW())";
        $this->query($sql, [
            ':order_id' => $data['order_id'],
            ':factor_number' => $data['factor_number'],
        ]);
    
        return $this->connection->lastInsertId();
    }
    
   
    public function find_factor($id)
    {
        $sql = "SELECT * FROM invoices WHERE id = ?";
        return $this->query($sql, [$id])->fetch();
    }
    

   
    public function get_last_factor_number()
    {
        $query = "SELECT factor_number FROM invoices ORDER BY id DESC LIMIT 1";
        $result = $this->query($query)->fetch();
    
        if ($result && isset($result['factor_number'])) {
            // فرض بر این که فرمت fa_XXXX هست
            $parts = explode('_', $result['factor_number']);
            return isset($parts[1]) ? (int)$parts[1] : 0;
        }
    
        return 0;
    }
    public function find_by_order_id($order_id)
    {
        $query = "SELECT * FROM invoices WHERE customer_order_id  = :order_id LIMIT 1";
        $stmt = $this->query($query, [':order_id' => $order_id]);
        return $stmt->fetch();
    }
    
    public function get_all_customer_orders_by_user($user_id)
    {
        $query = "
            SELECT 
                co.*, 
                u.username AS user_name,
                u.phone_number,      
                c.postal_price,
                a.title AS address_title,
                a.PostalCode,
                ci.name AS city_name,
                p.name AS province_name,
                pm.total_amount
            FROM customer_orders co
            JOIN users u ON co.user_id = u.user_id
            LEFT JOIN addresses a ON co.address_id = a.address_id
            LEFT JOIN city ci ON a.city_id = ci.id 
            LEFT JOIN province p ON ci.province_id = p.id 
            LEFT JOIN city c ON a.city_id = c.id 
            LEFT JOIN payments pm ON co.payment_id = pm.id
            WHERE co.user_id = ?
            ORDER BY co.created_at DESC
        ";
    
        $result = $this->query($query, [$user_id])->fetchAll();
        $this->closeConnection();
        return $result;
    }
    
    public function count_customer_orders_by_user($user_id)
{
    $query = "SELECT COUNT(*) AS count FROM customer_orders WHERE user_id = ?";
    $result = $this->query($query, [$user_id])->fetch();
    $this->closeConnection();
    return $result;
}



    public function get_find_customer_order($id)
    {
        $query = "
            SELECT 
                co.*, 
                u.username AS user_name,
                u.phone_number,      
                c.postal_price AS city_postal_price,
                a.title AS address_title,
                a.PostalCode,
                ci.name AS city_name,
                p.name AS province_name
            FROM customer_orders co
            JOIN users u ON co.user_id = u.user_id
            LEFT JOIN addresses a ON co.address_id = a.address_id
            LEFT JOIN city ci ON a.city_id = ci.id 
            LEFT JOIN province p ON ci.province_id = p.id 
            LEFT JOIN city c ON a.city_id = c.id 
            WHERE co.id = ?
            LIMIT 1
        ";
    
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    

   public function show_by_delivery_code($delivery_code)
{
    $query = "SELECT o.*, 
                     p.*, 
                     c.titel_name, 
                     c.hex_value, 
                     pi.image_url
              FROM orders o 
              JOIN customer_orders co ON FIND_IN_SET(o.order_id, co.orders_ids)
              JOIN products p ON o.product_id = p.product_id
              LEFT JOIN colors c ON o.color_id = c.color_id
              LEFT JOIN (
                  SELECT pi1.product_id, pi1.image_url
                  FROM product_images pi1
                  INNER JOIN (
                      SELECT product_id, MIN(image_id) AS min_image_id
                      FROM product_images
                      GROUP BY product_id
                  ) pi2 ON pi1.product_id = pi2.product_id AND pi1.image_id = pi2.min_image_id
              ) pi ON p.product_id = pi.product_id
              WHERE co.delivery_code = ?";
    
    $result = $this->query($query, [$delivery_code])->fetchAll();
    $this->closeConnection();
    return $result;
}


public function get_all_customer_orders()
{
    $query = "
        SELECT 
            co.*, 
            u.username AS user_name,
            u.phone_number,      
            c.postal_price,
            a.title AS address_title,
            a.PostalCode,
            ci.name AS city_name,
            p.name AS province_name
        FROM customer_orders co
        JOIN users u ON co.user_id = u.user_id
        LEFT JOIN addresses a ON co.address_id = a.address_id
        LEFT JOIN city ci ON a.city_id = ci.id 
        LEFT JOIN province p ON ci.province_id = p.id 
        LEFT JOIN city c ON a.city_id = c.id 
        ORDER BY co.created_at DESC
    ";

    $result = $this->query($query)->fetchAll();
    $this->closeConnection();
    return $result;
}
   
      

    public function all()
    { $query = "SELECT * FROM `orders`";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function allPanel($id){
    $query = "SELECT * FROM `orders` WHERE `user_id` =  ? ;  ";  
    $result = $this->query($query, [$id])->fetchAll();
    
        $this->closeConnection();
        return $result;
    }
    public function find($id)
    {
        $query = "SELECT orders.*, users.username AS nameuser, products.name AS product_name, products.image_url AS image_url, products.brand AS product_brand FROM orders LEFT JOIN users ON users.user_id = orders.user_id LEFT JOIN products ON products.product_id = orders.product_id WHERE orders.order_id = ? ;";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }
    

   
}
