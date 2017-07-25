CREATE TABLE `payments` (
`payment_id` INT(11) NOT NULL AUTO_INCREMENT,
`user_id` INT(11) NOT NULL,
`txn_id` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
`payment_gross` FLOAT(10,2) NOT NULL,
`currency_code` VARCHAR(5) COLLATE utf8_unicode_ci NOT NULL,
`payer_email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
`payment_status` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`payment_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `travels`.`payments` 
ADD COLUMN `booking_id` INT(4) NULL AFTER `payment_status`;
