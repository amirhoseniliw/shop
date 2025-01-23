CREATE DATABASE IF NOT EXISTS tahrirkhayam; -- ایجاد پایگاه داده  
USE tahrirkhayam; -- استفاده از پایگاه داده  

-- جدول دسته‌بندی‌ها  
CREATE TABLE Categories (  
    category_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه دسته‌بندی به صورت خودکار  
    name VARCHAR(100) NOT NULL UNIQUE, -- نام دسته‌بندی (یکتا)  
    description TEXT, -- توضیحات دسته‌بندی  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- زمان آخرین به‌روزرسانی رکورد  
);  

-- جدول کاربران  
CREATE TABLE Users (  
    user_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه کاربر به صورت خودکار  
    username VARCHAR(50) NOT NULL, -- نام کاربری  
    email VARCHAR(100) NOT NULL UNIQUE, -- آدرس ایمیل (یکتا)  
    password VARCHAR(255) NOT NULL, -- رمز عبور  
    phone_number VARCHAR(15), -- شماره تلفن  
    address TEXT, -- آدرس  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    status ENUM('active', 'inactive') DEFAULT 'active', -- وضعیت کاربر (فعال یا غیر فعال)  
    user_type ENUM('regular', 'admin') DEFAULT 'regular' -- نوع کاربر (عادی یا ادمین)  
);  

-- جدول محصولات  
CREATE TABLE Products (  
    product_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه محصول به صورت خودکار  
    name VARCHAR(100) NOT NULL, -- نام محصول  
    description TEXT NOT NULL, -- توضیحات محصول  
    price DECIMAL(10, 2) NOT NULL, -- قیمت محصول  
    stock_qty INT NOT NULL, -- مقدار موجودی محصول  
    category_id INT, -- شناسه دسته‌بندی مرتبط  
    image_url VARCHAR(255), -- URL تصویر محصول  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (category_id) REFERENCES Categories(category_id) -- کلید خارجی به جدول دسته‌بندی‌ها  
);  

-- جدول سبد خرید  
CREATE TABLE Cart (  
    cart_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه سبد خرید به صورت خودکار  
    user_id INT NOT NULL, -- شناسه کاربر  
    product_id INT NOT NULL, -- شناسه محصول  
    quantity INT DEFAULT 1, -- تعداد محصول  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (user_id) REFERENCES Users(user_id), -- کلید خارجی به جدول کاربران  
    FOREIGN KEY (product_id) REFERENCES Products(product_id) -- کلید خارجی به جدول محصولات  
);  

-- جدول سفارش‌ها  
CREATE TABLE Orders (  
    order_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه سفارش به صورت خودکار  
    user_id INT NOT NULL, -- شناسه کاربر  
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ثبت سفارش  
    status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending', -- وضعیت سفارش  
    total_amount DECIMAL(10, 2) NOT NULL, -- مجموع مبلغ سفارش  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (user_id) REFERENCES Users(user_id) -- کلید خارجی به جدول کاربران  
);  

-- جدول جزئیات سفارش‌ها  
CREATE TABLE OrderDetails (  
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه جزئیات سفارش به صورت خودکار  
    order_id INT NOT NULL, -- شناسه سفارش  
    product_id INT NOT NULL, -- شناسه محصول  
    quantity INT NOT NULL, -- تعداد محصول  
    price DECIMAL(10, 2) NOT NULL, -- قیمت محصول  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (order_id) REFERENCES Orders(order_id), -- کلید خارجی به جدول سفارش‌ها  
    FOREIGN KEY (product_id) REFERENCES Products(product_id) -- کلید خارجی به جدول محصولات  
);  

-- جدول پرداخت‌ها  
CREATE TABLE Payments (  
    payment_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه پرداخت به صورت خودکار  
    order_id INT NOT NULL, -- شناسه سفارش  
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان پرداخت  
    amount DECIMAL(10, 2) NOT NULL, -- مبلغ پرداخت  
    status ENUM('completed', 'failed', 'pending') DEFAULT 'pending', -- وضعیت پرداخت  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (order_id) REFERENCES Orders(order_id) -- کلید خارجی به جدول سفارش‌ها  
);  

