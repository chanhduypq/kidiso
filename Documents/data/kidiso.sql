-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 10:04 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kidiso`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id` (`school_id`),
  UNIQUE KEY `school_id_2` (`school_id`),
  UNIQUE KEY `school_id_3` (`school_id`),
  UNIQUE KEY `school_id_4` (`school_id`),
  UNIQUE KEY `school_id_5` (`school_id`),
  UNIQUE KEY `school_id_6` (`school_id`),
  UNIQUE KEY `school_id_7` (`school_id`),
  KEY `fk_class_school1_idx` (`school_id`),
  KEY `fk_class_instructor1_idx` (`instructor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `classes`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `country`
--


-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `district`
--


-- --------------------------------------------------------

--
-- Table structure for table `evaluate`
--

CREATE TABLE IF NOT EXISTS `evaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `evaluate_date` datetime NOT NULL,
  `evaluate_situation_before` int(11) NOT NULL,
  `evaluate_situation_after` int(11) NOT NULL,
  `evaluate_plan` int(11) NOT NULL,
  `evaluate_compare_result` int(11) NOT NULL,
  `evaluate_result` int(11) NOT NULL,
  `meter_accessability` bit(1) NOT NULL,
  `is_data_recorded` bit(1) NOT NULL,
  `data_record_mode` tinyint(4) NOT NULL,
  `data_analysis_mode` tinyint(4) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `is_data_reliable` bit(1) NOT NULL,
  `pdca_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`type`),
  KEY `fk_evaluate_pdca1_idx` (`pdca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `evaluate`
--


-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_username` varchar(50) NOT NULL,
  `instructor_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `sex` bit(1) NOT NULL COMMENT '1: Male, 0: Female',
  `email` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instructor_username_UNIQUE` (`instructor_username`),
  KEY `fk_instructor_school1_idx` (`school_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `instructor`
--


-- --------------------------------------------------------

--
-- Table structure for table `pdca`
--

CREATE TABLE IF NOT EXISTS `pdca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_content` varchar(255) NOT NULL,
  `pupil_comment` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `pupil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pupil_id` (`pupil_id`),
  KEY `fk_pdca_pupil_idx` (`pupil_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pdca`
--


-- --------------------------------------------------------

--
-- Table structure for table `pdca_measurement`
--

CREATE TABLE IF NOT EXISTS `pdca_measurement` (
  `pdca_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `value_before` float NOT NULL,
  `value_after` float NOT NULL,
  `gas_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`pdca_id`),
  UNIQUE KEY `item_code_UNIQUE` (`item_code`),
  KEY `fk_pdca_measurement_pdca1_idx` (`pdca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pdca_measurement`
--


-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

CREATE TABLE IF NOT EXISTS `pupil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pupil_username` varchar(50) NOT NULL,
  `pupil_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `sex` bit(1) NOT NULL COMMENT '1: Male, 0: Female',
  `family_member_no` int(11) DEFAULT NULL,
  `classes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pupil_username_UNIQUE` (`pupil_username`),
  KEY `fk_pupil_class1_idx` (`classes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pupil`
--


-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_username` varchar(50) NOT NULL,
  `school_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` int(20) NOT NULL,
  `district_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_username_UNIQUE` (`school_username`),
  UNIQUE KEY `school_password_UNIQUE` (`school_password`),
  KEY `fk_school_district1_idx` (`district_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `school`
--


-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE IF NOT EXISTS `school_admin` (
  `school_admin_email` varchar(50) NOT NULL,
  `school_admin_username` varchar(50) NOT NULL,
  `school_admin_password` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`school_admin_email`),
  UNIQUE KEY `school_admin_username_UNIQUE` (`school_admin_username`),
  KEY `fk_school_admin_school1_idx` (`school_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE IF NOT EXISTS `sub_admin` (
  `sub_admin_email` varchar(50) NOT NULL,
  `sub_admin_name` varchar(50) NOT NULL,
  `sub_admin_password` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `sex` bit(1) NOT NULL COMMENT '1: Male, 0: Female',
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_admin_email`),
  UNIQUE KEY `sub_admin_email_UNIQUE` (`sub_admin_email`),
  UNIQUE KEY `sub_admin_name_UNIQUE` (`sub_admin_name`),
  KEY `fk_sub_admin_district1_idx` (`district_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_admin`
--

