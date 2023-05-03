/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : turnos

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 02/05/2023 23:09:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cat_ temas
-- ----------------------------
DROP TABLE IF EXISTS `cat_ temas`;
CREATE TABLE `cat_ temas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cat_ temas
-- ----------------------------
INSERT INTO `cat_ temas` VALUES (1, 'ACLARACION', '2023-04-19 15:30:43', '2023-04-19 15:41:22');
INSERT INTO `cat_ temas` VALUES (2, 'CUENTA NUEVA', '2023-04-19 15:30:48', '2023-04-19 15:32:27');
INSERT INTO `cat_ temas` VALUES (3, 'DESCUENTO', '2023-04-19 15:30:50', '2023-04-19 15:32:30');
INSERT INTO `cat_ temas` VALUES (4, 'PAGO DE MULTAS', '2023-04-19 15:31:39', '2023-04-19 15:32:37');
INSERT INTO `cat_ temas` VALUES (5, 'PAGOS', '2023-04-21 12:32:48', '2023-04-21 12:32:48');

-- ----------------------------
-- Table structure for cat_tipos_modulos
-- ----------------------------
DROP TABLE IF EXISTS `cat_tipos_modulos`;
CREATE TABLE `cat_tipos_modulos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `active` tinyint NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cat_tipos_modulos
-- ----------------------------
INSERT INTO `cat_tipos_modulos` VALUES (1, 'ATENCION MULTIPLE', '2023-04-19 15:30:43', '2023-04-20 10:28:06', 1);
INSERT INTO `cat_tipos_modulos` VALUES (2, 'REGISTRO DE USUARIOS', '2023-04-19 15:30:48', '2023-04-20 10:28:06', 1);
INSERT INTO `cat_tipos_modulos` VALUES (3, 'CAJAS', '2023-04-19 15:30:50', '2023-04-20 10:28:06', 1);
INSERT INTO `cat_tipos_modulos` VALUES (4, 'DIRECCION COMERCIAL', '2023-04-19 15:31:39', '2023-04-20 10:28:06', 1);

-- ----------------------------
-- Table structure for centro_trabajos
-- ----------------------------
DROP TABLE IF EXISTS `centro_trabajos`;
CREATE TABLE `centro_trabajos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `active` tinyint NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of centro_trabajos
-- ----------------------------
INSERT INTO `centro_trabajos` VALUES (1, 'CENTRAL', '11', '2023-04-19 11:29:13', '2023-04-19 11:29:51', 1);
INSERT INTO `centro_trabajos` VALUES (2, 'PLANTA NORTE', '14', '2023-04-19 11:29:16', '2023-04-19 11:29:56', 1);
INSERT INTO `centro_trabajos` VALUES (3, 'PLANTA SUR', '18', '2023-04-19 11:29:19', '2023-04-19 11:30:36', 1);
INSERT INTO `centro_trabajos` VALUES (4, 'ALMACEN 4', '4', '2023-04-19 11:29:23', '2023-04-19 11:30:12', 1);
INSERT INTO `centro_trabajos` VALUES (5, 'ALMACEN 2', '5', '2023-04-19 11:29:26', '2023-04-19 11:30:11', 1);
INSERT INTO `centro_trabajos` VALUES (6, 'PLAZA  ALIANZA', '9', '2023-04-19 11:29:30', '2023-04-19 11:30:08', 1);
INSERT INTO `centro_trabajos` VALUES (7, 'HERMANOS ESCOBAR', '6', '2023-04-19 11:29:38', '2023-04-19 11:30:03', 1);
INSERT INTO `centro_trabajos` VALUES (8, 'SALVARCAR', '1', '2023-04-19 11:30:01', '2023-04-19 11:30:01', 1);

-- ----------------------------
-- Table structure for tipo_modulo_temas
-- ----------------------------
DROP TABLE IF EXISTS `tipo_modulo_temas`;
CREATE TABLE `tipo_modulo_temas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_modulo` int NULL DEFAULT NULL,
  `tema` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_modulo_temas
-- ----------------------------
INSERT INTO `tipo_modulo_temas` VALUES (1, 1, 1, '2023-04-19 15:32:58', '2023-04-19 15:32:58');
INSERT INTO `tipo_modulo_temas` VALUES (2, 2, 2, '2023-04-19 15:33:48', '2023-04-19 15:33:48');
INSERT INTO `tipo_modulo_temas` VALUES (3, 3, 5, '2023-04-21 12:33:08', '2023-04-21 12:33:08');

-- ----------------------------
-- Table structure for turnos
-- ----------------------------
DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `centro_trabajo` int NULL DEFAULT NULL,
  `numero` int NULL DEFAULT NULL,
  `tema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modulo` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tipo_modulo` int NULL DEFAULT NULL,
  `atiende` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of turnos
