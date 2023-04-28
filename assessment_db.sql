-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 06:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `serial` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`serial`, `first_name`, `last_name`, `user`, `pass`) VALUES
(9, 'Jane', 'Doe', 'janedoe', '$2y$10$uxe1egvag98CFMw0EL.h.OPSOv6yyGpnc/LJA/RDUFOWvcz/sL5ei'),
(10, 'admin', 'admin', 'admin', '$2y$10$YvlsQc4KqRlzdFhs8t4z3uXxgBqmhf6taF0Eg7OVeEuVg4B25XE86'),
(11, 'test', 'user', 'testuser', '$2y$10$cGhx7HgEA0eTtI6Evpclve5bjRT6A2oGNKStTQPUYkDV2dh.tAGKO');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `serial` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `miles` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `retail_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`serial`, `make`, `model`, `miles`, `year`, `retail_price`, `sale_price`) VALUES
(1, 'Buick', 'Envision', 11, 2023, 39365, 39365),
(2, 'Buick', 'Envision', 3062, 2023, 37990, 37990),
(3, 'Buick', 'Envision', 3191, 2023, 38870, 38870),
(4, 'Chevrolet', 'Silverado', 13, 2023, 62140, 61890),
(5, 'Chevrolet', 'Trax', 7, 2022, 25805, 24555),
(6, 'Chevrolet', 'Trailblazer', 7, 2023, 29795, 29795),
(7, 'Buick', 'Encore', 8, 2023, 28725, 28725),
(8, 'GMC', 'Canyon', 3, 2023, 53310, 53310),
(9, 'GMC', 'Canyon', 3, 2023, 47180, 47180),
(10, 'GMC', 'Acadia', 3, 2023, 55165, 54415),
(11, 'GMC', 'Acadia', 7, 2023, 48780, 48030),
(12, 'Chevrolet', 'Traverse', 5, 2023, 52550, 51300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
