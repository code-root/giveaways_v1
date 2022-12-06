-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2022 at 09:48 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asmaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `FullName` varchar(90) DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `FullName`, `password`, `status`) VALUES
(1, 'sofa', 'zxsofazx@gmail.com', 'mostafa elbagory ', '21cc9783658a11be7149e47251cc989a38c1e331', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `ads_1` text NOT NULL,
  `ads_2` text NOT NULL,
  `ads_3` text NOT NULL,
  `ads_4` text NOT NULL,
  `ads_5` text NOT NULL,
  `ads_6` text NOT NULL,
  `ads_7` text NOT NULL,
  `ads_8` text NOT NULL,
  `ads_9` text NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ddos`
--

DROP TABLE IF EXISTS `ddos`;
CREATE TABLE IF NOT EXISTS `ddos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `ip` varchar(50) NOT NULL,
  `UniqueMachineID` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ddos`
--

INSERT INTO `ddos` (`id`, `UserId`, `ip`, `UniqueMachineID`, `date`, `status`) VALUES
(6, 23, '::1', 'e1d04db3591a486595f1463ab49d776e', '0000-00-00 00:00:00', b'1'),
(7, 24, '::1', 'e1d04db3591a486595f1463ab49d776e', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `txt` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `UserId`, `instagram`, `facebook`, `whatsapp`, `website`, `txt`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, 'facebook.com', 'whatsapp', NULL, NULL),
(3, 7, NULL, NULL, NULL, NULL, NULL),
(4, 8, NULL, NULL, NULL, NULL, NULL),
(5, 9, NULL, NULL, NULL, NULL, NULL),
(6, 11, NULL, NULL, NULL, NULL, NULL),
(7, 12, NULL, NULL, NULL, NULL, NULL),
(8, 13, NULL, NULL, NULL, NULL, NULL),
(9, 14, NULL, NULL, NULL, NULL, NULL),
(10, 15, NULL, NULL, NULL, NULL, NULL),
(11, 16, NULL, NULL, NULL, NULL, NULL),
(12, 17, NULL, NULL, NULL, NULL, NULL),
(13, 18, NULL, NULL, NULL, NULL, NULL),
(14, 19, NULL, NULL, NULL, NULL, NULL),
(15, 20, NULL, NULL, NULL, NULL, NULL),
(16, 21, NULL, NULL, NULL, NULL, NULL),
(17, 22, NULL, NULL, NULL, NULL, NULL),
(18, 23, NULL, NULL, NULL, NULL, NULL),
(19, 24, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserID` varchar(50) NOT NULL,
  `kay` varchar(50) NOT NULL,
  `ex_date` int DEFAULT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `UserID`, `kay`, `ex_date`, `status`) VALUES
(7, '2', '768e78024aa8fdb9b8fe87be86f64745efd1c92cf5', 1634518060, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `correct` int DEFAULT NULL,
  `Wrong` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `UserId`, `correct`, `Wrong`, `points`) VALUES
