/*
Navicat MySQL Data Transfer

Source Server         : XAMPP
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : car_basic

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-27 15:23:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(255) NOT NULL COMMENT 'ยี่ห้อรถ',
  `car_size` varchar(20) DEFAULT NULL COMMENT 'ขนาด',
  `car_seate` varchar(20) DEFAULT NULL COMMENT 'จำนวนที่นั่ง',
  `car_description` text COMMENT 'รายละเอียด',
  `car_img` varchar(150) DEFAULT NULL COMMENT 'รูปรถยนต์',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='ห้องประชุม';

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', 'TOYOTA', 'อบ-XXXX', '5', 'xxx', 'd6e961bd2636640cd6e62eb84ba5d5e5.jpg');
INSERT INTO `car` VALUES ('2', 'toyota vigo 4 ประตู', 'อบ-XXXX', '5', 'toyota vigo 4 ประตู', '3722931fcf5208505d5a8968103f0a07.jpg');
INSERT INTO `car` VALUES ('3', 'toyota commuter', 'อบ-XXXX', '15', 'toyota commuter', '83a4bc71e2006d679459780256018a6c.jpg');

-- ----------------------------
-- Table structure for car_status
-- ----------------------------
DROP TABLE IF EXISTS `car_status`;
CREATE TABLE `car_status` (
  `car_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_status_name` varchar(150) NOT NULL COMMENT 'สถานะ',
  `car_statust_color` varchar(45) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`car_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='สถานะการจอง';

-- ----------------------------
-- Records of car_status
-- ----------------------------
INSERT INTO `car_status` VALUES ('1', 'เดินทาง', '#6d9eeb');
INSERT INTO `car_status` VALUES ('2', 'กลับมาแล้ว', '#1ebf00');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `departments_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(45) NOT NULL COMMENT 'หน่วยงาน',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`departments_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', 'แผนกที่1', '#ff0000');
INSERT INTO `departments` VALUES ('2', 'แผนกที2', '#6aa84f');
INSERT INTO `departments` VALUES ('3', 'แผนกที่3', '#ffd966');
INSERT INTO `departments` VALUES ('4', 'แผนกที่4', '#ff00ff');
INSERT INTO `departments` VALUES ('5', 'แผนกที่5', '#9900ff');
INSERT INTO `departments` VALUES ('6', 'แผนกที่6', '#0000ff');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1567478767');
INSERT INTO `migration` VALUES ('m140209_132017_init', '1567478772');
INSERT INTO `migration` VALUES ('m140403_174025_create_account_table', '1567478772');
INSERT INTO `migration` VALUES ('m140504_113157_update_tables', '1567478773');
INSERT INTO `migration` VALUES ('m140504_130429_create_token_table', '1567478774');
INSERT INTO `migration` VALUES ('m140830_171933_fix_ip_field', '1567478775');
INSERT INTO `migration` VALUES ('m140830_172703_change_account_table_name', '1567478775');
INSERT INTO `migration` VALUES ('m141222_110026_update_ip_field', '1567478775');
INSERT INTO `migration` VALUES ('m141222_135246_alter_username_length', '1567478775');
INSERT INTO `migration` VALUES ('m150614_103145_update_social_account_table', '1567478776');
INSERT INTO `migration` VALUES ('m150623_212711_fix_username_notnull', '1567478776');
INSERT INTO `migration` VALUES ('m151218_234654_add_timezone_to_profile', '1567478776');
INSERT INTO `migration` VALUES ('m160929_103127_add_last_login_at_to_user_table', '1567478776');

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_img` varchar(150) DEFAULT NULL COMMENT 'รูป พขร.',
  `person_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ,สกุล',
  `tel` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทร',
  `code` varchar(50) DEFAULT NULL COMMENT 'วิทยุสื่อสาร',
  `queue` enum('คิวที่ 10','คิวที่ 9','คิวที่ 8','คิวที่ 7','คิวที่ 6','คิวที่ 5','คิวที่ 4','คิวที่ 3','คิวที่ 2','คิวที่ 1') DEFAULT 'คิวที่ 1' COMMENT 'คิว REFER',
  `person_status` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `start` datetime DEFAULT NULL COMMENT 'เวลาไป',
  `end` datetime DEFAULT NULL COMMENT 'เวลากลับ',
  PRIMARY KEY (`user_id`),
  KEY `fk_person_personst1_idx` (`person_status`) USING BTREE,
  CONSTRAINT `person_ibfk_1` FOREIGN KEY (`person_status`) REFERENCES `person_status` (`person_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', '47dd981db68353f2d4f588b295ac0984.png', 'พนักงานขับรถยนต์ 1', '0801234567', 'ว.1234', 'คิวที่ 6', '4', '2019-09-19 15:55:00', '2019-09-19 17:55:00');
INSERT INTO `person` VALUES ('2', '4b12cb4971f938a146fa7696300df15e.png', 'พนักงานขับรถยนต์ 2', '0801234567', 'ว.1234', 'คิวที่ 2', '2', null, null);
INSERT INTO `person` VALUES ('3', 'c5c5a6aad9cc9a5445252495426b1b06.png', 'พนักงานขับรถยนต์ 3', '0801234567', 'ว.1234', 'คิวที่ 3', '3', null, null);
INSERT INTO `person` VALUES ('4', 'bd7232d6387805c01d98dfb080debc8a.png', 'พนักงานขับรถยนต์ 4', '0801234567', 'ว.1234', 'คิวที่ 4', '4', null, null);

-- ----------------------------
-- Table structure for person_status
-- ----------------------------
DROP TABLE IF EXISTS `person_status`;
CREATE TABLE `person_status` (
  `person_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_status_name` varchar(150) NOT NULL COMMENT 'สถานะ',
  `person_statust_color` varchar(45) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`person_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='สถานะการจอง';

-- ----------------------------
-- Records of person_status
-- ----------------------------
INSERT INTO `person_status` VALUES ('1', 'REFER รพ.สรรพสิทธิประสงค์', '#6d9eeb');
INSERT INTO `person_status` VALUES ('2', 'REFER รพ.สมเด็จพระยุพราชเดชอุดม', '#ff9900');
INSERT INTO `person_status` VALUES ('3', 'REFER รพ.ศรีมหาโพธิ', '#ff00ff');
INSERT INTO `person_status` VALUES ('4', 'STAND BY', '#117d09');
INSERT INTO `person_status` VALUES ('5', 'ออกหน่วย', '#a61c00');
INSERT INTO `person_status` VALUES ('6', 'ประชุม', '#6aa84f');

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('4', 'นรินทร์ จุลทัศน์', 'chulatatnarin@gmail.com', 'chulatatnarin@gmail.com', '678d2e240fa3f326524f38859770f0f5', 'อำเภอน้ำยืน', 'http://namyuenhosp.in.th', '', 'Asia/Bangkok');

-- ----------------------------
-- Table structure for rental
-- ----------------------------
DROP TABLE IF EXISTS `rental`;
CREATE TABLE `rental` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_room` int(11) NOT NULL COMMENT 'รถยนต์',
  `car_start` datetime DEFAULT NULL,
  `car_end` datetime DEFAULT NULL,
  `car_usefor` int(11) NOT NULL COMMENT 'ลักษณะการใช้งาน',
  `departments_id` int(11) NOT NULL COMMENT 'หน่วยงานที่ขอ',
  `car_user` int(11) NOT NULL COMMENT 'ชื่อพนักงานขับรถ',
  `car_tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์ติดต่อ',
  `car_title` varchar(255) NOT NULL COMMENT 'หัวข้อ',
  `car_description` text COMMENT 'รายละเอียด',
  `car_seate` int(10) DEFAULT NULL COMMENT 'จำนวนผู้เข้าร่วม',
  `car_cur_date` varchar(45) NOT NULL COMMENT 'วันที่บันทึก',
  `file` varchar(150) DEFAULT NULL COMMENT 'ไฟล์เอกสาร',
  `car_status` int(11) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`car_id`),
  KEY `fk_car_room1_idx` (`car_room`) USING BTREE,
  KEY `fk_car_carst1_idx` (`car_status`) USING BTREE,
  KEY `fk_car_usefor1_idx` (`car_usefor`) USING BTREE,
  KEY `fk_car_departments1_idx` (`departments_id`) USING BTREE,
  KEY `fk_car_user1_idx` (`car_user`) USING BTREE,
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`car_status`) REFERENCES `car_status` (`car_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `car_ibfk_4` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`departments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `car_ibfk_6` FOREIGN KEY (`car_room`) REFERENCES `car` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `car_ibfk_7` FOREIGN KEY (`car_usefor`) REFERENCES `usefor` (`usefor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `car_ibfk_9` FOREIGN KEY (`car_user`) REFERENCES `person` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='การจอง';

-- ----------------------------
-- Records of rental
-- ----------------------------
INSERT INTO `rental` VALUES ('4', '1', '2019-08-27 07:00:00', '2019-08-27 16:00:00', '1', '1', '1', '080-1234567', 'ประชุม สสจ.', 'ประชุม สสจ.', '4', '2019-08-26', '7b4d8cb22f7a36edd3f246c0bb2560f8.pdf', '1');
INSERT INTO `rental` VALUES ('5', '2', '2019-08-27 08:00:00', '2019-08-27 12:00:00', '4', '2', '2', '080-1234567', 'ออกหน่วย รพ.สต.', 'ออกหน่วย รพ.สต.', '4', '2019-08-26', '', '1');
INSERT INTO `rental` VALUES ('6', '3', '2019-08-27 07:00:00', '2019-08-28 16:00:00', '1', '3', '3', '080-1234567', 'ประชุม สสจ.', 'ประชุม สสจ.', '15', '2019-08-26', '', '1');
INSERT INTO `rental` VALUES ('7', '2', '2019-09-04 07:00:00', '2019-09-04 16:00:00', '1', '4', '2', '080-1234567', 'ประชุม สสจ.', 'ประชุม สสจ.', '4', '2019-09-03', '', '1');

-- ----------------------------
-- Table structure for social_account
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of social_account
-- ----------------------------

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of token
-- ----------------------------

-- ----------------------------
-- Table structure for usefor
-- ----------------------------
DROP TABLE IF EXISTS `usefor`;
CREATE TABLE `usefor` (
  `usefor_id` int(11) NOT NULL AUTO_INCREMENT,
  `usefor_name` varchar(255) NOT NULL COMMENT 'ลักษณะการใช้งาน',
  PRIMARY KEY (`usefor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='ลักษณะการใช้งาน';

-- ----------------------------
-- Records of usefor
-- ----------------------------
INSERT INTO `usefor` VALUES ('1', 'ประชุม');
INSERT INTO `usefor` VALUES ('2', 'อบรม');
INSERT INTO `usefor` VALUES ('3', 'Refer');
INSERT INTO `usefor` VALUES ('4', 'ออกหน่วย');
INSERT INTO `usefor` VALUES ('5', 'อื่นๆ');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'admin', 'chulatatnarin@gmail.com', '$2y$12$oj8vVyxG9ZVkW6cUbdo30.eMHd6VjhZJU.B4lPDXFgcPDLIDNJGfS', 'CB5-M7FnwYRUncdj6CCMXXG7_M_u8VEN', '1567479774', null, null, '::1', '1567479560', '1567479560', '0', '1569462124');
