-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 07:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daycaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `daycare`
--

CREATE TABLE `daycare` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `current_capacity` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `img_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daycare`
--

INSERT INTO `daycare` (`user_id`, `name`, `phone`, `location`, `current_capacity`, `email`, `user_password`, `fee`, `img_id`) VALUES
(1, 'Happy Kid', '01999888777', 'Gulshan', 12, '123abc@gmail.com', 'asdfgh', 2500, NULL),
(2, 'KidKid', '01704605452', 'Mogbazar', 7, 'abc@gg.com', '508df4cb2f4d8f805192', 1200, NULL),
(3, 'New Kid', '01333555777', 'Uttara', 7, 'new@gmail.com', '00557e06140a67150bb9f9f578a6cfec', 3000, NULL),
(4, 'My Kid', '0199988777', 'Uttara', 6, 'my@gmail.com', 'asdfgh', 1700, NULL),
(5, 'MyCare', '01234567890', 'Gulshan', 8, 'myemail@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28', 3000, NULL),
(6, 'SP care', '01768430650', 'Dhanmondi', 8, 'sp@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 2400, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_dir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_to` varchar(50) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `postId` int(11) NOT NULL,
  `dayCareName` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `u_ID` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `u_password` varchar(50) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`u_ID`, `user_name`, `email`, `location`, `phone`, `u_password`, `verified`, `token`) VALUES
(1, 'Md. Sayeed Abid', 'sayeed00abid@gmail.com', 'Mirpur', '01877665544', '4dd7f8096f5ca164cf5a4d86b14f962c', 0, '28e0fc9093c85abab2483ad0fc45a7228208641b5bce9eb2baaa5d59ce576ccbec028a997d9d9d2401cfc0daa87dbf48039a'),
(2, 'New Efaz', 'efitz2525@gmail.com', 'Rampura', '01777888999', '302134efac1d3119e5937a3e16a463b3', 0, '14a431e4ff7be3b19822f3cd7773d3e56f95a866ccce4a46c05a4a63986033df764a36116641b16595b7554c6070d17b9378'),
(3, 'Efaz123', 'efitz2525@gmail.com', 'Rampura', '01777888999', 'd41d8cd98f00b204e9800998ecf8427e', 0, 'bb25b3e6f29a20357c2ffa95be76ab3e9a8206e1a4eeee95ecd7fa2e563fb2dc8abfe5edadc004847f8d4813850b0f0bd47f'),
(4, 'Rusafa123', 'efitz2525@gmail.com', 'Diluroad', '01223344556', '4938270aead908842ce7fd412f650244', 0, '3af980a4525d47808a693df89a2b6f009477cba44b9a8f619ed737686af9cf7b579db9956fd6bd89ddecab7db567abaa1d50'),
(5, 'Sayeed Abid', 'sayeedabids@gmail.com', '12 Eskaton, Dhaka', '01704605452', '5cd507b686cc57846e79165e4a39854c', 0, 'c7e9a65b82e32ecded86718102569c90ae4d36f3090f1aea156a8fcfdbdf0401e2dd9e2853fd41b3fd6166b8f4cd41702dac');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `daycare` varchar(50) NOT NULL,
  `star` int(11) NOT NULL,
  `review` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daycare`
--
ALTER TABLE `daycare`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`u_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daycare`
--
ALTER TABLE `daycare`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `u_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daycare`
--
ALTER TABLE `daycare`
  ADD CONSTRAINT `daycare_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
