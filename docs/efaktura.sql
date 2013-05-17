-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2013 at 07:49 PM
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
-- Table structure for table `faktury`
--

CREATE DATABASE IF NOT EXISTS `efaktura` DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

USE `efaktura`;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  `deleted` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusy`
--

INSERT INTO `statusy` (`id`, `parent_id`, `nazwa`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Zapłacono', 0, '2013-05-17 14:13:23', '2013-05-17 14:13:23'),
(2, 2, 'Oczekiwanie na zapłatę', 0, '2013-05-17 14:13:23', '2013-05-17 14:13:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `rola_id` (`rola_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
