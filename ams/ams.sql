-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2018 at 08:37 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(25) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `firstname`, `lastname`, `emailid`, `username`, `pwd`, `profileimage`) VALUES
(2, 'Shubham', 'Kumar', 'shubham31102347@gmail.com', 'shubh3110', '827ccb0eea8a706c4c34a16891f84e7b', 'FB_IMG_1443324360884.jpg'),
(3, 'Alok', 'gaurav', 'alok2104@gmail.com', 'ag2124', '827ccb0eea8a706c4c34a16891f84e7b', 'alok_gaurav.jpg'),
(4, 'Omkar', 'mishra', 'omkar2154@gmail.com', 'om_2209', '827ccb0eea8a706c4c34a16891f84e7b', 'omkar_mishra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `s_no` int(25) NOT NULL,
  `regid` varchar(50) DEFAULT NULL,
  `course_id` varchar(50) DEFAULT NULL,
  `pres_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`s_no`, `regid`, `course_id`, `pres_date`) VALUES
(1, '2015UGCS015', 'CS602', '16/07/2018'),
(2, '2015UGCS012', 'CS602', '16/07/2018'),
(3, '2015UGCS014', 'CS602', '16/07/2018'),
(4, '2015UGCS015', 'CS601', '16/07/2018'),
(5, '2015UGCS012', 'CS601', '16/07/2018'),
(6, '2015UGCS014', 'CS601', '16/07/2018'),
(7, '2015UGCS015', 'CS601', '15/07/2018'),
(8, '2015UGCS012', 'CS601', '15/07/2018'),
(9, '2015UGCS014', 'CS601', '15/07/2018'),
(10, '2015UGCS015', 'CS601', '14/07/2018'),
(11, '2015UGCS012', 'CS601', '14/07/2018'),
(12, '2015UGCS014', 'CS601', '14/07/2018'),
(13, '2015UGCS015', 'CS601', '17/07/2018'),
(14, '2015UGCS012', 'CS601', '17/07/2018'),
(15, '2015UGCS014', 'CS601', '17/07/2018');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `branchid` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fac_pwd` varchar(50) DEFAULT NULL,
  `profileimg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `firstname`, `lastname`, `branchid`, `emailid`, `username`, `fac_pwd`, `profileimg`) VALUES
(1, 'Sanjay', 'kumar', 'Computer Science', 'sanjay4578@gmail.com', 'sanjay_1234', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(2, 'Anshuman', 'Mahapatra', 'Computer Science', 'anshuman2451@gmain.com', 'anshuman_1234', '827ccb0eea8a706c4c34a16891f84e7b', 'anshuman_sir.jpg'),
(3, 'Dileep', 'Kumar', 'Computer Science', 'dileep1230@gmail.com', 'dileep_1234', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(4, 'Sasikanta', 'Tripathy', 'Computer Science', 'sasikanta3408@gmail.com', 'sasikanta_1234', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(5, 'Koushlendra', 'Kumar', 'Computer Science', 'koushlendra3421@gmail.com', 'koushlendra_1234', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(6, 'Bhaskar', 'Mondal', 'Computer Science', 'bhaskar4578@gmail.com', 'bhaskar_1234', '827ccb0eea8a706c4c34a16891f84e7b', 'bhaskor_sir.jpg'),
(7, 'Arpita', 'Sarkar', 'Computer Science', 'arpita7845@gmail.com', 'arpita_1234', '827ccb0eea8a706c4c34a16891f84e7b', 'arpita_mam2.jpg'),
(8, 'Vaibhav', 'Soni', 'Computer Science', 'vaibhav7845@gmail.com', 'vaibhav_1234', '827ccb0eea8a706c4c34a16891f84e7b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` int(50) NOT NULL,
  `subname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `semid` varchar(15) DEFAULT NULL,
  `branchid` varchar(50) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `subname`, `uid`, `semid`, `branchid`, `course_id`) VALUES
(10, 'Parallel and Distributed Computing', 'sanjay_1234', 'VI', 'Computer Science', 'CS601'),
(11, 'Advanced Computer Architechture', 'anshuman_1234', 'VI', 'Computer Science', 'CS602'),
(12, 'Compiler Design', 'bhaskar_1234', 'VI', 'Computer Science', 'CS603'),
(13, 'Optimaztion Technique', 'dileep_1234', 'VI', 'Computer Science', 'CS604'),
(15, 'Multimedia Applications', 'koushlendra_1234', 'VI', 'Computer Science', 'CS605'),
(16, 'Principles of Management Economics', 'sasikanta_1234', 'VI', 'Computer Science', 'CS606'),
(17, 'Operating System', 'arpita_1234', 'V', 'Computer Science', 'CS501'),
(18, 'Database Management System', 'arpita_1234', 'IV', 'Computer Science', 'CS401'),
(19, 'Data Communication', 'anshuman_1234', 'IV', 'Computer Science', 'CS403');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `branchid` varchar(50) DEFAULT NULL,
  `semid` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `regid` varchar(50) DEFAULT NULL,
  `user_pwd` varchar(50) DEFAULT NULL,
  `profileimg` varchar(1000) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `branchid`, `semid`, `emailid`, `regid`, `user_pwd`, `profileimg`, `username`) VALUES
(5, 'Shubham', 'kumar', 'Computer Science', 'VI', 'shubham31102347@gmail.com', '2015UGCS015', '827ccb0eea8a706c4c34a16891f84e7b', 'sk.jpg', 'shubh3110'),
(6, 'Alok', 'Gaurav', 'Computer Science', 'VI', 'alok7986@gmail.com', '2015UGCS012', '827ccb0eea8a706c4c34a16891f84e7b', 'alok_gaurav.jpg', 'alok_1234'),
(7, 'Omkar', 'Mishra', 'Computer Science', 'VI', 'omkar1457@gmail.com', '2015UGCS014', '827ccb0eea8a706c4c34a16891f84e7b', 'omkar_mishra.jpg', 'omkar_1234'),
(9, 'Shivam', 'Goyal', 'Computer Science', 'VIII', 'shivam4321@gmail.com', '2014UGCS079', '827ccb0eea8a706c4c34a16891f84e7b', 'shivam_goyal.jpg', 'shivam_1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `s_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
