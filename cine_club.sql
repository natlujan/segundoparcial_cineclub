-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2023 a las 23:52:59
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
-- Base de datos: `cine_club`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `sala` varchar(128) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id`, `id_pelicula`, `id_usuario`, `sala`, `hora`, `fecha`, `activo`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'A12', '07:00:00', '2023-03-25', 1, '2023-03-25 17:50:14', '2023-03-25 17:50:14'),
(2, 7, 1, 'A13', '10:00:00', '2023-03-26', 1, '2023-03-26 04:11:59', '2023-03-26 04:11:59'),
(3, 4, 1, 'A17', '13:00:00', '2023-03-27', 1, '2023-03-26 04:43:18', '2023-03-26 05:23:12'),
(4, 3, 1, 'B14', '11:00:00', '2023-03-06', 1, '2023-03-26 05:30:05', '2023-03-26 05:30:15'),
(5, 11, 1, 'C9', '15:00:00', '2023-03-30', 0, '2023-03-26 05:34:56', '2023-03-26 05:35:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Accion', 1, '2023-03-21 08:41:39', '2023-03-25 16:07:10'),
(2, 'Drama', 1, '2023-03-21 08:41:42', '2023-03-21 08:41:42'),
(3, 'Romance', 1, '2023-03-21 08:41:45', '2023-03-21 08:41:45'),
(4, 'Terror', 1, '2023-03-21 08:41:50', '2023-03-21 08:41:50'),
(9, 'Comedia', 1, '2023-03-25 16:19:30', '2023-03-25 16:34:13'),
(10, 'Animada', 1, '2023-03-25 16:34:42', '2023-03-25 16:34:42'),
(11, 'Fantasia', 0, '2023-03-26 05:31:10', '2023-03-26 05:38:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos_pelicula`
--

