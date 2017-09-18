/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-19 03:23:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adgroups
-- ----------------------------
DROP TABLE IF EXISTS `adgroups`;
CREATE TABLE `adgroups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `langdingpage_id` int(12) DEFAULT NULL,
  `user_id` text,
  `delete_flag` tinyint(2) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adgroups
-- ----------------------------
INSERT INTO `adgroups` VALUES ('1', 'Warisに登録いただくと、お仕事の検索、応募やお問合せ、Wairsに登録されている企業を閲覧することができます。', null, null, '1', 'Nhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\n', '2017-08-30 16:18:19', '2017-09-01 11:57:51');
INSERT INTO `adgroups` VALUES ('2', 'Nhom so 2', null, null, '1', 'Tên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo', '2017-08-30 16:22:01', '2017-09-05 16:42:57');
INSERT INTO `adgroups` VALUES ('3', 'Nhom so 3', null, null, '1', 'Mô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo', '2017-08-30 16:25:30', '2017-09-05 16:43:10');
INSERT INTO `adgroups` VALUES ('4', '営業進捗一覧', null, null, '1', '営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧', '2017-08-30 17:24:59', '2017-09-05 16:42:03');
INSERT INTO `adgroups` VALUES ('5', 'Nhom so 1', null, null, '1', 'qw', '2017-09-04 17:08:48', '2017-09-05 16:42:42');
INSERT INTO `adgroups` VALUES ('6', 'Nhom so 2', null, null, '1', 'asdasd', '2017-09-04 18:32:53', '2017-09-05 16:42:49');
INSERT INTO `adgroups` VALUES ('7', 'Nhom so 1', null, null, '1', 'SAAS', '2017-09-04 18:33:37', '2017-09-05 16:42:36');
INSERT INTO `adgroups` VALUES ('8', 'Nhom so 1', null, null, '1', 'sad', '2017-09-04 18:38:58', '2017-09-05 16:42:30');
INSERT INTO `adgroups` VALUES ('9', 'Nhom so 3', null, null, '1', 'dasdas', '2017-09-04 18:44:59', '2017-09-05 16:43:03');
INSERT INTO `adgroups` VALUES ('10', 'Nhóm quảng cáo 1', null, null, '1', 'Nhóm quảng cáo 1\r\nNhóm quảng cáo 1', '2017-09-04 18:49:15', '2017-09-18 20:21:09');
INSERT INTO `adgroups` VALUES ('11', 'Nhóm quảng cáo 2', null, null, '0', 'Nhóm quảng cáo 2\r\nNhóm quảng cáo 2', '2017-09-04 18:49:43', '2017-09-05 16:42:22');
INSERT INTO `adgroups` VALUES ('12', 'Nhóm quảng cáo 3', null, null, '0', 'Nhóm quảng cáo 3\r\nNhóm quảng cáo 3', '2017-09-05 16:43:40', '2017-09-05 16:43:40');
INSERT INTO `adgroups` VALUES ('13', 'Nhóm quảng cáo 4', null, null, '0', 'Nhóm quảng cáo 4\r\nNhóm quảng cáo 4', '2017-09-05 16:44:03', '2017-09-05 16:44:03');
INSERT INTO `adgroups` VALUES ('14', 'asd', null, '[\"110\",\"108\",\"106\"]', '0', 'ads', '2017-09-18 18:29:43', '2017-09-18 18:29:43');
INSERT INTO `adgroups` VALUES ('15', 'dds', null, '{\"104\":\"C\\u0103ng tin Th\\u0103ng Long\",\"105\":\"C\\u0103ng tin Ph\\u01b0\\u01a1ng \\u0110\\u00f4ng\",\"106\":\"\\u0110\\u1ea1i H\\u1ecdc T\\u1ef1 Nhi\\u00ean\",\"107\":\"\\u0110\\u1ea1i H\\u1ecdc Nh\\u00e2n V\\u0103n\",\"109\":\"Nh\\u00e0 \\u0102n B\\u1ec7nh Vi\\u1ec7n \\u0110H Y\",\"111\":\"C\\u0103ng Tin DH C\\u00f4ng \\u0110o\\u00e0n\"}', '0', 'sd', '2017-09-18 19:02:17', '2017-09-18 19:02:17');
INSERT INTO `adgroups` VALUES ('16', 'asddd', null, '{\"107\":\"\\u0110\\u1ea1i H\\u1ecdc Nh\\u00e2n V\\u0103n\",\"109\":\"Nh\\u00e0 \\u0102n B\\u1ec7nh Vi\\u1ec7n \\u0110H Y\",\"110\":\"HUC Book Shop\",\"111\":\"C\\u0103ng Tin DH C\\u00f4ng \\u0110o\\u00e0n\"}', '0', 'asdasd', '2017-09-18 19:20:40', '2017-09-18 19:20:40');
INSERT INTO `adgroups` VALUES ('17', 'ÂSAS', '1', '{\"106\":\"\\u0110\\u1ea1i H\\u1ecdc T\\u1ef1 Nhi\\u00ean\",\"108\":\"Cafe \\u0110\\u1ea1i H\\u1ecdc Y H\\u00e0 N\\u1ed9i\",\"109\":\"Nh\\u00e0 \\u0102n B\\u1ec7nh Vi\\u1ec7n \\u0110H Y\",\"110\":\"HUC Book Shop\",\"111\":\"C\\u0103ng Tin DH C\\u00f4ng \\u0110o\\u00e0n\",\"112\":\"\\u0110H M\\u1ef9 Thu\\u1eadt C\\u00f4ng Nghi\\u1ec7p\"}', '1', 'Áá', '2017-09-18 19:22:17', '2017-09-18 20:20:35');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'table for admin',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admins
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
INSERT INTO `campaign_groups` VALUES ('1', 'Chiến dịch số 1', 'sdfsdfsd', '01/09/2017', '08/09/2017', '2017-09-01 11:29:26', '2017-09-01 11:58:27', '1');
INSERT INTO `campaign_groups` VALUES ('2', 'Chiến dịch số 1', 'Chiến dịch số 1\r\nChiến dịch số 1\r\nChiến dịch số 1\r\nChiến dịch số 1\r\nChiến dịch số 1\r\nChiến dịch số 1', '05/09/2017', '08/09/2017', '2017-09-04 17:21:10', '2017-09-04 17:21:10', '0');
INSERT INTO `campaign_groups` VALUES ('3', 'Chiến dịch số 2', 'Chiến dịch số 2\r\nChiến dịch số 2\r\nChiến dịch số 2\r\nChiến dịch số 2\r\nChiến dịch số 2', '03/09/2017', '06/09/2017', '2017-09-04 17:21:37', '2017-09-04 17:21:37', '0');
INSERT INTO `campaign_groups` VALUES ('4', 'sd', 'asd', 'asd', 'asd', '2017-09-06 04:11:26', '2017-09-06 04:11:26', '0');

-- ----------------------------
-- Table structure for devices
-- ----------------------------
DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `apt_key` varchar(255) NOT NULL,
  `langdingpage_id` int(12) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(12) NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devices` (`id`,`user_id`),
  KEY `device_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of devices
-- ----------------------------
INSERT INTO `devices` VALUES ('9', 'XH07MSeCsB12:20:10', 'XH07MSeCsB12:20:10', null, '0', '9', '0', '2017-09-11 03:32:12', '2017-09-11 03:32:12');
INSERT INTO `devices` VALUES ('10', 'demooto@quangcaowifi.vn', 't7T7X3ZpZu09:26:10', null, '0', '9', '0', '2017-09-11 03:33:23', '2017-09-11 03:33:23');
INSERT INTO `devices` VALUES ('11', 'quechoa@wifimedia.com.vn', '5MfTggeH5p09:09:35', null, '0', '9', '0', '2017-09-11 03:33:41', '2017-09-11 03:33:41');
INSERT INTO `devices` VALUES ('12', 'ncptankyna@gmail.com', 'X9b3yGRnSx21:36:39', null, '0', '9', '0', '2017-09-11 03:34:03', '2017-09-11 03:34:03');
INSERT INTO `devices` VALUES ('13', 'lamdep@quangcaowifi.vn', 'ODR8lq05sK21:40:53', '1', '1', '23', '0', '2017-09-11 03:34:19', '2017-09-18 14:58:30');
INSERT INTO `devices` VALUES ('14', 'ildivo@gmail.com', 'Ryj0FaSpM509:46:23', '3', '1', '24', '1', '2017-09-11 03:34:34', '2017-09-18 17:10:15');
INSERT INTO `devices` VALUES ('15', 'nhahangthuonghai@gmail.com', 'WwQOKlDmmc13:41:38', '2', '1', '108', '0', '2017-09-11 03:34:55', '2017-09-18 14:58:55');
INSERT INTO `devices` VALUES ('16', 'phongtra@quangcaowifi.vn', 'BZkD0C2nTV09:10:18', '2', '1', '27', '0', '2017-09-11 03:35:10', '2017-09-18 14:59:17');
INSERT INTO `devices` VALUES ('17', 'zzzzzz', 'mk77QbfJ2T16:25:35', '1', '1', '0', '0', '2017-09-11 03:35:30', '2017-09-18 20:19:01');
INSERT INTO `devices` VALUES ('18', 'namviet@quangcaowifi.vn', 'PcVzARKslJ13:54:51', null, '0', '49', '1', '2017-09-11 03:35:54', '2017-09-16 11:16:17');
INSERT INTO `devices` VALUES ('19', 'info@quangcaowifi.vn', 'hAUWX2dp2U14:29:19', '3', '1', '18', '0', '2017-09-11 03:36:15', '2017-09-18 14:58:16');
INSERT INTO `devices` VALUES ('20', 'Thiết bị_0', '8WfrCSnse5', null, '0', '1', '1', '2017-09-14 09:32:39', '2017-09-14 10:03:16');
INSERT INTO `devices` VALUES ('21', 'Thiết bị_1', 'XH07MSeCsB12:20:10', null, '0', '2', '1', '2017-09-14 09:32:39', '2017-09-14 10:03:35');
INSERT INTO `devices` VALUES ('22', 'Thiết bị_2', 'oVQNu6GTY012:21:35', null, '0', '3', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('23', 'Thiết bị_3', 'E6x0y2LzOZ12:23:04', null, '0', '4', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('24', 'Thiết bị_4', 'nCfws3k2JI20:41:58', null, '0', '5', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('25', 'Thiết bị_5', 'JVgT0AvU9310:58:30', null, '0', '6', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('26', 'Thiết bị_6', 't7T7X3ZpZu09:26:10', null, '0', '7', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('27', 'Thiết bị_7', '5MfTggeH5p09:09:35', null, '0', '8', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('28', 'Thiết bị_8', 'X9b3yGRnSx21:36:39', null, '0', '18', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('29', 'Thiết bị_9', '3d6stXVOz509:44:00', null, '0', '19', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('30', 'Thiết bị_10', 'ZSE6MxHWJB21:17:29', null, '0', '20', '1', '2017-09-14 09:32:39', '2017-09-14 10:03:43');
INSERT INTO `devices` VALUES ('31', 'Thiết bị_11', 'mk77QbfJ2T16:25:35', null, '0', '21', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('32', 'Thiết bị_12', 'Ryj0FaSpM509:46:23', null, '0', '22', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('33', 'Thiết bị_13', 'Darie4xF6L08:49:38', null, '0', '23', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('34', 'Thiết bị_14', 'ODR8lq05sK21:40:53', null, '0', '24', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('35', 'Thiết bị_15', 'SKOfToZJvk10:19:37', null, '0', '25', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('36', 'Thiết bị_16', 'mW8trSAWDE10:21:34', null, '0', '26', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('37', 'Thiết bị_17', 'HFD94p9U2G13:42:15', '2', '1', '27', '0', '2017-09-14 09:32:39', '2017-09-18 16:25:50');
INSERT INTO `devices` VALUES ('38', 'Thiết bị_18', 'Z5c1YC8Op000:11:15', null, '0', '28', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('39', 'Thiết bị_19', 'pG65TkBRil12:15:25', null, '0', '29', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('40', 'Thiết bị_20', 'WwQOKlDmmc13:41:38', null, '0', '30', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('41', 'Thiết bị_21', 'zXcSl2nXyG22:46:55', null, '0', '31', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('42', 'Thiết bị_22', 'UWtIMb98qI14:19:26', null, '0', '32', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('43', 'Thiết bị_23', 'fGsgV6vYL014:28:46', null, '0', '33', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('44', 'Thiết bị_24', 'PcVzARKslJ13:54:51', null, '0', '34', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('45', 'Thiết bị_25', 'Th9w6T9vz310:43:21', null, '0', '35', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('46', 'Thiết bị_26', 'oZVGtxRaXx09:37:49', null, '0', '36', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('47', 'Thiết bị_27', 'iNgR3jJiaK11:52:17', null, '0', '37', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('48', 'Thiết bị_28', '2Z7krngCUH11:55:33', null, '0', '38', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('49', 'Thiết bị_29', 'GCbwEu1FCf09:00:07', null, '0', '39', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('50', 'Thiết bị_30', 'BZkD0C2nTV09:10:18', null, '0', '40', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('51', 'Thiết bị_31', 'hAUWX2dp2U14:29:19', null, '0', '41', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('52', 'Thiết bị_32', 'halAufQSe609:22:35', null, '0', '42', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('53', 'Thiết bị_33', 'Ul07E7jeqB09:29:10', null, '0', '43', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('54', 'Thiết bị_34', 'fL2MkYpxUb08:46:29', null, '0', '44', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('55', 'Thiết bị_35', 'TT5bZ4VPm914:04:11', null, '0', '45', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('56', 'Thiết bị_36', 'Ymp1pfL1yV16:01:58', null, '0', '46', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('57', 'Thiết bị_37', 'gVMIq8Ue4o14:41:10', null, '0', '47', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('58', 'Thiết bị_38', 'jHNoHHntLs08:52:58', null, '0', '48', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('59', 'Thiết bị_39', '2h7JKNPpqK08:54:11', null, '0', '49', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('60', 'Thiết bị_40', 'k3cZ4f0sOJ08:56:31', null, '0', '50', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('61', 'Thiết bị_41', 'V3QpqemZLB08:45:02', null, '0', '51', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('62', 'Thiết bị_42', 'Lh6mibHtu214:32:14', null, '0', '52', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('63', 'Thiết bị_43', 'yd9dIjIhoM14:35:04', null, '0', '53', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('64', 'Thiết bị_44', '9JGEeOAZ6B14:34:03', null, '0', '54', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('65', 'Thiết bị_45', 'shte0CRfqn14:37:18', null, '0', '55', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('66', 'Thiết bị_46', 'sB1JbTAvXy09:02:14', null, '0', '56', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('67', 'Thiết bị_47', 'UPwQVGjYv709:36:36', null, '0', '57', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('68', 'Thiết bị_48', 'ptYq9NZ6tg08:42:42', null, '0', '58', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('69', 'Thiết bị_49', 'Rou5CovxYZ09:18:58', null, '0', '59', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('70', 'Thiết bị_50', 'Lina4vPuB008:38:53', null, '0', '60', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('71', 'Thiết bị_51', 'hpSwrkBKaD10:25:46', null, '0', '61', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('72', 'Thiết bị_52', '7cYBRTkDnj09:12:42', null, '0', '62', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('73', 'Thiết bị_53', 'CMFaOFMaNE09:16:01', null, '0', '63', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('74', 'Thiết bị_54', 'W9J1nIGptw09:19:59', null, '0', '64', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('75', 'Thiết bị_55', 'nYu8IgvGja15:09:31', null, '0', '65', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('76', 'Thiết bị_56', 'kKJ7y5110g15:14:08', null, '0', '66', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('77', 'Thiết bị_57', 'BwCXOMs54f08:48:49', null, '0', '67', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('78', 'Thiết bị_58', 'uVRqwjYWCE09:36:19', null, '0', '68', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('79', 'Thiết bị_59', 'z9jdsTYXw109:36:55', null, '0', '69', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('80', 'Thiết bị_60', 'o2imPYbWG809:37:39', null, '0', '70', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('81', 'Thiết bị_61', '8F7CZlwKsJ23:34:59', null, '0', '71', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('82', 'Thiết bị_62', 'ctW8VJN3Xf23:46:23', null, '0', '72', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('83', 'Thiết bị_63', 'tsgwOtmKB908:50:28', null, '0', '73', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('84', 'Thiết bị_64', 'JO16jwleaA08:52:16', null, '0', '74', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('85', 'Thiết bị_65', 'tA06LFWLNb14:02:05', null, '0', '75', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('86', 'Thiết bị_66', 'WCpy3qLEwN09:09:44', null, '0', '76', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('87', 'Thiết bị_67', 'bsby647pI009:51:38', null, '0', '77', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('88', 'Thiết bị_68', 'ZTqnV2zXKa09:02:51', null, '0', '78', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('89', 'Thiết bị_69', '6ctQUAPrtp08:43:06', null, '0', '79', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('90', 'Thiết bị_70', 'GcX85D9BLr14:01:43', null, '0', '80', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('91', 'Thiết bị_71', 'nHDXJTQwqA14:03:48', null, '0', '81', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('92', 'Thiết bị_72', 'SYwMaQUDY514:16:39', null, '0', '82', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('93', 'Thiết bị_73', 'gY0z9yTMqU14:18:20', null, '0', '83', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('94', 'Thiết bị_74', 'j2RjEJV2MQ14:05:31', null, '0', '84', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('95', 'Thiết bị_75', 'WpEVrQv5cE08:45:14', null, '0', '85', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('96', 'Thiết bị_76', 'IMUFZUC51b11:51:18', null, '0', '86', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('97', 'Thiết bị_77', 'zxozT11GCI13:58:37', null, '0', '87', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('98', 'Thiết bị_78', 'rISWtT8JhF09:07:33', null, '0', '88', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('99', 'Thiết bị_79', 'ttlUo9p3KV14:03:42', null, '0', '89', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('100', 'Thiết bị_80', 'yoZrdwt52317:35:03', null, '0', '90', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('101', 'Thiết bị_81', 'v7PO652n8x11:04:22', null, '0', '91', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('102', 'Thiết bị_82', '3WNj5sIqyJ14:33:29', null, '0', '92', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('103', 'Thiết bị_83', '0EPl3O6vlP08:42:07', null, '0', '93', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('104', 'Thiết bị_84', 'b7YPgoaksG08:45:46', null, '0', '94', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('105', 'Thiết bị_85', 'iCEvfDYuZt08:48:44', null, '0', '110', '0', '2017-09-14 09:32:39', '2017-09-14 10:34:30');
INSERT INTO `devices` VALUES ('106', 'Thiết bị_86', '82y0ONbf1y09:14:06', null, '0', '96', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('107', 'Thiết bị_87', 'nxP9NvZ7eU09:18:04', null, '0', '97', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('108', 'Thiết bị_88', 'nryK3QLeSD09:59:20', null, '0', '98', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('109', 'Thiết bị_89', 'q3FLueFDPK10:12:42', null, '0', '99', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('110', 'Thiết bị_90', 'eutp4C8uES10:22:20', null, '0', '100', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('111', 'Thiết bị_91', 'Pp8dQk563l10:29:18', null, '0', '101', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('112', 'Thiết bị_92', 'VHpmaH6dIh10:37:39', null, '0', '102', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('113', 'Thiết bị_93', 'bvh3hRoALU10:38:36', null, '0', '103', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('114', 'Thiết bị_94', 'wNTl6MiyCY09:43:32', null, '0', '104', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('115', 'Thiết bị_95', 'ldCR2C0iZ615:12:24', null, '0', '105', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('116', 'Thiết bị_96', 'mjImbUL6Z315:24:19', null, '0', '106', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('117', 'Thiết bị_97', 'gfqljLXupZ21:52:47', null, '0', '107', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('118', 'Thiết bị_98', 'phr4rRGx9k17:44:22', null, '0', '108', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('119', 'Thiết bị_99', 'Z8ESILCngh17:51:35', null, '0', '109', '0', '2017-09-14 09:32:39', '2017-09-14 09:32:39');
INSERT INTO `devices` VALUES ('120', '', '', null, '0', '0', '0', '2017-09-14 10:00:45', '2017-09-14 10:00:45');
INSERT INTO `devices` VALUES ('121', '', '', null, '0', '0', '0', '2017-09-14 10:00:45', '2017-09-14 10:00:45');
INSERT INTO `devices` VALUES ('122', '', '', null, '0', '0', '0', '2017-09-14 10:00:45', '2017-09-14 10:00:45');
INSERT INTO `devices` VALUES ('123', '', '', null, '0', '0', '0', '2017-09-14 10:00:45', '2017-09-14 10:00:45');
INSERT INTO `devices` VALUES ('124', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('125', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('126', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('127', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('128', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('129', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('130', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('131', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('132', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('133', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('134', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('135', '', '', null, '0', '0', '0', '2017-09-14 10:00:46', '2017-09-14 10:00:46');
INSERT INTO `devices` VALUES ('136', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('137', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('138', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('139', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('140', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('141', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('142', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('143', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('144', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('145', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('146', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('147', '', '', null, '0', '0', '0', '2017-09-14 10:00:47', '2017-09-14 10:00:47');
INSERT INTO `devices` VALUES ('148', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('149', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('150', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('151', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('152', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('153', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('154', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('155', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('156', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('157', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('158', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('159', '', '', null, '0', '0', '0', '2017-09-14 10:00:48', '2017-09-14 10:00:48');
INSERT INTO `devices` VALUES ('160', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('161', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('162', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('163', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('164', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('165', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('166', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('167', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('168', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('169', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('170', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('171', '', '', null, '0', '0', '0', '2017-09-14 10:00:49', '2017-09-14 10:00:49');
INSERT INTO `devices` VALUES ('172', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('173', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('174', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('175', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('176', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('177', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('178', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('179', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('180', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('181', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('182', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('183', '', '', null, '0', '0', '0', '2017-09-14 10:00:50', '2017-09-14 10:00:50');
INSERT INTO `devices` VALUES ('184', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('185', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('186', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('187', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('188', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('189', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('190', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('191', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('192', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('193', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('194', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('195', '', '', null, '0', '0', '0', '2017-09-14 10:00:51', '2017-09-14 10:00:51');
INSERT INTO `devices` VALUES ('196', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('197', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('198', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('199', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('200', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('201', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('202', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('203', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('204', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('205', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('206', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('207', '', '', null, '0', '0', '0', '2017-09-14 10:00:52', '2017-09-14 10:00:52');
INSERT INTO `devices` VALUES ('208', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('209', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('210', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('211', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('212', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('213', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('214', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('215', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('216', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('217', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('218', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('219', '', '', null, '0', '0', '0', '2017-09-14 10:00:53', '2017-09-14 10:00:53');
INSERT INTO `devices` VALUES ('220', '', '', null, '0', '0', '0', '2017-09-14 10:00:54', '2017-09-14 10:00:54');
INSERT INTO `devices` VALUES ('221', '', '', null, '0', '0', '0', '2017-09-14 10:00:54', '2017-09-14 10:00:54');
INSERT INTO `devices` VALUES ('222', '', '', null, '0', '0', '0', '2017-09-14 10:00:54', '2017-09-14 10:00:54');
INSERT INTO `devices` VALUES ('223', '', '', null, '0', '0', '0', '2017-09-14 10:00:54', '2017-09-14 10:00:54');
INSERT INTO `devices` VALUES ('224', 'Thiết bị_100', 'WwQOKlDmmc13:41:38xx', '2', '1', '49', '0', '2017-09-27 11:15:29', '2017-09-18 15:25:21');
INSERT INTO `devices` VALUES ('225', 'Thiết bị_101', 'WwQOKlDmmc13:41:38', '3', '1', '49', '0', '2017-09-16 11:15:57', '2017-09-18 19:29:59');

-- ----------------------------
-- Table structure for fs_banners
-- ----------------------------
DROP TABLE IF EXISTS `fs_banners`;
CREATE TABLE `fs_banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `type` int(4) DEFAULT NULL COMMENT '0: images/flash; 1: content',
  `image` varchar(255) DEFAULT NULL,
  `flash` varchar(255) DEFAULT NULL,
  `content` text,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `edited_time` datetime DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `news_categories` varchar(255) DEFAULT NULL,
  `news_categories_alias` varchar(255) DEFAULT NULL,
  `products_categories` varchar(255) DEFAULT NULL,
  `products_categories_alias` varchar(255) DEFAULT NULL,
  `listItemid` varchar(255) DEFAULT NULL,
  `manufactories` varchar(255) DEFAULT NULL,
  `manufactories_alias` varchar(255) DEFAULT NULL,
  `contents_categories` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_banners
