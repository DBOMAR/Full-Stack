-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersnaam`, `wachtwoord`, `rol`, `id`) VALUES
('Piet', 'P1234', 'Administrator', 1),
('Omar', 'O4321', 'Gebruiker', 2),
('Joris', 'J1234', 'Administrator', 3),
('Rick', 'R1234', 'Gebruiker', 4),
('Ahmed', 'A1234', 'Administrator', 5),
('Jan', 'Jan123', 'Administrator', 6),
('Jorn', 'J4444', 'Administrator', 7);

-- --------------------------------------------------------

--
-- Table structure for table `opleiding`
--

CREATE TABLE `opleiding` (
  `idOpleiding` varchar(15) NOT NULL,
  `opleiding_naam` varchar(45) DEFAULT NULL,
  `opleiding_niveau` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `opleiding`
--

INSERT INTO `opleiding` (`idOpleiding`, `opleiding_naam`, `opleiding_niveau`) VALUES
('AS', 'Administratie Service', 'MBO2'),
('BS', 'Beveiligen en Security', 'MBO4'),
('EE', 'Engineering Elektrotechniek', 'MBO4'),
('ET', 'Elektro Techniek', 'MBO2'),
('HM', 'Handel Medewerker', 'MBO2'),
('IM', 'ICT Medewerker', 'MBO2'),
('MV', 'Media Vormgeving', 'MBO3'),
('OA', 'Onderwijs Assistent', 'MBO3'),
('SA', 'System Automation', 'MBO4'),
('SB', 'Sport en Bewegen', 'MBO3'),
('SD', 'Software Development', 'MBO4'),
('SW', 'Social Work', 'MBO4'),
('TS', 'Testing Software', 'MBO4'),
('TT', 'Test Piet', '2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idStudent` int(11) NOT NULL,
  `Roepnaam` varchar(45) DEFAULT NULL,
  `Voorletter` varchar(45) DEFAULT NULL,
  `Tussenvoegels` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `Roepnaam`, `Voorletter`, `Tussenvoegels`, `Achternaam`, `email`) VALUES
(1, 'Omar', 'O', '-', 'Diab', 'omar@gmail.com'),
(2, 'Piet', 'P', 'de', 'Vries', 'piet@gmail.com'),
(3, 'Jorn', 'J', '-', 'Oosterink', 'jorn@gmail.com'),
(4, 'Joris', 'J', 'van', 'Bruggel', 'joris@gmail.com'),
(5, 'Rick', 'R', '-', 'Dorr', 'tdorr@roc-dev.com'),
(6, 'Paul', 'P', 'van', 'Almere', 'paul@gmail.com'),
(7, 'Ahmed', 'A', '-', 'Ali', 'ahmed@gmail.com'),
(8, 'Jan', 'J', '-', 'Jaap', 'jan@gmail.com'),
(10, 'Ali', 'A', '-', 'Mosa', 'ali@gmail.com'),
(20, 'Rolla', 'R', '-', 'Ali', 'R@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_opleiding`
--

CREATE TABLE `student_opleiding` (
  `idStudent` int(11) NOT NULL,
  `idOpleiding` varchar(15) NOT NULL,
  `start_datum` varchar(45) DEFAULT NULL,
  `eind_datum` varchar(45) DEFAULT NULL,
  `diploma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_opleiding`
--

INSERT INTO `student_opleiding` (`idStudent`, `idOpleiding`, `start_datum`, `eind_datum`, `diploma`) VALUES
(2, 'ET', '30-08-2019', '30-80-2022', 'Ja'),
(3, 'IM', '30-08-2000', '30-08-2003', 'Nee'),
(4, 'MV', '30-08-2000', '30-08-2003', 'Ja'),
(5, 'OA', '30-08-2015', '15-07-2018', 'Ja'),
(6, 'SA', '30-08-2015', '15-07-2018', 'Ja'),
(10, 'SB', '30-08-2015', '15-07-2018', 'Ja'),
(7, 'AS', '30-08-2023', '15-07-2027', 'Nee'),
(20, 'BS', '30-08-2023', '15-07-2027', 'Nee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opleiding`
--
ALTER TABLE `opleiding`
  ADD PRIMARY KEY (`idOpleiding`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`);

--
-- Indexes for table `student_opleiding`
--
ALTER TABLE `student_opleiding`
  ADD KEY `fk_Student_opleiding_Student_idx` (`idStudent`),
  ADD KEY `fk_Student_opleiding_Opleiding1_idx` (`idOpleiding`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_opleiding`
--
ALTER TABLE `student_opleiding`
  ADD CONSTRAINT `fk_Student_opleiding_Opleiding1` FOREIGN KEY (`idOpleiding`) REFERENCES `opleiding` (`idOpleiding`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_opleiding_Student` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
