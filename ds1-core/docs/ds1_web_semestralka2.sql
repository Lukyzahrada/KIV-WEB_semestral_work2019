-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3306
-- Vytvořeno: Čtv 09. led 2020, 16:54
-- Verze serveru: 5.7.26
-- Verze PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `ds1_web_semestralka2`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `ds1_obyvatele`
--

DROP TABLE IF EXISTS `ds1_obyvatele`;
CREATE TABLE IF NOT EXISTS `ds1_obyvatele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `prijmeni` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `rodne_prijmeni` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `datum_narozeni` date DEFAULT NULL,
  `tituly_pred` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `tituly_za` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `rodne_cislo` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `misto_narozeni` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `pojistovna_zkratka` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `cislo_pojistence` varchar(11) COLLATE utf8_czech_ci DEFAULT NULL,
  `adresa_ulice` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `adresa_cp` varchar(10) COLLATE utf8_czech_ci DEFAULT NULL,
  `adresa_mesto` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `op` varchar(11) COLLATE utf8_czech_ci DEFAULT NULL,
  `op_platnost_do` date DEFAULT NULL,
  `stav` tinyint(4) DEFAULT '1' COMMENT '1 ok aktivni, 2 neaktivni\n',
  `kontaktni_osoba_jmeno` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `kontaktni_osoba_prijmeni` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `kontaktni_osoba_cislo` varchar(15) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ds1_obyvatele`
--

INSERT INTO `ds1_obyvatele` (`id`, `jmeno`, `prijmeni`, `rodne_prijmeni`, `datum_narozeni`, `tituly_pred`, `tituly_za`, `rodne_cislo`, `misto_narozeni`, `pojistovna_zkratka`, `cislo_pojistence`, `adresa_ulice`, `adresa_cp`, `adresa_mesto`, `op`, `op_platnost_do`, `stav`, `kontaktni_osoba_jmeno`, `kontaktni_osoba_prijmeni`, `kontaktni_osoba_cislo`) VALUES
(13, 'Lukáš', 'Zahradník', '', '1998-01-07', '', '', '650107/6054', 'Plzeň', 'VZP', '', 'Školní', '408', 'Kaznějov', '159159159', '2030-12-01', 1, 'Jan', 'Zahradník', '728745150'),
(14, 'Jan', 'Novák', NULL, '1974-07-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(15, 'Vojta', 'Košař', NULL, '1980-04-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 'Ondřej', 'Zahradník', NULL, '1989-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, 'Jan', 'Pašek', NULL, '1995-09-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, 'Dominik', 'Zappe', '', '1999-04-08', '', '', '', '', 'VZP', '35', '', '', '', '', '2040-01-01', 1, '', '', ''),
(19, 'Jana', 'Černá', NULL, '1911-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(20, 'Matěj', 'Šedý', NULL, '2007-07-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(21, 'Jindřiška', 'Malá', NULL, '1999-09-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(22, 'Eva', 'Velká', NULL, '2008-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(23, 'Marie', 'Terezie', NULL, '1740-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `ds1_obyvatele_na_pokojich`
--

DROP TABLE IF EXISTS `ds1_obyvatele_na_pokojich`;
CREATE TABLE IF NOT EXISTS `ds1_obyvatele_na_pokojich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obyvatel_id` int(11) NOT NULL,
  `pokoj_id` int(11) NOT NULL,
  `datum_od` datetime DEFAULT NULL,
  `datum_do` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_obyvatele_na_pokojich_obyvatele1_idx` (`obyvatel_id`),
  KEY `fk_ds1_obyvatele_na_pokojich_ds1_pokoje21_idx` (`pokoj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ds1_obyvatele_na_pokojich`
--

INSERT INTO `ds1_obyvatele_na_pokojich` (`id`, `obyvatel_id`, `pokoj_id`, `datum_od`, `datum_do`) VALUES
(8, 13, 1, '2021-06-12 00:00:00', '2021-06-13 00:00:00'),
(9, 18, 2, '2020-01-07 00:00:00', '2020-01-31 00:00:00'),
(11, 22, 3, '2019-12-11 00:00:00', '2020-12-25 00:00:00'),
(12, 22, 3, '2019-12-11 00:00:00', '2020-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `ds1_pokoje`
--

DROP TABLE IF EXISTS `ds1_pokoje`;
CREATE TABLE IF NOT EXISTS `ds1_pokoje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `poschodi` int(11) DEFAULT NULL,
  `socialni_zarizeni` int(11) DEFAULT NULL,
  `popis` text COLLATE utf8_czech_ci,
  `kapacita_osob` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ds1_pokoje`
--

INSERT INTO `ds1_pokoje` (`id`, `nazev`, `poschodi`, `socialni_zarizeni`, `popis`, `kapacita_osob`) VALUES
(1, 'Zkušební pokoj', 2, 999, 'Zkušební pokoj pro ukázku kontroly zaplněných pokojů', 1),
(2, 'Pokoj 1', 10, 998, 'Pokoj 2 v poschodí 10', 2),
(3, 'Pokoj 2', 9, 998, 'Pokoj 2 v 9. poschodí', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `ds1_uzivatele`
--

DROP TABLE IF EXISTS `ds1_uzivatele`;
CREATE TABLE IF NOT EXISTS `ds1_uzivatele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password_bcrypt` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `jmeno` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `prijmeni` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_czech_ci DEFAULT NULL,
  `pravo` int(11) DEFAULT NULL,
  `datum_vytvoreni` datetime DEFAULT NULL,
  `smazano` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `ds1_uzivatele`
--

INSERT INTO `ds1_uzivatele` (`id`, `login`, `password_bcrypt`, `jmeno`, `prijmeni`, `telefon`, `email`, `pravo`, `datum_vytvoreni`, `smazano`) VALUES
(1, 'admin', '$2y$10$ruzwJwD.xQOZZh1yvP48e.4Sj4Uvz3RCuobnfGqYwK7KNSw3MlOgG', 'Jan', 'Novák', '123 456 789', 'email@seznam.cz', 100, '2018-09-01 01:00:00', 0);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `ds1_obyvatele_na_pokojich`
--
ALTER TABLE `ds1_obyvatele_na_pokojich`
  ADD CONSTRAINT `fk_ds1_obyvatele_na_pokojich_ds1_pokoje21` FOREIGN KEY (`pokoj_id`) REFERENCES `ds1_pokoje` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_obyvatele_na_pokojich_obyvatele1` FOREIGN KEY (`obyvatel_id`) REFERENCES `ds1_obyvatele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
