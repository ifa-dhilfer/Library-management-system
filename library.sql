-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 11:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Author_ID` varchar(10) NOT NULL,
  `Author_FName` char(15) NOT NULL,
  `Author_LName` char(15) NOT NULL,
  `Author_Initial` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_ID`, `Author_FName`, `Author_LName`, `Author_Initial`) VALUES
('A1', 'Kurt', 'Main', 'KM'),
('A2', 'Niten', 'Chand', 'NC'),
('A3', 'JK', 'Rowling', 'JKR'),
('A4', 'Konai Helu', 'Thaman', 'KHT'),
('A9', 'Eddie', 'Statham', 'ES'),
('A10', 'Lei', 'Lulong', 'LL'),
('A5', 'Cheek', 'Chong', 'CC'),
('A6', 'Shen', 'Chen', 'SC'),
('A7', 'Babaleo', 'Babaleo', 'BB'),
('A8', 'Mesa', 'Vutu', 'MV');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Bk_Num` varchar(10) NOT NULL,
  `Bk_Title` varchar(30) NOT NULL,
  `Bk_Entrydate` date NOT NULL,
  `BkTypeID` varchar(10) NOT NULL,
  `Bk_Year` year(4) NOT NULL,
  `Bk_CallNum` varchar(15) NOT NULL,
  `Bk_NumPages` varchar(50) NOT NULL,
  `Bk_Height` varchar(15) NOT NULL,
  `Bk_Remarks` varchar(20) NOT NULL,
  `Bk_CpyRightdate` date NOT NULL,
  `Publisher_ID` varchar(10) NOT NULL,
  `ShelfID` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Bk_Num`, `Bk_Title`, `Bk_Entrydate`, `BkTypeID`, `Bk_Year`, `Bk_CallNum`, `Bk_NumPages`, `Bk_Height`, `Bk_Remarks`, `Bk_CpyRightdate`, `Publisher_ID`, `ShelfID`) VALUES
('B1', 'Joomla Guide', '2016-10-13', 'BT1', 2016, '1', '100', '200', 'Excellent', '2016-10-13', 'PID1', 'S1'),
('B2', 'Information System I', '2016-10-14', 'BT3', 2016, '2', '200', '200', 'Good', '2016-10-14', 'PID2', 'S30'),
('B3', 'Introduction to PHP', '2016-10-01', 'BT5', 2011, '5', '500', '30', 'Very Good', '2016-10-01', 'PID5', 'S2'),
('B6', 'Beginner HTML', '2016-10-03', 'BT6', 2015, '8', '150', '30', 'Good', '2016-10-01', 'PID4', 'S4'),
('B5', 'CSS For Dummies', '2016-10-12', 'BT4', 2012, '6', '250', '30', 'Outdated', '2016-10-04', 'PID6', 'S6'),
('B4', 'MYSQL 101', '2016-10-31', 'BT7', 2015, '7', '400', '30', 'OK', '2016-10-31', 'PID7', 'S7'),
('B7', 'Advanced VB.NET', '2016-10-07', 'BT2', 2014, '4', '450', '30', 'OK', '2016-09-04', 'PID3', 'S3'),
('B8', 'Data Mining', '2016-10-11', 'BT9', 2011, '3', '100', '20', 'Very Good', '2016-10-01', 'PID9', 'S8'),
('B9', 'Project Management', '2016-10-08', 'BT8', 2016, '9', '500', '30', 'Excellent', '2016-10-07', 'PID8', 'S9'),
('B10', 'C++ Fundamentals', '2016-09-14', 'B10', 2014, '14', '300', '30', 'Good', '2016-09-05', 'PID11', 'S11'),
('B11', 'Introduction to Android', '2015-08-12', 'BT14', 2015, '13', '250', '30', 'OK', '2015-07-01', 'PID14', 'S13'),
('B12', 'Distributed Systems', '2016-05-10', 'BT10', 2013, '12', '100', '30', 'Very Good', '2016-05-10', 'PID12', 'S12'),
('B13', 'Java for Dummies', '2016-01-12', 'BT15', 2010, '10', '350', '30', 'Excellent', '2016-01-10', 'PID10', 'S10'),
('B14', 'Kurt - The Great', '2016-10-07', 'BT7', 2016, '4', '1000', '30', 'Awesome', '2016-10-06', 'PID4', 'S4'),
('Bk12', 'Snow White', '2016-10-01', 'B16', 2003, 'CN11', '80', '30', 'Cool', '2016-09-01', 'PID0', 'SID0'),
('BK11', 'TinTin', '2016-10-14', 'BT10', 2004, 'CN123', '50', '30', 'Good', '2016-09-01', 'PID1', 'SID1'),
('Bk125', 'Flash', '2016-10-08', 'BT10', 2001, 'CN12', '20', '30', 'Cool', '2016-09-02', 'PID0', 'SID0'),
('Bk1256', 'Art of War', '2016-10-20', 'BT10', 2000, 'CN789', '25', '30', 'Cool', '2016-09-02', 'PID0', 'SID0'),
('Bk7896', 'Cool Runnings', '2016-10-01', 'BT10', 2013, 'CN258', '50', '30', 'Very Good', '2016-09-08', 'PID0', 'SID0');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `Bk_Num` varchar(10) NOT NULL,
  `Author_ID` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`Bk_Num`, `Author_ID`) VALUES
