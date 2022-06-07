-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220606.e7487227e5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yazwarehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `google_oauth`
--

CREATE TABLE `google_oauth` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_oauth`
--

INSERT INTO `google_oauth` (`id`, `provider`, `provider_value`) VALUES
(1, 'google', '{\"access_token\":\"ya29.a0ARrdaM_EW1aerZSYNLTjEpMwtgHbgz6hjJP5WZ2aytJtU0H66EI4l5EvZ-FvnjWdh8vzcqN4n_geqzLHNZePFeCKyh3__7Ktn-qT6nvxDnAKYmKz4xfWZuLWOfWU2LH6kHn919aO-9zzJmgGBwh_2nLCuoF3TA\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//038IUAB0629QTCgYIARAAGAMSNwF-L9IrIvcfanzi2HAUjT2vulxIqOUYc1tTxKLdsXAm9tgEUaBCaR8S9Q8yy5w9PBoFVZBoJ2Y\"}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Nomdeproduit` varchar(100) NOT NULL,
  `Quantitenstock` int(100) NOT NULL,
  `sheetId` varchar(100) NOT NULL,
  `respo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Nomdeproduit`, `Quantitenstock`, `sheetId`, `respo`) VALUES
(1, 'Hair oil', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'YAZ Media'),
(9, 'White to black shampo', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'NAJI.TAOUFIK'),
(12, 'Revine lifting stick', 200, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'NAJI.TAOUFIK'),
(14, 'Epify hair removal', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'NAJI.TAOUFIK'),
(16, 'Nanohair', 500, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'HAMZA.RIDOUANE'),
(17, 'Nanohair serum', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'NAJI.TAOUFIK'),
(20, 'Volcanic MUD', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'NAJI.TAOUFIK'),
(21, 'Fibo cream', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', 'TAOUFIK ZOUIN'),
(25, 'dolil hair', 0, '1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `usersEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Role`, `usersEmail`) VALUES
(3, 'admin', '123789', 'Admin', ''),
(6, 'YAZ Media', '123456', 'CLIENT', ''),
(7, 'NAJI.TAOUFIK', 'NTAA1', 'CLIENT', ''),
(8, 'HAMZA.RIDOUANE', 'HRAI2', 'CLIENT', ''),
(9, 'KHAOULA.RIDOUANE', 'KRHI3', 'CLIENT', ''),
(10, 'MOHAMMED.MAALI', 'MMOA3', 'CLIENT', ''),
(11, 'HIND.TANSOUFT', 'HTIA4', 'CLIENT', ''),
(12, 'AYOUB.AITSAAD', 'AAYI5', 'CLIENT', ''),
(13, 'MANSOURI.ZAKARIA', 'MZAA6', 'CLIENT', ''),
(14, 'SOUIS.YOUSSEF', 'SYOO7', '', ''),
(15, 'NAFIA.RIDOUAN', 'NRAI8', 'CLIENT', ''),
(16, 'ABDELOUAHED.AITELGARGUI', 'AABI9', 'CLIENT', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `google_oauth`
--
ALTER TABLE `google_oauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `google_oauth`
--
ALTER TABLE `google_oauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



