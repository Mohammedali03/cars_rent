-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 01:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `model` varchar(100) NOT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `interior` varchar(50) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `price`, `description`, `model`, `transmission`, `interior`, `brand`, `image`) VALUES
(2, 'Hyundai i20', 200.00, 'The Hyundai i20 is a sleek hatchback, ideal for city and long trips. Fuel efficient.', 'i20', 'Automatic', 'Fabric', 'Hyundai', 'images/img1.png'),
(3, 'Skoda Rapid', 250.00, 'The Skoda Rapid combines elegance with performance. Spacious cabin, high-end infotainment, excellent mileage, durable.', 'Rapid', 'Automatic', 'Fabric', 'Skoda', 'images/img2.png'),
(4, 'Tata Nexon', 290.00, 'Stylish Tata Nexon SUV with bold design, safety features, good mileage on city streets, terrains.', 'Nexon', 'Automatic', 'Fabric', 'Tata', 'images/img3.png'),
(5, 'Scorpio', 280.00, 'Mahindra Scorpio is a rugged SUV with bold exterior, powerful engine, excellent urban, rural performance.', 'Scorpio', 'Automatic', 'Fabric', 'Mahindra', 'images/img4.png'),
(6, 'Baleno', 300.00, 'Baleno, a premium 7-seater SUV with luxury, power, advanced technology, spacious interiors, safety features.', 'Hexa', 'Automatic', 'Leather', 'Tata', 'images/img5.png'),
(7, 'Tata Tiago', 200.00, 'Tata Tiago is an affordable, fuel-efficient hatchback with modern design, comfortable seating, advanced safety features.', 'Tiago', 'Automatic', 'Fabric', 'Tata', 'images/img6.png'),
(8, 'Suzuki Baleno', 220.00, 'Suzuki Baleno is a premium hatchback with stylish design, spacious interiors, fuel efficiency, latest technology.', 'Baleno', 'Automatic', 'Fabric', 'Suzuki', 'images/img7.png'),
(9, 'HYUNDAI City', 280.00, 'Hyundai City offers a premium look, reliable performance, refined driving, advanced infotainment, spacious, comfortable seating.', 'City', 'Automatic', 'Fabric', 'Hyundai', 'images/img8.png'),
(10, 'Creta', 300.00, 'Creta offers a premium look, reliable performance, refined driving, advanced infotainment, spacious, comfortable seating.', 'creta', 'Automatic', 'Fabric', 'Creta', 'images/img10.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `username`, `phone`, `start_date`, `end_date`, `duration`, `email`, `amount`, `created_at`) VALUES
(1, 'el idrissi mohammed ali', '0777115609', '2025-04-17', '2025-04-26', 9, '2003elidrissi@gmail.com', 2250.00, '2025-04-17 14:57:52'),
(2, 'user example', '0603059845', '2025-04-18', '2025-04-21', 3, 'userexample@gmail.com', 870.00, '2025-04-17 15:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'example1', 'user1@gmail.com', '123', 'user', '2025-04-17 15:04:35', '2025-04-18 16:48:27'),
(2, 'admin', 'example', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', '2025-04-18 16:45:23', '2025-04-18 16:48:47'),
(3, 'fdfgg', 'dfgfdg', 'ali@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2025-05-25 10:58:48', '2025-05-25 10:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
