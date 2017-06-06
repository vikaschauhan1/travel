
ALTER TABLE `travels`.`users_profile`   
  DROP COLUMN `experience`, 
  ADD COLUMN `experience` TINYINT(2) NULL AFTER `views`;
