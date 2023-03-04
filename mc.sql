-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2023 at 12:06 PM
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
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(11) NOT NULL,
  `branchName` varchar(30) NOT NULL,
  `branchAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `branchName`, `branchAddress`) VALUES
(2, 'Bangkok', '5/2/3 asd, asdwdqdasdc, 11115\r\n'),
(3, 'Nonthaburi', '5/2/3 asd, asdwdqdasdc, 11115'),
(4, 'Bangkok', '1/2/3 ฟหกฟหก, ๆไฟหก, 11112\r\n'),
(5, 'Nonthaburi', '1/321 aassd, asdaแฟหแsdc, 11113\r\n'),
(6, 'Bangkok', '5/2/3 asd, asdwdqdasdc, 11115\r\n'),
(7, 'Nonthaburi', '10/31 asdw, ajhsdkla, 23233\r\n'),
(8, 'Bangkok', '1/2/3 asd, asdasdc, 11114\r\n'),
(9, 'Nonthaburi', '22/31 asdw, aascajhsdkla, 23234\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Burger'),
(2, 'Other');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_email`, `password`, `name`, `phone_num`, `address`, `subdistrict`, `district`, `provice`, `user_role`) VALUES
('asd@asd.asd', '8b353d5cc07e13577608711f4602fcb7', 'test', '1231231231', '1', '1', '1', '1', 0),
('thitip2@gmail.com', '8b353d5cc07e13577608711f4602fcb7', 'test2', '1234567890', 'asd', 'asd', 'asd', 'asd', 0),
('thth@asdasd.com', '8b353d5cc07e13577608711f4602fcb7', 'asdasd', '1234567890', '123', '123', '123', '123', 0),
('ththt@asdasd.com', '25f9e794323b453885f5181f1b624d0b', 'test1', '1234567890', '111', '11', '11', '11', 0);

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
  `food_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`food_id`, `food_name`, `food_price`, `food_pict`, `food_category`) VALUES
(1, 'test1', 11, 'https://d1vs91ctevllei.cloudfront.net/images/product/1673445991WOS_600x400-nambang-pork.png', 1),
(4, 'ss', 22, 'https://d1vs91ctevllei.cloudfront.net/images/product/1673445991WOS_600x400-nambang-pork.png', 1),
(5, 'Bacon Burger หมา', 165, 'https://d1vs91ctevllei.cloudfront.net/images/product/1657623807WOS-600x400-alc-qpcb.png', 1),
(6, 'Bacon Burger หมา', 165, 'https://d1vs91ctevllei.cloudfront.net/images/product/1657623807WOS-600x400-alc-qpcb.png', 1),
(7, 'Bacon Burger หมา', 165, 'https://d1vs91ctevllei.cloudfront.net/images/product/1657623807WOS-600x400-alc-qpcb.png', 1);

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

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`cus_email`);

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
-- Indexes for table `list_set`
--
ALTER TABLE `list_set`
  ADD PRIMARY KEY (`setmenu_id`,`food_id`),
  ADD KEY `food_id` (`food_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
