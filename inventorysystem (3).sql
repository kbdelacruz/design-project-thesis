-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 02:12 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `ID_Number` char(15) NOT NULL,
  `Password` char(100) NOT NULL,
  `Image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`First_Name`, `Last_Name`, `ID_Number`, `Password`, `Image`) VALUES
('arvinnnnnnnnn', 'baldemornnnnnnnnn', '20150173505', 'grace', NULL),
('jonas ', 'jalandoni', '20150203751', 'qwerty', NULL),
('Kobe', 'Dela Cruz', '20170149196', 'huhuhu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumable_items`
--

CREATE TABLE `consumable_items` (
  `Item_Name` varchar(100) NOT NULL,
  `Value` char(20) NOT NULL,
  `Quantity` char(10) NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumable_items`
--

INSERT INTO `consumable_items` (`Item_Name`, `Value`, `Quantity`, `Status`) VALUES
(' Ultrasonic', '', '1000', 'Available'),
('1 Resistor', ' 1', '512', 'Available'),
('100K Resistor', ' 100K', '100', 'Available'),
('100ohm 5K Resistor', ' 100ohm', '1000', 'Available'),
('126uF Capacitor', ' 126uF', '10', 'Available'),
('12K Resistor', ' 12K', '353', 'Available'),
('12uF Capacitor', ' 12uF', '1', 'Available'),
('12uF Resistor', ' 12uF', '10', 'Available'),
('13 Resistor', ' 13', '30', 'Available'),
('15k Resistor', ' 15k', '100', 'Available'),
('1uf Capacitor', ' 1uf', '1000', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Item_Name` varchar(100) NOT NULL,
  `Quantity` char(20) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Value` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Item_Name`, `Quantity`, `Status`, `Value`) VALUES
(' IR Sensor', '25', 'Available', ''),
(' Ultrasonic', '100', 'Available', '');

-- --------------------------------------------------------

--
-- Table structure for table `non_consumable_items`
--

CREATE TABLE `non_consumable_items` (
  `Category_Name` varchar(100) NOT NULL,
  `Product_Number` char(20) NOT NULL,
  `Item_Model` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Product_Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_consumable_items`
--

INSERT INTO `non_consumable_items` (`Category_Name`, `Product_Number`, `Item_Model`, `Status`, `Product_Description`) VALUES
('Microcontrollers', '1111', ' Epson', 'Available', 'Printer'),
('Microcontrollers', '2222', 'Epson', 'Pending', 'Printer'),
('Network Communication', '3333', ' Xp', 'Available', 'Switch'),
('Microcontrollers', '5555', ' Epson', 'Available', 'Printer'),
('Microcontrollers', '6666', ' Epson', 'Available', 'Printer'),
('Network Communication', '7777', ' Dell', 'Available', 'Switch');

-- --------------------------------------------------------

--
-- Table structure for table `professor_account`
--

CREATE TABLE `professor_account` (
  `ID_Number` char(15) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Contact_Number` char(15) NOT NULL,
  `Ue_Web_Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_account`
--

INSERT INTO `professor_account` (`ID_Number`, `Last_Name`, `First_Name`, `Contact_Number`, `Ue_Web_Address`) VALUES
('20130173505', 'baldemor', 'arvin', '+6321513627372', 'baldemor.arvin@ue.edu.ph'),
('20150173511', 'Balunan', 'Imram Kyle', '+639151362737', 'balunan.imramkyle@ue.edu.ph'),
('20150173514', 'Graellos', 'Colleen Pearl', '+639172384153', 'graellos.colleenpearl@ue.edu.ph'),
('20150173518', 'Ressurecttion', 'Charmaine', '+639782374156', 'ressurecttion.charmaine@ue.edu.ph'),
('20150173519', 'Pascua', 'Christine Ann', '+639143475124', 'pascua.christineann@ue.edu.ph'),
('20150173521', 'Masangkay', 'Renz', '+639763456165', 'masangkay.renz@ue.edu.ph'),
('20150173522', 'Reyes', 'Lester', '+639563457143', 'reyes.lester@ue.edu.ph'),
('20150173527', 'Jumamil', 'Raniel', '+639563458173', 'jumamil.raniel@ue.edu.ph'),
('20150173533', 'Villegas', 'Irving John', '+639563429192', 'villegas.irvingjohn@ue.edu.ph'),
('20150173555', 'Yumul', 'Norwyn', '+639567434123', 'yumul.norwyn@ue.edu.ph'),
('20150173577', 'baldemor', 'Jonas Kevin', '+63958457362', 'baldemor.arvin@ue.edu.ph'),
('20150173598', 'Barreno', 'Christian Kyle', '+639342356145', 'barreno.christiankyle@ue.edu.ph'),
('20150173599', 'Dayaw', 'Kristine', '+639183456175', 'dayaw.kristine@ue.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `ID_Number` char(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Ue_Web_Address` varchar(50) NOT NULL,
  `Contact_Number` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`ID_Number`, `First_Name`, `Last_Name`, `Ue_Web_Address`, `Contact_Number`) VALUES
('20120173505', 'Max', 'Powers', 'powers.max@ue.edu.ph', '+6321513627'),
('20130173505', 'arvin', 'baldemor', 'baldemor.arvin@ue.edu.ph', '+6326163131'),
('20150173500', 'Max', 'Powers', 'ARV@UE.EDU.PH', '+6395845736'),
('20150173505', 'Arvin', 'Baldemor', 'ARVIN@UE.EDU.PH', '+6326163131'),
('20150173507', 'seryyyyy', 'joms', 'sery.joms@ue.edu.ph', '+6326163131'),
('20150173595', 'arvin', 'baldemor', 'ARV@UE.EDU.PH', '+6326163131'),
('20150193505', 'arvin', 'baldemor', 'ARV@UE.EDU.PH', '+6395845736');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `consumable_items`
--
ALTER TABLE `consumable_items`
  ADD PRIMARY KEY (`Item_Name`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Item_Name`);

--
-- Indexes for table `non_consumable_items`
--
ALTER TABLE `non_consumable_items`
  ADD PRIMARY KEY (`Product_Number`);

--
-- Indexes for table `professor_account`
--
ALTER TABLE `professor_account`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`ID_Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
