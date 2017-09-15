-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2012 at 07:26 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sepr`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message` varchar(250) NOT NULL,
  `author` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message`, `author`, `date`) VALUES
('Hello', 'Casper', '2012-11-08'),
('Yo people, I&#39;m back!', 'Henk', '2012-11-08'),
('Nice website!', 'anonymous', '2012-11-08'),
('Yep, nice website indeed, however, I think it is not very secure.', 'anonymous', '2012-11-08'),
('you wrote: <Yep, nice website indeed, however, I think it is not very secure.>\r\nYoure right, Ive tested for SQL injection and it works!', 'anonymous', '2012-11-08'),
('', 'Henk', '2012-11-08'),
('', 'anonymous', '2012-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Casper', '12345'),
('Henk', '123'),
('Kees', '12345'),
('Piet', '12345'),
('Karel', '12345'),
('Jaap', '12345'),
('Fred', '12345'),
('sad', ''),
('<script>alert(1', '<script>alert(1');
