-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 09:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `ems_category`
--

CREATE TABLE `ems_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ems_category`
--

INSERT INTO `ems_category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Music', 1),
(2, 'Video', 1),
(3, 'News', 1),
(4, 'Gist', 1),
(5, 'news Gist', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ems_event`
--

CREATE TABLE `ems_event` (
  `event_id` int(11) NOT NULL,
  `event_title` text NOT NULL,
  `event_author` int(11) DEFAULT NULL,
  `event_color` varchar(15) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_has_Post` tinyint(1) NOT NULL,
  `event_status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ems_event`
--

INSERT INTO `ems_event` (`event_id`, `event_title`, `event_author`, `event_color`, `event_date`, `event_has_Post`, `event_status`) VALUES
(1, 'bashhhhhh', NULL, '#008000', '2018-03-20 00:00:00', 0, 1),
(2, 'fdaf', NULL, '#FF0000', '2018-03-21 00:00:00', 0, 0),
(3, 'sDFde', NULL, '#FFD700', '2018-03-22 00:00:00', 0, 0),
(4, 'Just too bad', NULL, '#008000', '2018-03-08 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_post`
--

CREATE TABLE `ems_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL DEFAULT 'Untitled',
  `post_content` text NOT NULL,
  `post_image` varchar(70) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_tags` varchar(100) DEFAULT NULL,
  `post_permalink` varchar(100) NOT NULL,
  `post_date_created` datetime NOT NULL,
  `post_date_scheduled` datetime NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_post`
--

INSERT INTO `ems_post` (`post_id`, `post_title`, `post_content`, `post_image`, `post_author`, `post_category`, `post_tags`, `post_permalink`, `post_date_created`, `post_date_scheduled`, `post_comment_count`, `post_status`) VALUES
(1, 'this title', '', '', 0, 0, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'this title', 'this is the content of the post', '', 0, 0, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'this title', 'this is the content of the post', '', 1, 0, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '2018-03-08 01:03:22', '0000-00-00 00:00:00', 0, 0),
(9, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '2018-03-08 02:03:48', '2018-05-29 12:05:00', 0, 0),
(11, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '2018-03-08 02:03:45', '2018-05-29 12:05:00', 10, 0),
(12, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '2018-03-08 02:03:08', '2018-05-29 12:05:00', 10, 0),
(13, 'this title', 'this is the content of the post', '', 1, 2, NULL, '', '2018-03-08 02:03:39', '2018-05-29 12:05:00', 10, 1),
(14, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:41', '2018-05-29 12:05:00', 10, 0),
(15, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:47', '2018-05-29 12:05:00', 10, 0),
(16, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:00', '2018-05-29 12:05:00', 10, 1),
(17, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:12', '2018-05-29 12:05:00', 10, 1),
(18, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:22', '2018-05-29 12:05:00', 10, 1),
(19, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:51', '2018-05-29 12:05:00', 10, 1),
(20, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:03', '2018-05-29 12:05:00', 10, 1),
(21, 'this title', 'this is the content of the post', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-08 08:03:04', '2018-05-29 12:05:00', 10, 1),
(22, 'rthtrjhrf', 'jjrftju6ruj', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:15', '1970-01-01 01:01:00', 10, 1),
(23, 'yfjyhyfj', 'hmyjmfyhjmhyfy', '', 1, 3, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:09', '1970-01-01 01:01:00', 10, 1),
(24, 'yfjyhyfj', 'hmyjmfyhjmhyfy', '', 1, 3, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:53', '1970-01-01 01:01:00', 10, 1),
(25, 'sthstrjhntr', 'rsxtjn ri', '', 1, 3, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:08', '1970-01-01 01:01:00', 10, 1),
(26, 'sthstrjhntr', 'rsxtjn ri', '', 1, 3, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:26', '1970-01-01 01:01:00', 56, 1),
(27, 'Lorijsjflr', 'jh;djfgh ;urhg;ruiegh;arg ioh;agierrfvg', '', 1, 4, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:42', '1970-01-01 01:01:00', 56, 0),
(28, 'jklgbikul uii', 'klgyj u.u.ig;ui ogiut;l', 'IMG-20171106-WA0008.jpg', 1, 4, NULL, 'localhost/ems-new/?p=this-title', '2018-03-13 16:03:21', '1970-01-01 01:01:00', 56, 1),
(29, 'sdfasd', 'fwefawefewf', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-18 23:03:59', '2018-03-23 00:03:00', 56, 1),
(30, 'Autonomous Car Kills Pedestrian', 'In Arizona, yesterday. An Uber Autonomous Car kills pedestrian while moving on 4th Avenue lane, in kanji district ', '', 1, 2, NULL, 'localhost/ems-new/?p=this-title', '2018-03-19 23:03:24', '2018-03-09 00:03:00', 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ems_users`
--

CREATE TABLE `ems_users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_users`
--

INSERT INTO `ems_users` (`user_id`, `user_email`, `user_password`, `user_phone`, `user_registered`, `user_status`) VALUES
(1, 'admini', '5f4dcc3b5aa765d61d8327deb882cf99', '+2335845454', '2018-03-20 20:33:29', 1),
(2, 'admn', '5f4dcc3b5aa765d61d8327deb882cf99', '63245632456', '2018-03-20 20:33:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `post_title`, `post_content`, `post_category`) VALUES
(1, 'post title trying', 'try post content', 'cat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_category`
--
ALTER TABLE `ems_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ems_event`
--
ALTER TABLE `ems_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ems_post`
--
ALTER TABLE `ems_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ems_users`
--
ALTER TABLE `ems_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ems_category`
--
ALTER TABLE `ems_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ems_event`
--
ALTER TABLE `ems_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ems_post`
--
ALTER TABLE `ems_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ems_users`
--
ALTER TABLE `ems_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
