-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 02:04 PM
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
(30, 11, '123123', 'https://d1vs91ctevllei.cloudfront.net/images/product/1673445513WOS_600x400-nambang-chic.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`burger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `burger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
