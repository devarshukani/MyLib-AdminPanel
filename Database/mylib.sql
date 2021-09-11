-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 09:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylib`
--

-- --------------------------------------------------------

--
-- Table structure for table `authordetail`
--

CREATE TABLE `authordetail` (
  `AuthorID` int(10) NOT NULL,
  `AuthorName` varchar(50) NOT NULL,
  `AuthorContactNumber` text NOT NULL,
  `AuthorAddress` varchar(100) NOT NULL,
  `CityID` int(10) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authordetail`
--

INSERT INTO `authordetail` (`AuthorID`, `AuthorName`, `AuthorContactNumber`, `AuthorAddress`, `CityID`, `Remark`) VALUES
(6, 'Baba Ramdev', '7041220538', 'Morbi', 7, NULL),
(7, 'DR APJ Abdul Kalam', '1010101001', 'rjkt', 3, NULL),
(16, 'Vikram Seth', '1526975326', 'adva', 5, NULL),
(17, 'Arundhati Roy', '1876238452', 'adagetrhf', 6, NULL),
(18, 'Chetan Bhagat', '5692157562', '1ad aaf gs5g4arg3 ', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `BookID` int(10) NOT NULL,
  `BookName` varchar(50) NOT NULL,
  `AuthorID` int(10) NOT NULL,
  `PublicationID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `BookPages` int(10) NOT NULL,
  `BookPrice` int(10) NOT NULL,
  `BookQuantity` int(10) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `RackNumber` varchar(50) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`BookID`, `BookName`, `AuthorID`, `PublicationID`, `CategoryID`, `BookPages`, `BookPrice`, `BookQuantity`, `PurchaseDate`, `RackNumber`, `Remark`) VALUES
(8, 'My Life, My Mission', 6, 6, 19, 500, 230, 11, '2000-05-13', 'f-19', NULL),
(10, 'Darkness to Light', 7, 12, 7, 790, 300, 19, '2020-12-24', 'c-12', NULL),
(21, 'Game Changer', 16, 6, 18, 163, 50, 14, '2021-01-19', 'n-06', NULL),
(22, 'India 2020: A Vision for the New Millennium', 7, 7, 22, 542, 260, 35, '2021-01-19', 'n-03', NULL),
(23, 'One Indian Girl', 18, 13, 25, 115, 40, 22, '2021-01-19', 'D-14', NULL),
(24, 'Half Girlfriend', 18, 7, 23, 210, 85, 13, '2021-01-19', 'c-05', NULL),
(25, 'The Dark Knight Begins', 17, 11, 21, 350, 200, 0, '2021-01-19', 'h-03', NULL),
(26, '	Target 3 Billion', 7, 13, 7, 405, 190, 16, '2021-01-19', 'p-12', NULL),
(27, 'Wings of Fire: An Autobiography', 7, 12, 26, 340, 200, 24, '2021-01-19', 'n-07', NULL),
(28, 'To Kill a Mockingbird', 17, 6, 30, 260, 89, 6, '2021-03-09', 'n-06', NULL),
(29, 'One Hundred Years of Solitude', 18, 12, 29, 152, 75, 23, '2021-03-09', 'n-35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorydetail`
--

CREATE TABLE `categorydetail` (
  `CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `Remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorydetail`
--

INSERT INTO `categorydetail` (`CategoryID`, `CategoryName`, `Remark`) VALUES
(7, 'Classics', ''),
(18, 'Mystery', ''),
(19, 'Fantasy', ''),
(21, 'Horror', ''),
(22, 'Literary Fiction', ''),
(23, 'Romance', ''),
(25, 'Short Stories', ''),
(26, 'Biographies and Autobiographies', ''),
(29, 'History', ''),
(30, 'Historical Fiction', '');

-- --------------------------------------------------------

--
-- Table structure for table `citydetail`
--

CREATE TABLE `citydetail` (
  `CityID` int(10) NOT NULL,
  `CityName` varchar(20) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citydetail`
--

INSERT INTO `citydetail` (`CityID`, `CityName`, `Remark`) VALUES
(1, 'Morbi', NULL),
(3, 'Rajkot', NULL),
(4, 'Ahmedabad', NULL),
(5, 'Surat', NULL),
(6, 'Jamnagar', NULL),
(7, 'Junagadh', NULL),
(9, 'Amreli ', NULL),
(14, 'Vadodara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `IssueBookID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `BookID` int(10) NOT NULL,
  `IssueBookDate` date NOT NULL,
  `DueDate` date DEFAULT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`IssueBookID`, `UserID`, `BookID`, `IssueBookDate`, `DueDate`, `Remark`) VALUES
(85, 12, 25, '2021-03-11', '2021-03-26', NULL),
(86, 15, 21, '2021-03-13', '2021-03-28', NULL),
(87, 15, 23, '2021-03-13', '2021-03-28', NULL),
(88, 15, 10, '2021-03-13', '2021-03-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publicationdetail`
--

CREATE TABLE `publicationdetail` (
  `PublicationID` int(10) NOT NULL,
  `PublicationName` varchar(50) NOT NULL,
  `PublicationAddress` varchar(100) NOT NULL,
  `PublicationContactNumber` text NOT NULL,
  `CityID` int(10) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicationdetail`
--

INSERT INTO `publicationdetail` (`PublicationID`, `PublicationName`, `PublicationAddress`, `PublicationContactNumber`, `CityID`, `Remark`) VALUES
(6, 'Penguin Random House', 'Morbi', '7041220538', 1, NULL),
(7, 'Macmillan Publishers', 'rjkt', '3030303030', 3, NULL),
(11, 'McGraw-Hill Education', 'surattt', '1593214528', 5, NULL),
(12, 'Pearson Education', 'Behind Big Bazaar, 150ft Ring Road,  Rajkot', '1682347521', 3, NULL),
(13, 'Oxford University Press', 'UK', '9534628751', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `UserID` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserContactNumber` text NOT NULL,
  `UserAddress` varchar(100) NOT NULL,
  `PendingDues` int(10) NOT NULL,
  `NumberOfIssuedBooks` int(10) NOT NULL,
  `CityID` int(10) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`UserID`, `UserName`, `Password`, `UserContactNumber`, `UserAddress`, `PendingDues`, `NumberOfIssuedBooks`, `CityID`, `Remark`) VALUES
(12, 'Viraj', 'viraj', '7041220538', 'Morbi 1', 3600, 6, 4, NULL),
(13, 'dev', 'dev', '2020202020', 'rjkt', 200, 4, 3, NULL),
(15, 'D', 'D', '3030303030', 'abc', 2000, 3, 5, NULL),
(16, 'Yash', 'yash', '2030104050', 'eee', 500, 0, 9, NULL),
(18, 'a', 'a', '1234567890', 'a', 500, 0, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authordetail`
--
ALTER TABLE `authordetail`
  ADD PRIMARY KEY (`AuthorID`),
  ADD KEY `authorCity` (`CityID`);

--
-- Indexes for table `bookdetail`
--
ALTER TABLE `bookdetail`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `bookAuthor` (`AuthorID`),
  ADD KEY `bookCategory` (`CategoryID`),
  ADD KEY `bookPublication` (`PublicationID`);

--
-- Indexes for table `categorydetail`
--
ALTER TABLE `categorydetail`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `citydetail`
--
ALTER TABLE `citydetail`
  ADD PRIMARY KEY (`CityID`,`CityName`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`IssueBookID`),
  ADD KEY `issuebookBook` (`BookID`),
  ADD KEY `issuebookUser` (`UserID`);

--
-- Indexes for table `publicationdetail`
--
ALTER TABLE `publicationdetail`
  ADD PRIMARY KEY (`PublicationID`),
  ADD KEY `publicationdetailCity` (`CityID`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `userdetailCity` (`CityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authordetail`
--
ALTER TABLE `authordetail`
  MODIFY `AuthorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bookdetail`
--
ALTER TABLE `bookdetail`
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categorydetail`
--
ALTER TABLE `categorydetail`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `citydetail`
--
ALTER TABLE `citydetail`
  MODIFY `CityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `IssueBookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `publicationdetail`
--
ALTER TABLE `publicationdetail`
  MODIFY `PublicationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authordetail`
--
ALTER TABLE `authordetail`
  ADD CONSTRAINT `authorCity` FOREIGN KEY (`CityID`) REFERENCES `citydetail` (`CityID`);

--
-- Constraints for table `bookdetail`
--
ALTER TABLE `bookdetail`
  ADD CONSTRAINT `bookAuthor` FOREIGN KEY (`AuthorID`) REFERENCES `authordetail` (`AuthorID`),
  ADD CONSTRAINT `bookCategory` FOREIGN KEY (`CategoryID`) REFERENCES `categorydetail` (`CategoryID`),
  ADD CONSTRAINT `bookPublication` FOREIGN KEY (`PublicationID`) REFERENCES `publicationdetail` (`PublicationID`);

--
-- Constraints for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD CONSTRAINT `issuebookBook` FOREIGN KEY (`BookID`) REFERENCES `bookdetail` (`BookID`),
  ADD CONSTRAINT `issuebookUser` FOREIGN KEY (`UserID`) REFERENCES `userdetail` (`UserID`);

--
-- Constraints for table `publicationdetail`
--
ALTER TABLE `publicationdetail`
  ADD CONSTRAINT `publicationdetailCity` FOREIGN KEY (`CityID`) REFERENCES `citydetail` (`CityID`);

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `userdetailCity` FOREIGN KEY (`CityID`) REFERENCES `citydetail` (`CityID`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event1225` ON SCHEDULE AT '2021-03-26 13:17:04' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE userdetail SET PendingDues = PendingDues+500 WHERE userdetail.UserID = 12$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
