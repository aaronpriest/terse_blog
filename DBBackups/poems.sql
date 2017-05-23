-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 09:05 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terse_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `poems`
--

CREATE TABLE `poems` (
  `poem_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `written_date` datetime NOT NULL,
  `display_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `poem_content` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_id_1` int(11) DEFAULT NULL,
  `tag_id_2` int(11) DEFAULT NULL,
  `tag_id_3` int(11) DEFAULT NULL,
  `tag_id_4` int(11) DEFAULT NULL,
  `tag_id_5` int(11) DEFAULT NULL,
  `tag_id_6` int(11) DEFAULT NULL,
  `tag_id_7` int(11) DEFAULT NULL,
  `tag_id_8` int(11) DEFAULT NULL,
  `tag_id_9` int(11) DEFAULT NULL,
  `tag_id_10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poems`
--

INSERT INTO `poems` (`poem_id`, `title`, `written_date`, `display_date`, `poem_content`, `tag_id_1`, `tag_id_2`, `tag_id_3`, `tag_id_4`, `tag_id_5`, `tag_id_6`, `tag_id_7`, `tag_id_8`, `tag_id_9`, `tag_id_10`) VALUES
(10001, 'Poem One', '2017-05-22 15:48:06', 'May 22, 2017', '<p>Give me flesh and give me wine</p><p>Bring me pine logs hither</p>', 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(999999, 'New', '2017-05-23 09:30:36', 'May 22, 2017', 'Create a new poem, here.', 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poems`
--
ALTER TABLE `poems`
  ADD PRIMARY KEY (`poem_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
