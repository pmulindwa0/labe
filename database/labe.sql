-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 08:17 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labe`
--

-- --------------------------------------------------------

--
-- Table structure for table `gp`
--

CREATE TABLE `gp` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gp`
--

INSERT INTO `gp` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{"Admin":1}');

-- --------------------------------------------------------

--
-- Table structure for table `hlc_form`
--

CREATE TABLE `hlc_form` (
  `id` int(11) NOT NULL,
  `region` varchar(35) NOT NULL,
  `subcounty` varchar(35) NOT NULL,
  `village` varchar(35) NOT NULL,
  `name_pe` varchar(52) NOT NULL,
  `contact_pe` varchar(25) NOT NULL,
  `date_of_assessment` datetime NOT NULL,
  `district` varchar(35) NOT NULL,
  `parish` varchar(35) NOT NULL,
  `name_hlc` varchar(45) NOT NULL,
  `name_assessor` varchar(35) NOT NULL,
  `contact_assessor` varchar(35) NOT NULL,
  `period` varchar(25) NOT NULL,
  `ecd` int(11) NOT NULL,
  `parenting` int(11) NOT NULL,
  `adult_literacy` int(11) NOT NULL,
  `vsla` int(11) NOT NULL,
  `hlc_granaries` int(11) NOT NULL,
  `swings` int(11) NOT NULL,
  `slide` int(11) NOT NULL,
  `bike_model` int(11) NOT NULL,
  `balancing_log` int(11) NOT NULL,
  `skipping_rope` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  `active_pe` int(11) NOT NULL,
  `active_hlcmc` int(11) NOT NULL,
  `parents` int(11) NOT NULL,
  `community_willingness` int(11) NOT NULL,
  `community_support` int(11) NOT NULL,
  `schools_administration` int(11) NOT NULL,
  `clean_safe` int(11) NOT NULL,
  `latrine_facilities` int(11) NOT NULL,
  `shelter` int(11) NOT NULL,
  `complementary_framework` int(11) NOT NULL,
  `ecd_guide` int(11) NOT NULL,
  `sound_wheel` int(11) NOT NULL,
  `picture_books` int(11) NOT NULL,
  `parenting_charts` int(11) NOT NULL,
  `up_to_date_registers` int(11) NOT NULL,
  `enrolment_register` int(11) NOT NULL,
  `attendance_register` int(11) NOT NULL,
  `visitors_books` int(11) NOT NULL,
  `minute_books` int(11) NOT NULL,
  `action_plan` int(11) NOT NULL,
  `technical_support_book` int(11) NOT NULL,
  `info_file` int(11) NOT NULL,
  `submitted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hlc_form`
--

INSERT INTO `hlc_form` (`id`, `region`, `subcounty`, `village`, `name_pe`, `contact_pe`, `date_of_assessment`, `district`, `parish`, `name_hlc`, `name_assessor`, `contact_assessor`, `period`, `ecd`, `parenting`, `adult_literacy`, `vsla`, `hlc_granaries`, `swings`, `slide`, `bike_model`, `balancing_log`, `skipping_rope`, `balls`, `extras`, `active_pe`, `active_hlcmc`, `parents`, `community_willingness`, `community_support`, `schools_administration`, `clean_safe`, `latrine_facilities`, `shelter`, `complementary_framework`, `ecd_guide`, `sound_wheel`, `picture_books`, `parenting_charts`, `up_to_date_registers`, `enrolment_register`, `attendance_register`, `visitors_books`, `minute_books`, `action_plan`, `technical_support_book`, `info_file`, `submitted_by`) VALUES
(3, 'West Nile', 'lango', 'okoi', 'Opio', '(078) 376-3673', '2018-06-11 00:00:00', 'Moyo', 'opidio', 'okoi HC4', 'mulindwa', '(076) 355-3556', '2017 Qtr2', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 1),
(4, 'Northan Uganda', 'Otti', 'Ola', 'Obua Tito', '(077) 487-6466', '2018-06-22 00:00:00', 'Gulu', 'Okwii', 'kml', 'Ochan Benjamin', '(078) 654-5455', '2018 Qtr1', 7, 5, 5, 4, 5, 5, 6, 8, 6, 8, 9, 3, 3, 4, 2, 3, 2, 2, 3, 3, 5, 4, 3, 4, 4, 4, 4, 4, 3, 3, 3, 3, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `upload_date` datetime NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `report` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `upload_date`, `uploaded_by`, `report`) VALUES
(1, 'monitoring Report', '2018-06-26 00:00:00', 1, '5b320ff2d53c08.34146656.docx'),
(2, 'monitoring Report', '2018-06-26 00:00:00', 1, '5b32143899a2c1.61777175.docx'),
(3, 'general report', '2018-06-26 00:00:00', 1, '5b321504408bd7.81938337.pdf'),
(4, 'general report', '2018-06-26 00:00:00', 1, '5b321646410572.13707181.pdf'),
(5, 'general report', '2018-06-26 00:00:00', 1, '5b32170fc3d8b6.57879385.pdf'),
(6, 'general report', '2018-06-26 00:00:00', 1, '5b32185d25ea34.18127485.pdf'),
(7, 'gender equality', '2018-06-26 00:00:00', 1, '5b321886ef2ff1.55908274.docx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(54) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(52) NOT NULL,
  `joined` datetime NOT NULL,
  `gp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `gp`) VALUES
(1, 'pmulindwa0@gmail.com', 'd37b3cf7ae9a9d43c3e15603eaaec2cf61339bd1', 'é;º÷o*†©J“¤²ý¸ŒXtVXçÜ­ç˜ÅŸJ', 'pecode', '2018-06-11 12:21:38', 1),
(9, 'petermulindwa@yahoo.com', 'e5c8be24596d81cf42eb96e3839393ec70b3def0', '_š\ZEä{ª¹†;\nSQò1-.^Awc;Y!‡^Lm', 'mulindwa peter', '2018-06-11 15:46:30', 1),
(10, 'isaac@gmail.com', '9ddddaa037b085352ef789977633d6aef3dfd3e8', 'pl³Ç,&¨ä’%þÁŠ1Õ³+‡a1`…mnÜ8\Zê', 'isaac', '2018-06-11 15:49:58', 1),
(11, 'pecode@yahoo.com', 'e5c8be24596d81cf42eb96e3839393ec70b3def0', 'DÄMg†à‡ƒN.\Z¨ê²;iï¨\ZGbò¢ßÀ\\ê0^R', 'pecode', '2018-06-11 15:52:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp`
--
ALTER TABLE `gp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hlc_form`
--
ALTER TABLE `hlc_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp`
--
ALTER TABLE `gp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hlc_form`
--
ALTER TABLE `hlc_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
