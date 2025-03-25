-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2024 at 06:12 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decora`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(3) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `lastName`, `emailAddress`, `password`) VALUES
(511, 'Reem', 'Abdallah', 'reem@gmail.com', '$2y$10$n9rqXuxAGZi00AXle5H4Zenma8w7GkmFPdSkCtDAeYdTikZLKNSPm'),
(522, 'Faisal', 'Omar', 'faisal@gmail.com', '$2y$10$jfGG7hmi9871v3L8ftZyy.Sdk3uVlZy7ZTgb1tHLhFekWGyMHX7zu'),
(533, 'Mona', 'Ahmed', 'mnmn21@gmail.com', '$2y$10$ktVu6TemSij1J1U0H2iRgucM2Io/wfINgrt88EywdMcJScR80iIgu');

-- --------------------------------------------------------

--
-- Table structure for table `designcategory`
--

CREATE TABLE `designcategory` (
  `id` int(3) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designcategory`
--

INSERT INTO `designcategory` (`id`, `category`) VALUES
(221, 'Bohemian'),
(222, 'Modern'),
(223, 'Coastal'),
(224, 'Country');

-- --------------------------------------------------------

--
-- Table structure for table `designconsultation`
--

CREATE TABLE `designconsultation` (
  `id` int(3) NOT NULL,
  `requestID` int(3) NOT NULL,
  `consultation` varchar(3000) NOT NULL,
  `consultationImgFileName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designconsultation`
--

INSERT INTO `designconsultation` (`id`, `requestID`, `consultation`, `consultationImgFileName`) VALUES
(711, 661, 'Create a modern kitchen with accented by stainless steel fixtures and quartz countertops for a timeless yet contemporary look. Incorporate under-cabinet LED lighting and large-format porcelain tiles in light grey to enhance functionality and aesthetic appeal.', ''),
(722, 663, 'Consultation Declined', ''),
(733, 662, 'Based on the colors you preferred, I think you want something bright, this design will suit you', '6470-bConsultaion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `designconsultationrequest`
--

CREATE TABLE `designconsultationrequest` (
  `id` int(3) NOT NULL,
  `clientID` int(3) NOT NULL,
  `designerID` int(3) NOT NULL,
  `roomTypeID` int(3) NOT NULL,
  `designCategoryID` int(3) NOT NULL,
  `roomWidth` int(4) NOT NULL,
  `roomLength` int(4) NOT NULL,
  `colorPreferences` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `statusID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designconsultationrequest`
--

INSERT INTO `designconsultationrequest` (`id`, `clientID`, `designerID`, `roomTypeID`, `designCategoryID`, `roomWidth`, `roomLength`, `colorPreferences`, `date`, `statusID`) VALUES
(661, 511, 112, 343, 222, 7, 8, 'Gray and white', '2024-03-08', 411),
(662, 533, 113, 331, 221, 4, 3, 'pink and blue', '2024-03-17', 433),
(663, 533, 113, 331, 221, 8, 15, 'black and yellow', '2024-03-28', 422),
(665, 522, 111, 343, 224, 7, 8, 'red', '2024-03-31', 411);

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `id` int(3) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `brandName` varchar(20) NOT NULL,
  `logoImgFileName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `firstName`, `lastName`, `emailAddress`, `password`, `brandName`, `logoImgFileName`) VALUES
(111, 'Yara', 'Faisal', 'Yara@gmail.com', '$2y$10$n5073a4TRVPuRwgasFd2buXgICbMeI48ZcAuNFsOIPkNPYasB8U4C', 'Decorative art', '9090-YARA.png'),
(112, 'sara', 'saad', 'sara-sa21@gmail.com', '$2y$10$qUUBbM8OEjTSuF0Db2VHN.gBX3wt./NQTyNQwwqPuB6rbDc.dMrL2', 'ARIA HANS', '1515-img7.jpg'),
(113, 'Ahmed', 'Khalid', 'Ahmed-kh@gmail.com', '$2y$10$ZRdyaeCVVTGKh/DR8daJkeKvGCLrnSJcG2do0/c5FiZmJhbKnBWVq', 'BlissfulDigs', '1111-Ahmed.png');

-- --------------------------------------------------------

--
-- Table structure for table `designerspeciality`
--

CREATE TABLE `designerspeciality` (
  `designerID` int(4) NOT NULL,
  `designerCategoryID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designerspeciality`
--

INSERT INTO `designerspeciality` (`designerID`, `designerCategoryID`) VALUES
(112, 224),
(112, 222),
(113, 221),
(111, 224);

-- --------------------------------------------------------

--
-- Table structure for table `designportoflioproject`
--

CREATE TABLE `designportoflioproject` (
  `id` int(3) NOT NULL,
  `designerID` int(3) NOT NULL,
  `projectName` varchar(20) NOT NULL,
  `projectImgFileName` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `designCategoryID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designportoflioproject`
--

INSERT INTO `designportoflioproject` (`id`, `designerID`, `projectName`, `projectImgFileName`, `description`, `designCategoryID`) VALUES
(991, 112, 'Home Office', '1414-img6.jpg', 'White and Black minimalist home office with clean lines.', 222),
(992, 113, 'Living Room', '9885-bohemianDesign.jpg', 'the look is all about indulgent maximalism. also, keep a bohemian living room decor full of curated finds.', 221),
(993, 111, 'Country kitchen', '4626-kCountry.jpg', 'Crafted with elegance and modern functionality, our Country Kitchen project embodies timeless charm, blending reclaimed wood accents, vintage fixtures, and ergonomic design for a warm, inviting culinary space.', 224),
(994, 112, 'Sun House', '9556-img5.jpg', 'Rustic white sun house that has many green plants and windows with a country style.', 224);

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `id` int(3) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requeststatus`
--

INSERT INTO `requeststatus` (`id`, `status`) VALUES
(411, 'pending consultation'),
(422, 'consultation declined'),
(433, 'consultation  provided');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(3) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `type`) VALUES
(331, 'Living Room'),
(332, 'Kitchen'),
(343, 'Bedroom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designcategory`
--
ALTER TABLE `designcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designconsultation`
--
ALTER TABLE `designconsultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestID` (`requestID`);

--
-- Indexes for table `designconsultationrequest`
--
ALTER TABLE `designconsultationrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientID` (`clientID`),
  ADD KEY `designerID` (`designerID`),
  ADD KEY `roomTypeID` (`roomTypeID`),
  ADD KEY `designCategoryID` (`designCategoryID`),
  ADD KEY `statusID` (`statusID`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designerspeciality`
--
ALTER TABLE `designerspeciality`
  ADD KEY `designerID` (`designerID`),
  ADD KEY `designerCategory` (`designerCategoryID`);

--
-- Indexes for table `designportoflioproject`
--
ALTER TABLE `designportoflioproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designerID` (`designerID`),
  ADD KEY `designCategoryID` (`designCategoryID`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `designcategory`
--
ALTER TABLE `designcategory`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `designconsultation`
--
ALTER TABLE `designconsultation`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=735;

--
-- AUTO_INCREMENT for table `designconsultationrequest`
--
ALTER TABLE `designconsultationrequest`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `designportoflioproject`
--
ALTER TABLE `designportoflioproject`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designconsultation`
--
ALTER TABLE `designconsultation`
  ADD CONSTRAINT `designconsultation_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `designconsultationrequest` (`id`);

--
-- Constraints for table `designconsultationrequest`
--
ALTER TABLE `designconsultationrequest`
  ADD CONSTRAINT `designconsultationrequest_ibfk_1` FOREIGN KEY (`statusID`) REFERENCES `requeststatus` (`id`),
  ADD CONSTRAINT `designconsultationrequest_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `designconsultationrequest_ibfk_3` FOREIGN KEY (`designerID`) REFERENCES `designer` (`id`),
  ADD CONSTRAINT `designconsultationrequest_ibfk_4` FOREIGN KEY (`roomTypeID`) REFERENCES `roomtype` (`id`),
  ADD CONSTRAINT `designconsultationrequest_ibfk_5` FOREIGN KEY (`designCategoryID`) REFERENCES `designcategory` (`id`),
  ADD CONSTRAINT `designconsultationrequest_ibfk_6` FOREIGN KEY (`statusID`) REFERENCES `requeststatus` (`id`);

--
-- Constraints for table `designerspeciality`
--
ALTER TABLE `designerspeciality`
  ADD CONSTRAINT `designerspeciality_ibfk_1` FOREIGN KEY (`designerID`) REFERENCES `designer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designerspeciality_ibfk_2` FOREIGN KEY (`designerCategoryID`) REFERENCES `designcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designportoflioproject`
--
ALTER TABLE `designportoflioproject`
  ADD CONSTRAINT `designportoflioproject_ibfk_1` FOREIGN KEY (`designCategoryID`) REFERENCES `designcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designportoflioproject_ibfk_2` FOREIGN KEY (`designerID`) REFERENCES `designer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
