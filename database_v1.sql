-- MySQL Script generated by MySQL Workbench
-- Sun Nov 24 13:28:35 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema UtrechtseFietsenwinkel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema UtrechtseFietsenwinkel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `UtrechtseFietsenwinkel` DEFAULT CHARACTER SET utf8 ;
USE `UtrechtseFietsenwinkel` ;

-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`Klant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`Klant` (
  `KlantId` INT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `voornaam` VARCHAR(100) NOT NULL,
  `achternaam` VARCHAR(100) NOT NULL,
  `postcode` VARCHAR(100) NOT NULL,
  `woonplaats` VARCHAR(100) NOT NULL,
  `telefoonnummer` INT NULL,
  `Straat` VARCHAR(100) NOT NULL,
  `huisnummer` INT NOT NULL,
  PRIMARY KEY (`KlantId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`Factuur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`Factuur` (
  `factuurcode` INT NULL AUTO_INCREMENT,
  `Factuurdatum` DATETIME NOT NULL,
  `id` VARCHAR(100) NOT NULL,
  `btw` INT NOT NULL,
  `Klant_id` INT NOT NULL,
  PRIMARY KEY (`factuurcode`, `Klant_id`),
  INDEX `fk_Factuur_Klant_idx` (`Klant_id` ASC) ,
  CONSTRAINT `fk_Factuur_Klant`
    FOREIGN KEY (`Klant_id`)
    REFERENCES `UtrechtseFietsenwinkel`.`Klant` (`KlantId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`TypeFiets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`TypeFiets` (
  `TypeFietsId` INT NOT NULL AUTO_INCREMENT,
  `TypeFiets` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`TypeFietsId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`Gebruikers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`Gebruikers` (
  `Gebruikersnaam` VARCHAR(100) NOT NULL,
  `gebruikersRol` INT NOT NULL,
  `wachtwoord` VARCHAR(100) NOT NULL,
  `naamGebruiker` VARCHAR(50) NOT NULL,
  `GebruikersRol_idGebruikersRol` INT NOT NULL,
  PRIMARY KEY (`Gebruikersnaam`, `GebruikersRol_idGebruikersRol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`Product` (
  `productCode` INT NOT NULL,
  `productNaam` VARCHAR(100) NOT NULL,
  `kosten` INT NOT NULL,
  `merk` VARCHAR(50) NOT NULL,
  `serie` VARCHAR(100) NOT NULL,
  `afbeelding_1` VARCHAR(100) NOT NULL,
  `afbeelding_2` VARCHAR(100) NULL,
  `afbeelding_3` VARCHAR(100) NULL,
  `afbeelding_4` VARCHAR(100) NULL,
  `afbeelding_5` VARCHAR(100) NULL,
  `afbeelding_6` VARCHAR(100) NULL,
  `TypeFietsId` INT NOT NULL,
  `versnellingen` VARCHAR(100) NULL,
  `frameType` VARCHAR(100) NOT NULL,
  `Garantie` VARCHAR(100) NULL,
  `accuPositie` VARCHAR(100) NULL,
  `oplaatTijd` VARCHAR(100) NULL,
  `capaciteitAccu` VARCHAR(100) NULL,
  `Gebruikers_Gebruikersnaam` VARCHAR(100) NOT NULL,
  `TypeFiets_TypeFietsId` INT NOT NULL,
  `Gebruikers_Gebruikersnaam1` VARCHAR(100) NOT NULL,
  `Gebruikers_GebruikersRol_idGebruikersRol` INT NOT NULL,
  PRIMARY KEY (`productCode`, `Gebruikers_Gebruikersnaam`, `TypeFiets_TypeFietsId`, `Gebruikers_Gebruikersnaam1`, `Gebruikers_GebruikersRol_idGebruikersRol`),
  INDEX `fk_Product_TypeFiets1_idx` (`TypeFiets_TypeFietsId` ASC) ,
  INDEX `fk_Product_Gebruikers1_idx` (`Gebruikers_Gebruikersnaam1` ASC, `Gebruikers_GebruikersRol_idGebruikersRol` ASC) ,
  CONSTRAINT `fk_Product_TypeFiets1`
    FOREIGN KEY (`TypeFiets_TypeFietsId`)
    REFERENCES `UtrechtseFietsenwinkel`.`TypeFiets` (`TypeFietsId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Product_Gebruikers1`
    FOREIGN KEY (`Gebruikers_Gebruikersnaam1` , `Gebruikers_GebruikersRol_idGebruikersRol`)
    REFERENCES `UtrechtseFietsenwinkel`.`Gebruikers` (`Gebruikersnaam` , `GebruikersRol_idGebruikersRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`factuurRegel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`factuurRegel` (
  `factuurcode` INT NOT NULL AUTO_INCREMENT,
  `productcode` VARCHAR(45) BINARY NOT NULL,
  `Factuur_factuurcode` INT NOT NULL,
  `Factuur_Klant_id` INT NOT NULL,
  `Product_productCode` INT NOT NULL,
  `aantal` INT NOT NULL,
  PRIMARY KEY (`factuurcode`, `Factuur_factuurcode`, `Factuur_Klant_id`, `Product_productCode`),
  INDEX `fk_factuurRegel_Factuur1_idx` (`Factuur_factuurcode` ASC, `Factuur_Klant_id` ASC) ,
  INDEX `fk_factuurRegel_Product1_idx` (`Product_productCode` ASC) ,
  CONSTRAINT `fk_factuurRegel_Factuur1`
    FOREIGN KEY (`Factuur_factuurcode` , `Factuur_Klant_id`)
    REFERENCES `UtrechtseFietsenwinkel`.`Factuur` (`factuurcode` , `Klant_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_factuurRegel_Product1`
    FOREIGN KEY (`Product_productCode`)
    REFERENCES `UtrechtseFietsenwinkel`.`Product` (`productCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`reparatie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`reparatie` (
  `reparatieId` INT NOT NULL AUTO_INCREMENT,
  `reparatieSoort` INT NOT NULL,
  `reparatieDatumTijd` DATETIME NOT NULL,
  `Gebruikers_Gebruikersnaam` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`reparatieId`, `Gebruikers_Gebruikersnaam`),
  CONSTRAINT `reparatieId`
    FOREIGN KEY (`reparatieId`)
    REFERENCES `UtrechtseFietsenwinkel`.`Gebruikers` (`GebruikersRol_idGebruikersRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`ReparatieRegel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`ReparatieRegel` (
  `KlantId` INT NOT NULL,
  `ReparatieId` INT NOT NULL,
  `Klant_KlantId` INT NOT NULL,
  `reparatie_reparatieId` INT NOT NULL,
  `reparatie_Gebruikers_Gebruikersnaam` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Klant_KlantId`, `reparatie_reparatieId`, `reparatie_Gebruikers_Gebruikersnaam`),
  INDEX `fk_ReparatieRegel_reparatie1_idx` (`reparatie_reparatieId` ASC, `reparatie_Gebruikers_Gebruikersnaam` ASC) ,
  CONSTRAINT `fk_ReparatieRegel_Klant1`
    FOREIGN KEY (`Klant_KlantId`)
    REFERENCES `UtrechtseFietsenwinkel`.`Klant` (`KlantId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ReparatieRegel_reparatie1`
    FOREIGN KEY (`reparatie_reparatieId` , `reparatie_Gebruikers_Gebruikersnaam`)
    REFERENCES `UtrechtseFietsenwinkel`.`reparatie` (`reparatieId` , `Gebruikers_Gebruikersnaam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UtrechtseFietsenwinkel`.`GebruikersRol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UtrechtseFietsenwinkel`.`GebruikersRol` (
  `GebruikersRol` VARCHAR(50) NOT NULL,
  `Gebruikers_GebruikersRol_idGebruikersRol` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Gebruikers_GebruikersRol_idGebruikersRol`),
  CONSTRAINT `fk_GebruikersRol_Gebruikers1`
    FOREIGN KEY (`Gebruikers_GebruikersRol_idGebruikersRol`)
    REFERENCES `UtrechtseFietsenwinkel`.`Gebruikers` (`GebruikersRol_idGebruikersRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
