-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2013 at 01:29 AM
-- Server version: 5.5.32
-- PHP Version: 5.5.1-2+debphp.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `image` varchar(11) NOT NULL,
  `url` varchar(11) NOT NULL,
  `script` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_08_01_080120_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(11) NOT NULL,
  `summary` text NOT NULL,
  `page` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `summary`, `page`, `created_at`, `updated_at`) VALUES
(3, 'vazv', 'wewe', 'oooooooooooooooooooooo<br>', '2013-08-17 11:36:54', '2013-08-17 05:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(127) NOT NULL,
  `answer_1` varchar(127) NOT NULL,
  `answer_2` varchar(127) NOT NULL,
  `answer_3` varchar(127) NOT NULL,
  `answer_4` varchar(127) NOT NULL,
  `count_1` int(11) NOT NULL DEFAULT '0',
  `count_2` int(11) NOT NULL DEFAULT '0',
  `count_3` int(11) NOT NULL DEFAULT '0',
  `count_4` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `count_1`, `count_2`, `count_3`, `count_4`, `created_at`, `updated_at`) VALUES
(1, 'qqqqqqqqqqqqqqqqq', 'wwwwwwwwww', 'eeeeeeeeee', 'rrrrrrrrrrr', 'ttttttt', 0, 0, 0, 0, '2013-08-17 11:05:31', '2013-08-17 11:13:11'),
(3, 'asdfwe', 'g  j', 'f jh', 'g jhg', 'l uhlkh', 0, 0, 0, 0, '2013-08-17 11:21:29', '2013-08-17 11:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, '', 'asdf', 'asdf@asdf.asdf', 'lkj', '2013-08-01 03:34:29', '2013-08-01 03:34:29'),
(15, '', 'qwerty', 'qwer@qwer.qwer', '$2y$08$BknLHoPLUUecRx5tT1XEhu5dUh9xa/Se31OYv9ea3nsEUdlLIEluW', '2013-08-06 14:17:17', '2013-08-06 14:17:17'),
(19, 'mxmx', 'mmmmm', 'mm@mm.mm', 'mmmmm', '2013-08-17 03:02:16', '2013-08-17 03:02:55'),
(20, 'nnn', 'nnnnn', 'nn@nn.nn', '$2y$08$0OdmGJLUW0XSwlCXt/Zoke7sC14VCYu4Fpmym3ultk3WZAQX7UCoi', '2013-08-17 03:24:10', '2013-08-17 03:24:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
