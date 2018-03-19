/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : crm_wifimedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-08 02:11:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for advs
-- ----------------------------
DROP TABLE IF EXISTS `advs`;
CREATE TABLE `advs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) DEFAULT NULL,
  `name` text,
  `active_flag` tinyint(1) DEFAULT NULL,
  `path` text,
  `url_link` varchar(255) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
