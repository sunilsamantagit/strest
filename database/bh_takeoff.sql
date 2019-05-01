-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2019 at 04:09 PM
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
-- Table structure for table `bh_takeoff`
--

CREATE TABLE `bh_takeoff` (
  `id` int(11) NOT NULL,
  `project_no` varchar(20) NOT NULL,
  `quote_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
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
-- Dumping data for table `bh_takeoff`
--

INSERT INTO `bh_takeoff` (`id`, `project_no`, `quote_no`, `date`, `addenda`, `pricing_units`, `project_title`, `erect`, `fob`, `location`, `legal`, `owner`, `place`, `tel`, `fax`, `mobile`, `contact`, `closing_bid_depository`, `clo_rulings`, `clo_date_time`, `clo_place`, `clo_GST`, `clo_PST`, `clo_other_tax`, `bid_bond`, `perform_bond`, `lab_mat_bond`, `holdback`, `architect_name`, `architect_place`, `architect_contact`, `architect_tel`, `architect_fax`, `engineer_name`, `engineer_place`, `engineer_contact`, `engineer_tel`, `engineer_fax`, `status`) VALUES
(4, '1234', 'QTYB005', '2019-04-29', 'Addenda', 'English', 'Project Title', 'Yes', 'FOB', 'Location', 'Legal', 'Owner', 'Place', 'Tel', 'Fax', 'Mobile', 'Contact', 'Yes', 'Rulings', '2019-04-29', 'Place', 80, 80, 100, 'Yes', 'Yes', 'Yes', 'Holdback', 'Holdback', 'Place Architect', 'Contact Architect', 'Tel Architect', 'Fax Architect', 'Engineer NAME', 'Place Engineer', 'Contact Engineer', 'Tel Engineer', 'Fax Engineer', '1'),
(5, '4564', 'asdf', '2019-04-30', 'asdf', 'Metric', 'asdf', 'No', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asf', 232, 232, 23, 'Yes', 'Yes', 'Yes', 'xvzxc', 'xvzxc', 'zxcv', 'zxcv', 'zxcv', 'zcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', '1'),
(6, '12', 'asdfas', '2019-04-03', 'sdgfds', 'English', 'asdfads', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', '(', 'asdf', 'Yes', 'asdf', '04/24/2019 12:00 AM', 'asdf', 34, 34, 34, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', 'asdf', 'asdf', 'asdf', '(', '(', '1'),
(8, '454', 'asda', '2019-04-01', 'asdf', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asfd', 'asdf', 'asfd', 'Yes', 'asdf', '04/17/2019 12:00 AM', 'asdfa', 343, 343, 4353, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1'),
(9, '0', 'ghdfg', '2019-04-02', '', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1'),
(10, '0', 'QTYASD001', '2019-04-01', '', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1'),
(11, '4564', 'asdf', '2019-04-30', 'asdf', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', '(', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asf', 232, 232, 23, 'Yes', 'Yes', 'Yes', 'xvzxc', 'xvzxc', 'zxcv', 'zxcv', '(', '(', 'zxcv', 'zxcv', 'zxcv', '(', '(', '1'),
(12, '1458520', 'QTYAVIJIT', '2019-04-01', 'BHS BUILDING REPAIRING', 'Metric', 'BHS PROJECT', 'No', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'No', 'No', 'No', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1'),
(13, '1458520', 'QTYAVIJIT', '2019-04-08', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1'),
(14, '1458520', 'QTYAVIJIT', '2019-04-02', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1'),
(15, '1458520', 'QTYAVIJIT', '2019-04-02', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-6345', '(933) 237-5463', '1'),
(16, '3434', 'dfgsd', '2019-04-03', 'sdfg', 'English', 'sdfgsdf', 'Yes', '343', 'asdfas', 'asdf', 'asdf', 'adf', '(353) 453-4534', '(534) 534-5345', '(345) 345-3453', 'sdfgsdgsd', 'Yes', 'asdfasd', '04/17/2019 12:00 AM', 'asfdasdfads', 34534, 34534, 345345, 'Yes', 'Yes', 'Yes', 'asdfads', 'asdfads', 'asdf', 'asdf', '(345) 345-3453', '(353) 453-4535', 'af', 'asdf', 'asdf', '(345) 345-3453', '(353) 453-4535', '1'),
(17, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1'),
(18, 'asd123', 'asd123', '2019-04-02', 'asd123', 'English', 'asd123', 'Yes', 'asd123', 'asd123', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', '(123) 456-7890', 'asd123', 'Yes', 'asd123', '04/18/2019 12:00 AM', 'asd123', 123, 123, 123, 'Yes', 'Yes', 'Yes', 'asd123', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', '1'),
(46, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1'),
(47, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'A003', 'Q001', '2019-04-10', '', 'English', 'New Project', 'Yes', '1', 'kolkkata', 'legal111', 'Test Owner', 'Medinipur', '(888) 888-8888', '(999) 999-9999', '(777) 777-7777', '', 'Yes', 'yes', '04/10/2019 05:00 PM', 'canada', 1, 1, 3, 'Yes', 'Yes', 'Yes', 'e', 'e', 'kolk', 'ok', '(988) 886-7665', '(445) 567-7777', 'aaaa', 'medi', 'ok', '(554) 334-5657', '(555) 333-2244', '1'),
(49, 'A003', 'Q001', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '1458520', 'QTYAVIJIT', '2019-04-08', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1'),
(51, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1'),
(56, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1'),
(58, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1'),
(59, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1'),
(60, 'AVIJIT001', 'ASD', '2019-05-02', 'MDN', 'English', 'BHS', 'Yes', '50', 'MDN', 'MDN', 'VINEET', 'MDN', '(897)-697-4443', '(354)-654-6546', '(146)-546-4654', '9332375463', 'Yes', 'KOLKATA', '05/23/2019 12:00 AM', 'KOLKATA', 1500, 1500, 5221, 'Yes', 'Yes', 'Yes', '50', '50', 'NONE', 'MDN', '(988)-655-4654', '(354)-665-4564', 'DSA', 'KOL', 'BHS', '(654)-654-6465', '(465)-465-4654', '1'),
(61, 'AVIJIT001', 'ASD', '2019-05-02', 'MDN', 'English', 'BHS', 'Yes', '50', 'MDN', 'MDN', 'VINEET', 'MDN', '(897)-697-4443', '(354)-654-6546', '(146)-546-4654', '9332375463', 'Yes', 'KOLKATA', '05/23/2019 12:00 AM', 'KOLKATA', 1500, 1500, 5221, 'Yes', 'Yes', 'Yes', '50', '50', 'NONE', 'MDN', '(988)-655-4654', '(354)-665-4564', 'DSA', 'KOL', 'BHS', '(654)-654-6465', '(465)-465-4654', '1'),
(62, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_takeoff`
--
ALTER TABLE `bh_takeoff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_takeoff`
--
ALTER TABLE `bh_takeoff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
