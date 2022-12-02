DROP DATABASE IF EXISTS yeticave;

CREATE DATABASE yeticave 
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(128),
    name_category VARCHAR(128)
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  registr_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  user_name VARCHAR(128),
  user_email VARCHAR(128) NOT NULL UNIQUE,
  user_password VARCHAR(128),
  contacts TEXT,
  user_lots INT,
  user_bet INT
);

CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_date DATE,
  title VARCHAR(128),
  about TEXT,
  img VARCHAR(128),
  start_price INT,
  completion_date DATE,
  step INT,
  author_id INT,
  winner_id INT,
  category_id INT,
  FOREIGN KEY (author_id) REFERENCES users (id),
  FOREIGN KEY (winner_id) REFERENCES users (id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE bets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  bet_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  bet_price INT,
  user_id INT,
  lot_id INT,
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (lot_id) REFERENCES lots (id)
);