-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 23, 2025 at 05:23 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Smartbite`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `ph_no` varchar(11) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `username`, `ph_no`, `password`) VALUES
(42, 'admin', 'admin', '1234567890', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `title`, `image_name`, `featured`, `active`) VALUES
(48, 'Burger', 'food_category_996.jpeg', 'yes', 'yes'),
(49, 'Shakes', 'food_category_146.jpeg', 'yes', 'yes'),
(50, 'Biriyani', 'food_category_279.jpeg', 'yes', 'yes'),
(51, 'Sandwich', 'food_category_254.jpeg', 'no', 'yes'),
(52, 'Snacks', 'food_category_539.jpeg', 'no', 'yes'),
(53, 'Ice creams', 'food_category_804.jpeg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_order`
--

CREATE TABLE `tbl_event_order` (
  `id` int(10) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `food_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `quantity` int(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `title`, `description`, `price`, `image_name`, `category_id`, `quantity`, `featured`, `active`) VALUES
(1, 'Chicken Burger ', 'Chrispy chicken,Chedder Cheese,onion & Tomatoes ', '300.00', 'food-name-6079.jpeg', 48, 3, 'yes', 'yes'),
(2, 'Chocolate Sandwich   ', 'Made by Toasting Bread stuffed with dark chocolate.!!', '100.00', 'food-name-7336.jpeg', 51, 1, 'yes', 'yes'),
(3, 'Oreo Shake  ', 'creamy Oreo milkshake made with Vanila Icecream  ', '100.00', 'food-name-884.jpeg', 49, 18, 'yes', 'yes'),
(4, 'Chicken Biriyani', 'Aromatic, Delicious & Spicy one pot Chicken Biriyani', '140.00', 'food-name-8231.jpeg', 50, 3, 'yes', 'yes'),
(5, 'Mango Shake  ', 'Made with fresh mangoes, perfect summer dirnk!!  ', '80.00', 'food-name-226.jpeg', 49, 22, 'yes', 'yes'),
(6, 'Onion Burger  ', 'Fried onions with a little Hamburger meet and a bun \r\n\r\n\r\n.\r\n\r\n ', '90.00', 'food-name-4146.jpeg', 48, 10, 'yes', 'yes'),
(7, 'BBQ burger', 'The BEST bacon BBQ burger with Crispy Onion strings', '100.00', 'food-name-8467.jpeg', 48, 15, 'yes', 'yes'),
(8, 'Egg Puffs', 'Crunchy puffs filled with boiled egg.', '20.00', 'food-name-5565.jpeg', 52, 25, 'yes', 'yes'),
(9, 'Pista Ice Cream  ', 'Flavoursome dessert made with ice cream & pistachios  ', '50.00', 'food-name-1200.jpeg', 53, 75, 'yes', 'yes'),
(10, 'Samosa  ', 'A chrispy and spicy deep fired snack  ', '15.00', 'food-name-4739.jpeg', 52, 35, 'no', 'yes'),
(11, 'Egg Biriyani', 'One pot delicious egg biriyani made with rice, boiled egg', '110.00', 'food-name-5637.jpeg', 50, 15, 'no', 'yes'),
(12, 'Club Sandwich', 'toasted bread layered with ham,bacon,lettuse and mayo.', '50.00', 'food-name-4182.jpeg', 51, 30, 'no', 'yes'),
(13, 'Banana Ice Cream', 'frozen desert made blended with ice cream and banana', '35.00', 'food-name-6320.jpeg', 53, 30, 'no', 'yes'),
(14, 'Chocolate Shake', 'Rich Creamy Milkshake made with Chocolate', '50.00', 'food-name-1077.jpeg', 49, 35, 'no', 'yes'),
(15, 'Veg Biriyani', 'an Aromatic Rice biriani made with mix veggies.', '100.00', 'food-name-3845.jpeg', 50, 23, 'no', 'yes'),
(16, 'Grilled Sandwich ', 'Made with cucumbers, tomatoes, onions,butter. ', '40.00', 'food-name-5032.jpeg', 51, 22, 'no', 'yes'),
(17, 'Meat Roll ', 'Mess free Pancake roll stuffed with delightful mix of meat', '18.00', 'food-name-7648.jpeg', 52, 20, 'no', 'yes'),
(18, 'Blueberry Ice Cream  ', ' frozen desert made blended with ice cream and blueberries\r\n ', '45.00', 'food-name-6848.jpeg', 53, 30, 'no', 'yes'),
(19, 'Cheese  Burger ', 'A ham-burger with a slice of melted cheese on top', '170.00', 'food-name-9438.jpeg', 48, 30, 'no', 'yes'),
(20, 'Straberry Shake  ', 'Rich Creamy Milkshake made with Straberry\r\n  ', '60.00', 'food-name-6223.jpeg', 49, 50, 'no', 'yes'),
(21, 'FIsh Biriyani', 'A simple hyderabadi style fish dum biriyani', '120.00', 'food-name-9093.jpeg', 50, 43, 'no', 'yes'),
(22, 'Halloumi Sandwich  ', 'Halloumi Sandwich, deliciously simple recipe  ', '60.00', 'food-name-656.jpeg', 51, 30, 'no', 'yes'),
(23, 'Cream Bun', 'flat bun surface filled with cream on the inside', '10.00', 'food-name-7815.jpeg', 52, 26, 'no', 'yes'),
(24, 'Mango Ice cream', 'frozen desert made blended with ice cream and Mango', '35.00', 'food-name-446.jpeg', 53, 30, 'no', 'yes'),
(25, 'Turkey Burger', 'A patty made of ground turkey in a burger', '60.00', 'food-name-7720.jpeg', 48, 30, 'no', 'yes'),
(26, 'Peanut Butter Shake', 'Rich Creamy Milkshake made with PeanutButter', '120.00', 'food-name-6367.jpeg', 49, 30, 'no', 'yes'),
(27, 'Prawn Biriyani', 'Aromatic basmati rice cooked with prawns', '100.00', 'food-name-4002.jpeg', 50, 30, 'no', 'yes'),
(28, 'Veg Sandwich', 'A simple mixed vegetable sandwich  for brakfast', '80.00', 'food-name-6962.jpeg', 51, 30, 'no', 'yes'),
(29, 'Cutlet', 'tasty and delicious cutlet made with chicken', '20.00', 'food-name-473.jpeg', 52, 20, 'no', 'yes'),
(30, 'Cookies Ice cream', 'frozen desert made blended with ice cream and Cookies', '40.00', 'food-name-6277.jpeg', 53, 38, 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `ph_no` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_event_order`
--
ALTER TABLE `tbl_event_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_event_order`
--
ALTER TABLE `tbl_event_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
