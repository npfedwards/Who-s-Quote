-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2012 at 10:40 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wq`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `AnswerID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `QuoteID` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `Correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`AnswerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `AuthorID` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(100) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`AuthorID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `Author`, `Timestamp`) VALUES
(6, 'Jane Austen', 1328016552),
(21, 'Michael Caine/Charlie Crocker', 1328027787),
(23, 'Albert Einstein', 1328129460),
(39, 'Brain', 1331743037),
(38, 'JF Kennedy', 1328274708);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `QuoteID` int(11) NOT NULL AUTO_INCREMENT,
  `Quote` varchar(1000) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  PRIMARY KEY (`QuoteID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`QuoteID`, `Quote`, `Timestamp`, `AuthorID`) VALUES
(1, 'It is a truth universally acknowledged that a single man in possession of a large fortune must be in want of a wife', 1328006719, 6),
(2, 'You''re only supposed to blow the bloody doors off!', 1328027769, 21),
(7, 'Pure mathematics is, in its way, the poetry of logical ideas', 1328129444, 23),
(11, 'The same thing we do every night Pinky, try to take over the world', 1331743037, 39),
(10, 'Ich bin ein Berliner (I am a pastry)', 1328274708, 38);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `SessionID` int(11) NOT NULL AUTO_INCREMENT,
  `SessionKey` varchar(100) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserString` varchar(100) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Salt` varchar(10) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--