(2, 2, 100, 300, 1000),
(3, 7, NULL, NULL, NULL),
(4, 8, NULL, NULL, NULL),
(5, 9, NULL, NULL, NULL),
(6, 11, NULL, NULL, NULL),
(7, 12, NULL, NULL, NULL),
(8, 13, NULL, NULL, NULL),
(9, 14, NULL, NULL, NULL),
(10, 15, NULL, NULL, NULL),
(11, 16, NULL, NULL, NULL),
(12, 17, NULL, NULL, NULL),
(13, 18, NULL, NULL, NULL),
(14, 19, NULL, NULL, NULL),
(15, 20, NULL, NULL, NULL),
(16, 21, NULL, NULL, NULL),
(17, 22, NULL, NULL, NULL),
(18, 23, 1, 7, 67),
(19, 24, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sectionID` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `One` varchar(20) NOT NULL,
  `Two` varchar(20) NOT NULL,
  `three` varchar(20) NOT NULL,
  `four` varchar(20) NOT NULL,
  `correct` varchar(5) NOT NULL,
  `count` int NOT NULL,
  `points` int NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` bit(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `sectionID`, `name`, `One`, `Two`, `three`, `four`, `correct`, `count`, `points`, `date`, `status`) VALUES
(3, 'QV5NO', 'من هوا مصطفى', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 1, 2, '1629754655', b'00'),
(4, 'QV5NO', 'من هوا مصطفى 1', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 2, 2, '1629754683', b'00'),
(5, 'QV5NO', 'من هوا مصطفى 2', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 3, 2, '1629754686', b'00'),
(6, 'QV5NO', 'من هوا مصطفى 4', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 4, 2, '1629754689', b'00'),
(7, 'QV5NO', 'من هوا مصطفى5', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 5, 2, '1629754692', b'00'),
(8, 'QV5NO', 'من هوا مصطفى 6', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 6, 2, '1629754696', b'00'),
(9, 'QV5NO', 'من هوا مصطفى 7', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 7, 2, '1629754699', b'00'),
(10, 'QV5NO', 'من هوا مصطفى 8', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 8, 2, '1629754704', b'00'),
(11, 'QV5NO', 'من هوا مصطفى 9', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 9, 2, '1629754709', b'00'),
(12, 'QV5NO', 'من هوا مصطفى 10', 'محمد', 'خالد', 'سعيد', 'سمير', 'three', 10, 2, '1629754713', b'00'),
(13, '4189J', 'كيف بدا الخلق ', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 1, 3, '1629755818', b'00'),
(14, '4189J', 'كيف بدا الخلق 2', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 2, 3, '1629755822', b'00'),
(15, '4189J', 'كيف بدا الخلق6', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 3, 3, '1629755825', b'00'),
(16, '4189J', 'كيف بدا الخلق2', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 4, 3, '1629755830', b'00'),
(17, '4189J', 'كيف بدا الخلق2 3ق', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 5, 3, '1629755833', b'00'),
(18, '4189J', 'كيف بدا الخلق2 3ق4 ', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 6, 3, '1629755836', b'00'),
(19, '4189J', 'كيف بدا الخلق2 3ق4 4', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 7, 3, '1629755838', b'00'),
(20, '4189J', 'كيف بدا الخلق2 3ق424', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 8, 3, '1629755841', b'00'),
(21, '4189J', 'كيف بدا الخلق2 8', 'من ربنا', 'من الهند', 'سعيد محمر', 'سمسرة خالد', 'four', 9, 3, '1629755846', b'00'),
(22, '4189J', 'ثبصصثبثص', 'ضصيصض', 'يصضيصض', 'صيصضي', 'يضصي', 'One', 10, 3, '1629755870', b'00'),
(23, 'GBSLR', 'FVFF ', 'FSD', 'SDF', 'DF', 'DF', 'Two', 1, 67, '1631579106', b'00'),
(24, 'GBSLR', 'dcdc', 'dcdc', 'cdcdc', 'dcdc', 'dccd', 'three', 2, 67, '1631579248', b'00');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `sectionID` varchar(11) NOT NULL,
  `status` bit(1) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `UserId`, `sectionID`, `status`, `date`) VALUES
(1, 2, 'GBSLR', b'0', '1633564800'),
(2, 23, 'GBSLR', b'1', '1634688000'),
(3, 23, 'GBSLR', b'1', '1634688000'),
(4, 23, 'GBSLR', b'1', '1634688000'),
(5, 23, 'GBSLR', b'1', '1634688000'),
(6, 3, 'GBSLR', b'1', '1635724800');

-- --------------------------------------------------------

--
-- Table structure for table `record_answers`
--

