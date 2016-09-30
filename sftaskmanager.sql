-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:80
-- Generation Time: Sep 29, 2016 at 06:25 PM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sftaskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `membercredentials`
--

CREATE TABLE `membercredentials` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membercredentials`
--

INSERT INTO `membercredentials` (`id`, `name`, `password`, `position`) VALUES
(7, 'amir', 'khan', 'head'),
(10, 'karina', 'kapoor', 'head'),
(12, 'yooooo', 'kapoor', ''),
(13, 'sahil', 'ratnarani', '');

-- --------------------------------------------------------

--
-- Table structure for table `taskalloted`
--

CREATE TABLE `taskalloted` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `work` varchar(1000) NOT NULL,
  `head` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskalloted`
--

INSERT INTO `taskalloted` (`id`, `username`, `work`, `head`) VALUES
(1, 'sahil', 'ufbsduyvbyudv', 'harsh Bajaj'),
(2, 'subham', '4rttetreter', ''),
(3, 'esha', 'bfuyergj', ''),
(4, 'dipramit', 'do it fast', 'amir'),
(5, 'abhinab', 'ffgergeruej', ''),
(6, 'harshit', 'do it fast', 'amir'),
(7, 'paras', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taskdone`
--

CREATE TABLE `taskdone` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `workdone` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membercredentials`
--
ALTER TABLE `membercredentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskalloted`
--
ALTER TABLE `taskalloted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskdone`
--
ALTER TABLE `taskdone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membercredentials`
--
ALTER TABLE `membercredentials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `taskalloted`
--
ALTER TABLE `taskalloted`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `taskdone`
--
ALTER TABLE `taskdone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
