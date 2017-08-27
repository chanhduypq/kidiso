/*
Navicat MySQL Data Transfer

Source Server         : SERVER
Source Server Version : 50095
Source Host           : 192.168.168.11:3306
Source Database       : kidiso

Target Server Type    : MYSQL
Target Server Version : 50095
File Encoding         : 65001

Date: 2014-06-26 18:23:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `classes`
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL auto_increment,
  `class_name` varchar(50) default NULL,
  `description` varchar(100) default NULL,
  `school_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_class_school1_idx` (`school_id`),
  KEY `fk_class_instructor1_idx` (`instructor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO classes VALUES ('1', '5A', 'classes 5A', '1', '1');
INSERT INTO classes VALUES ('2', '5B', 'Class 5B 123', '1', '1');
INSERT INTO classes VALUES ('3', '4E', 'Class 4E', '3', '1');
INSERT INTO classes VALUES ('4', '1A', 'Class 1A', '1', '3');
INSERT INTO classes VALUES ('5', '2A', '', '2', '0');
INSERT INTO classes VALUES ('25', '123ABC', '123ABC 123', '0', '2');
INSERT INTO classes VALUES ('7', '12', '12', '1', '1');
INSERT INTO classes VALUES ('8', '123', '123', '2', '1');
INSERT INTO classes VALUES ('9', '21', '21', '1', '1');
INSERT INTO classes VALUES ('22', '11S', '', '1', '1');
INSERT INTO classes VALUES ('14', '5B', '', '1', '1');
INSERT INTO classes VALUES ('15', '5A', '', '1', '1');
INSERT INTO classes VALUES ('16', '5B', '', '1', '1');
INSERT INTO classes VALUES ('17', '5A', '', '1', '1');
INSERT INTO classes VALUES ('24', '12Tesst', '123123', '3', '6');
INSERT INTO classes VALUES ('19', '5A', '', '1', '1');
INSERT INTO classes VALUES ('20', '5C', '123123', '1', '1');

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO country VALUES ('1', 'Viet Nam');
INSERT INTO country VALUES ('2', 'Japan');

-- ----------------------------
-- Table structure for `district`
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(11) NOT NULL auto_increment,
  `city_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO district VALUES ('1', 'Da Nang', '1');
INSERT INTO district VALUES ('2', 'HCMC', '1');
INSERT INTO district VALUES ('3', 'Ha Noi', '1');

-- ----------------------------
-- Table structure for `evaluate`
-- ----------------------------
DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate` (
  `id` int(11) NOT NULL auto_increment,
  `type` int(11) NOT NULL,
  `evaluate_date` datetime NOT NULL,
  `evaluate_situation_before` int(11) NOT NULL,
  `evaluate_situation_after` int(11) NOT NULL,
  `evaluate_plan` int(11) NOT NULL,
  `evaluate_compare_result` int(11) NOT NULL,
  `evaluate_result` int(11) NOT NULL,
  `meter_accessability` tinyint(1) NOT NULL,
  `is_data_recorded` tinyint(1) NOT NULL,
  `data_record_mode` tinyint(1) NOT NULL,
  `data_analysis_mode` tinyint(1) NOT NULL,
  `comment` varchar(255) default NULL,
  `is_data_reliable` tinyint(1) NOT NULL,
  `pdca_id` int(11) NOT NULL,
  `finish_flag` tinyint(4) default '0' COMMENT '1: finish,0:not ',
  PRIMARY KEY  (`id`),
  KEY `fk_evaluate_pdca1_idx` (`pdca_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluate
-- ----------------------------
INSERT INTO evaluate VALUES ('2', '1', '2014-06-25 04:50:58', '1', '1', '1', '1', '1', '0', '0', '1', '1', 'Thanh hải    123                  ', '1', '1', '0');
INSERT INTO evaluate VALUES ('3', '2', '2014-06-25 04:50:58', '1', '1', '1', '1', '1', '1', '0', '1', '1', 'test', '1', '1', '0');
INSERT INTO evaluate VALUES ('4', '1', '2014-06-23 05:31:36', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'test', '1', '1', '0');
INSERT INTO evaluate VALUES ('5', '3', '2014-06-25 04:50:58', '3', '1', '1', '1', '1', '1', '0', '1', '1', 'thanh hai test', '1', '1', '0');
INSERT INTO evaluate VALUES ('6', '3', '2014-06-23 09:15:45', '1', '1', '1', '1', '1', '1', '1', '1', '1', '111', '1', '1', '0');
INSERT INTO evaluate VALUES ('7', '3', '2014-06-23 09:15:56', '1', '1', '1', '1', '1', '1', '1', '1', '1', '111', '1', '1', '0');
INSERT INTO evaluate VALUES ('9', '4', '2014-06-25 04:50:58', '3', '1', '2', '1', '1', '1', '0', '1', '1', 'test', '1', '1', '0');

-- ----------------------------
-- Table structure for `instructor`
-- ----------------------------
DROP TABLE IF EXISTS `instructor`;
CREATE TABLE `instructor` (
  `id` int(11) NOT NULL auto_increment,
  `instructor_username` varchar(50) NOT NULL,
  `instructor_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `description` varchar(100) default NULL,
  `sex` tinyint(4) NOT NULL COMMENT '1: Male, 0: Female',
  `email` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `instructor_username_UNIQUE` (`instructor_username`),
  KEY `fk_instructor_school1_idx` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of instructor
-- ----------------------------
INSERT INTO instructor VALUES ('1', 'teacher', 'e10adc3949ba59abbe56e057f20f883e', 'haipt', '0000-00-00 00:00:00', null, '0', '', '1');
INSERT INTO instructor VALUES ('2', 'banghh', '123123', 'Bang HH', '0000-00-00 00:00:00', null, '1', 'abc@gmail.com', '1');
INSERT INTO instructor VALUES ('3', 'bangh123', '123123', 'Bang 123', '1970-01-01 00:00:00', null, '1', 'bang123@gmail.com', '6');
INSERT INTO instructor VALUES ('7', 'teacherbb', '4297f44b13955235245b2497399d7a93', 'Teacher BB', '2014-06-05 00:00:00', null, '1', 'teacherbb@gma.com', '1');
INSERT INTO instructor VALUES ('6', 'bang3', 'c8837b23ff8aaa8a2dde915473ce0991', 'bảng 1234', '2014-06-10 00:00:00', null, '1', 'bang3@gmail.com', '3');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL auto_increment,
  `item_name` varchar(255) default NULL,
  `type` int(11) default NULL COMMENT '1: electricity,2:gas,3:waster,4:waste',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO item VALUES ('1', 'Se apagan todas las luces cuando no son necesarias.', '1');
INSERT INTO item VALUES ('2', 'Se apagan los monitores, TV y otros aparatos electrónicos cuando no se usan.', '1');
INSERT INTO item VALUES ('3', 'Se desconectan los cargadores de celulares cuando están en desuso', '1');
INSERT INTO item VALUES ('4', 'Se evita abrir y cerrar la heladera cuando no es necesario.', '1');
INSERT INTO item VALUES ('5', 'Se evita ubicar la heladera en un lugar donde le dé el sol o cerca de las hornallas.', '1');
INSERT INTO item VALUES ('6', 'Se disminuye el uso de estufas eléctricas, calefacción, ventiladores\r\no aires acondicionados.', '1');
INSERT INTO item VALUES ('7', 'Se cuelga la ropa mojada de forma prolija para evitar tener que utilizar la plancha.', '1');
INSERT INTO item VALUES ('8', 'Se utilizan lámparas de bajo consumo.', '1');
INSERT INTO item VALUES ('9', 'Se tapan las ollas al cocinar.', '2');
INSERT INTO item VALUES ('10', 'Se baja la intensidad de la llama de las hornallas para que no sobrepase la base del recipiente.', '2');
INSERT INTO item VALUES ('11', 'Se secan bien las gotas de agua de la base de la cacerola antes de ponerla en el fuego.', '2');
INSERT INTO item VALUES ('12', 'Se limpian correctamente las hornallas.', '2');
INSERT INTO item VALUES ('13', 'Se lavan los platos con agua fría o con el calefón a una temperatura mínima.', '2');
INSERT INTO item VALUES ('14', 'Se evita abrir y cerrar la puerta del horno innecesariamente durante su uso.', '2');
INSERT INTO item VALUES ('15', 'Se apaga el calefón o termotanque cuando no se va a utilizar por más de 1 día.', '2');
INSERT INTO item VALUES ('16', 'En invierno se abrigan en vez de calefaccionar su hogar en exceso.', '2');
INSERT INTO item VALUES ('17', 'Cuando se cepillan los dientes, solo se abre la canilla para enjuagarse.', '3');
INSERT INTO item VALUES ('18', 'Cuando se lavan las manos, se abre la canilla despacio para no desperdiciar agua.', '3');
INSERT INTO item VALUES ('19', 'Se prefieren las duchas cortas a los baños de inmersión.', '3');
INSERT INTO item VALUES ('20', 'Se evita dejar correr el agua antes de bañarse.', '3');
INSERT INTO item VALUES ('21', 'Cuando se lava el auto o la bici, se usa un balde en vez de manguera.', '3');
INSERT INTO item VALUES ('22', 'Cuando lavan los platos, primero se enjabona todo y luego se abre la canilla solo para enjuagar.', '3');
INSERT INTO item VALUES ('23', 'Se aprovecha el agua de la lluvia para otros usos, por ejemplo regar.', '3');
INSERT INTO item VALUES ('24', 'Se riegan las plantas al atardecer para prevenir la evaporación.', '3');
INSERT INTO item VALUES ('25', 'Se utiliza ecobolsa, mochila o changuito al ir de compras para evitar recibir menos bolsas de plástico.', '4');
INSERT INTO item VALUES ('26', 'Se compostan los residuos orgánicos.', '4');
INSERT INTO item VALUES ('27', 'Se separan los residuos reciclables (papel, cartón, vidrio, plástico, tetra-brik) de la basura.', '4');
INSERT INTO item VALUES ('28', 'Se disponen los residuos reciclables en el contenedor verde ubicado en la vía pública o se entregan a los recuperadores urbanos.', '4');
INSERT INTO item VALUES ('29', 'Se eligen productos reciclados y/o reciclables.', '4');
INSERT INTO item VALUES ('30', 'Se prefieren los envases familiares a los envases pequeños (ej.: yogur, shampoo).', '4');
INSERT INTO item VALUES ('31', 'Se utiliza trapo de mesa o piso para limpiar y no papel de rollo de cocina o servilletas.', '4');
INSERT INTO item VALUES ('32', 'Se eligen productos con poco envoltorio.', '4');

-- ----------------------------
-- Table structure for `pdca`
-- ----------------------------
DROP TABLE IF EXISTS `pdca`;
CREATE TABLE `pdca` (
  `id` int(11) NOT NULL auto_increment,
  `plan_content` varchar(255) NOT NULL,
  `pupil_achieve` text,
  `pupil_improve` text,
  `pupil_comment` text,
  `family_comment` text,
  `created_date` datetime default NULL,
  `pupil_id` int(11) NOT NULL,
  `evalue_flag` tinyint(1) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `pupil_id` (`pupil_id`),
  KEY `fk_pdca_pupil_idx` (`pupil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdca
-- ----------------------------
INSERT INTO pdca VALUES ('1', 'test 2014                    ', null, null, null, null, '2014-06-17 15:01:20', '1', '1');
INSERT INTO pdca VALUES ('2', 'sdfsdf', null, null, null, null, '2014-06-02 15:40:22', '2', '1');

-- ----------------------------
-- Table structure for `pdca_analysis`
-- ----------------------------
DROP TABLE IF EXISTS `pdca_analysis`;
CREATE TABLE `pdca_analysis` (
  `pdca_id` int(11) NOT NULL,
  `type` int(11) NOT NULL default '1',
  `item_id` int(11) NOT NULL,
  `value_before` float NOT NULL,
  `value_after` float NOT NULL,
  `gas_type` tinyint(4) default NULL,
  KEY `fk_pdca_measurement_pdca1_idx` (`pdca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdca_analysis
-- ----------------------------
INSERT INTO pdca_analysis VALUES ('1', '1', '1', '1', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '2', '2', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '3', '3', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '4', '1', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '5', '1', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '6', '1', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '7', '1', '0', '0');
INSERT INTO pdca_analysis VALUES ('1', '1', '8', '1', '0', '0');

-- ----------------------------
-- Table structure for `pdca_comment`
-- ----------------------------
DROP TABLE IF EXISTS `pdca_comment`;
CREATE TABLE `pdca_comment` (
  `id` int(11) NOT NULL auto_increment,
  `pdca_id` int(11) default NULL,
  `type` int(11) default NULL,
  `plan_content` text,
  `pupil_achieve` text,
  `pupil_improve` text,
  `pupil_comment` text,
  `family_comment` text,
  `create_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdca_comment
-- ----------------------------
INSERT INTO pdca_comment VALUES ('16', '1', '3', '222', 'test', 'test', 'test', '3332', null);
INSERT INTO pdca_comment VALUES ('14', null, '3', null, null, null, null, null, null);
INSERT INTO pdca_comment VALUES ('11', '1', '3', '22', 'test 26', 'test 26', 'test 26', null, null);
INSERT INTO pdca_comment VALUES ('12', '1', '3', 'w', 'test 46', 'test 46', 'test 46', 'test 46', null);
INSERT INTO pdca_comment VALUES ('1', '1', '3', 'ok', 'test', 'testt', 'test', 'test', null);
INSERT INTO pdca_comment VALUES ('10', '1', '1', 'ok', 'test 16', 'test16', 'test 16', 'test 16eeeeee', null);
INSERT INTO pdca_comment VALUES ('15', null, '3', null, null, null, null, null, null);
INSERT INTO pdca_comment VALUES ('17', '1', '3', null, null, null, null, 'test', null);
INSERT INTO pdca_comment VALUES ('18', '1', '2', '1111', 'test 26', 'test 26', 'test 26', 'test 26', null);
INSERT INTO pdca_comment VALUES ('19', '1', '3', null, 'test', 'test', 'test', 'test', null);
INSERT INTO pdca_comment VALUES ('20', '1', '4', '33323332', 'test 46', 'test 46', 'test 46', 'test 46 faminly', null);

-- ----------------------------
-- Table structure for `pdca_measurement`
-- ----------------------------
DROP TABLE IF EXISTS `pdca_measurement`;
CREATE TABLE `pdca_measurement` (
  `id` int(11) NOT NULL auto_increment,
  `pdca_id` int(11) NOT NULL,
  `type` tinyint(11) NOT NULL default '1',
  `measurement_type` tinyint(4) NOT NULL COMMENT '1: measurements,2:analysic',
  `item_id` int(11) default NULL,
  `date_before` datetime default NULL,
  `value_before` float NOT NULL,
  `date_after` datetime default NULL,
  `value_after` float NOT NULL,
  `gas_type` tinyint(4) default NULL,
  `waste_type` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pdca_measurement_pdca1_idx` (`pdca_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdca_measurement
-- ----------------------------
INSERT INTO pdca_measurement VALUES ('1', '1', '3', '1', '17', null, '0', '2014-06-30 01:01:01', '111', null, null);
INSERT INTO pdca_measurement VALUES ('2', '1', '3', '1', '18', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('3', '1', '3', '1', '19', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('4', '1', '3', '1', '20', '2014-06-30 01:01:01', '11', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('5', '1', '3', '1', '21', '2014-06-30 01:01:01', '111', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('6', '1', '3', '1', '22', null, '0', '2014-06-30 01:01:01', '11', null, null);
INSERT INTO pdca_measurement VALUES ('7', '1', '3', '1', '23', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('8', '1', '3', '1', '24', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('9', '1', '2', '1', '9', '2014-06-30 01:01:01', '11', '2014-06-30 01:01:01', '11111', null, null);
INSERT INTO pdca_measurement VALUES ('10', '1', '2', '1', '10', '2014-06-30 01:01:01', '111', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('11', '1', '2', '1', '11', '2014-06-30 01:01:01', '11', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('12', '1', '2', '1', '12', '2014-06-30 01:01:01', '111', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('13', '1', '2', '1', '13', '2014-06-30 01:01:01', '1111', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('14', '1', '2', '1', '14', '2014-06-30 01:01:01', '3', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('15', '1', '2', '1', '15', null, '0', '2014-06-30 01:01:01', '1111', null, null);
INSERT INTO pdca_measurement VALUES ('16', '1', '2', '1', '16', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('17', '1', '4', '1', '25', '2014-06-30 01:01:01', '1', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('18', '1', '4', '1', '26', null, '0', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('19', '1', '4', '1', '27', null, '0', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('20', '1', '4', '1', '28', null, '0', '2014-06-30 01:01:01', '11', null, '1');
INSERT INTO pdca_measurement VALUES ('21', '1', '4', '1', '29', null, '0', '2014-06-30 01:01:01', '11', null, '1');
INSERT INTO pdca_measurement VALUES ('22', '1', '4', '1', '30', null, '0', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('23', '1', '4', '1', '31', '2014-06-30 01:01:01', '1', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('24', '1', '4', '1', '32', null, '0', null, '0', null, '1');
INSERT INTO pdca_measurement VALUES ('25', '1', '1', '2', '1', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('26', '1', '1', '2', '2', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('27', '1', '1', '2', '3', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('28', '1', '1', '2', '4', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('29', '1', '1', '2', '5', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('30', '1', '1', '2', '6', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('31', '1', '1', '2', '7', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('32', '1', '1', '2', '8', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('33', '1', '1', '1', '1', '2014-06-30 01:01:01', '1', '2014-06-30 01:01:01', '11', null, null);
INSERT INTO pdca_measurement VALUES ('34', '1', '1', '1', '2', '2014-06-30 01:01:01', '1', '2014-06-27 01:01:01', '22', null, null);
INSERT INTO pdca_measurement VALUES ('35', '1', '1', '1', '3', '2014-06-30 01:01:01', '1', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('36', '1', '1', '1', '4', '2014-06-30 01:01:01', '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('37', '1', '1', '1', '5', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('38', '1', '1', '1', '6', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('39', '1', '1', '1', '7', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('40', '1', '1', '1', '8', null, '0', null, '0', null, null);
INSERT INTO pdca_measurement VALUES ('41', '1', '2', '2', '9', null, '1', null, '1', null, null);
INSERT INTO pdca_measurement VALUES ('42', '1', '2', '2', '10', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('43', '1', '2', '2', '11', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('44', '1', '2', '2', '12', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('45', '1', '2', '2', '13', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('46', '1', '2', '2', '14', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('47', '1', '2', '2', '15', null, '1', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('48', '1', '2', '2', '16', null, '3', null, '2', null, null);
INSERT INTO pdca_measurement VALUES ('49', '1', '2', '2', '17', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('50', '1', '2', '2', '18', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('51', '1', '2', '2', '19', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('52', '1', '2', '2', '20', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('53', '1', '2', '2', '21', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('54', '1', '2', '2', '22', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('55', '1', '2', '2', '23', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('56', '1', '2', '2', '24', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('57', '1', '4', '2', '25', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('58', '1', '4', '2', '26', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('59', '1', '4', '2', '27', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('60', '1', '4', '2', '28', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('61', '1', '4', '2', '29', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('62', '1', '4', '2', '30', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('63', '1', '4', '2', '31', null, '2', null, '3', null, null);
INSERT INTO pdca_measurement VALUES ('64', '1', '4', '2', '32', null, '2', null, '3', null, null);

-- ----------------------------
-- Table structure for `pupil`
-- ----------------------------
DROP TABLE IF EXISTS `pupil`;
CREATE TABLE `pupil` (
  `id` int(11) NOT NULL auto_increment,
  `pupil_username` varchar(50) NOT NULL,
  `pupil_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` datetime NOT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '1: Male, 0: Female',
  `family_member_no` int(11) default NULL,
  `classes_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `pupil_username_UNIQUE` (`pupil_username`),
  KEY `fk_pupil_class1_idx` (`classes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pupil
-- ----------------------------
INSERT INTO pupil VALUES ('1', 'pupil', 'e10adc3949ba59abbe56e057f20f883e', 'test', '0000-00-00 00:00:00', '0', '4', '1');
INSERT INTO pupil VALUES ('2', 'pupil2', 'e10adc3949ba59abbe56e057f20f883e', 'test2', '0000-00-00 00:00:00', '1', null, '1');
INSERT INTO pupil VALUES ('3', 'publi3', 'e10adc3949ba59abbe56e057f20f883e', 'thanh hai', '0000-00-00 00:00:00', '1', null, '1');
INSERT INTO pupil VALUES ('4', 'banghh123', '4297f44b13955235245b2497399d7a93', 'Bang HH', '2014-06-04 00:00:00', '1', null, '1');
INSERT INTO pupil VALUES ('7', 'pupil123', '4297f44b13955235245b2497399d7a93', 'Pupil 123', '2014-06-12 00:00:00', '0', '4', '8');

-- ----------------------------
-- Table structure for `school`
-- ----------------------------
DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `district_id` int(11) NOT NULL,
  `description` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_school_district1_idx` (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school
-- ----------------------------
INSERT INTO school VALUES ('1', 'Test', '11', '1111', '111', '1', '111111111');
INSERT INTO school VALUES ('2', 'School Nam', 'Address', '123123', '123123', '1', '123123321');
INSERT INTO school VALUES ('3', 'BK DN', '54 NLB', '0511', '0123321', '3', '123123321');
INSERT INTO school VALUES ('4', 'School ABC', '123 OIK', '123123', '123123123', '2', '123123');
INSERT INTO school VALUES ('6', 'Sư Phạm', 'Quy Nhơn', '0905 000 999', '0905 000 999', '2', 'Không có miêu tả');

-- ----------------------------
-- Table structure for `school_admin`
-- ----------------------------
DROP TABLE IF EXISTS `school_admin`;
CREATE TABLE `school_admin` (
  `id` int(11) NOT NULL auto_increment,
  `school_admin_email` varchar(50) NOT NULL,
  `school_admin_username` varchar(50) NOT NULL,
  `school_admin_password` varchar(50) NOT NULL,
  `school_admin_name` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `school_admin_username_UNIQUE` (`school_admin_username`),
  UNIQUE KEY `school_admin_email` (`school_admin_email`),
  KEY `fk_school_admin_school1_idx` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_admin
-- ----------------------------
INSERT INTO school_admin VALUES ('1', 'school@gmail.com', 'school', 'e10adc3949ba59abbe56e057f20f883e', 'Bang Hoang', '1');
INSERT INTO school_admin VALUES ('2', 'school2@gmail.com', 'school2', '123123', 'Bang HH', '1');
INSERT INTO school_admin VALUES ('3', 'school3@gmail.com', 'school3', '123123', 'Banghh 3', '3');
INSERT INTO school_admin VALUES ('4', '123', 'schooladmin1', '123', '', '2');
INSERT INTO school_admin VALUES ('10', 'bangaaa@gmail.com', 'bangaaa', '4297f44b13955235245b2497399d7a93', 'test', '1');
INSERT INTO school_admin VALUES ('7', 'abcabc', 'abcabc', '4297f44b13955235245b2497399d7a93', 'abcabc', '1');
INSERT INTO school_admin VALUES ('11', 'banghhhh@gmail.com', 'banghhhh', '4297f44b13955235245b2497399d7a93', 'banghhhh', '3');
INSERT INTO school_admin VALUES ('12', 'bangcot@gmail.com', 'schooladmin', '4297f44b13955235245b2497399d7a93', 'bangcot 123', '3');
INSERT INTO school_admin VALUES ('14', 'hoahong@gmail.com', 'hoahong1', '123123', 'subadmin', '6');

-- ----------------------------
-- Table structure for `sub_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sub_admin`;
CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL auto_increment,
  `sub_admin_email` varchar(50) NOT NULL,
  `sub_admin_username` varchar(50) NOT NULL,
  `sub_admin_password` varchar(50) NOT NULL,
  `sub_admin_name` varchar(50) default NULL,
  `sub_admin_birthday` datetime default NULL,
  `description` text,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sub_admin_email_UNIQUE` (`sub_admin_email`),
  UNIQUE KEY `sub_admin_name_UNIQUE` (`sub_admin_username`),
  KEY `fk_sub_admin_district1_idx` (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sub_admin
-- ----------------------------
INSERT INTO sub_admin VALUES ('1', 'bang@gmail.com', 'BangHoang', '4297f44b13955235245b2497399d7a93', null, null, '123456', '1');
INSERT INTO sub_admin VALUES ('5', 'nam@kid.com', 'hello', 'e10adc3949ba59abbe56e057f20f883e', null, null, 'df', '1');
INSERT INTO sub_admin VALUES ('4', 'duc@kid.com', 'duc', 'e10adc3949ba59abbe56e057f20f883e', null, null, 'duc', '2');
INSERT INTO sub_admin VALUES ('7', 'subadmin@gmail.com', 'subadmin', '4297f44b13955235245b2497399d7a93', 'Bang Hoang', '2014-06-21 00:00:00', '123', '1');
INSERT INTO sub_admin VALUES ('9', 'subadmin2@gmail.com', 'subadmin211', '4297f44b13955235245b2497399d7a93', null, null, '321123', '1');

-- ----------------------------
-- Table structure for `system_admin`
-- ----------------------------
DROP TABLE IF EXISTS `system_admin`;
CREATE TABLE `system_admin` (
  `id` int(11) NOT NULL auto_increment,
  `system_username` varchar(50) default NULL,
  `system_password` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq` (`system_username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_admin
-- ----------------------------
INSERT INTO system_admin VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
