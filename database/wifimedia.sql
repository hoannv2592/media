/*
Navicat MySQL Data Transfer

Source Server         : Client
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wifimedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-11 02:08:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adgroups
-- ----------------------------
DROP TABLE IF EXISTS `adgroups`;
CREATE TABLE `adgroups` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adgroups
-- ----------------------------
INSERT INTO `adgroups` VALUES ('1', 'Warisに登録いただくと、お仕事の検索、応募やお問合せ、Wairsに登録されている企業を閲覧することができます。', '1', 'Nhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\n', '2017-08-30 16:18:19', '2017-09-01 11:57:51');
INSERT INTO `adgroups` VALUES ('2', 'Nhom so 2', '1', 'Tên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo\r\nTên nhóm quảng cáo', '2017-08-30 16:22:01', '2017-09-05 16:42:57');
INSERT INTO `adgroups` VALUES ('3', 'Nhom so 3', '1', 'Mô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo\r\nMô tả nhóm quảng cáo', '2017-08-30 16:25:30', '2017-09-05 16:43:10');
INSERT INTO `adgroups` VALUES ('4', '営業進捗一覧', '1', '営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧\r\n営業進捗一覧', '2017-08-30 17:24:59', '2017-09-05 16:42:03');
INSERT INTO `adgroups` VALUES ('5', 'Nhom so 1', '1', 'qw', '2017-09-04 17:08:48', '2017-09-05 16:42:42');
INSERT INTO `adgroups` VALUES ('6', 'Nhom so 2', '1', 'asdasd', '2017-09-04 18:32:53', '2017-09-05 16:42:49');
INSERT INTO `adgroups` VALUES ('7', 'Nhom so 1', '1', 'SAAS', '2017-09-04 18:33:37', '2017-09-05 16:42:36');
INSERT INTO `adgroups` VALUES ('8', 'Nhom so 1', '1', 'sad', '2017-09-04 18:38:58', '2017-09-05 16:42:30');
INSERT INTO `adgroups` VALUES ('9', 'Nhom so 3', '1', 'dasdas', '2017-09-04 18:44:59', '2017-09-05 16:43:03');
INSERT INTO `adgroups` VALUES ('10', 'Nhóm quảng cáo 1', '0', 'Nhóm quảng cáo 1\r\nNhóm quảng cáo 1', '2017-09-04 18:49:15', '2017-09-05 16:41:55');
INSERT INTO `adgroups` VALUES ('11', 'Nhóm quảng cáo 2', '0', 'Nhóm quảng cáo 2\r\nNhóm quảng cáo 2', '2017-09-04 18:49:43', '2017-09-05 16:42:22');
INSERT INTO `adgroups` VALUES ('12', 'Nhóm quảng cáo 3', '0', 'Nhóm quảng cáo 3\r\nNhóm quảng cáo 3', '2017-09-05 16:43:40', '2017-09-05 16:43:40');
INSERT INTO `adgroups` VALUES ('13', 'Nhóm quảng cáo 4', '0', 'Nhóm quảng cáo 4\r\nNhóm quảng cáo 4', '2017-09-05 16:44:03', '2017-09-05 16:44:03');

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
  `user_id` int(12) NOT NULL,
  `delete_flag` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of devices
-- ----------------------------
INSERT INTO `devices` VALUES ('1', 'Thiết bị 4', '12345', '123456', '0', '2017-09-04 11:46:23', '2017-09-05 16:46:08');
INSERT INTO `devices` VALUES ('2', 'Thiết bị 2', 'xxxxxxxxxxxxxxx', '1234567890', '1', '2017-09-04 12:03:36', '2017-09-04 16:52:48');
INSERT INTO `devices` VALUES ('3', 'Thiết bị 3', 'cdfkssaqiuy', '123456789', '0', '2017-09-04 17:05:18', '2017-09-05 16:45:47');
INSERT INTO `devices` VALUES ('4', 'Thiết bị 2', '	04/09/2017 17:05', '123456545', '0', '2017-09-05 01:32:33', '2017-09-05 16:45:18');
INSERT INTO `devices` VALUES ('5', 'Thiết bị 1', '12345', '2147483647', '0', '2017-09-05 02:13:43', '2017-09-06 07:23:36');
INSERT INTO `devices` VALUES ('6', 'Thiết bị 5', 'fvmbxliek', '123456789', '0', '2017-09-05 02:16:51', '2017-09-05 16:46:39');
INSERT INTO `devices` VALUES ('7', 'Thiết bị 10D', '12356', '3', '0', '2017-09-10 18:08:45', '2017-09-10 18:45:40');
INSERT INTO `devices` VALUES ('8', 'Thiết bị 10D 2', 'AsAS', '2', '0', '2017-09-10 18:10:37', '2017-09-10 18:46:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landingpages
-- ----------------------------
INSERT INTO `landingpages` VALUES ('1', 'Nhom so 1', '1', 'Nhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\nNhom so 1\r\n', '2017-08-30 02:05:36', '2017-08-30 17:17:57');
INSERT INTO `landingpages` VALUES ('2', 'Quảng cáo 2', '1', 'The top parameter is being overridden in .modal.fade.in to force the value set in your custom declaration, add the !important keyword after top. This forces the browser to use that value and ignore any other values for the keyword. This has the drawback that you can\'t override the value anywhere else.\r\n', '2017-08-30 02:06:10', '2017-08-30 08:57:29');
INSERT INTO `landingpages` VALUES ('3', 'Quảng cáo 3', '1', 'The top parameter is being overridden in .modal.fade.in to force the value set in your ', '2017-08-30 02:06:32', '2017-08-30 08:59:17');
INSERT INTO `landingpages` VALUES ('4', 'Quảng cáo 4', '1', 'The top parameter is being overridden in .modal.fade.in to force the value set in your custom declaration, add the !important keyword after top. This forces the browser to use that value and ignore any other values for the keyword. This has the drawback ', '2017-08-30 02:06:46', '2017-08-30 08:47:51');
INSERT INTO `landingpages` VALUES ('5', 'Quảng cáo 5', '1', 'The top parameter is being overridden in .modal.fade.in to force the value set in your custom declaration, add the !important keyword after top. This forces the browser to use that value and ignore any other values for the keyword. This has the drawback', '2017-08-30 02:06:53', '2017-08-30 09:01:09');
INSERT INTO `landingpages` VALUES ('6', 'Quảng cáo 6', '1', 'Quảng cáo 6\r\nQuảng cáo 6\r\nQuảng cáo 6\r\nQuảng cáo 6', '2017-08-30 03:09:22', '2017-08-30 09:01:46');
INSERT INTO `landingpages` VALUES ('7', 'Quảng cáo 1', '0', 'Quảng cáo 1\r\nQuảng cáo 1', '2017-08-30 09:03:39', '2017-09-05 16:40:32');
INSERT INTO `landingpages` VALUES ('8', 'Quảng cáo 2', '0', 'Modal is basically a dialog box or popup window that is used to provide important information to the user or prompt user to take necessary actions before moving on', '2017-08-30 09:03:49', '2017-08-30 17:18:28');
INSERT INTO `landingpages` VALUES ('9', 'Quảng cáo 3', '0', 'Modal is basically a dialog box or popup window that is used to provide important information to the user or prompt user to take necessary actions before moving on', '2017-08-30 09:03:56', '2017-08-30 09:03:56');
INSERT INTO `landingpages` VALUES ('10', 'Quảng cáo 4', '1', 'Modal is basically a dialog box or popup window that is used to provide important information to the user or prompt user to take necessary actions before moving on', '2017-08-30 09:04:05', '2017-08-30 09:04:48');
INSERT INTO `landingpages` VALUES ('11', 'Quảng cáo 4', '1', 'Modal is basically a dialog box or popup window that is used to provide important information to the user or prompt user to take necessary actions before moving on', '2017-08-30 09:04:10', '2017-09-10 17:22:40');
INSERT INTO `landingpages` VALUES ('12', 'Quảng cáo 5', '1', 'sdf', '2017-09-05 13:38:36', '2017-09-10 17:22:36');

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
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'table for users',
  `status` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `delete_flag` varchar(4) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 NOT NULL,
  `role` tinyint(2) NOT NULL,
  `landingpage_id` int(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Dev_1', 'dev1@gmail.com', '$2y$10$RaOb4JVMdrt0THlCv1AdreZ.t4XKirOEPCcHT8efQcbR8KdEC19P6', '0', '985644301', 'Số 244A, Lê Trọng Tấn, Khương Mai, Thanh Xuân, HN', '1', '12', '2017-09-06 04:30:36', '2017-09-06 17:39:17');
INSERT INTO `users` VALUES ('2', '1', 'Dev_2', 'dev2@gmail.com', '$2y$10$XAGPDyvlzOy21yZyWXj.5enHXMVlYE40wqqGVT/FGZq7EnzAxczja', '0', '985644120', 'Số 2 (nhà 48) Giảng Võ, Quận Đống Đa, Hà Nội', '1', '12', '2017-09-06 04:31:55', '2017-09-06 04:31:55');
INSERT INTO `users` VALUES ('3', '1', 'Dev_3', 'dev3@gmail.com', '$2y$10$.XiTKJtVbIfnq3iCQ6bUOeeVocnmVEZjmm35jINVa2Ggo0SnP0ucG', '0', '985644301', 'Email: info@dantri.com.vn. Website: http://www.dantri.com.vn ', '2', '9', '2017-09-06 04:33:15', '2017-09-06 04:33:15');
INSERT INTO `users` VALUES ('4', '1', 'Dev_4', 'dev4@gmail.com', '$2y$10$UnqbiRBsEfkHdW5R.A9xBOvRRmoGQtpXZb.P/eWzgvXELPbDBWCLO', '1', '985644301', 'Số 244A, Lê Trọng Tấn, Khương Mai, Thanh Xuân, HN', '1', '11', '2017-09-06 04:34:44', '2017-09-10 16:31:48');
INSERT INTO `users` VALUES ('5', '1', 'Dev_5', 'dev5@gmail.com', '$2y$10$9psrOZgyZWoLM58gFYsEcOLQW4IAJUuo7j85t4pq1C3RP1eJcyGw.', '1', '123456258', 'VP Giao dịch: P17.1, Tòa Nhà CT2, VIMECO, Trung Hòa, Cầu Giấy, Hà Nội', '2', '12', '2017-09-06 04:48:25', '2017-09-06 18:12:00');
INSERT INTO `users` VALUES ('6', '0', 'dev_6', 'dev6@gmail.com', '$2y$10$iHFay6cHgdiGONK4iGxjS.fMozR85MDV9yoTzEDk6TtS86e1C0D2i', '1', '985644301', 'Ha noi viet nam', '1', '12', '2017-09-10 15:54:16', '2017-09-10 16:29:39');
