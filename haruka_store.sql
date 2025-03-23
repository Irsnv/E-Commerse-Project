-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 01:14 AM
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
-- Database: `haruka_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Mirsnv', 'irsan123');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE `exhibitions` (
  `exhibition_id` int(11) NOT NULL,
  `exhibition_title` varchar(255) NOT NULL,
  `exhibition_location` varchar(255) NOT NULL,
  `exhibition_dates` varchar(255) NOT NULL,
  `exhibition_description` text NOT NULL,
  `exhibition_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category` enum('Furniture','Fine Art','Sculpture') NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` longblob DEFAULT NULL,
  `product_stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_category`, `product_description`, `product_image`, `product_stock`) VALUES
(1, 'Foshan Factory European Antique Leather Living Room Furniture Set', 883.30, 'Furniture', 'Style: Chesterfield SOFA\r\nBrand Name: AMG\r\nInner material: Solid Wood + Sponge + Spring', 0x63686169722e77656270, 3),
(2, 'Abstract Human Body', 1358.90, 'Sculpture', 'Brand: DIE\r\nColour: Silver\r\nMaterial	‎Resin\r\nSpecial Features: Unique design and unconventional materials (Bronze, Resin)', 0x706174756e672e6a7067, 1),
(5, 'Starry Night', 3952.77, 'Fine Art', 'The Starry Night, often called simply Starry Night, is an oil-on-canvas painting by the Dutch Post-Impressionist painter Vincent van Gogh, painted in June 1889.', 0x3133363470782d56616e5f476f67685f2d5f5374617272795f4e696768745f2d5f476f6f676c655f4172745f50726f6a6563742e6a7067, 1),
(7, 'The Potato Eaters', 1984.90, 'Fine Art', 'The Potato Eaters is an oil painting by Dutch artist Vincent van Gogh painted in April 1885 in Nuenen, Netherlands. It is in the Van Gogh Museum in Amsterdam.', 0x706f7461746f45617465722e6a706567, 1),
(8, 'Auguste Rodin, The Thinker, 1903', 18790.50, 'Sculpture', 'Attributed to works of Auguste Rodin in the late 19th and early 20th centuries.Although he portrayed the human figure reliably, respecting the canon of proportions.', 0x6d616e2d7468696e6b696e672e77656270, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`exhibition_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `exhibition_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
