-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Gru 2021, 23:51
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bibliotekarze`
--

CREATE TABLE `bibliotekarze` (
  `id_bibliotekarza` int(11) NOT NULL,
  `czy_administrator` tinyint(1) NOT NULL,
  `imie` varchar(48) NOT NULL,
  `nazwisko` varchar(48) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `telefon` int(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `bibliotekarze`
--

INSERT INTO `bibliotekarze` (`id_bibliotekarza`, `czy_administrator`, `imie`, `nazwisko`, `adres`, `telefon`) VALUES
(1, 1, 'Klaudia', 'Gwania', 'Pierniczkowa 2/3 Kraków', 654258945);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(48) NOT NULL,
  `nazwisko` varchar(48) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `telefon` int(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `adres`, `telefon`) VALUES
(1, 'Klaudia', 'Wania', 'Pierniczkowa 3/69 Kraków', 696969697),
(2, 'Ronald', 'Brzenczyszczykiewicz', 'Maślana 2/4 Poznań', 123123123),
(3, 'Andrzej', 'Kowalski', 'Kowalska 12 Kowal', 123321555);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id` int(8) NOT NULL,
  `tytul` varchar(256) NOT NULL,
  `autor` varchar(256) NOT NULL,
  `ilosc` int(8) NOT NULL,
  `ilosc_wypozyczonych` int(8) NOT NULL,
  `zdjecie` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id`, `tytul`, `autor`, `ilosc`, `ilosc_wypozyczonych`, `zdjecie`) VALUES
(1, 'Hobbit', 'Tolkien', 20, 2, 'hobbit.jpg'),
(2, 'Harry Potter i komnata tajemnic', 'J.K Rowling', 10, 0, 'harry_potter_komnata.jpg'),
(3, 'Inny świat', 'G. Herling-Grudziński', 8, 0, 'innySwiat.jpg'),
(5, 'Hari Pota', 'Rollin', 12, 1, 'hari_pota.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowania`
--

CREATE TABLE `logowania` (
  `id_wpisu` int(11) NOT NULL,
  `id_bibliotekarza` int(8) NOT NULL,
  `login` varchar(48) NOT NULL,
  `haslo` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `logowania`
--

INSERT INTO `logowania` (`id_wpisu`, `id_bibliotekarza`, `login`, `haslo`) VALUES
(1, 1, 'Klaudia2323', 'test8');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowania_admin`
--

CREATE TABLE `logowania_admin` (
  `id_wpisu` int(11) NOT NULL,
  `id_bibliotekarza` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `haslo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `logowania_admin`
--

INSERT INTO `logowania_admin` (`id_wpisu`, `id_bibliotekarza`, `login`, `haslo`) VALUES
(1, 1, 'Klaudmin', 'okon12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_klienta` int(8) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `tytul_ksiazki` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wypozyczenia`, `id_klienta`, `nazwisko`, `tytul_ksiazki`) VALUES
(5, 1, 'Wania-Egorova', 'Hari Pota');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bibliotekarze`
--
ALTER TABLE `bibliotekarze`
  ADD PRIMARY KEY (`id_bibliotekarza`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logowania`
--
ALTER TABLE `logowania`
  ADD PRIMARY KEY (`id_wpisu`);

--
-- Indeksy dla tabeli `logowania_admin`
--
ALTER TABLE `logowania_admin`
  ADD PRIMARY KEY (`id_wpisu`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bibliotekarze`
--
ALTER TABLE `bibliotekarze`
  MODIFY `id_bibliotekarza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `logowania`
--
ALTER TABLE `logowania`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `logowania_admin`
--
ALTER TABLE `logowania_admin`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
