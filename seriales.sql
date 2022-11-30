-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 17:10:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `id_orden` int(11) NOT NULL,
  `nombre_provedor` varchar(250) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `numero_orden` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(250) COLLATE utf8_bin NOT NULL,
  `referencia` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombre`, `referencia`) VALUES
(1, 'FIBRA FTTH TIPO DROP 2 HILO MONOMODO 1KM', 'LPSFB2H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_oc`
--

CREATE TABLE `prod_oc` (
  `id_prod_oc` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `cantidad` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seriales`
--

CREATE TABLE `seriales` (
  `id_serial` int(11) NOT NULL,
  `caracteres` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_prod_oc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(250) COLLATE utf8_bin NOT NULL,
  `clave` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `prod_oc`
--
ALTER TABLE `prod_oc`
  ADD PRIMARY KEY (`id_prod_oc`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD UNIQUE KEY `id_compra` (`id_orden`);

--
-- Indices de la tabla `seriales`
--
ALTER TABLE `seriales`
  ADD PRIMARY KEY (`id_serial`),
  ADD UNIQUE KEY `id_prod_oc` (`id_prod_oc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prod_oc`
--
ALTER TABLE `prod_oc`
  MODIFY `id_prod_oc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seriales`
--
ALTER TABLE `seriales`
  MODIFY `id_serial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prod_oc`
--
ALTER TABLE `prod_oc`
  ADD CONSTRAINT `prod_oc_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_oc_ibfk_2` FOREIGN KEY (`id_orden`) REFERENCES `orden_compra` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seriales`
--
ALTER TABLE `seriales`
  ADD CONSTRAINT `seriales_ibfk_1` FOREIGN KEY (`id_prod_oc`) REFERENCES `prod_oc` (`id_prod_oc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
