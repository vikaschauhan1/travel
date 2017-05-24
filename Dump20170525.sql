/*
SQLyog Ultimate v11.01 (32 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - travels
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travels` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `travels`;

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_detail` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `bookings` */

insert  into `bookings`(`id`,`member_id`,`guide_id`,`location_id`,`submission_date`,`booking_date`,`booking_detail`) values (1,5,6,2,'2017-05-24','2017-05-25','fcgfcj'),(4,5,3,2,'2017-05-24','2017-05-25','fcgfcj'),(5,2,6,3,'2017-05-24','2017-05-26','dfgdfr ertert');

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` varchar(3) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `currency` */

insert  into `currency`(`currency_id`,`iso`,`symbol`) values (1,'USD','$'),(2,'EUR','€'),(3,'GBP','£'),(4,'CHF','Fr'),(5,'AUD','$'),(6,'CAD','$');

/*Table structure for table `destinations` */

DROP TABLE IF EXISTS `destinations`;

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `destinations` */

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `languages` */

insert  into `languages`(`id`,`language`) values (1,'English'),(2,'Hindi'),(3,'Gujrati'),(4,'punjabi'),(5,'Marathi');

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `location` */

insert  into `location`(`id`,`location`) values (1,'Noida'),(2,'Dehli'),(3,'Aligarh'),(4,'Goa'),(5,'Manali');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `company_name` varchar(50) NOT NULL,
  `company_street` varchar(50) NOT NULL,
  `company_zip` varchar(50) NOT NULL,
  `company_city` varchar(50) NOT NULL,
  `company_state` varchar(50) NOT NULL,
  `company_phone_one` varchar(50) NOT NULL,
  `company_phone_two` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_rules` text NOT NULL,
  `company_currency` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `settings` */

insert  into `settings`(`company_name`,`company_street`,`company_zip`,`company_city`,`company_state`,`company_phone_one`,`company_phone_two`,`company_email`,`company_rules`,`company_currency`) values ('Trip Express','Berliner-str','12345','Berlin','DE','0049131253452','0049131253345','support@example.com','2) bibendum quam. Morbi at dui dignissim, auctor turpis id, tempus nulla. Mauris tincidunt ac purus nec dapibus. Mauris dapibus sed urna id placerat. Curabitur in interdum lacus. In hac\r\n3) habitasse platea dictumst. Curabitur placerat quis nibh eu viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n4) Vestibulum posuere, tellus quis consectetur interdum, purus nisl molestie velit, lacinia hendrerit sapien justo id neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per\r\n5) inceptos himenaeos. Sed ornare ligula nisl, a laoreet nisi molestie at. Aliquam eu orci arcu. In dictum quam id lacinia pellentesque. Cras a varius lacus. Suspendisse sagittis risus eget\r\nvolutpat bibendum. Suspendisse facilisis urna sit amet diam viverra porta non a ante. Vivamus vel volutpat libero.\r\nFusce consequat mi erat, vel pharetra quam gravida sit amet. Integer interdum mi eu nibh ultrices laoreet. Aliquam massa eros, tempor mattis dapibus eget, commodo at diam. Maecenas\r\n6) sagittis ex nec arcu ultrices interdum. Maecenas tortor arcu, eleifend in elementum vel, sagittis id risus. Suspendisse suscipit lectus et odio viverra convallis. Lorem ipsum dolor sit amet,\r\nconsectetur adipiscing elit. Vestibulum eget justo maximus, pretium elit quis, consectetur odio. Aenean rhoncus blandit erat, ac ultrices purus tincidunt in. Integer quam arcu, blandit et\r\nauctor et, vestibulum in massa. In dictum lacus nec nisi ornare sodales. Nunc et nisi ex.\r\n7) Vestibulum tempus, justo sit amet varius molestie, metus eros sollicitudin odio, id ullamcorper nulla lectus in orci. Proin ac mi mauris. Aenean maximus vitae dui eu scelerisque. Ut\r\nfaucibus pharetra sem, lacinia blandit erat porttitor eu. Nunc et sollicitudin massa. Sed eu imperdiet tellus. Quisque ut facilisis lacus. Donec ut justo eget nulla interdum aliquam. Etiam a\r\nex nec urna varius interdum. Cras dictum ante in nunc tristique, nec lacinia sapien tempor. Aliquam sit amet orci quis arcu rutrum ornare. Fusce condimentum tempor ipsum id cursus.\r\nPellentesque sed malesuada libero.\r\nDonec quis dolor neque. Vivamus vulputate scelerisque nisl, at consectetur felis semper vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n8) Maecenas dapibus risus sit amet fringilla pretium. Suspendisse non interdum erat, at cursus est. Morbi porttitor dapibus tempus. Duis vulputate et dui sit amet imperdiet','2');

