INSERT INTO marque (`id`, `nom_marque`)
VALUES
    ('1', 'APPLE'),
    ('2', 'SAMSUNG'),
    ('3', 'HUAWEI'),
    ('4', 'XIAOMI'),
    ('5', 'HONOR'),
    ('6', 'ALCATEL'),
    ('7', 'ASUS'),
    ('8', 'BLACKBERRY'),
    ('9', 'GOOGLE'),
    ('10', 'HTC'),
    ('11', 'LEECO'),
    ('12', 'LG'),
    ('13', 'MEIZU'),
    ('14', 'MOTOROLA'),
    ('15', 'NOKIA'),
    ('16', 'ONEPLUS'),
    ('17', 'OPPO'),
    ('18', 'SONNY'),
    ('19', 'WIKO');
	
INSERT INTO information_accueil (`id`, `emplacement`, `titre`,`texte`,`logo`)
VALUES
    ('1', '1', 'Information 1', 'Texte 1', 'fas fa-question'),
	('2', '2', 'Information 2', 'Texte 2', 'fas fa-question'),
	('3', '3', 'Information 3', 'Texte 3', 'fas fa-question'),
	('4', '4', 'Information 4', 'Texte 4', 'fas fa-question');
	
INSERT INTO	font_awesome (`id`, `nom`)
VALUES
    ('1', 'fas fa-question'),
	('2', 'fas fa-ad'),
	('3', 'fab fa-accusoft'),
    ('4', ' fas fa-adjust'),
    ('5', 'far fa-address-book'),
    ('6', 'fab fa-algolia'),
    ('7', 'far fa-address-card'),
    ('8', 'fas fa-align-justify'),
    ('9', 'fas fa-anchor'),
    ('10', 'fas fa-archive'),
    ('11', 'fab fa-amazon-pay'),
    ('12', 'fas fa-arrow-alt-circle-right'),
    ('13', 'fas fa-arrow-alt-circle-down'),
    ('14', 'fab fa-angellist'),
    ('15', 'fas fa-archway'),
    ('16', 'fab fa-app-store'),
    ('17', 'far fa-angry'),
    ('18', 'fas fa-arrow-alt-circle-up'),
    ('19', 'fas fa-at'),
    ('64', 'fas fa-audio-description'),
    ('20', 'fas fa-beer'),
    ('21', 'fab fa-atlassian'),
    ('22', 'fas fa-birthday-cake'),
    ('23', 'fas fa-blind'),
    ('24', 'fas fa-battery-half'),
    ('25', 'fas fa-battery-full'),
    ('26', 'fas fa-battery-empty'),
    ('27', 'fab fa-avianex'),
    ('28', 'fas fa-backspace'),
    ('29', 'fas fa-bacon'),
    ('30', 'fas fa-bed'),
    ('31', 'fas fa-bahai'),
    ('32', 'fas fa-baseball-ball'),
    ('33', 'fas fa-ban'),
    ('34', 'fas fa-bell'),
    ('35', 'fas fa-bell-slash'),
    ('36', 'fas fa-bicycle'),
    ('37', 'fab fa-bluetooth'),
    ('38', 'fas fa-bomb'),
    ('39', 'fas fa-bolt'),
    ('40', 'fas fa-book'),
    ('41', 'fas fa-broom'),
    ('42', 'fas fa-bookmark'),
    ('43', 'fas fa-box'),
    ('44', 'fas fa-camera'),
    ('45', 'fas fa-building'),
    ('46', 'far fa-calenadr-alt'),
    ('47', 'fas fa-wheelchair'),
    ('48', 'fab fa-btc'),
    ('49', 'fas fa-bus'),
    ('50', 'fas fa-cat'),
    ('51', 'fas fa-bullhorn'),
    ('52', 'fas fa-calculator'),
    ('53', 'fas fa-briefcase-medical'),
    ('54', 'far fa-check-circle'),
    ('55', 'fas fa-child'),
    ('56', 'fab fa-chromecast'),
    ('57', 'fas fa-city'),
    ('58', 'far fa-clipboard'),
    ('59', 'fas fa-cloud-showers-heavy'),
    ('60', 'fas fa-cloud'),
    ('61', 'fas fa-coffee'),
    ('62', 'fas fa-cog'),
	('63', 'fas fa-comment-dots');