('B1', 'A3'),
('B10', 'A10'),
('B2', 'A1'),
('B3', 'A2'),
('B4', 'A4'),
('B5', 'A5'),
('B6', 'A6'),
('B7', 'A7'),
('B8', 'A8'),
('B9', 'A9');

-- --------------------------------------------------------

--
-- Table structure for table `bookcopy`
--

CREATE TABLE `bookcopy` (
  `Bk_AccessionNum` varchar(10) NOT NULL,
  `BkCpy_EntryDate` date NOT NULL,
  `Bk_Cpy_Price` varchar(10) NOT NULL,
  `Bk_Num` varchar(10) NOT NULL,
  `Status_ID` varchar(10) NOT NULL,
  `Inv_Num` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcopy`
--

INSERT INTO `bookcopy` (`Bk_AccessionNum`, `BkCpy_EntryDate`, `Bk_Cpy_Price`, `Bk_Num`, `Status_ID`, `Inv_Num`) VALUES
('BA1', '2016-10-04', '100', 'B1', 'BS2', 'inv1'),
('BA2', '2016-11-02', '120', 'B2', 'BS3', 'INV2'),
('BA3', '2011-05-02', '150', 'B3', 'BS6', 'INV4'),
('BA4', '2013-04-07', '255', 'B6', 'BS5', 'INV6'),
('BA5', '2014-09-09', '500', 'B4', 'BS8', 'INV8'),
('BA6', '2012-11-08', '652', 'B5', 'BS9', 'INV3'),
('BA7', '2016-05-08', '855', 'B8', 'BS10', 'INV5'),
('BA8', '2014-05-07', '255', 'B9', 'BS7', 'INV7'),
('BA9', '2012-12-06', '356', 'B7', 'BS1', 'INV9'),
('BA10', '2002-06-16', '455', 'B10', 'BS4', 'INV10');

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `Status_ID` varchar(10) NOT NULL,
  `Status_Desc` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`Status_ID`, `Status_Desc`) VALUES
('BS2', 'Available'),
('BS1', 'Un Available'),
('BS3', 'Available'),
('BS4', 'Available'),
('BS5', 'Not Available'),
('BS6', 'Un Available'),
('BS7', 'Available'),
('BS8', 'Available'),
('BS9', 'Available'),
('BS10', 'Available'),
('BS11', 'Un Available');

-- --------------------------------------------------------

--
-- Table structure for table `booksubject`
--

CREATE TABLE `booksubject` (
  `Subject_ID` varchar(10) NOT NULL,
  `Bk_Num` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booksubject`
--

INSERT INTO `booksubject` (`Subject_ID`, `Bk_Num`) VALUES
('S1', 'B6'),
('S10', 'B10'),
('S3', 'B2'),
('S4', 'B3'),
('S5', 'B4'),
('S6', 'B5'),
('S7', 'B7'),
('S8', 'B8'),
('S9', 'B9');

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `BkTypeID` varchar(10) NOT NULL,
  `BkType_Desc` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`BkTypeID`, `BkType_Desc`) VALUES
