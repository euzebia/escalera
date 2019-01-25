-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 12:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escalera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `Password`) VALUES
(1, 'escalera', 'faithwalk');

-- --------------------------------------------------------

--
-- Table structure for table `expenditures`
--

CREATE TABLE `expenditures` (
  `Id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Amount` float NOT NULL,
  `RecordedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditures`
--

INSERT INTO `expenditures` (`Id`, `Category`, `Amount`, `RecordedOn`) VALUES
(1, 2, 2000, '2019-01-22 18:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_category`
--

CREATE TABLE `expenditure_category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `BudgetLine` varchar(10) NOT NULL,
  `RecordedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure_category`
--

INSERT INTO `expenditure_category` (`Id`, `Name`, `BudgetLine`, `RecordedOn`) VALUES
(1, 'Electricity', '', '2019-01-18 14:51:55'),
(2, 'Transport', '', '2019-01-22 18:11:52'),
(3, 'Donation', '', '2019-01-24 18:12:54'),
(4, 'Donation', 'DN', '2019-01-24 18:16:32'),
(5, 'Entertainment', 'ENT', '2019-01-24 18:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemId` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemId`, `Name`) VALUES
(1, 'Laminating pouches'),
(2, 'Art Books'),
(3, 'Super glue'),
(4, 'Art brushes'),
(5, 'Pens'),
(6, 'Books'),
(7, 'Calculators'),
(8, 'Cellotape'),
(9, 'Clear bags'),
(10, 'Clip boards'),
(11, 'Colours'),
(12, 'Correction fluid'),
(13, 'Cutter knives'),
(14, 'Realms'),
(15, 'Envelopes'),
(16, 'Erasers'),
(17, 'File fasteners'),
(18, 'Files'),
(19, 'Rulers'),
(20, 'Ink'),
(21, 'Staples'),
(22, 'Manilla charts'),
(23, 'Markers'),
(24, 'Masking tape'),
(25, 'Pencils'),
(26, 'Glue'),
(27, 'Packing tape'),
(28, 'Powder paint'),
(29, 'Price tags'),
(30, 'Punching machines'),
(31, 'Receipt books'),
(32, 'Rubber bands'),
(33, 'School chalk'),
(34, 'Scissors'),
(35, 'Sharpener'),
(36, 'Stamp pads'),
(37, 'Stapling machines'),
(38, 'Stick glue'),
(39, 'Sticky notes'),
(40, 'Success cards'),
(41, 'Wrapping papers'),
(42, 'Mathematical sets'),
(43, 'Bicycles');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `ItemId` int(11) DEFAULT NULL,
  `Option` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `ItemId`, `Option`) VALUES
(1, 1, 'A3'),
(2, 2, 'A4'),
(3, 1, 'A5'),
(4, 3, 'Alteco super glue 8g'),
(5, 4, 'Big'),
(6, 4, 'small'),
(7, 5, 'Bic'),
(8, 6, 'A5 96pages squared book'),
(9, 6, 'A5 Flower 4quire'),
(10, 6, '3 quire counter'),
(11, 6, '4 quire counter'),
(12, 6, 'A4 Manuscript'),
(13, 6, 'A5 Blue Manuscript'),
(14, 6, 'A5 Flower 3quire'),
(15, 6, 'Alps A5 48pages'),
(16, 6, 'Everest A4 200pages'),
(17, 6, 'Graph book'),
(18, 6, 'Picfare A5 96pages'),
(19, 6, 'Everest A4 96pages'),
(20, 6, 'A5 48pages squared book'),
(21, 6, 'Hand writing books'),
(22, 6, 'Short hand note books'),
(23, 7, 'Casio 401 functions Blue'),
(24, 7, 'Casio 240 functions Dup'),
(25, 7, 'Casio 401 functions White'),
(26, 9, 'None'),
(27, 6, 'Colouring book'),
(28, 11, 'Compo pens'),
(29, 11, 'Crayola'),
(30, 13, 'cutters No.18 (big)'),
(31, 14, 'Dolphin 500 sheets'),
(32, 6, 'Drawing book A3'),
(33, 15, '9x4'),
(34, 15, 'A4'),
(35, 15, 'A5'),
(36, 16, 'Nataraj'),
(37, 16, 'Pelikan'),
(38, 17, 'None'),
(39, 18, 'Management files'),
(40, 18, 'Manilla files'),
(43, 18, 'Ring binders'),
(44, 18, 'Box file'),
(45, 18, 'Box file new'),
(46, 18, 'Spring Files'),
(47, 5, 'Fountain pens'),
(48, 19, 'Haco School rulers'),
(49, 11, 'High lighters'),
(50, 20, 'Endorsing'),
(51, 11, 'Jumbo colours'),
(52, 21, 'kangaroo'),
(53, 42, 'Kofa Mathematical set'),
(54, 5, 'Linc offix'),
(55, 22, 'None'),
(56, 11, 'Marker pens'),
(57, 23, 'Permanent'),
(58, 23, 'Snow man'),
(59, 24, 'None'),
(60, 11, 'Nataraj colour pencils'),
(61, 25, 'Nataraj'),
(62, 5, 'Nataraj'),
(63, 19, 'Nataraj rulers'),
(64, 5, 'Nice clear pens'),
(65, 26, 'Novicol wood glue 250gms'),
(66, 26, 'Novicol wood glue 500gms'),
(67, 6, 'Numbers book'),
(68, 26, 'Office glue small'),
(69, 42, 'Oxford Mathematical sets'),
(70, 27, 'Brown big'),
(71, 27, 'Brown-medium'),
(72, 27, 'Clear-medium'),
(73, 11, 'Pelikan colours'),
(74, 25, '6B art pencil(Staedtler)'),
(75, 25, '4B art pencil(Staedtler)'),
(76, 25, '5H TD Pencil (Staedtler)'),
(77, 25, 'Picfare Gold'),
(78, 5, 'Smile wave'),
(79, 25, 'Picfare Gold pencil'),
(80, 42, 'Picfare mathematical set'),
(81, 14, 'Picfare ruled papers 500sheets'),
(82, 6, 'Pocket size'),
(83, 7, 'Porpo calculator'),
(84, 28, '500gms'),
(85, 29, 'Non-categorised'),
(86, 30, 'Non-categorised'),
(87, 5, 'Quill fountain pens'),
(88, 31, '100pages'),
(89, 14, 'Rotatrim 500 sheets'),
(90, 32, 'Non-categorised'),
(91, 33, 'Non-categorised'),
(92, 34, 'small'),
(93, 35, 'mix small'),
(94, 35, '/ Fruity'),
(95, 36, 'No.2'),
(96, 36, 'No.3'),
(97, 37, 'kangaroo'),
(98, 38, '8g'),
(99, 39, 'Non-categorised'),
(100, 40, 'Non-categorised'),
(101, 11, 'Water colours'),
(102, 41, 'Non-categorised'),
(103, 1, 'A4'),
(104, 8, 'small'),
(105, 11, 'Pelikan colours-short'),
(106, 10, 'None'),
(107, 12, 'None'),
(108, 3, 'Nataraj'),
(109, 43, 'Road master');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `UnitPrice` float NOT NULL,
  `SellPrice` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `current_stock` int(11) NOT NULL,
  `DateOfPurchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PurchaseId`, `ItemId`, `Category`, `UnitPrice`, `SellPrice`, `Quantity`, `current_stock`, `DateOfPurchase`) VALUES
(1, 1, 1, 700, 2000, 18, 18, '2019-01-18'),
(2, 2, 2, 833, 2000, 17, 14, '2019-01-18'),
(3, 1, 103, 260, 1000, 92, 92, '2019-01-18'),
(4, 1, 3, 100, 1000, 51, 51, '2019-01-18'),
(5, 3, 4, 750, 1000, 2, 0, '2019-01-18'),
(6, 4, 5, 5000, 8000, 5, 5, '2019-01-18'),
(7, 4, 6, 3000, 5000, 1, 1, '2019-01-18'),
(8, 5, 7, 380, 500, 677, 677, '2019-01-18'),
(9, 6, 8, 649, 1000, 2, 2, '2019-01-18'),
(10, 6, 9, 4000, 5000, 9, 9, '2019-01-18'),
(11, 6, 10, 3000, 4000, 18, 18, '2019-01-18'),
(12, 6, 11, 3550, 6000, 41, 37, '2019-01-18'),
(13, 6, 12, 9000, 12000, 6, 6, '2019-01-18'),
(14, 6, 13, 3000, 4000, 3, 3, '2019-01-18'),
(15, 6, 14, 3000, 4000, 9, 9, '2019-01-18'),
(16, 6, 15, 354, 500, 370, 370, '2019-01-18'),
(17, 6, 16, 2180, 3000, 21, 21, '2019-01-18'),
(18, 6, 17, 750, 1500, 9, 9, '2019-01-18'),
(19, 6, 18, 649, 1000, 41, 41, '2019-01-18'),
(20, 6, 20, 354, 500, 6, 6, '2019-01-18'),
(21, 6, 19, 1090, 1500, 122, 122, '2019-01-18'),
(22, 6, 21, 500, 1000, 15, 15, '2019-01-18'),
(23, 6, 22, 1000, 1500, 5, 5, '2019-01-18'),
(24, 7, 23, 16000, 25000, 2, 2, '2019-01-18'),
(25, 7, 24, 9000, 15000, 1, 1, '2019-01-18'),
(26, 7, 25, 9000, 15000, 4, 4, '2019-01-18'),
(27, 8, 104, 292, 500, 7, 7, '2019-01-18'),
(28, 9, 26, 500, 1000, 11, 11, '2019-01-18'),
(29, 10, 106, 3500, 5000, 4, 4, '2019-01-18'),
(30, 6, 27, 2500, 3500, 1, 1, '2019-01-18'),
(31, 11, 28, 2000, 2500, 19, 19, '2019-01-18'),
(32, 12, 107, 2000, 3000, 6, 6, '2019-01-18'),
(33, 11, 29, 1000, 2000, 14, 14, '2019-01-18'),
(34, 13, 30, 667, 1000, 24, 24, '2019-01-18'),
(35, 14, 31, 16000, 19000, 10, 10, '2019-01-18'),
(36, 6, 32, 1833, 3500, 14, 14, '2019-01-18'),
(37, 15, 33, 70, 100, 370, 370, '2019-01-18'),
(38, 15, 34, 200, 500, 63, 63, '2019-01-18'),
(39, 15, 35, 80, 500, 18, 18, '2019-01-18'),
(40, 16, 36, 120, 500, 90, 90, '2019-01-18'),
(41, 16, 37, 250, 1000, 31, 31, '2019-01-18'),
(42, 17, 38, 50, 100, 39, 39, '2019-01-18'),
(43, 18, 39, 1000, 2000, 11, 11, '2019-01-18'),
(44, 18, 40, 250, 1000, 13, 13, '2019-01-18'),
(45, 18, 43, 4000, 5000, 18, 18, '2019-01-18'),
(46, 18, 44, 3500, 5000, 5, 5, '2019-01-18'),
(47, 18, 45, 4500, 6000, 10, 10, '2019-01-18'),
(48, 18, 46, 1667, 3000, 21, 21, '2019-01-18'),
(49, 5, 47, 1000, 2000, 14, 14, '2019-01-18'),
(50, 19, 48, 1000, 2000, 15, 15, '2019-01-18'),
(51, 11, 49, 1000, 1500, 9, 9, '2019-01-18'),
(52, 20, 50, 1000, 2000, 2, 2, '2019-01-18'),
(53, 11, 51, 4000, 7000, 5, 5, '2019-01-18'),
(54, 21, 52, 800, 1000, 7, 7, '2019-01-18'),
(55, 42, 53, 1416, 2500, 17, 17, '2019-01-18'),
(56, 5, 54, 300, 500, 33, 33, '2019-01-18'),
(57, 22, 55, 350, 700, 16, 16, '2019-01-18'),
(58, 11, 56, 750, 1500, 6, 6, '2019-01-18'),
(59, 23, 57, 300, 500, 44, 44, '2019-01-18'),
(60, 23, 58, 292, 500, 119, 119, '2019-01-18'),
(61, 24, 59, 1500, 2500, 7, 7, '2019-01-18'),
(62, 11, 60, 5000, 8000, 9, 9, '2019-01-18'),
(63, 25, 61, 292, 500, 168, 168, '2019-01-18'),
(64, 5, 62, 380, 500, 5, 5, '2019-01-18'),
(65, 19, 63, 500, 1500, 14, 14, '2019-01-18'),
(66, 5, 64, 260, 500, 144, 144, '2019-01-18'),
(67, 26, 65, 2000, 3000, 9, 9, '2019-01-18'),
(68, 26, 66, 3500, 6000, 4, 4, '2019-01-18'),
(69, 6, 67, 2500, 3500, 1, 1, '2019-01-18'),
(70, 26, 68, 1000, 1500, 29, 29, '2019-01-18'),
(71, 42, 69, 5000, 7000, 2, 2, '2019-01-18'),
(72, 27, 70, 7500, 10000, 4, 4, '2019-01-18'),
(73, 27, 71, 3000, 5000, 2, 2, '2019-01-18'),
(74, 27, 72, 2500, 5000, 2, 2, '2019-01-18'),
(75, 11, 73, 7000, 9000, 7, 7, '2019-01-18'),
(76, 11, 105, 750, 1500, 1, 1, '2019-01-18'),
(77, 25, 74, 292, 1000, 33, 33, '2019-01-18'),
(78, 25, 75, 292, 1000, 15, 15, '2019-01-18'),
(79, 25, 76, 292, 1000, 3, 3, '2019-01-18'),
(80, 25, 77, 139, 300, 84, 84, '2019-01-18'),
(81, 5, 78, 240, 500, 78, 78, '2019-01-18'),
(82, 25, 79, 139, 300, 36, 36, '2019-01-18'),
(83, 42, 80, 2083, 3000, 19, 19, '2019-01-18'),
(84, 14, 81, 10300, 14000, 5, 5, '2019-01-18'),
(85, 6, 82, 750, 1500, 1, 1, '2019-01-18'),
(86, 7, 83, 3000, 6000, 7, 7, '2019-01-18'),
(87, 28, 84, 3700, 5000, 3, 3, '2019-01-18'),
(88, 29, 85, 500, 1000, 22, 22, '2019-01-18'),
(89, 30, 86, 4000, 6000, 2, 2, '2019-01-18'),
(90, 5, 87, 1000, 2000, 11, 11, '2019-01-18'),
(91, 31, 88, 1667, 3000, 10, 10, '2019-01-18'),
(92, 14, 89, 16400, 20000, 10, 10, '2019-01-18'),
(93, 32, 90, 4000, 5000, 3, 3, '2019-01-18'),
(94, 33, 91, 2750, 4000, 4, 4, '2019-01-18'),
(95, 34, 92, 500, 1000, 2, 2, '2019-01-18'),
(96, 35, 93, 250, 500, 33, 33, '2019-01-18'),
(97, 35, 94, 500, 1500, 46, 46, '2019-01-18'),
(98, 36, 95, 2000, 3000, 6, 6, '2019-01-18'),
(99, 36, 96, 1000, 3000, 3, 3, '2019-01-18'),
(100, 38, 98, 900, 1500, 14, 14, '2019-01-18'),
(101, 39, 99, 750, 1000, 14, 14, '2019-01-18'),
(102, 40, 100, 625, 1000, 6, 6, '2019-01-18'),
(103, 11, 101, 5000, 8000, 2, 2, '2019-01-18'),
(104, 41, 102, 130, 1000, 77, 77, '2019-01-18'),
(105, 37, 97, 4000, 6000, 5, 5, '2019-01-19'),
(106, 43, 109, 80000, 250000, 5, 4, '2019-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalesId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `Sellingpx` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SoldOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalesId`, `ItemId`, `category`, `Sellingpx`, `Quantity`, `SoldOn`) VALUES
(1, 3, 4, 1500, 2, '2018-12-22 09:27:12'),
(2, 6, 11, 6000, 4, '2019-01-22 09:29:13'),
(3, 2, 2, 3000, 2, '2019-01-22 19:21:36'),
(4, 43, 109, 250000, 1, '2019-01-24 09:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_sales`
--

CREATE TABLE `service_sales` (
  `Id` int(11) NOT NULL,
  `service_type` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `RecordedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_sales`
--

INSERT INTO `service_sales` (`Id`, `service_type`, `Quantity`, `amount`, `RecordedOn`) VALUES
(1, 2, 2, 200, '2019-01-19 12:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `RecordedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`Id`, `Name`, `RecordedOn`) VALUES
(1, 'Typing & Printing/Page', '2019-01-18 14:46:30'),
(2, 'Photocopying/Page', '2019-01-18 14:46:53'),
(3, 'Scanning/Page', '2019-01-18 14:47:06'),
(4, 'Printing/Page', '2019-01-18 14:47:23'),
(5, 'Typing/page', '2019-01-18 14:47:35'),
(6, 'Laminating/A5 or A4', '2019-01-18 14:47:57'),
(7, 'Laminating/A3', '2019-01-18 14:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffId` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffId`, `firstName`, `lastName`, `DateOfBirth`, `Email`, `Username`, `Password`, `DateCreated`) VALUES
(1, 'Veronica', 'Basiima', '1987-08-17', 'nbverany@gmail.com', 'basiima', 'faithwalk', '2018-12-26 12:00:56'),
(2, 'Emmanuel', 'Obua', '1994-01-22', 'eobua@gmail.com', 'eobua', '1234', '2019-01-22 10:34:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `expenditure_category`
--
ALTER TABLE `expenditure_category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseId`),
  ADD KEY `ItemId` (`ItemId`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SalesId`),
  ADD KEY `ItemId` (`ItemId`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `service_sales`
--
ALTER TABLE `service_sales`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `service_type` (`service_type`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenditures`
--
ALTER TABLE `expenditures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenditure_category`
--
ALTER TABLE `expenditure_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SalesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_sales`
--
ALTER TABLE `service_sales`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD CONSTRAINT `expenditures_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `expenditure_category` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `item_category_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`) ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `item_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`category`) REFERENCES `item_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `service_sales`
--
ALTER TABLE `service_sales`
  ADD CONSTRAINT `service_sales_ibfk_1` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
