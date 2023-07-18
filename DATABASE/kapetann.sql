-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 08:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapetann`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal_amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `price`, `title`, `quantity`, `subtotal_amount`, `date`, `invoice_number`, `user_id`) VALUES
(1, '40.00', 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, '40.00', '2023-04-21', 'INV-760084', 0),
(2, '45.00', 'AMERICANO - HOT ESPRESSO (12 OZ)', 1, '45.00', '2023-04-21', 'INV-760084', 0),
(3, '40.00', 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, '40.00', '2023-04-21', 'INV-174394', 2),
(4, '50.00', 'NITRO COLD BREW W/ STRAW (12 OZ)', 1, '50.00', '2023-04-21', 'INV-741371', 2),
(5, '45.00', 'AMERICANO - HOT ESPRESSO (12 OZ)', 1, '45.00', '2023-04-21', 'INV-982020', 2),
(6, '40.00', 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, '40.00', '2023-04-21', 'INV-144116', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'John Rovie', 'RovicBalingbing', 'balingbing.johnrovie20@gmail.com', '850f5f5611e06993cc07363c98c560d0', '2023-04-18 08:59:41'),
(2, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-04-18 11:00:40'),
(3, 'sample', 'sample', 'sample', '5e8ff9bf55ba3508199d22e984129be6', '2023-04-18 11:03:23'),
(4, 'Rovic', 'Rovic', 'Rovic@gmail.com', '6bafff124175b93f6358d465c5a654d9', '2023-04-19 12:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
