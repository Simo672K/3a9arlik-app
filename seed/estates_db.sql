-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 05:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estates_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE DATABASE IF NOT EXISTS estates_db;
USE estates_db;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_added` DATE DEFAULT (current_date())

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_added`) VALUES
(1, 'Appartement', '2023-05-22'),
(2, 'Villa', '2023-05-22'),
(3, 'Boutique', '2023-05-22'),
(4, 'Bureau', '2023-05-22'),
(5, 'Terrain', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_country` varchar(50) NOT NULL,
  `city_added` date NOT NULL DEFAULT (current_date())

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_country`, `city_added`) VALUES
(1, 'Nador', 'Maroc', '2023-05-22'),
(2, 'Oujda', 'Maroc', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_user_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_addresse` varchar(255) NOT NULL,
  `post_coordinates` varchar(255) NOT NULL,
  `post_price` int(11) NOT NULL,
  `post_images` varchar(500) DEFAULT NULL,
  `post_views` int(11) DEFAULT 0,
  `post_city_id` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_type` enum('Louer','Acheter') DEFAULT NULL,
  `post_added` datetime DEFAULT (current_timestamp())

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_id`, `post_title`, `post_description`, `post_addresse`, `post_coordinates`, `post_price`, `post_images`, `post_views`, `post_city_id`, `post_category_id`, `post_type`, `post_added`) VALUES
(3, 4, 'Appartemant à nador RC', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'NAdor El-matar, Secteur 4, immeuble Ezzarktonie', '[35.1467927247625,-2.9126483201980595]', 5500, '[\"I6E0ePt8DWaSVy2TjNv1lOguZhdGAx59f_-CFzMw7YcXrbopRmsKi3JBkQLH4Uqnapropos-img.jpg\",\"dFGSOTL2inZpJ-jHacPo51rus8q4_VNgMfhl0KtXxEYIAbRD63zye7UQWkmwBCv9swiper-1.jpg\",\"efU5dJ0Y2bFEWan-NzTKvqu4ROMHSxyrhLkD_1mAg6lGP3Zw7QBIcVjsoi9CXp8tswiper-2.jpg\"]', 2, 1, 1, 'Louer', '2023-05-23 22:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_added` date NOT NULL DEFAULT (current_date())

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_added`) VALUES
(4, 'Mohammed Hakmi', 'mohammed.hakmi@gmail.com', '0677661723', '$2y$10$PlnehbUNrbdTHq1xdwZxOejNF6LJ1qNAgvaK5yIbM1TPa8aj.rMVO', '2023-05-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_user_id` (`post_user_id`),
  ADD KEY `post_city_id` (`post_city_id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
