-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2021 a las 19:10:21
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
-- Estructura de tabla para la tabla `listapodcast`
--

CREATE TABLE `listapodcast` (
  `idPodcast` int(11) NOT NULL,
  `idLista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listapodcast`
--

INSERT INTO `listapodcast` (`idPodcast`, `idLista`) VALUES
(2, 1),
(3, 1),
(10, 1),
(11, 1),
(4, 2),
(5, 2),
(12, 2),
(13, 2),
(6, 3),
(7, 3),
(8, 4),
(9, 4),
(14, 4),
(15, 4),
(16, 6);

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
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `idPlaylist` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idPropietario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`idPlaylist`, `Titulo`, `Descripcion`, `imagen`, `idPropietario`) VALUES
(1, 'Nave del Misterio', 'Eventos paranormales narrados por Iker', 'iker.jpg', 'Iker'),
(2, 'El programa de Karlos Arguiñano', 'Las recetas de Karlos juntas en una lista', 'karlos.jpg', 'Karlos'),
(3, 'Anunciantes', 'Diseñada para guardar la publicidad', 'anuncio.PNG', 'anuncio'),
(4, 'La cueva del Androide', 'Series, películas, libros, comics...\r\nÚnete al androide y su banda en sus podcast sobre la cultura p', 'Androide.jpg', 'Androide'),
(6, 'Radiodeporte', 'Si eres un apasionado de los deportes, la actualidad y las noticias frescas este es tu podcast.\r\nCad', 'depor.jpg\r\n', 'deportivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcast`
--

CREATE TABLE `podcast` (
  `userPodcast` varchar(255) NOT NULL,
  `nombrePodcast` varchar(255) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `Descripción` text NOT NULL,
  `género` text NOT NULL,
  `Fecha` date NOT NULL,
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `podcast`
--

INSERT INTO `podcast` (`userPodcast`, `nombrePodcast`, `idPodcast`, `Descripción`, `género`, `Fecha`, `filename`) VALUES
('user', 'Prueba', 1, 'Hola esto es una prueba ', '', '2021-04-10', ''),
('Iker', 'aliens', 2, 'Sacamos a la luz la información revelada en los papeles desclasificados del pentágono.', 'Misterio', '2021-05-10', 'prueba1.mp3'),
('Iker', 'Fantasmas', 3, 'Cacofonías, videos, objetos que cambian de lugar. Qué hay detrás de estos acontecimientos paranomales?', 'Misterio', '2021-05-11', ''),
('Karlos', 'Bacalao al pilpil', 4, 'Arrancamos la temporada de comiducas y chistes con un especial de la casa, el bacalao al pip pil', 'Cocina', '2021-05-10', 'prueba2.mp3'),
('Karlos', 'Brazo de gitano', 5, 'Para los más golosos de la casa, hoy nos ponemos brazos a la obra con un postre de retxupete. Maravilloso brazo de gitano', 'Comida', '2021-05-11', ''),
('anuncio', 'Buitonni', 6, 'Deliciosas pizzas a 1$', 'anuncio', '2021-05-10', ''),
('anuncio', 'Carglass', 7, 'cambia, repara', 'anuncio', '2021-05-10', ''),
('Androide', 'Juego de Tronos', 8, 'En el primero programa debatimos sobre juego de tronos y su polémico final. \r\nQué opinarán nuestros compañeros cavernícolas?!\r\nEntra para descubrirlo', 'Cultura', '2021-05-26', ''),
('Androide', 'Invencible', 9, 'La nueva serie de animación adulta de Prime Video está volando las críticas internacionales.\r\nMerece la pena? Qué podemos esperar de la segunda temporada?\r\nAnimate a dejar tu comentario', 'Cultura', '2021-05-26', ''),
('Iker', 'Criaturas Fantásticas', 10, 'Hablamos de las criaturas y seres fantásticos más famosas de la historia:\r\nEl yeti, las sirenas, los dragones...\r\n', 'Fantasía', '2021-05-26', ''),
('Iker', 'Alcatraz', 11, 'Hablamos de las historias y mitos relacionados con la cárcel más conocida.\r\n', 'Misterio', '2021-05-11', ''),
('Karlos', 'Receta de Marmitako', 12, 'Hoy preparamos un marmitako para txuparse los dedos! No te pierdas el truco para que nunca se te pase el atún.', 'Comida', '2021-05-21', ''),
('Karlos', 'Cachopo', 13, 'En el día de hoy visitamos a nuestros vecinos asturianos para que nos enseñen los secretos para un buen cachopo', 'Comida', '2021-05-24', ''),
('Androide', 'WandaVision', 14, 'Episodio dedicado a la última producción del MCU. Hay esperanzas para la franquicia Vengadores después de ENGAME¿?\r\nAlguien se ha enterado de algo?\r\n', 'Cultura', '2021-05-12', ''),
('Androide', 'Reyes de la noche', 15, 'En el episodio de hoy hablamos de reyes de la noche, una producción nacional con una premisa complicada que promete una acción particular. \r\nHay nivel en España para competir con las producciones europeas de primera línea¿?', 'Cultura', '2021-05-08', ''),
('deportivo', 'Giro de Italia', 16, 'Damos nuestras primeras pedaladas en el mundo de los podcast con las novedades del Giro de Italia y todos los resultados de las etapas en un mismo audio\r\n', 'Deporte', '2021-05-27', '');

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
(1, 'a'),
(1, 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguir`
--

CREATE TABLE `seguir` (
  `username` varchar(20) NOT NULL,
  `idpodcast` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguir`
--

INSERT INTO `seguir` (`username`, `idpodcast`) VALUES
('Algonz', 1);

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
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `biografia` text NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `numeroPodcast` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `nombre`, `username`, `pass`, `biografia`, `rol`, `numeroPodcast`) VALUES
('algonz22@ucm.es', 'Alex', 'Algonz', '$2y$10$nk2HM6Z0iazQFbJtWZjWHuHl4h6.pFGUcuLOmdLHE4vCyRgUWJtQW', '', NULL, 0),
('androide@cueva.com', 'Androide', 'Androide', 'androide', 'Loco del mundo del audiovisual!!!\r\nCADA SEMANA NUEVO PROGRAMA DEBATIENTO EN LA MESA SOBRE LOS TEMAS DEL MOMENTO!\r\nNO TE PIERDAS NUESTRA PLAYLIST ANALIZANDO TODAS LAS SERIES DEL PANORAMANA INTERNACIONAL\r\nBIENVENIDO SEAS A LA CUEVA', NULL, 2),
('anunciante@anuncio.com', 'anunciante', 'anuncio', 'anuncio', '', NULL, 2),
('deportivo@depor.com', 'deportivoFC', 'deportivo', '$2y$10$.w.W1QU/i2XfQXAwSUhndOlhN0PX.oa9FTzk.qRY4Epp9K4MNcxba', 'Nos encanta el deporte', 'user', 0),
('ikerJimenez@nave.es', 'Iker Jimenez', 'Iker', 'nave', '', NULL, 4),
('karlosarguiñano@comida.es', 'Karlos Arguiñano', 'Karlos', 'comida', '', NULL, 2),
('srza2011@hotmail.com', 'Sebastian Zambrano', 'sebastianrza', '$2y$10$1EdMNPSuS8NVoQ7ec68nSuxCXkeOnDXoXZnYPbI3DsKjIouerlll6', 'Hola bienvieniod sfnwfnsjndjln sgdsnlds s', 'user', 0),
('user@user.com', 'user', 'user', '$2y$10$YSiWTWQIPTr7Ymmwdibo8uc64JHDd4zmFy7QdtveoRY0fShwHyGbi', '', NULL, 0);

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
  MODIFY `idPlaylist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `podcast`
--
ALTER TABLE `podcast`
  MODIFY `idPodcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
