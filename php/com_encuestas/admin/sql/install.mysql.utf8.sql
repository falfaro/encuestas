DROP TABLE IF EXISTS `#__votaciones`;
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

INSERT INTO `#__encuestas` (`nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
       ('Windows 8', 'Te gusta Windows 8?', '2013-05-20 00:00:00', NULL),
       ('Android', 'Que version de Android usas?', '2013-05-20 00:00:00', NULL);

CREATE TABLE `#__elementos_encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL COMMENT 'Foreign Key to #__encuestas.id',
  `nombre` varchar(256) NOT NULL,
  `descripcion` varchar(256),
   PRIMARY KEY  (`id`),
   FOREIGN KEY  (`id_encuesta`) REFERENCES `#__encuestas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__elementos_encuestas` (`id`, `id_encuesta`, `nombre`, `descripcion`) VALUES
       (1, 1, 'Si', NULL),
       (2, 1, 'No', NULL),
       (3, 2, 'Gingerbread', 'Version 2.3'),
       (4, 2, 'Honeycomb', 'Version 3.x'),
       (5, 2, 'Ice Cream Sandwich', 'Version 4.0'),
       (6, 2, 'Jelly Bean', 'Version 4.1, 4.2');
