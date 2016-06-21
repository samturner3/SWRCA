CREATE TABLE `animalimages` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `animalID` int(11) DEFAULT NULL,
  `Imagepath` varchar(50) NOT NULL,
  PRIMARY KEY (`imageID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1