INSERT INTO modele (`id`, `marque_id`, `nom_modele`)
VALUES
    ('1', '1', 'IPHONE 12 PRO MAX'),
    ('2', '1', 'IPHONE 12 PRO'),
    ('3', '1', 'IPHONE 12'),
    ('4', '1', 'IPHONE 12 MINI'),
    ('5', '1', 'IPHONE SE 2020'),
    ('6', '1', 'IPHONE 11 PRO MAX'),
    ('7', '1', 'IPHONE 11 PRO'),
    ('8', '1', 'IPHONE 11'),
    ('9', '1', 'IPHONE XS MAX'),
    ('10', '1', 'IPHONE XS'),
    ('11', '1', 'IPHONE XR'),
    ('12', '1', 'IPHONE X'),
    ('13', '1', 'IPHONE 8 PLUS'),
    ('14', '1', 'IPHONE 8'),
    ('15', '1', 'IPHONE 7 PLUS'),
    ('16', '1', 'IPHONE 7'),
    ('17', '1', 'IPHONE 6S PLUS'),
    ('18', '1', 'IPHONE 6S'),
    ('19', '1', 'IPHONE 6 PLUS'),
    ('20', '1', 'IPHONE 6'),
    ('21', '1', 'IPHONE SE'),
    ('22', '1', 'IPHONE 5S'),
    ('23', '1', 'IPHONE 5C'),
    ('24', '1', 'IPHONE 5'),
    ('25', '1', 'IPHONE 4S'),
    ('26', '1', 'IPHONE 4'),
    ('27', '2', 'GALAXY S21 ULTRA'),
    ('28', '2', 'GALAXY S21 PLUS'),
    ('29', '2', 'GALAXY S21 5G'),
    ('30', '2', 'GALAXY S21'),
    ('31', '2', 'GALAXY S20 FE 5G'),
    ('32', '2', 'GALAXY S20 FE'),
    ('33', '2', 'GALAXY S20 ULTRA'),
    ('34', '2', 'GALAXY S20 PLUS'),
    ('35', '2', 'GALAXY S20 5G'),
    ('36', '2', 'GALAXY S20'),
    ('37', '2', 'GALAXY S10E'),
    ('38', '2', 'GALAXY S10 LITE'),
    ('39', '2', 'GALAXY S10 PLUS'),
    ('40', '2', 'GALAXY S10 5G'),
    ('41', '2', 'GALAXY S10'),
    ('42', '2', 'GALAXY S9 PLUS'),
    ('43', '2', 'GALAXY S9'),
    ('44', '2', 'GALAXY S8 PLUS'),
    ('45', '2', 'GALAXY S8'),
    ('46', '2', 'GALAXY S7 EDGE PRIME'),
    ('47', '2', 'GALAXY S7'),
    ('48', '2', 'GALAXY S6 EDGE PLUS'),
    ('49', '2', 'GALAXY S6 EDGE'),
    ('50', '2', 'GALAXY S6'),
    ('51', '2', 'GALAXY S5 NEO'),
    ('52', '2', 'GALAXY S5 MINI'),
    ('53', '2', 'GALAXY S5'),
    ('54', '2', 'GALAXY S4 ACTIVE'),
    ('55', '2', 'GALAXY S4 MINI'),
    ('56', '2', 'GALAXY S4'),
    ('57', '2', 'GALAXY S3 MINI'),
    ('58', '2', 'GALAXY S3'),
    ('59', '2', 'GALAXY S2'),
    ('60', '2', 'GALAXY S DUOS'),
    ('61', '2', 'GALAXY NOTE 20 ULTRA'),
    ('62', '2', 'GALAXY NOTE 20'),
    ('63', '2', 'GALAXY NOTE 10 LITE'),
    ('64', '2', 'GALAXY NOTE 10 PLUS'),
    ('65', '2', 'GALAXY NOTE 10'),
    ('66', '2', 'GALAXY NOTE 9'),
    ('67', '2', 'GALAXY NOTE 8'),
    ('68', '2', 'GALAXY NOTE 5'),
    ('69', '2', 'GALAXY NOTE 4'),
    ('70', '2', 'GALAXY NOTE 3 LITE'),
    ('71', '2', 'GALAXY NOTE 3'),
    ('72', '2', 'GALAXY NOTE 2'),
    ('73', '2', 'GALAXY NOTE 1'),
    ('74', '2', 'GALAXY A80'),
    ('75', '2', 'GALAXY A72'),
    ('76', '2', 'GALAXY A71'),
    ('77', '2', 'GALAXY A70'),
    ('78', '2', 'GALAXY A52'),
    ('79', '2', 'GALAXY A51 5G'),
    ('80', '2', 'GALAXY A51'),
    ('81', '2', 'GALAXY A50S'),
    ('82', '2', 'GALAXY A50'),
    ('83', '2', 'GALAXY A42 5G'),
    ('84', '2', 'GALAXY A41'),
    ('85', '2', 'GALAXY A40'),
    ('86', '2', 'GALAXY A32 5G'),
    ('87', '2', 'GALAXY A32'),
    ('88', '2', 'GALAXY A31'),
    ('89', '2', 'GALAXY A30 S'),
    ('90', '2', 'GALAXY A30'),
    ('91', '2', 'GALAXY A21 S'),
    ('92', '2', 'GALAXY A20 E'),
    ('93', '2', 'GALAXY A20S'),
    ('94', '2', 'GALAXY A20'),
    ('95', '2', 'GALAXY A12'),
    ('96', '2', 'GALAXY A11'),
    ('97', '2', 'GALAXY A10S'),
    ('98', '2', 'GALAXY A10'),
    ('99', '2', 'GALAXY A9'),
    ('100', '2', 'GALAXY A8'),
    ('101', '2', 'GALAXY A7 2018'),
    ('102', '2', 'GALAXY A7 2017'),
    ('103', '2', 'GALAXY A7 2015'),
    ('104', '2', 'GALAXY A6 PLUS'),
    ('105', '2', 'GALAXY A6'),
    ('106', '2', 'GALAXY A5 2017'),
    ('107', '2', 'GALAXY A5 2016'),
    ('108', '2', 'GALAXY A5'),
    ('109', '2', 'GALAXY A3 2017'),
    ('110', '2', 'GALAXY A3 2016'),
    ('111', '2', 'GALAXY A3'),
    ('112', '2', 'GALAXY A02 S'),
    ('113', '2', 'GALAXY J8'),
    ('114', '2', 'GALAXY J7 2017'),
    ('115', '2', 'GALAXY J7 2016'),
    ('116', '2', 'GALAXY J6 PLUS'),
    ('117', '2', 'GALAXY J6'),
    ('118', '2', 'GALAXY J5 2017'),
    ('119', '2', 'GALAXY J5 2016'),
    ('120', '2', 'GALAXY J5 2015'),
    ('121', '2', 'GALAXY J5'),
    ('122', '2', 'GALAXY J4 PLUS'),
    ('123', '2', 'GALAXY J4'),
    ('124', '2', 'GALAXY J3 2017'),
    ('125', '2', 'GALAXY J3 2016'),
    ('126', '2', 'GALAXY J2 PRO 2018'),
    ('127', '2', 'GALAXY J1 2016'),
    ('128', '2', 'GALAXY J1 2015'),
    ('129', '2', 'GALAXY J1 MINI'),
    ('130', '2', 'GALAXY M20'),
    ('131', '2', 'GALAXY ALPHA'),
    ('132', '2', 'GALAXY GRAND 2'),
    ('133', '2', 'GALAXY GRAND NEO'),
    ('134', '2', 'GALAXY GRAND PRIME VE'),
    ('135', '2', 'GALAXY GRAND PRIME'),
    ('136', '2', 'GALAXY GRAND PLUS'),
    ('137', '2', 'GALAXY GRAND'),
    ('138', '2', 'GALAXY MEGA'),
    ('139', '2', 'GALAXY CORE PRIME 4G'),
    ('140', '2', 'GALAXY CORE PRIME'),
    ('141', '2', 'GALAXY CORE 4G'),
    ('142', '2', 'GALAXY EXPRESS 2'),
    ('143', '2', 'GALAXY TREND 2 LITE'),
    ('144', '2', 'GALAXY TREND LITE'),
    ('145', '2', 'GALAXY TREND'),
    ('146', '2', 'GALAXY ACE 4 LITE'),
    ('147', '2', 'GALAXY ACE 4'),
    ('148', '2', 'GALAXY ACE 3'),
    ('149', '2', 'GALAXY ACE 2'),
    ('150', '2', 'GALAXY ACE'),
    ('151', '2', 'XCOVER 4'),
    ('152', '2', 'XCOVER 3'),
    ('153', '2', 'GALAXY 22 5G (SM-A226B)'),
    ('154', '2', 'GALAXY 52S 5G'),
    ('155', '2', 'GALAXY A 22'),
    ('156', '2', 'GZ FOLD 2 5G'),
    ('157', '2', 'XCOVER 5'),
    ('158', '3', 'P40 PRO PLUS'),
    ('159', '3', 'P40 PRO'),
    ('160', '3', 'P40 LITE 5G'),
    ('161', '3', 'P40 LITE E'),
    ('162', '3', 'P40 LITE'),
    ('163', '3', 'P40'),
    ('164', '3', 'P30 PRO'),
    ('165', '3', 'P30 LITE'),
    ('166', '3', 'P30'),
    ('167', '3', 'P20 PRO'),
    ('168', '3', 'P20 LITE'),
    ('169', '3', 'P20'),
    ('170', '3', 'P10 PLUS'),
    ('171', '3', 'P10 LITE'),
    ('172', '3', 'P10'),
    ('173', '3', 'P9LITE'),
    ('174', '3', 'P9'),
    ('175', '3', 'P8 LITE 2017'),
    ('176', '3', 'P8 LITE'),
    ('177', '3', 'P SMART 2021'),
    ('178', '3', 'P SMART 2020'),
    ('179', '3', 'P SMART 2019'),
    ('180', '3', 'P SMART Z'),
    ('181', '3', 'P SMART PLUS'),
    ('182', '3', 'P SMART'),
    ('183', '3', 'Y9 2019'),
    ('184', '3', 'Y9'),
    ('185', '3', 'Y7 2019'),
    ('186', '3', 'Y7 PRIME 2019'),
    ('187', '3', 'Y7 PRIME 2018'),
    ('188', '3', 'Y7 PRIME'),
    ('189', '3', 'Y6P'),
    ('190', '3', 'Y6 2019'),
    ('191', '3', 'Y6 2018'),
    ('192', '3', 'Y6 PRO 2017'),
    ('193', '3', 'Y6 2017'),
    ('194', '3', 'Y6 II'),
    ('195', '3', 'Y5 2019'),
    ('196', '3', 'Y5 2018'),
    ('197', '3', 'Y5 2'),
    ('198', '3', 'MATE 30 PRO'),
    ('199', '3', 'MATE 20 PRO'),
    ('200', '3', 'MATE 20 LITE'),
    ('201', '3', 'MATE 20'),
    ('202', '3', 'MATE 10 PRO'),
    ('203', '3', 'MATE 10 LITE'),
    ('204', '3', 'MATE 10'),
    ('205', '3', 'MATE 9 PRO'),
    ('206', '3', 'MATE 9'),
    ('207', '3', 'MATE 8'),
    ('208', '3', 'MATE 7'),
    ('209', '3', 'NOVA 5T'),
    ('210', '3', 'NOVA 3'),
    ('211', '3', 'NOVA 2'),
    ('212', '3', 'NOVA'),
    ('213', '3', 'NOVA SMART'),
    ('214', '3', 'G8'),
    ('215', '3', 'NEXUS 6P'),
    ('216', '3', 'ASCEND G620S'),
    ('217', '3', 'ENJOY (DUB-AL00)'),
    ('218', '3', 'MI 10T PRO'),
    ('219', '3', 'P20 LITE 17/18 ANE-LX1'),
    ('220', '3', 'Y6S'),
    ('221', '4', 'REDMI NOTE 10'),
    ('222', '4', 'REDMI NOTE 9 PRO'),
    ('223', '4', 'REDMI NOTE 9S'),
    ('224', '4', 'REDMI NOTE 9'),
    ('225', '4', 'REDMI NOTE 8T'),
    ('226', '4', 'REDMI NOTE 8 PRO'),
    ('227', '4', 'REDMI NOTE 8'),
    ('228', '4', 'REDMI NOTE 7'),
    ('229', '4', 'REDMI NOTE 6 PRO'),
    ('230', '4', 'REDMI NOTE 6'),
    ('231', '4', 'REDMI NOTE 5A PRIME'),
    ('232', '4', 'REDMI NOTE 5 PRO'),
    ('233', '4', 'REDMI NOTE 5'),
    ('234', '4', 'REDMI NOTE 4X'),
    ('235', '4', 'REDMI NOTE 4'),
    ('236', '4', 'REDMI NOTE 3'),
    ('612', '4', 'REDMI 9T'),
    ('237', '4', 'REDMI 9A'),
    ('238', '4', 'REDMI 9'),
    ('239', '4', 'REDMI 8'),
    ('240', '4', 'REDMI 7A'),
    ('241', '4', 'REDMI 7'),
    ('242', '4', 'REDMI 6A'),
    ('243', '4', 'REDMI 6 DUAL SIM'),
    ('244', '4', 'REDMI 6'),
    ('245', '4', 'REDMI 5A'),
    ('246', '4', 'REDMI 5 PLUS'),
    ('247', '4', 'REDMI 5'),
    ('248', '4', 'REDMI 4X'),
    ('249', '4', 'REDMI 4A'),
    ('250', '4', 'REDMI S2'),
    ('251', '4', 'MI NOTE 10'),
    ('252', '4', 'MI NOTE 10 LITE'),
    ('253', '4', 'MI 11 PRO'),
    ('254', '4', 'MI 11'),
    ('255', '4', 'MI 10T'),
    ('256', '4', 'MI 10'),
    ('257', '4', 'MI 9T'),
    ('258', '4', 'MI 9 SE'),
    ('259', '4', 'MI 9 LITE'),
    ('260', '4', 'MI 9'),
    ('261', '4', 'MI 8 LITE'),
    ('262', '4', 'MI 8'),
    ('263', '4', 'MI 5S'),
    ('264', '4', 'MI 5'),
    ('265', '4', 'MI A3'),
    ('266', '4', 'MI A2'),
    ('267', '4', 'MI A1'),
    ('268', '4', 'MI MIX 3'),
    ('269', '4', 'MI MIX 2S'),
    ('270', '4', 'MI MIX 2'),
    ('271', '4', 'MI MAX 3'),
    ('272', '4', 'MI MAX 2'),
    ('273', '4', 'MI MAX'),
    ('274', '4', 'POCO F2 PRO'),
    ('275', '4', 'POCO F1'),
    ('276', '4', 'MI 10 5G'),
    ('277', '4', 'MI 10T LITE 5G'),
    ('278', '4', 'MI 11 LITE 5G'),
    ('279', '4', 'REDMI NOTE 10 5G'),
    ('280', '4', 'REDMI NOTE 10 PRO'),
    ('281', '5', '20 PRO'),
    ('282', '5', '20 LITE'),
    ('283', '5', '20'),
    ('284', '5', '10 LITE'),
    ('285', '5', '10'),
    ('286', '5', '9X LITE'),
    ('287', '5', '9X'),
    ('288', '5', '9 LITE'),
    ('289', '5', '9'),
    ('290', '5', '8X'),
    ('291', '5', '8A'),
    ('292', '5', '8 PRO'),
    ('293', '5', '8'),
    ('294', '5', '7X'),
    ('295', '5', '7S'),
    ('296', '5', '7C'),
    ('297', '5', '7A'),
    ('298', '5', '7'),
    ('299', '5', '6X'),
    ('300', '5', '6C PRO'),
    ('301', '5', '6C'),
    ('302', '5', '6A'),
    ('303', '5', '5X'),
    ('304', '5', '5C'),
    ('305', '5', 'VIEW 20'),
    ('306', '5', 'VIEW 10'),
    ('307', '5', 'HONOR PLAY'),
    ('308', '6', 'IDOL 4'),
    ('309', '6', 'IDOL 3 (4.7)'),
    ('310', '6', '1X'),
    ('311', '6', '1X'),
    ('312', '7', 'ZENFONE 6'),
    ('313', '7', 'ZENFONE 5Z'),
    ('314', '7', 'ZENFONE 5 LITE (ZC600KL)'),
    ('315', '7', 'ZENFONE 5 (ZE620KL)'),
    ('316', '7', 'ZENFONE 5'),
    ('317', '7', 'ZENFONE 4 SELFIE PRO'),
    ('318', '7', 'ZENFONE 4 MAX PLUS (554KL)'),
    ('319', '7', 'ZENFONE 4 MAX PLUS (550TL)'),
    ('320', '7', 'ZENFONE 4 MAX (ZC520KL)'),
    ('321', '7', 'ZENFONE 4 MAX'),
    ('322', '7', 'ZENFONE 4 (ZE554KL)'),
    ('323', '7', 'ZENFONE 4'),
    ('324', '7', 'ZENFONE 3 ZOOM S'),
    ('325', '7', 'ZENFONE 3 MAX (ZC553KL)'),
    ('326', '7', 'ZENFONE 3 MAX PLUS'),
    ('327', '7', 'ZENFONE 3 MAX (ZC520TL)'),
    ('328', '7', 'ZENFONE 3 LASER (ZC551KL)'),
    ('329', '7', 'ZENFONE 3 (ZE552KL)'),
    ('340', '7', 'ZENFONE 3 (ZE520KL)'),
    ('341', '7', 'ZENFONE 2 LASER (ZE601KL)'),
    ('342', '7', 'ZENFONE 3 DELUXE'),
    ('343', '7', 'ZENFONE 2 LASER (ZE600KL)'),
    ('344', '7', 'ZENFONE 2 (ZE551ML)'),
    ('345', '7', 'ZENFONE 2 (ZE500CL)'),
    ('346', '7', 'ZENFONE 2'),
    ('347', '7', 'ZENFONE MAX PRO M2'),
    ('348', '7', 'ZENFONE MAX PRO M1'),
    ('349', '7', 'ZENFONE MAX PLUS M1'),
    ('350', '7', 'ZENFONE MAX M2'),
    ('351', '7', 'ZENFONE MAX (ZC550KL)'),
    ('352', '7', 'ZENFONE MAX'),
    ('353', '7', 'ZENFONE LIVE PLUS'),
    ('354', '7', 'ZENFONE LIVE (ZB501KL)'),
    ('355', '7', 'ZENFONE GO'),
    ('356', '7', 'ZENFONE SELFIE (ZD551KL)'),
    ('357', '7', 'ZENFONE SELFIE'),
    ('358', '7', 'ROG PHONE 2 (ZS660KL)'),
    ('359', '7', 'ZENFONE ZOOM S'),
    ('360', '7', 'ROG PHONE (ZS600KL)'),
    ('361', '8', 'KEY 2'),
    ('362', '8', 'KEYONE'),
    ('363', '8', '9900'),
    ('364', '9', 'PIXEL 4A 5G'),
    ('365', '9', 'PIXEL 4A'),
    ('366', '9', 'PIXEL 4 XL'),
    ('367', '9', 'PIXEL 4'),
    ('368', '9', 'PIXEL 3A XL'),
    ('369', '9', 'PIXEL 3A'),
    ('370', '9', 'PIXEL 3 XL'),
    ('371', '9', 'PIXEL 3'),
    ('372', '9', 'PIXEL 2 XL'),
    ('373', '9', 'PIXEL 2'),
    ('374', '9', 'PIXEL 5'),
    ('375', '10', 'U12 PLUS'),
    ('376', '10', 'U11'),
    ('377', '10', 'DESIRE 825'),
    ('378', '10', 'DESIRE 820'),
    ('379', '10', 'DESIRE 626'),
    ('380', '10', 'DESIRE 620'),
    ('381', '10', 'DESIRE 610'),
    ('382', '10', 'DESIRE 530'),
    ('383', '10', 'DESIRE 510'),
    ('384', '10', 'U PLAY'),
    ('385', '10', 'ONE A9 S'),
    ('386', '10', 'ONE A9'),
    ('387', '10', 'ONE M7'),
    ('388', '10', 'ONE X'),
    ('389', '10', 'ONE S'),
    ('390', '11', 'LE PRO 3'),
    ('391', '12', 'V20'),
    ('392', '12', 'G7 THINQ'),
    ('393', '12', 'G6'),
    ('394', '12', 'G5'),
    ('395', '12', 'G4'),
    ('396', '12', 'OPTIMUS G3'),
    ('397', '12', 'G3'),
    ('398', '12', 'G2'),
    ('399', '12', 'OPTIMUS G'),
    ('400', '12', 'K10'),
    ('401', '12', 'K8 2017'),
    ('402', '12', 'K8'),
    ('403', '12', 'Q7'),
    ('404', '12', 'Q6'),
    ('405', '12', 'NEXUS 5X'),
    ('406', '12', 'NEXUS 5'),
    ('407', '12', 'NEXUS 4'),
    ('408', '13', 'PRO 7 PLUS'),
    ('409', '13', 'PRO 7'),
    ('410', '13', 'PRO 6 PLUS'),
    ('411', '13', 'PRO 6'),
    ('412', '13', 'MX6'),
    ('413', '13', 'MX5'),
    ('414', '13', 'M3 NOTE'),
    ('415', '14', 'MOTOROLA ONE'),
    ('416', '14', 'MOTO G7 PLAY'),
    ('417', '14', 'MOTO G7 POWER'),
    ('418', '14', 'MOTO G7'),
    ('419', '14', 'MOTO G6 PLAY'),
    ('420', '14', 'MOTO G6'),
    ('421', '14', 'MOTO G5S'),
    ('422', '14', 'MOTO G5'),
    ('423', '14', 'MOTO Z3 PLAY'),
    ('424', '14', 'MOTO Z2 PLAY'),
    ('425', '14', 'MOTO Z'),
    ('426', '14', 'MOTO E5 PLUS'),
    ('427', '14', 'MOTO E5'),
    ('428', '14', 'MOTO E4 PLUS'),
    ('429', '14', 'MOTO E4'),
    ('430', '14', 'MOTO X (2ND GENERATION)'),
    ('431', '14', 'MOTO X'),
    ('432', '14', 'MOTO C PLUS'),
    ('433', '14', 'NEXUS 6'),
    ('434', '14', 'MOTO G9 PLUS'),
    ('435', '15', '8.1'),
    ('436', '15', '8'),
    ('437', '15', '7.2'),
    ('438', '15', '7.1'),
    ('439', '15', '7 PLUS'),
    ('440', '15', '6.1 PLUS'),
    ('441', '15', '6.1'),
    ('442', '15', '6'),
    ('443', '15', '5.1 PLUS'),
    ('444', '15', '5.1'),
    ('445', '15', '5'),
    ('446', '15', '4.2'),
    ('447', '15', '3.4'),
    ('448', '15', '3.2'),
    ('449', '15', '3.1 PLUS'),
    ('450', '15', '3.1'),
    ('451', '15', '3 (TA032)'),
    ('452', '15', '3'),
    ('453', '15', '2.2'),
    ('454', '15', '2.1'),
    ('455', '15', '1'),
    ('456', '15', 'LUMIA 1020'),
    ('457', '15', 'LUMIA 1320'),
    ('458', '15', 'LUMIA 930'),
    ('459', '15', 'LUMIA 925'),
    ('460', '15', 'LUMIA 920'),
    ('461', '15', 'LUMIA 830'),
    ('462', '15', 'LUMIA 820'),
    ('463', '15', 'LUMIA 650'),
    ('464', '15', 'LUMIA 635'),
    ('465', '15', 'LUMIA 630'),
    ('466', '15', 'LUMIA 325'),
    ('467', '15', 'LUMIA 550'),
    ('468', '15', 'LUMIA 535'),
    ('469', '15', 'LUMIA 530'),
    ('470', '15', 'LUMIA 520'),
    ('471', '16', '8 PRO'),
    ('472', '16', '7T PRO'),
    ('473', '16', '7T'),
    ('474', '16', '7 PRO'),
    ('475', '16', '7'),
    ('476', '16', '6T'),
    ('477', '16', '6'),
    ('478', '16', '5T'),
    ('479', '16', '5'),
    ('480', '16', '3T'),
    ('481', '16', '3'),
    ('482', '16', '2'),
    ('483', '16', 'ONE'),
    ('484', '16', 'X'),
    ('485', '17', 'R17 PRO'),
    ('486', '17', 'FIND X3 PRO'),
    ('487', '17', 'FIND X3 LITE'),
    ('488', '17', 'FIND X3 NEO'),
    ('489', '17', 'FIND X2 PRO'),
    ('490', '17', 'FIND X2 LITE'),
    ('491', '17', 'FIND X2 NEO'),
    ('492', '17', 'FIND X'),
    ('493', '17', 'FIND 7'),
    ('494', '17', 'AX7'),
    ('495', '17', 'A94 5G'),
    ('496', '17', 'A74 5G'),
    ('497', '17', 'A74'),
    ('498', '17', 'A72'),
    ('499', '17', 'A54 5G'),
    ('500', '17', 'A53'),
    ('501', '17', 'A15'),
    ('502', '17', 'A9 2020'),
    ('503', '17', 'A9'),
    ('504', '17', 'A5 2020'),
    ('505', '17', 'A3'),
    ('506', '17', 'A1'),
    ('507', '17', 'RENO 10X ZOOM'),
    ('508', '17', 'RENO 4Z'),
    ('509', '17', 'RENO 4 PRO'),
    ('510', '17', 'RENO 4'),
    ('511', '17', 'RENO 2Z'),
    ('512', '17', 'RENO 2'),
    ('513', '17', 'RENO Z'),
    ('514', '17', 'RENO'),
    ('515', '17', 'F1S'),
    ('516', '17', 'A16'),
    ('517', '17', 'A16 S'),
    ('518', '17', 'RENO 6'),
    ('519', '17', 'RENO 6 PRO'),
    ('520', '18', 'XPERIA 10 II'),
    ('521', '18', 'XPERIA 10 PLUS'),
    ('522', '18', 'XPERIA 10'),
    ('523', '18', 'XPERIA Z5 COMPACT'),
    ('524', '18', 'XPERIA Z5 PREMIUM'),
    ('525', '18', 'XPERIA Z5'),
    ('526', '18', 'XPERIA Z3 (D6603)'),
    ('527', '18', 'XPERIA Z3'),
    ('528', '18', 'XPERIA Z2'),
    ('529', '18', 'XPERIA Z1 COMPACT (D5503)'),
    ('530', '18', 'XPERIA Z (C6603)'),
    ('531', '18', 'XPERIA X Z3 (H9436)'),
    ('532', '18', 'XPERIA X Z2 COMPACT'),
    ('533', '18', 'XPERIA X Z2 (H8216)'),
    ('534', '18', 'XPERIA X Z1 (G834X)'),
    ('535', '18', 'XPERIA X Z1 (C6903)'),
    ('536', '18', 'XPERIA X Z PRENIUM (G8141)'),
    ('537', '18', 'XPERIA X Z (F8331)'),
    ('538', '18', 'XPERIA X A2 PLUS'),
    ('539', '18', 'XPERIA X A2 ULTRA'),
    ('540', '18', 'XPERIA X A2'),
    ('541', '18', 'XPERIA X A1 ULTRA'),
    ('542', '18', 'XPERIA X A1'),
    ('543', '18', 'XPERIA X A'),
    ('544', '18', 'XPERIA X 10'),
    ('545', '18', 'XPERIA X ULTRA'),
    ('546', '18', 'XPERIA X PERFORMANCE'),
    ('547', '18', 'XPERIA X COMPACT (F5321)'),
    ('548', '18', 'XPERIA X (F5121)'),
    ('549', '18', 'XPERIA M5'),
    ('550', '18', 'XPERIA M4 AQUA'),
    ('551', '18', 'XPERIA M2'),
    ('552', '18', 'XPERIA L4'),
    ('553', '18', 'XPERIA L3'),
    ('554', '18', 'XPERIA L1'),
    ('555', '18', 'XPERIA E5'),
    ('556', '18', 'XPERIA E4G'),
    ('557', '18', 'XPERIA T3'),
    ('558', '18', 'XPERIA C4'),
    ('559', '19', 'CINK FIVE'),
    ('560', '19', 'CINK KING'),
    ('561', '19', 'DARKNIGHT'),
    ('562', '19', 'FEVER 4G'),
    ('563', '19', 'FREDDY'),
    ('564', '19', 'GOA'),
    ('565', '19', 'HARRY 2'),
    ('566', '19', 'HIGHWAY'),
    ('567', '19', 'JERRY 3'),
    ('568', '19', 'JERRY 2'),
    ('569', '19', 'JERRY'),
    ('570', '19', 'LENNY 5'),
    ('571', '19', 'LENNY 4 PLUS'),
    ('572', '19', 'LENNY 4'),
    ('573', '19', 'LENNY 3'),
    ('574', '19', 'LENNY 2'),
    ('575', '19', 'LENNY'),
    ('576', '19', 'PULP 4G'),
    ('577', '19', 'POWER U10'),
    ('578', '19', 'RAINBOW LITE 4G'),
    ('579', '19', 'RAINBOW LITE'),
    ('580', '19', 'RAINBOW JAM'),
    ('581', '19', 'RAINBOW'),
    ('582', '19', 'STAIRWAY'),
    ('583', '19', 'SUNNY 3'),
    ('584', '19', 'TOMMY 2'),
    ('585', '19', 'TOMMY'),
    ('586', '19', 'U FEEL PRIME'),
    ('587', '19', 'U FEEL LITE'),
    ('588', '19', 'U FEEL'),
    ('589', '19', 'UPULSE LITE'),
    ('590', '19', 'UPULSE'),
    ('591', '19', 'VIEW 5 PLUS'),
    ('592', '19', 'VIEW 4 LITE'),
    ('593', '19', 'VIEW 4'),
    ('594', '19', 'VIEW 3 LITE'),
    ('595', '19', 'VIEW 3'),
    ('596', '19', 'VIEW 2 PRO'),
    ('597', '19', 'VIEW 2 GO'),
    ('598', '19', 'VIEW 2'),
    ('599', '19', 'VIEW PRIME'),
    ('600', '19', 'VIEW LITE'),
    ('601', '19', 'VIEW GO'),
    ('602', '19', 'WIM LITE'),
    ('603', '19', 'WIM'),
    ('604', '19', 'Y80'),
    ('605', '19', 'Y61'),
    ('606', '19', 'Y60'),
    ('607', '19', 'Y51'),
    ('608', '19', 'Y50'),
    ('609', '19', 'POWER U20'),
    ('610', '19', 'POWER U30'),
    ('611', '19', 'Y81');