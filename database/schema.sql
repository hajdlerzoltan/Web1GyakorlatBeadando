CREATE DATABASE IF NOT EXISTS webprog_beadando CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE webprog_beadando;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  last_name VARCHAR(80) NOT NULL,
  first_name VARCHAR(80) NOT NULL,
  login VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  caption VARCHAR(255),
  user_id INT,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL,
  subject VARCHAR(160) NOT NULL,
  message TEXT NOT NULL,
  user_id INT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS cafes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  city VARCHAR(80) NOT NULL,
  address VARCHAR(180) NOT NULL,
  rating DECIMAL(2,1) DEFAULT 0,
  price_level VARCHAR(20) DEFAULT '$$'
);

INSERT INTO cafes(name,city,address,rating,price_level) VALUES
('Central Kávéház','Budapest','Károlyi utca 9.',4.6,'$$$'),
('Espresso Embassy','Budapest','Arany János utca 15.',4.7,'$$'),
('Madal Cafe','Budapest','Hollán Ernő utca 3.',4.5,'$$');
