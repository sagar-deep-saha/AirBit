-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 10:17 PM
-- Server version: 10.4.27-MariaDB
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
  `namer` varchar(66) NOT NULL,
  `skiller` varchar(66) NOT NULL,
  `cityer` varchar(66) NOT NULL,
  `stater` varchar(66) NOT NULL,
  `piner` varchar(66) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indexer`
--

INSERT INTO `indexer` (`id`, `namer`, `skiller`, `cityer`, `stater`, `piner`, `dt`) VALUES
(4, 'roman', 'PHP', 'agartala', 'Tripura', '799006', '2024-04-07 01:43:28'),
(5, '', '', '', '', '', '2024-04-07 01:46:43'),
(6, '', '', '', '', '', '2024-04-07 01:46:55'),
(7, 'roman', 'PHP', 'KOLKATA', 'TIPRALAND', '896523', '2024-04-07 01:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `letter` varchar(66) NOT NULL,
  `time` varchar(66) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `red`
--

CREATE TABLE `red` (
  `id` int(11) NOT NULL,
  `nake` varchar(66) NOT NULL,
  `cef` varchar(66) NOT NULL,
  `comment` varchar(66) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(66) NOT NULL,
  `password` varchar(66) NOT NULL,
  `skills` varchar(66) NOT NULL,
  `city` varchar(66) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `skills`, `city`, `dt`) VALUES
(3, 'roman', '$2y$10$ce5d9SofYjQuAG94.kYbn.ySZVwiogr/MfH0q/r4GxPxHZZATy3ry', '', '', '2024-04-07 01:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `yellow`
--

CREATE TABLE `yellow` (
  `id` int(11) NOT NULL,
  `usert` varchar(66) NOT NULL,
  `lang` varchar(66) NOT NULL,
  `other` varchar(66) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yellow`
--

INSERT INTO `yellow` (`id`, `usert`, `lang`, `other`, `dt`) VALUES
(1, 'roman', 'php', 'This is a good website for developers', '2024-04-07 01:45:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indexer`
--
ALTER TABLE `indexer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `red`
--
ALTER TABLE `red`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yellow`
--
ALTER TABLE `yellow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
