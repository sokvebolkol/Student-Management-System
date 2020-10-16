/*
 Navicat Premium Data Transfer

 Source Server         : MyLocal
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : sms

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 16/10/2020 18:36:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for guardians
-- ----------------------------
DROP TABLE IF EXISTS `guardians`;
CREATE TABLE `guardians`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `students_id` int(10) UNSIGNED NOT NULL,
  `father_fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `father_lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mother_fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mother_lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `guardians_students_id_foreign`(`students_id`) USING BTREE,
  CONSTRAINT `guardians_students_id_foreign` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guardians
-- ----------------------------
INSERT INTO `guardians` VALUES (1, 1, 'lyvansak', 'vansak', 'non', 'sokny', 'teacher', 'Kampong Cham', 'Cambodian', '0989847334', 'uploads/images/b88f3686cbea8ec1b937638c01228745.jpg', '2020-10-11 12:27:14', '2020-10-11 12:27:30');
INSERT INTO `guardians` VALUES (2, 3, 'doch', 'vann', 'meeng', 'nork', 'teacher', '371 Phnom Penh', 'Cambodian', '90983454', 'uploads/images/19543e0c4cf4c01e311c5d41f9fdfbc2.jpg', '2020-10-16 07:10:41', '2020-10-16 07:10:41');

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `info_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES (1, 'University Of Puthisastra', 'Phnom Penh', '0987654321', 'up@school.edu.kh', '104.91853065045099', '11.562667247309607', NULL, NULL);

-- ----------------------------
-- Table structure for libraries
-- ----------------------------
DROP TABLE IF EXISTS `libraries`;
CREATE TABLE `libraries`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subjects_id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `libraries_book_name_unique`(`book_name`) USING BTREE,
  INDEX `libraries_subjects_id_foreign`(`subjects_id`) USING BTREE,
  CONSTRAINT `libraries_subjects_id_foreign` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of libraries
-- ----------------------------
INSERT INTO `libraries` VALUES (1, 1, 'Erona php', 'Kol Sokvebol', '2020-10-11 19:30:38', '2020-10-11 12:32:25', '2020-10-11 12:32:25');
INSERT INTO `libraries` VALUES (2, 7, '7 habits of people', 'Sean Covey', '2020-10-16 14:03:49', '2020-10-16 07:03:53', '2020-10-16 07:03:53');
INSERT INTO `libraries` VALUES (3, 9, 'Java', 'Mr Java', '2020-10-07 14:04:32', '2020-10-16 07:04:37', '2020-10-16 07:04:37');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_08_04_120959_create_subjects_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_08_31_023612_create_students_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_05_164008_create_teachers_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_09_28_021314_create_libraries_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_10_04_080213_create_guardians_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_10_04_115121_create_my_classes_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_10_05_115534_create_info_table', 1);

-- ----------------------------
-- Table structure for my_classes
-- ----------------------------
DROP TABLE IF EXISTS `my_classes`;
CREATE TABLE `my_classes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teachers_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_close` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `my_classes_teachers_id_foreign`(`teachers_id`) USING BTREE,
  CONSTRAINT `my_classes_teachers_id_foreign` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of my_classes
-- ----------------------------
INSERT INTO `my_classes` VALUES (1, 1, 'Class A', 'sectionB', '2020-10-11 19:46:25', '2020-10-11 12:46:40', '2020-10-11 12:46:51');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `students_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 'sokvebol', 'kol', 'male', '2020-11-05 19:24:00', 'Budishm', 'sokvebol.kol@gmail.com', 'uploads/images/e15b1318b1bdb2f49b0980177b6ed698.jpg', '2020-10-11 12:23:57', '2020-10-11 12:24:18');
INSERT INTO `students` VALUES (2, 'virak', 'rim', 'male', '2020-10-07 11:42:33', 'Budishm', 'vuraj@gmail.com', 'uploads/images/8f0ab8a9ac09691c84a829edb128296a.jpg', '2020-10-12 04:42:50', '2020-10-12 04:42:50');
INSERT INTO `students` VALUES (3, 'samai', 'doch', 'female', '2020-10-14 11:43:11', 'Cristan', 'sam@gmail.com', 'uploads/images/84e69aa0f383e6793acf234a8a89768b.jpg', '2020-10-12 04:43:57', '2020-10-12 04:43:57');
INSERT INTO `students` VALUES (4, 'ronaldo', 'cristain', 'male', '2020-10-14 13:55:59', 'Cristan', 'ronaldo@gmail.com', 'uploads/images/f16b8904e3228c097d00c34d73384e75.jpg', '2020-10-16 06:56:35', '2020-10-16 06:56:35');
INSERT INTO `students` VALUES (5, 'asensio', 'marco', 'male', '2020-10-20 13:58:35', 'Cristan', 'asensio@gmail.com', 'uploads/images/775df8030d16c27c4c922e372f848394.jpg', '2020-10-16 06:59:47', '2020-10-16 06:59:47');

-- ----------------------------
-- Table structure for subjects
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES (1, 'Laravel (PHP)', 'three', '2020-10-11 12:24:48', '2020-10-11 12:24:48');
INSERT INTO `subjects` VALUES (2, 'Oracle', 'three', '2020-10-11 12:25:11', '2020-10-11 12:25:11');
INSERT INTO `subjects` VALUES (3, 'CT', 'two', '2020-10-12 04:59:24', '2020-10-12 04:59:24');
INSERT INTO `subjects` VALUES (4, 'React Native', 'three', '2020-10-16 07:01:20', '2020-10-16 07:01:20');
INSERT INTO `subjects` VALUES (5, 'Android', 'three', '2020-10-16 07:01:32', '2020-10-16 07:01:32');
INSERT INTO `subjects` VALUES (6, 'Firebase', 'one', '2020-10-16 07:01:53', '2020-10-16 07:01:53');
INSERT INTO `subjects` VALUES (7, 'Biology', 'two', '2020-10-16 07:02:14', '2020-10-16 07:02:14');
INSERT INTO `subjects` VALUES (8, 'Python', 'three', '2020-10-16 07:02:33', '2020-10-16 07:02:33');
INSERT INTO `subjects` VALUES (9, 'Java', 'three', '2020-10-16 07:02:59', '2020-10-16 07:02:59');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subjects_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `teachers_email_unique`(`email`) USING BTREE,
  INDEX `teachers_subjects_id_foreign`(`subjects_id`) USING BTREE,
  CONSTRAINT `teachers_subjects_id_foreign` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, 1, 'sammy', 'oudom', 'male', '2020-10-11 19:25:44', '371 Phnom Penh', '90618443', 'Budishm', 'oudome@gmail.com', 'uploads/images/b1004b04019926ddd4a3e75a7467d4a2.jpg', '2020-10-11 12:26:11', '2020-10-11 12:26:22');
INSERT INTO `teachers` VALUES (2, 3, 'sreysros', 'ly', 'male', '2020-10-06 14:05:24', '371 Phnom Penh', '08976544', 'Cristan', 'ly@gmail.com', 'uploads/images/9b4d7893f7b095faf24ec11107761d19.jpg', '2020-10-16 07:06:30', '2020-10-16 07:06:30');
INSERT INTO `teachers` VALUES (3, 4, 'Nyvan', 'rose', 'female', '2020-10-16 14:08:25', 'Posat province', '069675745', 'Budishm', 'ronaldo@gmail.com', 'uploads/images/998c5e410202dbfeb30a089109478dd4.jpg', '2020-10-16 07:08:34', '2020-10-16 07:08:34');
INSERT INTO `teachers` VALUES (4, 5, 'Phen', 'Sok', 'male', '2020-10-11 14:09:01', '371 Phnom Penh', '0697967967', 'Budishm', 'sok@gmail.com', 'uploads/images/51726f51a91cd7ebb7009573b999e59d.jpg', '2020-10-16 07:09:22', '2020-10-16 07:09:22');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'sokvebol kol', 'sokvebol.kol@gmail.com', NULL, '$2y$10$XjIzYC.ymWYLlAPqLeie.euw.uW5A8sx4cjSESNqu3JtP8U3CyWfy', NULL, '2020-10-11 12:23:22', '2020-10-11 12:23:22');
INSERT INTO `users` VALUES (2, 'asensio', 'asensio@gmail.com', NULL, '$2y$10$qB3ME6.JdZNKUm9cOTvQYuY03VWO0lgtirrP53orXH5OVBODG60Rq', NULL, '2020-10-16 07:11:53', '2020-10-16 07:11:53');
INSERT INTO `users` VALUES (3, 'ronaldo', 'ronaldo@gmail.com', NULL, '$2y$10$qk2jc8.Cj9MlNc0zzMba4.m/UduzYCa0N4m6cZ/ECLSc9gIwbe8Ae', NULL, '2020-10-16 07:12:43', '2020-10-16 07:12:43');
INSERT INTO `users` VALUES (4, 'virak rim', 'virak@gmail.com', NULL, '$2y$10$0vf0dHnjey4fP7/EUXFwceqwY/ZrXupeNMRkH8S4K5rZgz8.GID4.', NULL, '2020-10-16 07:13:19', '2020-10-16 07:13:19');
INSERT INTO `users` VALUES (5, 'samai doch', 'samai@gmail.com', NULL, '$2y$10$8GzK8eqbNwlYz4mEhknfBu7NepYp/pv1/ZHTDUPmxp3JCu.8FTdhi', NULL, '2020-10-16 07:14:33', '2020-10-16 07:14:33');
INSERT INTO `users` VALUES (6, 'pho seth', 'seth@gmail.com', NULL, '$2y$10$s0TDMfWys42n38DMeVy3ZOchehMje/V9QdVu.dyXWgdiaCVyvl0rW', NULL, '2020-10-16 07:15:41', '2020-10-16 07:15:41');
INSERT INTO `users` VALUES (7, 'virak koko', 'virak.rim116@gmail.com', NULL, '$2y$10$zr8ohe2IfMFYCSqKhqPEhOUQguGsaIqrRc4ENaG3SQkBbtNGrMNdy', NULL, '2020-10-16 11:29:25', '2020-10-16 11:29:25');

SET FOREIGN_KEY_CHECKS = 1;