-- ----------------------------
INSERT INTO `fs_banners` VALUES ('109', '61', 'Banner 1', 'banner-1', '1', 'images/banners/original/2143513_1479891812.jpg', null, '', '0', '0', '', '0', '2016-11-23 10:03:32', '2016-12-26 19:33:24', '1', '2', '', null, '', ',cac-san-golf-o-mien-bac,cac-san-golf-o-mien-trung,cac-san-golf-o-mien-nam,', ',9,12,', '', null, '');
INSERT INTO `fs_banners` VALUES ('108', '60', 'Quảng  cáo ngoài trang chủ', 'quang--cao-ngoai-trang-chu', '1', 'images/banners/original/32564_1479781858.jpg', null, '', '0', '0', '', '0', '2016-11-22 03:30:58', '2016-11-22 03:30:58', '1', '1', '', null, '', null, ',1,', '', null, null);
INSERT INTO `fs_banners` VALUES ('110', '61', 'Banner 2', 'banner-2', '1', 'images/banners/original/123456_1479892218.jpg', null, '', '0', '0', '', '0', '2016-11-23 10:10:18', '2016-11-23 10:11:33', '1', '3', '', null, ',2,3,4,', ',cac-san-golf-o-mien-bac,cac-san-golf-o-mien-trung,cac-san-golf-o-mien-nam,', ',9,', '', null, null);
INSERT INTO `fs_banners` VALUES ('111', '61', 'Banner 3', 'banner-3', '1', 'images/banners/original/13462423_1479892417.jpg', null, '', '0', '0', '', '0', '2016-11-23 10:12:48', '2017-02-03 13:57:40', '1', '4', '', null, '', ',cac-san-golf-o-mien-bac,cac-san-golf-o-mien-trung,cac-san-golf-o-mien-nam,', ',9,46,', '', null, '');
INSERT INTO `fs_banners` VALUES ('112', '62', 'Banner new 1', 'banner-new-1', '1', 'images/banners/original/13462423_1480129757.jpg', null, '', '0', '0', '', '0', '2016-11-26 04:06:29', '2016-11-26 04:27:33', '1', '5', ',107,108,', ',tin-trong-nuoc,tin-quoc-te,', '', null, ',2,3,4,', '', null, null);

-- ----------------------------
-- Table structure for fs_blocks
-- ----------------------------
DROP TABLE IF EXISTS `fs_blocks`;
CREATE TABLE `fs_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `ordering` int(11) DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `listItemid` varchar(255) DEFAULT NULL,
  `params` text,
  `showTitle` tinyint(4) DEFAULT NULL,
  `hide_admin` tinyint(4) DEFAULT NULL,
  `news_categories` text,
  `contents_categories` text,
  `module_id` int(11) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_blocks
-- ----------------------------
INSERT INTO `fs_blocks` VALUES ('132', 'Quảng cáo trên nội dung', '', '0', '1', 'banners', 'top_content', 'all', 'suffix=_banner\rid=divAdLeft\rstyle=default\rcategory_id=60', '0', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('133', 'Bạn muốn chơi Golf', '', '2', '1', 'product_menu', 'top_content', ',1,', 'suffix=\rstyle=golfbooking', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('134', 'Các sân golf nổi bật', '', '3', '1', 'products_list', 'top_content', ',1,', 'suffix=_product_list\rlimit=4\rtype=hot\rstyle=default', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('135', 'Bạn có thể quan tâm', '', '5', '1', 'mainmenu', 'top_content', ',1,', 'suffix=_mainmenu\rstyle=golfbooking\rgroup=35', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('136', 'Tất cả các sân golf ở việt nam', '', '7', '1', 'products_list', 'top_content', ',1,', 'suffix=_golfmenu\rlimit=100\rtype=default\rstyle=golfbooking', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('137', 'Quảng cáo trên trái', '', '2', '1', 'banners', 'left', ',9,12,46,', 'suffix=_banner\rid=divAdLeft\rstyle=default\rcategory_id=61', '0', null, '', '', '34', 'Quảng cáo');
INSERT INTO `fs_blocks` VALUES ('138', 'Tin xem nhiều', '', '0', '1', 'newslist', 'right', ',2,3,4,', 'suffix=_news_list\rlimit=6\rtype=grid\rstyle=default', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('139', 'Tin mới nhất', '', '2', '1', 'newslist', 'right', ',2,3,4,', 'suffix=_news_list\rlimit=6\rtype=newest\rstyle=default', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('140', 'Quảng cáo trên phải tin tức', '', '3', '1', 'banners', 'right', ',2,3,4,', 'suffix=_banner\rid=divAdLeft\rstyle=default\rcategory_id=62', '0', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('141', 'Menu tin tức', '', '0', '1', 'news_menu', 'top', ',2,3,4,', 'suffix=_news_list\rstyle=default', '0', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('142', 'Danh sách bài viết', '', '0', '1', 'contentslist', 'top', ',8,', 'suffix=\rlimit=6\rtype=default\rstyle=default', '0', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('143', 'Bản đồ', '', '0', '1', 'map', 'top', ',43,', 'suffix=_contents_list\rlimit=6\rtype=newest\rstyle=default', '0', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('144', 'Các sân golf bạn đã xem gần đây', '', '0', '1', 'products_list', 'top_content', ',1,', 'suffix=_product_list\rlimit=3\rtype=viewed\rstyle=list', '1', null, '', null, null, null);
INSERT INTO `fs_blocks` VALUES ('145', 'Lọc sản sân golf', null, '0', '1', 'products_filter', 'left', ',9,11,', 'suffix=_product_list\rstyle=goflbooking', '0', null, null, '', '60', 'Lọc sân golf');
INSERT INTO `fs_blocks` VALUES ('146', 'Lọc tee time', null, '0', '1', 'tee_filter', 'left', ',12,', 'suffix=\rstyle=default', '0', null, null, '', '70', 'Lọc tee time');
INSERT INTO `fs_blocks` VALUES ('147', 'Lọc package', null, '0', '1', 'package_filter', 'left', ',46,', 'suffix=_news_list\rstyle=default', '0', null, null, '', '71', 'Lọc package');

-- ----------------------------
-- Table structure for fs_config
-- ----------------------------
DROP TABLE IF EXISTS `fs_config`;
CREATE TABLE `fs_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `value` text,
  `data_type` varchar(50) DEFAULT 'text',
  `is_common` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(4) DEFAULT NULL COMMENT 'thông số giành cho google',
  `is_ga` tinyint(4) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_config
