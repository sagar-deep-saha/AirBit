-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `indexer`
--

CREATE TABLE `indexer` (
  `id` int(11) NOT NULL,
  `namer` varchar(90) NOT NULL,
  `skiller` varchar(90) NOT NULL,
  `cityer` varchar(90) NOT NULL,
  `stater` varchar(20) NOT NULL,
  `piner` varchar(6) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indexer`
--

INSERT INTO `indexer` (`id`, `namer`, `skiller`, `cityer`, `stater`, `piner`, `dt`) VALUES
(1, 'Ritesh K', 'JavaScript & PHP', 'Kolkata', 'West Bengal', '700009', '2023-01-09 00:40:11'),
(2, 'Ryzen', 'PHP', 'Kolkata', 'West Bengal', '700009', '2023-01-13 23:15:58'),
(3, '', '', '', '', '', '2024-04-23 00:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `red`
--

CREATE TABLE `red` (
  `id` int(11) NOT NULL,
  `blogid` varchar(90) NOT NULL,
  `commenter` varchar(90) NOT NULL,
  `comments` varchar(90) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `red`
--

INSERT INTO `red` (`id`, `blogid`, `commenter`, `comments`, `dt`) VALUES
(1, '2', 'Ritesh K', 'Just Have a Comment', '2023-01-09 00:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `dt`) VALUES
(1, 'Ritesh K', '$2y$10$bBs4oQjmjth1CwINXesZE.8a8SoClm37aBtHytVGkPRTbsqGScrY.', '2023-01-09 00:40:11'),
(2, 'Ryzen', '$2y$10$W6Eib98bgxWLIslsi4DB2u5z6fMsipaS1QfCqOeIxMPNmFfe0bTFe', '2023-01-13 23:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `yellow`
--

CREATE TABLE `yellow` (
  `id` int(11) NOT NULL,
  `usert` varchar(90) NOT NULL,
  `lang` varchar(90) NOT NULL,
  `other` varchar(90) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yellow`
--

INSERT INTO `yellow` (`id`, `usert`, `lang`, `other`, `dt`) VALUES
(1, 'Ritesh K', 'general', 'My first post after Development', '2023-01-09 00:40:45'),
(2, 'Ritesh K', 'general', 'Doing The 2nd Post', '2023-01-09 00:41:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indexer`
--
ALTER TABLE `indexer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `red`
--
ALTER TABLE `red`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yellow`
--
ALTER TABLE `yellow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indexer`
--
ALTER TABLE `indexer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `red`
--
ALTER TABLE `red`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yellow`
--
ALTER TABLE `yellow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
