/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.17-log : Database - sstasesores
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sstasesores` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sstasesores`;

/*Table structure for table `calendcapacitaciones` */

DROP TABLE IF EXISTS `calendcapacitaciones`;

CREATE TABLE `calendcapacitaciones` (
  `idecalendcapacitaciones` int(20) NOT NULL AUTO_INCREMENT,
  `idecapacitacion` int(20) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idecapacitador` int(20) DEFAULT NULL,
  `cupos` int(3) DEFAULT NULL,
  PRIMARY KEY (`idecalendcapacitaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `calendcapacitaciones` */

/*Table structure for table `capacitador` */

DROP TABLE IF EXISTS `capacitador`;

CREATE TABLE `capacitador` (
  `idecapacitador` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apepaterno` varchar(100) DEFAULT NULL,
  `apematerno` varchar(100) DEFAULT NULL,
  `tipdocumento` int(2) DEFAULT NULL,
  `numdocumento` varchar(20) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`idecapacitador`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `capacitador` */

insert  into `capacitador`(`idecapacitador`,`nombres`,`apepaterno`,`apematerno`,`tipdocumento`,`numdocumento`,`estado`) values (1,'LUIGI','PRADO','ZAPATA',1,'12345678',1);

/*Table structure for table `carpetas` */

DROP TABLE IF EXISTS `carpetas`;

CREATE TABLE `carpetas` (
  `idcarpeta` int(10) NOT NULL AUTO_INCREMENT,
  `nombrecarpeta` varchar(45) DEFAULT NULL,
  `idecontratista` int(30) DEFAULT NULL,
  UNIQUE KEY `idcarpeta` (`idcarpeta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `carpetas` */

/*Table structure for table `contratista` */

DROP TABLE IF EXISTS `contratista`;

CREATE TABLE `contratista` (
  `idecontratista` int(30) NOT NULL AUTO_INCREMENT,
  `ruc` int(11) NOT NULL,
  `razonsocial` varchar(200) DEFAULT NULL,
  `feccreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecmodif` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ruc`),
  KEY `idecontratista` (`idecontratista`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contratista` */

insert  into `contratista`(`idecontratista`,`ruc`,`razonsocial`,`feccreacion`,`fecmodif`) values (1,2147483647,'NOVO EXPERT S.R.L.','2019-04-07 19:24:58','0000-00-00 00:00:00');

/*Table structure for table `contratista_personal` */

DROP TABLE IF EXISTS `contratista_personal`;

CREATE TABLE `contratista_personal` (
  `ideconper` int(10) NOT NULL AUTO_INCREMENT,
  `idecontratista` int(30) DEFAULT NULL,
  `idepersonal` int(8) DEFAULT NULL,
  `idecapacitacion` int(4) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `cantcapac` int(3) DEFAULT NULL,
  `feccreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usucreacion` varchar(50) DEFAULT NULL,
  `fecmodif` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usumodif` varchar(50) DEFAULT NULL,
  KEY `ideconper` (`ideconper`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contratista_personal` */

/*Table structure for table `empresa_contratista` */

DROP TABLE IF EXISTS `empresa_contratista`;

CREATE TABLE `empresa_contratista` (
  `ideempcont` int(5) NOT NULL AUTO_INCREMENT,
  `ideempresa` int(20) NOT NULL,
  `ideconstratista` int(20) NOT NULL,
  PRIMARY KEY (`ideempcont`,`ideempresa`,`ideconstratista`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `empresa_contratista` */

insert  into `empresa_contratista`(`ideempcont`,`ideempresa`,`ideconstratista`) values (1,1,1);

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `ideempresa` int(5) NOT NULL AUTO_INCREMENT,
  `rucempresa` int(12) DEFAULT NULL,
  `dscempresa` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`ideempresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `empresas` */

insert  into `empresas`(`ideempresa`,`rucempresa`,`dscempresa`,`estado`) values (1,2147483647,'	FCA PERUANA ETERNIT S A',1);

/*Table structure for table `histsolcal_personal` */

DROP TABLE IF EXISTS `histsolcal_personal`;

CREATE TABLE `histsolcal_personal` (
  `idehistorial` int(20) NOT NULL AUTO_INCREMENT,
  `idesolcapac` int(20) NOT NULL,
  `idepersonal` int(20) NOT NULL,
  `idecapacitacion` int(20) NOT NULL,
  `estadocapac` int(1) DEFAULT NULL,
  PRIMARY KEY (`idehistorial`,`idesolcapac`,`idepersonal`,`idecapacitacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `histsolcal_personal` */

/*Table structure for table `imagenes` */

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `idefoto` int(20) NOT NULL AUTO_INCREMENT,
  `idepersonal` int(20) DEFAULT NULL,
  `nomfoto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idefoto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `imagenes` */

insert  into `imagenes`(`idefoto`,`idepersonal`,`nomfoto`) values (2,116,'116-Jhan Isaac Castillo Tuesta.pdf'),(3,116,'116-firma1d.jpg');

/*Table structure for table `personalc` */

DROP TABLE IF EXISTS `personalc`;

CREATE TABLE `personalc` (
  `idepersonal` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apepaterno` varchar(100) DEFAULT NULL,
  `apematerno` varchar(100) DEFAULT NULL,
  `tipdocumento` int(2) DEFAULT NULL,
  `numdocumento` varchar(20) DEFAULT NULL,
  `cargo` int(2) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`idepersonal`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `personalc` */

insert  into `personalc`(`idepersonal`,`nombres`,`apepaterno`,`apematerno`,`tipdocumento`,`numdocumento`,`cargo`,`estado`) values (1,'JHAN','CASTILLO','TUESTA',1,'72082330',0,1);

/*Table structure for table `solicitud_calendario` */

DROP TABLE IF EXISTS `solicitud_calendario`;

CREATE TABLE `solicitud_calendario` (
  `idesolcapac` int(5) NOT NULL AUTO_INCREMENT,
  `idecalendcapacitaciones` int(20) NOT NULL,
  `idesolicitud` int(20) NOT NULL,
  PRIMARY KEY (`idesolcapac`,`idecalendcapacitaciones`,`idesolicitud`),
  KEY `idesolcapac` (`idesolcapac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `solicitud_calendario` */

/*Table structure for table `solicitudcapac` */

DROP TABLE IF EXISTS `solicitudcapac`;

CREATE TABLE `solicitudcapac` (
  `idesolicitud` int(50) NOT NULL AUTO_INCREMENT,
  `idecontratista` int(30) NOT NULL,
  `numparticipantes` int(6) NOT NULL,
  `numcontacto` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `idetipopago` int(3) NOT NULL,
  `estadosolic` int(1) NOT NULL,
  `numoperpago` varchar(20) DEFAULT NULL,
  `fechapago` timestamp NULL DEFAULT NULL,
  `horapago` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idesolicitud`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `solicitudcapac` */

insert  into `solicitudcapac`(`idesolicitud`,`idecontratista`,`numparticipantes`,`numcontacto`,`correo`,`idetipopago`,`estadosolic`,`numoperpago`,`fechapago`,`horapago`) values (1,1,30,'953569484','itzcadilac_16@hotmail.com',1,1,NULL,NULL,NULL);

/*Table structure for table `tipcapacitaciones` */

DROP TABLE IF EXISTS `tipcapacitaciones`;

CREATE TABLE `tipcapacitaciones` (
  `idecapacitacion` int(20) NOT NULL AUTO_INCREMENT,
  `desccapacitacion` varchar(25) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`idecapacitacion`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tipcapacitaciones` */

insert  into `tipcapacitaciones`(`idecapacitacion`,`desccapacitacion`,`estado`) values (1,'General',NULL),(2,'Trabajo en Altura',NULL),(3,'Trabajo en Caliente',NULL),(4,'Energías Peligrosas',NULL),(5,'Izaje',NULL),(6,'Espacios Confinados',NULL),(7,'Excavación',NULL);

/*Table structure for table `tippago` */

DROP TABLE IF EXISTS `tippago`;

CREATE TABLE `tippago` (
  `idetipopago` int(3) NOT NULL AUTO_INCREMENT,
  `codpago` varchar(5) DEFAULT NULL,
  `desctipopago` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`idetipopago`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tippago` */

insert  into `tippago`(`idetipopago`,`codpago`,`desctipopago`,`estado`) values (1,'DP','Depósito',1),(2,'PY','Paypal',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) DEFAULT NULL,
  `pssword` varchar(150) DEFAULT NULL,
  `nomape` varchar(75) DEFAULT NULL,
  `idarea` varchar(10) DEFAULT NULL,
  `tipo` int(10) unsigned DEFAULT NULL,
  `estado` int(10) DEFAULT NULL COMMENT '0 activo, 1 desactivo',
  `acceso` int(10) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `conectado` int(1) DEFAULT NULL,
  `acerca` varchar(10000) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `provincia` varchar(200) DEFAULT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `departamento` varchar(200) DEFAULT NULL,
  `foto` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=451 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`idusuario`,`usuario`,`pssword`,`nomape`,`idarea`,`tipo`,`estado`,`acceso`,`edad`,`fecha_nacimiento`,`ultima_conexion`,`website`,`facebook`,`twitter`,`linkedin`,`conectado`,`acerca`,`pais`,`provincia`,`distrito`,`departamento`,`foto`) values (2,'administrador','fcea920f7412b5da7be0cf42b8c93759','Administrador','SG026',10,0,0,NULL,NULL,'2016-11-06 13:07:34',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(356,'prueba10','fcea920f7412b5da7be0cf42b8c93759','Prueba 10','SG017',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(357,'prueba20','827ccb0eea8a706c4c34a16891f84e7b','prueba20','SG025',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(358,'prueba50','827ccb0eea8a706c4c34a16891f84e7b','prueba50','SG003',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(359,'secge','fcea920f7412b5da7be0cf42b8c93759','SEC GEN','SG007',0,NULL,NULL,NULL,NULL,'2016-11-06 13:40:08',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(355,'prueba1','fcea920f7412b5da7be0cf42b8c93759','Prueba 1','SG003',1,NULL,NULL,NULL,NULL,'2016-11-06 13:41:15',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(354,'prueba5','fcea920f7412b5da7be0cf42b8c93759','Prueba 5','GE006',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(353,'prueba2','fcea920f7412b5da7be0cf42b8c93759','Prueba2','SG015',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(350,'jcastillo','fcea920f7412b5da7be0cf42b8c93759','Jhan Isaac Castillo Tuesta','GE008',0,0,0,24,'1992-01-16','2019-05-05 18:09:07','http://www.novoexpert.net','http://www.facebook.com/JICT16','http://www.twitter.com','http://www.linkedin.com',0,'Profesional con experiencia en Tecnologías de la Información y Sistemas de Información, diseñando y/o rediseñando procesos, realizando implementaciones de Sistemas de Información de alto desempeño, además de administrar y conducir proyectos, cumpliendo con las responsabilidades asumidas.\r\nCuento con experiencia en el Análisis y Diagramación de Procesos para luego realizar desarrollo de Sistemas de Información que mejoren la Calidad de los Procesos dentro de la entidad.\r\nDe excelentes relaciones interpersonales y habilidad para trabajar en equipo o individualmente, proactivo, con alto grado de responsabilidad y fácil interpretación de las políticas organizacionales.','Perú','Huaral','Huaral','Lima','./imagenes/fotos/350-foto.jpg'),(351,'prueba3','fcea920f7412b5da7be0cf42b8c93759','Prueba 3','SG046',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(352,'prueba4','fcea920f7412b5da7be0cf42b8c93759','Prueba 4','SG026',20,NULL,NULL,NULL,NULL,'2016-11-06 13:40:53',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(450,'lcastillo','fcea920f7412b5da7be0cf42b8c93759','Luis Felipe Castillo Tuesta','GE006',0,0,0,26,'1990-07-06','2016-11-06 14:27:55','http://www.novoexpert.net','http://www.facebook.com/JICT16','http://www.twitter.com','http://www.linkedin.com',1,'Abogado','Perú','Huaral','Huaral','Lima','./imagenes/fotos/450-foto.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
