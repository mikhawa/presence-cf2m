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
  `id` INT NOT NULL AUTO_INCREMENT,
  `optionname` VARCHAR(45) NOT NULL,
  `acronym` VARCHAR(10) NOT NULL,
  `color` VARCHAR(7) NULL DEFAULT '#FFFFFF',
  `picto` VARCHAR(45) NULL,
  `active` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Active => 1 | Non active => 2',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Nom_UNIQUE` (`optionname` ASC),
  UNIQUE INDEX `acronyme_UNIQUE` (`acronym` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`promotions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`promotions` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`promotions` (
  `id` INT NOT NULL,
  `promoName` VARCHAR(45) NOT NULL,
  `acronym` VARCHAR(16) NOT NULL,
  `startingdate` DATE NOT NULL,
  `endingdate` DATE NOT NULL,
  `nbdays` TINYINT UNSIGNED NOT NULL,
  `active` TINYINT NOT NULL COMMENT '0 => inactive | 1 => active | 2 => terminée',
  `options_idoption` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promotions_options1_idx` (`options_idoption` ASC),
  CONSTRAINT `fk_promotions_options1`
    FOREIGN KEY (`options_idoption`)
    REFERENCES `presencescf2m`.`options` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`holiday`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`holiday` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`holiday` (
  `id` INT NOT NULL,
  `day` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `jour_UNIQUE` (`day` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`followups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`followups` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`followups` (
  `id` INT NOT NULL,
  `meetingdate` DATETIME NOT NULL DEFAULT current_timestamp(),
  `punctuality` VARCHAR(512) NOT NULL,
  `evolution` VARCHAR(512) NOT NULL,
  `tests` VARCHAR(512) NOT NULL,
  `behaviour` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`id`))
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
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UNIQ_8D93D649F85E0677` (`username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `presencescf2m`.`registrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`registrations` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`registrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => Active | 0 => Non active',
  `startingdate` DATETIME NOT NULL DEFAULT current_timestamp,
  `endingdate` DATETIME NOT NULL DEFAULT current_timestamp,
  `users_id` INT(11) NOT NULL,
  `followups_idSuvi` INT NOT NULL,
  `promotions_idpromotion` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_inscriptions_users1_idx` (`users_id` ASC),
  INDEX `fk_registrations_followups1_idx` (`followups_idSuvi` ASC),
  INDEX `fk_registrations_promotions1_idx` (`promotions_idpromotion` ASC),
  CONSTRAINT `fk_inscriptions_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `presencescf2m`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registrations_followups1`
    FOREIGN KEY (`followups_idSuvi`)
    REFERENCES `presencescf2m`.`followups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registrations_promotions1`
    FOREIGN KEY (`promotions_idpromotion`)
    REFERENCES `presencescf2m`.`promotions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`specialeventtype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`specialeventtype` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`specialeventtype` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `eventname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idtypeNonPresence_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`specialevents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`specialevents` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`specialevents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `eventdate` DATETIME NOT NULL DEFAULT current_timestamp(),
  `remote` TINYINT NOT NULL COMMENT '0 => présentiel | 1 => distanciel',
  `eventperiod` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 => matin | 0 => après-midi',
  `arrivaltime` TIME NULL,
  `departuretime` TIME NULL,
  `message` VARCHAR(500) NULL,
  `specialeventtype_idtypeNonPresence` INT NOT NULL,
  `registrations_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `iddepart_UNIQUE` (`id` ASC),
  INDEX `fk_specialevents_specialeventtype1_idx` (`specialeventtype_idtypeNonPresence` ASC),
  INDEX `fk_specialevents_registrations1_idx` (`registrations_id` ASC),
  CONSTRAINT `fk_specialevents_specialeventtype1`
    FOREIGN KEY (`specialeventtype_idtypeNonPresence`)
    REFERENCES `presencescf2m`.`specialeventtype` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_specialevents_registrations1`
    FOREIGN KEY (`registrations_id`)
    REFERENCES `presencescf2m`.`registrations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`attendancesheets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`attendancesheets` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`attendancesheets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(150) NOT NULL,
  `startingdeekdate` DATE NOT NULL,
  `endingweekdate` DATE NOT NULL,
  `promotions_idpromotion` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idfeuillesPresences_UNIQUE` (`id` ASC),
  INDEX `fk_feuillesPresences_promotions1_idx` (`promotions_idpromotion` ASC),
  CONSTRAINT `fk_feuillesPresences_promotions1`
    FOREIGN KEY (`promotions_idpromotion`)
    REFERENCES `presencescf2m`.`promotions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`proofofabsence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`proofofabsence` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`proofofabsence` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(255) NOT NULL,
  `firstdaycovered` DATE NOT NULL,
  `lastdaycovered` DATE NOT NULL,
  `specialevents_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idjustificativefiles_UNIQUE` (`id` ASC),
  INDEX `fk_proofOfAbsence_specialevents1_idx` (`specialevents_id` ASC),
  CONSTRAINT `fk_proofOfAbsence_specialevents1`
    FOREIGN KEY (`specialevents_id`)
    REFERENCES `presencescf2m`.`specialevents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `presencescf2m`.`promotions_has_holiday`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `presencescf2m`.`promotions_has_holiday` ;

CREATE TABLE IF NOT EXISTS `presencescf2m`.`promotions_has_holiday` (
  `promotions_id` INT NOT NULL,
  `holiday_id` INT NOT NULL,
  PRIMARY KEY (`promotions_id`, `holiday_id`),
  INDEX `fk_promotions_has_holiday_holiday1_idx` (`holiday_id` ASC),
  INDEX `fk_promotions_has_holiday_promotions1_idx` (`promotions_id` ASC),
  CONSTRAINT `fk_promotions_has_holiday_promotions1`
    FOREIGN KEY (`promotions_id`)
    REFERENCES `presencescf2m`.`promotions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promotions_has_holiday_holiday1`
    FOREIGN KEY (`holiday_id`)
    REFERENCES `presencescf2m`.`holiday` (`id`)
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
