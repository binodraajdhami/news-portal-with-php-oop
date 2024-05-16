-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 12:01 PM
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
-- Database: `db_phpclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `rank`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`) VALUES
(52, 'Business', 1, 1, '2022-03-27 14:37:45', '2022-03-27 14:37:45', 'admin', 'admin'),
(56, 'Health', 2, 1, '2022-03-27 14:38:12', '2022-03-27 14:38:12', 'admin', 'admin'),
(57, 'Sport', 3, 1, '2022-03-27 14:38:03', '2022-03-27 14:38:03', 'admin', 'admin'),
(58, 'Entertainment', 7, 1, '2022-03-27 21:36:50', '2022-03-27 21:36:50', 'admin', 'admin'),
(59, 'Lifestyle', 4, 1, '2022-04-09 02:52:27', '2022-04-09 02:52:27', 'admin', 'admin'),
(60, 'Tours &amp; Travel', 909, 1, '2022-04-08 03:09:18', NULL, 'admin', NULL),
(61, 'Fashion', 45, 1, '2022-04-09 03:23:22', NULL, 'admin', NULL),
(62, 'Gadgets', 454, 1, '2022-04-09 03:24:47', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `comment_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `news_id`, `created_by`, `modified_by`, `comment_text`, `created_at`, `modified_at`, `status`) VALUES
(3, 35, 'admin', NULL, 'Duis ut sunt sed et ', '2024-05-16 11:51:39', NULL, 1),
(4, 35, 'user', NULL, 'comment from user', '2024-05-16 11:57:26', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `zone_id`, `name`) VALUES
(1, 1, 'Rupandhehi'),
(2, 1, 'Dang'),
(3, 2, 'Sunsari'),
(4, 2, 'Sangkhwasabga'),
(5, 2, 'Pachthar'),
(6, 3, 'Kathmandu'),
(7, 3, 'Lalitpur'),
(8, 3, 'Bhaktapur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `short_discription` text NOT NULL,
  `long_description` text NOT NULL,
  `feature_key` tinyint(1) NOT NULL DEFAULT 0,
  `feature_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `name`, `slug`, `category_id`, `short_discription`, `long_description`, `feature_key`, `feature_image`, `status`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(34, 'WordPress News Magazine Charts the Most Chic and Fashionable Women of New York City', 'wordpress-news-magazine-charts-the-most-chic-and-fashionable-women-of-new-york-city', 61, 'WordPress News Magazine Charts the Most Chic and Fashionable Women of New York City', '&lt;p&gt;We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family&rsquo;s small dining room for breakfast.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Refreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.&lt;/p&gt;', 1, '6250e1d59aa16_fashion.jpg', 1, 'admin', '2022-04-09 03:31:01', NULL, NULL),
(35, 'Headed over Lions Bridge and made our way to the Sofia Synagogue, then sheltered in the Central Market Hall until the recurrent (but short-lived) mid-afternoon rain passed.', 'headed-over-lions-bridge-and-made-our-way-to-the-sofia-synagogue,-then-sheltered-in-the-central-market-hall-until-the-recurrent-(but-short-lived)-mid-afternoon-rain-passed.', 61, 'Headed over Lions Bridge and made our way to the Sofia Synagogue, then sheltered in the Central Market Hall until the recurrent (but short-lived) mid-afternoon rain passed.', '&lt;p&gt;Headed over Lions Bridge and made our way to the Sofia Synagogue, then sheltered in the Central Market Hall until the recurrent (but short-lived) mid-afternoon rain passed. I had low expectations about Sofia as a city, but after the walking tour I absolutely loved the place. This was an easy city to navigate, and it was a beautiful city &ndash; despite its ugly, staunch and stolid communist-built surrounds. Sofia has a very average facade as you enter the city, but once you lose yourself in the old town area, everything changes.&lt;/p&gt;', 1, '6250e78cb6bbf_fashion2.jpg', 1, 'admin', '2022-04-09 03:55:24', NULL, NULL),
(36, 'Game Changing Virtual Reality Console Hits the Market', 'game-changing-virtual-reality-console-hits-the-market', 62, 'Game Changing Virtual Reality Console Hits the Market', '&lt;p&gt;We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family&rsquo;s small dining room for breakfast.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Refreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.&lt;/p&gt;', 1, '6250ef405419f_Gadtedss.jpg', 1, 'admin', '2022-04-09 04:28:16', NULL, NULL),
(37, 'Discover the Most Magical Sunset in Santorini', 'discover-the-most-magical-sunset-in-santorini', 60, 'Discover the Most Magical Sunset in Santorini', '&lt;p&gt;We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family&rsquo;s small dining room for breakfast.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Refreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.&lt;/p&gt;', 1, '6250efbac9f55_Travel.jpg', 1, 'admin', '2022-04-09 04:30:18', NULL, NULL),
(38, 'Entrepreneurial Advertising: The Future Of Marketing', 'entrepreneurial-advertising:-the-future-of-marketing', 59, 'Entrepreneurial Advertising: The Future Of Market', '&lt;p&gt;We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to our homestay family&rsquo;s small dining room for breakfast.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Refreshingly, what was expected of her was the same thing that was expected of Lara Stone: to take a beautiful picture.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We were making our way to the Rila Mountains, where we were visiting the Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and peppermint tea.&lt;/p&gt;', 1, '6250f08d2b35f_Life Style.jpg', 1, 'admin', '2022-04-09 04:33:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `username`, `password`, `role`, `status`, `image`, `last_login`) VALUES
(35, 'Admin', 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 1, NULL, '2022-03-26 00:24:22'),
(39, 'User', 'user@gmail.com', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE `tbl_zone` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`id`, `name`) VALUES
(1, 'Lumbini'),
(2, 'Koshi'),
(3, 'Bagmati'),
(6, 'Sagarmatha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
