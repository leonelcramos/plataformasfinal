/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : tp1desarrollo5

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 19/12/2022 10:18:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE,
  INDEX `categoria`(`categoria`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'animacion 2d');
INSERT INTO `categorias` VALUES (5, 'animacion 3d');
INSERT INTO `categorias` VALUES (6, 'diseño visual');
INSERT INTO `categorias` VALUES (0, 'diseño web');
INSERT INTO `categorias` VALUES (8, 'ilustracion');
INSERT INTO `categorias` VALUES (9, 'locucion');
INSERT INTO `categorias` VALUES (3, 'maquetado web');
INSERT INTO `categorias` VALUES (2, 'modelado 3d');
INSERT INTO `categorias` VALUES (7, 'motion graphic');
INSERT INTO `categorias` VALUES (4, 'programacion web');

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios`  (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_publicacion` int NOT NULL,
  `id_usuario` int NOT NULL,
  `comentario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_comentario`) USING BTREE,
  INDEX `publicacionycomentario`(`id_publicacion`) USING BTREE,
  INDEX `comentarioyusuario`(`id_usuario`) USING BTREE,
  CONSTRAINT `comentarioyusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `publicacionycomentario` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (2, 5, 5, 'terrible laburo!');
INSERT INTO `comentarios` VALUES (3, 3, 10, 'que gran encuentro, la pasamos muy bien');
INSERT INTO `comentarios` VALUES (4, 6, 1, 'no hay mucho para ver');
INSERT INTO `comentarios` VALUES (5, 9, 10, 'si antes se veía genial, ahora mucho mas!');
INSERT INTO `comentarios` VALUES (6, 8, 4, 'gran trabajo amigo, te quedo increible');
INSERT INTO `comentarios` VALUES (7, 4, 2, 'una maravilla');
INSERT INTO `comentarios` VALUES (8, 7, 9, 'siempre es un placer trabajar para nuestros amigos.');
INSERT INTO `comentarios` VALUES (9, 8, 7, 'mates de por medio');
INSERT INTO `comentarios` VALUES (10, 8, 8, 'que buena mano!');
INSERT INTO `comentarios` VALUES (13, 8, 885, 'vcxvcx');
INSERT INTO `comentarios` VALUES (14, 8, 885, 'sdfdsfds');
INSERT INTO `comentarios` VALUES (15, 8, 885, 'vcxvcx');
INSERT INTO `comentarios` VALUES (16, 2, 885, 'muy bueno!!!! triplemente bueno!!');
INSERT INTO `comentarios` VALUES (17, 2, 885, '');
INSERT INTO `comentarios` VALUES (19, 2, 885, 'sfdsg');
INSERT INTO `comentarios` VALUES (20, 2, 885, 'muy piola');
INSERT INTO `comentarios` VALUES (21, 2, 885, 'muy piola!!!');
INSERT INTO `comentarios` VALUES (22, 3, 885, 'muy buena expo');
INSERT INTO `comentarios` VALUES (23, 3, 886, 'Estuvimos ahí, una gran experiencia!');
INSERT INTO `comentarios` VALUES (25, 2, 886, 'excelente');
INSERT INTO `comentarios` VALUES (27, 3, 887, 'una maravilla!!');
INSERT INTO `comentarios` VALUES (28, 2, 896, 'gdfgdfhfh');
INSERT INTO `comentarios` VALUES (29, 2, 897, 'muy bueno!\r\n');
INSERT INTO `comentarios` VALUES (30, 2, 897, 'fgfg');
INSERT INTO `comentarios` VALUES (31, 2, 897, 'genial');
INSERT INTO `comentarios` VALUES (32, 6, 896, 'excelente!!\r\n');
INSERT INTO `comentarios` VALUES (33, 6, 896, 'xd');
INSERT INTO `comentarios` VALUES (34, 12, 898, 'gracias por tanto!');
INSERT INTO `comentarios` VALUES (35, 9, 898, 'Excelente trabajo!');

-- ----------------------------
-- Table structure for detalle_orden
-- ----------------------------
DROP TABLE IF EXISTS `detalle_orden`;
CREATE TABLE `detalle_orden`  (
  `id_detalle_orden` int NOT NULL AUTO_INCREMENT,
  `id_servicio` int NOT NULL,
  `id_ordenes` int NOT NULL,
  PRIMARY KEY (`id_detalle_orden`) USING BTREE,
  UNIQUE INDEX `iddetalleorden`(`id_detalle_orden`) USING BTREE,
  INDEX `idservicio`(`id_servicio`) USING BTREE,
  INDEX `idordenes`(`id_ordenes`) USING BTREE,
  CONSTRAINT `idordenes` FOREIGN KEY (`id_ordenes`) REFERENCES `ordenes` (`id_ordenes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idservicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detalle_orden
