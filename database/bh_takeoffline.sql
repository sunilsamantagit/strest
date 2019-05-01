-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 10:38 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strest`
--

-- --------------------------------------------------------

--
-- Table structure for table `bh_takeoffline`
--

CREATE TABLE `bh_takeoffline` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `spec` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `mhs` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `page_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_takeoffline`
--
ALTER TABLE `bh_takeoffline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_takeoffline`
--
ALTER TABLE `bh_takeoffline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
