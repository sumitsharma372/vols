-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 09, 2022 at 05:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volsec`
--

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `academic_score` int(11) NOT NULL,
  `performance_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `emp_id`, `first_name`, `last_name`, `dept`, `academic_score`, `performance_score`) VALUES
(1, 'E001', 'Akshat', 'saxena', 'testing', 4, 3),
(2, 'E002', 'Akshat', 'sharma', 'R&D', 5, 4),
(3, 'E003', 'Debmalya', 'das', 'testing', 3, 5),
(6, 'E004', 'Aman', 'Mitra', 'testing', 4, 5),
(9, 'E005', 'Tony', 'Stark', 'Research', 5, 5),
(11, 'E007', 'John', 'Smith', 'R&D', 4, 5),
(12, 'E006', 'Thor', 'Loki', 'Power', 5, 4),
(14, 'E009', 'Ranjan', 'Singh', 'R&D', 3, 5),
(15, 'E010', 'Sumit', 'Sharma', 'Mechanical', 5, 3),
(16, 'E011', 'Shyam', 'Mitra', 'testing', 5, 1),
(17, 'E012', 'Manoj', 'Singh', 'Computer Science', 2, 5),
(19, 'E1013', 'Sahil', 'Gupta', 'Chemistry', 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
