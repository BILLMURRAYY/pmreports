-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 08:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oprs_new3`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `flow_report` longtext NOT NULL,
  `flow_estimate` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `level`, `flow_report`, `flow_estimate`) VALUES
(2, 'คณบดี', 'boss', 'ไม่มี', 'รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคลากร,กลุ่มงานคลังและพัสดุ,กลุ่มงานอาคารสถานที่และยานพาหนะ ,กลุ่มงานนโยบายและแผน ,กลุ่มงานประกันคุณภาพการศึกษา ,กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ,นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ,นักวิชาการศึกษา กลุ่มงานบริการการศึกษา,นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป ศูนย์วิจัยและพัฒนาทางศิลปศาสตร์ประยุกต์'),
(3, 'รองคณบดีฝ่ายบริหาร', 'staff', 'คณบดี', 'หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคลากร,กลุ่มงานคลังและพัสดุ,กลุ่มงานอาคารสถานที่และยานพาหนะ ,กลุ่มงานนโยบายและแผน ,กลุ่มงานประกันคุณภาพการศึกษา ,กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ,นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ,นักวิชาการศึกษา กลุ่มงานบริการการศึกษา,นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป ศูนย์วิจัยและพัฒนาทางศิลปศาสตร์ประยุกต์'),
(4, 'รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์', 'staff', 'คณบดี', 'หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคลากร,กลุ่มงานคลังและพัสดุ,กลุ่มงานอาคารสถานที่และยานพาหนะ ,กลุ่มงานนโยบายและแผน ,กลุ่มงานประกันคุณภาพการศึกษา ,กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ,นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ,นักวิชาการศึกษา กลุ่มงานบริการการศึกษา,นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป ศูนย์วิจัยและพัฒนาทางศิลปศาสตร์ประยุกต์'),
(5, 'รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา', 'staff', 'คณบดี', 'หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคลากร,กลุ่มงานคลังและพัสดุ,กลุ่มงานอาคารสถานที่และยานพาหนะ ,กลุ่มงานนโยบายและแผน ,กลุ่มงานประกันคุณภาพการศึกษา ,กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ,นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ,นักวิชาการศึกษา กลุ่มงานบริการการศึกษา,นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป ศูนย์วิจัยและพัฒนาทางศิลปศาสตร์ประยุกต์'),
(6, 'หัวหน้าสำนักงานคณบดี', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา', 'กลุ่มงานบริหารและพัฒนาบุคคลกร,กลุ่มงานคลังและพัสดุ,กลุ่มงานอาคารสถานที่และยานพาหนะ ,กลุ่มงานนโยบายและแผน ,กลุ่มงานประกันคุณภาพการศึกษา ,กลุ่มงานบริการการศึกษา,เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพั'),
(7, 'กลุ่มงานบริหารและพัฒนาบุคลากร', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร,ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร'),
(8, 'กลุ่มงานคลังและพัสดุ', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ,นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ'),
(9, 'กลุ่มงานอาคารสถานที่และยานพาหนะ ', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'ไม่มี'),
(10, 'กลุ่มงานนโยบายและแผน ', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'ไม่มี'),
(11, 'กลุ่มงานประกันคุณภาพการศึกษา ', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'ไม่มี'),
(12, 'กลุ่มงานบริการการศึกษา', 'staff', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี', 'นักวิชาการศึกษา กลุ่มงานบริการการศึกษา,นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา'),
(13, 'เจ้าหน้าที่บริหารงานทั่วไป กลุ่มงานบริหารและพัฒนาบุคลากร', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคคลกร', 'ไม่มี'),
(14, 'ผู้ปฏิบัติงานบริหาร กลุ่มงานบริหารและพัฒนาบุคลากร', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริหารและพัฒนาบุคลากร', 'ไม่มี'),
(15, 'ผู้ปฏิบัติงานบริหาร กลุ่มงานคลังและพัสดุ', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานคลังและพัสดุ', 'ไม่มี'),
(16, 'นักวิชาการเงินและบัญชี กลุ่มงานคลังและพัสดุ', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานคลังและพัสดุ', 'ไม่มี'),
(17, 'นักวิชาการศึกษา กลุ่มงานบริการการศึกษา', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริการการศึกษา', 'ไม่มี'),
(18, 'นักวิชาการคอมพิวเตอร์ กลุ่มงานบริการการศึกษา', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริการการศึกษา', 'ไม่มี'),
(19, 'เจ้าหน้าที่บริหารงานทั่วไป ศูนย์วิจัยและพัฒนาทางศิลปศาสตร์ประยุกต์', 'employee', 'คณบดี,รองคณบดีฝ่ายบริหาร,รองคณบดีฝ่ายวิชาการและวิเทศสัมพันธ์,รองคณบดีฝ่ายวิจัยและประกันคุณภาพการศึกษา,หัวหน้าสำนักงานคณบดี,กลุ่มงานบริการการศึกษา', 'ไม่มี'),
(36, 'หัวงานr', 'admin', 'ไม่มี', 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) UNSIGNED NOT NULL,
  `header` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `header`, `detail`, `date`) VALUES
(1, 'test1', 'ส่งข้อเสนอแนะ', '2022-05-28 11:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`) VALUES
(1, 'root', 'b0baee9d279d34fa1dfd71aadb908c3f');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `username`, `tel`, `status`, `department_id`) VALUES
(1, 'นิธิภัทร กิจสำเร็จ', 's6104062616139', '0826883936', 'พนักงานมหาวิทยาลัย', 3),
(3, 'เจษฎา นันติ', 's6104062616066', '0800000000', 'พนักงานมหาวิทยาลัย', 2),
(4, 'กฤติน สังขรัตน์', 's6104062636211', '0800000000', 'พนักงานมหาวิทยาลัย', 16),
(5, 'รักษ์ขณาถาวร ฤกษ์ชนะ', 'ruxkanathawornr', '0800000000', 'พนักงานมหาวิทยาลัย', 6),
(6, 'ไสว เขมา', 'sawai.k', '0000000000', 'พนักงานมหาวิทยาลัย', 14),
(7, 'อุมาพร ชุ่มนาค', 'umaporn.c', '0000000000', 'พนักงานมหาวิทยาลัย', 15),
(8, 'พรเพ็ญ รักชูชื่น', 'phonpen.r', '0000000000', 'พนักงานมหาวิทยาลัย', 8),
(9, 'พรภิรมย์ แก้วมีแสง', 'pornpirom.k', '0000000000', 'พนักงานมหาวิทยาลัย', 12),
(10, 'นิตยา หาญโอฬารเลิศ', 'nittaya.h', '0000000000', 'พนักงานมหาวิทยาลัย', 17),
(11, 'สาวสริตา สุวรรณแสนศักดิ์', 'sarita.s', '0000000000', 'พนักงานมหาวิทยาลัย', 17),
(12, 'นิติรัฐ สุวรรณเกษา', 'nitirat.s', '0000000000', 'พนักงานมหาวิทยาลัย', 18),
(13, 'นภาอร เกษมจิต', 'napaorn.k', '', 'พนักงานมหาวิทยาลัย', 19),
(14, 'ศิริอรพิมพ์ สัณหจันทร์', 'sirionpim.s', '', 'พนักงานมหาวิทยาลัย', 10),
(15, 'วันศิริ เจาตระกูล', 'wansiri.c', '', 'พนักงานมหาวิทยาลัย', 11),
(16, 'นิภาพร ธรรมชูเชาวรัตน์', 'nipaporn.t', '', 'พนักงานมหาวิทยาลัย', 16),
(17, 'กอบสิทธิ์ แดดภู่', 'kobsit.d', '', 'พนักงานมหาวิทยาลัย', 12),
(18, 'ประสิทธิ์ มาลัย', 'prasit.m', '', 'พนักงานมหาวิทยาลัย', 9),
(19, 'สุนทรี ศักดิ์ศรี', 'soontaree.s', '', 'พนักงานมหาวิทยาลัย', 3),
(20, 'วัชรี ไพสาทย์', 'watcharee.p', '', 'พนักงานมหาวิทยาลัย', 4),
(21, 'ปิ่นกนก วงศ์ปิ่นเพ็ชร์', 'pinkanok.w', '', 'พนักงานมหาวิทยาลัย', 5),
(22, 'มานพ ชูนิล', 'manop.c', '', 'พนักงานมหาวิทยาลัย', 2),
(39, 'นิธิภัทร กิจสำเร็จ', 'root', '0800000000', 'พนักงานมหาวิทยาลัย', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) UNSIGNED NOT NULL,
  `header` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `workplace` varchar(50) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `success` int(11) NOT NULL,
  `working_range_start` date NOT NULL,
  `working_range_end` date NOT NULL,
  `problem` longtext NOT NULL,
  `his_success` varchar(255) NOT NULL,
  `his_date` varchar(255) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `header`, `detail`, `workplace`, `job_type`, `success`, `working_range_start`, `working_range_end`, `problem`, `his_success`, `his_date`, `file`) VALUES
