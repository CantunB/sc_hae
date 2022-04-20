-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 02:04:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bc_smapac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assigned_areas`
--
--
-- Volcado de datos para la tabla `assigned_areas`
--

INSERT INTO `assigned_areas` (`id`, `coordination_id`, `department_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 'CAF/JCM/', 0, NULL, '2021-01-18 00:13:33'),
(2, 2, 8, 'DC-FOLIO', 0, NULL, '2021-01-18 00:13:46'),
(3, 2, 9, 'CAF/TI/', 0, NULL, '2021-01-18 00:14:02'),
(4, 2, 10, 'DC-', 0, NULL, '2021-01-18 00:14:16'),
(5, 2, 11, 'DC-', 0, NULL, '2021-01-18 00:14:28'),
(6, 2, 12, 'DC-', 0, NULL, '2021-01-18 00:14:44'),
(7, 2, 13, 'DC-', 0, NULL, '2021-01-18 00:15:03'),
(8, 2, 14, 'DC-', 0, NULL, '2021-01-18 00:15:16'),
(9, 2, 15, 'DC-', 0, NULL, '2021-01-18 00:15:25'),
(10, 2, 16, 'CAF/UCA/', 0, NULL, '2021-01-18 00:15:53'),
(11, 2, 17, 'CAF/UAC/', 0, NULL, '2021-01-18 00:16:27'),
(12, 2, 18, 'CAF/URM/', 0, NULL, '2021-01-18 00:17:20'),
(13, 2, 19, 'CAF-URM.AA/', 0, NULL, '2021-01-18 00:17:47'),
(14, 2, 20, 'CAF/URM/PV/', 0, NULL, '2021-01-18 00:18:14'),
(15, 2, 21, 'RPCS-', 0, NULL, '2021-01-18 00:18:33'),
(16, 1, 4, 'OIC-PRM/', 0, NULL, '2021-01-18 00:18:52'),
(17, 1, 5, 'OIC-UACI-JMZS/', 0, NULL, '2021-01-18 00:19:19'),
(18, 1, 6, 'OIC-UI-MCPM/', 0, NULL, '2021-01-18 00:19:42'),
(19, 3, 22, 'CO-LAMA-', 0, NULL, '2021-01-18 00:20:07'),
(20, 3, 23, 'JCCS-', 0, NULL, '2021-01-18 00:20:20'),
(21, 3, 24, 'CO-DO/', 0, NULL, '2021-01-18 00:20:38'),
(22, 3, 25, 'CO-DH-', 0, NULL, '2021-01-18 00:21:27'),
(23, 3, 26, 'CO-DTSA/', 0, NULL, '2021-01-18 00:21:52'),
(24, 3, 27, 'CO-DT-LAMA-', 0, NULL, '2021-01-18 00:22:13'),
(25, 3, 28, 'CO-UCA-', 0, NULL, '2021-01-18 00:22:46'),
(26, 3, 29, 'CO-AL/', 0, NULL, '2021-01-18 00:23:02'),
(27, 3, 30, 'CO-DM.UML/', 0, NULL, '2021-01-18 00:23:22'),
(28, 3, 31, 'CO-LAMA-', 0, NULL, '2021-01-18 00:23:58'),
(29, 4, 4, NULL, 0, NULL, NULL),
(30, 5, 1, 'DG/NHYM/', 0, NULL, '2021-01-18 00:24:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assigned_areas`
--
ALTER TABLE `assigned_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_areas_coordination_id_foreign` (`coordination_id`),
  ADD KEY `assigned_areas_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assigned_areas`
--
ALTER TABLE `assigned_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assigned_areas`
--
ALTER TABLE `assigned_areas`
  ADD CONSTRAINT `assigned_areas_coordination_id_foreign` FOREIGN KEY (`coordination_id`) REFERENCES `coordinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_areas_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
