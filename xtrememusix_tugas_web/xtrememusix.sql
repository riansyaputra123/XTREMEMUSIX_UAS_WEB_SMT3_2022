-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xtrememusix`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `nama`) VALUES
(44, 'Andra & The Backbone'),
(45, 'Sheila On 7'),
(46, 'Bill Withers'),
(47, 'Lil Nas X'),
(48, 'Keisya Levronka'),
(49, 'Andra &  The Backbone'),
(50, 'Stephen Sanchez'),
(51, 'Andmesh'),
(52, 'Kesya Levronka'),
(53, 'Fiersa Besari'),
(54, 'Budi Doremi'),
(55, 'Twice'),
(56, 'Shaun'),
(57, 'Blackpink'),
(58, 'Wanna.B (워너비)'),
(59, 'Oasis'),
(60, 'One Direction'),
(61, 'The Chainsmokers'),
(62, 'Glass Animals'),
(63, 'Virgoun'),
(64, 'Song So Hee'),
(65, 'Neckdeep'),
(66, 'Green Day'),
(67, 'Queen'),
(68, 'Gun N Roses'),
(69, 'Avenged');

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id_lagu` int(11) NOT NULL,
  `id_artist` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id_lagu`, `id_artist`, `judul`, `genre`, `cover`, `waktu`) VALUES
(37, 46, 'Just the Two of Us', 'R&B', 'bill.jpg', '11/14/22  12:25:29'),
(38, 45, 'Mudah Saja', 'Pop', 'Mono.jpg', '11/14/22  12:49:49'),
(39, 47, 'That What I Want', 'Pop', 'lilnas.jpg', '11/14/22  14:00:13'),
(41, 49, 'Sempurna', 'Rock', 'sempurna.jpg', '11/14/22  15:51:25'),
(42, 50, 'Until I Found You', 'Indie', 'sanchez.jpg', '11/14/22  15:52:18'),
(43, 51, 'Andaikan Kau Datang', 'Classic', 'andmesh.jpg', '11/14/22  15:54:17'),
(44, 52, 'Tak Ingin Usai', 'Pop', 'kesya.jpeg', '11/14/22  15:55:27'),
(45, 53, 'Pelukku Untuk Pelikmu', 'Pop', 'fiersa.jpg', '11/14/22  15:56:21'),
(46, 54, 'Mesin Waktu', 'Pop', 'mesin.jpg', '11/14/22  15:57:08'),
(47, 55, 'Likely', 'Electronics', 'likely.jpg', '11/14/22  16:01:51'),
(49, 57, 'Boombayah', 'Techno', 'blk.png', '11/14/22  16:04:23'),
(50, 58, 'Why? (왜요?)', 'Pop', 'bob.jpg', '11/14/22  16:09:49'),
(51, 56, 'Way Back Home', 'Jazz', 'shoundesip.jpg', '11/14/22  16:15:50'),
(52, 59, 'Dont Look Back In Anger', 'Rock', 'oasissss.jpg', '11/14/22  16:47:06'),
(53, 60, 'Strong', 'Pop', 'oness.jpg', '11/14/22  16:47:40'),
(54, 61, 'All We Know', 'EDM', 'mokers.jpg', '11/14/22  16:53:33'),
(55, 62, 'Heat Waves', 'R&B', 'heat.jpg', '11/14/22  16:56:07'),
(56, 63, 'Duka', 'Pop Rock', 'Virgounduka.jpg', '11/14/22  16:58:32'),
(57, 64, 'Spring Day', 'Jazz', 'day.jpg', '11/14/22  17:00:32'),
(58, 65, 'Wish You Were Here', 'Art Rock', 'neckkk.jpg', '11/14/22  17:02:45'),
(59, 48, 'Tak Ingin Usai', 'Pop', 'levv.jpeg', '11/14/22  17:05:26'),
(60, 66, 'American Idiot', 'Rock', 'green.png', '11/14/22  17:06:50'),
(61, 67, 'Bohemian Rhapsody', 'Art Rock', 'sody.jpg', '11/14/22  17:10:07'),
(62, 68, 'Sweet Child O mine ', 'Punk', 'gun.jpg', '11/14/22  17:12:37'),
(63, 69, 'Sevenfold', 'Art Rock', 'venged.jpg', '11/14/22  17:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `lagu_playlist`
--

CREATE TABLE `lagu_playlist` (
  `id_lagu_pl` int(11) NOT NULL,
  `id_playlist` int(11) NOT NULL,
  `id_lagu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lagu_playlist`
--

INSERT INTO `lagu_playlist` (`id_lagu_pl`, `id_playlist`, `id_lagu`) VALUES
(12, 1, 37),
(13, 1, 38),
(14, 5, 39),
(18, 7, 39),
(19, 7, 39),
(20, 8, 39),
(21, 1, 41),
(22, 1, 42),
(23, 2, 43),
(25, 2, 45),
(26, 2, 46),
(27, 3, 47),
(29, 3, 49),
(30, 3, 50),
(31, 3, 51),
(32, 5, 52),
(33, 5, 53),
(34, 5, 54),
(35, 4, 55),
(36, 4, 56),
(37, 4, 57),
(38, 4, 58),
(39, 2, 44),
(40, 6, 60),
(41, 6, 61),
(42, 6, 62),
(43, 6, 63),
(46, 10, 62),
(47, 10, 63),
(48, 10, 39),
(49, 10, 63),
(52, 10, 58),
(53, 10, 63),
(54, 10, 60),
(55, 10, 61),
(56, 10, 62),
(57, 10, 63),
(62, 7, 60),
(63, 7, 61),
(64, 7, 62),
(65, 7, 63),
(66, 7, 54);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_playlist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `id_user`, `nama_playlist`) VALUES
(1, 13, 'Popular Now'),
(2, 13, 'Top Indonesian'),
(3, 13, 'Best K-Pop'),
(4, 13, 'Sad Song'),
(5, 13, 'Recommended For Today'),
(6, 13, '#ThrowbackThursday'),
(7, 14, 'Favorite'),
(8, 15, 'Favorite'),
(9, 16, 'Favorite'),
(10, 17, 'Favorite');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `priv` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `priv`) VALUES
(12, 'bejo', '$2y$10$b3wX2w1d.rCsut13U2GcG.afM3DCHp7gHKoBrzGkx3RFU9lUm1ofS', 'user'),
(13, 'admin', '$2y$10$fNaLbcV6tUpzBGW8O4YweOy1auGjK8ZB2/QLpS8Lzw2ewsEgEV.xu', 'admin'),
(14, 'user', '$2y$10$SMR1/9IVGM35GODzQQS2wOWhj/iHoDfNaUOYZE5rK6H9mY4kB7LbS', 'user'),
(15, 'petot', '$2y$10$WhU6owsgv0Nlb.ob1ZC3eeZVGWgrb39HygyTmqhbF1NCki1mrbv1W', 'user'),
(16, 'udin', '$2y$10$1BExebC3kI.SDRHaoglA9uqg4pbXiN5TPyGSV5Y58y0CrYfk5TkAS', 'user'),
(17, 'riangans', '$2y$10$Ie8pC7SXs8bUhVwYOjfgCufrQwsqtDCot1T2tqevjknkJHlTacTwy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id_lagu`),
  ADD KEY `id_artist` (`id_artist`);

--
-- Indexes for table `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  ADD PRIMARY KEY (`id_lagu_pl`),
  ADD KEY `id_lagu` (`id_lagu`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `playlist_ibfk_1` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id_lagu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  MODIFY `id_lagu_pl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lagu`
--
ALTER TABLE `lagu`
  ADD CONSTRAINT `lagu_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lagu_playlist`
--
ALTER TABLE `lagu_playlist`
  ADD CONSTRAINT `lagu_playlist_ibfk_1` FOREIGN KEY (`id_lagu`) REFERENCES `lagu` (`id_lagu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lagu_playlist_ibfk_2` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id_playlist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
