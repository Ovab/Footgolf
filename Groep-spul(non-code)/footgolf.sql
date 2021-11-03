-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2021 at 01:43 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
-- Table structure for table `emailverify`
--

DROP TABLE IF EXISTS `emailverify`;
CREATE TABLE IF NOT EXISTS `emailverify` (
  `SpelerEmail` varchar(45) NOT NULL,
  `verifyCode` int(11) NOT NULL,
  `Creation_dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SpelerEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailverify`
--

INSERT INTO `emailverify` (`SpelerEmail`, `verifyCode`, `Creation_dateTime`) VALUES
('yeet@bavoknol.nl', 46530, '2021-11-03 14:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `groep`
--

DROP TABLE IF EXISTS `groep`;
CREATE TABLE IF NOT EXISTS `groep` (
  `GroepNaam` varchar(69) DEFAULT NULL,
  `groupID` int(11) NOT NULL,
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
('', 30780, '2021-11-03 10:37:00', 1, 'ovab', NULL, NULL, NULL, 27);

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
  `groupID` int(11) NOT NULL,
  `Aanmaak_datum` date NOT NULL,
  `GroepNaam` varchar(69) DEFAULT NULL,
  `GroepScore` int(11) NOT NULL,
  PRIMARY KEY (`SpelID`)
) ENGINE=InnoDB AUTO_INCREMENT=5444 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spellen`
--

INSERT INTO `spellen` (`SpelID`, `Hole`, `Speler1`, `Speler2`, `Speler3`, `Speler4`, `groupID`, `Aanmaak_datum`, `GroepNaam`, `GroepScore`) VALUES
(4, 1, 10, 3, 4, 4, 36321, '2021-10-25', 'Meme-man\r\n', 21),
(5, 1, 3, 2, 4, 9, 46713, '2021-10-25', 'Gamers', 18),
(6, 2, 6, 2, 4, 5, 46714, '2021-10-25', 'Hey', 17),
(7, 3, 3, 1, 5, 2, 69283, '2021-10-26', 'Meme-meisters', 11),
(8, 1, 9, 2, 4, 2, 7393, '2021-10-26', 'KaasBolletjes', 17),
(21, 1, 9, 2, 4, 2, 7392, '2021-10-26', 'KaasBolletjes2', 17),
(31, 1, 10, 10, 10, 10, 2723, '2021-10-26', 'Noob-meisters', 40),
(65, 3, 3, 1, 5, 2, 69286, '2021-10-26', 'Meme-meisters2', 11),
(72, 2, 1, 1, 1, 1, 5738, '2021-10-26', 'Pros', 4),
(90, 1, 1, 1, 1, 1, 5738, '2021-10-26', 'Pros', 4),
(4432, 1, 9, 2, 4, 2, 7392, '2021-10-26', 'KaasBolletjes3', 17),
(5432, 1, 9, 2, 4, 2, 7393, '2021-10-26', 'KaasBolletjes4', 17),
(5433, 3, 3, 1, 5, 2, 69286, '2021-10-26', 'Meme-meisters3', 11),
(5434, 1, 8, NULL, NULL, NULL, 74365, '2021-10-27', 'Test-team', 8),
(5435, 1, 3, 2, 8, 2, 54514, '2021-10-27', 'Knee-growers', 15),
(5436, 2, 2, 2, NULL, NULL, 54514, '2021-10-27', 'Knee-growers', 4),
(5437, 3, 4, NULL, NULL, NULL, 54514, '2021-10-27', 'Knee-growers', 4),
(5438, 4, 4, NULL, NULL, NULL, 54514, '2021-10-27', 'Knee-growers', 4),
(5439, 1, 7, 6, NULL, NULL, 61744, '2021-10-28', 'Parker', 34),
(5440, 2, 9, NULL, NULL, NULL, 61744, '2021-10-28', 'Parker', 34),
(5441, 3, 9, NULL, NULL, NULL, 61744, '2021-10-28', 'Parker', 34),
(5442, 10, 3, NULL, NULL, NULL, 61744, '2021-10-28', 'Parker', 34),
(5443, 1, 5, NULL, NULL, NULL, 28197, '2021-11-01', '', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
