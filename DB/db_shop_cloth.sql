-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2016 at 06:09 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_shop_cloth`
--
CREATE DATABASE IF NOT EXISTS `db_shop_cloth` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_shop_cloth`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`, `status`, `saved_by`, `saved_date`) VALUES
(1, 'Plate', 1, 1, '2016-03-09 02:03:13'),
(2, 'Shampoo', 1, 1, '2015-09-09 08:09:58'),
(3, 'Aerosol', 1, 1, '2015-09-09 08:09:04'),
(4, 'Dish wash', 1, 1, '2015-09-09 08:09:08'),
(5, 'Biscuit', 1, 1, '2015-09-09 08:09:12'),
(6, 'Body Spray', 1, 3, '2015-09-10 07:09:45'),
(7, 'Talcum Powder ', 1, 2, '2015-09-09 09:09:14'),
(8, 'Sanitary napkin', 1, 3, '2015-09-10 12:09:36'),
(9, 'Tooth brush', 1, 3, '2015-09-10 12:09:10'),
(10, 'CREAM', 1, 3, '2015-09-10 10:09:09'),
(11, 'shaving accessories', 1, 3, '2015-09-10 12:09:34'),
(12, 'Toilet cleaner', 1, 3, '2015-09-10 12:09:54'),
(13, 'Detergent', 1, 3, '2015-09-10 01:09:18'),
(14, 'Baby food', 1, 3, '2015-09-10 01:09:28'),
(15, 'Powder milk', 1, 3, '2015-09-10 01:09:44'),
(16, 'Tissue', 1, 3, '2015-09-10 01:09:56'),
(17, 'Laundry Soap', 1, 3, '2015-09-10 01:09:14'),
(18, 'Mosquito coil', 1, 3, '2015-09-10 01:09:29'),
(19, 'Grocery', 1, 3, '2015-09-10 01:09:16'),
(20, 'Ghee and Butter oil', 1, 3, '2015-09-10 01:09:43'),
(21, 'Hair Oil', 1, 3, '2015-09-10 01:09:05'),
(22, 'Cooking Oil', 1, 3, '2015-09-10 01:09:15'),
(23, 'Air Freshner', 1, 3, '2015-09-10 01:09:29'),
(24, 'Noodles', 1, 3, '2015-09-10 01:09:40'),
(25, 'Nutrition Drink', 1, 3, '2015-09-10 01:09:26'),
(26, 'Chips', 1, 3, '2015-09-10 01:09:34'),
(27, 'Tea', 1, 3, '2015-09-10 01:09:40'),
(28, 'Coffee', 1, 3, '2015-09-10 01:09:49'),
(29, 'Salt', 1, 3, '2015-09-10 01:09:54'),
(30, 'Food Items', 1, 3, '2015-09-10 01:09:04'),
(31, 'Antiseptic', 1, 3, '2015-09-10 01:09:18'),
(32, 'Semai', 1, 3, '2015-09-10 01:09:27'),
(33, 'Conditioner', 1, 3, '2015-09-10 01:09:51'),
(34, 'Hand wash', 1, 3, '2015-09-10 06:09:36'),
(35, 'Toothpaste', 1, 3, '2015-09-10 07:09:16'),
(36, 'Chocolate', 1, 1, '2015-09-11 03:09:37'),
(37, 'deodoranten', 1, 1, '2015-09-11 04:09:13'),
(38, 'Face Wash', 1, 2, '2015-09-11 04:09:55'),
(39, 'lotion', 1, 3, '2015-09-11 06:09:53'),
(40, 'Battery', 1, 3, '2015-09-12 02:09:24'),
(41, 'baby items', 1, 3, '2015-09-12 05:09:34'),
(42, 'diapers', 1, 3, '2015-09-13 11:09:35'),
(43, 'Sugar', 1, 2, '2015-09-14 11:09:51'),
(44, 'Condensed milk', 1, 2, '2015-09-14 12:09:47'),
(45, 'Cosmetics', 1, 3, '2015-09-15 02:09:14'),
(46, 'Tray', 1, 1, '2016-03-10 03:03:28'),
(47, 'Bowl ', 1, 1, '2016-03-16 12:03:35'),
(48, 'Plastics', 1, 1, '2016-03-16 12:03:30'),
(49, 'Dinner Set', 1, 1, '2016-03-20 01:03:16'),
(50, 'Test', 1, 1, '2016-05-09 12:05:51');

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

--
-- Dumping data for table `tbl_company_info`
--

INSERT INTO `tbl_company_info` (`id`, `company_name`, `address`, `phone`, `mobile`, `email`, `website`, `vat`, `vat_reg_no`, `vat_area_code`, `vat_status`, `invoice_size`, `logo`, `saved_by`, `saved_date`) VALUES
(1, 'pos Bostraloy', '', '', '', '', '', '0.00', '', '', 1, 's', '', 1, '2015-09-09 08:09:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_customer_info`
--

