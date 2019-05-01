-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2019 at 03:54 PM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

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
-- Table structure for table `bh_material`
--

CREATE TABLE `bh_material` (
  `id` int(11) NOT NULL,
  `material_name` varchar(20) NOT NULL,
  `spec_grade_id` int(11) NOT NULL,
  `shape_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `inches` double NOT NULL,
  `metric` double NOT NULL,
  `size` varchar(20) NOT NULL,
  `unit_weight` double NOT NULL,
  `unit_cost` double NOT NULL,
  `surface` double NOT NULL,
  `labor` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bh_material`
--

INSERT INTO `bh_material` (`id`, `material_name`, `spec_grade_id`, `shape_id`, `date`, `inches`, `metric`, `size`, `unit_weight`, `unit_cost`, `surface`, `labor`, `status`) VALUES
(2, 'ggg', 0, 34, '2019-05-16', 0, 0, '', 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_material`
--
ALTER TABLE `bh_material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_material`
--
ALTER TABLE `bh_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
