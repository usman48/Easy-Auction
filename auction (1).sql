-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 04:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `bid_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_by` int(11) NOT NULL,
  `new_id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `bid_by`, `post_id`, `post_by`, `new_id_product`) VALUES
(1, 8, 3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `quantity`, `user_id`, `status`) VALUES
(1, 1, 1, 4, 1),
(2, 1, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_fimages`
--

CREATE TABLE `customer_fimages` (
  `id` int(11) NOT NULL,
  `upload_by` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_fimages`
--

INSERT INTO `customer_fimages` (`id`, `upload_by`, `image`, `post_id`) VALUES
(1, 4, 'note102.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_needs`
--

CREATE TABLE `customer_needs` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `upload_date` varchar(20) NOT NULL,
  `upload_by` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `product_model` varchar(20) NOT NULL,
  `product_company` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_needs`
--

INSERT INTO `customer_needs` (`product_id`, `product_name`, `product_description`, `product_price`, `upload_date`, `upload_by`, `category`, `product_model`, `product_company`, `quantity`, `location`, `status`, `date`) VALUES
(1, 'Samsung Note 10', 'New Boxed Packed', '115,000', '01-Nov-2019', '4', 'mobiles', 'Note 10', 'Samsung', '1', 'Gujrat', 1, '2019-11-01 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_uploads`
--

CREATE TABLE `customer_uploads` (
  `upload_id` int(11) NOT NULL,
  `upload_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_uploads`
--

INSERT INTO `customer_uploads` (`upload_id`, `upload_by`, `post_id`, `image`) VALUES
(1, 4, 1, 'note1021.jpg'),
(2, 4, 1, 'note1022.jpg'),
(3, 4, 1, 'note1023.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `featured_images`
--

CREATE TABLE `featured_images` (
  `id` int(11) NOT NULL,
  `upload_by` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_images`
--

INSERT INTO `featured_images` (`id`, `upload_by`, `image`, `post_id`) VALUES
(1, 2, 'iphone5.jpg', 1),
(2, 2, 'p301.jpg', 2),
(3, 2, 'g7.jpg', 3),
(4, 8, 'p30.jpg', 4),
(5, 8, 'g71.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `order_time` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `upload_date` varchar(20) NOT NULL,
  `upload_by` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `product_model` varchar(20) NOT NULL,
  `product_company` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `product_condition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `upload_date`, `upload_by`, `category`, `product_model`, `product_company`, `quantity`, `location`, `status`, `product_condition`) VALUES
(1, 'Iphone 5', 'Used\r\n', '12,000', '01-Nov-2019', '2', 'mobiles', 'Iphone 5', 'Apple', 2, 'Gujrat', 1, ''),
(3, 'LG G7', 'Used', '35,000', '01-Nov-2019', '2', 'mobiles', 'G7', 'LG', 1, 'Gujrat', 1, ''),
(4, 'P30 Pro', 'New Boxed Packed', '95,000', '01-Nov-2019', '8', 'mobiles', 'p30 Pro', 'Huawie', 1, 'Gujrat', 1, ''),
(5, 'er43rrr', '', '56', '01-Nov-2019', '8', 'mobiles', '434334', 'Huawie', 0, '543334444', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `reported_items`
--

CREATE TABLE `reported_items` (
  `ID` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reported_date` varchar(20) NOT NULL,
  `comments` varchar(150) NOT NULL,
  `item_type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_comments`
--

CREATE TABLE `seller_comments` (
  `id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_on` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sold_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `upload_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `upload_by`, `post_id`, `image`) VALUES
(1, 2, 1, 'iphone515.jpg'),
(2, 2, 1, 'iphone516.jpg'),
(3, 2, 1, 'iphone517.jpg'),
(4, 2, 1, 'iphone518.jpg'),
(5, 2, 2, 'p3012.jpg'),
(6, 2, 2, 'p3013.jpg'),
(7, 2, 2, 'p3014.jpg'),
(8, 2, 3, 'g74.jpg'),
(9, 2, 3, 'g75.jpg'),
(10, 2, 3, 'g76.jpg'),
(11, 8, 4, 'p3015.jpg'),
(12, 8, 4, 'p3016.jpg'),
(13, 8, 4, 'p3017.jpg'),
(14, 8, 4, 'p3018.jpg'),
(15, 8, 4, 'p3019.jpg'),
(16, 8, 4, 'p3020.jpg'),
(17, 8, 5, 'g711.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `fullname`, `email`, `password`, `user_img`, `usertype`, `status`, `reg_date`, `user_address`, `user_phone`) VALUES
(2, 'Razi Ahmed Iqbal', 'razi@gmail.com', '12345678', 'user1.jpg', '2', 1, '2019-09-17', 'Gujrat hh', '03167228161'),
(3, 'Muhammad Usman', 'usmanamjad076@gmail.com', '12345678', 'usman.jpg', '1', 1, '2019-09-18', 'Machhiana', '03167228162'),
(4, 'Umer Malik', 'malik@gmail.com', '12345678', 'user4.jpg', '3', 1, '2019-09-18', '', ''),
(8, 'Shahzada Danial', 'dani@gmail.com', '12345678', 'user.jpg', '2', 1, '2019-10-31', '', ''),
(9, 'Shahzaib', 'shahzaib@gmail.com', '12345678', 'user1.jpg', '3', 1, '2019-11-01', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_fimages`
--
ALTER TABLE `customer_fimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_needs`
--
ALTER TABLE `customer_needs`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `customer_uploads`
--
ALTER TABLE `customer_uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `featured_images`
--
ALTER TABLE `featured_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reported_items`
--
ALTER TABLE `reported_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seller_comments`
--
ALTER TABLE `seller_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_fimages`
--
ALTER TABLE `customer_fimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_needs`
--
ALTER TABLE `customer_needs`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_uploads`
--
ALTER TABLE `customer_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured_images`
--
ALTER TABLE `featured_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reported_items`
--
ALTER TABLE `reported_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_comments`
--
ALTER TABLE `seller_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
