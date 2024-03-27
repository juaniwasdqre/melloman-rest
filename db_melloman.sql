-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2024 a las 17:06:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_melloman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ayear` date NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `album_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `dyear` int(11) NOT NULL,
  `producer` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`album_id`, `title`, `artist`, `dyear`, `producer`, `genre`, `imagen`) VALUES
(5, 'South of Heaven', 'Slayer', 1988, 'Rick Rubin', 'Thrash Metal', ''),
(9, 'Tous aux Cèpes', 'Empalot', 2001, 'unknown', 'Funk Metal', ''),
(17, 'Angel Dust', 'Faith No More', 1992, 'Faith No More', 'Alternativo', ''),
(18, 'Songs For The Deaf', 'Queens of the Stone Age', 2002, 'Josh Homme', 'Stoner Rock', ''),
(19, 'Era Vulgaris', 'Queens of the Stone Age', 2007, 'Josh Homme', 'Rock Alternativo', ''),
(20, 'A Momentary Lapse of Reason', 'Pink Floyd', 1987, 'Bob Ezrin', 'Rock Progresivo', ''),
(21, 'The Piper at the Gates of Dawn', 'Pink Floyd', 1967, 'Norman Smith', 'Rock Psicodélico', ''),
(22, 'Master of Puppets', 'Metallica', 1986, 'Flemming Rasmussen', 'Thrash Metal', ''),
(23, 'Luchando por el Metal', 'V8', 1983, 'V8', 'Thrash Metal', ''),
(24, 'Ácido Argentino', 'Hermética', 1991, 'Hermética', 'Thrash Metal', ''),
(25, 'Víctimas del Vaciamiento', 'Hermética', 1994, 'Hermética', 'Thrash Metal', ''),
(26, 'Atom Heart Mother', 'Pink Floyd', 1970, 'Pink Floyd', 'Rock Psicodélico', ''),
(27, 'Meddle', 'Pink Floyd', 1971, 'Pink Floyd', 'Rock Progresivo', ''),
(28, 'The Dark Side of the Moon', 'Pink Floyd', 1973, 'Pink Floyd', 'Rock Progresivo', ''),
(29, 'Wish You Were Here', 'Pink Floyd', 1975, 'Pink Floyd', 'Rock Progresivo', ''),
(30, 'Animals', 'Pink Floyd', 1977, 'Pink Floyd', 'Rock Progresivo', ''),
(31, 'The Wall', 'Pink Floyd', 1979, 'Bob Ezrin', 'Art Rock', ''),
(32, 'Mr. Bungle', 'Mr. Bungle', 1991, 'John Zorn', 'Funk Metal', ''),
(33, 'Disco Volante', 'Mr. Bungle', 1995, 'Mr. Bungle', 'Avant-garde', ''),
(34, 'Alphaville', 'Imperial Triumphant', 2020, 'Trey Spruance', 'Avant-garde', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(61) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(7, 'webadmin', '$2y$10$gEvKZen6KSQgRJeMVkNfuOFz7xneCePt7phB0IIM6uPvycBFmhpYa'),
(8, 'juani24', '$2y$10$7B1FOIT8d2LplIROzDpasOhB/o.3QXaPJHwDhu2.jLPhERVdLU3C6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist` (`artist`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
