-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 18:12:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotomultas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura_multa`
--

CREATE TABLE `captura_multa` (
  `id_captura` int(11) NOT NULL,
  `foto_captura` varchar(255) NOT NULL,
  `tipo_infraccion` int(11) NOT NULL,
  `zona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_infractor`
--

CREATE TABLE `datos_infractor` (
  `id_datos` int(11) NOT NULL,
  `dueno_nombre_completo` varchar(255) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `placa` varchar(200) NOT NULL,
  `tipo_categoria` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `cantidad_multas` int(10) NOT NULL,
  `puntos_multa` int(10) NOT NULL,
  `pago_multas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_infractor`
--

INSERT INTO `datos_infractor` (`id_datos`, `dueno_nombre_completo`, `modelo`, `placa`, `tipo_categoria`, `correo`, `telefono`, `cantidad_multas`, `puntos_multa`, `pago_multas`) VALUES
(1, 'Jose Perez', 'Volskwagen Bora', 'AAA0000', 8, 'jperez@gmail.com', '04249454830', 2, 4800, 100),
(2, 'Je Pe', 'Volskwagen Bora', 'AAA0001', 8, 'jpe@gmail.com', '04249454831', 3, 4650, 150),
(3, 'Je PeREZ', 'Volskwagen Bora', 'AAAA00003', 8, 'jpeZ@gmail.com', '04249454832', 1, 4950, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraccion`
--

CREATE TABLE `infraccion` (
  `id_infraccion` int(11) NOT NULL,
  `puntos_registro` int(11) NOT NULL,
  `valor_infraccion` double NOT NULL,
  `tex_infraccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infraccion`
--

INSERT INTO `infraccion` (`id_infraccion`, `puntos_registro`, `valor_infraccion`, `tex_infraccion`) VALUES
(1, 50, 50, 'Mal Estacionamiento'),
(2, 150, 50, 'Exceso de Velocidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `id_usuario` varchar(200) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `text_notificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patentes`
--

CREATE TABLE `patentes` (
  `id_patente` int(11) NOT NULL,
  `tipo_patente` varchar(11) NOT NULL,
  `foto_patente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patentes`
--

INSERT INTO `patentes` (`id_patente`, `tipo_patente`, `foto_patente`) VALUES
(2, '0', 'Captura_urbina2-ConvertImage.jpg'),
(3, '1', 'pantallaurbina-ConvertImage.jpg'),
(8, '1', 'dd.png'),
(9, '1', 'g.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patentes_manuales`
--

CREATE TABLE `patentes_manuales` (
  `id_manual` int(11) NOT NULL,
  `id_patente` int(11) NOT NULL,
  `posicion_cola` int(11) NOT NULL,
  `tipo_infraccion` int(11) NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patentes_manuales`
--

INSERT INTO `patentes_manuales` (`id_manual`, `id_patente`, `posicion_cola`, `tipo_infraccion`, `estatus`) VALUES
(1, 3, 1, 2, 1),
(2, 4, 2, 1, 1),
(3, 7, 3, 1, 1),
(4, 8, 4, 1, 1),
(5, 9, 5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_categoria`
--

CREATE TABLE `tipo_categoria` (
  `id_categoria` int(11) NOT NULL,
  `text_categoria` varchar(255) NOT NULL,
  `condicion_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_categoria`
--

INSERT INTO `tipo_categoria` (`id_categoria`, `text_categoria`, `condicion_categoria`) VALUES
(1, 'Evasores de impuestos', 'Si el vehiculo debe más de $1000 en multas'),
(2, 'Inhabilitado', 'Si se queda sin puntos en el registro'),
(3, 'Frecuente', 'Si tiene más de 5 infracciones'),
(4, 'Evasores de impuestos- Inhabilitados', 'Si el vehiculo debe más de $1000 en multas - Si se queda sin puntos en el registro'),
(5, 'Evasores de impuestos - Frecuente', 'Si el vehiculo debe más de $1000 en multas - Si tiene más de 5 infracciones'),
(6, 'Inhabilitado - Frecuente', 'Si se queda sin puntos en el registro - Si tiene más de 5 infracciones'),
(7, 'Evasores de impuestos - Inhabilitado - Frecuente', 'Si el vehiculo debe más de $1000 en multas - Si se queda sin puntos en el registro - Si tiene más de 5 infracciones'),
(8, 'Sin Categorizar', 'Sin Categorizar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

CREATE TABLE `usuario_admin` (
  `id` int(11) NOT NULL,
  `nombre_admi` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`id`, `nombre_admi`, `clave`) VALUES
(1, 'admin1', '12345678'),
(2, 'admin2', '12345678'),
(3, 'admin3', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `captura_multa`
--
ALTER TABLE `captura_multa`
  ADD PRIMARY KEY (`id_captura`);

--
-- Indices de la tabla `datos_infractor`
--
ALTER TABLE `datos_infractor`
  ADD PRIMARY KEY (`id_datos`);

--
-- Indices de la tabla `infraccion`
--
ALTER TABLE `infraccion`
  ADD PRIMARY KEY (`id_infraccion`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id_patente`);

--
-- Indices de la tabla `patentes_manuales`
--
ALTER TABLE `patentes_manuales`
  ADD PRIMARY KEY (`id_manual`);

--
-- Indices de la tabla `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `usuario_admin`
--
ALTER TABLE `usuario_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `captura_multa`
--
ALTER TABLE `captura_multa`
  MODIFY `id_captura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `datos_infractor`
--
ALTER TABLE `datos_infractor`
  MODIFY `id_datos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `infraccion`
--
ALTER TABLE `infraccion`
  MODIFY `id_infraccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id_patente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `patentes_manuales`
--
ALTER TABLE `patentes_manuales`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario_admin`
--
ALTER TABLE `usuario_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
