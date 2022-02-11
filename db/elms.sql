-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 06:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `app_status`
--

CREATE TABLE `app_status` (
  `status_id` int(11) NOT NULL,
  `app_status_code` varchar(10) NOT NULL,
  `app_status_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_status`
--

INSERT INTO `app_status` (`status_id`, `app_status_code`, `app_status_description`) VALUES
(1, 'P', 'Pending'),
(2, 'A', 'Approved'),
(3, 'R', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `designation_lookup`
--

CREATE TABLE `designation_lookup` (
  `designation_id` int(11) NOT NULL,
  `designation_name` text NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `escalation_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_lookup`
--

INSERT INTO `designation_lookup` (`designation_id`, `designation_name`, `grade`, `escalation_level`) VALUES
(1, 'Data Coder', 15, 3),
(3, 'Manager', 19, 2),
(4, 'Assistant Director', 17, 2),
(5, 'Deputy Director', 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `des_code` int(11) DEFAULT NULL,
  `section_code` int(11) DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_on` date DEFAULT current_timestamp(),
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--



-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_balance`
--

CREATE TABLE `employee_leave_balance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `balance_casual` int(11) DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_on` date DEFAULT current_timestamp(),
  `balance_earned` int(11) DEFAULT NULL,
  `balance_rnr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_leave_balance`
--

INSERT INTO `employee_leave_balance` (`id`, `emp_id`, `balance_casual`, `created_by`, `created_on`, `balance_earned`, `balance_rnr`) VALUES
(3, 5, 24, 'Ramsha Ahmed', '2021-12-30', 43, 15),
(4, 6, 25, 'Ramsha Ahmed', '2022-01-12', 40, 15),
(5, 7, 25, 'Ramsha Ahmed', '2022-01-17', 45, 15);

-- --------------------------------------------------------

--
-- Table structure for table `leave_history_table`
--

CREATE TABLE `leave_history_table` (
  `main_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `applied_by` varchar(500) NOT NULL,
  `start_date` date DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `days` int(11) NOT NULL,
  `address_on_leave` varchar(500) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `assigned_to` varchar(500) DEFAULT NULL,
  `recommended_by` varchar(500) DEFAULT NULL,
  `approved_by` varchar(500) DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT '''Pending''',
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_history_table`
--

INSERT INTO `leave_history_table` (`main_id`, `leave_id`, `emp_id`, `applied_by`, `start_date`, `end_date`, `days`, `address_on_leave`, `reason`, `assigned_to`, `recommended_by`, `approved_by`, `status`, `feedback`) VALUES
(1, 1, 6, 'Uzair Rizwan', '2022-01-14', '2022-01-15', 1, 'lahore', 'sick', NULL, NULL, NULL, 'Rejected', NULL),
(3, 2, 6, 'Uzair Rizwan', '2022-01-17', '2022-01-22', 5, 'lahore', 'sick', 'Fatima', 'Bushra', NULL, 'Approved', 'Application Approved'),
(2, 1, 5, 'Fatima Mubashir', '2022-01-15', '2022-01-16', 1, 'lhrrrr', 'sick', 'Bushra', 'Ramsha', 'Ramsha Ahmed', 'Approved', 'Application Approved'),
(4, 2, 5, 'Fatima Mubashir', '2022-01-29', '2022-01-21', 8, 'lahoree', 'sick', NULL, NULL, NULL, 'Rejected', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_lookup`
--

CREATE TABLE `leave_lookup` (
  `leave_id` int(11) NOT NULL,
  `leave_description` text DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_lookup`
--

INSERT INTO `leave_lookup` (`leave_id`, `leave_description`, `days`, `created_by`, `created_on`) VALUES
(1, 'Casual Leave', 25, 'Ramsha Ahmed', '2021-12-14'),
(2, 'Earned Leave', 45, 'Ramsha Ahmed', '2021-12-14'),
(3, 'Rest and Recuperation', 15, 'Ramsha Ahmed', '2021-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `main_leave_table`
--

CREATE TABLE `main_leave_table` (
  `main_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `applied_by` varchar(500) NOT NULL,
  `start_date` date DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `days` int(11) NOT NULL,
  `address_on_leave` varchar(500) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `assigned_to` varchar(500) DEFAULT NULL,
  `recommended_by` varchar(500) DEFAULT NULL,
  `approved_by` varchar(500) DEFAULT NULL,
  `status` varchar(500) NOT NULL DEFAULT '''Pending''',
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_leave_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` text NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `created_by` text DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `created_on`, `created_by`) VALUES
(1, 'CCNB', '2021-12-13', 'Anum tariq'),
(4, 'New Billing', '2021-12-14', 'Ramsha Ahmed'),
(6, 'CIS', '2021-12-14', 'Ramsha Ahmed'),
(7, 'Admin', '2021-12-14', 'Ramsha Ahmed'),
(8, 'HR', '2021-12-14', 'Ramsha Ahmed'),
(9, 'AMI', '2021-12-14', 'Ramsha Ahmed'),
(10, 'BA', '2021-12-20', 'Ramsha Ahmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `app_status`
--
ALTER TABLE `app_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `designation_lookup`
--
ALTER TABLE `designation_lookup`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_leave_balance`
--
ALTER TABLE `employee_leave_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_lookup`
--
ALTER TABLE `leave_lookup`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `main_leave_table`
--
ALTER TABLE `main_leave_table`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `app_status`
--
ALTER TABLE `app_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation_lookup`
--
ALTER TABLE `designation_lookup`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_leave_balance`
--
ALTER TABLE `employee_leave_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_lookup`
--
ALTER TABLE `leave_lookup`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `main_leave_table`
--
ALTER TABLE `main_leave_table`
  MODIFY `main_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
