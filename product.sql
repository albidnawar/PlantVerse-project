CREATE DATABASE IF NOT EXISTS product;

USE product;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,            
    name VARCHAR(255) NOT NULL,                   
    description TEXT NOT NULL,                    
    price DECIMAL(10, 2) NOT NULL,                
    image_url VARCHAR(255) NOT NULL,             
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);