/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-10-10 13:01:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `birthday` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_id` int(12) DEFAULT NULL,
  `client_mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apt_device_pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(2) DEFAULT NULL,
  `num_clients_connect` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
SET FOREIGN_KEY_CHECKS=1;
