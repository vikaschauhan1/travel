CREATE TABLE `travels`.`ratings`(  
  `id` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `guide_id` TINYINT(4),
  `member_id` TINYINT(4),
  `rating` TINYINT(2),
  PRIMARY KEY (`id`)
);