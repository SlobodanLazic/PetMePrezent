-- MySQL Script generated by MySQL Workbench
-- Wed Jul 25 04:24:30 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PetMePrezent
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `PetMePrezent` ;

-- -----------------------------------------------------
-- Schema PetMePrezent
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PetMePrezent` DEFAULT CHARACTER SET utf8 ;
USE `PetMePrezent` ;

-- -----------------------------------------------------
-- Table `PetMePrezent`.`NEWSLETTER_STATUS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PetMePrezent`.`NEWSLETTER_STATUS` ;

CREATE TABLE IF NOT EXISTS `PetMePrezent`.`NEWSLETTER_STATUS` (
  `ID_STATUS` INT NOT NULL AUTO_INCREMENT,
  `NAME` VARCHAR(100) NOT NULL,
  `DESCRIPTION` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID_STATUS`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PetMePrezent`.`NEWSLETTER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PetMePrezent`.`NEWSLETTER` ;

CREATE TABLE IF NOT EXISTS `PetMePrezent`.`NEWSLETTER` (
  `ID_NEWSLETTER` INT NOT NULL AUTO_INCREMENT,
  `EMAIL` NVARCHAR(254) NOT NULL,
  `INSERT_DATE` NVARCHAR(30) NOT NULL,
  `ID_STATUS` INT NOT NULL,
  PRIMARY KEY (`ID_NEWSLETTER`),
  INDEX `fk_NEWSLETTER_NEWSLETTER_STATUS_idx` (`ID_STATUS` ASC),
  CONSTRAINT `fk_NEWSLETTER_NEWSLETTER_STATUS`
    FOREIGN KEY (`ID_STATUS`)
    REFERENCES `PetMePrezent`.`NEWSLETTER_STATUS` (`ID_STATUS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO NEWSLETTER_STATUS (NAME, DESCRIPTION)
VALUES 
	('Active','The user is active and user is signed up to our newsletter'),
	('Inactive','The user is not active and is not signed up to our newsletter');