CREATE TABLE `generos_pelicula` (
  `id_genero` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos_pelicula`
--

INSERT INTO `generos_pelicula` (`id_genero`, `id_pelicula`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-03-25 09:57:50', NULL),
(1, 3, '2023-03-25 09:57:50', NULL),
(1, 4, '2023-03-25 14:40:58', '2023-03-25 14:40:58'),
(1, 9, '2023-03-25 17:00:36', '2023-03-25 17:00:36'),
(1, 11, '2023-03-25 17:02:05', '2023-03-25 17:02:05'),
(1, 12, '2023-03-25 17:09:34', '2023-03-25 17:09:34'),
(2, 4, '2023-03-25 14:40:58', '2023-03-25 14:40:58'),
(2, 5, '2023-03-25 14:42:27', '2023-03-25 14:42:27'),
(2, 8, '2023-03-25 16:59:52', '2023-03-25 16:59:52'),
(2, 10, '2023-03-25 17:01:14', '2023-03-25 17:01:14'),
(3, 5, '2023-03-25 14:42:27', '2023-03-25 14:42:27'),
(3, 6, '2023-03-25 15:50:26', '2023-03-25 15:50:26'),
(3, 8, '2023-03-25 16:59:52', '2023-03-25 16:59:52'),
(4, 6, '2023-03-25 15:50:26', '2023-03-25 15:50:26'),
(4, 10, '2023-03-25 17:01:14', '2023-03-25 17:01:14'),
(4, 12, '2023-03-25 17:09:34', '2023-03-25 17:09:34'),
(4, 13, '2023-03-26 05:34:00', '2023-03-26 05:34:00'),
(9, 7, '2023-03-25 16:59:10', '2023-03-25 16:59:10'),
(9, 11, '2023-03-25 17:02:05', '2023-03-25 17:02:05'),
(9, 13, '2023-03-26 05:34:00', '2023-03-26 05:34:00'),
(10, 7, '2023-03-25 16:59:10', '2023-03-25 16:59:10'),
(10, 9, '2023-03-25 17:00:36', '2023-03-25 17:00:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `ano` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `duracion_minutos` int(11) NOT NULL,
  `director` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `ano`, `descripcion`, `poster`, `duracion_minutos`, `director`, `activo`, `created_at`, `updated_at`) VALUES
(2, 'Spider-Man No way home', 2021, 'Tras descubrirse la identidad secreta de Peter Parker como Spider-Man, la vida del joven se vuelve una locura. Peter le pide ayuda al Doctor Strange para recuperar su vida, pero algo sale mal y provoca una fractura en el multiverso.', 'x8G7E9d8KLLBPLvWCWVVj3qHdWT1IOLoizt8zeh4.jpg', 150, 'Jon Watts', 1, '2023-03-21 01:46:14', '2023-03-25 14:52:41'),
(3, 'Iron Man', 2008, 'Un empresario millonario construye un traje blindado y lo usa para combatir el crimen y el terrorismo.', 't10kTTpAPAaQPVJNprKERM2rKkmpOOuj9Pzcxw8t.jpg', 100, 'Jon Favreau', 1, '2023-03-21 09:15:07', '2023-03-25 14:52:54'),
(4, 'Captain Marvel', 2019, 'Una guerrera extraterrestre de la civilización Kree se encuentra atrapada en medio de una batalla. Con la ayuda de Nick Fury trata de descubrir los secretos de su pasado mientras aprovecha sus poderes para terminar la guerra.', 'NIso3xwEazkjIBmCkRsurye19fsEfDuicjWH8F3l.jpg', 100, 'Anna Boden, Ryan Fleck', 1, '2023-03-21 09:26:30', '2023-03-25 14:53:12'),
(5, 'Prueba', 2010, 'hola', '4YbTkq3i0hRb78p2wAh40uXeaksx0GlxkBUMEScR.jpg', 190, 'Si', 1, '2023-03-25 14:42:27', '2023-03-25 14:46:26'),
(6, 'Prueba2', 2008, 'adfgsdfgsdfgsdfgsdfgs', '57nrRNmp9Yarttk3fgpLMoiV25u4pdNAOhizuRU3.jpg', 123, 'Si', 1, '2023-03-25 15:50:26', '2023-03-25 16:30:28'),
(7, 'Prueba 3', 2020, 'Descripción prueba 3', 'V5Lh1xCVrmHJ6EGOAofb4KYbOgKsqnio4XOjCDFU.jpg', 132, 'Jon Favreau', 1, '2023-03-25 16:59:10', '2023-03-26 04:11:37'),
(8, 'Prueba 4', 2018, 'Descripción prueba 4', 'NRflXnkMNtdSGqSIt3krCVYRDLbxcJDD0jtYKG4a.jpg', 142, 'Jon Favreau', 1, '2023-03-25 16:59:52', '2023-03-25 16:59:52'),
(9, 'Prueba 5', 2018, 'Descripción prueba 5', 'H40gExOP9yhPHeC2fdqEgIwbJIwLLll3UKwhwzE2.jpg', 160, 'Jon Favreau', 1, '2023-03-25 17:00:36', '2023-03-25 17:00:36'),
(10, 'Prueba 6', 2010, 'Descripción prueba 6', 'WqDywpB6butXshtgqWTOq3n74LlK1B2ajip4pIjx.jpg', 128, 'Anna Boden, Ryan Fleck', 1, '2023-03-25 17:01:14', '2023-03-25 17:01:30'),
(11, 'Prueba 7', 2022, 'Descripción prueba 7', '6ETguwGfUpYOVT5h94KqsSaWHD71xwzgLCPU46GE.jpg', 100, 'Jon Favreau', 1, '2023-03-25 17:02:05', '2023-03-25 17:02:05'),
(12, 'Prueba 9', 2019, 'Descripción prueba 9', 'vlbePF60PjCtvDfU2mRQjZojzpO8Mj4UWMEF1mYg.jpg', 126, 'Jon Favreau', 1, '2023-03-25 17:09:34', '2023-03-25 17:09:34'),
(13, 'Prueba 13', 2017, 'sadfgoiusdhfgpsidoufghsiodufhgsidhubfgipsudf', 'L0FeF7q9gvxjWfLdc0eOUSNkfXIigTwae8AlYl6g.jpg', 100, 'Jon Favreau', 0, '2023-03-26 05:34:00', '2023-03-26 05:34:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'administrador', '2023-03-25 07:57:50', NULL),
(2, 'usuario', '2023-03-25 07:57:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `contrasena` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_tipo_usuario`, `correo`, `contrasena`, `nombre`, `foto`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'cesar@gmail.com', '12345678', 'Cesar', '9I8GYY8WL6JnrVOTY8T2dNEQ6rhGoOH57QmhkoJo.jpg', 1, '2023-03-25 15:12:07', '2023-03-26 05:36:28'),
(2, 1, 'hola@gmail.com', '12345678', 'Hola', 'UgmLFTa8QiBkiBGY43U1RQA3Eaubf4LLxReNO8WC.jpg', 1, '2023-03-25 15:47:36', '2023-03-25 15:47:36'),
(3, 1, 'asdf@fasdf.com', '12345678', 'a', NULL, 1, '2023-03-25 15:48:53', '2023-03-25 15:48:53'),
(4, 1, 'pepe@gmail.com', '12345678', 'Pepe', 'OyfAM9dAMy9FOYghulpykfCoFn4U78YDX2fKMjCZ.png', 1, '2023-03-26 05:35:45', '2023-03-26 05:35:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos_pelicula`
--
ALTER TABLE `generos_pelicula`
  ADD UNIQUE KEY `unico` (`id_genero`,`id_pelicula`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `funciones_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `funciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `generos_pelicula`
--
ALTER TABLE `generos_pelicula`
  ADD CONSTRAINT `generos_pelicula_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `generos_pelicula_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipos_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
