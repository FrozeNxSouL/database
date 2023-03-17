-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2023 at 02:05 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mc`
--

-- --------------------------------------------------------

--
-- Table structure for table `amphures`
--

CREATE TABLE `amphures` (
  `id` int(5) NOT NULL,
  `code` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_pict` varchar(400) NOT NULL,
  `banner_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(11) NOT NULL,
  `branchName` varchar(30) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_subdistrict` varchar(100) NOT NULL,
  `branch_district` varchar(100) NOT NULL,
  `branch_province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_num` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(100) NOT NULL,
  `subdistrict` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `provice` varchar(20) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zip_code` int(11) NOT NULL,
  `name_th` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_en` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amphure_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu_sales`
--

CREATE TABLE `foodmenu_sales` (
  `food_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `foodmenu_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` float NOT NULL,
  `food_pict` varchar(400) NOT NULL,
  `food_category` int(11) NOT NULL,
  `rec_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geographies`
--

CREATE TABLE `geographies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';

-- --------------------------------------------------------

--
-- Table structure for table `list_set`
--

CREATE TABLE `list_set` (
  `setmenu_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `geography_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `put`
--

CREATE TABLE `put` (
  `topping_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `topping_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_date` datetime NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `cus_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setmenu_sales`
--

CREATE TABLE `setmenu_sales` (
  `receipt_id` int(11) NOT NULL,
  `setmenu_id` int(11) NOT NULL,
  `setmenu_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `set_menu`
--

CREATE TABLE `set_menu` (
  `set_id` int(11) NOT NULL,
  `set_name` varchar(100) NOT NULL,
  `set_price` float NOT NULL,
  `set_pict` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `topping_id` int(11) NOT NULL,
  `topping_name` varchar(100) NOT NULL,
  `toppping_price` float NOT NULL,
  `topping_pict` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL DEFAULT '0',
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amphures`
--
ALTER TABLE `amphures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_email`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodmenu_sales`
--
ALTER TABLE `foodmenu_sales`
  ADD PRIMARY KEY (`food_id`,`receipt_id`),
  ADD KEY `receipt_id` (`receipt_id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `food_category` (`food_category`);

--
-- Indexes for table `geographies`
--
ALTER TABLE `geographies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_set`
--
ALTER TABLE `list_set`
  ADD PRIMARY KEY (`setmenu_id`,`food_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `put`
--
ALTER TABLE `put`
  ADD PRIMARY KEY (`topping_id`,`food_id`,`receipt_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `receipt_id` (`receipt_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `cus_email` (`cus_email`);

--
-- Indexes for table `setmenu_sales`
--
ALTER TABLE `setmenu_sales`
  ADD PRIMARY KEY (`receipt_id`,`setmenu_id`),
  ADD KEY `setmenu_id` (`setmenu_id`);

--
-- Indexes for table `set_menu`
--
ALTER TABLE `set_menu`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`topping_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amphures`
--
ALTER TABLE `amphures`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geographies`
--
ALTER TABLE `geographies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_menu`
--
ALTER TABLE `set_menu`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `topping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `foodmenu_sales`
--
ALTER TABLE `foodmenu_sales`
  ADD CONSTRAINT `foodmenu_sales_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food_menu` (`food_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `foodmenu_sales_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD CONSTRAINT `food_menu_ibfk_1` FOREIGN KEY (`food_category`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `list_set`
--
ALTER TABLE `list_set`
  ADD CONSTRAINT `list_set_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food_menu` (`food_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `list_set_ibfk_2` FOREIGN KEY (`setmenu_id`) REFERENCES `set_menu` (`set_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `put`
--
ALTER TABLE `put`
  ADD CONSTRAINT `put_ibfk_1` FOREIGN KEY (`topping_id`) REFERENCES `topping` (`topping_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `put_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_menu` (`food_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `put_ibfk_3` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`cus_email`) REFERENCES `customer` (`cus_email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `setmenu_sales`
--
ALTER TABLE `setmenu_sales`
  ADD CONSTRAINT `setmenu_sales_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `setmenu_sales_ibfk_2` FOREIGN KEY (`setmenu_id`) REFERENCES `set_menu` (`set_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
