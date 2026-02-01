-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 06:14 AM
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
-- Database: `np02cs4a240051`
--
CREATE DATABASE IF NOT EXISTS `np02cs4a240051` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `np02cs4a240051`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `supplier`, `price`, `stock`, `created_at`) VALUES
(1, 'Rice Bag', 'Local Supplier', 25.50, 8, '2026-01-23 07:30:35'),
(2, 'Sugar Pack', 'ABC Traders', 15.00, 2, '2026-01-23 07:30:35'),
(3, 'Oil Can', 'XYZ Supplies', 60.00, 45, '2026-01-23 07:30:35'),
(4, 'Basmati Rice 25kg', 'Kalimati Suppliers', 3500.00, 0, '2026-01-26 03:01:08'),
(5, 'Jeera Masino Rice 25kg', 'Terai Agro', 4200.00, 27, '2026-01-26 03:01:08'),
(6, 'Mustard Oil (Sarso) 1L', 'Nepal Oil Mills', 420.00, 18, '2026-01-26 03:01:08'),
(7, 'Sunflower Oil 1L', 'Hulas Food', 390.00, 22, '2026-01-26 03:01:08'),
(8, 'Wai Wai Noodles (Carton)', 'CG Foods', 1650.00, 12, '2026-01-26 03:01:08'),
(9, 'Aashirvaad Atta 10kg', 'ITC Nepal', 980.00, 15, '2026-01-26 03:01:08'),
(10, 'Nepali Tea Leaves 500g', 'Ilam Tea Cooperative', 320.00, 25, '2026-01-26 03:01:08'),
(11, 'Masoor Dal 1kg', 'Local Wholesale', 210.00, 9, '2026-01-26 03:01:08'),
(12, 'Chana Dal 1kg', 'Local Wholesale', 195.00, 14, '2026-01-26 03:01:08'),
(13, 'Sugar 1kg', 'Birgunj Traders', 110.00, 35, '2026-01-26 03:01:08'),
(14, 'Salt (Tata) 1kg', 'Salt Trading Corp', 35.00, 60, '2026-01-26 03:01:08'),
(15, 'Milk Powder 1kg', 'DDC Nepal', 950.00, 8, '2026-01-26 03:01:08'),
(16, 'Buff Meat 1kg (Frozen)', 'Local Cold Store', 780.00, 6, '2026-01-26 03:01:08'),
(17, 'Chicken Feed 50kg', 'Shivam Feeds', 3200.00, 10, '2026-01-26 03:01:08'),
(18, 'LPG Gas Cylinder', 'Nepal Gas', 1900.00, 5, '2026-01-26 03:01:08'),
(19, 'Drinking Water Jar 20L', 'Himalayan Aqua', 60.00, 35, '2026-01-26 03:01:08'),
(20, 'Soap Bar (Lifebuoy)', 'Unilever Nepal', 45.00, 80, '2026-01-26 03:01:08'),
(21, 'Detergent Powder 1kg', 'Surya Nepal', 160.00, 27, '2026-01-26 03:01:08'),
(22, 'Biscuits (Digestive)', 'Britannia Nepal', 120.00, 20, '2026-01-26 03:01:08'),
(23, 'Cooking Ghee 1kg', 'Dabur Nepal', 850.00, 7, '2026-01-26 03:01:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