-- ----------------------------
INSERT INTO `fs_config` VALUES ('1', 'site_name', 'Site Name', null, 'text', '1', '1', null, '1');
INSERT INTO `fs_config` VALUES ('2', 'title', 'Title', null, 'text', '1', '1', null, '2');
INSERT INTO `fs_config` VALUES ('3', 'meta_des', 'Meta des', null, 'text', '1', '1', null, '3');
INSERT INTO `fs_config` VALUES ('4', 'meta_key', 'Meta key', null, 'text', '1', '1', null, '4');
INSERT INTO `fs_config` VALUES ('5', 'admin_name', 'Admin name', null, 'text', '0', '1', null, '5');
INSERT INTO `fs_config` VALUES ('6', 'admin_email', 'Admin email', null, 'text', '1', '1', null, '6');
INSERT INTO `fs_config` VALUES ('7', 'main_title', 'Đuôi tiêu đề', '', 'text', '1', '1', null, '7');
INSERT INTO `fs_config` VALUES ('8', 'main_meta_key', 'Thẻ meta_key chính', '', 'text', '1', '1', null, '8');
INSERT INTO `fs_config` VALUES ('9', 'main_meta_des', 'Thẻ meta_des chính', '', 'text', '1', '1', null, '9');
INSERT INTO `fs_config` VALUES ('13', 'google_analytics', 'ID google analytics', '', 'text', '1', '1', null, '13');
INSERT INTO `fs_config` VALUES ('10', 'logo', 'Logo', null, 'image', '1', '1', null, '10');
INSERT INTO `fs_config` VALUES ('11', 'background_home', 'Background trang chủ', null, 'image', '1', '0', null, '11');
INSERT INTO `fs_config` VALUES ('14', 'contact', 'Thông tin liên hệ', '', 'editor', '1', '0', null, '14');
INSERT INTO `fs_config` VALUES ('15', 'hotline', 'Hotline', null, 'text', '1', '1', null, '15');
INSERT INTO `fs_config` VALUES ('19', 'email', 'Emai', null, 'text', '1', '1', null, '19');
INSERT INTO `fs_config` VALUES ('16', 'address', 'Địa chỉ', null, 'text', '1', '1', null, '16');
INSERT INTO `fs_config` VALUES ('17', 'phone', 'Điện thoại', null, 'text', '1', '1', null, '17');
INSERT INTO `fs_config` VALUES ('24', 'facebook', 'Facebook', null, 'text', '1', '1', null, '24');
INSERT INTO `fs_config` VALUES ('25', 'twitter', 'Twitter', '', 'text', '1', '0', null, '25');
INSERT INTO `fs_config` VALUES ('26', 'google', 'Google', null, 'text', '1', '1', null, '26');
INSERT INTO `fs_config` VALUES ('27', 'youtube', 'Youtube', null, 'text', '1', '1', null, '27');
INSERT INTO `fs_config` VALUES ('18', 'fax', 'Fax', '', 'text', '1', '1', null, '18');
INSERT INTO `fs_config` VALUES ('20', 'website', 'Website', null, 'text', '1', '1', null, '20');
INSERT INTO `fs_config` VALUES ('30', 'copyring', 'Copyring', '', 'text', '1', '1', null, '20');

-- ----------------------------
-- Table structure for fs_config_modules
-- ----------------------------
DROP TABLE IF EXISTS `fs_config_modules`;
CREATE TABLE `fs_config_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL COMMENT 'Tên module hoặc type',
  `view` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL COMMENT 'Mặc định là display',
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `ordering` varchar(255) DEFAULT NULL,
  `cache` int(11) DEFAULT NULL,
  `params` text,
  `fields_seo_title` varchar(255) DEFAULT NULL COMMENT 'số 1 đứng đằng trước trường tức là "AND" là luôn cộng vào\r\nsố 0 đứng đằng trước trường là "OR" là có tham số trước nó rồi thì sau sẽ ko cộng thêm vào nữa',
  `fields_seo_keyword` varchar(255) DEFAULT NULL COMMENT 'số 1 đứng đằng trước trường tức là "AND" là luôn cộng vào\r\nsố 0 đứng đằng trước trường là "OR" là có tham số trước nó rồi thì sau sẽ ko cộng thêm vào nữa',
  `fields_seo_description` varchar(255) DEFAULT NULL COMMENT 'số 1 đứng đằng trước trường tức là "AND" là luôn cộng vào\r\nsố 0 đứng đằng trước trường là "OR" là có tham số trước nó rồi thì sau sẽ ko cộng thêm vào nữa',
  `fields_seo_h1` varchar(255) DEFAULT NULL,
  `fields_seo_h2` varchar(255) DEFAULT NULL,
  `fields_seo_image_alt` varchar(255) DEFAULT NULL,
  `value_seo_title` varchar(255) DEFAULT NULL COMMENT 'Thông số này giúp cho các trang không nhập được  SEO như trang "trang chủ sp, trang chủ tin tức,...)',
  `value_seo_keyword` varchar(255) DEFAULT NULL,
  `value_seo_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_config_modules
