-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2019 at 05:01 PM
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
-- Table structure for table `bh_taskoff`
--

CREATE TABLE `bh_taskoff` (
  `id` int(11) NOT NULL,
  `project_no` int(11) NOT NULL,
  `quote_no` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addenda` varchar(50) NOT NULL,
  `pricing_units` varchar(10) NOT NULL,
  `project_title` varchar(50) NOT NULL,
  `erect` varchar(10) NOT NULL,
  `fob` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `legal` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `closing_bid_depository` varchar(10) NOT NULL,
  `clo_rulings` varchar(20) NOT NULL,
  `clo_date_time` varchar(20) NOT NULL,
  `clo_place` varchar(50) NOT NULL,
  `clo_GST` double NOT NULL,
  `clo_PST` double NOT NULL,
  `clo_other_tax` double NOT NULL,
  `bid_bond` varchar(20) NOT NULL,
  `perform_bond` varchar(20) NOT NULL,
  `lab_mat_bond` varchar(20) NOT NULL,
  `holdback` varchar(20) NOT NULL,
  `architect_name` varchar(20) NOT NULL,
  `architect_place` varchar(50) NOT NULL,
  `architect_contact` varchar(20) NOT NULL,
  `architect_tel` varchar(20) NOT NULL,
  `architect_fax` varchar(20) NOT NULL,
  `engineer_name` varchar(20) NOT NULL,
  `engineer_place` varchar(50) NOT NULL,
  `engineer_contact` varchar(20) NOT NULL,
  `engineer_tel` varchar(20) NOT NULL,
  `engineer_fax` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bh_taskoff`
--

INSERT INTO `bh_taskoff` (`id`, `project_no`, `quote_no`, `date`, `addenda`, `pricing_units`, `project_title`, `erect`, `fob`, `location`, `legal`, `owner`, `place`, `tel`, `fax`, `mobile`, `contact`, `closing_bid_depository`, `clo_rulings`, `clo_date_time`, `clo_place`, `clo_GST`, `clo_PST`, `clo_other_tax`, `bid_bond`, `perform_bond`, `lab_mat_bond`, `holdback`, `architect_name`, `architect_place`, `architect_contact`, `architect_tel`, `architect_fax`, `engineer_name`, `engineer_place`, `engineer_contact`, `engineer_tel`, `engineer_fax`, `status`) VALUES
(1, 1245, 'QTI001', '2019-04-27 07:26:15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 12523, 'QTI002', '2019-04-27 07:26:15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 1234, 'QTYB005', '2019-04-29 08:38:45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 1234, 'QTYB005', '2019-04-28 18:30:00', 'Addenda', 'English', 'Project Title', 'Yes', 'FOB', 'Location', 'Legal', 'Owner', 'Place', 'Tel', 'Fax', 'Mobile', 'Contact', 'Yes', 'Rulings', '2019-04-29', 'Place', 80, 80, 100, 'Yes', 'Yes', 'Yes', 'Holdback', 'Holdback', 'Place Architect', 'Contact Architect', 'Tel Architect', 'Fax Architect', 'Engineer NAME', 'Place Engineer', 'Contact Engineer', 'Tel Engineer', 'Fax Engineer', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_taskoff`
--
ALTER TABLE `bh_taskoff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_taskoff`
--
ALTER TABLE `bh_taskoff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