-- جدول روش‌های پرداخت  
CREATE TABLE PaymentMethods (  
    payment_method_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه روش پرداخت به صورت خودکار  
    method_name VARCHAR(100) NOT NULL UNIQUE, -- نام روش پرداخت (مانند کارت اعتباری، پی‌پال و ...)  
    description TEXT, -- توضیحات اضافی در مورد روش پرداخت  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- زمان آخرین به‌روزرسانی رکورد  
);  

-- جدول بنرها  
CREATE TABLE Banners (  
    banner_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه بنر به صورت خودکار  
    image_url VARCHAR(255) NOT NULL, -- URL تصویر بنر  
    link VARCHAR(255), -- لینک مرتبط با بنر  
    display_order INT DEFAULT 0, -- ترتیب نمایش بنر  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- زمان آخرین به‌روزرسانی رکورد  
);  

-- جدول منوها  
CREATE TABLE Menus (  
    menu_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه منو به صورت خودکار  
    title VARCHAR(100) NOT NULL, -- عنوان منو  
    link VARCHAR(255) NOT NULL, -- لینک منو  
    display_order INT DEFAULT 0, -- ترتیب نمایش منو  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- زمان آخرین به‌روزرسانی رکورد  
);  

-- جدول محصولات علاقه‌مند  
CREATE TABLE Wishlist (  
    wishlist_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه لیست علاقه‌مندی‌ها به صورت خودکار  
    user_id INT NOT NULL, -- شناسه کاربر  
    product_id INT NOT NULL, -- شناسه محصول  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- زمان آخرین به‌روزرسانی رکورد  
    FOREIGN KEY (user_id) REFERENCES Users(user_id), -- کلید خارجی به جدول کاربران  
    FOREIGN KEY (product_id) REFERENCES Products(product_id) -- کلید خارجی به جدول محصولات  
);  

-- جدول تنظیمات سایت  
CREATE TABLE Settings (  
    setting_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه تنظیم به صورت خودکار  
    setting_key VARCHAR(100) NOT NULL UNIQUE, -- کلید تنظیمات (یکتا)  
    setting_value VARCHAR(255), -- مقدار تنظیمات  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد رکورد  
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- زمان آخرین به‌روزرسانی رکورد  
);  

-- جدول مدیریت ارسال ایمیل فراموشی رمز عبور  
CREATE TABLE PasswordResets (  
    reset_id INT AUTO_INCREMENT PRIMARY KEY, -- شناسه درخواست بازنشانی به صورت خودکار  
    email VARCHAR(100) NOT NULL, -- ایمیل کاربر برای ارسال لینک بازنشانی  
    token VARCHAR(255) NOT NULL UNIQUE, -- توکن منحصر به فرد برای بازنشانی  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- زمان ایجاد درخواست  
    expires_at TIMESTAMP NOT NULL  -- زمان انقضای لینک بازنشانی  
);
//!------------------------------------------- TODO
CREATE TABLE Orders (  
    OrderID INT PRIMARY KEY AUTO_INCREMENT,  
    CustomerID INT NOT NULL,  
    OrderDate DATE NOT NULL,  
    ProductID INT NOT NULL,  
    Quantity INT NOT NULL,  
    UnitPrice DECIMAL(10, 2) NOT NULL,  
    TotalPrice DECIMAL(10, 2) AS (Quantity * UnitPrice),  
    OrderStatus VARCHAR(50) DEFAULT 'Processing',  
    FOREIGN KEY (CustomerID) REFERENCES users(user_id ),  
    FOREIGN KEY (ProductID) REFERENCES Products(product_id )    
);
CREATE TABLE `messages` (
    `message_id` INT(11) NOT NULL AUTO_INCREMENT,  -- شناسه پیام
    `sender_id` INT(11) NOT NULL,                 -- شناسه فرستنده پیام (از جدول users)
    `receiver_id` INT(11) NOT NULL,               -- شناسه گیرنده پیام (از جدول users)
    `message` TEXT NOT NULL,                       -- محتوای پیام
    `status` ENUM('sent', 'read', 'delivered') NOT NULL DEFAULT 'sent', -- وضعیت پیام
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, -- تاریخ ارسال
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- تاریخ بروزرسانی
    PRIMARY KEY (`message_id`),                    -- کلید اصلی
    FOREIGN KEY (`sender_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,  -- ارتباط با جدول کاربران (فرستنده)
    FOREIGN KEY (`receiver_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE   -- ارتباط با جدول کاربران (گیرنده)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
