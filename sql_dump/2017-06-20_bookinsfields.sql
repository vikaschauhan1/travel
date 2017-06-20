ALTER TABLE `travels`.`bookings` 
ADD COLUMN `number_of_persons` INT(10) NULL AFTER `booking_detail`,
ADD COLUMN `number_day_night` INT(4) NULL AFTER `number_of_persons`,
ADD COLUMN `hotel_booking` VARCHAR(45) NULL AFTER `number_day_night`;
