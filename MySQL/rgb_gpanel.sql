-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 06:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgb_gpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `Title` text DEFAULT NULL,
  `Text` text DEFAULT NULL,
  `Location` text DEFAULT NULL,
  `Tags` text DEFAULT NULL,
  `Image` text DEFAULT NULL,
  `userID` text DEFAULT NULL,
  `Date` text DEFAULT NULL,
  `Status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Title`, `Text`, `Location`, `Tags`, `Image`, `userID`, `Date`, `Status`) VALUES
(1, 'Test post.', 'ovo je test', 'Tivat, Monenegro', 'test,post,mskoko,ejj', 'n/i/d2iztojgc2rp2bxst6nwqy7hgrbepe.jpg', '1', '01/12/2019, 15:05pm', '1'),
(2, 'Post #2', 'Post #2', 'Tivat, Montenegro', 'test,post,mskoko,salji.me', 'n/i/rlr6fk30ztj0w8tiq35gf8m7tden6f.png', '1', '01/12/2019, 15:59pm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Name` text NOT NULL,
  `Lastname` text NOT NULL,
  `Image` text DEFAULT NULL,
  `Token` text DEFAULT NULL,
  `Status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `Name`, `Lastname`, `Image`, `Token`, `Status`) VALUES
(1, 'mskoko.me', 'fe01ce2a7fbac8fafaed7c982a04e229', 'mskoko.me@gmail.com', 'Muhamed', 'Skoko', 'assets/img/i/logo/logo.png', 'uihdu1ghdugugd87g187g', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
