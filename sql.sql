-- جدول users  
CREATE TABLE users (  
    user_id INT AUTO_INCREMENT PRIMARY KEY,  
    username VARCHAR(50) NOT NULL,  
    email VARCHAR(100) NOT NULL UNIQUE,  
    password VARCHAR(255) NOT NULL,  
    phone_number VARCHAR(15),  
    address TEXT,  
    status ENUM('active', 'inactive') DEFAULT 'active',  
    user_type ENUM('admin', 'customer') DEFAULT 'customer',  
    img_prof VARCHAR(255),  
    created_at DATETIME DEFAULT NOW()  
);  

-- جدول categories  
CREATE TABLE categories (  
    category_id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(100) NOT NULL,  
    description TEXT,  
    img_url VARCHAR(255),  
    created_at DATETIME DEFAULT NOW()  
);  

-- جدول products  
CREATE TABLE products (  
    product_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT NOT NULL,  
    name VARCHAR(100) NOT NULL,  
    brand VARCHAR(50),  
    description TEXT,  
    price DECIMAL(10, 2) NOT NULL,  
    stock_qty INT DEFAULT 0,  
    view INT DEFAULT 0,  
    Selected BOOLEAN DEFAULT FALSE,  
    Bestseller BOOLEAN DEFAULT FALSE,  
    status ENUM('available', 'unavailable') DEFAULT 'available',  
    category_id INT,  
    created_at DATETIME DEFAULT NOW(),  
    FOREIGN KEY (user_id) REFERENCES users(user_id),  
    FOREIGN KEY (category_id) REFERENCES categories(category_id)  
);  

-- جدول orders  
CREATE TABLE orders (  
    order_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT NOT NULL,  
    product_id INT NOT NULL,  
    quantity INT NOT NULL,  
    unit_price DECIMAL(10, 2) NOT NULL,  
    total_price DECIMAL(10, 2) NOT NULL,  
    total_price_int INT NOT NULL,  
    status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',  
    updated_at DATETIME DEFAULT NOW(),  
    FOREIGN KEY (user_id) REFERENCES users(user_id),  
    FOREIGN KEY (product_id) REFERENCES products(product_id)  
);  

-- جدول colors  
CREATE TABLE colors (  
    color_id INT AUTO_INCREMENT PRIMARY KEY,  
    product_id INT NOT NULL,  
    color_name VARCHAR(50) NOT NULL,  
    titel_name VARCHAR(50),  
    hex_value VARCHAR(7) NOT NULL,  
    Front BOOLEAN DEFAULT FALSE,  
    stock INT DEFAULT 0,  
    created_at DATETIME DEFAULT NOW(),  
    FOREIGN KEY (product_id) REFERENCES products(product_id)  
);  

-- جدول product_images  
CREATE TABLE product_images (  
    image_id INT AUTO_INCREMENT PRIMARY KEY,  
    product_id INT NOT NULL,  
    alt_text VARCHAR(100),  
    image_url VARCHAR(255) NOT NULL,  
    created_at DATETIME DEFAULT NOW(),  
    FOREIGN KEY (product_id) REFERENCES products(product_id)  
);  

-- جدول addresses  
CREATE TABLE addresses (  
    address_id INT AUTO_INCREMENT PRIMARY KEY,  
    UserID INT NOT NULL,  
    AddressText TEXT NOT NULL,  
    Title VARCHAR(100),  
    CreatedAt DATETIME DEFAULT NOW(),  
    FOREIGN KEY (UserID) REFERENCES users(user_id)  
);  

-- جدول chats  
CREATE TABLE chats (  
    chat_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT NOT NULL,  
    created_at DATETIME DEFAULT NOW(),  
    FOREIGN KEY (user_id) REFERENCES users(user_id)  
);  