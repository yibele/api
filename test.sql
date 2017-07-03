/*
 Navicat Premium Data Transfer

 Source Server         : blog
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 07/03/2017 19:18:54 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(45) DEFAULT NULL COMMENT '				',
  `act_tag` varchar(32) DEFAULT NULL,
  `act_comment` varchar(255) DEFAULT NULL,
  `act_time` datetime DEFAULT NULL,
  `act_left_user` int(11) DEFAULT NULL,
  `act_need_user` int(11) DEFAULT NULL,
  `act_now_user` int(11) DEFAULT NULL,
  `act_active` int(11) DEFAULT '1',
  `act_finished` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `act_location` varchar(255) DEFAULT NULL,
  `act_user` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `activity`
-- ----------------------------
BEGIN;
INSERT INTO `activity` VALUES ('1', '周日狼人杀走起！', '1', '【我们这样玩狼人杀】周日北二狼人杀走起！', '2017-07-01 19:00:00', '11', '12', '1', '1', '0', '2017-06-29 21:00:00', '首都师范大学北二校区 503室', 'yibele'), ('2', '周日狼人杀走起！', '2', '【我们这样玩狼人杀】周日北二狼人杀走起！', '2017-07-01 19:00:00', '11', '12', '1', '1', '0', '2017-06-29 21:00:00', '首都师范大学北二校区 503室', 'yibele'), ('3', '周日狼人杀走起！', '3', '【我们这样玩狼人杀】周日北二狼人杀走起！', '2017-07-01 19:00:00', '11', '12', '1', '1', '0', '2017-06-29 21:00:00', '首都师范大学北二校区 503室', 'yibele'), ('4', '周五狂欢，三里屯酒吧走起！', '3', '寂寞的周五还要待在宿舍王者农药吗？一起来三里屯high起来！', '2017-07-01 23:00:00', '11', '12', '1', '1', '0', '2017-07-01 19:00:00', '北京市三里屯coco酒吧', 'na'), ('5', '周五狂欢，三里屯酒吧走起！', '3', '寂寞的周五还要待在宿舍王者农药吗？一起来三里屯high起来！', '2017-07-01 23:00:00', '11', '12', '1', '1', '0', '2017-07-01 19:00:00', '北京市三里屯coco酒吧', 'naa');
COMMIT;

-- ----------------------------
--  Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tag`
-- ----------------------------
BEGIN;
INSERT INTO `tag` VALUES ('1', 'movie'), ('2', 'games'), ('3', 'club'), ('4', 'outdoor'), ('5', 'sports');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nickName` varchar(64) DEFAULT NULL,
  `avatarUrl` varchar(128) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'yibele', null, null, null), ('2', 'nahia', null, null, null), ('3', 'xiaoyao', null, null, null), ('4', 'zhuna', null, null, null), ('5', 'pingzi', null, null, null), ('8', '伊布格勒', 'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eqcXWBAsibvRl9pcLGiabibQfA7aq3Q6Dic3f0OPZyONqxgZFznHUrTOo3iccDDcuybwJphrj6Qaq8URJg/0', '18610597754', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user_act`
-- ----------------------------
DROP TABLE IF EXISTS `user_act`;
CREATE TABLE `user_act` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_act`
-- ----------------------------
BEGIN;
INSERT INTO `user_act` VALUES ('1', '1', '1', null), ('2', '1', '2', null), ('3', '2', '1', null), ('4', '2', '3', null), ('5', '3', '3', null);
COMMIT;

-- ----------------------------
--  Table structure for `user_tag`
-- ----------------------------
DROP TABLE IF EXISTS `user_tag`;
CREATE TABLE `user_tag` (
  `id` int(11) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Procedure structure for `AddGeometryColumn`
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddGeometryColumn`;
delimiter ;;
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64), t_srid int)
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end
 ;;
delimiter ;

-- ----------------------------
--  Procedure structure for `DropGeometryColumn`
-- ----------------------------
DROP PROCEDURE IF EXISTS `DropGeometryColumn`;
delimiter ;;
CREATE DEFINER=`` PROCEDURE `DropGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64))
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
