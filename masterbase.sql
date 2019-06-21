-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 04:23 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record`
--

CREATE TABLE `attendence_record` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `hostel` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_detail`
--

CREATE TABLE `group_detail` (
  `mentor_grp` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mastertable`
--

CREATE TABLE `mastertable` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` varchar(200) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `hostel` varchar(10) NOT NULL,
  `campus` int(11) NOT NULL DEFAULT '1',
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `sibling` varchar(200) NOT NULL,
  `workplace` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `mess` varchar(10) NOT NULL,
  `room_no` int(11) NOT NULL,
  `roommate` varchar(200) NOT NULL,
  `bestfriend` varchar(200) NOT NULL,
  `student_mob` bigint(20) NOT NULL,
  `father_mob` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `club` varchar(200) NOT NULL,
  `achievements` varchar(500) NOT NULL,
  `language` varchar(200) NOT NULL,
  `hobbies` varchar(500) NOT NULL,
  `pmoney` int(11) NOT NULL,
  `subinterest` varchar(200) NOT NULL,
  `hygiene` varchar(200) NOT NULL,
  `cleanliness` varchar(200) NOT NULL,
  `sleep_study` varchar(200) NOT NULL,
  `food` varchar(200) NOT NULL,
  `veg_nonveg` varchar(100) NOT NULL,
  `disease` varchar(300) NOT NULL,
  `medicine` varchar(500) NOT NULL,
  `blood_grp` varchar(50) NOT NULL,
  `spsu_visit` varchar(500) NOT NULL,
  `country_visit` varchar(500) NOT NULL,
  `date_visit` varchar(500) NOT NULL,
  `training_company` varchar(500) NOT NULL,
  `training_dept` varchar(500) NOT NULL,
  `projecte` varchar(500) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '3ca030fc0b7dfd7971ec33dcf479c1ed',
  `profile_pic` longblob NOT NULL,
  `mentor_grp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterteachettable`
--

CREATE TABLE `masterteachettable` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `frno` varchar(20) NOT NULL DEFAULT 'NA',
  `hostel` varchar(10) NOT NULL DEFAULT 'NAW',
  `mobileno` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilepic` blob NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentorship_attendance`
--

CREATE TABLE `mentorship_attendance` (
  `enrollment` varchar(15) NOT NULL,
  `mentor` varchar(100) NOT NULL,
  `mentor_grp` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mess_record`
--

CREATE TABLE `mess_record` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(20) NOT NULL,
  `mess` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `meal_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `date` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mentor_grp` int(11) NOT NULL,
  `new_areas` varchar(3000) NOT NULL,
  `follow_up_agenda` varchar(3000) NOT NULL,
  `special_agenda` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `file_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `hostel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outpass_record`
--

CREATE TABLE `outpass_record` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `hostel` varchar(20) NOT NULL,
  `outdate` varchar(20) NOT NULL,
  `outtime` varchar(20) NOT NULL,
  `indate` varchar(20) NOT NULL,
  `intime` varchar(20) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `requestdate` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `id` int(11) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `enrollment` varchar(20) NOT NULL,
  `cgpa` varchar(200) NOT NULL,
  `backlog` varchar(100) NOT NULL,
  `attendance` varchar(100) NOT NULL,
  `specialization` varchar(500) NOT NULL,
  `department_input` varchar(500) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `financial` varchar(300) NOT NULL,
  `expectation` varchar(250) NOT NULL,
  `communication` varchar(200) NOT NULL,
  `family` varchar(250) NOT NULL,
  `other_remark` varchar(500) NOT NULL,
  `inter_personal` varchar(250) NOT NULL,
  `warden_report` varchar(250) NOT NULL,
  `friend_circle` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '3ca030fc0b7dfd7971ec33dcf479c1ed',
  `mentor_grp` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence_record`
--
ALTER TABLE `attendence_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `group_detail`
--
ALTER TABLE `group_detail`
  ADD PRIMARY KEY (`mentor_grp`);

--
-- Indexes for table `mastertable`
--
ALTER TABLE `mastertable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enro` (`enrollment`),
  ADD UNIQUE KEY `name` (`name`,`enrollment`);

--
-- Indexes for table `masterteachettable`
--
ALTER TABLE `masterteachettable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentorship_attendance`
--
ALTER TABLE `mentorship_attendance`
  ADD PRIMARY KEY (`enrollment`,`date`);

--
-- Indexes for table `mess_record`
--
ALTER TABLE `mess_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minutes`
--
ALTER TABLE `minutes`
  ADD PRIMARY KEY (`date`,`mentor_grp`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`file_name`,`hostel`);

--
-- Indexes for table `outpass_record`
--
ALTER TABLE `outpass_record`
  ADD PRIMARY KEY (`id`,`enrollment`,`outdate`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`mentor_grp`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence_record`
--
ALTER TABLE `attendence_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mastertable`
--
ALTER TABLE `mastertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterteachettable`
--
ALTER TABLE `masterteachettable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mess_record`
--
ALTER TABLE `mess_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outpass_record`
--
ALTER TABLE `outpass_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
