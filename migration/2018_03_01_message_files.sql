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

 Date: 01/03/2018 01:53:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for message_files
-- ----------------------------
DROP TABLE IF EXISTS `message_files`;
CREATE TABLE `message_files`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_message_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `path` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `active_flag` tinyint(1) NULL DEFAULT NULL,
  `created` datetime(0) NOT NULL,
  `modified` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
