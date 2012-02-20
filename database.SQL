-- phpMyAdmin SQL Dump
-- version One.com phpmyadmin
-- http://www.phpmyadmin.net
-- 
-- Host: MySQL Server
-- Generation Time: Feb 20, 2012 at 09:47 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.0-8+etch16
-- 
-- Database: `nathanpfedwards`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `authors`
-- 

CREATE TABLE `authors` (
  `AuthorID` int(11) NOT NULL auto_increment,
  `QuoteID` int(11) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY  (`AuthorID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- 
-- Dumping data for table `authors`
-- 

INSERT INTO `authors` VALUES (6, 1, 'Jane Austen', 1328016552);
INSERT INTO `authors` VALUES (21, 2, 'Michael Caine/Charlie Crocker', 1328027787);
INSERT INTO `authors` VALUES (22, 5, 'Julia Stiles as Sara in Save the Last Dance', 1328029721);
INSERT INTO `authors` VALUES (23, 7, 'Albert Einstein', 1328129460);
INSERT INTO `authors` VALUES (24, 6, 'Decarte', 1328272863);
INSERT INTO `authors` VALUES (25, 7, 'Nathan Edwards', 1328272935);
INSERT INTO `authors` VALUES (26, 3, 'Xerxes', 1328273011);
INSERT INTO `authors` VALUES (27, 8, 'Solomon', 1328273056);

-- --------------------------------------------------------

-- 
-- Table structure for table `concurrance`
-- 

CREATE TABLE `concurrance` (
  `ConcurID` int(11) NOT NULL auto_increment,
  `AuthorID` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY  (`ConcurID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `concurrance`
-- 

xINSERT INTO `concurrance` VALUES (23, 6, 1328023753, 0);
INSERT INTO `concurrance` VALUES (24, 6, 1328023829, 0);
INSERT INTO `concurrance` VALUES (25, 20, 1328023885, 0);
INSERT INTO `concurrance` VALUES (26, 6, 1328024063, 0);
INSERT INTO `concurrance` VALUES (27, 6, 1328024091, 0);
INSERT INTO `concurrance` VALUES (28, 6, 1328024170, 0);
INSERT INTO `concurrance` VALUES (29, 6, 1328024214, 0);
INSERT INTO `concurrance` VALUES (30, 6, 1328129509, 0);
INSERT INTO `concurrance` VALUES (31, 6, 1328198217, 0);
INSERT INTO `concurrance` VALUES (32, 6, 1328272970, 0);
INSERT INTO `concurrance` VALUES (33, 7, 1328273391, 0);
INSERT INTO `concurrance` VALUES (34, 7, 1328273688, 0);
INSERT INTO `concurrance` VALUES (35, 28, 1328273701, 0);
INSERT INTO `concurrance` VALUES (36, 7, 1328274097, 0);
INSERT INTO `concurrance` VALUES (37, 7, 1328274212, 0);
INSERT INTO `concurrance` VALUES (38, 7, 1328274336, 0);
INSERT INTO `concurrance` VALUES (39, 7, 1328274605, 0);
INSERT INTO `concurrance` VALUES (40, 34, 1328274629, 0);
INSERT INTO `concurrance` VALUES (41, 7, 1328274668, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `quotes`
-- 

CREATE TABLE `quotes` (
  `QuoteID` int(11) NOT NULL auto_increment,
  `Quote` varchar(1000) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY  (`QuoteID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `quotes`
-- 

INSERT INTO `quotes` VALUES (1, 'It is a truth universally acknowledged that a single man in possession of a large fortune must be in want of a wife', 1328006719);
INSERT INTO `quotes` VALUES (2, 'You''re only supposed to blow the bloody doors off!', 1328027769);
INSERT INTO `quotes` VALUES (3, 'This is madness!', 1328027825);
INSERT INTO `quotes` VALUES (4, 'Always look on the bright side of life', 1328029330);
INSERT INTO `quotes` VALUES (5, 'You know Snook, you talk a lot of shit for someone who never says anything.', 1328029690);
INSERT INTO `quotes` VALUES (6, 'I think therefore I am', 1328029758);
INSERT INTO `quotes` VALUES (7, 'Pure mathematics is, in its way, the poetry of logical ideas', 1328129444);
INSERT INTO `quotes` VALUES (8, 'meaningless, meaningless, everything is meaningless', 1328273048);
INSERT INTO `quotes` VALUES (9, 'All mortals tend to turn into the thing they are pretending to be. ', 1328273651);
