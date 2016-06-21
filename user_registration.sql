-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2016 at 11:00 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `animalID` int(11) NOT NULL,
  `captureID` int(11) NOT NULL,
  `injuryID` int(11) NOT NULL,
  `animalType` text NOT NULL,
  `animialSpecies` text NOT NULL,
  `animalDescription` text NOT NULL,
  `animalStatus` text NOT NULL,
  `animalPictureFile` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animalID`, `captureID`, `injuryID`, `animalType`, `animialSpecies`, `animalDescription`, `animalStatus`, `animalPictureFile`) VALUES
(1, 1, 1, 'bat', 'grey-headed flying fox', 'baby, wing injury', 'resolved by another organisation/vet', 'images/testAnimals/1.jpg'),
(2, 2, 2, 'reptile', 'red belly black snake', 'juvenile, unsuitable environment', 'relocated', 'images/testAnimals/2.jpg'),
(3, 3, 3, 'marsupial', 'brushtail possum', 'baby, collision with motor vehicle', 'in care', 'images/testAnimals/3.jpg'),
(4, 4, 4, 'bird', 'magpie', 'juvenile, fallen from nest', 'in care', 'images/testAnimals/4.jpg'),
(5, 5, 5, 'bird', 'rainbow lorikeet', 'adult, feather problem', 'in care', 'images/testAnimals/5.jpg'),
(6, 6, 6, 'bird', 'ibis', 'adult, concussion/stunned', 'died in care', 'images/testAnimals/6.jpg'),
(7, 7, 7, 'reptile', 'blue tongue lizard', 'juvenile, other animal attack', 'in care', 'images/testAnimals/7.jpg'),
(8, 8, 8, 'bat', 'grey-headed flying fox', 'juvenile, electrocution', 'dead on arrival', 'images/testAnimals/8.jpg'),
(9, 9, 9, 'bird', 'tawny frogmouth', 'baby, separated from parents', 'reunited with parents', 'images/testAnimals/9.jpg'),
(10, 10, 10, 'reptile', 'turtle', 'juvenile, body injury', 'euthanised', 'images/testAnimals/10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `financeID` int(11) NOT NULL,
  `ccardNum` varchar(30) NOT NULL,
  `ccexpMonth` varchar(2) NOT NULL,
  `ccexpYear` varchar(2) NOT NULL,
  `shopper_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`financeID`, `ccardNum`, `ccexpMonth`, `ccexpYear`, `shopper_id`) VALUES
