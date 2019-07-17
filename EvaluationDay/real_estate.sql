-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2019 at 10:34 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
CREATE TABLE IF NOT EXISTS `housing` (
  `id_housing` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pc` varchar(5) NOT NULL,
  `area` int(5) NOT NULL,
  `price` int(7) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_housing`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id_housing`, `title`, `address`, `city`, `pc`, `area`, `price`, `photo`, `type`, `description`) VALUES
(1, 'Villa Ada', 'via di Villa Ada, 10', 'Roma', '00163', 1000, 900000, 'uploads/test.jpg', 'sale', 'Best Villa in Rome!'),
(6, 'Villa Pamphili', 'via di villa Pamphili, 123', 'Roma', '00163', 4000, 1000000, 'e864027847d276ae9debc57cd79de7504de833210.jpg', 'Sale', 'Buy it now!!!'),
(5, 'qqqqq', 'qqqqqqqqq', 'qqq', '87645', 7654, 2222, '9cf2f47f0058ebad36fb31b3ae6549854d63124f3.jpg', 'Letting', 'ssddfc'),
(7, 'Villa Borghese', 'via di villa Borghese, 123', 'Roma', '00268', 1826, 999999, '90412a5229d0122913aee6ce1774ca9bfd0039be0.jpg', 'Letting', 'live here!!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
