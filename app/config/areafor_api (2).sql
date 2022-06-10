-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2022 a las 19:11:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `areafor_api`
--
CREATE DATABASE IF NOT EXISTS `areafor_api` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `areafor_api`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `People`
--

DROP TABLE IF EXISTS `People`;
CREATE TABLE `People` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimientos` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `People`
--

INSERT INTO `People` (`id`, `nombre`, `apellidos`, `email`, `conocimientos`) VALUES
(7, 'Franklyn', 'Montoya', '', ''),
(8, 'Elena', 'Jiménez', '', ''),
(9, 'Igor', 'Aranaz', '', ''),
(10, 'Jean Pool', 'Guerrero', '', ''),
(11, 'Javier', 'Balliache', '', ''),
(12, 'Iñaki', 'Gaztelu', '', ''),
(13, 'Jose María', 'Tomé', '', ''),
(14, 'Daniel', 'Hernández', '', ''),
(15, 'Pepe', 'Pepito', 'a@a.com', 'nada'),
(16, 'Maria', 'Nunez', 'aaaaaa@aaaa.com', 'Informatica'),
(17, 'Pello', 'Agirre', 'aaaaaa@aaarrr..com', 'Informatica'),
(18, 'Pello', 'fernandez', 'aaaaaa@aaarrr..com', 'Informatica'),
(19, 'Pello MAri', 'Fernandez', 'aaaaaa@aaarrr..com', 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

DROP TABLE IF EXISTS `redes_sociales`;
CREATE TABLE `redes_sociales` (
  `id` int(11) NOT NULL,
  `id_alumno_profesor` int(11) NOT NULL,
  `twitter` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `github` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `linkedIn` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sitio_web` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE `tutores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `conocimientos` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id`, `nombre`, `apellidos`, `email`, `conocimientos`) VALUES
(6, 'Albertodsss', 'Mozodsss', 'albertomozo@gmail.com', 'inform&aacute;tica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno_profesor` (`id_alumno_profesor`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `People`
--
ALTER TABLE `People`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tutores`
--
ALTER TABLE `tutores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
