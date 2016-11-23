-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema pokes_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pokes_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pokes_db` DEFAULT CHARACTER SET utf8 ;
USE `pokes_db` ;

-- -----------------------------------------------------
-- Table `pokes_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pokes_db`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `dob` VARCHAR(45) NOT NULL,
  `poke_received` DECIMAL(10,0) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pokes_db`.`pokes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pokes_db`.`pokes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pokes_made` DECIMAL(10,0) NULL DEFAULT NULL,
  `poked_user` VARCHAR(255) NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pokes_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_pokes_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `pokes_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
