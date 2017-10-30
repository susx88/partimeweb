/*
Navicat MySQL Data Transfer

Source Server         : GRUPOJEGA.CL
Source Server Version : 50632
Source Host           : 192.185.134.57:3306
Source Database       : grupojeg_partime

Target Server Type    : MYSQL
Target Server Version : 50632
File Encoding         : 65001

Date: 2017-10-29 21:46:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `CodEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `RutEmpresa` varchar(255) DEFAULT NULL,
  `RazonSocial` varchar(255) DEFAULT NULL,
  `Domicilio` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Comuna` varchar(255) DEFAULT NULL,
  `Giro` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Contacto` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Cargo` varchar(255) DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES ('1', '761254254-K', 'Hotel Manquehue', 'Santiago', 'Región Metropolitana', 'COLBUN', 'SERVICIO', 'correo@dominio.cl', 'Pedro Martinez', '2 2653 2541', 'Gerente', '4', '1');
INSERT INTO `empresas` VALUES ('2', '78536052-3', 'Hotel Sheraton', 'Avda Sta Maria 234', 'Región Metropolitana', '0', 'Servicios', 'Sheraton@sheraton.com', 'Jose Miguel Sanchez', '55567879', 'Jefe de Personal', '6', '6');

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `CodEvento` varchar(7) NOT NULL,
  `CodEmpresa` varchar(7) DEFAULT NULL,
  `Evento` varchar(255) DEFAULT NULL,
  `Puesto` varchar(255) DEFAULT NULL,
  `Fecha` varchar(255) DEFAULT NULL,
  `Hora` varchar(255) DEFAULT NULL,
  `Estatus` varchar(255) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT '1',
  `Obs` longtext,
  `created_user` int(11) DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('E000001', '1', 'Corporativo', 'Garzones', 'Martes 10 de Octubre de 2017', '09:00 a 15:00', 'Inactivo', '1', 'Uniforme suministrado por la empresa.', '1', '1');
INSERT INTO `eventos` VALUES ('E000002', '1', 'Catering', 'Garzon', 'Miercoles 01 de Noviembre de 2017', '15:00 hasta 21:00', 'Activo', '1', 'Uniforme Blanco y Negro', '1', '12345678');
INSERT INTO `eventos` VALUES ('E000003', '1', 'Otro', 'Mesonero', 'Jueves 02 de Noviembre de 2017', '08:00 a 14:00', 'Activo', '10', 'Libre', '1', '6');
INSERT INTO `eventos` VALUES ('E000004', '2', 'Social', 'garzones', '15/11/2017', '18:00 a 05:00', 'Activo', '2', 'La tarifa es de $ 15.000', '6', '6');
INSERT INTO `eventos` VALUES ('E000005', '1', 'Evento de Prueba', 'Garzones', 'Miercoles', '08:00', 'Activo', '5', 'Prueba de envio masivo al guardar', '6', '6');
INSERT INTO `eventos` VALUES ('E000006', '2', 'Social', 'Anfitrionas', '16/11/2017', '07:00 a las 15:00', 'Activo', '2', '', '6', '6');

-- ----------------------------
-- Table structure for postulaciones
-- ----------------------------
DROP TABLE IF EXISTS `postulaciones`;
CREATE TABLE `postulaciones` (
  `CodPostulacion` varchar(255) NOT NULL,
  `CodEvento` varchar(255) DEFAULT NULL,
  `RutPostulante` varchar(255) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `HoraRegistro` time DEFAULT NULL,
  PRIMARY KEY (`CodPostulacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of postulaciones
-- ----------------------------
INSERT INTO `postulaciones` VALUES ('T000001', 'E000001', '25596908-0', '2017-10-29', '03:20:08');
INSERT INTO `postulaciones` VALUES ('T000002', 'E000003', '25596908-0', '2017-10-29', '11:35:31');
INSERT INTO `postulaciones` VALUES ('T000003', 'E000003', '12345678-9', '2017-10-29', '12:23:07');
INSERT INTO `postulaciones` VALUES ('T000004', 'E000006', '12345678-9', '2017-10-29', '19:24:24');

-- ----------------------------
-- Table structure for postulantes
-- ----------------------------
DROP TABLE IF EXISTS `postulantes`;
CREATE TABLE `postulantes` (
  `CodPostulante` varchar(7) NOT NULL,
  `PrimerNombre` varchar(255) DEFAULT NULL,
  `SegundoNombre` varchar(255) DEFAULT NULL,
  `ApellidoMaterno` varchar(255) DEFAULT NULL,
  `ApellidoPaterno` varchar(255) DEFAULT NULL,
  `RutPostulante` varchar(15) DEFAULT NULL,
  `Domicilio` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Comuna` varchar(255) DEFAULT NULL,
  `TelefonoMovil` varchar(255) DEFAULT NULL,
  `TelefonoFijo` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `AFP` varchar(255) DEFAULT NULL,
  `Salud` varchar(255) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Nacionalidad` varchar(255) DEFAULT NULL,
  `BancoCuenta` varchar(255) DEFAULT NULL,
  `NroCuenta` varchar(255) DEFAULT NULL,
  `TipoCuenta` varchar(255) DEFAULT NULL,
  `PuestoTrabajo` varchar(255) DEFAULT NULL,
  `ClaveAcceso` varchar(255) DEFAULT NULL,
  `Estatus` varchar(20) NOT NULL DEFAULT 'Activo',
  `foto` varchar(200) DEFAULT NULL,
  `permisos_acceso` varchar(255) NOT NULL DEFAULT 'Postulante',
  `created_user` int(11) DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodPostulante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of postulantes
-- ----------------------------
INSERT INTO `postulantes` VALUES ('P000002', 'Gabriela', '', 'Rodriguez', 'Castillo', '25723991-0', 'SanJoaquinRio Lauca 4346', 'Metropolitana', 'San Joaquin', '967441005', '', 'castillg@gmail.com', 'SI', 'Fonasa', '1983-05-04', 'Venezolana', 'Estado', '25723991', 'Rut', 'Garzon', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', null, 'Postulante', '4', '4');
INSERT INTO `postulantes` VALUES ('P000003', 'Jesus', 'Rafael', 'Barragan', 'Manrique', '25596908-0', 'Rio Lauca 4346', 'Región Metropolitana', 'PAINE', '965107959', '', 'manriquej@gmail.com', 'SI', 'FONASA', '1979-01-10', 'Venezolana', 'Estado', '25596908', 'RUT', 'Copero, Garzon', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', null, 'Postulante', '4', '25596908');
INSERT INTO `postulantes` VALUES ('P000004', 'Anastacia', 'Isabel', 'Zuñiga', 'Morales', '12345678-9', 'Las Paltatas N° 234', 'Región Metropolitana', 'CONCHALI', '996501352', '2226543567', 'victor_vlds@yahoo.com', 'Cuprum', 'Fonasa', '0000-00-00', 'Chilena', 'Estado', '12345678-9', 'Cta Rut', 'Garzon', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', null, 'Postulante', '6', '6');

-- ----------------------------
-- Table structure for regiones
-- ----------------------------
DROP TABLE IF EXISTS `regiones`;
CREATE TABLE `regiones` (
  `CodRegion` int(11) NOT NULL,
  `NombreRegion` char(255) DEFAULT NULL,
  `Orden` int(11) NOT NULL,
  `Activo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of regiones
-- ----------------------------
INSERT INTO `regiones` VALUES ('14', 'Región de Los Ríos', '14', '1');
INSERT INTO `regiones` VALUES ('13', 'Región Metropolitana', '13', '1');
INSERT INTO `regiones` VALUES ('12', 'Región de Magallanes y la Antártica Chilena', '12', '1');
INSERT INTO `regiones` VALUES ('11', 'Región de Aysén del General Carlos Ibáñez del Campo', '11', '1');
INSERT INTO `regiones` VALUES ('10', 'Región de Los Lagos', '10', '1');
INSERT INTO `regiones` VALUES ('9', 'Región de la Araucanía', '9', '1');
INSERT INTO `regiones` VALUES ('8', 'Región del Bío-Bío', '8', '1');
INSERT INTO `regiones` VALUES ('7', 'Región del Maule', '7', '1');
INSERT INTO `regiones` VALUES ('6', 'Región del Libertador General Bernardo O Higgins', '6', '1');
INSERT INTO `regiones` VALUES ('5', 'Región de Valparaiso', '5', '1');
INSERT INTO `regiones` VALUES ('4', 'Región de Coquimbo', '4', '1');
INSERT INTO `regiones` VALUES ('3', 'Región de Atacama', '3', '1');
INSERT INTO `regiones` VALUES ('2', 'Región de Antofagasta', '2', '1');
INSERT INTO `regiones` VALUES ('1', 'Región de Tarapacá', '1', '1');
INSERT INTO `regiones` VALUES ('15', 'Región de Arica y Parinacota', '15', '1');
INSERT INTO `regiones` VALUES ('0', 'Región de Ñuble', '0', null);

-- ----------------------------
-- Table structure for regiones_comunas
-- ----------------------------
DROP TABLE IF EXISTS `regiones_comunas`;
CREATE TABLE `regiones_comunas` (
  `CodComuna` int(11) unsigned NOT NULL DEFAULT '0',
  `NombreComuna` varchar(255) DEFAULT NULL,
  `CodRegion` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`CodComuna`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of regiones_comunas
-- ----------------------------
INSERT INTO `regiones_comunas` VALUES ('346', 'ALTO HOSPICIO', '1');
INSERT INTO `regiones_comunas` VALUES ('296', 'CAMINA', '1');
INSERT INTO `regiones_comunas` VALUES ('297', 'COLCHANE', '1');
INSERT INTO `regiones_comunas` VALUES ('3', 'HUARA', '1');
INSERT INTO `regiones_comunas` VALUES ('2', 'IQUIQUE', '1');
INSERT INTO `regiones_comunas` VALUES ('4', 'PICA', '1');
INSERT INTO `regiones_comunas` VALUES ('5', 'POZO ALMONTE', '1');
INSERT INTO `regiones_comunas` VALUES ('7', 'ANTOFAGASTA', '2');
INSERT INTO `regiones_comunas` VALUES ('10', 'CALAMA', '2');
INSERT INTO `regiones_comunas` VALUES ('298', 'MARIA ELENA', '2');
INSERT INTO `regiones_comunas` VALUES ('8', 'MEJILLONES', '2');
INSERT INTO `regiones_comunas` VALUES ('300', 'OLLAGÜE', '2');
INSERT INTO `regiones_comunas` VALUES ('301', 'SAN PEDRO DE ATACAMA', '2');
INSERT INTO `regiones_comunas` VALUES ('299', 'SIERRA GORDA', '2');
INSERT INTO `regiones_comunas` VALUES ('9', 'TALTAL', '2');
INSERT INTO `regiones_comunas` VALUES ('6', 'TOCOPILLA', '2');
INSERT INTO `regiones_comunas` VALUES ('302', 'ALTO DEL CARMEN', '3');
INSERT INTO `regiones_comunas` VALUES ('14', 'CALDERA', '3');
INSERT INTO `regiones_comunas` VALUES ('11', 'CHAÑARAL', '3');
INSERT INTO `regiones_comunas` VALUES ('13', 'COPIAPO', '3');
INSERT INTO `regiones_comunas` VALUES ('12', 'DIEGO DE ALMAGRO', '3');
INSERT INTO `regiones_comunas` VALUES ('17', 'FREIRINA', '3');
INSERT INTO `regiones_comunas` VALUES ('18', 'HUASCO', '3');
INSERT INTO `regiones_comunas` VALUES ('15', 'TIERRA AMARILLA', '3');
INSERT INTO `regiones_comunas` VALUES ('16', 'VALLENAR', '3');
INSERT INTO `regiones_comunas` VALUES ('22', 'ANDACOLLO', '4');
INSERT INTO `regiones_comunas` VALUES ('31', 'CANELA', '4');
INSERT INTO `regiones_comunas` VALUES ('29', 'COMBARBALA', '4');
INSERT INTO `regiones_comunas` VALUES ('21', 'COQUIMBO', '4');
INSERT INTO `regiones_comunas` VALUES ('30', 'ILLAPEL', '4');
INSERT INTO `regiones_comunas` VALUES ('20', 'LA HIGUERA', '4');
INSERT INTO `regiones_comunas` VALUES ('19', 'LA SERENA', '4');
INSERT INTO `regiones_comunas` VALUES ('33', 'LOS VILOS', '4');
INSERT INTO `regiones_comunas` VALUES ('26', 'MONTE PATRIA', '4');
INSERT INTO `regiones_comunas` VALUES ('25', 'OVALLE', '4');
INSERT INTO `regiones_comunas` VALUES ('24', 'PAIHUANO', '4');
INSERT INTO `regiones_comunas` VALUES ('27', 'PUNITAQUI', '4');
INSERT INTO `regiones_comunas` VALUES ('28', 'RIO HURTADO', '4');
INSERT INTO `regiones_comunas` VALUES ('32', 'SALAMANCA', '4');
INSERT INTO `regiones_comunas` VALUES ('23', 'VICUÑA', '4');
INSERT INTO `regiones_comunas` VALUES ('44', 'ALGARROBO', '5');
INSERT INTO `regiones_comunas` VALUES ('56', 'CABILDO', '5');
INSERT INTO `regiones_comunas` VALUES ('67', 'CALLE LARGA', '5');
INSERT INTO `regiones_comunas` VALUES ('46', 'CARTAGENA', '5');
INSERT INTO `regiones_comunas` VALUES ('40', 'CASABLANCA', '5');
INSERT INTO `regiones_comunas` VALUES ('63', 'CATEMU', '5');
INSERT INTO `regiones_comunas` VALUES ('340', 'CONCON', '5');
INSERT INTO `regiones_comunas` VALUES ('45', 'EL QUISCO', '5');
INSERT INTO `regiones_comunas` VALUES ('47', 'EL TABO', '5');
INSERT INTO `regiones_comunas` VALUES ('51', 'HIJUELAS', '5');
INSERT INTO `regiones_comunas` VALUES ('41', 'ISLA DE PASCUA', '5');
INSERT INTO `regiones_comunas` VALUES ('321', 'JUAN FERNANDEZ', '5');
INSERT INTO `regiones_comunas` VALUES ('50', 'LA CALERA', '5');
INSERT INTO `regiones_comunas` VALUES ('49', 'LA CRUZ', '5');
INSERT INTO `regiones_comunas` VALUES ('59', 'LA LIGUA', '5');
INSERT INTO `regiones_comunas` VALUES ('53', 'LIMACHE', '5');
INSERT INTO `regiones_comunas` VALUES ('65', 'LLAY LLAY', '5');
INSERT INTO `regiones_comunas` VALUES ('66', 'LOS ANDES', '5');
INSERT INTO `regiones_comunas` VALUES ('52', 'NOGALES', '5');
INSERT INTO `regiones_comunas` VALUES ('54', 'OLMUE', '5');
INSERT INTO `regiones_comunas` VALUES ('62', 'PANQUEHUE', '5');
INSERT INTO `regiones_comunas` VALUES ('57', 'PAPUDO', '5');
INSERT INTO `regiones_comunas` VALUES ('55', 'PETORCA', '5');
INSERT INTO `regiones_comunas` VALUES ('36', 'PUCHUNCAVI', '5');
INSERT INTO `regiones_comunas` VALUES ('61', 'PUTAENDO', '5');
INSERT INTO `regiones_comunas` VALUES ('48', 'QUILLOTA', '5');
INSERT INTO `regiones_comunas` VALUES ('38', 'QUILPUE', '5');
INSERT INTO `regiones_comunas` VALUES ('35', 'QUINTERO', '5');
INSERT INTO `regiones_comunas` VALUES ('68', 'RINCONADA', '5');
INSERT INTO `regiones_comunas` VALUES ('42', 'SAN ANTONIO', '5');
INSERT INTO `regiones_comunas` VALUES ('69', 'SAN ESTEBAN', '5');
INSERT INTO `regiones_comunas` VALUES ('60', 'SAN FELIPE', '5');
INSERT INTO `regiones_comunas` VALUES ('64', 'SANTA MARIA', '5');
INSERT INTO `regiones_comunas` VALUES ('43', 'SANTO DOMINGO', '5');
INSERT INTO `regiones_comunas` VALUES ('34', 'VALPARAISO', '5');
INSERT INTO `regiones_comunas` VALUES ('39', 'VILLA ALEMANA', '5');
INSERT INTO `regiones_comunas` VALUES ('37', 'VIÑA DEL MAR', '5');
INSERT INTO `regiones_comunas` VALUES ('58', 'ZAPALLAR', '5');
INSERT INTO `regiones_comunas` VALUES ('132', 'CHEPICA', '6');
INSERT INTO `regiones_comunas` VALUES ('125', 'CHIMBARONGO', '6');
INSERT INTO `regiones_comunas` VALUES ('110', 'CODEGUA', '6');
INSERT INTO `regiones_comunas` VALUES ('114', 'COINCO', '6');
INSERT INTO `regiones_comunas` VALUES ('113', 'COLTAUCO', '6');
INSERT INTO `regiones_comunas` VALUES ('112', 'DOÑIHUE', '6');
INSERT INTO `regiones_comunas` VALUES ('107', 'GRANEROS', '6');
INSERT INTO `regiones_comunas` VALUES ('139', 'LA ESTRELLA', '6');
INSERT INTO `regiones_comunas` VALUES ('116', 'LAS CABRAS', '6');
INSERT INTO `regiones_comunas` VALUES ('136', 'LITUECHE', '6');
INSERT INTO `regiones_comunas` VALUES ('129', 'LOLOL', '6');
INSERT INTO `regiones_comunas` VALUES ('106', 'MACHALI', '6');
INSERT INTO `regiones_comunas` VALUES ('122', 'MALLOA', '6');
INSERT INTO `regiones_comunas` VALUES ('134', 'MARCHIGUE', '6');
INSERT INTO `regiones_comunas` VALUES ('126', 'NANCAGUA', '6');
INSERT INTO `regiones_comunas` VALUES ('138', 'NAVIDAD', '6');
INSERT INTO `regiones_comunas` VALUES ('120', 'OLIVAR', '6');
INSERT INTO `regiones_comunas` VALUES ('130', 'PALMILLA', '6');
INSERT INTO `regiones_comunas` VALUES ('133', 'PAREDONES', '6');
INSERT INTO `regiones_comunas` VALUES ('131', 'PERALILLO', '6');
INSERT INTO `regiones_comunas` VALUES ('115', 'PEUMO', '6');
INSERT INTO `regiones_comunas` VALUES ('118', 'PICHIDEGUA', '6');
INSERT INTO `regiones_comunas` VALUES ('137', 'PICHILEMU', '6');
INSERT INTO `regiones_comunas` VALUES ('127', 'PLACILLA', '6');
INSERT INTO `regiones_comunas` VALUES ('135', 'PUMANQUE', '6');
INSERT INTO `regiones_comunas` VALUES ('123', 'QUINTA DE TILCOCO', '6');
INSERT INTO `regiones_comunas` VALUES ('105', 'RANCAGUA', '6');
INSERT INTO `regiones_comunas` VALUES ('121', 'RENGO', '6');
INSERT INTO `regiones_comunas` VALUES ('119', 'REQUINOA', '6');
INSERT INTO `regiones_comunas` VALUES ('124', 'SAN FERNANDO', '6');
INSERT INTO `regiones_comunas` VALUES ('111', 'SAN FRANCISCO DE MOSTAZAL', '6');
INSERT INTO `regiones_comunas` VALUES ('117', 'SAN VICENTE', '6');
INSERT INTO `regiones_comunas` VALUES ('128', 'SANTA CRUZ', '6');
INSERT INTO `regiones_comunas` VALUES ('166', 'CAUQUENES', '7');
INSERT INTO `regiones_comunas` VALUES ('167', 'CHANCO', '7');
INSERT INTO `regiones_comunas` VALUES ('161', 'COLBUN', '7');
INSERT INTO `regiones_comunas` VALUES ('157', 'CONSTITUCION', '7');
INSERT INTO `regiones_comunas` VALUES ('155', 'CUREPTO', '7');
INSERT INTO `regiones_comunas` VALUES ('140', 'CURICO', '7');
INSERT INTO `regiones_comunas` VALUES ('158', 'EMPEDRADO', '7');
INSERT INTO `regiones_comunas` VALUES ('144', 'HUALAÑE', '7');
INSERT INTO `regiones_comunas` VALUES ('145', 'LICANTEN', '7');
INSERT INTO `regiones_comunas` VALUES ('159', 'LINARES', '7');
INSERT INTO `regiones_comunas` VALUES ('162', 'LONGAVI', '7');
INSERT INTO `regiones_comunas` VALUES ('154', 'MAULE', '7');
INSERT INTO `regiones_comunas` VALUES ('147', 'MOLINA', '7');
INSERT INTO `regiones_comunas` VALUES ('164', 'PARRAL', '7');
INSERT INTO `regiones_comunas` VALUES ('152', 'PELARCO', '7');
INSERT INTO `regiones_comunas` VALUES ('320', 'PELLUHUE', '7');
INSERT INTO `regiones_comunas` VALUES ('153', 'PENCAHUE', '7');
INSERT INTO `regiones_comunas` VALUES ('143', 'RAUCO', '7');
INSERT INTO `regiones_comunas` VALUES ('165', 'RETIRO', '7');
INSERT INTO `regiones_comunas` VALUES ('149', 'RIO CLARO', '7');
INSERT INTO `regiones_comunas` VALUES ('141', 'ROMERAL', '7');
INSERT INTO `regiones_comunas` VALUES ('148', 'SAGRADA FAMILIA', '7');
INSERT INTO `regiones_comunas` VALUES ('151', 'SAN CLEMENTE', '7');
INSERT INTO `regiones_comunas` VALUES ('156', 'SAN JAVIER', '7');
INSERT INTO `regiones_comunas` VALUES ('341', 'SAN RAFAEL', '7');
INSERT INTO `regiones_comunas` VALUES ('150', 'TALCA', '7');
INSERT INTO `regiones_comunas` VALUES ('142', 'TENO', '7');
INSERT INTO `regiones_comunas` VALUES ('146', 'VICHUQUEN', '7');
INSERT INTO `regiones_comunas` VALUES ('163', 'VILLA ALEGRE', '7');
INSERT INTO `regiones_comunas` VALUES ('160', 'YERBAS BUENAS', '7');
INSERT INTO `regiones_comunas` VALUES ('303', 'ANTUCO', '8');
INSERT INTO `regiones_comunas` VALUES ('198', 'ARAUCO', '8');
INSERT INTO `regiones_comunas` VALUES ('180', 'BULNES', '8');
INSERT INTO `regiones_comunas` VALUES ('208', 'CABRERO', '8');
INSERT INTO `regiones_comunas` VALUES ('201', 'CAÑETE', '8');
INSERT INTO `regiones_comunas` VALUES ('344', 'CHIGUAYANTE', '8');
INSERT INTO `regiones_comunas` VALUES ('168', 'CHILLAN', '8');
INSERT INTO `regiones_comunas` VALUES ('342', 'CHILLAN VIEJO', '8');
INSERT INTO `regiones_comunas` VALUES ('175', 'COBQUECURA', '8');
INSERT INTO `regiones_comunas` VALUES ('186', 'COELEMU', '8');
INSERT INTO `regiones_comunas` VALUES ('170', 'COIHUECO', '8');
INSERT INTO `regiones_comunas` VALUES ('188', 'CONCEPCION', '8');
INSERT INTO `regiones_comunas` VALUES ('202', 'CONTULMO', '8');
INSERT INTO `regiones_comunas` VALUES ('194', 'CORONEL', '8');
INSERT INTO `regiones_comunas` VALUES ('197', 'CURANILAHUE', '8');
INSERT INTO `regiones_comunas` VALUES ('185', 'EL CARMEN', '8');
INSERT INTO `regiones_comunas` VALUES ('193', 'FLORIDA', '8');
INSERT INTO `regiones_comunas` VALUES ('192', 'HUALQUI', '8');
INSERT INTO `regiones_comunas` VALUES ('210', 'LAJA', '8');
INSERT INTO `regiones_comunas` VALUES ('199', 'LEBU', '8');
INSERT INTO `regiones_comunas` VALUES ('200', 'LOS ALAMOS', '8');
INSERT INTO `regiones_comunas` VALUES ('204', 'LOS ANGELES', '8');
INSERT INTO `regiones_comunas` VALUES ('195', 'LOTA', '8');
INSERT INTO `regiones_comunas` VALUES ('214', 'MULCHEN', '8');
INSERT INTO `regiones_comunas` VALUES ('212', 'NACIMIENTO', '8');
INSERT INTO `regiones_comunas` VALUES ('213', 'NEGRETE', '8');
INSERT INTO `regiones_comunas` VALUES ('174', 'NINHUE', '8');
INSERT INTO `regiones_comunas` VALUES ('184', 'PEMUCO', '8');
INSERT INTO `regiones_comunas` VALUES ('191', 'PENCO', '8');
INSERT INTO `regiones_comunas` VALUES ('169', 'PINTO', '8');
INSERT INTO `regiones_comunas` VALUES ('171', 'PORTEZUELO', '8');
INSERT INTO `regiones_comunas` VALUES ('215', 'QUILACO', '8');
INSERT INTO `regiones_comunas` VALUES ('206', 'QUILLECO', '8');
INSERT INTO `regiones_comunas` VALUES ('182', 'QUILLON', '8');
INSERT INTO `regiones_comunas` VALUES ('172', 'QUIRIHUE', '8');
INSERT INTO `regiones_comunas` VALUES ('187', 'RANQUIL', '8');
INSERT INTO `regiones_comunas` VALUES ('176', 'SAN CARLOS', '8');
INSERT INTO `regiones_comunas` VALUES ('178', 'SAN FABIAN', '8');
INSERT INTO `regiones_comunas` VALUES ('177', 'SAN GREGORIO DE ÑIQUEN', '8');
INSERT INTO `regiones_comunas` VALUES ('181', 'SAN IGNACIO', '8');
INSERT INTO `regiones_comunas` VALUES ('179', 'SAN NICOLAS', '8');
INSERT INTO `regiones_comunas` VALUES ('343', 'SAN PEDRO DE LA PAZ', '8');
INSERT INTO `regiones_comunas` VALUES ('211', 'SAN ROSENDO', '8');
INSERT INTO `regiones_comunas` VALUES ('205', 'SANTA BARBARA', '8');
INSERT INTO `regiones_comunas` VALUES ('196', 'SANTA JUANA', '8');
INSERT INTO `regiones_comunas` VALUES ('189', 'TALCAHUANO', '8');
INSERT INTO `regiones_comunas` VALUES ('203', 'TIRUA', '8');
INSERT INTO `regiones_comunas` VALUES ('190', 'TOME', '8');
INSERT INTO `regiones_comunas` VALUES ('173', 'TREHUACO', '8');
INSERT INTO `regiones_comunas` VALUES ('209', 'TUCAPEL', '8');
INSERT INTO `regiones_comunas` VALUES ('207', 'YUMBEL', '8');
INSERT INTO `regiones_comunas` VALUES ('183', 'YUNGAY', '8');
INSERT INTO `regiones_comunas` VALUES ('216', 'ANGOL', '9');
INSERT INTO `regiones_comunas` VALUES ('235', 'CARAHUE', '9');
INSERT INTO `regiones_comunas` VALUES ('220', 'COLLIPULLI', '9');
INSERT INTO `regiones_comunas` VALUES ('230', 'CUNCO', '9');
INSERT INTO `regiones_comunas` VALUES ('225', 'CURACAUTIN', '9');
INSERT INTO `regiones_comunas` VALUES ('305', 'CURARREHUE', '9');
INSERT INTO `regiones_comunas` VALUES ('221', 'ERCILLA', '9');
INSERT INTO `regiones_comunas` VALUES ('229', 'FREIRE', '9');
INSERT INTO `regiones_comunas` VALUES ('232', 'GALVARINO', '9');
INSERT INTO `regiones_comunas` VALUES ('238', 'GORBEA', '9');
INSERT INTO `regiones_comunas` VALUES ('231', 'LAUTARO', '9');
INSERT INTO `regiones_comunas` VALUES ('240', 'LONCOCHE', '9');
INSERT INTO `regiones_comunas` VALUES ('226', 'LONQUIMAY', '9');
INSERT INTO `regiones_comunas` VALUES ('218', 'LOS SAUCES', '9');
INSERT INTO `regiones_comunas` VALUES ('223', 'LUMACO', '9');
INSERT INTO `regiones_comunas` VALUES ('304', 'MELIPEUCO', '9');
INSERT INTO `regiones_comunas` VALUES ('234', 'NUEVA IMPERIAL', '9');
INSERT INTO `regiones_comunas` VALUES ('345', 'PADRE LAS CASAS', '9');
INSERT INTO `regiones_comunas` VALUES ('233', 'PERQUENCO', '9');
INSERT INTO `regiones_comunas` VALUES ('237', 'PITRUFQUEN', '9');
INSERT INTO `regiones_comunas` VALUES ('242', 'PUCON', '9');
INSERT INTO `regiones_comunas` VALUES ('236', 'PUERTO SAAVEDRA', '9');
INSERT INTO `regiones_comunas` VALUES ('217', 'PUREN', '9');
INSERT INTO `regiones_comunas` VALUES ('219', 'RENAICO', '9');
INSERT INTO `regiones_comunas` VALUES ('227', 'TEMUCO', '9');
INSERT INTO `regiones_comunas` VALUES ('306', 'TEODORO SCHMIDT', '9');
INSERT INTO `regiones_comunas` VALUES ('239', 'TOLTEN', '9');
INSERT INTO `regiones_comunas` VALUES ('222', 'TRAIGUEN', '9');
INSERT INTO `regiones_comunas` VALUES ('224', 'VICTORIA', '9');
INSERT INTO `regiones_comunas` VALUES ('228', 'VILCUN', '9');
INSERT INTO `regiones_comunas` VALUES ('241', 'VILLARRICA', '9');
INSERT INTO `regiones_comunas` VALUES ('277', 'ANCUD', '10');
INSERT INTO `regiones_comunas` VALUES ('265', 'CALBUCO', '10');
INSERT INTO `regiones_comunas` VALUES ('270', 'CASTRO', '10');
INSERT INTO `regiones_comunas` VALUES ('280', 'CHAITEN', '10');
INSERT INTO `regiones_comunas` VALUES ('271', 'CHONCHI', '10');
INSERT INTO `regiones_comunas` VALUES ('262', 'COCHAMO', '10');
INSERT INTO `regiones_comunas` VALUES ('276', 'CURACO DE VELEZ', '10');
INSERT INTO `regiones_comunas` VALUES ('279', 'DALCAHUE', '10');
INSERT INTO `regiones_comunas` VALUES ('268', 'FRESIA', '10');
INSERT INTO `regiones_comunas` VALUES ('269', 'FRUTILLAR', '10');
INSERT INTO `regiones_comunas` VALUES ('281', 'FUTALEUFU', '10');
INSERT INTO `regiones_comunas` VALUES ('308', 'HUALAIHUE', '10');
INSERT INTO `regiones_comunas` VALUES ('267', 'LLANQUIHUE', '10');
INSERT INTO `regiones_comunas` VALUES ('264', 'LOS MUERMOS', '10');
INSERT INTO `regiones_comunas` VALUES ('263', 'MAULLIN', '10');
INSERT INTO `regiones_comunas` VALUES ('255', 'OSORNO', '10');
INSERT INTO `regiones_comunas` VALUES ('282', 'PALENA', '10');
INSERT INTO `regiones_comunas` VALUES ('261', 'PUERTO MONTT', '10');
INSERT INTO `regiones_comunas` VALUES ('258', 'PUERTO OCTAY', '10');
INSERT INTO `regiones_comunas` VALUES ('266', 'PUERTO VARAS', '10');
INSERT INTO `regiones_comunas` VALUES ('274', 'PUQUELDON', '10');
INSERT INTO `regiones_comunas` VALUES ('260', 'PURRANQUE', '10');
INSERT INTO `regiones_comunas` VALUES ('256', 'PUYEHUE', '10');
INSERT INTO `regiones_comunas` VALUES ('272', 'QUEILEN', '10');
INSERT INTO `regiones_comunas` VALUES ('273', 'QUELLON', '10');
INSERT INTO `regiones_comunas` VALUES ('278', 'QUEMCHI', '10');
INSERT INTO `regiones_comunas` VALUES ('275', 'QUINCHAO', '10');
INSERT INTO `regiones_comunas` VALUES ('259', 'RIO NEGRO', '10');
INSERT INTO `regiones_comunas` VALUES ('307', 'SAN JUAN DE LA COSTA', '10');
INSERT INTO `regiones_comunas` VALUES ('257', 'SAN PABLO', '10');
INSERT INTO `regiones_comunas` VALUES ('285', 'AYSEN', '11');
INSERT INTO `regiones_comunas` VALUES ('287', 'CHILE CHICO', '11');
INSERT INTO `regiones_comunas` VALUES ('286', 'CISNES', '11');
INSERT INTO `regiones_comunas` VALUES ('289', 'COCHRANE', '11');
INSERT INTO `regiones_comunas` VALUES ('284', 'COYHAIQUE', '11');
INSERT INTO `regiones_comunas` VALUES ('309', 'GUAITECAS', '11');
INSERT INTO `regiones_comunas` VALUES ('312', 'LAGO VERDE', '11');
INSERT INTO `regiones_comunas` VALUES ('310', 'O´HIGGINS', '11');
INSERT INTO `regiones_comunas` VALUES ('288', 'RIO IBAÑEZ', '11');
INSERT INTO `regiones_comunas` VALUES ('311', 'TORTEL', '11');
INSERT INTO `regiones_comunas` VALUES ('316', 'LAGUNA BLANCA', '12');
INSERT INTO `regiones_comunas` VALUES ('319', 'NAVARINO', '12');
INSERT INTO `regiones_comunas` VALUES ('292', 'PORVENIR', '12');
INSERT INTO `regiones_comunas` VALUES ('317', 'PRIMAVERA', '12');
INSERT INTO `regiones_comunas` VALUES ('291', 'PUERTO NATALES', '12');
INSERT INTO `regiones_comunas` VALUES ('290', 'PUNTA ARENAS', '12');
INSERT INTO `regiones_comunas` VALUES ('314', 'RIO VERDE', '12');
INSERT INTO `regiones_comunas` VALUES ('315', 'SAN GREGORIO', '12');
INSERT INTO `regiones_comunas` VALUES ('318', 'TIMAUKEL', '12');
INSERT INTO `regiones_comunas` VALUES ('313', 'TORRES DEL PAINE', '12');
INSERT INTO `regiones_comunas` VALUES ('109', 'ALHUE', '13');
INSERT INTO `regiones_comunas` VALUES ('103', 'BUIN', '13');
INSERT INTO `regiones_comunas` VALUES ('99', 'CALERA DE TANGO', '13');
INSERT INTO `regiones_comunas` VALUES ('333', 'CERRILLOS', '13');
INSERT INTO `regiones_comunas` VALUES ('324', 'CERRO NAVIA', '13');
INSERT INTO `regiones_comunas` VALUES ('76', 'COLINA', '13');
INSERT INTO `regiones_comunas` VALUES ('75', 'CONCHALI', '13');
INSERT INTO `regiones_comunas` VALUES ('83', 'CURACAVI', '13');
INSERT INTO `regiones_comunas` VALUES ('338', 'EL BOSQUE', '13');
INSERT INTO `regiones_comunas` VALUES ('89', 'EL MONTE', '13');
INSERT INTO `regiones_comunas` VALUES ('328', 'ESTACION CENTRAL', '13');
INSERT INTO `regiones_comunas` VALUES ('334', 'HUECHURABA', '13');
INSERT INTO `regiones_comunas` VALUES ('330', 'INDEPENDENCIA', '13');
INSERT INTO `regiones_comunas` VALUES ('87', 'ISLA DE MAIPO', '13');
INSERT INTO `regiones_comunas` VALUES ('96', 'LA CISTERNA', '13');
INSERT INTO `regiones_comunas` VALUES ('93', 'LA FLORIDA', '13');
INSERT INTO `regiones_comunas` VALUES ('97', 'LA GRANJA', '13');
INSERT INTO `regiones_comunas` VALUES ('327', 'LA PINTANA', '13');
INSERT INTO `regiones_comunas` VALUES ('92', 'LA REINA', '13');
INSERT INTO `regiones_comunas` VALUES ('78', 'LAMPA', '13');
INSERT INTO `regiones_comunas` VALUES ('71', 'LAS CONDES', '13');
INSERT INTO `regiones_comunas` VALUES ('332', 'LO BARNECHEA', '13');
INSERT INTO `regiones_comunas` VALUES ('337', 'LO ESPEJO', '13');
INSERT INTO `regiones_comunas` VALUES ('325', 'LO PRADO', '13');
INSERT INTO `regiones_comunas` VALUES ('323', 'MACUL', '13');
INSERT INTO `regiones_comunas` VALUES ('94', 'MAIPU', '13');
INSERT INTO `regiones_comunas` VALUES ('90', 'MARIA PINTO', '13');
INSERT INTO `regiones_comunas` VALUES ('88', 'MELIPILLA', '13');
INSERT INTO `regiones_comunas` VALUES ('91', 'NUNOA', '13');
INSERT INTO `regiones_comunas` VALUES ('339', 'PADRE HURTADO', '13');
INSERT INTO `regiones_comunas` VALUES ('104', 'PAINE', '13');
INSERT INTO `regiones_comunas` VALUES ('336', 'PEDRO AGUIRRE CERDA', '13');
INSERT INTO `regiones_comunas` VALUES ('85', 'PEÑAFLOR', '13');
INSERT INTO `regiones_comunas` VALUES ('322', 'PEÑALOLEN', '13');
INSERT INTO `regiones_comunas` VALUES ('101', 'PIRQUE', '13');
INSERT INTO `regiones_comunas` VALUES ('72', 'PROVIDENCIA', '13');
INSERT INTO `regiones_comunas` VALUES ('82', 'PUDAHUEL', '13');
INSERT INTO `regiones_comunas` VALUES ('100', 'PUENTE ALTO', '13');
INSERT INTO `regiones_comunas` VALUES ('79', 'QUILICURA', '13');
INSERT INTO `regiones_comunas` VALUES ('81', 'QUINTA NORMAL', '13');
INSERT INTO `regiones_comunas` VALUES ('329', 'RECOLETA', '13');
INSERT INTO `regiones_comunas` VALUES ('77', 'RENCA', '13');
INSERT INTO `regiones_comunas` VALUES ('98', 'SAN BERNARDO', '13');
INSERT INTO `regiones_comunas` VALUES ('335', 'SAN JOAQUIN', '13');
INSERT INTO `regiones_comunas` VALUES ('102', 'SAN JOSE DE MAIPO', '13');
INSERT INTO `regiones_comunas` VALUES ('95', 'SAN MIGUEL', '13');
INSERT INTO `regiones_comunas` VALUES ('108', 'SAN PEDRO', '13');
INSERT INTO `regiones_comunas` VALUES ('326', 'SAN RAMON', '13');
INSERT INTO `regiones_comunas` VALUES ('70', 'SANTIAGO CENTRO', '13');
INSERT INTO `regiones_comunas` VALUES ('73', 'SANTIAGO OESTE', '13');
INSERT INTO `regiones_comunas` VALUES ('84', 'SANTIAGO SUR', '13');
INSERT INTO `regiones_comunas` VALUES ('86', 'TALAGANTE', '13');
INSERT INTO `regiones_comunas` VALUES ('80', 'TIL-TIL', '13');
INSERT INTO `regiones_comunas` VALUES ('331', 'VITACURA', '13');
INSERT INTO `regiones_comunas` VALUES ('244', 'CORRAL', '14');
INSERT INTO `regiones_comunas` VALUES ('248', 'FUTRONO', '14');
INSERT INTO `regiones_comunas` VALUES ('251', 'LA UNION', '14');
INSERT INTO `regiones_comunas` VALUES ('254', 'LAGO RANCO', '14');
INSERT INTO `regiones_comunas` VALUES ('249', 'LANCO', '14');
INSERT INTO `regiones_comunas` VALUES ('247', 'LOS LAGOS', '14');
INSERT INTO `regiones_comunas` VALUES ('246', 'MAFIL', '14');
INSERT INTO `regiones_comunas` VALUES ('245', 'MARIQUINA', '14');
INSERT INTO `regiones_comunas` VALUES ('243', 'VALDIVIA', '14');
INSERT INTO `regiones_comunas` VALUES ('250', 'PANGUIPULLI', '14');
INSERT INTO `regiones_comunas` VALUES ('252', 'PAILLACO', '14');
INSERT INTO `regiones_comunas` VALUES ('253', 'RIO BUENO', '14');
INSERT INTO `regiones_comunas` VALUES ('1', 'ARICA', '15');
INSERT INTO `regiones_comunas` VALUES ('295', 'CAMARONES', '15');
INSERT INTO `regiones_comunas` VALUES ('293', 'GENERAL LAGOS', '15');
INSERT INTO `regiones_comunas` VALUES ('294', 'PUTRE', '15');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`permisos_acceso`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'manriquej', 'Jesus Manrique', 'adaaa85065f12913c92400e290264428', 'manriquej@gmail.com', '965107959', null, 'Super Admin', 'activo', '2017-09-28 13:41:35', '2017-10-28 22:36:37');
INSERT INTO `usuarios` VALUES ('6', 'victor', 'Victor Valdez', '81dc9bdb52d04dc20036dbd8313ed055', null, null, null, 'Super Admin', 'activo', '2017-10-26 06:23:18', '2017-10-28 22:37:37');
