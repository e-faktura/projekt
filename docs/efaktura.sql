-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2013 at 03:02 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `efaktura`
--

-- --------------------------------------------------------

--

--

CREATE DATABASE IF NOT EXISTS `efaktura` DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

USE `efaktura`;

-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 158),
(2, 1, NULL, NULL, 'Faktury', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Jednostki', 14, 25),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'Klienci', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'view', 29, 30),
(17, 14, NULL, NULL, 'add', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Pages', 38, 41),
(21, 20, NULL, NULL, 'display', 39, 40),
(22, 1, NULL, NULL, 'Pozycje', 42, 53),
(23, 22, NULL, NULL, 'index', 43, 44),
(24, 22, NULL, NULL, 'view', 45, 46),
(25, 22, NULL, NULL, 'add', 47, 48),
(26, 22, NULL, NULL, 'edit', 49, 50),
(27, 22, NULL, NULL, 'delete', 51, 52),
(28, 1, NULL, NULL, 'Produkty', 54, 65),
(29, 28, NULL, NULL, 'index', 55, 56),
(30, 28, NULL, NULL, 'view', 57, 58),
(31, 28, NULL, NULL, 'add', 59, 60),
(32, 28, NULL, NULL, 'edit', 61, 62),
(33, 28, NULL, NULL, 'delete', 63, 64),
(34, 1, NULL, NULL, 'Role', 66, 77),
(35, 34, NULL, NULL, 'index', 67, 68),
(36, 34, NULL, NULL, 'view', 69, 70),
(37, 34, NULL, NULL, 'add', 71, 72),
(38, 34, NULL, NULL, 'edit', 73, 74),
(39, 34, NULL, NULL, 'delete', 75, 76),
(40, 1, NULL, NULL, 'Sposobyplatnosci', 78, 89),
(41, 40, NULL, NULL, 'index', 79, 80),
(42, 40, NULL, NULL, 'view', 81, 82),
(43, 40, NULL, NULL, 'add', 83, 84),
(44, 40, NULL, NULL, 'edit', 85, 86),
(45, 40, NULL, NULL, 'delete', 87, 88),
(46, 1, NULL, NULL, 'Statusy', 90, 101),
(47, 46, NULL, NULL, 'index', 91, 92),
(48, 46, NULL, NULL, 'view', 93, 94),
(49, 46, NULL, NULL, 'add', 95, 96),
(50, 46, NULL, NULL, 'edit', 97, 98),
(51, 46, NULL, NULL, 'delete', 99, 100),
(52, 1, NULL, NULL, 'Typy', 102, 113),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'view', 105, 106),
(55, 52, NULL, NULL, 'add', 107, 108),
(56, 52, NULL, NULL, 'edit', 109, 110),
(57, 52, NULL, NULL, 'delete', 111, 112),
(58, 1, NULL, NULL, 'Ustawienia', 114, 125),
(59, 58, NULL, NULL, 'index', 115, 116),
(60, 58, NULL, NULL, 'view', 117, 118),
(61, 58, NULL, NULL, 'add', 119, 120),
(62, 58, NULL, NULL, 'edit', 121, 122),
(63, 58, NULL, NULL, 'delete', 123, 124),
(64, 1, NULL, NULL, 'Uzytkownicy', 126, 141),
(65, 64, NULL, NULL, 'login', 127, 128),
(66, 64, NULL, NULL, 'logout', 129, 130),
(67, 64, NULL, NULL, 'index', 131, 132),
(68, 64, NULL, NULL, 'view', 133, 134),
(69, 64, NULL, NULL, 'add', 135, 136),
(70, 64, NULL, NULL, 'edit', 137, 138),
(71, 64, NULL, NULL, 'delete', 139, 140),
(72, 1, NULL, NULL, 'Vat', 142, 153),
(73, 72, NULL, NULL, 'index', 143, 144),
(74, 72, NULL, NULL, 'view', 145, 146),
(75, 72, NULL, NULL, 'add', 147, 148),
(76, 72, NULL, NULL, 'edit', 149, 150),
(77, 72, NULL, NULL, 'delete', 151, 152),
(78, 1, NULL, NULL, 'AclExtras', 154, 155),
(79, 1, NULL, NULL, 'Localized', 156, 157);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Rola', 1, NULL, 1, 4),
(2, NULL, 'Rola', 2, NULL, 5, 8),
(3, 1, 'Uzytkownik', 1, NULL, 2, 3),
(4, 2, 'Uzytkownik', 2, NULL, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 2, '1', '1', '1', '1'),
(4, 2, 14, '1', '1', '1', '1'),
(5, 2, 28, '1', '1', '1', '1');

-- --------------------------------------------------------
--
-- Table structure for table `faktury`
--

CREATE TABLE IF NOT EXISTS `faktury` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `numer` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `data_wystawienia` datetime NOT NULL,
  `data_sprzedazy` datetime NOT NULL,
  `typ_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `sposob_platnosci_id` int(11) NOT NULL,
  `termin_platnosci` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `typ_id` (`typ_id`),
  KEY `status_id` (`status_id`),
  KEY `klient_id` (`klient_id`),
  KEY `sposob_platnosci_id` (`sposob_platnosci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faktury`
--

INSERT INTO `faktury` (`id`, `parent_id`, `numer`, `data_wystawienia`, `data_sprzedazy`, `typ_id`, `status_id`, `klient_id`, `sposob_platnosci_id`, `termin_platnosci`) VALUES
(2, 0, '1/05/2013', '2013-05-10 00:00:00', '2013-05-10 00:00:00', 1, 1, 1, 1, '2013-05-10 00:00:00'),
(3, 0, '2/05/2013', '2013-05-10 00:00:00', '2013-05-10 00:00:00', 1, 1, 1, 1, '2013-05-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jednostki`
--

CREATE TABLE IF NOT EXISTS `jednostki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jednostki`
--

INSERT INTO `jednostki` (`id`, `parent_id`, `nazwa`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'szt.', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(2, 2, 'g', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(3, 3, 'kg', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(4, 4, 'l', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(5, 5, 'm', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(6, 6, 'm²', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56'),
(7, 7, 'm³', 0, '2013-05-17 14:11:56', '2013-05-17 14:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `nip` char(13) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `parent_id`, `nazwa`, `adres`, `nip`, `email`, `telefon`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Jan Kowalski', 'ul. Morska 2\r\n12-345 Gdańsk', '123-456-32-18', '', '', 0, '2013-05-16 15:03:26', '2013-05-16 15:03:26'),
(2, 2, 'Marian Nowak', 'ul. Wojciechowska 24\r\n12-345 Gdynia', '', 'marian@nowak.pl', '123456789', 0, '2013-05-16 15:03:26', '2013-05-16 15:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `pozycje`
--

CREATE TABLE IF NOT EXISTS `pozycje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faktura_id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `ilosc` float NOT NULL,
  `jednostka_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faktura_id` (`faktura_id`),
  KEY `produkt_id` (`produkt_id`),
  KEY `jednostka_id` (`jednostka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE IF NOT EXISTS `produkty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `vat_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `vat_id` (`vat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `parent_id`, `nazwa`, `cena_netto`, `vat_id`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Jakiś produkt', 2.55, 1, 0, '2013-05-17 13:36:46', '2013-05-17 13:36:46'),
(2, 2, 'Jakiś inny produkt', 32.11, 2, 0, '2013-05-17 13:36:46', '2013-05-17 13:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nazwa`, `created`, `modified`) VALUES
(1, 'Administrator', '2013-05-21 12:05:57', '2013-05-21 12:05:57'),
(2, 'Użytkownik', '2013-05-21 12:06:10', '2013-05-21 12:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `sposoby_platnosci`
--

CREATE TABLE IF NOT EXISTS `sposoby_platnosci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sposoby_platnosci`
--

INSERT INTO `sposoby_platnosci` (`id`, `parent_id`, `nazwa`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Gotówka', 0, '2013-05-17 14:12:52', '2013-05-17 14:12:52'),
(2, 2, 'Przelew', 0, '2013-05-17 14:12:52', '2013-05-17 14:12:52'),
(3, 3, 'Inny', 0, '2013-05-17 14:12:52', '2013-05-17 14:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `statusy`
--

CREATE TABLE IF NOT EXISTS `statusy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `kolor` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusy`
--

INSERT INTO `statusy` (`id`, `parent_id`, `nazwa`, `kolor`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Zapłacono', '#22b14c', 0, '2013-05-17 14:13:23', '2013-05-20 11:31:05'),
(2, 2, 'Oczekiwanie na zapłatę', '#ffc90e', 0, '2013-05-17 14:13:23', '2013-05-20 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `typy`
--

CREATE TABLE IF NOT EXISTS `typy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `typy`
--

INSERT INTO `typy` (`id`, `parent_id`, `nazwa`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Faktura VAT', 0, '2013-05-17 14:12:34', '2013-05-17 14:12:34'),
(2, 2, 'Faktura proforma', 0, '2013-05-17 14:12:34', '2013-05-17 14:12:34'),
(3, 3, 'Faktura marża', 0, '2013-05-17 14:12:34', '2013-05-17 14:12:34'),
(4, 4, 'Faktura zaliczkowa', 0, '2013-05-17 14:12:34', '2013-05-17 14:12:34'),
(5, 5, 'Faktura korygująca', 0, '2013-05-17 14:12:34', '2013-05-17 14:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `ustawienia`
--

CREATE TABLE IF NOT EXISTS `ustawienia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wartosc` longtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ustawienia`
--

INSERT INTO `ustawienia` (`id`, `nazwa`, `wartosc`) VALUES
(1, 'Nazwa firmy', 'Sklep Mydło i Powidło\r\nAndrzej Warkolski\r\nul. Uczelniania 3\r\n12-345 Gdańsk\r\n\r\nNIP: 123-456-32-18');

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rola_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `haslo` char(40) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rola_id` (`rola_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `rola_id`, `nazwa`, `login`, `haslo`, `email`, `created`, `modified`) VALUES
(1, 1, 'Administrator', 'admin', '4b437782a88d5d26efadb8b4650592326ededd72', 'admin@poczta.pl', '2013-05-21 12:06:35', '2013-05-21 12:06:35'),
(2, 2, 'Użytkownik', 'user', '0d78b3202b2f1702a328cfc8317627e5893731d4', 'user@poczta.pl', '2013-05-21 12:06:51', '2013-05-21 12:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE IF NOT EXISTS `vat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wartosc` float NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`id`, `parent_id`, `nazwa`, `wartosc`, `deleted`, `created`, `modified`) VALUES
(1, 1, '23%', 0.23, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57'),
(2, 2, '8%', 0.08, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57'),
(3, 3, '7%', 0.07, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57'),
(4, 4, '5%', 0.05, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57'),
(5, 5, '4%', 0.04, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57'),
(6, 6, '0%', 0, 0, '2013-05-17 14:12:57', '2013-05-17 14:12:57');


GRANT USAGE ON * . * TO 'efaktura'@'localhost' IDENTIFIED BY 'efaktura' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON `efaktura` . * TO 'efaktura'@'localhost';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
