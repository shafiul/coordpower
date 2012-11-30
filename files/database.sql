SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `hackathonbd_2012` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `hackathonbd_2012` ;

-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`user` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NULL ,
  `role` TEXT NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`union`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`union` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`union` (
  `union_code` INT NOT NULL ,
  `upazila_id` INT NULL ,
  `name` TEXT NULL ,
  PRIMARY KEY (`union_code`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`committee_member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`committee_member` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`committee_member` (
  `union_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`union_id`, `user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`meeting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`meeting` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`meeting` (
  `meeting_id` INT NOT NULL AUTO_INCREMENT ,
  `date` DATE NULL ,
  `time` TIMESTAMP NULL ,
  `president` TEXT NULL ,
  `place` TEXT NULL ,
  PRIMARY KEY (`meeting_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`department_report`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`department_report` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`department_report` (
  `meeting_id` INT NOT NULL ,
  `department_id` INT NOT NULL ,
  `discussion` TEXT NULL ,
  `decision` TEXT NULL ,
  `responsiblee` TEXT NULL ,
  PRIMARY KEY (`meeting_id`, `department_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`department` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`department` (
  `department_id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NULL ,
  PRIMARY KEY (`department_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`attendance` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`attendance` (
  `meeting_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`meeting_id`, `user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`district`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`district` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`district` (
  `district_id` INT NOT NULL AUTO_INCREMENT ,
  `division_id` INT NULL ,
  `name` TEXT NULL ,
  PRIMARY KEY (`district_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`upazila`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`upazila` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`upazila` (
  `upazila_id` INT NOT NULL AUTO_INCREMENT ,
  `district_id` INT NULL ,
  `name` TEXT NULL ,
  PRIMARY KEY (`upazila_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hackathonbd_2012`.`division`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hackathonbd_2012`.`division` ;

CREATE  TABLE IF NOT EXISTS `hackathonbd_2012`.`division` (
  `division_id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NULL ,
  PRIMARY KEY (`division_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
