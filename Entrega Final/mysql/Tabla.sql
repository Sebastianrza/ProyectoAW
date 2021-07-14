-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: vm20.db.swarm.test
-- Tiempo de generación: 09-06-2021 a las 20:42:22
-- Versión del servidor: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wavecast`
--
CREATE DATABASE IF NOT EXISTS `wavecast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wavecast`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

DROP TABLE IF EXISTS `foro`;
CREATE TABLE `foro` (
  `ID` int(7) UNSIGNED NOT NULL,
  `autor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `respuestas` int(11) NOT NULL DEFAULT 0,
  `identificador` int(7) NOT NULL DEFAULT 0,
  `idPlaylist` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listapodcast`
--

DROP TABLE IF EXISTS `listapodcast`;
CREATE TABLE `listapodcast` (
  `idPodcast` int(11) NOT NULL,
  `idLista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE `playlist` (
  `idPlaylist` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idPropietario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcast`
--

DROP TABLE IF EXISTS `podcast`;
CREATE TABLE `podcast` (
  `userPodcast` varchar(255) NOT NULL,
  `nombrePodcast` varchar(255) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `genero` text NOT NULL,
  `Fecha` date NOT NULL,
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `email` varchar(30) NOT NULL,
  `nombre` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `biografia` text NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `numeroPodcast` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idPlaylist` (`idPlaylist`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `listapodcast`
--
ALTER TABLE `listapodcast`
  ADD KEY `idLista` (`idLista`),
  ADD KEY `podcastIDA` (`idPodcast`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`idPlaylist`);

--
-- Indices de la tabla `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`idPodcast`),
  ADD KEY `userPodcast` (`userPodcast`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `ID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `idPlaylist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `podcast`
--
ALTER TABLE `podcast`
  MODIFY `idPodcast` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`idPlaylist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listapodcast`
--
ALTER TABLE `listapodcast`
  ADD CONSTRAINT `idLista` FOREIGN KEY (`idLista`) REFERENCES `playlist` (`idPlaylist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listapodcast_ibfk_1` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE,
  ADD CONSTRAINT `podcastIDA` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `podcast`
--
ALTER TABLE `podcast`
  ADD CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`userPodcast`) REFERENCES `usuario` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
