-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2017 at 06:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminal_case`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `email`, `pass`, `salt`, `admin`) VALUES
(1, 'amin', 'test@example.com', '12345', '12345', 1),
(2, 'user1', 'user1@test.com', '123456', '', 0),
(3, 'user2', 'user2@test.com', '123456', '123456', 0),
(4, 'user3', 'user3@test.com', '123', '123456', 0),
(7, 'user7', 'user7@mail.com', '123456', '123456', 0),
(9, 'admin1', 'admin1@maail.com', '123456', '123', 1),
(10, 'admin2', 'admin2@mail.com', '123456', '123456', 1),
(11, 'admin3', 'admin3@maail.com', '123456', '', 1),
(12, 'user12', 'user12@mail.com', '123456', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `case_status`
--

CREATE TABLE IF NOT EXISTS `case_status` (
  `status_id` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `advocate_name` varchar(50) NOT NULL,
  `court_order` varchar(100) NOT NULL,
  `act` varchar(100) NOT NULL,
  `judge` varchar(40) NOT NULL,
  `Investigator` varchar(40) NOT NULL,
  `crime_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_status`
--

INSERT INTO `case_status` (`status_id`, `status`, `advocate_name`, `court_order`, `act`, `judge`, `Investigator`, `crime_id`) VALUES
(1, 'open', 'adv. Nozrul islam', 'something', 'something', 'bar.  rofiul', 'masruk', 1),
(2, 'open', 'adv.bozrul islam', 'something', 'something', 'bar.  kafi', 'masruk', 2),
(3, 'open', 'adv. Anisur Rahman', '', '100.2', 'Bar. Partha Banik', 'Shanto Hasan', 3),
(4, 'Open', 'Adv. Nurul Huda', 'No order', '', 'Bar. Susmoy Debnath', '', 4),
(5, 'open', '', '', '', '', '', 5),
(6, 'none', '', '', '', '', '', 6),
(7, 'open', '', '', '', '', '', 7),
(8, 'closed', 'Hanif Mahmud', '5 years jail', '110.66', 'Golam Ajiij', '', 8),
(9, 'closed', 'Azad Bhuiyan', '20,000 Tk Fine Each', '400.34', 'Nayla Taswari', '', 9),
(10, 'closed', 'Nilima Roy', '5 Years Jail', '333.77', 'Farhana Faiza', 'Rajib Sarwar', 10),
(11, 'closed', 'Morshed Chowdhury', '12 Years Jail', '98.12', 'Mohammad Mosarraf', 'Jayed Iqbal', 11),
(13, 'open', '', '', '', '', '', 13),
(14, 'closed', '', '10 years jail', '', '', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Murder     '),
(2, 'Rape'),
(3, 'Kidnapping'),
(4, 'theft'),
(5, 'robbery'),
(6, 'Blackmail'),
(7, 'Drug'),
(8, 'Cyber'),
(9, 'Vandalism'),
(10, 'Assultr'),
(11, 'Bombing'),
(12, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `crime_case`
--

CREATE TABLE IF NOT EXISTS `crime_case` (
  `crime_id` int(50) NOT NULL,
  `date&time` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stree_name` varchar(100) NOT NULL,
  `stree_no` varchar(30) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `crime_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime_case`
--

