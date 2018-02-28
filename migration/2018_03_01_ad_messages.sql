/*
 Navicat Premium Data Transfer

 Source Server         : Client
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : crm_wifimedia

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 01/03/2018 01:53:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ad_messages
-- ----------------------------
DROP TABLE IF EXISTS `ad_messages`;
CREATE TABLE `ad_messages`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `button_backgroud` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `button_popup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title_popup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `options` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
