/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-10-10 13:00:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adgroups
-- ----------------------------
DROP TABLE IF EXISTS `adgroups`;
CREATE TABLE `adgroups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` text,
  `device_name` text,
  `device_id` text,
  `delete_flag` tinyint(2) NOT NULL,
  `image_backgroup` varchar(500) DEFAULT NULL,
  `tile_name` varchar(250) DEFAULT NULL,
  `langdingpage_id` tinyint(2) DEFAULT NULL,
  `description` text NOT NULL,
  `apt_device_number` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
