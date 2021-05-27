-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 10:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `type_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`type_id`, `user_name`, `password`) VALUES
(1, 'enaeemullah', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `b_form` varchar(20) NOT NULL,
  `family_number` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`b_form`, `family_number`, `name`, `age`, `gender`, `status`, `ref_id`) VALUES
('7140273407709', '85456324', 'Naeem', 1, 'Male', 'vaccinated', 11),
('8130248596412', '854563285', 'Naeem', 1, 'Male', 'vaccinated', 11),
('8130285463985', '8545632', 'hassan ali', 9, 'Male', 'vaccinated', 11),
('8455226633555', '8545632', 'alia hassan', 7, 'Female', 'vaccinated', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `postal_code`, `province`) VALUES
(1, 'lahore', '876456', 'punjab'),
(2, 'karachi', '10250', 'sindh');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `family_number` varchar(50) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `family_number`, `subject`, `description`, `status`) VALUES
(4, '8545632', 'hey', 'Hi There! Where you would you like to go', 'Action Taken');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `type_id` int(11) NOT NULL,
  `father_cnic` varchar(20) NOT NULL,
  `mother_cnic` varchar(20) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `family_number` varchar(20) NOT NULL,
  `no_of_children` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `full_address` varchar(256) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `ref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`type_id`, `father_cnic`, `mother_cnic`, `father_name`, `mother_name`, `family_number`, `no_of_children`, `city_id`, `full_address`, `password`, `status`, `ref_id`) VALUES
(3, '84526397458963', '8596547859632', 'raheel malik', 'aliyah ahmed', '123458', 4, 1, 'house no 115E sector V8', 'Null', 'pending', 17),
(3, '3520291940295', '3520291920295', 'naeem ullah', 'nagina nameem', '8545632', 2, 1, 'gilgit baltistan ', '123456', 'completed', 7),
(3, '3520291940295', '4526398745269', 'raheel malik', 'aliyah ahmed', '85456324', 2, 1, 'mirpur ajk pakistan', 'Null', 'completed', 7),
(3, '2345678984526', '4526398745269', 'raheel malik', 'aliyah ahmed', '8545632548', 1, 1, 'house no 115E sector V8', 'Null', 'pending', 17),
(3, '8125639874569', '8596547859632', 'raheel malik', 'aliyah ahmed', '854563285', 1, 1, 'lda itefaq colony lahore ', '123456', 'completed', 7);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `type_id` int(11) NOT NULL,
  `team_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`type_id`, `team_number`, `name`, `cnic`, `city_id`, `address`, `contact_number`, `password`, `role_id`) VALUES
(2, 17, 'rehan', '8130254784125', 1, 'kotli road', '0345211111', 123456, 1),
(2, 11, 'hassan', '8130254785695', 1, 'kotli highway road', '03465511111', 123456, 2),
(2, 7, 'muheet', '813026789543', 1, 'bhimber road', '03401514214', 123456, 1),
(2, 14, 'naeem', '8130267895435', 1, 'mirpur ajk', '03456985668', 123456, 1),
(2, 13, 'akhater', '8130275222169', 1, 'mirpur ajk', '03168389562', 123456, 1),
(2, 16, 'amir', '8130275222526', 1, 'gilget khizar', '03465289657', 123456, 2),
(2, 20, 'naeem', '8130275247859', 1, 'gilget khizar', '03465259991', 123456, 2),
(2, 18, 'abu hamza', '8130275254123', 1, 'gilget khizar', '03465289657', 123456, 2),
(2, 19, 'naeem', '8130275258746', 2, '34567890', '03465259991', 748594, 1),
(2, 12, 'naeem', '8452639785695', 1, 'gilget khizar', '03452896547', 123456, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `comments` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `role`, `comments`) VALUES
(1, 'admin', 'Management', 'Have total control oder system'),
(2, 'teams', 'Data collection and Eradication', 'Does survey and collect data of parents,furthermore they enter children data and does vaccination'),
(3, 'parents', 'Data view', 'they can view vaccination record of there children ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`b_form`),
  ADD KEY `family_number` (`family_number`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_number` (`family_number`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`family_number`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `city` (`city_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`cnic`),
  ADD UNIQUE KEY `team_number` (`team_number`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `city` (`city_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`family_number`) REFERENCES `parents` (`family_number`);

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`family_number`) REFERENCES `parents` (`family_number`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`id`),
  ADD CONSTRAINT `parents_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`id`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
