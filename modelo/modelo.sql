-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2019 a las 21:25:01
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modelo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `articulo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `articulo`, `fecha`, `precio`, `usuario`) VALUES
(1, 'Vaso', '0000-00-00', '80.00', ''),
(2, 'Cuadro', '0000-00-00', '100.00', ''),
(3, 'Cuchillo', '2019-06-20', '40.00', ''),
(4, 'Tenedor', '2019-06-20', '40.00', ''),
(5, 'Tenedor', '2019-06-20', '40.00', 'admin'),
(6, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(7, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(8, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(9, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(10, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(11, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(12, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(13, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(14, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(15, 'Cuchillo', '2019-06-20', '40.00', 'usuario'),
(16, 'Cuchillo', '2019-06-20', '40.00', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `metodo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ruta` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `usuario`, `metodo`, `ruta`, `hora`) VALUES
(2, 'admin', 'GET', 'usuario', '15:02:39'),
(3, 'admin', 'GET', 'usuario', '16:05:45'),
(4, 'admin', 'GET', 'usuario', '16:07:14'),
(5, 'admin', 'POST', 'login', '16:24:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `clave`, `sexo`, `perfil`) VALUES
(1, 'usuario', '86321663caf32bdd99896b50ae267e9ebcf602e8a02f2b1b1942f50788696a665f05466ba72833832454497b9bf7aea71928ff44b6ae3cce5587c7070d26bbb1', 'femenino', 'usuario'),
(2, 'admin', '8450eca01665516d9aeb5317764902b78495502637c96192c81b1683d32d691a0965cf037feca8b9ed9ee6fc6ab8f27fce8f77c4fd9b4a442a00fc317b8237e6', 'masculino', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
