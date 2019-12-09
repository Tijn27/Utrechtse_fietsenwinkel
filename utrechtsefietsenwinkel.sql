-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 09 dec 2019 om 08:08
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
  `afbeeldingUrl` varchar(100) NOT NULL,
  PRIMARY KEY (`idafbeelding`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

DROP TABLE IF EXISTS `factuur`;
CREATE TABLE IF NOT EXISTS `factuur` (
  `factuurcode` int(11) NOT NULL AUTO_INCREMENT,
  `Factuurdatum` datetime NOT NULL,
  `id` varchar(100) NOT NULL,
  `btw` int(11) NOT NULL,
  `Klant_id` int(11) NOT NULL,
  PRIMARY KEY (`factuurcode`,`Klant_id`),
  KEY `fk_Factuur_Klant_idx` (`Klant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `naam`, `wachtwoord`, `gebruikersrol`, `aanmaakDatum`) VALUES
(34, 'test', '$2y$10$dbsaswIMtDQuzblNGn4/oOr93B907IUuGm0KATaKKCH0KSvvsEXSK', 1, '07,12,2019 17: 21:54'),
(35, 'admin', '$2y$10$I4DLcSlVsfjQESawrr2RVOWRUOX3V6YNl7kTN05VF.D0oup5efF8y', 2, '07,12,2019 18: 04:12');

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
  `telefoonnummer` int(11) DEFAULT NULL,
  `Straat` varchar(100) NOT NULL,
  `huisnummer` int(11) NOT NULL,
  PRIMARY KEY (`KlantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productCode` int(11) NOT NULL,
  `productNaam` varchar(100) NOT NULL,
  `kosten` varchar(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `versnellingen` varchar(100) DEFAULT NULL,
  `frameType` varchar(100) NOT NULL,
  `Garantie` varchar(100) DEFAULT NULL,
  `accuPositie` varchar(100) DEFAULT NULL,
  `oplaatTijd` varchar(100) DEFAULT NULL,
  `capaciteitAccu` varchar(100) DEFAULT NULL,
  `TypeFiets_TypeFietsId` int(11) NOT NULL,
  PRIMARY KEY (`productCode`),
  KEY `fk_Product_TypeFiets1_idx` (`TypeFiets_TypeFietsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productCode`, `productNaam`, `kosten`, `merk`, `serie`, `versnellingen`, `frameType`, `Garantie`, `accuPositie`, `oplaatTijd`, `capaciteitAccu`, `TypeFiets_TypeFietsId`) VALUES
(1, 'Gazelle Orange C7+ HMB 2020 Dames', '2.099,-', 'Gazelle', 'Orange', '7', 'Damesfiets', '2', 'Achterdrager', '3 tot 6 uur (afhankelijk van accukeuze)', '300', 1),
(2, 'Brinckers Granville M8 500 2020 Heren', '2.999,-', 'Brinckers', 'Granville', '8', 'Herenfiets', '2', 'Achterdrager', '4 tot 5 uur', '500', 1),
(3, 'Brinckers Brisbane M8 2020 Dames', '2.849,-', 'Brinckers', 'Brisbane', '8', 'Damesfiets', '2', 'Achterdrager', '3,5 tot 10,5 uur (afhankelijk van accu- en laderkeuze)', '450', 1),
(4, 'VanTuyl Lunar N8 Extra 2019 Dames', '649,-', 'VanTuyl', 'Lunar', '8', 'Damesfiets', '2', NULL, NULL, NULL, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `typefiets`
--

INSERT INTO `typefiets` (`TypeFietsId`, `TypeFiets`) VALUES
(1, 'Elektrische fiets'),
(2, 'Sport fiets'),
(3, 'Stads fiets');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afbeelding`
--
ALTER TABLE `afbeelding`
  ADD CONSTRAINT `fk_afbeelding_Product` FOREIGN KEY (`idafbeelding`) REFERENCES `product` (`productCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
