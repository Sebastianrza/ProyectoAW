-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2021 a las 19:22:57
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
-- Base de datos: `wavecast`
--
CREATE DATABASE IF NOT EXISTS `wavecast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wavecast`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `idComentario` int(255) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Texto` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listapodcast`
--

DROP TABLE IF EXISTS `listapodcast`;
CREATE TABLE `listapodcast` (
  `idPodcast` int(11) NOT NULL,
  `idLista` int(11) NOT NULL,
  `nombreLista` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

DROP TABLE IF EXISTS `megusta`;
CREATE TABLE `megusta` (
  `podcastID` int(11) NOT NULL,
  `userID` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `Descripción` text NOT NULL,
  `género` text NOT NULL,
  `Fecha` date NOT NULL,
  `rutaPod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `podcast`
--

INSERT INTO `podcast` (`userPodcast`, `nombrePodcast`, `idPodcast`, `Descripción`, `género`, `Fecha`, `rutaPod`) VALUES
('user', 'Podcast 1', 1, 'Este es el podcast número 1', 'Acción', '2021-05-11', ''),
('user', 'Podcast 2', 2, 'Este es el podcast número 2', 'Cultura', '2021-05-02', ''),
('user', 'Podcast 3', 3, 'Este es el podcast número 3', 'Acción', '2021-05-07', ''),
('user', 'Podcast 4', 4, 'Este es el podcast número 4', 'Cultura', '2021-06-06', ''),
('user', 'Podcast 5', 5, 'Este es el podcast número 5', 'Acción', '2021-05-09', ''),
('user', 'Podcast 6', 6, 'Este es el podcast número 6', 'Cultura', '2021-05-06', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcastag`
--

DROP TABLE IF EXISTS `podcastag`;
CREATE TABLE `podcastag` (
  `podcastID` int(11) NOT NULL,
  `tagID` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguir`
--

DROP TABLE IF EXISTS `seguir`;
CREATE TABLE `seguir` (
  `username` varchar(20) NOT NULL,
  `idpodcast` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`) VALUES
('a'),
('p'),
('Prueba'),
('pruebas');

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
  `rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `nombre`, `username`, `pass`, `biografia`, `rol`) VALUES
('algonz22@ucm.es', 'Alex', 'Algonz', '$2y$10$nk2HM6Z0iazQFbJtWZjWHuHl4h6.pFGUcuLOmdLHE4vCyRgUWJtQW', '', NULL),
('srza2011@hotmail.com', 'Sebastian Zambrano', 'sebastianrza', '$2y$10$1EdMNPSuS8NVoQ7ec68nSuxCXkeOnDXoXZnYPbI3DsKjIouerlll6', 'Hola bienvieniod sfnwfnsjndjln sgdsnlds s', 'user'),
('user@user.com', 'user', 'user', '$2y$10$YSiWTWQIPTr7Ymmwdibo8uc64JHDd4zmFy7QdtveoRY0fShwHyGbi', '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idPodcast` (`idPodcast`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `listapodcast`
--
ALTER TABLE `listapodcast`
  ADD PRIMARY KEY (`idPodcast`),
  ADD KEY `idLista` (`idLista`);

--
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`podcastID`,`userID`),
  ADD KEY `podcastID` (`podcastID`),
  ADD KEY `us` (`userID`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`idPlaylist`),
  ADD KEY `idPropietario` (`idPropietario`);

--
-- Indices de la tabla `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`idPodcast`),
  ADD KEY `userPodcast` (`userPodcast`);

--
-- Indices de la tabla `podcastag`
--
ALTER TABLE `podcastag`
  ADD PRIMARY KEY (`podcastID`,`tagID`),
  ADD KEY `tag` (`tagID`);

--
-- Indices de la tabla `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`username`,`idpodcast`),
  ADD KEY `username` (`username`),
  ADD KEY `seguir_ibfk_2` (`idpodcast`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `megusta`
--
ALTER TABLE `megusta`
  MODIFY `podcastID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `idPlaylist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `podcast`
--
ALTER TABLE `podcast`
  MODIFY `idPodcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `idPodcast` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listapodcast`
--
ALTER TABLE `listapodcast`
  ADD CONSTRAINT `idLista` FOREIGN KEY (`idLista`) REFERENCES `playlist` (`idPlaylist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `podcastIDA` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD CONSTRAINT `rg` FOREIGN KEY (`podcastID`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us` FOREIGN KEY (`userID`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `idPropietario` FOREIGN KEY (`idPropietario`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `podcast`
--
ALTER TABLE `podcast`
  ADD CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`userPodcast`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `podcastag`
--
ALTER TABLE `podcastag`
  ADD CONSTRAINT `podcast` FOREIGN KEY (`podcastID`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag` FOREIGN KEY (`tagID`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguir`
--
ALTER TABLE `seguir`
  ADD CONSTRAINT `seguir_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`),
  ADD CONSTRAINT `seguir_ibfk_2` FOREIGN KEY (`idpodcast`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
