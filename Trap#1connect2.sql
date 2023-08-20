-- MySQL Script generated by MySQL Workbench
-- Wed Jul 19 10:30:06 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`));


-- -----------------------------------------------------
-- Table `mydb`.`trap_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trap_type` ;

CREATE TABLE IF NOT EXISTS `mydb`.`trap_type` (
  `idtrap_type` INT NOT NULL AUTO_INCREMENT,
  `bait` VARCHAR(45) NOT NULL,
  `target` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtrap_type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`trap_line`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trap_line` ;

CREATE TABLE IF NOT EXISTS `mydb`.`trap_line` (
  `idtrap_line` INT NOT NULL AUTO_INCREMENT,
  `trap_line_region` VARCHAR(45) NULL,
  `trap_line_park` VARCHAR(45) NULL,
  PRIMARY KEY (`idtrap_line`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`trap`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trap` ;

CREATE TABLE IF NOT EXISTS `mydb`.`trap` (
  `idtrap` INT NOT NULL AUTO_INCREMENT,
  `marker_number` INT NULL,
  `trap_loc` VARCHAR(45) NULL,
  `trap_notes` TEXT(1) NULL,
  `trap_type_idtrap_type` INT NOT NULL,
  `trap_line_idtrap_line` INT NOT NULL,
  PRIMARY KEY (`idtrap`),
  INDEX `fk_trap_trap_type1_idx` (`trap_type_idtrap_type` ASC) VISIBLE,
  INDEX `fk_trap_trap_line1_idx` (`trap_line_idtrap_line` ASC) VISIBLE,
  CONSTRAINT `fk_trap_trap_type1`
    FOREIGN KEY (`trap_type_idtrap_type`)
    REFERENCES `mydb`.`trap_type` (`idtrap_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trap_trap_line1`
    FOREIGN KEY (`trap_line_idtrap_line`)
    REFERENCES `mydb`.`trap_line` (`idtrap_line`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`trap_entries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trap_entries` ;

CREATE TABLE IF NOT EXISTS `mydb`.`trap_entries` (
  `idtrap_entries` INT NOT NULL AUTO_INCREMENT,
  `trap_notes` VARCHAR(45) NOT NULL,
  `trap_idtrap` INT NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idtrap_entries`),
  INDEX `fk_trap_entries_trap1_idx` (`trap_idtrap` ASC) VISIBLE,
  INDEX `fk_trap_entries_user1_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_trap_entries_trap1`
    FOREIGN KEY (`trap_idtrap`)
    REFERENCES `mydb`.`trap` (`idtrap`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trap_entries_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `mydb`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;