-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2021 a las 14:12:57
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(255) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Texto` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

CREATE TABLE `megusta` (
  `podcastID` int(11) NOT NULL,
  `userID` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcast`
--

CREATE TABLE `podcast` (
  `userPodcast` varchar(255) NOT NULL,
  `nombrePodcast` varchar(255) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `Descripción` text NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `visualizaciones` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `podcast`
--

INSERT INTO `podcast` (`userPodcast`, `nombrePodcast`, `idPodcast`, `Descripción`, `Fecha`, `visualizaciones`) VALUES
('usuarioPrueba', 'Cocina Fresca', 3, 'Mira que rica la paprika', '2021-04-10', 0),
('elUser', 'audioprueba', 4, '', '2021-04-10', 0),
('exploraUser', 'Top1', 5, 'Este debería aparecer como TOP 1', '2021-04-11', 10),
('exploraUser', 'TOP 2', 6, 'Este debería aparecer como TOP 2', '2021-04-11', 9),
('exploraUser', 'TOP 3', 7, 'El tercero en la lista', '2021-04-11', 8),
('exploraUser', 'TOP 0', 8, 'EL MÁS ESCUCHADO', '2021-04-11', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcastag`
--

CREATE TABLE `podcastag` (
  `podcastID` int(11) NOT NULL,
  `tagID` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `podcastag`
--

INSERT INTO `podcastag` (`podcastID`, `tagID`) VALUES
(3, 'Comedia'),
(3, 'comida'),
(5, 'Ciencia'),
(5, 'Divulgacion'),
(6, 'Divulgacion'),
(6, 'Historia'),
(7, 'Comedia'),
(7, 'Humor'),
(8, 'Ciencia'),
(8, 'Divulgacion'),
(8, 'Historia'),
(8, 'Musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguir`
--

CREATE TABLE `seguir` (
  `username` varchar(20) NOT NULL,
  `idpodcast` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`) VALUES
('a'),
('Ciencia'),
('Comedia'),
('comida'),
('Divulgacion'),
('Historia'),
('Humor'),
('Musica'),
('p'),
('Prueba'),
('pruebas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(30) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `registro_prem` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `nombre`, `apellido`, `username`, `pass`, `registro_prem`) VALUES
('algonz22@ucm.es', 'Alex', 'Gonz', 'Algonz', '$2y$10$nk2HM6Z0iazQFbJtWZjWHuHl4h6.pFGUcuLOmdLHE4vCyRgUWJtQW', NULL),
('usuer@user.com', 'user', '1', 'elUser', 'user', NULL),
('explorar@user.es', 'explorar', '', 'exploraUser', 'explorar', NULL),
('prueba@prueba.es', 'nombrePrueba', '', 'usuarioPrueba', 'prueba', NULL);

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
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`podcastID`,`userID`),
  ADD KEY `podcastID` (`podcastID`),
  ADD KEY `us` (`userID`);

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
-- AUTO_INCREMENT de la tabla `podcast`
--
ALTER TABLE `podcast`
  MODIFY `idPodcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Filtros para la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD CONSTRAINT `rg` FOREIGN KEY (`podcastID`) REFERENCES `podcast` (`idPodcast`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us` FOREIGN KEY (`userID`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

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
