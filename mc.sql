-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 11:49 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `burger`
--

CREATE TABLE `burger` (
  `burger_id` int(10) UNSIGNED NOT NULL,
  `burger_price` float NOT NULL,
  `burger_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `burger_pict` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `burger`
--

INSERT INTO `burger` (`burger_id`, `burger_price`, `burger_name`, `burger_pict`) VALUES
(29, 123, 'test2', 'https://d1vs91ctevllei.cloudfront.net/images/product/1673445513WOS_600x400-nambang-chic.png'),
(30, 11, '123123', 'https://d1vs91ctevllei.cloudfront.net/images/product/1673445513WOS_600x400-nambang-chic.png'),
(31, 165, 'Samurai Burger หมา', 'https://d1vs91ctevllei.cloudfront.net/images/product/16331456371593425785sm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_num` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(100) NOT NULL,
  `subdistrict` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `provice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `name`, `phone_num`, `address`, `subdistrict`, `district`, `provice`) VALUES
('jyt@gmail.com', '521a9df35ff6a2a43b183a055b74f2f0', 'ad', '0123456788', 'ds', 'ds', 'ds', 'ds'),
('lolot@gmail.com', '$2y$10$3/zAqn66fgiNiktIlKdpee6hxErFc2TEgwJf9Vzthxd33kgfWxWfu', 'fdfs', '0123456789', 'ffg', 'cx', 'xc', 'xc'),
('Ratan11@gmail.com', '521a9df35ff6a2a43b183a055b74f2f0', 'Radawd', '0812944988', 'dddsadwdd', 'dfd', 'gdg', 'dgdg'),
('Ratan111@gmail.com', '521a9df35ff6a2a43b183a055b74f2f0', 'Radawd', '0812944988', 'dddsadwdd', 'ddd', 'ddd', 'ddd'),
('Ratanon1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'ad', '0123456789', 'ds', 'ad', 'sd', 'ds'),
('sdesa@gmail.com', '521a9df35ff6a2a43b183a055b74f2f0', 'ad', '0123456789', 'ds', 'd', 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `menuset`
--

CREATE TABLE `menuset` (
  `menuset_id` int(10) UNSIGNED NOT NULL,
  `menuset_price` float NOT NULL,
  `menuset_name` varchar(100) NOT NULL,
  `menuset_pict` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(10) UNSIGNED NOT NULL,
  `submenu_price` float NOT NULL,
  `submenu_name` varchar(100) NOT NULL,
  `submenu_pict` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `submenu_price`, `submenu_name`, `submenu_pict`) VALUES
(1, 59, 'McFurry Oreo', 'https://d1vs91ctevllei.cloudfront.net/images/product/1666941480McFlurry.png'),
(2, 39, 'Strawberry Sundae', 'https://d1vs91ctevllei.cloudfront.net/images/product/15701802141540289146CSO_4550_DC_CHOSUN.png'),
(3, 35, 'Pineapple Pie', 'https://d1vs91ctevllei.cloudfront.net/images/product/1540288254pp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`burger_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `menuset`
--
ALTER TABLE `menuset`
  ADD PRIMARY KEY (`menuset_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `burger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menuset`
--
ALTER TABLE `menuset`
  MODIFY `menuset_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
