-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2018 at 05:36 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qld_cleaners`
--

-- --------------------------------------------------------

--
-- Table structure for table `shiny_users`
--

DROP TABLE IF EXISTS `shiny_users`;
CREATE TABLE IF NOT EXISTS `shiny_users` (
  `username` varchar(60) NOT NULL,
  `password` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiny_users`
--

INSERT INTO `shiny_users` (`username`, `password`, `created_at`, `updated_at`) VALUES
('admin', 'admin', '2018-05-30 02:47:45', '2018-05-30 02:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `shiny_works`
--

DROP TABLE IF EXISTS `shiny_works`;
CREATE TABLE IF NOT EXISTS `shiny_works` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `property_type` varchar(30) NOT NULL,
  `no_bedroom` int(10) NOT NULL,
  `no_bathroom` int(10) NOT NULL,
  `service_date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `best_contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiny_works`
--

INSERT INTO `shiny_works` (`id`, `property_type`, `no_bedroom`, `no_bathroom`, `service_date`, `name`, `email`, `phone`, `best_contact`, `address`, `message`, `status`) VALUES
(5, 'Unit', 1, 2, '2018-05-25', 'Budhiman', 'budhiman.mongar@my.jcu.edu.au', 2147483647, 'Email', 'Zillmere', 'Hi, i want my house to be cleaned', '1'),
(6, 'Apartment', 3, 5, '2018-05-25', 'Chimi Sherpa', 'chimisherpa@gmail.com', 2147483647, 'Phone', '45 Enoggra Road', 'My house need to be cleaned, please contact me if you are available during this date\r\n\r\nThank you', '1'),
(7, 'Townhouse', 4, 3, '2018-06-01', 'Sonam Tenzin', 'sonam@gmail.com', 482387234, 'Phone', 'New Market', 'My house should be cleaned during above dates', '1'),
(8, 'Unit', 4, 1, '2018-05-25', 'Anil', 'anilshe@gmail.com', 492388123, 'Email', 'Church Road, Zillmere', 'Can you please send me the confirmation for my house cleaning', '1'),
(17, 'Unit', 4, 3, '2018-06-02', 'Asim', 'ashimghimire.1992@gmail.com', 416161787, 'Email', 'Tooowong', 'My house is very dirty. Please do a detailed cleaning.\r\n', '1'),
(18, 'Unit', 3, 2, '2018-06-13', 'Suman Shrestha', 'suman.stha@gmail.com', 418171653, 'Phone', 'withington street', 'I will be leaving my unit key in the mail box. Please leave the key there after completing the work and do inform me after the work is done. ', '1'),
(19, 'House', 5, 6, '2018-08-20', 'sdffa', 'damanaa@gama.ci', 1234567887, 'Email', 'asdfxagsz asd a sdfa', '', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
