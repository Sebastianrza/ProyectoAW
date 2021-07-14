-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: vm20.db.swarm.test
-- Tiempo de generación: 09-06-2021 a las 20:26:20
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
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `nombre`, `username`, `pass`, `biografia`, `rol`, `numeroPodcast`) VALUES
('admin@ucm.es', 'admin ', 'admin', '$2y$10$Z2ruR.FknS5PXgDoYkoLjesaM5ou7NSdVP/z.SXoVE7bwtpFSrN.i', 'Esta es la cuenta de prueba para el administrador', 'admin', 0),
('androide@cueva.com', 'Androide', 'Androide', '$2y$10$1EdMNPSuS8NVoQ7ec68nSuxCXkeOnDXoXZn480ijdsKjIouerlll6', 'Loco del mundo del audiovisual!!!\r\nCADA SEMANA NUEVO PROGRAMA DEBATIENTO EN LA MESA SOBRE LOS TEMAS DEL MOMENTO!\r\nNO TE PIERDAS NUESTRA PLAYLIST ANALIZANDO TODAS LAS SERIES DEL PANORAMANA INTERNACIONAL\r\nBIENVENIDO SEAS A LA CUEVA', 'user', 2),
('anunciante@anuncio.com', 'anunciante', 'anuncio', '$2y$10$1EdMNPSuS8NVoQ7ec68nSuxCXkeOnDXoXZnYPbI3DsKjIjhyetdt7', '', 'empresa', 2),
('deportivo@depor.com', 'deportivoFC', 'deportivo', '$2y$10$.w.W1sdfsdfdEQXAwSUhndOlhN0PX.oa9FTzk.qRY4Epp9K4MNcxba', 'Nos encanta el deporte', 'user', 0),
('ikerJimenez@nave.es', 'Iker Jimenez', 'Iker', '$2y$10$1EdMdfdff8NVoQ7ec68nSuxCXkeOnDXoXZnYPbI3DsKjIouerlll6', '', 'user', 4),
('karlosarguiñano@comida.es', 'Karlos Arguiñano', 'Karlos', '$2y$10$1EdMNPSuS8NVoQ7ec68nSuxCXkeOnDXoXZnYPbI3jksdjksdjerlll6', 'Nos encanta la comida', 'user', 2),
('user@user.com', 'userucm', 'userucm', '$2y$10$YSiWTWQIPTr7Ymmwdibo8uc64JHDd4zmFy7QdtveoRY0fShwHyGbi', 'Este es un user de prueba', 'user', 0);

--
-- Volcado de datos para la tabla `podcast`
--

