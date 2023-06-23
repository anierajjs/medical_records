-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 02:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_records_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `RecordID` int(11) NOT NULL,
  `ClientNo` varchar(10) DEFAULT NULL,
  `DeptNo` varchar(10) DEFAULT NULL,
  `Allocation_Date` date DEFAULT NULL,
  `Last_Update` date DEFAULT NULL,
  `Medical_history` varchar(100) DEFAULT NULL,
  `Risk_Factor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`RecordID`, `ClientNo`, `DeptNo`, `Allocation_Date`, `Last_Update`, `Medical_history`, `Risk_Factor`) VALUES
(10, 'K108341', 'K01', '2006-01-05', '2006-02-05', 'Diabetes', 0),
(20, 'K104546', 'K01', '2006-10-20', '2006-11-05', 'Arthritis', 2),
(30, 'S245989', 'S02', '2006-09-01', '2006-10-05', 'High Blood Pressure', 3),
(40, 'S245456', 'S02', '2006-06-26', '2006-07-05', 'Asthma', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `records_view_dept_k01`
-- (See below for the actual view)
--
CREATE TABLE `records_view_dept_k01` (
`RecordID` int(11)
,`ClientNo` varchar(10)
,`DeptNo` varchar(10)
,`Allocation_Date` date
,`Last_Update` date
,`Risk_Factor` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `records_view_dept_s02`
-- (See below for the actual view)
--
CREATE TABLE `records_view_dept_s02` (
`RecordID` int(11)
,`ClientNo` varchar(10)
,`DeptNo` varchar(10)
,`Allocation_Date` date
,`Last_Update` date
,`Risk_Factor` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `records_view_dept_k01`
--
DROP TABLE IF EXISTS `records_view_dept_k01`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `records_view_dept_k01`  AS  select `records`.`RecordID` AS `RecordID`,`records`.`ClientNo` AS `ClientNo`,`records`.`DeptNo` AS `DeptNo`,`records`.`Allocation_Date` AS `Allocation_Date`,`records`.`Last_Update` AS `Last_Update`,`records`.`Risk_Factor` AS `Risk_Factor` from `records` where (`records`.`DeptNo` <> 'S02') ;

-- --------------------------------------------------------

--
-- Structure for view `records_view_dept_s02`
--
DROP TABLE IF EXISTS `records_view_dept_s02`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `records_view_dept_s02`  AS  select `records`.`RecordID` AS `RecordID`,`records`.`ClientNo` AS `ClientNo`,`records`.`DeptNo` AS `DeptNo`,`records`.`Allocation_Date` AS `Allocation_Date`,`records`.`Last_Update` AS `Last_Update`,`records`.`Risk_Factor` AS `Risk_Factor` from `records` where (`records`.`DeptNo` <> 'K01') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`RecordID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
