-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2016 at 02:15 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_shop_fixedcode`
--
CREATE DATABASE IF NOT EXISTS `db_shop_fixedcode` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_shop_fixedcode`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abc`(In user int)
begin
	select * from tbl_customer_info where saved_by = user order by cus_name asc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_insert`(IN `company_name` VARCHAR(200), IN `address` TEXT, IN `mobile` VARCHAR(200), IN `email` VARCHAR(200), IN `contact_person` VARCHAR(200), IN `contact_person_mobile` VARCHAR(200), IN `saved_by` INT, IN `payable_amount` DOUBLE, IN `remarks` TEXT, IN `saved_date` DATETIME)
BEGIN

	START TRANSACTION;	
    insert into tbl_supplier (
					c_name,address,mobile,email,contact_person,cp_mobile,saved_by,saved_date
				) values (
					company_name,address,mobile,email,contact_person,contact_person_mobile,saved_by,saved_date
				);
   
      

  insert into tbl_supplier_trans(
      supp_id,total_amount,balance,remarks,saved_by,saved_date
      ) values ( LAST_INSERT_ID(),payable_amount,payable_amount,remarks,saved_by,saved_date);
      
COMMIT;
            END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test_pro`()
    NO SQL
select * from tbl_customer_info$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `saved_by` int(10) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE IF NOT EXISTS `tbl_company_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(200) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `vat_reg_no` varchar(200) NOT NULL,
  `vat_area_code` varchar(200) NOT NULL,
  `vat_status` int(11) NOT NULL,
  `invoice_size` varchar(200) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_info`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_damage`
--

CREATE TABLE IF NOT EXISTS `tbl_damage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qnty` double(10,2) NOT NULL,
  `remarks` text NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  `damage_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `size` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_code` (`item_code`),
  KEY `cat_id` (`cat_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=694 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_price`
--

CREATE TABLE IF NOT EXISTS `tbl_item_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pur_price_code` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `active_date` date NOT NULL,
  `promo_from` date NOT NULL,
  `promo_to` date NOT NULL,
  `remarks` text NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_item_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `saved_by` int(11) NOT NULL,
  `saved_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id` int(11) NOT NULL,
  `pur_id` bigint(20) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bonus_quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `ttl_price` int(11) NOT NULL,
  `pur_date` date NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `sup_id` (`sup_id`),
  KEY `pur_id` (`pur_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qnty` double(10,2) NOT NULL,
  `price` double(10,2) NOT NULL,
  `vat` double(10,2) NOT NULL COMMENT 'per Item',
  `total_price` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL COMMENT 'Per Item/Discount not reduce from item here it is calculating in transaction table',
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  `sales_date` date NOT NULL,
  PRIMARY KEY (`id`) COMMENT 'none',
  KEY `item_id` (`item_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `transc_no` varchar(100) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `return_amt` double(11,2) NOT NULL,
  `pay_date` date NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`) COMMENT 'none',
  KEY `invoice_id` (`invoice_id`),
  KEY `cus_id` (`cus_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `total_vat` double(10,2) NOT NULL,
  `rounding` double(11,2) NOT NULL,
  `g_total` double(10,2) NOT NULL COMMENT 'total sales amount',
  `payed_total` double(10,2) NOT NULL,
  `due_amount` double(10,2) NOT NULL,
  `remarks` text NOT NULL,
  `saved_by` int(11) NOT NULL,
  `tra_date` date NOT NULL,
  `saved_date` datetime NOT NULL,
  `invoice_status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`) COMMENT 'none',
  KEY `invoice_id` (`invoice_id`),
  KEY `cus_id` (`cus_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='all total calculation' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `available_stock` double(11,2) NOT NULL,
  `last_tra_date` date NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `cp_mobile` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supp_id` int(11) NOT NULL,
  `pur_id` bigint(20) NOT NULL COMMENT 'purchase id',
  `total_amount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL COMMENT 'total due',
  `invoice_due` double(11,2) NOT NULL COMMENT 'per invoice due',
  `remarks` text NOT NULL,
  `payment_date` date NOT NULL,
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supp_id` (`supp_id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE IF NOT EXISTS `tbl_user_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `about` text NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `saved_by` int(11) NOT NULL,
  `saved_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `saved_by` (`saved_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`);

--
-- Constraints for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD CONSTRAINT `tbl_company_info_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`);

--
-- Constraints for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD CONSTRAINT `tbl_items_ibfk_2` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`),
  ADD CONSTRAINT `tbl_items_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`id`);

--
-- Constraints for table `tbl_item_price`
--
ALTER TABLE `tbl_item_price`
  ADD CONSTRAINT `tbl_item_price_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`),
  ADD CONSTRAINT `tbl_item_price_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`id`);

--
-- Constraints for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`),
  ADD CONSTRAINT `tbl_purchase_ibfk_4` FOREIGN KEY (`sup_id`) REFERENCES `tbl_supplier` (`id`),
  ADD CONSTRAINT `tbl_purchase_ibfk_5` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`id`);

--
-- Constraints for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD CONSTRAINT `tbl_sales_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`),
  ADD CONSTRAINT `tbl_sales_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`id`);

--
-- Constraints for table `tbl_sales_payment`
--
ALTER TABLE `tbl_sales_payment`
  ADD CONSTRAINT `tbl_sales_payment_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`);

--
-- Constraints for table `tbl_sales_transaction`
--
ALTER TABLE `tbl_sales_transaction`
  ADD CONSTRAINT `tbl_sales_transaction_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`);

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD CONSTRAINT `tbl_supplier_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`);

--
-- Constraints for table `tbl_supplier_trans`
--
ALTER TABLE `tbl_supplier_trans`
  ADD CONSTRAINT `tbl_supplier_trans_ibfk_1` FOREIGN KEY (`saved_by`) REFERENCES `tbl_user_info` (`id`),
  ADD CONSTRAINT `tbl_supplier_trans_ibfk_2` FOREIGN KEY (`supp_id`) REFERENCES `tbl_supplier` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
