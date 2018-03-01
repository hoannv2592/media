/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : crm_wifimedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-02 01:56:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `expired_date` varchar(250) DEFAULT NULL,
  `delete_flag` int(2) DEFAULT '0',
  `client_mac` text,
  `confirm` int(2) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
