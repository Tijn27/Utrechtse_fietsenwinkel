-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 13 jun 2019 om 07:08
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geheugentraining`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oefening`
--

DROP TABLE IF EXISTS `oefening`;
CREATE TABLE IF NOT EXISTS `oefening` (
  `date` date DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `oefening` enum('Loopband','Seated chest press','Seated leg extension','Horizontal row machine','Abdominal crunch machine','Triceps push down','Front lunge','Plank reps','Hometrainer','Full body stratch staand') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `oefening`
--

INSERT INTO `oefening` (`date`, `email`, `oefening`) VALUES
('2019-06-09', 'admin@gmail.comdfghn', 'Loopband'),
('2019-06-09', 'admin@gmail.comdfghn', 'Loopband'),
('2019-06-09', 'admin@gmail.comdfghn', 'Seated chest press'),
('2019-06-09', 'admin@gmail.comdfghn', 'Loopband'),
('2019-06-09', 'bezoeker@gmail.comtghjk', 'Loopband'),
('2019-06-10', 'hoi.hallo@gmail.nlasdfgh', 'Loopband'),
('2019-06-10', 'hoi.hallo@gmail.nlasdfgh', 'Seated leg extension'),
('2019-06-10', 'hoi.hallo@gmail.nlasdfgh', 'Seated chest press'),
('2019-06-05', 'hoi.hallo@gmail.nlasdfgh\r\n', 'Loopband'),
('2019-06-07', 'hoi.hallo@gmail.nlasdfgh\r\n', 'Front lunge'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Loopband'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Seated chest press'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Horizontal row machine'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Seated leg extension'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Abdominal crunch machine'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Triceps push down'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Front lunge'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Triceps push down'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Plank reps'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Front lunge'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Hometrainer'),
('2019-06-06', 'hoi.hallo@gmail.nlasdfgh', 'Full body stratch staand'),
('2019-06-06', '324037@student.mboutrecht.nlfghjk', 'Loopband'),
('2019-06-06', '324037@student.mboutrecht.nlfghjk', 'Abdominal crunch machine'),
('2019-06-06', '324037@student.mboutrecht.nlfghjk', 'Front lunge'),
('2019-06-06', '324037@student.mboutrecht.nlfghjk', 'Horizontal row machine'),
('2019-06-10', '324037@student.mboutrecht.nlfghjk', 'Loopband'),
('2019-06-10', '324037@student.mboutrecht.nlfghjk', 'Plank reps'),
('2019-06-10', '324037@student.mboutrecht.nlfghjk', 'Seated chest press'),
('2019-06-10', 'root@gmail.comsedfghjk', 'Loopband'),
('2019-06-10', 'root@gmail.comsedfghjk', 'Horizontal row machine'),
('2019-06-10', 'root@gmail.comsedfghjk', 'Triceps push down'),
('2019-06-10', 'root@gmail.comsedfghjk', 'Plank reps'),
('2019-06-10', 'root@gmail.comsedfghjk', 'Loopband'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Loopband'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Seated chest press'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Seated leg extension'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Horizontal row machine'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Abdominal crunch machine'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Triceps push down'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Front lunge'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Plank reps'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Hometrainer'),
('2019-06-10', 'lisa@vanbrenk11.nl', 'Full body stratch staand'),
('2019-06-10', 'hi@gmail.com', 'Full body stratch staand'),
('2019-06-10', 'hi@gmail.com', 'Seated chest press'),
('2019-06-11', 'lisa@vanbrenk11.nl', 'Plank reps'),
('2019-06-11', 'lisa@vanbrenk11.nl', 'Loopband'),
('2019-06-11', 'lisa@vam.nl', 'Loopband'),
('2019-06-11', 'lisa@vam.nl', 'Seated leg extension'),
('2019-06-11', 'lisa@vam.nl', 'Triceps push down'),
('2019-06-11', 'lisa@vam.nl', 'Loopband'),
('2019-06-13', 'lisa@vanbrenk11.nllll', 'Loopband'),
('2019-06-13', 'lisa@vanbrenk11.nllll', 'Triceps push down'),
('2019-06-13', 'lisa@vanbrenk11.nllll', 'Plank reps');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `userrol` enum('administrator','moderator','customer','root') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `userrol`) VALUES
(46, 'root@gmail.comfghj', '$2y$10$xon5EnG2nzuzAD5iQkYekeEFnZ1Jmo1x0pchvLvXqR/VD58m3/dXe', 'customer'),
(45, '324037@student.mboutrecht.nlghjkl', '$2y$10$/ccGkms3lYybi25B4rEubOE92YvWwoPYY5x8NJK9lfgqRmMjbtx3y', 'customer'),
(25, 'customer@gmail.com', '$2y$10$VPAxk/da5x5hV4BB9.eYpO26uXRXcqd4ZVIUVrLPufrZFBmkIk676', 'customer'),
(44, 'admin@gmail.comdfghn', '$2y$10$AUd1pmag0bm4esrTIW5s9uNwN54jyf9qFE5v35ofur58jAx4pKw4S', 'customer'),
(43, '324037@student.mboutrecht.nlasdf', '$2y$10$R61R3wkxIrpAlimwNxYEoufSkKOENjzb0wmrlPLnNu3xtioydMjG.', 'customer'),
(36, 'moderator@gmail.com', '$2y$10$1A5EzlIugO6aIuxyvB/phubVAcMgyaR/qYjgY2ea5HrgcWiTlgsZq', 'moderator'),
(39, '324037@student.mboutrecht.nlghjkjk', '$2y$10$wXGyYZiO1/0POmKYiz9WhOWR5EGI5h7x15xVrEjMoH2ylrxNb4LLm', 'customer'),
(40, '', '10-04-2019 09:39:45', 'customer'),
(41, 'test@mail.nl', '$2y$10$bk5/wsJ82qhIfRZY8L03JuzYlAykx55zE2qit9zwe1IUPQuQZH0w.', 'customer'),
(42, '324037@student.mboutrecht.nlllllllll', '09-06-2019 13:26:49037@', 'customer'),
(24, 'root@gmail.com', '$2y$10$9Gz0EE2o/bemYU0UbVgmf.Eq2S7vWCU/4GGrfoJ/Sy/3nzvZ1iKP6', 'root'),
(23, 'admin@gmail.com', '$2y$10$581sSSI7XkpBZg5Gsja6DeTeGRfJZn1IMZncS32VLV12ugtD2di.O', 'administrator'),
(47, 'bezoeker@gmail.comtghjk', '$2y$10$yoKnIbN3P7nZPl9Catu6Ge.amqULtFwT1p2.zdvSgih4UUdcjDKuG', 'customer'),
(48, 'bezoeker@gmail.comghjk', '10-06-2019 00:27:08oeke', 'customer'),
(49, 'admin@gmail.comfghjm', '$2y$10$WPJ9TtXGnwSZrVzQ8T9QLOqczqrwr12SsmCIORLgLIRPkzqSEh2.y', 'customer'),
(50, 'l@l.nll', '$2y$10$QE65jRARTdbObc7U7ytJ7Op64ZDKKbLHHdJT0KuUAn8O7/37aKg76', 'customer'),
(51, 'hoi.hallo@gmail.nlsdfg', '$2y$10$p2xEv68uBIEfup3pEYAxVu2bLSuzy4ps2VUpRg2.5zE6Ngbx8BpxO', 'customer'),
(52, 'hoi.hallo@gmail.nlasdfgh', '$2y$10$74s.tdswNxmNJHiwVIHJjeK6EdW/1rIrlzuCv4mfR8zz/W/NstSXK', 'customer'),
(53, '324037@student.mboutrecht.nlfghjk', '$2y$10$jUfxpglbumqRD3uiO7aFx.Gb/tpSV/AJzpUJ424mHArcq614dBylG', 'customer'),
(54, 'root@gmail.comsedfghjk', '$2y$10$/hSbJDWwYlfrqWaxLZsJBeomuxupSeb2mxW725cODxD2f5XEwQjwK', 'customer'),
(55, 'lisa@vanbrenk11.nl', '$2y$10$pZgyQ9WK72Gbp6poFudp.Odnh7PRJsKsZJdi6qtSfKNshJ2NW.tk6', 'customer'),
(56, 'hi@gmail.com', '$2y$10$m4Se6tiCDUiymyLfIRmQbeSKuR1oAfDVIXtg4cVLFXl2d.0PvI/j2', 'customer'),
(57, 'lisa@vam.nl', '$2y$10$mdQunTc0CcTvqF5miSbGEeT2PR9SxUv7lE9Vauu/WYWI35i/BAjQi', 'customer'),
(58, 'lisa@vanbrenk11.nllll', '$2y$10$E8OMB86IZrPCzK/yLtz3ke1B3X3dzWeDHxgtrRbbZrptM40oS2Nje', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
