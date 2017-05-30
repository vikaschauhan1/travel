/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  successive
 * Created: 30 May, 2017
 */

ALTER TABLE `travels`.`users` 
ADD COLUMN `dob` DATE NULL AFTER `role`,
ADD COLUMN `home_airport` VARCHAR(100) NULL DEFAULT NULL AFTER `dob`,
ADD COLUMN `street_address` VARCHAR(150) NULL DEFAULT NULL AFTER `home_airport`,
ADD COLUMN `postal_code` VARCHAR(45) NULL DEFAULT NULL AFTER `street_address`,
ADD COLUMN `country_id` TINYINT(4) NULL AFTER `postal_code`,
ADD COLUMN `licence_no` VARCHAR(50) NULL AFTER `country_id`,
ADD COLUMN `valid_up_to` DATE NULL AFTER `licence_no`,
ADD COLUMN `induction_year` VARCHAR(45) NULL AFTER `valid_up_to`,
ADD COLUMN `Adhar_no` VARCHAR(50) NULL AFTER `induction_year`;



CREATE TABLE `travels`.`country` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));



INSERT INTO `travels`.`country` (`id`, `country`) VALUES ('', 'India');
INSERT INTO `travels`.`country` (`country`) VALUES ('China');
INSERT INTO `travels`.`country` (`country`) VALUES ('USA');
INSERT INTO `travels`.`country` (`country`) VALUES ('England');
INSERT INTO `travels`.`country` (`country`) VALUES ('South Africa');
INSERT INTO `travels`.`country` (`country`) VALUES ('Russia');
INSERT INTO `travels`.`country` (`country`) VALUES ('Pakistan');
