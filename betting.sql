-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jun 2014 um 15:42
-- Server Version: 5.6.11
-- PHP-Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `betting`
--
CREATE DATABASE IF NOT EXISTS `betting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `betting`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(15) NOT NULL,
  `password` varchar(16) NOT NULL,
  `username` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `account`
--

INSERT INTO `account` (`active`, `created`, `email`, `first_name`, `id`, `last_name`, `password`, `username`) VALUES
(1, '2014-06-06 08:21:24', 'test@test.de', 'test', 5, 'test', 'testtest', 'test'),
(1, '2014-06-06 09:31:55', 'asdfaasdfsdfq@asd', 'sadf', 7, 'test', '123456', 'saf'),
(1, '2014-06-06 09:33:53', 'qasedrg@QWEADFR', 'SEDGFD1', 8, 'WERG', 'QWEASD', 'asdfasdf'),
(1, '2014-06-06 12:02:50', 'wergtwe@wetr', 'wet', 9, 'wer', 'qweasd', 'banane');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `encounters`
--

CREATE TABLE IF NOT EXISTS `encounters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `team` varchar(1) NOT NULL,
  `home` varchar(255) NOT NULL,
  `guest` varchar(255) NOT NULL,
  `result_home` int(11) DEFAULT NULL,
  `result_guest` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Daten für Tabelle `encounters`
--

