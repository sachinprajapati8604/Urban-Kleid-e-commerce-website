-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 08:43 AM
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
-- Database: `urbankleid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_mob` bigint(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_mob`, `admin_pass`, `created`) VALUES
(1, 'Sachin Prajapati', 'sp1@gmail.com', 8604980059, '123456', '2021-01-19 23:35:40'),
(25, 'Bullet Raja', 'br@gmail.com', 12346567890, '123456', '2021-01-21 01:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cu_id` int(10) NOT NULL,
  `cu_name` varchar(255) NOT NULL,
  `cu_email` varchar(255) NOT NULL,
  `cu_subject` varchar(255) NOT NULL,
  `cu_message` varchar(255) NOT NULL,
  `cu_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cu_id`, `cu_name`, `cu_email`, `cu_subject`, `cu_message`, `cu_created`) VALUES
(1, 'sachin', 'sp@gmail.com', 'need t shirt', 'give more products', '2021-01-06 21:34:32'),
(2, 'sp2', 'sp2@gmail.com', 'need more images', 'hello please provide more images', '2021-01-07 00:29:47'),
(3, 'Sachin Prajapati', 'sp@gmail.com', 'Need More', 'Give Image', '2021-01-07 00:43:09'),
(4, '', '', '', '', '2021-01-07 19:33:40'),
(5, 'Sachin Prajapati', 'cocvsstudy@gmail.com', 'good', 'hello', '2021-01-07 19:34:33'),
(6, 'Sachin Prajapati', 'cocvsstudy@gmail.com', 'Test', 'Php Test', '2021-01-07 19:43:48'),
(7, 'Sachin Prajapati', 'sp@gmail.com', 'good', 'good', '2021-01-07 19:50:59'),
(8, 'Sachin Prajapati', 'cocvsstudy@gmail.com', 'testing', 'testing gmail ', '2021-01-07 19:57:13'),
(59, '', '', '', '', '2021-01-15 23:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `hoodies`
--

CREATE TABLE `hoodies` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_shortdetail` varchar(255) NOT NULL,
  `pro_price` int(15) NOT NULL,
  `pro_bid_price` int(15) NOT NULL,
  `pro_imagename` varchar(255) NOT NULL,
  `imageType` varchar(200) NOT NULL,
  `vp_img2` varchar(200) NOT NULL,
  `vp_img3` varchar(200) NOT NULL,
  `vp_img4` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoodies`
--

INSERT INTO `hoodies` (`pro_id`, `pro_name`, `pro_shortdetail`, `pro_price`, `pro_bid_price`, `pro_imagename`, `imageType`, `vp_img2`, `vp_img3`, `vp_img4`, `created`) VALUES
(2001, 'Urban Hoodies 1', 'New Arrival\r\n', 1999, 5999, 'p4.jpg', '', 'p4_1.jpg', 'p4_2.jpg', '', '2021-01-03 23:07:33'),
(2002, 'Urban Hoodies 2', 'New Arrival', 2999, 6999, 'p6.jpg', '', 'p6_1.jpg', 'p6_2.jpg', 'p6_3.jpg', '2021-01-03 23:42:35'),
(2003, 'Urban Hoodies 3', '', 3999, 7999, 'p7.jpg', '', '', '', '', '2021-01-04 01:14:25'),
(2004, 'Urban Hoodies 4', '', 5999, 8999, 'p8.jpg', '', 'p8_1.jpg', '', '', '2021-01-04 01:14:25'),
(2006, 'Urban Hoodies 5', '', 3999, 6999, 'p13.png', '', 'p13_1.png', 'p13_2.png', 'p13_3.png', '2021-01-23 21:12:53'),
(2007, 'Urban Hoodies 6\r\n', '', 5999, 6999, 'p19.png', '', 'p19_1.png', 'p19_2.png', '', '2021-01-23 21:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `index_page`
--

CREATE TABLE `index_page` (
  `index_id` int(11) NOT NULL,
  `index_img` varchar(255) NOT NULL,
  `index_title` varchar(255) NOT NULL,
  `index_desc` longtext NOT NULL,
  `index_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_page`
--

INSERT INTO `index_page` (`index_id`, `index_img`, `index_title`, `index_desc`, `index_created`) VALUES
(1, 'banner1.jpg', '100% ORGANIC COTTON T-SHIRTS FOR MEN', 'optional hai ye', '2021-01-30 23:42:57'),
(2, 'banner2.jpg', 'WE STAND FOR LUXURY, QUALITY AND INTEGRITY', '', '2021-01-28 19:18:36'),
(3, 'banner2.jpg', 'URBAN', '40-60% OFF', '2021-01-28 15:35:50'),
(4, 'NEWPOST.jpg', 'EXPLORE Urban BRAND', 'THE BEST URBAN T-SHIRTS FOR SALE', '2021-01-28 16:26:11'),
(5, 'desktop-2.png', 'EXPLORE Urban BRAND', 'DISCOVER OUR PREMIUM COTTON LONG SLEEVE sweatshirts', '2021-01-28 16:26:11'),
(6, 'IMG_1107.jpg', 'DROP IT LIKE IT\'S HOT', 'We believe in the power of simple pleasures—like a classic T-shirt. Doing the right thing brings us joy. That’s why we source only 100% organic cotton, create handcrafted and durable garments, provide fair treatment for all of our farmers and workers, and give back to the world around us.\r\n\r\n', '2021-01-28 16:45:28'),
(7, 'slider2.jpg', 'COLLECTION\r\n', 'All of our organic cotton is sourced from premium spinning mills. The yarn is then sent to our partner factory, the fabric then goes through a premium dying process, ensuring all chemicals are azo-free and environmentally friendly.\r\n\r\n', '2021-01-28 18:11:49'),
(8, 'IMG_1194.jpg', 'QUALITY', 'Doing the right thing brings us joy. That’s why we source only 100% organic cotton to create durable and sustainable t-shirts, provide fair treatment for all of our farmers and workers, and donate a portion of profits to charities.\r\n\r\n', '2021-01-28 18:11:49'),
(9, 'IMG_1202.jpg', 'THE NEED OF LIFE WITH VIP STYLE', 'Super soft and refreshingly light, you have to experience our rich, organic cotton to believe it. We know that itâ€™s so important to feel comfortable and free in your high quality T-shirt, so weâ€™ve taken the time to source one of the finest natural fabrics available on the market.', '2021-01-28 23:41:21'),
(10, '', 'New Arrivals', 'We Provide You New Fasion Design .', '2021-01-28 23:28:35'),
(11, '', 'Top products', 'We Provide You New Fasion Design .', '2021-01-28 23:14:24'),
(12, '20', 'URBANKLEID20', 'GET INSTANT 20% DISCOUNT USE COUPON CODE\r\n', '2021-02-04 19:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `newproducts`
--

CREATE TABLE `newproducts` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_shortdetail` varchar(255) NOT NULL,
  `pro_price` int(15) NOT NULL,
  `pro_bid_price` int(15) NOT NULL,
  `pro_imagename` varchar(255) NOT NULL,
  `imageType` varchar(200) NOT NULL,
  `vp_img2` varchar(200) NOT NULL,
  `vp_img3` varchar(200) NOT NULL,
  `vp_img4` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newproducts`
--

INSERT INTO `newproducts` (`pro_id`, `pro_name`, `pro_shortdetail`, `pro_price`, `pro_bid_price`, `pro_imagename`, `imageType`, `vp_img2`, `vp_img3`, `vp_img4`, `created`) VALUES
(1, 'Urban T shirt 1', 'New Arrival\r\n', 1999, 5999, 'p1.jpg', '', '', '', '', '2021-01-03 23:07:33'),
(2, 'Urban  Tshirt-2', '', 1999, 4999, 'p2.jpg', 'image/jpeg', '', '', '', '2021-01-28 23:45:39'),
(3, 'Urban\'s T Shirt 3', 'Urban', 3999, 7999, 'p3.jpg', '', 'p3_1.jpg', '', '', '2021-01-04 01:14:25'),
(4, 'Urban\' T Shirt 4', '', 5999, 8999, 'p4.jpg', '', 'p4_1.jpg', 'p4_2.jpg', '', '2021-01-04 01:14:25'),
(5, 'Urban\'s Top Shirt', '', 5999, 9999, 'p5.jpg', '', 'p5_1.jpg', '', '', '2021-01-04 14:20:57'),
(6, 'Urban\'s Top Shirt', '', 5999, 9999, 'p6.jpg', '', 'p6_1.jpg', 'p6_2.jpg', '', '2021-01-04 14:20:57'),
(7, 'Urban\'s Top Shirt', '', 5999, 9999, 'p7.jpg', '', '', '', '', '2021-01-04 14:20:57'),
(8, 'Urban\'s Top Shirt', '', 5999, 9999, 'p8.jpg', '', 'p8_1.jpg', '', '', '2021-01-04 14:20:57'),
(9, 'Urban New Products', '', 1999, 3999, 'p9.jpg', '', 'p9_1.jpg', '', '', '2021-01-04 23:54:18'),
(10, 'Urban New Products', '', 1999, 3999, 'p10.png', '', 'p10_1.png', '', '', '2021-01-04 23:54:18'),
(11, 'Urban New Products', '', 1999, 3999, 'p11.png', '', 'p11_1.png', '', '', '2021-01-04 23:54:18'),
(12, 'Urban New Products', '', 1999, 3999, 'p12.png', '', 'p12_1.png', 'p12_2.png', 'p12_3.png', '2021-01-04 23:54:18'),
(13, 'Urban Newly', '', 2999, 4999, 'p13.png', '', 'p13_1.png', 'p13_2.png', 'p13_3.png', '2021-01-04 23:54:18'),
(14, 'Urban Newly', '', 2999, 4999, 'p14.png', '', 'p14_1.png', '', '', '2021-01-04 23:54:18'),
(15, 'Urban Newly', '', 2999, 4999, 'p15.png', '', 'p15_1.png', 'p15_2.png', '', '2021-01-04 23:56:10'),
(16, 'Urban\'s Top ', '', 3999, 6999, 'p16.png', '', 'p16_1.png', 'p16_2.png', 'p16_3.png', '2021-01-04 23:56:10'),
(17, 'Urban\'s Top', '', 4999, 6999, 'p17.png', '', 'p17_1.png', 'p17_2.png', '', '2021-01-04 23:57:40'),
(18, 'Urban\'s Top', '', 4999, 6999, 'p18.png\r\n', '', 'p18_1.png', 'p18_2.png', 'p18_2.png', '2021-01-04 23:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(10) NOT NULL,
  `sub_gmail` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `sub_gmail`, `created`) VALUES
(1, 'cocvsstudy@gmail.com', '2021-01-19 15:40:27'),
(2, 'java8604@gmail.com', '2021-01-19 16:13:52'),
(34, 'cocvsstudy@gmail.com', '2021-01-23 22:01:03'),
(39, 'bulletraja8604@gmail.com', '2021-01-23 22:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `sweatshirts`
--

CREATE TABLE `sweatshirts` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_shortdetail` varchar(255) NOT NULL,
  `pro_price` int(15) NOT NULL,
  `pro_bid_price` int(15) NOT NULL,
  `pro_imagename` varchar(255) NOT NULL,
  `imageType` varchar(200) NOT NULL,
  `vp_img2` varchar(200) NOT NULL,
  `vp_img3` varchar(200) NOT NULL,
  `vp_img4` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sweatshirts`
--

INSERT INTO `sweatshirts` (`pro_id`, `pro_name`, `pro_shortdetail`, `pro_price`, `pro_bid_price`, `pro_imagename`, `imageType`, `vp_img2`, `vp_img3`, `vp_img4`, `created`) VALUES
(3001, 'Urban sweatshirt 1', 'New Arrival\r\n', 1999, 5999, 'p5.jpg', '', 'p5_1.png', '', '', '2021-01-03 23:07:33'),
(3002, 'Urban\'s sweatshirt 2', 'New Arrival', 2999, 6999, 'p12.png', '', 'p12_1.png', 'p12_2.png', 'p12_3.png', '2021-01-03 23:42:35'),
(3003, 'Urban\'s sweatshirts 3', '', 3999, 7999, 'p18.png', '', 'p18_1.png', 'p18_2.png', 'p18_3.png', '2021-01-04 01:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE `transcations` (
  `sr` int(30) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `trans_userid` int(20) NOT NULL,
  `trans_cust_name` varchar(250) NOT NULL,
  `trans_cust_email` varchar(100) NOT NULL,
  `trans_prod_info` varchar(255) NOT NULL,
  `trans_image` varchar(255) NOT NULL,
  `trans_amount` int(30) NOT NULL,
  `trans_status` varchar(100) NOT NULL,
  `trans_address` varchar(255) NOT NULL,
  `trans_created` datetime NOT NULL DEFAULT current_timestamp(),
  `trans_track` longtext NOT NULL,
  `trans_track_id` longtext NOT NULL,
  `trans_track_created` datetime NOT NULL DEFAULT current_timestamp(),
  `trans_return_replace` varchar(255) NOT NULL,
  `trans_return_status` varchar(255) NOT NULL,
  `trans_return_reason` varchar(255) NOT NULL,
  `trans_return_reason_detail` longtext NOT NULL,
  `trans_return_created` datetime NOT NULL DEFAULT current_timestamp(),
  `trans_return_approve` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`sr`, `trans_id`, `trans_userid`, `trans_cust_name`, `trans_cust_email`, `trans_prod_info`, `trans_image`, `trans_amount`, `trans_status`, `trans_address`, `trans_created`, `trans_track`, `trans_track_id`, `trans_track_created`, `trans_return_replace`, `trans_return_status`, `trans_return_reason`, `trans_return_reason_detail`, `trans_return_created`, `trans_return_approve`) VALUES
(12, 'bdb6d4ff53de16d59d4e', 4, 'Sachin Prajapati', 'sp3@gmail.com', 'Urban\'s Tshirt 2,', 'p2.jpg', 2999, 'success', 'Sachin Prajapati , 8604980059 , SHIVA JI NAGAR , JHANSI , 284128 , UP , India', '2021-01-22 23:12:24', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(13, '60ed81c16972057ac3f2', 4, 'Sachin Prajapati', 'sp3@gmail.com', 'Urban T shirt 1,Urban\'s Tshirt 2,', 'p2.jpg', 7997, 'success', 'Sachin Prajapati , 8604980059 , SHIVA JI NAGAR , JHANSI , 284128 , UP , India', '2021-01-23 01:18:06', 'your order has been accepted', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(15, '0cd86b8f60d5604bcf4f', 10, 'Sachin P', 'sp10@gmail.com', 'Urban\'s Tshirt 2,', 'p2.jpg', 5998, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-23 13:05:10', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(16, 'c40e6bec8a7aac3bc626', 10, 'Sachin P', 'sp10@gmail.com', '[Urban\'s Tshirt 2, Size-XL,Quantity-4][Urban T shirt 1, Size-M,Quantity-2]', 'p1.jpg', 15994, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-23 13:48:02', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(17, '0cd86b8f60d5604bcf4f', 10, 'Sachin P', 'sp10@gmail.com', 'Urban\'s Tshirt 2,', 'p2.jpg', 5998, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-23 14:04:19', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(18, '0cd86b8f60d5604bcf4f', 10, 'Sachin P', 'sp10@gmail.com', 'Urban\'s Tshirt 2,', 'p2.jpg', 5998, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-23 14:05:14', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(19, '32cb9f1ba7d8856e09e0', 4, 'Sachin Prajapati', 'sp3@gmail.com', '[Urban\'s Tshirt 2, Size-S,Quantity-1]', 'p2.jpg', 2999, 'success', 'Sachin Prajapati , 8604980059 , SHIVA JI NAGAR , JHANSI , 284128 , UP , India', '2021-01-23 15:21:18', 'Your order has been accepted', '', '2021-02-02 22:47:01', '', 'completed', 'Different product delivered', 'i dont want', '2021-01-31 23:31:39', '2021-02-01 02:56:31'),
(20, '4390d5b7066deab3b92d', 4, 'Sachin Prajapati', 'sp3@gmail.com', '[Urban T shirt 1, Size-S,Quantity-1]', 'p1.jpg', 1999, 'success', 'Sachin Prajapati , 8604980059 , SHIVA JI NAGAR , JHANSI , 284128 , UP , India', '2021-01-23 15:50:12', '', '', '2021-02-02 22:47:01', '', 'completed', 'Different product delivered', 'nahi lena hai\r\n', '2021-02-01 02:24:12', '2021-02-01 02:47:10'),
(21, '14aaeb3af39f39e88d53', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban\' T Shirt 4, Size-S,Quantity-1]', 'p4.jpg', 5999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 17:26:52', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(22, '82ccf269c22a63a0e42d', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban\'s T Shirt 3, Size-S,Quantity-1]', 'p3.jpg', 3999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 17:31:31', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(23, '282e4aad5bad6fd33364', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban Newly, Size-S,Quantity-1]', 'p13.png', 2999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 17:41:16', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(24, '1545152f3fa0901258f6', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban\'s T Shirt 3, Size-S,Quantity-1]', 'p3.jpg', 3999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 17:50:01', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(25, '2507538db601ae3f0517', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban\'s Top Shirt, Size-S,Quantity-1]', 'p6.jpg', 5999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 18:10:00', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(26, '80c966f197cbedaf447d', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban\'s Top Shirt, Size-S,Quantity-1]', 'p5.jpg', 5999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 18:14:28', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(27, '3b6b460a877905d5f0f3', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban T shirt 1, Size-M,Quantity-2]', 'p1.jpg', 3998, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 19:45:41', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(28, 'a2e6e53151c00bf5ec5c', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban sweatshirt 1, Size-S,Quantity-1]', 'p5.jpg', 1999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 22:41:33', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(29, 'bffb447437c405b21dae', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban Hoodies 3, Size-XL,Quantity-1]', 'p7.jpg', 3999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 22:52:26', '', '', '2021-02-02 22:47:01', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(30, '9ed3e7c9d1a7ffa3d1d1', 11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '[Urban Hoodies 2, Size-S,Quantity-1]', 'p6.jpg', 2999, 'success', 'Sachin Prajapati , 8604980059 , Shivaji nagar , jhansi , 284128 , UP , India', '2021-01-23 23:46:50', ' Order Accepted ', '', '2021-02-03 00:14:39', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(31, 'f8c3ef208689f3b54bda', 10, 'Sachin P', 'sp10@gmail.com', '[Urban\'s Tshirt 2, Size-M,Quantity-1][Urban sweatshirt 1, Size-XL,Quantity-2][Urban Hoodies 2, Size-S,Quantity-2]', 'p6.jpg', 12995, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-24 00:08:53', ' Product Shipped   -> Product Delivered âœ… ', '99585jnjcj', '2021-02-03 00:38:50', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(32, 'd9686592cdae1df00f00', 10, 'Sachin P', 'sp10@gmail.com', '[Urban\' T Shirt 4, Size-S,Quantity-1]', 'p9.jpg', 5999, 'success', 'Sachin P , 8604980059 , Shivaji Nagar , Jhansi , 284128 , UP , India', '2021-01-24 00:36:46', ' Order Accepted  Product Shipped   -> Product Delivered ', '', '2021-02-03 00:33:19', '', '', '', '', '2021-01-31 14:00:32', '0000-00-00 00:00:00'),
(33, 'eb89d012259d582115d9', 4, 'Sachin Prajapati', 'sp3@gmail.com', '[Urban t shirt 8, Size-M,Quantity-1]', 'p15.png', 2549, 'success', 'Sachin Prajapati , 8604980059 , SHIVA JI NAGAR , JHANSI , 284128 , UP , India', '2021-02-03 01:05:24', ' -> Order Accepted ', '', '2021-02-03 01:17:51', 'REPLACE', 'yes', 'Product was defected', 'nahi lena hai', '2021-02-03 01:31:55', '2021-02-03 01:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `tshirt`
--

CREATE TABLE `tshirt` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_shortdetail` varchar(255) NOT NULL,
  `pro_price` int(15) NOT NULL,
  `pro_bid_price` int(15) NOT NULL,
  `pro_imagename` varchar(255) NOT NULL,
  `imageType` varchar(200) NOT NULL,
  `vp_img2` varchar(200) NOT NULL,
  `vp_img3` varchar(200) NOT NULL,
  `vp_img4` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tshirt`
--

INSERT INTO `tshirt` (`pro_id`, `pro_name`, `pro_shortdetail`, `pro_price`, `pro_bid_price`, `pro_imagename`, `imageType`, `vp_img2`, `vp_img3`, `vp_img4`, `created`) VALUES
(1001, 'UrbanT shirt 1', 'New Arrival\r\n', 1999, 5999, 'p1.jpg', '', '', '', '', '2021-01-03 23:07:33'),
(1002, 'Urban\'s Tshirt 2', 'New Arrival', 2999, 6999, 'p2.jpg', '', 'p2_1.jpg', 'p2_2.jpg', '', '2021-01-03 23:42:35'),
(1003, 'Urban\'s T Shirt 3', '', 3999, 7999, 'p3.jpg', '', 'p3_1.jpg', '', '', '2021-01-04 01:14:25'),
(1004, 'Urban\' T Shirt 4', '', 5999, 8999, 'p9.jpg', '', 'p9_1.jpg', '', '', '2021-01-04 01:14:25'),
(1005, 'Urban T shirt 5', '', 2999, 5999, 'p10.png', '', 'p10__.png', '', '', '2021-01-23 21:05:19'),
(1006, 'Urban t shirt 6', '', 2999, 5999, 'p11.png', '', 'p11_1.png', '', '', '2021-01-23 21:06:56'),
(1007, 'Urban T shirt 7', '', 2999, 5999, 'p14.png', '', 'p14_1.png', '', '', '2021-01-23 21:06:56'),
(1008, 'Urban t shirt 8', '', 2999, 5999, 'p15.png', '', 'p15_1.png', 'p15_2.png', '', '2021-01-23 21:08:32'),
(1009, 'Urban T shirt 9', '', 2999, 5999, 'p16.png', '', 'p16_1.png', 'p16_2.png', 'p16_3.png', '2021-01-23 21:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(150) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `mob_no`, `address`, `city`, `postal_code`, `state`, `country`, `created_at`) VALUES
(1, 'Test1', 'sp@gmail.com', '$2y$10$UXWPzxuCvxGNTigSCj3Fy.HSGHjwqGxN740EAeciYip5hbhlkvvQu', 12345678, 'Village and Post Kusumbhi', 'unnao', 209859, 'Uttar Pradesh', 'India', '2020-12-24 21:10:03'),
(2, 'Test2', 'sp1@gmail.com', '$2y$10$/rcQRc0DMev5ZB33htq5tOr73HE91Bdj.tglhiUSXxq.4YagDfSNC', 8604, 'Village and Post Kusumbhi', 'unnao', 209859, 'Uttar Pradesh', 'India', '2020-12-24 23:00:17'),
(3, 'Sachin Prajapati', 'sp2@gmail.com', '$2y$10$IxRxfumN.lvC2isN1WuyeebBq4iTaR/jzMFgDUfQgMIFbTNfWwTpC', 86040000, 'Village and Post Kusumbhi', 'kanpur', 209859, 'Uttar Pradesh', 'India', '2020-12-24 23:17:29'),
(4, 'Sachin Prajapati', 'sp3@gmail.com', '$2y$10$q/4jb5JvTtidgbCZqPgz8OobFVZG.AVvcFhwiLdplEcPrQDVqHfv2', 8604980059, 'SHIVA JI NAGAR', 'JHANSI', 284128, 'UP', 'India', '2020-12-25 23:54:14'),
(5, 'Bullet Raja', 'sp4@gmail.com', '$2y$10$Zo2qZdfYF/eBR4YZZr4KiOU4ELioQpZFR0Qfh8Q8.0FRIonnS5D3C', 8604, 'Village and Post Kusumbhi', 'unnao', 209859, 'Uttar Pradesh', 'India', '2021-01-07 00:26:18'),
(6, 'Sachin Prajapati', 'sp7@gmail.com', '$2y$10$80Gz0b/e2/ZtEVGAoUaKWelMZenRp8zVo2HwPuy6zLXyHjeyxItRS', 8604, 'Village and Post Kusumbhi', 'unnao', 209859, 'Uttar Pradesh', 'India', '2021-01-14 13:30:32'),
(7, 'Bullet Raja', 'br@gmail.com', '$2y$10$VNQPdG9/tXsdsO77g0na1e79JTfw.V3wQaR/S/BQ8ti834WW0WpyK', 8604980059, 'kvx', 'jhs', 203645, 'up', 'india', '2021-01-19 18:58:33'),
(8, 'Sachin Prajapati', 'sp5@gmail.com', '$2y$10$3KMYT1fQkGJltZTbsmhtU.O/jAy1x7pxN3KrQ/2xDo950bgVIJZnO', 0, '', '', 0, '', '', '2021-01-19 23:12:01'),
(9, 'Sachin Prajapati', 'sp6@gmail.com', '$2y$10$yI8onlV.5XDmtjIGe8C5gOTcON8LY5oylTHFGNl9RRT/sfqpAJHOK', 0, '', '', 0, '', '', '2021-01-20 12:54:13'),
(10, 'Sachin P', 'sp10@gmail.com', '$2y$10$Al2zUX0kLyudeuNnPXSgU.yqN9Zwx8Yvq6pjZS/3vsUwb27kev9fO', 8604980059, 'Shivaji Nagar', 'Jhansi', 284128, 'UP', 'India', '2021-01-23 12:05:29'),
(11, 'Sachin Prajapati', 'cocvsstudy@gmail.com', '$2y$10$lFXi0nS5zu7oJKbYD1ZhPeAF5Lezj9Msgmt5XJDxZzL7HQcc5Cujm', 8604980059, 'Shivaji nagar', 'jhansi', 284128, 'UP', 'India', '2021-01-23 17:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `viewproducts`
--

CREATE TABLE `viewproducts` (
  `vp_id` int(10) NOT NULL,
  `vp_imgid` int(10) NOT NULL,
  `vp_imgkey` int(10) NOT NULL,
  `vp_imgname` varchar(255) NOT NULL,
  `vp_img2` varchar(255) NOT NULL,
  `vp_img3` varchar(255) NOT NULL,
  `vp_img4` varchar(255) NOT NULL,
  `vp_img5` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewproducts`
--

INSERT INTO `viewproducts` (`vp_id`, `vp_imgid`, `vp_imgkey`, `vp_imgname`, `vp_img2`, `vp_img3`, `vp_img4`, `vp_img5`, `created`) VALUES
(1, 1, 0, 'p1.jpg', '', '', '', '', '0000-00-00 00:00:00'),
(2, 2, 1, 'p2.jpg', 'p2_1.jpg', 'p2_2.jpg', '', '', '2021-01-05 18:49:26'),
(3, 2, 2, 'p2_1.jpg', '', '', '', '', '2021-01-05 18:49:26'),
(4, 2, 3, 'p2_2.jpg', '', '', '', '', '2021-01-05 18:49:26'),
(5, 3, 1, 'p3.jpg', 'p3_1.jpg', '', '', '', '2021-01-05 19:04:46'),
(6, 3, 2, 'p3_1.jpg', '', '', '', '', '2021-01-05 19:04:46'),
(7, 4, 0, 'p4.jpg', 'p4_1.jpg', 'p4_2.jpg', '', '', '2021-01-05 20:15:51'),
(8, 4, 0, 'p4_1.jpg', '', '', '', '', '2021-01-05 20:15:51'),
(9, 4, 0, 'p4_2.jpg', '', '', '', '', '2021-01-05 20:15:51'),
(10, 5, 0, 'p5.jpg', 'p5_1.jpg', '', '', '', '2021-01-05 21:17:22'),
(11, 5, 0, 'p5_1.jpg', '', '', '', '', '2021-01-05 21:20:40'),
(12, 6, 0, 'p6.jpg', 'p6_1.jpg', 'p6_2.jpg', '', '', '2021-01-05 21:29:11'),
(13, 6, 0, 'p6_1.jpg', '', '', '', '', '2021-01-05 21:29:11'),
(14, 6, 0, 'p6_2.jpg', '', '', '', '', '2021-01-05 21:29:11'),
(15, 6, 0, 'p6_3.jpg', '', '', '', '', '2021-01-05 21:29:11'),
(16, 7, 0, 'p7.jpg', '', '', '', '', '2021-01-05 21:29:11'),
(17, 8, 0, 'p8.jpg', 'p8_1.jpg', '', '', '', '2021-01-05 21:29:11'),
(18, 9, 0, 'p9.jpg', 'p9_1.jpg', '', '', '', '2021-01-05 21:29:11'),
(19, 9, 0, 'p9_1.jpg', '', '', '', '', '2021-01-05 21:29:11'),
(20, 10, 0, 'p10.png', 'p10__1.png', '', '', '', '2021-01-05 21:29:11'),
(21, 10, 0, 'p10_1.png', '', '', '', '', '2021-01-05 21:29:11'),
(22, 11, 0, 'p11.png', 'p11_1.png', '', '', '', '2021-01-05 21:29:11'),
(23, 11, 0, 'p11_1.png', '', '', '', '', '2021-01-05 21:29:11'),
(24, 12, 0, 'p12.png', 'p12_1.png', 'p12_2.png', 'p12_3.png', '', '2021-01-05 21:29:11'),
(25, 12, 0, 'p12_1.png', '', '', '', '', '2021-01-05 21:29:11'),
(26, 12, 0, 'p12_2.png', '', '', '', '', '2021-01-05 21:29:11'),
(27, 12, 0, 'p12_3.png', '', '', '', '', '2021-01-05 21:29:11'),
(28, 13, 0, 'p13.png', 'p13_1.png', 'p13_2.png', 'p13_3.png', '', '2021-01-05 21:29:11'),
(29, 13, 0, 'p13_1.png', '', '', '', '', '2021-01-05 21:29:11'),
(30, 13, 0, 'p13_2.png', '', '', '', '', '2021-01-05 21:29:11'),
(31, 13, 0, 'p13_3.png', '', '', '', '', '2021-01-05 21:29:11'),
(32, 13, 0, 'p13_4.png', '', '', '', '', '2021-01-05 21:29:11'),
(33, 14, 0, 'p14.png', 'p14_1.png', '', '', '', '2021-01-05 21:30:38'),
(34, 14, 0, 'p14_1.png', '', '', '', '', '2021-01-05 21:30:38'),
(35, 15, 0, 'p15.png', 'p15_1.png', 'p15_2.png', '', '', '2021-01-05 21:36:26'),
(36, 15, 0, 'p15_1.png', '', '', '', '', '2021-01-05 21:36:26'),
(37, 15, 0, 'p15_2.png', '', '', '', '', '2021-01-05 21:36:26'),
(38, 16, 0, 'p16.png', 'p16_1.png', 'p16_2.png', 'p16_3.png', '', '2021-01-05 21:36:26'),
(39, 16, 0, 'p16_1.png', '', '', '', '', '2021-01-05 21:36:26'),
(40, 16, 0, 'p16_2.png', '', '', '', '', '2021-01-05 21:36:26'),
(41, 16, 0, 'p16_3.png', '', '', '', '', '2021-01-05 21:36:26'),
(42, 16, 0, 'p16_4.png', '', '', '', '', '2021-01-05 21:36:26'),
(43, 17, 0, 'p17.png', 'p17_1.png', 'p17_2.png', '', '', '2021-01-05 21:36:26'),
(44, 17, 0, 'p17_1.png', '', '', '', '', '2021-01-05 21:36:26'),
(45, 17, 0, 'p17_2.png', '', '', '', '', '2021-01-05 21:36:26'),
(46, 18, 0, 'p18.png', 'p18_1.png', 'p18_2.png', 'p18_3.png', '', '2021-01-05 21:36:26'),
(47, 18, 0, 'p18_1.png', '', '', '', '', '2021-01-05 21:36:26'),
(48, 18, 0, 'p18_2.png', '', '', '', '', '2021-01-05 21:36:26'),
(49, 18, 0, 'p18_3.png', '', '', '', '', '2021-01-05 21:36:26'),
(50, 18, 0, 'p18_4.png', '', '', '', '', '2021-01-05 21:36:26'),
(51, 19, 0, 'p19.png', 'p19_1.png', 'p19_2.png', '', '', '2021-01-05 21:37:47'),
(52, 19, 0, 'p19_1.png', '', '', '', '', '2021-01-05 21:37:47'),
(53, 19, 0, 'p19_2.png', '', '', '', '', '2021-01-05 21:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `hoodies`
--
ALTER TABLE `hoodies`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `index_page`
--
ALTER TABLE `index_page`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `newproducts`
--
ALTER TABLE `newproducts`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `sweatshirts`
--
ALTER TABLE `sweatshirts`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `transcations`
--
ALTER TABLE `transcations`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `tshirt`
--
ALTER TABLE `tshirt`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewproducts`
--
ALTER TABLE `viewproducts`
  ADD PRIMARY KEY (`vp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `hoodies`
--
ALTER TABLE `hoodies`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;

--
-- AUTO_INCREMENT for table `index_page`
--
ALTER TABLE `index_page`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newproducts`
--
ALTER TABLE `newproducts`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sweatshirts`
--
ALTER TABLE `sweatshirts`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3007;

--
-- AUTO_INCREMENT for table `transcations`
--
ALTER TABLE `transcations`
  MODIFY `sr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tshirt`
--
ALTER TABLE `tshirt`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `viewproducts`
--
ALTER TABLE `viewproducts`
  MODIFY `vp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
