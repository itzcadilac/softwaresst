/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : sstasesores

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2019-09-22 15:15:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `calendcapacitaciones`
-- ----------------------------
DROP TABLE IF EXISTS `calendcapacitaciones`;
CREATE TABLE `calendcapacitaciones` (
  `idecalendcapacitaciones` int(20) NOT NULL AUTO_INCREMENT,
  `idecapacitacion` int(20) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idecapacitador` int(20) DEFAULT NULL,
  `cupos` int(3) DEFAULT NULL,
  PRIMARY KEY (`idecalendcapacitaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of calendcapacitaciones
-- ----------------------------

-- ----------------------------
-- Table structure for `capacitador`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of capacitador
-- ----------------------------

-- ----------------------------
-- Table structure for `carpetas`
-- ----------------------------
DROP TABLE IF EXISTS `carpetas`;
CREATE TABLE `carpetas` (
  `idcarpeta` int(10) NOT NULL AUTO_INCREMENT,
  `nombrecarpeta` varchar(45) DEFAULT NULL,
  `idecontratista` int(30) DEFAULT NULL,
  UNIQUE KEY `idcarpeta` (`idcarpeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carpetas
-- ----------------------------

-- ----------------------------
-- Table structure for `contratista`
-- ----------------------------
DROP TABLE IF EXISTS `contratista`;
CREATE TABLE `contratista` (
  `idecontratista` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` double NOT NULL,
  `pssword` varchar(100) NOT NULL,
  `razonsocial` varchar(200) NOT NULL,
  `tipo` int(2) NOT NULL DEFAULT '20',
  `feccreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecmodif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ruc`),
  KEY `idecontratista` (`idecontratista`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contratista
-- ----------------------------
INSERT INTO `contratista` VALUES ('1', '20100022142', 'fcea920f7412b5da7be0cf42b8c93759', 'ABB S.A', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('58', '20100114349', 'fcea920f7412b5da7be0cf42b8c93759', 'SGS DEL PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('23', '20100426235', 'fcea920f7412b5da7be0cf42b8c93759', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('12', '20100654025', 'fcea920f7412b5da7be0cf42b8c93759', 'CORPORACION DE INDUSTRIAS PLASTICAS S.A', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('47', '20101155588', 'fcea920f7412b5da7be0cf42b8c93759', 'PROSEGURIDAD S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('28', '20101417451', 'fcea920f7412b5da7be0cf42b8c93759', 'J&W CIA SA', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('51', '20102187211', 'fcea920f7412b5da7be0cf42b8c93759', 'SALUBRIDAD SANEAMIENTO AMBIENTAL Y SERVICIOS SAC.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('31', '20126645326', 'fcea920f7412b5da7be0cf42b8c93759', 'MACHINE SERVICES SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('65', '20144179405', 'fcea920f7412b5da7be0cf42b8c93759', 'SYMCO SRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('4', '20145038384', 'fcea920f7412b5da7be0cf42b8c93759', 'AQA QUÍMICA S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('46', '20167884491', 'fcea920f7412b5da7be0cf42b8c93759', 'PROSAC S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('73', '20168805072', 'fcea920f7412b5da7be0cf42b8c93759', 'VEND SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('76', '20265422510', 'fcea920f7412b5da7be0cf42b8c93759', 'YRS ASOCIADOS SRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('5', '20297890965', 'fcea920f7412b5da7be0cf42b8c93759', 'ASV TELEFONICA S.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('59', '20303180720', 'fcea920f7412b5da7be0cf42b8c93759', 'SIEMENS S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('13', '20344877158', 'fcea920f7412b5da7be0cf42b8c93759', 'DERCO PERU S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('24', '20378061297', 'fcea920f7412b5da7be0cf42b8c93759', 'HARO INGENIEROS EIRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('22', '20416216135', 'fcea920f7412b5da7be0cf42b8c93759', 'FLOSYTEC SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('53', '20427801625', 'fcea920f7412b5da7be0cf42b8c93759', 'SCHNEIDER ELECTRIC PERU S.A', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('69', '20458923443', 'fcea920f7412b5da7be0cf42b8c93759', 'TRANSPORTES ANDINOS JT S.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('14', '20474917542', 'fcea920f7412b5da7be0cf42b8c93759', 'ELECTRO SERVICE MONTAJES SRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('8', '20486428610', 'fcea920f7412b5da7be0cf42b8c93759', 'CONSULTORES CONTRATISTAS J. NINANYA EIRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('7', '20492941400', 'fcea920f7412b5da7be0cf42b8c93759', 'CJB SERVICIOS LOGISTICOS INTEGRALES SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('20', '20503957231', 'fcea920f7412b5da7be0cf42b8c93759', 'EULEN DEL PERU SA', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('19', '20504074464', 'fcea920f7412b5da7be0cf42b8c93759', 'EULEN DEL PERU DE SERVICIOS GENERALES SA', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('44', '20505855494', 'fcea920f7412b5da7be0cf42b8c93759', 'PRECISIÓN SAN PEDRO SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('45', '20505855495', 'fcea920f7412b5da7be0cf42b8c93759', 'PRECISIÓN SAN PEDRO SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('29', '20506025169', 'fcea920f7412b5da7be0cf42b8c93759', 'JOVALCO INGENIEROS S.R.L', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('67', '20508689404', 'fcea920f7412b5da7be0cf42b8c93759', 'TOTAL WEIGHT & SYSTEMS S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('68', '20508689405', 'fcea920f7412b5da7be0cf42b8c93759', 'TOTAL WEIGHT & SYSTEMS S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('50', '20511480702', 'fcea920f7412b5da7be0cf42b8c93759', 'RYM FUMYMSER S.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('75', '20512369716', 'fcea920f7412b5da7be0cf42b8c93759', 'WET CHEMICAL PERU S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('9', '20514870013', 'fcea920f7412b5da7be0cf42b8c93759', 'CONTRATISTAS PROYECTOS Y SOLUCIONES SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('49', '20515319574', 'fcea920f7412b5da7be0cf42b8c93759', 'RICOH DEL PERÚ S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('18', '20518934091', 'fcea920f7412b5da7be0cf42b8c93759', 'ENGINEER FIRE', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('35', '20519494800', 'fcea920f7412b5da7be0cf42b8c93759', 'MECANICA MINERA COMERCIAL SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('30', '20520571320', 'fcea920f7412b5da7be0cf42b8c93759', 'KONECRANES PERU SCRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('2', '20520658522', 'fcea920f7412b5da7be0cf42b8c93759', 'AMECH SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('55', '20521314649', 'fcea920f7412b5da7be0cf42b8c93759', 'SERCE PERU S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('21', '20521684144', 'fcea920f7412b5da7be0cf42b8c93759', 'FESANCO PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('6', '20522452654', 'fcea920f7412b5da7be0cf42b8c93759', 'CHEMICAL RUBBER COMPANY S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('32', '20522466281', 'fcea920f7412b5da7be0cf42b8c93759', 'MANTENIMIENTO INDUSTRIAL L&M S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('48', '20522973204', 'fcea920f7412b5da7be0cf42b8c93759', 'PROVITEC SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('38', '20523541294', 'fcea920f7412b5da7be0cf42b8c93759', 'NIC GRAF S.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('10', '20523655893', 'fcea920f7412b5da7be0cf42b8c93759', 'CONTROL AUDIOVISUAL S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('61', '20523841760', 'fcea920f7412b5da7be0cf42b8c93759', 'SISTEMA INTEGRAL DE VENTILACION S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('52', '20524358035', 'fcea920f7412b5da7be0cf42b8c93759', 'SAZON Y SABOR CULINARIO S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('71', '20524394937', 'fcea920f7412b5da7be0cf42b8c93759', 'V&B ENGINEERS GROUP S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('40', '20545585465', 'fcea920f7412b5da7be0cf42b8c93759', 'PALCON PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('41', '20545585466', 'fcea920f7412b5da7be0cf42b8c93759', 'PALCON PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('54', '20547742657', 'fcea920f7412b5da7be0cf42b8c93759', 'SEIND INGENIERÍA ELÉCTRICA', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('26', '20548674418', 'fcea920f7412b5da7be0cf42b8c93759', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('37', '20548892679', 'fcea920f7412b5da7be0cf42b8c93759', 'MULTISERVICIOS YERIK SRL', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('27', '20552256728', 'fcea920f7412b5da7be0cf42b8c93759', 'INGENIEROS CONTRATISTAS M&T SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('60', '20553516863', 'fcea920f7412b5da7be0cf42b8c93759', 'SINAUC SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('36', '20553849081', 'fcea920f7412b5da7be0cf42b8c93759', 'MOVILGRAF E.I.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('62', '20555359650', 'fcea920f7412b5da7be0cf42b8c93759', 'SOLUCIONES EMPRESARIALES ENDAFE S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('16', '20555451629', 'fcea920f7412b5da7be0cf42b8c93759', 'ENERGIA Y COMBUSTION SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('11', '20556332828', 'fcea920f7412b5da7be0cf42b8c93759', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('74', '20556868400', 'fcea920f7412b5da7be0cf42b8c93759', 'VERTISUB PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('57', '20563492351', 'fcea920f7412b5da7be0cf42b8c93759', 'SERVICIOS INDUSTRIALES MANFAB S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('56', '20565882725', 'fcea920f7412b5da7be0cf42b8c93759', 'SERGRALS PERU SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('63', '20565933818', 'fcea920f7412b5da7be0cf42b8c93759', 'SOLUCIONES PREDICTIVAS TECNOLOGIA Y MANTENIMIENTO SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('66', '20568551657', 'fcea920f7412b5da7be0cf42b8c93759', 'TERMOFUSION PERU S.A.C.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('77', '20600350391', 'fcea920f7412b5da7be0cf42b8c93759', 'NOVO EXPERT SRL', '20', '2019-09-21 10:15:54', '2019-09-21 10:15:54');
INSERT INTO `contratista` VALUES ('42', '20600502841', 'fcea920f7412b5da7be0cf42b8c93759', 'POLIGRUA PERU S.A.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('15', '20600758129', 'fcea920f7412b5da7be0cf42b8c93759', 'ELECTRONICA OLGUIN E.I.R.L.', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('39', '20600830512', 'fcea920f7412b5da7be0cf42b8c93759', 'NK&C SERVICIOS GENERALES SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('34', '20601401810', 'fcea920f7412b5da7be0cf42b8c93759', 'MASERPROIN SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('25', '20601565235', 'fcea920f7412b5da7be0cf42b8c93759', 'HUAQUIAN S.A.C', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('3', '20602186220', 'fcea920f7412b5da7be0cf42b8c93759', 'APPLI SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('70', '20602269991', 'fcea920f7412b5da7be0cf42b8c93759', 'TRANSPORTES Y SERVICIOS KRIEGER SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');
INSERT INTO `contratista` VALUES ('33', '20603612249', 'fcea920f7412b5da7be0cf42b8c93759', 'MAQEQP SAC', '20', '2019-08-17 17:24:42', '2019-08-17 17:24:42');

-- ----------------------------
-- Table structure for `contratista_personal`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contratista_personal
-- ----------------------------
INSERT INTO `contratista_personal` VALUES ('1', '26', '1', '1', '1', '1', '2019-07-14 13:56:54', null, '0000-00-00 00:00:00', null);

-- ----------------------------
-- Table structure for `empresas`
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `ideempresa` int(5) NOT NULL AUTO_INCREMENT,
  `rucempresa` int(12) DEFAULT NULL,
  `dscempresa` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`ideempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES ('1', '2147483647', '	FCA PERUANA ETERNIT S A', '1');

-- ----------------------------
-- Table structure for `empresa_contratista`
-- ----------------------------
DROP TABLE IF EXISTS `empresa_contratista`;
CREATE TABLE `empresa_contratista` (
  `ideempcont` int(5) NOT NULL AUTO_INCREMENT,
  `ideempresa` int(20) NOT NULL,
  `ideconstratista` int(20) NOT NULL,
  PRIMARY KEY (`ideempcont`,`ideempresa`,`ideconstratista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresa_contratista
-- ----------------------------

-- ----------------------------
-- Table structure for `estado`
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `Codigo_Estado` varchar(2) NOT NULL,
  `Descripcion_Estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Codigo_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES ('01', 'EMITIDO');
INSERT INTO `estado` VALUES ('02', 'APROBADO');

-- ----------------------------
-- Table structure for `histsolcal_personal`
-- ----------------------------
DROP TABLE IF EXISTS `histsolcal_personal`;
CREATE TABLE `histsolcal_personal` (
  `idehistorial` int(20) NOT NULL AUTO_INCREMENT,
  `idesolcapac` int(20) NOT NULL,
  `idepersonal` int(20) NOT NULL,
  `idecapacitacion` int(20) NOT NULL,
  `estadocapac` int(1) NOT NULL,
  `notacapac` int(11) DEFAULT NULL,
  `feccapac` date DEFAULT NULL,
  PRIMARY KEY (`idehistorial`,`idesolcapac`,`idepersonal`,`idecapacitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of histsolcal_personal
-- ----------------------------
INSERT INTO `histsolcal_personal` VALUES ('1', '1', '1', '1', '1', '18', null);

-- ----------------------------
-- Table structure for `imagenes`
-- ----------------------------
DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `idefoto` int(20) NOT NULL AUTO_INCREMENT,
  `idepersonal` int(20) DEFAULT NULL,
  `nomfoto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idefoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of imagenes
-- ----------------------------

-- ----------------------------
-- Table structure for `parametro`
-- ----------------------------
DROP TABLE IF EXISTS `parametro`;
CREATE TABLE `parametro` (
  `idetipparametro` varchar(50) NOT NULL,
  `codparametro` int(100) NOT NULL COMMENT 'Código del parámetro',
  `dscparametro` varchar(150) DEFAULT NULL COMMENT 'Descripción del Parámetro',
  `txtparametro` text COMMENT 'Valor del Parametro',
  `stsparametro` int(1) DEFAULT '1' COMMENT 'Estado del Parámetro',
  `usucreacion` varchar(50) NOT NULL DEFAULT 'COSTEOABC' COMMENT 'Campo de Auditoría',
  `feccreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Campo de Auditoría',
  `usumodif` varchar(50) NOT NULL DEFAULT 'COSTEOABC' COMMENT 'Campo de Auditoría',
  `fecmodif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Campo de Auditoría',
  PRIMARY KEY (`idetipparametro`,`codparametro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cuerpo de la tabla TipParámetro.';

-- ----------------------------
-- Records of parametro
-- ----------------------------
INSERT INTO `parametro` VALUES ('TIP_DOCUMENTO', '1', 'DNI', null, '1', 'COSTEOABC', '2019-07-14 13:52:25', 'COSTEOABC', '2019-07-14 13:52:25');
INSERT INTO `parametro` VALUES ('TIP_DOCUMENTO', '2', 'PEX', null, '1', 'COSTEOABC', '2019-07-14 13:52:31', 'COSTEOABC', '2019-07-14 13:52:31');
INSERT INTO `parametro` VALUES ('TIP_ESTADOCAPA', '1', 'Aprobado', null, '1', 'COSTEOABC', '2019-07-14 14:07:56', 'COSTEOABC', '2019-07-14 14:07:56');
INSERT INTO `parametro` VALUES ('TIP_ESTADOCAPA', '2', 'Desaprobado', null, '1', 'COSTEOABC', '2019-07-14 14:08:03', 'COSTEOABC', '2019-07-14 14:08:03');
INSERT INTO `parametro` VALUES ('TIP_ESTADOSOL', '1', 'Pendiente Pago', null, '1', 'COSTEOABC', '2019-05-21 09:31:41', 'COSTEOABC', '2019-05-21 09:31:41');
INSERT INTO `parametro` VALUES ('TIP_ESTADOSOL', '2', 'Pagado', null, '1', 'COSTEOABC', '2019-05-21 09:32:19', 'COSTEOABC', '2019-05-21 09:32:19');
INSERT INTO `parametro` VALUES ('TIP_ESTADOSOL', '3', 'Aprobado', null, '1', 'COSTEOABC', '2019-05-21 09:32:35', 'COSTEOABC', '2019-05-21 09:32:35');
INSERT INTO `parametro` VALUES ('TIP_ESTADOSOL', '4', 'Rechazado', null, '1', 'COSTEOABC', '2019-05-21 09:32:42', 'COSTEOABC', '2019-05-21 09:32:42');

-- ----------------------------
-- Table structure for `personalc`
-- ----------------------------
DROP TABLE IF EXISTS `personalc`;
CREATE TABLE `personalc` (
  `idepersonal` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apepaterno` varchar(100) DEFAULT NULL,
  `apematerno` varchar(100) DEFAULT NULL,
  `tipdocumento` int(2) DEFAULT NULL,
  `numdocumento` varchar(20) DEFAULT NULL,
  `cargo` varchar(500) DEFAULT NULL,
  `foto` varchar(100) DEFAULT '../assets/avatars/profile-pic.jpg',
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`idepersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=433 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personalc
-- ----------------------------
INSERT INTO `personalc` VALUES ('1', 'OSCAR BENITO', 'CACHAMBI', '', '1', '00470832', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('2', 'ENDIS RAUL', 'CRESPO', 'TIGRERA', '1', '00551137', 'INSTRUCTOR - TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('3', 'MERLES KARINA', 'GONZALEZ ', 'AZOCAR', '1', '00644640', 'PREVENCIONISTA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('4', 'ENRIQUE EDUARDO', 'BARRETO', 'MARCANO', '1', '00652951', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('5', 'MOISES ALFONSO', 'PARADA ', 'RANGEL', '1', '00942901', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('6', 'BONNY DANIEL', 'ACOSTA', 'POLANCO', '1', '01318104', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('7', 'JAMER ANTONIO', 'QUIÑONEZ  ', 'CANO', '1', '01389647', 'SUPERVISOR DE OBRA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('8', 'ALFONSO ALEJANDRO', 'ADRIANZA', 'FUENMAYOR', '1', '01493174', 'JEFE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('9', 'YHAYKER PHIERO', 'PETIT', '-', '1', '01499798', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('10', 'GUILLERMO RAFAEL', 'HERNANDEZ', 'MARRERO', '1', '01850398', 'RAYOS X', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('11', 'JORGE LUIS', 'JIMENEZ', '-', '1', '01949214', 'SUPERVISOR MONTAJE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('12', 'RONNY VIRGILIO', 'ORTEGA', 'GUARECUCO', '1', '01996397', 'SUPERVISOR ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('13', 'ANGELIS DANIELA', 'TORRES', 'RODRIGUEZ', '1', '02206020', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('14', 'HILDAMAR', 'VELAZCO', 'ALVARADO', '1', '02731144', 'SUPERVISOR ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('15', ' EDWIN ALBERTO', 'MENDEZ', 'VIVAS ', '1', '02741974', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('16', 'EUSEBIA', 'MORAN ', 'CASTILLO', '1', '02817872', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('17', 'OMAR FELIPE', 'ARGUINZZONES', 'TROMP', '1', '03077615', 'TECNICO SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('18', 'JOSE RAMON', 'RIVAS', 'BRICEÑO', '1', '03132614', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('19', 'BRYAN MIGUEL HENDRIK', 'ZORRILLA', 'ZAMBRANO', '1', '03364017', 'AYUDANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('20', 'ORLANDO', 'SERNA ', 'FIESTAS', '1', '03850513', 'TOPOGRAFO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('21', 'JOSE DOMINGO', 'TORREALBA ', 'AGUILAR ', '1', '03852004', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('22', 'PEDRO', 'PAQUITA', 'COLQUE', '1', '04427706', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('23', 'GENARO SANTIAGO', 'LUQUE', 'APAZA', '1', '06083845', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('24', 'JUAN', 'MATOS', 'MOGOLLON', '1', '06644688', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('25', 'CARLOS MANUEL', 'ROMERO ', 'SAMAME', '1', '06748566', 'SUPERVISOR GENERAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('26', 'DINA ESMERALDA', 'MEDINA ', 'LOPEZ', '1', '07141738', 'LABORATORIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('27', 'MANUEL IGNACIO', 'SOLANO', 'SALINAS', '1', '07465972', 'INGENIERO HSE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('28', 'WILSON ', 'ORTIZ ', 'URQUIA ', '1', '07513877', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('29', 'MOISES MANUEL', 'CLAUDIO', 'BERROSPI', '1', '07616532', 'MECANICO/SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('30', 'FERNANDO ANTONIO', 'VELARDE', 'PARIONA', '1', '07652143', 'SUPERVISOR SSOMAC - OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('31', 'GUILLERMO MANUEL', 'BERRIOS', 'VIDAL', '1', '08069239', 'MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('32', 'EUSEBIA MARGARITA', 'REVATTA', 'SANTOS', '1', '08139503', 'COCINERA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('33', 'CONCEPCION', 'MAMANI ', 'CONDORI', '1', '08166591', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('34', 'JOSE', 'ADANAQUE ', 'COLLAZO ', '1', '08498247', 'SEGURIDAD INDUSTRIAL ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('35', 'PABLO ANTONIO', 'JARA', 'HUAMAN', '1', '08663684', 'INGENIERO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('36', 'JESUS MARCELO', 'YCHPAS', '', '1', '09445952', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('37', 'MARIA', 'AGUIRRE ', 'OCHOA', '1', '09495017', 'RAYOS X', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('38', 'GERMAN', 'CULQUE', 'DOMINGUEZ', '1', '09553136', 'MONTAJISTA SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('39', 'EDWARD JIMMY', 'CARBAJAL', 'SULCA', '1', '09747901', 'VAJILLERO-LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('40', 'ROBERT WALTER', 'DE LA CRUZ', 'HUALCAS', '1', '09915234', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('41', 'ROLANDO ADOLFO', 'CORNEJO ', 'SIGUAS', '1', '09922016', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('42', 'JOSE ARMANDO ', 'SORIA', 'VASQUEZ', '1', '09946312', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('43', 'SANDRO ANGEL', 'HUETE', 'BAEZA', '1', '09956915', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('44', 'JUAN CARLOS', 'PAZ', 'PAREDES', '1', '09973998', 'ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('45', 'CARLOS ISMAEL', 'BARRERA', 'HUANILA', '1', '09985369', 'TECNICO AYUDANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('46', 'JACINTO SANTOS ', 'ARENAS', 'SUEL ', '1', '10024459', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('47', 'ANGEL OMAR', 'AGUIRRE', 'YANAC', '1', '10047396', 'ASESOR DE INGENIERIA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('48', 'EDUARDO JAIRO', 'HERMOSILLA', 'ALIAGA', '1', '10110360', 'OPERADOR DE CAMIÓN GRÚA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('49', 'PERCY MARTIN', 'MACAVILCA ', 'LOAYZA', '1', '10157562', 'SUPERVISOR DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('50', 'MARCO ANTONIO', 'FABIAN', 'ESTRADA', '1', '10162337', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('51', 'ROBERT', 'GABRIEL', 'ROCHA', '1', '10169705', 'MECANICO/SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('52', 'JUAN', 'LEON', 'HERNANDEZ', '1', '10187590', 'OPERADOR DE GRÚA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('53', 'DANIEL MISAEL', 'VARGAS', 'MARTINEZ', '1', '10198426', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('54', 'EFRAIN ANTONIO', 'ROMAN', 'MACHACA', '1', '10257832', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('55', 'JOSE FELICIANO', 'RICRA ', 'HUAMAN', '1', '10420048', 'ING RESIDENTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('56', 'WALTER ENMANUEL', 'MARTÍNEZ', 'LAZO', '1', '10425293', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('57', 'VICTOR ANGEL', 'COLL', 'CHACHICO', '1', '10436867', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('58', 'DAVID ALEXANDER', 'SAYRE', 'MINAYA', '1', '10454622', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('59', 'CESAR AUGUSTO ', 'NAPA', 'MARTINEZ ', '1', '10567381', 'MECANICO  ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('60', 'JHON ADOLFO', 'ALVAREZ ', 'CRESPO', '1', '10739297', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('61', 'FERNANDO FREGORIO', 'PICHIULE', 'DELGADO', '1', '10787419', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('62', 'CESAR DAVID', 'YATACO', 'MAGALLANES', '1', '10874401', 'MECANICO  ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('63', 'DENNY JOSE', 'ZAMBRANO', 'BUTTO', '1', '14509193', 'AYUDANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('64', 'DEMETRIO CALIXTRO', 'TENA ', 'YACON', '1', '15642329', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('65', 'JESUS ORLANDO', 'LEON', 'MAURICIO', '1', '15763704', 'TECNICO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('66', 'CESAR DAVID', 'MONTILLA', '', '1', '16544404', 'GASFITERO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('67', 'SEGUNDO FEDERICO', 'MACALOPU', 'ATOCHE', '1', '16569263', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('68', 'JOSE LUIS', 'DELGADO', 'ZAPATA', '1', '16586537', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('69', 'SONIA DEL PILAR', 'VILLALOBOS ', 'CHAPILLIQUEN', '1', '16797404', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('70', 'CARLOS MARTIN', 'ABANTO', 'GUTIERREZ', '1', '18903500', 'MONTAJISTA SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('71', 'JAVIER VÍCTOR ', 'NINANYA', 'CRISTOBAL', '1', '20406237', 'INGENIERO RESIDENTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('72', 'MARIA ELIZABETH', 'NINANYA', 'CRISTOBAL', '1', '20438268', 'RESIDENTE ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('73', 'MARCO ANTONIO', 'CALDERON ', 'SALINAS ', '1', '21557690', 'SUPERVISOR CAMPO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('74', 'DANY JESUS', 'CHAVEZ ', 'CARDENAS', '1', '21881662', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('75', 'JENNY AURORA', 'CASAS', 'MARTINEZ', '1', '22244419', 'SUPERVISOR DE RIESGOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('76', 'CARLO MAGNO', 'VALVERDE', 'MARTÍNEZ', '1', '25412971', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('77', 'CRISTOBAL', 'ANAMPA', 'AGUIRRE', '1', '25430306', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('78', 'JIMMY', 'OLAYA', 'MEDINA', '1', '25448032', 'GERENTE DE SERVICIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('79', 'CARLOS ALBERTO', 'QUIROZ', 'SANCHEZ', '1', '25489440', 'TECNICO DE REVESTIMIENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('80', 'MOISES BENITO', 'VALDIVIEZO', 'ROJAS', '1', '25511627', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('81', 'AMÉRICO CRISTOBAL', 'VILLARAN ', 'UCHUYA', '1', '25518575', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('82', 'CARLOS MARTIN', 'CUMPLIDO', 'MEIGGS', '1', '25534829', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('83', 'SEGUNDO VICENTE', 'VILCHEZ', 'GARCIA', '1', '25559159', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('84', 'MARCOS SANTIAGO', 'PACORA', 'MURGUEYTIO', '1', '25611432', 'TÉCNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('85', 'MARIO ', 'ESPINOZA', 'NEVADO', '1', '25628275', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('86', 'JORGE', 'CAYCHO ', 'RAMIREZ', '1', '25666269', 'SUPERVISOR DE OBRA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('87', 'WILBER', 'VELAZQUE', 'GUTIERREZ', '1', '25710455', 'GERENTE DE SERVICIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('88', 'IVAN JOE', 'BENAVIDES', 'BARRIENTOS', '1', '25712585', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('89', 'CESAR AUGUSTO', 'DIAZ', ' LIMAY', '1', '25772444', 'LOGISTICA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('90', 'JOSE LUIS', 'HUAMANCCARI', 'HUAMAN', '1', '25775356', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('91', 'LUZ MARIA', 'BERNAOLA', 'PRADO', '1', '25780594', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('92', 'VILMA', 'MALPARTIDA ', 'CALDERON', '1', '25796061', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('93', 'JOSE JAIME', 'CRUZ', 'EZPINOZA', '1', '25820808', 'TÉCNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('94', 'PAUL ALAN', ' MUÑOZ ', 'SANTILLAN', '1', '25832511', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('95', 'RENATO VITTORIO  ', 'CORDANO', 'BETANCOURT', '1', '29637356', 'ESPECIALISTA EN TRABAJOS EN ALTURA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('96', 'SAMUEL', 'COZO', 'CCARI', '1', '29658251', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('97', 'JOSE CARLOS', 'DIAZ ', 'BARBOZA', '1', '31189702', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('98', 'JUVER JHON', 'MEZA', 'QUINTO', '1', '40088672', 'TECNICO ELECTROMECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('99', 'MARIA VICTORIA', 'PAZOS', 'PURIZACA', '1', '40128396', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('100', 'WILMER ', 'CARDENAS', 'CUEVA', '1', '40251971', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('101', 'JIMMY PAUL', 'RODRIGUEZ ', 'MINGOCHEA ', '1', '40267065', 'SUPERVISOR DE OPERACIONES ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('102', 'EDWIN SIMEON', 'VIZCARRA', 'ALARCÓN', '1', '40288409', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('103', 'MARCO ANTONIO', 'GUERRA', 'GONZALES', '1', '40288779', 'SUPERVISOR DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('104', 'ALEX GERMAN', 'SANTANA ', 'ALDANA', '1', '40306725', 'ING. SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('105', 'ROBINSON', 'RENGIFO', 'TELLO', '1', '40407585', 'SUPERVISORA DE OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('106', 'CESAR ALEJANDRO', 'OLGUIN', 'PAREDES', '1', '40426107', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('107', 'ALAIN  YURI', 'RIQUEZ ', 'GOZAR', '1', '40548254', 'OPERADOR DE GRÚA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('108', 'PABLO', 'MALLQUI', 'GENEBROZO', '1', '40557456', 'SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('109', 'ROSA MILAGROS', 'LEVANO', 'RIOS', '1', '40646638', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('110', 'WILQUENSON LUIS', 'SALAZAR', 'RUIZ', '1', '40653439', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('111', 'JESUS GERARDO', 'CHAUCA', 'GIRON', '1', '40720469', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('112', 'DAVID', 'TRUJILLO', 'MESIAS', '1', '40732728', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('113', 'EDWAR', 'BELLIDO ', 'CANALES', '1', '40734760', 'TECNICO DE EQUIPO DE LEVANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('114', 'MIGUEL ANGEL', 'RIMARI', 'ARISTA', '1', '40820192', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('115', 'ARTURO', 'CONDORI', 'BARJA', '1', '40844588', 'MECANICO/SOLDADOR ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('116', 'MANUEL AVELINO', 'ALIAGA', 'MOTA', '1', '40848382', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('117', 'ROBERT FELIX', 'VARILLAS', 'CABELLO', '1', '40866111', 'GERENTE GENERAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('118', 'LIDER JOSE', 'MATEO', 'MUCHA', '1', '40969445', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('119', 'ALDO RAFAEL', 'FELIX', 'OBREGON', '1', '41047805', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('120', 'DANNY WINSTON', 'CRUZ', 'FARIAS', '1', '41116261', 'SUPERVISOR DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('121', 'BILLY DANIEL', 'BARBARAN', 'LLACTAS', '1', '41139238', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('122', 'JOSE ANTONIO', 'MOSTACERO', 'BOBADILLA ', '1', '41190244', 'RIGGER DE GRUA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('123', 'EUSTAQUIO', 'MONTESINOS', 'TORRES', '1', '41196925', 'OPERARIO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('124', 'JOSE MIGUEL', 'GONZALES', 'CARRASCO', '1', '41254510', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('125', 'AMET', 'URETA ', 'ALIAGA', '1', '41304202', 'SUPERVISOR DE OPERACIONES ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('126', 'FERNAN', 'CISNEROS', 'RAMIREZ', '1', '41315838', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('127', 'EDWIN', 'TAMARA', 'LLECLLISH', '1', '41427640', 'SUPERVISOR ZONAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('128', 'CESAR MANUEL ', 'PINEDO ', 'DE LA CRUZ ', '1', '41478643', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('129', 'OMAR EZEQUIEL', 'BAZAN', 'CRUZADO', '1', '41595295', 'CONSULTOR AMBIENTAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('130', 'MELINA', 'ESQUIVEL', 'PALOMINO', '1', '41803793', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('131', 'VICTOR ARTURO', 'ZUÑIGA', 'HUERTAS', '1', '41817151', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('132', 'NEILS ARTURO ', 'GONZALES', 'HURTADO', '1', '41878287', 'MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('133', 'JORGE CARLOS', 'SHAHUANO', 'DAHUA', '1', '41895662', 'MECANICO SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('134', 'CECILIA MARITZA', 'DOLORES ', 'LUCAR', '1', '41898102', 'JEFE DE SSMA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('135', 'GOYO ACASUZO', 'PALPAN', 'BENITES', '1', '41923658', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('136', 'JUAN CRLOS', 'TIPULA', 'QUISPE', '1', '41933548', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('137', 'LUIS', 'ROMERO', 'MORENO', '1', '42115708', 'TÉCNICO DE CALDERAS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('138', 'JOSE ALBERTO', 'LLONTOP', 'SANTISTEBAN', '1', '42136542', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('139', 'JULIO MARTIN', 'OSORIO ', 'SAAVEDRA', '1', '42149549', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('140', 'JOHAN JOSEPH', 'TUPAYACHI', 'DAVILA', '1', '42169935', 'GERENTE GENERAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('141', 'RIGOBERTO VICTOR', 'INGA', 'TORRES', '1', '42262749', 'TECNICO MECANICO SENIOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('142', 'DANNY WAGNER ', 'DIAZ', 'VASQUEZ', '1', '42283454', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('143', 'JIM', 'DAZA', 'VALVERDE', '1', '42292692', 'MECANICO  ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('144', 'JORGE ENRIQUE', 'SANCHEZ', 'GARRIDO', '1', '42475156', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('145', 'JORGE LUIS', 'AQUINO', 'CHUVIANTE', '1', '42476451', 'SOLDADOR /MECANICO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('146', 'MIGUEL ANGEL', 'MEDINA', 'POMA', '1', '42557455', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('147', 'DAWI RISSI', 'SILVA ', 'CENTURION', '1', '42559864', 'AYUDANTE DE COCINA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('148', 'WALTER', 'RAMOS', 'RODRIGUEZ', '1', '42605130', 'SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('149', 'JUAN ', ' CRUZ ', 'CRUZ', '1', '42638643', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('150', 'LUIS ARMANDO', ' ARIAS ', 'MARTINEZ', '1', '42639462', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('151', 'EVELYN CAORI', 'PEÑA', 'MARQUINA', '1', '42687053', 'SUPERVISIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('152', 'CHALE', 'VALLEJOS', 'DAVILA', '1', '42734513', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('153', 'MARIO', 'CUNYAS', 'CATAY', '1', '42739264', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('154', 'GINN KEDDY', 'RENGIFO', 'DAVILA', '1', '42772063', 'MECANICO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('155', 'RONALD', 'GONZALES', 'SOCOLA', '1', '42776552', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('156', 'LUIS CARLOS', 'ZEÑA', 'LÓPEZ', '1', '42793568', 'MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('157', 'LUIS ANTHONY  PAUL', 'LEGUA', 'GRANADINO', '1', '42818763', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('158', 'JUAN MANUEL', 'CCORI', 'GONZALES', '1', '42868261', 'OPERADOR DE GRUAS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('159', 'ANGELICA ROCIO', 'CAMPOS ', 'ARENAZA', '1', '42962159', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('160', 'LEONIT', 'SANCHEZ', 'GUTIERRES ', '1', '42964150', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('161', 'DAVID YOE', 'MORA', 'RIVERA', '1', '42974897', 'MONTAJISTA SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('162', 'PAVEL RONY', 'OLORTEGUI', 'MENDIETA', '1', '43025837', 'SUPERVISOR DE INSTRUMENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('163', 'LUZGARDO', 'ESPIRITU', 'MIRANDA', '1', '43031959', 'JEFE DE MANTENIMIENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('164', 'CARLOMAN', 'LA TORRE', 'CHUQUIZUTA', '1', '43127232', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('165', 'BERNABE RICARDO', 'SANTA CRUZ', ' VASQUEZ', '1', '43195956', 'SUPERVISOR FSR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('166', 'CARLOS ALBERTO', 'ESPINOZA  ', 'WINCHO', '1', '43227826', 'JEFE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('167', 'RUBEN RICARDO', 'BRONCANO', 'MINAYA', '1', '43378600', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('168', 'JULIAN', 'RAMOS', 'CONDORI', '1', '43398449', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('169', 'RUBEN', 'ROJAS', 'BARRIOS', '1', '43446828', 'TECNICO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('170', 'PAUL FRANCISCO', 'URETA', 'HUAMALI', '1', '43459256', 'CONDUCTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('171', ' YTALA RUBI', 'SAGASTEGUI ', 'QUISPE', '1', '43479925', 'PSICOLOGIA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('172', 'OSCAR GABRIEL', 'LA TORRE', 'SALIN', '1', '43512190', 'INGENIERO DE CAMPO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('173', 'OSWALDO', 'JUSTO', 'RAMIREZ', '1', '43598664', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('174', ' VANESSA', 'CUEVA ', 'RENGIFO', '1', '43609469', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('175', 'JIMMY', 'LOAYZA', 'SERRANO', '1', '43736054', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('176', 'ANIBAL', 'NAVARRO', 'ALLCCA', '1', '43740365', 'ING. CALIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('177', 'MICHEL  PERCY', 'GOMEZ ', 'ROSALES', '1', '43783987', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('178', 'MILTER ARTEMIO', 'DAHUA', 'SAQUIRAY', '1', '43837949', 'MECANICO - SOLADADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('179', 'ROGELIO MAURICIO', 'LOPEZ', 'HIDALGO', '1', '43921989', 'OPERADOR MONTACARGA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('180', 'JESUS LEOPOLDO', 'VILLARAN ', 'CASTRILLON', '1', '43935729', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('181', 'POOL ANDERSON', 'SALAZAR ', 'HERMOZA ', '1', '44004902', 'OPERARIO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('182', 'LUIS MIGUEL', 'LOBATO', 'INGARUCA', '1', '44048606', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('183', 'JAIME', 'MONTENEGRO', 'URIARTE', '1', '44153490', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('184', 'YESSENIA ELITA', 'GOMEZ', 'ALEJOS', '1', '44196198', 'JEFA DE OPERACIONES ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('185', 'JEAN CARLOS', 'VELAZQUE', 'GUTIERREZ', '1', '44248086', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('186', 'MICHAEL ', 'CONDE ', 'HUAMAN', '1', '44302481', 'PREVENCIONISTA DE RIESGOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('187', 'EDWIN LUIS', 'PUMACAYO', 'CCAHUANA', '1', '44314886', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('188', 'JAROL JUNIOR', 'FRANAHUI', 'CAMARGO', '1', '44331906', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('189', 'JORGE LUIS', 'MATEO ', 'MUCHA', '1', '44445381', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('190', 'JOSE CARLOS ', 'AQUINO', 'CHUVIANTE ', '1', '44477853', 'SOLDADOR MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('191', 'CRISTHIAN RICARDO', 'LLONTOP', 'SANTISTEBAN', '1', '44550782', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('192', 'CARLOS HUMBERTO', 'JIMENEZ', 'GONZALES', '1', '44585394', 'JEFE DE SEGURIDAD ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('193', 'JULIO ALBERTO', 'OSCCO', 'SAAVEDRA', '1', '44656559', 'TECNICO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('194', 'GUSTAVO ALDO', 'CHACON ', 'RAMOS', '1', '44720682', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('195', 'VICTORIA IRIS', 'GONZALES', 'RODAS', '1', '44768917', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('196', 'ELIXDANT', ' GALINDO ', 'SALAS', '1', '44795278', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('197', 'MICHAEL STEVE', 'CHAMORRO', 'CANORIO', '1', '44804926', 'ING.SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('198', 'JORGE CARLOS', 'MURAYARI', 'CANAQUIRI', '1', '45015595', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('199', 'ANGEL', 'CRUZ', 'VILELA', '1', '45035793', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('200', 'WILSON FRANCO', 'COLLANTES ', 'PRIETO', '1', '45068725', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('201', 'JOSE MARTIN', 'CRISOSTOMO', 'ROMERO', '1', '45080164', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('202', ' YESDASI', 'CARRILLO', ' MARTELL', '1', '45103161', 'JEFE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('203', 'ARLEN CRISTOPHER', 'NUÑEZ', 'PINEDO', '1', '45105632', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('204', 'JOSE ADRIAN', 'MONTERO', 'CARRION', '1', '45219547', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('205', ' AHNELY', 'JACINTO ', 'FABIAN', '1', '45240752', 'LABORATORIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('206', 'ADELMO', 'CHILCON', 'RAMIREZ', '1', '45242169', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('207', 'ROBINSON', 'VEGA', 'ALTAMIRANO', '1', '45296261', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('208', 'JIMY LEONIDAS', 'UMASI', 'TANCAILLO', '1', '45304736', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('209', 'ENRIQUE OCTAVIO', 'RAMIREZ', 'RIMARI', '1', '45338510', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('210', 'WILLIAM JOSE', 'MARTINEZ', 'OLIVARES', '1', '45457368', 'TÉCNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('211', 'YORKS DENILSON', 'MONTOYA ', 'CAHUATA', '1', '45478218', 'TÉCNICO DIAGRAFÍA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('212', 'JOSE MIGUEL', 'MARAVI', 'NINANYA', '1', '45509356', 'SUPERVISOR DE OBRA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('213', 'JOSWILL', 'AMASIFUEN', 'OROCHE', '1', '45517108', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('214', 'MANUEL JOSUE', 'HERRERA   ', 'GONZALEZ', '1', '45568228', '', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('215', 'ROMULO MAXIMO', 'ADRIANZEN ', 'JUAREZ', '1', '45581239', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('216', ' CHRISTIAN GIANCARLOS', 'GORDILLO', 'MANIHUARI', '1', '45592842', 'SUPERVISOR DE OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('217', ' JESUS EDUARDO', 'LOYOLA ', 'COAQUIRA', '1', '45604533', 'TECNICO ELECTRÓNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('218', ' JESUS EDUARDO', 'LOYOLA ', 'COAQUIRA', '1', '45604533', 'TECNICO ELECTRÓNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('219', 'ANGHELLO RONY', 'CANDELARIO ', 'OBANDO', '1', '45673240', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('220', 'JENIER', 'LOPEZ ', 'CAHUAZA', '1', '45685062', 'TECNICO DE SERVICIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('221', 'YOEL FREDY', 'PALPA', 'CCANTO', '1', '45710844', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('222', 'EDWIN ANTONIO', 'CONDEÑA', 'NAVENTA', '1', '45780959', 'ING SSOMA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('223', 'SUCY', 'CORDOVA', 'TADEO', '1', '45860624', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('224', 'GUSTAVO ADOLFO', 'QUISPE ', 'ESCOBAR', '1', '45922593', 'TECNICO DE EQUIPO DE LEVANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('225', 'DEOMAR RAFAEL', 'DAVILA ', 'TUANAMA', '1', '45997782', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('226', 'ELBER ABEL', 'PEREZ', 'HERNANDEZ', '1', '46006885', 'ING. PROYECTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('227', 'ANGEL WALTER', 'PARI', 'TAPARA', '1', '46020763', 'CONDUCTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('228', 'FILIAR', 'LLOCLLA', 'MOZO', '1', '46088025', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('229', 'EDGARDO', 'ARELLANO ', 'AGUILAR', '1', '46190417', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('230', 'JONATHAN ', 'VILCHEZ', 'ACUÑA', '1', '46215318', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('231', 'JUAN ANTONIO', 'ESCALANTE', ' HUAYHUAMISA', '1', '46228275', 'INSPECTOR SCMR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('232', 'JOEL GIOVANNI', 'OSORES', ' VICENTE', '1', '46278023', 'TECNICO COMERCIAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('233', 'JOSE JOSE', 'SAMILLAN', 'ABARCA', '1', '46278023', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('234', 'ALFREDO ANTHONNY', 'REYES', 'ALVARADO', '1', '46294009', 'TÉCNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('235', 'PABLO', 'AYALA', 'CUBA', '1', '46379650', 'COCINERO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('236', 'CALEB', 'MEDINA', 'TUMBAJULCA', '1', '46423149', 'TÉCNICO DE CALDERAS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('237', 'JHORDAN', 'QUIBAJO', 'CHALCO', '1', '46524033', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('238', 'JUAN PABLO', 'BARRIENTOS', 'FARFAN', '1', '46545531', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('239', 'GUSTAVO ALBERTO ', 'CHOQUE', 'CUEVA', '1', '46553655', 'ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('240', 'WALTER ARMANDO', 'AZANSA', 'TANTA', '1', '46585612', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('241', 'GEMSMILL REYNALDO', 'PACHECO', 'SAMANIEGO', '1', '46622419', 'MECANICOS ELÉCTRICOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('242', 'JHONATAN GUIVANI', 'MARIÑOS', 'ZEVALLOS', '1', '46636755', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('243', 'PEDRO CESAR JORGE', 'MENDOZA', 'HURTADO', '1', '46675878', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('244', 'DAVID ABIMAEL', 'JULCA ', 'CAMPOS ', '1', '46678210', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('245', 'JOSE JULIANO', 'ROBLES ', 'PAREDES', '1', '46680158', 'MECANICO - SOLADADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('246', 'JUAN DIEGO', 'BOCANEGRA', 'HUALINGA', '1', '46713353', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('247', 'GIANCARLO', 'RIVERA ', 'PEREZ ', '1', '46718839', 'SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('248', 'DAVID JUNIOR', 'GUTIERREZ', 'MUÑIZ', '1', '46793731', 'TECNICO DE MANTENIMIENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('249', 'CARLOS ALFREDO ', 'MUÑOZ ', 'VILLEGAS ', '1', '46838353', 'TEC. ELECTRICISTA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('250', 'DANIEL PEDRO', 'PARRA ', 'ZARATE', '1', '46853245', 'SUPERVISOR DE OBRA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('251', 'JOEL', 'ROJAS', 'HERVIAS', '1', '46868320', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('252', 'EDWIN KEBIN', 'HUARANGA', 'GALVEZ', '1', '46876472', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('253', 'ESGAR MARTIN', 'LITANO', 'CHIROQUE', '1', '46901318', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('254', 'WASHINGTONG  DIONISIO', 'SIMON', 'MENDOZA', '1', '46911128', 'SUPERVISOR DE OPERACIONES ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('255', 'EDITH PAMELA', ' ENCISO', ' CEBRIÁN ', '1', '46923978', 'MEDICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('256', 'PIERO JUNIOR ', 'SALDAÑA', 'DAVILA', '1', '47001915', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('257', 'EDUARDO', 'VILLANUEVA', 'CAMONES', '1', '47003814', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('258', 'JILMER RONALD', 'CERVANTES', 'SANCHEZ', '1', '47072195', 'OPERADOR DE GRÚA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('259', 'ARTURO ALEJANDRO', 'ROSALES ', 'SOTO', '1', '47096785', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('260', 'MIJAEL ALEXANDER', 'PROCIL', 'SANCHEZ', '1', '47146209', 'CALIBRADOR DE INTRUMENTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('261', 'LILIAN ESTHER', 'AZAÑA', 'ONTON', '1', '47160934', 'INGENIERA DE SSMA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('262', 'LUIS JAVIER ', 'ESTEBAN ', 'YI ', '1', '47276337', 'TECNICO ELECTRÓNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('263', 'BRYAN PIERRE RODERIC', 'CLARES', 'HUARANDA', '1', '47301971', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('264', 'MICHAEL', 'ALEGRE', 'PONCE', '1', '47354197', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('265', ' JEYSON ANDREI ', 'URRUTIA ', 'CASTILLO ', '1', '47367140', 'TECNICO ELECTRÓNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('266', 'STALIN BREEN', 'ROSALES', 'DELGADO', '1', '47370182', 'INSPECTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('267', 'SEGUNDO SANTIAGO', 'LINARES', 'MERA', '1', '47394240', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('268', 'NIXON RAFAEL', 'HUAMANI', 'MARCOS', '1', '47411797', 'MECANICO/SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('269', 'ARMANDO', 'PALOMINO', 'QUICHCA', '1', '47438986', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('270', 'JOEL JANCARLOS', 'HUAMAN', 'HUARCAYA', '1', '47474784', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('271', 'KEITH YRINA', 'ALVAREZ ', 'VALENZUELA', '1', '47723316', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('272', 'JEFFERSON NICKY ', 'RODRIGUEZ ', 'VEGA', '1', '47768572', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('273', 'GONZALO CHRISTIAN', 'FLORES', 'GALARZA', '1', '47832305', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('274', 'OMAR RENE', 'RENDON', 'SOPLIN', '1', '47892285', 'SUPERVISOR DE OBRA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('275', 'MAYRA CONSUELO', 'VILLANUEVA', ' RAMIREZ', '1', '47898275', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('276', 'JOEL FERNANDO', 'YNGA', ' HERRERA', '1', '47908147', 'LOGISTICA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('277', 'LUIS JESUS', 'SALDAÑA', 'TACSA', '1', '47933272', 'TECNICO DE MANTENIMIENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('278', 'IRVING ALEXANDER', 'CASTRO', 'MORI', '1', '48065346', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('279', 'KATHERINE MILAGROS', 'CENTENO', 'MARTINEZ', '1', '48148633', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('280', 'JUAN ALDO', 'CONSOLACION', 'MISHTI ', '1', '48176923', 'OPERADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('281', 'ANDRES SMITH', 'MENDOZA', ' CADENAS ', '1', '48222533', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('282', 'JERSON ALITH ', 'CURAY ', 'ZAVALA ', '1', '48246794', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('283', 'WENDY PAOLA', 'SOCLA', 'NORABUENA', '1', '48270950', 'SUPERVISORA DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('284', 'LUZ CENLLASE', 'GONZALES', 'VILLALOBOS', '1', '48341941', 'BRIGADISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('285', 'BRYAN JUNIOR', 'RIVAS', 'HUANCA', '1', '48369397', 'TECNICO DE SERVICIO PREVENTIVO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('286', 'WILLIAM ULISES', 'BARRIENTOS ', 'ROJAS', '1', '48381356', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('287', 'JOOFRE', 'MEZA', 'COTRINA', '1', '48399187', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('288', 'SANDRA LUZ ', 'LAPA', 'ARNESQUITO', '1', '48399299', 'PREVENCIONISTA DE RIESGOS ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('289', 'CRISTHIAN ALEXIS', 'ROCA', 'SABOYA', '1', '48429756', 'ASISTENTE OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('290', 'ITALO', 'CERPA ', 'MELGAREJO', '1', '48585281', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('291', 'VICTOR ERNESTO', 'CABANILLAS ', 'GONZALEZ ', '1', '49005915', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('292', 'FRANCY PAOLA', 'GUERRERO', 'MOROS', '1', '49015108', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('293', 'LUIS JUNIOR', 'VELASQUEZ ', 'VEAS', '1', '61201096', 'AYUDANTE DE COCINA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('294', 'ESTEFANIA AMANDA', 'ADRIANZEN', ' CAMUS DE ALVAREZ', '1', '62616905', 'MEDICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('295', 'JACK JERSON', 'LOPEZ', 'MONTESINOS', '1', '63035681', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('296', 'ROBERTO', 'VIA', 'JAIMES', '1', '70032595', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('297', 'JAIME JESUS RENATO', 'RIMARI ', 'ÁNGULO', '1', '70052407', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('298', 'FRANK ANTONIO', 'OBLEA', 'GUERRERO', '1', '70120375', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('299', 'HUBERT KEVIN', 'SOLIS ', 'PARRA', '1', '70133749', 'TECNICO ELECTROMECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('300', 'YENDER RAÚL', 'VALLE', 'ALVARADO', '1', '70272961', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('301', 'NANCY', 'HUANACCHIRI', 'JIMENEZ', '1', '70440406', 'PREVENCIONISTA DE RIESGOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('302', 'KENYOHN', 'QUISPE', 'ALENDEZ', '1', '70494330', 'TÉCNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('303', 'MARIA CLAUDIA', 'CAMPOS', 'ROSAS', '1', '70509427', 'MEDICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('304', 'JOSE FRANCISCO', 'LOPEZ', 'MEJIA', '1', '70524415', 'OPERARIO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('305', 'NANDO DARIO', 'BACTACION ', 'PIÑASHCA', '1', '70586601', 'ASISTENTE MANTENIMIENTO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('306', 'LUIS ALBERTO', 'SANCHEZ', 'RIVADENEIRA', '1', '70599295', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('307', 'LESLY MILENA', 'TORRES', 'MAGALLANES', '1', '70749246', 'SUPERVISOR DE SSMA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('308', 'JENNY MILAGROS', 'MARTINEZ ', 'CACERES', '1', '70860726', 'AZAFATA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('309', 'JORGE NICOLAS', 'MURGA', 'OCEDA', '1', '70873511', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('310', 'VICTOR RAUL', 'CRUZ ', 'QUISPE ', '1', '70918018', 'SUPERVISOR DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('311', 'VICTOR RAUL', 'CRUZ ', 'QUISPE ', '1', '70918018', 'SUPERVISOR DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('312', 'JOSE LUIS', 'HONORES', 'FLORES', '1', '70942387', 'INGENIERO INDUSTRIAL', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('313', 'LUIS ANGEL DAVID', 'MANDAMIENTO', 'COLLACCI', '1', '70969412', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('314', 'KAREN GRACIELA', 'ARIAS', 'ALCIDES', '1', '70972900', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('315', 'SEGUNDO ALEXANDER', 'FERNANDEZ', 'FLORES', '1', '71121062', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('316', 'LISSETH JHOVITZA', 'MINAYA ', 'BUIZA', '1', '71249837', '', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('317', ' MARICIELLO JACKELINE', 'MENDOZA', ' LAOS', '1', '71250305', 'PSICOLOGA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('318', 'ANDRES ROLANDO', 'VASQUEZ ', 'YUPANQUI', '1', '71309294', 'MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('319', 'JHON MANFREDY', 'ACUÑA', 'ESPINOZA', '1', '71374726', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('320', 'MIGUEL ANGEL', 'MATEO', 'MUCHA', '1', '71592023', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('321', 'ERLIN SEGUNDO', 'VILCHEZ', 'MENA', '1', '71592633', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('322', 'RENATO PAOLO', 'BAHAMONDE', 'DELGADO', '1', '71762283', 'MONTAJISTA SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('323', 'JORGE ', 'PINTO ', 'HILACUNDO ', '1', '71791546', 'TECNICO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('324', 'STEPHANY BRYCET', 'CARRERA', ' MARTINEZ', '1', '71956198', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('325', 'JEAN POOL ANDERSON ', 'GONZALES ', 'SANCHEZ', '1', '71959055', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('326', 'FLOR MARISOL ', 'GALINDO', 'POMAHUACRE', '1', '71965636', 'SUPERVISOR DE SSMA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('327', 'YAMIRO CLEBER', 'ARAMBURU', 'VALVERDE', '1', '71998386', 'RIGGER', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('328', 'ALEXIS XAVIER', 'FERIA ', 'GANOZA', '1', '72001284', 'TECNICO/AYUDANTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('329', 'ANDREA MANOLY', 'JIMENEZ', 'SORIA', '1', '72164551', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('330', 'JHAIR FRANCO REY', 'MUÑOZ', 'BEJAR', '1', '72199613', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('331', 'MIGUEL ALEJANDRO', 'FERNANDEZ', 'AMASIFUEN', '1', '72201967', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('332', 'MARTIN AARON', 'TESEN', 'BUSTAMANTE', '1', '72232416', 'COCINERO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('333', ' EDWIN ISMAEL ', 'CONTRERAS ', 'CHOCCE ', '1', '72285197', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('334', 'BRENDA', 'MILLONES', 'PEREZ', '1', '72374119', 'SUPERVISORA DE OPERACIONES ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('335', ' JULIANA PAOLA', 'NUÑEZ ', 'SANCHEZ', '1', '72381027', 'LABORATORIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('336', 'ELIZABETH CAROLINA', 'SUAREZ', 'GUERRA', '1', '72499770', 'ING PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('337', 'ORLANDO GIAMPIERRE', 'OCHOA ', 'CARRASCO', '1', '72536353', 'MECANICOS ELÉCTRICOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('338', 'HELEN NAVELLY', 'JAVIER', 'HUAYTA', '1', '72619844', 'ASISTENTE ADMINISTRATIVA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('339', 'ANA MARIA', 'GUERRERO  ', 'PANTA', '1', '72623145', 'MEDICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('340', 'DAVID JUNIOR', 'RODRIGUEZ', 'VALENCIA', '1', '72624265', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('341', 'LUIS GERARDO', 'PEREZ', 'GUEVARA', '1', '72632946', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('342', 'RAÚL BRYAN', 'CARHUAYALLE', 'RINCON', '1', '72642660', 'ADMINISTRATIVO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('343', 'BILL', 'VASQUEZ', 'FLORES', '1', '72677418', 'TÉCNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('344', 'PATRICK RHANDU JENNER  ', 'GALARCEP', 'ANCHIRAICO', '1', '72683122', 'INGENIERO PROGRAMADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('345', 'RAFAEL EUGENIO', 'VERGARA', 'VIDAL', '1', '72713013', 'TECNICO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('346', 'JHONEL MANUEL', 'CHAVEZ', 'BECERRA', '1', '72900072', 'MECANICO-SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('347', 'ENZO DANIEL', 'VILCHEZ', 'BOBADILLA', '1', '72972244', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('348', 'ABEL', 'SULLCA', 'CACERES', '1', '73036691', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('349', 'JORGE MIGUEL ', 'MENDOZA', 'CHUQUINO', '1', '73051537', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('350', 'IGOR IGNACIO', 'ALVAREZ', 'PARIASCA', '1', '73181098', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('351', 'CLAUDIA CAMILA SOLEDAD', 'GARCIA ', 'PACHAS ', '1', '73213255', 'ING. PROYECTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('352', 'AYLLY ESPIRITA', 'ESTEBAN', 'WOTO', '1', '73240821', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('353', 'WANTERLEY ERNESTO ', 'GRANDEZ', 'GARATE', '1', '73476453', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('354', 'FERNANDO', 'PERRIGO', 'MAYTA', '1', '73829125', 'MECANICO/SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('355', 'MARLON JESUS', ' ALBURQUEQUE', 'VALDIVIA', '1', '73870981', 'INGENIERO INTRUMENTISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('356', 'JORGE ', 'TAIPE', 'ACOSTA', '1', '73997847', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('357', 'JOSÉ BENITO', 'RUIZ', 'RIOS', '1', '74040503', 'ASISTENTE TÉCNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('358', 'IVAN EDUARDO', 'DE LA CRUZ', 'CASTRO ', '1', '74230102', 'LOGISTICA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('359', 'JORDAN JHON', 'HUAMAN', 'HUANCAS', '1', '74234509', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('360', 'ALBERTO ACSEL', 'RONCAL ', 'PLASENCIA', '1', '74356141', 'TEC. ELECTRICISTA ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('361', 'RUBEN', 'BENANCIO', 'TRUJILLO', '1', '74870379', 'OPERARIO DE PRODUCCION ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('362', 'BERTHA BERNARDINA', 'FLORES', 'DURAND', '1', '75224527', 'CAJERA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('363', 'LUIS DAVID', 'QUITO', 'MORALES', '1', '75316152', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('364', 'BRANCO', 'ALARCON', 'MORENO', '1', '75337184', 'LOGISTICA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('365', 'JOSE MANUEL', 'VILLANUEVA ', 'BANDA', '1', '75428740', 'TECNICO ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('366', 'FRANCISCO CESAR', 'ROJAS', 'SILVERA', '1', '75571807', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('367', 'JOAQUÍN MARCELO', ' FLORES', ' LOAYZA', '1', '75574348', 'TECNICO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('368', 'FRANCO ROBERTO', 'PALOMINO', 'CHILLIN', '1', '75973270', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('369', 'EDSON CLEVER', 'CARDENAS ', 'MAURICIO', '1', '75987283', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('370', 'JHUNNIOR EDSON', 'VASQUEZ', 'VASQUEZ', '1', '76017941', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('371', 'GIANCARLO LAZARO', 'MORALES', 'RAMIREZ', '1', '76166008', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('372', 'ARNOL YOEL', 'SAYAS', 'ZUBIETA', '1', '76244413', 'TECNICO ELECTRONICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('373', 'CLAUDIA PATRICIA', 'CONCENES', ' FERNANDEZ', '1', '76437245', 'OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('374', 'ABEL JAIRO', 'SANTOS', 'CABELLO', '1', '76802581', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('375', 'LUIS ANDERSON', 'FERNANDEZ ', 'CERVANTES', '1', '76916191', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('376', 'SANDRO ADRIAN', 'QUISPE ', 'GIL', '1', '76972846', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('377', 'FRANZ', 'MAYTAHUARI', 'AHUANARI', '1', '77014649', 'OPERTARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('378', 'FELIX IVAN', 'LITANO', 'CHIROQUE', '1', '77134089', 'OPERARIO MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('379', 'ROGER ALEXIS ', 'HERNANDEZ', 'CALLE', '1', '77175825', 'ING. PROYECTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('380', 'JOSE DAVID', 'BELLIDO', 'GUADALUPE', '1', '77224928', 'TÉCNICO MECÁNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('381', 'JACKELINE JUDITH', 'CABRERA', 'MUÑOZ', '1', '77282894', 'SUPERVISORA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('382', 'GERSON', 'ORTEGA', 'LOA', '1', '77695344', 'TEC. DE SERVICIO INSTALACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('383', 'PAUL ARI', 'MELGAREJO', 'YLLESCAS', '1', '78420000', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('384', 'HUGO RAFAEL', 'CAMPOS', 'PUENTE  ', '1', '79187847', 'OPERARIO ', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('385', 'JUAN CARLOS', 'TORRES', 'MOSTACERO', '1', '80051455', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('386', 'SEGUNDO NESTOR', 'VILCHEZ', 'SANTA CRUZ', '1', '80142276', 'SUPERVISOR RESIDENTE', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('387', 'JOSE ALBERTO', 'CHAVEZ', 'MAYHUIRI ', '1', '80508113', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('388', 'NOLBER HUGO ', 'GAMARRA', 'FIGUEROA ', '1', '80509769', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('389', 'RITA ISABEL', 'BARRA', 'CANTARO', '1', '80632188', 'SUPERVISORA DE OPERACIONES', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('390', 'ROBERT ALEXIS', 'SALAZAR ', 'URBANO', '1', '80652685', 'OPERARIO DE PRODUCCIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('391', 'JOSE LUIS', 'PETIT', 'MORILLO', '1', '82466273', 'OFICAL  MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('392', 'GABRIEL FRANCISCO', 'TERÁN', 'GONZALEZ', '2', '105723589', 'PREVENCIONISTA DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('393', ' MARCO ANTONIO', 'ODREMAN ', 'ULLOA', '2', '110991179', 'ING. PROYECTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('394', 'ARMANDO JOSE', 'MIJARES', 'HERNANDEZ', '2', '114109013', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('395', 'JUAN CARLOS ', 'MATA', 'AGUIAR', '2', '117173862', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('396', 'DUVAN ANDRÉS', 'RODRIGUEZ', 'BARROSO', '2', '119279566', 'MECANICO/SOLDADOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('397', 'GUSTAVO ENRIQUE', 'GONZALES ', 'FIGUEROA', '2', '128895151', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('398', 'JULIO CESAR', 'LUGO', 'CRESPO', '2', '142024409', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('399', 'EDGAR ALEXANDER', 'MORENO', 'VEGA', '2', '149256498', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('400', 'ARIANA STEFANNY', 'SAYAN', 'CHIRINOS', '2', '733355757', 'ASISTENTE DE SECRETARIADO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('401', 'CARLOS EDUARDO', 'PERNIA', 'GODOY', '2', '019957757', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('402', 'EDWIN DE LA CHIQUINQUIRA', 'ROMERO', 'PARRA', '2', '000498432', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('403', 'HESNEYDER PASTOR', 'PETIT', '-', '2', '000498570', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('404', 'HENDER ANTONIO', 'JUAREZ', 'MARCHAN', '2', '000525637', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('405', 'JONATHAN LEONARDO', 'MEDINA', 'QUINTERO', '2', '000525733', 'OPERARIO MONTAJISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('406', 'ALEXANDRA ESTEFANI', 'VELIZ', 'TALLAVO', '2', '001211341', 'COORDINADORA PROYECTOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('407', 'JOSE FRANCISCO', 'GUEVARA', 'ALVARADO', '2', '001648950', 'TECNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('408', 'CRUZ ALEXANDER', 'HERNANDEZ', 'COELLO', '2', '001994863', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('409', 'FELICIANO', 'MERCADO ', 'GONZALES', '2', '001188692', 'ALMACENERO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('410', 'KEBER DANIEL', 'ROMERO', 'MARTINEZ', '2', '051193032', 'TÉCNICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('411', 'DANIEL', 'TAPIA', 'MALPARTIDA', '2', '008127910', 'SUPERVISOR SSOMA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('412', 'RICHARD NIKOLAS', 'MATOS', 'FRANCESCHI', '2', '008160357', 'REPRESENTANTE DE SERVICIOS TECNICOS', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('413', 'FERNANDO RAFAEL', 'RODRIGUEZ', 'LA ROSA', '2', '008663996', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('414', 'JAVIER', 'INCIO', 'PONCE', '2', '008719714', 'AGENTE DE SEGURIDAD', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('415', 'ROLANDO', 'FELIX', 'RAMIREZ', '2', '009956026', 'OPERARIO DE LIMPIEZA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('416', 'PERCI ANTONIO', 'ESPINOZA', 'RAMIREZ', '2', '022672265', 'AYUDANTE SOLDADOR POR FUSIÓN', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('417', 'FELIX', 'TENORIO', 'ESTRADA', '2', '025767091', 'TEC. ELECTRICISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('418', 'OMAR ALCIDES', 'ROMERO ', 'PERALES ', '2', '40358963 ', 'CONDUCTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('419', 'EUGENIO', 'DEL AGUILA', 'TORRES', '2', '040918626', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('420', 'DONY GIL', 'SULCA', 'HUAMANI', '2', '043332123', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('421', 'FELIX EDUARDO', 'MOTTA', 'LOPEZ', '2', '044086721', 'SUPERVISOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('422', 'CHRISTIAN', 'ALDAVE', 'GANOZA', '2', '044540297', 'SUPERVISOR DE SERVICIOS Y TECNOLOGÍA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('423', 'WILLIAMS JORGE', 'GERONIMO', 'CARDENAS', '2', '044597615', 'CONDUCTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('424', 'KATTY HELEN', 'BEDRIÑANA', 'ORELLANA', '2', '044739902', 'PREVENCIONISTA DE OBRA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('425', 'WILMER JHON', 'NINASAUME', 'AVENDAÑO', '2', '070102815', 'MECANICO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('426', 'MARCOS ERICKS', 'RAMIREZ ', 'PINCHI ', '2', '73490560 ', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('427', 'CARLOS AUGUSTO', 'BARJA', 'TAPIA', '2', '073864609', 'PREVENCIONISTA', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('428', 'JUAN FRANCISCO', 'FIGUEROA', 'GARAVITO', '2', 'C.I. 25442347', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('429', 'JHOANDRI JOSE', 'PEÑA', 'VEGA', '2', 'C.I. 27050570', 'OPERARIO', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('430', 'JONATHAN GUSTAVO', 'PORRAS', 'MARTINEZ', '2', 'PTP 000949175', 'CONDUCTOR', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('431', 'MARVI JOSE', 'GUAREGUA', 'MAITA', '2', 'PTP000579931', 'OPERARIO DE PRODUCCION', '../assets/avatars/profile-pic.jpg', '1');
INSERT INTO `personalc` VALUES ('432', 'EGANO ALEXANDER', 'VIGGIANI', 'PARRA', '2', 'PTP000821720', 'OPERARIO DE PRODUCCION', '../assets/avatars/profile-pic.jpg', '1');

-- ----------------------------
-- Table structure for `personal_induccion`
-- ----------------------------
DROP TABLE IF EXISTS `personal_induccion`;
CREATE TABLE `personal_induccion` (
  `idepersonal` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `ape_paterno` varchar(200) DEFAULT NULL,
  `ape_materno` varchar(200) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `cargo` varchar(300) DEFAULT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `empresa` varchar(500) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `nota` int(10) DEFAULT NULL,
  `idecapacitacion` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT '../assets/avatars/profile-pic.jpg',
  PRIMARY KEY (`idepersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal_induccion
-- ----------------------------
INSERT INTO `personal_induccion` VALUES ('1', '01499798', 'PETIT', '-', 'YHAYKER PHIERO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '12/07/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('2', '01949214', 'JIMENEZ', '-', 'JORGE LUIS', 'SUPERVISOR MONTAJE', '20545585465', 'PALCON PERU SAC', '09/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('3', '01996397', 'ORTEGA', 'GUARECUCO', 'RONNY VIRGILIO', 'SUPERVISOR ELECTRICISTA', '20545585465', 'PALCON PERU SAC', '23/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('4', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '21/06/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('5', '06748566', 'ROMERO ', 'SAMAME', 'CARLOS MANUEL', 'SUPERVISOR GENERAL', '20522973204', 'PROVITEC SAC', '09/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('6', '08069239', 'BERRIOS', 'VIDAL', 'GUILLERMO MANUEL', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '18/06/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('7', '09553136', 'CULQUE', 'DOMINGUEZ', 'GERMAN', 'MONTAJISTA SOLDADOR', '20505855495', 'PRECISIÓN SAN PEDRO SAC', '20/05/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('8', '10420048', 'RICRA ', 'HUAMAN', 'JOSE FELICIANO', 'ING RESIDENTE', '20545585465', 'PALCON PERU SAC', '09/07/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('9', '10425293', 'MARTINEZ ', 'LAZO', 'WALTER EMMANUEL', 'OPERARIO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '28/06/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('10', '10874401', 'YATACO', 'MAGALLANES', 'CESAR DAVID', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('11', '15642329', 'TENA ', 'YACON', 'DEMETRIO CALIXTRO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('12', '18903500', 'ABANTO', 'GUTIERREZ', 'CARLOS MARTIN', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '14/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('13', '20406237', 'NINANYA ', 'CRISTOBAL ', 'JAVIER VICTOR ', 'SUPERVISOR OPERATIVO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('14', '22244419', 'CASAS', 'MARTINEZ', 'JENNY AURORA', 'SUPERVISOR DE RIESGOS', '20545585465', 'PALCON PERU SAC', '09/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('15', '25430306', 'ANAMPA', 'AGUIRRE', 'CRISTOBAL', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '06/08/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('16', '25518575', 'VILLARAN ', 'UCHUYA', 'AMÉRICO CRISTOBAL', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '17/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('17', '25628275', 'ESPINOZA', 'NEVADO', 'MARIO ', 'TÉCNICO MECÁNICO', '20553516863', 'SINAUC SAC', '17/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('18', '25666269', 'CAYCHO ', 'RAMIREZ', 'JORGE', 'SUPERVISOR DE OBRA ', '20522973204', 'PROVITEC SAC', '09/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('19', '25710455', 'VELASQUE ', 'GUTIERREZ', 'WILBER', 'GERENTE DE SERVICIO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '31/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('20', '25820808', 'CRUZ', 'EZPINOZA', 'JOSE JAIME', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('21', '25832511', 'MUÑOZ ', 'SANTILLAN', 'PAUL ALAN', 'SUPERVISOR', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('22', '40088672', 'MEZA', 'QUINTO', 'JUVER JHON', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '19/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('23', '40288409', 'VIZCARRA', 'ALARCÓN', 'EDWIN SIMEON', 'PREVENCIONISTA', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('24', '40288779', 'GUERRA', 'GONZALES', 'MARCO ANTONIO', 'SUPERVISOR DE SEGURIDAD', '20522973204', 'PROVITEC SAC', '09/07/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('25', '40557456', 'MALLQUI', 'GENEBROZO', 'PABLO', 'SOLDADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/06/1900', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('26', '40653439', 'SALAZAR', 'RUIZ', 'WILQUENSON LUIS', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '06/08/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('27', '40848382', 'ALIAGA', 'MOTA', 'MANUEL AVELINO', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '31/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('28', '40969445', 'MATEO', 'MUCHA', 'LIDER JOSE', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('29', '41047805', 'FELIX', 'OBREGON', 'ALDO RAFAEL', 'RIGGER', '20545585465', 'PALCON PERU SAC', '28/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('30', '41116261', 'CRUZ', 'FARIAS', 'DANNY WINSTON', 'SUPERVISOR DE SEGURIDAD', '20520571320', 'KONECRANES PERU SCRL', '18/06/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('31', '41190244', 'MOSTACERO', 'BOBADILLA ', 'JOSE ANTONIO', 'RIGGER DE GRUA', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '07/06/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('32', '41817151', 'ZUÑIGA', 'HUERTAS', 'VICTOR ARTURO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '07/06/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('33', '41878287', 'GONZALES', 'HURTADO', 'NEILS ARTURO ', 'MECÁNICO', '20553516863', 'SINAUC SAC', '16/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('34', '41895662', 'SHAHUANO', 'DAHUA', 'JORGE CARLOS', 'MECANICO SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '23/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('35', '42115708', 'ROMERO', 'MORENO', 'LUIS', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '23/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('36', '42136542', 'LLONTOP', 'SANTISTEBAN', 'JOSE ALBERTO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '20/05/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('37', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '21/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('38', '42292692', 'DAZA', 'VALVERDE', 'JIM', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('39', '42475156', 'SANCHEZ', 'GARRIDO', 'JORGE ENRIQUE', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '20/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('40', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('41', '42605130', 'RAMOS', 'RODRIGUEZ', 'WALTER', 'SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '09/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('42', '42638643', 'CRUZ ', 'CRUZ', 'JUAN ', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('43', '42639462', 'ARIAS ', 'MARTINEZ', 'LUIS ARMANDO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('44', '42734513', 'VALLEJOS', 'DAVILA', 'CHALE', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '31/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('45', '42793568', 'ZEÑA', 'LÓPEZ', 'LUIS CARLOS', 'MECÁNICO', '20553516863', 'SINAUC SAC', '16/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('46', '42818763', 'LEGUA', 'GRANADINO', 'LUIS ANTHONY PAUL', 'SOLDADOR', '20126645326', 'MACHINE SERVICES SAC', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('47', '42868261', 'CCORI', 'GONZALES', 'JUAN MANUEL', 'OPERADOR DE GRUAS', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '07/06/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('48', '43378600', 'BRONCANO', 'MINAYA', 'RUBEN RICARDO', 'RIGGER', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '20/06/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('49', '43398449', 'RAMOS', 'CONDORI', 'JULIAN', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '17/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('50', '43598664', 'JUSTO', 'RAMIREZ', 'OSWALDO', 'OPERADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '20/06/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('51', '43736054', 'LOAYZA', 'SERRANO', 'JIMMY', 'TECNICO ELECTRICISTA', '20602186220', 'APPLI SAC', '09/07/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('52', '43740365', 'NAVARRO', 'ALLCCA', 'ANIBAL', 'ING. CALIDAD', '20545585465', 'PALCON PERU SAC', '20/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('53', '43837949', 'DAHUA', 'SAQUIRAY', 'MILTER ARTEMIO', 'MECANICO - SOLADADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '14/06/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('54', '43935729', 'VILLARAN ', 'CASTRILLON', 'JESUS LEOPOLDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('55', '44248086', 'VELASQUE ', 'GUTIERREZ', 'JEAN CARLOS', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '31/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('56', '44314886', 'PUMACAYO', 'CCAHUANA', 'EDWIN LUIS', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/07/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('57', '44445381', 'MATEO ', 'MUCHA', 'JORGE LUIS', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('58', '44550782', 'LLONTOP', 'SANTISTEBAN', 'CRISTHIAN RICARDO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '20/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('59', '44550782', 'LLONTOP', 'SANTISTEBAN', 'CRISTHIAN RICARDO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '20/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('60', '44720682', 'CHACON ', 'RAMOS', 'GUSTAVO ALDO', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('61', '44795278', 'GALINDO ', 'SALAS', 'ELIXDANT', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('62', '45242169', 'CHILCON', 'RAMIREZ', 'ADELMO', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '21/05/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('63', '45509356', 'MARAVI', 'NINANYA', 'JOSE MIGUEL', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('64', '45685062', 'LOPEZ', 'CAHUAZA', 'JENIER', 'TECNICO DE SERVICIO', '20520571320', 'KONECRANES PERU SCRL', '24/07/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('65', '45710844', 'PALPA', 'CCANTO', 'YOEL FREDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '21/06/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('66', '45780959', 'CONDEÑA', 'NAVENTA', 'EDWIN ANTONIO', 'ING SSOMA', '20600502841', 'POLIGRUAS PERU S.A', '26/07/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('67', '45997782', 'DAVILA', 'TUANAMA', 'DEOMAR RAFAEL', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '26/07/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('68', '46006885', 'PEREZ', 'HERNANDEZ', 'ELBER ABEL', 'ING. PROYECTOS', '20602186220', 'APPLI SAC', '05/07/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('69', '46190417', 'ARELLANO ', 'AGUILAR', 'EDGARDO', 'SUPERVISOR', '20600502841', 'POLIGRUAS PERU S.A', '19/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('70', '46622419', 'PACHECO', 'SAMANIEGO', 'GEMSMILL REYNALDO', 'MECANICOS ELÉCTRICOS', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '18/06/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('71', '46636755', 'MARIÑOS', 'ZEVALLOS', 'JHONATAN GUIVANI', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '31/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('72', '46718839', 'RIVERA ', 'PEREZ ', 'GIANCARLO', 'SOLDADOR', '20545585465', 'PALCON PERU SAC', '09/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('73', '46901318', 'LITANO', 'CHIROQUE', 'ESGAR MARTIN', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('74', '46911128', 'SIMON', 'MENDOZA', 'WASHINGTONG  DIONISIO', 'SUPERVISOR DE OPERACIONES ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('75', '47001915', 'SALDAÑA', 'DAVILA', 'PIERO JUNIOR ', 'OPERARIO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('76', '47003814', 'VILLANUEVA', 'CAMONES', 'EDUARDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('77', '47072195', 'CERVANTES', 'SANCHEZ', 'JILMER RONALD', 'OPERADOR DE GRÚA', '20545585465', 'PALCON PERU SAC', '28/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('78', '48176923', 'CONSOLACION', 'MISHTI ', 'JUAN ALDO', 'OPERADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '12/07/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('79', '48246794', 'CURAY ', 'ZAVALA ', 'JERSON ALITH ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '20/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('80', '48381356', 'BARRIENTOS ', 'ROJAS', 'WILLIAM ULISES', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('81', '63035681', 'LOPEZ', 'MONTESINOS', 'JACK JERSON', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '21/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('82', '70102815', 'NINASAUME', 'AVENDAÑO', 'WILMER JHON', 'MECANICO', '20519494801', 'MECANICA MINERA COMERCIAL SAC', '04/06/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('83', '70133749', 'SOLIS ', 'PARRA', 'HUBERT KEVIN', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '19/07/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('84', '70440406', 'HUANACCHIRI', 'JIMENEZ', 'NANCY', 'PREVENCIONISTA DE RIESGOS', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('85', '70494330', 'QUISPE', 'ALENDEZ', 'KENYOHN', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '17/05/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('86', '71309294', 'VASQUEZ ', 'YUPANQUI', 'ANDRES ROLANDO', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '11/06/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('87', '71592023', 'MATEO', 'MUCHA', 'MIGUEL ANGEL', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('88', '71592633', 'VILCHEZ', 'MENA', 'ERLIN SEGUNDO', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '21/05/2019', '16', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('89', '71762283', 'BAHAMONDE', 'DELGADO', 'RENATO PAOLO', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '14/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('90', '71959055', 'GONZALES ', 'SANCHEZ', 'JEAN POOL ANDERSON ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '20/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('91', '72001284', 'FERIA ', 'GANOZA', 'ALEXIS XAVIER', 'TECNICO/AYUDANTE', '20522973204', 'PROVITEC SAC', '09/07/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('92', '72285197', 'CONTRERAS ', 'CHOCCE ', 'EDWIN ISMAEL ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('93', '72677418', 'VASQUEZ', 'FLORES', 'BILL', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('94', '72683122', 'GALARCEP', 'ANCHIRAICO', 'PATRICK RHANDU JENNER  ', 'INGENIERO PROGRAMADOR', '20553516863', 'SINAUC SAC', '17/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('95', '72900072', 'CHAVEZ', 'BECERRA', 'JHONEL MANUEL', 'MECANICO-SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '07/06/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('96', '73051537', 'MENDOZA', 'CHUQUINO', 'JORGE MIGUEL ', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '17/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('97', '73997847', 'TAIPE', 'ACOSTA', 'JORGE ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '20/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('98', '74234509', 'HUAMAN', 'HUANCAS', 'JORDAN JHON', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '09/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('99', '75605517', 'CUEVA', 'ZARZOZA', 'MAX JUNIOR', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('100', '76244413', 'SAYAS', 'ZUBIETA', 'ARNOL YOEL', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '17/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('101', '77134089', 'LITANO', 'CHIROQUE', 'FELIX IVAN', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '20/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('102', '77175825', 'HERNANDEZ', 'CALLE', 'ROGER ALEXIS ', 'ING. PROYECTOS', '20602186220', 'APPLI SAC', '05/07/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('103', '79187847', 'CAMPOS', 'PUENTE  ', 'HUGO RAFAEL', 'OPERARIO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('104', '80051455', 'TORRES', 'MOSTACERO', 'JUAN CARLOS', 'OPERARIO MONTAJISTA', '20545585466', 'PALCON PERU SAC', '06/08/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('105', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '10/05/2019', '19', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('106', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '20/05/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('107', '000498432', 'ROMERO', 'PARRA', 'EDWIN DE LA CHIQUINQUIRA', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('108', '000498570', 'PETIT', '-', 'HESNEYDER PASTOR', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('109', '000525637', 'JUAREZ', 'MARCHAN', 'HENDER ANTONIO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('110', '000525733', 'MEDINA', 'QUINTERO', 'JONATHAN LEONARDO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '09/05/2019', '17', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('111', '08127910', 'TAPIA', 'MALPARTIDA', 'DANIEL', 'SUPERVISOR SSOMA', '20545585465', 'PALCON PERU SAC', '07/06/2019', '20', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('112', '40918626', 'DEL AGUILA', 'TORRES', 'EUGENIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '09/05/2019', '18', '1', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('113', '000498432', 'ROMERO', 'PARRA', 'EDWIN DE LA CHIQUINQUIRA', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('114', '000525637', 'JUAREZ', 'MARCHAN', 'HENDER ANTONIO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('115', '000525733', 'MEDINA', 'QUINTERO', 'JONATHAN LEONARDO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('116', '000498570', 'PETIT', '-', 'HESNEYDER PASTOR', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('117', '46718839', 'RIVERA ', 'PEREZ ', 'GIANCARLO', 'SOLDADOR', '20545585465', 'PALCON PERU SAC', '10/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('118', '01949214', 'JIMENEZ', '-', 'JORGE LUIS', 'SUPERVISOR MONTAJE', '20545585465', 'PALCON PERU SAC', '10/05/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('119', '22244419', 'CASAS', 'MARTINEZ', 'JENNY AURORA', 'SUPERVISOR DE RIESGOS', '20545585465', 'PALCON PERU SAC', '10/05/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('120', '02185366', 'PIRELA', 'BECERRA', 'EMERSON LUIS', 'INGENIERO OPERACIONES', '20545585465', 'PALCON PERU SAC', '10/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('121', '01368633', 'VILLEGAS ', 'RALEIGH ', 'MARCOS VINICIO', 'INGENIERO OPERACIONES', '20545585465', 'PALCON PERU SAC', '10/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('122', '40918626', 'DEL AGUILA', 'TORRES', 'EUGENIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('123', '42605130', 'RAMOS', 'RODRIGUEZ', 'WALTER', 'SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('124', '25628275', 'ESPINOZA', 'NEVADO', 'MARIO ', 'TÉCNICO MECÁNICO', '20553516863', 'SINAUC SAC', '20/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('125', '47003814', 'VILLANUEVA', 'CAMONES', 'EDUARDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('126', '25518575', 'VILLARAN ', 'UCHUYA', 'AMÉRICO CRISTOBAL', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('127', '43935729', 'VILLARAN ', 'CASTRILLON', 'JESUS LEOPOLDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('128', '73051537', 'MENDOZA', 'CHUQUINO', 'JORGE MIGUEL ', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('129', '75605517', 'CUEVA', 'ZARZOZA', 'MAX JUNIOR', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '21/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('130', '42136542', 'LLONTOP', 'SANTISTEBAN', 'JOSE ALBERTO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '22/05/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('131', '42475156', 'SANCHEZ', 'GARRIDO', 'JORGE ENRIQUE', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '22/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('132', '44550782', 'LLONTOP', 'SANTISTEBAN', 'CRISTHIAN RICARDO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '22/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('133', '77134089', 'LITANO', 'CHIROQUE', 'FELIX IVAN', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '22/05/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('134', '17543766', 'MARTINEZ', 'RAMOS', 'CARLOS VALENTIN', 'OPERARIO ', '20514870013', 'CPS SAC', '22/05/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('135', '48524996', 'MARTINEZ', 'RAMOS', 'CRISTIAN EDINSON', 'OPERARIO ', '20514870013', 'CPS SAC', '22/05/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('136', '72683122', 'GALARCEP', 'ANCHIRAICO', 'PATRICK RHANDU JENNER  ', 'INGENIERO PROGRAMADOR', '20553516863', 'SINAUC SAC', '23/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('137', '02203838', 'VALVERDE', 'MAESTRE', 'RONALD EMIGDIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '28/05/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('138', '42818763', 'LEGUA', 'GRANADINO', 'LUIS ANTHONY PAUL', 'SOLDADOR', '20126645326', 'MACHINE SERVICES SAC', '30/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('139', '09070328', 'MENACHO', 'CASIMIRO', 'OSCAR PABLO', 'VIGIA ', '20126645326', 'MACHINE SERVICES SAC', '30/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('140', '25767091', 'TENORIO', 'ESTRADA', 'FELIX', 'TEC. ELECTRICISTA', '20545585465', 'PALCON PERU SAC', '29/05/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('141', '41762488', 'MUCHA', 'MALLMA', 'HENRY WILLIAMS', 'OPERARIO', '20126645326', 'MACHINE SERVICES SAC', '30/05/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('142', '40848382', 'ALIAGA', 'MOTA', 'MANUEL AVELINO', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('143', '70102815', 'NINASAUME', 'AVENDAÑO', 'WILMER JHON', 'MECANICO', '20519494801', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '14', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('144', '46636755', 'MARIÑOS', 'ZEVALLOS', 'JHONATAN GUIVANI', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('145', '42734513', 'VALLEJOS', 'DAVILA', 'CHALE', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('146', '25710455', 'VELASQUE ', 'GUTIERREZ', 'WILBER', 'GERENTE DE SERVICIO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('147', '44248086', 'VELASQUE ', 'GUTIERREZ', 'JEAN CARLOS', 'MECANICO', '20519494800', 'MECANICA MINERA COMERCIAL SAC', '06/06/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('148', '41817151', 'ZUÑIGA', 'HUERTAS', 'VICTOR ARTURO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('149', '72900072', 'CHAVEZ', 'BECERRA', 'JHONEL MANUEL', 'MECANICO-SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('150', '40557456', 'MALLQUI', 'GENEBROZO', 'PABLO', 'SOLDADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('151', '08127910', 'TAPIA', 'MALPARTIDA', 'DANIEL', 'SUPERVISOR SSOMA', '20545585465', 'PALCON PERU SAC', '07/02/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('152', '43740365', 'NAVARRO', 'ALLCCA', 'ANIBAL', 'ING. CALIDAD', '20545585465', 'PALCON PERU SAC', '18/06/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('153', '41116261', 'CRUZ', 'FARIAS', 'DANNY WINSTON', 'SUPERVISOR DE SEGURIDAD', '20520571320', 'KONECRANES PERU SCRL', '12/02/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('154', '40734760', 'BELLIDO ', 'CANALES', 'EDWAR', 'TECNICO DE EQUIPO DE LEVANTE', '20520571320', 'KONECRANES PERU SCRL', '24/06/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('155', '47238064', 'HUAYNALAYA', 'PAZ', 'YUVAL DARWIN', 'TECNICO DE EQUIPO DE LEVANTE', '20520571320', 'KONECRANES PERU SCRL', '24/06/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('156', '45922593', 'QUISPE ', 'ESCOBAR', 'GUSTAVO ADOLFO', 'TECNICO DE EQUIPO DE LEVANTE', '20520571320', 'KONECRANES PERU SCRL', '22/03/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('157', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('158', '46911128', 'SIMON', 'MENDOZA', 'WASHINGTONG  DIONISIO', 'SUPERVISOR DE OPERACIONES ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('159', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('160', '47001915', 'SALDAÑA', 'DAVILA', 'PIERO JUNIOR ', 'OPERARIO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('161', '48246794', 'CURAY ', 'ZAVALA ', 'JERSON ALITH ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('162', '73997847', 'TAIPE', 'ACOSTA', 'JORGE ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('163', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '26/06/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('164', '45509356', 'MARAVI', 'NINANYA', 'JOSE MIGUEL', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '10/07/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('165', '20406237', 'NINANYA ', 'CRISTOBAL ', 'JAVIER VICTOR ', 'SUPERVISOR OPERATIVO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '10/07/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('166', '10425293', 'MARTINEZ ', 'LAZO', 'WALTER EMMANUEL', 'OPERARIO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '10/07/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('167', '42546678', 'CHUQUIJA ', 'VILCA', 'GERMAN ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('168', '47546678', 'NINANYA ', 'PARRA', 'ZULEMA GABRIELA', 'SUPERVISORA DE SEGURIDAD', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '10/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('169', '25832511', 'MUÑOZ ', 'SANTILLAN', 'PAUL ALAN', 'SUPERVISOR', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('170', '42638643', 'CRUZ ', 'CRUZ', 'JUAN ', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('171', '44795278', 'GALINDO ', 'SALAS', 'ELIXDANT', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('172', '42639462', 'ARIAS ', 'MARTINEZ', 'LUIS ARMANDO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('173', '15642329', 'TENA ', 'YACON', 'DEMETRIO CALIXTRO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('174', '44832873', 'OLAYA', 'SILUPU', 'NOELIA', 'SUPERVISOR SSOMA', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('175', '10420048', 'RICRA ', 'HUAMAN', 'JOSE FELICIANO', 'ING RESIDENTE', '20545585465', 'PALCON PERU SAC', '10/07/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('176', '44314886', 'PUMACAYO', 'CCAHUANA', 'EDWIN LUIS', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('177', '25534829', 'CUMPLIDO', 'MEIGGS', 'CARLOS MARTIN', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('178', '46675878', 'MENDOZA', 'HURTADO', 'PEDRO CESAR JORGE', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('179', '10257832', 'ROMAN', 'MACHACA', 'EFRAIN ANTONIO', 'OPERARIO MONTAJISTA', '20545585466', 'PALCON PERU SAC', '10/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('180', '74234509', 'HUAMAN', 'HUANCAS', 'JORDAN JHON', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '25/07/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('181', '73426426', 'ROJAS', 'GAMBOA', 'PERCY EDUARDO', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '22/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('182', '63035681', 'LOPEZ', 'MONTESINOS', 'JACK JERSON', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('183', '10686390', 'MONTESINOS ', 'TORRES', 'EDGAR  ENRIQUE', 'SUPERVISOR ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('184', '72551566', 'BAZAN', 'SALINAS', 'PAOLO CESAR', 'SUPERVISOR ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('185', '40315946', 'HIDALGO ', 'CABELLO', 'RAUL ANGEL', 'OPERARIO ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('186', '45859256', 'IBARRA ', 'VEGA', 'JESSICA MERCEDES', 'SUPERVISOR ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('187', '70524415', 'LOPEZ', 'MEJIA', 'JOSE FRANCISCO', 'OPERARIO ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '11/07/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('188', '41878287', 'GONZALES', 'HURTADO', 'NEILS ARTURO ', 'MECÁNICO', '20553516863', 'SINAUC SAC', '16/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('189', '42793568', 'ZEÑA', 'LÓPEZ', 'LUIS CARLOS', 'MECÁNICO', '20553516863', 'SINAUC SAC', '16/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('190', '45685062', 'LOPEZ', 'CAHUAZA', 'JENIER', 'TECNICO DE SERVICIO', '20520571320', 'KONECRANES PERU SCRL', '22/07/2019', '20', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('191', '41895662', 'SHAHUANO', 'DAHUA', 'JORGE CARLOS', 'MECANICO SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '02/08/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('192', '45997782', 'DAVILA', 'TUANAMA', 'DEOMAR RAFAEL', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '25/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('193', '01996397', 'ORTEGA', 'GUARECUCO', 'RONNY VIRGILIO', 'SUPERVISOR ELECTRICISTA', '20545585465', 'PALCON PERU SAC', '25/07/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('194', '01499798', 'PETIT', '-', 'YHAYKER PHIERO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '25/07/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('195', '42292692', 'DAZA', 'VALVERDE', 'JIM', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('196', '10874401', 'YATACO', 'MAGALLANES', 'CESAR DAVID', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('197', '43398449', 'RAMOS', 'CONDORI', 'JULIAN', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('198', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('199', '71959055', 'GONZALES ', 'SANCHEZ', 'JEAN POOL ANDERSON ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('200', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '17', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('201', '71309294', 'VASQUEZ ', 'YUPANQUI', 'ANDRES ROLANDO', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('202', '46622419', 'PACHECO', 'SAMANIEGO', 'GEMSMILL REYNALDO', 'MECANICOS ELÉCTRICOS', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('203', '46190417', 'ARELLANO ', 'AGUILAR', 'EDGARDO', 'SUPERVISOR', '20600502841', 'POLIGRUAS PERU S.A', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('204', '70133749', 'SOLIS ', 'PARRA', 'HUBERT KEVIN', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('205', '40088672', 'MEZA', 'QUINTO', 'JUVER JHON', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '01/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('206', '42772063', 'RENGIFO', 'DAVILA', 'GINN KEDDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '01/08/2019', '16', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('207', '45780959', 'CONDEÑA', 'NAVENTA', 'EDWIN ANTONIO', 'ING SSOMA', '20600502841', 'POLIGRUAS PERU S.A', '07/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('208', '42052469', 'MACEDO', 'CORAL', 'ULICES', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '07/08/2019', '19', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('209', '25430306', 'ANAMPA', 'AGUIRRE', 'CRISTOBAL', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '07/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('210', '40653439', 'SALAZAR', 'RUIZ', 'WILQUENSON LUIS', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '07/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('211', '80051455', 'TORRES', 'MOSTACERO', 'JUAN CARLOS', 'OPERARIO MONTAJISTA', '20545585466', 'PALCON PERU SAC', '07/08/2019', '18', '2', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('212', '46901318', 'LITANO', 'CHIROQUE', 'ESGAR MARTIN', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('213', '000498432', 'ROMERO', 'PARRA', 'EDWIN DE LA CHIQUINQUIRA', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('214', '000525637', 'JUAREZ', 'MARCHAN', 'HENDER ANTONIO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('215', '000525733', 'MEDINA', 'QUINTERO', 'JONATHAN LEONARDO', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('216', '000498570', 'PETIT', '-', 'HESNEYDER PASTOR', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('217', '46718839', 'RIVERA ', 'PEREZ ', 'GIANCARLO', 'SOLDADOR', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('218', '01949214', 'JIMENEZ', '-', 'JORGE LUIS', 'SUPERVISOR MONTAJE', '20545585465', 'PALCON PERU SAC', '08/05/2019', '19', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('219', '22244419', 'CASAS', 'MARTINEZ', 'JENNY AURORA', 'SUPERVISOR DE RIESGOS', '20545585465', 'PALCON PERU SAC', '08/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('220', '02185366', 'PIRELA', 'BECERRA', 'EMERSON LUIS', 'INGENIERO OPERACIONES', '20545585465', 'PALCON PERU SAC', '22/05/2019', '19', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('221', '01368633', 'VILLEGAS ', 'RALEIGH ', 'MARCOS VINICIO', 'INGENIERO OPERACIONES', '20545585465', 'PALCON PERU SAC', '22/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('222', '40918626', 'DEL AGUILA', 'TORRES', 'EUGENIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '14/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('223', '42605130', 'RAMOS', 'RODRIGUEZ', 'WALTER', 'SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '14/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('224', '47003814', 'VILLANUEVA', 'CAMONES', 'EDUARDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '22/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('225', '25518575', 'VILLARAN ', 'UCHUYA', 'AMÉRICO CRISTOBAL', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '22/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('226', '43935729', 'VILLARAN ', 'CASTRILLON', 'JESUS LEOPOLDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '22/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('227', '73051537', 'MENDOZA', 'CHUQUINO', 'JORGE MIGUEL ', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('228', '75605517', 'CUEVA', 'ZARZOZA', 'MAX JUNIOR', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '22/05/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('229', '42818763', 'LEGUA', 'GRANADINO', 'LUIS ANTHONY PAUL', 'SOLDADOR', '20126645326', 'MACHINE SERVICES SAC', '29/05/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('230', '09070328', 'MENACHO', 'CASIMIRO', 'OSCAR PABLO', 'VIGIA ', '20126645326', 'MACHINE SERVICES SAC', '29/05/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('231', '41817151', 'ZUÑIGA', 'HUERTAS', 'VICTOR ARTURO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('232', '72900072', 'CHAVEZ', 'BECERRA', 'JHONEL MANUEL', 'MECANICO-SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('233', '07852886', 'BALAREZO ', 'MOCARRO', 'JOSE MANUEL', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('234', '002203838', 'VALVERDE', 'MAESTRE', 'RONALD EMIGDIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('235', '40557456', 'MALLQUI', 'GENEBROZO', 'PABLO', 'SOLDADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '12/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('236', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('237', '46911128', 'SIMON', 'MENDOZA', 'WASHINGTONG  DIONISIO', 'SUPERVISOR DE OPERACIONES ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('238', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('239', '45710844', 'PALPA', 'CCANTO', 'YOEL FREDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('240', '72285197', 'CONTRERAS ', 'CHOCCE ', 'EDWIN ISMAEL ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('241', '47001915', 'SALDAÑA', 'DAVILA', 'PIERO JUNIOR ', 'OPERARIO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('242', '48246794', 'CURAY ', 'ZAVALA ', 'JERSON ALITH ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('243', '73997847', 'TAIPE', 'ACOSTA', 'JORGE ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('244', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '25/06/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('245', '45509356', 'MARAVI', 'NINANYA', 'JOSE MIGUEL', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '19', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('246', '20406237', 'NINANYA ', 'CRISTOBAL ', 'JAVIER VICTOR ', 'SUPERVISOR OPERATIVO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '19', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('247', '10425293', 'MARTINEZ ', 'LAZO', 'WALTER EMMANUEL', 'OPERARIO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('248', '71140833', 'CALDERON ', 'LAURA', 'MANUEL JAVIER ', 'PRACTICANTE ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('249', '80330323', 'PALOMINO ', 'TORIBIO ', 'JOSE LUIS ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('250', '19979258', 'ESCOBAR', 'MALPARTIDA', 'ELIAS', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('251', '42546678', 'CHUQUIJA ', 'VILCA', 'GERMAN ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('252', '47546678', 'NINANYA ', 'PARRA', 'ZULEMA GABRIELA', 'SUPERVISORA DE SEGURIDAD', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('253', '25832511', 'MUÑOZ ', 'SANTILLAN', 'PAUL ALAN', 'SUPERVISOR', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('254', '42638643', 'CRUZ ', 'CRUZ', 'JUAN ', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('255', '44795278', 'GALINDO ', 'SALAS', 'ELIXDANT', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('256', '42639462', 'ARIAS ', 'MARTINEZ', 'LUIS ARMANDO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('257', '15642329', 'TENA ', 'YACON', 'DEMETRIO CALIXTRO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('258', '44832873', 'OLAYA', 'SILUPU', 'NOELIA', 'SUPERVISOR SSOMA', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('259', '10420048', 'RICRA ', 'HUAMAN', 'JOSE FELICIANO', 'ING RESIDENTE', '20545585465', 'PALCON PERU SAC', '10/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('260', '44314886', 'PUMACAYO', 'CCAHUANA', 'EDWIN LUIS', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('261', '25534829', 'CUMPLIDO', 'MEIGGS', 'CARLOS MARTIN', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('262', '46675878', 'MENDOZA', 'HURTADO', 'PEDRO CESAR JORGE', 'OPERARIO MONTAJISTA', '20545585465', 'PALCON PERU SAC', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('263', '10257832', 'ROMAN', 'MACHACA', 'EFRAIN ANTONIO', 'OPERARIO MONTAJISTA', '20545585466', 'PALCON PERU SAC', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('264', '44550782', 'LLONTOP', 'SANTISTEBAN', 'CRISTHIAN RICARDO', 'OPERARIO MECANICO', '20545585465', 'PALCON PERU SAC', '10/07/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('265', '10686390', 'MONTESINOS ', 'TORRES', 'EDGAR  ENRIQUE', 'SUPERVISOR ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('266', '72551566', 'BAZAN', 'SALINAS', 'PAOLO CESAR', 'SUPERVISOR ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('267', '40315946', 'HIDALGO ', 'CABELLO', 'RAUL ANGEL', 'OPERARIO ', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('268', '43837949', 'DAHUA', 'SAQUIRAY', 'MILTER ARTEMIO', 'MECANICO - SOLADADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '24/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('269', '41895662', 'SHAHUANO', 'DAHUA', 'JORGE CARLOS', 'MECANICO SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '24/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('270', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('271', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('272', '08069239', 'BERRIOS', 'VIDAL', 'GUILLERMO MANUEL', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('273', '42772063', 'RENGIFO', 'DAVILA', 'GINN KEDDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('274', '42964150', 'SANCHEZ', 'GUTIERREZ', 'LEONIT', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('275', '73519938', 'CAMA', 'MAMANI', 'JOSE LUIS', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('276', '47103610', 'CARRILLO', 'QUESADA', 'ROBERT ROSALES', 'SOLDADOR', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '16', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('277', '44004902', 'SALAZAR', 'HERMOZA', 'POOL ANDERSON', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('278', '77014649', 'MAYTAHUARI', 'AHUANARI', 'FRANZ', 'SOLDADOR', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('279', '41196925', 'MONTESINOS', 'TORRES', 'EUSTAQUIO', 'OPERARIO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '18', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('280', '43790961', 'FERNANDEZ', 'ARRIBASPLATA', 'ALEXANDER', 'PREVENSIONISTA', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('281', 'PTP002731144', 'VELAZCO', 'ALVARADO', 'HILDAMAR', 'INGENIERO', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('282', '48293975', 'MAYTAHUARI', 'AHUANARI', 'BRANLY', 'SOLDADOR', '20552256728', 'INGENIEROS CONTRATISTAS M&T SAC', '05/08/2019', '20', '3', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('283', '001497266', 'RAMIREZ', 'RIVAS', 'ANYER EMIRO', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '15/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('284', '001026972', 'AÑEZ', 'HERRERA', 'LEVIS RAFAEL', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '15/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('285', '43828683', 'RAMOS', 'PORRAS', 'FLORENTINO EDINHO', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '15/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('286', '25820808', 'CRUZ', 'EZPINOZA', 'JOSE JAIME', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '18/05/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('287', '70440406', 'HUANACCHIRI', 'JIMENEZ', 'NANCY', 'PREVENCIONISTA DE RIESGOS', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '18/05/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('288', '70494330', 'QUISPE', 'ALENDEZ', 'KENYOHN', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '18/05/2019', '14', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('289', '72677418', 'VASQUEZ', 'FLORES', 'BILL', 'TÉCNICO ELECTRICISTA', '20474917542', 'ELECTRO SERVICE MONTAJES SRL', '18/05/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('290', '40969445', 'MATEO', 'MUCHA', 'LIDER JOSE', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('291', '71592023', 'MATEO', 'MUCHA', 'MIGUEL ANGEL', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('292', '48381356', 'BARRIENTOS ', 'ROJAS', 'WILLIAM ULISES', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('293', '44720682', 'CHACON ', 'RAMOS', 'GUSTAVO ALDO', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('294', '76244413', 'SAYAS', 'ZUBIETA', 'ARNOL YOEL', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('295', '40288409', 'VIZCARRA', 'ALARCÓN', 'EDWIN SIMEON', 'PREVENCIONISTA', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '15', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('296', '44445381', 'MATEO ', 'MUCHA', 'JORGE LUIS', 'TECNICO ELECTRONICO', '20601565235', 'HUAQUIAN S.A.C', '18/05/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('297', '75571807', 'ROJAS', 'SILVERA', 'FRANCISCO CESAR', 'TECNICO ELECTRONICO', '20601565236', 'HUAQUIAN S.A.C', '18/05/2019', '14', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('298', '71762283', 'BAHAMONDE', 'DELGADO', 'RENATO PAOLO', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '21/05/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('299', '18903500', 'ABANTO', 'GUTIERREZ', 'CARLOS MARTIN', 'MONTAJISTA SOLDADOR', '20505855494', 'PRECISIÓN SAN PEDRO SAC', '21/05/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('300', '09553136', 'CULQUE', 'DOMINGUEZ', 'GERMAN', 'MONTAJISTA SOLDADOR', '20505855495', 'PRECISIÓN SAN PEDRO SAC', '21/05/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('301', '44611547', 'LOZADA', 'RAFAEL', 'ANTONIO', 'MONTAJISTA SOLDADOR EN ALTURA', '20505855495', 'PRECISIÓN SAN PEDRO SAC', '21/05/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('302', '09556231', 'CAMPOS', 'PAEZ', 'WILLIAM', 'PREVENCIONISTA / SUPERVISOR', '20505855495', 'PRECISIÓN SAN PEDRO SAC', '21/05/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('303', '25767091', 'TENORIO', 'ESTRADA', 'FELIX', 'TEC. ELECTRICISTA', '20545585465', 'PALCON PERU SAC', '30/05/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('304', '41116261', 'CRUZ', 'FARIAS', 'DANNY WINSTON', 'SUPERVISOR DE SEGURIDAD', '20520571320', 'KONECRANES PERU SCRL', '18/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('305', '71592633', 'VILCHEZ', 'MENA', 'ERLIN SEGUNDO', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('306', '45521643', 'CATAY ', 'RAMOS', 'SATURNINO LUIS ', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('307', '45242169', 'CHILCON', 'RAMIREZ', 'ADELMO', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('308', '70104460', 'GONZALES ', 'OLIVERA ', 'CARLOS ENRIQUE', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('309', '71555508', 'MENA  ', 'HEREDIA', 'CHRISTIAN ROGGER ', 'OPERARIO', '20556332828', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('310', '43421524', 'LEON  ', 'TRUJILLO', 'DANIEL ALEJANDRO', 'OPERARIO', '20556332829', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('311', '48166544', 'VARGAS ', 'PEÑA', 'LUZ MARICRUZ', 'PREVENCIONISTA', '20556332830', 'COORPORACION INDUSTRIAL FRAMI E.I.R.L.', '18/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('312', '40734760', 'BELLIDO ', 'CANALES', 'EDWAR', 'TECNICO DE EQUIPO DE LEVANTE', '20520571320', 'KONECRANES PERU SCRL', '25/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('313', '45922593', 'QUISPE ', 'ESCOBAR', 'GUSTAVO ADOLFO', 'TECNICO DE EQUIPO DE LEVANTE', '20520571320', 'KONECRANES PERU SCRL', '25/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('314', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('315', '46911128', 'SIMON', 'MENDOZA', 'WASHINGTONG  DIONISIO', 'SUPERVISOR DE OPERACIONES ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('316', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('317', '45710844', 'PALPA', 'CCANTO', 'YOEL FREDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('318', '72285197', 'CONTRERAS ', 'CHOCCE ', 'EDWIN ISMAEL ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('319', '47001915', 'SALDAÑA', 'DAVILA', 'PIERO JUNIOR ', 'OPERARIO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('320', '79187847', 'CAMPOS', 'PUENTE  ', 'HUGO RAFAEL', 'OPERARIO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('321', '48246794', 'CURAY ', 'ZAVALA ', 'JERSON ALITH ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('322', '73997847', 'TAIPE', 'ACOSTA', 'JORGE ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('323', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('324', '45509356', 'MARAVI', 'NINANYA', 'JOSE MIGUEL', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('325', '20406237', 'NINANYA ', 'CRISTOBAL ', 'JAVIER VICTOR ', 'SUPERVISOR OPERATIVO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('326', '10425293', 'MARTINEZ ', 'LAZO', 'WALTER EMMANUEL', 'OPERARIO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '19', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('327', '71140833', 'CALDERON ', 'LAURA', 'MANUEL JAVIER ', 'PRACTICANTE ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('328', '80330323', 'PALOMINO ', 'TORIBIO ', 'JOSE LUIS ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('329', '19979258', 'ESCOBAR', 'MALPARTIDA', 'ELIAS', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('330', '42546678', 'CHUQUIJA ', 'VILCA', 'GERMAN ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('331', '47546678', 'NINANYA ', 'PARRA', 'ZULEMA GABRIELA', 'SUPERVISORA DE SEGURIDAD', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('332', '40288779', 'GUERRA', 'GONZALES', 'MARCO ANTONIO', 'SUPERVISOR DE SEGURIDAD', '20522973204', 'PROVITEC SAC', '10/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('333', '25666269', 'CAYCHO ', 'RAMIREZ', 'JORGE', 'SUPERVISOR DE OBRA ', '20522973204', 'PROVITEC SAC', '10/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('334', '06748566', 'ROMERO ', 'SAMAME', 'CARLOS MANUEL', 'SUPERVISOR GENERAL', '20522973204', 'PROVITEC SAC', '10/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('335', '72001284', 'FERIA ', 'GANOZA', 'ALEXIS XAVIER', 'TECNICO/AYUDANTE', '20522973204', 'PROVITEC SAC', '10/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('336', '74234509', 'HUAMAN', 'HUANCAS', 'JORDAN JHON', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '10/07/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('337', '73426426', 'ROJAS', 'GAMBOA', 'PERCY EDUARDO', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '10/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('338', '06310407', 'ZAPATA', 'SILVA', 'MIGUEL', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '10/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('339', '77175825', 'HERNANDEZ', 'CALLE', 'ROGER ALEXIS ', 'ING. PROYECTOS', '20602186220', 'APPLI SAC', '12/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('340', '46006885', 'PEREZ', 'HERNANDEZ', 'ELBER ABEL', 'ING. PROYECTOS', '20602186220', 'APPLI SAC', '12/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('341', '43736054', 'LOAYZA', 'SERRANO', 'JIMMY', 'TECNICO ELECTRICISTA', '20602186220', 'APPLI SAC', '12/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('342', '45685062', 'LOPEZ', 'CAHUAZA', 'JENIER', 'TECNICO DE SERVICIO', '20520571320', 'KONECRANES PERU SCRL', '23/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('343', '45997782', 'DAVILA', 'TUANAMA', 'DEOMAR RAFAEL', 'TECNICO ELECTRICISTA', '20524394937', 'V&B ENGINEERS GROUP S.A.C', '26/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('344', '42292692', 'DAZA', 'VALVERDE', 'JIM', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('345', '10874401', 'YATACO', 'MAGALLANES', 'CESAR DAVID', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('346', '43398449', 'RAMOS', 'CONDORI', 'JULIAN', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('347', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('348', '71959055', 'GONZALES ', 'SANCHEZ', 'JEAN POOL ANDERSON ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('349', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('350', '71309294', 'VASQUEZ ', 'YUPANQUI', 'ANDRES ROLANDO', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('351', '46622419', 'PACHECO', 'SAMANIEGO', 'GEMSMILL REYNALDO', 'MECANICOS ELÉCTRICOS', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('352', '08069239', 'BERRIOS', 'VIDAL', 'GUILLERMO MANUEL', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '31/07/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('353', '46190417', 'ARELLANO ', 'AGUILAR', 'EDGARDO', 'SUPERVISOR', '20600502841', 'POLIGRUAS PERU S.A', '31/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('354', '70133749', 'SOLIS ', 'PARRA', 'HUBERT KEVIN', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '31/07/2019', '18', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('355', '40088672', 'MEZA', 'QUINTO', 'JUVER JHON', 'TECNICO ELECTROMECANICO', '20600502841', 'POLIGRUAS PERU S.A', '31/07/2019', '16', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('356', '45780959', 'CONDEÑA', 'NAVENTA', 'EDWIN ANTONIO', 'ING SSOMA', '20600502841', 'POLIGRUAS PERU S.A', '06/08/2019', '20', '4', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('357', '47003814', 'VILLANUEVA', 'CAMONES', 'EDUARDO', 'TECNICO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('358', '002203838', 'VALVERDE', 'MAESTRE', 'RONALD EMIGDIO', 'MECANICO', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '11/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('359', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('360', '46911128', 'SIMON', 'MENDOZA', 'WASHINGTONG  DIONISIO', 'SUPERVISOR DE OPERACIONES ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('361', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('362', '45710844', 'PALPA', 'CCANTO', 'YOEL FREDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('363', '72285197', 'CONTRERAS ', 'CHOCCE ', 'EDWIN ISMAEL ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('364', '47001915', 'SALDAÑA', 'DAVILA', 'PIERO JUNIOR ', 'OPERARIO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '14', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('365', '79187847', 'CAMPOS', 'PUENTE  ', 'HUGO RAFAEL', 'OPERARIO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('366', '48246794', 'CURAY ', 'ZAVALA ', 'JERSON ALITH ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('367', '73997847', 'TAIPE', 'ACOSTA', 'JORGE ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('368', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '27/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('369', '20406237', 'NINANYA ', 'CRISTOBAL ', 'JAVIER VICTOR ', 'SUPERVISOR OPERATIVO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('370', '10425293', 'MARTINEZ ', 'LAZO', 'WALTER EMMANUEL', 'OPERARIO ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('371', '71140833', 'CALDERON ', 'LAURA', 'MANUEL JAVIER ', 'PRACTICANTE ', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('372', '80330323', 'PALOMINO ', 'TORIBIO ', 'JOSE LUIS ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('373', '19979258', 'ESCOBAR', 'MALPARTIDA', 'ELIAS', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('374', '42546678', 'CHUQUIJA ', 'VILCA', 'GERMAN ', 'OPERARIO', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('375', '47546678', 'NINANYA ', 'PARRA', 'ZULEMA GABRIELA', 'SUPERVISORA DE SEGURIDAD', '20486428610', 'CONSULTORES CONTRATISTAS J. NINANYA', '29/06/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('376', '77231249', 'GIRALDO', 'CHICHAY', 'ZAID LEYTHER', 'MECANICO-SOLDADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '11/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('377', '42115708', 'ROMERO', 'MORENO', 'LUIS', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('378', '46423149', 'MEDINA', 'TUMBAJULCA', 'CALEB', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('379', '25861099', 'NUÑEZ', 'TARAZONA', 'ALBERTO', 'JEFE DE SERVICIO', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('380', '47003814', 'VILLANUEVA', 'CAMONES', 'EDUARDO MIGUEL', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('381', '40134158', 'NEIRA', 'ALEGRE', 'RICHARD EDUARDO', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('382', '41723232', 'TIRADO', 'CASTILLO', 'MARCO ANTONIO', 'TÉCNICO DE CALDERAS', '20555451629', 'ENERGÍA Y COMBUSTIÓN SAC', '24/07/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('383', '10874401', 'YATACO', 'MAGALLANES', 'CESAR DAVID', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '16', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('384', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('385', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('386', '08069239', 'BERRIOS', 'VIDAL', 'GUILLERMO MANUEL', 'MECÁNICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('387', '42772063', 'RENGIFO', 'DAVILA', 'GINN KEDDY', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('388', '71965636', 'GALINDO', 'POMAHUACRE', 'FLOR MARISOL', 'SUPERVISOR SSMA', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '20', '6', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('389', '01949214', 'JIMENEZ', '-', 'JORGE LUIS', 'SUPERVISOR MONTAJE', '20545585465', 'PALCON PERU SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('390', '22244419', 'CASAS', 'MARTINEZ', 'JENNY AURORA', 'SUPERVISOR DE RIESGOS', '20545585465', 'PALCON PERU SAC', '13/06/2019', '16', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('391', '02185366', 'PIRELA', 'BECERRA', 'EMERSON LUIS', 'INGENIERO OPERACIONES', '20545585465', 'PALCON PERU SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('392', '42868261', 'CCORI', 'GONZALES', 'JUAN MANUEL', 'OPERADOR DE GRUAS', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('393', '41190244', 'MOSTACERO', 'BOBADILLA ', 'JOSE ANTONIO', 'RIGGER DE GRUA', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('394', '07710156', 'BUSTAMANTE', 'CRUZ', 'FELIMÓN CESAR', 'JEFE DE OPERACIONES', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('395', '44645533', 'BUSTAMANTE', 'GUTIERREZ', 'LUIS ALBERTO', 'COORDINADOR SOMA', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('396', '08127910', 'TAPIA', 'MALPARTIDA', 'DANIEL', 'SUPERVISOR SSOMA', '20545585465', 'PALCON PERU SAC', '13/06/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('397', '47072195', 'CERVANTES', 'SANCHEZ', 'JILMER RONALD', 'OPERADOR DE GRÚA', '20545585465', 'PALCON PERU SAC', '13/06/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('398', '41047805', 'FELIX', 'OBREGON', 'ALDO RAFAEL', 'RIGGER', '20545585465', 'PALCON PERU SAC', '13/06/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('399', '43378600', 'BRONCANO', 'MINAYA', 'RUBEN RICARDO', 'RIGGER', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '20/06/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('400', '43598664', 'JUSTO', 'RAMIREZ', 'OSWALDO', 'OPERADOR', '20600830512', 'NK&C SERVICIOS GENERALES SAC', '20/06/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('401', '80508113', 'CHAVEZ', 'MAYHUIRI ', 'JOSE ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('402', '02741974', 'MENDEZ', 'VIVAS ', 'EDWIN ALBERTO', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('403', '42476451', 'AQUINO', 'CHUVIANTE', 'JORGE LUIS', 'SOLDADOR /MECANICO ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('404', '40288779', 'GUERRA', 'GONZALES', 'MARCO ANTONIO', 'SUPERVISOR DE SEGURIDAD', '20522973204', 'PROVITEC SAC', '09/07/2019', '19', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('405', '25666269', 'CAYCHO ', 'RAMIREZ', 'JORGE', 'SUPERVISOR DE OBRA ', '20522973204', 'PROVITEC SAC', '09/07/2019', '16', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('406', '06748566', 'ROMERO ', 'SAMAME', 'CARLOS MANUEL', 'SUPERVISOR GENERAL', '20522973204', 'PROVITEC SAC', '09/07/2019', '19', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('407', '72001284', 'FERIA ', 'GANOZA', 'ALEXIS XAVIER', 'TECNICO/AYUDANTE', '20522973204', 'PROVITEC SAC', '09/07/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('408', '25832511', 'MUÑOZ ', 'SANTILLAN', 'PAUL ALAN', 'SUPERVISOR', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('409', '42638643', 'CRUZ ', 'CRUZ', 'JUAN ', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('410', '44795278', 'GALINDO ', 'SALAS', 'ELIXDANT', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('411', '42639462', 'ARIAS ', 'MARTINEZ', 'LUIS ARMANDO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('412', '15642329', 'TENA ', 'YACON', 'DEMETRIO CALIXTRO', 'OPERARIO', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '16', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('413', '44832873', 'OLAYA', 'SILUPU', 'NOELIA', 'SUPERVISOR SSOMA', '20100426235', 'FUNDICION Y MAESTRANZA INDUSTRIAL SRL', '09/07/2019', '16', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('414', '44728023', 'AZABACHE ', 'PALOMINO', 'SUE ELINOR', 'SEGURIDAD SSOMA', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('415', '40557456', 'MALLQUI', 'GENEBROZO', 'PABLO', 'SOLDADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '16', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('416', '02816096', 'GONZALES', 'SANDOVAL', 'CESAR AUGUSTO', 'INGENIERO SUPERVISOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('417', '43430896', 'JAHUIRA', 'CANAHUIRA', 'ALAM ELIO', 'OPERARIO', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('418', '42328565', 'CANALES', 'PILLACA', 'CARLOS EDUARDO ', 'OPERARIO', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('419', '47129574', 'VERDE', 'VALDEZ', 'OSCAR MANUEL', 'OPERARIO', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '20', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('420', '47825956', 'HUIMAN', 'AROSTE', 'JOHAN ALEXANDER ', 'OPERARIO', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '11/07/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('421', '48176923', 'CONSOLACION', 'MISHTI ', 'JUAN ALDO', 'OPERADOR', '20506025169', 'JOVALCO INGENIEROS S.R.L.', '13/07/2019', '15', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('422', '10874401', 'YATACO', 'MAGALLANES', 'CESAR DAVID', 'MECANICO  ', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('423', '142024409', 'LUGO', 'CRESPO', 'JULIO CESAR', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');
INSERT INTO `personal_induccion` VALUES ('424', '42283454', 'DIAZ', 'VASQUEZ', 'DANNY WAGNER ', 'MECANICO', '20548674418', 'INGENIERIA TECNICA SOCIOS ANONIMOS INDUSTRIALES SAC', '02/08/2019', '18', '5', '../assets/avatars/profile-pic.jpg');

-- ----------------------------
-- Table structure for `soliccapac`
-- ----------------------------
DROP TABLE IF EXISTS `soliccapac`;
CREATE TABLE `soliccapac` (
  `idesolicitud` int(50) NOT NULL,
  `idecapacitacion` int(20) NOT NULL,
  PRIMARY KEY (`idesolicitud`,`idecapacitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soliccapac
-- ----------------------------

-- ----------------------------
-- Table structure for `solicitudcapac`
-- ----------------------------
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
  `fechapago` date DEFAULT NULL,
  `horapago` time DEFAULT NULL,
  `feccreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idesolicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solicitudcapac
-- ----------------------------
INSERT INTO `solicitudcapac` VALUES ('1', '1', '30', '953569484', 'itzcadilac_16@hotmail.com', '1', '1', null, null, null, '2019-05-21 10:03:56');
INSERT INTO `solicitudcapac` VALUES ('2', '1', '60', '953222322', 'itzcadilac16@gmail.com', '2', '2', '981238912', '2019-05-21', '09:40:00', '2019-05-21 10:03:56');
INSERT INTO `solicitudcapac` VALUES ('3', '1', '60', '953222322', 'itzcadilac16@gmail.com', '1', '1', null, null, null, '2019-05-21 10:03:56');
INSERT INTO `solicitudcapac` VALUES ('4', '1', '60', '953222322', 'itzcadilac16@gmail.com', '1', '1', null, null, null, '2019-05-21 10:03:56');
INSERT INTO `solicitudcapac` VALUES ('5', '1', '120', '982939292', 'jicastillot16@gmail.com', '1', '1', null, null, null, '2019-05-21 10:03:56');

-- ----------------------------
-- Table structure for `solicitud_calendario`
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_calendario`;
CREATE TABLE `solicitud_calendario` (
  `idesolcapac` int(5) NOT NULL AUTO_INCREMENT,
  `idecalendcapacitaciones` int(20) NOT NULL,
  `idesolicitud` int(20) NOT NULL,
  PRIMARY KEY (`idesolcapac`,`idecalendcapacitaciones`,`idesolicitud`),
  KEY `idesolcapac` (`idesolcapac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solicitud_calendario
-- ----------------------------

-- ----------------------------
-- Table structure for `tipcapacitaciones`
-- ----------------------------
DROP TABLE IF EXISTS `tipcapacitaciones`;
CREATE TABLE `tipcapacitaciones` (
  `idecapacitacion` int(20) NOT NULL AUTO_INCREMENT,
  `desccapacitacion` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`idecapacitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipcapacitaciones
-- ----------------------------
INSERT INTO `tipcapacitaciones` VALUES ('1', 'Inducción', 'casco.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('2', 'Trabajo en Altura', 'trabajo_altura.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('3', 'Trabajo en Caliente', 'trabajo_caliente.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('4', 'Bloqueo y Etiquetado', 'bloq_etiq.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('5', 'Izaje de Carga', 'izaje_carga.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('6', 'Espacios Confinados', 'esp_conf.png', '50', '1');
INSERT INTO `tipcapacitaciones` VALUES ('7', 'Excavación', 'excavac.png', '50', '0');
INSERT INTO `tipcapacitaciones` VALUES ('8', 'Materiales Peligrosos', '', '50', '0');

-- ----------------------------
-- Table structure for `tippago`
-- ----------------------------
DROP TABLE IF EXISTS `tippago`;
CREATE TABLE `tippago` (
  `idetipopago` int(3) NOT NULL AUTO_INCREMENT,
  `codpago` varchar(5) DEFAULT NULL,
  `desctipopago` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`idetipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tippago
-- ----------------------------
INSERT INTO `tippago` VALUES ('1', 'DP', 'Depósito', '1');
INSERT INTO `tippago` VALUES ('2', 'PY', 'Paypal', '0');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('2', 'administrador', 'fcea920f7412b5da7be0cf42b8c93759', 'Administrador', 'SG026', '10', '0', '0', null, null, '2016-11-06 13:07:34', null, null, null, null, '0', null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('350', 'jcastillo', 'fcea920f7412b5da7be0cf42b8c93759', 'Jhan Isaac Castillo Tuesta', 'GE008', '0', '0', '0', '24', '1992-01-16', '2019-09-21 16:10:02', 'http://www.novoexpert.net', 'http://www.facebook.com/JICT16', 'http://www.twitter.com', 'http://www.linkedin.com', '0', 'Profesional con experiencia en Tecnologías de la Información y Sistemas de Información, diseñando y/o rediseñando procesos, realizando implementaciones de Sistemas de Información de alto desempeño, además de administrar y conducir proyectos, cumpliendo con las responsabilidades asumidas.\r\nCuento con experiencia en el Análisis y Diagramación de Procesos para luego realizar desarrollo de Sistemas de Información que mejoren la Calidad de los Procesos dentro de la entidad.\r\nDe excelentes relaciones interpersonales y habilidad para trabajar en equipo o individualmente, proactivo, con alto grado de responsabilidad y fácil interpretación de las políticas organizacionales.', 'Perú', 'Huaral', 'Huaral', 'Lima', './imagenes/fotos/350-foto.jpg');
INSERT INTO `usuario` VALUES ('351', 'prueba3', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba 3', 'SG046', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('352', 'prueba4', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba 4', 'SG026', '20', null, null, null, null, '2016-11-06 13:40:53', null, null, null, null, '0', null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('353', 'prueba2', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba2', 'SG015', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('354', 'prueba5', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba 5', 'GE006', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('355', 'prueba1', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba 1', 'SG003', '1', null, null, null, null, '2016-11-06 13:41:15', null, null, null, null, '0', null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('356', 'prueba10', 'fcea920f7412b5da7be0cf42b8c93759', 'Prueba 10', 'SG017', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('357', 'prueba20', '827ccb0eea8a706c4c34a16891f84e7b', 'prueba20', 'SG025', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('358', 'prueba50', '827ccb0eea8a706c4c34a16891f84e7b', 'prueba50', 'SG003', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('359', 'secge', 'fcea920f7412b5da7be0cf42b8c93759', 'SEC GEN', 'SG007', '0', null, null, null, null, '2016-11-06 13:40:08', null, null, null, null, '0', null, null, null, null, null, null);
INSERT INTO `usuario` VALUES ('450', 'lcastillo', 'fcea920f7412b5da7be0cf42b8c93759', 'Luis Felipe Castillo Tuesta', 'GE006', '0', '0', '0', '26', '1990-07-06', '2016-11-06 14:27:55', 'http://www.novoexpert.net', 'http://www.facebook.com/JICT16', 'http://www.twitter.com', 'http://www.linkedin.com', '1', 'Abogado', 'Perú', 'Huaral', 'Huaral', 'Lima', './imagenes/fotos/450-foto.jpg');
