-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2013 at 03:30 PM
-- Server version: 5.1.72-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbaprobi_p4`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `user_id` int(111) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `posts_post_id` int(11) NOT NULL,
  `DESC` varchar(255) NOT NULL,
  `followers_posts_id` varchar(255) NOT NULL,
  `fuel` decimal(10,2) NOT NULL,
  `travelers` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `miles` int(11) NOT NULL,
  `gas` float NOT NULL,
  `price` float NOT NULL,
  `submit` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `user_id_4` (`user_id`),
  KEY `user_id_5` (`user_id`),
  KEY `user_id_6` (`user_id`),
  KEY `user_id_7` (`user_id`),
  KEY `user_id_8` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `created`, `modified`, `user_id`, `content`, `posts_post_id`, `DESC`, `followers_posts_id`, `fuel`, `travelers`, `location`, `user`, `miles`, `gas`, `price`, `submit`, `add`, `field_name`, `value`) VALUES
(17, 1388076663, 1388076663, 10, 'Hello', 0, '', '', '0.00', '', '', '', 0, 0, 0, '', '', '', ''),
(18, 1388076671, 1388076671, 10, 'Love it', 0, '', '', '0.00', '', '', '', 0, 0, 0, '', '', '', ''),
(19, 1388077647, 1388077647, 10, 'test', 0, '', '', '0.00', '', '', '', 0, 0, 0, '', '', '', ''),
(20, 1388077823, 1388077823, 10, 'test', 0, '', '', '0.00', '', '', '', 0, 0, 0, '', '', '', ''),
(21, 1388078193, 1388078193, 10, '', 0, '', '', '22.00', '', '', '', 100, 17, 3.75, 'Submit Query', '', '', ''),
(22, 1388079352, 1388079352, 10, 'test222', 0, '', '', '0.00', 'JustMe', 'Homne', '', 0, 0, 0, '', '', '', ''),
(23, 1388080817, 1388080817, 12, '1', 0, '', '', '0.00', '1', '1', '', 0, 0, 0, '', '', '', ''),
(24, 1388082164, 1388082164, 17, 'g', 0, '', '', '0.00', 'g', 'g', '', 0, 0, 0, '', '', '', ''),
(25, 1388082289, 1388082289, 17, '', 0, '', '', '21.00', '', '', '', 100, 17, 3.5, 'Submit Query', '', '', ''),
(26, 1388082317, 1388082317, 17, 'paros', 0, '', '', '0.00', 'Dog', 'TestLocale', '', 0, 0, 0, '', '', '', ''),
(27, 1388083609, 1388083609, 14, 'd', 0, '', '', '0.00', 'd', 'd', '', 0, 0, 0, '', '', '', ''),
(28, 1388083964, 1388083964, 14, '12', 0, '', '', '0.00', '12', '12', '', 0, 0, 0, '', '', '', ''),
(29, 1388084046, 1388084046, 14, 'd', 0, '', '', '0.00', 'd', 'd', '', 0, 0, 0, '', '', '', ''),
(30, 1388085204, 1388085204, 14, '1', 0, '', '', '0.00', '3', '5', '', 0, 0, 0, '', '', '', ''),
(31, 1388086546, 1388086546, 14, '', 0, '', '', '15.00', '', '', '', 100, 25, 3.75, 'Submit Query', '', '', ''),
(32, 1388087105, 1388087105, 15, 'Test', 0, '', '', '0.00', 'Test', 'Test', '', 0, 0, 0, '', '', '', ''),
(33, 1388087121, 1388087121, 15, '', 0, '', '', '25.00', '', '', '', 100, 15, 3.75, 'Submit Query', '', '', ''),
(34, 1388088357, 1388088357, 14, 'testdetails', 0, '', '', '0.00', 'testtrave', 'testloc', '', 100, 24, 3.5, '', '', '', ''),
(35, 1388088522, 1388088522, 14, 'anotherdetail', 0, '', '', '21.00', 'anothertraveler', 'anotherlocal', '', 100, 17, 3.5, '', '', '', ''),
(36, 1388089207, 1388089207, 18, 'WENT HOME BEST TRIP EVER', 0, '', '', '3.00', 'ME MYSELF AND I', 'JANE DOE HOME', '', 50, 53, 3.29, '', '', '', ''),
(37, 1388089630, 1388089630, 14, 'ANOTHERDETRAIL2', 0, '', '', '22.06', 'ANOTHERTRAVE2', 'ANOTERLOC2', '', 100, 17, 3.75, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` mediumblob NOT NULL,
  `avatar_small` mediumblob NOT NULL,
  `avatar_medium` mediumblob NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `image` mediumblob NOT NULL,
  `retype` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `avatar`, `avatar_small`, `avatar_medium`, `recipient`, `image`, `retype`, `user`, `error`, `name`, `upload`) VALUES
