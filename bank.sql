-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2022 at 04:29 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcs350`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `account_number` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `pass_code` int(8) NOT NULL,
  `account_type` varchar(15) NOT NULL,
  `role` varchar(8) DEFAULT NULL,
  `account_balance` decimal(10,2) UNSIGNED ZEROFILL NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`account_number`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=1013 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`account_number`, `user_name`, `pass_code`, `account_type`, `role`, `account_balance`, `date`) VALUES
(1000, 'rony', 1122, 'Checking', 'user', '00008283.00', '2022-12-07'),
(1001, 'dm', 2222, 'Checking', 'admin', '00011372.00', '2022-12-12'),
(1002, 'ckaplan', 1111, 'Checking', 'user', '00000050.00', '2022-12-15'),
(1003, 'ckap', 2255, 'Savings', 'user', '00000354.00', '2022-12-15'),
(1004, 'aiwaa', 3546, 'Checking', 'user', '00005486.00', '2022-12-15'),
(1005, 'azada36', 3333, 'Checking', 'user', '00024586.00', '2022-12-15'),
(1006, 'baram2', 2222, 'Checking', 'user', '00002000.00', '2022-12-15'),
(1007, 'fanaj', 4444, 'Checking', 'user', '00005000.00', '2022-12-15'),
(1008, 'golddn', 2424, 'Checking', 'user', '00000120.00', '2022-12-15'),
(1009, 'Marcelo', 4040, 'Checking', 'user', '00000245.00', '2022-12-15'),
(1010, 'Sayed', 5555, 'Checking', 'user', '00010000.00', '2022-12-15'),
(1011, 'Benjamin', 6666, 'Checking', 'user', '00007521.00', '2022-12-15'),
(1012, 'Matthew', 4747, 'Checking', 'user', '00021445.00', '2022-12-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
