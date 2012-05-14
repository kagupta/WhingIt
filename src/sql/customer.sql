-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2012 at 07:31 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_name` varchar(100) DEFAULT NULL,
  `city` varchar(31) NOT NULL,
  `address` varchar(31) NOT NULL,
  `age` decimal(3,0) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `customer_login` varchar(10) NOT NULL DEFAULT '',
  `customer_password` varchar(10) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  PRIMARY KEY (`customer_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `city`, `address`, `age`, `location`, `email`, `customer_login`, `customer_password`, `gender`) VALUES
('asd', '', '', '29', 'United States', 'to.megha@gmail.com', 'admin', 'kapilg', 'm'),
('Sean', 'newyork', '', '29', 'United States', 'kap.kgp@gmail.com', 'kaps', 'kaps123', 'm'),
('Bill', 'newyork', '9244 Regents road, Apt H', '24', 'United States', 'kap.kgp@gmail.com', 'kap123', 'kap123', 'm'),
('kapil', 'San Diego', '9244 regents road', '27', 'United States', 'k6gupta@cs.ucsd.edu', 'kap', 'kap123', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