INSERT INTO `encounters` (`id`, `start_time`, `location`, `team`, `home`, `guest`, `result_home`, `result_guest`) VALUES
(2, '2014-06-12 22:00:00', 'Sao Paulo', 'A', 'Brasilien', 'Kroatien', NULL, NULL),
(3, '2014-06-13 18:00:00', 'Natal', 'A', 'Mexiko', 'Kamerun', NULL, NULL),
(5, '2014-06-13 21:00:00', 'Salvador', 'B', 'Spanien', 'Niederlande', NULL, NULL),
(6, '2014-06-14 00:00:00', 'Cuiaba', 'B', 'Chile', 'Australien', NULL, NULL),
(7, '2014-06-14 18:00:00', 'Belo Horiz.', 'C', 'Kolumbien', 'Griechenland', NULL, NULL),
(8, '2014-06-14 21:00:00', 'Fortaleza', 'D', 'Uruguay', 'Costa Rica', NULL, NULL),
(9, '2014-06-15 00:00:00', 'Manaus', 'D', 'England', 'Italien', NULL, NULL),
(10, '2014-06-15 03:00:00', 'Recife', 'C', 'ElfenbeinkÃ¼ste', 'Japan', NULL, NULL),
(11, '2014-06-15 18:00:00', 'Brasilia', 'E', 'Schweiz', 'Ecuador', NULL, NULL),
(12, '2014-06-15 21:00:00', 'Porto Alegre', 'E', 'Frankreich', 'Honduras', NULL, NULL),
(13, '2014-06-16 00:00:00', 'Rio de Jan.', 'F', 'Argentinien', 'Bosnien-Herzegowina', NULL, NULL),
(14, '2014-06-16 18:00:00', 'Salvador', 'G', 'Deutschland', 'Portugal', NULL, NULL),
(15, '2014-06-16 21:00:00', 'Curitiba', 'F', 'Iran', 'Nigeria', NULL, NULL),
(16, '2014-06-17 00:00:00', 'Natal', 'G', 'Ghana', 'USA', NULL, NULL),
(17, '2014-06-17 18:00:00', 'Belo Horiz.', 'H', 'Belgien', 'Algerien', NULL, NULL),
(18, '2014-06-18 00:00:00', 'Cuiaba', 'H', 'Russland', 'SÃ¼dkorea', NULL, NULL),
(19, '2014-06-17 21:00:00', 'Fortaleza', 'A', 'Brasilien', 'Mexiko', NULL, NULL),
(20, '2014-06-18 18:00:00', 'Porto Alegre', 'B', 'Australien', 'Niederlande', NULL, NULL),
(21, '2014-06-18 21:00:00', 'Rio de Jan.', 'B', 'Spanien', 'Chile', NULL, NULL),
(22, '2014-06-19 00:00:00', 'Manaus', 'A', 'Kamerun', 'Kroatien', NULL, NULL),
(23, '2014-06-19 18:00:00', 'Brasilia', 'C', 'Kolumbien', 'ElfenbeinkÃ¼ste', NULL, NULL),
(24, '2014-06-19 21:00:00', 'Sao Paulo', 'D', 'Uruguay', 'England', NULL, NULL),
(25, '2014-06-20 00:00:00', 'Natal', 'C', 'Japan', 'Griechenland', NULL, NULL),
(26, '2014-06-20 18:00:00', 'Recife', 'D', 'Italien', 'Costa Rica', NULL, NULL),
(27, '2014-06-20 21:00:00', 'Salvador', 'E', 'Schweiz', 'Frankreich', NULL, NULL),
(28, '2014-06-21 00:00:00', 'Curitiba', 'E', 'Honduras', 'Ecuador', NULL, NULL),
(29, '2014-06-21 18:00:00', 'Belo Horiz.', 'F', 'Argentinien', 'Iran', NULL, NULL),
(30, '2014-06-21 21:00:00', 'Fortaleza', 'G', 'Deutschland', 'Ghana', NULL, NULL),
(31, '2014-06-22 00:00:00', 'Cuiaba', 'F', 'Nigeria', 'Bosnien-Herzegowina', NULL, NULL),
(32, '2014-06-22 18:00:00', 'Rio de Jan.', 'H', 'Belgien', 'Russland', NULL, NULL),
(33, '2014-06-22 21:00:00', 'Porto Alegre', 'H', 'SÃ¼dkorea', 'Algerien', NULL, NULL),
(34, '2014-06-23 00:00:00', 'Manaus', 'G', 'USA', 'Portugal', NULL, NULL),
(35, '2014-06-23 18:00:00', 'Curitiba', 'B', 'Australien', 'Spanien', NULL, NULL),
(36, '2014-06-23 18:00:00', 'Sao Paulo', 'B', 'Niederlande', 'Chile', NULL, NULL),
(37, '2014-06-23 22:00:00', 'Brasilia', 'A', 'Kamerun', 'Brasilien', NULL, NULL),
(38, '2014-06-23 22:00:00', 'Recife', 'A', 'Kroatien', 'Mexiko', NULL, NULL),
(39, '2014-06-24 18:00:00', 'Belo Horiz.', 'D', 'Costa Rica', 'England', NULL, NULL),
(40, '2014-06-24 18:00:00', 'Natal', 'D', 'Italien', 'Uruguay', NULL, NULL),
(41, '2014-06-24 22:00:00', 'Cuiaba', 'C', 'Japan', 'Kolumbien', NULL, NULL),
(42, '2014-06-24 22:00:00', 'Fortaleza', 'C', 'Griechenland', 'ElfenbeinkÃ¼ste', NULL, NULL),
(43, '2014-06-25 18:00:00', 'Porto Alegre', 'F', 'Nigeria', 'Argentinien', NULL, NULL),
(44, '2014-06-25 18:00:00', 'Salvador', 'F', 'Bosnien-Herzegowina', 'Iran', NULL, NULL),
(45, '2014-06-25 22:00:00', 'Manaus', 'E', 'Honduras', 'Schweiz', NULL, NULL),
(46, '2014-06-25 22:00:00', 'Rio de Jan.', 'E', 'Ecuador', 'Frankreich', NULL, NULL),
(47, '2014-06-26 18:00:00', 'Brasilia', 'G', 'Portugal', 'Ghana', NULL, NULL),
(48, '2014-06-26 18:00:00', 'Recife', 'G', 'USA', 'Deutschland', NULL, NULL),
(49, '2014-06-26 22:00:00', 'Curitiba', 'H', 'Algerien', 'Russland', NULL, NULL),
(50, '2014-06-26 22:00:00', 'Sao Paulo', 'H', 'SÃ¼dkorea', 'Belgien', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
