-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2012 at 10:14 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wq`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `Author`, `Timestamp`) VALUES
(11, 'A.N.Other', 1328019363),
(10, 'Hey', 1328018164),
(9, 'You', 1328017823),
(8, 'Me', 1328017664),
(7, '', 1328017109),
(6, 'Jane Austen', 1328016552),
(12, 'Your Mum', 1328020079),
(13, 'Hello', 1328020119),
(14, 'Oops', 1328020161),
(15, 'Now', 1328020219),
(16, 'Another', 1328020338),
(17, 'Erm', 1328021055),
(18, 'Big Ears', 1328021782),
(19, 'Miss Austen', 1328023043),
(20, 'Bla', 1328023881),
(21, 'Michael Caine/Charlie Crocker', 1328027787),
(22, 'Julia Stiles as Sara in Save the Last Dance', 1328029721),
(23, 'Albert Einstein', 1328129460),
(24, 'Decarte', 1328272863),
(25, 'Nathan Edwards', 1328272935),
(26, 'Xerxes', 1328273011),
(27, 'Solomon', 1328273056),
(28, 'Ren&Atilde;&copy; Descartes', 1328273194),
(29, 'Som&Atilde;&copy;one', 1328273723),
(30, 'M&Atilde;&copy;', 1328273928),
(31, 'A p&Atilde;&copy;rson', 1328273946),
(32, 'M&Atilde;&copy;', 1328274165),
(33, 'MÃ©', 1328274230),
(34, 'M&Atilde;&copy;', 1328274373),
(35, 'M&Atilde;&uml;', 1328274391),
(36, 'M&Atilde;&copy;', 1328274639),
(37, 'M&Atilde;&copy;', 1328274708);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`QuoteID`, `Quote`, `Timestamp`, `AuthorID`) VALUES
(1, 'It is a truth universally acknowledged that a single man in possession of a large fortune must be in want of a wife', 1328006719, 6),
(2, 'You''re only supposed to blow the bloody doors off!', 1328027769, 21),
(7, 'Pure mathematics is, in its way, the poetry of logical ideas', 1328129444, 23);