('BT10', 'Horror.'),
('BT9', 'Action and Adve'),
('BT8', 'Romance.'),
('BT7', 'Drama.'),
('BT6', 'Satire'),
('BT5', 'Scentific'),
('BT4', 'Cartoon'),
('BT3', 'Imaginative'),
('BT2', 'Non-Fiction'),
('BT1', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Inv_Num` varchar(10) NOT NULL,
  `Inv_date` date NOT NULL,
  `Supp_Num` varchar(10) NOT NULL,
  `Inv_PayDate` date NOT NULL,
  `Inv_BankDftNum` varchar(10) NOT NULL,
  `Inv_Remarks` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Inv_Num`, `Inv_date`, `Supp_Num`, `Inv_PayDate`, `Inv_BankDftNum`, `Inv_Remarks`) VALUES
('inv2', '2016-10-03', 'sup2', '2016-10-25', '532414', 'pending'),
('inv1', '2016-01-02', 'sup1', '2016-05-01', '24124', 'OK'),
('inv3', '2015-01-01', 'sup3', '2016-01-01', '23512', 'paid'),
('inv4', '2015-12-23', 'sup4', '2016-01-01', '25784', 'pending'),
('inv5', '2016-04-23', 'sup5', '2016-04-23', '589745', 'paid'),
('inv6', '2016-04-27', 'sup6', '2016-05-23', '887794', 'paid'),
('inv7', '2016-05-05', 'sup7', '2016-05-10', '3452234', 'pending'),
('inv8', '2016-05-08', 'sup8', '2016-05-14', '3445784', 'paid'),
('inv9', '2016-05-18', 'sup9', '2016-05-20', '3445879', 'paid'),
('inv10', '2016-05-23', 'sup10', '2016-05-31', '659763', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_Num` varchar(15) NOT NULL,
  `Loan_Date` date NOT NULL,
  `Staff_ID` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Loan_Num`, `Loan_Date`, `Staff_ID`) VALUES
('L5', '2016-10-06', '20'),
('L6', '2016-05-07', 'ST5'),
('L7', '2016-10-05', 'ST6'),
('L2', '2016-10-29', 'ST2'),
('L1', '2016-10-31', 'ST1'),
('L3', '2016-10-02', 'ST3'),
('L8', '2016-11-04', 'ST8'),
('L10', '2016-08-02', '27'),
('L11', '2016-12-01', 'ST11'),
('L4', '2016-10-18', '27'),
('L9999999999', '2016-10-01', '38');

-- --------------------------------------------------------

--
-- Table structure for table `loanitems`
--

