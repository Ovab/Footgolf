-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2021 at 11:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footgolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `groep`
--

DROP TABLE IF EXISTS `groep`;
CREATE TABLE IF NOT EXISTS `groep` (
  `GroepNaam` varchar(69) DEFAULT NULL,
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `Aanmaak_datum` datetime NOT NULL,
  `Speler_aantal` int(11) NOT NULL,
  `Speler1` varchar(69) DEFAULT NULL,
  `Speler2` varchar(69) DEFAULT NULL,
  `Speler3` varchar(69) DEFAULT NULL,
  `Speler4` varchar(69) DEFAULT NULL,
  `num_holes` int(11) NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=97241 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groep`
--

INSERT INTO `groep` (`GroepNaam`, `groupID`, `Aanmaak_datum`, `Speler_aantal`, `Speler1`, `Speler2`, `Speler3`, `Speler4`, `num_holes`) VALUES
('ovabs team', 58769, '2021-10-06 13:34:40', 1, 'ovab', NULL, NULL, NULL, 27);

-- --------------------------------------------------------

--
-- Table structure for table `spelers`
--

DROP TABLE IF EXISTS `spelers`;
CREATE TABLE IF NOT EXISTS `spelers` (
  `Speler-email` varchar(45) NOT NULL,
  `Speler-naam` varchar(45) NOT NULL,
  `Speler-telefoon` int(11) DEFAULT NULL,
  PRIMARY KEY (`Speler-email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spelers`
--

INSERT INTO `spelers` (`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES
('bavo.famknol@gmail.com', 'ovab', 619541435),
('Nick@snickers.nl', 'Nick', 698764321),
('Parker@penis.nl', 'Penis Parker', 623456789),
('Pietjan@gmail.com', 'Pieter', 612345678);

-- --------------------------------------------------------

--
-- Table structure for table `spellen`
--

DROP TABLE IF EXISTS `spellen`;
CREATE TABLE IF NOT EXISTS `spellen` (
  `SpelID` int(11) NOT NULL AUTO_INCREMENT,
  `Hole` int(11) NOT NULL,
  `Speler1` int(11) DEFAULT NULL,
  `Speler2` int(11) DEFAULT NULL,
  `Speler3` int(11) DEFAULT NULL,
  `Speler4` int(11) DEFAULT NULL,
  `Speler5` int(11) DEFAULT NULL,
  `groupID` int(11) NOT NULL,
  PRIMARY KEY (`SpelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
