-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 09:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblexco`
--

CREATE TABLE `tblexco` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `post` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbllibrary`
--

CREATE TABLE `tbllibrary` (
  `id` bigint(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpastquestion`
--

CREATE TABLE `tblpastquestion` (
  `id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `material` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpastquestion`
--

INSERT INTO `tblpastquestion` (`id`, `title`, `level`, `semester`, `course_code`, `material`, `status`, `date`) VALUES
(1, 'Client Server Web Development', 'HND II', 'First Semester', 'COM 411', 'COM 411 - Client Server.pdf', 'Active', '2022-10-07 19:08:08'),
(2, 'Python Programming', 'HND I', 'First Semester', 'COM 315', 'Python Note.docx', 'Active', '2022-10-07 19:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `email`, `receipt_no`, `amount_paid`, `payment_status`, `date_paid`) VALUES
(1, 'afolabi8120@gmail.com', 'nacostpi-634076e2c0482766856481', '1000.00', 1, '2022-10-07 18:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` bigint(20) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `date_added` varchar(20) NOT NULL,
  `post_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreset`
--

CREATE TABLE `tblreset` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `level` text NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` bigint(50) NOT NULL,
  `matricno` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `nacos_id` varchar(100) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `matricno`, `fullname`, `email`, `phone`, `gender`, `program`, `level`, `password`, `status`, `picture`, `nacos_id`, `session`, `usertype`) VALUES
(1, 'Afolabi', 'Afolabi Temidayo Timothy', 'admin@nacostpi.com', '07049269626', 'Male', '', '', '$2y$10$Y4RCXkTG407QxizS8XMTGuco4AuJYfwPjXmjAcDXix3rEhPgVTqR.', 'Active', '1577924519998.jpg', '', 'j3c5nb4vqhv7ibtdec62g7cbck', 'Super Admin'),
(2, '2017070510126', 'Afolabi Temidayo Timothy', 'afolabi8120@gmail.com', '08090949669', 'Male', 'FT', 'HND II', '$2y$10$cB1KA8emKH/0w3zqgvgBDOCb8WiozJShjMk/X01VNQAKeLQ..sKxq', 'Active', '63407511ac6f2.jpg', 'NACOSTPI/SW/POLYIB/0001', 'j3c5nb4vqhv7ibtdec62g7cbck', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimetable`
--

CREATE TABLE `tbltimetable` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltimetable`
--

INSERT INTO `tbltimetable` (`id`, `title`, `name`, `status`) VALUES
(1, '2022/2023 Academic Session Time Table First Semest', 'TIME TABLE FIRST SEMESTER.pdf', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexco`
--
ALTER TABLE `tblexco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllibrary`
--
ALTER TABLE `tbllibrary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpastquestion`
--
ALTER TABLE `tblpastquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreset`
--
ALTER TABLE `tblreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexco`
--
ALTER TABLE `tblexco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllibrary`
--
ALTER TABLE `tbllibrary`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpastquestion`
--
ALTER TABLE `tblpastquestion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreset`
--
ALTER TABLE `tblreset`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
