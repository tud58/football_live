/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : football_live

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 06/01/2020 16:49:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads`  (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tiêu đề',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả',
  `ads_location_id` int(11) NOT NULL COMMENT 'Vị trí',
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'link đến',
  `img` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ảnh',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian cập nhật',
  `status` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Các quảng cáo' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ads_location
-- ----------------------------
DROP TABLE IF EXISTS `ads_location`;
CREATE TABLE `ads_location`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên',
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian cập nhật',
  `status` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Các vị trí quảng cáo' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for clubs
-- ----------------------------
DROP TABLE IF EXISTS `clubs`;
CREATE TABLE `clubs`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên CLB',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả',
  `status` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Logo CLB',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG cập nhật',
  `stadium_id` int(11) NULL DEFAULT NULL COMMENT 'Sân nhà',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Thông tin các CLB' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for leagues
-- ----------------------------
DROP TABLE IF EXISTS `leagues`;
CREATE TABLE `leagues`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên giải đấu',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả',
  `status` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Logo giải đấu',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG cập nhật',
  `sort` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Thông tin các giải đấu' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for leagues_clubs
-- ----------------------------
DROP TABLE IF EXISTS `leagues_clubs`;
CREATE TABLE `leagues_clubs`  (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL COMMENT 'ID CLB',
  `league_id` int(11) NOT NULL COMMENT 'ID giả đấu',
  `status` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(2) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'TG cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng map giữa các CLB và các giả đấu.\r\n1 CLB có thể tham gia nhiều giải đấu.' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for matchs
-- ----------------------------
DROP TABLE IF EXISTS `matchs`;
CREATE TABLE `matchs`  (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tiêu đề',
  `league_id` int(11) NOT NULL COMMENT 'Giải đấu',
  `club1_id` int(11) NOT NULL COMMENT 'Đội 1',
  `club2_id` int(5) NOT NULL COMMENT 'Đội 2',
  `start_time` datetime(0) NOT NULL COMMENT 'Thời gian bắt đầu',
  `stadium_id` int(11) NULL DEFAULT NULL COMMENT 'Sân vận động',
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Link trận đấu',
  `status` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Ảnh',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian cập nhật',
  `sort` int(11) NULL DEFAULT NULL,
  `url_status` int(11) NULL DEFAULT NULL COMMENT 'Trạng thái link',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for stadiums
-- ----------------------------
DROP TABLE IF EXISTS `stadiums`;
CREATE TABLE `stadiums`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên sân',
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Trạng thái',
  `deleted` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Trạng thái xóa',
  `created_by` int(5) NULL DEFAULT NULL COMMENT 'Người tạo',
  `created_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_by` int(5) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_time` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Thông tin các sân vận động' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT NULL,
  `type` int(2) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '$2y$13$HEqb.lpoxCK9V0yvM3ciN.rQn3/AeZ9Xt6GiWBmSGh0NxLJHgMqpy', 'Đinh Tú', '0979722080', 'tudinh@vega.com.vn', 1, 1, 0, '2019-12-04 09:53:54', 2, '2019-12-16 11:36:53');
INSERT INTO `user` VALUES (2, 'tech_support', '$2y$13$NLY0NyvyRPWQ8v9hPXkOsOmxASbMhv1SJAAH1fHg1NxtlN9XrWHYm', 'tech_support', '0362767702', 'tech_support@gmail.com', 1, 1, 1, '2019-12-16 11:28:45', 1, '2019-12-16 11:28:45');

SET FOREIGN_KEY_CHECKS = 1;
