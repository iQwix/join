-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2019 at 05:28 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `join_devilz`
--

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `username`, `text`, `date`) VALUES
(1, '???????', 'dsfgfd', '2019-03-03 16:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `fortnite-team`
--

CREATE TABLE `fortnite-team` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Epic-ID` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Kills` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Wins` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-K/D` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overwatch-team`
--

CREATE TABLE `overwatch-team` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Battle/PS4/xBox/ID` varchar(250) CHARACTER SET utf8 NOT NULL,
  `your-sr` int(100) NOT NULL,
  `your-level` int(5) NOT NULL,
  `your-main` varchar(250) CHARACTER SET utf8 NOT NULL,
  `platform` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmer`
--

CREATE TABLE `programmer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r6s-team`
--

CREATE TABLE `r6s-team` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Steam/Uplay/PS4/xBox-ID` varchar(250) CHARACTER SET utf8 NOT NULL,
  `your-rank` varchar(250) CHARACTER SET utf8 NOT NULL,
  `your-level` int(100) NOT NULL,
  `platform` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `age` int(5) NOT NULL,
  `phone` int(20) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `Joinas` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rocket-league-team`
--

CREATE TABLE `rocket-league-team` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Steam/PS4/xBox-ID` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Level` varchar(11) CHARACTER SET utf8 NOT NULL,
  `Platform` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Rank-in-1v1-Solo-Duel` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Rank-in-2v2-Doubles` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Rank-in-3v3-Standard` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Your-Rank-in-3v3-Solo-Standard` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `status`, `date`) VALUES
(1, 'test', '123123', 'Owner', 'programmer', '2019-03-03 23:24:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fortnite-team`
--
ALTER TABLE `fortnite-team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overwatch-team`
--
ALTER TABLE `overwatch-team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmer`
--
ALTER TABLE `programmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r6s-team`
--
ALTER TABLE `r6s-team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rocket-league-team`
--
ALTER TABLE `rocket-league-team`
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
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fortnite-team`
--
ALTER TABLE `fortnite-team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `overwatch-team`
--
ALTER TABLE `overwatch-team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programmer`
--
ALTER TABLE `programmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r6s-team`
--
ALTER TABLE `r6s-team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rocket-league-team`
--
ALTER TABLE `rocket-league-team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
