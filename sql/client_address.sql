SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mileage_tracker` DEFAULT CHARACTER SET utf8;
USE `mileage_tracker`;

DROP TABLE IF EXISTS mileage_tracker.address;

CREATE TABLE IF NOT EXISTS mileage_tracker.address (
  `addressId` INT NOT NULL AUTO_INCREMENT,
  `addressLine1` varchar(45) DEFAULT NULL,
  `addressLine2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS mileage_tracker.client;

CREATE TABLE IF NOT EXISTS mileage_tracker.client (
  `clientId` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientId`),
  KEY `addressId_idx` (`addressId`),
  CONSTRAINT `addressId` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO mileage_tracker.address
VALUES (NULL,'7855 Southfront Road',NULL,'Livermore','CA', 94551);

INSERT INTO mileage_tracker.address
VALUES (NULL,'10824 Hope Street',NULL,'Cypress','CA', 90630);

INSERT INTO mileage_tracker.client
VALUES (NULL,'Advantage Metal Products', 1);

INSERT INTO mileage_tracker.client
VALUES (NULL,'Siemens PLM', 2);