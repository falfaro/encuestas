DROP TABLE IF EXISTS `#__votos`;
DROP TABLE IF EXISTS `#__elementos_encuestas`;
DROP TABLE IF EXISTS `#__elementos`;

CREATE TABLE `#__encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `descripcion` varchar(256),
  `fecha_inicio` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_fin` datetime NOT NULL DEFAULT '9999-12-31 23:59:59',
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__encuestas` (`nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
       ('Windows 8', 'Te gusta Windows 8?', '2013-05-20 00:00:00', NULL),
       ('Android', 'Que version de Android usas?', '2013-05-20 00:00:00', NULL);

CREATE TABLE `#__elementos_encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL COMMENT 'Foreign Key to #__encuestas.id',
  `nombre` varchar(256) NOT NULL,
  `descripcion` varchar(256),
   PRIMARY KEY  (`id`),
   FOREIGN KEY  (`id_encuesta`) REFERENCES `#__encuestas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__elementos_encuestas` (`id`, `id_encuesta`, `nombre`, `descripcion`) VALUES
       (1, 1, 'Si', NULL),
       (2, 1, 'No', NULL),
       (3, 2, 'Gingerbread', 'Version 2.3'),
       (4, 2, 'Honeycomb', 'Version 3.x'),
       (5, 2, 'Ice Cream Sandwich', 'Version 4.0'),
       (6, 2, 'Jelly Bean', 'Version 4.1, 4.2');

CREATE TABLE `#__votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `id_elemento_encuesta` int(11) NOT NULL,
  `id_sesion` varchar(256) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   PRIMARY KEY  (`id`),
   FOREIGN KEY  (`id_encuesta`) REFERENCES `#__encuestas` (`id`) ON DELETE CASCADE,
   FOREIGN KEY  (`id_elemento_encuesta`) REFERENCES `#__elementos_encuestas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__votos` (`id`, `id_elemento_encuesta`, `id_encuesta`, `id_sesion`, `fecha`) VALUES
       (1, 1, 1, 'pnonj3800hah039uv0q255udq7', '2013-05-20 00:00:00'),
       (2, 6, 2, 'pnonj3800hah039uv0q255udq7', '2013-05-20 00:00:00'),
       (3, 1, 1, '85a6a2dc0e0792d1c745ce79252fda9c', '2013-05-20 00:00:00'),
       (4, 6, 2, '85a6a2dc0e0792d1c745ce79252fda9c', '2013-05-20 00:00:00');
