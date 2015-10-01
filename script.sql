-- MySQL Script generated by MySQL Workbench
-- Fri Aug 21 23:53:37 2015
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema serasa
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `serasa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `daw-aluno11` ;

-- -----------------------------------------------------
-- Table `serasa_estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `serasa_estados` ;

CREATE TABLE IF NOT EXISTS `serasa_estados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `serasa_cidades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `serasa_cidades` ;

CREATE TABLE IF NOT EXISTS `serasa_cidades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `estados_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidades_estados1_idx` (`estados_id` ASC),
  CONSTRAINT `fk_cidades_estados1`
    FOREIGN KEY (`estados_id`)
    REFERENCES `serasa_estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `serasa_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `serasa_clientes` ;

CREATE TABLE IF NOT EXISTS `serasa_clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cidades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clientes_cidades1_idx` (`cidades_id` ASC),
  CONSTRAINT `fk_clientes_cidades1`
    FOREIGN KEY (`cidades_id`)
    REFERENCES `serasa_cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `serasa_estabelecimentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `serasa_estabelecimentos` ;

CREATE TABLE IF NOT EXISTS `serasa_estabelecimentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cidades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_estabelecimentos_cidades1_idx` (`cidades_id` ASC),
  CONSTRAINT `fk_estabelecimentos_cidades1`
    FOREIGN KEY (`cidades_id`)
    REFERENCES `serasa_cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `serasa_dividas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `serasa_dividas` ;

CREATE TABLE IF NOT EXISTS `serasa_dividas` (
  `clientes_id` INT NOT NULL,
  `estabelecimentos_id` INT NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`clientes_id`, `estabelecimentos_id`),
  INDEX `fk_clientes_has_estabelecimentos_estabelecimentos1_idx` (`estabelecimentos_id` ASC),
  INDEX `fk_clientes_has_estabelecimentos_clientes_idx` (`clientes_id` ASC),
  CONSTRAINT `fk_clientes_has_estabelecimentos_clientes`
    FOREIGN KEY (`clientes_id`)
    REFERENCES `serasa_clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_has_estabelecimentos_estabelecimentos1`
    FOREIGN KEY (`estabelecimentos_id`)
    REFERENCES `serasa_estabelecimentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
