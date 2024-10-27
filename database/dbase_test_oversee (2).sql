-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 12:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase_test_oversee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  `PROFILE` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `USERNAME`, `PASSWORD`, `NAME`, `ROLE`, `PROFILE`) VALUES
(16, 'root', 'root', 'root', 'SysAdmin', 0x50656173616e745f5965735f4d694c6f72642e706e67),
(50, 'IT', 'IT', 'IT', 'IT Dept', ''),
(51, 'ENGR', 'ENGR', 'ENGR', 'Engr Dept', ''),
(53, 'zxc', 'zxc', 'zxc', 'SysAdmin', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `EMP_NAME` varchar(255) NOT NULL,
  `AMLOGIN` time NOT NULL,
  `AMLOGIN_STATUS` varchar(50) NOT NULL,
  `PMLOGOUT` time NOT NULL,
  `PMLOGOUT_STATUS` varchar(50) NOT NULL,
  `CURRENTDATE` date NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `EMP_NAME`, `AMLOGIN`, `AMLOGIN_STATUS`, `PMLOGOUT`, `PMLOGOUT_STATUS`, `CURRENTDATE`, `STATUS`) VALUES
(22, 'zxc zxc zxc', '15:08:42', 'LATE', '14:43:50', 'UNDERTIME', '2024-07-21', '1'),
(23, 'jonel jonel jonel', '15:08:42', 'LATE', '15:08:55', 'UNDERTIME', '2024-08-26', '1'),
(24, 'asd asd asd', '15:10:42', 'LATE', '14:43:50', 'UNDERTIME', '2024-07-21', '1'),
(26, 'jonel jonel jonel', '14:43:50', 'LATE', '14:43:50', 'UNDERTIME', '2024-10-26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `DEPARTMENT_NAME` varchar(100) NOT NULL,
  `DEPARTMENT_TIME_IN` time NOT NULL,
  `DEPARTMENT_TIME_OUT` time NOT NULL,
  `DEPARTMENT_OVERTIME` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `DEPARTMENT_NAME`, `DEPARTMENT_TIME_IN`, `DEPARTMENT_TIME_OUT`, `DEPARTMENT_OVERTIME`) VALUES
(1, 'IT Dept', '06:00:00', '15:00:00', '17:00:00'),
(9, 'Engr Dept', '06:00:00', '15:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(255) NOT NULL,
  `MI` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `DATE_OF_BIRTH` varchar(100) NOT NULL,
  `CIVIL_STATUS` varchar(50) NOT NULL,
  `NATIONALITY` varchar(50) NOT NULL,
  `ROLE` varchar(100) NOT NULL,
  `DEPARTMENT` varchar(100) NOT NULL,
  `PROFILE` longblob NOT NULL,
  `GENDER` varchar(25) NOT NULL,
  `OT` varchar(50) NOT NULL,
  `EMP_KEY` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `FNAME`, `MI`, `LNAME`, `EMAIL`, `PASSWORD`, `CONTACT`, `DATE_OF_BIRTH`, `CIVIL_STATUS`, `NATIONALITY`, `ROLE`, `DEPARTMENT`, `PROFILE`, `GENDER`, `OT`, `EMP_KEY`, `TYPE`) VALUES
(10, 'zxc', 'zxc', 'zxc', 'zxc@oversee.com', '5fa72358f0b4fb4f2c5d7de8c9a41846', '1234', '2024-07-21', 'Single', 'Philippines, Filipino', 'Backend Developer', 'Engr Dept', 0x41554c4f474f2e706e67, 'Female', 'Deactivated', 'OS2024-KkTZUWzb', 'User'),
(11, 'jonel', 'jonel', 'jonel', 'jonel@oversee.com', '12a9928698ae76fbaaae9a2627fefff9', '1234', '2024-07-31', 'Single', 'Philippines, Filipino', 'Backend Developer', 'IT Dept', 0x41554c4f474f2e706e67, 'Male', 'Activated', 'OS2024-4bj02m7t', 'User'),
(12, 'asd', 'asd', 'asd', 'asd@oversee.com', '7815696ecbf1c96e6894b779456d330e', '12344444', '2024-08-26', 'Single', 'Philippines, Filipino', 'Programmer', 'IT Dept', '', 'Female', 'Deactivated', 'OS2024-sFS5juaJ', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ROLE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(100) NOT NULL,
  `DEPT_DESIGNATED` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `ROLE_NAME`, `DEPT_DESIGNATED`) VALUES
(1, 'Programmer', 'IT Dept'),
(2, 'Backend Developer', 'Engr Dept'),
(5, 'Lead Programmer', 'IT Dept');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