-- ----------------------------
INSERT INTO `fs_config_modules` VALUES ('24', 'Danh mục sản phẩm', 'products', 'cat', null, '1', null, '0', 'limit=12', '1,seo_title|2,name', '1,seo_keyword|2,name', '1,seo_description|1,name', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('25', 'Hãng sản xuất', 'products', 'manufactory', null, '0', null, '2', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `fs_config_modules` VALUES ('26', 'Chi tiết sản phẩm', 'products', 'product', null, '1', null, '0', 'image_large_size=535x360\rimage_large_method=cut_image\r\rimage_resized_size=260x172\rimage_resized_method=cut_image\r\rimage_small_size=100x76\rimage_small_method=cut_image\r\ruse_manufactory=1\r', '1,name|1,category_name', '1,seo_keyword|1,name|1,tags', '1,summary|1,name', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('27', 'Giỏ hàng', 'products', 'cart', 'eshopcart2', '1', null, '0', 'list_bank=\"&lt;table border=&quot;0&quot; cellpadding=&quot;10&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\\r\\n\\t&lt;tbody&gt;\\r\\n\\t\\t&lt;tr&gt;\\r\\n\\t\\t\\t&lt;td style=&quot;text-align: center;&quot; width=&quot;160&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;\\/upload_images\\/images\\/logo-ngan-hang-ACB.jpg&quot; style=&quot;width: 100px; height: 74px;&quot; \\/&gt;&lt;\\/td&gt;\\r\\n\\t\\t\\t&lt;td&gt;\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;T&amp;ecirc;n t&amp;agrave;i kho\\u1ea3n: Nguy\\u1ec5n Duy \\u0110\\u1ea1i&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;S\\u1ed1 t&amp;agrave;i kho\\u1ea3n:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;75427969&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;Ng&amp;acirc;n h&amp;agrave;ng:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;NH Th\\u01b0\\u01a1ng m\\u1ea1i c\\u1ed5 ph\\u1ea7n &amp;Aacute; Ch&amp;acirc;u - ACB - Chi nh&amp;aacute;nh Tp H\\u1ed3 Ch&amp;iacute; Minh&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\t\\t\\t&lt;\\/td&gt;\\r\\n\\t\\t&lt;\\/tr&gt;\\r\\n\\t\\t&lt;tr&gt;\\r\\n\\t\\t\\t&lt;td style=&quot;text-align: center;&quot;&gt;\\u200b&lt;img alt=&quot;&quot; src=&quot;\\/upload_images\\/images\\/NH-BIDV.jpg&quot; style=&quot;width: 100px; height: 33px;&quot; \\/&gt;&lt;\\/td&gt;\\r\\n\\t\\t\\t&lt;td&gt;\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;T&amp;ecirc;n t&amp;agrave;i kho\\u1ea3n: Nguy\\u1ec5n Duy \\u0110\\u1ea1i&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;S\\u1ed1 t&amp;agrave;i kho\\u1ea3n:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;75427969&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;Ng&amp;acirc;n h&amp;agrave;ng:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;NH \\u0110\\u1ea7u t\\u01b0 v&amp;agrave; Ph&amp;aacute;t tri\\u1ec3n Vi\\u1ec7t Nam - BIDV - Chi nh&amp;aacute;nh Gia \\u0110\\u1ecbnh&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\t\\t\\t&lt;\\/td&gt;\\r\\n\\t\\t&lt;\\/tr&gt;\\r\\n\\t\\t&lt;tr&gt;\\r\\n\\t\\t\\t&lt;td style=&quot;text-align: center;&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;\\/upload_images\\/images\\/logo-agribank-2012_logo.jpg&quot; style=&quot;width: 100px; height: 18px;&quot; \\/&gt;&lt;\\/td&gt;\\r\\n\\t\\t\\t&lt;td&gt;\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;T&amp;ecirc;n t&amp;agrave;i kho\\u1ea3n: Nguy\\u1ec5n Duy \\u0110\\u1ea1i&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;S\\u1ed1 t&amp;agrave;i kho\\u1ea3n:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;75427969&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;Ng&amp;acirc;n h&amp;agrave;ng:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;NH N&amp;ocirc;ng nghi\\u1ec7p v&amp;agrave;&amp;nbsp;Ph&amp;aacute;t tri\\u1ec3n N&amp;ocirc;ng th&amp;ocirc;n Vi\\u1ec7t Nam&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\t\\t\\t&lt;\\/td&gt;\\r\\n\\t\\t&lt;\\/tr&gt;\\r\\n\\t\\t&lt;tr&gt;\\r\\n\\t\\t\\t&lt;td style=&quot;text-align: center;&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;\\/upload_images\\/images\\/vietcombank-logo.jpg&quot; style=&quot;width: 100px; height: 35px;&quot; \\/&gt;&lt;\\/td&gt;\\r\\n\\t\\t\\t&lt;td&gt;\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;T&amp;ecirc;n t&amp;agrave;i kho\\u1ea3n: Nguy\\u1ec5n Duy \\u0110\\u1ea1i&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span style=&quot;font-family: \'times new roman\', times, serif;&quot;&gt;S\\u1ed1 t&amp;agrave;i kho\\u1ea3n:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;75427969&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\r\\n\\t\\t\\t&lt;p style=&quot;box-sizing: border-box; border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;Ng&amp;acirc;n h&amp;agrave;ng:&amp;nbsp;&lt;span style=&quot;line-height: 24px;&quot;&gt;NH Th\\u01b0\\u01a1ng m\\u1ea1i c\\u1ed5 ph\\u1ea7n Ngo\\u1ea1i Th\\u01b0\\u01a1ng - Vietcombank&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/span&gt;&lt;\\/p&gt;\\r\\n\\t\\t\\t&lt;\\/td&gt;\\r\\n\\t\\t&lt;\\/tr&gt;\\r\\n\\t&lt;\\/tbody&gt;\\r\\n&lt;\\/table&gt;\\r\\n\\r\\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Arial, \'Liberation Sans\', FreeSans, sans-serif; line-height: 19.5px;&quot;&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;span style=&quot;font-family:times new roman,times,serif;&quot;&gt;\\u0110\\u1ec3 \\u0111\\u1ea3m b\\u1ea3o quy\\u1ec1n l\\u1ee3i v&amp;agrave; tr&amp;aacute;nh sai s&amp;oacute;t nh\\u1ea7m l\\u1eabn, ngay sau khi thanh to&amp;aacute;n b\\u1eb1ng chuy\\u1ec3n kho\\u1ea3n th&amp;agrave;nh c&amp;ocirc;ng. Qu&amp;yacute; kh&amp;aacute;ch vui l&amp;ograve;ng th&amp;ocirc;ng b&amp;aacute;o cho cho ch&amp;uacute;ng t&amp;ocirc;i \\u0111\\u1ec3 x&amp;aacute;c nh\\u1eadn t&amp;igrave;nh tr\\u1ea1ng thanh to&amp;aacute;n&lt;\\/span&gt;&lt;\\/span&gt;.&lt;\\/span&gt;&amp;nbsp;&lt;\\/p&gt;\"', '1,', '1,', '1,', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('28', 'Danh mục tin', 'news', 'cat', null, '1', null, '0', 'limit=10', '1,seo_title|1,name', '1,seo_keyword|2,name', '1,seo_description|2,name', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('29', 'Chi tiết tin', 'news', 'news', '', '0', null, '0', '', '1,seo_title|2,title|1,category_name', '1,seo_keyword|2,title|1,tags', '1,seo_description|2,summary|1,title', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('30', 'Tìm kiếm tin', 'news', 'search', null, '0', null, '4', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `fs_config_modules` VALUES ('31', 'Trang chủ sản phẩm', 'products', 'home', null, '1', null, '0', 'limit=16', '1,', '1,', '1,', '', '', '1,', 'Sản phẩm', 'Sản phẩm', 'Sản phẩm');
INSERT INTO `fs_config_modules` VALUES ('35', 'Liên hệ', 'contact', 'contact', null, '0', null, '0', '', '1,', '1,', '1,', '', '', '1,', 'Liên hệ', 'Liên hệ', 'Liên hệ');
INSERT INTO `fs_config_modules` VALUES ('36', 'Trang chủ tin tức', 'news', 'home', null, '1', null, '0', 'limit=12', '1,', '1,', '1,', '', '', '1,', 'Tin tức', '', '');
INSERT INTO `fs_config_modules` VALUES ('40', 'Danh mục trang tĩnh', 'contents', 'cat', null, '0', null, '0', 'limit=6', '1,name|1,seo_title', '1,seo_keyword', '1,seo_description', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('41', 'Chi tiết trang tĩnh', 'contents', 'contents', null, '0', null, '0', '', '1,seo_title|2,title|1,category_name', '1,seo_keyword|2,title|1,tags', '1,seo_description|2,summary|2,title', '', '', '1,', '', '', '');
INSERT INTO `fs_config_modules` VALUES ('42', 'Đối tác', 'partners', 'partners', null, '0', null, '0', '', '1,', '1,', '1,', '', '', '1,', 'Đối tác | Mỹ phẩm Hàn quốc', '', '');
INSERT INTO `fs_config_modules` VALUES ('23', 'Trang chủ', 'home', 'home', null, '1', '', '0', 'column_left_name=Tin tức\rcolumn_left_cat=87\r\rcolumn_center_name=Review\rcolumn_center_cat=91\r\rcolumn_right_name=DGcare\rcolumn_right_cat=166', '1,', '1,', '1,', '', '', '1,', '', '', '');

-- ----------------------------
-- Table structure for fs_members
-- ----------------------------
DROP TABLE IF EXISTS `fs_members`;
CREATE TABLE `fs_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(4000) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `published_time` datetime DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `telephone` varchar(30) DEFAULT NULL,
  `mobilephone` varchar(30) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `edited_time` datetime DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `job` varchar(255) DEFAULT NULL,
  `activated_code` varchar(255) DEFAULT NULL,
  `is_newsletter` tinyint(4) NOT NULL DEFAULT '0',
  `point` int(11) DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `pending` double NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  `sizes_clothes` varchar(255) DEFAULT NULL,
  `sizes_shoes` varchar(255) DEFAULT NULL,
  `other_info` longtext,
  `rating_count` int(11) DEFAULT '0',
  `rating_sum` float DEFAULT '0',
  `upload` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `on_holiday` tinyint(4) DEFAULT '0',
  `unset_facebook` tinyint(4) DEFAULT '0',
  `manufactories` text,
  `un_manufactories` text,
  `followers` text,
  `following` text,
  `block_member` text,
  `is_bundle_discount` tinyint(4) DEFAULT NULL,
  `bundle_discount_1` int(11) NOT NULL,
  `bundle_discount_2` int(11) NOT NULL,
  `bundle_discount_3` int(11) NOT NULL,
  `is_publish_photos_agreed` tinyint(4) DEFAULT '0',
  `allow_my_favourite_notifications` tinyint(4) DEFAULT '0',
  `undiscoverable` tinyint(4) DEFAULT '0',
  `is_location_public` tinyint(4) DEFAULT '0',
  `is_display_name` int(11) DEFAULT '1',
  `is_display_age` int(11) DEFAULT '1',
  `feedback` int(11) NOT NULL,
  `count_login` int(11) DEFAULT '0',
  `count_products` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_members
-- ----------------------------

-- ----------------------------
-- Table structure for fs_menus_items
-- ----------------------------
DROP TABLE IF EXISTS `fs_menus_items`;
CREATE TABLE `fs_menus_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `show_admin` tinyint(4) NOT NULL DEFAULT '1',
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `target` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `default` tinyint(4) DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `template` varchar(50) DEFAULT NULL,
  `condition` int(11) DEFAULT NULL,
  `list_parent` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `is_rewrite` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  `is_en` tinyint(4) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description_short` varchar(255) DEFAULT NULL,
  `rel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1036 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fs_menus_items
-- ----------------------------
INSERT INTO `fs_menus_items` VALUES ('8', 'Trang tĩnh', '0', '', null, null, '0', null, null, '8', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('2', 'Trang chủ tin tức', '0', '', null, '', '0', null, null, '2', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('1', 'Trang chủ', '0', '', null, null, '0', null, null, '1', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('3', 'Danh mục tin tức', '0', '', null, null, '0', null, null, '3', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('4', 'Chi tiết tin', '0', '', null, null, '0', null, null, '4', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('9', 'Danh sách sân golf', '0', '', null, null, '0', null, null, '9', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('10', 'Chi tiết sân golf', '0', '', null, null, '0', null, null, '10', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('43', 'Liên hệ', '0', '', null, null, '0', null, null, '43', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('1031', 'Liên hệ', '1', 'lien-he', null, 'index.php?module=contact', '0', '_self', '33', '48', '0', '1', '2016-11-15 08:17:27', '2016-11-28 05:03:57', null, null, '1031', '0', '0', '', '0', '', '', null);
INSERT INTO `fs_menus_items` VALUES ('1030', 'Giới thiệu', '1', 'gioi-thieu', null, 'index.php?module=contents&view=content&code=gioi-thieu-ve-golfbooking&ccode=gioi-thieu&id=119', '0', '_self', '33', '47', '0', '1', '2016-11-15 08:17:23', '2016-11-26 05:48:34', null, null, '1030', '0', '0', '', '0', '', '', null);
INSERT INTO `fs_menus_items` VALUES ('1029', 'Tin tức', '1', 'tin-tuc', null, 'index.php?module=news&view=home', '0', '_self', '33', '46', '0', '1', '2016-11-15 08:17:09', '2016-11-25 10:42:19', null, null, '1029', '0', '0', '', '0', '', '', null);
INSERT INTO `fs_menus_items` VALUES ('1028', 'Golf Events', '1', 'golf-events', null, 'index.php?module=gallery&view=home', '0', '_self', '33', '45', '0', '1', '2016-11-15 08:17:01', '2016-12-05 10:00:00', null, null, '1028', '0', '0', '', '0', '', '', null);
INSERT INTO `fs_menus_items` VALUES ('1027', 'Golf Package', '1', 'golf-package', null, 'index.php?module=package&view=home', '0', '_self', '33', '44', '0', '1', '2016-11-15 08:16:44', '2017-01-20 16:31:36', null, null, '1027', '0', '0', '', '0', '', '', null);
INSERT INTO `fs_menus_items` VALUES ('1032', 'Các gói chơi golf', '1', 'cac-goi-choi-golf', 'images/menus/585685_1479802951.png', 'index.php?module=contents&view=content&code=cac-goi-choi-golf&ccode=ban-co-the-quan-tam&id=125', '0', '_self', '35', '49', '0', '1', '2016-11-22 09:22:31', '2016-12-30 10:57:02', null, null, '1032', '0', '0', '', '0', '', 'Golfbooking.com.vn cung cấp cho quý khách 20 gói chơi Golf các loại', null);
INSERT INTO `fs_menus_items` VALUES ('1033', 'Các sự kiện golf', '1', 'cac-su-kien-golf', 'images/menus/56856_1479803038.png', 'index.php?module=gallery&view=home', '0', '_self', '35', '50', '0', '1', '2016-11-22 09:23:58', '2016-12-30 10:53:18', null, null, '1033', '0', '0', '', '0', '', 'Golfbooking.com.vn cung cấp cho quý khách 20 sự kiện Golf các loại', null);
INSERT INTO `fs_menus_items` VALUES ('1034', 'khách sạn việt nam', '1', 'khach-san-viet-nam', 'images/menus/34325_1479803148.png', 'http://elitehotel.com.vn/', '0', '_blank', '35', '51', '0', '1', '2016-11-22 09:25:48', '2016-12-30 10:54:25', null, null, '1034', '0', '0', '', '0', '', 'Golfbooking.com.vn cung cấp hơn 2000 khách sạn hàng đầu Việt Nam', null);
INSERT INTO `fs_menus_items` VALUES ('1035', 'hợp tác kinh doanh', '1', 'hop-tac-kinh-doanh', 'images/menus/14234_1479803246.png', 'index.php?module=contents&view=content&code=hop-tac&ccode=hop-tac&id=121', '0', '_self', '35', '52', '0', '1', '2016-11-22 09:27:26', '2017-01-05 14:26:53', null, null, '1035', '0', '0', '', '0', '', 'Quý khách có thể trở thành đối tác của Golfbooking.com.vn', null);
INSERT INTO `fs_menus_items` VALUES ('12', 'Tee Times', '0', '', null, null, '0', null, null, '12', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('11', 'Tất cả sân gofl', '0', '', null, null, '0', null, null, '11', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);
INSERT INTO `fs_menus_items` VALUES ('46', 'Golf  Package ', '0', '', null, null, '0', null, null, '46', null, '1', null, null, null, null, null, null, '0', null, '0', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landingpages
-- ----------------------------
INSERT INTO `landingpages` VALUES ('4', 'Quảng cáo với hình ảnh', '0', 'Quảng cáo với hình ảnh', '2017-09-14 17:44:27', '0000-00-00 00:00:00');
INSERT INTO `landingpages` VALUES ('5', 'Quảng Cáo với Facebook', '0', 'Quảng Cáo với Facebook', '2017-09-16 18:10:48', '0000-00-00 00:00:00');
INSERT INTO `landingpages` VALUES ('6', 'Quảng Cáo với voucher', '0', 'Quảng Cáo với voucher', '2017-09-16 18:13:32', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for langding_devices
-- ----------------------------
DROP TABLE IF EXISTS `langding_devices`;
CREATE TABLE `langding_devices` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `landingpage_id` int(12) NOT NULL,
  `delete_flag` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of langding_devices
-- ----------------------------

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
INSERT INTO `service_groups` VALUES ('1', 'dfdsf', 'sdfsdf', '1', '2017-09-01 03:59:30', '2017-09-01 04:45:38');
INSERT INTO `service_groups` VALUES ('2', 'ASas', 'ASas', '1', '2017-09-01 04:15:29', '2017-09-01 04:44:39');
INSERT INTO `service_groups` VALUES ('3', 'THÊM MỚI NHÓM DỊCH VỤ 4', 'THÊM MỚI NHÓM DỊCH VỤ', '0', '2017-09-01 04:16:11', '2017-09-01 05:01:10');
INSERT INTO `service_groups` VALUES ('4', 'THÊM MỚI NHÓM DỊCH VỤ 1', 'THÊM MỚI NHÓM DỊCH VỤ\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\n\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\n\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\n', '0', '2017-09-01 04:58:53', '2017-09-01 04:58:53');
INSERT INTO `service_groups` VALUES ('5', 'THÊM MỚI NHÓM DỊCH VỤ 2', 'THÊM MỚI NHÓM DỊCH VỤ\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\nTHÊM MỚI NHÓM DỊCH VỤ\r\n', '0', '2017-09-01 04:59:07', '2017-09-01 04:59:07');

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `apt_key` varchar(50) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_pass` varchar(255) NOT NULL,
  `usr_address` varchar(255) NOT NULL,
  `usr_service_name` varchar(255) NOT NULL,
  `usr_phone` varchar(255) NOT NULL,
  `grp_id` tinyint(5) NOT NULL,
  `grp_service_id` tinyint(5) NOT NULL,
  `create_date` datetime NOT NULL,
  `usr_nv_id` int(11) NOT NULL,
  `usr_profile` varchar(255) NOT NULL,
  `usr_location` varchar(50) NOT NULL,
  `usr_style` int(2) NOT NULL,
  `usr_pass_false` int(1) NOT NULL DEFAULT '0',
  `usr_note` varchar(255) NOT NULL,
  `usr_using_adv_status` tinyint(1) NOT NULL,
  `usr_landingpage_style` tinyint(2) NOT NULL,
  `usr_adv_status` tinyint(1) NOT NULL,
  `grp_click_id` int(11) NOT NULL,
  `usr_money` int(11) NOT NULL,
  `grp_hopital_id` int(11) NOT NULL,
  `usr_report_style` tinyint(1) NOT NULL,
  `grp_hopital_check` tinyint(1) NOT NULL,
  `usr_device_group` int(11) NOT NULL,
  `usr_pos_id` int(11) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('235', '8WfrCSnse5', 'fm@gmail.com', '61184738467084b5dc223dcbfa36acf0', 'fm@gmail.com', 'fm@gmail.com', '0932393066', '2', '1', '2016-07-06 04:14:27', '0', 'Time-Standard-1Hour', '', '0', '0', 'fm@gmail.com', '0', '2', '0', '2', '0', '0', '0', '0', '235', '0');
INSERT INTO `sys_user` VALUES ('149', 'XH07MSeCsB12:20:10', 'theone@wifimedia.vn', '46383268a9682c5a6232b6464a3b600f', 'Số 1 Nguyễn quý Đức (A Hải)', 'The One', '0978700366', '2', '4', '2015-10-29 19:03:10', '10', 'Time-Standard-Daily', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị 27/10/2015\nlonghaiasia@gmail.com', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('150', 'oVQNu6GTY012:21:35', 'thairestauranvincom@wifimedia.vn', '0eab020a32990a32e2faad03d0feda6f', '191 Bà Triệu (Bên cô Phương)', 'Thai Restaurant Vincom', '01658618406', '2', '4', '2015-10-29 19:02:57', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('151', 'E6x0y2LzOZ12:23:04', 'thairestauranthaithinh@wifimedia.vn', '170e7b6a0d50db3b8463fb95d806a8f8', '96 Thái Thịnh (chị Quỳnh)', 'Thai Restaurant Thai Thinh', '0934683535', '2', '4', '2015-10-29 19:02:46', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('152', 'nCfws3k2JI20:41:58', 'Cangtinxaydung@wifimedia.vn', '77160d768617c1515920a525175ac079', 'Đường Giải Phóng (chị Giang)', 'Căng tin xây dựng', '0984592686', '2', '10', '2015-12-30 04:31:35', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '2', '1', '0', '4', '0', '1', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('153', 'JVgT0AvU9310:58:30', 'quechoa@wifimedia.com.vn', 'e3de3a6f93c6b6c89c9bd22b6e9427d0', '16 Thọ Tháp (anh Tiến)', 'Nhà Hàng Quê Choa ', '0942059996', '2', '4', '2015-10-29 19:08:21', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('148', 't7T7X3ZpZu09:26:10', 'pattaya62@quangcaowifi.vn', '68d8f6834cd7d034df15ad6e6becffe1', '62 Trần Hưng Đạo', 'Pattaya62 Trần Hưng Đạo', '0989081845', '2', '1', '2015-11-04 16:18:00', '10', '1Hour-Repeat', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị 27/10\nmasterky84@gmail.com', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('147', '5MfTggeH5p09:09:35', 'pattaya30@quangcaowifi.vn', '4c460280f303e64745f3ce121518a75e', '30 Phan Bội Châu', 'Pattaya30 Phan Bội Châu', '0989081845', '2', '1', '2015-11-04 16:17:47', '10', '1Hour-Repeat', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị\nmasterky84@gmail.com', '2', '0', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('143', 'X9b3yGRnSx21:36:39', 'ncptankyna@gmail.com', 'a9c8766859337094c6f1db1b42080297', 'VPGD: 86B Lê Hồng Phong - TP.Vinh - Nghệ An', 'Công ty PTS', '0913709290 ', '2', '9', '2015-10-13 15:59:41', '15', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('162', '3d6stXVOz509:44:00', 'Cangtinngoaithuong@wifimedia.vn', '0580c6d39917e390ce37b63cfd809425', '91 Chùa Láng (Chị Nguyệt)', 'Căng tin Ngoại Thương', '0972864486', '2', '10', '2015-11-20 20:10:42', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '0', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('144', 'ZSE6MxHWJB21:17:29', 'demooto@quangcaowifi.vn', '241e282fa217e4bbd623671850027d51', 'CT2-C2 VOV', 'Demo Oto', '0966189918', '2', '1', '2015-10-11 21:17:29', '15', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('141', 'mk77QbfJ2T16:25:35', 'pdc@gmail.com', 'a73e492d4f3a6affc3086679a6951c20', '116 Đường Hưng Yên - Nam Định (chú Dũng)', 'Công ty tin học Phi Dũng', '0914848666', '2', '9', '2015-10-08 16:08:13', '15', '1Hour-Repeat', '5', '2', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('47', 'Ryj0FaSpM509:46:23', 'info@quangcaowifi.vn', 'd1c189b0a30f7f66c0c955eb0f00b228', '47 Vũ Trọng Phụng', 'Default', '0966189918 ', '2', '4', '2015-10-27 16:44:44', '15', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('146', 'Darie4xF6L08:49:38', 'khoinguyen@quangcaowifi.vn', '6614523dc9fc962e83670d5ba4405b90', '18 Khương Hạ', 'Khôi Nguyên Cafe', '0962849168', '2', '1', '2015-10-29 19:03:53', '10', '1Hour-Repeat', '', '2', '0', 'Chuyển Acc cho khách hàng quản trị', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('145', 'ODR8lq05sK21:40:53', 'lamdep@quangcaowifi.vn', 'bb3a41a21c48efdd355b3e1920f2e013', 'CT2-C2 VOV', 'SPa Huyền', '0966189918', '2', '1', '2015-10-13 15:57:24', '15', 'Time-Standard-45Minute-Repeat', '', '2', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('51', 'SKOfToZJvk10:19:37', 'ildivo@gmail.com', '2f73810b93b170116552b2b2d6739df9', '03 Hồ Đắc Di', 'Nhà Hàng ldivo', '01635075281', '2', '4', '2015-11-04 16:50:46', '10', '1Hour-Repeat', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị 27/10', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('52', 'mW8trSAWDE10:21:34', 'hg@gmail.com', 'b391d9c08cb412b7ab8b887957c4bae3', '187 Tây Sơn', 'Coffee HG', '0984728351', '2', '1', '2015-11-04 08:51:15', '10', '1Hour-Repeat', '2,4', '2', '0', '', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('53', 'HFD94p9U2G13:42:15', 'lotus@gmail.com', 'f8a3c36d1f67c48336f7b4d81be9ff20', 'Số 9 Đào Duy Anh', 'Nhà Hàng Lotus', '0942316357', '2', '4', '2015-11-04 19:05:48', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '0', 'Chuyển tài khoản cho khách hàng quản trị', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('54', 'Z5c1YC8Op000:11:15', 'nhahangthuonghai@gmail.com', '66c3d71d866e1111c9f0bed47d89218a', '231 Nguyễn Trãi', 'Nhà hàng Thượng Hải', '0984462760', '2', '4', '2015-10-29 18:41:22', '10', 'Time-Standard-30Minute-Repeat', '', '2', '0', '', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('57', 'pG65TkBRil12:15:25', 'coffeemoclam@gmail.com', '3a30b4d80a96af53231c038e1062030a', '41 ngách 152 ngõ Xã Đàn 2 - Nam Đồng', 'Cafe Mộc Lâm', '0903287726', '2', '1', '2015-11-04 19:04:21', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('202', 'WwQOKlDmmc13:41:38', '0', 'ab7fadca16427f3a156050b81bb71281', 'tạ quang bửu', 'Nhà Ăn A15', '0912339926', '2', '10', '2015-12-30 09:32:32', '12', '1Hour-Repeat', '', '1', '1', 'nhà ăn dhbk123', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('61', 'zXcSl2nXyG22:46:55', 'coffeebong@gmail.com', 'e70f7cf7babd2a4c3d95edc0572f505c', '65 ngách 152 ngõ xã đàn 2 - Nam Đồng', 'Cafe Bông', '0438529452', '2', '1', '2015-11-04 08:45:14', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('64', 'UWtIMb98qI14:19:26', 'phongtra@quangcaowifi.vn', 'cf1c93bd962114fd301853dfd3fa21e4', '42 Nam Đồng', 'Phòng Trà Số 1', '0988888883', '2', '1', '2015-11-04 16:40:42', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('65', 'fGsgV6vYL014:28:46', 'nailcoffee@quangcaowifi.vn', 'b5a0696ce657ab289bc26387f2b9dd75', '160 Xã Đàn', 'Nail Coffee', '0979791159', '2', '1', '2015-11-04 17:58:25', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('175', 'PcVzARKslJ13:54:51', 'thairestaurant@wifimedia.vn', '7389470b97ed731192c17234b9fcfff8', ' B2 R4 – Gian Hàng 35-36 (chị Nga)', 'Thai Restaurant', '0981960513', '2', '4', '2015-10-29 19:10:49', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('67', 'Th9w6T9vz310:43:21', 'namviet@quangcaowifi.vn', '3f11188780655a09efaf3b6bd7d35fc1', 'B11 Lương Đình Của', 'Nhà Hàng Nam Việt', '0989889986', '2', '4', '2015-11-04 08:44:28', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('196', 'oZVGtxRaXx09:37:49', 'daihocthudo@wifimedia.vn', 'd1c189b0a30f7f66c0c955eb0f00b228', 'Dương Quảng hàm - A.Phương', 'Đại học Thủ Đô', '01669745678', '2', '10', '2015-11-09 09:37:49', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '8', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('69', 'iNgR3jJiaK11:52:17', 'phuctho@quangcaowifi.vn', '91325bcbff07d261b10ed0c7f2c0e216', '163 xã đàn', 'Nhà Hàng Phúc Thọ', '0989600619', '2', '4', '2015-10-29 18:45:44', '10', '1Hour-Repeat', '', '1', '0', '', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('174', '2Z7krngCUH11:55:33', 'daihohanoi@wifimedia.vn', '9e063e766dd7f86258f52418ef4e99d9', 'Nguyễn Trãi - Thanh Xuân - Mr Cường', 'Đại Học Hà Nội', '0936165689', '2', '10', '2015-10-29 19:11:02', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '0', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('72', 'GCbwEu1FCf09:00:07', 'comgau@quangcaowifi.vn', 'ce42e345f5d43424bb78c8028c10cf57', '176 Xã Đàn', 'Nhà Hàng Cơm Gấu', '0935262333', '2', '1', '2015-10-29 18:45:29', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('73', 'BZkD0C2nTV09:10:18', 'coffeetit@quangcaowifi.vn', '6ef946aa8ee62519044dc2d4db93f6e2', '257 Xã Đàn', 'Coffee Tít', '01646976330', '2', '1', '2015-10-29 18:45:12', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('74', 'hAUWX2dp2U14:29:19', 'salon@quangcaowifi.vn', '9db6d5ea6dfbea123e24887a2dae463d', '155 Hồ Đắc Di', 'Salon Nice', '0964329996', '2', '1', '2015-10-29 18:44:57', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('75', 'halAufQSe609:22:35', 'coffeechanh@quangcaowifi.vn', 'd3e5688ee0274c5bc5e4019175a9f11d', 'Số 2 ngõ 18 Huỳnh Thúc Kháng', 'Coffee Chảnh', '0973863333', '2', '1', '2015-11-24 10:46:30', '10', 'Time-Standard-Daily', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('77', 'Ul07E7jeqB09:29:10', 'tn@quangcaowifi.vn', '48b92c4624d6250f52b48705d4102a5d', '502 Xã Đàn', 'Cafe Chăm Sóc Xe Hơi T&N', '01644155555', '2', '1', '2015-10-29 18:44:32', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('197', 'fL2MkYpxUb08:46:29', 'benhvienvietduc@wifimedia.vn', 'd1c189b0a30f7f66c0c955eb0f00b228', 'Quán Sứ - Hoàn Kiếm - Cô Lý', 'Bệnh Viện Việt Đức', '0983911983', '2', '8', '2015-11-10 08:46:29', '11', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '6', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('129', 'TT5bZ4VPm914:04:11', 'mihanquoc@quangcaowifi.vn', '98c8f17d80147fa998cd20ecd3215034', '192 trần duy hưng  (A.Hùng)', 'Mì Hàn Quốc', '0982508522', '2', '4', '2015-11-04 16:17:23', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('194', 'Ymp1pfL1yV16:01:58', 'tralasenTH@wifimedia.vn', 'd1c189b0a30f7f66c0c955eb0f00b228', 'CT2-C2 VOV', 'Trà Lá Sen', '0987439567', '2', '1', '2015-11-06 10:11:03', '16', 'Education', '', '1', '1', 'Quảng cáo cho Trà Lá Sen loại trường học', '1', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('81', 'gVMIq8Ue4o14:41:10', 'havana@quangcaowifi.vn', 'a33f6f6fc55d4e349211bae361672c78', '50 Nguyễn Chí Thanh', 'Coffee Havana', '0936661987', '2', '1', '2015-11-10 16:00:35', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('195', 'jHNoHHntLs08:52:58', 'Dancecolors@wifimedia.vn', 'ae3984347f9674816a700eb0dfb16ee0', 'Trường cao đẳng múa VN ( Mai Dịch, Cầu Giấy )', 'Dance Colors', '01213191999', '2', '1', '2015-11-06 08:52:58', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('198', '2h7JKNPpqK08:54:11', 'phongkham@wifimedia.vn', '038879c018506799938a2076c2e3e8d4', 'Số nhà 22 ngõ 81/35 Linh Lang Đào Tân - Ba Đình - Hà Nội', 'PHÒNG KHÁM ĐÔNG Y HOÀNG NAM', '0916992986', '2', '1', '2015-11-12 08:54:11', '15', 'Time-Standard-45Minute-Repeat', '', '1', '2', 'Chạy thử quảng cáo cho phòng khám', '1', '0', '0', '4', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('84', 'k3cZ4f0sOJ08:56:31', 'cafepho@quangcaowifi.vn', 'fb3697794886c4ec40d0ebec69ef2154', '39b9 vũ ngọc phan', 'Cafe Phố', '0964498080', '2', '1', '2015-11-04 16:15:37', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('183', 'V3QpqemZLB08:45:02', 'daihocthuyloi@wifimedia.vn', '0a9a0350deb013110ba80a04344c1b27', '175 Tây Sơn Đống Đa - Ms Thơm', 'Căng tin DH Thủy Lợi', '0914885761', '2', '10', '2015-10-29 19:08:59', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('86', 'Lh6mibHtu214:32:14', 'goccafe@quangcaowifi.vn', '058c5a73157ce516e3311cde09df37be', '161 chùa láng', 'Góc Cafe', '0903410155', '2', '1', '2015-11-04 16:16:32', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('87', 'yd9dIjIhoM14:35:04', 'cafephuonglien@quangcaowifi.vn', '760949f407b2d26bb6607ea6538536e8', '161 chùa láng', 'Cafe Phương Liên', '0903410155', '2', '1', '2015-11-04 16:15:50', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('89', '9JGEeOAZ6B14:34:03', 'cafe61@quangcaowifi.vn', 'fb400168919041b05e56504c6e7876d4', '61 Trần Quang Diệu', 'Cafe 61', '0986526688', '2', '1', '2015-11-04 16:12:25', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('90', 'shte0CRfqn14:37:18', 'quanhay@quangcaowifi.vn', '97d1fddf5eb85615686ad4c9aa48ab2a', '46 võ thị sáu', 'Quán Hay', '0987439567', '2', '4', '2015-11-04 08:50:48', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '2', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('91', 'sB1JbTAvXy09:02:14', 'cafecaydoi@quangcaowifi.vn', 'f64d042e758f2c025a62cd747d4f9e4c', '112 d11 Thái Thịnh', 'Cafe Cây Dồi', '0913008223', '2', '1', '2015-11-09 15:18:30', '10', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('201', 'UPwQVGjYv709:36:36', '0', '9bd02e944a6f2006da54464940919cf6', 'phú thọ', 'Trường Anh ngữ Quốc tế PoPoDoo Phú Thọ', '0949890666', '2', '0', '2015-12-30 09:30:23', '15', 'Time-Standard-Daily', '', '1', '0', '0949890666', '0', '1', '0', '8', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('200', 'ptYq9NZ6tg08:42:42', 'vuonhong@wifimedia.vn', '6034bf14717701a0f1554e9c19fcbe47', '22 Nguyễn Khang - Chị Phượng', 'Nhà Hàng Vườn Hồng', '01654094898', '2', '4', '2015-12-30 09:02:38', '10', 'Time-Standard-1Hour', '', '1', '0', '', '0', '1', '0', '8', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('94', 'Rou5CovxYZ09:18:58', 'cafevietsun@quangcaowifi.vn', 'b8ef4b9621b4457340cb0cc7b888984c', '70 Trần Quang Diệu', 'Cafe Việt Sun', '0904686869', '2', '1', '2015-10-29 18:47:39', '10', 'Time-Standard-30Minute-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('203', 'Lina4vPuB008:38:53', 'benhvienthanhnhan@wifimedia.vn', 'a71f02a9f1c8eb93f6890baed6d7d932', '42 Thanh Nhàn - Anh Sơn', 'Bệnh Viện Thanh Nhàn', '0915691821', '2', '8', '2015-11-20 08:40:09', '11', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '4', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('96', 'hpSwrkBKaD10:25:46', 'cafecaysi@quangcaowifi.vn', '0163de98d6fcc2194f20f5779ada1fbb', '10 Phạm Huy Thông (a.Thắng)', 'Cafe Cây Si', '01653176968', '2', '1', '2015-11-04 16:13:27', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('98', '7cYBRTkDnj09:12:42', 'cafekhanh@quangcaowifi.vn', '13e3db06d1152131cd5268c1f7347413', '69 Thái Thịnh', 'Cafe Khanh', '0948282138', '2', '1', '2015-10-29 18:56:01', '10', '2Hour-Repeat', '', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('99', 'CMFaOFMaNE09:16:01', 'cafechi@quangcaowifi.vn', '839f1a144fcaac7d18a7b680c538cd0a', '8A Phạm Huy Thông', 'Cafe Chi', '0988750719', '2', '1', '2015-11-04 16:13:42', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('100', 'W9J1nIGptw09:19:59', 'drinkbook@quangcaowifi.vn', '14d686e5a1f83b13bf90fd5f27c21664', 'chưa cập nhật', 'Drink Book', '0987439567', '2', '1', '2015-10-29 18:55:28', '10', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('101', 'nYu8IgvGja15:09:31', 'biatiep@quangcaowifi.vn', 'c606ecabc6fbe70e5632f77982bf6236', '40 Trần Duy Hưng', 'Bia Tiệp Trúc Viên', '0904976156', '2', '1', '2015-11-04 08:49:21', '10', '2Hour-Repeat', '2,4', '2', '0', 'chuyển Acc cho khách hàng quản trị', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('102', 'kKJ7y5110g15:14:08', 'cafebui@quangcaowifi.vn', '46838280af8cb0f51312b0fdd81a75cb', '115 M1/91 Nguyễn Chí Thanh', 'Cafe Bụi ', '0988455886', '2', '1', '2015-11-06 16:33:44', '10', 'Time-Standard-Daily', '2,4', '2', '0', 'gửi tài khoản cho khách hàng quản trị 27/10/2015\nquanlinh67@gmail.com', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('103', 'BwCXOMs54f08:48:49', 'javagaden@quangcaowifi.vn', 'd3e76b8c73f05fdd1503786ae39b5425', 'Số 2 ngõ 18 Nguyên Hồng', 'Java Gaden', '0942450608', '2', '1', '2015-11-04 16:16:54', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('105', 'uVRqwjYWCE09:36:19', 'cafe66@quangcaowifi.vn', 'd5ec158607cdc2a8a0aecf6c9bf206ca', '66 ngõ 20 Huỳnh Thúc Kháng (Chị Thoan)', 'Cafe66', '0945365558', '2', '1', '2015-11-04 16:12:44', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('106', 'z9jdsTYXw109:36:55', 'cafeamis@quangcaowifi.vn', 'dd6f0d5ebd9dacd4f270e5e53560ebd5', '46 Phạm Huy Thông (A.Mạnh)', 'Cafe Amis', '0933666882', '2', '1', '2015-11-04 16:12:57', '10', '2Hour-Repeat', '2,4', '2', '0', 'Chuyển Acc cho khách quản trị', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('107', 'o2imPYbWG809:37:39', 'cafecanhac@quangcaowifi.vn', 'c63d45bdbe964b3f1756e1e3fb9fbef1', '34 Phạm Huy Thông', 'Cafe Ca Nhạc', '0983821954', '2', '1', '2015-10-29 18:54:06', '10', 'Time-Standard-30Minute-Repeat', '', '1', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('109', '8F7CZlwKsJ23:34:59', 'biahoithanhlong@quangcaowifi.vn', '1fcefdfdad2aa79eb19f0e0c593887b8', '36 Phạm Huy Thông', 'Bia Hơi Thành Long', '0983835383', '2', '1', '2015-10-27 10:00:43', '15', '2Hour-Repeat', '', '2', '0', 'Gửi tài khoản cho khách hàng quản trị\nquy-thanh@vnn.vn', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('111', 'ctW8VJN3Xf23:46:23', 'cafenghi@quangcaowifi.vn', '8f02ab6f252a920ce7fe8cff97166937', '78 Phạm Huy Thông (A.Ngọc Anh)', 'Cafe Nghị', '0912692833', '2', '1', '2015-11-04 16:15:25', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('113', 'tsgwOtmKB908:50:28', 'cafediemhen@quangcaowifi.vn', '9ebe73b411923d66e562c980654a5382', '170 Hoàng Ngân', 'Cafe Điểm Hẹn', '0936017881', '2', '1', '2015-11-04 18:48:32', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('114', 'JO16jwleaA08:52:16', 'cafehaivan@quangcaowifi.vn', '44a841071338b504f7e7d57bed9d8c2e', '38 Phạm Huy Thông', 'Cafe Hải Vân', '01687851959', '2', '1', '2015-11-04 16:14:27', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị\ntranthikimngan@gmail.com', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('117', 'tA06LFWLNb14:02:05', 'cafequang@quangcaowifi.vn', '57da0058d2ef336836928d5880ef69ab', '92 Phạm Huy Thông', 'Cafe Quang', '0932388375', '2', '1', '2015-11-06 14:23:14', '10', 'Time-Standard-45Minute-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('118', 'WCpy3qLEwN09:09:44', 'cafemoc@quangcaowifi.vn', 'f7cdd156b3defaf4a141eb4c60d10a0c', '129B Nguyễn Ngọc Vũ (C.KimAnh)', 'Cafe Mộc', '0979375618', '2', '1', '2015-11-04 16:15:00', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('120', 'bsby647pI009:51:38', 'mycoffee@quangcaowifi.vn', 'c5ea00ba7285bee22adc20bf5f70362a', '62 hoàng cầu mới ', 'My Coffee', '0989581798', '2', '1', '2015-10-29 19:02:02', '10', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('122', 'ZTqnV2zXKa09:02:51', 'cafedamme@quangcaowifi.vn', '3bae1c7c7d2cdf106b53b1587a927874', '162 Hào Nam', 'Cafe Đam Mê', '0912007029', '2', '1', '2015-11-04 16:13:54', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('204', '6ctQUAPrtp08:43:06', 'benhvienphusan@wifimedia.vn', '0b801af10f18cef556bda88195338ac3', 'Đê La Thành - Cô Lý', 'Bệnh Viện Phụ Sản Hà Nội', '0983911983', '2', '8', '2015-11-20 08:43:06', '11', '1Hour-Repeat', '', '1', '0', '', '0', '5', '0', '4', '0', '2', '0', '1', '216', '0');
INSERT INTO `sys_user` VALUES ('125', 'GcX85D9BLr14:01:43', 'levucoffee@quangcaowifi.vn', 'd1c189b0a30f7f66c0c955eb0f00b228', '23 lô 13B Trung Hòa', 'Cafe Lê Vũ', '0904705555', '2', '1', '2015-11-17 05:49:56', '10', '2Hour-Repeat', '2,4', '2', '0', 'chuyển ACC cho khách hàng quản trị 27/10', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('126', 'nHDXJTQwqA14:03:48', 'cafebaoanh@quangcaowifi.vn', 'b047163cb967ae4f306fb7a65523dd70', '126A5 Trần Huy Liệu', 'Cafe Bảo Anh', '0983384923', '2', '1', '2015-11-04 16:13:12', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('127', 'SYwMaQUDY514:16:39', 'cafelinh@quangcaowifi.vn', '4d2965950e210e6ab927b07e6ca4af7f', '101 C5 Trần Huy Liệu', 'Cafe Linh', '0915831969', '2', '1', '2015-10-29 19:00:09', '10', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('128', 'gY0z9yTMqU14:18:20', 'cafeloan@quangcaowifi.vn', '5e1a8e8f32ee5da375e8451dd957b9fa', '121 B1 Trần Huy Liệu', 'Cafe Loan', '0943153686', '2', '1', '2015-11-04 16:14:41', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('130', 'j2RjEJV2MQ14:05:31', 'pattaya@quangcaowifi.vn', 'eb177215ac134363903cc9d04b29e213', '170 Ngọc Khánh', 'Pattaya 170 Ngọc Khánh', '0915257997', '2', '1', '2015-11-04 16:17:33', '10', '2Hour-Repeat', '2,4', '2', '0', 'Gửi tài khoản cho khách hàng quản trị 27/10', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('131', 'WpEVrQv5cE08:45:14', 'cafetiptop@quangcaowifi.vn', 'b0a1a60fe267a550c542a731b0edc4c2', '101 c8 Trần Huy Liệu', 'Coffee TipTop', '0983592344', '2', '1', '2015-11-04 16:16:06', '10', '2Hour-Repeat', '2,4', '2', '0', 'network.wifimedia.vn', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('173', 'IMUFZUC51b11:51:18', 'yduochoc@wifimedia.vn', 'd64d0220cbcd877a86a5a989d4bcdbcb', 'Nguyễn Trãi - Thanh Xuân - Ms Nguyệt', 'Căng tin Y Dược Học Cổ Truyền', '0983070416', '2', '10', '2015-10-29 19:11:26', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('134', 'zxozT11GCI13:58:37', 'cafemoc92@quangcaowifi.vn', 'b96745cf687f28ced514b14234dbda45', 'số 92 ngõ 171  Nguyễn Ngọc vũ', 'Cafe Mộc 92', '0973721162', '2', '1', '2015-11-04 16:15:13', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('135', 'rISWtT8JhF09:07:33', 'camel@quangcaowifi.vn', '6300052ee83931dd89be17e80f74ecd9', '19 Vũ Phạm Hàm', 'Camel\'s Way Coffee', '0902288320', '2', '1', '2015-11-06 09:42:30', '10', '2Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('137', 'ttlUo9p3KV14:03:42', 'gangon@quangcaowifi.vn', '7660295ad8a3c854898b13e5448534bd', '55 Nguyễn Trãi', 'Gà Ngon', '0946481970', '2', '6', '2015-10-29 19:04:21', '10', '2Hour-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('138', 'yoZrdwt52317:35:03', 'dungtd@rtccd.org.vn', 'd938aa4db20b791d75771a7aa914f223', 'Số 39, ngõ 255 Phố Vọng, Hai Bà Trưng, Hà Nội', 'Phòng Khám Cây Thông Xanh', '0946567008', '2', '8', '2015-10-07 09:17:23', '15', 'Free-Time-Internet', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('154', 'v7PO652n8x11:04:22', 'anhcoffee@wifimedia.vn', '8c7da708aec7c1f4f155c4d5651f56a1', 'NV 16 khu đô thị Trung Văn - Nam Từ Liêm', 'Anh Coffee', '0988891985', '2', '1', '2015-10-29 19:08:10', '10', 'Education', '', '1', '0', '', '0', '1', '0', '6', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('170', '3WNj5sIqyJ14:33:29', 'cangtinmydinh@wifimedia.vn', 'a61d68d23559e4a7a0c87e5c52a89d20', 'Hàm Nghi - Nam Từ Liêm - Anh Hiếu', 'Căng Tin Mỹ Đình', '0975678585', '2', '10', '2015-10-29 19:12:06', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '0', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('157', '0EPl3O6vlP08:42:07', 'quanone@wifimedia.vn', 'ed16cda21dcafeec593db63f650adcaf', '30 Trần Đăng Ninh (anh Quyết)', 'Quán One', '0976861596', '2', '1', '2015-11-04 08:41:59', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('158', 'b7YPgoaksG08:45:46', 'yenhoatra@wifimedia.vn', 'a63163a2e8d5e35463708b8eb7135560', 'G3D Vũ Phạm Hàm (anh Vũ)', 'Yên Hòa Trà', '0977919918', '2', '1', '2015-11-04 08:45:43', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('159', 'iCEvfDYuZt08:48:44', 'zotabeer@wifimedia.vn', 'd63ae3026269fc9f66a0ce4ba65e9218', '52 Vũ Trọng Phụng (anh Hòa)', 'Zota Beer Club', '0995555569', '2', '4', '2015-11-04 16:59:46', '10', '1Hour-Repeat', '2,4', '2', '0', 'Không vào được mạng, đã đổi link direct từ facebook sang google 23/10/2015\nChuyển Acc cho khách hàng quản trị 27/10', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('160', '82y0ONbf1y09:14:06', 'testrg@wifimedia.vn', 'ea282c4fd1062f4eac249f6a77f75305', 'testrg@wifimedia.vn', 'testrg@wifimedia.vn', '1234567890', '2', '4', '2015-10-17 09:14:06', '0', '', '5', '2', '0', '', '0', '0', '0', '6', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('161', 'nxP9NvZ7eU09:18:04', 'manh1@gmail.com', '325ff12ea1cc3c35af45c85d8e87c6db', 'manh1@gmail.com', 'manh1@gmail.com', '0932393066', '2', '1', '2015-10-17 09:18:04', '0', '', '5', '2', '0', '', '0', '1', '0', '6', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('163', 'nryK3QLeSD09:59:20', 'nhahangvantue@wifimedia.vn', 'f280fb2e4dc47927c65ebeb9097a2cb0', '23 Thái Thịnh (Cô Tâm )', 'Nhà Hàng Vạn Tuế', '0435640285', '2', '1', '2015-11-04 08:51:40', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('164', 'q3FLueFDPK10:12:42', 'gemini36@wifimedia.vn', 'd039cf9945a2884c5922efbe8b331f95', '36 Nguyễn Thị Định (A.Cường)', 'GeminiCoffee', '0435561673', '2', '1', '2015-11-04 08:46:05', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('165', 'eutp4C8uES10:22:20', 'gemini37@wifimedia.vn', 'c1fa637e60e65ee338cff76688de1790', '37 Nguyễn Thị Định (A. Việt)', 'GeminiCoffee', '0936878886 ', '2', '1', '2015-11-04 08:52:51', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('166', 'Pp8dQk563l10:29:18', 'cangtinthanglong@wifimedia.vn', '266f56ceaef6561beaeea9e834d0be63', 'Ms Hoài', 'Căng tin Thăng Long', '0904858398', '2', '10', '2015-10-29 19:05:42', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('167', 'VHpmaH6dIh10:37:39', 'gemini137@wifimedia.vn', '919fdfd5d8ac2253e941b8c785671b5a', '137 Nguyễn Chí Thanh (A Thiện)', 'GeminiCoffee', '0432373039 ', '2', '1', '2015-11-04 08:52:36', '10', 'Time-Standard-Daily', '2,4', '2', '0', '', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('168', 'bvh3hRoALU10:38:36', 'gemini97@wifimedia.vn', '1133675849895c8e2525be632339e7cc', '97 Đào Tấn (A.Vũ)', 'GeminiCoffee', '0989119900 ', '2', '1', '2015-10-29 19:05:07', '10', 'Time-Standard-Daily', '2,4', '2', '0', 'network.wifimedia.vn', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('169', 'wNTl6MiyCY09:43:32', 'cangtinphuongdong@wifimedia.vn', 'ac07c0561759dc7edf0ba6ab1a0977d8', '171 Trung Kính (A.Đức)', 'Căng tin Phương Đông', '01682883309', '2', '10', '2015-10-29 19:12:16', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('171', 'ldCR2C0iZ615:12:24', 'daihoctunhien@wifimedia.vn', '52c7746ccf28036716a548f55d4dc43b', 'Nguyễn Trãi - Thanh Xuân - Ms Mai', 'Đại Học Tự Nhiên', '0904979648', '2', '10', '2015-11-02 19:14:56', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('172', 'mjImbUL6Z315:24:19', 'daihocnhanvan@wifimedia.vn', '90387ff5fcb0c231334fd3bbef3c5dc8', 'Nguyễn Trãi - Thanh Xuân - Mr Thành', 'Đại Học Nhân Văn', '0984853639', '2', '10', '2015-10-29 19:11:41', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('178', 'gfqljLXupZ21:52:47', 'cafedhy@wifimedia.vn', 'b7c16677b6d58f22d08bb747986d4bb1', 'Tôn Thất Tùng - Đống Đa (chị Hà)', 'Cafe Đại Học Y Hà Nội', '0966581586', '2', '10', '2015-10-29 19:09:48', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('179', 'phr4rRGx9k17:44:22', 'BenhvienDaiHocY@gmail.com', '6473994daea9e3ed28763ab02e767b12', 'Trường trinh - Hà Nội', 'Nhà Ăn Bệnh Viện ĐH Y', '0974552218', '2', '8', '2015-10-29 19:09:37', '11', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'MrSơn.', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('180', 'Z8ESILCngh17:51:35', 'hucbookshop@gmail.com', 'bd8f019f4b5eae965a35fd800f065cc2', '418 Đê La Thành, 42 Yết Kiêu', 'HUC Book Shop', '0943744412', '2', '10', '2015-11-17 14:17:58', '12', '2Hour-Repeat', '2,4', '2', '0', 'A.Trung, căng tin trường đại học Văn Hóa\n\nTheo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('181', 'C007gDiW5h17:54:16', 'CangtinDHCongDoan@gmail.com', '94d58314030e809f27b119c6a6152d60', 'Tây Sơn - Đống Đa', 'Căng Tin DH Công Đoàn', '0944560588', '2', '10', '2015-10-29 19:09:09', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'A.Hoàng\nTheo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '4', '0', '2', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('184', 'GulzeXTKpn19:43:39', 'daihocmythuatcongnghiep@wifimedia.vn', '77cd46b00c1ca7d2748fe3af5a466b41', 'Đê La Thành', 'ĐH Mỹ Thuật Công Nghiệp', '0902137782', '2', '10', '2015-10-29 19:08:48', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('185', 'xNo3udZI8m19:45:23', 'tainguyenvamoitruong@wifimedia.vn', '67cbc030491a208c6fb6c0ea21fb7966', 'Phú Diễn - Bắc Từ Liêm', 'ĐH Tài Nguyên Và Môi Trường', '0984891234', '2', '10', '2015-10-29 19:08:39', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'Theo dõi lượng trafic đến network.wifimedia.vn', '2', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('186', 'arsfj94miK08:35:41', 'nhaandaihocthuongmai@wifimedia.vn', 'd923c73b40f515ef4620fc085ecdf210', 'Nhà ăn đại học Thương Mại - Chị Thanh', 'Đại học Thương Mại', '0915485648', '2', '10', '2015-11-06 08:58:47', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('187', 'tBmmukzevV08:37:06', 'cangtindaihocthuongmai@wifimedia.vn', '01d86b7d5f88a9d38c0bc4a4e199026d', 'Căng tin Đại Học Thương Mại-Chị Phương', 'Đại Học Thương Mại', '0979933319', '2', '10', '2015-11-06 08:58:30', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('188', 'iauIHPvGwC08:51:27', 'Benhvienhadong@wifimedia.vn', 'e77660d1799772cad584e3e6601dd758', 'Số 2 Bế Văn Đàn - Hà Đông - A Tuấn Anh ', 'Bệnh Viện Đa Khoa Hà Đông', '0934585144', '2', '10', '2015-10-31 08:55:18', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '4', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('189', 'qieU381bIP09:05:22', 'benhvienk@wifimedia.vn', 'c8e2bdffd327a8df3e3533f6ebfd963a', 'Quán Sứ - Hoàn Kiếm - Nguyễn Xuân Nhật', 'Bệnh Viện K', '0902229835', '2', '8', '2015-11-02 19:41:09', '11', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('190', 'DHnDy08bvh10:07:16', 'cadanghanoi@wifimedia.vn', '49efb9549cd27a261701127e5367c6fe', 'Hoàng Quốc Việt - Cầu Giấy', 'Cao Đẳng Du Lịch Hà Nội', '0988355799', '2', '10', '2015-11-02 10:07:16', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('191', 'LxNrdORz9P19:27:10', 'daihocluat@wifimedia.vn', '23107a3d2b3ae7d372a33044aab8b7da', '87 Nguyễn Chí Thanh - Ms Nhiên', 'Đại Học Luật', '0985027968', '2', '10', '2015-11-02 19:29:59', '12', 'Time-Standard-45Minute-Repeat', '', '1', '0', '', '0', '1', '0', '3', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('192', 'NWV8z5JYBM23:51:16', 'tralasen@wifimedia.vn', '6b44a9a7a1461afac6f53643ebcf11ff', 'CT2-C2 VOV', 'Trà Lá Sen', '0966189918', '2', '1', '2015-12-30 03:28:47', '16', 'Time-Standard-45Minute-Repeat', '', '1', '2', 'Chạy quảng cáo trà lá sen', '1', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('193', 'd1ND4g3XaZ08:12:39', 'abc@abc.com', '4adcca49b3b1e5a08ac202f5d5a9e688', 'abc@abc.com', 'abc@abc.com', '0987439567', '2', '1', '2015-11-05 08:12:39', '15', 'Education', '', '1', '0', 'abc@abc.com', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('205', 'z2GTcLt3fC08:46:00', 'benhvienlaophoi@wifimedia.vn', '5d8d378bee8371c48afb0a6fca36429e', '463 Hoàng Hoa Thám - Mr Thanh', 'Căng Tin Bệnh Viện Lao Phổi Trung Ương', '0982353586', '2', '8', '2015-11-20 18:57:40', '11', '1Hour-Repeat', '', '1', '3', '', '0', '1', '0', '4', '0', '1', '0', '1', '0', '0');
INSERT INTO `sys_user` VALUES ('206', 'bQlo24N9mj08:55:54', 'bototayninh@wifimedia.vn', '478b6e5f00afa3db4df6e8d5cee706d4', '56 Linh Đường - Hoàng Mai - Anh Tiến', 'Bò Tơ Năm Sánh 56', '0973785605', '2', '4', '2015-11-22 22:39:24', '10', '1Hour-Repeat', '', '1', '0', '', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('207', 'JkwnyRDXn710:08:33', 'cafegil@wifimedia.vn', '4b99a8159a62d885cb4d78e3b55fb251', '7A Phố Huế - Anh Giang', 'Cafe Gil\'s', '0965881560', '2', '1', '2015-11-24 10:08:33', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('208', 'PyCla8psYW10:13:21', 'Mishaghi69@wifimedia.vn', '5fde39a2cfbe654a8f0a6b2bb4e9d7af', '69 Trần Duy Hưng -  A.Cường', 'Nhà Hàng Mishaghi', '01292815555', '2', '1', '2015-11-24 10:13:21', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '8', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('209', 'V3vCrI2HVj10:17:39', 'mishagi97@wifimedia.vn', '00ae5f47de1de613e089a247d2f66b90', '97 Lò Đúc - A.Sơn', 'Nhà Hàng Mishaghi', '0914813333', '2', '1', '2015-11-24 10:19:40', '10', '1Hour-Repeat', '2,4', '2', '0', '', '0', '1', '0', '5', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('210', 'UjTvvnIFwm03:30:07', 'manh01@gmail.com', 'b2df405b4a66402a9077ca2ea61ec7af', 'manh01@gmail.com', 'manh01@gmail.com', '0932393066', '2', '1', '2015-11-27 03:30:07', '15', 'Time-Standard-1Hour', '', '1', '0', 'manh01@gmail.com', '1', '1', '0', '5', '1200', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('211', 'YFVSRiCb2m03:30:24', 'manh02@gmail.com', 'f23c54c1df090df1c52e9b9cf9975b51', 'manh02@gmail.com', 'manh02@gmail.com', '0932393066', '2', '1', '2015-11-27 03:30:24', '15', 'Time-Standard-1Hour', '', '1', '0', 'manh02@gmail.com', '1', '1', '0', '4', '2000', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('212', 'stHNAI1ipG03:30:44', 'manh03@gmail.com', 'd25e9d43b48be4fd336959306199842b', 'manh03@gmail.com', 'manh03@gmail.com', '0932393066', '2', '1', '2015-11-27 03:30:44', '15', 'Time-Standard-1Hour', '', '1', '0', 'manh03@gmail.com', '1', '1', '0', '4', '2000', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('213', 'LgSkk7Biv108:45:27', 'manhtest@gmail.com', 'ac708b77a1eb90264488ce057cdd1612', 'manhtest@gmail.com', 'manhtest@gmail.com', '0932393066', '2', '1', '2016-04-01 09:57:43', '15', 'Time-Standard-1Hour', '', '1', '1', '', '0', '1', '1', '5', '0', '0', '0', '0', '213', '0');
INSERT INTO `sys_user` VALUES ('214', 'dXcCf4lT5o04:15:23', 'dungghe@gmail.com', '0595fccc9f748e1bd349f14c18751497', 'dungghe@gmail.com', 'dungghe@gmail.com', '0989111222', '2', '1', '2016-01-04 10:10:15', '15', 'Time-Standard-1Hour', '', '1', '0', '', '0', '1', '0', '6', '0', '0', '1', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('215', 'EBdhEO1j7d03:14:06', 'testqc@gmail.com', 'a5859cad3065029071c656b48c111cea', 'testqc@gmail.com', 'testqc@gmail.com', '0989111222', '2', '1', '2015-12-25 11:54:55', '15', 'Time-Standard-1Hour', '', '1', '0', '', '1', '1', '0', '4', '1200', '0', '1', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('216', 'B5ZI89y9Ym03:00:33', 'check@gmail.com', '4ba4a30b1efff2cd600744948a622f3a', 'check@gmail.com', 'Nhà Hàng Thượng Hải', '0989111222', '2', '0', '2016-01-25 05:11:33', '15', 'Time-Standard-45Minute-Repeat', '', '1', '0', 'checkface@gmail.com', '0', '1', '0', '6', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('217', 'qG1jPReT9210:16:20', 'checkface@gmail.com', 'dce4fb569f8569726ca55d330c7ba164', 'checkface@gmail.com', 'checkface@gmail.com', '0989111222', '2', '1', '2015-12-26 06:07:27', '15', 'Time-Standard-1Hour', '', '1', '0', '', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('224', 'j3brm9cFF905:54:22', 'checknew12@gmail.com', '347f02ce961011449f42dd414f186678', 'checknew@gmail.com', 'checknew12@gmail.com', '0932393066', '2', '1', '2016-01-28 07:12:25', '15', 'Time-Standard-1Hour', '', '1', '0', 'checknew@gmail.com', '1', '1', '0', '4', '1000', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('225', 'LnPPC6N0wr07:12:42', 'manhcheck@gmail.com', 'b51c4ccbb4fb17db6ee6cdefb8464217', 'manhcheck@gmail.com', 'manhcheck@gmail.com', '0932393066', '2', '1', '2016-07-06 04:09:28', '0', 'Time-Standard-1Hour', '', '0', '1', '', '0', '1', '0', '6', '0', '0', '0', '0', '234', '0');
INSERT INTO `sys_user` VALUES ('226', '4TLfaNsXeC07:14:14', 'manhchekc1@gmail.com', '509fd8bd35290724a82b4194419a14c3', 'manhchekc1@gmail.com', 'manhchekc1@gmail.com', '0932393066', '2', '0', '2016-03-08 03:28:21', '0', 'Time-Standard-1Hour', '', '0', '0', 'manhchekc1@gmail.com', '0', '1', '0', '1', '0', '0', '0', '0', '226', '362');
INSERT INTO `sys_user` VALUES ('230', 'pEwYHWLHBA10:10:05', 'thietbi2@gmail.com', 'e1f2b3c2a76b7e272917358bd84cbe5f', 'thietbi2@gmail.com', 'thietbi2@gmail.com', '0932393066', '3', '1', '2016-01-29 10:10:05', '0', 'Time-Standard-1Hour', '', '0', '0', '', '0', '1', '0', '6', '0', '0', '0', '0', '230', '0');
INSERT INTO `sys_user` VALUES ('229', 'Ow4KNR2vit12:22:20', 'thietbi1@gmail.com', '31217e7fd328ce791aa92e94fe593070', 'thietbi1@gmail.com', 'thietbi1@gmail.com', '0932393066', '3', '1', '2016-01-28 12:22:20', '0', 'Time-Standard-1Hour', '', '0', '0', 'thietbi1@gmail.com', '0', '1', '0', '1', '0', '0', '0', '0', '229', '0');
INSERT INTO `sys_user` VALUES ('231', 'DfmugMY73710:09:15', 'manh321@gmail.com', '494aa6e0d6c1490974476117c48209ac', 'manh321@gmail.com', 'manh321@gmail.com', '0932393066', '2', '0', '2016-03-05 03:11:46', '0', 'Time-Standard-1Hour', '', '0', '3', 'manh321@gmail.com', '0', '1', '0', '6', '0', '0', '0', '0', '231', '361');
INSERT INTO `sys_user` VALUES ('232', 'oBpswdCPaY12:51:00', 'manhnew@gmail.com', '93f014ac0fbc85cafd6488ed4b6c625b', 'manhnew@gmail.com', 'manhnew@gmail.com', '0932393066', '2', '1', '2016-04-01 12:51:00', '0', 'Time-Standard-1Hour', '', '0', '2', 'manhnew@gmail.com', '0', '8', '0', '8', '0', '0', '0', '0', '9', '0');
INSERT INTO `sys_user` VALUES ('233', 'mUAJxePPjL11:13:39', 'manh243@gmail.com', 'e4d484b4d78bf5256326fe088cdf2c88', 'manh243@gmail.com', 'manh243@gmail.com', '0932393066', '2', '1', '2016-07-08 04:45:06', '0', 'Time-Standard-1Hour', '', '0', '0', '', '0', '8', '0', '2', '0', '0', '0', '0', '234', '0');
INSERT INTO `sys_user` VALUES ('234', 'iCb2mD2stH05:02:22', 'manh23@gmail.com', '5103f2d65b7bc8d2baa98bfb1ec2678e', 'manh23@gmail.com', 'manh23@gmail.com', '0932393066', '1', '0', '2016-06-02 13:08:26', '0', 'Time-Standard-1Hour', '', '0', '0', 'qqq', '0', '1', '0', '0', '0', '0', '0', '0', '0', '276');
INSERT INTO `sys_user` VALUES ('236', '6JLy1ijVPK04:23:01', 'fm1@gmail.com', 'f1b0fdd1eeb120d5aa72d3df0e3f0195', 'fm1@gmail.com', 'fm1@gmail.com', '0932393066', '2', '1', '2016-07-06 04:24:22', '0', 'Time-Standard-1Hour', '', '0', '0', '', '0', '1', '0', '2', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('237', 'd9vkAx2p9R04:45:52', 'manhcheck2@gmail.com', 'd625503face70de044fb5bc774638491', 'manhcheck2@gmail.com', 'manhcheck2@gmail.com', '0932393066', '2', '1', '2016-07-11 04:45:52', '0', 'Time-Standard-1Hour', '', '0', '0', 'manhcheck2@gmail.com', '0', '7', '0', '0', '0', '0', '0', '0', '237', '0');
INSERT INTO `sys_user` VALUES ('238', 'BlkNrrGUKp04:47:22', 'manhcheck3@gmail.com', 'dc9d922202430bdff711b2bf505bc60e', 'manhcheck3@gmail.com', 'manhcheck3@gmail.com', '0932393066', '2', '1', '2016-07-11 04:47:22', '0', 'Time-Standard-1Hour', '', '0', '1', 'manhcheck3@gmail.com', '0', '1', '0', '0', '0', '0', '0', '0', '238', '0');
INSERT INTO `sys_user` VALUES ('239', 'HRC5Z7QV3s05:37:27', 'manh21@gmail.com', 'a4d043dded37dbf3de71430f7018c520', 'manh21@gmail.com', 'manh21@gmail.com', '0932393066', '2', '1', '2016-09-29 05:37:27', '0', 'Time-Standard-1Hour', '', '0', '0', 'manh21@gmail.com', '0', '1', '0', '0', '0', '0', '0', '0', '239', '0');
INSERT INTO `sys_user` VALUES ('243', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 06:41:38', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('242', '', 'administrator', '', '', '', '', '0', '0', '2017-01-13 06:37:24', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('244', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 06:52:45', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('245', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 07:06:11', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('247', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 09:27:44', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('248', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 09:29:06', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('249', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 09:29:08', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('250', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 09:29:47', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('251', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 09:30:49', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('252', 'XMTAKJPhPH51', 'manhcheck243@gmail.com', '4504120467a7efd00dea14b194d1b4b1', 'manhcheck243@gmail.com', 'manhcheck243@gmail.com', '0912345678', '2', '0', '2017-01-13 10:29:09', '0', '', '', '0', '0', '', '0', '10', '0', '0', '0', '0', '0', '0', '252', '0');
INSERT INTO `sys_user` VALUES ('253', 'administrator', '', '', '', '', '', '0', '0', '2017-01-13 10:30:56', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user` VALUES ('254', 'checkrichmedia', '', '', '', '', '', '0', '0', '2017-01-16 07:45:29', '0', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'table for users',
  `status` int(2) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `delete_flag` varchar(4) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(2) NOT NULL,
  `landingpage_id` int(12) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Dev_1', 'dev1@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644301', 'Số 244A, Lê Trọng Tấn, Khương Mai, Thanh Xuân, HN', '1', '12', '2017-09-06 04:30:36', '2017-09-06 17:39:17');
INSERT INTO `users` VALUES ('2', '1', 'Dev_2', 'dev2@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644120', 'Số 2 (nhà 48) Giảng Võ, Quận Đống Đa, Hà Nội', '1', '12', '2017-09-06 04:31:55', '2017-09-06 04:31:55');
INSERT INTO `users` VALUES ('3', '1', 'Dev_3', 'dev3@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644301', 'Email: info@dantri.com.vn. Website: http://www.dantri.com.vn ', '2', '9', '2017-09-06 04:33:15', '2017-09-06 04:33:15');
INSERT INTO `users` VALUES ('4', '1', 'Dev_4', 'dev4@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644301', 'Số 244A, Lê Trọng Tấn, Khương Mai, Thanh Xuân, HN', '1', '11', '2017-09-06 04:34:44', '2017-09-10 16:31:48');
INSERT INTO `users` VALUES ('5', '1', 'Dev_5', 'dev5@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '123456258', 'VP Giao dịch: P17.1, Tòa Nhà CT2, VIMECO, Trung Hòa, Cầu Giấy, Hà Nội', '2', '12', '2017-09-06 04:48:25', '2017-09-06 18:12:00');
INSERT INTO `users` VALUES ('6', '0', 'dev_6', 'dev6@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644301', 'Ha noi viet nam', '1', '12', '2017-09-10 15:54:16', '2017-09-10 16:29:39');
INSERT INTO `users` VALUES ('7', '0', 'dev10', 'dev10@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '123123', '2223', '2', null, '2017-09-11 03:29:38', '2017-09-11 03:29:38');
INSERT INTO `users` VALUES ('8', '0', 'dev7', 'dev7@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '456456456', 'VPGD: 86B Lê Hồng Phong - TP.Vinh - Nghệ An', '1', null, '2017-09-11 03:30:49', '2017-09-11 03:30:49');
INSERT INTO `users` VALUES ('18', null, 'Thai Restaurant Vincom', 'thairestauranvincom@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1658618406', '191 Bà Triệu (Bên cô Phương)', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('19', null, 'Thai Restaurant Thai Thinh', 'thairestauranthaithinh@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '934683535', '96 Thái Thịnh (chị Quỳnh)', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('20', null, 'Căng tin xây dựng', 'Cangtinxaydung@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '984592686', 'Đường Giải Phóng (chị Giang)', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('21', null, 'Nhà Hàng Quê Choa ', 'quechoa@wifimedia.com.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '942059996', '16 Thọ Tháp (anh Tiến)', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('22', null, 'Pattaya62 Trần Hưng Đạo', 'pattaya62@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '989081845', '62 Trần Hưng Đạo', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('23', null, 'Pattaya30 Phan Bội Châu', 'pattaya30@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '989081845', '30 Phan Bội Châu', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('24', null, 'Công ty PTS', 'ncptankyna@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '913709290', 'VPGD: 86B Lê Hồng Phong - TP.Vinh - Nghệ An', '2', null, '2017-09-13 03:27:04', '2017-09-14 19:25:51');
INSERT INTO `users` VALUES ('25', null, 'Căng tin Ngoại Thương', 'Cangtinngoaithuong@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '972864486', '91 Chùa Láng (Chị Nguyệt)', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('26', null, 'Demo Oto', 'demooto@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '966189918', 'CT2-C2 VOV', '2', null, '2017-09-13 03:27:04', '2017-09-13 03:27:04');
INSERT INTO `users` VALUES ('27', null, 'Công ty tin học Phi Dũng', 'pdc@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '914848666', '116 Đường Hưng Yên - Nam Định (chú Dũng)', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('28', null, 'Default', 'info@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '966189918', '47 Vũ Trọng Phụng', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('29', null, 'Khôi Nguyên Cafe', 'khoinguyen@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '962849168', '18 Khương Hạ', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('30', null, 'SPa Huyền', 'lamdep@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '966189918', 'CT2-C2 VOV', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('31', null, 'Nhà Hàng ldivo', 'ildivo@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1635075281', '03 Hồ Đắc Di', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('32', null, 'Coffee HG', 'hg@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '984728351', '187 Tây Sơn', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('33', null, 'Nhà Hàng Lotus', 'lotus@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '942316357', 'Số 9 Đào Duy Anh', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('34', null, 'Nhà hàng Thượng Hải', 'nhahangthuonghai@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '984462760', '231 Nguyễn Trãi', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('35', null, 'Cafe Mộc Lâm', 'coffeemoclam@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '903287726', '41 ngách 152 ngõ Xã Đàn 2 - Nam Đồng', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('36', null, 'Cafe Bông', 'coffeebong@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '438529452', '65 ngách 152 ngõ xã đàn 2 - Nam Đồng', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('37', null, 'Phòng Trà Số 1', 'phongtra@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '988888883', '42 Nam Đồng', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('38', null, 'Nail Coffee', 'nailcoffee@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '979791159', '160 Xã Đàn', '2', null, '2017-09-13 03:27:05', '2017-09-13 03:27:05');
INSERT INTO `users` VALUES ('39', null, 'Thai Restaurant', 'thairestaurant@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '981960513', ' B2 R4 – Gian Hàng 35-36 (chị Nga)', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('40', null, 'Nhà Hàng Nam Việt', 'namviet@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '989889986', 'B11 Lương Đình Của', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('41', null, 'Đại học Thủ Đô', 'daihocthudo@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1669745678', 'Dương Quảng hàm - A.Phương', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('42', null, 'Nhà Hàng Phúc Thọ', 'phuctho@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '989600619', '163 xã đàn', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('43', null, 'Đại Học Hà Nội', 'daihohanoi@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '936165689', 'Nguyễn Trãi - Thanh Xuân - Mr Cường', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('44', null, 'Nhà Hàng Cơm Gấu', 'comgau@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '935262333', '176 Xã Đàn', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('45', null, 'Coffee Tít', 'coffeetit@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1646976330', '257 Xã Đàn', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('46', null, 'Salon Nice', 'salon@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '964329996', '155 Hồ Đắc Di', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('47', null, 'Coffee Chảnh', 'coffeechanh@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '973863333', 'Số 2 ngõ 18 Huỳnh Thúc Kháng', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('48', null, 'Cafe Chăm Sóc Xe Hơi T&N', 'tn@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1644155555', '502 Xã Đàn', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('49', null, 'Bệnh Viện Việt Đức', 'benhvienvietduc@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '983911983', 'Quán Sứ - Hoàn Kiếm - Cô Lý', '2', null, '2017-09-13 03:27:06', '2017-09-13 03:27:06');
INSERT INTO `users` VALUES ('50', null, 'Mì Hàn Quốc', 'mihanquoc@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '982508522', '192 trần duy hưng  (A.Hùng)', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('51', null, 'Trà Lá Sen', 'tralasenTH@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '987439567', 'CT2-C2 VOV', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('52', null, 'Coffee Havana', 'havana@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '936661987', '50 Nguyễn Chí Thanh', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('53', null, 'Dance Colors', 'Dancecolors@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1213191999', 'Trường cao đẳng múa VN ( Mai Dịch, Cầu Giấy )', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('54', null, 'PHÒNG KHÁM ĐÔNG Y HOÀNG NAM', 'phongkham@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '916992986', 'Số nhà 22 ngõ 81/35 Linh Lang Đào Tân - Ba Đình - Hà Nội', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('55', null, 'Cafe Phố', 'cafepho@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '964498080', '39b9 vũ ngọc phan', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('56', null, 'Căng tin DH Thủy Lợi', 'daihocthuyloi@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '914885761', '175 Tây Sơn Đống Đa - Ms Thơm', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('57', null, 'Góc Cafe', 'goccafe@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '903410155', '161 chùa láng', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('58', null, 'Cafe Phương Liên', 'cafephuonglien@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '903410155', '161 chùa láng', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('59', null, 'Cafe 61', 'cafe61@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '986526688', '61 Trần Quang Diệu', '2', null, '2017-09-13 03:27:07', '2017-09-16 11:14:09');
INSERT INTO `users` VALUES ('60', null, 'Quán Hay', 'quanhay@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '987439567', '46 võ thị sáu', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('61', null, 'Cafe Cây Dồi', 'cafecaydoi@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '913008223', '112 d11 Thái Thịnh', '2', null, '2017-09-13 03:27:07', '2017-09-13 03:27:07');
INSERT INTO `users` VALUES ('62', null, 'Nhà Hàng Vườn Hồng', 'vuonhong@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1654094898', '22 Nguyễn Khang - Chị Phượng', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('63', null, 'Cafe Việt Sun', 'cafevietsun@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '904686869', '70 Trần Quang Diệu', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('64', null, 'Bệnh Viện Thanh Nhàn', 'benhvienthanhnhan@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '915691821', '42 Thanh Nhàn - Anh Sơn', '2', null, '2017-09-13 03:27:08', '2017-09-16 11:14:04');
INSERT INTO `users` VALUES ('65', null, 'Cafe Cây Si', 'cafecaysi@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1653176968', '10 Phạm Huy Thông (a.Thắng)', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('66', null, 'Cafe Khanh', 'cafekhanh@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '948282138', '69 Thái Thịnh', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('67', null, 'Cafe Chi', 'cafechi@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '988750719', '8A Phạm Huy Thông', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('68', null, 'Drink Book', 'drinkbook@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '987439567', 'chưa cập nhật', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('69', null, 'Bia Tiệp Trúc Viên', 'biatiep@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '904976156', '40 Trần Duy Hưng', '2', null, '2017-09-13 03:27:08', '2017-09-16 11:13:54');
INSERT INTO `users` VALUES ('70', null, 'Cafe Bụi ', 'cafebui@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '988455886', '115 M1/91 Nguyễn Chí Thanh', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('71', null, 'Java Gaden', 'javagaden@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '942450608', 'Số 2 ngõ 18 Nguyên Hồng', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('72', null, 'Cafe66', 'cafe66@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '945365558', '66 ngõ 20 Huỳnh Thúc Kháng (Chị Thoan)', '2', null, '2017-09-13 03:27:08', '2017-09-13 03:27:08');
INSERT INTO `users` VALUES ('73', null, 'Cafe Amis', 'cafeamis@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '933666882', '46 Phạm Huy Thông (A.Mạnh)', '2', null, '2017-09-13 03:27:08', '2017-09-16 11:34:56');
INSERT INTO `users` VALUES ('74', null, 'Cafe Ca Nhạc', 'cafecanhac@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '983821954', '34 Phạm Huy Thông', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('75', null, 'Bia Hơi Thành Long', 'biahoithanhlong@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '983835383', 'Phạm Huy Thông', '2', null, '2017-09-13 03:27:09', '2017-09-16 11:13:50');
INSERT INTO `users` VALUES ('76', null, 'Cafe Nghị', 'cafenghi@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '912692833', '78 Phạm Huy Thông (A.Ngọc Anh)', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('77', null, 'Cafe Điểm Hẹn', 'cafediemhen@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '936017881', '170 Hoàng Ngân', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('78', null, 'Cafe Hải Vân', 'cafehaivan@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1687851959', '38 Phạm Huy Thông', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('79', null, 'Cafe Quang', 'cafequang@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '932388375', '92 Phạm Huy Thông', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('80', null, 'Cafe Mộc', 'cafemoc@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '979375618', '129B Nguyễn Ngọc Vũ (C.KimAnh)', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('81', null, 'My Coffee', 'mycoffee@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '989581798', '62 hoàng cầu mới ', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('82', null, 'Cafe Đam Mê', 'cafedamme@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '912007029', '162 Hào Nam', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('83', null, 'Bệnh Viện Phụ Sản Hà Nội', 'benhvienphusan@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '983911983', 'Đê La Thành - Cô Lý', '2', null, '2017-09-13 03:27:09', '2017-09-16 11:13:59');
INSERT INTO `users` VALUES ('84', null, 'Cafe Lê Vũ', 'levucoffee@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '904705555', '23 lô 13B Trung Hòa', '2', null, '2017-09-13 03:27:09', '2017-09-13 03:27:09');
INSERT INTO `users` VALUES ('85', null, 'Cafe Bảo Anh', 'cafebaoanh@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '983384923', '126A5 Trần Huy Liệu', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('86', null, 'Cafe Linh', 'cafelinh@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '915831969', '101 C5 Trần Huy Liệu', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('87', null, 'Cafe Loan', 'cafeloan@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '943153686', '121 B1 Trần Huy Liệu', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('88', null, 'Pattaya 170 Ngọc Khánh', 'pattaya@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '915257997', '170 Ngọc Khánh', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('89', null, 'Coffee TipTop', 'cafetiptop@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '983592344', '101 c8 Trần Huy Liệu', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('90', null, 'Căng tin Y Dược Học Cổ Truyền', 'yduochoc@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '983070416', 'Nguyễn Trãi - Thanh Xuân - Ms Nguyệt', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('91', null, 'Cafe Mộc 92', 'cafemoc92@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '973721162', 'số 92 ngõ 171  Nguyễn Ngọc vũ', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('92', null, 'Camel\'s Way Coffee', 'camel@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '902288320', '19 Vũ Phạm Hàm', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('93', null, 'Gà Ngon', 'gangon@quangcaowifi.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '946481970', '55 Nguyễn Trãi', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('94', null, 'Phòng Khám Cây Thông Xanh', 'dungtd@rtccd.org.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '946567008', 'Số 39, ngõ 255 Phố Vọng, Hai Bà Trưng, Hà Nội', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('95', null, 'Anh Coffee', 'anhcoffee@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '988891985', 'NV 16 khu đô thị Trung Văn - Nam Từ Liêm', '2', null, '2017-09-13 03:27:10', '2017-09-14 16:31:38');
INSERT INTO `users` VALUES ('96', null, 'Căng Tin Mỹ Đình', 'cangtinmydinh@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '975678585', 'Hàm Nghi - Nam Từ Liêm - Anh Hiếu', '2', null, '2017-09-13 03:27:10', '2017-09-13 03:27:10');
INSERT INTO `users` VALUES ('97', null, 'Quán One', 'quanone@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '976861596', '30 Trần Đăng Ninh (anh Quyết)', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('98', null, 'Yên Hòa Trà', 'yenhoatra@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '977919918', 'G3D Vũ Phạm Hàm (anh Vũ)', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('99', null, 'Zota Beer Club', 'zotabeer@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '995555569', '52 Vũ Trọng Phụng (anh Hòa)', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('100', null, 'testrg@wifimedia.vn', 'testrg@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1234567890', 'testrg@wifimedia.vn', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('101', null, 'manh1@gmail.com', 'manh1@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '932393066', 'manh1@gmail.com', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('102', null, 'Nhà Hàng Vạn Tuế', 'nhahangvantue@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '435640285', '23 Thái Thịnh (Cô Tâm )', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('103', null, 'GeminiCoffee', 'gemini36@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '435561673', '36 Nguyễn Thị Định (A.Cường)', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('104', null, 'Căng tin Thăng Long', 'cangtinthanglong@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '904858398', 'Ms Hoài', '2', null, '2017-09-13 03:27:11', '2017-09-13 03:27:11');
INSERT INTO `users` VALUES ('105', null, 'Căng tin Phương Đông', 'cangtinphuongdong@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '1682883309', '171 Trung Kính (A.Đức)', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('106', null, 'Đại Học Tự Nhiên', 'daihoctunhien@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '904979648', 'Nguyễn Trãi - Thanh Xuân - Ms Mai', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('107', null, 'Đại Học Nhân Văn', 'daihocnhanvan@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '984853639', 'Nguyễn Trãi - Thanh Xuân - Mr Thành', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('108', null, 'Cafe Đại Học Y Hà Nội', 'cafedhy@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '966581586', 'Tôn Thất Tùng - Đống Đa (chị Hà)', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('109', null, 'Nhà Ăn Bệnh Viện ĐH Y', 'BenhvienDaiHocY@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '974552218', 'Trường trinh - Hà Nội', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('110', null, 'HUC Book Shop', 'hucbookshop@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '943744412', '418 Đê La Thành, 42 Yết Kiêu', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('111', null, 'Căng Tin DH Công Đoàn', 'CangtinDHCongDoan@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '944560588', 'Tây Sơn - Đống Đa', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('112', null, 'ĐH Mỹ Thuật Công Nghiệp', 'daihocmythuatcongnghiep@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '902137782', 'Đê La Thành', '2', null, '2017-09-13 03:27:12', '2017-09-13 03:27:12');
INSERT INTO `users` VALUES ('113', null, 'ĐH Tài Nguyên Và Môi Trường', 'tainguyenvamoitruong@wifimedia.vn', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '1', '984891234', 'Phú Diễn - Bắc Từ Liêm', '2', null, '2017-09-13 03:27:12', '2017-09-16 11:34:41');
