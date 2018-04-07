SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mileage_tracker` DEFAULT CHARACTER SET utf8;
USE `mileage_tracker`;

DROP TABLE IF EXISTS mileage_tracker.trip;

CREATE TABLE IF NOT EXISTS mileage_tracker.trip (
  `tripId` INT NOT NULL AUTO_INCREMENT,
  `startingClientId` INT NOT NULL,
  `endingClientId` INT NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tripId`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO mileage_tracker.trip
VALUES (NULL, 0, 1, '2018-04-02 00:00:00');

INSERT INTO mileage_tracker.trip
VALUES (NULL, 1, 0, '2018-04-02 00:00:00');

INSERT INTO mileage_tracker.trip
VALUES (NULL, 0, 2, '2018-04-02 00:00:00');

INSERT INTO mileage_tracker.trip
VALUES (NULL, 2, 1, '2018-04-02 00:00:00');

INSERT INTO mileage_tracker.trip
VALUES (NULL, 1, 0, '2018-04-02 00:00:00');

INSERT INTO mileage_tracker.trip
VALUES (NULL, 1, 2, '2018-04-02 00:00:00');