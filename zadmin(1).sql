-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2015 at 12:40 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_ankur`
--

-- --------------------------------------------------------

--
-- Table structure for table `Library`
--

CREATE TABLE IF NOT EXISTS `Library` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `DisplayName` varchar(100) NOT NULL,
  `OwnerEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DisplayName` (`DisplayName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Library`
--

INSERT INTO `Library` (`ID`, `DisplayName`, `OwnerEmail`) VALUES
(2, 'library_1', 'abhirathore2006@gmail.com'),
(4, 'textbook', 'coolasr@gmail.com'),
(5, 'notes', 'coolasr@gmail.com'),
(6, 'test lib', 'abhirathore2006@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Reference`
--

CREATE TABLE IF NOT EXISTS `Reference` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Author` varchar(100) NOT NULL,
  `Abstract` varchar(200) NOT NULL,
  `PDF` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Annote` varchar(200) NOT NULL,
  `BookTitle` varchar(100) NOT NULL,
  `Chapter` varchar(10) NOT NULL,
  `CrossReference` varchar(100) NOT NULL,
  `Edition` int(6) NOT NULL,
  `E-Print` varchar(40) NOT NULL,
  `HowPublished` varchar(100) NOT NULL,
  `Institution` varchar(200) NOT NULL,
  `Journal` varchar(100) NOT NULL,
  `BibTeXKey` varchar(100) NOT NULL,
  `PublishMonth` varchar(20) NOT NULL,
  `Note` tinytext NOT NULL,
  `IssueNumber` varchar(40) NOT NULL,
  `Organisation` varchar(200) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `School` varchar(200) NOT NULL,
  `Series` varchar(100) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Publish Type` varchar(100) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `Volume` varchar(40) NOT NULL,
  `Year` year(4) NOT NULL,
  `AddedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SharedLibraryID` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Reference`
--

INSERT INTO `Reference` (`ID`, `Author`, `Abstract`, `PDF`, `Address`, `Annote`, `BookTitle`, `Chapter`, `CrossReference`, `Edition`, `E-Print`, `HowPublished`, `Institution`, `Journal`, `BibTeXKey`, `PublishMonth`, `Note`, `IssueNumber`, `Organisation`, `Pages`, `Publisher`, `School`, `Series`, `Title`, `Publish Type`, `URL`, `Volume`, `Year`, `AddedAt`, `SharedLibraryID`) VALUES
(3, 'abhi1', 'dsfjfkj', 'djvs', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 'hey', '', 'cvkcx', '', 1980, '2015-12-17 08:17:35', 5);

-- --------------------------------------------------------

--
-- Table structure for table `SharedLibrary`
--

CREATE TABLE IF NOT EXISTS `SharedLibrary` (
  `ID` bigint(20) NOT NULL,
  `ShareEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SharedLibrary`
--

INSERT INTO `SharedLibrary` (`ID`, `ShareEmail`) VALUES
(2, 'coolasr@gmail.com'),
(5, 'abhirathore2006@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `DisplayName`) VALUES
('abhirathore2006@gmail.com', 'c0f3fc9217bf9ef9ed628c02747bea7b2b3c80e7', 'Abhimanyu'),
('coolasr@gmail.com', 'c0f3fc9217bf9ef9ed628c02747bea7b2b3c80e7', 'coolasr@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
