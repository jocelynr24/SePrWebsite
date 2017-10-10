-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: studmysql01.fhict.local
-- Generation Time: Oct 10, 2017 at 07:47 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbi398507`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description_short` text,
  `description_long` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description_short`, `description_long`) VALUES
(1, 'Quality Principle', 'This course is about to redact an essay', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>'),
(2, 'Secure Programming', 'This course is about to hack the government', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>'),
(3, 'Service Oriented Techniques', 'This course is about creating services', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>'),
(4, 'IT operations', 'This course is about IT operations', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>'),
(5, 'Android', 'This course is about programming on Android devices', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>'),
(6, 'Business Economics', 'This course is about business economics', '<p>Morbi aliquet id turpis id ornare. Donec nec mi nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id enim tortor. Vestibulum nec enim pellentesque, malesuada erat vel, ornare metus. Donec metus nulla, vulputate vel arcu non, blandit elementum nisi. Integer semper, nunc pharetra iaculis dapibus, metus quam blandit ligula, non dignissim neque est non mi.</p>\r\n\r\n<p>Donec sapien elit, faucibus sit amet porttitor quis, convallis ac velit. In velit nibh, euismod in lacinia ut, ornare nec lectus. Donec imperdiet dolor eu mollis pretium. Mauris congue maximus nulla lobortis sollicitudin. Morbi fermentum faucibus nulla non porta. Phasellus accumsan sodales nibh, in maximus libero consectetur id. Sed elit sem, sagittis id leo ut, volutpat elementum lacus.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id_User` int(11) NOT NULL,
  `id_Course` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `firstname` char(20) DEFAULT NULL,
  `lastname` char(20) DEFAULT NULL,
  `picture_name` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`, `firstname`, `lastname`, `picture_name`) VALUES
(1, 'recoveryaccount', 'e3f66746721aac8015934fcc5ffd4cdd', NULL, 1, NULL, NULL, NULL),
(2, 'moulinj', '052b904fbaf7fa578af4ebeaecf11354', 'Jean.Moulin@fontys.nl', 1, 'Jean', 'Moulin', NULL),
(3, 'henryt', '166f852f8751bb71e2dd0a3beed24f00', 'Thierry.Henry@fontys.nl', 2, 'Thierry', 'Henry', NULL),
(4, 'raquilm', '9947dc3c1ad037ae3e164ad3b81c517e', 'Marc.Raquil@student.fontys.nl', 3, 'Marc', 'Raquil', NULL),
(5, 'thillmanel', '9947dc3c1ad037ae3e164ad3b81c517e', 'Laury.Thillmane@fontys.nl', 1, 'Laury', 'Thillmane', NULL),
(6, 'franka', '91a5bd179cf381ed111a22de7de8731a', 'Anne.Frank@fontys.nl', 2, 'Anne', 'Frank', NULL),
(7, 'jacqueta', 'dd2864685ae2eb88d6dfe3fa6ae5ebec', 'Aimé.Jacquet@student.fontys.nl', 3, 'Aimé', 'Jacquet', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_grade`
--

CREATE TABLE `user_has_grade` (
  `id_User` int(11) NOT NULL,
  `id_Grade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id_User`,`id_Course`),
  ADD KEY `id_Course` (`id_Course`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_grade`
--
ALTER TABLE `user_has_grade`
  ADD PRIMARY KEY (`id_User`,`id_Grade`),
  ADD KEY `id_Grade` (`id_Grade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
