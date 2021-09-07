-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 08:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qnumbers`
--

-- --------------------------------------------------------

--
-- Table structure for table `8d`
--

CREATE TABLE `8d` (
  `QNumber` char(9) NOT NULL,
  `PartNumber` longtext DEFAULT NULL,
  `DrawingNumber` longtext DEFAULT NULL,
  `Originator` tinytext DEFAULT NULL,
  `Customer` tinytext DEFAULT NULL,
  `SerialNumber` tinytext DEFAULT NULL,
  `SalesNumber` tinytext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `DateClosed` date NOT NULL,
  `NetworkDays` int(11) NOT NULL,
  `QuantityRejected` int(11) NOT NULL,
  `PRSSendDate` int(11) NOT NULL,
  `PRSReceived` text NOT NULL,
  `RejectNote` char(9) NOT NULL,
  `DefectCode` tinytext NOT NULL,
  `QualityConcern` longtext NOT NULL,
  `Status` tinytext NOT NULL,
  `DebitNote` char(9) NOT NULL,
  `ScrapDate` date NOT NULL,
  `Notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `8d`
--

INSERT INTO `8d` (`QNumber`, `PartNumber`, `DrawingNumber`, `Originator`, `Customer`, `SerialNumber`, `SalesNumber`, `Description`, `DateAdded`, `DateClosed`, `NetworkDays`, `QuantityRejected`, `PRSSendDate`, `PRSReceived`, `RejectNote`, `DefectCode`, `QualityConcern`, `Status`, `DebitNote`, `ScrapDate`, `Notes`) VALUES
('q21-00001', '2', '2', 'Ben', 'Ben', '2', '2', 'Test', '2021-06-03', '2021-07-17', 44, 0, 2021, '', '', '', '', '', '', '2021-07-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `cn`
--

CREATE TABLE `cn` (
  `QNumber` char(9) NOT NULL,
  `PartNumber` longtext DEFAULT NULL,
  `DrawingNumber` longtext DEFAULT NULL,
  `Originator` tinytext DEFAULT NULL,
  `Customer` tinytext DEFAULT NULL,
  `SerialNumber` tinytext DEFAULT NULL,
  `SalesNumber` tinytext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `DateClosed` date NOT NULL,
  `LiveDays` int(11) NOT NULL,
  `ClosedBy` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cn`
--

INSERT INTO `cn` (`QNumber`, `PartNumber`, `DrawingNumber`, `Originator`, `Customer`, `SerialNumber`, `SalesNumber`, `Description`, `DateAdded`, `DateClosed`, `LiveDays`, `ClosedBy`) VALUES
('Q21-00001', '2', '2', 'Ben', 'Ben', '2', '2', 'Test', '2021-06-03', '2021-08-26', 84, 'ME'),
('q21-00012', '333', '333', 'Ben', 'Ben', '333', '333', 'Test for Dad', '2021-06-04', '2021-07-31', 57, 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `QNumber` char(9) NOT NULL,
  `PartNumber` longtext DEFAULT NULL,
  `DrawingNumber` longtext DEFAULT NULL,
  `Originator` tinytext DEFAULT NULL,
  `Customer` tinytext DEFAULT NULL,
  `SerialNumber` tinytext DEFAULT NULL,
  `SalesNumber` tinytext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DateAdded` date DEFAULT NULL,
  `RU` tinyint(1) DEFAULT NULL,
  `CU` tinyint(1) DEFAULT NULL,
  `8D` tinyint(1) DEFAULT NULL,
  `CN` tinyint(1) DEFAULT NULL,
  `ECNDR` tinyint(1) DEFAULT NULL,
  `ISIR` tinyint(1) DEFAULT NULL,
  `PSW` tinyint(1) DEFAULT NULL,
  `ELV` tinyint(1) DEFAULT NULL,
  `RFQ` tinyint(1) DEFAULT NULL,
  `NPI` tinyint(1) DEFAULT NULL,
  `CofC` tinyint(1) DEFAULT NULL,
  `TestCert` tinyint(1) DEFAULT NULL,
  `Concession` tinyint(1) DEFAULT NULL,
  `DesignReview` tinyint(1) DEFAULT NULL,
  `StockFreeze` tinyint(1) DEFAULT NULL,
  `RejectNote` tinyint(1) DEFAULT NULL,
  `StopNote` tinyint(1) DEFAULT NULL,
  `QualityAlert` tinyint(1) DEFAULT NULL,
  `DebitNote` tinyint(1) DEFAULT NULL,
  `ASME` tinyint(1) NOT NULL,
  `Other` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`QNumber`, `PartNumber`, `DrawingNumber`, `Originator`, `Customer`, `SerialNumber`, `SalesNumber`, `Description`, `DateAdded`, `RU`, `CU`, `8D`, `CN`, `ECNDR`, `ISIR`, `PSW`, `ELV`, `RFQ`, `NPI`, `CofC`, `TestCert`, `Concession`, `DesignReview`, `StockFreeze`, `RejectNote`, `StopNote`, `QualityAlert`, `DebitNote`, `ASME`, `Other`) VALUES
('Q21-00000', '1', '1', 'Ben', 'Ben', '1', '1', 'Test', '2021-06-03', 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
('Q21-00001', '2', '2', 'Ben', 'Ben', '2', '2', 'Test', '2021-06-03', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00002', '3', '3', 'Ben', 'Ben', '3', '3', 'Test', '2021-06-03', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00003', '4', '4', 'Ben', 'Ben', '4', '4', 'Test', '2021-06-03', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00004', '5', '5', 'Ben', 'Ben', '5', '5', 'Test', '2021-06-03', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00005', '1', '6', 'Ben', 'Ben', '6', '6', 'Test', '2021-06-03', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00006', '123458974589273', '348975089725348-6235', 'Ben', 'B', '87563248-9', '5346980890', 'Folder Test!!!', '2021-06-04', 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
('Q21-00007', '123458974589273', '348975089725348-6235', 'Ben', 'B', '87563248-9', '5346980890', 'Folder Test!!!', '2021-06-04', 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
('Q21-00008', '123458974589273', '348975089725348-6235', 'Ben', 'B', '87563248-9', '5346980890', 'Folder Test!!!', '2021-06-04', 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
('Q21-00009', '123458974589273', '348975089725348-6235', 'Ben', 'B', '87563248-9', '5346980890', 'Folder Test!!!', '2021-06-04', 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
('Q21-00010', '123458974589273', '348975089725348-6235', 'Ben', 'B', '87563248-9', '5346980890', 'Folder Test!!!', '2021-06-04', 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
('Q21-00011', '400', '400', 'Ben', 'Ben', '400', '400', 'Test', '2021-06-04', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00012', '333', '333', 'Ben', 'Ben', '333', '333', 'Test for Dad', '2021-06-04', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00013', '66', '66', 'ME', 'ME', '0', '0', '0', '2021-06-04', 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Q21-00014', '777', '777', 'ME', 'YOU', '777', '777', 'Testing Edits', '2021-06-05', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Q21-00015', '111', '111', '111', '111', '111', '111', '111', '2021-06-05', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `QNumber` char(9) NOT NULL,
  `PartNumber` longtext DEFAULT NULL,
  `DrawingNumber` longtext DEFAULT NULL,
  `Originator` tinytext DEFAULT NULL,
  `Customer` tinytext DEFAULT NULL,
  `SerialNumber` tinytext DEFAULT NULL,
  `SalesNumber` tinytext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DateAdded` date DEFAULT NULL,
  `ClosingDate` date NOT NULL,
  `Supplier1` tinytext NOT NULL,
  `Quoted1` tinyint(1) NOT NULL,
  `Supplier2` tinytext NOT NULL,
  `Quoted2` tinyint(1) NOT NULL,
  `Supplier3` tinytext NOT NULL,
  `Quoted3` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`QNumber`, `PartNumber`, `DrawingNumber`, `Originator`, `Customer`, `SerialNumber`, `SalesNumber`, `Description`, `DateAdded`, `ClosingDate`, `Supplier1`, `Quoted1`, `Supplier2`, `Quoted2`, `Supplier3`, `Quoted3`) VALUES
('q21-00000', '1', '1', 'Ben', 'Ben', '1', '1', 'Test', '2021-06-03', '2030-11-22', 'Nick', 0, 'Ho', 0, 'Cheats', 1),
('Q21-00002', '3', '3', 'Ben', 'Ben', '3', '3', 'Test', '2021-06-03', '2021-07-14', '0', 0, '0', 0, '0', 0),
('Q21-00005', '6', '6', 'Ben', 'Ben', '6', '6', 'Test', '2021-06-03', '2021-07-14', '0', 0, '0', 0, '0', 0),
('Q21-00011', '400', '400', 'Ben', 'Ben', '400', '400', 'Test', '2021-06-04', '2021-09-22', 'E', 1, '0', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ru`
--

CREATE TABLE `ru` (
  `QNumber` char(9) NOT NULL,
  `PartNumber` longtext DEFAULT NULL,
  `DrawingNumber` longtext DEFAULT NULL,
  `Originator` tinytext DEFAULT NULL,
  `Customer` tinytext DEFAULT NULL,
  `SerialNumber` tinytext DEFAULT NULL,
  `SalesNumber` tinytext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `Type` tinytext NOT NULL,
  `ReturnNumber` tinytext NOT NULL,
  `DefectCode` tinytext NOT NULL,
  `Status` tinytext NOT NULL,
  `TotalQuantity` int(11) NOT NULL,
  `QuantityAccepted` int(11) NOT NULL,
  `QuantityRejected` int(11) NOT NULL,
  `RejectNote` char(9) NOT NULL,
  `DebitNote` char(9) NOT NULL,
  `ClaimValue` tinytext NOT NULL,
  `ScrapDate` date NOT NULL,
  `Notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ru`
--

INSERT INTO `ru` (`QNumber`, `PartNumber`, `DrawingNumber`, `Originator`, `Customer`, `SerialNumber`, `SalesNumber`, `Description`, `DateAdded`, `Type`, `ReturnNumber`, `DefectCode`, `Status`, `TotalQuantity`, `QuantityAccepted`, `QuantityRejected`, `RejectNote`, `DebitNote`, `ClaimValue`, `ScrapDate`, `Notes`) VALUES
('q21-00001', '2', '2', 'Ben', 'Ben', '2', '2', 'Test', '2021-06-03', 'RE', '404', '444', 'Done', 30, 17, 13, '', 'Q21-00006', '£3003', '2021-07-24', 'This is a test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `8d`
--
ALTER TABLE `8d`
  ADD PRIMARY KEY (`QNumber`),
  ADD UNIQUE KEY `QNumber` (`QNumber`);

--
-- Indexes for table `cn`
--
ALTER TABLE `cn`
  ADD PRIMARY KEY (`QNumber`),
  ADD UNIQUE KEY `QNumber` (`QNumber`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`QNumber`),
  ADD UNIQUE KEY `QNumber` (`QNumber`);

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`QNumber`),
  ADD UNIQUE KEY `QNumber` (`QNumber`);

--
-- Indexes for table `ru`
--
ALTER TABLE `ru`
  ADD PRIMARY KEY (`QNumber`),
  ADD UNIQUE KEY `QNumber` (`QNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;