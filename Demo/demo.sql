-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 11 feb 2013 kl 10:49
-- Serverversion: 5.5.27-log
-- PHP-version: 5.4.6

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
-- Tabellstruktur `larare`
--

CREATE TABLE IF NOT EXISTS `larare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legitimation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