CREATE TABLE `loanitems` (
  `LoanLine_Num` varchar(15) NOT NULL,
  `Loan_Num` varchar(10) NOT NULL,
  `LoanLine_DueDate` date NOT NULL,
  `LoanLine_ReturnDate` date NOT NULL,
  `LoanLine_Remarks` varchar(15) NOT NULL,
  `Bk_AccessionNum` varchar(10) NOT NULL,
  `LoanTyp_ID` varchar(10) NOT NULL,
  `Loan_Clear` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanitems`
--

INSERT INTO `loanitems` (`LoanLine_Num`, `Loan_Num`, `LoanLine_DueDate`, `LoanLine_ReturnDate`, `LoanLine_Remarks`, `Bk_AccessionNum`, `LoanTyp_ID`, `Loan_Clear`) VALUES
('LL4', 'L5', '2016-12-21', '2016-11-02', 'OK', 'BA3', 'LT2', 'Yes'),
('LL10', 'L10', '2016-10-04', '0000-00-00', 'OK', 'B7', 'L4', 'No'),
('LL5', 'L5', '2016-12-26', '0000-00-00', 'OK', 'BA4', 'LT6', 'No'),
('LL6', 'L7', '2016-10-03', '2016-10-02', 'OK', 'BA5', 'LT9', 'Yes'),
('LL7', 'L9', '2016-10-19', '2016-10-16', 'OK', 'BA6', 'LT8', 'Yes'),
('LL8', 'L8', '2016-10-26', '2016-10-23', 'OK', 'BA9', 'LT4', 'Yes'),
('LL9', 'L8', '2016-10-12', '2016-10-10', 'OK', 'BA10', 'LT4', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `LoanTyp_ID` varchar(10) NOT NULL,
  `LoanTyp_Desc` char(15) NOT NULL,
  `LoanTyp_Duration` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`LoanTyp_ID`, `LoanTyp_Desc`, `LoanTyp_Duration`) VALUES
('LT2', 'Month', '30'),
('LT1', '1 Week', '7'),
('LT4', '2 Weeks', '14'),
('LT5', '3 Weeks', '21'),
('LT6', '4 Weeks', '28'),
('LT8', '5 Days', '5'),
('LT10', '1 year', '365');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Publisher_ID` varchar(10) NOT NULL,
  `Publisher_Name` char(20) NOT NULL,
  `Publisher_City` char(20) NOT NULL,
  `Publisher_Country` char(25) NOT NULL,
  `Publisher_Addr` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_ID`, `Publisher_Name`, `Publisher_City`, `Publisher_Country`, `Publisher_Addr`) VALUES
('P1', 'Nit', 'Nigeria', 'Nigeria', '11 Neat Street'),
('P2', 'Kurt', 'Rotuma', 'Rotuma', '69 Rotuma Street'),
('P3', 'Shiu', 'Rio', 'Brazil', '20 Brazil road'),
('P4', 'Chang', 'China', 'China', '38 Xenxen road'),
('P5', 'Jackie', 'Japan', 'Japan', '42 Japan Road'),
('P6', 'Lilly', 'Suva', 'Fiji', '42 Sukuna place'),
('P7', 'Mere', 'Lautoka', 'Fiji', '1 Rifle Range Road'),
('P8', 'James', 'Australia', 'Australia', '42 South Post Road'),
('P9', 'Julia', 'Jamaica', 'Jamaica', '10 Jamaica Road');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `ShelfID` varchar(10) NOT NULL,
  `ShelfDesc` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`ShelfID`, `ShelfDesc`) VALUES
('S2', 'History'),
('S1', 'Biology'),
('S3', 'Math'),
('S4', 'Computer Sci.'),
('S5', 'Cookery'),
('S6', 'Capentery'),
('S7', 'Wedding'),
('S8', 'Sex Ed.'),
('S10', 'Reserach');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(10) NOT NULL,
  `Staff_FName` char(20) NOT NULL,
  `Staff_LName` char(20) NOT NULL,
  `Staff_Username` varchar(25) NOT NULL,
  `Staff_Pwd` varchar(255) NOT NULL,
  `Staff_AccountType` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_FName`, `Staff_LName`, `Staff_Username`, `Staff_Pwd`, `Staff_AccountType`) VALUES
(35, 'Niten', 'Gounder', 'gounder', '$2y$10$LH/W1nEWjbiLcnMHVOzSPeRpSNJkCR0jEC4jpFNaGs1YrJ/Fwytma', 'user'),
(34, 'Kurt', 'Mani', 'Biscuit', '$2y$10$rxjCX4Fl2CPAqojjdMjLDujN5mctoaOipE.N5w4ddH6r9syhTY.Cq', 'user'),
(33, 'Eparama', 'Veivuke', 'Epa', '$2y$10$HdfGhMRqPfrSSWd58Jn/ue94GZcaFPugtGAez1uLPbBfRFG01LYTa', 'user'),
(27, 'Avishan', 'Ram', 'avishan', '$2y$10$4eTwTlwUFSSfResWHT3ku.LMUQC8oEJjvbjrv.yvi8zMDJeXfwvJe', 'user'),
(31, 'Admin', 'Admin', 'admin', '$2y$10$VJJCQQeZ9Ty.guNgqP99VOqIvXCgDzNGhXU.ayipLjAcmsr.yKgtu', 'admin'),
(20, 'Jone', 'Tabaiwalu', 'jone', '$2y$10$lzVg2aZadQCiDL3MycwB.uPgYTWT883X5K0rUfiYxU2uFmaxgUSju', 'user'),
(39, 'new', 'new', 'new', '$2y$10$3qlg0DVxNJkPuIHgQZfJq.ghM49rANjc1JHU5pBJjz4g0l2n89Ejq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` varchar(10) NOT NULL,
  `Subject_Desc` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Desc`) VALUES
('S10', 'Mystery'),
('S3', 'Fastasy'),
('S4', 'Sci-Fi'),
('S5', 'Fairytale'),
('S6', 'Children'),
('S7', 'Romance'),
('S8', 'Horror'),
('S9', 'Drama'),
('S11', 'Culture'),
('S17', 'Special'),
('S12', 'Education'),
('S13', 'Nature'),
('S14', 'Medical'),
('S15', 'Rated'),
('S16', 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `sug_id` int(11) NOT NULL,
  `sug_subject` varchar(25) NOT NULL,
  `sug_feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`sug_id`, `sug_subject`, `sug_feedback`) VALUES