INSERT INTO `podcast` (`userPodcast`, `nombrePodcast`, `idPodcast`, `Descripcion`, `genero`, `Fecha`, `filename`) VALUES
('Iker', 'aliens', 2, 'Sacamos a la luz la información revelada en los papeles desclasificados del pentágono.', 'Misterio', '2021-05-10', '2.mp3'),
('Iker', 'Fantasmas', 3, 'Cacofonías, videos, objetos que cambian de lugar. Qué hay detrás de estos acontecimientos paranomales?', 'Misterio', '2021-05-11', '3.mp3'),
('Karlos', 'Bacalao al pilpil', 4, 'Arrancamos la temporada de comiducas y chistes con un especial de la casa, el bacalao al pip pil', 'Cocina', '2021-05-10', '5.mp3'),
('Karlos', 'Brazo de gitano', 5, 'Para los más golosos de la casa, hoy nos ponemos brazos a la obra con un postre de retxupete. Maravilloso brazo de gitano', 'Comida', '2021-05-11', '4.mp3'),
('anuncio', 'Buitonni', 6, 'Deliciosas pizzas a 1$', 'anuncio', '2021-05-10', '6.mp3'),
('anuncio', 'Carglass', 7, 'cambia, repara', 'anuncio', '2021-05-10', '7.mp3'),
('Androide', 'Juego de Tronos', 8, 'En el primero programa debatimos sobre juego de tronos y su polémico final. \r\nQué opinarán nuestros compañeros cavernícolas?!\r\nEntra para descubrirlo', 'Cultura', '2021-05-26', '8.mp3'),
('Androide', 'Invencible', 9, 'La nueva serie de animación adulta de Prime Video está volando las críticas internacionales.\r\nMerece la pena? Qué podemos esperar de la segunda temporada?\r\nAnimate a dejar tu comentario', 'Cultura', '2021-05-26', '9.mp3'),
('Iker', 'Criaturas Fantásticas', 10, 'Hablamos de las criaturas y seres fantásticos más famosas de la historia:\r\nEl yeti, las sirenas, los dragones...\r\n', 'Fantasía', '2021-05-26', '10.mp3'),
('Iker', 'Alcatraz', 11, 'Hablamos de las historias y mitos relacionados con la cárcel más conocida.\r\n', 'Misterio', '2021-05-11', '11.mp3'),
('Karlos', 'Receta de Marmitako', 12, 'Hoy preparamos un marmitako para txuparse los dedos! No te pierdas el truco para que nunca se te pase el atún.', 'Comida', '2021-05-21', '12.mp3'),
('Karlos', 'Cachopo', 13, 'En el día de hoy visitamos a nuestros vecinos asturianos para que nos enseñen los secretos para un buen cachopo', 'Comida', '2021-05-24', '13.mp3'),
('Androide', 'WandaVision', 14, 'Episodio dedicado a la última producción del MCU. Hay esperanzas para la franquicia Vengadores después de ENGAME¿?\r\nAlguien se ha enterado de algo?\r\n', 'Cultura', '2021-05-12', '14.mp3'),
('Androide', 'Reyes de la noche', 15, 'En el episodio de hoy hablamos de reyes de la noche, una producción nacional con una premisa complicada que promete una acción particular. \r\nHay nivel en España para competir con las producciones europeas de primera línea¿?', 'Cultura', '2021-05-08', '15.mp3'),
('deportivo', 'Giro de Italia', 16, 'Damos nuestras primeras pedaladas en el mundo de los podcast con las novedades del Giro de Italia y todos los resultados de las etapas en un mismo audio\r\n', 'Deporte', '2021-05-27', '16.mp3');



--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`idPlaylist`, `Titulo`, `Descripcion`, `imagen`, `idPropietario`) VALUES
(1, 'Nave del Misterio', 'Eventos paranormales narrados por Iker', 'iker.jpg', 'Iker'),
(2, 'El programa de Karlos Arguiñano', 'Las recetas de Karlos juntas en una lista', 'karlos.jpg', 'Karlos'),
(3, 'Anunciantes', 'Diseñada para guardar la publicidad', 'anuncio.png', 'anuncio'),
(4, 'La cueva del Androide', 'Series, películas, libros, comics...\r\nÚnete al androide y su banda en sus podcast sobre la cultura p', 'androide.jpg', 'Androide'),
(6, 'Radiodeporte', 'Si eres un apasionado de los deportes, la actualidad y las noticias frescas este es tu podcast.\r\nCad', 'depor.jpg\r\n', 'deportivo');



--
-- Volcado de datos para la tabla `listapodcast`
--

INSERT INTO `listapodcast` (`idPodcast`, `idLista`) VALUES
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 4),
(9, 4),
(10, 1),
(11, 1),
(12, 2),
(13, 2),
(14, 4),
(15, 4),
(16, 6);


--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`ID`, `autor`, `titulo`, `mensaje`, `fecha`, `respuestas`, `identificador`, `idPlaylist`) VALUES
(1, 'Jorge', 'Salan', 'Este es mi alias', '2001-06-15', 2, 0, 1),
(2, 'Alexi', 'Lahio', 'Bodom Beach Terror', '2001-06-15', 0, 0, 2),
(4, 'Alberto', 'Vivaldi', 'Solo de violines', '2001-06-15', 0, 1, 1),
(5, 'Julius', 'Gibert', 'Bart esta bien', '2001-06-15', 1, 1, 1),
(6, 'dr nick', 'bart', 'bart esta bien pero arrastra multiples rallauras y sintomas de estrepitosas craneales, por dios esa mujer se ha tragado un bebe', '2001-06-15', 0, 5, 1);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