(1, '3333341233', '01', '15', 4),
(2, '4444433234', '01', '15', 5),
(3, '3445678883', '01', '15', 6),
(4, '2222222222', '01', '15', 11),
(5, '1234567890', '01', '15', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

CREATE TABLE IF NOT EXISTS `login_attempt` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shopper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempt`
--

INSERT INTO `login_attempt` (`time`, `shopper_id`) VALUES
('0000-00-00 00:00:00', 4),
('0000-00-00 00:00:00', 4),
('0000-00-00 00:00:00', 4),
('0000-00-00 00:00:00', 5),
('0000-00-00 00:00:00', 5),
('0000-00-00 00:00:00', 6),
('0000-00-00 00:00:00', 4),
('0000-00-00 00:00:00', 12),
('0000-00-00 00:00:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE IF NOT EXISTS `pwdreset` (
  `link` varchar(128) NOT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shopper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`link`, `expiry_date`, `shopper_id`) VALUES
('08c558d312df7fe42749480e1e8eb513', '2015-11-03 01:56:39', 11),
('73bfe6a980745d00d6409778a6605375', '2015-11-03 02:23:57', 11),
('9a9fbf96d759f4ba812a01c5551472e9', '2016-05-14 05:46:05', 4),
('e30ed43dc32d5815853b7e3f7d340566', '2015-10-30 11:22:05', 11);

-- --------------------------------------------------------

--
-- Table structure for table `shaddr`
--

CREATE TABLE IF NOT EXISTS `shaddr` (
  `shaddr_id` int(11) NOT NULL,
  `sh_firstname` varchar(20) NOT NULL,
  `sh_familyname` varchar(30) NOT NULL,
  `sh_street1` varchar(64) NOT NULL,
  `sh_street2` varchar(64) NOT NULL,
  `sh_city` varchar(32) NOT NULL,
  `sh_state` varchar(8) NOT NULL,
  `sh_postcode` varchar(10) NOT NULL,
  `sh_country` varchar(32) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `own_entry` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shaddr`
--

INSERT INTO `shaddr` (`shaddr_id`, `sh_firstname`, `sh_familyname`, `sh_street1`, `sh_street2`, `sh_city`, `sh_state`, `sh_postcode`, `sh_country`, `shopper_id`, `own_entry`) VALUES
(2, 'Sam', 'Turner', '23 Banks St', '', 'Maroubra', 'NSW', '2035', 'Australia', 4, '1'),
(3, 'Hank', 'Man', '324 uiahf blvd', '', 'Federal Way', 'WA', '984444', 'United States', 5, '1'),
(4, 'Zara', 'Hynes', '56 Dora Creek', '', 'TUCKI TUCKI', 'NSW', '2480', 'Australia', 12, '0'),
(5, 'Sam', 'Turner', '4283 Express Lane', 'Suite 219-650', 'Sarasota', 'Florida', '34238', 'United States of America', 11, '1'),
(18, 'Athan', 'Gathan', '4 Shathan', 'Mathan', 'Blign', 'Syarian', '23HD', 'Deewee', 11, '0'),
(19, 'de', 'ed', 'de3', 'de3', 'adasd', 'asd', '123e', 'Deeweed', 11, '0'),
(20, 'Sam', 'Turner', '4283 Express Lane', 'Suite 219-650', 'Sarasota', 'FL', '34238', 'US', 12, '1');

-- --------------------------------------------------------

--
-- Table structure for table `shopper`
--

CREATE TABLE IF NOT EXISTS `shopper` (
  `shopper_id` int(11) NOT NULL,
  `sh_username` varchar(30) NOT NULL,
  `sh_password` char(255) NOT NULL,
  `sh_email` varchar(64) NOT NULL,
  `sh_phone` varchar(45) NOT NULL,
  `sh_type` char(1) NOT NULL,
  `sh_shopgrp` int(11) NOT NULL,
  `sh_field1` varchar(128) NOT NULL,
  `sh_field2` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopper`
--

INSERT INTO `shopper` (`shopper_id`, `sh_username`, `sh_password`, `sh_email`, `sh_phone`, `sh_type`, `sh_shopgrp`, `sh_field1`, `sh_field2`) VALUES
(4, 'samburner3', '$2y$10$9eFaZUGri/v4OGa1qDJ7o.hX.EgTM8vbhck1D9zz/aVfj3rN90MsK', 'samburner3@hotmail.com', '', '', 0, '', ''),
(5, 'hankMan', '$2y$10$MMS7.yEKoAeSVXeAs9aGBuPLUdsgSJ1ll9pr4E6LHtvpsUnnv9Djy', 'hankMan@gmail.com', '', '', 0, '', ''),
(6, 'Zara', '$2y$10$dBFfMAKedxZsecjFm.4WiesgZS4urk2NUr7uikJXWiYLfGqWel9Pi', 'Zara@gmail.com', '', '', 0, '', ''),
(11, 'sambabmqqamaa', '$2y$10$vWcqvq7xk1vUSzLtJE.4K.hunZ6qrqiUZ.t3XuUHsSgLg6YpEK24u', 'samburner3@hotaqqaamail.com', '', '', 0, '', ''),
(12, 'sammy', '$2y$10$tI5o/O4aQVKJ8EBdT/OqZusRae4EnAOiUzkF02TdanEDvKeFRlko.', 'sammy@gmail.com', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animalID`,`captureID`,`injuryID`),
  ADD UNIQUE KEY `injuryID` (`injuryID`),
  ADD UNIQUE KEY `captureID_2` (`captureID`),
  ADD UNIQUE KEY `animalID` (`animalID`),
  ADD KEY `captureID` (`captureID`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`financeID`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`link`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `shaddr`
--
ALTER TABLE `shaddr`
  ADD PRIMARY KEY (`shaddr_id`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `shopper`
--
ALTER TABLE `shopper`
  ADD PRIMARY KEY (`shopper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animalID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `financeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shaddr`
--
ALTER TABLE `shaddr`
  MODIFY `shaddr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `shopper`
--
ALTER TABLE `shopper`
  MODIFY `shopper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`shopper_id`) REFERENCES `shopper` (`shopper_id`) ON UPDATE CASCADE;

--
-- Constraints for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD CONSTRAINT `login_attempt_ibfk_1` FOREIGN KEY (`shopper_id`) REFERENCES `shopper` (`shopper_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD CONSTRAINT `pwdreset_ibfk_1` FOREIGN KEY (`shopper_id`) REFERENCES `shopper` (`shopper_id`) ON UPDATE CASCADE;

--
-- Constraints for table `shaddr`
--
ALTER TABLE `shaddr`
  ADD CONSTRAINT `shaddr_ibfk_1` FOREIGN KEY (`shopper_id`) REFERENCES `shopper` (`shopper_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
