-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 01:19 PM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(255) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `genres` varchar(2000) NOT NULL,
  `overview` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `genres`, `overview`) VALUES
(557, 'Title:\nSpider-Man', 'Genres:\nAction,Science Fiction', 'Overview:\nAfter being bitten by a genetically altered spider at Oscorp, nerdy but endearing high school student Peter Parker is endowed with amazing powers to become the superhero known as Spider-Man.'),
(8358, 'Title:\nCast Away', 'Genres:\nAdventure,Drama', 'Overview:\nChuck Nolan, a top international manager for FedEx, and Kelly, a Ph.D. student, are in love and heading towards marriage. Then Chuck\'s plane to Malaysia crashes at sea during a terrible storm. He\'s the only survivor, and finds himself marooned on a desolate island. With no way to escape, Chuck must find ways to survive in his new home.'),
(225914, 'Title:\nSpider-Man', 'Genres:\nScience Fiction,Action,Crime,TV Movie', 'Overview:\nWhen an extortionist threatens to force a multi-suicide unless a huge ransom is paid, only Peter Parker can stop him with his new powers as Spider-Man.'),
(689249, 'Title:\nMoney Heist: The Phenomenon', 'Genres:\nDocumentary', 'Overview:\nA documentary on why \'Money Heist\' sparked a wave of enthusiasm around the world for a lovable group of thieves and their professor.'),
(836872, 'Title:\nHomeland', 'Genres:\nDrama', 'Overview:\nWhat if, at the end of World War II, an economic crisis had spread to every nation, including those that had not directly taken part in hostilities?'),
(1101886, 'Title:\nHELLO', 'Genres:\nDrama', 'Overview:\nThrough a haze of smoke, coke, and booze; possible futures, pasts, and presents coalesce chaos inside the mind of a man drifting directionless through life. When your future calls, what will you have to say?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101887;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
