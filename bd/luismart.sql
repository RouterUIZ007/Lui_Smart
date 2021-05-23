-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2021 a las 02:32:19
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
  `exter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_c`, `nombre`, `telefono`, `calle`, `inter`, `colonia`, `exter`) VALUES
(10, 'BRIAN', '9513216548', 'CALLE MUY LEJOS', '52', 'COL COL COL', 0),
(11, 'ABIMAEL LOPEZ', '9518716225', 'CALLE XD', '1', 'COLONIA', 0),
(12, 'ABIME', '9518746320', 'GHOLAS', '1', 'COL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_e` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `turno` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_te` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
(9, '2021-05-20', 5, '10000.00'),
(10, '2021-05-22', 6, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `codigo` int(11) NOT NULL,
  `concepto` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `tipo` varchar(80) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`codigo`, `concepto`, `costo`, `tipo`, `Id_v`) VALUES
(13, 'pintura blanca', '2000.00', 'Pintura', 5),
(14, 'sera', '1000.00', 'Pintura', 5),
(15, 'vinilo', '1000.00', 'Pintura', 5),
(16, 'x', '1000.00', 'Hojalatería', 5),
(17, 'y', '5000.00', 'Hojalatería', 5),
(18, 'a', '1.00', 'Hojalatería', 5),
(19, 'd', '3.00', 'Hojalatería', 5),
(20, 'a', '1.00', 'Hojalatería', 6),
(21, 'g', '1.00', 'Hojalatería', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id_te` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
(7, 'Alexis', 'alexis', '$2a$07$asxx54ahjppf45sd87a5auwbT3U74NyPrrhU4hwJRTdJ/20zuC.bK', 'Cajero', '', 0, '0000-00-00 00:00:00', '2021-05-11 02:30:58'),
(8, 'Raúl Acevedo Flores', 'raul', '$2a$07$asxx54ahjppf45sd87a5auv7UPUslMtVdBRUG/fW42//pNjvPm9ZC', 'Gerente', '', 0, '0000-00-00 00:00:00', '2021-05-11 19:14:50'),
(9, 'Abimael', 'root', '$2a$07$asxx54ahjppf45sd87a5auNOqyQU6vZUWwwmFM.tBJOLW4X/5sf0y', 'administrador', '', 0, '0000-00-00 00:00:00', '2021-05-14 04:11:42');

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
(5, 'XX0000', 'FORD', 'BLANCO', 'UN COMIONENTA XD', 10, 'F150'),
(6, 'XX0011', 'MARC', 'COLOR', 'OBSERVE', 10, 'MARK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `folio_v` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `folio_p` int(11) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `id_te` (`id_te`);

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
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id_te`);

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
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `folio_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id_te` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `folio_v` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_te`) REFERENCES `tipo_empleado` (`id_te`);

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`id_v`) REFERENCES `vehiculo` (`id_v`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`Id_v`) REFERENCES `vehiculo` (`id_v`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cliente` (`id_c`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`folio_p`) REFERENCES `presupuesto` (`folio_p`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
