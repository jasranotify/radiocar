/*
SQLyog Ultimate v8.3 
MySQL - 5.5.25a : Database - e_kst_bike_sales
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e_kst_bike_sales` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `e_kst_bike_sales`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `password_cust` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `receipt_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password_cust` varchar(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`password_cust`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`id`,`password_cust`,`uname`,`fname`,`lname`,`gender`,`race`,`address`,`tel_no`,`email`,`date`) values (1,'ain123','ain','Nur Ain','Wahab',NULL,NULL,NULL,NULL,NULL,NULL),(2,'saya','eyqa','Afiqah','Abdull',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id`,`uname`,`pswd`,`level`,`user_id`) values (1,'din','din123',1,3),(2,'admin','admin123',2,2);

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `receipt_no` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `availability` varchar(10) NOT NULL,
  PRIMARY KEY (`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `availability` varchar(10) NOT NULL,
  PRIMARY KEY (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
