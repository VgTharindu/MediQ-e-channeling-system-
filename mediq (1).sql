-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2026 at 12:49 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediq`
--

-- --------------------------------------------------------

--
-- Table structure for table `channeling_appointments`
--

DROP TABLE IF EXISTS `channeling_appointments`;
CREATE TABLE IF NOT EXISTS `channeling_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `doc_id` varchar(50) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `specialisation` varchar(100) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channeling_appointments`
--

INSERT INTO `channeling_appointments` (`id`, `patient_name`, `age`, `gender`, `phone`, `id_number`, `doc_id`, `doctor_name`, `specialisation`, `date_time`, `hospital`, `location`, `booked_at`) VALUES
(1, 'THARINDU', 45, 'male', '0772010733', '200883456789', 'phy001', 'Dr.Suranga Lakmal', 'physician', 'Monday 5.00pm to 7.00pm', 'Asiri', 'Matara', '2026-03-22 12:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `name` varchar(100) NOT NULL,
  `doc_id` varchar(50) DEFAULT NULL,
  `specialisation` varchar(100) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`name`, `doc_id`, `specialisation`, `date_time`, `location`, `hospital`) VALUES
('Dr.Suranga Lakmal', 'phy001', 'physician', 'Monday 5.00pm to 7.00pm', 'Matara', 'Asiri'),
('Dr.Nipun Bandra', 'phy002', 'physician', 'Tuesday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Dimuthu Shalinda', 'rd001', 'Radiologist', 'Monday 5.00pm to 7.00pm', 'Matara', 'Asiri'),
('Dr.Mithun Chameera', 'rd002', 'Radiologist', 'Friday 6.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Bashitha Sadaruwan', 'ent001', 'ENT Sugeon', 'Friday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Rishan Ahamad', 'phy003', 'physician', 'Friday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Sachinthana Geewindi', 'rd003', 'Radiologist', 'Friday 4.00pm to 8.00pm', 'matar', 'Asiri'),
('Dr.Sachinthana Geewindi', 'cr003', 'Cariologist', 'Friday 4.00pm to 8.00pm', 'Matara', 'Asiri'),
('Dr.Andrew', 'car001', 'Cariologist', 'Friday 4.00pm to 8.00pm', 'Matara', 'Asiri'),
('Dr.Rishan Ahamad', 'car002', 'Cariologist', 'Monday 5.00pm to 7.00pm', 'Galle', 'Asiri'),
('Dr.Suranga Lakmal', 'phy001', 'physician', 'Monday 5.00pm to 7.00pm', 'Matara', 'Asiri'),
('Dr.Nipun Bandra', 'phy002', 'physician', 'Tuesday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Dimuthu Shalinda', 'rd001', 'Radiologist', 'Monday 5.00pm to 7.00pm', 'Matara', 'Asiri'),
('Dr.Mithun Chameera', 'rd002', 'Radiologist', 'Friday 6.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Bashitha Sadaruwan', 'ent001', 'ENT Sugeon', 'Friday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Rishan Ahamad', 'phy003', 'physician', 'Friday 4.00pm to 8.00pm', 'Galle', 'Asiri'),
('Dr.Sachinthana Geewindi', 'rd003', 'Radiologist', 'Friday 4.00pm to 8.00pm', 'Matara', 'Asiri'),
('Dr.Sachinthana Geewindi', 'cr003', 'Cariologist', 'Friday 4.00pm to 8.00pm', 'Matara', 'Asiri'),
('Dr.Andrew', 'car001', 'Cariologist', 'Friday 4.00pm to 8.00pm', 'Matara', 'Asiri'),
('Dr.Rishan Ahamad', 'car002', 'Cariologist', 'Monday 5.00pm to 7.00pm', 'Galle', 'Asiri');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `Name` varchar(20) NOT NULL,
  `Age` int(5) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Name`, `Age`, `Gender`, `phone`, `id_number`) VALUES
('tharindu', 19, 'male', '0772010733', '200334400893'),
('tharindu', 19, 'male', '0772010733', '200334400893'),
('danuka', 23, 'male', '0772010733', '200334400896'),
('danuka', 23, 'male', '0772010733', '200334400897'),
('danuka', 23, 'male', '0772010733', '200334400897'),
('tharindu', 27, 'male', '0772010733', '200334400897'),
('tharindu', 27, 'male', '0772010733', '200334400897'),
('tharindu', 27, 'male', '0772010733', '200334400897'),
('tharindu', 27, 'male', '0772010733', '200334400897'),
('tharindu', 27, 'male', '0772010733', '200334400897'),
('danuka', 27, 'male', '0772010733', '200334400897'),
('danuka', 27, 'male', '0772010733', '200334400897'),
('danuka', 27, 'male', '0772010733', '200334400897'),
('bashitha', 34, 'male', '33445678', '200334400893'),
('bashitha', 34, 'male', '33445678', '200334400893'),
('THARINDU', 23, 'male', '0778965345', '200883456789'),
('THARINDU', 45, 'male', '0772010733', '200883456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
