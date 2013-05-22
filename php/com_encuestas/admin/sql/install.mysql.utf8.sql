DROP TABLE IF EXISTS `#__elementos_encuestas`;
DROP TABLE IF EXISTS `#__elementos`;

CREATE TABLE `#__encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `descripcion` varchar(256),
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__elementos_encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL COMMENT 'Foreign Key to #__encuestas.id',
  `nombre` varchar(256) NOT NULL,
  `descripcion` varchar(256),
   PRIMARY KEY  (`id`),
   FOREIGN KEY  (`id_encuesta`) REFERENCES `#__encuestas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
