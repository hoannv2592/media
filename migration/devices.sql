/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : crm_wifimedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-05 13:19:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for devices
-- ----------------------------
DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `link_adv` varchar(250) DEFAULT NULL,
  `type_device` int(2) NOT NULL,
  `apt_key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id_campaign` int(12) DEFAULT NULL,
  `adgroup_id` int(12) DEFAULT NULL,
  `campaign_group_id` int(12) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `link_orig` varchar(255) DEFAULT NULL,
  `link_login` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `mac_esc` varchar(255) DEFAULT NULL,
  `slogan` text,
  `chap_id` varchar(255) DEFAULT NULL,
  `link_orig_esc` varchar(255) DEFAULT NULL,
  `chap_challenge` varchar(255) DEFAULT NULL,
  `error` varchar(255) DEFAULT NULL,
  `client_mac` text,
  `link_login_only` varchar(255) DEFAULT NULL,
  `message` text,
  `mac` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
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
  `address` text,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `path_logo` varchar(500) DEFAULT NULL,
  `image_logo` varchar(500) DEFAULT NULL,
  `title_connect` varchar(255) DEFAULT NULL,
  `hidden_connect` int(12) DEFAULT NULL,
  `tile_congratulations_return` varchar(500) DEFAULT NULL,
  `title_campaign` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devices` (`id`,`user_id`),
  KEY `device_id` (`id`),
  KEY `device` (`id`,`user_id`,`name`),
  KEY `apt_key` (`apt_key`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