-- ----------------------------
INSERT INTO `detalle_orden` VALUES (1, 13, 1);
INSERT INTO `detalle_orden` VALUES (2, 15, 2);
INSERT INTO `detalle_orden` VALUES (3, 14, 6);
INSERT INTO `detalle_orden` VALUES (4, 15, 2);
INSERT INTO `detalle_orden` VALUES (5, 20, 8);
INSERT INTO `detalle_orden` VALUES (6, 19, 8);
INSERT INTO `detalle_orden` VALUES (7, 16, 10);
INSERT INTO `detalle_orden` VALUES (8, 18, 5);
INSERT INTO `detalle_orden` VALUES (10, 13, 2);

-- ----------------------------
-- Table structure for likes_comentarios
-- ----------------------------
DROP TABLE IF EXISTS `likes_comentarios`;
CREATE TABLE `likes_comentarios`  (
  `id_likearcomentario` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_comentario` int NOT NULL,
  PRIMARY KEY (`id_likearcomentario`) USING BTREE,
  INDEX `comentariodelsusario`(`id_usuario`) USING BTREE,
  INDEX `likesdelcomentario`(`id_comentario`) USING BTREE,
  CONSTRAINT `comentariodelsusario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likesdelcomentario` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id_comentario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of likes_comentarios
-- ----------------------------
INSERT INTO `likes_comentarios` VALUES (4, 1, 9);
INSERT INTO `likes_comentarios` VALUES (6, 5, 8);
INSERT INTO `likes_comentarios` VALUES (7, 5, 7);
INSERT INTO `likes_comentarios` VALUES (8, 2, 9);
INSERT INTO `likes_comentarios` VALUES (9, 10, 5);
INSERT INTO `likes_comentarios` VALUES (10, 1, 8);

-- ----------------------------
-- Table structure for likes_publicaciones
-- ----------------------------
DROP TABLE IF EXISTS `likes_publicaciones`;
CREATE TABLE `likes_publicaciones`  (
  `id_likearpublicacion` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_publicacion` int NOT NULL,
  PRIMARY KEY (`id_likearpublicacion`) USING BTREE,
  INDEX `likesdelapublicacion`(`id_publicacion`) USING BTREE,
  INDEX `publicaciondelusuario`(`id_usuario`) USING BTREE,
  CONSTRAINT `likesdelapublicacion` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `publicaciondelusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of likes_publicaciones
-- ----------------------------
INSERT INTO `likes_publicaciones` VALUES (1, 2, 4);
INSERT INTO `likes_publicaciones` VALUES (2, 1, 7);
INSERT INTO `likes_publicaciones` VALUES (4, 10, 6);
INSERT INTO `likes_publicaciones` VALUES (6, 5, 6);
INSERT INTO `likes_publicaciones` VALUES (8, 2, 4);
INSERT INTO `likes_publicaciones` VALUES (9, 1, 8);
INSERT INTO `likes_publicaciones` VALUES (10, 1, 6);
INSERT INTO `likes_publicaciones` VALUES (33, 886, 6);
INSERT INTO `likes_publicaciones` VALUES (57, 897, 5);
INSERT INTO `likes_publicaciones` VALUES (59, 897, 4);
INSERT INTO `likes_publicaciones` VALUES (71, 897, 2);
INSERT INTO `likes_publicaciones` VALUES (76, 897, 8);
INSERT INTO `likes_publicaciones` VALUES (83, 897, 7);
INSERT INTO `likes_publicaciones` VALUES (90, 897, 6);
INSERT INTO `likes_publicaciones` VALUES (91, 897, 9);
INSERT INTO `likes_publicaciones` VALUES (92, 897, 3);
INSERT INTO `likes_publicaciones` VALUES (93, 896, 2);
INSERT INTO `likes_publicaciones` VALUES (94, 896, 3);
INSERT INTO `likes_publicaciones` VALUES (95, 896, 4);
INSERT INTO `likes_publicaciones` VALUES (97, 896, 9);
INSERT INTO `likes_publicaciones` VALUES (98, 896, 8);
INSERT INTO `likes_publicaciones` VALUES (99, 896, 7);
INSERT INTO `likes_publicaciones` VALUES (100, 896, 12);
INSERT INTO `likes_publicaciones` VALUES (101, 896, 6);
INSERT INTO `likes_publicaciones` VALUES (102, 896, 5);
INSERT INTO `likes_publicaciones` VALUES (103, 898, 12);
INSERT INTO `likes_publicaciones` VALUES (104, 898, 9);
INSERT INTO `likes_publicaciones` VALUES (105, 898, 8);
INSERT INTO `likes_publicaciones` VALUES (106, 898, 7);
INSERT INTO `likes_publicaciones` VALUES (107, 898, 6);
INSERT INTO `likes_publicaciones` VALUES (108, 898, 5);
INSERT INTO `likes_publicaciones` VALUES (109, 898, 4);
INSERT INTO `likes_publicaciones` VALUES (110, 898, 3);
INSERT INTO `likes_publicaciones` VALUES (111, 898, 2);

-- ----------------------------
-- Table structure for niveles
-- ----------------------------
DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles`  (
  `id_nivel` int NOT NULL,
  `nivel` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_nivel`) USING BTREE,
  UNIQUE INDEX `id_nivel`(`id_nivel`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of niveles
-- ----------------------------
INSERT INTO `niveles` VALUES (0, 'animador');
INSERT INTO `niveles` VALUES (1, 'Cliente');
INSERT INTO `niveles` VALUES (2, 'Administrador');
INSERT INTO `niveles` VALUES (3, ' vendedor');
INSERT INTO `niveles` VALUES (4, 'editor');
INSERT INTO `niveles` VALUES (5, 'diseñador');

-- ----------------------------
-- Table structure for ordenes
-- ----------------------------
DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE `ordenes`  (
  `id_ordenes` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_ordenes`) USING BTREE,
  UNIQUE INDEX `id_orden`(`id_ordenes`) USING BTREE,
  INDEX `ordenuser`(`id_usuario`) USING BTREE,
  CONSTRAINT `ordenuser` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ordenes
-- ----------------------------
INSERT INTO `ordenes` VALUES (1, 5, '2022-10-14');
INSERT INTO `ordenes` VALUES (2, 1, '2022-10-12');
INSERT INTO `ordenes` VALUES (3, 2, '2022-09-07');
INSERT INTO `ordenes` VALUES (4, 1, '2022-09-03');
INSERT INTO `ordenes` VALUES (5, 2, '2022-08-08');
INSERT INTO `ordenes` VALUES (6, 10, '2022-10-10');
INSERT INTO `ordenes` VALUES (7, 5, '2022-10-12');
INSERT INTO `ordenes` VALUES (8, 1, '2022-10-11');
INSERT INTO `ordenes` VALUES (9, 2, '2022-08-09');
INSERT INTO `ordenes` VALUES (10, 10, '2022-06-02');

-- ----------------------------
-- Table structure for produccion
-- ----------------------------
DROP TABLE IF EXISTS `produccion`;
CREATE TABLE `produccion`  (
  `id_produccion` int NOT NULL AUTO_INCREMENT,
  `id_ordenes` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_produccion`) USING BTREE,
  UNIQUE INDEX `id_produccion`(`id_produccion`) USING BTREE,
  INDEX `ordenproduccion`(`id_ordenes`) USING BTREE,
  INDEX `produsuario`(`id_usuario`) USING BTREE,
  CONSTRAINT `ordenproduccion` FOREIGN KEY (`id_ordenes`) REFERENCES `ordenes` (`id_ordenes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produccion
-- ----------------------------
INSERT INTO `produccion` VALUES (1, 5, 1);
INSERT INTO `produccion` VALUES (2, 2, 1);
INSERT INTO `produccion` VALUES (3, 3, 2);
INSERT INTO `produccion` VALUES (4, 4, 1);
INSERT INTO `produccion` VALUES (5, 5, 1);
INSERT INTO `produccion` VALUES (7, 7, 5);
INSERT INTO `produccion` VALUES (8, 8, 4);
INSERT INTO `produccion` VALUES (9, 9, 1);
INSERT INTO `produccion` VALUES (10, 10, 1);

-- ----------------------------
-- Table structure for publicaciones
-- ----------------------------
DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE `publicaciones`  (
  `id_publicacion` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_categoria` int NOT NULL,
  `publicacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion_publicacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_publicacion` date NOT NULL,
  PRIMARY KEY (`id_publicacion`) USING BTREE,
  INDEX `usuario`(`id_usuario`) USING BTREE,
  INDEX `categoria`(`id_categoria`) USING BTREE,
  CONSTRAINT `categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of publicaciones
-- ----------------------------
INSERT INTO `publicaciones` VALUES (2, 9, 3, 'img/menu.jpg', 'ultimo trabajo para los amigos de QUAY', '2022-09-23');
INSERT INTO `publicaciones` VALUES (3, 7, 3, 'img/expo.jpg', 'en la expo japonesa', '2022-07-12');
INSERT INTO `publicaciones` VALUES (4, 8, 2, 'img/logo.jpg', 'diseño para amigos de la casa', '2022-10-16');
INSERT INTO `publicaciones` VALUES (5, 7, 1, 'img/wild.jpg', 'hermoso trabajo para WILD TURKEY', '2022-09-09');
INSERT INTO `publicaciones` VALUES (6, 9, 0, 'img/expo2.jpg', 'un paseo por medellin', '2022-07-07');
INSERT INTO `publicaciones` VALUES (7, 4, 0, 'img/cafe.jpg', 'ultimo trabajo para GRADY\'S', '2022-08-08');
INSERT INTO `publicaciones` VALUES (8, 6, 2, 'img/sushi.jpg', 'placeres del trabajo', '2022-10-13');
INSERT INTO `publicaciones` VALUES (9, 5, 0, 'img/emerica.jpg', 'remodelando la pagina de EMERICA', '0000-00-00');
INSERT INTO `publicaciones` VALUES (12, 896, 2, 'img/interfaz.jpg', 'diseñando la interfaz de la pagina web de GRAY', '2022-12-19');

-- ----------------------------
-- Table structure for respuestas
-- ----------------------------
DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE `respuestas`  (
  `id_respuesta` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_comentario` int NOT NULL,
  `respuesta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_respuesta`) USING BTREE,
  INDEX `respuestaalcomentario`(`id_comentario`) USING BTREE,
  INDEX `usuarioqueresponde`(`id_usuario`) USING BTREE,
  CONSTRAINT `respuestaalcomentario` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id_comentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarioqueresponde` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of respuestas
-- ----------------------------
INSERT INTO `respuestas` VALUES (3, 5, 3, 'Gracias por contactarnos');
INSERT INTO `respuestas` VALUES (4, 6, 4, 'Estamos siempre a tu orden');
INSERT INTO `respuestas` VALUES (5, 10, 5, 'Un placer haberte ayudado');
INSERT INTO `respuestas` VALUES (6, 8, 6, 'Quedamos atentos a tu próximo pedido');
INSERT INTO `respuestas` VALUES (7, 2, 7, 'Gracias por la confianza en nosotros');
INSERT INTO `respuestas` VALUES (8, 4, 8, 'Vuelve a contactarte cuando quieras');
INSERT INTO `respuestas` VALUES (9, 7, 9, 'Es un gusto para nosotros ayudarte');
INSERT INTO `respuestas` VALUES (10, 9, 10, 'Gracias por tu comentario, estamos trabajando para Usted. ');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios`  (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `servicio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_servicio`) USING BTREE,
  UNIQUE INDEX `id_servicio`(`id_servicio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES (12, 'Diseño Web', '20000');
INSERT INTO `servicios` VALUES (13, 'Motion Graphics', '30000');
INSERT INTO `servicios` VALUES (14, 'Animación 3D', '45000');
INSERT INTO `servicios` VALUES (15, 'Ilustración Digital', '10000');
INSERT INTO `servicios` VALUES (16, 'Programación Web', '80000');
INSERT INTO `servicios` VALUES (17, 'Animación Web', '25000');
INSERT INTO `servicios` VALUES (18, 'Modelado 3D', '12000');
INSERT INTO `servicios` VALUES (19, 'Diseño Gráfico', '25000');
INSERT INTO `servicios` VALUES (20, 'Diseño de Videojuegos', '60000');

-- ----------------------------
-- Table structure for servicios3
-- ----------------------------
DROP TABLE IF EXISTS `servicios3`;
CREATE TABLE `servicios3`  (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `servicio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_servicio`) USING BTREE,
  UNIQUE INDEX `id_servicio`(`id_servicio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of servicios3
-- ----------------------------
INSERT INTO `servicios3` VALUES (21, 'Diseño Web', '$20000', '  <i class=\"fa-solid fa-cloud p-5\" style=\"font-size:150px;\"></i>');
INSERT INTO `servicios3` VALUES (22, 'Motion Graphics', '$30000', '<i class=\"fa-solid fa-diagram-project p-5\" style=\"font-size:150px;\"></i>');
INSERT INTO `servicios3` VALUES (23, 'Animación 3D', '$45000', '<i class=\"fa-solid fa-cubes p-5\" style=\"font-size :150px;\r\n\"></i>');
INSERT INTO `servicios3` VALUES (24, 'Ilustración Digital', '$10000', '<i class=\"fa-solid fa-pen-to-square p-5\" style=\"font-size:150px;\"></i>');
INSERT INTO `servicios3` VALUES (25, 'Programación Web', '$80000', '<i class=\"fa-solid fa-code-compare p-5\" style=\"font-size:150px;\"></i>');
INSERT INTO `servicios3` VALUES (26, 'Animación Web', '$25000', '<i class=\"fa-solid fa-bolt p-5\" style=\"font-size:150px;\"></i>');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_nivel` int NOT NULL,
  `primer_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `segundo_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `primer_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `segundo_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE INDEX `id_usuario`(`id_usuario`) USING BTREE,
  INDEX `idniveles`(`id_nivel`) USING BTREE,
  CONSTRAINT `idniveles` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 899 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 1, 'María', 'Fernanda', 'León', 'Mora', 'maferleon@gmail.com', '12456');
INSERT INTO `usuarios` VALUES (2, 1, 'José', 'Miguel', 'Luna', 'Rodríguez', 'rodrijose@gmail.com', '23546');
INSERT INTO `usuarios` VALUES (4, 2, 'Jesus', NULL, 'Santoro', NULL, 'jesus.santoro@gmai.com', '12378');
INSERT INTO `usuarios` VALUES (5, 1, 'Pedro', NULL, 'Ramirez', NULL, 'pedro.ramirez@gmail.com', '112233');
INSERT INTO `usuarios` VALUES (6, 3, 'Jimena', NULL, 'Ique', NULL, 'jimena.ique@gmail.com', '333222');
INSERT INTO `usuarios` VALUES (7, 5, 'Fernanda', 'Maria', 'Torres', NULL, 'maria.torres@gmail.com', '88567');
INSERT INTO `usuarios` VALUES (8, 4, 'Martina', NULL, 'Paredes', 'Gauna', 'martina.paredes@gmail.com', '12345');
INSERT INTO `usuarios` VALUES (9, 0, 'Gisela', 'Romina', 'Garcia', NULL, 'gisela.garcia@gmail.com', '98765');
INSERT INTO `usuarios` VALUES (10, 1, 'Camilo', NULL, 'Funtes', NULL, 'camilo.fuentes@gmail.com', '54321');
INSERT INTO `usuarios` VALUES (884, 1, 'Cesar', '', 'Chafloque', '', 'cesar@gmail.com', '$2y$10$hQwH7ycb1D.kVJ1WKPWJWulN2XSi8rf.GBjV729ISDiwpEhzqdyQS');
INSERT INTO `usuarios` VALUES (885, 1, 'Jonatan', '', 'Gonzalez', '', 'jony@gmail.com', '$2y$10$a5KyRL3ieamyznJ8VUZ56eOJJa77eKf5j5DVInTvVx71v8s3QHYCC');
INSERT INTO `usuarios` VALUES (886, 1, 'Isaac', '', 'Ikeda', '', 'ikedai@gmail.com', '$2y$10$J9.wBCL5Mobv22Me/oyvUeboELFxpZN.pv9gLQZC0xZ476OMuOFqm');
INSERT INTO `usuarios` VALUES (887, 1, 'Gregorio', '', 'Garcia', '', 'gregorio@gmail.com', '$2y$10$PSyuQn.hgXfP/tE/JpZeDeWKfYFSuX4V.WqJwLvmy0BaiLMk1ClXG');
INSERT INTO `usuarios` VALUES (888, 1, 'Griselda', '', 'Gauna', '', 'gri@gmail.com', '$2y$10$i5KEasYD0JbkFCLX/HdKCum6Uddwg1eW24bc2/LATVCHvTon4QJIC');
INSERT INTO `usuarios` VALUES (889, 1, 'Diego', '', 'Garcia', '', 'diego@gmail.com', '$2y$10$EMSKbAyrVH2PJdGe3opIlOeduwIqVYbQ.oEHDLHAcd0DClprk2NE2');
INSERT INTO `usuarios` VALUES (890, 1, 'Natalia', '', 'Garcia', '', 'naty@gmail.com', '$2y$10$p8lSYdrMs1vJkIlZTMv48OpypzCG7I7QkauT/8xLCwnWulTWVopgC');
INSERT INTO `usuarios` VALUES (891, 1, 'Morena', '', 'Garay', '', 'more@gmail.com', '$2y$10$i6r1iS0SzsD./Vitp29KsOP9SNqaBU1ZC3QeC.8D7bK.K3lYWbIJq');
INSERT INTO `usuarios` VALUES (892, 1, 'Junior', '', 'Garay', '', 'juju@gmail.com', '$2y$10$YveGuxjoShKdh94MPWzkQuId/.bCy.l3RyxgF4lsYp4PQFzzq.zOa');
INSERT INTO `usuarios` VALUES (893, 1, 'Leo', '', 'Messi', '', 'messi@gmail.com', '$2y$10$e9/sbMJJcXAXhH9iJK.CSeVKBYflVWQYjAVDYibJ2v9YwSflIMr3S');
INSERT INTO `usuarios` VALUES (894, 1, 'Graciela', '', 'Piccardo', '', 'gra@gmail.com', '$2y$10$23x4gSztm.DmQCbj/TIJwuJUB/OOTTPtlGG1XTLUVM5kAUUmxLzCK');
INSERT INTO `usuarios` VALUES (895, 1, 'Ariadna', '', 'Piccardo', '', 'ari@gmail.com', '$2y$10$1/2J3/HLYy8yoayVCc1YAOvgkY3MfjCWftB/ChkjsOWTwv9pKvrGu');
INSERT INTO `usuarios` VALUES (896, 2, 'Nelson', 'Samuel', 'Garcia', '', 'nelson.garcia@davinci.edu.ar', '$2y$10$A6Hcx1IkJFWRH3WlCqdA5eHt6Kovf/zOE8wVrLnwd1HVLF12bHRfe');
INSERT INTO `usuarios` VALUES (897, 1, 'Tino', '', 'Martinez', '', 'tino@gmail.com', '$2y$10$d3JYmEgUQocCjjC.je07Yuu1aNHx4G.p4pV.c2Qat2gLPOT/kKKC.');
INSERT INTO `usuarios` VALUES (898, 1, 'Eduardo', '', 'Guillen', '', 'edu@gmail.com', '$2y$10$avkp9aAmMYQX9W7njdI8x.BLdA.0jFPU6h651HRHEfHGhLs67yrD6');

SET FOREIGN_KEY_CHECKS = 1;
