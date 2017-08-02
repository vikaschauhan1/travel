ALTER TABLE `travels`.`messages`   
  CHANGE `user_id` `send_by` TINYINT(4) NOT NULL,
  CHANGE `guide_id` `send_to` TINYINT(4) NOT NULL;