DROP TABLE IF EXISTS `record_answers`;
CREATE TABLE IF NOT EXISTS `record_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recordID` int NOT NULL,
  `questionID` int NOT NULL,
  `UserId` int NOT NULL,
  `sectionID` varchar(25) NOT NULL,
  `answer` varchar(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `record_answers`
--

INSERT INTO `record_answers` (`id`, `recordID`, `questionID`, `UserId`, `sectionID`, `answer`, `date`) VALUES
(1, 1, 23, 2, 'GBSLR', 'One', '1633576089'),
(2, 2, 24, 23, 'GBSLR', '', '1634743100'),
(3, 2, 23, 23, 'GBSLR', '', '1634743128'),
(4, 3, 23, 23, 'GBSLR', '', '1634743298'),
(5, 3, 24, 23, 'GBSLR', '', '1634743351'),
(6, 4, 23, 23, 'GBSLR', 'three', '1634743695'),
(7, 4, 24, 23, 'GBSLR', '', '1634743721'),
(8, 5, 24, 23, 'GBSLR', 'Two', '1634743837'),
(9, 5, 23, 23, 'GBSLR', 'Two', '1634743843'),
(10, 6, 23, 3, 'GBSLR', 'One', '1635763139'),
(11, 6, 24, 3, 'GBSLR', 'Two', '1635763740');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

DROP TABLE IF EXISTS `referrals`;
CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `referralsID` int DEFAULT NULL,
  `points` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `UserId`, `referralsID`, `points`, `date`, `status`) VALUES
(3, 2, 16, '10', '1634385882', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `points` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `UserId`, `points`, `date`, `status`) VALUES
(7, 2, '100006', '2021-10-03', b'0'),
(8, 2, '100006', '2021-10-03', b'0'),
(9, 2, '100006', '2021-10-03', b'0'),
(10, 2, '100006', '2021-10-03', b'0'),
(11, 2, '100006', '2021-10-03', b'0'),
(12, 2, '100006', '2021-10-03', b'0'),
(13, 2, '100006', '2021-10-03', b'0'),
(14, 2, '100006', '2021-10-03', b'0'),
(15, 2, '100006', '2021-10-03', b'0'),
(16, 2, '100006', '2021-10-03', b'0'),
(17, 2, '100006', '2021-10-02', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rand` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `points` int DEFAULT NULL,
  `status` bit(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `rand`, `date`, `points`, `status`) VALUES
(3, 'برمجة ', '4189J', '1629755768', NULL, b'01'),
(2, 'السؤال الأول', 'QV5NO', '1629750990', NULL, b'01'),
(4, 'mostafa elbagory', 'GBSLR', '1631578378', 67, b'00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instagram` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `facebook` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `snapchat` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `wa` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `timer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaximumShare` int DEFAULT NULL,
  `Referrals` varchar(25) DEFAULT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf16 COLLATE utf16_german2_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf16 COLLATE utf16_german2_ci DEFAULT NULL,
  `img` varchar(50) CHARACTER SET utf16 COLLATE utf16_german2_ci DEFAULT NULL,
  `date` varchar(25) CHARACTER SET utf16 COLLATE utf16_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf16 COLLATE=utf16_german2_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `title`, `img`, `date`) VALUES
(9, 'الجائزة الخامسة 10000 دولار امريكي', 'شارك الان في مسابقة مكسبي وادخل السحب علي جائزة 10000 دولار', 'NDVKD', '1633700697'),
(10, 'الجائزة الرابعة 20000 دولار امريكي', 'شارك الان في مسابقة مكسبي وادخل السحب علي جائزة 10000 دولار', 'NDVKD', '1633700727'),
(11, 'الجائزة الثالثة 25000 دولار امريكي', 'شارك الان في مسابقة مكسبي وادخل السحب علي جائزة 25000 دولار', 'NDVKD', '1633700750');

-- --------------------------------------------------------

--
-- Table structure for table `timeout`
--

DROP TABLE IF EXISTS `timeout`;
CREATE TABLE IF NOT EXISTS `timeout` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `time` varchar(50) NOT NULL,
  `detaTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `timeout`
--

INSERT INTO `timeout` (`id`, `userID`, `time`, `detaTime`) VALUES
(1, 1, '1642430278', '2021-08-22 01:15:44'),
(2, 2, '1634476233', '2021-08-24 00:22:08'),
(3, 6, '1633569245', '2021-10-07 03:12:04'),
(4, 3, '1635764696', '2021-10-16 15:45:50'),
(5, 19, '1634476828', '2021-10-16 15:53:51'),
(6, 23, '1634747537', '2021-10-20 17:17:44'),
(7, 24, '1636933938', '2021-11-15 01:29:39'),
(8, 7, '1637731262', '2021-11-23 19:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedfile`
--

