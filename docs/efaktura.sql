-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:6033
-- Generation Time: Mar 22, 2013 at 09:32 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jednostki`
--

CREATE TABLE IF NOT EXISTS `jednostki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  `ilosc` float NOT NULL,
  `vat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `vat_id` (`vat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statusy`
--

CREATE TABLE IF NOT EXISTS `statusy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `typy`
--

CREATE TABLE IF NOT EXISTS `typy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktury`
--
ALTER TABLE `faktury`
  ADD CONSTRAINT `faktury_ibfk_9` FOREIGN KEY (`sposob_platnosci_id`) REFERENCES `sposoby_platnosci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faktury_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `faktury` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faktury_ibfk_6` FOREIGN KEY (`typ_id`) REFERENCES `typy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faktury_ibfk_7` FOREIGN KEY (`status_id`) REFERENCES `statusy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faktury_ibfk_8` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jednostki`
--
ALTER TABLE `jednostki`
  ADD CONSTRAINT `jednostki_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `jednostki` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `klienci_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `klienci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pozycje`
--
ALTER TABLE `pozycje`
  ADD CONSTRAINT `pozycje_ibfk_3` FOREIGN KEY (`jednostka_id`) REFERENCES `jednostki` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pozycje_ibfk_1` FOREIGN KEY (`faktura_id`) REFERENCES `faktury` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pozycje_ibfk_2` FOREIGN KEY (`produkt_id`) REFERENCES `produkty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_2` FOREIGN KEY (`vat_id`) REFERENCES `vat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `produkty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sposoby_platnosci`
--
ALTER TABLE `sposoby_platnosci`
  ADD CONSTRAINT `sposoby_platnosci_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `sposoby_platnosci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `statusy`
--
ALTER TABLE `statusy`
  ADD CONSTRAINT `statusy_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `statusy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `typy`
--
ALTER TABLE `typy`
  ADD CONSTRAINT `typy_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `typy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`rola_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vat`
--
ALTER TABLE `vat`
  ADD CONSTRAINT `vat_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `vat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE USER 'efaktura'@'localhost' IDENTIFIED BY 'efaktura';

GRANT USAGE ON * . * TO 'efaktura'@'localhost' IDENTIFIED BY 'efaktura' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON `efaktura` . * TO 'efaktura'@'localhost';


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
