-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2023 at 02:35 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `tblcandidate`
--

CREATE TABLE `tblcandidate` (
  `id` bigint(50) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `post` longtext NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcandidate`
--

INSERT INTO `tblcandidate` (`id`, `fullname`, `post`, `picture`) VALUES
(1, 'Olaoye Miracle Tiwatoba', 'President', '42caf475bf1a463d882233e16a46cb2b.jpg'),
(2, 'Oladiti Pelumi Micheal', 'President', '8f6346a3ff70401ca854467dc37d3ac8.jpg'),
(3, 'Adeleke John', 'Vice President', '1578415618998.jpg'),
(4, 'Emmanuel Adeboye', 'General Secretary', 'IMG_20190726_140644_0.jpg'),
(5, 'Akinremi Moyinoluwa Maheedat', 'Financial Secretary', '3b9618f2ca8b4840a9b96fe10dee8f69.jpg'),
(6, 'Oyenekan Miriam', 'Financial Secretary', '6ddf1f4674434e3d837150883701f97d.jpg'),
(7, 'Erinle David', 'Treasurer', '6ea6caa931d24e20aeda04a7d7ddfe59.jpg'),
(8, 'Official Kings', 'Treasurer', '77dfae1751ad455494a1b08ed9530e24.jpg'),
(9, 'Sapa Man Jake', 'Treasurer', '80961e5f33124024a316448705261d2a.jpg'),
(10, 'Afolabi Temitope Emmanuel', 'Software Director 1', '52067e8e180543ec96188ce9cd6d0a80.jpg'),
(11, 'Adebiyi Oluwaseun', 'Software Director 1', 'b6fe752a661b4394a64b3a8ec90397a6.jpg'),
(12, 'Imade Ayorinde', 'Welfare Director 1', '4417555cacf141a69556c47c69f6c703.jpg'),
(13, 'Oyenekan Victor', 'Social Director 1', 'IMG-20200226-WA0044.jpg'),
(14, 'Charles Mainz', 'Sport Director 1', '05e24cb798b744359496cf9f994504a1.jpg'),
(15, 'Kiss Daniel', 'Sport Director 1', 'Snapchat-172743047 (1).jpg'),
(16, 'Babagana Ibrahim', 'PRO 1', '0c37a8017a324a70836f78465a8da67e.jpg'),
(17, 'Ayomide Badmus', 'PRO 1', '1c5a8ccc44484191a0f9f8ad07dbaea5.jpg'),
(18, 'Eniola Musa', 'PRO 1', '6c3dbfd7ef87494787745450aeac6b54.jpg'),
(19, 'Tobiloba Ajewole', 'Auditor', '58aeb6935a04490c89c0bd14351959f3(1).jpg'),
(20, 'Babatunde Ayotunde', 'Auditor', '409cf19497414de8892698b12c718e5f.jpg'),
(21, 'Emmanuel Emmanuel', 'Software Director 2', 'Snapchat-1149038310.jpg'),
(22, 'Oyetoro Kiffayat', 'Welfare Director 2', '1ebe88bd4eb14ea5b78a97548262c67e.jpg'),
(23, 'Alicia Keys', 'Welfare Director 2', '4e247af595f442b2abf2cd1e1c3b73c8.jpg'),
(24, 'Oyedepo Damilola', 'Social Director 2', '9b1be843ae1f4e3c84d8f91b15b649bb.jpg'),
(25, 'Feranmi Adegbite', 'Social Director 2', '2507df408d07409581f1ae4318a3e74f.jpg'),
(26, 'Michael Poet', 'Sport Director 2', '8a2e00910c5045b7b2cd4313a3dbd586.jpg'),
(27, 'Oluwadusin Badmus', 'Sport Director 2', '46b9445823d04e4b973e452b54c064a2.jpg'),
(28, 'Akinyemi Funmilayo', 'PRO 2', '738d03f8fafc4dd2ad904f7b93fd8c66.jpg'),
(29, 'Olalade Asake', 'PRO 2', '1ca740ded7014d639af560ebf7ba2dd9.jpg');

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
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `email`, `receipt_no`, `amount_paid`, `payment_status`, `date_paid`, `section`) VALUES
(1, 'bolaji2622@gmail.com', 'nacostpi-637ce971c5a8c511388106', '1500.00', 1, '2022-11-22 14:23:53', '2022/2023'),
(2, 'oluwayemi2019@gmail.com', 'nacostpi-637ce9d9a1798337975669', '1500.00', 1, '2022-11-22 14:25:26', '2022/2023'),
(3, 'abimbolaajeigbe@gmail.com', 'nacostpi-637cea8cc2841607212345', '1500.00', 1, '2022-11-22 14:28:26', '2022/2023'),
(4, 'tlux75127@gmail.com', 'nacostpi-637ceb949f37c271785094', '1500.00', 1, '2022-11-22 14:32:52', '2022/2023'),
(5, 'adeboluwatife016@gmail.com', 'nacostpi-637cec15eeb8c712088808', '1500.00', 1, '2022-11-22 14:34:56', '2022/2023'),
(6, 'oluwaferanmiruth001@gmail.com', 'nacostpi-637cec4c8e739823723367', '1500.00', 1, '2022-11-22 14:36:04', '2022/2023'),
(7, 'adejolaobasa02@gmail.com', 'nacostpi-637cecaee6159446619354', '1500.00', 1, '2022-11-22 14:37:42', '2022/2023'),
(8, 'gabrieloyeleke27@gmail.com', 'nacostpi-637ceca990c15324461643', '1500.00', 1, '2022-11-22 14:37:49', '2022/2023'),
(9, 'meshackrotimi@gmail.com', 'nacostpi-637ced6124f18991823551', '1500.00', 1, '2022-11-22 14:40:35', '2022/2023'),
(10, 'emmanueltobi169@gmail.com', 'nacostpi-637cedc610826821491401', '1500.00', 1, '2022-11-22 14:42:11', '2022/2023'),
(11, 'charlestemmyj@gmail.com', 'nacostpi-637cee353d199975517835', '1500.00', 1, '2022-11-22 14:44:13', '2022/2023'),
(12, 'syivolrazy@gmail.com', 'nacostpi-637ceed7806f0532695390', '1500.00', 1, '2022-11-22 14:46:48', '2022/2023'),
(13, 'oluwaseunayo21@gmail.com', 'nacostpi-637cefad8ea2e855890509', '1500.00', 1, '2022-11-22 14:50:26', '2022/2023'),
(14, 'afolabi8120@gmail.com', 'nacostpi-637cf04ae81e3828283625', '1500.00', 1, '2022-11-22 14:52:54', '2022/2023'),
(15, 'babarimisa@gmail.com', 'nacostpi-637cf24968804304570285', '1500.00', 1, '2022-11-22 15:01:27', '2022/2023'),
(16, 'olawoyinadewale5@gmail.com', 'nacostpi-637cf2c57ab0e303961298', '1500.00', 1, '2022-11-22 15:03:27', '2022/2023'),
(17, 'samuelfiyinfoluwagrace@gmail.com', 'nacostpi-637cf366177fd185912456', '1500.00', 1, '2022-11-22 15:06:08', '2022/2023'),
(18, 'gabrieljesuniyi@yahoo.com', 'nacostpi-637cf3cb72351120136315', '1500.00', 1, '2022-11-22 15:07:51', '2022/2023'),
(19, 'goldmichaelolas@gmail.com', 'nacostpi-637cf4485225f420024563', '1500.00', 1, '2022-11-22 15:09:55', '2022/2023'),
(20, 'isiakabubak@gmail.com', 'nacostpi-637cf4d0dd6f2541536013', '1500.00', 1, '2022-11-22 15:12:20', '2022/2023'),
(21, 'alomajatoyin50@gmail.com', 'nacostpi-6387dc2d37d80160579280', '1500.00', 1, '2022-11-30 21:42:26', '2022/2023'),
(22, 'ruthoke99@gmail.com', 'nacostpi-6387dc5bba8c8201749921', '1500.00', 1, '2022-11-30 21:43:33', '2022/2023'),
(23, 'isaja@gmail.com', 'jdjkdkdksdkdkl', '2000.00', 1, '2023-01-07 23:16:33', '2022/2023');

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
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `usertype` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `matricno`, `fullname`, `email`, `phone`, `gender`, `program`, `level`, `password`, `status`, `picture`, `nacos_id`, `session`, `usertype`, `section`) VALUES
(1, 'Afolabi', 'Afolabi Temidayo Timothy', 'admin@nacostpi.com', '07049269626', 'Male', '', '', '$2y$10$cU8m1CtnPiMoT9idyzWphuSaG8FMMzmOmS.Pn2SDLBgpz.AJDJTTy', 'Active', '1577924519998.jpg', '', 'urstlfl4f7rnk65piiv123tv1m', 'Super Admin', ''),
(2, '2017070510136', 'Alade Abolaji', 'bolaji2622@gmail.com', '08126810806', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ce96a69e25.jpg', 'NACOSTPI/SW/POLYIB/0001', '7ql0gm0c2ckmhj38al4e3icc4r', 'Student', '2022/2023'),
(3, '2016235020102', 'Idowu Oluwayemi Isaiah', 'oluwayemi2019@gmail.com', '08088681180', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ce9d644bd9.jpg', 'NACOSTPI/SW/POLYIB/0002', 'n2utr7nlfdo0svn2d7blj5ldde', 'Student', '2022/2023'),
(4, '2017070510480', 'Ajeigbe Abimbola', 'abimbolaajeigbe@gmail.com', '08132617258', 'Female', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cea858e7d6.jpg', 'NACOSTPI/SW/POLYIB/0003', '5dvvajnt744cn0gj7eb7oke7cj', 'Student', '2022/2023'),
(5, '2020245020052', 'Folarin Olarenwaju', 'tlux75127@gmail.com', '09021658901', 'Male', 'PT', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ceb8f1e2c8.jpg', 'NACOSTPI/SW/POLYIB/0004', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(6, '20200705010054', 'Adebiyi Israel Bolu', 'adeboluwatife016@gmail.com', '08028182378', 'Male', 'DPP', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cec1112006.jpg', 'NACOSTPI/SW/POLYIB/0005', 'e25dfe966591de12663040a8593a8616', 'Student', '2022/2023'),
(7, '2016235020184', 'Idowu Oluwaferanmi Ruth', 'oluwaferanmiruth001@gmail.com', '08106037284', 'Female', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cec34b3f50.jpg', 'NACOSTPI/SW/POLYIB/0006', 'e7f017994162aa8d90bca2f2fc010e8d', 'Student', '2022/2023'),
(8, '20200705010012', 'Obasa Adejola Oreoluwa', 'adejolaobasa02@gmail.com', '08065442854', 'Female', 'DPP', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cec8f822fd.jpg', 'NACOSTPI/SW/POLYIB/0007', 'dc1a89572d22c5f7c2b8ea9433312856', 'Student', '2022/2023'),
(9, '2020245020032', 'Oyeleke Gabriel Funsho', 'gabrieloyeleke27@gmail.com', '08121850689', 'Male', 'PT', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ceca618993.jpg', 'NACOSTPI/SW/POLYIB/0008', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(10, '2017070510395', 'Gbenro Rotimi Meshack', 'meshackrotimi@gmail.com', '09065907075', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ced58ad7e4.jpg', 'NACOSTPI/SW/POLYIB/0009', 'qd1itj9bocae1jvglcdklgnh56', 'Student', '2022/2023'),
(11, '2020235020074', 'Idowu Emmanuel Tobiloba', 'emmanueltobi169@gmail.com', '08142147066', 'Male', 'FT', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cedb487807.jpeg', 'NACOSTPI/SW/POLYIB/0010', 'bb139b542d0a1a7cfeb8c30282cf9cf8', 'Student', '2022/2023'),
(12, '2014070501123', 'Erinle Temidayo Charles', 'charlestemmyj@gmail.com', '08162504385', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cee2eec363.jpg', 'NACOSTPI/SW/POLYIB/0011', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(13, '2016070501368', 'Azeez Razaq Kolawole', 'syivolrazy@gmail.com', '08132983340', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637ceed357e3e.jpg', 'NACOSTPI/SW/POLYIB/0012', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(14, 'F2007589', 'Owolabi Oluwaseun Eniafe', 'oluwaseunayo21@gmail.com', '08126740354', 'Male', 'DPP', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cefa860e8f.jpg', 'NACOSTPI/SW/POLYIB/0013', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(15, '2017070510126', 'Afolabi Temidayo Timothy', 'afolabi8120@gmail.com', '08090949669', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '63407511ac6f2.jpg', 'NACOSTPI/SW/POLYIB/0014', 'mag40laqargrdcj34uibdilsal', 'Student', '2022/2023'),
(16, '2019225020004', 'Babarimisa David Oluwabusayo', 'babarimisa@gmail.com', '07055809834', 'Male', 'PT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf2452477b.jpg', 'NACOSTPI/SW/POLYIB/0015', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(17, '2017235020050', 'Olawoyin Waliu Adewale', 'olawoyinadewale5@gmail.com', '08172772461', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf2c248cca.jpg', 'NACOSTPI/SW/POLYIB/0016', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(18, '2020070501023', 'Samuel Fiyinfoluwa Grace', 'samuelfiyinfoluwagrace@gmail.com', '08067354771', 'Male', 'DPP', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf35cbb707.jpg', 'NACOSTPI/SW/POLYIB/0017', '1024ac63e8c1e67fba674dac1cd5b1ad', 'Student', '2022/2023'),
(19, '2017070510647', 'Abayomi Gabriel Mayowa', 'gabrieljesuniyi@yahoo.com', '09014264720', 'Male', 'FT', 'HND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf3c7eec6c.jpg', 'NACOSTPI/SW/POLYIB/0018', 'fc10c7a8711532eaf4973646c12c753c', 'Student', '2022/2023'),
(20, '2020245020017', 'Olasanya Michael Opeyemi', 'goldmichaelolas@gmail.com', '08178011518', 'Male', 'PT', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf444d4a93.jpg', 'NACOSTPI/SW/POLYIB/0019', '5e4b8facfedd8ead767f8439d97a9142', 'Student', '2022/2023'),
(21, '20200705010182', 'Isiak Abubakr Adewale', 'isiakabubak@gmail.com', '08159651656', 'Male', 'DPP', 'ND II', '$2y$10$eOWhFZlk8w.xf1euu8hnbeNrnpHsLwejh4bcoZJT4V7kH/heJK9vq', 'Active', '637cf4c45f323.jpg', 'NACOSTPI/SW/POLYIB/0020', 'b1c2acf66e77b8edfa7ce8cd69a35cfb', 'Student', '2022/2023'),
(25, '2015070501234', 'Oladiti Pelumi Michael', 'oladenisamuel@gmail.com', '09083939383', 'Male', 'FT', 'HND II', '$2y$10$GjCIuLFN3vjadAaSXUZV5ejYNzgJER8pkxcJGu.jMoNHrjAk5SLZG', 'Active', '63b35e79b52c0.jpg', 'NACOSTPI/SW/POLYIB/0021', 'sf9gm2dufc5g7iv6ob96m78tui', 'Student', '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimetable`
--

CREATE TABLE `tbltimetable` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltimetable`
--

INSERT INTO `tbltimetable` (`id`, `title`, `name`, `status`) VALUES
(1, '2022/2023 Academic Session Time Table First Semester', 'TIME TABLE FIRST SEMESTER.pdf', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblvote`
--

CREATE TABLE `tblvote` (
  `id` bigint(50) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `candidate_id` int(2) NOT NULL,
  `post` varchar(100) NOT NULL,
  `student_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvote`
--

INSERT INTO `tblvote` (`id`, `student_id`, `candidate_id`, `post`, `student_level`) VALUES
(6, 'afolabi8120@gmail.com', 2, 'President', 'HND II'),
(7, 'afolabi8120@gmail.com', 3, 'Vice President', 'HND II'),
(8, 'afolabi8120@gmail.com', 4, 'General Secretary', 'HND II'),
(9, 'afolabi8120@gmail.com', 5, 'Financial Secretary', 'HND II'),
(10, 'afolabi8120@gmail.com', 7, 'Treasurer', 'HND II'),
(11, 'afolabi8120@gmail.com', 20, 'Auditor', 'HND II'),
(12, 'afolabi8120@gmail.com', 10, 'Software Director 1', 'HND II'),
(13, 'afolabi8120@gmail.com', 12, 'Welfare Director 1', 'HND II'),
(14, 'afolabi8120@gmail.com', 13, 'Social Director 1', 'HND II'),
(15, 'afolabi8120@gmail.com', 15, 'Sport Director 1', 'HND II'),
(16, 'afolabi8120@gmail.com', 18, 'PRO 1', 'HND II'),
(17, 'afolabi8120@gmail.com', 21, 'Software Director 2', 'HND II'),
(18, 'afolabi8120@gmail.com', 22, 'Welfare Director 2', 'HND II'),
(19, 'afolabi8120@gmail.com', 25, 'Social Director 2', 'HND II'),
(20, 'afolabi8120@gmail.com', 26, 'Sport Director 2', 'HND II'),
(21, 'afolabi8120@gmail.com', 29, 'PRO 2', 'HND II'),
(22, 'bolaji2622@gmail.com', 2, 'President', 'HND II'),
(23, 'bolaji2622@gmail.com', 3, 'Vice President', 'HND II'),
(24, 'bolaji2622@gmail.com', 4, 'General Secretary', 'HND II'),
(25, 'bolaji2622@gmail.com', 6, 'Financial Secretary', 'HND II'),
(26, 'bolaji2622@gmail.com', 7, 'Treasurer', 'HND II'),
(27, 'bolaji2622@gmail.com', 19, 'Auditor', 'HND II'),
(28, 'bolaji2622@gmail.com', 10, 'Software Director 1', 'HND II'),
(29, 'bolaji2622@gmail.com', 12, 'Welfare Director 1', 'HND II'),
(30, 'bolaji2622@gmail.com', 13, 'Social Director 1', 'HND II'),
(31, 'bolaji2622@gmail.com', 14, 'Sport Director 1', 'HND II'),
(32, 'bolaji2622@gmail.com', 18, 'PRO 1', 'HND II'),
(33, 'bolaji2622@gmail.com', 21, 'Software Director 2', 'HND II'),
(34, 'bolaji2622@gmail.com', 23, 'Welfare Director 2', 'HND II'),
(35, 'bolaji2622@gmail.com', 25, 'Social Director 2', 'HND II'),
(36, 'bolaji2622@gmail.com', 26, 'Sport Director 2', 'HND II'),
(37, 'bolaji2622@gmail.com', 29, 'PRO 2', 'HND II'),
(40, 'oluwayemi2019@gmail.com', 3, 'Vice President', 'HND II'),
(41, 'oluwayemi2019@gmail.com', 4, 'General Secretary', 'HND II'),
(42, 'oluwayemi2019@gmail.com', 5, 'Financial Secretary', 'HND II'),
(43, 'oluwayemi2019@gmail.com', 8, 'Treasurer', 'HND II'),
(44, 'oluwayemi2019@gmail.com', 20, 'Auditor', 'HND II'),
(45, 'oluwayemi2019@gmail.com', 10, 'Software Director 1', 'HND II'),
(46, 'oluwayemi2019@gmail.com', 12, 'Welfare Director 1', 'HND II'),
(47, 'oluwayemi2019@gmail.com', 13, 'Social Director 1', 'HND II'),
(48, 'oluwayemi2019@gmail.com', 14, 'Sport Director 1', 'HND II'),
(49, 'oluwayemi2019@gmail.com', 17, 'PRO 1', 'HND II'),
(50, 'oluwayemi2019@gmail.com', 21, 'Software Director 2', 'HND II'),
(51, 'oluwayemi2019@gmail.com', 23, 'Welfare Director 2', 'HND II'),
(52, 'oluwayemi2019@gmail.com', 25, 'Social Director 2', 'HND II'),
(53, 'oluwayemi2019@gmail.com', 27, 'Sport Director 2', 'HND II'),
(54, 'oluwayemi2019@gmail.com', 28, 'PRO 2', 'HND II'),
(56, 'oluwayemi2019@gmail.com', 1, 'President', 'HND II'),
(57, 'abimbolaajeigbe@gmail.com', 1, 'President', 'HND II'),
(58, 'abimbolaajeigbe@gmail.com', 3, 'Vice President', 'HND II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcandidate`
--
ALTER TABLE `tblcandidate`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblvote`
--
ALTER TABLE `tblvote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcandidate`
--
ALTER TABLE `tblcandidate`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblvote`
--
ALTER TABLE `tblvote`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
