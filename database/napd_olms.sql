-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 08:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `napd_olms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admnusers`
--

CREATE TABLE `admnusers` (
  `admin_user_id` int(11) NOT NULL,
  `admin_user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admnusers`
--

INSERT INTO `admnusers` (`admin_user_id`, `admin_user_name`, `email`, `password`, `code`) VALUES
(1, 'Md. Nasarul Hasan', 'nasarulhasan@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(2, 'Hasan', 'nasarulhasan@yahoo.com', '202cb962ac59075b964b07152d234b70', 'a33753506149ecf0f8e3ab9282f49aaf');

-- --------------------------------------------------------

--
-- Table structure for table `bg`
--

CREATE TABLE `bg` (
  `id` int(11) NOT NULL,
  `bg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bg`
--

INSERT INTO `bg` (`id`, `bg`) VALUES
(1, 'A(+)'),
(2, 'A(-)'),
(3, 'B(+)'),
(4, 'B(-)'),
(5, 'O(+)'),
(6, 'O(-)'),
(7, 'AB(+)'),
(8, 'AB(-)');

-- --------------------------------------------------------

--
-- Table structure for table `facilitatorusers`
--

CREATE TABLE `facilitatorusers` (
  `facilitator_user_id` int(11) NOT NULL,
  `facilitator_user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilitatorusers`
--

INSERT INTO `facilitatorusers` (`facilitator_user_id`, `facilitator_user_name`, `email`, `password`, `code`) VALUES
(1, 'Md. Nasarul Hasan', 'nasarulhasan@gmail.com', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `ppt` varchar(200) NOT NULL,
  `discription` varchar(800) NOT NULL,
  `thumbnail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`course_id`, `course_name`, `duration`) VALUES
(1, 'Post Graduate Diploma in ICT for Development ', '01 January, 2021 to 30 December, 2021'),
(2, 'Special Foundation Training Course for BCS (Health) Cadre Officers', '20 February, 2022 - 17 April, 2022'),
(3, 'Microsoft Project', '06 February, 2022 to 23 February, 2022'),
(4, 'Cyber Security ', '06 February, 2022 to 03 March, 2022'),
(5, 'Post Graduate Diploma in Development Planning', '23 January, 2022 to 31 December, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `tblfacilitator`
--

CREATE TABLE `tblfacilitator` (
  `facilitator_id` int(11) NOT NULL,
  `facilitator_name` text NOT NULL,
  `designation` text NOT NULL,
  `organization` text NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfacilitator`
--

INSERT INTO `tblfacilitator` (`facilitator_id`, `facilitator_name`, `designation`, `organization`, `email`, `mobile`, `image`) VALUES
(1, 'Md. Nasarul Hasan', 'Personal Officer', 'Cabinet Division', 'nasarulhasan@gmail.com', '01552457194', '1644730556_6268.jpg'),
(2, 'Afroza Najnin Asha', 'Professor of House', 'Dhaka University', 'afrozanajnin@gmail.com', '01682477099', '1644730623_5880.jpg'),
(3, 'Md. Thamidul Hasan', 'Class Seven', 'Udayon School', 'thamidulhasan@gmail.com', '02147483647', '1644730669_1700.jpg'),
(4, 'Ahmed Khalil', 'Professior', 'Dhaka University, Bangladesh', 'ahmedkhalil@gmail.com', '01555555555', '1661521856_3360.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfacilitatorcopy`
--

CREATE TABLE `tblfacilitatorcopy` (
  `facilitator_id` int(11) NOT NULL DEFAULT 0,
  `facilitator_name` text NOT NULL,
  `designation` text NOT NULL,
  `organization` text NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfacilitatorcopy`
--

INSERT INTO `tblfacilitatorcopy` (`facilitator_id`, `facilitator_name`, `designation`, `organization`, `email`, `mobile`, `image`) VALUES
(1, 'Md. Nasarul Hasan', 'Personal Officer', 'Cabinet Division', 'nasarulhasan@gmail.com', '01552457194', '1644730556_6268.jpg'),
(2, 'Afroza Najnin Asha', 'Professor of House', 'Dhaka University', 'afrozanajnin@gmail.com', '01682477099', '1644730623_5880.jpg'),
(3, 'Md. Thamidul Hasan', 'Class Seven', 'Udayon School', 'thamidulhasan@gmail.com', '02147483647', '1644730669_1700.jpg'),
(4, 'Ahmed Khalil', 'Professior', 'Dhaka University, Bangladesh', 'ahmedkhalil@gmail.com', '01555555555', '1661521856_3360.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbllecture`
--

CREATE TABLE `tbllecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_name` varchar(255) NOT NULL,
  `lecture_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbllecturecopy`
--

CREATE TABLE `tbllecturecopy` (
  `lecture_id` int(11) NOT NULL DEFAULT 0,
  `facilitator_id` int(11) NOT NULL,
  `lecture_name` varchar(100) NOT NULL,
  `new_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllecturecopy`
--

INSERT INTO `tbllecturecopy` (`lecture_id`, `facilitator_id`, `lecture_name`, `new_name`) VALUES
(1, 2, 'চাঁদা সংগ্রহের ছক.pdf', '1608221660673881চাঁদা সংগ্রহের ছক.pdf'),
(2, 1, 'চাঁদা সংগ্রহের ছক.pdf', '1608221660660589চাঁদা সংগ্রহের ছক.pdf'),
(3, 2, 'draft membership form-CCJ.pdf', '1608221660660572draft membership form-CCJ.pdf'),
(4, 4, 'CCBF94.jpg', '1508221660558809CCBF94.jpg'),
(5, 3, 'draft membership form-CCJ.pdf', '1508221660559218draft membership form-CCJ.pdf'),
(6, 1, 'draft membership form-CCJ.pdf', '1508221660581237draft membership form-CCJ.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subject_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `subject_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subject_id`, `code`, `subject_name`) VALUES
(1, 'ICT-101', 'Fundamentals of ICT and Programming Language'),
(2, 'ICT-111', 'Multimedia System Design'),
(3, 'ICT-107', 'Networking and Data Communication'),
(4, 'ICT-103', 'System Analysis and Design'),
(5, 'ICT-106', 'Web Technology and Cyber Security'),
(6, 'ICT-109', 'e-Governance, e-Commerce & ICT Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcopy`
--

CREATE TABLE `tblsubjectcopy` (
  `subject_id` int(11) NOT NULL DEFAULT 0,
  `course_id` int(11) NOT NULL,
  `subject_name` text NOT NULL,
  `code` varchar(20) NOT NULL,
  `facilitator_id` int(11) NOT NULL,
  `lecture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubjectcopy`
--

INSERT INTO `tblsubjectcopy` (`subject_id`, `course_id`, `subject_name`, `code`, `facilitator_id`, `lecture`) VALUES
(1, 1, 'Fundamentals of ICT and Programming Language', 'ICT-101', 1, '2'),
(2, 1, 'Multimedia System Design', 'ICT-111', 1, '1'),
(3, 2, 'Networking and Data Communication', 'ICT-107', 2, '4'),
(4, 3, 'System Analysis and Design', 'ICT-103', 3, '3'),
(5, 1, 'bbbbbbbbbb ', 'aaaaaaaaaa', 4, 'money_receipt (1).jpg . ');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrainee`
--

CREATE TABLE `tbltrainee` (
  `trainee_id` int(11) NOT NULL,
  `trainee_roll` varchar(20) NOT NULL,
  `trainee_name` text NOT NULL,
  `designation` text NOT NULL,
  `organization` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` text NOT NULL,
  `dob` date NOT NULL,
  `bg` varchar(15) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltrainee`
--

INSERT INTO `tbltrainee` (`trainee_id`, `trainee_roll`, `trainee_name`, `designation`, `organization`, `email`, `mobile`, `dob`, `bg`, `image`) VALUES
(1, '2021PGD4ICT01101', 'Afroza Najnin Asha', 'Professor of Home', 'Home Ministry', 'afrozanajnin@gmail.com', '+8801682477099', '2020-02-02', 'AB(+)', '1644730270_9949.jpg'),
(2, '2021PGD4ICT01102', 'Sadia Sultana', 'Personal Assistant', 'Dhaka University, Bangladesh', 'nasarulhasan@gmail.com', '018147483647', '2022-02-28', 'O(+)', '1644765466_9830.jpg'),
(3, '2021PGD4ICT01103', 'Hasan Mia', 'Personal Officer', 'Cabinet Division', 'afrozanajnin@gmail.com', '2147483647', '1920-02-11', 'AB(-)', '1644730319_9081.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadlecture`
--

CREATE TABLE `tbluploadlecture` (
  `upload_lecture_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `facilitator_id` int(11) NOT NULL,
  `lecture_name` text NOT NULL,
  `lecture_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluploadlecture`
--

INSERT INTO `tbluploadlecture` (`upload_lecture_id`, `course_id`, `subject_id`, `facilitator_id`, `lecture_name`, `lecture_file`) VALUES
(1, 1, 1, 1, 'aaaaaaaaaa', 'SM.jpg'),
(2, 4, 3, 2, 'Trouble shutting and others', 'Program.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadlecturecopy2`
--

CREATE TABLE `tbluploadlecturecopy2` (
  `upload_lecture_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `facilitator_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluploadlecturecopy2`
--

INSERT INTO `tbluploadlecturecopy2` (`upload_lecture_id`, `course_id`, `subject_id`, `facilitator_id`, `lecture_id`) VALUES
(1, 1, 1, 1, 2),
(2, 4, 3, 2, 1),
(3, 3, 2, 3, 2),
(4, 3, 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadvideo`
--

CREATE TABLE `tbluploadvideo` (
  `upload_video_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `facilitator_id` int(11) NOT NULL,
  `video_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `pass`, `created_at`) VALUES
(1, 'hasan', 'hasan', '2022-02-08 12:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `traineeusers`
--

CREATE TABLE `traineeusers` (
  `trainee_user_id` int(11) NOT NULL,
  `trainee_user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traineeusers`
--

INSERT INTO `traineeusers` (`trainee_user_id`, `trainee_user_name`, `email`, `password`, `code`) VALUES
(1, 'hasan', 'fairtripbd@gmail.com', '202cb962ac59075b964b07152d234b70', '54a6d0b0c50b78533bf1e9d86dcb44e9'),
(2, 'Md. Nasarul Hasan', 'nasarulhasan@gmail.com', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(1, 'Md. Nasarul Hasan', 'nasarulhasan@gmail.com', '64d331547475d9d264f23db06aad29e2', ''),
(3, 'Md. Nasarul Hasan', 'nasarulhasan@yahoo.com', '64d331547475d9d264f23db06aad29e2', '759418919874725cea87bd2f616de9cd');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` text NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `thumbnail`, `video_id`) VALUES
(1, 'Test video', 'Test video file for nature', 'download (3).jpg', 0),
(2, 'Computer Network ', 'Lecture computer network file system', 'download1.jpg', 0),
(11, 'Extra', 'This is extra video', 'Arts_page-0001.jpg', 0),
(12, '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admnusers`
--
ALTER TABLE `admnusers`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `bg`
--
ALTER TABLE `bg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitatorusers`
--
ALTER TABLE `facilitatorusers`
  ADD PRIMARY KEY (`facilitator_user_id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tblfacilitator`
--
ALTER TABLE `tblfacilitator`
  ADD PRIMARY KEY (`facilitator_id`);

--
-- Indexes for table `tbllecture`
--
ALTER TABLE `tbllecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbltrainee`
--
ALTER TABLE `tbltrainee`
  ADD PRIMARY KEY (`trainee_id`),
  ADD UNIQUE KEY `roll` (`trainee_roll`);

--
-- Indexes for table `tbluploadlecture`
--
ALTER TABLE `tbluploadlecture`
  ADD PRIMARY KEY (`upload_lecture_id`);

--
-- Indexes for table `tbluploadlecturecopy2`
--
ALTER TABLE `tbluploadlecturecopy2`
  ADD PRIMARY KEY (`upload_lecture_id`);

--
-- Indexes for table `tbluploadvideo`
--
ALTER TABLE `tbluploadvideo`
  ADD PRIMARY KEY (`upload_video_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traineeusers`
--
ALTER TABLE `traineeusers`
  ADD PRIMARY KEY (`trainee_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admnusers`
--
ALTER TABLE `admnusers`
  MODIFY `admin_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bg`
--
ALTER TABLE `bg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilitatorusers`
--
ALTER TABLE `facilitatorusers`
  MODIFY `facilitator_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfacilitator`
--
ALTER TABLE `tblfacilitator`
  MODIFY `facilitator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbllecture`
--
ALTER TABLE `tbllecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltrainee`
--
ALTER TABLE `tbltrainee`
  MODIFY `trainee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluploadlecture`
--
ALTER TABLE `tbluploadlecture`
  MODIFY `upload_lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluploadlecturecopy2`
--
ALTER TABLE `tbluploadlecturecopy2`
  MODIFY `upload_lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluploadvideo`
--
ALTER TABLE `tbluploadvideo`
  MODIFY `upload_video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traineeusers`
--
ALTER TABLE `traineeusers`
  MODIFY `trainee_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
