
-- Create database and use it
CREATE DATABASE IF NOT EXISTS apka_order;
USE apka_order;

-- Drop and create products table
DROP TABLE IF EXISTS products;
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Insert sample products
INSERT INTO products (name, category, image, price) VALUES
('Cheese Burger', 'Burger', 'cheese_burger.jpg', 120.00),
('Veg Pizza', 'Pizza', 'veg_pizza.jpg', 180.00),
('Chicken Combo', 'Main course', 'chicken_combo.jpg', 250.00),
('Pepsi', 'Beverage', 'pepsi.jpg', 50.00),
('Chocolate Cake', 'Bakery', 'chocolate_cake.jpg', 150.00),
('Margherita Pizza', 'Pizza', 'margherita_pizza.jpg', 200.00),
('Pasta Alfredo', 'Pasta', 'pasta_alfredo.jpg', 220.00),
('Cheese Pasta', 'Pasta', 'cheese_pasta.jpg', 210.00),
('Cold Coffee', 'Beverage', 'cold_coffee.jpg', 90.00),
('French Fries', 'Main course', 'french_fries.jpg', 100.00),
('Chicken Burger', 'Burger', 'chicken_burger.jpg', 140.00),
('Garlic Bread', 'Bakery', 'garlic_bread.jpg', 80.00),
('Orange Juice', 'Beverage', 'orange_juice.jpg', 70.00),
('Mutton Biryani', 'Main course', 'mutton_biryani.jpg', 300.00),
('Paneer Pizza', 'Pizza', 'paneer_pizza.jpg', 220.00),
('Brownie', 'Bakery', 'brownie.jpg', 100.00),
('Latte Coffee', 'Beverage', 'latte_coffee.jpg', 100.00),
('Veggie Burger', 'Burger', 'veggie_burger.jpg', 110.00),
('White Sauce Pasta', 'Pasta', 'white_sauce_pasta.jpg', 230.00),
('Combo Meal', 'Main course', 'combo_meal.jpg', 280.00);

-- Drop and create orders table
DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    user_id INT NOT NULL,
    payment_method VARCHAR(50),
    payment_detail VARCHAR(255),
    status VARCHAR(50) DEFAULT 'Pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Drop and create reservations table
DROP TABLE IF EXISTS reservations;
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    reservation_date DATE,
    reservation_time TIME,
    guests INT,
    user_id INT NOT NULL
);

-- Drop and create users table
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NULL,
    address TEXT NULL
);

-- Drop and create feedback table
DROP TABLE IF EXISTS feedback;
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    type VARCHAR(50),
    message TEXT,
    rating INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Drop and create support tickets table
DROP TABLE IF EXISTS support_tickets;
CREATE TABLE support_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    subject VARCHAR(255),
    status VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Drop and create user rewards table
DROP TABLE IF EXISTS user_rewards;
CREATE TABLE user_rewards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    points INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
