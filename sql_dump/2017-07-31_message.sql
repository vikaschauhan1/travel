CREATE TABLE `travels`.`messages`(  
  `id` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `user_id` TINYINT(4) NOT NULL,
  `guide_id` TINYINT(4) NOT NULL,
  `subject` VARCHAR(50),
  `message` VARCHAR(1000),
  `is_read` ENUM('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);
