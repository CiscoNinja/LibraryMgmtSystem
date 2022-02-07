-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 10, 2015 at 05:16 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
`admin_ID` int(4) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_log` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_ID`, `admin_name`, `admin_log`, `admin_password`) VALUES
(1, 'admin1', '@admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
`book_id` int(5) NOT NULL,
  `book_title` text NOT NULL,
  `book_author` text NOT NULL,
  `book_qty` int(3) unsigned NOT NULL,
  `book_category` text NOT NULL,
  `book_Cover` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_author`, `book_qty`, `book_category`, `book_Cover`) VALUES
(3, 'WebApp Dev vol2', 'Carter', 1, 'Mobile', 'upload/72.jpg'),
(4, 'WebApp Dev vol2', 'Carter', 0, 'Marketing', 'upload/203.jpg'),
(5, 'My fisrt Java ', 'victor Huggo', 4, 'Programming', 'upload/417.jpg'),
(6, 'fchf', 'sadfs', 3, 'Web', 'upload/301.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
`book_category_id` int(5) NOT NULL,
  `book_category_name` varchar(40) NOT NULL,
  `book_category_qty` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `book_category_name`, `book_category_qty`) VALUES
(3, 'Web', 0),
(4, 'Mobile', 0),
(6, 'Marketing', 0),
(7, 'Programming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
`land_id` int(5) NOT NULL,
  `time` text NOT NULL,
  `deadline` text NOT NULL,
  `student` text NOT NULL,
  `book` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`land_id`, `time`, `deadline`, `student`, `book`, `status`) VALUES
(8, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(9, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(10, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'Alegebra', 'out'),
(11, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(12, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(13, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(21, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(22, '09-02-15', '12-02-15', 'Arnaud-Johnson', 'WebApp Dev vol2', 'out'),
(23, '09-03-15', '12-03-15', '-', '', 'out'),
(24, '09-03-15', '12-03-15', '-', '', 'out'),
(25, '09-03-15', '12-03-15', '-', '', 'out');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
`request_id` int(5) NOT NULL,
  `student_ID` int(5) NOT NULL,
  `book_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `student_ID`, `book_id`) VALUES
(1, 11, 3),
(2, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
`student_ID` int(5) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `books` int(1) DEFAULT NULL,
  `warning` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_ID`, `fname`, `lname`, `email`, `phone`, `password`, `books`, `warning`) VALUES
(2, 'Arnaud', 'Johnson', 'arjohn@live.com', '1233645', 'arnau', 1, NULL),
(13, 'arnaud', 'tondoye', 'tondoye2009@htmail.fr', '0011222', '123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
 ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
 ADD PRIMARY KEY (`land_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `admin_ID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
MODIFY `book_category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
MODIFY `land_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
MODIFY `request_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `student_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
