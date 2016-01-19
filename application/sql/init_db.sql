CREATE TABLE `tms`.`company` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `district` VARCHAR(45) NOT NULL,
  `address` VARCHAR(1000) NOT NULL,
  `contact` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NULL,
  `fax` VARCHAR(45) NULL,
  `mobile` VARCHAR(45) NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`));