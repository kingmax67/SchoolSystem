-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2017 at 08:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caleb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`) VALUES
(1, 'CS'),
(2, 'EPE'),
(3, 'ME'),
(4, 'FCT'),
(5, 'AMT'),
(6, 'CIFT'),
(7, 'ES'),
(8, 'FS'),
(9, 'LAW'),
(10, 'ME'),
(11, 'SE'),
(12, 'SEFM');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `HOD_ID` int(11) NOT NULL,
  `HOD_NAME` varchar(255) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DEPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`HOD_ID`, `HOD_NAME`, `PHONE`, `ADDRESS`, `EMAIL`, `DEPT_ID`) VALUES
(4, 'Atangana', '675021547', 'bamenda', 'atangana@gmail.com', 1),
(5, 'foumbong', '656254715', 'bambui', 'foum@gmail.com', 1),
(6, 'Tsague', '675874897', 'bambili', 'tsague@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoo`
--

CREATE TABLE `hoo` (
  `HOO_ID` int(11) NOT NULL,
  `HOO_NAME` varchar(255) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `OPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `OPT_ID` int(11) NOT NULL,
  `OPT_NAME` varchar(255) NOT NULL,
  `DEPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`OPT_ID`, `OPT_NAME`, `DEPT_ID`) VALUES
(1, 'FCS', 1),
(2, 'ICT', 1),
(3, 'Elec', 2),
(4, 'Electrotec', 2),
(5, 'ACR', 2),
(6, 'MKT', 5),
(7, 'ACC', 5),
(8, 'MGT', 5),
(9, 'IMC', 5);

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

CREATE TABLE `secretary` (
  `SEC_ID` int(11) NOT NULL,
  `SEC_NAME` varchar(255) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DEPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(45) NOT NULL,
  `MATRICULE` varchar(15) NOT NULL,
  `STUD_NAME` varchar(255) NOT NULL,
  `GENDER` char(1) NOT NULL,
  `DATE_OF_BIRTH` varchar(45) NOT NULL,
  `PLACE_OF_BIRTH` varchar(255) NOT NULL,
  `REGION_OF_ORIGIN` varchar(255) NOT NULL,
  `LEVEL` int(3) NOT NULL,
  `DATE_OF_ADMISSION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ADDRESS` varchar(255) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `IMAGE` longblob NOT NULL,
  `OPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `MATRICULE`, `STUD_NAME`, `GENDER`, `DATE_OF_BIRTH`, `PLACE_OF_BIRTH`, `REGION_OF_ORIGIN`, `LEVEL`, `DATE_OF_ADMISSION`, `ADDRESS`, `PHONE`, `EMAIL`, `IMAGE`, `OPT_ID`) VALUES
(3, '14TO330', 'Tantoh sonita', 'f', '0000-00-00', 'nkwen', 'sw', 300, '2017-07-01 08:38:15', 'nkwen', '672259471', 'sonita@gmail.com', 0x706963747572653030362e6a7067, 2),
(5, '14TP216', 'Adamou', 'm', '0000-00-00', 'bafout', 'north west', 100, '2017-07-01 16:54:06', 'bambili', '695734736', 'adamou@gmail.com', 0x766c63736e61702d6572726f723838372e706e67, 1),
(8, '14TP234', 'ADAMU CALEB SERKKKWI', 'M', '1990-07-08', 'luh', 'NW', 300, '2017-07-01 08:28:03', 'bamenda', '672259471', 'adms@gmail.com', 0x706963747572653030312e6a7067, 2),
(11, 'UBA16T0827', 'JOHN', 'M', '12-12-1989', 'bafout', 'NW', 100, '2017-07-01 18:01:07', 'nkwen', '672259471', 'john@yahoo.com', 0x706963747572653030302e6a7067, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`HOD_ID`);

--
-- Indexes for table `hoo`
--
ALTER TABLE `hoo`
  ADD PRIMARY KEY (`HOO_ID`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`OPT_ID`);

--
-- Indexes for table `secretary`
--
ALTER TABLE `secretary`
  ADD PRIMARY KEY (`SEC_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `HOD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
