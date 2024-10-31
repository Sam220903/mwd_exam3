/*
 Navicat Premium Dump SQL

 Source Server         : xampp_server
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : examen

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 30/10/2024 23:14:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cards
-- ----------------------------
INSERT INTO `cards` VALUES (1, 'El Gallo', 'el_gallo.jpg', 1);
INSERT INTO `cards` VALUES (2, 'El Diablito', 'el_diablito.jpg', 1);
INSERT INTO `cards` VALUES (3, 'La Dama', 'la_dama.jpg', 1);
INSERT INTO `cards` VALUES (4, 'El Catrín', 'el_catrin.jpg', 1);
INSERT INTO `cards` VALUES (5, 'El Paraguas', 'el_paraguas.jpg', 1);
INSERT INTO `cards` VALUES (6, 'La Sirena', 'la_sirena.jpg', 1);
INSERT INTO `cards` VALUES (7, 'La Escalera', 'la_escalera.jpg', 1);
INSERT INTO `cards` VALUES (8, 'La Botella', 'la_botella.jpg', 1);
INSERT INTO `cards` VALUES (9, 'El Barril', 'el_barril.jpg', 1);
INSERT INTO `cards` VALUES (10, 'El Árbol', 'el_arbol.jpg', 1);
INSERT INTO `cards` VALUES (11, 'El Melón', 'el_melon.jpg', 1);
INSERT INTO `cards` VALUES (12, 'El Valiente', 'el_valiente.jpg', 1);
INSERT INTO `cards` VALUES (13, 'El Gorrito', 'el_gorrito.jpg', 1);
INSERT INTO `cards` VALUES (14, 'La Muerte', 'la_muerte.jpg', 1);
INSERT INTO `cards` VALUES (15, 'La Pera', 'la_pera.jpg', 1);
INSERT INTO `cards` VALUES (16, 'La Bandera', 'la_bandera.jpg', 1);
INSERT INTO `cards` VALUES (17, 'El Bandolón', 'el_bandolon.jpg', 1);
INSERT INTO `cards` VALUES (18, 'El Violonchelo', 'el_violonchelo.jpg', 1);
INSERT INTO `cards` VALUES (19, 'La Garza', 'la_garza.jpg', 1);
INSERT INTO `cards` VALUES (20, 'El Pájaro', 'el_pajaro.jpg', 1);
INSERT INTO `cards` VALUES (21, 'La Mano', 'la_mano.jpg', 1);
INSERT INTO `cards` VALUES (22, 'La Bota', 'la_bota.jpg', 1);
INSERT INTO `cards` VALUES (23, 'La Luna', 'la_luna.jpg', 1);
INSERT INTO `cards` VALUES (24, 'El Cotorro', 'el_cotorro.jpg', 1);
INSERT INTO `cards` VALUES (25, 'El Borracho', 'el_borracho.jpg', 1);
INSERT INTO `cards` VALUES (26, 'El Negrito', 'el_negrito.jpg', 1);
INSERT INTO `cards` VALUES (27, 'El Corazón', 'el_corazon.jpg', 1);
INSERT INTO `cards` VALUES (28, 'La Sandía', 'la_sandia.jpg', 1);
INSERT INTO `cards` VALUES (29, 'El Tambor', 'el_tambor.jpg', 1);
INSERT INTO `cards` VALUES (30, 'El Camarón', 'el_camaron.jpg', 1);
INSERT INTO `cards` VALUES (31, 'Las Jaras', 'las_jaras.jpg', 1);
INSERT INTO `cards` VALUES (32, 'El Músico', 'el_musico.jpg', 1);
INSERT INTO `cards` VALUES (33, 'La Araña', 'la_arana.jpg', 1);
INSERT INTO `cards` VALUES (34, 'El Soldado', 'el_soldado.jpg', 1);
INSERT INTO `cards` VALUES (35, 'La Estrella', 'la_estrella.jpg', 1);
INSERT INTO `cards` VALUES (36, 'El Cazo', 'el_cazo.jpg', 1);
INSERT INTO `cards` VALUES (37, 'El Mundo', 'el_mundo.jpg', 1);
INSERT INTO `cards` VALUES (38, 'El Apache', 'el_apache.jpg', 1);
INSERT INTO `cards` VALUES (39, 'El Nopal', 'el_nopal.jpg', 1);
INSERT INTO `cards` VALUES (40, 'El Alacrán', 'el_alacran.jpg', 1);
INSERT INTO `cards` VALUES (41, 'La Rosa', 'la_rosa.jpg', 1);
INSERT INTO `cards` VALUES (42, 'La Calavera', 'la_calavera.jpg', 1);
INSERT INTO `cards` VALUES (43, 'La Campana', 'la_campana.jpg', 1);
INSERT INTO `cards` VALUES (44, 'El Cantarito', 'el_cantarito.jpg', 1);
INSERT INTO `cards` VALUES (45, 'El Venado', 'el_venado.jpg', 1);
INSERT INTO `cards` VALUES (46, 'El Sol', 'el_sol.jpg', 1);
INSERT INTO `cards` VALUES (47, 'La Corona', 'la_corona.jpg', 1);
INSERT INTO `cards` VALUES (48, 'La Chalupa', 'la_chalupa.jpg', 1);
INSERT INTO `cards` VALUES (49, 'El Pino', 'el_pino.jpg', 1);
INSERT INTO `cards` VALUES (50, 'El Pescado', 'el_pescado.jpg', 1);
INSERT INTO `cards` VALUES (51, 'La Palma', 'la_palma.jpg', 1);
INSERT INTO `cards` VALUES (52, 'La Maceta', 'la_maceta.jpg', 1);
INSERT INTO `cards` VALUES (53, 'El Arpa', 'el_arpa.jpg', 1);
INSERT INTO `cards` VALUES (54, 'La Rana', 'la_rana.jpg', 1);

SET FOREIGN_KEY_CHECKS = 1;
