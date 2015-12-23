-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 10:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ros`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`number` int(10) NOT NULL,
  `k_id` varchar(20) NOT NULL,
  `level` int(5) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`number`, `k_id`, `level`, `answer`, `timestamp`) VALUES
(1, '10002FE3', 1, 'CTF', '2015-11-24 23:34:32'),
(2, '10002FE3', 1, 'CTF', '2015-11-24 23:35:15'),
(3, '10002FE3', 1, 'CTF', '2015-11-24 23:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`level` int(10) unsigned NOT NULL,
  `answer` varchar(100) NOT NULL,
  `url_hint` varchar(100) NOT NULL,
  `img_count` int(10) NOT NULL,
  `clues` varchar(100) NOT NULL,
  `img0` varchar(100) DEFAULT NULL,
  `img1` varchar(100) DEFAULT NULL,
  `img2` varchar(100) DEFAULT NULL,
  `img3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`level`, `answer`, `url_hint`, `img_count`, `clues`, `img0`, `img1`, `img2`, `img3`) VALUES
(1, 'CTF', 'yahoo.com', 3, 'Train', '/uploads/1_0.jpg', '/uploads/1_1.png', '/uploads/1_2.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `k_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` int(5) NOT NULL DEFAULT '1',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lives` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`k_id`, `name`, `level`, `blocked`, `start_time`, `lives`) VALUES
('10002FE3', 'sai', 2, 1, '2015-11-24 23:35:46', 1),
('1008FT4', 'raghu', 1, 0, '2015-11-25 22:38:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `xceed_registrations`
--

CREATE TABLE IF NOT EXISTS `xceed_registrations` (
  `k_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `mail_id` varchar(25) NOT NULL,
  `place` varchar(10) NOT NULL,
  `event_1` varchar(10) DEFAULT NULL,
  `event_2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xceed_registrations`
--

INSERT INTO `xceed_registrations` (`k_id`, `name`, `phone_number`, `mail_id`, `place`, `event_1`, `event_2`) VALUES
('1241DS', 'sai', 2147483647, 'afafh@hmao.com', 'IIM-A', 'biz', 'chaos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`number`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `xceed_registrations`
--
ALTER TABLE `xceed_registrations`
 ADD PRIMARY KEY (`k_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `number` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `level` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
