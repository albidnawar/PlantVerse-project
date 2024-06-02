CREATE DATABASE IF NOT EXISTS product;

USE product;

CREATE TABLE IF NOT EXISTS products ( 
    product_id VARCHAR(30) PRIMARY KEY, 
    name VARCHAR(255) NOT NULL, 
    description TEXT NOT NULL, p
    rice DECIMAL(10, 2) NOT NULL, 
    image_url VARCHAR(255) NOT NULL, 
    product_type VARCHAR(30) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP );
