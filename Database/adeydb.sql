-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 01:00 PM
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
-- Database: `adeydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `date_created`, `date_updated`) VALUES
(3, 23, '2024-05-29 15:17:38', '2024-05-29 15:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_code` varchar(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_code`, `category_name`) VALUES
(2, 'CHAIRS', 'Chairs'),
(3, 'DECOR', 'Decorations'),
(7, 'MAKP', 'Makeup'),
(10, 'VEKL', 'Vehicles'),
(12, 'TBEL', 'Table'),
(13, 'DRS', 'Dress'),
(14, 'SUT', 'Suit');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `address`, `gender`, `phone_number`, `id_number`, `photo`) VALUES
(23, 39, 'addis ababa', 'Female', '0912941275', '1212112', '43136879unnamed.png');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `category_code` varchar(120) NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `status` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `added_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `category_code`, `item_name`, `status`, `price`, `location`, `description`, `picture`, `added_by`) VALUES
(42, 'MAKP', 'Full Makeup', '1', 52000, 'Addis Ababa', 'Special FX Makeup/Bodypaint packages include the makeup look of your choice with any makeup, props or additional products (bald cap, fake nose, fake scar tissue, etc.) that will be needed to recreate the look.', '1680Natural-Makeup-Look-1.jpg', '38'),
(43, 'VEKL', 'Mercedes-Benz E-Class 2018', '1', 75000, 'Addis Ababa', 'Mercedes E class 2 door Convertible  CARAMEL color interior with Heatead and cold seats  AMG body kit AMG rim Blue top  3.0 V6 biturbo 362 hp ', '15729274.jpg', '38'),
(44, 'DECOR', 'Wedding Decor', '1', 25000, 'Addis Ababa', 'Features: Lifelike, full and soft petals, vibrant colors, durable Stem made of plastic with steel inside. You can bend and cut it to fit.', '5031_wedding_decor.jpg', '40'),
(45, 'DECOR', 'Dusty-Rose-Real', '1', 3000, 'Addis Ababa', 'Dusty-Rose-Real-Touch-Artificial-Silk-Rose-Bridal-Bouquet', '4283Dusty-Rose-Real-Touch-Artificial-Silk-Rose-Bridal-Bouquet.jpg', '40'),
(46, 'DECOR', 'IRON STND12 SET GOLD', '1', 5000, 'Addis Ababa', 'Stable & Sturdy - Made from iron for long-lasting durability. It\'s sturdy to hold any small to large size pots. With a drainage hole in the bottom, this pot is perfect for direct or indirect planting.', '7248IRON_STND12_SETGOLD.jpg', '40'),
(47, 'SUT', 'Full Suit ', '1', 5600, 'Addis Ababa', 'Get ready for an occasion to remember with this party-perfect tuxedo jacket from Antique Rogue. Pair with a crisp white dress shirt and bow tie for the ultimate party season suit.', '8116wedding-men-dress-png-1-11653296125xkpwdapzuw.png', '41'),
(48, 'DRS', 'Red Velo', '1', 10000, 'Addis Ababa', 'This wedding veil cape characterized by exqusite flower appliques, cathedral length. White and Ivory are also available. Perfect matched with your wedding dress', '160645.jpg', '41'),
(49, 'VEKL', 'Mercedes-Benz', '1', 75000, 'Addis Ababa', 'Mercedes-Benz, commonly referred to as Mercedes and sometimes as Benz, is a German luxury and commercial vehicle automotive brand established in 1926. Mercedes-Benz AG is headquartered in', '5443_mercedes_benz.jpg', '38');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`, `date_created`, `date_updated`) VALUES
(1, 'admin', '2020-10-22 22:49:31', '2020-10-22 22:49:31'),
(2, 'vendor', '2020-10-22 22:49:47', '2020-10-22 22:49:47'),
(3, 'customer', '2020-10-22 22:49:47', '2020-10-22 22:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date NOT NULL,
  `price` varchar(120) NOT NULL,
  `payment_proof` varchar(120) NOT NULL,
  `rental_status` varchar(50) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rental_id`, `customer_id`, `equipment_id`, `rental_date`, `return_date`, `price`, `payment_proof`, `rental_status`, `vendor_id`, `payment_status`) VALUES
(51, 23, 43, '2024-06-27', '2024-06-28', '75000', '', '6', 38, 'Pending'),
(52, 23, 43, '2024-06-27', '2024-06-28', '75000', '54485336bukti.jpg', '6', 38, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `rental_status` int(11) NOT NULL,
  `status_name` varchar(200) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`rental_status`, `status_name`, `date_created`, `date_updated`) VALUES
(0, 'Pending Payment', '2024-02-02', '2024-02-02'),
(1, 'Waiting for Confirmation', '2024-02-02', '2024-02-02'),
(2, 'Payment Confirmed', '2024-02-02', '2024-02-02'),
(3, 'Payment Rejected', '2024-02-02', '2024-02-02'),
(4, 'Not Picked Up', '2024-02-02', '2024-02-02'),
(5, 'Currently Rented', '2024-02-02', '2024-02-02'),
(6, 'Completed', '2024-02-02', '2024-02-02'),
(7, 'Canceled', '2024-02-02', '2024-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `username`, `password`, `name`, `email`, `date_created`, `profile_picture`) VALUES
(23, 1, 'boss', '$2y$10$iVSF.sTHDF2ZIjBIBGciwOxcPRbtLObHXOmsTXfDSab57741mzGIW', 'Boss', 'boos@gmil.com', '2024-05-29 15:17:38', '987_5846C.png'),
(38, 2, 'eden', '$2y$10$AUZazV1u2Ad9.p69g3fJmObU90O7p/IbucGKVflsYFsuXU3qQplT6', 'eden', 'eden1@gmail.com', '2024-06-26 08:09:47', '8689_5846C.png'),
(39, 3, 'hermi', '$2y$10$lPA9sSiA4uQH/04/bWv2LexuXAELVefdYilj156DdN.j11agkvhZa', 'Hermi', 'hermi@gmail.com', '2024-06-26 08:11:12', 'default.jpg'),
(40, 2, 'melat', '$2y$10$09RnSPU5Q/W5yBGaBWN2b.PwhyAd8SczMAuH5v7WWCKdRWOMaVG3q', 'Melat', 'melat@gmail.com', '2024-06-27 08:45:33', 'default.jpg'),
(41, 2, 'eyob', '$2y$10$ER1qBoOyOLm4sp5vF2u15.5OGqvLtj1klufdTmjiCD/1FT.w7xdhG', 'Eyob', 'eyob@gmail.com', '2024-06-27 09:21:52', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accountNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `user_id`, `accountNumber`) VALUES
(13, 38, 0),
(14, 40, 0),
(15, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_account`
--

CREATE TABLE `vendor_account` (
  `account_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `account_holder_name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_account`
--

INSERT INTO `vendor_account` (`account_id`, `vendor_id`, `bank_name`, `account_number`, `account_holder_name`, `date_created`) VALUES
(2, 13, 'Awash Bank2', '013200180001622', 'Eden Abebe2', '2024-06-26 08:09:48'),
(3, 14, 'Buna Bank', '01115858', 'Melat  Nigussa', '2024-06-27 08:45:33'),
(4, 15, 'Bank Of Abissinya', '6578512562', 'Eyob Mekonen', '2024-06-27 09:21:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_code_UNIQUE` (`category_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`rental_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_account`
--
ALTER TABLE `vendor_account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `rental_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendor_account`
--
ALTER TABLE `vendor_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vendor_account`
--
ALTER TABLE `vendor_account`
  ADD CONSTRAINT `vendor_account_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
