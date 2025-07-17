<?php

namespace application\model\panel;

class Orders extends Model
{
    //? factor 
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

              LEFT JOIN (
                  SELECT product_id, MAX(titel_name) AS titel_name, MAX(hex_value) AS hex_value
                  FROM colors
                  GROUP BY product_id
              ) c ON p.product_id = c.product_id

              LEFT JOIN (
                  SELECT product_id, MAX(image_url) AS image_url
                  FROM product_images
                  GROUP BY product_id
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

    public function update_status_by_delivery_code($delivery_code, $new_status)
    {
        $query = "UPDATE customer_orders SET status = ? WHERE delivery_code = ?";
        $result = $this->query($query, [$new_status, $delivery_code])->rowCount();
        $this->closeConnection();
        return $result > 0;
    }
    public function get_status_by_delivery_code($delivery_code)
    {
        $query = "SELECT status FROM customer_orders WHERE delivery_code = ?";
        $result = $this->query($query, [$delivery_code])->fetch();
        $this->closeConnection();
        return $result ? $result['status'] : null;
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
        // اجرای کوئری شمارش سفارش‌ها براساس وضعیت از جدول customer_orders
        $query = "
            SELECT  
                COUNT(CASE WHEN status = 'Paid' THEN 1 END) AS paid_orders,
                COUNT(CASE WHEN status = 'InTransit' THEN 1 END) AS intransit_orders,
                COUNT(CASE WHEN status = 'Delivered' THEN 1 END) AS delivered_orders,
                COUNT(CASE WHEN status = 'canceled' THEN 1 END) AS canceled_orders,
                COUNT(*) AS total_orders
            FROM customer_orders;
        ";
    
        $result = $this->query($query)->fetch();
        $totalOrders = $result['total_orders'];
    
        // محاسبه درصدها
        $paidPercentage = $totalOrders > 0 ? number_format(($result['paid_orders'] / $totalOrders) * 100, 2) : 0;
        $inTransitPercentage = $totalOrders > 0 ? number_format(($result['intransit_orders'] / $totalOrders) * 100, 2) : 0;
        $deliveredPercentage = $totalOrders > 0 ? number_format(($result['delivered_orders'] / $totalOrders) * 100, 2) : 0;
        $canceledPercentage = $totalOrders > 0 ? number_format(($result['canceled_orders'] / $totalOrders) * 100, 2) : 0;
        
    
        // بستن ارتباط
        $this->closeConnection();
    
        // بازگرداندن نتایج
        return [
            'paid_orders' => $result['paid_orders'],
            'paid_percentage' => $paidPercentage,
            'intransit_orders' => $result['intransit_orders'],
            'intransit_percentage' => $inTransitPercentage,
            'delivered_orders' => $result['delivered_orders'],
            'delivered_percentage' => $deliveredPercentage,
            'canceled_orders' => $result['canceled_orders'],
            'canceled_percentage' => $canceledPercentage,
            'total_orders' => $totalOrders
        ];
    }
    public function countByDate()
{
    $query = "
        SELECT 
            DATE(co.created_at) AS order_date,
            COUNT(co.orders_ids) AS total_orders,
            SUM(p.total_amount) AS total_paid
        FROM customer_orders co
        JOIN payments p ON co.payment_id = p.id
        WHERE co.status IN ('Paid', 'InTransit', 'Delivered', 'canceled')
        GROUP BY DATE(co.created_at)
        ORDER BY order_date DESC
    ";

    $result = $this->query($query)->fetchAll();
    $this->closeConnection();
    return $result;
}

    public function sum_sell()
    {
        $query = "SELECT SUM(total_amount ) AS total_sales FROM payments; ";
        $result = $this->query($query)->fetch();
        $this->closeConnection();
        return $result;
    }
}
