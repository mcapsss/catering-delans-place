-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `full_name`, `username`, `password`) 
VALUES
(13, 'Zeth Pineda', 'zeth', '202cb962ac59075b964b07152d234b70'),
(14, 'Karl Osua', 'karl', '202cb962ac59075b964b07152d234b70'),
(15, 'Marc Capilitan', 'marc', '202cb962ac59075b964b07152d234b70')
;

-- --------------------------------------------------------

--
-- Table structure for table `booking_record`
--

CREATE TABLE `booking_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `bookingdetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Lechon Belly', '3500.00', 1, '3500.00', '2021-05-26 04:26:05', 'Cancelled', 'Customer1', '09177777777', 'customer1@gmail.com', 'Basak'),
(2, 'Chopsuey', '180.00', 2, '360.00', '2021-05-26 04:31:22', 'Delivered', 'Customer2', '09199191874', 'customer2@gmail.com', 'Cebu'),
(3, 'Calamares', '180.00', 1, '180.00', '2021-05-26 05:03:58', 'Delivered', 'customer3', '0987456432', 'customer3@yahoo.com', 'IT Park'),
(4, 'Lechon (Medium)', '4500.00', 1, '4500.00', '2021-05-27 08:27:09', 'Delivered', 'customer4', '09177778217', 'customer4@gmail.com', 'Talisay');

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `eventType` varchar(255) NOT NULL,
  `eventLocation` varchar(255) NOT NULL,
  `eventDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`id`, `title`, `description`, `price`, `category_id`, `featured`, `active`, `image_name`) VALUES
(21, 'Lechon (Medium)', 'LechÃ³n is a pork dish in several regions of the world, most specifically in Spain and former Spanish colonial possessions throughout the world. LechÃ³n is a Spanish word referring to a roasted baby pig which was still fed by suckling its motherâ€™s milk.', '4500.00', 30, 'Yes', 'Yes', 'Food-Name-6896.jpg'),
(22, 'Lechon Belly', 'Lechon Belly', '3500.00', 29, 'Yes', 'Yes', 'Food-Name-2951.jpg'),
(23, 'Chopsuey', 'Vegetables!', '180.00', 29, 'Yes', 'Yes', 'Food-Name-700.jpg'),
(24, 'Calamares', 'Calamares', '180.00', 29, 'Yes', 'Yes', 'Food-Name-4394.jpg'),
(25, 'Lumpia', 'Lumpia', '180.00', 29, 'Yes', 'Yes', 'Food-Name-5357.jpg'),
(26, 'Spaghetti', 'Spag!', '180.00', 31, 'Yes', 'Yes', 'Food-Name-2174.jpg'),
(27, 'Beef Steak', 'Beef Steak', '180.00', 31, 'Yes', 'Yes', 'Food-Name-6802.jpg'),
(28, 'Baked Scallops', 'Scallops', '180.00', 30, 'Yes', 'Yes', 'Food-Name-4461.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_table`
--

CREATE TABLE `menu_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_table`
--

INSERT INTO `menu_table` (`id`, `title`, `image_name`, `featured`, `active`, `category`) VALUES
(29, 'Breakfast Meals ', 'Food_Category_932.jpg', 'Yes', 'Yes', ''),
(30, 'Favorites', 'Food_Category_846.jpg', 'Yes', 'Yes', ''),
(31, 'Hot', 'Food_Category_16.jpg', 'Yes', 'Yes', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_record`
--
ALTER TABLE `booking_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking_record`
--
ALTER TABLE `booking_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