/*Table structure for table `tours` */

DROP TABLE IF EXISTS `tours`;

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(50) NOT NULL,
  `to` int(50) NOT NULL,
  `from_start_time` datetime NOT NULL,
  `available_seats` int(5) NOT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tours` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2') DEFAULT NULL COMMENT '1 - User, 2 - Guide',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`phone`,`password`,`role`) values (1,'Vikas','Chauhan','vikkygp4all@gmail.com','8860206024','e10adc3949ba59abbe56e057f20f883e','2'),(2,'Vikas','chauhan','vikaschauhan@mail.com','9897874546','e10adc3949ba59abbe56e057f20f883e','1'),(3,'afzal','md','afzalmhd@mail.com','8786768768','e10adc3949ba59abbe56e057f20f883e','2'),(4,'vikky','singh','vikky@gmail.com','67678686','e10adc3949ba59abbe56e057f20f883e','2'),(5,'travel','guide','travelguide@mail.com','7056576576','e10adc3949ba59abbe56e057f20f883e','1'),(6,'Lisa','Ray','lisaray@mail.com','23423423434','e10adc3949ba59abbe56e057f20f883e','2'),(7,'PAmrika','Ray','pamrika@mail.com','5675876887','e10adc3949ba59abbe56e057f20f883e','2'),(8,'umar','deen','umardeen@mail.com','9078674564','e10adc3949ba59abbe56e057f20f883e','1');

/*Table structure for table `users_profile` */

DROP TABLE IF EXISTS `users_profile`;

CREATE TABLE `users_profile` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `about_me` varchar(400) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `location_id` tinyint(2) DEFAULT NULL COMMENT 'reference_id to location',
  `profile_photo` varchar(255) DEFAULT NULL,
  `user_id` tinyint(4) DEFAULT NULL COMMENT 'reference id of user',
  `travel_style_tags` varchar(150) DEFAULT NULL,
  `language_id` tinyint(4) DEFAULT NULL,
  `destination_experties` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users_profile` */

insert  into `users_profile`(`id`,`about_me`,`age`,`gender`,`location_id`,`profile_photo`,`user_id`,`travel_style_tags`,`language_id`,`destination_experties`) values (1,'I this is travel guy to you very humble and associative \r\nI will be very hapy to serve you .\r\nThanks.',29,'male',2,NULL,1,'jyfgfhjgfhjfghf',2,NULL),(2,'fgdfgdfgd',32,'female',3,NULL,2,'jyfgfhjgfhjfghf',3,NULL),(3,'2gdfgdfg',25,'male',2,NULL,3,'jyfgfhjgfhjfghf',1,NULL),(4,'I this is travel guy to you very humble and associative \r\nI will be very hapy to serve you .\r\nThanks.',43,'female',1,NULL,6,'jyfgfhjgfhjfghf',3,NULL),(5,'I this is travel guy to you very humble and associative \r\nI will be very hapy to serve you .\r\nThanks.',23,'male',3,NULL,4,'jyfgfhjgfhjfghf',2,NULL),(6,'I this is travel guy to you very humble and associative \r\nI will be very hapy to serve you .\r\nThanks.',29,'male',5,NULL,5,'jyfgfhjgfhjfghf',4,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
