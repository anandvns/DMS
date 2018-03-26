-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 01:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbf_fzd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cb_dispatch`
--

CREATE TABLE `cb_dispatch` (
  `id` int(11) NOT NULL,
  `CB_DAK_NO` int(11) NOT NULL,
  `CB_DAK_DATE` varchar(20) NOT NULL,
  `CB_DAK_TOWHOM` varchar(100) NOT NULL,
  `CB_DAK_SUB` varchar(100) NOT NULL,
  `CB_DAK_FILENO` varchar(50) DEFAULT NULL,
  `CB_DAK_FROM` varchar(100) DEFAULT NULL,
  `CB_DAK_REMARK` varchar(100) DEFAULT NULL,
  `CB_DAK_TYPE` varchar(10) NOT NULL,
  `CB_DAK_N_DATE` varchar(20) NOT NULL,
  `CB_DAK_LANG` varchar(1) NOT NULL DEFAULT '',
  `CB` varchar(15) DEFAULT NULL,
  `CB_DAK_RTHROUGH` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_dispatch`
--

INSERT INTO `cb_dispatch` (`id`, `CB_DAK_NO`, `CB_DAK_DATE`, `CB_DAK_TOWHOM`, `CB_DAK_SUB`, `CB_DAK_FILENO`, `CB_DAK_FROM`, `CB_DAK_REMARK`, `CB_DAK_TYPE`, `CB_DAK_N_DATE`, `CB_DAK_LANG`, `CB`, `CB_DAK_RTHROUGH`) VALUES
(1, 15, '18-12-2017', 'Principal Director Central Command Lucknow', 'Regarding ACP of Employees', '14/Estt/ACP/SI', '002', 'EU78022851578IN', 'PD', '18-12-2017', 'E', '1513585373', 'SP'),
(2, 16, '21-12-2017', 'Principal Director Defence Estate', 'Regarding Survey Work', '89/Survey/2017', '004', 'Copy to:-\r\nDGDE', 'PD', '21-12-2017', 'E', '1513843613', 'NP'),
(3, 17, '21-12-2017', 'DGDE', 'Regarding Defence Estates Daye', '56/DED/LC27/C/2017', '001', '', 'DG', '21-12-2017', 'E', '1513843709', 'NP'),
(4, 18, '21-12-2017', 'DGDE', 'Regarding ABAS', '27/ABAS/CBS/2017', '008', '', 'DG', '21-12-2017', 'E', '1513843889', 'NP'),
(5, 19, '21-12-2017', 'test', 'test', 'test', '110', '', 'DG', '21-12-2017', 'E', '1513844002', 'NP'),
(6, 20, '21-12-2017', 'Stn Hq', 'Mini Marathon', '85/Adm/MiniMarathon', '001', '', 'A', '21-12-2017', 'E', '1513844130', 'NP'),
(7, 21, '21-12-2017', 'New One', 'New One', 'New One', '111', '', 'L', '21-12-2017', 'E', '1513844332', 'NP'),
(8, 22, '21-12-2017', 'yuy', 'yuy', 'yuy', '110', '', 'N', '21-12-2017', 'E', '1513844376', 'NP'),
(9, 23, '21-12-2017', 'pop', 'pop', 'pop', '008', '', 'A', '21-12-2017', 'E', '1513844644', 'NP'),
(10, 24, '22-12-2017', 'PDDE', 'test', '14/585/POP', '001', '', 'PD', '22-12-2017', 'E', '1513930428', 'NP'),
(11, 25, '23-12-2017', 'Update PDDE', 'Update REAGARDING ACP', 'UP - 21/LC2/ACP', '', 'Update', 'PDDE', '23-12-2017', 'E', '1514026446', 'NP'),
(12, 26, '11-01-2018', '', '', '', '-1', '', '-1', '11-1-2018', 'E', '1515655435', 'NP'),
(13, 27, '11-01-2018', 'PDDE Test', 'Regarding Testing', '45/Testing/101', '2', '', 'PDDE', '11-1-2018', 'E', '1515655838', 'NP'),
(14, 28, '11-01-2018', 'hindi dispatch', 'hindi dispatch', 'hindi dispatch', '8', '', 'DGDE', '11-1-2018', 'H', '1515671534', 'NP'),
(15, 29, '11-01-2018', 'Update', 'Update Hindi', 'Update Hindi', '13', 'Update', 'Normal', '11-1-2018', 'H', '1515671610', 'SP'),
(16, 30, '19-03-2018', 'PDDE', 'testing', '14/Estt/ACP/SI', '8', '', 'PDDE', '19-3-2018', 'E', '1521446616', 'NP');

