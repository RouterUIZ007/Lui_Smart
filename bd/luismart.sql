-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 14:26:48
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
(26, 'LUIS', '9516549873', 'H', '98', 'BUENA VIUSTA SSSSSS', 'A7'),
(27, 'ISAI', '9518748745', 'DOMICILIO CONOCIDO', 'S/N', 'MORELOS', 'S/N');

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
(15, '2021-06-02', 12, '1200.00'),
(17, '2021-06-04', 14, '56.00'),
(18, '2021-06-15', 14, '5056.00'),
(19, '2021-06-21', 14, '5052.00'),
(20, '2021-06-21', 15, '2900.00'),
(21, '2021-06-21', 15, '2900.00'),
(22, '2021-06-21', 15, '2900.00'),
(23, '2021-06-21', 15, '2900.00'),
(24, '2021-06-21', 15, '2900.00'),
(25, '2021-06-21', 15, '2900.00'),
(26, '2021-06-21', 15, '2900.00'),
(27, '2021-06-21', 15, '2900.00'),
(28, '2021-06-21', 15, '2900.00'),
(29, '2021-06-21', 15, '2900.00'),
(30, '2021-06-21', 15, '2900.00'),
(31, '2021-06-21', 15, '2900.00'),
(32, '2021-06-21', 15, '2900.00'),
(33, '2021-06-21', 15, '2900.00'),
(34, '2021-06-21', 15, '2900.00'),
(35, '2021-06-21', 15, '2900.00'),
(36, '2021-06-21', 15, '2900.00'),
(37, '2021-06-21', 15, '2900.00');

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
(1, NULL, NULL, NULL, NULL),
(37, 'PINTURA NEGRA', '800.00', 'PINTURA', 12),
(38, 'COBRO DE PINTADA', '400.00', 'PINTURA', 12),
(40, 'ASD', '456.00', 'PINTURA', 12),
(46, '2', '2.00', 'HOJALATERIA', 14),
(48, '4', '4.00', 'PINTURA', 14),
(49, '5', '5.00', 'HOJALATERIA', 14),
(50, '6', '6.00', 'HOJALATERIA', 14),
(51, '7', '7.00', 'HOJALATERIA', 14),
(52, '8', '8.00', 'HOJALATERIA', 14),
(53, '9', '9.00', 'HOJALATERIA', 14),
(55, '11', '11.00', 'PINTURA', 14),
(56, '242342', '5000.00', 'PINTURA', 14),
(57, 'PINTURA', '500.00', 'PINTURA', 15),
(58, 'PASTA', '900.00', 'HOJALATERIA', 15),
(59, 'PINTADA', '500.00', 'PINTURA', 15),
(60, 'MANO DE HOBRA', '1000.00', 'HOJALATERIA', 15);

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
(9, 'admin', 'root', '$2a$07$asxx54ahjppf45sd87a5auNOqyQU6vZUWwwmFM.tBJOLW4X/5sf0y', 'administrador', '', 1, '2021-06-21 05:05:19', '2021-06-21 10:05:19'),
(12, 'xxx', 'xxx', '$2a$07$asxx54ahjppf45sd87a5auxk2cXQ.31g3rBG7bmaL.q.jFcrQh9Q2', 'administrador', '', 1, '2021-05-30 22:51:25', '2021-05-31 03:51:25'),
(13, 'Jose', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'administrador', '', 1, '0000-00-00 00:00:00', '2021-06-16 01:53:19');

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
(12, 'XX0022', 'FORD', 'NEGRO', 'HALOS SOY ASDASDASD', 26, 'F150'),
(14, 'XX0000', 'MARCA', 'COL3456789', 'ASDASD', 26, 'MOLDE'),
(15, 'GW4591', 'FORD', 'ROJO', 'EL CARRO YA TENIA GOLPES EN LA PUERTA DERECHA', 27, 'MUSTANG');

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
(64, '2021-06-20', 17, 9, 64.96, 56, 70, 5.04),
(65, '2021-06-21', 18, 9, 5864.96, 5056, 6000, 135.04),
(66, '2021-06-21', 18, 9, 5864.96, 5056, 10000, 4135.04),
(67, '2021-06-21', 17, 9, 64.96, 56, 500, 435.04),
(68, '2021-06-21', 15, 9, 1392, 1200, 5000, 3608),
(69, '2021-06-21', 18, 9, 5864.96, 5056, 8000, 2135.04),
(70, '2021-06-21', 17, 9, 64.96, 56, 1000, 935.04),
(71, '2021-06-21', 17, 9, 64.96, 56, 5000, 4935.04),
(72, '2021-06-21', 17, 9, 64.96, 56, 560, 495.04),
(73, '2021-06-21', 15, 9, 1392, 1200, 3000, 1608);

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
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `folio_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `folio_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
