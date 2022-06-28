-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema presencescf2m
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `presencescf2m` ;

-- -----------------------------------------------------
-- Schema presencescf2m
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `presencescf2m` DEFAULT CHARACTER SET latin1 ;
-- -----------------------------------------------------
-- Schema presencescf2m
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `presencescf2m` ;

-- -----------------------------------------------------
-- Schema presencescf2m
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `presencescf2m` DEFAULT CHARACTER SET latin1 ;
USE `presencescf2m` ;

-- -----------------------------------------------------
-- Table `presencescf2m`.`options`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`options` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`options` (
  `idoption` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `acronyme` VARCHAR(10) NOT NULL,
  `couleur` VARCHAR(7) NULL DEFAULT '#FFFFFF',
  `picto` VARCHAR(45) NULL,
  `active` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Active => 1 | Non active => 2',
  PRIMARY KEY (`idoption`),
  UNIQUE INDEX `Nom_UNIQUE` (`nom` ASC),
  UNIQUE INDEX `acronyme_UNIQUE` (`acronyme` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`promotions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`promotions` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`promotions` (
  `idpromotion` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `acronyme` VARCHAR(16) NOT NULL,
  `dateDebut` DATE NOT NULL,
  `dateFin` DATE NOT NULL,
  `nbJours` TINYINT UNSIGNED NOT NULL,
  `options_idoption` INT NOT NULL,
  PRIMARY KEY (`idpromotion`),
  INDEX `fk_promotions_options1_idx` (`options_idoption` ASC),
  CONSTRAINT `fk_promotions_options1`
    FOREIGN KEY (`options_idoption`)
    REFERENCES `presencescf2m`.`options` (`idoption`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`conges`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`conges` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`conges` (
  `idconges` INT NOT NULL,
  `jour` DATE NOT NULL,
  PRIMARY KEY (`idconges`),
  UNIQUE INDEX `jour_UNIQUE` (`jour` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`user` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(180) NOT NULL,
  `roles` LONGTEXT NOT NULL COMMENT '(DC2Type:json)',
  `password` VARCHAR(255) NOT NULL,
  `thename` VARCHAR(100) NOT NULL,
  `thesurname` VARCHAR(100) NOT NULL,
  `themail` VARCHAR(180) NULL DEFAULT NULL,
  `theuid` VARCHAR(25) NOT NULL,
  `thestatus` INT(11) NOT NULL,
  `thenationalid` BIGINT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UNIQ_8D93D649F85E0677` (`username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `presencescf2m`.`inscriptions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`inscriptions` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`inscriptions` (
  `idinscription` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Active | 0 => Non active',
  `dateDebut` DATETIME NOT NULL DEFAULT current_timestamp,
  `dateFin` DATETIME NOT NULL DEFAULT current_timestamp,
  `promotions_idpromotion` INT NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`idinscription`),
  INDEX `fk_inscriptions_promotions1_idx` (`promotions_idpromotion` ASC),
  INDEX `fk_inscriptions_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_inscriptions_promotions1`
    FOREIGN KEY (`promotions_idpromotion`)
    REFERENCES `presencescf2m`.`promotions` (`idpromotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscriptions_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `presencescf2m`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`suivis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`suivis` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`suivis` (
  `idSuvi` INT NOT NULL,
  `dateReunion` DATETIME NOT NULL DEFAULT current_timestamp(),
  `ponctualite` VARCHAR(512) NOT NULL,
  `evolution` VARCHAR(512) NOT NULL,
  `tests` VARCHAR(512) NOT NULL,
  `attitude` VARCHAR(512) NOT NULL,
  `inscriptions_idinscription` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idSuvi`),
  INDEX `fk_suivis_inscriptions1_idx` (`inscriptions_idinscription` ASC),
  CONSTRAINT `fk_suivis_inscriptions1`
    FOREIGN KEY (`inscriptions_idinscription`)
    REFERENCES `presencescf2m`.`inscriptions` (`idinscription`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`retards`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`retards` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`retards` (
  `idRetards` INT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT current_timestamp(),
  `heure` TIME NOT NULL,
  `periode` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => matin | 0 => après-midi',
  `justificatif` VARCHAR(150) NULL COMMENT 'NULL => pas de justificatif',
  `inscriptions_idinscription` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idRetards`),
  INDEX `fk_retards_inscriptions1_idx` (`inscriptions_idinscription` ASC),
  CONSTRAINT `fk_retards_inscriptions1`
    FOREIGN KEY (`inscriptions_idinscription`)
    REFERENCES `presencescf2m`.`inscriptions` (`idinscription`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`absences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`absences` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`absences` (
  `idAbsences` INT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT current_timestamp(),
  `periode` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => matin | 0 => après-midi',
  `justificatif` VARCHAR(150) NULL COMMENT 'Null => Sans justificatif',
  `inscriptions_idinscription` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idAbsences`),
  INDEX `fk_absences_inscriptions1_idx` (`inscriptions_idinscription` ASC),
  CONSTRAINT `fk_absences_inscriptions1`
    FOREIGN KEY (`inscriptions_idinscription`)
    REFERENCES `presencescf2m`.`inscriptions` (`idinscription`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`departs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`departs` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`departs` (
  `iddepart` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL DEFAULT current_timestamp(),
  `heure` TIME NOT NULL,
  `periode` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => matin | 0 => après-midi',
  `justificatif` VARCHAR(150) NULL,
  `inscriptions_idinscription` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`iddepart`),
  UNIQUE INDEX `iddepart_UNIQUE` (`iddepart` ASC),
  INDEX `fk_departs_inscriptions1_idx` (`inscriptions_idinscription` ASC),
  CONSTRAINT `fk_departs_inscriptions1`
    FOREIGN KEY (`inscriptions_idinscription`)
    REFERENCES `presencescf2m`.`inscriptions` (`idinscription`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`promotions_has_conges`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`promotions_has_conges` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`promotions_has_conges` (
  `promotions_idpromotion` INT NOT NULL,
  `conges_idconges` INT NOT NULL,
  PRIMARY KEY (`promotions_idpromotion`, `conges_idconges`),
  INDEX `fk_promotions_has_conges_conges1_idx` (`conges_idconges` ASC),
  INDEX `fk_promotions_has_conges_promotions1_idx` (`promotions_idpromotion` ASC),
  CONSTRAINT `fk_promotions_has_conges_promotions1`
    FOREIGN KEY (`promotions_idpromotion`)
    REFERENCES `presencescf2m`.`promotions` (`idpromotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promotions_has_conges_conges1`
    FOREIGN KEY (`conges_idconges`)
    REFERENCES `presencescf2m`.`conges` (`idconges`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `presencescf2m` ;

-- -----------------------------------------------------
-- Table `presencescf2m`.`doctrine_migration_versions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`doctrine_migration_versions` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`doctrine_migration_versions` (
  `version` VARCHAR(191) NOT NULL,
  `executed_at` DATETIME NULL DEFAULT NULL,
  `execution_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `presencescf2m`.`messenger_messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`messenger_messages` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`messenger_messages` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `body` LONGTEXT NOT NULL,
  `headers` LONGTEXT NOT NULL,
  `queue_name` VARCHAR(190) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `available_at` DATETIME NOT NULL,
  `delivered_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDX_75EA56E0FB7336F0` (`queue_name` ASC),
  INDEX `IDX_75EA56E0E3BD61CE` (`available_at` ASC),
  INDEX `IDX_75EA56E016BA31DB` (`delivered_at` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
