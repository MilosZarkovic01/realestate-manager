/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.28-MariaDB : Database - nekretnine
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nekretnine` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nekretnine`;

/*Table structure for table `nekretnina` */

DROP TABLE IF EXISTS `nekretnina`;

CREATE TABLE `nekretnina` (
  `Nekretnina_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Adresa` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Grad` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Povrsina` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Cena` decimal(10,0) DEFAULT NULL,
  `Vlasnik_ID` bigint(20) unsigned DEFAULT NULL,
  `Tip_ID` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`Nekretnina_ID`),
  KEY `vlasnik_fk` (`Vlasnik_ID`),
  KEY `tip_fk` (`Tip_ID`),
  CONSTRAINT `tip_fk` FOREIGN KEY (`Tip_ID`) REFERENCES `tip_nekretnine` (`Tip_ID`),
  CONSTRAINT `vlasnik_fk` FOREIGN KEY (`Vlasnik_ID`) REFERENCES `vlasnik` (`Vlasnik_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nekretnina` */

insert  into `nekretnina`(`Nekretnina_ID`,`Adresa`,`Grad`,`Povrsina`,`Cena`,`Vlasnik_ID`,`Tip_ID`) values 
(5,'Borska 34 b','Beograd','65',64000,4,1),
(6,'Bulevar Nikole Tesle 74','Novi Sad','70',80000,3,1),
(8,'Makedonska 5','Kragujevac','85',150000,1,4),
(9,'Nova 8','Kragujevac','50',60000,2,3),
(10,'Uzicka','ÄŒaÄak','100',20000,3,2);

/*Table structure for table `tip_nekretnine` */

DROP TABLE IF EXISTS `tip_nekretnine`;

CREATE TABLE `tip_nekretnine` (
  `Tip_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Tip_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tip_nekretnine` */

insert  into `tip_nekretnine`(`Tip_ID`,`Naziv`) values 
(1,'Stan'),
(2,'Kuca'),
(3,'Lokal'),
(4,'Poslovni prostor');

/*Table structure for table `vlasnik` */

DROP TABLE IF EXISTS `vlasnik`;

CREATE TABLE `vlasnik` (
  `Vlasnik_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Prezime` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Vlasnik_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vlasnik` */

insert  into `vlasnik`(`Vlasnik_ID`,`Ime`,`Prezime`) values 
(1,'Maja','Colovic'),
(2,'Milos','Markovic'),
(3,'Veljko','Nikolic'),
(4,'Sasa','Krstic');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
