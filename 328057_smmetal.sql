-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: mariadb-012.wc1:3306
-- Generation Time: May 02, 2019 at 12:45 AM
-- Server version: 10.1.34-MariaDB-1~jessie
-- PHP Version: 7.2.7-1+0~20180622080852.23+jessie~1.gbpfd8e2e

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `328057_smmetal`
--

-- --------------------------------------------------------

--
-- Table structure for table `strest_admin`
--

CREATE TABLE IF NOT EXISTS `strest_admin` (
`id` bigint(20) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `full_name` tinytext,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(200) NOT NULL DEFAULT '',
  `user_email` varchar(220) DEFAULT '',
  `user_level` tinyint(4) NOT NULL DEFAULT '1',
  `pwd` varchar(220) NOT NULL DEFAULT '',
  `pwd_hint` varchar(200) NOT NULL,
  `domain_name` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  `module` longtext
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strest_admin`
--

INSERT INTO `strest_admin` (`id`, `user_id`, `full_name`, `first_name`, `last_name`, `user_name`, `user_email`, `user_level`, `pwd`, `pwd_hint`, `domain_name`, `date`, `last_login`, `approved`, `module`) VALUES
(1, '1234', 'Super Admin', 'Super', 'Admin', 'super', 'xyz@2webdesign.com', 1, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '', '2016-03-10', '2019-05-01', 1, '["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]'),
(2, '1234', '2web Admin', '2web', 'Admin', 'admin', 'abcd@2webdesign.com', 2, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'dakotadunescdc', '', '2019-04-29', '2019-04-30', 1, '["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]'),
(3, '123', '', 'James', 'Morgan', 'admin2', 'jamesmorgan@gmail.com', 2, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'password', '', '2019-05-01', '2019-05-01', 1, NULL),
(4, '1234', '', 'Jack', 'Jill', 'aaa', 'aaa@b.com', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '', '2019-04-30', NULL, 1, NULL),
(7, '123456', '', 'Abdul', 'Barik', 'abdul1', 'a@b.com', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '', '2019-05-01', '2019-04-30', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strest_admin_log`
--

CREATE TABLE IF NOT EXISTS `strest_admin_log` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `user_agent` text,
  `ref` text,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `strest_banner`
--

CREATE TABLE IF NOT EXISTS `strest_banner` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `display_order` int(11) DEFAULT NULL,
  `banner_photo` varchar(500) DEFAULT NULL,
  `banner_text` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_banner`
--

INSERT INTO `strest_banner` (`id`, `title`, `is_active`, `display_order`, `banner_photo`, `banner_text`) VALUES
(2, '', 1, 1, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/flash1-1.jpg', ''),
(4, '', 1, 2, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/FLASH-2-3.jpg', '<h2>Our Vision</h2>\r\n\r\n<h3> </h3>\r\n\r\n<h2>A global scientific source of seed morphology knowledge and expertise.</h2>\r\n'),
(7, '', 1, 3, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/GB with orange shadow.jpg', ''),
(8, '', 1, 4, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/flash3-final.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `strest_cms_pages`
--

CREATE TABLE IF NOT EXISTS `strest_cms_pages` (
`id` int(11) NOT NULL,
  `site_id` int(4) DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `external_link` text,
  `display_order` int(11) NOT NULL DEFAULT '1',
  `page_link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `shown_in_top` tinyint(1) DEFAULT '1',
  `shown_in_footer` tinyint(1) DEFAULT '1',
  `class` varchar(255) DEFAULT 'guide',
  `button` varchar(512) DEFAULT NULL,
  `button_type` tinyint(1) DEFAULT NULL,
  `selected_page_link` varchar(512) DEFAULT NULL,
  `external_url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strest_cms_pages`
--

INSERT INTO `strest_cms_pages` (`id`, `site_id`, `parent_id`, `meta_title`, `meta_keyword`, `meta_description`, `title`, `content`, `external_link`, `display_order`, `page_link`, `is_active`, `shown_in_top`, `shown_in_footer`, `class`, `button`, `button_type`, `selected_page_link`, `external_url`) VALUES
(1, 1, 0, 'Home-ISMA', '', 'Home-ISMA: A global scientific source of seed morphology knowledge and expertise.', 'Home', '<h2>Introduction to ISMA</h2>\r\n\r\n<p xss="removed"><span xss="removed">ISMA is to promote collaboration, knowledge sharing, resource development, and research among those who are interested in seed morphology and seed identification.</span></p>\r\n\r\n<p xss="removed"><span xss="removed">ISMA is to be a scientific source of seed morphology knowledge and expertise, publishing interactive digital identification tools and establishing seed identification database for weeds, economically important plant species and wild plant species. </span></p>\r\n\r\n<p> </p>\r\n', '', 5, 'home', 1, 1, 1, 'home', 'Learn More', 1, 'about_isma', ''),
(2, 1, 0, 'About ISMA', '', 'About ISMA', 'About ISMA', '<h2><strong>Our Vision</strong></h2>\r\n\r\n<p>A global scientific source of seed morphology knowledge and expertise.</p>\r\n\r\n<h2><strong>Our Mission</strong></h2>\r\n\r\n<p xss="removed">To promote collaboration, knowledge sharing, resource development, and research among those who are interested in seed morphology and seed identification.</p>\r\n\r\n<p xss="removed">To facilitate the generation and exchange of information to advance seed morphology knowledge.</p>\r\n\r\n<p xss="removed">To foster the application of seed morphology and seed identification into tools, methods, guidelines, recommendations and other outputs for use by testing laboratories, standard-setting bodies, regulatory authorities, agricultural producers, consumers and other stakeholders in:</p>\r\n\r\n<ul>\r\n <li>reducing the potential spread of noxious, invasive and unwanted plant species dispersed by seeds or fruits</li>\r\n <li>improving the accuracy of commodity labeling for seeds, grains, food ingredients, herbs or other agricultural products with intact seeds, dry fruits or other types of disseminules.</li>\r\n</ul>\r\n\r\n<h2>Our Organization</h2>\r\n\r\n<p xss="removed">International Seed Morphology Association (ISMA) is a scientific association, registered as a not-for-profit organization since 2017.  It is governed by its <a href="/ckfinder/userfiles/files/ISMA-Bylaw-_Effect_April_12-2018.pdf">Bylaws</a> and <a href="http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/pages/citation.html">Executive Board</a> and operated through <a href="http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/pages/technical_committees.html">Technical Committees</a>.</p>\r\n', '', 6, 'about_isma', 1, 1, 1, 'about', NULL, NULL, NULL, NULL),
(3, 1, 0, 'Seed ID Guide', '', 'Seed ID Guide', 'Seed ID Guide', '<p>Seed ID Guide</p>\r\n', 'http://www.idseed.ca/home', 7, 'seed_id_guide', 1, 1, 1, 'guide', NULL, NULL, NULL, NULL),
(4, 1, 0, 'Technical Committees', '', 'Technical Committees', 'Technical Committees', '<dir>\r\n</dir>\r\n\r\n<dir>\r\n</dir>\r\n\r\n<h2 align="JUSTIFY"><strong>Editorial Board </strong></h2>\r\n\r\n<p><em>Seed Identification Guide</em> (SIG) is a web-based virtual publication registered under the ISBN system with the registration number of  ISBN 978-1-7753419-0-1. The <em>editorial board</em> of the SIG has the following functions:</p>\r\n\r\n<ul>\r\n <li>Ensure the reliability of the information provided for publication in <em>Seed Identification Guide</em>.</li>\r\n <li>Conduct and organize peer-review of data that has been submitted for publication.</li>\r\n <li>Develop resources for authors who are interested in publishing their seed morphology or identification knowledge or research in <em>Seed Identification Guide</em>.</li>\r\n <li>Identify, invite and promote collaborations and research to fill gaps and priorities in seed morphology and identification.</li>\r\n</ul>\r\n\r\n<h3 align="JUSTIFY"><span xss="removed">Chair</span></h3>\r\n\r\n<p>Dr. <a href="mailto:ruojing.wang@canada.ca">Ruojing Wang</a>, Research Scientist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579">Canadian Food Inspection Agency</a>, Canada</p>\r\n\r\n<h3><span xss="removed">Member</span></h3>\r\n\r\n<p><a href="mailto:Sue.Cousins@asurequality.com">Sue Cousins</a>, Purity Analyst, <a href="http://www.asurequality.com">AsureQuality Seed Laboratory</a>, New Zealand</p>\r\n\r\n<p>Dr. <a href="mailto:axel.diederichsen@agr.gc.ca">Axel Diederichsen</a>, Research Scientist and Curator, <a href="http://pgrc.agr.gc.ca/">Plant Gene Resources of Canada</a>, Agriculture and Agri-Food Canada, Canada</p>\r\n\r\n<p><a href="mailto:Todd.Erickson@usda.gov">Todd Erickson</a>, Certified Seed Analyst, <a href="http://www.ams.usda.gov/services/seed-testing">Seed Regulatory and Testing Division</a>, United State Department of Agriculture, USA</p>\r\n\r\n<p><a href="mailto:deborah.meyer@cdfa.ca.gov">Deborah J. Meyer</a>, Environmental Program Manager, <a href="http://www.cdfa.ca.gov/plant/ppd/">Plant Pest Diagnostics Center</a>, <a href="http://www.cdfa.ca.gov/">California Department of Food & Agriculture</a>, USA</p>\r\n\r\n<p><a href="mailto:jennifer.neudorf@canada.ca">Jennifer Neudorf</a>, Seed Technologist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579">Canadian Food Inspection Agency</a>, Canada</p>\r\n\r\n<p><a href="mailto:Amanda.J.Redford@usda.gov"><font color="#0066cc">Amanda Redford</font></a>, Biological Scientist, <a href="http://idtools.org"><font color="#0066cc">Identification Technology Program</font></a>, <a href="http://www.aphis.usda.gov/aphis/ourfocus/planthealth"><font color="#0066cc">Plant Protection and Quarantine</font></a>, United States Department of Agriculture, USA</p>\r\n\r\n<p>Dr. <a href="mailto:wolfgang.stuppy@ruhr-uni-bochum.de">Wolfgang Stuppy</a>, Scientific Curator, <a href="http://www.boga.ruhr-uni-bochum.de">Botanic Garden</a>, Ruhr-University Bochum, Germany</p>\r\n\r\n<h2><strong>Digital Tool Committee</strong></h2>\r\n\r\n<p>The digital tool committee is to promote the development of digital tools and to provide resources for digital tool development in seed identification.</p>\r\n\r\n<h3>Chair</h3>\r\n\r\n<p><a href="mailto:Amanda.J.Redford@usda.gov">Amanda Redford</a>, Biological Scientist, <a href="http://idtools.org">Identification Technology Program</a>, <a href="http://www.aphis.usda.gov/aphis/ourfocus/planthealth">Plant Protection and Quarantine</a>, United States Department of Agriculture, USA</p>\r\n\r\n<h3>Member</h3>\r\n\r\n<p>Dr. <a href="mailto:ruojing.wang@canada.ca"><font color="#0066cc">Ruojing Wang</font></a>, Research Scientist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579"><font color="#0066cc">Canadian Food Inspection Agency</font></a>, Canada</p>\r\n\r\n<p>Dr. <a href="mailto:wolfgang.stuppy@ruhr-uni-bochum.de"><font color="#0066cc">Wolfgang Stuppy</font></a>, Scientific Curator, <a href="http://www.boga.ruhr-uni-bochum.de"><font color="#0066cc">Botanic Garden</font></a>, Ruhr-University Bochum, Germany</p>\r\n\r\n<p><a href="mailto:julia.l.scher@usda.gov">Julia Scher</a>, Biological Scientist, <a href="http://idtools.org"><font color="#0066cc">Identification Technology Program</font></a>, <a href="http://www.aphis.usda.gov/aphis/ourfocus/planthealth"><font color="#0066cc">Plant Protection and Quarantine</font></a>, United States Department of Agriculture, USA</p>\r\n\r\n<p> </p>\r\n\r\n<h2><strong>Training Committee</strong></h2>\r\n\r\n<p>The Training Committee is to provide direct services to end users, such as analysts or specialists performing seed identification, for their skill training and knowledge building with innovated solutions using digital technologies. </p>\r\n\r\n<h3 align="JUSTIFY">Chair</h3>\r\n\r\n<p><a href="mailto:Todd.Erickson@usda.gov">Todd Erickson</a>, Certified Seed Analyst, <a href="http://www.ams.usda.gov/services/seed-testing">Seed Regulatory and Testing Division</a>, United States Department of Agriculture, USA</p>\r\n\r\n<h3 align="JUSTIFY">Members</h3>\r\n\r\n<p>Dr. <a href="mailto:wolfgang.stuppy@ruhr-uni-bochum.de"><font color="#0066cc">Wolfgang Stuppy</font></a>, Scientific Curator, <a href="http://www.boga.ruhr-uni-bochum.de"><font color="#0066cc">Botanic Garden</font></a>, Ruhr-University Bochum, Germany</p>\r\n\r\n<p>Dr. <a href="mailto:ruojing.wang@canada.ca"><font color="#0066cc">Ruojing Wang</font></a>, Research Scientist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579"><font color="#0066cc">Canadian Food Inspection Agency</font></a>, Canada</p>\r\n\r\n<p> </p>\r\n\r\n<h2><strong>Seed ID Expert Panel</strong></h2>\r\n\r\n<p>The Seed ID Expert Panel consists of members who have knowledge and experience in seed identification, plant taxonomy and botany to provide expert opinions and advice for peer discussion.</p>\r\n\r\n<h3>Members</h3>\r\n\r\n<p><a href="mailto:deborah.meyer@cdfa.ca.gov"><font color="#0066cc">Deborah J. Meyer</font></a>, Environmental Program Manager, <a href="http://www.cdfa.ca.gov/"><font color="#0066cc">California Department of Food & Agriculture</font></a>, USA</p>\r\n\r\n<p><a href="mailto:jennifer.neudorf@canada.ca"><font color="#0066cc">Jennifer Neudorf</font></a>, Seed Technologist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579"><font color="#0066cc">Canadian Food Inspection Agency</font></a>, Canada</p>\r\n\r\n<p>Dr. <a href="mailto:wolfgang.stuppy@ruhr-uni-bochum.de"><font color="#0066cc">Wolfgang Stuppy</font></a>, Scientific Curator, <a href="http://www.boga.ruhr-uni-bochum.de"><font color="#0066cc">Botanic Garden</font></a>, Ruhr-University Bochum, Germany</p>\r\n\r\n<p><a href="mailto:Sue.Cousins@asurequality.com"><font color="#0066cc">Sue Cousins</font></a>, Purity Analyst, <a href="http://www.asurequality.com"><font color="#0066cc">AsureQuality Seed Laboratory</font></a>, New Zealand</p>\r\n', '', 8, 'technical_committees', 1, 1, 1, 'tech', NULL, NULL, NULL, NULL),
(5, 1, 0, 'Authors', '', 'Authors', 'Authors', '<h2>Publication Guide</h2>\r\n', '', 9, 'authors', 1, 1, 1, 'authors', NULL, NULL, NULL, NULL),
(6, 1, 0, 'Members', '', 'Members', 'Members', '<h2>Membership benefit</h2>\r\n\r\n<ul>\r\n <li>Access to member only online resources found in the Training Resources and Seed ID Forum sections, which will provide ongoing support to your diagnostic skills and capacities.</li>\r\n <li>Networking opportunities with other members sharing common interests in seed testing, seed identification, plant taxonomy and seed morphology.</li>\r\n <li>Discounted registration fees for ISMA workshops and conferences</li>\r\n <li>A 20% discount on open access publication fee charged by ISMA for the Seed Identification Guide.</li>\r\n</ul>\r\n\r\n<h2>Members</h2>\r\n\r\n<p>With your membership you will not only be helping to financially support ISMA&#39;s ongoing devlopment and sharing of knowledge and tools, but you will also be actively involved in the future direction of the organization. Please see membership rights in the Section 2 of ISMA <a href="/ckfinder/userfiles/files/ISMA-Bylaw-_Effect_April_12-2018.pdf"><font color="#0066cc">Bylaws</font></a>. The membership cycle for ISMA is annual, from the date payment is received up to and including the 365th day. A special membership will be issued for the remaining period of 2018 to December 31st 2019 for 500 days.</p>\r\n\r\n<p>There are three membership options:</p>\r\n\r\n<p><strong>Student member:</strong> A full time or part time post-secondary student enrolled in a university or a technical school.</p>\r\n\r\n<p><strong>Regular Member:</strong> An individual as an end user, author, scientist, researcher, stakeholder, or a member of the general public who is interested in seed morphology, seed identification, seed testing and their applications.</p>\r\n\r\n<p><strong>Corporate Member:</strong> An organization membership operates in one region or one country and has the same interests as a regular member.</p>\r\n\r\n<h2>Become a Member</h2>\r\n', '', 10, 'members', 1, 1, 1, 'members', NULL, NULL, NULL, NULL),
(7, 1, 0, 'Contact', '', 'Contact', 'Contact', '<h2>Send us your message</h2>\r\n\r\n<p>We appreciate your comments and feedback about the tool and for its continued improvement.  Any comments or questions, please provide below:</p>\r\n', '', 11, 'contact', 1, 1, 1, 'contact', NULL, NULL, NULL, NULL),
(8, 1, 2, 'ISMA bylaws', '', 'Bylaws', 'ISMA Bylaws', '<p><a href="/ckfinder/userfiles/files/ISMA-Bylaw-_Effect_April_12-2018.pdf">ISMA Bylaws</a> - Click to open PDF</p>\r\n\r\n<p> </p>\r\n', '', 1, 'scale_to_seed_reference', 1, 1, 0, 'contact', NULL, NULL, NULL, NULL),
(9, 1, 2, 'Partnership', '', 'partnership', 'Partnership', '<h2>Partnership</h2>\r\n\r\n<p>(not-for-profit organizations):</p>\r\n\r\n<p>ISMA is a not-for-profit corporation and scientific organization founded in 2017 facilitating the generation and exchange of information to improve seed morphology knowledge and foster the application of accurate seed identification. The application of seed identification is used in commodity’s labelling and grading such as seeds, grains, herbs, spices, food ingredients, and the early detection of noxious weeds or invasive plants.</p>\r\n\r\n<p>ISMA is to promote scientific research, innovation and collaboration in seed identification among government, industry and academia. ISMA’s partner is a not-for-profit organization, such as an association, government institute and university, sharing the same vision and having the same goals for collaboration. </p>\r\n\r\n<h2>Areas of collaboration:</h2>\r\n\r\n<p>The development of resources and tools for the assistance of seed identification.</p>\r\n\r\n<p>The development of research or study calls for common needs in technical support and training in seed identification.</p>\r\n\r\n<h2>Partnership Benefit</h2>\r\n\r\n<ul>\r\n <li>Prioritizing a partner’s needs for projects under ISMA’s scope</li>\r\n <li>Promoting the partnership by posting partner’s logo and its website on ISMA website.</li>\r\n <li>Posting partner’s calls or project proposals related to ISMA’s scope</li>\r\n <li>Posting of related job openings on ISMA website</li>\r\n</ul>\r\n\r\n<h2>ISMA Partners</h2>\r\n\r\n<p><a href="http://inspection.gc.ca/eng/1297964599443/1297965645317">Canadian Food Inspection Agency</a>, the Government of Canada</p>\r\n\r\n<p><a href="http://www.agr.gc.ca/eng/home/?id=1395690825741">Agriculture and Agri-Food Canada</a>, the Government of Canada</p>\r\n\r\n<p><a aria-label="The U.S. Department of Agriculture Home Page" class="usda-logo-text" href="https://www.usda.gov/" id="anch_1" rel="home" title="Home"><font color="#0066cc">U.S. Department of Agriculture</font></a></p>\r\n', '', 1, 'acknowledgements', 1, 1, 0, 'contact', NULL, NULL, NULL, NULL),
(10, 1, 2, 'Executive Board', '', 'Board member', 'Executive Board', '<h2>Executive Board</h2>\r\n\r\n<h3>Chair</h3>\r\n\r\n<p>Dr. <a href="mailto:wolfgang.stuppy@ruhr-uni-bochum.de">Wolfgang Stuppy</a>, Scientific Curator, <a href="http://www.boga.ruhr-uni-bochum.de">Botanic Garden</a>, Ruhr-University Bochum, Germany</p>\r\n\r\n<h3>Vice-Chair</h3>\r\n\r\n<p>Dr. <a href="mailto:axel.diederichsen@agr.gc.ca">Axel Diederichsen</a>, Research Scientist and Curator, <a href="http://pgrc.agr.gc.ca/">Plant Gene Resources of Canada</a>, Agriculture and Agri-Food Canada, Canada</p>\r\n\r\n<h3>Secretary</h3>\r\n\r\n<p>Dr. <a href="mailto:ruojing.wang@canada.ca">Ruojing Wang</a>, Research Scientist, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579">Canadian Food Inspection Agency</a>, Canada</p>\r\n\r\n<h3>Treasurer</h3>\r\n\r\n<p><a href="mailto:janine.maruschak@canada.ca">Janine Maruschak</a>, Section Head, Seed Science and Technology Section, <a href="http://www.inspection.gc.ca/plants/seeds/eng/1299173228771/1299173306579">Canadian Food Inspection Agency</a>, Canada</p>\r\n\r\n<h3>Project Director</h3>\r\n\r\n<p><a href="mailto:Todd.Erickson@usda.gov ">Todd Erickson</a>, Laboratory Supervisor, <a href="http://www.ams.usda.gov/services/seed-testing">Seed Regulatory and Testing Division</a>, United States Department of Agriculture, USA</p>\r\n\r\n<h3>Publication Director</h3>\r\n\r\n<p><a href="mailto:Amanda.J.Redford@usda.gov"><font color="#0066cc">Amanda Redford</font></a>, Biological Scientist, <a href="http://idtools.org"><font color="#0066cc">Identification Technology Program</font></a>, <a href="http://www.aphis.usda.gov/aphis/ourfocus/planthealth"><font color="#0066cc">Plant Protection and Quarantine</font></a>, United States Department of Agriculture, USA</p>\r\n\r\n<h3>Member at Large</h3>\r\n\r\n<p>North America: <a href="mailto:Ernest.Allen@usda.gov">Ernest Allen</a>, Director, <a href="http://www.ams.usda.gov/services/seed-testing">Seed Regulatory and Testing Division</a>, United States Department of Agriculture, USA</p>\r\n\r\n<h3>Other areas: vacant   </h3>\r\n', '', 1, 'citation', 1, 1, 0, 'contact2', NULL, NULL, NULL, NULL),
(11, 1, 0, 'Payment Success', '', 'Payment Success', 'Payment Success', '<h2>Payment Successfully Completed</h2>\r\n\r\n<p>Thank you for joining us. You have successfully completed the payment.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n', '', 3, 'payment_success', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(12, 1, 0, 'Payment Cancel', '', 'Payment Cancel', 'Payment Cancel', '<h2>Payment Canceled</h2>\r\n\r\n<p>You have canceled your payment.</p>\r\n', '', 4, 'payment_cancel', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(14, 1, 0, 'Sponsorship', '', 'Sponsorship', 'Sponsorship', '<h2>Sponsorship</h2>\r\n\r\n<p> (for-profit organizations):</p>\r\n\r\n<p>ISMA is a not-for-profit corporation and scientific organization facilitating the generation and exchange of information to improve seed morphology knowledge and foster the application of accurate seed identification for commodity labelling and grading of seeds, grains, herbs, spices, food ingredients, etc., and the early detection of weeds or invasive plants.</p>\r\n\r\n<p>Sponsorship by your organization will positively impact our mission and will be greatly appreciated. There are three levels of sponsorship:</p>\r\n\r\n<ul>\r\n <li>Platinum Sponsor</li>\r\n <li>Gold Sponsor</li>\r\n <li>Silver Sponsor</li>\r\n</ul>\r\n\r\n<h2>Sponsorship Benefit:</h2>\r\n\r\n<ul>\r\n <li>Complimentary individual Memberships (Silver: 2; Gold: 3; Platinum: 5)</li>\r\n <li>Acknowledgement of sponsor’s level of support on ISMA website</li>\r\n <li>Posting of related job openings on ISMA website</li>\r\n <li>Posting of calls for sponsor’s needs related to ISMA’s scope</li>\r\n <li>Payment receipt which may be an eligible tax deduction (ISMA is a registered not-for-profit organization)</li>\r\n</ul>\r\n\r\n<h2>Become a Sponsor</h2>\r\n', '', 2, 'sponsorship', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(15, 1, 0, '', '', '', 'Page under construction', '<p>Page under construction............</p>\r\n', '', 0, 'page_under_construction', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(16, 1, 2, '', '', '', 'Acknowledgements', '<p>All seed images used in the web page design are from the "<a href="http://papadakis.net/books/seeds-time-capsules-of-life/">SEEDS-Time Capsules of Life</a>" produced by <a href="http://www.robkesseler.co.uk/">Rob Kesseler</a> & Wolfgang Stuppy,  "<a href="http://papadakis.net/books/fruit-edible-inedible-incredible/">FRUIT – Edible, Inedible, Incredible</a>" by Wolfgang Stuppy & Rob Kesseler; Copyright <a href="http://papadakis.net/">Papadakis Publisher</a>, Newbury, UK, or the <a href="http://inspection.gc.ca/eng/1297964599443/1297965645317">Canadian Food Inspection Agency</a>. All rights are reserved.</p>\r\n\r\n<p>The ISMA logo and stamp were designed and produced by Taran Meyer, and the website banners were designed by Yimeng Wang. All rights are reserved.</p>\r\n', '', 4, 'acknowledgement2', 1, 1, 0, 'guide', NULL, NULL, NULL, NULL),
(17, 1, 0, '', '', '', 'Test Page', '<p><img alt="" height="1038" src="/ckfinder/userfiles/images/Screen Shot 2018-11-06 at 12_03_12 PM.png" width="1600"></p>\r\n\r\n&lt;form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="paypal"&gt;&lt;input name="cmd" type="hidden" value="_s-xclick" /&gt; &lt;input name="hosted_button_id" type="hidden" value="996VJD69T2PXA" /&gt;\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td>&lt;input name="on0" type="hidden" value="Membership Plan" /&gt;Membership Plan</td>\r\n  </tr>\r\n  <tr>\r\n   <td>&lt;select name="os0"&gt;<option value="Student">Student $50.00 CAD</option><option value="Member">Member $100.00 CAD</option><option value="Advance Member">Advance Member $200.00 CAD</option> &lt;/select&gt;</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&lt;input name="currency_code" type="hidden" value="CAD" /&gt; &lt;input alt="PayPal – The safer, easier way to pay online!" border="0" name="submit" src="https://www.sandbox.paypal.com/en_GB/i/btn/btn_cart_SM.gif" type="image" /&gt; <img alt="" border="0" height="1" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>\r\n&lt;/form&gt;\r\n\r\n<p> </p>\r\n', '', 0, 'test_page', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(18, 1, 0, 'Members', '', 'Members', 'Members_bak', '<h2>Membership benefit</h2>\r\n\r\n<ul>\r\n <li>Access to member only online resources found in the Training Resources and Seed ID Forum sections, which will provide ongoing support to your diagnostic skills and capacities.</li>\r\n <li>Networking opportunities with other members sharing common interests in seed testing, seed identification, plant taxonomy and seed morphology.</li>\r\n <li>Discounted registration fees for ISMA workshops and conferences</li>\r\n <li>A 20% discount on open access publication fee charged by ISMA for the Seed Identification Guide.</li>\r\n</ul>\r\n\r\n<h2>Members</h2>\r\n\r\n<p>With your membership you will not only be helping to financially supporting ISMA&#39;s ongoing devlopment and sharing of knowledge and tools, but you will also be actively involved in the future direction of the organization. Please see membership rights in the Section 2 of ISMA <a href="/ckfinder/userfiles/files/ISMA-Bylaw-_Effect_April_12-2018.pdf"><font color="#0066cc">Bylaws</font></a>. The membership cycle for ISMA is annual, from the date payment is received up to and including the 365th day. A special membership will be issued for the remaining period of 2018 to December 31st 2019 for 500 days.</p>\r\n\r\n<p>There are three membership options:</p>\r\n\r\n<p><strong>Student member:</strong> A full time or part time post-secondary student enrolled in a university or a technical school.</p>\r\n\r\n<p><strong>Regular Member:</strong> An individual as an end user, author, scientist, researcher, stakeholder, or a member of the general public who is interested in seed morphology, seed identification, seed testing and their applications.</p>\r\n\r\n<p><strong>Corporate Member:</strong> An organization membership operates in one region or one country and has the same interests as a regular member.</p>\r\n\r\n&lt;form action="https://www.paypal.com/cgi-bin/webscr" target="paypal"&gt;&lt;input name="cmd" type="hidden" value="_s-xclick" /&gt; &lt;input name="hosted_button_id" type="hidden" value="WYPBZCA2D2ETU" /&gt;\r\n<table xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <h2>&lt;input name="on0" type="hidden" value="membership" /&gt;Become a Member</h2>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&lt;select name="os0"&gt;<option value="Regular Member">Regular Member $100.00 CAD</option><option value="Corporate Member">Corporate Member $500.00 CAD</option><option value="Student Member">Student Member $50.00 CAD</option> &lt;/select&gt;</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&lt;input name="currency_code" type="hidden" value="CAD" /&gt;</p>\r\n\r\n<p> &lt;input src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" type="image" /&gt; <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"></p>\r\n&lt;/form&gt;\r\n', '', 10, 'membersbak', 0, 1, 1, 'guide', NULL, NULL, NULL, NULL),
(19, 1, 0, '', '', '', 'Cart', '', '', 0, 'cart', 1, 0, 0, 'guide', NULL, NULL, NULL, NULL),
(20, 1, 0, '', '', '', 'Surface Feature Comparison Chart', '<h1 xss="removed"> </h1>\r\n\r\n<h1 xss="removed"><span xss="removed">1. Surface roughness</span></h1>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Granular</strong><strong> </strong></span> </span></span></span></span></p>\r\n\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Granular.jpg" width="245"></span></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Small</span></span><span xss="removed"><span xss="removed"><span xss="removed"> raised granules covering the surface giving a grainy appearance to the seed. </span>    </span>     </span></span></span></span></p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p align="center"><span xss="removed"><span xss="removed">       <span xss="removed"><span xss="removed"><strong>Striations</strong></span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Striations.jpg" width="245"></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Thin, parallel lines, raised or concave, distributed on all or part of the seed surface</span>.  </span></span></span></p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Stippled</strong></span></span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Stippled.jpg" width="245"></strong> </span></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Minute shallow indentations on the surface that give a sparkling appearance to the seed.</span></span></span></span></span></p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Pitted</strong> </span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Pitted.jpg" width="245"></strong></span></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Small, shallow indentations or pits (rounded holes) covering the seed surface.</span></span></span></span></span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Glandular</strong></span></span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Glandular.jpg" width="245"></strong></span></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed">Small, raised bumpy material secreted from glands distributed on the seed surface. Glands can be regular or irregular shaped, translucent or opaque, usually colored. </span></span></p>\r\n   </td>\r\n   <td>\r\n   <p align="center" xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Scars</strong></span></span></span></span></p>\r\n\r\n   <p align="center" xss="removed"><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Scars.jpg" width="245"></strong></span></span></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Irregularly-shaped surface marks, raised or concave, on the seed surface with a rough appearance.                                       </span></span></span></span></p>\r\n\r\n   <p xss="removed"> </p>\r\n   </td>\r\n   <td>\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Scurfy</strong></span></span></span></span></p>\r\n\r\n   <p><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Scurfy.jpg" width="245"></strong></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed">Surface covered with small, thin, fine scales or flakes that seem removable</span></span></span></p>\r\n\r\n   <p>                                                                     </p>\r\n   </td>\r\n   <td>\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Bubbled</strong></span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Bubbled.jpg" width="245"></strong></span></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Seed surface with what appears to be raised, hollow granules that give a blistered appearance.                                  </span></span></span></span></p>\r\n\r\n   <p> </p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p xss="removed"><span xss="removed"><strong>                           <span xss="removed"><span xss="removed"> <span xss="removed">Wrinkles</span></span></span></strong></span></p>\r\n\r\n   <p><span xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Wrinkles.jpg" width="245"></strong></span></span></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Shallow, irregular folds and furrows over the seed surface.</span></span></span></span></span></span></p>\r\n\r\n   <p xss="removed"> </p>\r\n   </td>\r\n   <td>\r\n   <p align="center"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><strong>Porous</strong></span></span></span></span></p>\r\n\r\n   <p align="center"><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Porous.jpg" width="245"></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Surface pitted with multiple layers of </span></span></span></span><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">holes,</span></span></span></span></span></span><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"> as if bubbles had passed through; surface could look like hard or soft foam.</span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p align="center"> </p>\r\n   </td>\r\n   <td>\r\n   <p> </p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h1> </h1>\r\n\r\n<h1>2.Reticulation</h1>\r\n\r\n<h3><br>\r\n2.1 Ridged reticulation: ridges or raised walls separate interspaces, forming a grid or net-like surface patterns.  Interspace can be closed to form cells or open to form irregular grids or irregular patterns.  Ridges can be straight, curved, wavy, thick or thin.</h3>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                   <span xss="removed">Regular (ridged) reticulation</span></strong></p>\r\n\r\n   <p xss="removed"><img alt="" height="333" src="/ckfinder/userfiles/images/Regular (ridged) reticulation.jpg" width="333"></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed">Ridges that intersect to form concave, polygonal or irregular cells in a grid or net pattern.  </span>                                   </p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><b>                      <span xss="removed">Wavy (ridged) reticulation</span></b></p>\r\n\r\n   <p><b><img alt="" height="333" src="/ckfinder/userfiles/images/Wavy (ridged) reticulation.jpg" width="333"></b></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed">Wavy ridges that intersect to form concave, polygonal cells in a grid or net pattern.      </span>                                                </p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                   <span xss="removed">Irregular (ridged) reticulation</span></strong></p>\r\n\r\n   <p xss="removed"><strong><img alt="" height="333" src="/ckfinder/userfiles/images/Irregular (ridged) reticulation.jpg" width="333"></strong></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">Ridged reticulation with irregular patterns to form closed or open concave cells, irregular grids or irregular-looking nets.</span></p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h3> </h3>\r\n\r\n<h3>2.2 Grooved reticulation: concave lines or grooves separate interspaces, forming a grid or net-like surface patterns.  The interspaces can be closed to form cells or open or irregular to form grid or irregular patterns.</h3>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p align="center" xss="removed"><span xss="removed"><strong>Regular grooved reticulation</strong></span></p>\r\n\r\n   <p align="center" xss="removed"><img alt="" height="333" src="/ckfinder/userfiles/images/Regular grooved reticulation.jpg" width="333"></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed">Grooves that intersect to create raised polygonal cells in a grid or net pattern.</span></p>\r\n   </td>\r\n   <td>\r\n   <p align="center" xss="removed"><span xss="removed"><strong>Wavy-grooved reticulation</strong></span></p>\r\n\r\n   <p align="center" xss="removed"><img alt="" height="333" src="/ckfinder/userfiles/images/Wavy-grooved reticulation.jpg" width="333"></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">Wavy grooves that intersect to create raised polygonal cells in a stellate net pattern.</span></p>\r\n   </td>\r\n   <td>\r\n   <p align="center" xss="removed"><span xss="removed"><strong>Irregular grooved reticulation</strong></span></p>\r\n\r\n   <p align="center" xss="removed"><strong><strong><img alt="" height="333" src="/ckfinder/userfiles/images/Irregular grooved reticulation.jpg" width="333"></strong></strong></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">A pattern of radiating or concentric grooves, occasionally cross-grooved to form cells.</span></p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h1> </h1>\r\n\r\n<h1>3. Surface tubercles</h1>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><strong><span xss="removed"><span xss="removed">                 <span xss="removed"><span xss="removed">Spiny tubercles</span></span></span></span></strong></p>\r\n\r\n   <p xss="removed"><strong><span xss="removed"><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Spiny tubercles.jpg" width="245"></span></span></strong></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Small, distinct, pointed projections.                                                                                       </span></span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed">                   <span xss="removed"><span xss="removed"> Warty tubercles</span></span></span></strong></span></p>\r\n\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Warty tubercles.jpg" width="245"></span></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Distinct, rounded projections, large relative to the seed size.                              </span></span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed">                <span xss="removed"><span xss="removed"> Papillate tubercles</span></span></span></strong></span></p>\r\n\r\n   <p xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Papillate tubercles.jpg" width="245"></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Small, distinct, rounded projections, often organized into rows. </span></span></span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><strong><span xss="removed"><span xss="removed">                <span xss="removed">   Ir<span xss="removed">regula</span>r tubercles</span></span></span></strong></p>\r\n\r\n   <p xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Irregular tubercles.jpg" width="245"></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Projections which are irregular in size, shape </span></span></span></span></span></span><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">and</span></span></span></span></span></span><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"> position. They may be distinct or merge together. </span></span></span></span></span></span></p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h1> </h1>\r\n\r\n<h1>4.Veins, Ridges, Ribs, Grooves, and Cavities</h1>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><strong>                    <span xss="removed">       <span xss="removed"><span xss="removed">Grooves</span></span></span></strong></p>\r\n\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed"><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Grooves.jpg" width="245"></span></span></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Linear depressions that may be single or form a series over the entirety of the seed surface. </span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong>                          <span xss="removed"> <span xss="removed">Nerves</span></span></strong></span></p>\r\n\r\n   <p><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Nerves.jpg" width="245"></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Parallel thick lines or thin ridges raised from the surface of the seed.</span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong>                            <span xss="removed"><span xss="removed">Striped</span></span></strong></span></p>\r\n\r\n   <p><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Striped.jpg" width="245"></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed">A series of alternating linear surface textures with grooves and ridges.</span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong>                         <span xss="removed"><span xss="removed">Ridges</span></span></strong></span></p>\r\n\r\n   <p><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Ridges.jpg" width="245"></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Raised thick nerves, generally sharp-edged, could be a series, centered or a few on the surface. </span></span></span></span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong>                            <span xss="removed"><span xss="removed">Veins</span></span></strong></span></p>\r\n\r\n   <p><span xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Veins.jpg" width="245"></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Lines that intersect in a vein pattern that are flush or only slightly raised from the surface of the seed.</span></span></span></span></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed"><span xss="removed">                   <span xss="removed">    Cavities</span></span></span><span xss="removed">  </span></strong></span></p>\r\n\r\n   <p xss="removed"><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Cavities.jpg" width="245"></strong></span></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed">Deep, irregularly shaped depressions in the seed surface.</span></span></span></span></span></span></p>\r\n\r\n   <p xss="removed"> </p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><span xss="removed"><strong><span xss="removed"><span xss="removed">                            <span xss="removed">Ribs</span></span></span><span xss="removed">    </span></strong></span></p>\r\n\r\n   <p><span xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Ribs.jpg" width="245"></strong></span></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"><span xss="removed"> </span></span><span xss="removed"><span xss="removed">Wide, prominent linear ridges, generally rounded</span></span></span></span></span></span></p>\r\n\r\n   <p> </p>\r\n   </td>\r\n   <td> </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h1> </h1>\r\n\r\n<h1>5.Other Surface Decorations</h1>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                         <span xss="removed">Fibers</span></strong></p>\r\n\r\n   <p align="center"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Fibres.jpg" width="245"></strong></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed">Long, flexible threads that densely cover the seed, obscuring the surface.   </span></span>               </p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                        <span xss="removed">  Bristles</span></strong></p>\r\n\r\n   <p xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Bristles.jpg" width="245"></strong></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">Fine, linear outgrowths that are semi-flexible with solid bases, thicker than hairs. </span></p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                           <span xss="removed">Spines</span></strong></p>\r\n\r\n   <p xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Spines.jpg" width="245"></strong></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">Linear, thin, outgrowths that are stiff and thicker than bristles. </span>                                    </p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><strong>                          <span xss="removed"> Spikes</span></strong></p>\r\n\r\n   <p xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Spikes.jpg" width="245"></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed">Thick outgrowths that have a flared base. They are thicker than spines.   </span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td xss="removed">\r\n   <p xss="removed"><b>                          <span xss="removed"><span xss="removed">   Hooks</span></span></b></p>\r\n\r\n   <p><img alt="" height="245" src="/ckfinder/userfiles/images/Hooks.jpg" width="245"></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed">Bristles or spines with curved or backward-pointing tips, or with secondary bristles along their length.      </span></span>                         </p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><strong>                    <span xss="removed"><span xss="removed">    Scales</span></span></strong></p>\r\n\r\n   <p xss="removed"><img alt="" height="245" src="/ckfinder/userfiles/images/Scales.jpg" width="245"></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed"><span xss="removed">Large, flattened, thin flakes overlap each other to cover seed surface; can be papery scales.        </span></span>                                      </p>\r\n   </td>\r\n   <td xss="removed">\r\n   <p xss="removed"><b>                         <span xss="removed"><span xss="removed">  Wings</span></span></b></p>\r\n\r\n   <p><b><img alt="" height="245" src="/ckfinder/userfiles/images/Wings.jpg" width="245"></b></p>\r\n\r\n   <hr>\r\n   <p><span xss="removed"><span xss="removed">Thin, flattened, generally papery extension of a seed edge. Variable in size and shape, relatively thin compared to seeds. </span></span>   </p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><strong>                             <span xss="removed"><span xss="removed">Hairs</span></span></strong></p>\r\n\r\n   <p xss="removed"><strong><img alt="" height="245" src="/ckfinder/userfiles/images/Hairs.jpg" width="245"></strong></p>\r\n\r\n   <hr>\r\n   <p xss="removed"><span xss="removed"><span xss="removed">Fine, linear outgrowths that are flexible, light-colored. Can be short, worm-like, long, forked, star-shaped, curled or gland-tipped.  </span></span></p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n', '', 0, 'surface_feature_comparison_chart', 1, 0, 1, 'guide', NULL, NULL, NULL, NULL),
(21, 1, 3, '', '', '', 'About SIG', '', 'https://www.idseed.org/seedidguide/pages/about.html', 1, 'about_sig', 1, 1, 0, 'guide', NULL, NULL, NULL, NULL);
INSERT INTO `strest_cms_pages` (`id`, `site_id`, `parent_id`, `meta_title`, `meta_keyword`, `meta_description`, `title`, `content`, `external_link`, `display_order`, `page_link`, `is_active`, `shown_in_top`, `shown_in_footer`, `class`, `button`, `button_type`, `selected_page_link`, `external_url`) VALUES
(22, 1, 0, '', '', '', 'TEST', '<h1>Protocol for Imaging Seed Morphological Features</h1>\r\n\r\n<h3> </h3>\r\n\r\n<h3>Do you know?</h3>\r\n\r\n<p>There are over 200,000 plant species distributed around the world which produce seed and that seed production is the main method of plant propagation. Seed is also an agent for long distance plant dispersal and weed spread. Seeds may be dispersed naturally, and intentionally or unintentionally through commercial trade.</p>\r\n\r\n<blockquote>\r\n<p>Here, seed is defined as any propagules, disseminules or diaspores, a part of a plant that serves to propagate it. This includes true botanical seeds, dry fruits, fruit fragments, and vegetative reproduction parts such as bulbs.</p>\r\n</blockquote>\r\n\r\n<p>Determining plant taxonomic identity using seed morphology, known as seed identification, is a highly specialized area of plant taxonomy. Seed identification is an important diagnostic tool for many trade-related systems such as seed certification, phytosanitary certification, seed and grain grading, and commodity labelling. It is also useful in medical, criminal, and veterinary applications, in food science, and for archaeological and anthropological studies.</p>\r\n\r\n<h3>Why do we image seeds?</h3>\r\n\r\n<p>Images of seed morphological features are used as virtual specimen references for seed identification and for the production of training materials and reference resources such as identification fact sheets and web-based identification tools. Because of the rich diversity of flowering plant species, only a collective or collaborative approach will achieve the goal to build a large-scale, global reference database. Therefore, the standardization of imaging seed morphological features is important for building such a comprehensive database from various sources over the long term.</p>\r\n\r\n<h3>Scope: </h3>\r\n\r\n<p>To describe a standard method or procedure for taking digital images of seeds and their morphological features.</p>\r\n\r\n<h3>Purpose:</h3>\r\n\r\n<ul>\r\n <li>\r\n <p>To provide standard procedures and the minimum requirements for taking seed images and documenting seed morphological features.</p>\r\n </li>\r\n <li>\r\n <p>To provide a standard format or form for images which are functional for diagnostic purposes, have consistent appearance over time and display professional quality for a seed image database as the virtual reference for seed morphology and identification.</p>\r\n </li>\r\n</ul>\r\n\r\n<h2>General Rules</h2>\r\n\r\n<h3>Seed Materials or Specimens Used</h3>\r\n\r\n<p>Seed materials or specimens must be verified for their taxonomic identity prior to images being taken. The accuracy of images and their associated information is the sole responsibility of authors who provided the materials. It is recommended that the taxonomic identity be verified by personnel who have seed identification or plant taxonomy expertise.</p>\r\n\r\n<h4>The selection of seeds for imaging should:</h4>\r\n\r\n<table align="center" border="5" cellpadding="1" cellspacing="3">\r\n <tbody>\r\n  <tr>\r\n   <td colspan="3">\r\n   <ul>\r\n    <li>\r\n    <p>Represent intended seed morphological features. </p>\r\n    </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan="3" rowspan="2">\r\n   <ul>\r\n    <li>Be sufficient for seed or feature variation range of the species, including the dimorphic or heteromorphic forms present in certain species. For example,</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p><em>                  </em></p>\r\n\r\n   <p xss="removed"> </p>\r\n\r\n   <p> </p>\r\n   </td>\r\n   <td>                               \r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Acanthosperum_hispidium_20cnsh.jpg" width="225"></p>\r\n\r\n   <p> </p>\r\n   </td>\r\n   <td>                          \r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Centaurea_solstitialis_07cnsh.jpg" width="226"></p>\r\n                                                 </td>\r\n  </tr>\r\n  <tr>\r\n   <td>Variation in size and colour of <em>Ambrosia trifida </em>(<em>Asteraceae</em>) fruits</td>\r\n   <td>Variation in size and colour of <em>Acanthospermum hispidum </em>(<em>Asteraceae</em>) achenes</td>\r\n   <td>\r\n   <p>Dimorphic achenes of <em>Centaurea solstitialis </em>(<em>Asteraceae</em>)</p>\r\n\r\n   <p> </p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan="3">\r\n   <ul>\r\n    <li>Represent mature seeds, unless the particular intention is to show the development of maturity, or the morphological variation of maturity.       </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h4>Images should:</h4>\r\n\r\n<ul>\r\n <li>\r\n <p>Clearly display the morphological features intended</p>\r\n </li>\r\n <li>\r\n <p>Illustrate the range of variation within the species</p>\r\n </li>\r\n <li>\r\n <p>Must be labelled with scientific name and serial number for ease of posting; such as Zea mays-01, Zea mays-02….and so on. Additional information can be added for your organization, such as Zea mays-01-USDA</p>\r\n </li>\r\n <li>\r\n <p>Copyright of an organization or an author can be imbedded on the images</p>\r\n </li>\r\n</ul>\r\n\r\n<h3>Operation and Recommendations</h3>\r\n\r\n<p>Images are recommended to be taken with the following measures to be more effective:</p>\r\n\r\n<ul>\r\n <li>\r\n <p>Have an imaging plan to cover all contents listed in &#39;<em>Capturing Seed Morphological Features</em>&#39; section below with a minimum number of images</p>\r\n </li>\r\n <li>\r\n <p>Select seeds or fruits representing <strong><em>features </em></strong>and <em><strong>variations</strong></em> to be taken</p>\r\n </li>\r\n <li>\r\n <p>Provide guidance and advice to the photographer on images taken, if the specialist is not the one taking images for the intended or best presentation</p>\r\n </li>\r\n <li>\r\n <p>Ensure a standard image background is used and appropriately applied to the features and variations intended. The background should not detract in any way from the seed image, not mask any delicate structures or subtle features and focus on the true colour of the seeds. Recommended background for seed imaging is white, black or grey, and calibrated by image editing software when necessary for the same colour shade.</p>\r\n </li>\r\n <li>\r\n <p>All images must have an accurate scale in relation to the imaged seeds. The authors are fully responsible for the accuracy of scale labels with measures such as routine calibration with a standard reference ruler (usually microscope rulers)</p>\r\n </li>\r\n <li>\r\n <p>It is recommended to review the final images for accuracy, intended presentation, and correct image labelling including scales.</p>\r\n </li>\r\n <li>\r\n <p>In order to present the detailed features of seeds, high powered in-depth focus, imaging scanning or stacking is recommended for imaging equipment. Please see recommended image equipment suppliers.</p>\r\n </li>\r\n</ul>\r\n\r\n<h2>Capturing Seed Morphological Features</h2>\r\n\r\n<p>To present seed morphological features for identifying a species in full coverage, seed images of a species must ensure <strong><em>features</em></strong> and <em><strong>variations</strong></em> be taken, if materials are available. To display the full range of <em><strong>features</strong></em> and <em><strong>variations</strong></em> within a species, typically four type of images are recommended:</p>\r\n\r\n<h4>Image(s) of the morphology of a seed: a complete display of the morphological features of an individual seed using:  </h4>\r\n\r\n<ul>\r\n <li>A single seed. For example,</li>\r\n</ul>\r\n\r\n<p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Silene_latifolia_02cnsh.jpg" width="188"></p>\r\n\r\n<p> <em>Silene latifolia</em> (<em>Caryophyllaceae</em>) seed</p>\r\n\r\n<ul>\r\n <li>Multiple seeds can be used for completing the morphological image of a single seed. When a species has two unique sides, photographing two seeds, each with a different side up may be necessary. For example,</li>\r\n</ul>\r\n\r\n<table align="center" border="5" cellpadding="1" cellspacing="5">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Bothriochloa_barbinodis_09cnsh.jpg" width="225"></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Setaria_pumila_pumila_06cnsh.jpg" width="188"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed">Spikelets of <em>Bothriochloa barbinodis</em> (<em>Poaceae</em>)</p>\r\n   </td>\r\n   <td xss="removed">Spikelet and floret of <em>Setaria pumila</em> subsp. <em>pumila</em> (<em>Poaceae</em>)</td>\r\n  </tr>\r\n  <tr>\r\n   <td><img alt="" height="150" src="/ckfinder/userfiles/images/Bromus_tectorum_11cnsh(1).jpg" width="100"></td>\r\n   <td><img alt="" height="150" src="/ckfinder/userfiles/images/Asclepias_speciosa_03cnsh.jpg" width="225"></td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p>Florets of <em>Bromus tectorum </em>(<em>Poaceae</em>)</p>\r\n   </td>\r\n   <td>Seed of <em>Asclepias speciosa </em>(<em>Apocynaceae</em>)</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h4>Close-ups for special or unique<em> <strong>identification</strong> </em>features:</h4>\r\n\r\n<h4> </h4>\r\n\r\n<table align="center" border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td rowspan="2">\r\n   <ul>\r\n    <li>The close up features must be identification features for displaying the species’ identity or distinguishing similar species. For example, palea teeth of <em>Pascopyrum smithii </em>(<em>Poaceae</em>)</li>\r\n   </ul>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Pascopyrum_smithii_09cnsh-crop for protocol.jpg" width="188"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td> </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan="2">\r\n   <ul>\r\n    <li>The internal structure of the germinating unit, using a cross section or a longitudinal section, may provide useful information about the embryo placement, endosperm consistency and cotyledon size, depending on the plant family. For example,</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Rumex_sp_cnsh.jpg" width="188"></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Proboscidea_louisianica_10cnsh.jpg" width="225"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>Cross section of <em>Rumex</em> sp. (<em>Polygonaceae</em>) achene</td>\r\n   <td>Longitudinal section of <em>Proboscidea louisianica</em> (<em>Martyniaceae</em>) seed</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<h4>Image(s) of multiple forms of dispersal units and their associated parts within a species such as spikelet, floret or caryopsis for grass species and achene, seed, remnant floral parts, or bur for aster species.</h4>\r\n\r\n<table align="center" border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <ul>\r\n    <li>The image of the various forms of a dispersal unit in a species is to document the complete seed morphology information. For example, <em>Aegilops cylindrica </em>(<em>Poaceae</em>) rachis segments, spikelets, florets and caryopses.</li>\r\n   </ul>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Aegilops_cylindrica_21cnsh scale composite.jpg" width="225"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <ul>\r\n    <li>The imaging of floral parts occurs when they are the dispersal unit or connected to seed or fruit features. For example, <em>Rumex crispus </em>(<em>Polygonaceae</em>) perianth and achenes.</li>\r\n   </ul>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Rumex_crispus_01cnsh.jpg" width="188"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <ul>\r\n    <li>A cross section or a longitudinal section of the dispersal unit may be useful to show the internal structure of the unit, and where the seed(s) are situated. For example, internal structure of a <em>Tribulus terrestris </em>(<em>Zygophyllaceae</em>) disseminule.</li>\r\n   </ul>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Tribulus_terrestris_20cnsh.jpg" width="225"></p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h4>A group image to display the potential range of variation in morphological features of a species.</h4>\r\n\r\n<p>The variation range of size, shape, color and dimorphic or heteromorphic seeds, can be captured in a group of 5-10 seeds, or up to 20 seeds if there is a large amount of variation present. </p>\r\n\r\n<ul>\r\n <li>\r\n <p>The group needs to show the variation in the population and have the seeds in various positions.</p>\r\n </li>\r\n <li>\r\n <p>Arrange the seeds so they are not touching each other, but in a manner in which the seeds can be easily compared with one another.</p>\r\n </li>\r\n</ul>\r\n\r\n<table align="center" border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td colspan="2">\r\n   <ul>\r\n    <li>Seed display pattern could be either random or arranged determined by the purpose of feature variation and comparison. For example,</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Centaurea_virgata_squarrosa_10cnsh.jpg" width="225"></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Picris_echioides_10cnsh.jpg" width="200"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>Random display of <em>Centaurea virgata</em> subsp. <em>squarrosa</em> (<em>Asteraceae</em>) achenes</td>\r\n   <td>Arranged display of <em>Picris echioides </em>(<em>Asteraceae</em>) achenes</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan="2">\r\n   <p> </p>\r\n\r\n   <ul>\r\n    <li>Dimorphic seeds. For example,</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Centaurea_solstitialis_19cnsh.jpg" width="225"></p>\r\n   </td>\r\n   <td>\r\n   <p xss="removed"><img alt="" height="150" src="/ckfinder/userfiles/images/Centaurea_solstitialis_20cnsh.jpg" width="225"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p><em>Centaurea solstitialis </em>(<em>Asteraceae</em>)<em> </em>achenes from inner florets</p>\r\n   </td>\r\n   <td>\r\n   <p><em>Centaurea solstitialis </em>(<em>Asteraceae</em>) achenes from outer florets</p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h2> </h2>\r\n\r\n<h2>Image Editing and Labelling:</h2>\r\n\r\n<h4>Image standard background:</h4>\r\n\r\n<ul>\r\n <li>\r\n <p>Imaging is recommended to have a pre-determined background colour, such as grey, black or white.</p>\r\n </li>\r\n <li>\r\n <p>Certain features may need additional edits to display the feature properly,  such as white pappus display, if necessary.</p>\r\n </li>\r\n <li>\r\n <p>Image software can calibrate to a standard colour, increasing the consistency of the image background.</p>\r\n </li>\r\n</ul>\r\n\r\n<h4>Scale must be labelled accurately and clearly for end users:</h4>\r\n\r\n<ul>\r\n <li>\r\n <p>A physical scale, calibrated ruler, or microscope ruler must be used in imaging</p>\r\n </li>\r\n <li>\r\n <p>Reference scale and equipment scale must be calibrated using known standards or a calibration ruler.</p>\r\n </li>\r\n <li>\r\n <p>International standard length units must be used, such as 0.5 mm, 1.0 mm, 1.0 cm.</p>\r\n </li>\r\n</ul>\r\n\r\n<h4>Botanical terms or particular seed features must be labelled, where there is a need and appropriate.</h4>\r\n\r\n<h4>Copyright statement can be marked on the final version for publication.</h4>\r\n\r\n<p> </p>\r\n\r\n<table align="center" border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p>Image of false wild oat (<em>Avena sativa </em>mut. <em>fatuoid</em>) florets with standard grey background colour, appropriate scale, labelling of botanical terms, and copyright statement</p>\r\n   </td>\r\n   <td><img alt="" height="450" src="/ckfinder/userfiles/images/Avena_fatouid_05cnsh.jpg" width="299"></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h4>Image Size for Publication:</h4>\r\n\r\n<ul>\r\n <li>\r\n <p>It is recommended to save image files as .tif (preferred) or .jpg file formats.</p>\r\n </li>\r\n <li>\r\n <p>A recommended size of image no smaller than 2000 pixels in its longest dimension.</p>\r\n </li>\r\n <li>\r\n <p>Final images and their captions shall be uploaded to the “Author submission” page of ISMA website.</p>\r\n </li>\r\n</ul>\r\n\r\n<h4>HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4HEading4</h4>\r\n\r\n<blockquote>\r\n<p>blockquoteblockquoteblockquoteblockquoteblockquoteblockquoteblockquoteblockquoteblockquoteblockquoteblockquote</p>\r\n</blockquote>\r\n\r\n<ul>\r\n <li>dsdsddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</li>\r\n <li>dsdsd</li>\r\n <li>dsdsd</li>\r\n <li>dsdsds</li>\r\n <li>dsdsds</li>\r\n</ul>\r\n\r\n<p> </p>\r\n', '', 0, 'test2', 1, 1, 1, 'guide', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strest_contact`
--

CREATE TABLE IF NOT EXISTS `strest_contact` (
`id` int(11) NOT NULL,
  `contact_from_email` varchar(255) DEFAULT NULL,
  `address` longtext,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `marker_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strest_contact`
--

INSERT INTO `strest_contact` (`id`, `contact_from_email`, `address`, `phone`, `fax`, `latitude`, `longitude`, `marker_logo`) VALUES
(1, 'admin@idseed.org', '', '1212121212', '', '50.123', '112.123', 'http://www.kaizen2.ca.php72-38.lan3-1.websitetestlink.com/public/uploads/map_marker.png');

-- --------------------------------------------------------

--
-- Table structure for table `strest_home_block`
--

CREATE TABLE IF NOT EXISTS `strest_home_block` (
`id` int(11) NOT NULL,
  `title` text,
  `excerpt` longtext,
  `banner_url` varchar(255) DEFAULT NULL,
  `selected_page_link` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `home_block_photo` varchar(255) DEFAULT NULL,
  `button_type` tinyint(1) DEFAULT NULL,
  `page_link` varchar(255) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_home_block`
--

INSERT INTO `strest_home_block` (`id`, `title`, `excerpt`, `banner_url`, `selected_page_link`, `display_order`, `is_active`, `home_block_photo`, `button_type`, `page_link`, `external_url`, `button`) VALUES
(4, 'Publication Guide', 'Author resource center for guide, data protocols,  template and submission.', NULL, 'authors', 2, 1, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/home_block_pic2.jpg', 1, 'welcome_to_millennium_aviation', '', 'How to publish?'),
(5, 'Seed ID Guide', 'Virtual publication of seed images, ID fact sheets, ID digital keys ...\r\nISBN: 978-1-7753419-0-1', NULL, 'technical_committees', 1, 1, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/home_block_pic1.jpg', 2, 'welcome_to_millennium_aviation2', 'http://www.idseed.ca/', 'Launch The Tool'),
(8, 'Training Resources', 'Training resources and interactive tools for seed botany, morphology and identification', NULL, 'page_under_construction', 3, 1, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/home_block_pic3.jpg', 1, 'training_resources', '', 'Learn more'),
(9, 'Seed ID Forum', 'Peer support , consultation, inquiry, discussion and posting with invited ID Expert Panel', NULL, 'page_under_construction', 4, 1, 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/home_block_pic4.jpg', 1, 'seed_id_forum', '', 'Join us'),
(12, 'dfgsdf', 'sdfgdfsd dsfgdsdgs sdfgsdffgs dsfgs dgsd gf dsfg dfsg gdg gsedg sdfsdfg sdg sdfgdfsd dsfgdsdgs sd', NULL, 'about_isma', 1, 1, 'sdfgsd', 1, 'dfgsdf', '', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `strest_lumbsum`
--

CREATE TABLE IF NOT EXISTS `strest_lumbsum` (
`id` int(11) NOT NULL,
  `lumbsum_name` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_lumbsum`
--

INSERT INTO `strest_lumbsum` (`id`, `lumbsum_name`, `date`, `status`) VALUES
(30, 't4tr4et', '2019-04-30 14:07:49', 1),
(31, 'Test', '2019-05-01 09:46:10', 1),
(29, 'Nick', '2019-04-30 12:54:36', 1),
(32, 'sssssssss', '2019-05-01 09:53:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `strest_material`
--

CREATE TABLE IF NOT EXISTS `strest_material` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_material`
--

INSERT INTO `strest_material` (`id`, `material_name`, `spec_grade_id`, `shape_id`, `date`, `inches`, `metric`, `size`, `unit_weight`, `unit_cost`, `surface`, `labor`, `status`) VALUES
(2, 'ggg', 0, 34, '2019-05-16', 0, 0, '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `strest_membership`
--

CREATE TABLE IF NOT EXISTS `strest_membership` (
`id` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` float(12,2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_membership`
--

INSERT INTO `strest_membership` (`id`, `type`, `title`, `price`, `is_active`, `display_order`) VALUES
(1, 1, 'Student member', 50.00, 1, 1),
(2, 1, 'Regular Member', 100.00, 1, 2),
(3, 2, 'Silver Sponsor', 1000.00, 1, 1),
(4, 2, 'Gold Sponsor', 3000.00, 1, 2),
(8, 1, 'Corporate Member', 500.00, 1, 3),
(9, 2, 'Platinum Sponsor', 5000.00, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `strest_sessions`
--

CREATE TABLE IF NOT EXISTS `strest_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_sessions`
--

INSERT INTO `strest_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('00740b8e571ee0b058a8d759f4464b94fdce48ce', '103.211.20.137', 1541072030, '__ci_last_regenerate|i:1541071932;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('013152d08cc963985153ae2a6de4a3eff6cb10e1', '192.197.71.189', 1539383279, '__ci_last_regenerate|i:1539374441;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"29da0a42f13af0b2d2371e0319e3f256";'),
('014f59d89f4d79131777b7568a5502802ec82366', '115.187.32.24', 1556775438, '__ci_last_regenerate|i:1556718446;web_admin_user_name|s:6:"admin2";web_admin_user_id|s:1:"3";SITE_ID|i:1;user_level|s:1:"2";module|N;web_admin_logged_in|b:1;'),
('019567344de09e061f1a89caa2007d55cf8c986e', '168.68.129.127', 1537468218, '__ci_last_regenerate|i:1537398686;'),
('019fbe1155a24d0307c452660f5bac5157f47d96', '192.197.71.189', 1536936605, '__ci_last_regenerate|i:1536934539;'),
('01e4aa561f18919a724b1e4e6abcd09badb99149', '34.227.78.61', 1536763200, '__ci_last_regenerate|i:1536763199;'),
('0395ea12166e70947603cc337dcb4ff2062db9ea', '198.169.127.146', 1538508511, '__ci_last_regenerate|i:1538508511;'),
('054ace3e161468296b6f9470f66312f7643962d6', '198.169.127.146', 1532727865, '__ci_last_regenerate|i:1532727813;'),
('059d213e5b019369b03f832cc884d42f0d8ec5c4', '198.169.127.146', 1533052199, '__ci_last_regenerate|i:1533049271;'),
('0646fe34bfc9fb44d800555d9d7a4fbeeb496651', '192.197.71.189', 1539709328, '__ci_last_regenerate|i:1539707264;cart_id|s:32:"67727690c1d1603c6a77ecc1814b31d5";'),
('069f867b68c57f7c88aed738af19bc35d9adf651', '64.233.172.222', 1544635782, '__ci_last_regenerate|i:1544635782;cart_id|s:32:"aa8198ce30dd5c3e4b682ce4cd9eee0a";'),
('06d724df7a2dd54a5bc67741667d34e5905efa4c', '192.197.71.189', 1539613037, '__ci_last_regenerate|i:1539613026;cart_id|s:32:"c5aa5bd4706b553696d1fe1ad2865438";'),
('06de2542f7049270643c204d88dfbeaae5ee64b0', '198.169.127.146', 1539615465, '__ci_last_regenerate|i:1539615053;cart_id|s:32:"4c07231781c06660edf60d6c5ff994eb";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('06eb9fa63c636fb8b8ae5db8f0f38777bfc3b532', '198.169.127.146', 1532711700, '__ci_last_regenerate|i:1532711700;'),
('0731cfe1f313681bc42a249f49d6f45c84a31b1b', '198.169.127.146', 1539096751, '__ci_last_regenerate|i:1539096751;'),
('073bc6c563c79819ef99b7ee0e443e64509a90a3', '192.197.71.189', 1537994161, '__ci_last_regenerate|i:1537971338;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('073cf1bbdf16b9f692457d2908862f6c26327196', '198.169.127.146', 1537474567, '__ci_last_regenerate|i:1537472681;'),
('075a8f78b5dc599b8519773d27ac5547577fec2f', '52.207.53.149', 1534176171, '__ci_last_regenerate|i:1534176171;'),
('07d72252b7ce5960d5f8c768605b603ca8576ba0', '134.147.137.206', 1537974431, '__ci_last_regenerate|i:1537888242;'),
('08723d47bf84198437d3cb10dbdd46de3d0e4d16', '66.102.8.252', 1556716815, '__ci_last_regenerate|i:1556716814;cart_id|s:32:"4c8fbd736de51591df2a38f14bd4c11c";'),
('097d65287a91a9ced94968c7be33e3428bf9f157', '192.197.71.189', 1537200862, '__ci_last_regenerate|i:1537200862;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('09e82272b9a9f16f496af8078048b8ca77e2417c', '198.169.127.146', 1532975103, '__ci_last_regenerate|i:1532974758;'),
('09fe80a5d35f61664ececf8986c36a1d0f40cfd9', '64.233.172.222', 1547315583, '__ci_last_regenerate|i:1547315583;cart_id|s:32:"c61c4483e53979c675e9501db45dc00e";'),
('0a12ed4400985a048f1cc3b9c4acd3688c3bf2c5', '192.197.71.189', 1538776226, '__ci_last_regenerate|i:1538772867;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0a620ee8af1883e6b29386cdcb7c3e99379e0fe4', '64.233.172.30', 1543816527, '__ci_last_regenerate|i:1543816527;cart_id|s:32:"98565cc9eaa4c4a5be5fb4d4ae631d6e";'),
('0a67b067c3bdaff47f1cfae1c857092b6b9d4e39', '198.169.127.146', 1532979275, '__ci_last_regenerate|i:1532978951;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0a85aefa13976290d5cb921288d78427c4562dbd', '66.102.7.242', 1546707521, '__ci_last_regenerate|i:1546707521;cart_id|s:32:"f05519cf20ba536b98c061994249b4ce";'),
('0b0c6b196f9037650b531c443556fa41deb352bc', '198.169.127.146', 1534176100, '__ci_last_regenerate|i:1534175798;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0b1eb0119fdc466bda486b6ffb63373414fc1ade', '198.169.127.146', 1548351980, '__ci_last_regenerate|i:1548351970;cart_id|s:32:"beaf35bbbb62622e692f0a19bce4310d";'),
('0b324b5b578e796cfc08bd9b6418aecbc286ae04', '198.169.127.146', 1540226787, '__ci_last_regenerate|i:1540226769;cart_id|s:32:"34416049cb5cdbfab18b4fffdc16fb7d";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0b788865f57a22ba94c7b12871935be982fbe124', '192.197.71.189', 1537548640, '__ci_last_regenerate|i:1537546737;'),
('0c23d6cd6a5d38131ec663f1a7ee9c51617caa9e', '165.225.34.80', 1540838038, '__ci_last_regenerate|i:1540837959;cart_id|s:32:"3332a6996af1cced8262d8d4b3dd5d79";'),
('0c848af20696ee76272239e6d17be8667203aefe', '198.169.127.146', 1539960207, '__ci_last_regenerate|i:1539960126;cart_id|s:32:"cb6c83550d4638ca7f97cb166c8f0925";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0d94342cb19c9ea6902996536d8aacddeda0744d', '103.211.20.145', 1536941817, '__ci_last_regenerate|i:1536933424;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('0e2de3340c056b8d16c3c3da140368b28d836e41', '66.102.7.242', 1539613705, '__ci_last_regenerate|i:1539613705;cart_id|s:32:"3a08404c761ed963109188176944f835";'),
('0e31535ba14c1a7564ec77fd05932188d205c862', '192.197.71.189', 1544822901, '__ci_last_regenerate|i:1544803350;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"07da8ac8452389ab801557241c6b1ba2";'),
('0e3f5744767255409d8aabf0b7b979f57b3fbbb9', '116.206.222.239', 1539591153, '__ci_last_regenerate|i:1539591153;cart_id|s:32:"d07fef79b4e702832da35bda42355237";'),
('0f28f70b24bbf810573e5a9a8d54b467e4da2f3d', '198.169.127.146', 1536873368, '__ci_last_regenerate|i:1536852814;'),
('0f8bc987b3b1b0f445a423e61184027fdae9c14c', '198.169.127.146', 1538420819, '__ci_last_regenerate|i:1538420819;'),
('0fbdab46b206ce973ae4b0fe539c40203f11d5e6', '66.102.7.191', 1541021673, '__ci_last_regenerate|i:1541021673;cart_id|s:32:"e6655c57a3507a2f7549405b0b138414";'),
('10525400da8f371ff577e11795e8d5b19f5ce094', '192.197.71.189', 1538145954, '__ci_last_regenerate|i:1538145921;'),
('10dd56caad1d44cfb5a74d3386391d8cd7cdab26', '66.102.6.136', 1539918970, '__ci_last_regenerate|i:1539918970;cart_id|s:32:"07e03a9ec2675725b2ad995be34d736a";'),
('1202f07c925a7dbdc3daf17b3210db4a74e0f435', '192.197.71.189', 1536937922, '__ci_last_regenerate|i:1536877646;'),
('1277a52b16082e71a5310e4fa11438ead4329a6f', '198.169.127.146', 1537215632, '__ci_last_regenerate|i:1537215615;'),
('12cfac3f23c6ee2c0ac42a1991c8c4fa2a857abe', '103.211.20.130', 1536926460, '__ci_last_regenerate|i:1536909913;'),
('14001a14247679e22915434bd0a9ff830b982fe8', '198.169.127.146', 1532711153, '__ci_last_regenerate|i:1532702395;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('14ec7d23bcf621796280548983363710f22a6e99', '168.68.129.127', 1539102667, '__ci_last_regenerate|i:1539102667;'),
('15e691e3eec94e7598ae959b7479ee8f488a85d3', '192.197.71.189', 1539380567, '__ci_last_regenerate|i:1539379939;cart_id|s:32:"0c63b40a014ccd5fbb8d9bfbe8f176c0";'),
('1731610fc225706eef972bba088503d6188c3e0d', '192.197.71.189', 1538597635, '__ci_last_regenerate|i:1538577854;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('17989bab4a136b0f1339787333ed964099fdb7af', '198.169.127.146', 1541707365, '__ci_last_regenerate|i:1541707319;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"a28bceea8a3c3368c70a077cc1f1e2f6";'),
('17d5794fd021bfa7c3e322036bb7cb49df27d8eb', '54.92.200.197', 1538150770, '__ci_last_regenerate|i:1538150770;'),
('182465b9ab4cc4181b1c26f6577a3d2dbe34c377', '134.147.137.206', 1537262330, '__ci_last_regenerate|i:1537262302;'),
('187608b8b94d042b7bffd7acce8e59df7d544d31', '192.197.71.189', 1539384821, '__ci_last_regenerate|i:1539364487;cart_id|s:32:"870a7057acdeaa6dc6489c55d5aee461";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('18aedc65b9cbe3e745a4e84198a80543cd2382c9', '184.151.222.124', 1536954246, '__ci_last_regenerate|i:1536954246;'),
('18b69a050431e1fd69a85ef860ab0b664d03bdd7', '192.197.71.189', 1538758457, '__ci_last_regenerate|i:1538758200;'),
('18gjs4ho74qpmmnsr47f22u5i2a3dgra', '::1', 1556351739, '__ci_last_regenerate|i:1556285013;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('19020f6df6d276728a9009ea89383d1a4cded003', '192.197.71.189', 1537546032, '__ci_last_regenerate|i:1537481901;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('19195200a241842f8e1cf0af82302f881fd7d697', '103.211.20.128', 1537456385, '__ci_last_regenerate|i:1537433120;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('1956b12ecfec0cc3c293d98289b8ce29cc22bfc8', '66.249.83.212', 1544803387, '__ci_last_regenerate|i:1544803387;cart_id|s:32:"13cc548434122c53676ac9f76663858a";'),
('19a1751c547450c0c6628414a3fb91354179c395', '64.233.172.222', 1545064451, '__ci_last_regenerate|i:1545064451;cart_id|s:32:"ba047b91c1704ed80fd9df9f76d791af";'),
('1a2eb53aebd9d0fd77deda4d8697dd92d27bfabd', '198.169.127.146', 1533916158, '__ci_last_regenerate|i:1533836290;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('1b49513e534d789fb301715407f45f89e75e9250', '198.169.127.146', 1533309755, '__ci_last_regenerate|i:1533309749;'),
('1cfd54efbb11d23535e151140429826d55b6ae7a', '192.197.71.189', 1537393312, '__ci_last_regenerate|i:1537393183;'),
('1d66f64b4404c4319d7491e8a177e26295d83e19', '198.169.127.146', 1532970876, '__ci_last_regenerate|i:1532970876;'),
('1dad727183e4dfdf089531558faee26fe18b2164', '198.169.127.146', 1532728764, '__ci_last_regenerate|i:1532727872;'),
('1e16234d33b37431b2198ab08734b692d0a8e398', '192.197.71.189', 1537972859, '__ci_last_regenerate|i:1537972028;'),
('1e8e3f70b9d00eb6e45f7bf4466ce7d7cc32e0b0', '168.68.129.127', 1538604478, '__ci_last_regenerate|i:1538604153;'),
('1fb36548c4c7b4301c5071b3618d56929f36503c', '66.102.7.240', 1539560734, '__ci_last_regenerate|i:1539560734;cart_id|s:32:"acdc5006d55d11424d13587a02e1b661";'),
('206eb5922436250d3401448858b76f4bcc813988', '192.197.71.189', 1539114441, '__ci_last_regenerate|i:1539095874;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('21001be98faf82f504d4ea88b9f1f43a1f3f9551', '192.197.71.189', 1539199710, '__ci_last_regenerate|i:1539191594;cart_id|s:32:"4c25d36e93245d713449d69e1e29b31e";'),
('21216afb358246e4e6d8a3f85215205276412478', '103.211.20.132', 1539181306, '__ci_last_regenerate|i:1539161407;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"4a32eb1dfae5149140b13c8da16d10e6";'),
('217c746613b91f1174b11806f123f31775417247', '192.197.71.189', 1536877549, '__ci_last_regenerate|i:1536877540;'),
('21e3aa7320d66a9696b8a4d1122d19f0471451b0', '64.233.172.159', 1541257538, '__ci_last_regenerate|i:1541257538;cart_id|s:32:"7c87c8aec034c064ecd24c6a48a28586";'),
('22463c02d2cef8c224e358f6b516dcdf81e7bc00', '198.169.127.146', 1539793698, '__ci_last_regenerate|i:1539707551;cart_id|s:32:"e3ac02d674f6d769c7074cd22062f651";'),
('22c52a079c68fdb7ac2519b1c412c1cac5a92211', '198.169.127.146', 1536684802, '__ci_last_regenerate|i:1536674255;'),
('22d8d4460b81db3a27aea035101d1d96e490d5db', '199.128.222.121', 1539700486, '__ci_last_regenerate|i:1539700466;cart_id|s:32:"855a15cc2ecf283dc359cfe7e83859c9";'),
('23ad0d1269dc0dae6a8228b9cc040ba018abf392', '35.153.231.18', 1533157713, '__ci_last_regenerate|i:1533157713;'),
('23f91a4d0d52d86885f8115edcf02c3724552500', '103.211.20.136', 1536756828, '__ci_last_regenerate|i:1536756828;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('240347ff3b285efe9318b268fdf3f0fabee40250', '70.64.18.54', 1538961985, '__ci_last_regenerate|i:1538927696;'),
('24183835811e9e8662aec0e5aea5f91e8f0d3435', '192.197.71.189', 1537287010, '__ci_last_regenerate|i:1537200862;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('24cbf59863eadf9fdd7f1dbccaee6bd099c16374', '198.169.127.146', 1536952763, '__ci_last_regenerate|i:1536952763;'),
('24ceb9b4f7022b6798f72c16df7ae668a57a1b8f', '198.169.127.146', 1532728638, '__ci_last_regenerate|i:1532711237;'),
('252b811d3c78d514c1fc3cdca6d46effc68bff59', '192.197.71.189', 1538772037, '__ci_last_regenerate|i:1538772037;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('25a15a8306d9801d76916d6d800a238dc0c4af3f', '198.169.127.146', 1536954531, '__ci_last_regenerate|i:1536954531;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('2638b7be632a434a17c4a75f9f531089f3470a1e', '66.249.83.214', 1543525550, '__ci_last_regenerate|i:1543525550;cart_id|s:32:"213693af075807e2d5b157ae4c4617bc";'),
('26c61ccd8ed14f691c29cdef5c02d5aaa9ecf636', '116.206.222.163', 1537186698, '__ci_last_regenerate|i:1537186698;'),
('2723c634fa849083be996f6648141b5ddae88396', '54.152.0.39', 1538410169, '__ci_last_regenerate|i:1538410169;'),
('27c57b16948332dbefd65b55aa75b2a20187bffe', '96.50.193.72', 1540855147, '__ci_last_regenerate|i:1540855147;cart_id|s:32:"481656b9ee4410c78c72e8c2123a97c0";'),
('27feb8a416d213ac9dd765b2e4ca6c5a87c78d1a', '198.169.127.146', 1532974688, '__ci_last_regenerate|i:1532974687;'),
('28c5459b5006d5b05fdcacb155006518836da238', '35.174.5.108', 1536874647, '__ci_last_regenerate|i:1536874647;'),
('297782f39eab4e75f9ec1bcf172a0946c397c9c1', '198.169.127.146', 1533146844, '__ci_last_regenerate|i:1533146662;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('2aadecc1813ff8c6b700240b45fac0689b5c3fb8', '192.197.71.189', 1536853489, '__ci_last_regenerate|i:1536780004;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('2afcdb57696d9b47f392def5a0a79dd90b750491', '192.197.71.189', 1538170584, '__ci_last_regenerate|i:1538150269;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('2ba9102d4cf57738b1ad5c242fb3f104ecf28c64', '96.50.193.72', 1541008879, '__ci_last_regenerate|i:1541008879;cart_id|s:32:"0d5be3814d8825dd15776f20b9d13a46";'),
('2cbcd6365c1202ca4ceb33e3f4211d57d6da8df4', '198.169.127.146', 1533313951, '__ci_last_regenerate|i:1533311150;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('2ccf4eb246b4f43f5196594e93037dbe9847ea7a', '66.102.7.244', 1539387712, '__ci_last_regenerate|i:1539387712;cart_id|s:32:"80f810a461765727ba139895bbf1cb66";'),
('2d12d383c8a2a31eeef987ffc718eb58bdb3c0f3', '::1', 1532556092, '__ci_last_regenerate|i:1532556092;'),
('2dd8813ab6f5d5cf607fc49c4988941c831c25e2', '198.169.127.146', 1536763276, '__ci_last_regenerate|i:1536762659;'),
('2dedfd52c0bfa6b3d20b2b193b894ff9dc46c277', '199.128.222.121', 1540856245, '__ci_last_regenerate|i:1540856245;cart_id|s:32:"a7fb619ae3aeaa5693aede920e204684";'),
('2dee5f006d7556a8890ac70973d5b82b9ce0dbdf', '64.233.172.193', 1544761641, '__ci_last_regenerate|i:1544761641;cart_id|s:32:"b36ac18676e99365774b2b7dd44ad78f";'),
('2eec9a44003ab7c8bc8e1fad2b261ec1c3950b9e', '198.169.127.146', 1532990085, '__ci_last_regenerate|i:1532975110;'),
('2f994a8eea2b719d5550e7d02d1e8da6550f8542', '150.129.100.120', 1536733050, '__ci_last_regenerate|i:1536729086;'),
('304985f63890cd4602349611934dbf594a8eed37', '66.249.83.214', 1542649458, '__ci_last_regenerate|i:1542649458;cart_id|s:32:"9dec91cd51bcf7cdf7de30e5d479ecfd";'),
('31d4ca88cf45c648e0f360581273776da01e9bdb', '66.249.83.212', 1541437872, '__ci_last_regenerate|i:1541437872;cart_id|s:32:"8e43818d290227350721a4760f76f0b4";'),
('3230f9e3bf9b8802f6f573fea964406b6169a5c8', '192.197.71.189', 1537884827, '__ci_last_regenerate|i:1537884700;'),
('32664889b19c58c9833cf72ca6f39cb1fb242192', '::1', 1532645793, '__ci_last_regenerate|i:1532640226;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('32810519656bf87ed90a5e6016e89cb013a6fa18', '192.197.71.189', 1538506703, '__ci_last_regenerate|i:1538506703;'),
('33038f4a22e662d93512b924fc2446d53eb3e718', '64.233.172.30', 1543010992, '__ci_last_regenerate|i:1543010991;cart_id|s:32:"26dbb01d7e96f766806289a615e1da99";'),
('33712ce673d58afb5520a154e72c72e2c7e93acc', '66.249.83.216', 1544457320, '__ci_last_regenerate|i:1544457320;cart_id|s:32:"191733cd8f2d89eba526c19a956c80a8";'),
('339a7b91f461b9627ea0fd5ea50c2299163639a1', '198.169.127.146', 1532975304, '__ci_last_regenerate|i:1532975303;'),
('35453a5a0291339e104732f6c0692b3e8e5ba0ee', '198.169.127.146', 1538169986, '__ci_last_regenerate|i:1538146720;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('36661c3450eb17e25481310fa15b5fb69e058f4f', '198.169.127.146', 1536791316, '__ci_last_regenerate|i:1536763177;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('36ae84e65ae10b7103dbbf3157e37bf95fb043c2', '64.233.172.220', 1541873714, '__ci_last_regenerate|i:1541873714;cart_id|s:32:"a8e7ba9e4c73f46b29a1bd775677d5ee";'),
('37936c598e822cdd3e1f98c5e63d3b1f0e0d87e9', '64.233.172.220', 1541607671, '__ci_last_regenerate|i:1541607670;cart_id|s:32:"34910171e2c710e03758e9e5b8e4590f";'),
('3847b9f741e84fb22705679059756efd8705d6d1', '103.211.20.131', 1536902999, '__ci_last_regenerate|i:1536850716;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('38a86b7b9220f5e7c53154efc3d84897b8c77a72', '66.249.83.214', 1542919272, '__ci_last_regenerate|i:1542919272;cart_id|s:32:"2a2e10926a5e92c7d098ac5c2c18fbc2";'),
('38bd549748328ec6f3304abcdda25fdc99c3dbf3', '66.102.7.223', 1540052091, '__ci_last_regenerate|i:1540052091;cart_id|s:32:"5a68a78e78c197bed8b6e8488917b3e4";'),
('39d8af6de122cc55638c5e48882f9d3f53262928', '64.233.172.220', 1544475147, '__ci_last_regenerate|i:1544475147;cart_id|s:32:"6cb70f305a4f072a48c7b9265a7407e7";'),
('3a693508e9f5931f896ccfe03559c4707d301ebc', '64.233.172.222', 1542214045, '__ci_last_regenerate|i:1542214044;cart_id|s:32:"0b067aa34aac6159dd12a9673457858a";'),
('3aae82f52285aa0741287e9d48139b1fbae30dc2', '198.169.127.146', 1532979322, '__ci_last_regenerate|i:1532979310;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('3atsqdq82r1giampjaagjn2b6mg004t0', '127.0.0.1', 1556709863, '__ci_last_regenerate|i:1556709852;web_admin_user_name|s:5:"super";web_admin_user_id|s:1:"1";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('3beaf3e0a9db8e6fa2a8c29fbb93dcfb97cfe04a', '198.169.127.146', 1532975421, '__ci_last_regenerate|i:1532975421;'),
('3c9fcf47cd6313bd1b25210175b317251c25719f', '199.128.222.121', 1537474354, '__ci_last_regenerate|i:1537449577;'),
('3cde67064646a39944fc88cb6e7f785c81e3a5c6', '134.147.137.206', 1537974870, '__ci_last_regenerate|i:1537974856;'),
('3d0035fb3ed7b8a254af8848888999acd045d5d9', '199.128.222.121', 1537962636, '__ci_last_regenerate|i:1537962485;'),
('3d82c6265458a807a019f77a001b8416aa92d2c9', '192.197.71.189', 1544825449, '__ci_last_regenerate|i:1544807386;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"fb7c9f076212e0d6ace7bb186f1dcda7";'),
('3dddad243400e4ea3d04254938015a78d3bc5315', '64.233.172.222', 1544027015, '__ci_last_regenerate|i:1544027015;cart_id|s:32:"0c42e477d7dfcc9e1b9e9c7b64801eb1";'),
('3de0b0d4d8e6b3519ea10f5dc1513cee2cd7a508', '66.249.83.212', 1544022252, '__ci_last_regenerate|i:1544022252;cart_id|s:32:"8396b16e7ac980c864cb84a383093d16";'),
('3ecd17f2eceae39f9cf5c6199438dded1e5586f7', '198.169.127.146', 1532972683, '__ci_last_regenerate|i:1532972683;'),
('3f072638ae613aa3e2ab72b7eb6c871400636fb7', '18.212.134.184', 1543431113, '__ci_last_regenerate|i:1543431113;cart_id|s:32:"a19766dcfe7855759465359913803328";'),
('3fb3f2500356db567b3db4044f7bba623763967e', '198.169.127.146', 1532978748, '__ci_last_regenerate|i:1532978657;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('3fbe728698a702e749623ca6d0b3d52516ba3243', '192.197.71.189', 1536851580, '__ci_last_regenerate|i:1536851580;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('3fc7b1f9dbc1fe6720b50945cceebc3f6292615a', '64.233.172.222', 1547092531, '__ci_last_regenerate|i:1547092531;cart_id|s:32:"b08949b431d26c88884af6c66f9e0617";'),
('42335df4577d502f7e023c648825bdd30aad050f', '168.68.129.127', 1539269147, '__ci_last_regenerate|i:1539214074;cart_id|s:32:"96b0b5b4b0d7ec12e69a04fab70b4bb5";'),
('42a4885766a1d3ea4f3b85caac9f4b341a8fb238', '157.40.120.131', 1538390140, '__ci_last_regenerate|i:1538389363;'),
('42b361b2266bb50f1685aaf0b0b0efe267a796f9', '198.169.127.146', 1537218269, '__ci_last_regenerate|i:1537218224;'),
('42b9d812f71e056b43acc6da3e6c9855784ca30f', '203.171.247.104', 1536933029, '__ci_last_regenerate|i:1536903277;'),
('43aad2ee0d59df96c26a5b54f4f85f1e133a6cd1', '66.102.7.222', 1539882248, '__ci_last_regenerate|i:1539882248;cart_id|s:32:"09776a2397ae9af9fde82c99dc676dd1";'),
('43aee6232c4bec4d7d35016ae87264e6e5da2d0c', '204.193.183.150', 1539111781, '__ci_last_regenerate|i:1539111781;'),
('4452bb232e1a1a84cfb0c5549b69d92a6cc4d9f9', '70.64.18.54', 1538524505, '__ci_last_regenerate|i:1538524497;'),
('450bf16778ffd4b58c37538acea007448e94230e', '204.193.183.150', 1539102278, '__ci_last_regenerate|i:1539102278;'),
('45233272af9947b91473cf6229cb1fa86d55b4b8', '198.169.127.146', 1533146814, '__ci_last_regenerate|i:1533146784;'),
('458a2d55268cc6e09f0d512ed11009deb7d1e683', '192.197.71.189', 1540317991, '__ci_last_regenerate|i:1540317991;cart_id|s:32:"d8d4ff7ee52d85423306239c8ab6fdce";'),
('484425def9333b0915e542a95dfc5c8f06e47166', '34.226.200.251', 1538410179, '__ci_last_regenerate|i:1538410179;'),
('485e6316058d6a835e38948803112d5e838ec42d', '198.169.127.146', 1538583659, '__ci_last_regenerate|i:1538583659;'),
('48a057de885ad6d9a7b568410cae53039f4cb47b', '198.169.127.146', 1533679014, '__ci_last_regenerate|i:1533679014;'),
('48b30be232966c160e11243d1319647b49919da8', '54.92.200.197', 1536933039, '__ci_last_regenerate|i:1536933038;'),
('48be229848956812121fe8351fb83235be13d7ab', '192.197.71.189', 1539209985, '__ci_last_regenerate|i:1539184010;cart_id|s:32:"b30a9dfa882b350d2c6a1e80e2c7c95e";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('4a7a00abe71c1c69f13895cc8ca34b052e9faa96', '192.197.71.189', 1539381411, '__ci_last_regenerate|i:1539375772;cart_id|s:32:"97a2c8c5e0ddb7a1ef2805506179efd3";'),
('4aa51de1ed761336394a22024cd0af0c5e3c9d37', '66.249.83.212', 1542316153, '__ci_last_regenerate|i:1542316153;cart_id|s:32:"4d55d62fcab7e32f15018efa0c72b417";'),
('4b30b78bcb3c9f679074f6dade603ddae92214d9', '150.107.177.103', 1534778148, '__ci_last_regenerate|i:1534767741;'),
('4b609bf455c1129d34aac052bfbc60758f395efa', '198.169.127.146', 1532728373, '__ci_last_regenerate|i:1532728373;'),
('4b82a7d8fe22964665850b864b07e31abe971de0', '198.169.127.146', 1539796020, '__ci_last_regenerate|i:1539796015;cart_id|s:32:"46a820ea528176d0ddd931d2fd0ddba0";'),
('4c53f1184b5883e684afdda0b4f442ca3fd3be1f', '198.169.127.146', 1548176416, '__ci_last_regenerate|i:1548176357;cart_id|s:32:"1b6a315c43b7f9cda40522b7fd2b4549";'),
('4cad226f92e552eea05bcd01c3de858327b5066f', '103.211.20.139', 1534158244, '__ci_last_regenerate|i:1534150178;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('4e324eb86c789543e61892317f7d6ccb46e70da8', '103.211.20.128', 1536850640, '__ci_last_regenerate|i:1536850639;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('4f279c70f19ed243bd937134c85a0e9d72016a02', '198.169.127.146', 1533679872, '__ci_last_regenerate|i:1533678989;web_admin_user_name|s:7:"tdesale";web_admin_user_id|s:1:"8";SITE_ID|i:1;user_level|s:1:"2";module|N;web_admin_logged_in|b:1;'),
('50db8be6e24d3fce99c06dd11bd56755c0fde3ac', '192.197.71.189', 1539374441, '__ci_last_regenerate|i:1539374441;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"29da0a42f13af0b2d2371e0319e3f256";'),
('515f7ce79e3ff70996a8fd3f80a0ea9acf2b71dc', '103.211.20.128', 1536757918, '__ci_last_regenerate|i:1536757910;'),
('52f23565cc1a4b5812a2cdf56359e57d81b3bc51', '192.197.71.189', 1538580731, '__ci_last_regenerate|i:1538578538;'),
('534b2dd56e4b95b091044768ae790a4075046c1e', '198.169.127.146', 1532972683, '__ci_last_regenerate|i:1532972683;'),
('54e542c2617795959ae4499f146900ef12aba14d', '198.169.127.146', 1537545248, '__ci_last_regenerate|i:1537481528;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('554abccbcd2a54e2019bef745e7771e40b3c8130', '64.233.172.220', 1544805504, '__ci_last_regenerate|i:1544805504;cart_id|s:32:"161c9e004a2f0897eb4dd10189846d01";'),
('55b50408dc094b36da83ca7e9ea7d6d0d7ee18e3', '66.102.7.191', 1540775797, '__ci_last_regenerate|i:1540775796;cart_id|s:32:"b65062b44a0472f97133fa185a5ddabb";'),
('56809f90ec333756f772b409bb4bc6cb49d9c586', '198.169.127.146', 1536591004, '__ci_last_regenerate|i:1536591004;'),
('568bfd30369f7292a97d858d37df2a38b448c12f', '192.197.71.189', 1545162785, '__ci_last_regenerate|i:1545152683;cart_id|s:32:"417cbdb11b1292756a0a4acb89203df2";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('56d604d9596b39a832aa2231e747261c19a9468d', '103.211.20.132', 1539161407, '__ci_last_regenerate|i:1539161407;'),
('587512bbe3f75c13fd404358850bdc746111ba92', '64.233.172.159', 1540911266, '__ci_last_regenerate|i:1540911266;cart_id|s:32:"e40407a9c67844c61ac537c512504a99";'),
('590ff92f4cf9d6409906d00f85b06284553ddb02', '::1', 1532621218, '__ci_last_regenerate|i:1532621218;'),
('5936fd56cd2190ba8e916f62043f9dbd84e2b702', '192.197.71.189', 1545164845, '__ci_last_regenerate|i:1545164845;cart_id|s:32:"f03bd4880de1e32e5cfb2385a0a9194e";'),
('59624e6e46476bb0fddab42bca76c6892cb71ca6', '198.169.127.146', 1539367031, '__ci_last_regenerate|i:1539357804;cart_id|s:32:"2afb38145934c59549b4476fa3876052";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('5a80e12fa38456b17fe468fa6773f6a6209bb8b5', '192.197.71.189', 1538772867, '__ci_last_regenerate|i:1538772867;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('5b6f959d627955e43e5f7e60fda9ec2c9c5e8ad5', '192.197.71.189', 1536778462, '__ci_last_regenerate|i:1536778204;'),
('5b99ec0d479aadfeac16ea03bac8d0ce22d4f600', '198.169.127.146', 1548778610, '__ci_last_regenerate|i:1548778610;cart_id|s:32:"67194fbf7b85ee07d5cf5b5a47a3e404";'),
('5c1d3c0feaa40584636ceb92e48eaeb74879f477', '192.197.71.189', 1537548690, '__ci_last_regenerate|i:1537548690;'),
('5cfe0fec5d8833a45aa83e0ff2ff90af056f45a8', '54.92.200.197', 1536746355, '__ci_last_regenerate|i:1536746355;'),
('5dc47d3c977b81d85af21af57319cdb2f01cee74', '103.211.20.143', 1537939497, '__ci_last_regenerate|i:1537859131;'),
('5dd62e8ef033fbb6068d670474f0f05289b3b0d3', '115.187.32.24', 1556723591, '__ci_last_regenerate|i:1556718197;web_admin_user_name|s:5:"super";web_admin_user_id|s:1:"1";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('5ece00646679f7927065301aa6ea2d79b1f6c781', '66.102.7.160', 1541316856, '__ci_last_regenerate|i:1541316856;cart_id|s:32:"23406054aa938e3a686829d47574d2f1";');
INSERT INTO `strest_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5f344c85881208539d570e5a8e173bf77aa4cbca', '198.169.127.146', 1537481528, '__ci_last_regenerate|i:1537481528;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('606d05d3d10292745dce0b1aca02f8fad563006f', '203.171.247.193', 1537768972, '__ci_last_regenerate|i:1537767354;'),
('60bd5ec9bb92a581b35de96302cc3c0cadf0c231', '198.169.127.146', 1535052410, '__ci_last_regenerate|i:1535052382;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('61a373a78d9ececb3c27e56e1769861bd324979f', '103.211.20.144', 1539414316, '__ci_last_regenerate|i:1539414316;cart_id|s:32:"278984117b171743d5593f390221f1a6";'),
('62226f7fc4b3ca57696ee4401997e56d1df62473', '198.169.127.146', 1536954069, '__ci_last_regenerate|i:1536873695;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('62f931d23d206756f79799d926c94852920ae3c4', '198.169.127.146', 1532712907, '__ci_last_regenerate|i:1532712907;'),
('63d531601a5445942f01aabb23c4f107865d80f0', '192.197.71.189', 1536953892, '__ci_last_regenerate|i:1536953412;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('63f71a2bc64824ec73be3d6e4218241a8733dc71', '35.153.231.18', 1532970730, '__ci_last_regenerate|i:1532970730;'),
('654d6696d49402941e34cb106a25d0e9b32c3210', '199.128.222.120', 1539282615, '__ci_last_regenerate|i:1539271815;cart_id|s:32:"031109821c89e2d6bcee798adafc5288";'),
('65d94cfe14892b02d0e46a7f10e080e23014e23c', '198.169.127.146', 1536702715, '__ci_last_regenerate|i:1536693940;'),
('662bdad30c1d8113bb5594b70766ea2e9de5b13f', '198.169.127.146', 1539097111, '__ci_last_regenerate|i:1539096751;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('66a2798a2759e8281bb5606745b1d460c45852ad', '70.64.32.181', 1550201853, '__ci_last_regenerate|i:1550200404;cart_id|s:32:"a95f5f8c8ec8f38e86e1226bde405f00";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('66fe96909b53e784dc923cfbda92b22fbcc29c07', '198.169.127.146', 1532716525, '__ci_last_regenerate|i:1532716525;'),
('6732cb0c3e1490475a471b6beb6e0baa7aa92e55', '198.169.127.146', 1538151703, '__ci_last_regenerate|i:1538151703;'),
('68a2fb1433e13862a9bcb37aef0909cf231e2f8d', '103.211.20.141', 1537420288, '__ci_last_regenerate|i:1537335293;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('690dd72aa723f3aa54d1e865d25e6f2e6be5f594', '192.197.71.189', 1538165741, '__ci_last_regenerate|i:1538154785;'),
('694c6cfe43e59a8ed158157d91cb93c420da85cb', '64.233.172.156', 1541016239, '__ci_last_regenerate|i:1541016239;cart_id|s:32:"68862a1a6171731cf1f785888fe26db5";'),
('698a54010b04ecfd0a51b4e8d6987fba10a1061c', '64.233.172.222', 1545410191, '__ci_last_regenerate|i:1545410191;cart_id|s:32:"5229960e9df9bac521e52e58f67601f0";'),
('6ae478516df5516f6931ecf786aa3a589894c1b4', '168.68.129.127', 1537536243, '__ci_last_regenerate|i:1537535901;'),
('6b82ceefeb77b116a7daeea4039e9b66eebd8832', '198.169.127.146', 1532703063, '__ci_last_regenerate|i:1532703063;'),
('6b99aa6d2ac5bb46f9b67297fea7c3d1a7b0fea9', '198.169.127.146', 1538420519, '__ci_last_regenerate|i:1538420519;'),
('6cb48a94e756315cfe004de1595a9709d0abcb0f', '54.174.23.4', 1537472668, '__ci_last_regenerate|i:1537472668;'),
('6d73de14395cc68e56c7c740ca87c029defb8a06', '38.64.150.3', 1537301239, '__ci_last_regenerate|i:1537215071;'),
('6d9e63ef2080d150b820cf26ba2ba2b22b91e2b6', '103.211.20.143', 1538577787, '__ci_last_regenerate|i:1538577787;'),
('6de5f02f5ed742067e331638db4af1077ddbf527', '168.68.129.127', 1537806897, '__ci_last_regenerate|i:1537806897;'),
('6e782078c061b7388b1f25e60b1c2da54b43cae5', '64.233.172.193', 1542091583, '__ci_last_regenerate|i:1542091582;cart_id|s:32:"5a2bc370aac81d6c2c89ff2bfbb706b2";'),
('70cddf588e5cec4ceb3c196b896885dfd87183ad', '66.102.7.244', 1541527618, '__ci_last_regenerate|i:1541527618;cart_id|s:32:"c90c55cd1df6fdae11ed773941f8b1c3";'),
('70e0fadb8961eccf3738f34065dc5f9aabd06257', '157.40.117.198', 1538390222, '__ci_last_regenerate|i:1538390222;'),
('71245c1c4570cb9e4457943ae477470e4147f5c7', '64.233.172.220', 1541782740, '__ci_last_regenerate|i:1541782740;cart_id|s:32:"511258c53b92b7a67d9de24764594a16";'),
('713e508a650d90eedbada5cf1ab158c6dc7f14c9', '103.211.20.133', 1556724259, '__ci_last_regenerate|i:1556723466;web_admin_user_name|s:5:"super";web_admin_user_id|s:1:"1";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('71875c9b565b5c81fcb753ce2a0b6b1c41cd7c52', '198.169.127.146', 1533742665, '__ci_last_regenerate|i:1533742574;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('71b867dc65dbfa964b772422d1f72b30a9b79b92', '203.171.247.234', 1539407217, '__ci_last_regenerate|i:1539321497;cart_id|s:32:"2fab8f76f661c52eda49140394b482e6";'),
('71ba779c950b7392a156415c5173fae7e04e08d2', '103.211.20.128', 1536846819, '__ci_last_regenerate|i:1536846819;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('722c8e6af29fd6bc6820a02b45a33ecc10c54da6', '103.211.20.131', 1536933424, '__ci_last_regenerate|i:1536933424;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('725927cfb44eb74d42b7f85907ff44a31304e90d', '198.169.127.146', 1532979733, '__ci_last_regenerate|i:1532979730;'),
('7425a56b533cb53d85007871725e7445f4bc5ad7', '64.233.172.156', 1540501827, '__ci_last_regenerate|i:1540501827;cart_id|s:32:"c4b9ec51176a6f3c6102343f5ae39c72";'),
('74c6c4a309a29a84b0cba1f9cdb66cee43f72ff7', '198.169.127.146', 1533749790, '__ci_last_regenerate|i:1533680217;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('74cbacd842b17008bd8f3401a24148a99f5c1010', '192.197.71.189', 1539209209, '__ci_last_regenerate|i:1539209209;'),
('75281cc5d23a5cbcef64c58822ab750aafeecd10', '198.169.127.146', 1549315644, '__ci_last_regenerate|i:1549313430;cart_id|s:32:"f6ac1089ec9d9ceb162d55cb988f175b";'),
('757809f787f66a5280cb82c3f87f558c42099a4a', '192.197.71.189', 1537384011, '__ci_last_regenerate|i:1537384011;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('75b2e5a881d843471364ba76fd41d406bfa95044', '103.211.20.131', 1537864080, '__ci_last_regenerate|i:1537779638;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('75c19e8fc6c8114e1f583896163e675f777c5365', '198.169.127.146', 1532970877, '__ci_last_regenerate|i:1532970877;'),
('76336b930c11a3854157c46044f89ebbca6db3b2', '199.128.222.121', 1538661471, '__ci_last_regenerate|i:1538660381;'),
('76a0896cede50ac5fddd1ee39e7337f754abebd8', '198.169.127.146', 1532729995, '__ci_last_regenerate|i:1532706782;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('76a1ed1578155037753da43861e566a67feac11f', '198.169.127.146', 1533158376, '__ci_last_regenerate|i:1533157642;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('76acb15ba66dd14b166207e18e7c13533cd59f01', '103.211.20.133', 1556724722, '__ci_last_regenerate|i:1556724186;cart_id|s:32:"10e56552f58253a706bc54d7330e4ffb";'),
('77011ce577989af250e5d004cfad1eb6dcea5438', '42.110.130.16', 1533186302, '__ci_last_regenerate|i:1533186302;'),
('776b5cc111799f1da8af02d70d3e19d6df24ca11', '103.211.20.132', 1539335358, '__ci_last_regenerate|i:1539335358;cart_id|s:32:"f88421c741faf88a5815139d29c8e057";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('777f952d94110ab6cb3198bd99a295962d759572', '192.197.71.189', 1545167084, '__ci_last_regenerate|i:1545164422;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"25d1b46b84913af2260941b20538f7f6";'),
('77f77a81971f0ddfb542b9ba40b1cae03e96d784', '52.207.53.149', 1534176171, '__ci_last_regenerate|i:1534176171;'),
('7a4e440084f5292c66136fddefd7899cbc5dc553', '192.197.71.189', 1536966865, '__ci_last_regenerate|i:1536943832;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('7a9c5aca15452340f91a3dfd39cf6a887b995cf3', '66.249.83.216', 1545662940, '__ci_last_regenerate|i:1545662940;cart_id|s:32:"e30dd7022f6f2e95250647574d815094";'),
('7afb85482f0e77db2d7ac6e719f795e1ac861b50', '198.169.127.146', 1533309815, '__ci_last_regenerate|i:1533309815;'),
('7b2fc36ad90ca61ac48a3766f109279073984829', '192.197.71.189', 1538496032, '__ci_last_regenerate|i:1538495748;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('7bc18a4ef4a9747998f3139cda1dc54c73a29fd8', '192.197.71.189', 1539182608, '__ci_last_regenerate|i:1539100444;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"0cc6ce663ccae93c8a60fb9b76b7d15e";'),
('7dfe8c95a1c50f6a72d65a663dd8160bde00832e', '192.197.71.189', 1539294483, '__ci_last_regenerate|i:1539288562;cart_id|s:32:"2c47bc20e5bd6c9f6a6deb459e9cd50b";'),
('7eb74d9829b386bd4aa522348057903cd8229ebe', '198.169.127.146', 1532971900, '__ci_last_regenerate|i:1532970862;'),
('7ef528312382b5408616d767bf3857b0053d0fe5', '198.169.127.146', 1532715947, '__ci_last_regenerate|i:1532713074;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('7f05df49e96165a268e32f2a130fa77bd8652410', '192.197.71.189', 1538776206, '__ci_last_regenerate|i:1538772037;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('7f6d90ce839bca5d8b08136c4301c046f7320cc5', '192.197.71.189', 1537891470, '__ci_last_regenerate|i:1537828557;'),
('7fe1659d817ae5956ad2993f5d348bcac0b25a88', '192.197.71.189', 1536877507, '__ci_last_regenerate|i:1536857300;'),
('802fcff5b6b492e77d9c63c11b3e05e6b4265cb4', '168.68.129.127', 1538673006, '__ci_last_regenerate|i:1538670225;'),
('805b4a197e8450223ac83251b4016058748e388f', '192.197.71.189', 1540916163, '__ci_last_regenerate|i:1540916163;cart_id|s:32:"8fa7d3b5a3fd429c1dcb39b979b25666";'),
('810bbc2a327541f7199ec1c7b28bec5408112624', '168.68.129.127', 1539385953, '__ci_last_regenerate|i:1539372796;cart_id|s:32:"1838031017f4f7e8798e3a5f62ef8934";'),
('818997488d46770f01a72ce2ca972d1b6753537d', '54.92.200.197', 1533146700, '__ci_last_regenerate|i:1533146700;'),
('81ad34ff568550c3ee50ef84280e3b83901dcbc8', '103.211.20.130', 1536915647, '__ci_last_regenerate|i:1536908842;'),
('81c66bf22b062e8801e748adcbe2fa6435dde3b5', '150.107.177.103', 1534436302, '__ci_last_regenerate|i:1534429555;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('81d59f48727f41d7bdf0cfc04e81f9cd767f40f3', '103.211.20.128', 1537457394, '__ci_last_regenerate|i:1537434042;'),
('820b265d014622bb5c9db23860efb34ec297666a', '66.102.7.17', 1543044059, '__ci_last_regenerate|i:1543044059;cart_id|s:32:"11632ebaafc232c7a786541b24f3e817";'),
('82dddc46185749613a4522615e57cf76702b8da7', '64.233.172.220', 1545020457, '__ci_last_regenerate|i:1545020456;cart_id|s:32:"6a68ec31f189d973cd13df471a744a0c";'),
('83101360a33cb6e9312f2b7a133418ebef2bcb20', '198.169.127.146', 1538490993, '__ci_last_regenerate|i:1538410507;'),
('8368d3a54eb56d6ffa8b07c97b973fb2b2e6345a', '192.197.71.189', 1536877594, '__ci_last_regenerate|i:1536877594;'),
('83b1627196014a241a0ddcafc6ca0c2a56d8e6c1', '64.233.172.222', 1541439186, '__ci_last_regenerate|i:1541439186;cart_id|s:32:"fc8e7b45946e8407fa79312b78a9cdff";'),
('83cfc55458c7e9288405630114d6fd2f7c29a095', '66.102.7.223', 1540236912, '__ci_last_regenerate|i:1540236912;cart_id|s:32:"7e56863bef868abed8f00af8e8d4b32f";'),
('83f79099abfb0d4cfaf5de5c1ed362936ab9e1c5', '199.128.222.114', 1539272767, '__ci_last_regenerate|i:1539271448;cart_id|s:32:"e0c19bc324b46e58c288704502bc1764";'),
('85fa8731a1b230ae41bc4290a653d87fb656d38a', '192.197.71.189', 1538518664, '__ci_last_regenerate|i:1538496104;'),
('8648a3a2ea158cd09f1c3093e48164f0cbc812eb', '64.233.172.220', 1542400301, '__ci_last_regenerate|i:1542400301;cart_id|s:32:"bbd32f255c3ff1af83a642efed172ef6";'),
('866787618ffb5c451c1a93eca880f0463374c518', '198.169.127.146', 1532972197, '__ci_last_regenerate|i:1532971911;'),
('871514fb413d4c4ef05769fd31ba8813de00a206', '64.233.172.222', 1541972777, '__ci_last_regenerate|i:1541972777;cart_id|s:32:"35492f8dfa8173e39714d8515b1d5a69";'),
('8842f54d3bc3bc358688d51c0d0b33c56e67dfba', '192.197.71.189', 1536961090, '__ci_last_regenerate|i:1536961090;'),
('88a7b81e7a33aa7e52172b11159924b0f10df241', '103.211.20.137', 1537598510, '__ci_last_regenerate|i:1537523654;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('88ec16acbd516e0c06ef7b10f7dcc837d74a9c75', '198.169.127.146', 1535655342, '__ci_last_regenerate|i:1535655328;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('8946fa56362fded37f956d2ed23388ab20ffdd0c', '198.169.127.146', 1538490926, '__ci_last_regenerate|i:1538420320;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('8b81943e5341c00235b58c62e4afb25d2003d9fd', '64.233.172.220', 1546915163, '__ci_last_regenerate|i:1546915163;cart_id|s:32:"c2e06f8e7320ff19a763865d835d38d6";'),
('8be07cd03592e46ca1a7338a02491410e6a501d1', '103.211.20.145', 1536933553, '__ci_last_regenerate|i:1536933551;'),
('8c311f8499ea87978df655f2e13799dcc6e22088', '111.206.117.77', 1537251527, '__ci_last_regenerate|i:1537251448;'),
('8cd583092094e7a305df33ab85b919d81ce76113', '198.169.127.146', 1534189200, '__ci_last_regenerate|i:1534174102;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('8ced391a5ba86e31a87bded5b93ab81bd686d8e4', '202.78.237.86', 1537249411, '__ci_last_regenerate|i:1537248937;'),
('8d0e0788f1da0e52ed788c6397f0b8147a46e5f5', '42.110.130.16', 1533186397, '__ci_last_regenerate|i:1533186024;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('8e53b139d066a79c3a1657da1ba1b61517a79b9d', '103.211.20.137', 1537505286, '__ci_last_regenerate|i:1537505278;'),
('8f8d85441ff8f8dae11dad007d966f3bb721e8b1', '64.233.172.193', 1542728798, '__ci_last_regenerate|i:1542728797;cart_id|s:32:"84e3c5816989ee7585af713bbd871b4d";'),
('8fba64e8af68be3122fb133ecf19ebd6620bc3b5', '103.85.8.74', 1556726390, '__ci_last_regenerate|i:1556725604;cart_id|s:32:"968f6e77ab53c2630e09fa2f82eb44b7";web_admin_user_name|s:5:"super";web_admin_user_id|s:1:"1";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('91f3cbb923931ea3f1b69f6843b38c92827c7534', '116.206.222.163', 1536757883, '__ci_last_regenerate|i:1536757883;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('92505331d47a3b5e75da41d3948475588eb1ba6e', '192.197.71.189', 1537478453, '__ci_last_regenerate|i:1537478453;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('92e8cad0503ee565c18886c866290d78b14d0964', '198.169.127.146', 1536958504, '__ci_last_regenerate|i:1536956911;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('92f5faa3159c509438ef5178ccb7184482103960', '103.211.20.131', 1537779637, '__ci_last_regenerate|i:1537779637;'),
('932a28ba72edada9774bbd10d25f89c25aac4c69', '192.197.71.189', 1539123838, '__ci_last_regenerate|i:1539103251;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('936af18747f43515938d7e2155baef76416b47c3', '198.169.127.146', 1538580791, '__ci_last_regenerate|i:1538508511;'),
('9386a9a401e9ed5800e38f97b4fb0a9254f002ce', '66.102.7.242', 1543943196, '__ci_last_regenerate|i:1543943196;cart_id|s:32:"9ac2beda5f110e3cac722d79ed3ce182";'),
('943d5fa0f60d3c4f9edb4980404b3d400185e695', '198.169.127.146', 1533153750, '__ci_last_regenerate|i:1533153729;'),
('94ae61032bbd303789702b5ba100f85aa698a68d', '66.249.83.212', 1541534012, '__ci_last_regenerate|i:1541534012;cart_id|s:32:"f88062fc93eddf6c0e6467c51c214fa4";'),
('95bb2e9e5f9898bdd353b8940f5ac5dac880426a', '64.233.172.222', 1544891452, '__ci_last_regenerate|i:1544891452;cart_id|s:32:"b1e5e55d224024fcb7e993ffe3fd65f7";'),
('96454ba67efde8938ae2dee02ea1d2682ff60483', '192.197.71.189', 1539295317, '__ci_last_regenerate|i:1539295247;cart_id|s:32:"92c3bc321aae5becb360ad0dfe66ed7a";'),
('96f42df498f96ceab11117761f19e537124ac3b3', '103.211.20.130', 1536915174, '__ci_last_regenerate|i:1536915174;'),
('972180b433219690dae0b18586cc1fe948bf7d43', '64.233.172.220', 1545152701, '__ci_last_regenerate|i:1545152701;cart_id|s:32:"2c396f627d13ed68acb3ca22f3f75657";'),
('97b82d00342a97cf3040ea0554b774391495462f', '198.169.127.146', 1532728375, '__ci_last_regenerate|i:1532728374;'),
('98136763833a1826be97fd6b6585696644bc7693', '192.197.71.189', 1537478881, '__ci_last_regenerate|i:1537478551;'),
('983b29f8c6312a957c87e4775e1ac6345d841375', '66.249.83.212', 1539982366, '__ci_last_regenerate|i:1539982366;cart_id|s:32:"6d39683a42d335444c29c202ba606ccc";'),
('9849b4ba5c5c4367bccbb9535c9ea87fe71dd6b8', '103.211.20.143', 1538577787, '__ci_last_regenerate|i:1538577786;'),
('985992d78428d081598cdc6de4d70f9723fe53d4', '66.102.7.244', 1540394232, '__ci_last_regenerate|i:1540394231;cart_id|s:32:"6a064018dc63ed0f5fbf5e6e17279e26";'),
('98e0b194fa2789d0782a73c1aa5138c27c327958', '192.197.71.189', 1538776616, '__ci_last_regenerate|i:1538776455;'),
('995d81527fa4f76003301b5fa8b9a2467fcbfc94', '38.64.150.3', 1537301884, '__ci_last_regenerate|i:1537301884;'),
('99d0dacafa5846a4fb14ff1270e16f6bcd61bdaa', '198.169.127.146', 1538583660, '__ci_last_regenerate|i:1538583660;'),
('99fd7ccbe3619699b7ea4edd25fd6176cb422019', '116.206.222.239', 1539614989, '__ci_last_regenerate|i:1539591154;cart_id|s:32:"af2c84959b84d6cf42a414de21542d7a";'),
('9a712e77e366cad12cf3baf3ba684f27af9122b8', '64.233.172.193', 1543939267, '__ci_last_regenerate|i:1543939267;cart_id|s:32:"ec155b82bcad880d16dc3f5443e5ee91";'),
('9af6371d2e6b938a2cdc83de2d6e620b8fd4ed5d', '103.211.20.145', 1537187811, '__ci_last_regenerate|i:1537164294;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('9aff9acdc7cc0b493540be20f196967f3911b1ec', '64.233.172.220', 1546663616, '__ci_last_regenerate|i:1546663616;cart_id|s:32:"8061bfed84fcb2548042e98ff12bf4da";'),
('9b3757bf98a1800062e3186a176e58e1f3cbfab9', '66.102.7.223', 1539926132, '__ci_last_regenerate|i:1539926132;cart_id|s:32:"715e223cf9bfcf8c7f1b59c4b39aa170";'),
('9b7acb5625ffce99e6bde5431186a6e982bb64b5', '66.102.6.138', 1540232496, '__ci_last_regenerate|i:1540232496;cart_id|s:32:"59d8735fb2e1a5cc9bb0e384abd799eb";'),
('9c432f3183fbe60b5b0230e9feae3bd436e0bc7e', '103.211.20.141', 1535549288, '__ci_last_regenerate|i:1535549273;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('9cc8217013c414c9a254d8b0b7428f88b85dcc53', '::1', 1532639397, '__ci_last_regenerate|i:1532553512;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('9cfd60c42cce33f639183921a8eb2ca156b4aee8', '66.249.83.212', 1543350710, '__ci_last_regenerate|i:1543350710;cart_id|s:32:"dd2de9509910bb25181c039d289b2bdd";'),
('9f48d2de6de52c189919ff57e688bf4c6616fb06', '192.197.71.189', 1537373204, '__ci_last_regenerate|i:1537373204;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('9f57319a1ab648738069493c0b7f15b2b92fcbc6', '199.128.222.121', 1538056016, '__ci_last_regenerate|i:1538055035;'),
('9ff51340f30da793b3049e0524ba632185e2417f', '66.102.7.160', 1540916159, '__ci_last_regenerate|i:1540916159;cart_id|s:32:"c24a398db1907b565cebf166311d78de";'),
('a1deb639b08f2d3ecfe653612fd3985647de36ec', '35.153.127.83', 1533146752, '__ci_last_regenerate|i:1533146752;'),
('a1fc69d926c7f8db9adc39e608d6030c1d4ce7af', '192.197.71.189', 1537809765, '__ci_last_regenerate|i:1537807679;'),
('a22fc7f1df51e776fac168116a9c49d82ea2af89', '70.64.32.181', 1538453848, '__ci_last_regenerate|i:1538453559;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('a288b8cdd5cdb8f3b364f4542aca32b1c6df36d3', '103.211.20.132', 1539332884, '__ci_last_regenerate|i:1539332884;'),
('a2b9be11bff884150183230ba50408986d28cf08', '198.169.127.146', 1536251418, '__ci_last_regenerate|i:1536251388;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('a2dd9a02172e3cb060ff372602dc9e87e4d37c47', '64.233.172.193', 1545627412, '__ci_last_regenerate|i:1545627411;cart_id|s:32:"b63bd7d4301aed1bdc7e3599b0998105";'),
('a3b193a91806432affd20a9e125890d97e8df725', '199.128.222.121', 1538760752, '__ci_last_regenerate|i:1538760752;'),
('a592fb2d31584d4bd21aa0d4755d27bd2e94c378', '::1', 1532639896, '__ci_last_regenerate|i:1532639895;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('a63c6920ce616149da4a892a8eacaf27b92d7457', '34.228.6.255', 1533157714, '__ci_last_regenerate|i:1533157714;'),
('a668dcc0d73d46996b363d4e937a6ea998064b81', '192.197.71.189', 1542233722, '__ci_last_regenerate|i:1542233722;cart_id|s:32:"0e8808784f5310f6b1f09dc92cd4ce35";'),
('a6ec01a246070489e92aec93437949f3ea2196e9', '192.197.71.189', 1537979670, '__ci_last_regenerate|i:1537974890;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('a75b0867b6191cd1ba26e666b07e5a6325ebf3a4', '198.169.127.146', 1546026406, '__ci_last_regenerate|i:1546026406;cart_id|s:32:"b30aca89e2b2a7880f6558ae0ee3b5fb";'),
('aa2a1c16c39c0870642179da84b1cb9d2978a4e1', '198.169.127.146', 1536874758, '__ci_last_regenerate|i:1536874756;'),
('ab282b4409fe93a559df4611db93f9ce17889fb9', '103.211.20.131', 1537787064, '__ci_last_regenerate|i:1537779564;'),
('abf14a1aadc67b42bf2edc508e439f0afa503562', '66.249.83.212', 1542747431, '__ci_last_regenerate|i:1542747430;cart_id|s:32:"62c1404614d3482ab710dbd25cc6e900";'),
('ac4c4d1f03f7363fa9fced1e522d18ec95e01b77', '192.197.71.189', 1538516275, '__ci_last_regenerate|i:1538510815;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('ad2119aac336dce607f2955371a806b83f30388b', '192.197.71.189', 1538167795, '__ci_last_regenerate|i:1538166076;'),
('ae50f8aa2c6a87d9fc3d2f9acdc54f2e36ee4b4c', '66.102.7.223', 1539786857, '__ci_last_regenerate|i:1539786856;cart_id|s:32:"70aaf02cee1261b76d0c2b1392b19279";'),
('ae69024813af8f08e5795060c112df32008f503b', '103.211.20.128', 1538150778, '__ci_last_regenerate|i:1538128040;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('ae8c73ab2ff21c405ff5fd7d901d5f6a2ed1d9e0', '192.197.71.189', 1539364440, '__ci_last_regenerate|i:1539288966;cart_id|s:32:"728103ff72bce52d952c0a9fae7206a1";'),
('aee65c19a1bc4b5c8d7fae79e24b28e8ffb82a89', '198.169.127.146', 1536868488, '__ci_last_regenerate|i:1536867004;'),
('af677924d877659b4668126da6be2a02698e05d1', '103.211.20.137', 1537523308, '__ci_last_regenerate|i:1537523283;'),
('afa87c64aa76b3d7360a1d44c79441c60939f4e1', '192.197.71.189', 1538170881, '__ci_last_regenerate|i:1538170740;'),
('b0619d009eb4595740583d5c14d02944cbe9aa2c', '116.206.222.163', 1536902894, '__ci_last_regenerate|i:1536838227;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('b0a0202b7618e9f39bad7f659c456130306a232a', '204.193.183.150', 1539103092, '__ci_last_regenerate|i:1539102510;'),
('b0af384a70ba0b249992bb822e88a5ea16693646', '198.169.127.146', 1532974630, '__ci_last_regenerate|i:1532972239;'),
('b12920d6149414c4ab8d3402513204b57460b01c', '199.128.222.121', 1539701064, '__ci_last_regenerate|i:1539700955;cart_id|s:32:"fbc50c3b08b1ae9d8f33e277854324eb";'),
('b14f8325579cafb3b78e1b1baccd46b580c3a774', '192.197.71.189', 1539720304, '__ci_last_regenerate|i:1539720214;cart_id|s:32:"b365aa65592352eef08dc9a6e1e11586";'),
('b179b340bf8c247ae0338c1aeb66ff7b065b22e9', '198.169.127.146', 1541707253, '__ci_last_regenerate|i:1541706918;cart_id|s:32:"4d3b2d67e8cd14b33d59eebdf4ac34a3";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('b1ecfb894f9cd9c92af474110028bdce60623295', '150.129.100.23', 1536817886, '__ci_last_regenerate|i:1536816805;'),
('b28bb4c41428aeef05de7d784ff3ec4634aa96fb', '103.211.20.128', 1537433074, '__ci_last_regenerate|i:1537433074;'),
('b2f1377512ee49516433c50118c0d3cef337d917', '198.169.127.146', 1532729704, '__ci_last_regenerate|i:1532728773;'),
('b3373df8ce385bf207e0331c72fbf34cac04dd28', '64.233.172.28', 1543384788, '__ci_last_regenerate|i:1543384788;cart_id|s:32:"c45e73597f5f932d3a136a4ccd9d92f3";'),
('b3b734276d00639cc5fc5946022888887a169914', '64.233.172.193', 1545673740, '__ci_last_regenerate|i:1545673740;cart_id|s:32:"471adf806e2199650e0754638cfddd2d";'),
('b3e577f6f915bf666274bb81d7f94e555224dc4c', '66.102.7.222', 1539836291, '__ci_last_regenerate|i:1539836290;cart_id|s:32:"42d51e395b52bc540601792f54fd6682";'),
('b436c6576ad65eb882738a38058289b98f30ce24', '198.169.127.146', 1532972682, '__ci_last_regenerate|i:1532972682;'),
('b4886db8fd89b06ae6f72f00cda22586a9c64b2c', '198.169.127.146', 1532970876, '__ci_last_regenerate|i:1532970876;'),
('b630cc70ae23009009b4313967fef9f3643ae130', '66.249.83.216', 1544645268, '__ci_last_regenerate|i:1544645268;cart_id|s:32:"73f70c71dce745f371bf212055cd3745";'),
('b6396c3a640b1791b180bb6dcd46d7131a7a9f41', '64.233.172.193', 1545260090, '__ci_last_regenerate|i:1545260090;cart_id|s:32:"339ac3df241b17e7a02c90ab108379c9";'),
('b6544080bd3566fcf6e38d1976bd476777a6057c', '198.169.127.146', 1532727313, '__ci_last_regenerate|i:1532647004;'),
('b74ea204cec1d6bd451ea5b3a300206bb219e574', '66.249.83.212', 1540318877, '__ci_last_regenerate|i:1540318877;cart_id|s:32:"c679758121e6917ea48dea7d443bf091";'),
('b7683f7757812836d83b514ee31b7eea2000bd5f', '202.78.237.65', 1537508252, '__ci_last_regenerate|i:1537508252;'),
('b7d2044bd816f3b1da959e5a39c9576eb53bd78b', '199.128.222.114', 1539628422, '__ci_last_regenerate|i:1539628020;cart_id|s:32:"3567fdfe082c409501d9d51ae693491d";'),
('b995f0b91c568842047adc3a9201c2626408c21a', '103.211.20.144', 1535185388, '__ci_last_regenerate|i:1535181091;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('b9b822bb23acd959c343e6dcea0a103843fc18a2', '43.255.160.247', 1539134285, '__ci_last_regenerate|i:1539113935;'),
('ba1ba1c7e0b1927dd5ba4386ce384ddbecefc74c', '192.197.71.189', 1540848845, '__ci_last_regenerate|i:1540826075;cart_id|s:32:"03e89f5d23abe351d6ffee413d126cfd";'),
('bacb56bcdb150e12cd23ae3b1c69e06c17d71a9a', '192.197.71.189', 1541428486, '__ci_last_regenerate|i:1541428486;cart_id|s:32:"ae7dced316b01c9eba74f60a92faa1c6";'),
('bb98d2d6bb5f717faa344c7055a3b32ea8566dc3', '198.169.127.146', 1536933348, '__ci_last_regenerate|i:1536856515;'),
('bc44db7d516ee36ed148948447c0300b8c2dfd4b', '::1', 1532625358, '__ci_last_regenerate|i:1532551998;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('beb4a7402eefd93d60288d9c7bd899024199eb11', '103.211.20.132', 1539417561, '__ci_last_regenerate|i:1539335358;cart_id|s:32:"f88421c741faf88a5815139d29c8e057";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('bf27e3f5dbc9f40008ecfe94fffd372b5cf82de8', '198.169.127.146', 1533654200, '__ci_last_regenerate|i:1533654200;'),
('bf5b891ad13639feed664281dee34446a2c72f2c', '199.128.222.133', 1538614279, '__ci_last_regenerate|i:1538614279;'),
('bf90a71378428405e9d62355fb7741d55627ff38', '64.233.172.159', 1541394706, '__ci_last_regenerate|i:1541394706;cart_id|s:32:"f3b4080c9191a0ca0f2597f374b6cbd9";'),
('c017d3aa9487fb338eb14def3084e71b89b5eaf4', '150.129.100.30', 1537162171, '__ci_last_regenerate|i:1537159519;');
INSERT INTO `strest_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('c11451175b965da5f0baa10b1d5d9341785c420c', '198.169.127.146', 1548866880, '__ci_last_regenerate|i:1548862499;cart_id|s:32:"b95dc1755e3f9b3478c6d109172eb9e6";'),
('c1da48c834a335fc6dd6201a0445ac5052187e7e', '198.169.127.146', 1532728374, '__ci_last_regenerate|i:1532728374;'),
('c2408236e2501c76071271bf5621f8735c2803fd', '198.169.127.146', 1536176489, '__ci_last_regenerate|i:1536156556;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('c418faaccd94734728f64aea2dd6d09ee1e817c0', '157.40.120.131', 1538389364, '__ci_last_regenerate|i:1538389363;'),
('c46a089f64849931939fe18d3600044efc5fb24e', '168.68.1.127', 1538767605, '__ci_last_regenerate|i:1538767597;'),
('c58fb77f48279be10690365421f13302b9bb028b', '103.211.20.132', 1539417530, '__ci_last_regenerate|i:1539332828;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"6150bbae497941122f9a79b3332e399c";'),
('c69d583d90f365a9a1c1ba8423ccb1f97f425f2c', '64.233.172.30', 1543209754, '__ci_last_regenerate|i:1543209754;cart_id|s:32:"73d7d67cc9a5296c6882a645b68cdecb";'),
('c6e3d364783233ec3832cedc4768eb46c49b6e87', '34.234.87.24', 1533146727, '__ci_last_regenerate|i:1533146727;'),
('c720ba1fe7bc5b0d116ea6792b31edd6b4c2c96c', '192.197.71.189', 1539276510, '__ci_last_regenerate|i:1539276125;cart_id|s:32:"72f7c30bfcc454c2dd6f0ea3ea358e24";'),
('c7624267e5263f2d1c6716d1cb8d67f8883962d8', '103.211.20.132', 1539332885, '__ci_last_regenerate|i:1539332885;'),
('c7bac622f87069c3beeb1097b603ceb9a01e5f93', '198.169.127.146', 1538495025, '__ci_last_regenerate|i:1538409514;'),
('c82add31f1d6705fe769f0ea26d3d995c5772787', '192.197.71.189', 1538087135, '__ci_last_regenerate|i:1538062027;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('cb4c8f93df61b9dd302a94ed52fd0f06cce7ff13', '103.211.20.136', 1536682260, '__ci_last_regenerate|i:1536681969;'),
('cc2cac9c29af0c76acdfdfdfe9d8ff154a8bf7c8', '198.169.127.146', 1538500308, '__ci_last_regenerate|i:1538500241;'),
('cc2daacd3e16ed0d3d456e036411cc16b32fbfb5', '192.197.71.189', 1539630826, '__ci_last_regenerate|i:1539615479;cart_id|s:32:"510b54d45ccbe4d256cccc08684bcf3a";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('cc5177be22b6adbb1f481004a8baea57c58d85d8', '64.233.172.2', 1542856671, '__ci_last_regenerate|i:1542856670;cart_id|s:32:"8482775bfbe2d4a90b333e1e4d36aa43";'),
('ce005e46d9f394e75dfbb280ee19c9b90b2e839d', '198.169.127.146', 1533940052, '__ci_last_regenerate|i:1533939941;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('ce441965bff928b527d5637880e8a56a70426b5d', '192.197.71.189', 1542649491, '__ci_last_regenerate|i:1542649491;cart_id|s:32:"4a7ee0bf23be9b455fe9fd16963c1527";'),
('ce71d413dbe2c4b6f202576b6278cdba98660c55', '64.233.172.220', 1546810832, '__ci_last_regenerate|i:1546810832;cart_id|s:32:"ecf24675358ffdda6bb60946a3d67013";'),
('ce9823cd86d935401cfd111208465e0c80bd76f9', '103.211.20.128', 1536758070, '__ci_last_regenerate|i:1536758070;'),
('ceb9b9d9ad61416190a3e6a9dddc26dce92337ed', '192.197.71.189', 1537220167, '__ci_last_regenerate|i:1537217167;'),
('d004856e26658b324ad62d333c4cf3db0b4c118f', '192.197.71.189', 1544803350, '__ci_last_regenerate|i:1544803350;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"07da8ac8452389ab801557241c6b1ba2";'),
('d00c26abd4f77f25cb66cd5134c1d3b26f0c1e0b', '198.169.127.146', 1532730896, '__ci_last_regenerate|i:1532730895;'),
('d0afc0b621ef14e0ef037398ddaebc80906961f0', '198.169.127.146', 1532727017, '__ci_last_regenerate|i:1532721135;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d17069775b516043d3d7f7ff9203e9be1265fc54', '198.169.127.146', 1533744612, '__ci_last_regenerate|i:1533744083;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d1d5a63340b39cbeee39142ed9eebf6e04d6cc21', '192.197.71.189', 1545152683, '__ci_last_regenerate|i:1545152683;cart_id|s:32:"417cbdb11b1292756a0a4acb89203df2";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d228ec0a181b69398b71da721c6039385b9cf99c', '70.64.18.54', 1538534767, '__ci_last_regenerate|i:1538524527;'),
('d2c47ea64f52611a9f18f04672994ed2e9a3b2f5', '192.197.71.189', 1538516686, '__ci_last_regenerate|i:1538432741;'),
('d32b16867b96bb8bdacbbcb5e1f6cbc5137434de', '115.187.52.162', 1538633556, '__ci_last_regenerate|i:1538633556;'),
('d34ccd172d864a68f9838ebc3bb803d73b8c227d', '103.211.20.130', 1536942132, '__ci_last_regenerate|i:1536909405;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d3a1699c6c5702ac7e0f10954e545f3600bea8d0', '198.169.127.146', 1536956897, '__ci_last_regenerate|i:1536956812;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d58359fbcca6084a7a3f72013ae0abfd6b97fbe6', '192.197.71.189', 1538057780, '__ci_last_regenerate|i:1537986324;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d5b4e96a004c17adae62efcfa6c1aadd25d2862f', '198.169.127.146', 1546553650, '__ci_last_regenerate|i:1546550195;cart_id|s:32:"45d6e719e029a92731d25e2bc87664b6";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d7199f2c5ef6857c2ce14e3c950f8231a2d2d606', '198.169.127.146', 1536270776, '__ci_last_regenerate|i:1536269494;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('d7e3061332c0185e694c8dba5b124412123d125a', '204.193.183.150', 1539102447, '__ci_last_regenerate|i:1539102351;'),
('d98a9819946e8fc393fc960dfb37bc8ad0de4531', '192.197.71.189', 1539183053, '__ci_last_regenerate|i:1539182904;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"ab30ef3423440061cda3c7c1ee1dd84c";'),
('da1d50a5f511edfc4dd06af2363d57bf5fca6a34', '202.78.237.65', 1537516793, '__ci_last_regenerate|i:1537506091;'),
('da326f218c8240b60e461c6d4e2790d4c5342b47', '66.249.83.212', 1539785522, '__ci_last_regenerate|i:1539785522;cart_id|s:32:"f2cb1afe2c1b9d6e8e8ce370d2c0b9cf";'),
('da3cec20afe950b88309b70d0f0f84e961f7608b', '192.197.71.189', 1545167552, '__ci_last_regenerate|i:1545167552;cart_id|s:32:"a7eb58ecddfd9c2cac00b4542f316082";'),
('db4e3383b018d0c061a62be5220dc11be83d827b', '203.171.244.93', 1539028574, '__ci_last_regenerate|i:1539028574;'),
('dbb13103ecd532388c8794c01a352c7e09f07117', '64.233.172.222', 1547678750, '__ci_last_regenerate|i:1547678750;cart_id|s:32:"844eaf8a1722421670c6af6cbd5bd2ef";'),
('dbe703ac815c4b09ee3e8cdff61e104cba88e2a9', '198.169.127.146', 1538420820, '__ci_last_regenerate|i:1538420819;'),
('dd6d037d32377013f8116a5c7d89247cd1228979', '66.102.7.223', 1539971407, '__ci_last_regenerate|i:1539971407;cart_id|s:32:"997a523a96f1e42ef2ceae64345efa69";'),
('dd9d2cd54be6b4c0846e86ff935e4f577d89b679', '198.169.127.146', 1536871698, '__ci_last_regenerate|i:1536867167;'),
('ddcc98f177cd5e9179fbd9befa1d611e0a437424', '192.197.71.189', 1539281034, '__ci_last_regenerate|i:1539281034;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"29da0a42f13af0b2d2371e0319e3f256";'),
('ddd63f8db46d8df0e9ccd7ac84ea53b39517b852', '64.233.172.2', 1542900364, '__ci_last_regenerate|i:1542900364;cart_id|s:32:"fc8ee3c021e6b952340f9b9ee628c2ed";'),
('de0c7da3b92e7b56d1663a303e0cf9a3d00af835', '168.68.129.127', 1538670249, '__ci_last_regenerate|i:1538667587;'),
('dea0dc4d67d19491af053bccf1fbc855fdd42d22', '198.169.127.146', 1536956794, '__ci_last_regenerate|i:1536954531;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('dea158106770e3711837977c0b6d1077ccf84b7f', '192.197.71.189', 1538498628, '__ci_last_regenerate|i:1538414303;'),
('deef9f5d96a756437f1a7ed41db6fdc086686113', '103.211.20.133', 1540818038, '__ci_last_regenerate|i:1540817910;cart_id|s:32:"a96b5302b0e8c50c49b23fe568ada0b1";'),
('e09107ad0577a56ee0f7cfe20c7749e457c09e00', '198.169.127.146', 1532730778, '__ci_last_regenerate|i:1532730777;'),
('e0b45618295703cd5b5309054bdb8af384127632', '198.169.127.146', 1533155778, '__ci_last_regenerate|i:1533155778;'),
('e17f2febd9fc50723be090ac305735862d3f3c20', '150.129.100.23', 1536817957, '__ci_last_regenerate|i:1536817957;'),
('e212fdd957c5175eff9a70eb8fcd8427d49d5a93', '192.197.71.189', 1538757088, '__ci_last_regenerate|i:1538756347;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e27a69048ae0fce1ae2694e4e7897daca7c1ee27', '134.147.137.206', 1537973501, '__ci_last_regenerate|i:1537973501;'),
('e35332587817028bc431950c8057c73f12617e23', '192.197.71.189', 1536951391, '__ci_last_regenerate|i:1536937960;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e47efbcd5bd4076666b2d770addb7c5fb057fa8d', '192.197.71.189', 1537392031, '__ci_last_regenerate|i:1537384011;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e4a2ef4b82a4a5a84269dc258cfd0161f7e706fd', '103.211.20.139', 1536747873, '__ci_last_regenerate|i:1536747873;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e667f59f1956c25a9e1cb82fbffe1e271df7836c', '198.169.127.146', 1532702380, '__ci_last_regenerate|i:1532647013;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e69948449110e604c3d143eac40495b79ba87a17', '199.128.222.119', 1539282731, '__ci_last_regenerate|i:1539199852;cart_id|s:32:"77357770ba3d1caab5e903f37e542f33";'),
('e6a1f4537a27210821949a7f2d33c991ded3a775', '192.197.71.189', 1538594041, '__ci_last_regenerate|i:1538593049;'),
('e6e49dd29d8f6ed6f533006d640064e363b81673', '64.233.172.193', 1543445511, '__ci_last_regenerate|i:1543445511;cart_id|s:32:"a482d7eb18c22c40b4d5a73ff1deda38";'),
('e72020463211ebb68ed78d7e5d69832db6d87552', '71.17.209.167', 1537811877, '__ci_last_regenerate|i:1537797341;'),
('e831dd2462aff7333bef51f44c85d4748970e437', '103.211.20.159', 1550237191, '__ci_last_regenerate|i:1550236845;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('e837e085766768bba3b4feeebf6ec90669cbbb11', '64.233.172.30', 1543253674, '__ci_last_regenerate|i:1543253673;cart_id|s:32:"a9c679e48137c9d3fdb221f90da2ff4c";'),
('e851d6193923ac2a11c63c977f15c9d60e662898', '64.233.172.220', 1542638638, '__ci_last_regenerate|i:1542638638;cart_id|s:32:"f86094057b57b20a9d937ead0feeaa8b";'),
('e85b6cbf84470b959b41273468a6bd64e1774c45', '66.249.83.214', 1541083190, '__ci_last_regenerate|i:1541083190;cart_id|s:32:"b82b48840b7e6ac0b26af2fc0aa71acb";'),
('e988a8abbcb4f7d2eed1186cd1a810a5370965f5', '66.249.83.216', 1541784157, '__ci_last_regenerate|i:1541784157;cart_id|s:32:"24b6fd5e7510f06b855ec96c9bb7574e";'),
('ea7750d322f291f71e1b44794d158ace02a35119', '198.169.127.146', 1532702987, '__ci_last_regenerate|i:1532702985;'),
('ec3b1dba48dac065838bb7682f8099e13f22f5f3', '34.228.6.255', 1536867164, '__ci_last_regenerate|i:1536867164;'),
('ecb94ed547024507e3876522afcc5c16a6e52ff5', '198.169.127.146', 1532727780, '__ci_last_regenerate|i:1532726694;'),
('edbdf606cb6623e9dac963048b935725dc74ee1b', '198.169.127.146', 1532987802, '__ci_last_regenerate|i:1532959798;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('ee088f7cc1ef55e3952fad104e024d0d11aec890', '192.197.71.189', 1537478840, '__ci_last_regenerate|i:1537478840;'),
('eef76e0be7641b10a9e8d02db58bc98898301c9f', '66.102.7.242', 1547094019, '__ci_last_regenerate|i:1547094019;cart_id|s:32:"f52538c1e4ce8e3f113251f6509b5f15";'),
('efa282e08855e72db8cd137863b7cb3eae999f9a', '198.169.127.146', 1532978151, '__ci_last_regenerate|i:1532978112;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f035e2ef2a25ccbb77c699b0e955408e81457cca', '198.169.127.146', 1540485378, '__ci_last_regenerate|i:1540485378;cart_id|s:32:"0e3938d19d2edb6d2d1441ca6990eb9a";'),
('f10374a6a4450279aead4f0e64f891b5ceb8a917', '198.169.127.146', 1539627344, '__ci_last_regenerate|i:1539616988;cart_id|s:32:"fd53c8b080bcaf3bd93259c41afaed2c";'),
('f10c6d021982c70d45ff2148a50abe67b338d72a', '192.197.71.189', 1538167866, '__ci_last_regenerate|i:1538167842;'),
('f12b8062e089aee1cb0c17745c89bd7b412e17be', '103.211.20.137', 1533973440, '__ci_last_regenerate|i:1533968768;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f1b3644826b86cba4ffceb75cc48194b99875bba', '198.169.127.146', 1533147055, '__ci_last_regenerate|i:1533146769;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"2";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f296cdd36a8445dd7780622a158fd273b639daf8', '103.75.161.74', 1533182647, '__ci_last_regenerate|i:1533182621;'),
('f3d4cb28190ef5bdf6a182b3d1afb84ae5976c9c', '35.153.127.83', 1536746356, '__ci_last_regenerate|i:1536746356;'),
('f46f627566a2fbb14abe079578dd5c6697398761', '70.64.32.181', 1550200366, '__ci_last_regenerate|i:1550197413;cart_id|s:32:"8c389ddc6c3fb89053e2c2b0dbf084d3";web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f4f7e0dfb161f87cc29a2539941f36e86231dea8', '64.233.172.193', 1542574040, '__ci_last_regenerate|i:1542574040;cart_id|s:32:"249493b51ec81768f3b974639dad1af9";'),
('f4f89f5b51104caea133ffda1f8631898c674f03', '168.68.129.127', 1539627314, '__ci_last_regenerate|i:1539627314;cart_id|s:32:"c380c92610a69574947d7260b0a57d98";'),
('f5b44056918ef60c2e84a1de45cf3110c18b1259', '64.233.172.2', 1543598637, '__ci_last_regenerate|i:1543598637;cart_id|s:32:"d3f38ed14d0d380168bf7a2d8cee278f";'),
('f6bf1471919d3f54df59bbec26d40493b7bf5d3d', '103.211.20.139', 1536668874, '__ci_last_regenerate|i:1536668874;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f6ef32f703e0c87b88d179d4bf7e52af92f0e994', '66.249.83.216', 1540572014, '__ci_last_regenerate|i:1540572013;cart_id|s:32:"d54b02c21f41caf60cfa53cde47a782b";'),
('f7a0d4695b0ed0791dfdf08ec23f53b2855fc44f', '198.169.127.146', 1536270855, '__ci_last_regenerate|i:1536251348;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('f7feeb0c8451e443a0a5fee7720d8e79ca588b04', '64.233.172.158', 1541187890, '__ci_last_regenerate|i:1541187890;cart_id|s:32:"43d348c1b92869411b6f7a5ee46a16ed";'),
('f89725f6247e7e5e040f30e4cdae0c21cd636e84', '43.255.160.247', 1539211428, '__ci_last_regenerate|i:1539211428;cart_id|s:32:"2dbfd55501def8d07abe00036e8e0f64";'),
('f9431fa96ce691ec32baeab3aed3ad609ba4de1a', '199.128.222.121', 1539271318, '__ci_last_regenerate|i:1539197584;cart_id|s:32:"fa8ab52e428575f0c05290e97eb5544d";'),
('faa8be75db6f33947894931a10790bd18c4ebd1f', '66.102.7.240', 1541436531, '__ci_last_regenerate|i:1541436531;cart_id|s:32:"cb4452f34bf897672338718f4cac3e88";'),
('fbc604f12721a180a6d1e3dd011d7eed821bac9a', '66.249.83.212', 1545246451, '__ci_last_regenerate|i:1545246451;cart_id|s:32:"547d6c8510055bf57fd8c53007240adf";'),
('fbf5b0a8803a33c2a8a5a9a25420bef9c9c35bd0', '103.211.20.139', 1536669086, '__ci_last_regenerate|i:1536669086;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('fc68b67e37165bf486fcc4c6dbcd6d721bf2eb19', '66.102.7.240', 1545026047, '__ci_last_regenerate|i:1545026047;cart_id|s:32:"e283e14ede8b5c5aab7077ba6785b6d9";'),
('fc720187ed95d121a2af1b104e704bad3ecbb84d', '116.206.222.163', 1536838227, '__ci_last_regenerate|i:1536838227;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('fca98693f5a83ad4dca1a5ff307abb80da7ffa57', '192.197.71.189', 1539192414, '__ci_last_regenerate|i:1539191888;cart_id|s:32:"c533a28cb4e3f17f05e1d44e157a007c";'),
('fd263a942df2c05865465e0e4185806131160d1d', '168.68.129.127', 1538058499, '__ci_last_regenerate|i:1537976178;'),
('fd78d4632637a3ccaece8b32fc65cb88a72ec15e', '192.197.71.189', 1537385794, '__ci_last_regenerate|i:1537371012;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('fdeaab37988fbf01d56bb04622308cd925aa0476', '198.169.127.146', 1535559832, '__ci_last_regenerate|i:1535559793;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('ffabf3a95d3720e9c1499d999deaef6b31985af8', '18.206.206.28', 1536672718, '__ci_last_regenerate|i:1536672718;'),
('msn7fvrnt2ot05neekm6rqc990n6m6um', '127.0.0.1', 1556285148, '__ci_last_regenerate|i:1556284991;web_admin_user_name|s:5:"super";web_admin_user_id|s:1:"1";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;'),
('t8ntfj0iv6dq8g4vmhv6i037spa2ko8r', '::1', 1556709048, '__ci_last_regenerate|i:1556695548;web_admin_user_name|s:6:"admin2";web_admin_user_id|s:1:"3";SITE_ID|i:1;user_level|s:1:"2";module|N;web_admin_logged_in|b:1;'),
('u65ceqf7jnls1rk3lo5gtainsreqlllm', '::1', 1556261096, '__ci_last_regenerate|i:1556181597;web_admin_user_name|s:5:"admin";web_admin_user_id|s:1:"2";SITE_ID|i:1;user_level|s:1:"1";module|s:419:"["pages","banner","commonbanner","business","business_category","business_type","contact","contact_info","event","event_category","plan","users","member_pages","department","menu_block","blog","blog_category","annual","image_gallery","image_category","video_gallery","issue","issue_category","settings","role","admin","community_events","meeting_agendas","site_map", "contact_map", "intranet_map", "member_content_map"]";web_admin_logged_in|b:1;cart_id|s:32:"37e38f7d0466cddee1f207d246149ebf";');

-- --------------------------------------------------------

--
-- Table structure for table `strest_shapes_management`
--

CREATE TABLE IF NOT EXISTS `strest_shapes_management` (
`id` int(11) NOT NULL,
  `shape_name` varchar(12) NOT NULL,
  `shape_specification` varchar(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_shapes_management`
--

INSERT INTO `strest_shapes_management` (`id`, `shape_name`, `shape_specification`, `date`, `status`) VALUES
(4, 'dddddddddddd', 'ffffffffff', '2019-04-30 14:06:17', 1),
(5, 'fgert', 'fesfswef', '2019-04-30 14:08:04', 1),
(7, 'New Shape', 'shapes', '2019-05-01 09:57:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `strest_shapes_size`
--

CREATE TABLE IF NOT EXISTS `strest_shapes_size` (
`id` int(11) NOT NULL,
  `size_name` varchar(20) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_shapes_size`
--

INSERT INTO `strest_shapes_size` (`id`, `size_name`, `shape`, `date`, `status`) VALUES
(2, 'dfgdsfd', 'vdgdfgd', '2019-05-01 13:52:27', 1),
(3, 'New size', 'round', '2019-05-01 10:00:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `strest_site_settings`
--

CREATE TABLE IF NOT EXISTS `strest_site_settings` (
`id` int(11) NOT NULL,
  `site_id` int(1) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL,
  `site_name` varchar(200) DEFAULT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `copy_right` varchar(255) DEFAULT NULL,
  `header_logo` varchar(255) NOT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) NOT NULL,
  `header_email` varchar(255) DEFAULT NULL,
  `header_phone` varchar(255) DEFAULT NULL,
  `forgot_password_email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `site_verification` text NOT NULL,
  `analytics_code` longtext NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `header_button_text` varchar(512) DEFAULT NULL,
  `header_button_url` varchar(512) DEFAULT NULL,
  `is_show_header` tinyint(1) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `last_update` text,
  `is_show_header2` int(1) DEFAULT '0',
  `header_button_text2` varchar(512) DEFAULT NULL,
  `header_button_url2` varchar(512) DEFAULT NULL,
  `partner_link` varchar(512) DEFAULT NULL,
  `sponsor_link` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strest_site_settings`
--

INSERT INTO `strest_site_settings` (`id`, `site_id`, `url`, `site_name`, `meta_title`, `meta_keyword`, `meta_description`, `copy_right`, `header_logo`, `footer_logo`, `contact_email`, `header_email`, `header_phone`, `forgot_password_email`, `address`, `site_verification`, `analytics_code`, `profile_id`, `latitude`, `longitude`, `header_button_text`, `header_button_url`, `is_show_header`, `edition`, `last_update`, `is_show_header2`, `header_button_text2`, `header_button_url2`, `partner_link`, `sponsor_link`) VALUES
(1, 1, 'http://localhost/strest/', 'STREST', 'STREST', 'STREST', 'STREST', 'STREST', 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/logo.png', 'http://www.isma-test.com.php72-38.lan3-1.websitetestlink.com/public/uploads/ft_logo_rt.png', 'abdul.barik@bluehorse.in', 'info@lakediefenbakertourism.com', '(306) 956-1799', 'trupti@2webdesign.com', '#200 – 335 Packham Avenue, SASKATOON SK S7N 4S1', '', '', '', '52.129950', '-106.586550', 'Join Us', '', 1, '', '2018-10-15', 1, 'Sponsorship', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `strest_social_menus`
--

CREATE TABLE IF NOT EXISTS `strest_social_menus` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `site_id` int(1) NOT NULL DEFAULT '1',
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_social_menus`
--

INSERT INTO `strest_social_menus` (`id`, `title`, `site_id`, `is_active`) VALUES
(1, 'Facebook', 1, 1),
(2, 'Twitter', 1, 1),
(3, 'Linkedin', 1, 1),
(4, 'Google Plus', 1, 0),
(5, 'Youtube', 1, 1),
(6, 'Pinterest', 1, 1),
(7, 'Tumblr', 1, 0),
(8, 'Instagram', 1, 1),
(9, 'RSS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `strest_social_settings`
--

CREATE TABLE IF NOT EXISTS `strest_social_settings` (
`id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL DEFAULT '1',
  `social_menus_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sequence` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_social_settings`
--

INSERT INTO `strest_social_settings` (`id`, `site_id`, `social_menus_id`, `link`, `sequence`) VALUES
(7, 1, 3, 'https://www.linkedin.com/', 1),
(8, 1, 8, 'https://www.instagram.com/seedmorphology/', 2);

-- --------------------------------------------------------

--
-- Table structure for table `strest_takeoff`
--

CREATE TABLE IF NOT EXISTS `strest_takeoff` (
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
  `status` varchar(20) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strest_takeoff`
--

INSERT INTO `strest_takeoff` (`id`, `project_no`, `quote_no`, `date`, `addenda`, `pricing_units`, `project_title`, `erect`, `fob`, `location`, `legal`, `owner`, `place`, `tel`, `fax`, `mobile`, `contact`, `closing_bid_depository`, `clo_rulings`, `clo_date_time`, `clo_place`, `clo_GST`, `clo_PST`, `clo_other_tax`, `bid_bond`, `perform_bond`, `lab_mat_bond`, `holdback`, `architect_name`, `architect_place`, `architect_contact`, `architect_tel`, `architect_fax`, `engineer_name`, `engineer_place`, `engineer_contact`, `engineer_tel`, `engineer_fax`, `status`, `created_date`) VALUES
(4, '1234', 'QTYB005', '2019-04-29', 'Addenda', 'English', 'Project Title', 'Yes', 'FOB', 'Location', 'Legal', 'Owner', 'Place', 'Tel', 'Fax', 'Mobile', 'Contact', 'Yes', 'Rulings', '2019-04-29', 'Place', 80, 80, 100, 'Yes', 'Yes', 'Yes', 'Holdback', 'Holdback', 'Place Architect', 'Contact Architect', 'Tel Architect', 'Fax Architect', 'Engineer NAME', 'Place Engineer', 'Contact Engineer', 'Tel Engineer', 'Fax Engineer', '1', '2019-05-01'),
(5, '4564', 'asdf', '2019-04-30', 'asdf', 'Metric', 'asdf', 'No', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asf', 232, 232, 23, 'Yes', 'Yes', 'Yes', 'xvzxc', 'xvzxc', 'zxcv', 'zxcv', 'zxcv', 'zcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', '1', '2019-05-01'),
(6, '12', 'asdfas', '2019-04-03', 'sdgfds', 'English', 'asdfads', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', '(', 'asdf', 'Yes', 'asdf', '04/24/2019 12:00 AM', 'asdf', 34, 34, 34, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', 'asdf', 'asdf', 'asdf', '(', '(', '1', '2019-05-01'),
(8, '454', 'asda', '2019-04-01', 'asdf', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asfd', 'asdf', 'asfd', 'Yes', 'asdf', '04/17/2019 12:00 AM', 'asdfa', 343, 343, 4353, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '2019-05-01'),
(9, '0', 'ghdfg', '2019-04-02', '', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-05-01'),
(10, '0', 'QTYASD001', '2019-04-01', '', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-05-01'),
(11, '4564', 'asdf', '2019-04-30', 'asdf', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '(', '(', '(', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asf', 232, 232, 23, 'Yes', 'Yes', 'Yes', 'xvzxc', 'xvzxc', 'zxcv', 'zxcv', '(', '(', 'zxcv', 'zxcv', 'zxcv', '(', '(', '1', '2019-05-01'),
(12, '1458520', 'QTYAVIJIT', '2019-04-01', 'BHS BUILDING REPAIRING', 'Metric', 'BHS PROJECT', 'No', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'No', 'No', 'No', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1', '2019-05-01'),
(13, '1458520', 'QTYAVIJIT', '2019-04-08', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1', '2019-05-01'),
(14, '1458520', 'QTYAVIJIT', '2019-04-02', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-5463', '(933) 237-5463', '1', '2019-05-01'),
(15, '1458520', 'QTYAVIJIT', '2019-04-02', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111) 111-4512', '(152) 425-5622', '(929) 273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933) 237-5463', '(933) 237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933) 237-6345', '(933) 237-5463', '1', '2019-05-01'),
(16, '3434', 'dfgsd', '2019-04-03', 'sdfg', 'English', 'sdfgsdf', 'Yes', '343', 'asdfas', 'asdf', 'asdf', 'adf', '(353) 453-4534', '(534) 534-5345', '(345) 345-3453', 'sdfgsdgsd', 'Yes', 'asdfasd', '04/17/2019 12:00 AM', 'asfdasdfads', 34534, 34534, 345345, 'Yes', 'Yes', 'Yes', 'asdfads', 'asdfads', 'asdf', 'asdf', '(345) 345-3453', '(353) 453-4535', 'af', 'asdf', 'asdf', '(345) 345-3453', '(353) 453-4535', '1', '2019-05-01'),
(17, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1', '2019-05-01'),
(18, 'asd123', 'asd123', '2019-04-02', 'asd123', 'English', 'asd123', 'Yes', 'asd123', 'asd123', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', '(123) 456-7890', 'asd123', 'Yes', 'asd123', '04/18/2019 12:00 AM', 'asd123', 123, 123, 123, 'Yes', 'Yes', 'Yes', 'asd123', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', 'asd123', 'asd123', 'asd123', '(123) 456-7890', '(123) 456-7890', '1', '2019-05-01'),
(46, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '2019-05-01'),
(47, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-05-01'),
(48, 'A003', 'Q001', '2019-04-10', '', 'English', 'New Project', 'Yes', '1', 'kolkkata', 'legal111', 'Test Owner', 'Medinipur', '(888) 888-8888', '(999) 999-9999', '(777) 777-7777', '', 'Yes', 'yes', '04/10/2019 05:00 PM', 'canada', 1, 1, 3, 'Yes', 'Yes', 'Yes', 'e', 'e', 'kolk', 'ok', '(988) 886-7665', '(445) 567-7777', 'aaaa', 'medi', 'ok', '(554) 334-5657', '(555) 333-2244', '1', '2019-05-01'),
(49, 'A003', 'Q001', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-05-01'),
(50, '1458520', 'QTYAVIJIT', '2019-04-08', 'BHS BUILDING REPAIRING', 'English', 'BHS PROJECT', 'Yes', '1500', 'MIDNAPUR', 'NONE', 'ASD', 'MIDNAPUR ALLAHABED B', '(111)-111-4512', '(152)-425-5622', '(929)-273-4972', '9332375463', 'Yes', 'NONE', '04/30/2019 05:27 AM', 'MIDNAPUR OFFICE', 100, 100, 300, 'Yes', 'Yes', 'Yes', '45', '45', 'MIDNAPUR', 'NONE', '(933)-237-5463', '(933)-237-5463', 'ASD ENGINEER', 'KOLKATA', 'NONE', '(933)-237-5463', '(933)-237-5463', '1', '2019-05-01'),
(51, '9856', 'sdgsdf', '2019-05-15', '', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '05/15/2019 12:00 AM', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-05-01'),
(53, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-05-01'),
(54, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-05-01'),
(55, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '2019-05-01'),
(56, '9856', 'sdgsdf', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-05-01'),
(57, '9856', 'sdgsdf', '2019-04-02', 'qfgsad', 'English', 'asdf', 'Yes', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Yes', 'asdf', '04/22/2019 12:00 AM', 'asdf', 43, 43, 45, 'Yes', 'Yes', 'Yes', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '2019-05-01'),
(58, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1', '2019-05-01'),
(59, '4545', 'sdfgsdq', '2019-04-04', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353) 345-3535', '(341) 141-6545', '(365) 416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345) 345-3453', '(345) 663-4563', 'sdfg', 'sdfg', 'sdfg', '(345) 354-5635', '(345) 634-5634', '1', '2019-05-01'),
(60, 'AVIJIT001', 'ASD', '2019-05-10', 'MDN', 'English', 'BHS', 'Yes', '50', 'MDN', 'MDN', 'VINEET', 'MDN', '(897)-697-4443', '(354)-654-6546', '(146)-546-4654', '9332375463', 'Yes', 'KOLKATA', '05/23/2019 12:00 AM', 'KOLKATA', 1500, 1500, 5221, 'Yes', 'Yes', 'Yes', '50', '50', 'NONE', 'MDN', '(988)-655-4654', '(354)-665-4564', 'DSA', 'KOL', 'BHS', '(654)-654-6465', '(465)-465-4654', '1', '2019-05-01'),
(61, 'AVIJIT001', 'ASD', '2019-05-02', 'MDN', 'English', 'BHS', 'Yes', '50', 'MDN', 'MDN', 'VINEET', 'MDN', '(897)-697-4443', '(354)-654-6546', '(146)-546-4654', '9332375463', 'Yes', 'KOLKATA', '05/23/2019 12:00 AM', 'KOLKATA', 1500, 1500, 5221, 'Yes', 'Yes', 'Yes', '50', '50', 'NONE', 'MDN', '(988)-655-4654', '(354)-665-4564', 'DSA', 'KOL', 'BHS', '(654)-654-6465', '(465)-465-4654', '1', '2019-05-01'),
(62, '4545', 'sdfgsdq', '2019-05-15', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353)-345-3535', '(341)-141-6545', '(365)-416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345)-345-3453', '(345)-663-4563', 'sdfg', 'sdfg', 'sdfg', '(345)-354-5635', '(345)-634-5634', '1', '2019-05-01'),
(63, '4545', 'sdfgsdq', '2019-05-15', 'dsfgsdf', 'English', 'asdfgas', 'Yes', 'sdgd', 'sdfl;ifgj', 'l;kjsdij', ';lijsdfgj', 'iopjsdgfj', '(353)-345-3535', '(341)-141-6545', '(365)-416-5465', '6514656541', 'Yes', 'sdfgsdfg', '04/09/2019 12:00 AM', 'sdgsdf', 15, 15, 12521, 'Yes', 'Yes', 'Yes', 'dsfgsd', 'dsfgsd', 'sdfg', 'sdfg', '(345)-345-3453', '(345)-663-4563', 'sdfg', 'sdfg', 'sdfg', '(345)-354-5635', '(345)-634-5634', '1', '2019-05-01'),
(64, '111111111', '1111111111', '2019-05-15', 'aaaaaaaa', 'English', '', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', 0, 0, 0, 'Yes', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `strest_takeoffline`
--

CREATE TABLE IF NOT EXISTS `strest_takeoffline` (
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

-- --------------------------------------------------------

--
-- Table structure for table `strest_tracking`
--

CREATE TABLE IF NOT EXISTS `strest_tracking` (
`id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text NOT NULL,
  `action` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `field_arr` longtext NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strest_tracking`
--

INSERT INTO `strest_tracking` (`id`, `element_id`, `old_value`, `new_value`, `action`, `table_name`, `module_name`, `field_arr`, `update_by`, `created_date`) VALUES
(1, 3, '', '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin', '2019-04-26 05:38:47'),
(2, 4, '', '{"full_name":"","user_level":"2","user_name":"aaa","user_email":"aaa@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin', '2019-04-26 06:46:54'),
(3, 5, '', '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"0"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:21:50'),
(4, 6, '', '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:25:41'),
(5, 3, '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"0"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:28:29'),
(6, 3, '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"0"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:33:43'),
(7, 3, '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"0"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:35:17'),
(8, 3, '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"0"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-04-30 07:35:39'),
(9, 7, '', '{"full_name":"","user_level":"2","user_name":"abdul1","user_email":"a@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 08:12:30'),
(10, 8, '', '{"full_name":"","user_level":"2","user_name":"ghghghgh","user_email":"awwwww@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 09:40:32'),
(11, 9, '', '{"full_name":"","user_level":"2","user_name":"jkjkjljklk","user_email":"awwwwwww@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 09:41:48'),
(12, 8, '{"full_name":"","user_level":"2","user_name":"ghghghgh","user_email":"awwwww@b.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 09:43:09'),
(13, 10, '', '{"full_name":"","user_level":"2","user_name":"tytytytryt","user_email":"awwwwwwwwww@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 09:44:38'),
(14, 8, '{"full_name":"","user_level":"2","user_name":"ghghghgh","user_email":"awwwww@b.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-04-30 09:44:48'),
(15, 3, '{"full_name":"","user_level":"2","user_name":"admin2","user_email":"jamesmorgan@gmail.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'admin2', '2019-05-01 01:13:10'),
(16, 2, '{"full_name":"2web Admin","user_level":"2","user_name":"admin","user_email":"abcd@2webdesign.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-05-01 01:18:00'),
(17, 2, '{"full_name":"2web Admin","user_level":"2","user_name":"admin","user_email":"abcd@2webdesign.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-05-01 01:19:09'),
(18, 2, '{"full_name":"2web Admin","user_level":"2","user_name":"admin","user_email":"abcd@2webdesign.com","approved":"1"}', '', 'edit', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-05-01 01:19:35'),
(19, 11, '', '{"full_name":"","user_level":"2","user_name":"ererererer","user_email":"awwww22w@b.com","approved":"1"}', 'add', 'admin', 'admin', '[{"title":"Full Name","field_name":"full_name","field_type":"text"},{"title":"User Level","field_name":"user_level","field_type":"text"},{"title":"User Name","field_name":"user_name","field_type":"text"},{"title":"Email","field_name":"user_email","field_type":"text"},{"title":"Status","field_name":"approved","field_type":"text"}]', 'super', '2019-05-01 01:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `strest_admin`
--
ALTER TABLE `strest_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_admin_log`
--
ALTER TABLE `strest_admin_log`
 ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `strest_banner`
--
ALTER TABLE `strest_banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_cms_pages`
--
ALTER TABLE `strest_cms_pages`
 ADD PRIMARY KEY (`id`), ADD KEY `key1` (`page_link`);

--
-- Indexes for table `strest_contact`
--
ALTER TABLE `strest_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_home_block`
--
ALTER TABLE `strest_home_block`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_lumbsum`
--
ALTER TABLE `strest_lumbsum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_material`
--
ALTER TABLE `strest_material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_membership`
--
ALTER TABLE `strest_membership`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_sessions`
--
ALTER TABLE `strest_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `strest_shapes_management`
--
ALTER TABLE `strest_shapes_management`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_shapes_size`
--
ALTER TABLE `strest_shapes_size`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_site_settings`
--
ALTER TABLE `strest_site_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_social_menus`
--
ALTER TABLE `strest_social_menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_social_settings`
--
ALTER TABLE `strest_social_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_takeoff`
--
ALTER TABLE `strest_takeoff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_takeoffline`
--
ALTER TABLE `strest_takeoffline`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strest_tracking`
--
ALTER TABLE `strest_tracking`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `strest_admin`
--
ALTER TABLE `strest_admin`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `strest_banner`
--
ALTER TABLE `strest_banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `strest_cms_pages`
--
ALTER TABLE `strest_cms_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `strest_contact`
--
ALTER TABLE `strest_contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `strest_home_block`
--
ALTER TABLE `strest_home_block`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `strest_lumbsum`
--
ALTER TABLE `strest_lumbsum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `strest_material`
--
ALTER TABLE `strest_material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `strest_membership`
--
ALTER TABLE `strest_membership`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `strest_shapes_management`
--
ALTER TABLE `strest_shapes_management`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `strest_shapes_size`
--
ALTER TABLE `strest_shapes_size`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `strest_site_settings`
--
ALTER TABLE `strest_site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `strest_social_menus`
--
ALTER TABLE `strest_social_menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `strest_social_settings`
--
ALTER TABLE `strest_social_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `strest_takeoff`
--
ALTER TABLE `strest_takeoff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `strest_takeoffline`
--
ALTER TABLE `strest_takeoffline`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `strest_tracking`
--
ALTER TABLE `strest_tracking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
