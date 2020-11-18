-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 04:03 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phno` bigint DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `email`, `phno`, `password`) VALUES
(1, 'xyz', 'xyz@gmail.com', 8885522211, '123456'),
(2, 'priya', 'priya@gmail.com', 8888554141, '123456'),
(3, 'Abhishek', 'abhi@gmail.com', 8884442227, '147852'),
(4, 'vinod jain', 'vinodjain@gmail.com', 9422159797, '123456'),
(5, 'Nikhil Das', 'nikhil@gmail.com', 8885554441, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_desc` varchar(255) DEFAULT NULL,
  `prod_price` int DEFAULT NULL,
  `prod_quantity` int DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT 'SHIPPED',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`order_id`, `customer_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_quantity`, `payment_mode`, `order_status`) VALUES
(5, 3, 'laptop', 'i5 core', 50000, 1, 'debit', 'SHIPPED'),
(7, 3, 'laptop bag', 'laptop bag', 15000, 10, 'UPI', 'SHIPPED'),
(9, 2, 'pen', 'red', 20, 5, 'debit', 'SHIPPED'),
(10, 5, 'Bag', 'black', 4500, 1, 'UPI', 'SHIPPED');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
