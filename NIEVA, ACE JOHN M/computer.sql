-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 03:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer_rentals`
--

CREATE TABLE `computer_rentals` (
  `id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime DEFAULT NULL,
  `computer_unit_id` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` enum('In Use','Completed') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_rentals`
--

INSERT INTO `computer_rentals` (`id`, `customer_name`, `start_time`, `end_time`, `computer_unit_id`, `remarks`, `status`, `created_at`) VALUES
(NULL, 'Ace', '2024-10-08 02:43:29', NULL, 1, 'Open Time Forever', 'In Use', '2024-10-08 00:44:19'),
(NULL, 'Yan', '2024-10-08 02:50:14', '2024-10-09 08:50:14', 2, 'Wala lang', 'In Use', '2024-10-08 00:50:48'),
(NULL, 'www', '2024-10-08 09:20:57', NULL, 3, NULL, 'In Use', '2024-10-08 01:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `computer_units`
--

CREATE TABLE `computer_units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_units`
--

INSERT INTO `computer_units` (`id`, `unit_name`, `is_available`) VALUES
(1, 'One', 0),
(2, 'Two', 0),
(3, 'Three', 1),
(4, 'Four', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer_rentals`
--
ALTER TABLE `computer_rentals`
  ADD UNIQUE KEY `computer_unit_id` (`computer_unit_id`);

--
-- Indexes for table `computer_units`
--
ALTER TABLE `computer_units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer_units`
--
ALTER TABLE `computer_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer_rentals`
--
ALTER TABLE `computer_rentals`
  ADD CONSTRAINT `computer_rentals_ibfk_1` FOREIGN KEY (`computer_unit_id`) REFERENCES `computer_units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
