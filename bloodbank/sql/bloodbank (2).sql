-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 05:55 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--
CREATE DATABASE IF NOT EXISTS `bloodbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bloodbank`;

-- --------------------------------------------------------

--
-- Table structure for table `bloodinfo`
--

CREATE TABLE IF NOT EXISTS `bloodinfo` (
  `bid` int(11) NOT NULL,
  `hid` int(3) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodinfo`
--

INSERT INTO `bloodinfo` (`bid`, `hid`, `bg`, `units`) VALUES
(0, 0, 'B+', 10),
(2, 0, 'A+', 0),
(0, 0, 'A+', 0),
(0, 1, 'B+', 50),
(0, 1, 'B+', 1),
(0, 1, 'AB-', 1),
(0, 1, 'AB-', 4),
(0, 2, 'B+', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE IF NOT EXISTS `bloodrequest` (
  `reqid` int(3) NOT NULL,
  `hid` int(3) NOT NULL,
  `rid` int(3) NOT NULL,
  `bg` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`reqid`, `hid`, `rid`, `bg`, `status`) VALUES
(0, 1, 0, 'B+', 'Accepted'),
(0, 2, 0, 'A+', 'Accepted'),
(0, 1, 1, 'B+', 'Accepted'),
(0, 2, 1, 'B+', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE IF NOT EXISTS `camp` (
  `cid` int(3) NOT NULL AUTO_INCREMENT,
  `hname` varchar(25) NOT NULL,
  `cphone` varchar(10) NOT NULL,
  `caddress` varchar(100) NOT NULL,
  `cdate` date NOT NULL,
  `ctime` time NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`cid`, `hname`, `cphone`, `caddress`, `cdate`, `ctime`) VALUES
(1, 'gandhi', '9876543216', 'alangulam', '2022-04-14', '12:23:00'),
(2, 'ponraj', '9123456782', 'south veli str', '2022-04-22', '12:26:00'),
(3, 'assasian', '6547891235', 'kalavasal,muthu area', '2022-04-15', '14:09:00'),
(5, 'gandhi', '7845123692', 'theppakulam', '2022-05-20', '18:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `donorrequest`
--

CREATE TABLE IF NOT EXISTS `donorrequest` (
  `reqid` int(3) NOT NULL AUTO_INCREMENT,
  `did` int(3) NOT NULL,
  `hid` int(3) NOT NULL,
  `bg` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `donorrequest`
--

INSERT INTO `donorrequest` (`reqid`, `did`, `hid`, `bg`, `status`) VALUES
(1, 0, 1, 'B+', ''),
(2, 0, 1, 'B+', ''),
(3, 0, 1, 'B+', ''),
(4, 0, 1, 'B+', '');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `dname` varchar(25) NOT NULL,
  `demail` varchar(25) NOT NULL,
  `dpassword` varchar(25) NOT NULL,
  `dphone` varchar(10) NOT NULL,
  `dbg` varchar(3) NOT NULL,
  `dcity` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `dname`, `demail`, `dpassword`, `dphone`, `dbg`, `dcity`) VALUES
(3, 'ponraj', 'ponraj@gmail.com', 'raju2001', '9638204306', 'B+', 'Madurai'),
(6, 'prasanna', 'prasanna@gmail.com', 'asdasd', '9874561236', 'O+', 'madurai'),
(7, 'muthu', 'muthu@gmail.com', 'muthu2001', '9876543216', 'A+', 'Madurai');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `hname` varchar(25) NOT NULL,
  `hemail` varchar(25) NOT NULL,
  `hpassword` varchar(10) NOT NULL,
  `hphone` varchar(10) NOT NULL,
  `hcity` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hname`, `hemail`, `hpassword`, `hphone`, `hcity`) VALUES
(1, 'Gandhi hospital', 'gandhi@gmail.com', 'gandhi', '7865376358', 'Delhi'),
(2, 'Unknown hospital', 'unknown@gmail.com', 'unknown', '9876543267', 'unknown'),
(3, 'ponraj', 'raju@gmail.com', 'raju2001', '9807665352', 'chennai'),
(4, 'Government Hospital ', 'asd@gmail.com', 'asdasd', '8542157584', 'madurai');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE IF NOT EXISTS `receivers` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `rname` varchar(25) NOT NULL,
  `remail` varchar(25) NOT NULL,
  `rpassword` varchar(10) NOT NULL,
  `rphone` varchar(10) NOT NULL,
  `rbg` varchar(3) NOT NULL,
  `rcity` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `rname`, `remail`, `rpassword`, `rphone`, `rbg`, `rcity`) VALUES
(1, 'abc', 'abc@gmail.com', '123456', '9123456789', 'A+', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
