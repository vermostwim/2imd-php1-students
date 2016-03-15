-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2016 at 09:56 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `IMD`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `post` varchar(140) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
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
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;