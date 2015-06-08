-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2015 年 06 月 02 日 04:54
-- 伺服器版本: 5.5.43-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `meal`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer_tbl`
--

CREATE TABLE IF NOT EXISTS `customer_tbl` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(50) NOT NULL,
  `cust_contact` varchar(20) DEFAULT NULL,
  `cust_no` varchar(8) DEFAULT NULL,
  `cust_address` varchar(100) DEFAULT NULL,
  `cust_phone1` varchar(20) DEFAULT NULL,
  `cust_phone2` varchar(20) NOT NULL,
  `cust_notes` text NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='客戶基本資料表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `food_tbl`
--

CREATE TABLE IF NOT EXISTS `food_tbl` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_desc` varchar(200) DEFAULT NULL,
  `food_notes` text,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
