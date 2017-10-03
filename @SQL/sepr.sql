-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 05:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepr`
--
CREATE DATABASE IF NOT EXISTS `sepr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sepr`;

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
  `id_Course` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `id_Course` int(11) DEFAULT NULL,
  `id_User` int(11) DEFAULT NULL,
  `Value` float DEFAULT NULL
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
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Michel.Dupont@fontys.nl', 1, 'Michel', 'Dupont', NULL),
(2, 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99', 'Zakia.Kazi-Aoul@fontys.nl', 2, 'Zakia', 'Kazi-Aoul', NULL),
(3, 'student', '5f4dcc3b5aa765d61d8327deb882cf99', 'Thierry.Henry@fontys.nl', 3, 'Thierry', 'Henry', NULL);

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
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
