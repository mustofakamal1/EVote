-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 06:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `field_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `user_id`, `description`, `field_id`, `position_id`) VALUES
(2, 4, 'Mencari Pengalaman', 1, 1),
(9, 40, NULL, 1, 1),
(10, 43, NULL, 1, 2),
(11, 2, NULL, 2, 2),
(12, 44, NULL, 2, 1),
(14, 45, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `dept`, `faculty_id`) VALUES
(1, 'Teknik Elektro', 1),
(2, 'Teknik Mesin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`) VALUES
(1, 'Teknik'),
(2, 'MIPA');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `field` varchar(40) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `field`, `state`) VALUES
(1, 'BEM', 1),
(2, 'IM', 1),
(3, 'MPM', 0),
(4, 'Test', 0),
(6, 'Qwerty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `major` varchar(40) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `major`, `dept_id`) VALUES
(1, 'Teknik Komputer', 1),
(2, 'Teknik Elektro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(1, 'Ketua'),
(2, 'Wakil'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `majors_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `npm`, `name`, `phone`, `email`, `password`, `majors_id`, `role_id`) VALUES
(1, '1122334455', 'Admin', '081234567890', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, '1706043020', 'Mustofa', '085155499891', 'mustofa@gmail.com', 'e0449718f922b3ab6be915681a17fca8', 1, 2),
(4, '1700000000', 'Fahriza', '085110001000', 'fahriza@gmail.com', '300a972e601b574f73593c96bd615bc3', 1, 2),
(40, '1231314242', 'Tester', '1234561234', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1, 2),
(43, '1234567891', 'User', '08123456789', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 2),
(44, '999999999', 'Master', '08998989898', 'master@gmail.com', 'eb0a191797624dd3a48fa681d3061212', 1, 2),
(45, '987612435', 'Pelajar', '0981782718177', 'pelajar@gmail.com', '35f6ce383ff9f7b1734d2f348b1f76b3', 1, 2),
(46, '1239485958', 'Demo User', '081235464323', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `active_state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vote_history`
--

CREATE TABLE `vote_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `vote_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote_history`
--

INSERT INTO `vote_history` (`id`, `user_id`, `candidate_id`, `field_id`, `vote_date`) VALUES
(41, 43, 9, 1, '2020-05-27 15:30:21'),
(42, 43, 10, 1, '2020-05-27 15:30:21'),
(43, 43, 5, 2, '2020-05-27 15:30:29'),
(44, 4, 9, 1, '2020-06-08 13:07:54'),
(45, 4, 10, 1, '2020-06-08 13:07:54'),
(46, 4, 12, 2, '2020-06-08 13:08:02'),
(47, 4, 11, 2, '2020-06-08 13:08:02'),
(48, 2, 9, 1, '2020-06-08 13:08:16'),
(49, 2, 10, 1, '2020-06-08 13:08:16'),
(50, 2, 13, 2, '2020-06-08 13:08:22'),
(51, 2, 11, 2, '2020-06-08 13:08:22'),
(52, 44, 2, 1, '2020-06-08 13:10:29'),
(53, 44, 10, 1, '2020-06-08 13:10:29'),
(54, 44, 12, 2, '2020-06-08 13:10:35'),
(55, 44, 11, 2, '2020-06-08 13:10:35'),
(56, 45, 2, 1, '2020-06-08 13:11:01'),
(57, 45, 10, 1, '2020-06-08 13:11:01'),
(58, 45, 12, 2, '2020-06-08 13:11:06'),
(59, 45, 11, 2, '2020-06-08 13:11:06'),
(60, 40, 2, 1, '2020-06-08 13:34:43'),
(61, 40, 10, 1, '2020-06-08 13:34:43'),
(62, 40, 12, 2, '2020-06-08 13:34:47'),
(63, 40, 11, 2, '2020-06-08 13:34:47'),
(64, 46, 2, 1, '2020-06-08 16:32:44'),
(65, 46, 10, 1, '2020-06-08 16:32:44'),
(68, 46, 14, 2, '2020-06-08 16:36:03'),
(69, 46, 11, 2, '2020-06-08 16:36:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dept` (`dept`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `major` (`major`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_history`
--
ALTER TABLE `vote_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vote_history`
--
ALTER TABLE `vote_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
