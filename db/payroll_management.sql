-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 01:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_management`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SALARY_ADD` (IN `Sb_id` VARCHAR(5), IN `Year` INT(4), IN `Month` VARCHAR(10))   UPDATE salary_breakup SET salary_breakup.total=salary_breakup.House_allowance+salary_breakup.Bonus+salary_breakup.other_bonus+salary_breakup.Medical_allowance+salary_breakup.overtime-salary_breakup.loan_cut-salary_breakup.PF-salary_breakup.Absence*500 WHERE salary_breakup.Sb_id=Sb_id AND salary_breakup.Year=Year AND salary_breakup.Month=Month$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` varchar(5) NOT NULL,
  `Dname` varchar(30) NOT NULL,
  `Mgr_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Dname`, `Mgr_id`) VALUES
('D1111', 'Research and Development', 'E1111'),
('D1112', 'Human Resource', 'E1112'),
('D1113', 'Accounting and Finance', 'E1113'),
('D1114', 'Marketing', 'E1114'),
('D1115', 'Production', 'E1115');

-- --------------------------------------------------------

--
-- Table structure for table `emplogin`
--

CREATE TABLE `emplogin` (
  `Emp_id` varchar(5) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emplogin`
--

INSERT INTO `emplogin` (`Emp_id`, `userid`, `password`) VALUES
('E1112', 'sathwiksv30@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` varchar(5) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `Phone` bigint(11) NOT NULL,
  `Bank_Acc_No` bigint(17) NOT NULL,
  `Dob` date NOT NULL,
  `Start_date` date NOT NULL,
  `PF_Sum` double NOT NULL,
  `loan` double NOT NULL,
  `Job_Title` varchar(20) NOT NULL,
  `Basic_Salary` double NOT NULL,
  `Dept_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Name`, `Address`, `Gender`, `email_id`, `Phone`, `Bank_Acc_No`, `Dob`, `Start_date`, `PF_Sum`, `loan`, `Job_Title`, `Basic_Salary`, `Dept_id`) VALUES
('E1110', 'Rajath G', 'Mangalore', 'Male', 'Rajg30@gmail.com', 9685748596, 11223344556677, '2001-01-01', '2022-01-01', 10000, 0, 'CEO', 60000, 'D1112'),
('E1111', 'Shashank', 'Humcha', 'Male', 'shankanaada@gmail.com', 8877755415, 6012147483647, '2002-06-14', '2022-01-01', 5000, 0, 'Manager', 50000, 'D1111'),
('E1112', 'Sathwik', 'Mangalore', 'Male', 'sathwiksv30@gmail.com', 7259125125, 123456789123, '2002-12-12', '2022-03-04', 5000, 0, 'Manager', 28000, 'D1112'),
('E1113', 'Jane', 'Texas', 'Female', 'jane@mail.com', 8596858596, 601526710100, '1999-05-03', '2022-01-01', 5000, 0, 'Manager', 50000, 'D1113'),
('E1114', 'Aisiri', 'Kodagu', 'Female', 'siri@gmail.com', 6365263698, 70456235656, '2002-06-02', '2022-01-01', 5000, 0, 'Manager', 50000, 'D1114'),
('E1115', 'Abhay', 'Benjanapadavu', 'Male', 'abhay@gmail.com', 8574859685, 601577710100, '2002-12-24', '2022-01-01', 5000, 0, 'Manager', 50000, 'D1115');

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `Emp_id` varchar(5) NOT NULL,
  `Dept_id` varchar(5) NOT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manages`
--

INSERT INTO `manages` (`Emp_id`, `Dept_id`, `Start_Date`, `End_Date`) VALUES
('E1111', 'D1111', '2022-01-01', '0000-00-00'),
('E1112', 'D1112', '2022-03-04', '0000-00-00'),
('E1113', 'D1113', '2022-01-01', '0000-00-00'),
('E1114', 'D1114', '2022-01-01', '0000-00-00'),
('E1115', 'D1115', '2022-01-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `Sb_id` varchar(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Month` varchar(10) NOT NULL,
  `Total_pay` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`Sb_id`, `Year`, `Month`, `Total_pay`) VALUES
('E1111', 2022, 'January', 58583.41),
('E1112', 2022, 'February', 38083.41),
('E1112', 2022, 'March', 42983.41),
('E1113', 2021, 'February', 66683.41);

-- --------------------------------------------------------

--
-- Table structure for table `salary_breakup`
--

CREATE TABLE `salary_breakup` (
  `Sb_id` varchar(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `Month` varchar(10) NOT NULL,
  `House_allowance` double NOT NULL,
  `loan_cut` double NOT NULL,
  `Bonus` double NOT NULL,
  `other_bonus` double NOT NULL,
  `Medical_allowance` double NOT NULL,
  `overtime` double NOT NULL,
  `PF` double NOT NULL,
  `Absence` int(3) NOT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_breakup`
--

INSERT INTO `salary_breakup` (`Sb_id`, `Year`, `Month`, `House_allowance`, `loan_cut`, `Bonus`, `other_bonus`, `Medical_allowance`, `overtime`, `PF`, `Absence`, `total`) VALUES
('E1111', 2022, 'January', 5000, 0, 1000, 500, 5000, 0, 416.59, 5, 8583.41),
('E1112', 2022, 'February', 5000, 0, 2000, 0, 5000, 0, 416.59, 3, 10083.41),
('E1112', 2022, 'March', 5000, 0, 5400, 0, 5000, 0, 416.59, 0, 14983.41),
('E1113', 2021, 'February', 5000, 0, 1100, 6000, 5000, 0, 416.59, 0, 16683.41);

--
-- Triggers `salary_breakup`
--
DELIMITER $$
CREATE TRIGGER `salary_add` AFTER INSERT ON `salary_breakup` FOR EACH ROW INSERT INTO payroll VALUES(new.Sb_id,new.Year,new.Month,new.total)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `works_for`
--

CREATE TABLE `works_for` (
  `Emp_id` varchar(5) NOT NULL,
  `Dept_id` varchar(5) NOT NULL,
  `Hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `works_for`
--

INSERT INTO `works_for` (`Emp_id`, `Dept_id`, `Hours`) VALUES
('E1110', 'D1112', 1400),
('E1111', 'D1111', 1460),
('E1112', 'D1112', 1455),
('E1113', 'D1113', 1470),
('E1114', 'D1114', 1440),
('E1115', 'D1115', 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `emplogin`
--
ALTER TABLE `emplogin`
  ADD PRIMARY KEY (`Emp_id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`Emp_id`,`Dept_id`),
  ADD KEY `DID` (`Dept_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`Sb_id`,`Year`,`Month`);

--
-- Indexes for table `salary_breakup`
--
ALTER TABLE `salary_breakup`
  ADD PRIMARY KEY (`Sb_id`,`Year`,`Month`);

--
-- Indexes for table `works_for`
--
ALTER TABLE `works_for`
  ADD PRIMARY KEY (`Emp_id`,`Dept_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emplogin`
--
ALTER TABLE `emplogin`
  ADD CONSTRAINT `emplogin` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Dept_id` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `DID` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EID` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `sbid` FOREIGN KEY (`Sb_id`,`Year`,`Month`) REFERENCES `salary_breakup` (`Sb_id`, `Year`, `Month`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_breakup`
--
ALTER TABLE `salary_breakup`
  ADD CONSTRAINT `Mgr_idkk` FOREIGN KEY (`Sb_id`) REFERENCES `employee` (`Emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `works_for`
--
ALTER TABLE `works_for`
  ADD CONSTRAINT `D_ID` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `E_ID` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