(3, 'test1', 'test1', 'สำนักงาน', 'งานประจำ', 90, '2022-05-23', '2022-05-28', '', '0,50', '2022-05-25,2022-05-27', '202205281984381766.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `send_feedback`
--

CREATE TABLE `send_feedback` (
  `send_feedback_id` int(11) UNSIGNED NOT NULL,
  `member_send_id` int(11) UNSIGNED NOT NULL,
  `member_receive_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `sf_sent_report_id` int(11) UNSIGNED NOT NULL,
  `feedback_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_feedback`
--

INSERT INTO `send_feedback` (`send_feedback_id`, `member_send_id`, `member_receive_id`, `date`, `status`, `sf_sent_report_id`, `feedback_id`) VALUES
(1, 3, 1, '2022-05-28 11:05:26', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `send_report`
--

CREATE TABLE `send_report` (
  `send_report_id` int(11) UNSIGNED NOT NULL,
  `member_send_id` int(11) UNSIGNED NOT NULL,
  `department_receive` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `report_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_report`
--

INSERT INTO `send_report` (`send_report_id`, `member_send_id`, `department_receive`, `date`, `report_id`) VALUES
(3, 1, 'คณบดี', '2022-05-28 11:05:26', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `department_id_fk` (`department_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `send_feedback`
--
ALTER TABLE `send_feedback`
  ADD PRIMARY KEY (`send_feedback_id`),
  ADD KEY `member_send_id_fk` (`member_send_id`),
  ADD KEY `member_receive_id_fk` (`member_receive_id`),
  ADD KEY `feedback_id_fk` (`feedback_id`),
  ADD KEY `sf_sent_report_id_fk` (`sf_sent_report_id`);

--
-- Indexes for table `send_report`
--
ALTER TABLE `send_report`
  ADD PRIMARY KEY (`send_report_id`),
  ADD KEY `member_sent_id_fk` (`member_send_id`),
  ADD KEY `report_id_fk` (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `send_feedback`
--
ALTER TABLE `send_feedback`
  MODIFY `send_feedback_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `send_report`
--
ALTER TABLE `send_report`
  MODIFY `send_report_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `department_id_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `send_feedback`
--
ALTER TABLE `send_feedback`
  ADD CONSTRAINT `feedback_id_fk` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`),
  ADD CONSTRAINT `member_receive_id_fk` FOREIGN KEY (`member_receive_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `member_send_id_fk` FOREIGN KEY (`member_send_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `sf_sent_report_id_fk` FOREIGN KEY (`sf_sent_report_id`) REFERENCES `report` (`report_id`);

--
-- Constraints for table `send_report`
--
ALTER TABLE `send_report`
  ADD CONSTRAINT `member_sent_id_fk` FOREIGN KEY (`member_send_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `report_id_fk` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
