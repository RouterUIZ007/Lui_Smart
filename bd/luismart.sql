-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2021 a las 07:43:36
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luismart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_c` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `inter` varchar(5) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `exter` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_c`, `nombre`, `telefono`, `calle`, `inter`, `colonia`, `exter`) VALUES
(29, 'CRISTOBAL SANMARTIN CENTENO', '9518407078', 'LACINIA', '248', 'REFORMA', 'S/N'),
(30, 'CRISTIAN JOVER NOTARIO', '9513563126', 'INSURGENTES', '128', 'REFORMA', 'S/N'),
(31, 'GABRIEL PERONA FERRANDEZ', '9515393616', 'PORFIRIO', '48', 'REFORMA', 'S/N'),
(32, 'MARC QUIROS GONGORA', '9519126363', 'BENITO', '111', 'SENORES', 'S/N'),
(33, 'JAIME NEGRIN SENDRA', '9518495797', 'EMILIANO', '388', 'SENORES', 'S/N'),
(34, 'FRANCISCO PRIETO POL', '9519209422', 'CALVARIO', '748', 'SENORES', 'S/N'),
(35, 'JUAN ANTONIO BARRIGA POLANCO', '9516024913', 'TEODORO', '125', 'AURORA', 'S/N'),
(36, 'IVAN TERAN LASO', '9517162705', 'ESCUTIA', '24', 'AURORA', 'S/N'),
(37, 'JUAN CALZADO COLOM', '9517081040', 'LIBERTAD', '4', 'AURORA', 'S/N'),
(38, 'IGNACIO SANCHO BERENGUER', '9511903200', 'REVOLUCION', '12', 'AURORA', 'S/N'),
(39, 'PATRICIA BERLANGA OLIVAN', '9511708355', 'BENITO', '11', 'LIBERTAD', 'S/N'),
(40, 'YOLANDA CAVERO SAINZ', '9511816948', 'LACINIA', '10', 'LIBERTAD', 'S/N'),
(41, 'MARIA MAR COMINO BORRAS', '9516359584', 'INSURGENTES', '87', 'LIBERTAD', 'S/N'),
(42, 'MARIA JOSE GARROTE SOLA', '9513160025', 'BENITO', '77', 'LIBERTAD', 'S/N'),
(43, 'BEATRIZ ARNEDO GARZON', '9517483663', 'PORFIRIO', '777', 'LIBERTAD', 'S/N'),
(44, 'MARIA VICTORIA SERRAT BARRIGA', '9514700268', 'ESCUTIA', '666', 'MORELOS', 'S/N'),
(45, 'INMACULADA ALBERT SALGADO', '9515217797', 'EMILIANO', '487', 'MORELOS', 'S/N'),
(46, 'SARA ALBARRAN CARRO', '9514400324', 'INSURGENTES', '965', 'MORELOS', 'S/N'),
(47, 'ANA ISABEL GIBERT FRANCISCO', '9517397190', 'PORFIRIO', '248', 'MORELOS', 'S/N'),
(48, 'MARIA PILAR CARRION ORTIZ', '9514066620', 'LACINIA', '842', 'UNIÓN', 'S/N'),
(49, 'MOHAMED CLAVERIA HUETE', '9512422779', 'INSURGENTES', '685', 'UNIÓN', 'S/N'),
(50, 'IGNACIO CALDERON MORILLO', '9513496570', 'ESCUTIA', '201', 'UNIÓN', 'S/N'),
(51, 'DOMINGO MARIN DIAZ', '9517764938', 'PORFIRIO', '305', 'UNIÓN', 'S/N'),
(52, 'IVAN CUERVO TORREGROSA', '9518854522', 'BENITO', '220', 'MARGARITAS', 'S/N'),
(53, 'JUAN JOSE MURO ARCE', '9516341579', 'PORFIRIO', '754', 'MARGARITAS', 'S/N'),
(54, 'ANGEL ARELLANO ROURA', '9518189730', 'EMILIANO', '750', 'MARGARITAS', 'S/N'),
(55, 'FRANCISCO FERRERO CASTRILLO', '9518568578', 'LACINIA', '513', 'MARGARITAS', 'S/N'),
(56, 'ALBERT HEVIA INIESTA', '9517680563', 'INSURGENTES', '12', 'VICTORIA', 'S/N'),
(57, 'JOSE MIGUEL OBREGON COMESAÑA', '9514201878', 'PORFIRIO', '1', 'VICTORIA', 'S/N'),
(58, 'JUAN MANUEL MACHO CRESPI', '9517351232', 'ESCUTIA', '5', 'VICTORIA', 'S/N'),
(59, 'RAQUEL FERRERO ANGEL', '9518216244', 'EMILIANO', '2', 'VICTORIA', 'S/N'),
(60, 'ANA PEREIRO BAUZA', '9516146747', 'PORFIRIO', '3', 'VICTORIA', 'S/N'),
(61, 'MARINA VIERA BENAVIDES', '9518406887', 'INSURGENTES', '28', 'MONTOYA', 'S/N'),
(62, 'LORENA AMIGO SOLA', '9517876566', 'CALVARIO', '24', 'MONTOYA', 'S/N'),
(63, 'JUANA ALBARRACIN PIZARRO', '9511665658', 'BENITO', '27', 'MONTOYA', 'S/N'),
(64, 'CARLA ESPINO MEDINA', '9518307217', 'INSURGENTES', '85', 'MONTOYA', 'S/N'),
(65, 'ELENA FUNES GIMENEZ', '9519510805', 'PORFIRIO', '45', 'MONTOYA', 'S/N'),
(66, 'MARIA LUISA ROZAS PLANAS', '9515024432', 'REVOLUCION', '33', 'PILARES', 'S/N'),
(67, 'CLAUDIA JEREZ MANCHON', '9519316746', 'LACINIA', '34', 'PILARES', 'S/N'),
(68, 'NATALIA MADARIAGA RIOS', '9519435045', 'REVOLUCION', '388', 'PILARES', 'S/N'),
(69, 'NICOLAS VALENZUELA BARCELO', '9515642654', 'INSURGENTES', '248', 'PILARES', 'S/N'),
(70, 'SEBASTIAN DOBLAS MENENDEZ', '9512242510', 'LACINIA', '698', 'PILARES', 'S/N'),
(71, 'ALEJANDRO ARELLANO GAY', '9511823699', 'INSURGENTES', '678', 'PILARES', 'S/N'),
(72, 'JOSE MIGUEL LANDA HEREDIA', '9512940209', 'LACINIA', '481', 'INSURGENTES', 'S/N'),
(73, 'IVAN SIERRA TORREJON', '9519203933', 'CALVARIO', '211', 'INSURGENTES', 'S/N'),
(74, 'LORENZO CORONA PINTO', '9516545785', 'PORFIRIO', '122', 'INSURGENTES', 'S/N'),
(75, 'ENRIQUE BARCIA TRIVIÑO', '9512368327', 'LACINIA', '542', 'INSURGENTES', 'S/N'),
(76, 'EUGENIO VERA SANZ', '9513550955', 'LACINIA', '234', 'JOYA', 'S/N'),
(77, 'VICENTE GAITAN VAL', '9517066690', 'INSURGENTES', '548', 'JOYA', 'S/N'),
(78, 'JUAN ANTONIO PINO MORENTE', '9517668073', 'CALVARIO', '454', 'JOYA', 'S/N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `folio_p` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_v` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`folio_p`, `fecha`, `id_v`, `total`) VALUES
(20, '2021-07-06', 66, '7000.00'),
(21, '2021-07-06', 67, '10998.00'),
(22, '2021-07-06', 68, '7155.00'),
(23, '2021-07-06', 69, '10194.00'),
(24, '2021-07-06', 70, '12279.00'),
(25, '2021-07-06', 71, '5939.00'),
(26, '2021-07-06', 72, '9397.00'),
(27, '2021-07-06', 73, '7680.00'),
(28, '2021-07-06', 74, '8243.00'),
(29, '2021-07-06', 75, '7121.00'),
(30, '2021-07-06', 76, '4266.00'),
(31, '2021-07-06', 77, '5986.00'),
(32, '2021-07-06', 78, '10986.00'),
(33, '2021-07-06', 79, '5804.00'),
(34, '2021-07-06', 80, '9727.00'),
(35, '2021-07-06', 81, '7121.00'),
(36, '2021-07-06', 82, '7091.00'),
(37, '2021-07-06', 83, '12197.00'),
(38, '2021-07-06', 84, '8270.00'),
(39, '2021-07-06', 85, '6028.00'),
(40, '2021-07-06', 86, '11754.00'),
(41, '2021-07-06', 87, '12984.00'),
(42, '2021-07-06', 88, '8962.00'),
(43, '2021-07-06', 89, '10550.00'),
(44, '2021-07-06', 90, '5177.00'),
(45, '2021-07-06', 91, '9478.00'),
(46, '2021-07-06', 92, '7186.00'),
(47, '2021-07-06', 93, '8002.00'),
(48, '2021-07-06', 94, '9770.00'),
(49, '2021-07-06', 95, '5207.00'),
(50, '2021-07-06', 96, '4346.00'),
(51, '2021-07-06', 97, '7890.00'),
(52, '2021-07-06', 98, '6423.00'),
(53, '2021-07-06', 99, '7082.00'),
(54, '2021-07-06', 100, '6463.00'),
(55, '2021-07-06', 101, '9343.00'),
(56, '2021-07-06', 102, '11669.00'),
(57, '2021-07-06', 103, '4620.00'),
(58, '2021-07-06', 104, '9427.00'),
(59, '2021-07-06', 105, '4627.00'),
(60, '2021-07-06', 106, '6183.00'),
(61, '2021-07-06', 107, '7976.00'),
(62, '2021-07-06', 108, '4774.00'),
(63, '2021-07-06', 109, '5972.00'),
(64, '2021-07-06', 110, '10969.00'),
(65, '2021-07-06', 111, '5398.00'),
(66, '2021-07-06', 112, '6352.00'),
(67, '2021-07-06', 113, '4727.00'),
(68, '2021-07-06', 114, '5023.00'),
(69, '2021-07-06', 115, '11191.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `codigo` int(11) NOT NULL,
  `concepto` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(80) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_v` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`codigo`, `concepto`, `costo`, `tipo`, `Id_v`) VALUES
(59, 'VINIL', '2000.00', 'PINTURA', 66),
(60, 'MANO DE OBRA', '5000.00', 'HOJALATERIA', 66),
(61, 'BALATAS', '7998.00', 'HOJALATERIA', 67),
(62, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 67),
(63, 'VIDRIOS VINIL', '4155.00', 'HOJALATERIA', 68),
(64, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 68),
(65, 'CHASIS', '7194.00', 'HOJALATERIA', 69),
(66, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 69),
(67, 'CAMBIO DE PINTURA', '9279.00', 'PINTURA', 70),
(68, 'MANO DE OBRA', '3000.00', 'PINTURA', 70),
(69, 'VIDRIOS VINIL', '2939.00', 'HOJALATERIA', 71),
(70, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 71),
(71, 'VIDRIOS VINIL', '6397.00', 'HOJALATERIA', 72),
(72, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 72),
(73, 'CAMBIO DE PINTURA', '4680.00', 'PINTURA', 73),
(74, 'MANO DE OBRA', '3000.00', 'PINTURA', 73),
(75, 'CAMBIO DE PINTURA', '5243.00', 'PINTURA', 74),
(76, 'MANO DE OBRA', '3000.00', 'PINTURA', 74),
(77, 'SUSTITUCION DE PARTES', '4121.00', 'HOJALATERIA', 75),
(78, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 75),
(79, 'CAMBIO DE PINTURA', '1266.00', 'PINTURA', 76),
(80, 'MANO DE OBRA', '3000.00', 'PINTURA', 76),
(81, 'CAMBIO DE PINTURA', '2986.00', 'PINTURA', 77),
(82, 'MANO DE OBRA', '3000.00', 'PINTURA', 77),
(83, 'VIDRIOS VINIL', '7986.00', 'HOJALATERIA', 78),
(84, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 78),
(85, 'VIDRIOS VINIL', '2804.00', 'HOJALATERIA', 79),
(86, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 79),
(87, 'CHASIS', '6727.00', 'HOJALATERIA', 80),
(88, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 80),
(89, 'RAYON', '4121.00', 'HOJALATERIA', 81),
(90, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 81),
(91, 'CAMBIO DE PINTURA', '4091.00', 'PINTURA', 82),
(92, 'MANO DE OBRA', '3000.00', 'PINTURA', 82),
(93, 'CHASIS', '9197.00', 'HOJALATERIA', 83),
(94, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 83),
(95, 'CHASIS', '5270.00', 'HOJALATERIA', 84),
(96, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 84),
(97, 'CAMBIO DE PINTURA', '3028.00', 'PINTURA', 85),
(98, 'MANO DE OBRA', '3000.00', 'PINTURA', 85),
(99, 'CAMBIO DE PINTURA', '8754.00', 'PINTURA', 86),
(100, 'MANO DE OBRA', '3000.00', 'PINTURA', 86),
(101, 'SUSTITUCION DE PARTES', '9984.00', 'HOJALATERIA', 87),
(102, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 87),
(103, 'ABOLLADURA', '5962.00', 'HOJALATERIA', 88),
(104, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 88),
(105, 'CAMBIO DE PINTURA', '7550.00', 'PINTURA', 89),
(106, 'MANO DE OBRA', '3000.00', 'PINTURA', 89),
(107, 'SUSTITUCION DE PARTES', '2177.00', 'HOJALATERIA', 90),
(108, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 90),
(109, 'VIDRIOS VINIL', '6478.00', 'HOJALATERIA', 91),
(110, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 91),
(111, 'SUSTITUCION DE PARTES', '4186.00', 'HOJALATERIA', 92),
(112, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 92),
(113, 'ABOLLADURA', '5002.00', 'HOJALATERIA', 93),
(114, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 93),
(115, 'SUSTITUCION DE PARTES', '6770.00', 'HOJALATERIA', 94),
(116, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 94),
(117, 'SUSTITUCION DE PARTES', '2207.00', 'HOJALATERIA', 95),
(118, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 95),
(119, 'VIDRIOS VINIL', '1346.00', 'HOJALATERIA', 96),
(120, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 96),
(121, 'CAMBIO DE PINTURA', '4890.00', 'PINTURA', 97),
(122, 'MANO DE OBRA', '3000.00', 'PINTURA', 97),
(123, 'VIDRIOS VINIL', '3423.00', 'HOJALATERIA', 98),
(124, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 98),
(125, 'RAYON', '4082.00', 'HOJALATERIA', 99),
(126, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 99),
(127, 'ABOLLADURA', '3463.00', 'HOJALATERIA', 100),
(128, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 100),
(129, 'RAYON', '6343.00', 'HOJALATERIA', 101),
(130, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 101),
(131, 'VIDRIOS VINIL', '8669.00', 'HOJALATERIA', 102),
(132, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 102),
(133, 'ABOLLADURA', '1620.00', 'HOJALATERIA', 103),
(134, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 103),
(135, 'RAYON', '6427.00', 'HOJALATERIA', 104),
(136, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 104),
(137, 'CAMBIO DE PINTURA', '1627.00', 'PINTURA', 105),
(138, 'MANO DE OBRA', '3000.00', 'PINTURA', 105),
(139, 'CHASIS', '3183.00', 'HOJALATERIA', 106),
(140, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 106),
(141, 'BALATAS', '4976.00', 'HOJALATERIA', 107),
(142, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 107),
(143, 'CAMBIO DE PINTURA', '1774.00', 'PINTURA', 108),
(144, 'MANO DE OBRA', '3000.00', 'PINTURA', 108),
(145, 'BALATAS', '2972.00', 'HOJALATERIA', 109),
(146, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 109),
(147, 'CAMBIO DE PINTURA', '7969.00', 'PINTURA', 110),
(148, 'MANO DE OBRA', '3000.00', 'PINTURA', 110),
(149, 'CAMBIO DE PINTURA', '2398.00', 'PINTURA', 111),
(150, 'MANO DE OBRA', '3000.00', 'PINTURA', 111),
(151, 'ABOLLADURA', '3352.00', 'HOJALATERIA', 112),
(152, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 112),
(153, 'ABOLLADURA', '1727.00', 'HOJALATERIA', 113),
(154, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 113),
(155, 'VIDRIOS VINIL', '2023.00', 'HOJALATERIA', 114),
(156, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 114),
(157, 'CHASIS', '8191.00', 'HOJALATERIA', 115),
(158, 'MANO DE OBRA', '3000.00', 'HOJALATERIA', 115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `rol`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(9, 'admin', 'root', '$2a$07$asxx54ahjppf45sd87a5auNOqyQU6vZUWwwmFM.tBJOLW4X/5sf0y', 'administrador', '', 1, '2021-07-06 21:36:11', '2021-07-07 02:36:11'),
(14, 'Daniel Martinez', 'jefe', '$2a$07$asxx54ahjppf45sd87a5auzF9O26wAUJ0QHp3TYErj9m4B8pnGKBu', 'Jefetaller', '', 1, '2021-07-06 20:56:26', '2021-07-07 01:56:26'),
(15, 'Oscar Ramirez', 'secretaria', '$2a$07$asxx54ahjppf45sd87a5auAb16PPVeY4oj82Nk3KKFmRF2HETeXUe', 'Secretaria', '', 1, '2021-07-06 20:54:41', '2021-07-07 01:54:41'),
(16, 'Guillermo Riaño', 'cajero', '$2a$07$asxx54ahjppf45sd87a5auvgGA2dZ5LsKkjHKDw.v1htyhp2LzpCi', 'Cajero', '', 1, '2021-07-06 20:52:14', '2021-07-07 01:52:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_v` int(11) NOT NULL,
  `Matricula` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `color` varchar(55) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_c` int(11) DEFAULT NULL,
  `modelo` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_v`, `Matricula`, `marca`, `color`, `observaciones`, `id_c`, `modelo`) VALUES
(66, 'CX0001', 'VOLKSWAGEN', 'NEGRO', 'PINTURA DESGASTADA', 29, 'BEETLE'),
(67, 'CM2411', 'FORD', 'GRIS', 'CHOCADO', 35, 'ARTEON'),
(68, 'CM1452', 'FORD', 'GRIS', 'SIN ESPEJOS', 39, 'EXPLORER'),
(69, 'BN1423', 'NISSAN', 'AZUL', 'CHOCADO', 50, 'ECOSPORT'),
(70, 'CP1453', 'HYUNDAI', 'AZUL', 'ABOLLADO DEL FRENTE', 67, 'AMAROK'),
(71, 'ZA5489', 'HONDA', 'AZUL', 'VIDRIOS ROTOS', 48, 'COROLLA'),
(72, 'AG7456', 'HYUNDAI', 'NEGRO', 'PINTURA DESGASTADA', 53, 'EXPLORER'),
(73, 'CX3512', 'TOYOTA', 'GRIS', 'VIDRIOS ROTOS', 76, 'ECOSPORT'),
(74, 'JA1245', 'VOLKSWAGEN', 'MARRON', 'QUEMADO', 47, 'ACCORD'),
(75, 'SI3214', 'HYUNDAI', 'AZUL', 'RAYADO', 61, 'EXPLORER'),
(76, 'QR7459', 'FORD', 'AMARILLO', 'CHOCADO', 33, 'EXPLORER'),
(77, 'YU4785', 'HONDA', 'MARRON', 'RAYADO', 61, 'FIESTA'),
(78, 'CM1020', 'VOLKSWAGEN', 'MARRON', 'PUERTA ABOLLADA', 77, 'ECOSPORT'),
(79, 'GJ1456', 'NISSAN', 'AMARILLO', 'CHOCADO', 53, 'EXPLORER'),
(80, 'MR4521', 'FORD', 'AMARILLO', 'PUERTA ABOLLADA', 64, 'EXPLORER'),
(81, 'CM1223', 'HONDA', 'ROJO', 'PUERTA ABOLLADA', 46, 'ARTEON'),
(82, 'JA8455', 'HYUNDAI', 'AZUL', 'VIDRIOS ROTOS', 76, 'BEETLE'),
(83, 'MR5645', 'FORD', 'AZUL', 'PINTURA DESGASTADA', 46, 'EXPLORER'),
(84, 'SL5485', 'FORD', 'AZUL', 'RAYADO', 77, 'BEETLE'),
(85, 'GJ4575', 'HONDA', 'ROJO', 'QUEMADO', 67, 'CIVIC'),
(86, 'AG5846', 'HONDA', 'ROJO', 'ABOLLADO DEL FRENTE', 61, 'ACCORD'),
(87, 'SL4751', 'HYUNDAI', 'ROJO', 'RAYADO', 39, 'SEDAN'),
(88, 'NL2423', 'FORD', 'MARRON', 'SIN ESPEJOS', 44, 'ARTEON'),
(89, 'NA5587', 'TOYOTA', 'AZUL', 'CHOCADO', 63, 'ARTEON'),
(90, 'CM5541', 'NISSAN', 'AZUL', 'CHOCADO', 59, 'COROLLA'),
(91, 'HI5122', 'TOYOTA', 'AMARILLO', 'CHOCADO', 33, 'ECOSPORT'),
(92, 'CH1112', 'HYUNDAI', 'MARRON', 'RAYADO', 74, 'FIESTA'),
(93, 'DU2236', 'VOLKSWAGEN', 'AZUL', 'SIN ESPEJOS', 34, 'SEDAN'),
(94, 'MR6622', 'TOYOTA', 'GRIS', 'ABOLLADO DEL FRENTE', 61, 'ACCORD'),
(95, 'CM2162', 'HYUNDAI', 'AMARILLO', 'ABOLLADO DEL FRENTE', 64, 'ACCORD'),
(96, 'CP1111', 'HYUNDAI', 'MARRON', 'QUEMADO', 57, 'ACCORD'),
(97, 'HI5662', 'HONDA', 'ROJO', 'PUERTA ABOLLADA', 32, 'ACCORD'),
(98, 'DU9526', 'NISSAN', 'AMARILLO', 'QUEMADO', 31, 'ARTEON'),
(99, 'DU7741', 'HYUNDAI', 'MARRON', 'RAYADO', 32, 'ECOSPORT'),
(100, 'TL5522', 'TOYOTA', 'NEGRO', 'PINTURA DESGASTADA', 76, 'EXPLORER'),
(101, 'QR5541', 'NISSAN', 'AZUL', 'QUEMADO', 41, 'ARTEON'),
(102, 'CH5511', 'FORD', 'AZUL', 'PUERTA ABOLLADA', 74, 'FIESTA'),
(103, 'GJ2235', 'VOLKSWAGEN', 'MARRON', 'ABOLLADO DEL FRENTE', 31, 'AMAROK'),
(104, 'PU5841', 'TOYOTA', 'NEGRO', 'ABOLLADO DEL FRENTE', 65, 'ACCORD'),
(105, 'MC3552', 'HYUNDAI', 'NEGRO', 'PUERTA ABOLLADA', 46, 'SEDAN'),
(106, 'JA5421', 'HYUNDAI', 'AMARILLO', 'SIN ESPEJOS', 67, 'FIESTA'),
(107, 'QE2151', 'NISSAN', 'AMARILLO', 'CHOCADO', 49, 'FIESTA'),
(108, 'SI8855', 'HYUNDAI', 'GRIS', 'PUERTA ABOLLADA', 45, 'FIESTA'),
(109, 'HI6511', 'HONDA', 'MARRON', 'SIN ESPEJOS', 71, 'SEDAN'),
(110, 'MX6212', 'HONDA', 'NEGRO', 'PUERTA ABOLLADA', 36, 'AMAROK'),
(111, 'ZA8821', 'HONDA', 'MARRON', 'VIDRIOS ROTOS', 54, 'CIVIC'),
(112, 'GJ8812', 'NISSAN', 'GRIS', 'PUERTA ABOLLADA', 37, 'BEETLE'),
(113, 'PU4182', 'HYUNDAI', 'NEGRO', 'ABOLLADO DEL FRENTE', 78, 'ECOSPORT'),
(114, 'CP1235', 'HYUNDAI', 'AMARILLO', 'PUERTA ABOLLADA', 46, 'ARTEON'),
(115, 'JA5685', 'TOYOTA', 'NEGRO', 'SIN ESPEJOS', 48, 'ARTEON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `folio_v` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `folio_p` int(11) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `subtotal` double NOT NULL,
  `cantidad` double NOT NULL,
  `cambio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`folio_v`, `fecha`, `folio_p`, `id_e`, `total`, `subtotal`, `cantidad`, `cambio`) VALUES
(81, '2021-07-07', 20, 9, 8120, 7000, 8200, 80),
(82, '2021-07-07', 21, 9, 12757.68, 10998, 12800, 42.32),
(83, '2021-07-07', 22, 9, 8299.8, 7155, 8500, 200.2),
(84, '2021-07-07', 23, 9, 11825.04, 10194, 12000, 174.96),
(85, '2021-07-07', 24, 9, 14243.64, 12279, 14500, 256.36),
(86, '2021-07-07', 25, 9, 6889.24, 5939, 7000, 110.76),
(87, '2021-07-07', 26, 9, 10900.52, 9397, 11000, 99.48),
(88, '2021-07-07', 27, 9, 8908.8, 7680, 9000, 91.2),
(89, '2021-07-07', 29, 9, 9561.88, 7121, 10000, 438.12),
(90, '2021-07-07', 30, 9, 4948.56, 4266, 5000, 51.44),
(91, '2021-07-07', 31, 9, 6943.76, 5986, 7000, 56.24),
(92, '2021-07-07', 32, 9, 12743.76, 10986, 13000, 256.24),
(93, '2021-07-07', 34, 9, 11283.32, 9727, 12000, 716.68),
(94, '2021-07-07', 35, 9, 8260.36, 7121, 9000, 739.64),
(95, '2021-07-07', 36, 9, 8225.56, 7091, 8500, 274.44),
(96, '2021-07-07', 37, 9, 14148.52, 12197, 15000, 851.48),
(97, '2021-07-07', 38, 9, 9593.2, 8270, 10000, 406.8),
(98, '2021-07-07', 39, 9, 6992.48, 6028, 7000, 7.52),
(99, '2021-07-07', 28, 9, 9561.88, 8243, 10000, 438.12),
(100, '2021-07-07', 33, 9, 6732.64, 5804, 7000, 267.36);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`folio_p`),
  ADD KEY `id_v` (`id_v`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Id_v` (`Id_v`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_v`),
  ADD KEY `id_c` (`id_c`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`folio_v`),
  ADD KEY `folio_p` (`folio_p`),
  ADD KEY `id_e` (`id_e`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `folio_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `folio_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`id_v`) REFERENCES `vehiculo` (`id_v`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`Id_v`) REFERENCES `vehiculo` (`id_v`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cliente` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`folio_p`) REFERENCES `presupuesto` (`folio_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
