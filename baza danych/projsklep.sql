-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Paź 2017, 14:51
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projsklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `Id_Kategorii` int(15) NOT NULL,
  `Nazwa` varchar(50) NOT NULL,
  `Opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`Id_Kategorii`, `Nazwa`, `Opis`) VALUES
(1, 'Zegarki', 'Meskie Damskie Dzieciece'),
(2, 'Samochody', 'Wolne szybkie I Popsute'),
(3, 'Przybory kuchenne', ''),
(4, 'Rowery', 'Akcesoria, rowery, pedaly'),
(5, 'Okulary', 'Szkla nie szkla oprawki itp'),
(6, 'Telefony', 'Stacjonarne, smartfony'),
(7, 'Telewizory', 'Plaskie, z dupa i bez');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `Id_Produktu` int(15) NOT NULL,
  `Nazwa` varchar(50) NOT NULL,
  `Cena` double NOT NULL,
  `Obrazek` text NOT NULL,
  `Ilosc` int(9) NOT NULL,
  `Opis` varchar(150) NOT NULL,
  `Kategoria` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`Id_Produktu`, `Nazwa`, `Cena`, `Obrazek`, `Ilosc`, `Opis`, `Kategoria`) VALUES
(1, 'CLASSIC | 40MM | CANTERBURY', 690, 'zegarek.png', 5, 'Dobrze liczy czas', 1),
(2, 'BMW E90 M3 M POWER 2008r PAKIET M3', 36900, 'samochod.jpg', 2, 'Szybki i ten nie popsuty', 2),
(3, 'Przybory kuchenne stal nierdzewna POLONIA 6szt', 69, 'widelec.jpg', 6, 'Stal nierdzewna', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`Id_Kategorii`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`Id_Produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Id_Kategorii` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `Id_Produktu` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
