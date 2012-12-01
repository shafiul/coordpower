-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2012 at 07:48 AM
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
(2447110, 1),
(2447110, 2),
(2447110, 3),
(2447183, 1),
(2447183, 2),
(2447183, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Fiesheries'),
(21, 'Cooperatives'),
(22, 'Forestry'),
(23, 'BRDB'),
(24, 'Livestock'),
(25, 'Health'),
(26, 'Social Affair'),
(27, 'Education'),
(28, 'women & children affairs');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `union_code`, `date`, `time`, `president_id`, `place`) VALUES
(1, 2447110, '2012-12-01', '2012-12-01 05:03:05', 1, 'Union Parishod'),
(2, 2447110, '2012-12-02', '2012-12-01 13:24:50', 1, 'Union Parishod');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `meeting_id` int(11) NOT NULL,
  `type` text CHARACTER SET latin1 NOT NULL,
  `type_id` int(11) NOT NULL,
  `discussion` text COLLATE utf8_unicode_ci,
  `decision` text COLLATE utf8_unicode_ci,
  `responsiblee` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`meeting_id`, `type`, `type_id`, `discussion`, `decision`, `responsiblee`) VALUES
(1, 'department', 1, 'উপ সহকারী কৃষি কর্মকর্তা জনাব মাহমুদা আক্তার সভায় জানান যে, ৩নং ইউপি সদস্যের সঙ্গে আলোচনা করে জহিরাবাদ গ্রামের চাষী মোঃ আশ্রাবউদ্দিন,পিতা ডাঃ আঃ আজিজ এর জমিতে আউশ ধান এর প্রদর্শনী স্থাপন করা হয়েছে। বর্তমানে ইউপি সদস্যগনের সহায়তায় পাট চাষী জরিপ কাজ চলছে। তিনি জানান যে, চাষীদের উদ্ধুদ্ধ করনের মাধ্যমে কমপোষ্ট সার তৈরী ও ধৈঞ্চা আবাদ করনে উৎসাহিত করা হচ্ছে।  তিনি আরো জানান যে, কৃষকদের নিকট থেকে খাদ্য অধিদপ্তর কতৃক ধান প্রতি মন ৭২০/-এবং গম প্রতি মন ৯৬০/-হারে  ক্রয় করা  হবে। তবে ধান ও গম পরিষ্কার  ও পুষ্ঠ হতে হবে। সভাপতি মহোদয় ভবিষ্যতেও ইউনিয়ন পরিষদকে অবহিত করে সব কাজ করার জন্য অনুরোধ করেন।   ', 'ইউনিয়ন পরিষদকে অবহিত করে সব কাজ করা হবে।  ', 'উপ সহকারী কৃষি কর্মকর্তা।'),
(1, 'department', 2, 'ইউনিয়ন সমাজকর্মী জনাব শান্তি রানী সাহা সভায় জানান যে,  গত মাসে ক্ষুদ্র ঋণের আওতায় বিদ্যানগর গ্রামে  ১০ জন সদস্যদের মাঝে ৮০,০০০/-টাকা ঋণ বিতরণ করা হয়েছে।গত ২৩-০৫-২০১২ খ্রিঃ তারিখে ২৮৯ জন বয়স্কভাতা কার্ডধারীর মধ্যে ২,৬০,১০০/- টাকা বিতরণ করা হয়েছে। সমাজের অবহেলিত জনগোষ্টি হিসেবে হিজরা, জন্মগত ধোঁপা, ডোম, হরিজন, জন্মগত মাঝি ইত্যাদি শ্রেণীর জরিজ কাজ চলছে,যা ইউনিয়ন পরিষদকে পূর্বেই অবগত করা হয়েছে।তিনি উক্ত তালিকা প্রনয়নে সকলের সহযোগীতা কামনা করেন। তিনি তাঁর সংস্থা থেকে বিতরণকৃত তুলশিয়া গ্রামের খেলাপী ঋণগ্রহীতাদের ১টি তালিকা সভায় উপস্থাপন করে উক্ত ঋণ আদায়ে ইউপির সহায়তা কামনা করেন। সভাপতি মহোদয় নিজ নিজ ওয়ার্ডের অবহেলিত জনগোষ্টির তালিকা ইউনিয়ন পরিষদে জমা দেওয়ার জন্য সকল সদস্যগণকে অনুরোধ করেন এবং তুলশিয় গ্রামের খেলাপী ঋণ আদায়ে সহায়তা করার জন্য সংশ্লিষ্ট ইউপি সদস্যকে অনুরোধ করেন।', '০১।   অবহেলিত জনগোষ্টির তালিকা ইউনিয়ন পরিষদে দ্রুত দাখিল করা হবে। ০২। তুলশিয়া গ্রামের খেলাপী ঋণ আদায়ে সহায়তা করা  হবে।', '০১।  সংশ্লিষ্ট ওয়ার্ড সদস্যগণ।  ০২। ২নং ওয়ার্ড সদস্য।'),
(1, 'department', 21, 'ইউনিয়ন সমাজকর্মী জনাব শান্তি রানী সাহা সভায় জানান যে,  গত মাসে ক্ষুদ্র ঋণের আওতায় বিদ্যানগর গ্রামে  ১০ জন সদস্যদের মাঝে ৮০,০০০/-টাকা ঋণ বিতরণ করা হয়েছে।গত ২৩-০৫-২০১২ খ্রিঃ তারিখে ২৮৯ জন বয়স্কভাতা কার্ডধারীর মধ্যে ২,৬০,১০০/- টাকা বিতরণ করা হয়েছে। সমাজের অবহেলিত জনগোষ্টি হিসেবে হিজরা, জন্মগত ধোঁপা, ডোম, হরিজন, জন্মগত মাঝি ইত্যাদি শ্রেণীর জরিজ কাজ চলছে,যা ইউনিয়ন পরিষদকে পূর্বেই অবগত করা হয়েছে।তিনি উক্ত তালিকা প্রনয়নে সকলের সহযোগীতা কামনা করেন। তিনি তাঁর সংস্থা থেকে বিতরণকৃত তুলশিয়া গ্রামের খেলাপী ঋণগ্রহীতাদের ১টি তালিকা সভায় উপস্থাপন করে উক্ত ঋণ আদায়ে ইউপির সহায়তা কামনা করেন। সভাপতি মহোদয় নিজ নিজ ওয়ার্ডের অবহেলিত জনগোষ্টির তালিকা ইউনিয়ন পরিষদে জমা দেওয়ার জন্য সকল সদস্যগণকে অনুরোধ করেন এবং তুলশিয় গ্রামের খেলাপী ঋণ আদায়ে সহায়তা করার জন্য সংশ্লিষ্ট ইউপি সদস্যকে অনুরোধ করেন।', 'অবহেলিত জনগোষ্টির তালিকা ইউনিয়ন পরিষদে দ্রুত দাখিল করা হবে।\r\n\r\n', 'সংশ্লিষ্ট ওয়ার্ড সদস্যগণ।  ');

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
(2447110, 1, 'Pantha Para\r\n'),
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
(1, 'Johirul Alam', 'guest', 'Chairman', 'asdfasf', 'joihir@gmail.com', '+8801712547856'),
(2, 'Shafiul Rashid', 'asfa', 'Village member', 'asd', 'shafiul@gmail.com', '+8801725478569'),
(3, 'Ibrahim Azam', 'asdaisdas', 'NGO member', 'a5cec7af5f7aab769cf0d4aa440e01c7bfc371b2', 'ibrahim@gmail.com', '01723654758');
