-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 01:41 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, '', ''),
(2, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `note` varchar(500) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `caterings`
--

CREATE TABLE `caterings` (
  `id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caterings`
--

INSERT INTO `caterings` (`id`, `item_name`, `image`, `price`, `description`) VALUES
(1, 'Salad', 'em61427c0d353a55.62096762.jpg', '25', 'Beef, Chicken caesar, lattice, cucumber.\r\nCalories- 430   '),
(2, 'Chicken Curry', 'em61427cccd6c879.86895569.jpg', '30', 'Butter Chicken, Calories- 370\r\nRoasted Chicken, Calories- 300\r\n'),
(3, 'Tortillas/ Naan', 'em61427db706ac92.87737461.jpg', '12', 'Garlic naan, Calories-200\r\nTortillas, Calories- 180 '),
(4, 'Sandwiches', 'em61427e835e4dc0.29775227.jpg', '15', 'Veg Sandwich, Calories- 150\r\nGrilled Sanwich, Calories- 200'),
(5, 'Sushi', 'em61427ffe859778.13962432.jpg', '20', 'Cooked Rice flavoured with vinegar, variety of vegetables, egg, or raw seafood\r\nCalories- 250'),
(6, 'Italian', 'em6142814b019f86.11879480.jpg', '25', 'Classic and mildly spicy with chopped vegetables and cheese\r\nCalories- 285'),
(7, 'Chinese', 'em61428256e98ee0.24884460.jpg', '30', 'Momos- Stuffed with meat, beans, baby corn Calories- 380\r\nNoodles-Made with  Chopped vegetables Calories- 400'),
(8, 'Deserts', 'em614282ce01a566.44330315.jpg', '45', 'Butter Scotch Pudding with Coco chips Calories- 400\r\nChocolate Pudding Calories- 450 '),
(9, 'Cakes', 'em614283c8950233.94222354.jpg', '35', 'Red Velvet Cake- Calories- 410\r\nChocolate cake- Calories- 450');

-- --------------------------------------------------------

--
-- Table structure for table `catering_bookings`
--

CREATE TABLE `catering_bookings` (
  `id` int(11) NOT NULL,
  `caterings_id` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `num_dishes` varchar(20) NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `noofpeople` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `price`, `description`, `image`, `location`, `noofpeople`, `duration`) VALUES
(12, 'Wedding Event', '1500', 'Classic, Garden, Glamorous, Vintage', ',em6142617ca498c4.04420219.jpeg,em6142617ca66c53.45983761.jpg', 'The Forest and Stream Club', '30', '20'),
(13, 'Balcony Picnic', '350', 'Balcony picnic includes blankets, Pillows Napkins, Plates, Flowers, Customized Picnic table', ',em61426326725617.98986465.jpeg,em6142632672aac5.35498336.jpg,em6142632672f912.70032410.jpg', 'Hotel Birks Montreal', '4', '4'),
(14, 'Baby Shower', '250', 'White and Blue Arch Garland with Customized cake and flowers', ',em614265ec97e0d8.66540752.jpg,em614265ecc1a396.01470811.jpg', 'Plaza Antique', '20', '5'),
(15, 'Birthday Party', '350', 'Happy Birthday Alphabets, Colourful balloons decor, Frills and cake. Make the party more fun. At your place.', ',em61426d43753365.50916777.jpeg,em61426d437edbe4.96432778.jpg', 'Quebec', '30', '24'),
(16, 'Reunion ', '800', 'An outdoor event with a large dining table, Wine glasses, Champagne, Music, Candles.', ',em61426fd5642fd5.07174752.jpg,em61426fd5649ee6.48059688.jpg', 'Mount Royal Park', '25', '24'),
(17, 'Beach Site Picnic', '300', 'Blankets, Pillows, Picnic table, Bluetooth Speaker, Flowers, Basket', ',em6142718fe05e29.34070265.jpeg,em6142718fe0f2e6.43314237.jpg', 'Oka Beach ', '8', '24'),
(18, 'Floral Wedding Decor', '1700', 'Pink, baby pink, and white flowers with lightning lamps and white chairs.', ',em614275aabd9e33.47560250.jpg,em614275aabdf757.67898573.jpeg', 'Le Windsor', '45', '24'),
(20, 'Proposal Package', '700', 'A castle made with lights, Heart made with red roses, Candlelit pathway, Balloons Covered Ceiling, Large Bouquet.', ',em61427788ba8124.03470078.jpg,em61427788bad607.91213390.jpg', 'Holiday Inn', '20', '24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `emailid`, `phone`, `address`, `password`) VALUES
(1, 'sample', 'sample@gmail.com', '9177040577', 'sample', 'sample');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `caterings`
--
ALTER TABLE `caterings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catering_bookings`
--
ALTER TABLE `catering_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caterings`
--
ALTER TABLE `caterings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `catering_bookings`
--
ALTER TABLE `catering_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
