-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2019 at 06:36 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydemoapp_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trading_account_number` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `open_trades` int(11) DEFAULT NULL,
  `close_trades` int(11) DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `surname`, `date_of_birth`, `phone_number`, `address`, `country`, `trading_account_number`, `balance`, `open_trades`, `close_trades`, `roles`, `password`) VALUES
(1, 'admin@example.com', 'Admin', 'Patel', '2010-05-23', '9016651271', 'Test Address', 'IN', '456789', 100, 5, 3, '["ROLE_SUPER_ADMIN","ROLE_ADMIN"]', '$2y$13$3tK62H2xeissztJ2EZ77leSjJJEXjrNoZrDWrmzNV5YNwxrF969SG'),
(3, 'user@example.com', 'Pintu', 'patel', '2014-01-03', '1234567894', 'Test Address', 'IN', '987456', 150, 6, 8, '["ROLE_ADMIN"]', '$2y$13$DZ4JgkCjUy8PAlgmE8TuiOCDZtxVnHKDOn9fyC1QAwCUzND9F5I3a'),
(4, 'client@example.com', 'Lalit', 'Patel', '2017-02-02', '1234567894', 'Test Address', 'IN', '654123', 140.5, 10, 1, '["ROLE_USER"]', '$2y$13$ODa8a8N..gFuKchd/4JgTuYoKjZHm5sVF2bZUvRn.Z8w9jFLFziZq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649489F7B00` (`trading_account_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
