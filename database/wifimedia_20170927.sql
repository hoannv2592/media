/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-09-27 10:10:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adgroups
-- ----------------------------
DROP TABLE IF EXISTS `adgroups`;
CREATE TABLE `adgroups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
  `status` tinyint(1) NOT NULL,
  `user_id` int(12) NOT NULL,
  `langdingpage_id` int(2) DEFAULT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devices` (`id`,`user_id`),
  KEY `device_id` (`id`),
  KEY `device` (`id`,`user_id`,`name`),
  KEY `apt_key` (`apt_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of devices
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@wifimedia.com', '$2y$10$YM9H9SQw1WkpfrSw/qCWzOIvTOppGkHUccFIF.yYz2H7UjsWK.j3u', '0', '0989123456', 'HA NOI', '1', null, '2017-09-27 02:48:00', '2017-09-27 02:48:00');
SET FOREIGN_KEY_CHECKS=1;
