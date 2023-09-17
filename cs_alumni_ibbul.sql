-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 03:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_alumni_ibbul`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_content1` text NOT NULL,
  `about_content2` text NOT NULL,
  `about_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_content1`, `about_content2`, `about_status`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `status`) VALUES
(1, 'admin@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_phone` varchar(200) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`, `contact_status`) VALUES
(1, 'Isah', 'isah@gmail.com', '09036507388', 'lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl lsomn slo so sl ', 1),
(2, 'Isah Muhammad', 'softmuqsit@gmail.com', 'Recommendation on Data Collection', 'I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... I would like to suggest as to ... ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `event_date` varchar(200) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `event_desc` text NOT NULL,
  `event_img` varchar(200) NOT NULL,
  `event_vid` varchar(200) NOT NULL,
  `event_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_venue`, `event_desc`, `event_img`, `event_vid`, `event_status`) VALUES
(1, 'Students Math Competition for The Year 2017', '2023-09-15', 'Audirotium Hall, IBB University Lapai..', 'Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodiQuis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodiQuis e', 'alumni1.webp', '', 1),
(4, 'Students Math Competition for The Year 2022', '2023-12-31', 'Audirotium Hall, IBB University Lapai', '  enctype=// controller classes 		include \'../classes/dbh.php\'; 		include \'../classes/events.php\'; 		include \'../classes/EventsContr.php\'; 		$contact = new EventsContr($new_event_title, $new_event_date, $new_event_venue, $new_event_img, $new_event_desc);  		$contact->updateEvent($token);// controller classes 		include \'../classes/dbh.php\'; 		include \'../classes/events.php\'; 		include \'../classes/EventsContr.php\'; 		$contact = new EventsContr($new_event_title, $new_event_date, $new_event_venue, $new_event_img, $new_event_desc);  		$contact->updateEvent($token);// controller classes 		include \'../classes/dbh.php\'; 		include \'../classes/events.php\'; 		include \'../classes/EventsContr.php\'; 		$contact = new EventsContr($new_event_title, $new_event_date, $new_event_venue, $new_event_img, $new_event_desc);  		$contact->updateEvent($token);', 'alumni2.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `img_src` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `caption`, `img_src`, `status`) VALUES
(1, 'IBBUL OVERVIEW', 'IBBUL3.jpg', 1),
(2, 'CS DEPARTMENT IBBUL', 'IBBUL1.jpg', 1),
(4, 'IBBUL 4TH CONVOCATION CEREMONY 2023', 'alumni2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `matNo` varchar(200) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `grad_yr` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `state_of_origin` varchar(200) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `alumni_office_id` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `about_me` text NOT NULL,
  `facebook_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0 COMMENT '0=member, 1=others, 2=treasurer, 3=sec, 4=v.p, 5=president',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=enrolled, 1=activated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `surname`, `othername`, `matNo`, `dob`, `grad_yr`, `email`, `phone`, `password`, `state_of_origin`, `profession`, `alumni_office_id`, `img`, `about_me`, `facebook_url`, `twitter_url`, `instagram_url`, `rating`, `status`) VALUES
(3, '', 'Ibrahim', '', 'U18/FNS/CSC/2012', '2013-01-01', '2020', '', '', '', '', '', 'Member', '', '', '', '', '', 0, 0),
(4, 'Muhammad', 'Isah', 'Alhaji', 'U17/FNS/CSC/1043', '1997-08-01', '2022', 'muqsitxx@gmail.com', '09036507388', 'b722bbfd337620475b74c2d298d56612', '', '', 'Member', '', '', '', '', '', 0, 1),
(5, '', 'Jamilu', '', 'U05/FNS/CSC/0001', '1986-07-23', '2009', '', '', '', '', '', 'President', '', '', '', '', '', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_date` varchar(200) NOT NULL,
  `news_img` varchar(200) NOT NULL,
  `news_desc` text NOT NULL,
  `news_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_date`, `news_img`, `news_desc`, `news_status`) VALUES
(6, 'New Item 22', '2023-12-31', 'alumni2.jpg', 'Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj Lorem aj skj sj ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `matNo` varchar(20) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `office` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
