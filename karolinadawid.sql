-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 09:39 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karolinadawid`
--

-- --------------------------------------------------------

--
-- Table structure for table `aukcje`
--

CREATE TABLE `aukcje` (
  `id` int(11) NOT NULL,
  `idKategorii` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `idProwadzacego` int(11) DEFAULT NULL,
  `tytul` tinytext NOT NULL,
  `opis` text NOT NULL,
  `koniec` datetime NOT NULL,
  `aktywna` tinyint(1) NOT NULL,
  `cena` float NOT NULL,
  `zdjecie` tinytext NOT NULL,
  `minimalna` float DEFAULT NULL,
  `spadek` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aukcje`
--

INSERT INTO `aukcje` (`id`, `idKategorii`, `idUzytkownika`, `idProwadzacego`, `tytul`, `opis`, `koniec`, `aktywna`, `cena`, `zdjecie`, `minimalna`, `spadek`) VALUES
(2, 1, 1, 2, 'Tytulik', 'dsadsa', '2017-11-29 00:00:00', 1, 32232600, 'zdjecia/Tytulik_1.jpg', 1, 1),
(3, 2, 1, 2, 'Minimalna', 'dsaas', '2017-11-29 15:14:53', 1, 313, 'zdjecia/Minimalna_1.jpg', 500, 1),
(4, 3, 1, NULL, 'Holendersk', 'dsaldsads dask dklsa\r\ndsakldl \r\ndsakldsa', '2017-11-30 00:00:00', 1, 321, 'zdjecia/Holendersk_1.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'klasyczna'),
(2, 'z minimalna'),
(3, 'holenderska');

-- --------------------------------------------------------

--
-- Table structure for table `powiadomienia`
--

CREATE TABLE `powiadomienia` (
  `id` int(11) NOT NULL,
  `idUzytkownika` int(11) DEFAULT NULL,
  `idAukcji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `powiadomienia`
--

INSERT INTO `powiadomienia` (`id`, `idUzytkownika`, `idAukcji`) VALUES
(8, NULL, 3),
(10, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rozmowy`
--

CREATE TABLE `rozmowy` (
  `id` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `idUzytkownika1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rozmowy`
--

INSERT INTO `rozmowy` (`id`, `idUzytkownika`, `idUzytkownika1`) VALUES
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` tinytext NOT NULL,
  `nazwisko` tinytext NOT NULL,
  `login` tinytext NOT NULL,
  `haslo` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `login`, `haslo`) VALUES
(1, 'Wlademard', 'Kiepski', 'login', '207023ccb44feb4d7dadca005ce29a64'),
(2, 'Wojciech', 'Szczesny', 'login1', '207023ccb44feb4d7dadca005ce29a64'),
(3, 'Mleko', 'Cieknie', 'mleko', '207023ccb44feb4d7dadca005ce29a64');

-- --------------------------------------------------------

--
-- Table structure for table `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `idRozmowy` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wiadomosci`
--

INSERT INTO `wiadomosci` (`id`, `idRozmowy`, `idUzytkownika`, `data`, `tresc`) VALUES
(8, 3, 1, '2017-11-29 21:39:20', 'Hehe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aukcje`
--
ALTER TABLE `aukcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aukcje_fk0` (`idKategorii`),
  ADD KEY `aukcje_fk1` (`idUzytkownika`),
  ADD KEY `aukcje_fk2` (`idProwadzacego`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `powiadomienia`
--
ALTER TABLE `powiadomienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `powiadomienia_fk0` (`idUzytkownika`),
  ADD KEY `powiadomienia_fk1` (`idAukcji`);

--
-- Indexes for table `rozmowy`
--
ALTER TABLE `rozmowy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rozmowy_fk0` (`idUzytkownika`),
  ADD KEY `rozmowy_fk1` (`idUzytkownika1`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wiadomosci_fk0` (`idRozmowy`),
  ADD KEY `wiadomosci_fk1` (`idUzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aukcje`
--
ALTER TABLE `aukcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `powiadomienia`
--
ALTER TABLE `powiadomienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rozmowy`
--
ALTER TABLE `rozmowy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aukcje`
--
ALTER TABLE `aukcje`
  ADD CONSTRAINT `aukcje_fk0` FOREIGN KEY (`idKategorii`) REFERENCES `kategorie` (`id`),
  ADD CONSTRAINT `aukcje_fk1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `aukcje_fk2` FOREIGN KEY (`idProwadzacego`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `powiadomienia`
--
ALTER TABLE `powiadomienia`
  ADD CONSTRAINT `powiadomienia_fk0` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `powiadomienia_fk1` FOREIGN KEY (`idAukcji`) REFERENCES `aukcje` (`id`);

--
-- Constraints for table `rozmowy`
--
ALTER TABLE `rozmowy`
  ADD CONSTRAINT `rozmowy_fk0` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `rozmowy_fk1` FOREIGN KEY (`idUzytkownika1`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD CONSTRAINT `wiadomosci_fk0` FOREIGN KEY (`idRozmowy`) REFERENCES `rozmowy` (`id`),
  ADD CONSTRAINT `wiadomosci_fk1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `zamknij` ON SCHEDULE EVERY '0 23' DAY_HOUR STARTS '2017-11-29 21:38:07' ON COMPLETION NOT PRESERVE ENABLE DO update aukcje a set a.aktywna=false where a.koniec<=now()$$

CREATE DEFINER=`root`@`localhost` EVENT `zmniejsz` ON SCHEDULE EVERY 1 HOUR STARTS '2017-11-29 21:38:55' ON COMPLETION NOT PRESERVE ENABLE DO update aukcje a set a.cena=a.cena-a.spadek where a.aktywna=true and a.idKategorii=3$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
