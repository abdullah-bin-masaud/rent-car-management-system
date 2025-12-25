-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2025 at 03:14 PM
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
-- Database: `rent_car_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `total_rent` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_name`, `cnic`, `car_id`, `days`, `total_rent`, `booking_date`) VALUES
(1, 'Boxer', '34602-82604340', 3, 3, 4500, '2025-12-17'),
(2, 'Abdullah', '34602-82604340', 8, 3, 300000, '2025-12-17'),
(3, 'Zain Ali', '34602-82604340', 9, 2, 10000, '2025-12-17'),
(4, 'Ali Hamza', '34602-82604340', 10, 4, 28000, '2025-12-17'),
(5, 'Muhammad Asad Rauf', '34602-82604340', 11, 6, 36000, '2025-12-17'),
(6, 'Arsalan Shahzad', '34602-82604340', 10, 3, 21000, '2025-12-17'),
(7, 'Engr Umer Farooq', '34602-82604340', 9, 1, 5000, '2025-12-17'),
(8, 'Ali Hamza ', '8474488438', 11, 2, 12000, '2025-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(50) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `rent_per_day` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `model`, `rent_per_day`, `image`) VALUES
(8, 'BOSS', '2007', 100000, 'car3.jpeg'),
(9, 'Black Vigo', '2020', 5000, 'car1.jpeg'),
(10, 'V8 Parado', '2019', 7000, 'car2.jpeg'),
(11, 'Toyota Grande', '2022', 6000, 'car4.jpeg'),
(12, 'Jeep', '2008', 8000, 'cars_bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
