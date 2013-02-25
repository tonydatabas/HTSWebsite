-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 25 feb 2013 kl 07:34
-- Serverversion: 5.5.20
-- PHP-version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `demo`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `elever`
--

CREATE TABLE IF NOT EXISTS `elever` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `elever`
--

INSERT INTO `elever` (`id`, `klass`) VALUES
(1, '1a'),
(2, '1a'),
(3, '1b'),
(4, '1c');

-- --------------------------------------------------------

--
-- Tabellstruktur `larare`
--

CREATE TABLE IF NOT EXISTS `larare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legitimation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `larare`
--

INSERT INTO `larare` (`id`, `legitimation`) VALUES
(1, 'Matematik/Data'),
(2, 'Svenska/Utlänska');

-- --------------------------------------------------------

--
-- Tabellstruktur `personer`
--

CREATE TABLE IF NOT EXISTS `personer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arLara` tinyint(1) NOT NULL,
  `altId` int(11) NOT NULL,
  `namn` tinytext NOT NULL,
  `alder` tinyint(4) NOT NULL,
  `adress` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `personer`
--

INSERT INTO `personer` (`id`, `arLara`, `altId`, `namn`, `alder`, `adress`) VALUES
(1, 1, 1, 'Ada Lovelace', 127, 'Stobygatan 7\r\n281 39  Hässleholm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
