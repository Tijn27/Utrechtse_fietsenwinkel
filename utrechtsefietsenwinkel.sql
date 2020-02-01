-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 01 feb 2020 om 14:12
-- Serverversie: 5.7.26
-- PHP-versie: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utrechtsefietsenwinkel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afbeelding`
--

DROP TABLE IF EXISTS `afbeelding`;
CREATE TABLE IF NOT EXISTS `afbeelding` (
  `idafbeelding` int(11) NOT NULL AUTO_INCREMENT,
  `IdFiets` int(11) NOT NULL,
  `afbeeldingUrl` varchar(100) NOT NULL,
  PRIMARY KEY (`idafbeelding`),
  KEY `fk_afbeelding_Product` (`IdFiets`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `afbeelding`
--

INSERT INTO `afbeelding` (`idafbeelding`, `IdFiets`, `afbeeldingUrl`) VALUES
(8, 1, '1.jpg'),
(9, 2, '1.jpg'),
(35, 5, 'Victesse Edge N3 HF Dames.jpg'),
(45, 7, 'Sensa Romagna Matt Comp 2019.jpg'),
(46, 8, 'Abus Shield Plus Ringslot 5750 Zwart.jpg'),
(57, 9, 'Julian.png'),
(60, 11, 'qz.png'),
(62, 3, 'Brinckers.jpg'),
(63, 4, 'VanTuyl.jpg'),
(64, 4, 'VanTuyl.jpg'),
(76, 10, 'ford.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

DROP TABLE IF EXISTS `factuur`;
CREATE TABLE IF NOT EXISTS `factuur` (
  `factuurcode` int(11) NOT NULL AUTO_INCREMENT,
  `Factuurdatum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `btw` int(11) NOT NULL DEFAULT '21',
  `Klant_id` int(11) NOT NULL,
  PRIMARY KEY (`factuurcode`,`Klant_id`),
  KEY `fk_Factuur_Klant_idx` (`Klant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`factuurcode`, `Factuurdatum`, `btw`, `Klant_id`) VALUES
(20, '2020-01-24 16:03:55', 21, 53),
(21, '2020-01-24 16:16:37', 21, 54),
(22, '2020-01-24 16:17:12', 21, 55),
(23, '2020-01-24 16:21:19', 21, 56),
(24, '2020-01-24 16:38:13', 21, 57),
(25, '2020-01-25 11:17:48', 21, 58),
(26, '2020-01-25 11:29:49', 21, 59),
(27, '2020-01-25 11:36:32', 21, 60),
(28, '2020-01-25 11:40:42', 21, 61),
(29, '2020-01-25 11:42:19', 21, 62),
(30, '2020-01-25 11:43:03', 21, 63),
(31, '2020-01-25 11:47:39', 21, 64),
(32, '2020-01-25 12:00:29', 21, 65),
(33, '2020-01-25 12:02:53', 21, 66),
(34, '2020-01-25 12:08:59', 21, 67),
(35, '2020-01-25 12:09:23', 21, 68),
(36, '2020-01-25 13:09:04', 21, 69),
(37, '2020-01-25 13:10:44', 21, 70),
(38, '2020-01-25 13:11:02', 21, 71),
(39, '2020-01-25 16:19:08', 21, 72),
(40, '2020-01-26 15:15:55', 21, 73),
(41, '2020-01-27 11:19:27', 21, 74),
(42, '2020-01-28 10:49:04', 21, 75),
(43, '2020-01-28 11:42:30', 21, 76),
(44, '2020-01-31 23:01:34', 21, 77);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuurregel`
--

DROP TABLE IF EXISTS `factuurregel`;
CREATE TABLE IF NOT EXISTS `factuurregel` (
  `factuurcode` int(11) NOT NULL AUTO_INCREMENT,
  `productcode` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  PRIMARY KEY (`factuurcode`,`productcode`),
  KEY `fk_FactuurRegel_Product_idx` (`productcode`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `factuurregel`
--

INSERT INTO `factuurregel` (`factuurcode`, `productcode`, `aantal`) VALUES
(20, 4, 1),
(20, 7, 3),
(20, 8, 3),
(21, 4, 1),
(21, 7, 3),
(21, 8, 3),
(22, 4, 1),
(22, 7, 3),
(22, 8, 3),
(23, 4, 1),
(23, 7, 3),
(23, 8, 3),
(24, 4, 1),
(24, 7, 3),
(24, 8, 3),
(25, 2, 2),
(25, 8, 2),
(26, 2, 1),
(29, 1, 1),
(31, 5, 1),
(32, 2, 1),
(33, 3, 5),
(34, 2, 1),
(35, 7, 1),
(36, 5, 1),
(37, 4, 1),
(38, 2, 1),
(39, 2, 1),
(39, 7, 1),
(39, 8, 2),
(40, 2, 1),
(40, 4, 1),
(40, 8, 2),
(41, 5, 2),
(41, 8, 2),
(42, 1, 10),
(43, 7, 12),
(44, 1, 1),
(44, 9, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `gebruikersrol` int(11) NOT NULL,
  `aanmaakDatum` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gebruikersnaam` (`naam`) USING BTREE,
  KEY `gebruikersrol` (`gebruikersrol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `naam`, `wachtwoord`, `gebruikersrol`, `aanmaakDatum`) VALUES
(34, 'test', '$2y$10$dbsaswIMtDQuzblNGn4/oOr93B907IUuGm0KATaKKCH0KSvvsEXSK', 1, '07,12,2019 17: 21:54'),
(35, 'admin', '$2y$10$I4DLcSlVsfjQESawrr2RVOWRUOX3V6YNl7kTN05VF.D0oup5efF8y', 2, '07,12,2019 18: 04:12'),
(37, 'tester', '$2y$10$8ZXSzQrtOGA20ec4v7imC.HSsXSPVkQFBDstVPhmnKwKBH2crcCda', 1, '09,12,2019 21: 00:40'),
(38, 'fietsenmaker', '$2y$10$HvKDyL7GRm9F6dwh8itAYesZpK8ti5I5cRaM4nBsukzX2FMKY.mDC', 1, '28,12,2019 17: 41:40');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikersrol`
--

DROP TABLE IF EXISTS `gebruikersrol`;
CREATE TABLE IF NOT EXISTS `gebruikersrol` (
  `idGebruikersRol` int(11) NOT NULL,
  `GebruikersRol` varchar(50) NOT NULL,
  PRIMARY KEY (`idGebruikersRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikersrol`
--

INSERT INTO `gebruikersrol` (`idGebruikersRol`, `GebruikersRol`) VALUES
(1, 'fietsenMaker'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

DROP TABLE IF EXISTS `klant`;
CREATE TABLE IF NOT EXISTS `klant` (
  `KlantId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `telefoonnummer` varchar(11) NOT NULL,
  `Straat` varchar(100) NOT NULL,
  `huisnummer` int(11) NOT NULL,
  PRIMARY KEY (`KlantId`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`KlantId`, `email`, `voornaam`, `achternaam`, `postcode`, `woonplaats`, `telefoonnummer`, `Straat`, `huisnummer`) VALUES
(13, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(14, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(15, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(16, '2', '2', '2', '2', '2', '2', '2', 2),
(17, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(18, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(19, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(20, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(21, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(22, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(23, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 1),
(24, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(25, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(26, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(27, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(28, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(29, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(30, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(31, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(32, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(33, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(34, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(35, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(36, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(37, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(38, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(39, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(40, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 345),
(41, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 345),
(42, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 12),
(43, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(44, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(45, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(46, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 78),
(47, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 78),
(48, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 78),
(49, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 78),
(50, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 78),
(51, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(52, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(53, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23),
(54, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23),
(55, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23),
(56, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23),
(57, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23),
(58, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(59, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(60, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(61, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(62, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(63, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 31),
(64, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(65, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 31),
(66, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde 31', 12324),
(67, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 63),
(68, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 63),
(69, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 32),
(70, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 31),
(71, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 31),
(72, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 122),
(73, 'amanda.jeuken@hotmail.com', 'Amanda', 'Jeuken', '3471 HH', 'Kamerik', '0698765432', 'Teckop', 14),
(74, 'amanda.jeuken@hotmail.com', 'Amanda', 'Jeuken', '3471 HH', 'Kamerik', '0698765432', 'Teckop', 31),
(75, 'piet-jan-heijn@vanderdomme.nl', 'piet-jan-heijn', 'van der domme', '1234AB', 'Amesfoort', '06123', 'Kerklaan', 1),
(76, 'tijn-smit@outlook.com', 'Tijn', 'Smit', '3471 GN', 'Kamerik', '00000000', 'Mijzijde', 31),
(77, 'karelll@hotmail.com', 'Karel', 'van Doorn', '0303 UU', 'Utrecht', '0612354298', 'Mygyllaan', 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productCode` int(11) NOT NULL,
  `kosten` double NOT NULL,
  `productNaam` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `versnellingen` varchar(100) DEFAULT NULL,
  `frameType` varchar(100) DEFAULT NULL,
  `Garantie` varchar(100) DEFAULT NULL,
  `accuPositie` varchar(100) DEFAULT NULL,
  `oplaatTijd` varchar(100) DEFAULT NULL,
  `capaciteitAccu` varchar(100) DEFAULT NULL,
  `TypeFiets_TypeFietsId` int(11) NOT NULL,
  `actief` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`productCode`),
  KEY `fk_Product_TypeFiets1_idx` (`TypeFiets_TypeFietsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productCode`, `kosten`, `productNaam`, `merk`, `serie`, `versnellingen`, `frameType`, `Garantie`, `accuPositie`, `oplaatTijd`, `capaciteitAccu`, `TypeFiets_TypeFietsId`, `actief`) VALUES
(1, 2099, 'Gazelle Orange C7+ HMB 2020 Dames', 'Gazelle', 'Orange', '7', 'Damesfiets', '2', 'Achterdrager', '3 tot 6 uur (afhankelijk van accukeuze)', '300', 1, 1),
(2, 2999, 'Brinckers Granville M8 500 2020 Heren', 'Brinckers', 'Granville', '8', 'Herenfiets', '2', 'Achterdrager', '4 tot 5 uur', '500', 1, 1),
(3, 2849, 'Brinckers', 'Brinckers', 'Brisbane', '8', 'Damesfiets', '2', 'Achterdrager', '3,5', '450', 1, 1),
(4, 649, 'VanTuyl', 'VanTuyl', 'Lunar', '8', 'Damesfiets', '2', '', '', '', 3, 1),
(5, 999, 'Victesse Edge N3 HF Dames', 'Victesse ', 'Edge', '3', 'Dames', '2', 'Achterdrager', '3,5 uur', '340', 1, 1),
(7, 629, 'Sensa Romagna Matt Comp 2019', 'Sensa', 'Romagna', '22', 'Herenfiets', '2', '', '', '', 2, 1),
(8, 32.98, 'Abus Shield Plus Ringslot 5750 Zwart', 'Abus', 'Shield Plus', '', '', '', '', '', '', 4, 1),
(9, 500000000.12, 'Julian', 'jajaja', 'kl', 'kl', 'k', 'lk', '', '10', '', 3, 0),
(10, 1200, 'ford', 'lelyvlet', '7', '', '', '7', '', '', '', 3, 1),
(11, 1, '1357', 'test', 'test', '5', 'fads', 'fads', 'ie', 'oplaatTijd', 'capacitijdAccu', 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reparatie`
--

DROP TABLE IF EXISTS `reparatie`;
CREATE TABLE IF NOT EXISTS `reparatie` (
  `reparatieId` int(11) NOT NULL AUTO_INCREMENT,
  `reparatieSoort` int(11) NOT NULL,
  `reparatieDatumTijd` datetime NOT NULL,
  PRIMARY KEY (`reparatieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reparatieregel`
--

DROP TABLE IF EXISTS `reparatieregel`;
CREATE TABLE IF NOT EXISTS `reparatieregel` (
  `KlantId` int(11) NOT NULL,
  `reparatieId` int(11) NOT NULL,
  PRIMARY KEY (`KlantId`,`reparatieId`),
  KEY `fk_ReparatieRegel_reparatie1_idx` (`reparatieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `typefiets`
--

DROP TABLE IF EXISTS `typefiets`;
CREATE TABLE IF NOT EXISTS `typefiets` (
  `TypeFietsId` int(11) NOT NULL AUTO_INCREMENT,
  `TypeFiets` varchar(100) NOT NULL,
  PRIMARY KEY (`TypeFietsId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `typefiets`
--

INSERT INTO `typefiets` (`TypeFietsId`, `TypeFiets`) VALUES
(1, 'Elektrische fiets'),
(2, 'Sport fiets'),
(3, 'Stads fiets'),
(4, 'Accessoires');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afbeelding`
--
ALTER TABLE `afbeelding`
  ADD CONSTRAINT `fk_afbeelding_Product` FOREIGN KEY (`IdFiets`) REFERENCES `product` (`productCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `fk_Factuur_Klant` FOREIGN KEY (`Klant_id`) REFERENCES `klant` (`KlantId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD CONSTRAINT `fk_FactuurRegel_Factuur` FOREIGN KEY (`factuurcode`) REFERENCES `factuur` (`factuurcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FactuurRegel_Product` FOREIGN KEY (`productcode`) REFERENCES `product` (`productCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `fk_Gebruikers_GebruikersRol` FOREIGN KEY (`gebruikersrol`) REFERENCES `gebruikersrol` (`idGebruikersRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_TypeFiets1` FOREIGN KEY (`TypeFiets_TypeFietsId`) REFERENCES `typefiets` (`TypeFietsId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `reparatieregel`
--
ALTER TABLE `reparatieregel`
  ADD CONSTRAINT `fk_ReparatieRegel_Klant1` FOREIGN KEY (`KlantId`) REFERENCES `klant` (`KlantId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ReparatieRegel_reparatie1` FOREIGN KEY (`reparatieId`) REFERENCES `reparatie` (`reparatieId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
