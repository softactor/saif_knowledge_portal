-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 10:05 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saif_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '1=normal customer; 2=dealer',
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `addr_division` int(11) NOT NULL,
  `addr_district` int(11) NOT NULL,
  `addr_upazila` int(11) DEFAULT NULL,
  `addr_union` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `is_using_product` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not suing product',
  `is_anyone_contact` tinyint(1) DEFAULT '0' COMMENT '0= no one contact',
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=customer or user is active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `division_id`, `user_type`, `first_name`, `last_name`, `addr_division`, `addr_district`, `addr_upazila`, `addr_union`, `dob`, `email`, `contact`, `is_using_product`, `is_anyone_contact`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 'Tanveer', 'Qureshee', 5, 18, 0, 0, '2019-11-15', '', '01716600843', 0, 0, 0, '0000-00-00', '0000-00-00 00:00:00', 1),
(2, 5, 1, 'Jalil', 'vv', 2, 41, 0, 0, '2019-11-25', '', '01716600844', 0, 0, 0, '0000-00-00', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
