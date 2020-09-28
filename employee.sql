-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2017 at 02:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(5) PRIMARY KEY ,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `birth_date` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `department` int(5)  NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `join_date` varchar(50) DEFAULT NULL,
  `annual_basic_pay` float NOT NULL,
  `monthly_pay` float NOT NULL,
  `tax` float NOT NULL,
  `tax_amount` float NOT NULL,
  `department_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `gender`, `birth_date`, `address`, `city`, `department`, `postal_code`, `email`, `website`, `join_date`, `annual_basic_pay`, `monthly_pay`, `tax`, `tax_amount`) VALUES
(1, 'Shubham Bhuvad', 'male', '1994-09-22', 'Rising City', 'mumbai', 6, '400045', 'shubhambhuvad0@gmail.com', 'www.shubhambhuvad.com', '2017-10-26', 200000, 11833.3, 29, 21500),
(2, 'Pratik Jadhav', 'male', '1994-04-04', 'Chembur', 'mumbai', 6, '400708', 'pratikjadav@gmail.com', 'www.facebook.com', '2017-10-26', 300000, 16750, 33, 33250),
(3, 'Dnyati Hare', 'female', '1994-09-23', 'Chembur', 'Mumbai', 1, '400708', 'dnyati@gmail.co', 'www.dnyatihate.com', '2017-10-10', 100000, 6166.67, 26, 10500),
(4, 'Poorva Powar', 'female', '22/09/1994', 'Chembur', 'Mumbai', 3, '440708', 'poorvapowar@gmail.com', 'www.snap.cpm', '22/11/2017', 444000, 24790, 33, 49210),
(5, 'Siddhesh Wadkar', 'male', '1995/09/22', 'Wadala', 'Mumbai', 3, '400584', 'siddheshwadkar@GMAIL.COM', 'jot.com', '2017/09/24', 299999, 16749.9, 33, 33249.9),
(6, 'Sahil Kokate', 'male', '1994-10-09', 'Bhandup', 'Mumbai', 1, '400786', 'sahilkokate@gmail.co.ca', 'sakshi.fb.co.ca', '2017-10-31', 300000, 16750, 33, 33250),
(7, 'Deepak Zad', 'male', '1994/09/08', 'Kanjur', 'Mumbai', 3, '400575', 'deepakzad@gmail.com', 'arsh5#@gail.com', '1994/09/8', 4000000, 223333, 33, 443333),
(8, 'Sagar Rathod', 'male', '1997-06-17', 'Diva', 'Thane', 1, 'Q2a3e4', 'sagarrathod@gmail.com', 'www.facebook.com', '2017-10-20', 89000, 5830, 20.5, 8836.67);

--
-- Indexes for dumped tables
--
CREATE TABLE `department` (
  `department_id` int(5) PRIMARY KEY,
  `department_name` varchar(30) ,
  `location` varchar(50) 
  )ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --
  INSERT INTO `department` (`department_id`,`department_name`,`location`)VALUES
  (1,'UX/UI Designer','mumbai'),
  (2,'Content Editor','dadar'),
  (3,'Lead Designer','vashi'),
  (4,'Content Producer','mumbai'),
  (5,'Tester','dadar'),
  (6,'Developer','vashi'),
  (7,'Marketing','ghatkopar');  


  
-- Indexes for table `employee`
--
-- ALTER TABLE `employee`
--   ADD PRIMARY KEY (`employee_id`);
-- COMMIT;

-- ALTER TABLE `department`
--   ADD PRIMARY KEY (`department_id`);
-- COMMIT;

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
