-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 10:47 PM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`USER_ID` int(5) NOT NULL,
  `user_type` text NOT NULL,
  `username` text NOT NULL,
  `hash_algorithm` text NOT NULL,
  `salt` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `USER_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- INSERT User/Pass - douglas/fargo
--
INSERT INTO `users` (
	`USER_ID`,
	`user_type`,
	`username`,
	`hash_algorithm`,
	`salt`,
	`password`
) VALUES (
	1,
	'ADMIN',
	'douglas',
	'SHA256',
	'HjgawkNjtbanNZ8KBx3Er9xPRjHaGLCXSGExofDVQhBT1uGbK7kZSr+oC+RtZqnDN79XH228wxsJi8+R0gat/g==',
	'51bee9acdef40861896bfeb04cc3c6a3f0ba6392a2500e77e84949f3cea6526c'
);