-- --------------------------------------------------------

--
-- Table structure for table `cb_login`
--

CREATE TABLE `cb_login` (
  `USER_ID` varchar(100) DEFAULT NULL,
  `PSWD` varchar(100) DEFAULT NULL,
  `OFFICEID` varchar(25) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `POST` varchar(100) DEFAULT NULL,
  `USER_TYPE` varchar(2) DEFAULT NULL,
  `ACTIVE` varchar(10) DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cb_login`
--

INSERT INTO `cb_login` (`USER_ID`, `PSWD`, `OFFICEID`, `NAME`, `POST`, `USER_TYPE`, `ACTIVE`, `Id`) VALUES
('admin', 'e00cf25ad42683b3df678c61f42c6bda', 'SHAHJ', 'M.B.Rastogi', 'Admin', 'A', 'Y', 1),
('user', 'e00cf25ad42683b3df678c61f42c6bda', NULL, 'User', NULL, 'U', NULL, 4),
('dispatcher', '33b6366c46c0d661f75fe66162a799a0', 'SHAHJ', 'Rajesh Kumar', 'Clerk', 'D', 'Y', 3),
('ceo', 'e00cf25ad42683b3df678c61f42c6bda', NULL, 'CEO', NULL, 'C', NULL, 5),
('os', '3ebe2a4b7a6222b8b320dc5ca6a00d3b', NULL, 'MB Rastogi', NULL, 'U', NULL, 6),
('account', '809d7aea9eacf339b2e35e3c8ae0a57c', NULL, 'Rajendra Kumar', NULL, 'U', NULL, 7),
('store', '4022b70285e468ff98d01073c52038b8', NULL, 'Rajesh Kumar', NULL, 'U', NULL, 8),
('je', '262516cca53750f4cffde610ff393df9', NULL, 'Sanjay Mishra', NULL, 'U', NULL, 9),
('si', '19dc148823d86491760fdeb5d0513869', NULL, 'Anmol Agnihotri', NULL, 'U', NULL, 10),
('mpa', '187629275d03c56022e1aff8c3459cb0', NULL, 'Ramakant Bajpai', NULL, 'U', NULL, 11),
('it', '078da9bf4bb0664f74ff262d5af9fab6', NULL, 'Anand Gupta', NULL, 'U', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cb_recpt`
--

CREATE TABLE `cb_recpt` (
  `id` int(11) NOT NULL,
  `CB_DAK_NO` int(11) NOT NULL,
  `CB_DAK_REC_NO` varchar(50) NOT NULL,
  `CB_DAK_DATE` varchar(20) NOT NULL,
  `CB_DAK_TOWHOM` varchar(100) NOT NULL,
  `CB_DAK_SUB` varchar(100) NOT NULL,
  `CB_DAK_FILENO` varchar(20) DEFAULT NULL,
  `CB_DAK_REMARK` varchar(100) DEFAULT NULL,
  `CB_DAK_TYPE` varchar(10) NOT NULL,
  `CB_DAK_N_DATE` varchar(20) NOT NULL,
  `CB_DAK_LANG` varchar(1) NOT NULL DEFAULT '',
  `CB` varchar(15) DEFAULT NULL,
  `CB_DAK_RTYPE` varchar(10) NOT NULL,
  `CB_DAK_RDATE` varchar(20) NOT NULL DEFAULT 'NM',
  `CB_DAK_RTHROUGH` varchar(10) NOT NULL,
  `IsReplySent` varchar(5) DEFAULT NULL,
  `ReplyDate` varchar(20) DEFAULT NULL,
  `ReplyRemark` varchar(250) DEFAULT NULL,
  `ReplyLetterNo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_recpt`
--

INSERT INTO `cb_recpt` (`id`, `CB_DAK_NO`, `CB_DAK_REC_NO`, `CB_DAK_DATE`, `CB_DAK_TOWHOM`, `CB_DAK_SUB`, `CB_DAK_FILENO`, `CB_DAK_REMARK`, `CB_DAK_TYPE`, `CB_DAK_N_DATE`, `CB_DAK_LANG`, `CB`, `CB_DAK_RTYPE`, `CB_DAK_RDATE`, `CB_DAK_RTHROUGH`, `IsReplySent`, `ReplyDate`, `ReplyRemark`, `ReplyLetterNo`) VALUES
(1, 10, '4', '18-12-2017', 'Principal Director Central Command Lucknow', 'Regarding Cadre Restructure', '74/Adm/LC16/Cadre/48', 'Test Update', 'DGDE', '09-01-2018', 'E', '1513585713', 'VIP', '18-12-2017', 'NP', 'Yes', '22-12-2017', 'Sent', '116/PE/School/4289'),
(2, 11, '1', '18-12-2017', 'DGDE', 'Defence Estate Day 2017', '23/DED/2017/4587', '', 'N', '18-12-2017', 'E', '1513586037', 'Normal', '18-12-2018', 'NP', 'Yes', '21-12-2017', NULL, NULL),
(3, 12, '1', '18-12-2017', 'Station Head Quarter', 'Regarding Mini Marathon', '24/LCQ/Mini/78', '', 'A', '18-12-2017', 'E', '1513586207', 'Normal', '30-12-2018', 'NP', 'Yes', '23-12-2017', NULL, NULL),
(4, 13, '2', '22-12-2017', 'PDDE', 'Regarding ACP', '52/LC14/24/D/7896', '', 'PDDE', '22-12-2017', 'E', '1513927425', 'Urgent', '30-12-2018', 'NP', 'Yes', '11-01-2018', 'os', '14/GS/LabourSupply/432'),
(5, 14, '2', '22-12-2017', 'PDDE', 'Regarding Swachh Bharat', '', '', 'PDDE', '22-12-2017', 'E', '1513930313', 'Urgent', 'NM', 'NP', NULL, NULL, NULL, NULL),
(6, 15, '1', '23-12-2017', 'DGDE', 'For Promotion', '56/Promotion/LC2/C/D', '', 'DGDE', '23-12-2017', 'E', '1514017018', 'Normal', 'NM', 'NP', NULL, NULL, NULL, NULL),
(7, 16, '5', '23-12-2017', 'Army', 'Medical Camp', '27/LCQ/Adm/123', '', 'A', '23-12-2017', 'E', '1514017716', 'Urgent', 'NM', 'NP', NULL, NULL, NULL, NULL),
(8, 17, '8', '23-12-2017', 'OCF', 'Service Charges', '87/OCF/CBS/SC/235', '', 'OCF', '23-12-2017', 'E', '1514017782', 'Urgent', '28-12-2017', 'NP', NULL, NULL, NULL, NULL),
(9, 18, '4', '23-12-2017', 'Pdde', 'REGARDING ACP', '45/ACP/LC6', '', 'PDDE', '23-12-2017', 'E', '1514026176', 'Urgent', '30-12-2017', 'NP', NULL, NULL, NULL, NULL),
(10, 19, '2', '25-12-2017', 'PDDE', 'Regaridng Swachh Surveskshan 2018', '78/test/Swachh', '', 'PDDE', '29-12-2017', 'E', '1514548188', 'Normal', '30-12-2017', 'NP', NULL, NULL, NULL, NULL),
(11, 20, '4', '30-12-2017', 'testing', 'testing', 'testing', '', 'DGDE', '29-12-2017', 'E', '1514548678', 'Normal', '01-01-2018', 'BH', NULL, NULL, NULL, NULL),
(12, 21, '1', '24-12-2017', 'PDDE', 'Regaridng Swachh Surveskshan 2018', '1628686', '', 'NPS', '29-12-2017', 'E', '1514549232', 'VIP', '30-12-2017', 'BH', NULL, NULL, NULL, NULL),
(13, 22, '1', '10-01-2018', 'OCF', 'Service Charges', '87/OCF/CBS/SC/235', '', 'OCF', '10-01-2018', 'E', '1515582656', 'Normal', '', 'NP', NULL, NULL, NULL, NULL),
(14, 22, '1', '10-01-2018', 'OCF', 'Service Charges', '87/OCF/CBS/SC/435', '', 'OCF', '10-01-2018', 'E', '1515582656', 'Normal', '', 'NP', NULL, NULL, NULL, NULL),
(15, 24, '4', '10-01-2018', 'Test', 'Test', '676767676', 'Test', 'DGDE', '10-01-2018', 'E', '1515583060', 'Normal', '', 'BH', NULL, NULL, NULL, NULL),
(18, 27, '1', '30-01-2018', 'asas', 'asas', 'asas', 'asas', 'DGDE', '10-01-2018', 'E', '1515584552', 'Normal', '', 'NP', NULL, NULL, NULL, NULL),
(19, 28, '1', '30-01-2018', 'sdadad', 'add', 'adad', 'adad', 'DGDE', '10-01-2018', 'E', '1515584839', 'Normal', '', 'NP', NULL, NULL, NULL, NULL),
(20, 29, '1', '10-01-2018', 'Hindi', 'Hindi', 'Hindi', 'Hidi', 'DGDE', '10-01-2018', 'H', '1515584981', 'Normal', '', 'NP', NULL, NULL, NULL, NULL),
(21, 30, '1', '15-01-2018', 'asasa', 'asas', 'ass', 'asas', 'DGDE', '12-01-2018', 'H', '1515758422', 'Normal', '29-01-2018', 'NP', NULL, NULL, NULL, NULL),
(22, 31, '1', '29-01-2018', 'sasas', 'asasasasasas', 'asasa2222222', '', '', '25-01-2018', 'E', '1516863445', '', '', 'BH', NULL, NULL, NULL, NULL),
(23, 32, '1', '02-01-2018', '1', '1', '1', '', '', '25-01-2018', 'E', '1516880889', '', '', 'NP', NULL, NULL, NULL, NULL),
(24, 33, '0', '04-01-2018', '2', '2', '2', '', '', '25-01-2018', 'E', '1516881145', '', '', 'NP', NULL, NULL, NULL, NULL),
(25, 34, '1', '31-01-2018', '3', '3', '3', '', '', '25-01-2018', 'E', '1516881874', '', '', 'NP', NULL, NULL, NULL, NULL),
(26, 35, '4', '19-03-2018', 'PDDE', 'Regaridng Swachh Surveskshan 2018', '87/OCF/CBS/SC/235', '', 'PDDE', '19-03-2018', 'E', '1521445728', 'Normal', '22-03-2018', 'NP', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dak_no`
--

CREATE TABLE `dak_no` (
  `id` int(11) NOT NULL,
  `dak_no` varchar(100) DEFAULT NULL,
  `d_type` varchar(10) DEFAULT NULL,
  `u_date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dak_no`
--

INSERT INTO `dak_no` (`id`, `dak_no`, `d_type`, `u_date`) VALUES
(1, '36', 'inward', NULL),
(2, '31', 'outward', NULL),
(3, '1', 'dgpd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dak_rece_cantt`
--

CREATE TABLE `dak_rece_cantt` (
  `id` int(11) NOT NULL,
  `u_id` varchar(10) DEFAULT NULL,
  `s_id` varchar(10) DEFAULT NULL,
  `Received` varchar(5) DEFAULT NULL,
  `ReceivedDate` varchar(20) DEFAULT NULL,
  `ReplySent` varchar(14) DEFAULT NULL,
  `ReplySentDate` varchar(20) DEFAULT NULL,
  `ReplySentFN` varchar(50) NOT NULL,
  `Remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dak_rece_cantt`
--

INSERT INTO `dak_rece_cantt` (`id`, `u_id`, `s_id`, `Received`, `ReceivedDate`, `ReplySent`, `ReplySentDate`, `ReplySentFN`, `Remarks`) VALUES
(1, '1513585713', '2', 'N', NULL, NULL, NULL, '', ''),
(2, '1513585713', '1', 'N', NULL, NULL, NULL, '', ''),
(3, '1513586037', '001', 'N', NULL, NULL, NULL, '', ''),
(4, '1513586207', '001', 'N', NULL, NULL, NULL, '', ''),
(5, '1513586207', '005', 'N', NULL, NULL, NULL, '', ''),
(6, '1513927425', '002', 'N', NULL, NULL, NULL, '', ''),
(7, '1513927425', '001', 'N', NULL, NULL, NULL, '', ''),
(8, '1513930313', '001', 'N', NULL, NULL, NULL, '', ''),
(9, '1513930313', '008', 'N', NULL, NULL, NULL, '', ''),
(10, '1513930313', '003', 'N', NULL, NULL, NULL, '', ''),
(11, '1514017018', '002', 'N', NULL, NULL, NULL, '', ''),
(12, '1514017018', '001', 'N', NULL, NULL, NULL, '', ''),
(13, '1514017716', '001', 'N', NULL, NULL, NULL, '', ''),
(14, '1514017782', '002', 'N', NULL, NULL, NULL, '', ''),
(15, '1514017782', '003', 'N', NULL, NULL, NULL, '', ''),
(16, '1514026176', '004', 'N', NULL, NULL, NULL, '', ''),
(17, '1514026176', '001', 'N', NULL, NULL, NULL, '', ''),
(18, '1514026176', '006', 'N', NULL, NULL, NULL, '', ''),
(19, '1514549232', '001', 'N', NULL, NULL, NULL, '', ''),
(20, '1514549232', '002', 'N', NULL, NULL, NULL, '', ''),
(21, '1515584839', '2', 'N', NULL, NULL, NULL, '', ''),
(22, '1515584839', '10', 'N', NULL, NULL, NULL, '', ''),
(23, '1515584981', '3', 'N', NULL, NULL, NULL, '', ''),
(24, '1515584981', '5', 'N', NULL, NULL, NULL, '', ''),
(25, '1515584981', '6', 'N', NULL, NULL, NULL, '', ''),
(26, '1515758422', '1', 'N', NULL, NULL, NULL, '', ''),
(27, '<br />\r\n<b', '1', 'N', NULL, NULL, NULL, '', ''),
(28, '<br />\r\n<b', '2', 'N', NULL, NULL, NULL, '', ''),
(29, '<br />\r\n<b', '1', 'N', NULL, NULL, NULL, '', ''),
(30, '<br />\r\n<b', '2', 'N', NULL, NULL, NULL, '', ''),
(31, '1513585713', '1', 'N', NULL, NULL, NULL, '', ''),
(32, '1513585713', '2', 'N', NULL, NULL, NULL, '', ''),
(33, '1521445728', '1', 'N', NULL, NULL, NULL, '', ''),
(34, '1521445728', '3', 'N', NULL, NULL, NULL, '', ''),
(35, '1521445728', '4', 'N', NULL, NULL, NULL, '', ''),
(36, '1521445728', '5', 'N', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `S_Id` int(11) NOT NULL,
  `S_NAME` varchar(15) DEFAULT NULL,
  `P_NAME` varchar(50) DEFAULT NULL,
  `User_Id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`S_Id`, `S_NAME`, `P_NAME`, `User_Id`) VALUES
(1, 'dummy_OS', 'M B Rastogi', 'Suvidha'),
(2, 'dummy', 'ys[kkdkj', 'user'),
(3, 'Account', 'Rajendra Saxena', 'account'),
(4, 'SK', 'Rajesh Kumar', 'store'),
(5, 'JE', 'Sanjay Kumar', 'je'),
(6, 'SI', 'Anmol Agnihotri', 'si'),
(7, 'Cashier', 'Ramakant Bajpai', 'mpa'),
(8, 'IT', 'Anand Gupta', 'it'),
(9, 'CPIO', 'M B Rastogi', 'os'),
(10, 'CPIO', 'M B Rastogi', 'os'),
(11, 'RC', 'M B Rastogi', 'os'),
(12, 'Dispensary', 'Abdul Qavi', 'os'),
(13, 'HM', 'Head Master School', 'os');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cb_dispatch`
--
ALTER TABLE `cb_dispatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_login`
--
ALTER TABLE `cb_login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cb_recpt`
--
ALTER TABLE `cb_recpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dak_no`
--
ALTER TABLE `dak_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dak_rece_cantt`
--
ALTER TABLE `dak_rece_cantt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD UNIQUE KEY `SE_NO` (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cb_dispatch`
--
ALTER TABLE `cb_dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cb_login`
--
ALTER TABLE `cb_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cb_recpt`
--
ALTER TABLE `cb_recpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dak_no`
--
ALTER TABLE `dak_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dak_rece_cantt`
--
ALTER TABLE `dak_rece_cantt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
