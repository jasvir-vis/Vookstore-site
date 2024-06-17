-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 07:42 AM
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
-- Database: `vookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `second_add` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `first_name`, `last_name`, `username`, `email`, `address`, `second_add`, `country`, `state`, `zip`) VALUES
(1, 'Jasvir ', 'singh ', 'Jasvir_singh 17', 'jasvishal123@gmail.com', 'house no. 46 , ward no. 33  ', '', 'united america', 'california', '525555');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `off` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `off`, `description`, `topic`, `category`, `image`) VALUES
(1, 'The Psychology of Money', 'Morgan housal', 275, '25', 'Timeless lessons on wealth, greed, and happiness doing well with money isn?t necessarily about what you know. It?s about how you behave. And behavior is hard to teach, even to really smart people. How to manage money, invest it, and make business decision', 'Motivational', 'buisness', '61-hMfd7NGL._SY466_.jpg'),
(2, 'The inventions', 'Nikola tesla', 99, '34', 'Reveals Tesla\'s fascinating vision for wireless power transmission and other groundbreaking concepts\r\nA captivating and inspiring read for science enthusiasts, inventors, and admirers of Nikola Tesla\'s genius\r\n', 'Magazine', 'biography', 'th.jpeg'),
(3, 'General knowledge english', 'ritesh kumar', 350, '21', 'General knowledge is information that has been accumulated over time through various media and sources.[1] It excludes specialized learning that can only be obtained with extensive training and information confined to a single medium. General knowledge is', 'Competative', 'regional', 'gk1.webp'),
(4, 'Time management', 'Dr. Sudhir Dixit', 140, '53', 'Time Management is a handy reference to managing time efficiently and competently. The author includes thirty principles which will enable readers to plan their day and organize their work better. This book is essential for those who want to learn how to ', 'Motivational', 'Self-help', 'time-management-original-imagfvk27fjdrakc.webp'),
(5, 'rich dad poor dad', 'Robert t-kiyosaki', 260, '45', 'Rich Dad Poor Dad is Robert\'s story of growing up with two dads — his real father and the father of his best friend, his \"rich dad\" — and the ways in which both men shaped his thoughts about money and investing.', 'Motivational', 'buisness', 'rich.webp'),
(6, 'Something I Never Told You', 'Bhinder sharya', 200, '20', '\nWhen in love, you tend to take each other for granted, and sometimes, that can cost you a lifetime of togetherness . . . Ronnie knew that his first crush was way out of his league, and yet he pursued and wooed Adira. Shyly and from a distance in the beg', 'Romance', 'Young adult', 'something-i-never-told-you-original-imag9ffkagwngwgv.webp'),
(7, 'Two indian girls', 'Kinshuk Kumar', 202, '32', 'Khushbu and Amrita are best friends forever', 'Fiction', 'crime and thriller', 'two-indian-girls-original-imaga58grurnu9fa.webp');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback`) VALUES
(1, 'jasvir singh', 'jasvishal123@gmail.com', 'Good website for selling books,delivery proccess is realy fast.Quality wise much better. thanks vookstore for this site.'),
(2, 'vishal', 'vishalsingh@gmail.com', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '),
(3, 'arsh preet', 'arshpreet34@gmail.com', 'Relevant details about who the author is and where they stand in the genre or field of inquiry. ...');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `title`, `email`, `quantity`, `price`, `image`, `status`) VALUES
(454213, 'The Psychology of Money', 'jasvishal123@gmail.com', 1, 275, '61-hMfd7NGL._SY466_.jpg', 1),
(958756, 'The Psychology of Money', 'jasvishal123@gmail.com', 3, 275, '61-hMfd7NGL._SY466_.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `mobile` int(12) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `email`, `password`, `mobile`, `profile`, `otp`, `resettoken`, `resettokenexpire`, `dob`, `gender`) VALUES
(1, 'Jasvir singh', 'jasvishal123@gmail.com', 'jasvir12', 895621398, 'michael-d-rnKqWvO80Y4-unsplash.jpg', 6160214, NULL, NULL, '2002-08-24', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
