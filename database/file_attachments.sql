/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-09-26 17:58:58
*/

SET FOREIGN_KEY_CHECKS=0;

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
