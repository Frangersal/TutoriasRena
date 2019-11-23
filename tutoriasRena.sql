-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tutoriasRenacimiento
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tutoriasRenacimiento` ;

-- -----------------------------------------------------
-- Schema tutoriasRenacimiento
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tutoriasRenacimiento` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `tutoriasRenacimiento` ;

-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`users` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `foto` VARCHAR(128) NULL,
  `area_carrera` VARCHAR(64) NULL,
  `fecha_nacimiento` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`formularios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`formularios` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`formularios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`tipos_reactivos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`tipos_reactivos` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`tipos_reactivos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`reactivos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`reactivos` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`reactivos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `formularios_id` INT NOT NULL,
  `tipos_reactivos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `formularios_id`, `tipos_reactivos_id`),
  INDEX `fk_reactivos_formularios1_idx` (`formularios_id` ASC),
  INDEX `fk_reactivos_tipos_reactivos1_idx` (`tipos_reactivos_id` ASC),
  CONSTRAINT `fk_reactivos_formularios1`
    FOREIGN KEY (`formularios_id`)
    REFERENCES `tutoriasRenacimiento`.`formularios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reactivos_tipos_reactivos1`
    FOREIGN KEY (`tipos_reactivos_id`)
    REFERENCES `tutoriasRenacimiento`.`tipos_reactivos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`roles` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(16) NOT NULL,
  `descripcion` VARCHAR(64) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`opciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`opciones` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`opciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `reactivos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `reactivos_id`),
  INDEX `fk_opciones_reactivos1_idx` (`reactivos_id` ASC),
  CONSTRAINT `fk_opciones_reactivos1`
    FOREIGN KEY (`reactivos_id`)
    REFERENCES `tutoriasRenacimiento`.`reactivos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`resultados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`resultados` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`resultados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `opciones_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `opciones_id`),
  INDEX `fk_resultados_opciones1_idx` (`opciones_id` ASC),
  CONSTRAINT `fk_resultados_opciones1`
    FOREIGN KEY (`opciones_id`)
    REFERENCES `tutoriasRenacimiento`.`opciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`users_has_formularios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`users_has_formularios` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`users_has_formularios` (
  `users_id` INT NOT NULL,
  `formularios_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `formularios_id`),
  INDEX `fk_users_has_formularios_formularios1_idx` (`formularios_id` ASC),
  INDEX `fk_users_has_formularios_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_formularios_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `tutoriasRenacimiento`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_formularios_formularios1`
    FOREIGN KEY (`formularios_id`)
    REFERENCES `tutoriasRenacimiento`.`formularios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutoriasRenacimiento`.`users_has_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutoriasRenacimiento`.`users_has_roles` ;

CREATE TABLE IF NOT EXISTS `tutoriasRenacimiento`.`users_has_roles` (
  `users_roles_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `roles_id` INT NOT NULL,
  PRIMARY KEY (`users_roles_id`, `users_id`, `roles_id`),
  INDEX `fk_users_has_roles_roles1_idx` (`roles_id` ASC),
  INDEX `fk_users_has_roles_users1_idx` (`users_id` ASC, `users_roles_id` ASC),
  CONSTRAINT `fk_users_has_roles_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `tutoriasRenacimiento`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `tutoriasRenacimiento`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
