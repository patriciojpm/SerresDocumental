-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2019 a las 02:50:50
-- Versión del servidor: 5.7.27
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisgedo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuconformularios`
--

CREATE TABLE `usuconformularios` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estructura_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `formulario` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodoInicio` int(10) UNSIGNED DEFAULT NULL,
  `periodoFin` int(10) UNSIGNED DEFAULT NULL,
  `activo` int(10) UNSIGNED NOT NULL,
  `pivote` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuconformularios`
--

INSERT INTO `usuconformularios` (`id`, `created_at`, `updated_at`, `estructura_id`, `user_id`, `formulario`, `periodoInicio`, `periodoFin`, `activo`, `pivote`) VALUES
(1, '2019-11-12 18:38:32', '2019-11-12 18:38:32', 1, 2, '1', NULL, NULL, 1, '1--2-1'),
(2, '2019-11-14 20:23:41', '2019-11-14 20:23:41', 2, 2, '1', NULL, NULL, 1, '2--2-1'),
(3, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 3, 2, '1', NULL, NULL, 1, '3--2-1'),
(4, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 4, 2, '1', NULL, NULL, 1, '4--2-1'),
(5, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 5, 2, '1', NULL, NULL, 1, '5--2-1'),
(6, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 6, 2, '1', NULL, NULL, 1, '6--2-1'),
(7, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 7, 2, '1', NULL, NULL, 1, '7--2-1'),
(8, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 8, 2, '1', NULL, NULL, 1, '8--2-1'),
(9, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 9, 2, '1', NULL, NULL, 1, '9--2-1'),
(10, '2019-11-20 14:39:06', '2019-11-20 14:39:06', 10, 2, '1', NULL, NULL, 1, '10--2-1'),
(11, '2019-11-20 14:56:08', '2019-11-20 14:56:08', 21, 2, '1', NULL, NULL, 1, '21--2-1'),
(12, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 11, 2, '1', NULL, NULL, 1, '11--2-1'),
(13, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 12, 2, '1', NULL, NULL, 1, '12--2-1'),
(14, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 13, 2, '1', NULL, NULL, 1, '13--2-1'),
(15, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 14, 2, '1', NULL, NULL, 1, '14--2-1'),
(16, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 15, 2, '1', NULL, NULL, 1, '15--2-1'),
(17, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 16, 2, '1', NULL, NULL, 1, '16--2-1'),
(18, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 17, 2, '1', NULL, NULL, 1, '17--2-1'),
(19, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 18, 2, '1', NULL, NULL, 1, '18--2-1'),
(20, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 19, 2, '1', NULL, NULL, 1, '19--2-1'),
(21, '2019-11-20 14:56:34', '2019-11-20 14:56:34', 20, 2, '1', NULL, NULL, 1, '20--2-1'),
(22, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 22, 2, '1', NULL, NULL, 1, '22--2-1'),
(23, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 23, 2, '1', NULL, NULL, 1, '23--2-1'),
(24, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 24, 2, '1', NULL, NULL, 1, '24--2-1'),
(25, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 25, 2, '1', NULL, NULL, 1, '25--2-1'),
(26, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 26, 2, '1', NULL, NULL, 1, '26--2-1'),
(27, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 27, 2, '1', NULL, NULL, 1, '27--2-1'),
(28, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 28, 2, '1', NULL, NULL, 1, '28--2-1'),
(29, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 29, 2, '1', NULL, NULL, 1, '29--2-1'),
(30, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 30, 2, '1', NULL, NULL, 1, '30--2-1'),
(31, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 31, 2, '1', NULL, NULL, 1, '31--2-1'),
(32, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 32, 2, '1', NULL, NULL, 1, '32--2-1'),
(33, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 33, 2, '1', NULL, NULL, 1, '33--2-1'),
(34, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 34, 2, '1', NULL, NULL, 1, '34--2-1'),
(35, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 35, 2, '1', NULL, NULL, 1, '35--2-1'),
(36, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 36, 2, '1', NULL, NULL, 1, '36--2-1'),
(37, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 37, 2, '1', NULL, NULL, 1, '37--2-1'),
(38, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 38, 2, '1', NULL, NULL, 1, '38--2-1'),
(39, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 39, 2, '1', NULL, NULL, 1, '39--2-1'),
(40, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 40, 2, '1', NULL, NULL, 1, '40--2-1'),
(41, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 41, 2, '1', NULL, NULL, 1, '41--2-1'),
(42, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 42, 2, '1', NULL, NULL, 1, '42--2-1'),
(43, '2019-11-20 15:21:43', '2019-11-20 15:21:43', 43, 2, '1', NULL, NULL, 1, '43--2-1'),
(49, '2019-12-02 02:56:42', '2019-12-02 02:56:42', 49, 5, '1', NULL, NULL, 1, '49--5-1'),
(50, '2019-12-02 02:56:42', '2019-12-02 02:56:42', 50, 5, '1', NULL, NULL, 1, '50--5-1'),
(51, '2019-12-02 02:56:59', '2019-12-02 02:56:59', 51, 5, '1', NULL, NULL, 1, '51--5-1'),
(52, '2019-12-04 18:47:52', '2019-12-04 18:47:52', 52, 2, '1', NULL, NULL, 1, '52--2-1'),
(53, '2019-12-04 18:51:36', '2019-12-04 18:51:36', 53, 2, '1', NULL, NULL, 1, '53--2-1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuconformularios`
--
ALTER TABLE `usuconformularios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuconformularios_pivote_unique` (`pivote`),
  ADD KEY `usuconformularios_estructura_id_foreign` (`estructura_id`),
  ADD KEY `usuconformularios_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuconformularios`
--
ALTER TABLE `usuconformularios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuconformularios`
--
ALTER TABLE `usuconformularios`
  ADD CONSTRAINT `usuconformularios_estructura_id_foreign` FOREIGN KEY (`estructura_id`) REFERENCES `estructuras` (`id`),
  ADD CONSTRAINT `usuconformularios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