(1, 'Boring', 'Books are boring, please do something about it. Thank you.');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supp_Num` varchar(10) NOT NULL,
  `Supp_Name` char(15) NOT NULL,
  `Supp_Phone` varchar(10) NOT NULL,
  `Supp_Email` varchar(20) NOT NULL,
  `Supp_Fax` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supp_Num`, `Supp_Name`, `Supp_Phone`, `Supp_Email`, `Supp_Fax`) VALUES
('sup1', 'Bondwell', '6792132', 'bondwell@yahoo.com', '24142'),
('sup2', 'Courts', '6792141', 'court@gmail.com', '241532'),
('sup3', 'Brijlal', '6795879', 'blal@hotmail.com', '555677'),
('sup4', 'USP', '6789457', 'usp@supplier.usp.ac.', '324578'),
('sup5', 'AUT', '008180640', 'aut@supplier.ac.nz', '995478'),
('sup6', 'Dick Smith', '3365878', 'ds@yahoo.com', ''),
('sup7', 'Library-London', '08225487', 'llondon@gmail.co.uk', ''),
('sup8', 'Book Empire', '458745', 'empirebooks@hotmail.', '3355669'),
('sup9', 'Suite Books', '7357408', 'books@hotmail.com', '8897445'),
('sup10', 'Pacific library', '8345400', 'plibrary@yahoo.com', '4558786');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_ID`),
  ADD UNIQUE KEY `Author_FName_I1` (`Author_FName`),
  ADD UNIQUE KEY `Author_LName_I2` (`Author_LName`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Bk_Num`),
  ADD UNIQUE KEY `Bk_Title_I1` (`Bk_Title`),
  ADD KEY `ShelfID_fk3` (`ShelfID`),
  ADD KEY `BkTypeID_fk1` (`BkTypeID`),
  ADD KEY `Publisher_ID_fk2` (`Publisher_ID`);

--
-- Indexes for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`Bk_Num`,`Author_ID`),
  ADD KEY `Author_ID_fk_2` (`Author_ID`);

--
-- Indexes for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD PRIMARY KEY (`Bk_AccessionNum`),
  ADD KEY `Inv_Num_fk3` (`Inv_Num`),
  ADD KEY `Bk_Num_fk1` (`Bk_Num`),
  ADD KEY `Status_ID_fk2` (`Status_ID`);

--
-- Indexes for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`Status_ID`);

--
-- Indexes for table `booksubject`
--
ALTER TABLE `booksubject`
  ADD PRIMARY KEY (`Subject_ID`,`Bk_Num`),
  ADD KEY `Bk_Num_fk2` (`Bk_Num`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`BkTypeID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Inv_Num`),
  ADD UNIQUE KEY `Inv_Date_I1` (`Inv_date`),
  ADD KEY `Supp_Num_fk1` (`Supp_Num`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Loan_Num`),
  ADD UNIQUE KEY `Loan_Date_I1` (`Loan_Date`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `loanitems`
--
ALTER TABLE `loanitems`
  ADD PRIMARY KEY (`LoanLine_Num`,`Loan_Num`),
  ADD UNIQUE KEY `LoanLine_DueDate_I1` (`LoanLine_DueDate`),
  ADD KEY `LoanTyp_ID_fk3` (`LoanTyp_ID`),
  ADD KEY `Bk_AccessionNum_fk2` (`Bk_AccessionNum`),
  ADD KEY `Loan_Num_fk1` (`Loan_Num`);

--
-- Indexes for table `loantype`
--
ALTER TABLE `loantype`
  ADD PRIMARY KEY (`LoanTyp_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Publisher_ID`),
  ADD UNIQUE KEY `Publisher_Name_I1` (`Publisher_Name`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`ShelfID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD UNIQUE KEY `Staff_FName_I1` (`Staff_FName`),
  ADD UNIQUE KEY `Staff_LName_I2` (`Staff_LName`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD UNIQUE KEY `Subject_Desc_I1` (`Subject_Desc`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`sug_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supp_Num`),
  ADD UNIQUE KEY `Supp_Name_I1` (`Supp_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `sug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
