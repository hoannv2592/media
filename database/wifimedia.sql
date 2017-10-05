/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-10-06 01:37:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adgroups
-- ----------------------------
DROP TABLE IF EXISTS `adgroups`;
CREATE TABLE `adgroups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` text,
  `delete_flag` tinyint(2) NOT NULL,
  `langdingpage_id` tinyint(2) DEFAULT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adgroups
-- ----------------------------

-- ----------------------------
-- Table structure for campaign_groups
-- ----------------------------
DROP TABLE IF EXISTS `campaign_groups`;
CREATE TABLE `campaign_groups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of campaign_groups
-- ----------------------------

-- ----------------------------
-- Table structure for devices
-- ----------------------------
DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `apt_key` varchar(255) NOT NULL,
  `client_mac` text,
  `auth_target` varchar(255) DEFAULT NULL,
  `user_id` int(12) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `langdingpage_id` int(2) DEFAULT NULL,
  `image_backgroup` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `tile_name` varchar(255) DEFAULT NULL,
  `flag_check` tinyint(1) DEFAULT NULL,
  `splashcheck` tinyint(1) DEFAULT NULL,
  `num_clients` text,
  `uptime` varchar(255) DEFAULT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `apt_device_number` varchar(100) DEFAULT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devices` (`id`,`user_id`),
  KEY `device_id` (`id`),
  KEY `device` (`id`,`user_id`,`name`),
  KEY `apt_key` (`apt_key`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of devices
-- ----------------------------
INSERT INTO `devices` VALUES ('2', 'Thiết bị_3', 'C025E9C18E3A', '70:1a:04:64:98:9e', 'http://192.168.5.1:2050/nodogsplash_auth/?redir=http%3A%2F%2Fgoogle.com.vn&tok=83c2ee78', '3', null, null, null, '0', null, null, '1', '5', '0d 22h 25m 34s', 'GATEWAY', '45122998', '0', '2017-10-06 00:01:38', '2017-10-06 00:30:20');

-- ----------------------------
-- Table structure for file_attachments
-- ----------------------------
DROP TABLE IF EXISTS `file_attachments`;
CREATE TABLE `file_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `langdingpage_id` int(12) DEFAULT NULL,
  `device_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of file_attachments
-- ----------------------------

-- ----------------------------
-- Table structure for landingpages
-- ----------------------------
DROP TABLE IF EXISTS `landingpages`;
CREATE TABLE `landingpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'style of langding page',
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `delete_flag` tinyint(4) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landingpages
-- ----------------------------
INSERT INTO `landingpages` VALUES ('1', 'Quảng cáo lấy thông tin khách hàng', '0', 'Quảng cáo lấy thông tin khách hàng\r\nQuảng cáo lấy thông tin khách hàng', '2017-09-27 02:53:04', '0000-00-00 00:00:00');
INSERT INTO `landingpages` VALUES ('2', 'Quảng cáo Facebook-Login', '0', 'Quảng cáo Facebook-Login\r\nQuảng cáo Facebook-Login', '2017-09-27 02:53:46', '0000-00-00 00:00:00');
INSERT INTO `landingpages` VALUES ('3', 'Quảng cáo với password', '0', 'Quảng cáo với password\r\nQuảng cáo với password', '2017-09-27 02:55:31', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `device_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(12) NOT NULL,
  `device_id` int(12) DEFAULT NULL,
  `client_mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_clients_connect` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('1', '2', '70:1a:04:64:98:9e', 'http://192.168.5.1:2050/nodogsplash_auth/?redir=http%3A%2F%2Fgoogle.com.vn&tok=83c2ee78', '1', '2017-10-06 01:10:53', '2017-10-06 01:10:56');

-- ----------------------------
-- Table structure for service_groups
-- ----------------------------
DROP TABLE IF EXISTS `service_groups`;
CREATE TABLE `service_groups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_groups
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'table for users',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 DEFAULT '',
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(2) NOT NULL,
  `landingpage_id` int(12) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`id`),
  KEY `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@wifimedia.com', '$2y$10$7SfxV0nKbnum7Ajrw9gwe.nx17A5Qx1lQIP11/N60ZuXiEQKJjjZq', '0', '0985644301', 'HA NOI', '1', null, '2017-09-29 02:21:42', '2017-09-29 02:21:42');
INSERT INTO `users` VALUES ('2', 'demo_2', 'demo_2@wifimedia.com', '$2y$10$JMQYKN6tgaOU9IuhTQ9JpuoJ2MUkyUWvLSLkkYrWOd6FsiX.zSA4G', '1', '', null, '2', null, '2017-09-29 02:50:37', '2017-10-05 17:42:10');
INSERT INTO `users` VALUES ('3', 'demo_3', 'demo_3@wifimedia.com', '$2y$10$znMyHflax8gD5ILN9JOXG.auqrlnvNl.s5M1rZJ8hVJ2yGzhRjBYe', '0', '', null, '2', null, '2017-09-29 05:14:56', '2017-09-29 05:14:56');
INSERT INTO `users` VALUES ('4', 'demo_4', 'demo_4@wifimedia.com', '$2y$10$.isGFMjcuaJ6XsZUfcEzOe4Rdk35a2ekxAoDMRN4HiAPZwNbBE.O2', '1', '', null, '2', null, '2017-10-03 16:59:36', '2017-10-05 17:42:06');
INSERT INTO `users` VALUES ('5', 'demo_5', 'demo_5@wifimedia.com', '$2y$10$SAaBVtHy4JAhZuORyWOD6O8428lx7xQnsufJ2tzAl017sdxATTfHu', '1', '', null, '2', null, '2017-10-04 19:08:17', '2017-10-05 17:42:03');
SET FOREIGN_KEY_CHECKS=1;
