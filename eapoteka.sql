-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 03:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eapoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorijalekova`
--

CREATE TABLE `kategorijalekova` (
  `kategorijaID` int(11) NOT NULL,
  `nazivKategorije` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorijalekova`
--

INSERT INTO `kategorijalekova` (`kategorijaID`, `nazivKategorije`) VALUES
(1, 'Analgetici'),
(2, 'Sumece granule'),
(3, 'Imunostimulanti'),
(4, 'Anestetici'),
(5, 'Sedativi'),
(6, 'Lekovi za alergiju'),
(7, 'Hipnotici');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `imePrezime` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `korisnickaUloga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `username`, `password`, `korisnickaUloga`) VALUES
(1, 'Vasilije Aleksic', 'admin', 'admin', 'admin'),
(2, 'Jana Vujic', 'januska', 'januska', 'korisnik'),
(3, 'Nadja Bulajic', 'nadja', 'nadja', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE `kupovina` (
  `kupovinaID` int(11) NOT NULL,
  `lekID` int(11) NOT NULL,
  `korisnikID` int(11) NOT NULL,
  `daLiJeObavljena` tinyint(1) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`kupovinaID`, `lekID`, `korisnikID`, `daLiJeObavljena`, `datum`) VALUES
(9, 6, 2, 1, '2021-07-03'),
(11, 14, 2, 1, '2021-07-03'),
(12, 7, 3, 1, '2021-07-03'),
(14, 7, 3, 0, '2021-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `lekovi`
--

CREATE TABLE `lekovi` (
  `lekID` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `kategorijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lekovi`
--

INSERT INTO `lekovi` (`lekID`, `naziv`, `opis`, `slika`, `cena`, `kategorijaID`) VALUES
(2, 'Brufen', 'Ne kombinovati sa drugim lekovima.', 'slika1.jpg', 123, 1),
(3, 'Tylol Hot', 'Rok trajanja je utisnut na pakovanju.', 'slika3.jpg', 12333, 2),
(4, 'Riluzol', 'Uzimati samo prepisanu koli?inu leka.', 'riluzol.jpg', 244, 4),
(5, 'Histamin', 'Samo za oralnu upotrebu.', 'histamin.jpg', 768, 3),
(6, 'Aspirin', 'Razmak izmedju konzumiranja leka mora biti 8 sati.', 'aspirin.jpg', 334, 1),
(7, 'Bromazepam', 'Vrlo je opasno konzumiranje alkohola istovremeno sa ovim lekom.', 'bromazepam.jpg', 512, 5),
(8, 'Kafetin', 'Dozvoljena doza prikazana je u upustvu.', 'kafetin.jpg', 240, 1),
(9, 'Persen', 'Uzimati dve doze, jednu ujutru drugu uvece.', 'persen.jpg', 212, 6),
(10, 'Aerius', 'Obavezno se posavetovati sa lekarom ili farmaceutom.', 'aerius.jpg', 422, 6),
(11, 'Panadol', 'Propisana doza za sve uzraste nalazi se u upustvu.', 'panadol.jpg', 521, 1),
(12, 'Hipnotici', 'Trenutno je jedino dostupna kolicina od 50 ml.', 'propofol.jpg', 368, 7),
(13, 'Vitamin C', 'Sumece tablete', 'vitaminc.jpg', 201, 2),
(14, 'Magnezijum', 'Dozvoljena je samo jedna tableta dnevno.', 'magnezijum.jpg', 701, 2),
(15, 'Selen', 'Posavetovati se sa lekarom ili farmaceutom prilikom konzumiranja ovog leka.', 'selen.jpg', 314, 2),
(16, 'Coldrex', 'Lek za prevenciju prehlade.', 'coldrex.png', 123, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorijalekova`
--
ALTER TABLE `kategorijalekova`
  ADD PRIMARY KEY (`kategorijaID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD PRIMARY KEY (`kupovinaID`),
  ADD KEY `lek_FK` (`lekID`),
  ADD KEY `korisnik_FK` (`korisnikID`);

--
-- Indexes for table `lekovi`
--
ALTER TABLE `lekovi`
  ADD PRIMARY KEY (`lekID`),
  ADD KEY `kategorija_FK` (`kategorijaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorijalekova`
--
ALTER TABLE `kategorijalekova`
  MODIFY `kategorijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kupovina`
--
ALTER TABLE `kupovina`
  MODIFY `kupovinaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lekovi`
--
ALTER TABLE `lekovi`
  MODIFY `lekID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `korisnik_FK` FOREIGN KEY (`korisnikID`) REFERENCES `korisnik` (`korisnikID`),
  ADD CONSTRAINT `lek_FK` FOREIGN KEY (`lekID`) REFERENCES `lekovi` (`lekID`);

--
-- Constraints for table `lekovi`
--
ALTER TABLE `lekovi`
  ADD CONSTRAINT `kategorija_FK` FOREIGN KEY (`kategorijaID`) REFERENCES `kategorijalekova` (`kategorijaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
