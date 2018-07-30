-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2018 at 09:42 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `text`) VALUES
(143, 'Thimna'),
(133, 'Kemisetso'),
(141, 'Sinovuyo'),
(131, 'Awethu'),
(130, 'Yanelisa'),
(129, 'Vuyokazi'),
(128, 'Anethemba'),
(139, 'Sinelizwi');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `user_id`, `title`, `content`, `date_added`) VALUES
(1, 19, 'Vuyo', 'This is Vuyo\'s Note', '2018-05-23 00:00:00'),
(2, 18, 'Sinovuyo\'s Post', 'okay this is the owner\'s post, I am the best in this you know that right?\r\nAnyway it\'s good to be with you guys', '2018-05-28 04:22:00'),
(9, 18, 'My note', 'Another note of mine', '2018-05-28 04:15:22'),
(10, 18, 'Sinovuyo&#39;s Note', 'I miss you Sinovuyo my brother', '2018-05-28 04:40:33'),
(11, 22, 'Thimna &#39;s Note', 'I miss you daddy', '2018-05-28 04:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(15) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `age`, `gender`) VALUES
(1, 'Sino', 56, 'male'),
(2, 'Vuyo', 55, 'male'),
(3, 'Vuyo', 55, 'male'),
(4, 'sino', 4, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','owner','patient','visitor') NOT NULL DEFAULT 'patient',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `role`) VALUES
(19, 'vuyo', 'f98e707bc6bc10a8f1c399301844f37b', 'admin'),
(20, 'Sine', 'a318ce32c1c0032c8f111671d1699dd1', 'visitor'),
(21, 'Vuyokazi', '1c697d1aaf57dd466f6665dfc99f7bc2', 'visitor'),
(22, 'Thimna', '8a5d6a092b128b2c585c475e3ec11fbe', 'admin'),
(18, 'Sinovuyo', 'f98e707bc6bc10a8f1c399301844f37b', 'owner');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
