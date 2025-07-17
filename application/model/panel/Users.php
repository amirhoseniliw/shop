<?php

namespace application\model\panel;

class Users extends Model
{
public function all()
{
    $query = "SELECT * FROM `users`";
    $result = $this->query($query)->fetchAll();
    $this->closeConnection();

    foreach ($result as &$user) {
        $user['password'] = "0"; // حذف رمز هر کاربر
    }

    return $result;
}
public function all_print()
{
    $query = "
        SELECT 
            u.user_id,
            u.username,
            u.email,
            u.phone_number,
            u.img_prof,
            u.status,
            u.user_type,
            u.created_at,

            -- آدرس کامل از جدول addresses
            a.Title AS latest_address,

            -- نام شهر و استان از جدول‌های مربوطه
            c.name AS city_name,
            p.name AS state_name,

            -- تعداد سفارش‌های پرداخت‌شده برای هر کاربر
            COALESCE(o.paid_order_count, 0) AS paid_order_count

        FROM users u

        -- گرفتن آخرین آدرس ثبت‌شده کاربر با استفاده از زیر کوئری و JOIN
        LEFT JOIN (
            SELECT a1.*
            FROM addresses a1
            INNER JOIN (
                SELECT UserID, MAX(CreatedAt) AS max_created
                FROM addresses
                GROUP BY UserID
            ) a2 ON a1.UserID = a2.UserID AND a1.CreatedAt = a2.max_created
        ) a ON u.user_id = a.UserID

        -- گرفتن نام شهر
        LEFT JOIN city c ON a.city_id = c.id

        -- گرفتن نام استان
        LEFT JOIN province p ON a.province_id = p.id

        -- گرفتن تعداد سفارش‌های پرداخت‌شده برای هر کاربر
        LEFT JOIN (
            SELECT user_id, COUNT(*) AS paid_order_count
            FROM customer_orders
            WHERE status != 'canceled'
            GROUP BY user_id
        ) o ON u.user_id = o.user_id
    ";

    $users = $this->query($query)->fetchAll();
    $this->closeConnection();

    // حذف رمز عبور از داده‌ها (در صورتی که بخوای بعداً چیزی اضافه بشه)
    foreach ($users as &$user) {
        $user['password'] = '0';
    }

    return $users;
}

// public function all_print()
// {
//     $query = "
//         SELECT 
//             u.user_id,
//             u.username,
//             u.email,
//             u.phone_number,
//             u.created_at,
//             u.updated_at,

//             -- آدرس کامل از جدول addresses
//             a.Title AS latest_address,

//             -- نام شهر و استان از جدول‌های مربوطه
//             c.name AS city_name,
//             s.name AS state_name,

//             -- تعداد سفارش‌های پرداخت‌شده
//             COALESCE(o.paid_order_count, 0) AS paid_order_count

//         FROM users u

//         -- گرفتن آخرین آدرس ثبت‌شده کاربر با استفاده از زیر کوئری و JOIN
//         LEFT JOIN (
//             SELECT a1.*
//             FROM addresses a1
//             INNER JOIN (
//                 SELECT UserID, MAX(CreatedAt) AS max_created
//                 FROM addresses
//                 GROUP BY UserID
//             ) a2 ON a1.UserID = a2.UserID AND a1.CreatedAt = a2.max_created
//         ) a ON u.user_id = a.UserID

//         -- گرفتن نام شهر
//         LEFT JOIN city c ON a.city_id = c.id

//         -- گرفتن نام استان
//         LEFT JOIN province s ON a.province_id = s.id

//         -- گرفتن تعداد سفارش‌های پرداخت‌شده برای هر کاربر
//         LEFT JOIN (
//             SELECT user_id, COUNT(*) AS paid_order_count
//             FROM customer_orders
//             WHERE status = 'paid'
//             GROUP BY user_id
//         ) o ON u.user_id = o.user_id
//     ";

//     $users = $this->query($query)->fetchAll();
//     $this->closeConnection();

//     return $users;
// }





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
