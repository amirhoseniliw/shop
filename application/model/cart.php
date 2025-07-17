<?php

namespace application\model;

use Exception;
use PDOException;

class cart extends Model
{
public function insert_payment($user_id, $authority, $amount, $total_amount, $status, $ref_id = null, $result = null)
{
    $query = "INSERT INTO `payments` (
                  `user_id`, `authority`, `amount`, `total_amount`, 
                  `status`, `ref_id`, `response_data`, `created_at`
              ) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    $values = [
        $user_id,
        $authority,
        $amount,
        $total_amount,
        $status,
        $ref_id,
        $result ? json_encode($result) : null
    ];

    $result = $this->query($query, $values);

    if ($result) {
        $payment_id = $this->connection->lastInsertId();
    }

    $this->closeConnection();

    return $result ? $payment_id : false;
}

    
 public function insert_customer_orders($user_id, $orders_ids_array, $payment_id, $address_id, $delivery_code)
{
    if (!is_array($orders_ids_array)) {
        $orders_ids_array = explode(',', $orders_ids_array);
    }

    $orders_ids_string = implode(',', $orders_ids_array);

    $query = "INSERT INTO `customer_orders` (
                  `user_id`, `orders_ids`, `payment_id`, `address_id`, 
                  `delivery_code`, `status`, `created_at`
              ) VALUES (?, ?, ?, ?, ?, ?, NOW())";

    // اطمینان از نوع صحیح داده‌ها
    $values = [
        (int) $user_id,
        $orders_ids_string,
        (int) $payment_id,
        (int) $address_id,
        $delivery_code,
        'Paid'
    ];

    $result = $this->query($query, $values);

    if ($result) {
        $customer_order_id = $this->connection->lastInsertId();
    }

    $this->closeConnection();

    return $result ? $customer_order_id : false;
}
public function get_color_id_by_hex($hex_value)
{
    $query = "SELECT `color_id` FROM `colors` WHERE `hex_value` = ?";
    $result = $this->query($query, [$hex_value]);

    if ($result && $result->rowCount() > 0) {
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        $this->closeConnection();
        return $row['color_id'];
    }

    $this->closeConnection();
    return false;
}


    
    public function insert_orders($user_id , $values) {
        $query = "INSERT INTO `orders`( `user_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `total_price_int`, `color_id` , `updated_at`) VALUES (?, ?, ? , ? , ? , ? ,? , now())";
        
        $result = $this->query($query, array_merge([$user_id] , $values));
    
        if ($result) {
            $order_id = $this->connection->lastInsertId(); // ← همین خط مهمه
        }
    
        $this->closeConnection();
    
        return $result ? $order_id : false;
    }
    
    public function update_butten($id, $field, $value) {  
        // از نام فیلد ورودی در SQL به طور ایمن استفاده کنید  
        $query = "UPDATE `orders` SET `$field` = ? WHERE `order_id` = ?;";  
        
        // از تابع execute استفاده کنید  
        $this->execute($query, [$value, $id]);  
        
        // بستن ارتباط  
        $this->closeConnection();  
    }  
    public function get_customer_order_by_id($customer_order_id)
{
    $query = "SELECT * FROM `customer_orders` WHERE `id` = ?";
    $values = [$customer_order_id];

    $result = $this->query($query, $values);

    if ($result && $result->rowCount() > 0) {
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        $this->closeConnection();
        return $row;
    }

    $this->closeConnection();
    return false;
}

    public function insert_customer_order($user_id, $order_ids_string, $delivery_code, $address_id) {
        $query = "INSERT INTO `customer_orders` (`user_id`, `order_ids`, `delivery_code`, `address_id`) VALUES (?, ?, ?, ?)";
        
        $this->execute($query, [$user_id, $order_ids_string, $delivery_code, $address_id]);
    
        $this->closeConnection();
    }
    public function get_orders_by_delivery_code(string $delivery_code): array
{
    $sql = "SELECT * FROM customer_orders WHERE delivery_code = ?";
    $stmt = $this->query($sql, [$delivery_code]);
    return $stmt->fetchAll();
}

    
}     

