-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.29 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных yeticave
CREATE DATABASE IF NOT EXISTS `yeticave` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `yeticave`;

-- Дамп структуры для таблица yeticave.bets
CREATE TABLE IF NOT EXISTS `bets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bet_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `bet_price` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `lot_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `lot_id` (`lot_id`),
  CONSTRAINT `bets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `bets_ibfk_2` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yeticave.bets: ~3 rows (приблизительно)
INSERT INTO `bets` (`id`, `bet_date`, `bet_price`, `user_id`, `lot_id`) VALUES
	(1, '2022-11-20 18:44:46', 12000, 1, 1),
	(2, '2022-11-20 18:44:46', 10000, 1, 3),
	(3, '2022-11-20 18:44:46', 6500, 2, 6);

-- Дамп структуры для таблица yeticave.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(128) DEFAULT NULL,
  `name_category` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yeticave.categories: ~6 rows (приблизительно)
INSERT INTO `categories` (`id`, `code`, `name_category`) VALUES
	(1, 'boards', 'Доски и лыжи'),
	(2, 'attachment', 'Крепления'),
	(3, 'boots', 'Ботинки'),
	(4, 'clothing', 'Одежда'),
	(5, 'tools', 'Инструменты'),
	(6, 'other', 'Разное');

-- Дамп структуры для таблица yeticave.lots
CREATE TABLE IF NOT EXISTS `lots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_date` date DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `about` text,
  `img` varchar(128) DEFAULT NULL,
  `start_price` int DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `step` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `winner_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `winner_id` (`winner_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `lots_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lots_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lots_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yeticave.lots: ~6 rows (приблизительно)
INSERT INTO `lots` (`id`, `order_date`, `title`, `about`, `img`, `start_price`, `completion_date`, `step`, `author_id`, `winner_id`, `category_id`) VALUES
	(1, '2022-11-20', '2014 Rossignol District Snowboard', 'abc', 'uploads/lot-1.jpg', 10999, '2022-12-20', 100, NULL, NULL, 1),
	(2, '2022-11-20', 'DC Ply Mens 2016/2017 Snowboard', 'abc', 'uploads/lot-2.jpg', 159999, '2022-12-30', 100, NULL, NULL, 1),
	(3, '2022-11-20', 'Крепления Union Contact Pro 2015 года размер L/XL', 'abc', 'uploads/lot-3.jpg', 8000, '2023-01-01', 100, NULL, NULL, 2),
	(4, '2022-11-20', 'Ботинки для сноуборда DC Mutiny Charocal', 'abc', 'uploads/lot-4.jpg', 10999, '2022-12-21', 100, NULL, NULL, 3),
	(5, '2022-11-20', 'Куртка для сноуборда DC Mutiny Charocal', 'abc', 'uploads/lot-5.jpg', 7500, '2022-12-10', 100, NULL, NULL, 4),
	(6, '2022-11-20', 'Маска Oakley Canopy', 'abc', 'uploads/lot-6.jpg', 5400, '2022-12-30', 100, NULL, NULL, 6);

-- Дамп структуры для таблица yeticave.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registr_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(128) DEFAULT NULL,
  `contacts` text,
  `user_lots` int DEFAULT NULL,
  `user_bet` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yeticave.users: ~2 rows (приблизительно)
INSERT INTO `users` (`id`, `registr_date`, `user_name`, `user_email`, `user_password`, `contacts`, `user_lots`, `user_bet`) VALUES
	(1, '2022-11-20 18:44:46', 'test1', 'test1@email.com', '123456', 'cats', NULL, NULL),
	(2, '2022-11-20 18:44:46', 'test2', 'test2@email.com', '654321', 'dogs', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