(10, 1388076583, 0, '1a26baf37bc3922cd29fde3a8fba19fcd96d3489', 'bdfa17af457d2b00d09f7b0407102343453e60ac', 0, '', 'carly', 'adams', 'carlybelleadams@yahoo.com', 0x30, 0x30, 0x30, '', 0x30, '', '', '', '', ''),
(11, 1388079425, 0, '46bd016903e2bb47f4ce6a6dbe156690d5576f18', 'bdfa17af457d2b00d09f7b0407102343453e60ac', 0, '', 'Carly', 'Adams', 'carlybadams@yahoo.com', 0x30, 0x30, 0x30, '', 0x30, '', '', '', '', ''),
(12, 1388080031, 0, '9bb69c7bf7cfd189183ddbef2b1299e8116319ba', 'bdfa17af457d2b00d09f7b0407102343453e60ac', 0, '', 'Winter', 'Adams', 'winterbadams@yahoo.com', 0x30, 0x30, 0x30, '', 0x30, '', '', '', '', ''),
(13, 1388080459, 1388080459, '4d837e4d4d5c0c3210b97282608a1cc31aad484c', 'bdfa17af457d2b00d09f7b0407102343453e60ac', 0, 'America/New_York', 'Winter', 'Adams', 'winterblueadams@yahoo.com', 0x30, 0x30, 0x30, '', 0x30, '1111', '', '', '', ''),
(14, 1388081518, 1388081518, '40f543328bacda57d482266500e5917f8cbc1d6c', 'fc9bbfea9cc80e6afd19d951382e001cb0b5aaaf', 0, 'America/New_York', '1', '1', '1', 0x30, 0x30, 0x30, '', 0x30, '1', '', '', '', ''),
(15, 1388081546, 1388081546, '720b990abf3e533de000d5f57219101e459d9ab9', '11b883706fb3e0eb4fb995929c5765d7f44fccaf', 0, 'America/New_York', '2', '2', '2', 0x30, 0x30, 0x30, '', 0x30, '2', '', '', '', ''),
(16, 1388081762, 1388081762, '7893c4929cd52a13eb64228055259f18315da44b', '9a3542cf68975282bc0e6a64e6d583fb5a219028', 0, 'America/New_York', '5', '5', '5', 0x30, 0x30, 0x30, '', 0x30, '5', '', '', '', ''),
(17, 1388082109, 1388082109, '4b92012e6577a2af67c90d109c1a6c5d2c4b214c', '02c161f5848e7a24c5b2911f0e325bc7307e31af', 0, 'America/New_York', 'g', 'g', 'g', 0x30, 0x30, 0x30, '', 0x3137, 'g', '', '', '', ''),
(18, 1388089138, 1388089138, 'cd8c78760c0d21d47c23d0f9ee9e0e0a37c437ed', 'bdfa17af457d2b00d09f7b0407102343453e60ac', 0, 'America/New_York', 'JANE', 'DOE', 'INFO@CBAPROFESSIONALS.COM', '', '', '', '', '', '1111', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_followers`
--

CREATE TABLE IF NOT EXISTS `users_followers` (
  `follower_user_id` int(11) NOT NULL,
  `unfollow_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `users_followed` varchar(255) NOT NULL,
  `users_followers` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `following_user_id` int(11) NOT NULL,
  `users_followers_posts` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`created`),
  UNIQUE KEY `created` (`created`),
  KEY `follower_user_id` (`follower_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE IF NOT EXISTS `users_users` (
  `users_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK. Follower',
  `user_id_followed` int(11) NOT NULL COMMENT 'Followed',
  `users` varchar(255) NOT NULL,
  `connections` varchar(255) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`users_users_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`users_users_id`, `created`, `user_id`, `user_id_followed`, `users`, `connections`, `follower_id`, `user`) VALUES
(1, 1388076583, 10, 10, '', '', 0, ''),
(2, 1388079425, 11, 11, '', '', 0, ''),
(3, 1388080031, 12, 12, '', '', 0, ''),
(4, 1388080845, 12, 10, '', '', 0, ''),
(5, 1388080847, 12, 11, '', '', 0, ''),
(13, 1388087068, 15, 17, '', '', 0, ''),
(14, 1388087070, 15, 16, '', '', 0, ''),
(15, 1388087073, 15, 10, '', '', 0, ''),
(17, 1388089265, 18, 13, '', '', 0, ''),
(18, 1388089268, 18, 10, '', '', 0, ''),
(19, 1388089353, 14, 18, '', '', 0, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_users`
--
ALTER TABLE `users_users`
  ADD CONSTRAINT `users_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