INSERT INTO `tbl_customer_info` (`id`, `cus_name`, `address`, `email`, `mobile`, `status`, `saved_by`, `saved_date`) VALUES
(1, 'Liton', 'Ullapara Sirajganok', 'liton@gmail.com', '01723626707', 1, 1, '2016-03-09 02:03:12'),
(2, 'Hassan', 'Mawna', 'kala190@ovi.com', '01754941333', 1, 1, '2016-03-16 12:03:08'),
(3, 'mamun sabuj', 'sdfsdfs', 'mamun@gmail.com', '4858945', 1, 1, '2016-05-09 12:05:32');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=698 ;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `item_code`, `cat_id`, `item_name`, `size`, `unit`, `photo`, `description`, `status`, `saved_by`, `saved_date`) VALUES
(1, '8513692165404', 1, 'Sandalina', '125 gm', 'PC', 'no_image.png', 'Sandalina sandal soap', 1, 2, '2015-09-09 09:09:55'),
(2, '8139003000891', 6, 'ACI Cockroach Spray 250', '250 ml', 'PC', 'no_image.png', 'For control of cockroaches', 1, 3, '2015-09-10 05:09:07'),
(3, '8513690304454', 7, 'Tibet Prickly Heat Powder', '100 gm', 'PC', 'no_image.png', 'Skin Powder', 1, 2, '2015-09-09 09:09:21'),
(4, '813903000042', 3, 'ACI AEROSOL 800', '800 ml', 'PC', 'no_image.png', 'ACI Aerosol Insect Spray', 1, 3, '2015-09-10 05:09:41'),
(5, '813903000028', 3, 'ACI AEROSOL 350', '350 ml', 'PC', 'no_image.png', 'ACI Aerosol Insect Spray', 1, 3, '2015-09-10 05:09:56'),
(6, '813903000035', 3, 'ACI AEROSOL 475', '475 ml', 'PC', 'no_image.png', 'ACI Aerosol Insect Spray', 1, 3, '2015-09-10 05:09:01'),
(7, '3014260220051', 11, 'Gillette Moisturizing', '195 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:47'),
(8, '3014260214692', 11, 'Gillette Sensitive skin', '195 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:08'),
(9, '3014260214678', 11, 'Gillette Sensitive skin', '245 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:11'),
(10, '7702018001132', 11, 'Gillette foam sensitive skin', '98 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:40'),
(11, '3014260656737', 11, 'Gillette foam regular', '98 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:36'),
(12, '7702018001767', 11, 'Gillette Gel cool cleaning', '195 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:29'),
(13, '3014260258313', 11, 'Gillette after shave splash', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:20'),
(14, '4902430442664', 11, 'Gillette foam Lemon lime', '196 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:15'),
(15, '080878172054', 2, 'Pantene Repair and protect', '375 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:34'),
(16, '080878057245', 2, 'Pantene Ice Shine', '375 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:23'),
(17, '080878057184', 2, 'Pantene Aqua Light', '375 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:08'),
(18, '080878002184', 2, 'Pantene All hair ', '375 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:11'),
(19, '4902430413008', 2, 'Pantene Anti Dandruff', '480 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:12'),
(20, '4902430399531', 2, 'Pantene Silky smooth care', '70 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:09'),
(21, '4902430401142', 2, 'Pantene Hair fall control', '70 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:00'),
(22, '4902430399425', 33, 'Pantene Total damage care 10', '165 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:48'),
(23, '4902430400602', 2, 'Pantene Total damage care 10', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:24'),
(24, '4902430400886', 2, 'Pantene Hair fall control', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:07'),
(25, '4902430400879', 2, 'Pantene Silky smooth care', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:18'),
(26, '4902430397087', 2, 'Head and Shoulders clean and balance', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:17'),
(27, '4902430396035', 2, 'Head and Shoulders cool menthol', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:11'),
(28, '4902430507066', 2, 'Head and Shoulders men hair retain', '165 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:28'),
(29, '4902430400961', 33, 'Pantene silky smooth care', '165 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 01:09:33'),
(30, '4902430400978', 33, 'Pantene Hair fall control', '165 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:25'),
(31, '4902430400947', 2, 'Pantene anti dandruff ', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:20'),
(32, '4902430396028', 2, 'Head and Shoulders smooth and silky', '170 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:11'),
(33, '4902430360906', 10, 'Olay total effect 7 in 1', '20 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:27'),
(34, '4902430284134', 10, 'Olay natural white all in one fairness day cream', '20 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:49'),
(35, '4902430360111', 10, 'Olay total effect 7 in 1 ', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:42'),
(36, '4902430613583', 8, 'Whisper maxi fit ', '8 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:06'),
(37, '4902430613590', 8, 'Whisper maxi fit', '15 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:18'),
(38, '4902430604697', 8, 'Whisper ultra clean', '8 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:40'),
(39, '4902430404150', 9, 'Oral-B all rounder extra soft', 'x 5', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:25'),
(40, '4902430614733', 9, 'Oral-B pro health ', 'soft 40', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:29'),
(41, '4902430614771', 9, 'Oral-B pro health ', 'medium 40', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:33'),
(42, '4902430605878', 9, 'Oral-B all rounder', 'medium 40', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:21'),
(43, '8513690351250', 21, 'Tibet pumpkin hair oil', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:23'),
(44, '8513690304850', 21, 'tibet pumpkin hair oil', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:10'),
(45, '8513690604509', 7, 'Ice Cool Prickly Heat Skin Powder', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 02:09:21'),
(46, '8513691147500', 4, 'Xpert Dishwash powder', '750 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:20'),
(47, '8513695125757', 12, 'Clean Master  Liquid  Toilet Cleaner 500 ml', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:55'),
(48, '8513690310172', 1, 'Tibet Ball Soap', '130 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:05'),
(49, '8513692083180', 1, 'Tibet Laundry Soap Blue', '130 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:27'),
(50, '8513691411908', 13, 'Fast Wash  Briliant White', '1000 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:53'),
(51, '8513691417481', 13, 'Fast Wash Briliant white', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:19'),
(52, '8513691216329', 13, 'Tibet Detergent Powder', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:15'),
(53, '8513691146305', 4, 'Xpert Dishwash Powder', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:30'),
(54, '513690193140', 1, 'Tibet 570 Laundry Read', '130 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:30'),
(55, '8513691104251', 1, 'Tibet Beauty Soap Nature Fresh', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:25'),
(56, '4902430595834', 11, 'Gillette vector automatic', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:58'),
(57, '8901358702436', 11, 'Gillette blue 2', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:50'),
(58, '7702018017515', 11, 'Gillette blue 3', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:06'),
(59, '3014260274917', 11, 'Gillette march 3 turbo 4 blades', '4 blades', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:50'),
(60, '7702018879069', 11, 'Gillete fusion blade', '4 blades', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:08'),
(61, '7702018877478', 11, 'Gillete fusion blade', '2 blades', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:25'),
(62, '7702018918041', 11, 'Gillete fusion razor', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:10'),
(63, '7702018041138', 11, 'Gillete march 3 turbo sensitive blade', '2 cartidges', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:42'),
(64, '7702018041107', 11, 'Gillete march 3 sesitive razor', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:57'),
(65, '4902430620680', 11, 'Gillete vector blade', '2 blades', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:47'),
(66, '4902430620703', 11, 'Gillete vector blade', '4 blades', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 03:09:53'),
(67, '4902430563475', 11, 'Gillete march 3 nano thin razor', '', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:43'),
(68, '7702018996469', 11, 'Gillete blue 3 2x', '2x', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:37'),
(69, '815300000137', 32, 'ACI Lachcha ', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:25'),
(70, '815300000090', 32, 'ACI Vermicelli', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:25'),
(71, '8153003000606', 24, 'ACI Stick ', '180 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:26'),
(72, '816903002566', 22, 'ACI Mustard oil', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:05'),
(73, '8153003000491', 22, 'ACI Rice Bran', '1 liter', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:39'),
(74, '8153003000422', 22, 'ACI Rice Bran', '5 liter', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:43'),
(75, '8153003000507', 22, 'ACI Rice Bran', '2 liter', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:57'),
(76, '1215144151412', 27, 'Tetle Premium Leaf', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:39'),
(77, '1215144151467', 27, 'Tetly Premium Leaf', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:47'),
(78, '1215144151474', 27, 'Tetly Premium Leaf', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:55'),
(79, '1215144151443', 27, 'Tetly Premium Leaf', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:46'),
(80, '1215144151559', 27, 'Tetley Premium tea bags', '50 pcs', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 04:09:06'),
(81, '813163615109', 19, 'ACI Salt', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:47'),
(82, '816903000746', 19, 'ACI Chinigura Rice', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:35'),
(83, '8153003000385', 19, 'ACI suji', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:30'),
(84, '8153003000378', 19, 'ACI Maida', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:17'),
(85, '8153003000354', 19, 'ACI Atta', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:49'),
(86, '815300000250', 19, 'Aci Atta', '2 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:26'),
(87, '8153003000361', 19, 'ACI Maida', '2 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:03'),
(88, '813903000332', 3, 'ACI Cockroach 475', '475 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:09'),
(89, '8139003000945', 18, 'ACI Hi Booster', '10 h', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:52'),
(90, '813903000202', 18, 'ACI Black Fighter', '10 h', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:48'),
(91, '8139003000808', 18, 'ACI Jumbo', '12 h', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:27'),
(92, '813903000127', 3, 'ACI AEROSOL 250', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:01'),
(93, '813903000271', 31, 'Savlon  Cream 30', '30 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:08'),
(94, '813903000264', 31, 'Savlon 60', '60 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:44'),
(95, '813903000288', 31, 'Savlon Lequid 1 lt', '1 liter', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:53'),
(96, '813903000776', 12, 'Vanish quick action 750 ml', '750 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:04'),
(97, '8139003001188', 4, 'Wander 500ml', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 05:09:57'),
(98, '813903000431', 8, 'Savlon freedom regular flow belt system', '10 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:29'),
(99, '813903000448', 8, 'savlon freedom regular flow panty system', '10 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:34'),
(100, '813903000400', 8, 'Savlon freedom heavy flow wing 8pd', '8 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:50'),
(101, '813903000707', 8, 'Savlon freedom heavy flow wing 16 pd', '16 pd ', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:12'),
(102, '813903000394', 8, 'Savlon freedom regular flow wing 10 pd', '10 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:57'),
(103, '8139003001058', 8, 'Freedom Ultra', '8 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:05'),
(104, '813903000301', 31, 'Savlon Lequid', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:51'),
(105, '8139003000839', 4, 'Wander Clean it', '325 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:05'),
(106, '8139003001225', 4, 'Septex', '325 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:56'),
(107, '816903002399', 34, 'Savlon Aloe vera', '1 liter', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:29'),
(108, '813903000615', 34, 'Savlon Aloe vera', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:18'),
(109, '813903000486', 34, 'Savlon Aloe Vera', '500 ml ', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:59'),
(110, '813903000479', 34, 'Savlon Ocean Blue', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:00'),
(111, '813903000608', 34, 'Savlon Ocean Blue', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:41'),
(112, '813903000622', 34, 'Savlon Ocean Blue refill', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:41'),
(113, '813903000639', 34, 'Savlon Aloe Vera Refill', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:08'),
(114, '813903000295', 34, 'Savlon Active refill', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 06:09:43'),
(115, '8139003001430', 4, 'Wander dish wash  Liquid refill', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:35'),
(116, '8139003000884', 23, 'Angelic Fruit Punch', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:07'),
(117, '8139003000853', 23, 'Angelic Orchid Breeze', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:08'),
(118, '8139003000877', 23, 'Angelic Misty Wood', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:01'),
(119, '8139003001140', 23, 'Angelic Amazonia', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:36'),
(120, '8139003000846', 23, 'Angelic Citrus Burst', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:22'),
(121, '8139003000860', 23, 'Angelic Sparkling Orange', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:05'),
(122, '8139003001119', 6, 'Impact Eclips', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:47'),
(123, '8139003001096', 6, 'Impact Voyage', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:28'),
(124, '8139003001027', 1, 'Savlon Antiseptic soap', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:56'),
(125, '8901314114426', 35, 'Colgate Max Fresh', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:21'),
(126, '8901314010520', 35, 'Strong Teeth', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:06'),
(127, '8901314009081', 35, 'Colgate Active Salt', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:10'),
(128, '8901314077790', 35, 'Colgate Visible White', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:17'),
(129, '8901314009586', 35, 'Colgate Active Salt', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:55'),
(130, '8901314010025', 35, 'Colgate Strong Teeth', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:07'),
(131, '8901314021045', 35, 'Colgate Herbal', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:02'),
(132, '8901314114518', 35, 'Colgate Max Fresh ', '80 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 07:09:39'),
(133, '8941114006255', 5, 'Kishwan Chocolate Cookie', '265 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:59'),
(134, '8941114006057', 5, 'Kishwan Horlicks', '350 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:45'),
(135, '8941114006095', 5, 'Kishwan Ovaltine ', '350 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:36'),
(136, '8941114006101', 5, 'Kishwan Grisbi', '350 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:17'),
(137, '8941114006019', 5, 'Kishwan Special Toast', '300gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:22'),
(138, '8941114005951', 5, 'Kishwan Fiore', '300 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:07'),
(139, '8941114008259', 5, 'Kishwan Sugar Free', '300 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:40'),
(140, '8941165002725', 5, 'Gold Mark Chocolatee', '52 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:11'),
(141, '8941165012502', 5, 'Gold Mark Milk Cookies', '250 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 08:09:59'),
(142, '8941165002527', 5, 'Gold Mark Chocolate Chips Cookies', '60 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:34'),
(143, '89411521000376', 5, 'doreo black chocolate sandwich cream', '420 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:51'),
(144, '8941165002534', 5, 'Gold Mark hocolate Chips Cookies', '140 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:36'),
(145, '8941165002763', 5, 'Gold Mark Poops', '28 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:17'),
(146, '8941152000431', 5, 'danish tost biscuits', '350 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:59'),
(147, '8941165002503', 5, 'Gold Mark Coconut Cookies', '145 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:17'),
(148, '8941165002510', 5, 'Gold Mark Special Chocolate Cookies', '270 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:35'),
(149, '8941165002619', 5, 'Gold Mark Yoyo', '480', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:11'),
(150, '8941165012588', 5, 'Gold Mark Savory Cookies', '250 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:55'),
(151, '8941152000314', 5, 'danish lexus vegetable calcium cracker', '240 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:06'),
(152, '8941165002572', 5, 'Gold Mark Original Fruit Cookies', '115 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:13'),
(153, '8941165002565', 5, 'Gold Mark Original Butter Cookies', '230 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:25'),
(154, '8941165002633', 5, 'Gold Mark fruti', '85 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:02'),
(155, '8941152000307', 5, 'doreo black choclolate sandwich cream 320', '320 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:50'),
(156, '8941152010290', 5, 'Danish Dry Cake', '350 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:28'),
(157, '8941152000222', 5, 'Danish Florida Orange', '210 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:23'),
(158, '8941152010559', 5, 'Danish Nutri Rich Diabetic Rich', '210 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:29'),
(159, '8941152010351', 5, 'Olollol potato biscuits', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:32'),
(160, '8850086181405', 25, 'Ovaltine Malted Milk', '400 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:53'),
(161, '8850086191404', 25, 'Ovaltine Complete Nutrition ', '400 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:57'),
(162, '8941152000383', 5, 'doreo black chocolate sandwich cream 140gm', '140 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-10 09:09:58'),
(163, '8941152010726', 5, 'Danish Max Milk', '70 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-10 09:09:10'),
(164, '3355991003408', 6, 'one man show gold edition', '100 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 10:09:44'),
(165, '3355991004375', 6, 'one man show ruby edition', '100 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 10:09:24'),
(166, '810402002706', 6, 'stay cool silver no,1', '200 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 10:09:13'),
(167, '810402002683', 6, 'stay cool blue no.1', '200 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 10:09:22'),
(168, '810402002799', 6, 'stay cool chis no.1', '200 ml', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 10:09:02'),
(169, '810402002690', 6, 'stay cool gold NO.1', '200 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:10'),
(170, '810402002751', 6, 'stay cool Pretty', '200 ml', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:42'),
(171, '810402002768', 6, 'stay cool lady gold', '200 ml', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:01'),
(172, '810402002737', 6, 'stay cool love', '200 ml', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:11'),
(173, '811121019310', 5, 'Olympic badami cookies', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 11:09:17'),
(174, '810402002676', 6, 'stay cool red', '200 ml', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:48'),
(175, '811102040258', 5, 'olympic Tip ', '255 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:45'),
(176, '8151916020155', 5, 'olympic  digestive high fiber biscuits', '125 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 11:09:21'),
(177, '811108181276', 5, 'olympic milk marie', '285 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:37'),
(178, '811101020244', 5, 'olympic energy plus', '240 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:43'),
(179, '8156225351365', 5, 'olympic milk plus', '225 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:49'),
(180, '81156099349', 5, 'olympic twinkle twinkle double cream sandwich', '80 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 11:09:49'),
(181, '811115267338', 5, 'olympic festi', '250 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:31'),
(182, '811106154333', 5, 'olympic nutty', '250 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:15'),
(183, '811120371266', 5, 'olympic Nutri Marie', '250 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:10'),
(184, '811156088343', 5, 'olympic twinkle twinkle strawberry vanila', '80 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 11:09:24'),
(185, '811108170218', 5, 'olympic Marie Gold', '190 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:04'),
(186, '8150624010083', 5, 'olympic Hilux', '240 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:14'),
(187, '811114250249', 5, 'olympic Lexus', '240 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:12'),
(188, '811104062272', 5, 'olympic Choco marie', '285 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:13'),
(189, '8156350120430', 5, 'olympic Dry cake', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:47'),
(190, '416000336108', 5, 'olympic Nutri Marie', '110 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:32'),
(191, '811156077347', 5, 'olympic Twinkle twinkle chocolate vanila', '70 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:49'),
(192, '811101010146', 5, 'olympic Energy plus', '80 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:49'),
(193, '811106134144', 5, 'olympic Nutty', '80 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:41'),
(194, '811102030136', 5, 'olympic Tip', '70 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:31'),
(195, '8158170604336', 5, 'olympic Dry cake', '160 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:50'),
(196, '811160999154', 5, 'olympic lite bite', '85 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:13'),
(197, '811106134137', 5, 'olympic Coconut plus', '70 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:01'),
(198, '811106145157', 5, 'olympic Jeera', '80 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:48'),
(199, '811106112135', 5, 'olympic Chocolate plus', '70 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:06'),
(200, '811106091133', 5, 'olympic milk plus', '70 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 11:09:05'),
(201, '8941100292952', 14, 'Nido 3+', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:39'),
(202, '8941100292969', 14, 'Nido Fortified', '700 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:34'),
(203, '8941100292907', 14, 'Nido Fortified', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:23'),
(204, '8941100292945', 14, 'Nido 1+', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:05'),
(205, '8941100290293', 14, 'Nido Fortified tin', '900 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:48'),
(206, '8941100290507', 14, 'Nido  Fortified tin', '2500gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:22'),
(207, '8941100292273', 14, 'Cerelac Rice Potato with Chicken', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:40'),
(208, '8941100292204', 14, 'Cerelac Wheat & Honey', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:33'),
(209, '8941100292198', 14, 'Cerelac  Wheat Apple & Cherry', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:43'),
(210, '8941100292662', 14, 'Cerelac Khichuri', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:41'),
(211, '8941100292211', 14, 'Cerelac Rice & Milk', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 01:09:26'),
(212, '8941100292235', 14, 'Cerelac Wheat 3 Fruits & Milk', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:36'),
(213, '8941100292174', 14, 'Cerelac Wheat & Mixed Fruits', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:37'),
(214, '8941100292167', 14, 'Cerelac Wheat & milk', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:27'),
(215, '8941100292242', 14, 'Cerelac Wheat & Mixed Vegetables', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:33'),
(216, '8941100292181', 14, 'Cerelac Wheat & Apple with Corn Flakes', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:46'),
(217, '8901058143683', 14, 'Lactogen 2', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:55'),
(218, '8901058143607', 14, 'Lactogen 1', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:31'),
(219, '8901058143768', 14, 'Lactogen 3', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:05'),
(220, '8901058839333', 14, 'Lactogen 1', '750 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:40'),
(221, '8901058839357', 14, 'Lactogen 2', '750 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:17'),
(222, '8901058143782', 14, 'Lactogen 3 tin', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:59'),
(223, '8901058143706', 14, 'Lactogen 2 tin ', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:34'),
(224, '8901058143584', 14, 'Lactogen 1 tin', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:07'),
(225, '8941100291337', 14, 'Pre Nan Easy scoop', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:35'),
(226, '7613034898098', 14, 'Nan Al 110', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:14'),
(227, '4800361375696', 14, 'Nan 2 ', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:55'),
(228, '4800361370448', 14, 'Nan 1', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:41'),
(229, '8941100292518', 30, 'Maggi Four pack', '248  gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:56'),
(230, '8941100292525', 30, 'Maggi Curry', '248 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:26'),
(231, '8941100292556', 30, 'Maggi twelve pack', '744 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:21'),
(232, '8941100292532', 30, 'Maggi eight pack', '496 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:11'),
(233, '8901058823035', 14, 'Baby & Me Vanila', '350 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 02:09:19'),
(234, '8941100292495', 30, 'Maggi single', '62 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:23'),
(235, '4800361339360', 14, 'Koko Krunch Budget', '80 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:26'),
(236, '4800361002851', 14, 'Koko Krunch', '170 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:43'),
(237, '4800361000239', 14, 'Koko Krunch large', '330 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:20'),
(238, '4800361005500', 30, 'Corn Flakes large', '275 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:38'),
(239, '8850124032652', 28, 'Coffee Mate', '450 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:43'),
(240, '8850124011053', 28, 'Coffee Mate Jar', '400 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:35'),
(241, '9556001141033', 28, 'Nescafe Classic jar', '200 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:13'),
(242, '9556001140999', 28, 'Nescafe Classic jar', '100 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:42'),
(243, '9556001140968', 28, 'Nescafe Classic jar', '50 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:08'),
(244, '8941100291191', 28, 'Nescafe Classic 3 in 1', '14 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:07'),
(245, '8941100292112', 36, 'Munch Rollz', '6 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:39'),
(246, '8941100291351', 30, 'Maggi Thai soup', '35 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:22'),
(247, '8941100291924', 30, 'Maggi masala magic', '5 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:23'),
(248, '8941100291368', 30, 'magi vegetable soups', '25 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:50'),
(249, '8941100291344', 30, 'maggi corn with chicken  soups', '25 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:08'),
(250, '8941100614396', 35, 'closeup deep action 145gm', '145 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:07'),
(251, '8941100610459', 35, 'closeup fire freeze dual sensation ', '150 gm', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:47'),
(252, '8941100614341', 35, 'closeup deep action ', '145 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:27'),
(253, '8941100614754', 35, 'pepsodent  germi check ', '200 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:42'),
(254, '8941100085103', 35, 'pepsodent  complete8 gumcare', '100 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 03:09:29'),
(255, '8941100617311', 35, 'pepsodent expert protection sensitive', '150 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:19'),
(256, '8941100614761', 35, 'pepsodent germichack 100GM', '100 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:44'),
(257, '8941100615089', 35, 'pepsodent toothpowder ', '100 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:26'),
(258, '8941100617519', 1, 'LUX soft touch ', '150 gM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:53'),
(259, '8941100632369', 1, 'LUX soft touch 100GM', '100 GM', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:58'),
(260, '8941100614785', 2, 'Sunsilk stunning black shine shampo', '375 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:56'),
(261, '8941100611524', 2, 'Sunsilk lusciously thick and ', '375 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:06'),
(262, '8941100612286', 2, 'Sunsilk hair fall solution ', '375 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:38'),
(263, '4800888147929', 37, 'rexona men v8', '40 ML', 'PC', 'no_image.png', '', 1, 1, '2015-09-11 04:09:20'),
(264, '8941100612675', 2, 'Sunsilk Co-Creation perfect straight sampo', '180 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:46'),
(265, '4800888142894', 37, 'Rexona Women Passion All Day Dryness', '40 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:41'),
(266, '4800888143389', 37, 'Rexona Men Ice Cool', '40 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:48'),
(267, '8941100610329', 27, 'taza tea brooke bond', '400 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:20'),
(268, '4800888150639', 37, 'Rexona Women Shower Clean', '40 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:21'),
(269, '8941100613337', 38, 'Ponds Daily Face wash', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:40'),
(270, '8941100612668', 2, 'sunsilk perfect straght ', '375 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:55'),
(271, '8941100611173', 38, 'Fair & Lovely Max Fairness', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:18'),
(272, '8851932273596', 2, 'sunsilk perfect straight 160 ML', '160 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:20'),
(273, '6221048311239', 6, 'Axe Excite', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:01'),
(274, '6281006437845', 2, 'dove hair therapy shampoo', '700 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:20'),
(275, '6221048312779', 6, 'Axe Anarchy For Him Deodorent Body spray', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:36'),
(276, '4800888143402', 37, 'Rexona MenQuantum', '40 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:45'),
(277, '8941100616550', 2, 'dove nourishing oil care shampoo', '350 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:05'),
(278, '4800888142887', 37, 'Rexona Women Free Spirit', '40 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:09'),
(279, '8941100611609', 4, 'Vim Dish Wash Liquid With Real Lime Juice', '500 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:16'),
(280, '8941100611371', 13, 'wheel lemon power ', '1000 gm ', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 04:09:43'),
(281, '8941100610763', 4, 'Vim Dish Wash Powder', '750 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:21'),
(282, '8941100632291', 4, 'Vim Anti Germ With Lemon & Neem', '325 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:18'),
(283, '8941100617649', 4, 'Vim Powder of 100 Lemon', '325 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:09'),
(284, '8901030486333', 38, 'Fair & Lovely Advanced Multi Vitamin Expert  Fairness Solution', '80 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:48'),
(285, '8941100610770', 4, 'Vim Dish wash Powder ', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:00'),
(286, '8941100617014', 13, 'Ring Power White', '1000 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:06'),
(287, '8941100610312', 27, 'Taaza Brooke Bond', '200 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 04:09:45'),
(288, '1005001', 14, 'marks full cream milk power 400 GM', '400 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:54'),
(289, '8941100612842', 13, 'Surf Excel Quick Wash', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:14'),
(290, '1005002', 14, 'marks full cream milk power 500 gm', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:30'),
(291, '8851932199179', 10, 'ponds age miracle cell regen  facial foam 100GM', '100 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:15'),
(292, '8851932221542', 38, 'ponds pure white activated carbon charcoal', '100 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:03'),
(293, '8941100618295', 2, 'Clear Anti Dandruff Nourishimg Shampoo', '180 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:42'),
(294, '8941100632055', 30, 'knorr  thai soup classic', '112 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 01:09:03'),
(295, '8941100612392', 2, 'Dove Hair Therapy damage Solution Hair Fall Rescue', '180 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:03'),
(296, '8941100612316', 33, 'sunsilk hair fall solution conditiner ', '90 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:41'),
(297, '8941100612453', 2, 'Dove Hair Therapy Damage Solution Intense Repair', '180 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:58'),
(298, '8851932275163', 2, 'dove hair therapy nourishing oil care shampoo', '700 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:10'),
(299, '8941100618226', 13, 'Rin  Refresh Lemon & Rose ', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:24'),
(300, '8941100617007', 13, 'Rin Power White', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:39'),
(301, '8941100637869', 13, 'Wheel Lemon  & Flower Burst', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:55'),
(302, '8941100635193', 13, 'Wheel Lemon & Rose', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:39'),
(303, '8941100614563', 1, 'Lifebuoy Care', '150 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:42'),
(304, '8941100617779', 1, 'Lifebuoy Care', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:56'),
(305, '8901030465543', 38, 'dove beauty moisture facewash', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:53'),
(306, '8941100640975', 17, 'Wheel', '130 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:55'),
(307, '8941100617557', 1, 'Lux Purple Lotus', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:56'),
(308, '8941100635513', 1, 'Lux Velvet Touch', '150 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:38'),
(309, '8941100612378', 33, 'sunsilk luscicusly thick & long conditioner ', '90 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:46'),
(310, '8941100614600', 34, 'Lifebuoy  Total 10 with active naturol shield', '200 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:42'),
(311, '8941100614631', 34, 'Lifebuoy Mild Care with milk Cream', '180 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:01'),
(312, '067238891183', 1, 'Dove Pink Beauty Cream Bar', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:05'),
(313, '8941100614617', 34, 'lifebuoy mild care with milk creamild', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:14'),
(314, '8000700000005', 1, 'Dove Beauty Cream Bar for soft smooth skin', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:28'),
(315, '8999999022440', 10, 'ponds age miracle 50 gm', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:12'),
(316, '8139003001195', 13, 'Smart Washing Powder', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:27'),
(317, '8139003001164', 13, 'Smart Washing Powder', '500 mg', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 05:09:26'),
(318, '8941100616291', 1, 'lux fresh splash', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:52'),
(319, '8941100617762', 1, 'lifebuoy total 10 ', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 05:09:03'),
(320, '8717163566282', 1, 'dove beauty cream bar', '135 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 06:09:55'),
(321, '8901030461392', 39, 'vaseline healthy white lightening lotion', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-11 06:09:08'),
(322, '8941100616536', 2, 'dove intense repair shampoo 350', '350 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-11 07:09:07'),
(323, '9415007976486', 26, 'poppers corn-coconut puffs', '25 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 09:09:42'),
(324, '9415007666356', 26, 'poppers bar-b-q puffs', '25 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 09:09:05'),
(325, '9415007010968', 14, 'farmland full cream milk powder ', '500 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 09:09:37'),
(326, '9415007512585', 14, 'shape up non fat hi-protein milk power', '400 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 09:09:22'),
(327, '9415007013390', 14, 'diploma instant full cream milk power  A&D 400 GM', '400 Gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:17'),
(328, '9415007013402', 14, 'diploma instant full cream milk powder A&D 500 GM', '500 Gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:58'),
(329, '9415007012856', 14, 'red cow instant full cream milk power 400 gm', '400 Gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:32'),
(330, '9415007020769', 14, 'farmland gold instant full cream milk powder 400GM', '400 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:50'),
(331, '9415007010913', 14, 'anchor instant full cream milk powder 350 GM', '350 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:30'),
(332, '9415007015468', 20, 'red cow butter oil 400 GM', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:46'),
(333, '9415007916598', 24, 'doodles instant noodles masala  8p', '576 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:51'),
(334, '9415007551478', 24, 'doodles instant noodles masala 4p', '288 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:08'),
(335, '9415007644286', 24, 'doodles instant noodles masala 72 gm', '72 GM', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:08'),
(336, '9415007584698', 24, 'doodles instant noodles chicken curry 8p', '576 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:44'),
(337, '9415007231981', 24, 'doodles instant noodles chicken curry 4p', '288 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:46'),
(338, '9415007345893', 24, 'doodles stick noodles 300gm', '300 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:21'),
(339, '9415007581741', 24, 'doodles stick noodles 180 gm', '180 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:36'),
(340, '1005003', 20, 'red cow butter oil 200gm', '200gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:26'),
(341, '1005004', 14, 'diploma instant full cream milk powder 200gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 10:09:01'),
(342, '9415007013396', 14, 'diploma instant full cream milk powder 1kg', '1kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:09'),
(343, '8941052011083', 22, 'rupchanda fortified soyabean oil 5 litter ', '5 litter', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:07'),
(344, '8887155064079', 22, 'kings pure sunflower oil 5 litter  ', '5 litter', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:09'),
(345, '880225150014', 30, 'rupchanda premium aromatic rice chinigura ', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:09'),
(346, '8941052011441', 22, 'rupchanda fortified soyabean oil 1kg pac', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:23'),
(347, '8941052011045', 22, 'rupchanda fortifide soyabean oil 1L', '1 L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:40'),
(348, '8941052011052', 22, 'rupchanda fortifide soyabean oil 2 L', '2 L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:25'),
(349, '8941052011069', 22, 'rupchanda fortified soyabean oil 3L', '3 L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 11:09:57'),
(350, '8941184000559', 22, 'rupchanda pure mustard oil 500 ML', '500 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 12:09:09'),
(351, '8941184000573', 22, 'rupchanda pure mustard oil 1L', '1L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 12:09:44'),
(352, '8122010014', 16, 'lumi perfumed paper napkin 13*1ply', '100 pcs', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 12:09:45'),
(353, '8851932179874', 10, 'ponds age miracle deep action night 50gm', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 01:09:23'),
(354, '8941194002550', 5, 'mr.cookie butter coconut 60 gm', '60 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:28'),
(355, '8941194000921', 26, 'haque potato chips', '25 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:36'),
(356, '8941194003717', 5, 'chocolate digestive biscuit haque', '145 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:45'),
(357, '8886213500344', 5, 'mr.milk milk enriched biscuit ', '70 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:57'),
(358, '8886213000097', 5, 'chocolate finger haque', '54 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:33'),
(359, '8941194004004', 5, 'mr.energy haque', '240 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:16'),
(360, '8941194003991', 5, 'mr.energy hauke 80gm', '80 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:31'),
(361, '8941194003816', 5, 'digestive biscuit haque  150gm', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:26'),
(362, '1005005', 40, 'imperial heavy duty haque 1.5 v', '1.5 V', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:50'),
(363, '8901207019029', 21, 'dabur amla hair oil  450 ML', '450 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:01'),
(364, '8901207019012', 21, 'dabur amla hair oil 275ml', '275 ML', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 02:09:44'),
(365, '8901207019005', 21, 'dabur amla hair oil 180 ml', '180 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:12'),
(366, '8901207872624', 30, 'dabur honey 500 gm', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:09'),
(367, '8901207035364', 30, 'dabur honey 250 gm', '250 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:18'),
(368, '8901207005374', 30, 'dabur honey 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:30'),
(369, '8901207096662', 37, 'dabur vatika enriched coconut hair oil 300 ml', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:40'),
(370, '8901207029691', 21, 'dsbur vatica enriched coconut hair oil 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:40'),
(371, '218513166005037', 21, 'dabur almond hair oil 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:53'),
(372, '89005903', 21, 'dabur almon hair oil 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:23'),
(373, '8902714330072', 35, 'dabur meswak complite oral care 200gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:30'),
(374, '8901888000897', 35, 'dabur red past for teeth & gums 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:23'),
(375, '8901207500657', 35, 'dsbur meswak complete oral care 100gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:05'),
(376, '8901207099106', 35, 'dabur red paste for teeth & gums 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:59'),
(377, '8901888067920', 25, 'real fruit power litchi 1L', '1 L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:47'),
(378, '8901888002297', 25, 'real fruit power apple 1l', '1 L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:21'),
(379, '8901888040350', 25, 'real fruit power mixed fruit 1 L', '1L', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 03:09:17'),
(380, '8901207502965', 23, 'odonil nature orchid', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 04:09:03'),
(381, '8901207502996', 23, 'odonil lavender ', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 04:09:26'),
(382, '8901207502934', 23, 'odonil nature jasmine', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 04:09:36'),
(383, '8850851535365', 41, ' stony angel rattle hood 240 ml', '240 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:39'),
(384, '8850851540888', 41, 'stony angel 8oz feeding bottle 240 ml', '240 ml 6+m', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:52'),
(385, '8850851535372', 41, 'stony angel rottle hood 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:17'),
(386, '8850851534139', 41, 'stony angel amazing glow hood 240 ML 6+', '240 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:30'),
(387, '8850851532654', 41, 'stony angel feeding bottle 3+m', '120 Ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:28'),
(388, '8850851532630', 41, 'stony angel feeding bottle 0+ 60 ml', '60 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:36'),
(389, '8850851532920', 41, 'stony angel feeding bottle 0+ 60ml', '60 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:02'),
(390, '8850851540871', 41, 'stony angel feeding bottle 3+ 120 ml', '120 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:48'),
(391, '8850851701715', 41, 'stony angel food feeder 6+ 140 ml', '140 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:32'),
(392, '4710962127672', 41, 'farling natural feeding design 3m+ 250c.c', '250c.c.', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:54'),
(393, '4710962127979', 41, 'farlin natural feeding design 3m 300c.c.', '300c.c.', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:16'),
(394, '4710962421084', 41, 'farlin baby wet wipes ', '100 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:15'),
(395, '8850851700428', 41, 'stony angel bottle & nipple liquid cleanser', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:18'),
(396, '8850851700411', 41, 'stony angel bottle & nipple liquid cleanser 500 ml', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 05:09:27'),
(397, '4710962411061', 41, 'farlin herbal baby wet wipes 85 ps', '85 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:58'),
(398, '4710962452460', 41, 'farlin tableware set 4m+', '4m+', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:39'),
(399, '8850851511246', 41, 'stony angel silicone nipple L', '6m', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:26'),
(400, '8850851511215', 41, 'stony angel silicone nipple X', '6m', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:47'),
(401, '8850851511222', 41, 'stony angel silicone nipple  0-3 S', '0-3', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:12'),
(402, '8850851511239', 41, 'stony angel silicone nipple m 3-6', '3-6', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:36'),
(403, '8850851534085', 41, 'stony angel amazing glow hood with handle 6m+', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:54'),
(404, '8850851700336', 41, 'stony angel battle brush', '1F3', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:52'),
(405, '8850851700329', 41, 'stony angel bottle brush 1f2', '1F2', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:22'),
(406, '8850851532616', 14, 'stony angel feeding bottle 6+', '240 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:19'),
(407, '4710962431052', 41, 'farlin moisture baby wet wipes 35 pc', '35 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:32'),
(408, '8850851700855', 41, 'stony angel training cup ', '3+m', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:31'),
(409, '8850851700404', 41, 'stony angel  water bottle', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:51'),
(410, '8850851702187', 41, 'stony angel drinking cup 6+', '160 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:06'),
(411, '8850851700381', 41, 'stony angel bath sponge ', 'spg-1', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:28'),
(412, '4710962443093', 41, 'farlin bath ball baby ', 'bf-309a', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:52'),
(413, '8850851510256', 41, 'stony angel pacifier 6+ m', '6+m', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 06:09:53'),
(414, '8850851701814', 41, 'stony angel youre my angel feeding bottle 240 ml', '240 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 07:09:09'),
(415, '8850851700237', 41, 'powder puff with sound', 'b-2', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 07:09:11'),
(416, '8850851700275', 41, 'stony angel power puff', 'b-7', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 07:09:19'),
(417, '8850851534092', 41, 'stony angel amazing glow hood with handle', '130 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-12 07:09:03'),
(418, '20092016', 30, 'j.m.f special soan papdi 200 GM', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:24'),
(419, '20092023', 30, 'j.m.f special soan papdi 400 gm', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:37'),
(420, '20092436', 30, 'j.m.f special cira red  500 gm', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:21'),
(421, '20092429', 30, 'j.m.f special chira white 500 gm', '500gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:46');
INSERT INTO `tbl_items` (`id`, `item_code`, `cat_id`, `item_name`, `size`, `unit`, `photo`, `description`, `status`, `saved_by`, `saved_date`) VALUES
(422, '20092108', 30, 'j.m.f special beson  500 gm', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:00'),
(423, '20092139', 30, 'j.m.f special rice flour 1 kg', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:06'),
(424, '20092146', 30, 'j.m.f special cawn rice 1 kg', '1kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:49'),
(425, '20092443', 30, 'j.m.f special dal mix 1kg', '1 kg', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:21'),
(426, '20092184', 30, 'j.m.f special ring papor 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:55'),
(427, '20092054', 30, 'j.m.f special badam vaja 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:51'),
(428, '20092177', 30, 'j.m.f special chanachur vaja 400 gm', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:46'),
(429, '20092030', 30, 'j.m.f special badam vaja white 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:07'),
(430, '20092092', 30, 'j.m.f special chui pitha 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 10:09:39'),
(431, '20092399', 30, 'j.m.f special monekka 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:58'),
(432, '20092368', 30, 'j.m.f special nimki 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:03'),
(433, '20092375', 30, 'j.m.f special ring papor 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:52'),
(434, '20092207', 30, 'j.m.f special chira vaga 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:59'),
(435, '20092191', 30, 'j.m.f special chanachur 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:29'),
(436, '20092382', 30, 'j.m.f special monekka 200gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:28'),
(437, '20092085', 30, 'j.m.f special mug dal vaja 200 gm', '200gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:22'),
(438, '20092061', 30, 'j.m.f special anchor vaja 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:47'),
(439, '20092078', 30, 'j.m.f special dabli  vaja 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:04'),
(440, '20092238', 30, 'j.m.f special papor mugdal 6p', '6 P', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:33'),
(441, '8935142930101', 42, 'sunmed Adult diapers popok dewasa M10s', 'M10s', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:48'),
(442, '8904009615017', 42, 'huggies wonder-pants xl-16', 'XL16', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:03'),
(443, '8935142931108', 42, 'sunmed adult diapers L40-55', 'L40-55', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:39'),
(444, '8904009614966', 42, 'huggies wonder-pants xl32', 'XL-32', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:33'),
(445, '8904009614942', 42, 'huggies wonder-pants M-44', 'M-44', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:18'),
(446, '8904009614959', 42, 'huggis wonder-pants L-38', 'L-38', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:51'),
(447, '8904009615000', 42, 'Huggies Wonders Pants L -20', 'L:20, ', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 11:09:18'),
(448, '8904009614713', 42, 'Huggies Dry L: 30', 'L:30', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:54'),
(449, '8904009615482', 42, 'Huggies Dry XL:30', 'XL:30', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:36'),
(450, '8904009614706', 42, 'Huggies Dry M:30', 'M:30', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:36'),
(451, '8904009614997', 42, 'Huggies Wonders Pants M-20', 'M-20', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:13'),
(452, '8904009614669', 42, 'Huggies Dry L-8', 'L-8', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:31'),
(453, '8904009614652', 42, 'Huggies Dry M-9', 'M-9', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:37'),
(454, '1005006', 31, 'savlon antiseptic 112 ml', '112 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 12:09:40'),
(455, '3607342735699', 6, 'Adidas get ready for him 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:35'),
(456, '3607340898907', 6, 'adidas extreme power 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:18'),
(457, '3607345380094', 6, 'adidas daynamic pulse 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:39'),
(458, '3607345380247', 6, 'adidas team force 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:58'),
(459, '3607345380292', 6, 'adidas victory league 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:19'),
(460, '3607345401119', 6, 'adidas pure game 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:30'),
(461, '3607343587761', 6, 'adidas uefa champions league 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:53'),
(462, '3607345919980', 6, 'adidas women fizzy energy perfumed deo 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 03:09:07'),
(463, '3607345387321', 6, 'adidas ice dive 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:48'),
(464, '3607345887890', 6, 'adidas women fruity rhythm deo', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:11'),
(465, '3607342735347', 6, 'adidas get ready for har 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:28'),
(466, '3607345888040', 6, 'adidas women pure lightness deo', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:03'),
(467, '3607345887791', 6, 'adidas women floral dream deo 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:40'),
(468, '3607345397344', 6, 'adidas dynamic pulse100 ml', '100 Ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:39'),
(469, '3607345397597', 6, 'adidas team  force 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:55'),
(470, '3607345216713', 6, 'adidas pure game 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:01'),
(471, '3607346550540', 6, 'adidas team five specal edition 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:56'),
(472, '3607345520148', 6, 'adidas intense touch 500 ml', '50 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:59'),
(473, '3607342733725', 6, 'adidas get resdy for him 50 ml', '50 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:53'),
(474, '3607345853055', 6, 'adidas extreme power 50 ml', '50 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:41'),
(475, '3607345397641', 6, 'adidas victory league 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:35'),
(476, '3607349398125', 11, 'adidas extreme power anti perspirant  50 ml', '50 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:12'),
(477, '3607342164529', 6, 'New york Playboy body spray 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:24'),
(478, '3607343535236', 6, 'Playboy vip black edition 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:44'),
(479, '3607348579365', 6, 'Playboy vip 24h deodorant body spray 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:35'),
(480, '3607340247712', 6, 'Playboy vegas 24h deodorant body spray for him 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:15'),
(481, '3614220022000', 6, 'Playboy generation for him 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:18'),
(482, '3607346624418', 6, 'super Playboy body spray for him 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:21'),
(483, '3607348303762', 6, 'Berlin Playboy body spray 150 gm', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:44'),
(484, '3607348580415', 6, 'Playboy vip for her 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 04:09:50'),
(485, '3607340618710', 6, 'Playboy play it sexy... 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:39'),
(486, '5012874248582', 6, 'intimately beckham  men 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:20'),
(487, '5012874212286', 6, 'David beckham instinct 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:26'),
(488, '3607346626252', 6, 'super Playboy om boom for- her', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:55'),
(489, '5012874318575', 6, 'Beckham signature men 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:21'),
(490, '3607341046734', 6, 'jovan black musk for men 88 ml', '88 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:58'),
(491, '3607346571026', 6, 'david backham classic 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:55'),
(492, '3607342532274', 6, 'david beckham the essence 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:21'),
(493, '3607340000850', 6, 'jovan sex apple for men 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:43'),
(494, '035017009029', 6, 'jovan musk for men 88 ml', '88 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:23'),
(495, '035017009425', 6, 'jovan sex appeal for men', '88 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:37'),
(496, '035017008145', 6, 'jovan white musk for men 88 ml', '88 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:35'),
(497, '8410269241168', 41, 'spain oliva olive oil 150 gm', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:12'),
(498, '8410660024704', 41, 'span oliva olive oil 250 ml', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:25'),
(499, '8410269918787', 41, 'Almon oil b.p 70 ml', '70 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:55'),
(500, '8410269918817', 41, 'castorl oil 70 ml', '70 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 05:09:29'),
(501, '8941100500392', 3, 'xpel aerosol 475 ml', '475 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:11'),
(502, '8941100500293', 23, 'spring air freshener floral fresh', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:26'),
(503, '8941100501207', 23, 'spring air freshener lemon fresh', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:14'),
(504, '8941100501191', 23, 'spring air freshener orange fresh', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:44'),
(505, '8941100501245', 23, 'spring air freshener lemon grass', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:04'),
(506, '8941100500965', 6, 'revive perfect freshness 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:50'),
(507, '8941100500385', 3, 'expel aerosol 250 ml', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:59'),
(508, '8941100501597', 39, 'meril rose water glycerine', '120 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:56'),
(509, '8941100501276', 34, 'sepnil stop germs hand wash 200 ml pac', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:40'),
(510, '8941100501429', 2, 'revive enhance and repair shampo 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 06:09:37'),
(511, '8941100500972', 6, 'bevibve perfect freshness fruity 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:06'),
(512, '8941100500590', 11, 'kool shaving foam ultra glide 400 ml', '400 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:58'),
(513, '8941100501054', 6, 'kool deodorant body  spray ocean blue 150 ml', '150 ml', 'PC', 'no_image.png', '\r\n', 1, 3, '2015-09-13 07:09:40'),
(514, '8941100500538', 41, 'meril olive oil 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:10'),
(515, '8941100500583', 11, 'kool shaving foam ultra glide 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:23'),
(516, '8941100501061', 37, 'kool deodorant body spray citrus 150 ml', '150 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:30'),
(517, '8941100500149', 1, 'meril splash beauty soap melon 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:00'),
(518, '8941100500187', 1, 'meril splash fresh coumber', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:00'),
(519, '8941100500163', 1, 'meril splash fresh peach', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-13 07:09:56'),
(520, '8301100701067', 15, 'Fresh full  cream milk  powder', '1kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 10:09:10'),
(521, '8301100201055', 22, 'Fresh Soyabean Oil ', '5 Liter', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 10:09:41'),
(522, '8301100501025', 29, 'Fresh Super  Premium Salt', '1 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:04'),
(523, '8301100201031', 22, 'Fresh Soyabean Oil', '2 Liter', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:32'),
(524, '8301100201024', 22, 'Fresh Soyabean Oil', '1 Liter', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:47'),
(525, '8301100501032', 29, 'Fresh Super Premium Salt', '750 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:57'),
(526, '8301100501049', 29, 'Fresh Super Premium Salt', '140 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:14'),
(527, '8301100701050', 15, 'Fresh full cream milk powder', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:11'),
(528, '12104758', 43, 'Fresh Refined Sugar ', '500 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:31'),
(529, '12109500', 43, 'Fresh Refiend Sugar', '1 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:51'),
(530, '8301100401042', 19, 'Fresh Atta full of natural goodness', '2  kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:23'),
(531, '8301100402049', 19, 'Fresh Maida full of natural goodness', '2 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 11:09:08'),
(532, '8301100701111', 44, 'Number 1 Sweetened Condensed Filled Milk', '400 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 12:09:21'),
(533, '8946000000249', 42, 'Chu. Chu all time dry Diapers', 'L 9-14 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 12:09:40'),
(534, '8946000000256', 42, 'Chu.Chu all time dry Diapers', 'XL 12+ kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 12:09:38'),
(535, '8946000000270', 42, 'Chu.Chu All Time Dry Diapers', 'M 6-11 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 12:09:31'),
(536, '8946000000263', 42, 'Chu.Chu All Time Dry Diapers', 'S 3-7 kg', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 12:09:46'),
(537, '8944000294934', 42, 'Chu.Chu Pant style Baby Diapers', 'L 8-15 kg (4pc)', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 02:09:40'),
(538, '8944000294941', 42, 'Chu.Chu Pant Style Baby Diapers', 'XL 13-20 kg (4pcs)', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 02:09:46'),
(539, '8944000294927', 42, 'Chu.Chu Pant Style Baby Diapers', 'M 6-12 kg (5pcs)', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 02:09:03'),
(540, '8946000000553', 41, 'Chu.Chu Handle  Feeder', '240 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:35'),
(541, '8946000000140', 41, 'Chu.Chu Baby Feeder', '150 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:01'),
(542, '8946000000133', 41, 'Chu.Chu Baby Feeder ', '240 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:22'),
(543, '8946000000188', 41, 'Chu.Chu Feeding Bottle', '90 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:46'),
(544, '8946000000522', 41, 'Chu.Chu Easy Feed Baby Feeder', '240 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:49'),
(545, '8946000000393', 41, 'Chu.Chu Wet Wipes For Babies', '120 pcs', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:50'),
(546, '8946000000386', 41, 'Chu.Chu Wet Wipes For  Babies', '60 pcs', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:49'),
(547, '8908001158695', 6, 'Fogg Bleu Mountain Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:02'),
(548, '8908001158688', 6, 'Fogg Bleu Spring Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:02'),
(549, '8908001158565', 6, 'Fogg Frsh woody Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:03'),
(550, '8908001158589', 6, 'Fogg Frsh Fougere Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:14'),
(551, '8908001158541', 6, 'Fogg Fresh Aromatic Fragrance Body spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:19'),
(552, '8908001158572', 6, 'Fogg Fresh Spicy Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:17'),
(553, '8908001158794', 6, 'Fogg Fragrance Absolute Body spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:23'),
(554, '8908001158817', 6, 'Fogg Fragrance Dynamic Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:24'),
(555, '8908001158602', 6, 'Fogg  Blossom Fragrance Body Spray ', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:32'),
(556, '8908001158619', 6, 'Fogg Bold Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:29'),
(557, '8908001158022', 7, 'White Tone Face Powder ', '70 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:11'),
(558, '8908001158077', 7, 'White Tone Face Powder', '30 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:57'),
(559, '8908001158305', 6, 'Fogg Marco Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:07'),
(560, '8908001158312', 6, 'fogg Royal Fragrance Body Spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:06'),
(561, '8908001158596', 6, 'Fogg Fresh Aqua Fragrance Body spray', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:20'),
(562, '8908001158336', 6, 'Fogg Delicious Fragrant Body Spray For Women', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:53'),
(563, '8908001158343', 6, 'Fogg Essence Fragrance body Spray For Women', '120 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 03:09:51'),
(564, '8908001158534', 38, 'Delicca Powder Face Wash (Fogg Company)', '40 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:40'),
(565, '8901138512002', 38, 'Himalaya Herbals Purifying Neem Face Wash', '100 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:59'),
(566, '8901138831073', 38, 'Himalaya Harbals Power glow licorice Face Wash', '100 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:51'),
(567, '8901138511630', 38, 'Himalaya Herbals Gentle Exfoliating Apricot Scrub', '50 g', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:36'),
(568, '8901138822286', 38, 'Himalaya Herbals Clear Complexion Whiteening Face Wash', '50 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:37'),
(569, '8901138818777', 38, 'Himalaya Herbals Purifying Neem Face Wash', '50 ml', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:13'),
(570, '8901138821913', 38, 'Himalaya Herbals Purifying Neem  Scrub', '50 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:38'),
(571, '8901138821906', 38, 'Himalaya Herbals Fairness Face Pack', '50 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:41'),
(572, '8901138510688', 35, 'Himalaya Herbals Gum Expert Complete Care Toothpaste', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:08'),
(573, '8901138826451', 35, 'Himalaya Herbals Gum Expert Sparkling white Toothpaste', '100 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:26'),
(574, '8901138509033', 10, 'Himalaya Herbals Acne-n-Pimple Cream', '20 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:06'),
(575, '8901138506780', 10, 'Himalaya Herbals Foot Care Cream', '20 gm', 'PC', 'no_image.png', '', 1, 2, '2015-09-14 04:09:01'),
(576, '8823122503516', 30, 'Ahmed custard powder', '265 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:28'),
(577, '8823122503417', 30, 'Ahmed baking powder', '265 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:32'),
(578, '8823122503615', 30, 'Ahmed corn flour', '250 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:17'),
(579, '8823122503509', 30, 'Ahmed custard powder', '160 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:02'),
(580, '8823122503608', 30, 'Ahmed corn flour', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:37'),
(581, '8823122503400', 30, 'Ahmed baking powder', '160 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:18'),
(582, '8823122103204', 30, 'Ahmed orange jelly', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:00'),
(583, '8231224033068', 30, 'Ahmed orange jelly', '275 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:33'),
(584, '8823122703022', 30, 'Ahmed diabetic orange jelly', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:08'),
(585, '8823122103006', 30, 'Ahmed mixed fruit jelly', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:56'),
(586, '8823122703039', 30, 'Ahmed diabetic apple jelly', '220 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:50'),
(587, '8823122103013', 30, 'Ahmed mixed fruit  jelly', '275 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:06'),
(588, '8823122503004', 30, 'Ahmed corn flour pack', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:40'),
(589, '8823122503011', 30, 'Ahmed baking powder', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:23'),
(590, '8823122103105', 30, 'Ahmed diabetic pineapple jelly', '500 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:45'),
(591, '8823122203171', 30, 'Ahmed  amla pickle', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:57'),
(592, '8823122203058', 30, 'Ahmed  hot mango pickle', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 11:09:49'),
(593, '8823122203065', 30, 'Ahmed  olive pickle', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:04'),
(594, '8823122403311', 30, 'Ahmed  white vinegar', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:16'),
(595, '8823122403304', 30, 'Ahmed  white vinegar', '325 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:40'),
(596, '8823122303819', 30, 'Ahmed  tomato sauce hot', '340 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:03'),
(597, '8823122303512', 30, 'Ahmed  tomato sauce', '340 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:03'),
(598, '8823122303413', 30, 'Ahmed  tomato ketchup', '340 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:05'),
(599, '8823122303604', 30, 'Ahmed  chilli sauce', '340 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:52'),
(600, '2312240330686', 30, 'Ahmed  soya sauce', '250 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:39'),
(601, '8901248330022', 31, 'Boro Plus antiseptic cream', '40 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:38'),
(602, '8901248126052', 39, 'Boro Plus advanced moisturising lotion', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:48'),
(603, '8901248314039', 39, 'Boro Plus advanced moisturising lotion', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:16'),
(604, '8901248302074', 7, 'Boro Plus icy sandal', '150 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:51'),
(605, '8901248302081', 7, 'Boro Plus icy cool', '150gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:55'),
(606, '8901012116340', 2, 'johnson''s baby shampoo 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:06'),
(607, '8901248253116', 10, 'Fair and Handsome deep action', '60 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:06'),
(608, '8901248253109', 10, 'Fair and Handsome deep action', '30 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:20'),
(609, '8901012116357', 2, 'johnson''s baby shampoo 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:44'),
(610, '5060068526954', 10, 'Fair and Handsome lumino peptide', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:48'),
(611, '8901012118092', 21, 'johnson''s baby hair oil 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:25'),
(612, '5060068526947', 10, 'Fair and Handsome lumino peptide', '25 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:29'),
(613, '8901012118085', 21, 'johnson''s baby hair oil 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:40'),
(614, '5060068529511', 38, 'Fair and Handsome refreshing', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:53'),
(615, '5060068526770', 38, 'Fair and Handsome oil control', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:11'),
(616, '8901012113387', 41, 'johnson''s baby oil 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:05'),
(617, '8901012114193', 10, 'johnson''s baby milk cream 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:40'),
(618, '8901248104050', 21, 'Navaratna', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:23'),
(619, '8901248104043', 21, 'Navaratna cool', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:10'),
(620, '8901012114186', 10, 'johnson''s baby milk cream 50 gm', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:50'),
(621, '8901248104036', 21, 'Navaratna cool', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:57'),
(622, '8901248303095', 21, 'Navaratna extra thanda', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:01'),
(623, '8901248327046', 38, 'Boro Plus oil control', '50 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:46'),
(624, '9556006060360', 39, 'johnson''s baby lotion milk + rice 500 ml', '500 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:24'),
(625, '8901248801102', 10, 'Zandu Balm', '8 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:28'),
(626, '8901248257329', 21, '7 oils in one', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:14'),
(627, '8901012115039', 39, 'johnson''s babylotion 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:13'),
(628, '8901012111031', 41, 'johnson''s baby powder 200 gm', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:18'),
(629, '8901012115022', 39, 'johnson''s baby lotion 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:46'),
(630, '8901012116203', 41, 'johnson''s baby top- to-toe wash 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:52'),
(631, '9556006060001', 41, 'johnson''s baby bath milk + rice 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 12:09:56'),
(632, '9556019237230', 35, 'Sensodyne fresh mint', '50 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:31'),
(633, '8901571004096', 35, 'Sensodyne fresh mint', '15 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:19'),
(634, '4800318407739', 35, 'Sensodyne cool gel', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:04'),
(635, '8901012114032', 41, 'johnson''s baby cream 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:40'),
(636, '8901571006229', 35, 'Sensodyne repair & protect', '80 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:16'),
(637, '08901571005383', 9, 'Sensodyne ultra sensitive', 'soft', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:34'),
(638, '3574660049756', 41, 'johnson''s baby oil 300 ml', '300 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:55'),
(639, '8941571000216', 25, 'Maltova', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:47'),
(640, '3574660050660', 41, 'johnson''s baby oil ulei 200ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:37'),
(641, '8941571004757', 25, 'Glaxose- D', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:31'),
(642, '9556006060353', 41, 'johnson''s baby lotion milk + rice', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:32'),
(643, '8941571004740', 25, 'Glaxose- D large', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:02'),
(644, '8941571000599', 25, 'Boost jar', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:21'),
(645, '8901012111024', 41, 'johnson''s baby powder 100 gm', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:59'),
(646, '8940006101191', 25, 'Horlicks classic molt box', '450 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:22'),
(647, '8941571060548', 25, 'Horlicks classic molt ', '900 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:27'),
(648, '8940006100804', 25, 'Horlicks classic molt jar', '450 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:02'),
(649, '8940006100798', 25, 'Horlicks classic molt', '200 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:07'),
(650, '8901012116197', 41, 'johnson''s baby top-to-toe wash 100 ml', '100 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:43'),
(651, '8941571029101', 25, 'Horlicks lite', '330 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:59'),
(652, '8941571000605', 25, 'Horlicks chocolate', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:50'),
(653, '9556006060346', 41, 'johnson''s baby lotion milk + rice 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:10'),
(654, '8941571003286', 25, 'women''s Horlicks', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:38'),
(655, '8941571000612', 25, 'Junior Horlicks jar', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:18'),
(656, '9556006060308', 41, 'johnson''s baby bath milk + rice 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:34'),
(657, '8941571002180', 25, 'Junior Horlicks box', '400 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:20'),
(658, '8941100500415', 8, 'senora sanitary napkin regular pack (belt system)', '10 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 01:09:47'),
(659, '8941100501504', 42, 'supermom baby diaper 26 p', '26 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:09'),
(660, '8941100500699', 8, 'senora confidence ultrra 8 pd', '8 pd', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:44'),
(661, '8941100501092', 8, 'Senora confidence ', '14 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:38'),
(662, '8941100501528', 42, 'super mom baby diaper 22 ps', '22 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:55'),
(663, '8941100500057', 8, 'Senora economy pack panty', '15 pad', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:51'),
(664, '8941100500040', 8, 'Senora economy pack belt ', '15 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:40'),
(665, '8941100501474', 42, 'supermom baby diaper 4ps', '4ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:23'),
(666, '8941100500941', 8, 'Senora economy pack panty', '10 pads', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:25'),
(667, '8941100501498', 42, 'supermom baby diaper 6-11 4 ps', '6-11 4ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:32'),
(668, '8941100501535', 42, 'supermom baby diaper  12-17 20 ps', '20 ps', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:50'),
(669, '8941100501047', 45, 'Meril nail polish remover', '40 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:37'),
(670, '8941100500910', 45, 'Meril glycerine', '120 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:04'),
(671, '8941100500491', 21, 'jui natural coconut oil', '400 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:09'),
(672, '8941100500903', 45, 'Meril glycerine', '60 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:01'),
(673, '8941100500484', 21, 'jui natural coconut oil 200 ml', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:58'),
(674, '8941100501009', 45, 'Meril lip balm', 'strawberry', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:06'),
(675, '8941100501160', 45, 'Meril lip balam', 'lemon', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:40'),
(676, '8941100500088', 6, 'Madina attar ', 'sonali', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:15'),
(677, '8941100500934', 6, 'Madina attar ', 'chandan', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:49'),
(678, '8941100500514', 21, 'jui coconut oil  400 ml', '400 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:45'),
(679, '8941100501214', 41, 'Meril baby gel strawberry', '45 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:39'),
(680, '8941100500064', 41, 'Meril bapy toothpaste orange', '45 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:25'),
(681, '8941100500507', 21, 'jui coconut oil 200 ml tn', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:30'),
(682, '8941100501269', 41, 'Meril baby toothpaste 2 in 1 strawberry', '45 gm', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:27'),
(683, '8941100500231', 41, 'meril baby lotion 100 ml', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:27'),
(684, '8901725937706', 41, 'Merilbaby tooth brush', 'small', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:48'),
(685, '8941100500248', 41, 'meril baby lotion', '200ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:09'),
(686, '8941100500255', 41, 'meril baby olive oil 100 ml;', '100 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:38'),
(687, '8941100501108', 34, 'Sepnil +', '200 ml', 'PC', 'no_image.png', '', 1, 3, '2015-09-15 02:09:53'),
(688, '106', 1, 'Soup Plate', '9', 'PC', '9BA66C1E-B0E2-8114-F444-FF62A1BA996C.jpg', 'dsa adssaasd', 1, 1, '2016-03-09 02:03:38'),
(689, '162', 46, 'Handle Tray', '18', 'PC', 'no_image.png', '', 1, 1, '2016-03-10 03:03:26'),
(690, '155', 47, 'Bowl & Lid', '10', 'PC', 'no_image.png', '', 1, 1, '2016-03-16 12:03:23'),
(691, '156', 47, 'Bowl & Lid', '10"', 'PC', 'no_image.png', '', 1, 1, '2016-03-16 12:03:01'),
(692, '111', 48, 'Chair', '11', 'PC', 'no_image.png', '', 1, 1, '2016-03-16 12:03:08'),
(693, '208', 49, '52 pcs dinner set (D7)', '14"', 'PC', '833A2A98-D21E-ED50-80DC-3CA56D233577.jpg', '', 1, 1, '2016-03-20 01:03:13'),
(694, '112233', 50, 'Test Item', '', 'PC', 'no_image.png', '', 1, 1, '2016-05-09 12:05:22'),
(695, '8899', 50, 'mytest', '22', 'PC', 'no_image.png', '', 1, 1, '2016-05-09 02:05:09'),
(696, '5566', 50, 'Cloth Test', '', 'Gauze', 'no_image.png', '', 1, 1, '2016-05-12 01:05:56'),
(697, '073621', 50, 'paper', '', 'Gauze', 'no_image.png', '', 1, 1, '2016-05-12 06:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_price`
--

CREATE TABLE IF NOT EXISTS `tbl_item_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_item_price`
--

INSERT INTO `tbl_item_price` (`id`, `item_id`, `price`, `discount`, `active_date`, `promo_from`, `promo_to`, `remarks`, `saved_by`, `saved_date`) VALUES
(1, 688, '58.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, '2016-03-09 02:03:46'),
(2, 692, '350.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, '2016-03-16 12:03:02'),
(3, 693, '1300.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, '2016-03-20 01:03:57'),
(4, 694, '300.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, '2016-05-09 01:05:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_item_unit`
--

INSERT INTO `tbl_item_unit` (`id`, `name`, `status`, `saved_by`, `saved_datetime`) VALUES
(1, 'Gauze', 1, 1, '2016-05-12 12:05:50'),
(2, 'Gira', 1, 1, '2016-05-12 12:05:36');

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
  `gauze` int(11) NOT NULL,
  `gira` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `sup_id`, `pur_id`, `invoice`, `item_id`, `quantity`, `gauze`, `gira`, `bonus_quantity`, `price`, `ttl_price`, `pur_date`, `saved_by`, `saved_date`) VALUES
(1, 20, 20352, '53232424', 688, 4, 0, 0, 0, 45.00, 180, '2016-03-09', 1, '2016-03-09 02:03:52'),
(3, 4, 120304, '', 690, 100, 0, 0, 0, 100.00, 10000, '2016-03-16', 1, '2016-03-16 12:03:04'),
(4, 23, 120346, '', 690, 110, 0, 0, 0, 100.00, 11000, '2016-03-16', 1, '2016-03-16 12:03:46'),
(5, 24, 120338, '', 692, 10, 0, 0, 0, 300.00, 3000, '2016-03-16', 1, '2016-03-16 12:03:38'),
(6, 23, 10303, '11201', 693, 6, 0, 0, 0, 1050.00, 6300, '2016-03-20', 1, '2016-03-20 01:03:03'),
(7, 23, 10303, '11201', 155, 8, 0, 0, 0, 56.00, 448, '2016-03-20', 1, '2016-03-20 01:03:03'),
(14, 5, 120557, '112233', 693, 10, 0, 0, 0, 200.00, 2000, '2016-05-09', 1, '2016-05-09 12:05:57'),
(15, 4, 120507, '112233', 692, 50, 0, 0, 0, 300.00, 15000, '2016-05-09', 1, '2016-05-09 12:05:07'),
(16, 9, 10525, '565656', 694, 10, 0, 0, 0, 200.00, 2000, '2016-05-09', 1, '2016-05-09 01:05:25'),
(17, 23, 20526, '54554', 695, 10, 0, 0, 0, 400.00, 4000, '2016-05-09', 1, '2016-05-09 02:05:26'),
(18, 1, 40537, '5772', 695, 50, 0, 0, 0, 300.00, 15000, '2016-05-09', 1, '2016-05-09 04:05:37'),
(19, 12, 30511, '243242', 696, 20, 0, 0, 0, 200.00, 4000, '2016-05-12', 1, '2016-05-12 03:05:11'),
(20, 15, 120503, '123656', 694, 35, 0, 0, 0, 500.00, 1094, '2016-05-18', 1, '2016-05-18 12:05:03'),
(21, 15, 120518, '1122334455', 694, 40, 0, 0, 0, 300.00, 750, '2016-05-18', 1, '2016-05-18 12:05:18'),
(23, 23, 30518, '5555', 694, 35, 2, 3, 0, 500.00, 1094, '2016-05-18', 1, '2016-05-18 03:05:18'),
(24, 24, 40527, '7898978', 694, 35, 2, 3, 0, 500.00, 1094, '2016-05-18', 1, '2016-05-18 04:05:27'),
(25, 6, 40529, '68678', 694, 34, 2, 2, 0, 500.00, 1063, '2016-05-18', 1, '2016-05-18 04:05:29'),
(26, 17, 40512, '6595656', 694, 51, 3, 3, 0, 500.00, 1594, '2016-05-18', 1, '2016-05-18 04:05:12'),
(27, 23, 40503, '678768', 694, 35, 2, 3, 0, 500.00, 1094, '2016-05-18', 1, '2016-05-18 04:05:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `invoice_id`, `item_id`, `qnty`, `price`, `vat`, `total_price`, `discount`, `saved_by`, `saved_date`, `sales_date`) VALUES
(1, 203578611, 688, 3.00, 58.00, 0.00, 174.00, 0.00, 1, '2016-03-09 02:03:57', '2016-03-09'),
(2, 203462037, 688, 1.00, 58.00, 0.00, 58.00, 0.00, 1, '2016-03-09 02:03:46', '2016-03-09'),
(3, 1203272412, 692, 1.00, 350.00, 0.00, 350.00, 0.00, 1, '2016-03-16 12:03:27', '2016-03-16'),
(4, 103458721, 693, 2.00, 1300.00, 0.00, 2600.00, 0.00, 1, '2016-03-20 01:03:45', '2016-03-20'),
(5, 1205253365, 692, 1.00, 350.00, 0.00, 350.00, 0.00, 1, '2016-05-09 12:05:25', '2016-05-09'),
(6, 1205161239, 692, 2.00, 350.00, 0.00, 400.00, 0.00, 1, '2016-05-09 12:05:16', '2016-05-09'),
(7, 205459015, 695, 2.00, 500.00, 0.00, 1000.00, 0.00, 1, '2016-05-09 02:05:45', '2016-05-09'),
(8, 305346959, 695, 2.00, 1000.00, 0.00, 2000.00, 0.00, 1, '2016-05-09 03:05:34', '2016-05-09'),
(9, 305092751, 695, 2.00, 500.00, 0.00, 1000.00, 0.00, 1, '2016-05-09 03:05:09', '2016-05-09'),
(10, 305519945, 695, 2.00, 200.00, 0.00, 400.00, 0.00, 1, '2016-05-09 03:05:51', '2016-05-09'),
(11, 1005477052, 694, 2.00, 400.00, 0.00, 800.00, 0.00, 1, '2016-05-12 10:05:47', '2016-05-12'),
(12, 1205319808, 694, 93.00, 300.00, 0.00, 27900.00, 0.00, 1, '2016-05-18 12:05:31', '2016-05-18'),
(13, 405002193, 694, 190.00, 300.00, 0.00, 57000.00, 0.00, 1, '2016-05-18 04:05:00', '2016-05-18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_sales_payment`
--

INSERT INTO `tbl_sales_payment` (`id`, `invoice_id`, `cus_id`, `payment_type`, `transc_no`, `amount`, `return_amt`, `pay_date`, `saved_by`, `saved_date`) VALUES
(1, 203578611, 0, 'Cash', '', 174.00, 26.00, '2016-03-09', 1, '2016-03-09 02:03:57'),
(2, 203462037, 1, 'Cash', '', 20.00, 0.00, '2016-03-09', 1, '2016-03-09 02:03:46'),
(3, 203462037, 1, 'Card', '4565465', 20.00, 0.00, '2016-03-09', 1, '2016-03-09 02:03:46'),
(4, 203462037, 1, 'Cash', '', 10.00, 0.00, '2016-03-10', 1, '2016-03-10 02:03:58'),
(5, 203462037, 1, 'Bkash', '3221321', 10.00, 0.00, '2016-03-10', 1, '2016-03-10 02:03:58'),
(6, 1203272412, 2, 'Cash', '', 0.00, 0.00, '2016-03-16', 1, '2016-03-16 12:03:27'),
(7, 103458721, 0, 'Cash', '', 2600.00, 0.00, '2016-03-20', 1, '2016-03-20 01:03:45'),
(8, 1205253365, 0, 'Cash', '', 350.00, 0.00, '2016-05-09', 1, '2016-05-09 12:05:25'),
(9, 1205161239, 0, 'Cash', '', 380.00, 0.00, '2016-05-09', 1, '2016-05-09 12:05:16'),
(10, 205459015, 0, 'Cash', '', 1000.00, 0.00, '2016-05-09', 1, '2016-05-09 02:05:45'),
(11, 305346959, 1, 'Cash', '', 0.00, 0.00, '2016-05-09', 1, '2016-05-09 03:05:34'),
(12, 305092751, 0, 'Cash', '', 1000.00, 0.00, '2016-05-09', 1, '2016-05-09 03:05:09'),
(13, 305519945, 0, 'DBBL-MB', '', 400.00, 0.00, '2016-05-09', 1, '2016-05-09 03:05:51'),
(14, 305519945, 0, 'DBBL-MB', '', 0.00, 0.00, '2016-05-09', 1, '2016-05-09 03:05:51'),
(15, 1005477052, 0, 'Cash', '', 800.00, 0.00, '2016-05-12', 1, '2016-05-12 10:05:47'),
(16, 1205319808, 0, 'Cash', '', 27900.00, 0.00, '2016-05-18', 1, '2016-05-18 12:05:31'),
(17, 405002193, 0, 'Cash', '', 57000.00, 0.00, '2016-05-18', 1, '2016-05-18 04:05:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='all total calculation' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_sales_transaction`
--

INSERT INTO `tbl_sales_transaction` (`id`, `invoice_id`, `cus_id`, `sub_total`, `discount`, `total_vat`, `rounding`, `g_total`, `payed_total`, `due_amount`, `remarks`, `saved_by`, `tra_date`, `saved_date`, `invoice_status`) VALUES
(1, 203578611, 0, 174.00, 0.00, 0.00, 4.00, 174.00, 174.00, 0.00, 'Sales', 1, '2016-03-09', '2016-03-09 02:03:57', 'Paid'),
(2, 203462037, 1, 58.00, 0.00, 0.00, 8.00, 58.00, 40.00, 18.00, 'Sales', 1, '2016-03-09', '2016-03-09 02:03:46', 'Paid'),
(3, 1203272412, 2, 350.00, 0.00, 0.00, 0.00, 350.00, 0.00, 350.00, 'Sales', 1, '2016-03-16', '2016-03-16 12:03:27', 'Due'),
(4, 103458721, 0, 2600.00, 0.00, 0.00, 0.00, 2600.00, 2600.00, 0.00, 'Sales', 1, '2016-03-20', '2016-03-20 01:03:45', 'Paid'),
(5, 1205253365, 0, 350.00, 0.00, 0.00, 0.00, 350.00, 350.00, 0.00, 'Sales', 1, '2016-05-09', '2016-05-09 12:05:25', 'Paid'),
(6, 1205161239, 0, 400.00, 20.00, 0.00, 0.00, 380.00, 380.00, 0.00, 'Sales', 1, '2016-05-09', '2016-05-09 12:05:16', 'Paid'),
(7, 205459015, 0, 1000.00, 0.00, 0.00, 0.00, 1000.00, 1000.00, 0.00, 'Sales', 1, '2016-05-09', '2016-05-09 02:05:45', 'Paid'),
(8, 305346959, 1, 2000.00, 0.00, 0.00, 0.00, 2000.00, 0.00, 2000.00, 'Sales', 1, '2016-05-09', '2016-05-09 03:05:34', 'Due'),
(9, 305092751, 0, 1000.00, 0.00, 0.00, 0.00, 1000.00, 1000.00, 0.00, 'Sales', 1, '2016-05-09', '2016-05-09 03:05:09', 'Paid'),
(10, 305519945, 0, 400.00, 0.00, 0.00, 0.00, 400.00, 400.00, 0.00, 'Sales', 1, '2016-05-09', '2016-05-09 03:05:51', 'Paid'),
(11, 1005477052, 0, 800.00, 0.00, 0.00, 0.00, 800.00, 800.00, 0.00, 'Sales', 1, '2016-05-12', '2016-05-12 10:05:47', 'Paid'),
(12, 1205319808, 0, 27900.00, 0.00, 0.00, 0.00, 27900.00, 27900.00, 0.00, 'Sales', 1, '2016-05-18', '2016-05-18 12:05:31', 'Paid'),
(13, 405002193, 0, 57000.00, 0.00, 0.00, 0.00, 57000.00, 57000.00, 0.00, 'Sales', 1, '2016-05-18', '2016-05-18 04:05:00', 'Paid');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `item_id`, `available_stock`, `last_tra_date`, `saved_by`, `saved_date`) VALUES
(1, 688, 0.00, '2016-03-09', 1, '2016-03-09 02:03:52'),
(2, 690, 310.00, '2016-03-16', 1, '2016-03-16 12:03:14'),
(3, 692, 56.00, '2016-03-16', 1, '2016-03-16 12:03:38'),
(4, 693, -85.00, '2016-03-20', 1, '2016-03-20 01:03:03'),
(5, 155, 8.00, '2016-03-20', 1, '2016-03-20 01:03:03'),
(6, 383, 70.00, '2016-05-09', 1, '2016-05-09 12:05:21'),
(7, 694, 35.00, '2016-05-09', 1, '2016-05-09 12:05:33'),
(8, 695, 52.00, '2016-05-09', 1, '2016-05-09 02:05:26'),
(9, 696, 20.00, '2016-05-12', 1, '2016-05-12 03:05:11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `c_name`, `address`, `mobile`, `email`, `contact_person`, `cp_mobile`, `status`, `saved_by`, `saved_date`) VALUES
(1, 'PNG', 'JAHANGIR TOWER 5t floor 10 kazi nozrul islam avenue dhaka -1215', '01755540637', '', '', '', 1, 3, '2015-09-10 10:09:51'),
(2, 'test', '\n\n', '', '', '', '', 1, 3, '2015-09-10 11:09:03'),
(3, 'kohenur  camecle -co bangladesh LTD', '36 sohid taj uddin ahammad soroni  dhaka 1208', '', '', '', '', 1, 3, '2015-09-10 11:09:10'),
(4, 'ACI Consumer Brands', '245 tajgao silpo alaka dhaka1208 bangladesh', '', '', '', '', 1, 3, '2015-09-10 11:09:56'),
(5, 'ACI Commodity Foods', '245 tajgao silpo alaka dhaka-1208', '', '', '', '', 1, 3, '2015-09-10 11:09:23'),
(6, 'Rupchanda shateera trading', '', '01819257870', '', '', '', 1, 3, '2015-09-10 11:09:32'),
(7, 'Olympic Industries Ltd', '', '', '', '', '', 1, 3, '2015-09-10 11:09:08'),
(8, 'Ankon industries LTD', '', '', '', '', '', 1, 3, '2015-09-10 11:09:58'),
(9, 'DANISH ', 'basabo dhaka', '', '', '', '', 1, 3, '2015-09-10 11:09:05'),
(10, 'Fresh', 'FMCG Division Office: Fresh cottage, 48, Garib-E- Newaz Avenue, Sector - 13, Uttara, Dhaka - 1230.', '01740559587', '', '01715007722', '', 1, 2, '2015-09-14 11:09:02'),
(11, 'Chu.Chu Company Bangladesh Silicone Corporation', '76/2, Khaja Dewan 1st Len, Lal Bagh, Dhaka', '8615441', '', '', '', 1, 2, '2015-09-14 03:09:28'),
(12, 'Fogg Company (Vin Global Distribution)', 'Karim Bhaban (2nd floor) 65, bagum Bazar, Dhaka', '7315492,7315271', '', '', '', 1, 2, '2015-09-14 04:09:43'),
(13, 'Himalaya Herbals Company (Rigs Marketing)', '113/A TejgaonI/A, Dhaka-1208, Bangladesh', '028870461', '', '', '', 1, 2, '2015-09-14 04:09:58'),
(14, 'rigs marketing a concern of rigs group (hie & emami)', '', '', '', '', '', 1, 3, '2015-09-15 11:09:24'),
(15, 'city marketing internatonal', '153 shantinagar dhaka -1217', '8350305', '', '', '', 1, 3, '2015-09-15 11:09:37'),
(16, 'rigs marketing a concern of rigs group himalaya herbals', '', '', '', '', '', 1, 3, '2015-09-15 11:09:38'),
(17, 'bangladesh silicone corporation', '76/2 khaja daoan 1m lan lalbag ', '8615441', '', '', '', 1, 3, '2015-09-15 12:09:55'),
(18, 'sunam enterprise', 'm/4/4 road#7 mirpur-1216', '88029001204', '', '', '', 1, 3, '2015-09-15 12:09:25'),
(19, 'deepa food products ltd a sister concern of city of industries', '', '', '', '', '', 1, 3, '2015-09-15 12:09:23'),
(20, 'Sharif', 'adsfadsf', '0919626707', 'shariff@yahoo.com', 'Sohag', '01553296702', 1, 1, '2016-03-09 02:03:59'),
(21, 'Hamko', '', '', '', '', '', 1, 1, '2016-03-10 03:03:33'),
(22, 'Sharif Malemine', 'ggggg', '', '', '', '', 1, 1, '2016-03-16 12:03:00'),
(23, 'Partex', '', '', '', '', '', 1, 1, '2016-03-16 12:03:00'),
(24, 'RFL', '', '', '', '', '', 1, 1, '2016-03-16 12:03:41'),
(25, 'Test Supplier', '', '32423', 'sdkjls@sdkfjsdl.com', 'sdfsdf ', '432525234', 1, 1, '2016-05-09 12:05:06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_supplier_trans`
--

INSERT INTO `tbl_supplier_trans` (`id`, `supp_id`, `pur_id`, `total_amount`, `paid`, `balance`, `invoice_due`, `remarks`, `payment_date`, `saved_by`, `saved_date`) VALUES
(1, 20, 0, '45600.00', '0.00', '45600.00', 0.00, 'Sharih adsf', '0000-00-00', 1, '2016-03-09 02:03:59'),
(2, 20, 0, '0.00', '20000.00', '25600.00', 0.00, 'sjdkfh jksdf jhjkhksjdfh  asfd', '2016-03-09', 1, '2016-03-09 02:03:34'),
(3, 20, 20352, '180.00', '160.00', '25620.00', 20.00, 'Purchase', '2016-03-09', 1, '2016-03-09 02:03:52'),
(4, 21, 0, '0.00', '0.00', '0.00', 0.00, '', '0000-00-00', 1, '2016-03-10 03:03:33'),
(6, 22, 0, '0.00', '0.00', '0.00', 0.00, '', '0000-00-00', 1, '2016-03-16 12:03:00'),
(7, 4, 120304, '10000.00', '2000.00', '8000.00', 8000.00, 'Purchase', '2016-03-16', 1, '2016-03-16 12:03:04'),
(8, 23, 0, '0.00', '0.00', '0.00', 0.00, '', '0000-00-00', 1, '2016-03-16 12:03:00'),
(9, 23, 120346, '11000.00', '3000.00', '8000.00', 8000.00, 'Purchase', '2016-03-16', 1, '2016-03-16 12:03:46'),
(10, 24, 0, '0.00', '0.00', '0.00', 0.00, '', '0000-00-00', 1, '2016-03-16 12:03:41'),
(11, 24, 120338, '3000.00', '2000.00', '1000.00', 1000.00, 'Purchase', '2016-03-16', 1, '2016-03-16 12:03:38'),
(12, 23, 10303, '1498.00', '1498.00', '8000.00', 0.00, 'Purchase', '2016-03-20', 1, '2016-03-20 01:03:03'),
(19, 25, 0, '0.00', '0.00', '0.00', 0.00, '', '0000-00-00', 1, '2016-05-09 12:05:06'),
(20, 5, 120557, '2000.00', '2000.00', '0.00', 0.00, 'Purchase', '2016-05-09', 1, '2016-05-09 12:05:57'),
(21, 4, 120507, '15000.00', '15000.00', '8000.00', 0.00, 'Purchase', '2016-05-09', 1, '2016-05-09 12:05:07'),
(22, 9, 10525, '2000.00', '2000.00', '0.00', 0.00, 'Purchase', '2016-05-09', 1, '2016-05-09 01:05:25'),
(23, 23, 20526, '4000.00', '4000.00', '8000.00', 0.00, 'Purchase', '2016-05-09', 1, '2016-05-09 02:05:26'),
(24, 1, 40537, '15000.00', '15000.00', '0.00', 0.00, 'Purchase', '2016-05-09', 1, '2016-05-09 04:05:37'),
(25, 12, 30511, '4000.00', '4000.00', '0.00', 0.00, 'Purchase', '2016-05-12', 1, '2016-05-12 03:05:11'),
(26, 15, 120503, '1093.75', '1093.00', '0.75', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 12:05:03'),
(27, 15, 120518, '750.00', '750.00', '0.75', 0.00, 'Purchase', '2016-05-18', 1, '2016-05-18 12:05:18'),
(28, 21, 30543, '1093.75', '1093.00', '0.75', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 03:05:43'),
(29, 23, 30518, '1093.75', '1093.00', '8000.75', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 03:05:18'),
(30, 24, 40527, '1093.75', '1093.00', '1000.75', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 04:05:27'),
(31, 6, 40529, '1062.50', '1062.00', '0.50', 0.50, 'Purchase', '2016-05-18', 1, '2016-05-18 04:05:29'),
(32, 17, 40512, '1593.75', '1593.00', '0.75', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 04:05:12'),
(33, 23, 40503, '1093.75', '1093.00', '8001.50', 0.75, 'Purchase', '2016-05-18', 1, '2016-05-18 04:05:03');

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
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`id`, `name`, `email`, `mobile`, `username`, `password`, `about`, `usertype`, `status`, `saved_by`, `saved_date`) VALUES
(1, 'Admin', 'admin@admin.com', '0123456789', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'I am admin', 'admin', 1, 1, '2015-09-09 08:49:19'),
(2, 'mamun', 'mamun@gmail.com', '01920554767', 'mustakim', 'c8e36a853fe91f3a4a3c4d739e830139', 'I am employee.', 'employee', 1, 1, '2015-09-09 08:09:57'),
(3, 'Rafsun Rabbi', 'rafsun24@gmail.com', '01777431069', 'rafsun', '61ae604f2abe9926164aeac59effa18f', 'I am employee', 'employee', 1, 1, '2015-09-09 09:09:15'),
(4, 'Rayhan Hasnat', 'r.hasnat@gmail.com', '01680549696', 'rhasnat', '61bd60c60d9fb60cc8fc7767669d40a1', 'This is Admin account', 'admin', 1, 1, '2015-09-15 00:00:00'),
(5, 'Rahim', 'rahim@gmail.com', '01723626707', 'rahim', 'dc483e80a7a0bd9ef71d8cf973673924', 'Rahim is my causin and very honest person', 'employee', 1, 1, '2016-03-09 02:03:19');

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
