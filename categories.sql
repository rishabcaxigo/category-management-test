-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:3307
-- Generation Time: Aug 24, 2022 at 08:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `categories`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `MasterCategoryID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Searchable` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Deleted` int(11) NOT NULL,
  `Image` text NOT NULL,
  `MetaTitle` text NOT NULL,
  `MetaTag` text NOT NULL,
  `MetaDescription` text NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `MasterCategoryID`, `Name`, `Searchable`, `Status`, `Deleted`, `Image`, `MetaTitle`, `MetaTag`, `MetaDescription`, `CreatedOn`) VALUES
(2, 0, 'Category 1', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(3, 0, 'Category 2', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(5, 0, 'Category 3', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(6, 2, 'Category A', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(7, 2, 'Category B', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(8, 3, 'Category Alpha', 1, 1, 0, '', '', '', '', '2022-08-24 20:04:32'),
(9, 2, 'Category C', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(10, 2, 'Category D', 0, 1, 0, '', '', '', '', '2022-08-24 20:00:32'),
(11, 0, 'Category 4', 0, 0, 1, '', '', '', '', '2022-08-24 20:02:02'),
(12, 8, 'Category Alpha 1', 0, 1, 0, '', '', '', '', '2022-08-24 20:06:29'),
(13, 5, 'Cat 3 Sub', 1, 0, 0, '', '', '', '', '2022-08-24 20:09:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
