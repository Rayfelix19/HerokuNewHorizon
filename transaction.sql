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
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` int(4) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `sign` varchar(2) DEFAULT NULL,
  `amount` decimal(10,2) UNSIGNED ZEROFILL NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `account_number`, `reason`, `sign`, `amount`, `date_created`) VALUES
(1, 1000, 'pay bill', NULL, '00000050.00', '2022-12-13'),
(2, 1000, 'Deposit', NULL, '00000050.00', '2022-12-14'),
(3, 1000, 'Deposit', NULL, '00000100.00', '2022-12-14'),
(4, 1000, 'Deposit', NULL, '00000254.00', '2022-12-14'),
(5, 1000, 'Withdraw', NULL, '00000025.00', '2022-12-14'),
(33, 1000, 'Pay Bill', NULL, '00000024.00', '2022-12-15'),
(7, 1000, 'Transfer', NULL, '00000055.00', '2022-12-14'),
(49, 1001, 'Pay Bill', '-', '00000012.00', '2022-12-16'),
(9, 1000, 'Transfer', NULL, '00000012.00', '2022-12-14'),
(10, 1001, 'transfer', NULL, '00000145.00', '2022-12-14'),
(11, 1000, 'Transfer', NULL, '00000145.00', '2022-12-14'),
(13, 1000, 'Transfer', NULL, '00000124.00', '2022-12-14'),
(15, 1000, 'Transfer', NULL, '00001452.00', '2022-12-14'),
(29, 1000, 'Transfer', NULL, '00001445.00', '2022-12-14'),
(17, 1000, 'Transfer', NULL, '00000145.00', '2022-12-14'),
(28, 1001, 'transfer', NULL, '00001445.00', '2022-12-14'),
(19, 1000, 'Transfer', NULL, '00000042.00', '2022-12-14'),
(27, 1000, 'Transfer', NULL, '00000041.00', '2022-12-14'),
(21, 1000, 'Transfer', NULL, '00000014.00', '2022-12-14'),
(26, 1001, 'transfer', NULL, '00000041.00', '2022-12-14'),
(23, 1000, 'Transfer', NULL, '00000014.00', '2022-12-14'),
(24, 1001, 'transfer', NULL, '00000014.00', '2022-12-14'),
(25, 1000, 'Transfer', NULL, '00000014.00', '2022-12-14'),
(34, 1000, 'Travel', NULL, '00000021.00', '2022-12-15'),
(35, 1000, 'Deposit', '+', '00000024.00', '2022-12-15'),
(36, 1000, 'Withdraw', '-', '00000264.00', '2022-12-15'),
(37, 1001, 'transfer', '+', '00000100.00', '2022-12-15'),
(38, 1000, 'Transfer', '-', '00000100.00', '2022-12-15'),
(39, 1000, 'Shopping', '-', '00000214.00', '2022-12-15'),
(40, 1000, 'Deposit', '+', '00002544.00', '2022-12-15'),
(41, 1001, 'transfer', '+', '00000140.00', '2022-12-15'),
(42, 1000, 'Transfer', '-', '00000140.00', '2022-12-15'),
(43, 1001, 'Deposit', '+', '00000200.00', '2022-12-15'),
(44, 1001, 'Shopping', '-', '00000056.00', '2022-12-15'),
(45, 1001, 'Travel', '-', '00000036.00', '2022-12-15'),
(46, 1001, 'Pay Bill', '-', '00000654.00', '2022-12-15'),
(47, 1001, 'Food', '-', '00000245.00', '2022-12-15'),
(48, 1001, 'Withdraw', '-', '00000124.00', '2022-12-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
