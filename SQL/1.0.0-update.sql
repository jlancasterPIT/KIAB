CREATE TABLE `reservations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dropOffDate` date DEFAULT NULL,
  `pickUpDate` date DEFAULT NULL,
  `numOfDogs` int(10) DEFAULT NULL,
  `vaccineRecordLocation` varchar(255) DEFAULT NULL,
  `dogName` varchar(25) DEFAULT NULL,
  `dogAge` int(4) DEFAULT NULL,
  `dogBreed` varchar(255) DEFAULT NULL,
  `listOfAllergies` text,
  `listOfMedications` text,
  `listOfFleaTreatment` text,
  `feedingRequirements` text,
  `hasTreats` int(2) DEFAULT NULL,
  `hasWalks` int(2) DEFAULT NULL,
  `hasDogPark` int(2) DEFAULT NULL,
  `hasPlayTime` int(2) DEFAULT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `clientPhoneNumber` varchar(255) DEFAULT NULL,
  `clientEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

CREATE TABLE `clientConfig` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

CREATE TABLE `enabledModules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(255) DEFAULT NULL,
  `enabled` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;