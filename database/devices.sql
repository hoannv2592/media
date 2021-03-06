/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-10-10 13:00:12
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `path` text,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
