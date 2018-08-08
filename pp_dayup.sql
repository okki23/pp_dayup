/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : pp_dayup

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 06/08/2018 10:09:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_admin_hrd
-- ----------------------------
DROP TABLE IF EXISTS `m_admin_hrd`;
CREATE TABLE `m_admin_hrd`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for m_akun_admin_hrd
-- ----------------------------
DROP TABLE IF EXISTS `m_akun_admin_hrd`;
CREATE TABLE `m_akun_admin_hrd`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin_hrd` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_akun_admin_hrd
-- ----------------------------
INSERT INTO `m_akun_admin_hrd` VALUES (1, 'karlina', 'YQ==', NULL);

-- ----------------------------
-- Table structure for m_akun_pelamar
-- ----------------------------
DROP TABLE IF EXISTS `m_akun_pelamar`;
CREATE TABLE `m_akun_pelamar`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_akun_pelamar` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_akun_pelamar
-- ----------------------------
INSERT INTO `m_akun_pelamar` VALUES (1, 'karlina', 'YQ==', NULL);
INSERT INTO `m_akun_pelamar` VALUES (5, 'okki', 'YQ==', 6);

-- ----------------------------
-- Table structure for m_akun_superadmin
-- ----------------------------
DROP TABLE IF EXISTS `m_akun_superadmin`;
CREATE TABLE `m_akun_superadmin`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_akun_superadmin
-- ----------------------------
INSERT INTO `m_akun_superadmin` VALUES (1, 'zahro', 'YQ==');

-- ----------------------------
-- Table structure for m_akun_supervisor
-- ----------------------------
DROP TABLE IF EXISTS `m_akun_supervisor`;
CREATE TABLE `m_akun_supervisor`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_supervisor` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_akun_supervisor
-- ----------------------------
INSERT INTO `m_akun_supervisor` VALUES (1, 'karlina', 'YQ==', NULL);

-- ----------------------------
-- Table structure for m_email
-- ----------------------------
DROP TABLE IF EXISTS `m_email`;
CREATE TABLE `m_email`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipe_pesan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_assign` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_assign` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for m_lowongan
-- ----------------------------
DROP TABLE IF EXISTS `m_lowongan`;
CREATE TABLE `m_lowongan`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lowongan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tanggal_terbit` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_lowongan
-- ----------------------------
INSERT INTO `m_lowongan` VALUES (1, 'Penjahitan', '<h2>WYSIWYG Editor</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>\r\n\r\n<h3>Lacinia</h3>\r\n\r\n<ul>\r\n	<li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>\r\n	<li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>\r\n	<li>Praesent non lacinia mi.</li>\r\n	<li>Mauris a ante neque.</li>\r\n	<li>Aenean ut magna lobortis nunc feugiat sagittis.</li>\r\n</ul>\r\n\r\n<h3>Pellentesque adipiscing</h3>\r\n\r\n<p>Maecenas quis ante ante. Nunc adipiscing rhoncus rutrum. Pellentesque adipiscing urna mi, ut tempus lacus ultrices ac. Pellentesque sodales, libero et mollis interdum, dui odio vestibulum dolor, eu pellentesque nisl nibh quis nunc. Sed porttitor leo adipiscing venenatis vehicula. Aenean quis viverra enim. Praesent porttitor ut ipsum id ornare.</p>\r\n', '2018-08-03 11:58:31');

-- ----------------------------
-- Table structure for m_pelamar
-- ----------------------------
DROP TABLE IF EXISTS `m_pelamar`;
CREATE TABLE `m_pelamar`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `alamat_tinggal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jenis_kelamin` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kewarganegaraan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `riwayat_pendidikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pengalaman_pekerjaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pendidikan_terakhir` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `upload_cv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_pelamar
-- ----------------------------
INSERT INTO `m_pelamar` VALUES (6, 'Okki Setyawan', NULL, 'okkisetyawan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_supervisor
-- ----------------------------
DROP TABLE IF EXISTS `m_supervisor`;
CREATE TABLE `m_supervisor`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_hasil_seleksi
-- ----------------------------
DROP TABLE IF EXISTS `t_hasil_seleksi`;
CREATE TABLE `t_hasil_seleksi`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pengujian` int(10) NULL DEFAULT NULL,
  `id_pelamar` int(10) NULL DEFAULT NULL,
  `id_hrd` int(10) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `approval_hrd` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `approval_spv` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_assign` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_lamaran
-- ----------------------------
DROP TABLE IF EXISTS `t_lamaran`;
CREATE TABLE `t_lamaran`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelamar` int(10) NULL DEFAULT NULL,
  `id_lowongan` int(10) NULL DEFAULT NULL,
  `date_assign` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_pengujian
-- ----------------------------
DROP TABLE IF EXISTS `t_pengujian`;
CREATE TABLE `t_pengujian`  (
  `id` int(10) NOT NULL,
  `id_pelamar` int(10) NULL DEFAULT NULL,
  `id_lowongan` int(10) NULL DEFAULT NULL,
  `id_supervisor` int(10) NULL DEFAULT NULL,
  `materi_uji` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_uji` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_assign` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