INSERT INTO `crime_case` (`crime_id`, `date&time`, `cat_id`, `stree_name`, `stree_no`, `postal_code`, `thana`, `district`, `division`, `crime_name`) VALUES
(1, '2015-06-06 10:16:00', 1, 'haji m uddin', '2', 1000, 'Raozan', 'Chittagong', 'Chittagong', 'Murder in Gourishonkor'),
(2, '2015-06-06 10:16:00', 4, 'haji m uddin', '2', 1000, 'Raozan', 'Chittagong', 'Chittagong', 'Theft in a house in Raozan'),
(3, '2015-08-14 06:07:00', 1, '', '10', 3121, 'Chagolnaiy', 'Feni', 'Chittagong', 'Murder of Rafiq Mia'),
(4, '2015-07-09 16:00:00', 2, 'Kalshi', '', 1122, 'Mirpur', 'Dhaka', 'Dhaka', 'Rape of housewife in kalshi'),
(5, '2015-09-01 14:30:00', 11, 'Paltan Road', '12', 1060, 'Motijheel', 'Dhaka', 'Dhaka', 'Bombing in Paltan'),
(6, '2015-07-01 21:00:00', 5, 'Khulshi sorok', '11b', 2223, 'Khulshi', 'Chittagong', 'Chittagong', 'Money Robbery from DBBL Atm booth in Khulshi'),
(7, '2015-08-12 00:00:00', 7, 'Haji Taleb Sarak', '112', 4456, 'Akhaura', 'B.Baria', 'Chittagong', 'Drug Dealing In B.Baria Boarder'),
(8, '2015-06-09 11:00:00', 3, '', '', 4444, 'Homna', 'Comilla', 'Chittagong', 'Kidnapping in Homna'),
(9, '2014-11-03 00:00:00', 8, 'Sector-11', '3', 1200, 'Uttara', 'Dhaka', 'Dhaka', 'Hacking of Government Sites'),
(10, '2015-08-02 00:00:00', 6, '', '', 1100, 'Gulshan', 'Dhaka', 'Dhaka', 'Blackmailing by the name of "Pistol Azad"'),
(11, '2015-04-01 11:00:00', 1, 'Johur Road', '13', 2232, 'Agrabad', 'Chittagong', 'Chittagong', 'Husband Murdered by wife in Agrabad'),
(13, '2015-06-04 01:00:00', 11, '', '', 2222, 'Sahabag', 'Dhaka', 'Dhaka', 'Bombing in Sahabag'),
(14, '2015-08-04 01:00:00', 1, 'Gaus Road', '33D', 4455, 'Sylhet Sadar', 'Sylhet', 'Sylhet', 'Murder of Rajon in Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE IF NOT EXISTS `criminal` (
  `criminal_id` int(50) NOT NULL,
  `Fname` varchar(14) NOT NULL,
  `Mname` varchar(14) NOT NULL,
  `Lname` varchar(14) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `public_name` varchar(15) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `thana` varchar(14) NOT NULL,
  `district` varchar(14) NOT NULL,
  `division` varchar(14) NOT NULL,
  `mwl` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminal_id`, `Fname`, `Mname`, `Lname`, `age`, `sex`, `public_name`, `postal_code`, `thana`, `district`, `division`, `mwl`) VALUES
(1, 'Abdul', '', 'Akkas', 34, 'male', 'jorda Akkas', 1000, 'Raozan', 'Chittagong', 'Chittagong', 0),
(2, 'Abdul', '', 'Johir', 36, 'male', 'coctail Johir', 1000, 'Raozan', 'Chittagong', 'Chittagong', 0),
(3, 'Abul', 'Sarif', 'Uddin', 22, 'Male', 'Abul', 3111, 'Feni Sadar', 'Feni', 'Chittagon', 0),
(4, 'Muhit', '', 'Ahmed', 32, 'Male', 'Muhit', 3111, 'Feni Sadar', 'Feni', 'Chittagong', 0),
(5, 'jabbar', '', 'Uddin', 45, 'Male', 'Jabbar', 3111, 'Feni sadar', 'Feni', 'Chittagong', 0),
(6, 'Lotas', '', 'Ahmed', 22, 'Male', '', 1023, 'Badda', 'Dhaka', 'Dhaka', 0),
(7, 'Shuvo', '', 'Dhar', 23, 'Male', '', 1012, 'Gulshan', 'Dhaka', 'Dhaka', 0),
(8, 'Abdul', 'Aziz', 'Khan', 21, 'Male', '', 1122, 'Mirpur', 'Dhaka', 'Dhaka', 0),
(9, 'Pinal', 'Kumar', 'Ghosh', 22, 'male', '', 2223, 'Khulshi', 'Chittagong', 'Chittagong', 0),
(10, 'Mohammad', 'Akbar', 'Saleh', 21, 'male', '', 2223, 'Khulshi', 'Chittagong', 'Chittagong', 1),
(11, 'Nipa', '', 'Akter', 29, 'Female', '', 4456, 'Akhaura', 'B.Baria', 'Chittagong', 0),
(12, 'Nabila', '', 'Rahman', 22, 'Female', '', 4444, 'Comilla Sadar', 'Comilla', 'Chittagong', 0),
(13, 'Saidur', '', 'Rahman', 28, 'Male', '', 4444, 'Comilla Sadar', 'Comilla', 'Chittagong', 0),
(14, 'Rajib', '', 'Sarwar', 21, 'Male', '', 1200, 'Uttara', 'Dhaka', 'Dhaka', 1),
(15, 'Anisur', '', 'Rahman', 21, 'Male', '', 1200, 'Uttara', 'Dhaka', 'Dhaka', 1),
(16, 'Azedul', '', 'Sarker', 40, 'Male', 'Pistol Azad', 1100, 'Gulshan', 'Dhaka', 'Dhaka', 0),
(17, 'Rehnuma', '', 'Ahmed', 29, 'Female', '', 2232, 'Agrabad', 'Chittagong', 'Chittagong', 0),
(18, 'fff', 'mmmmm', 'llllll', 44, 'female', 'ppppppp', 4444, 'idid', 'mdndj', 'hdhd', 0),
(19, 'hdhdh', 'uuaua', 'kdkdk', 44, 'male', 'hdhdh', 5555, 'hfhfh', 'idudu', 'rere', 0),
(20, 'Arman', '', 'Ahmed', 28, 'male', '', 1111, 'Badda', 'Dhaka', 'Dhaka', 0),
(21, 'Zia', '', 'Mia', 31, 'male', '', 4444, 'Sylhet Sadar', 'Sylhet', 'Sylhet', 0),
(22, 'Barek', '', 'Hossain', 34, 'male', '', 4444, 'Sylhet Sadar', 'Sylhet', 'Sylhet', 0),
(23, 'Abu', '', 'Daud', 44, 'male', '', 5454, 'Sylhet Sadar', 'Sylhet', 'Sylhet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `criminalize`
--

CREATE TABLE IF NOT EXISTS `criminalize` (
  `crime_id` int(50) NOT NULL,
  `criminal_id` int(50) NOT NULL,
  `cat_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminalize`
--

INSERT INTO `criminalize` (`crime_id`, `criminal_id`, `cat_id`) VALUES
(1, 1, 1),
(2, 2, 4),
(1, 2, 1),
(3, 5, 2),
(3, 3, 2),
(3, 4, 2),
(4, 8, 2),
(4, 7, 2),
(4, 6, 2),
(5, 10, 11),
(5, 9, 11),
(6, 9, 5),
(6, 10, 5),
(7, 10, 7),
(7, 11, 7),
(8, 12, 3),
(8, 13, 3),
(9, 14, 8),
(9, 15, 8),
(10, 16, 6),
(11, 17, 1),
(13, 20, 11),
(14, 21, 1),
(14, 22, 1),
(14, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE IF NOT EXISTS `victim` (
  `victim_id` int(50) NOT NULL,
  `Fname` varchar(14) NOT NULL,
  `Mname` varchar(14) NOT NULL,
  `Lname` varchar(14) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `postal_code` varchar(14) NOT NULL,
  `thana` varchar(14) NOT NULL,
  `district` varchar(14) NOT NULL,
  `division` varchar(14) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`victim_id`, `Fname`, `Mname`, `Lname`, `age`, `sex`, `postal_code`, `thana`, `district`, `division`) VALUES
(1, 'Abul', '', 'Kalam', 32, 'Male', '100', 'Raozan', 'Chittagong', 'Chittagong'),
(2, 'Korim', '', 'Hossen', 32, 'Male', '100', 'Raozan', 'Chittagong', 'Chittagong'),
(3, 'Rafiq', '', 'Mia', 60, 'Male', '3111', 'Feni Sadar', 'Feni', 'Chittagong'),
(4, 'Mosammad', 'Lutfar', 'Nesa', 24, 'Female', '1122', 'Mirpur', 'Dhaka', 'Dhaka'),
(5, 'Tushar', 'Kanti', 'Roy', 6, 'Male', '4444', 'Homna', 'Comilla', 'Chittagong'),
(6, 'Selina', '', 'Parvin', 41, 'Female', '1040', 'Mohammadpur', 'Dhaka', 'Dhaka'),
(7, 'Russel', 'Al', 'Kabir', 62, 'male', '1204', 'Dhanmondi', 'Dhaka', 'Dhaka'),
(8, 'Farid', 'Ahmed', 'Halder', 55, 'Male', '1300', 'Rampura', 'Dhaka', 'Dhaka'),
(9, 'Tanvir', '', 'Ahmed', 31, 'Male', '2232', 'Agrabad', 'Chittagong', 'Chittagong'),
(10, 'hfhf', 'nsnns', 'dhdh', 44, 'male', '4434', 'fff', 'dddd', 'rrrr'),
(11, 'jdjj', 'kdidi', 'rrr', 44, 'male', '5555', 'rr', 't', 'w'),
(13, 'Rajon', '', 'Ali', 10, 'male', '3456', 'Sylhet Sadar', 'Sylhet', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `victimize`
--

CREATE TABLE IF NOT EXISTS `victimize` (
  `crime_id` int(50) NOT NULL,
  `victim_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `victimize`
--

INSERT INTO `victimize` (`crime_id`, `victim_id`) VALUES
(1, 2),
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(8, 5),
(10, 6),
(10, 7),
(10, 8),
(11, 9),
(14, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_status`
--
ALTER TABLE `case_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `case_status_ibfk_1` (`crime_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `crime_case`
--
ALTER TABLE `crime_case`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminal_id`);

--
-- Indexes for table `criminalize`
--
ALTER TABLE `criminalize`
  ADD KEY `victimize_ibfk_1` (`crime_id`),
  ADD KEY `criminalize_ibfk_2` (`criminal_id`),
  ADD KEY `criminalize_ibfk_3` (`cat_id`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`victim_id`);

--
-- Indexes for table `victimize`
--
ALTER TABLE `victimize`
  ADD KEY `victim_id` (`victim_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_status`
--
ALTER TABLE `case_status`
  MODIFY `status_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `crime_case`
--
ALTER TABLE `crime_case`
  MODIFY `crime_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `criminal_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `victim`
--
ALTER TABLE `victim`
  MODIFY `victim_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_status`
--
ALTER TABLE `case_status`
  ADD CONSTRAINT `case_status_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime_case` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criminalize`
--
ALTER TABLE `criminalize`
  ADD CONSTRAINT `criminalize_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime_case` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `criminalize_ibfk_2` FOREIGN KEY (`criminal_id`) REFERENCES `criminal` (`criminal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `criminalize_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `victimize`
--
ALTER TABLE `victimize`
  ADD CONSTRAINT `victimize_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime_case` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `victimize_ibfk_2` FOREIGN KEY (`victim_id`) REFERENCES `victim` (`victim_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
