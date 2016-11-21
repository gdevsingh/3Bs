-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 08:02 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3bsconstruction`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `INVOICE_ID` int(30) NOT NULL,
  `CUSTOMER_NAME` char(30) NOT NULL,
  `CUSTOMER_ADDRESS` varchar(60) NOT NULL,
  `CUSTOMER_CONTACT` bigint(10) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PROJECT_ID` int(9) NOT NULL,
  `AMOUNT` double NOT NULL,
  `CASHCHEQUENUMBER` varchar(20) NOT NULL,
  `flat_number` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `CUSTOMER_NAME`, `CUSTOMER_ADDRESS`, `CUSTOMER_CONTACT`, `DATE`, `PROJECT_ID`, `AMOUNT`, `CASHCHEQUENUMBER`, `flat_number`) VALUES
(1, 'gurdev singh', '122/152 sarojoni nagar,kanpur', 8149801649, '2016-04-15 09:07:06', 2, 9999.999, 'cash', 0),
(2, 'manjeet singh', 'asdasd', 9876543234, '2016-04-15 09:08:58', 2, 23232323, 'CHEQUE', 0),
(3, '', '', 0, '2016-04-16 08:34:22', 1, 0, '', 0),
(4, 'asdas', 'asdas', 123123, '2016-04-16 08:53:29', 2, 13123, '1khkjl', 0),
(5, 'asdas', 'asdas', 123123, '2016-04-16 08:54:30', 2, 13123, '1khkjl', 0),
(6, 'asdas', 'asdas', 123123, '2016-04-16 08:55:07', 2, 13123, '1khkjl', 0),
(7, 'sadas', 'kjhkjhkj', 7687, '2016-04-16 08:56:07', 1, 687687, 'iuyhkj', 0),
(8, 'sadas', 'kjhkjhkj', 7687, '2016-04-16 08:58:14', 1, 687687, 'iuyhkj', 0),
(9, 'asdas', 'asdas', 123, '2016-04-16 09:22:33', 1, 12312, 'asdas', 0),
(10, 'bakshish singh', 'ahd', 1234567890, '2016-04-16 09:24:49', 1, 8765434, '887v', 0),
(11, 'bakshish singh', 'ahd', 1234567890, '2016-04-16 09:25:26', 1, 8765434, '887v', 0),
(12, 'bakshish singh', 'ahd', 1234567890, '2016-04-16 09:25:31', 1, 8765434, '', 0),
(13, 'bakshish singh', '', 1234567890, '2016-04-16 09:26:31', 1, 123, 'asd', 0),
(14, '', '', 1234567890, '2016-04-16 09:26:35', 1, 123, 'asd', 0),
(15, 'asdasd', 'jkhkj', 123, '2016-04-16 09:42:09', 1, 123, '123', 0),
(16, 'Gurdev Singh', '123/448 sarojonini nagar, kanpur', 8149801649, '2016-04-16 12:49:13', 1, 2500000, 'cash', 0),
(17, 'arjun', 'fdhdhggfghf', 43543, '2016-04-16 15:18:20', 2, 543543, 'ytfgf', 0),
(18, 'arjun', 'fdhdhggfghf', 43543, '2016-04-16 15:39:59', 2, 543543, 'ytfgf', 0),
(19, 'bhalinder singh', '123//448 gadarian purwa', 2321232123, '2016-04-16 16:56:56', 1, 2233123, 'lkashdkla213kn', 0),
(20, 'bhalinder singh', '123//448 gadarian purwa', 2321232123, '2016-04-16 16:57:11', 1, 2233123, 'lkashdkla213kn', 0),
(21, 'bhalinder singh', '123//448 gadarian purwa', 2321232123, '2016-04-16 16:57:34', 1, 2233123, 'lkashdkla213kn', 0),
(22, 'arveen singh', 'vikas puri,delhi', 9181918191, '2016-04-17 10:48:11', 1, 829289, 'cash', 101),
(23, 'arveen singh', 'vikas puri,delhi', 1212121212, '2016-04-17 10:50:49', 22, 3232321, 'cash', 301),
(24, 'SONU', 'kabari market', 8149801649, '2016-04-17 12:49:50', 1, 1234567, 'kchsjgnc2h', 301),
(25, 'SONU', 'kabari market', 8149801649, '2016-04-17 12:51:36', 1, 1234567, 'kchsjgnc2h', 301),
(26, 'SONU', 'kabari market', 8149801649, '2016-04-17 12:53:01', 1, 1234567, 'kchsjgnc2h', 301),
(27, 'asd', 'jkh', 123123, '2016-04-17 16:36:07', 1, 870, 'ddsa', 989),
(28, 'asd', 'kjkl', 121, '2016-04-17 16:38:03', 1, 121, '2121', 231),
(29, 'asdas', 'jhjkh', 7687, '2016-04-17 16:39:02', 1, 7676, '7798', 87),
(30, 'asd', 'hjg', 76, '2016-04-17 16:40:38', 1, 76, '76', 76),
(31, 'chanpreet singh', '123/448 vikas puri, h block, delhi', 9898787867, '2016-04-17 19:05:31', 1, 3200000, 'cash', 123),
(32, 'chanpreet singh', '123/448 vikas puri, h block, delhi', 9898787867, '2016-04-17 19:06:01', 1, 3200000, 'cash', 123),
(33, 'asdas', 'kjhkjh', 98908098, '2016-04-18 02:49:43', 1, 989, '908098', 980),
(34, 'asdas', 'kjhkjh', 98908098, '2016-04-18 02:51:03', 1, 989, '908098', 980),
(35, 'asdas', 'kjhkjh', 98908098, '2016-04-18 02:53:29', 1, 989, '908098', 980),
(36, 'asdas', 'kjhkjh', 98908098, '2016-04-18 02:53:54', 1, 989, '908098', 980),
(37, 'hh', 'iuiou', 8978, '2016-04-18 02:57:19', 1, 878, '878', 878),
(38, 'hh', 'iuiou', 8978, '2016-04-18 02:57:33', 1, 878, '878', 878),
(39, 'hh', 'iuiou', 8978, '2016-04-18 02:58:56', 1, 878, '878', 878),
(40, 'hh', 'iuiou', 8978, '2016-04-18 02:59:05', 1, 878, '878', 878),
(41, 'hh', 'iuiou', 8978, '2016-04-18 03:00:25', 1, 878, '878', 878),
(42, 'hh', 'iuiou', 8978, '2016-04-18 03:01:56', 1, 878, '878', 878),
(43, 'hh', 'iuiou', 8978, '2016-04-18 03:03:28', 1, 878, '878', 878),
(44, 'hh', 'iuiou', 8978, '2016-04-18 03:06:33', 1, 878, '878', 878),
(45, 'hh', 'iuiou', 8978, '2016-04-18 03:07:26', 1, 878, '878', 878),
(46, 'hh', 'iuiou', 8978, '2016-04-18 03:08:38', 1, 878, '878', 878),
(47, 'hh', 'iuiou', 8978, '2016-04-18 03:19:06', 1, 878, '878', 878),
(48, 'hh', 'iuiou', 8978, '2016-04-18 03:29:59', 1, 878, '878', 878),
(49, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:43:44', 1, 78687, '7687', 876876),
(50, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:44:59', 1, 78687, '7687', 876876),
(51, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:45:30', 1, 78687, '7687', 876876),
(52, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:47:03', 1, 78687, '7687', 876876),
(53, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:50:16', 1, 78687, '7687', 876876),
(54, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:51:13', 1, 78687, '7687', 876876),
(55, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:51:34', 1, 78687, '7687', 876876),
(56, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:51:53', 1, 78687, '7687', 876876),
(57, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:52:35', 1, 78687, '7687', 876876),
(58, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:53:04', 1, 78687, '7687', 876876),
(59, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:53:55', 1, 78687, '7687', 876876),
(60, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:54:26', 1, 78687, '7687', 876876),
(61, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:55:31', 1, 78687, '7687', 876876),
(62, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:56:16', 1, 78687, '7687', 876876),
(63, 'QWEQW', 'UIY787', 76876, '2016-04-18 03:57:39', 1, 78687, '7687', 876876),
(64, 'asd', 'ioyi', 797, '2016-04-18 13:46:39', 1, 87, '878', 878),
(65, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:53:19', 1, 987987, '789', 789),
(66, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:54:45', 1, 987987, '789', 789),
(67, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:55:34', 1, 987987, '789', 789),
(68, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:56:02', 1, 987987, '789', 789),
(69, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:58:48', 1, 987987, '789', 789),
(70, 'waheguru', 'heaven', 9879879877, '2016-04-18 13:59:51', 1, 987987, '789', 789),
(71, 'hsbd', 'Bsbd', 776, '2016-04-18 14:33:41', 1, 76, 'Cash', 676),
(72, 'saurab badhoria', 'asdasd', 87897987, '2016-04-20 07:36:19', 22, 9098, 'cash', 212),
(73, 'asd', 'yiuy', 6776, '2016-04-24 08:45:57', 4, 76, '7676', 12),
(74, 'chan', 'asd', 76876, '2016-04-24 09:10:22', 4, 678, '876876', 123),
(75, 'weqwe`', 'iuii', 787, '2016-04-24 09:36:53', 1, 787, 'cash', 87),
(76, 'asdas', 'uiyui', 87, '2016-04-24 11:25:20', 1, 87, '87', 87),
(77, 'asdas', 'jkjh', 8789, '2016-04-24 12:17:06', 1, 897, '789789', 89),
(78, 'bhaalinder singh', 'kabari market', 9181716151, '2016-04-24 14:21:01', 1, 718191, '2312', 123),
(79, 'chanpreet kaur', 'asdasd', 728292929, '2016-04-24 14:25:14', 48, 1000000, 'cash', 401);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `PROJECT_ID` int(9) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ADDRES` varchar(60) NOT NULL,
  `NUMBER_OF_FLATS` int(3) NOT NULL,
  `TOTAL_AREA` double NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `REVENUE` double NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`PROJECT_ID`, `NAME`, `ADDRES`, `NUMBER_OF_FLATS`, `TOTAL_AREA`, `START_DATE`, `END_DATE`, `REVENUE`, `STATUS`) VALUES
(1, 'arsh heights', '133/1/17 walhekarwadi akurdi pune', 32, 999.999, '2016-04-13', '2016-04-23', 9999.999, 0),
(2, 'hjgjkhg', 'khghkgkj', 21, 1213, '1903-10-23', '1903-10-23', 124124, 0),
(3, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(4, 'arjun heights', 'kabari market,kanpur', 10, 431, '1900-12-14', '1900-12-14', 10000000, 1),
(5, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(6, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(7, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(8, 'aaa', 'bbbb', 12, 21212, '2016-04-14', '2016-04-30', 1212121, 1),
(9, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(10, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(11, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(12, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(13, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(14, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(15, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(16, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(17, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(18, 'a', 'b', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(19, 'simar heights', 'walhekarwadi,pune', 12, 1020, '2016-05-12', '0000-00-00', 0, 0),
(20, 'simar heights', 'walhekarwadi,pune', 12, 1020, '2016-05-12', '0000-00-00', 0, 0),
(21, 'guru', 'adasd', 23, 1202, '2016-04-16', '0000-00-00', 0, 0),
(22, 'ABC FARMS', 'KP', 22, 123123, '2016-04-13', '0000-00-00', 0, 0),
(23, 'asdas', 'n', 12, 324312, '2016-04-21', '0000-00-00', 0, 0),
(24, 'nayan heights', 'h-123 vikas puri, new delhi', 6, 987, '2016-04-06', '0000-00-00', 0, 1),
(25, 'admin', 'asd', 3123, 131, '0000-00-00', '0000-00-00', 0, 1),
(26, 'manam', 'kjkh', 89, 0, '0000-00-00', '0000-00-00', 0, 1),
(27, 'asd', 'jhjk', 87, 876, '0000-00-00', '0000-00-00', 0, 1),
(28, 'asdas', 'kjlkj', 12, 3112, '0000-00-00', '0000-00-00', 0, 1),
(29, 'demo', 'demo', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(30, 'dsa', 'dsa', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(31, 'asda', 'sdsd', 123, 1312, '0000-00-00', '0000-00-00', 0, 1),
(32, 'asdasdf', 'dfsd', 213, 21, '0000-00-00', '0000-00-00', 0, 1),
(33, 'asda121as', 'hg', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(34, 'qweq`', 'jhjh', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(35, 'hg', 'hjg', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(36, 'kjg', 'kjg', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(37, 'kj', 'jh', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(38, 'asd', 'khj', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(39, '1237', '8', 87, 897, '0000-00-00', '0000-00-00', 0, 1),
(40, '123', '123', 23, 231, '0000-00-00', '0000-00-00', 0, 1),
(41, 'asd', 'jh', 9, 9, '0000-00-00', '0000-00-00', 0, 1),
(42, 'qwe', 'qwe', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(43, 'q32', 'uiy', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(44, 'khjh', 'jhj', 87, 87, '0000-00-00', '0000-00-00', 0, 1),
(45, 'qwe', 'qwe', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(46, 'qwe', 'qwe', 12, 12, '0000-00-00', '0000-00-00', 0, 1),
(47, 'qwe', 'qwe', 12, 12, '2016-04-26', '0000-00-00', 0, 1),
(48, 'ashmeet heights', 'asdasdasdasd', 43, 364456, '2016-04-13', '0000-00-00', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`INVOICE_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`PROJECT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `INVOICE_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `PROJECT_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
