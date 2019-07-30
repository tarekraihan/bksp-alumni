-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 05:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bksp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `country` varchar(250) NOT NULL,
  `vat_rate` float(10,2) NOT NULL,
  `tax_rate` float(10,2) NOT NULL,
  `currency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `phone`, `logo`, `country`, `vat_rate`, `tax_rate`, `currency`) VALUES
(1, 'Alumni Association of BKSP', 'Ja-83 4th floor Mohakhali Wireless Gate', '+88018911222952', '', '', 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:15:{i:0;s:18:\"approveApplication\";i:1;s:15:\"viewApplication\";i:2;s:17:\"deleteApplication\";i:3;s:12:\"updateMember\";i:4;s:10:\"viewMember\";i:5;s:12:\"deleteMember\";i:6;s:10:\"createUser\";i:7;s:10:\"updateUser\";i:8;s:8:\"viewUser\";i:9;s:10:\"deleteUser\";i:10;s:11:\"createGroup\";i:11;s:11:\"updateGroup\";i:12;s:9:\"viewGroup\";i:13;s:11:\"deleteGroup\";i:14;s:13:\"updateCompany\";}'),
(6, 'User', 'a:6:{i:0;s:18:\"approveApplication\";i:1;s:15:\"viewApplication\";i:2;s:12:\"updateMember\";i:3;s:10:\"viewMember\";i:4;s:8:\"viewUser\";i:5;s:11:\"createGroup\";}'),
(7, 'Admin', 'a:15:{i:0;s:18:\"approveApplication\";i:1;s:15:\"viewApplication\";i:2;s:17:\"deleteApplication\";i:3;s:12:\"updateMember\";i:4;s:10:\"viewMember\";i:5;s:12:\"deleteMember\";i:6;s:10:\"createUser\";i:7;s:10:\"updateUser\";i:8;s:8:\"viewUser\";i:9;s:10:\"deleteUser\";i:10;s:11:\"createGroup\";i:11;s:11:\"updateGroup\";i:12;s:9:\"viewGroup\";i:13;s:11:\"deleteGroup\";i:14;s:13:\"updateCompany\";}');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `bksp_admission_year` year(4) DEFAULT NULL,
  `cadet_no` varchar(15) DEFAULT NULL,
  `year_of_ssc` year(4) DEFAULT NULL,
  `year_of_hsc` year(4) DEFAULT NULL,
  `degree_cadet_admission_year` varchar(10) DEFAULT NULL,
  `degree_cadet_passing_year` varchar(10) DEFAULT NULL,
  `address` text,
  `blood_group` varchar(10) DEFAULT NULL,
  `religious` varchar(50) DEFAULT NULL,
  `mobile` varchar(19) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `professional_info` text,
  `nid` varchar(20) DEFAULT NULL,
  `nid_doc` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `is_approved` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `is_decline` int(1) DEFAULT '0',
  `approved_by` int(10) DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_members`
--

CREATE TABLE `temp_members` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `bksp_admission_year` year(4) DEFAULT NULL,
  `cadet_no` varchar(15) DEFAULT NULL,
  `year_of_ssc` year(4) DEFAULT NULL,
  `year_of_hsc` year(4) DEFAULT NULL,
  `degree_cadet_admission_year` varchar(10) DEFAULT NULL,
  `degree_cadet_passing_year` varchar(10) DEFAULT NULL,
  `address` text,
  `blood_group` varchar(10) DEFAULT NULL,
  `religious` varchar(50) DEFAULT NULL,
  `mobile` varchar(19) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `professional_info` text,
  `nid` varchar(20) DEFAULT NULL,
  `nid_doc` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `is_approved` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `is_decline` tinyint(1) DEFAULT '0',
  `approved_by` int(10) DEFAULT NULL,
  `decline_by` int(10) DEFAULT NULL,
  `comment` text,
  `deleted_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'superadmin', '$2y$10$yYYzHLwvEYMMfcS2J0Z4COHpE45zCdFbiXsEugrjnPs1GfYV2M1Hi', 'admin@admin.com', 'Tarek', 'Raihan', '65646546', 1),
(11, 'tarek', '$2y$10$A21I.00hMH0WMELp2OD3U.Zowx4RpqfJmxIq9HuKWsPXQn23b5/NO', 'tarekraihan@yahoo.com', 'Tarek', 'Raihan', '1911222952', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 4),
(8, 7, 4),
(9, 8, 4),
(10, 9, 5),
(11, 10, 5),
(12, 11, 7),
(13, 12, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_members`
--
ALTER TABLE `temp_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_members`
--
ALTER TABLE `temp_members`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
