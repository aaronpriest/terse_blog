-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2014 at 05:45 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tersedev`
--
CREATE DATABASE IF NOT EXISTS `tersedev` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `tersedev`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `postID` char(10) NOT NULL,
  `commenterName` varchar(50) DEFAULT NULL,
  `commentDate` varchar(30) DEFAULT NULL,
  `commentNum` int(3) DEFAULT '1',
  `commentText` varchar(500) DEFAULT NULL,
  `commentID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`postID`, `commenterName`, `commentDate`, `commentNum`, `commentText`, `commentID`) VALUES
('Jan292011', 'The Author', 'April 1, 2014 @ 10:31 am', 1, 'Feel free to comment on this page.', 199),
('Jan292011', 'User', 'April 2, 2014 @ 4:10 pm', 2, 'Thanks, I will.', 200);

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
CREATE TABLE IF NOT EXISTS `feeds` (
  `title` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `link` varchar(45) NOT NULL,
  `date` char(20) NOT NULL,
  `feedID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`feedID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`title`, `description`, `link`, `date`, `feedID`) VALUES
('Mercy', 'A poem about little known mercies.', '/main.php?postID=Jan29201', '2011-1-29', 1),
('Distance', 'A poem about friendships with distance in them.', '/main.php?postID=Feb62011', '2011-2-6', 2),
('Soldiers', 'A poem for those who fight "the war at home."', '/main.php?postID=Apr32011', '2011-4-3', 3),
('Ripples', 'Life can be ripples on a pond, or giant rogue waves.', '/main.php?postID=Oct52012', '2012-10-5', 11),
('Dust', 'Sometimes I trample on my own thoughts.', '/main.php?postID=Oct26201', '2012-10-27', 12),
('Sandy', 'The author reflects on hurricane Sandy and what he sees when he sees a storm.', '/main.php?postID=Oct30201', '2012-10-30', 13),
('Worst', 'A haiku about who knows what.', '/main.php?postID=Jan302014', '2014-01-30', 22),
('Election', 'The 2012 election reminded the author of baby birds. ', '/main.php?postID=Nov20201', '2012-11-20', 15),
('Mirror', 'The author explains why he writes.', '/main.php?postID=Dec28201', '2012-12-29', 16),
('Rescued', 'The author notes that silence is a rescuer that is often resisted. ', '/main.php?postID=Feb21201', '2013-02-21', 17),
('Cold', 'The author explores why people lose heart as they age. ', '/main.php?postID=May22201', '2013-05-22', 18),
('Coffee', 'The author talks about drinking coffee at night.', '/main.php?postID=Jul31201', '2013-07-31', 19),
('Crosswalk', 'I disobeyed the 15 lines rule when talking about busy downtown streets. What are you going to do about it?', '/main.php?postID=Sep24201', '2013-09-24', 20),
('Dream', 'A dream unexpectedly unearths a desire for wholeness.', '/main.php?postID=Jan16201', '2014-01-16', 21),
('Unsaid', 'A reflection on neglect. ', 'http://terse.comyr.com/main.php?postID=Feb420', '2014-02-04', 23),
('Learning', 'A response to the idea that learning is the brain making new connections.', 'http://terse.comyr.com/main.php?postID=Feb520', '2014-02-05', 24),
('Weary', 'The author is whining about winter.', 'http://terse.comyr.com/main.php?postID=Mar122', '2014-03-12', 25),
('Trickster', 'Nature is the original trickster. ', 'http://aaronpriest-terse.rhcloud.com/main.php', '2014-04-01', 26);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postID` char(10) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `current_post` binary(1) NOT NULL DEFAULT '0',
  `sysdate` datetime NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `title`, `date`, `current_post`, `sysdate`) VALUES
('Apr032011', 'Soldiers', 'April 3, 2011', '0', '2011-04-03 00:00:00'),
('Dec282012', 'Mirror', 'December 28, 2012', '0', '2012-12-28 00:00:00'),
('Feb062011', 'Distance', 'February 6, 2011', '0', '2011-02-06 00:00:00'),
('Feb212013', 'Rescued', 'February 21, 2013', '0', '2013-02-21 00:00:00'),
('Jan292011', 'Mercy', 'January 29, 2011', '0', '2011-01-29 00:00:00'),
('Jul312013', 'Coffee', 'July 31, 2013', '0', '2013-07-31 15:16:15'),
('May222013', 'Cold', 'May 22, 2013', '0', '2013-05-22 17:40:02'),
('Nov202012', 'Election', 'November 20, 2012', '0', '2012-11-20 00:00:00'),
('Oct262012', 'Dust', 'October 26, 2012', '0', '2012-10-26 00:00:00'),
('Oct302012', 'Sandy', 'October 30, 2012', '0', '2012-10-30 00:00:00'),
('Oct52012', 'Ripples', 'October 5, 2012', '0', '2012-10-05 00:00:00'),
('Sep242013', 'Crosswalk', 'September 24, 2013', '0', '2013-09-24 17:57:27'),
('Sep92013', 'Spinning', 'September 9, 2013', '0', '2013-09-09 09:49:16'),
('Jan162014', 'Dream', 'January 16, 2014', '0', '2014-01-16 13:33:25'),
('Jan302014', 'Worst', 'January 30, 2014', '0', '2014-01-31 00:00:00'),
('Feb42014', 'Unsaid', 'February 4, 2014', '0', '2014-02-04 17:13:33'),
('Feb52014', 'Learning', 'February 5, 2014', '0', '2014-02-05 14:46:16'),
('Mar122014', 'Weary', 'March 12, 2014', '0', '2014-03-12 13:47:30'),
('Apr12014', 'Trickster', 'April 1, 2014', '0', '2014-04-01 11:37:27'),
('Apr22014', 'Incident', 'April 2, 2014', '1', '2014-04-02 00:00:00');
