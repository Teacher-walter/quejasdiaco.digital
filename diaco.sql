-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2021 a las 16:21:27
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumidor`
--

CREATE TABLE `consumidor` (
  `id_consumidor` int(11) NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_persona` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `muni_id_muni` int(11) NOT NULL,
  `sede_id_sede` int(11) NOT NULL,
  `edad` bigint(4) NOT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consumidor`
--

INSERT INTO `consumidor` (`id_consumidor`, `genero`, `tipo_persona`, `muni_id_muni`, `sede_id_sede`, `edad`, `celular`, `correo`, `estado`) VALUES
(1, 'femenino', 'individual', 2, 22, 35, '', '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_registro`
--

CREATE TABLE `control_registro` (
  `id_control` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `proveedor_id_proveedor` int(11) NOT NULL,
  `consum_id_consumidor` int(11) NOT NULL,
  `queja_id_queja` int(11) NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `usuario_id_modifica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control_registro`
--

INSERT INTO `control_registro` (`id_control`, `fecha_registro`, `proveedor_id_proveedor`, `consum_id_consumidor`, `queja_id_queja`, `fecha_modificacion`, `usuario_id_modifica`) VALUES
(1, '2021-09-28', 1, 1, 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_depto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `region_id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_depto`, `region_id_region`) VALUES
(1, 'Guatemala', 1),
(2, 'Quetzaltenago', 6),
(3, 'Quiche', 7),
(4, 'San Marcos', 6),
(5, 'Totonicapán', 6),
(6, 'Peten ', 8),
(7, 'Solola', 6),
(8, 'Alta Verapaz', 2),
(9, 'Baja Verapaz', 2),
(10, 'Izabal', 3),
(11, 'Huehuetenango', 7),
(12, 'Chimaltenango', 5),
(13, 'El Progreso', 3),
(14, 'Escuintla', 5),
(15, 'Jalapa', 4),
(16, 'Jutiapa', 4),
(17, 'Retalhuleu', 6),
(18, 'Sacatepequez', 5),
(19, 'Santa Rosa', 4),
(20, 'Suchitepequez', 6),
(21, 'Chiquimula', 3),
(22, 'Zacapa', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_mun` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `departamento_id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_mun`, `departamento_id_departamento`) VALUES
(2, 'Totonicapan', 5),
(3, 'Santa Lucia la Reforma', 5),
(4, 'San Bartolo', 5),
(5, 'Momostenango', 5),
(6, 'Santa Maria Chiquimula', 5),
(7, 'San Francisco El Alto', 5),
(8, 'San Cristobal Totonicapán', 5),
(9, 'San Andres Xecul', 5),
(10, 'Quetzaltenango', 2),
(11, 'San Carlos Sija', 2),
(12, 'Almolonga', 2),
(13, 'Cabrican', 2),
(14, 'Cajolá', 2),
(15, 'Cantel', 2),
(16, 'Coatepeque', 2),
(17, 'Colomba Costa Cuca', 2),
(18, 'Concepción Chiquirichapa', 2),
(19, 'El Palmar', 2),
(20, 'Flores Costa Cuca', 2),
(21, 'Génova Costa Cuca', 2),
(22, 'Huitán', 2),
(23, 'La Esperanza', 2),
(24, 'Olintepeque', 2),
(25, 'Palestina de los Altos', 2),
(26, 'Salcajá', 2),
(27, 'San Francisco La Unión', 2),
(28, 'San Juan Ostuncalco', 2),
(29, 'San Martín Sacatepéquez', 2),
(30, 'San Mateo', 2),
(31, 'San Miguel Siguila', 2),
(32, 'Sibilia', 2),
(33, 'Zunil', 2),
(34, 'Santa Cruz del Quiché', 3),
(35, 'Chiché', 3),
(36, 'Chinique', 3),
(37, 'Zacualpa', 3),
(38, 'Chajul', 3),
(39, 'Chichicastenango', 3),
(40, 'Patzité', 3),
(41, 'San Antonio Ilotenango', 3),
(42, 'San Pedro Jocopilas', 3),
(43, 'Cunén', 3),
(44, 'San Juan Cotzal', 3),
(45, 'Joyabaj', 3),
(46, 'Nebaj', 3),
(47, 'San Andrés Sajcabajá', 3),
(48, 'Uspantán', 3),
(49, 'Sacapulas', 3),
(50, 'San Bartolomé Jocotenango', 3),
(51, 'Canillá', 3),
(52, 'Chicamán', 3),
(53, 'Ixcán', 3),
(54, 'Ayutla', 4),
(55, 'El quetzal', 4),
(56, 'Ixchiguan', 4),
(57, 'Ocòs', 4),
(58, 'San Cridtobal Cucho', 4),
(59, 'San miguel ixchiguan', 4),
(60, 'Sibinal', 4),
(61, 'Tejutla', 4),
(62, 'Catarina', 4),
(63, 'El Rodeo', 4),
(64, 'La Reforma', 4),
(65, 'Pajapita', 4),
(66, 'San José Ojetenam', 4),
(67, 'San Pablo', 4),
(68, 'Sipacapa', 4),
(69, 'Comitancillo', 4),
(70, 'El Tumbador', 4),
(71, 'Malacatán', 4),
(72, 'Río Blanco', 4),
(73, 'San Lorenzo', 4),
(74, 'San Pedro Sacatepéquez', 4),
(75, 'Tacaná', 4),
(76, 'Concepción Tutuapa', 4),
(77, 'Esquipulas Palo Gordo', 4),
(78, 'Nuevo Progreso', 4),
(79, 'San Antonio Sacatepéquez', 4),
(80, 'San Marcos', 4),
(81, 'San Rafael Pie de La Cuesta', 4),
(82, 'Tajumulco', 4),
(83, 'Amatitlán', 1),
(84, 'Guatemala', 1),
(85, 'San José Pinula', 1),
(86, 'San Pedro Sacatepéquez', 1),
(87, 'Villa Nueva', 1),
(88, 'Chinautla', 1),
(89, 'Mixco', 1),
(90, 'San Juan Sacatepéquez', 1),
(91, 'San Raymundo', 1),
(92, 'Chuarrancho', 1),
(93, 'Palencia', 1),
(94, 'San Miguel Petapa', 1),
(95, 'Santa Catarina Pinula', 1),
(96, 'Fraijanes', 1),
(97, 'San José del Golfo', 1),
(98, 'San Pedro Ayampuc', 1),
(99, 'Villa Canales', 1),
(100, 'Dolores', 6),
(101, 'Melchor de Mencos', 6),
(102, 'San Francisco', 6),
(103, 'Sayaxché', 6),
(104, 'Flores', 6),
(105, 'Poptún', 6),
(106, 'San José', 6),
(107, 'La Libertad', 6),
(108, 'San Andrés', 6),
(109, 'San Luis', 6),
(110, 'Las Cruces', 6),
(111, 'San Benito', 6),
(112, 'Santa Ana', 6),
(113, 'Concepción', 7),
(114, 'San Antonio Palopó', 7),
(115, 'San Marcos La Laguna', 7),
(116, 'Santa Catarina Palopó', 7),
(117, 'Santa María Visitación', 7),
(118, 'Nahualá', 7),
(119, 'San José Chacayá', 7),
(120, 'San Pablo La Laguna', 7),
(121, 'Santa Clara La Laguna', 7),
(122, 'Santiago Atitlán', 7),
(123, 'Panajachel', 7),
(124, 'San Juan La Laguna', 7),
(125, 'San Pedro La Laguna', 7),
(126, 'Santa Cruz La Laguna', 7),
(127, 'Sololá', 7),
(128, 'San Andrés Semetabaj', 7),
(129, 'San Lucas Tolimán', 7),
(130, 'Santa Catarina Ixtahuacan', 7),
(131, 'Santa Lucía Utatlán', 7),
(132, 'Chahal', 8),
(133, 'Lanquín', 8),
(134, 'San Juan Chamelco', 8),
(135, 'Santa María Cahabón', 8),
(136, 'Tucurú', 8),
(137, 'Chisec', 8),
(138, 'Panzós', 8),
(139, 'San Pedro Carchá', 8),
(140, 'Senahú', 8),
(141, 'Cobán', 8),
(142, 'Raxruhá', 8),
(143, 'Santa Catalina La Tinta', 8),
(144, 'Tactic', 8),
(145, 'Fray Bartolomé de las Casas', 8),
(146, 'San Cristóbal Verapaz', 8),
(147, 'Santa Cruz Verapaz', 8),
(148, 'Tamahú', 8),
(149, 'Cubulco', 9),
(150, 'Salamá', 9),
(151, 'Granados', 9),
(152, 'San Jerónimo', 9),
(153, 'Purulhá', 9),
(154, 'San Miguel Chicaj', 9),
(155, 'Rabinal', 9),
(156, 'Santa Cruz el Chol', 9),
(157, 'El Estor', 10),
(158, 'Puerto Barrios', 10),
(159, 'Livingston', 10),
(160, 'Los Amates', 10),
(161, 'Morales', 10),
(162, 'Aguacatán', 11),
(163, 'Cuilco', 11),
(164, 'La Libertad', 11),
(165, 'San Gaspar Ixchil', 11),
(166, 'San Mateo Ixtatán', 11),
(167, 'San Rafael La Independencia', 11),
(168, 'Santa Ana Huista', 11),
(169, 'Santiago Chimaltenango', 11),
(170, 'Chiantla', 11),
(171, 'Huehuetenango', 11),
(172, 'Malacatancito', 11),
(173, 'San Ildefonso Ixtahuacán', 11),
(174, 'San Miguel Acatán', 11),
(175, 'San Rafael Petzal', 11),
(176, 'Santa Bárbara', 11),
(177, 'Tectitán', 11),
(178, 'Colotenango', 11),
(179, 'Jacaltenango', 11),
(180, 'Nentón', 11),
(181, 'San Juan Atitán', 11),
(182, 'San Pedro Necta', 11),
(183, 'San Sebastián Coatán', 11),
(184, 'Santa Cruz Barillas', 11),
(185, 'Todos Santos Cuchumatánes', 11),
(186, 'Concepción Huista', 11),
(187, 'La Democracia', 11),
(188, 'San Antonio Huista', 11),
(189, 'San Juan Ixcoy', 11),
(190, 'San Pedro Soloma', 11),
(191, 'San Sebastián', 11),
(192, 'Santa Eulalia', 11),
(193, 'Unión Cantinil', 11),
(194, 'Acatenango', 12),
(195, 'Patzicía', 12),
(196, 'San José Poaquil', 12),
(197, 'Santa Cruz Balanyá', 12),
(198, 'Chimaltenango', 12),
(199, 'Patzún', 12),
(200, 'San Juan Comalapa', 12),
(201, 'Tecpán', 12),
(202, 'El Tejar', 12),
(203, 'Pochuta', 12),
(204, 'San Martín Jilotepeque', 12),
(205, 'Yepocapa', 12),
(206, 'Parramos', 12),
(207, 'San Andrés Itzapa', 12),
(208, 'Santa Apolonia', 12),
(209, 'Zaragoza', 12),
(210, 'El Jícaro', 13),
(211, 'San Antonio La Paz', 13),
(212, 'Guastatoya', 13),
(213, 'San Cristóbal Acasaguastlán', 13),
(214, 'Morazán', 13),
(215, 'Sanarate', 13),
(216, 'San Agustín Acasaguastlán', 13),
(217, 'Sansare', 13),
(218, 'Escuintla', 14),
(219, 'La Gomera', 14),
(220, 'San José', 14),
(221, 'Tiquisate', 14),
(222, 'Guanagazapa', 14),
(223, 'Masagua', 14),
(224, 'San Vicente Pacaya', 14),
(225, 'Iztapa', 14),
(226, 'Nueva Concepción', 14),
(227, 'Santa Lucía Cotzumalguapa', 14),
(228, 'La Democracia', 14),
(229, 'Palín', 14),
(230, 'Siquinalá', 14),
(231, 'Jalapa', 15),
(232, 'San Luis Jilotepeque', 15),
(233, 'Mataquescuintla', 15),
(234, 'San Manuel Chaparrón', 15),
(235, 'Monjas', 15),
(236, 'San Pedro Pinula', 15),
(237, 'San Carlos Alzatate', 15),
(238, 'Agua Blanca', 16),
(239, 'Conguaco', 16),
(240, 'Jerez', 16),
(241, 'Quesada', 16),
(242, 'Zapotitlán', 16),
(243, 'Asunción Mita', 16),
(244, 'El Adelanto', 16),
(245, 'Jutiapa', 16),
(246, 'San José Acatempa', 16),
(247, 'Atescatempa', 16),
(248, 'El Progreso', 16),
(249, 'Moyuta', 16),
(250, 'Santa Catarina Mita', 16),
(251, 'Comapa', 16),
(252, 'Jalpatagua', 16),
(253, 'Pasaco', 16),
(254, 'Yupiltepeque', 16),
(255, 'Champerico', 17),
(256, 'San Andrés Villa Seca', 17),
(257, 'Santa Cruz Muluá', 17),
(258, 'El Asintal', 17),
(259, 'San Felipe', 17),
(260, 'Nuevo San Carlos', 17),
(261, 'San Martín Zapotitlán', 17),
(262, 'Retalhuleu', 17),
(263, 'San Sebastián', 17),
(264, 'Alotenango', 18),
(265, 'Magdalena Milpas Altas', 18),
(266, 'San Lucas Sacatepéquez', 18),
(267, 'Santa María de Jesús', 18),
(268, 'La Antigua Guatemala', 18),
(269, 'Pastores', 18),
(270, 'San Miguel Dueñas', 18),
(271, 'Santiago Sacatepéquez', 18),
(272, 'Ciudad Vieja', 18),
(273, 'San Antonio Aguas Calientes', 18),
(274, 'Santa Catarina Barahona', 18),
(275, 'Santo Domingo Xenacoj', 18),
(276, 'Jocotenango', 18),
(277, 'San Bartolomé Milpas Altas', 18),
(278, 'Santa Lucía Milpas Altas', 18),
(279, 'Sumpango', 18),
(280, 'Barberena', 19),
(281, 'Guazacapán', 19),
(282, 'San Juan Tecuaco', 19),
(283, 'Santa Rosa de Lima', 19),
(284, 'Casillas', 19),
(285, 'Nueva Santa Rosa', 19),
(286, 'San Rafaél Las Flores', 19),
(287, 'Taxisco', 19),
(288, 'Chiquimulilla', 19),
(289, 'Oratorio', 19),
(290, 'Santa Cruz Naranjo', 19),
(291, 'Cuilapa', 19),
(292, 'Pueblo Nuevo Viñas', 19),
(293, 'Santa María Ixhuatán', 19),
(294, 'Chicacao', 20),
(295, 'Pueblo Nuevo', 20),
(296, 'San Bernardino', 20),
(297, 'San Juan Bautista', 20),
(298, 'Santa Bárbara', 20),
(299, 'Cuyotenango', 20),
(300, 'Río Bravo', 20),
(301, 'San Francisco Zapotitlán', 20),
(302, 'San Lorenzo', 20),
(303, 'Santo Domingo', 20),
(304, 'Mazatenango', 20),
(305, 'Samayac', 20),
(306, 'San Gabriel', 20),
(307, 'San Miguel Panán', 20),
(308, 'Santo Tomás La Unión', 20),
(309, 'Patulul', 20),
(310, 'San Antonio', 20),
(311, 'San José El Ídolo', 20),
(312, 'San Pablo Jocopilas', 20),
(313, 'Zunilito', 20),
(314, 'Camotán', 21),
(315, 'Ipala', 21),
(316, 'San Jacinto', 21),
(317, 'Chiquimula', 21),
(318, 'Jocotán', 21),
(319, 'San José La Arada', 21),
(320, 'Concepción Las Minas', 21),
(321, 'Olopa', 21),
(322, 'San Juan Ermita', 21),
(323, 'Esquipulas', 21),
(324, 'Quezaltepeque', 21),
(325, 'Cabañas', 22),
(326, 'La Unión', 22),
(327, 'Usumatlán', 22),
(328, 'Estanzuela', 22),
(329, 'Río Hondo', 22),
(330, 'Zacapa', 22),
(331, 'Gualán', 22),
(332, 'San Diego', 22),
(333, 'Huité', 22),
(334, 'Teculután', 22),
(335, 'N/A', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`) VALUES
(1, '', '', '0000-00-00', ''),
(2, 'Walter Jeremías', 'Pretzantzín Xuruc', '2005-08-15', '4ta. Calle Final Zona 1, Totonicapán'),
(3, 'María Mercedes del Milagro', 'Pérez Alvarez', '2005-08-15', '4ta. Calle Final Zona 5, Quetzaltenango, Quetzaltenango'),
(4, 'María Mercedes del Milagro', 'Pérez Alvarez', '2005-08-15', '4ta. Calle Final Zona 5, Quetzaltenango, Quetzaltenango'),
(5, 'Usuario Sistema', 'sistema', '0000-00-00', ''),
(6, 'María Mercedes del Milagro', 'Pérez Alvarez', '2001-04-15', '19 avenida 3-15 zona 3, Quetzaltenango, Quetzaltenango'),
(7, 'María Mercedes del Milagro', 'Pérez Alvarez', '2001-04-15', '19 avenida 3-15 zona 3, Quetzaltenango, Quetzaltenango'),
(8, 'María Mercedes del Milagro', 'Pérez Alvarez', '2001-04-15', '19 avenida 3-15 zona 3, Quetzaltenango, Quetzaltenango'),
(9, 'Juan Gabriel', 'Pérez Alvarez', '1997-08-27', 'PARAJE COXOM CANTON PATZARAJMAC'),
(10, 'Fernanda Victoria', 'Rosales Alvarez', '1995-05-18', 'Cantón Chotacaj, Totonicapán, Totonicapán'),
(11, 'Mayerly', 'Pérez', '1992-05-15', 'Totonicapán'),
(12, 'Nancy Guadalupe', 'Portillo Pinto', '1980-05-08', 'Guatemala, Guatemala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nit` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `razon` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(75) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `muni_id_muni` int(11) NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nit`, `nombre_empresa`, `razon`, `direccion`, `muni_id_muni`, `telefono`, `email`, `estado`) VALUES
(1, '9065487-2', 'Importadora de Occidente', 'cerca de la casa principal', 'Cantón Chotacaj', 2, '77663064', '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queja`
--

CREATE TABLE `queja` (
  `id_queja` int(11) NOT NULL,
  `no_factura` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_documento` date NOT NULL,
  `detalle_queja` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `solicitud` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `queja`
--

INSERT INTO `queja` (`id_queja`, `no_factura`, `fecha_documento`, `detalle_queja`, `solicitud`, `imagen`, `estado`) VALUES
(1, '90787878798', '2021-09-28', 'Precios muy altos', 'Verificar los precios', 'img_28-09-2021_07_09_49.jpg', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `numero_region` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_region` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `numero_region`, `nombre_region`) VALUES
(1, 'Región 1', 'Metropolitana'),
(2, 'Región 2', 'Norte'),
(3, 'Región 3', 'Nor-Oriente'),
(4, 'Región 4', 'Sur-Oriente'),
(5, 'Región 5', 'Central'),
(6, 'Región 6', 'Sur-Occidente'),
(7, 'Región 7', 'Nor-occidente'),
(8, 'Región 8', 'Petén');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre_sede` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`) VALUES
(1, 'Baja Verapaz - DIACO'),
(2, 'Central - DIACO'),
(3, 'Chimaltenango - DIACO'),
(4, 'Chiquimula - DIACO'),
(5, 'Cobán - DIACO'),
(6, 'El Progreso - DIACO'),
(7, 'Escuintla - DIACO'),
(8, 'Huehuetenango - DIACO'),
(9, 'Izabal - DIACO'),
(10, 'Jalapa - DIACO'),
(11, 'Jutiapa - DIACO'),
(12, 'Mixco - DIACO'),
(13, 'Peten - DIACO'),
(14, 'Quetzaltenango - DIACO'),
(15, 'Quiche - DIACO'),
(16, 'Retalhuleu - DIACO'),
(17, 'Sacatepéquez - DIACO'),
(18, 'San Marcos - DIACO'),
(19, 'Santa Rosa - DIACO'),
(20, 'Sololá - DIACO'),
(21, 'Suchitepéquez - DIACO'),
(22, 'Totonicapán - DIACO'),
(23, 'Villa Nueva - DIACO'),
(24, 'Zacapa - DIACO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id_teléfono` int(11) NOT NULL,
  `numero1` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero2` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `persona_id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_teléfono`, `numero1`, `numero2`, `persona_id_persona`) VALUES
(1, '46031258', '47162720', 1),
(2, '55604060', '77662954', 6),
(3, '55604060', '77662954', 7),
(4, '55604060', '77662954', 8),
(5, '49797879', '77662000', 9),
(6, '46125879', '0', 10),
(7, '77663064', '55604060', 11),
(8, '0', '0', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `cui` bigint(18) NOT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hash_clave` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `salt` bigint(20) NOT NULL,
  `estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `persona_id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cui`, `cargo`, `usuario`, `hash_clave`, `salt`, `estado`, `rol`, `email`, `persona_id_persona`) VALUES
(1, 1000000000000, 'Modificación', '', '', 0, 'M', 'Modificación', '', 1),
(2, 2244754280801, 'Director', 'walter_pretz', 'bb0c6f109c4b778db51f757640040678e71c9422bab78bb7bde5bde17e19366e', 989749, 'A', 'Administrador', 'pretz23jer@gmail.com', 2),
(3, 2573748760801, 'Trabajador', 'ejemplo_123', '30e72c4d0cee2736923d3850f3d4c3df8334b6ca08b36d72fbf06c61965cbc02', 451026, 'A', 'Usuario', 'example@hotmail.com', 9),
(4, 2231564880801, 'Jefa Auxiliar Recursos Humanos', 'victoria_rosales', 'd1e83d32eaa0043daa6ac909ef047004810c04878afa421afb70299c7a5383f3', 687781, 'B', 'Usuario', 'example@gmail.com', 10),
(5, 2145789789879, 'Gerente', 'mayerly_perez', 'e69869220f929717b12d4497ad7cd71b607391dfa5585445ea318cb610958574', 612879, 'A', 'Usuario', 'example@gmail.com', 11),
(6, 654654654654, 'Gerente de TI', 'nancy_portillo', 'fee52a7f37e78bc0de3283b4a79d83444c11542320d2c37813056cb9a6b9159f', 178532, 'A', 'Administrador', 'example@gmail.com', 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consumidor`
--
ALTER TABLE `consumidor`
  ADD PRIMARY KEY (`id_consumidor`),
  ADD KEY `muni_id_muni` (`muni_id_muni`),
  ADD KEY `sede_id_sede` (`sede_id_sede`);

--
-- Indices de la tabla `control_registro`
--
ALTER TABLE `control_registro`
  ADD PRIMARY KEY (`id_control`),
  ADD KEY `proveedor_id_proveedor` (`proveedor_id_proveedor`),
  ADD KEY `consum_id_consumidor` (`consum_id_consumidor`),
  ADD KEY `queja_id_queja` (`queja_id_queja`),
  ADD KEY `usuario_id_usuario` (`usuario_id_modifica`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `regio_id_region` (`region_id_region`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento_id_departamento` (`departamento_id_departamento`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `muni_id_muni` (`muni_id_muni`);

--
-- Indices de la tabla `queja`
--
ALTER TABLE `queja`
  ADD PRIMARY KEY (`id_queja`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id_teléfono`),
  ADD KEY `persona_id_persona` (`persona_id_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cui` (`cui`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `persona_id_persona` (`persona_id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consumidor`
--
ALTER TABLE `consumidor`
  MODIFY `id_consumidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `control_registro`
--
ALTER TABLE `control_registro`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `queja`
--
ALTER TABLE `queja`
  MODIFY `id_queja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_teléfono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumidor`
--
ALTER TABLE `consumidor`
  ADD CONSTRAINT `consumidor_ibfk_1` FOREIGN KEY (`sede_id_sede`) REFERENCES `sede` (`id_sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumidor_ibfk_2` FOREIGN KEY (`muni_id_muni`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_registro`
--
ALTER TABLE `control_registro`
  ADD CONSTRAINT `control_registro_ibfk_1` FOREIGN KEY (`usuario_id_modifica`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `control_registro_ibfk_2` FOREIGN KEY (`proveedor_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `control_registro_ibfk_3` FOREIGN KEY (`consum_id_consumidor`) REFERENCES `consumidor` (`id_consumidor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `control_registro_ibfk_4` FOREIGN KEY (`queja_id_queja`) REFERENCES `queja` (`id_queja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`region_id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`departamento_id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`muni_id_muni`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
