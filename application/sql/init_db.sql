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
  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

CREATE TABLE `tms`.`task_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

CREATE TABLE `tms`.`task_type_steps` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `task_type_id` INT NOT NULL,
  `order` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

CREATE TABLE `tms`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `description` TEXT NOT NULL,
  `end_date` DATE NOT NULL,
  `priority` INT NOT NULL,
  `company_id` INT NOT NULL,
  `task_type_id` INT NOT NULL,
  `assigned` INT NULL,
  `latest_stage` VARCHAR(45) NOT NULL DEFAULT 'pendding',
  `created_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;;