-- ----------------------------
INSERT INTO `turnos` VALUES (1, 1, 1, 'ACLARACION', 'E', 1, 1, '2023-04-21 16:33:04', '2023-04-21 16:33:31');
INSERT INTO `turnos` VALUES (2, 1, 2, 'ACLARACION', 'E', 1, 1, '2023-04-21 16:33:06', '2023-04-21 16:33:34');
INSERT INTO `turnos` VALUES (3, 1, 1, 'CUENTA NUEVA', 'E', 2, 1, '2023-04-21 16:33:09', '2023-04-21 16:33:41');
INSERT INTO `turnos` VALUES (4, 1, 2, 'CUENTA NUEVA', 'E', 2, 1, '2023-04-21 16:33:12', '2023-04-21 16:33:43');
INSERT INTO `turnos` VALUES (5, 1, 3, 'CUENTA NUEVA', 'E', 2, 1, '2023-04-21 16:33:14', '2023-04-21 16:33:44');
INSERT INTO `turnos` VALUES (6, 1, 3, 'ACLARACION', 'E', 1, 1, '2023-04-21 17:14:23', '2023-04-21 17:23:58');
INSERT INTO `turnos` VALUES (7, 1, 4, 'ACLARACION', 'D', 1, 1, '2023-04-21 17:14:25', '2023-04-21 18:18:18');
INSERT INTO `turnos` VALUES (8, 1, 5, 'ACLARACION', 'D', 1, 1, '2023-04-21 17:14:27', '2023-04-21 18:21:34');
INSERT INTO `turnos` VALUES (9, 1, 4, 'CUENTA NUEVA', 'D', 2, 1, '2023-04-21 18:30:42', '2023-04-21 18:30:59');
INSERT INTO `turnos` VALUES (10, 1, 5, 'CUENTA NUEVA', NULL, 2, NULL, '2023-04-21 18:30:45', '2023-04-21 18:30:45');
INSERT INTO `turnos` VALUES (11, 1, 1, 'PAGOS', 'H', 3, 1, '2023-04-21 18:33:16', '2023-04-21 18:33:40');
INSERT INTO `turnos` VALUES (12, 1, 6, 'CUENTA NUEVA', NULL, 2, NULL, '2023-04-21 19:24:26', '2023-04-21 19:24:26');
INSERT INTO `turnos` VALUES (13, 1, 6, 'ACLARACION', NULL, 1, NULL, '2023-04-21 20:33:08', '2023-04-21 20:33:08');
INSERT INTO `turnos` VALUES (14, 1, 7, 'ACLARACION', NULL, 1, NULL, '2023-04-21 20:33:22', '2023-04-21 20:33:22');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador', 1);

-- ----------------------------
-- View structure for v_modulos_tema
-- ----------------------------
DROP VIEW IF EXISTS `v_modulos_tema`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_modulos_tema` AS SELECT
	`cat_ temas`.id,    
	`cat_ temas`.nombre AS tema,
	cat_tipos_modulos.id AS idTipo,
	cat_tipos_modulos.nombre AS tipo_modulo
FROM
	tipo_modulo_temas
	LEFT JOIN
	cat_tipos_modulos
	ON 
		tipo_modulo_temas.tipo_modulo = cat_tipos_modulos.id
	LEFT JOIN
	`cat_ temas`
	ON 
		`cat_ temas`.id = tipo_modulo_temas.tema ;

SET FOREIGN_KEY_CHECKS = 1;
