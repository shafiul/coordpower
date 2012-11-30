-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2012 at 11:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathonbd_2012`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `agenda_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`agenda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `name`) VALUES
(1, 'weMZ mfvi Kvh©weeiYx cvV I Aby‡gv`b'),
(2, 'weMZ mfvi wm×vš— mg~n ev¯—evqb AMÖMwZ');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`meeting_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`meeting_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `committee_member`
--

CREATE TABLE IF NOT EXISTS `committee_member` (
  `union_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`union_code`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_member`
--

INSERT INTO `committee_member` (`union_code`, `user_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2447110, 0),
(2447183, 0),
(2447183, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'asds'),
(2, '1,2'),
(3, 'asds');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `district`
--


-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `division`
--


-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `union_code` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `president_id` int(11) DEFAULT NULL,
  `place` text,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `union_code`, `date`, `time`, `president_id`, `place`) VALUES
(1, 2447165, '2012-12-01', '2012-12-01 05:03:05', 1, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `meeting_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `discussion` text,
  `decision` text,
  `responsiblee` text,
  PRIMARY KEY (`meeting_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--


-- --------------------------------------------------------

--
-- Table structure for table `union`
--

CREATE TABLE IF NOT EXISTS `union` (
  `union_code` int(11) NOT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`union_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union`
--

INSERT INTO `union` (`union_code`, `upazila_id`, `name`) VALUES
(2447165, 1, 'Pantha Para\r\n'),
(2447183, 1, 'Natima\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `upazila`
--

CREATE TABLE IF NOT EXISTS `upazila` (
  `upazila_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`upazila_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `upazila`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `role` text,
  `designation` text NOT NULL,
  `password` text,
  `email` text NOT NULL,
  `mobile_number` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1238 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `role`, `designation`, `password`, `email`, `mobile_number`) VALUES
(1234, NULL, 'asdaisdas', '', 'a5cec7af5f7aab769cf0d4aa440e01c7bfc371b2', '', ''),
(1235, 'dummy', 'asfa', '', 'sdgsd', '', ''),
(1236, 'sdgsdg', 'sdgsd', '', 'sdgsdg', '', '');
