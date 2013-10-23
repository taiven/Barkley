-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2013 at 11:15 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taiven_wubcrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_accounts`
--

CREATE TABLE IF NOT EXISTS `client_accounts` (
  `account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `account_type` int(1) NOT NULL,
  `first_name` text COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74736736 ;

--
-- Dumping data for table `client_accounts`
--

INSERT INTO `client_accounts` (`account_id`, `email`, `password`, `active`, `account_type`, `first_name`, `last_name`, `gender`, `phone`, `code`, `date`) VALUES
(74736733, 'wubcrate@gmail.com', '3fc0087659ebebdf0916ab4e9b4f3e39', 1, 4, 'Taiven', 'Rumph', '', '4109293204', 'fdb29352df1d48552eafd4d969f73a85', '0000-00-00 00:00:00'),
(74736734, 'jfflws53@gmail.com', '77cc7206eb57fef85d0df8c67074b513', 1, 0, 'Jeffery', 'Lewis', '', '0', '2427cc0618db52bc5385da3c836eb319', '0000-00-00 00:00:00'),
(74736735, 'tonystar24@gmail.com', '3fc0087659ebebdf0916ab4e9b4f3e39', 1, 4, 'Jeff', 'Lewis', 'Male', '0', 'fdb29352df1d48552eafd4d969f73a85', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_billing`
--

CREATE TABLE IF NOT EXISTS `client_billing` (
  `account_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `transaction_date` date NOT NULL,
  `ver_ca.hash` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  KEY `account_id` (`account_id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `representing` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `website` varchar(300) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `firstname`, `lastname`, `gender`, `representing`, `email`, `phone`, `project_id`, `website`, `type`) VALUES
(45, 'Someone', 'Something', 1, 'test', 'Email@Email.com', '4109293204', 0, 'http://example.org', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `account_id` bigint(20) NOT NULL,
  `action` int(1) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `milestone_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `milestone_title` varchar(300) NOT NULL,
  `milestone_details` text NOT NULL,
  `tasks` varchar(350) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`milestone_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`milestone_id`, `project_id`, `milestone_title`, `milestone_details`, `tasks`, `date`) VALUES
(12, 51, 'Sample Milestone', 'Sample Milestone for the Sample Project for the Project Management System.', '', '2013-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `start` datetime NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `archived` int(1) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `project_id` (`project_id`),
  KEY `project_id_2` (`project_id`),
  KEY `project_id_3` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `client_id`, `project_name`, `start`, `description`, `deadline`, `archived`) VALUES
(51, 0, 'Sample Project', '0000-00-00 00:00:00', 'This is a Sample Project for the Wubcrate Project Management System', '2013-12-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_mapping`
--

CREATE TABLE IF NOT EXISTS `project_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `project_mapping`
--

INSERT INTO `project_mapping` (`id`, `p_id`, `a_id`, `date`) VALUES
(7, 51, 74736734, '2013-09-25'),
(8, 51, 74736735, '2013-09-25'),
(9, 51, 74736733, '2013-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE IF NOT EXISTS `subtasks` (
  `subtask_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) NOT NULL DEFAULT '0',
  `task_title` text NOT NULL,
  `task_details` varchar(600) NOT NULL,
  `assignedto` bigint(20) NOT NULL,
  `assignedby` bigint(20) NOT NULL,
  `deadline` date NOT NULL,
  `complete` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`subtask_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`subtask_id`, `task_id`, `task_title`, `task_details`, `assignedto`, `assignedby`, `deadline`, `complete`, `date`) VALUES
(1, 10, 'Sample SubTask', 'This is a Sample SubTask for the Sample Project for the Project Management System.', 0, 0, '2013-10-12', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subtask_mapping`
--

CREATE TABLE IF NOT EXISTS `subtask_mapping` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subtask_mapping`
--

INSERT INTO `subtask_mapping` (`id`, `t_id`, `st_id`, `date`) VALUES
(1, 10, 1, '2013-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `task_title` text NOT NULL,
  `task_details` varchar(600) NOT NULL,
  `assignedto` bigint(20) NOT NULL,
  `assignedby` bigint(20) NOT NULL,
  `deadline` date NOT NULL,
  `complete` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `task_title`, `task_details`, `assignedto`, `assignedby`, `deadline`, `complete`, `date`) VALUES
(10, 51, 'Sample Task', 'This is a Sample Task for the Sample Project for the Project Management System.', 0, 0, '2013-12-25', 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