DROP TABLE IF EXISTS `uploadedfile`;
CREATE TABLE IF NOT EXISTS `uploadedfile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `rand` varchar(11) DEFAULT NULL,
  `case` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `uploadedfile`
--

INSERT INTO `uploadedfile` (`id`, `file`, `rand`, `case`, `date`) VALUES
(1, '1633651200slider54.png', 'NDVKD', 'NDVKD', '1633700694');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `NameOne` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NameTwo` varchar(20) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `email` varchar(59) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `complete` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NameOne`, `NameTwo`, `number`, `email`, `username`, `password`, `status`, `date`, `img`, `gender`, `complete`) VALUES
(3, 'TH MOHAMED', '', NULL, 'th@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634384354', '', NULL, b'1'),
(2, 'mostafa ', 'elbagory', '01001995914', 'zxsofazx@gmail.com', 'sofa', 'e96ab8fd42c617c3116767bd9600a6934196d4ae', 0, '1629757278', '1633046400profile29.png', NULL, b'1'),
(4, 'th', '', NULL, 'thh@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 1, '1634384407', '', NULL, b'0'),
(5, 'tht', '', NULL, 'thh5@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 1, '1634384431', '', NULL, b'0'),
(6, 'tht', '', NULL, 'ths5@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 1, '1634384453', '', NULL, b'0'),
(7, 'tht', '', NULL, 'th4s5@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634384583', '', NULL, b'0'),
(8, 'refr', '', NULL, '4fazx@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385398', '', NULL, b'0'),
(9, 'rr rrr', '', NULL, 'zrrx@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385431', '', NULL, b'0'),
(10, 'dscsdcds', '', NULL, 'eeeex@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385497', '', NULL, b'0'),
(11, 'wefwef edew', '', NULL, 'wed@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385656', '', NULL, b'0'),
(12, 'wefwef edew', '', NULL, 'wesd@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385711', '', NULL, b'0'),
(13, 'wefwef edew', '', NULL, 'wgesd@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385745', '', NULL, b'0'),
(14, 'wefwef edew', '', NULL, 'wgesyd@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385822', '', NULL, b'0'),
(15, 'wefwef edew', '', NULL, 'wgedsyd@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385839', '', NULL, b'0'),
(16, 'wefwef edew', '', NULL, 'wgediiiiid@gmail.com', '', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634385882', '', NULL, b'0'),
(17, 'dggsrfec', '', NULL, 'edwdwedew@gmail.com', 'dggsrfec16', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634392390', '', NULL, b'0'),
(18, 'dggsrfec', '', NULL, 'eddwdwedew@gmail.com', 'dggsrfec16', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634392400', '', NULL, b'0'),
(19, 'dggsrfec', '', NULL, 'eddwddwedew@gmail.com', 'dggsrfec16', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634392419', '', NULL, b'0'),
(20, 'mostafa elbagory', '', NULL, 'zxsofaxx@gmail.com', 'mostafa el', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634465872', '', NULL, b'0'),
(21, 'mostafa elbagory', '', NULL, 'zxsofasxx@gmail.com', 'mostafa el', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634465897', '', NULL, b'0'),
(22, 'mostafa elbagory', '', NULL, 'zxsofasxsx@gmail.com', 'mostafa el', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634465927', '', NULL, b'0'),
(23, 'mostafa elbagory', 'elbagory', '01001994913', 'zxsofassxsx@gmail.com', 'mostafa el', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1634465955', '', NULL, b'1'),
(24, 'mostafa elbagory', '', NULL, 'ty@gmail.com', 'mostafam38', '21cc9783658a11be7149e47251cc989a38c1e331', 0, '1636932562', '', NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `wordfilter`
--

DROP TABLE IF EXISTS `wordfilter`;
CREATE TABLE IF NOT EXISTS `wordfilter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
