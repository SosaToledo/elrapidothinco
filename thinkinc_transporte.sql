-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2020 at 08:43 PM
-- Server version: 10.0.38-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinkinc_transporte`
--

-- --------------------------------------------------------

--
-- Table structure for table `acoplado`
--

CREATE TABLE `acoplado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_simple_acoplado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patente` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vtv_vencimiento` date NOT NULL,
  `senasa_vencimiento` date NOT NULL,
  `seguro_vencimiento` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ruta_vencimiento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acoplado`
--

INSERT INTO `acoplado` (`id`, `id_simple_acoplado`, `patente`, `vtv_vencimiento`, `senasa_vencimiento`, `seguro_vencimiento`, `created_at`, `updated_at`, `ruta_vencimiento`) VALUES
(5, 'AC005', 'BTB070', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:52:14', '2020-08-14 14:53:35', '2020-12-31'),
(6, 'AC006', 'CKI126', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:52:40', '2020-08-14 14:53:44', '2020-12-31'),
(7, 'AC007', 'DGC829', '2021-06-29', '2020-12-31', '2021-04-08', '2020-08-14 14:53:24', '2020-08-14 16:41:54', '2020-09-29'),
(8, 'AC008', 'GKH896', '2020-11-21', '2020-12-31', '2021-04-08', '2020-08-14 14:54:16', '2020-08-14 19:24:12', '2020-08-06'),
(9, 'AC009', 'HTR181', '2020-10-24', '2020-12-31', '2021-04-08', '2020-08-14 14:54:41', '2020-08-14 16:39:14', '2020-09-02'),
(10, 'AC010', 'GST618', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:56:49', '2020-08-14 14:56:49', '2020-12-31'),
(11, 'AC011', 'DVS056', '2020-09-16', '2021-04-17', '2021-04-08', '2020-08-14 14:57:11', '2020-08-14 16:34:20', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `camioneros`
--

CREATE TABLE `camioneros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_simple_camioneros` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` bigint(20) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cbu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta_temprana` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camioneros`
--

INSERT INTO `camioneros` (`id`, `id_simple_camioneros`, `DNI`, `password`, `telefono`, `nombre`, `apellido`, `direccion`, `created_at`, `updated_at`, `cbu`, `fecha_alta_temprana`) VALUES
(7, 'CM007', 20261845769, NULL, 542477593332, 'JUAN MANUEL', 'SOTELO', 'ALMAFUERTE 783', '2020-08-14 15:01:17', '2020-08-14 15:46:16', '0000000000000000000000', '2018-08-03'),
(8, 'CM008', 20287733985, NULL, 542477687090, 'MARCOS GASTON', 'AGUERO', 'HERNANDARIAS 1176', '2020-08-14 15:11:54', '2020-08-14 15:11:54', '0110138230013811667901', '2019-05-01'),
(9, 'CM009', 20310823199, NULL, 542477500639, 'JORGE LUIS', 'GIMENEZ', 'TAMBOR DE TACUARI 2375', '2020-08-14 15:37:49', '2020-08-14 15:37:49', '0110138230013811668379', '2019-05-03'),
(10, 'CM010', 202160029942, NULL, 542474663564, 'RUBEN DARIO', 'FERNANDEZ', 'G ROLDAN 61', '2020-08-14 15:42:30', '2020-08-14 15:42:30', '0720376188000035523868', '2019-07-04'),
(11, 'CM011', 20404239318, NULL, 542477367151, 'CESAR IGNACIO', 'ZULEWSKI', 'MAR DEL PLATA 1472', '2020-08-14 15:46:04', '2020-08-14 15:46:04', '0000000000000000000000', '2019-07-26'),
(12, 'CM012', 20300898980, NULL, 542477666699, 'GUSTAVO ARIEL', 'ALMADA', 'HERNANDARIAS 1069', '2020-08-14 15:48:39', '2020-08-14 15:48:39', '0110138230013811668201', '2020-01-13'),
(13, 'CM013', 20143454267, NULL, 542477398900, 'MIGUEL ANGEL', 'CALDERONE', 'DIEGO DE LA FUENTE 1244', '2020-08-14 15:51:38', '2020-08-14 16:23:03', '0110138230013811667833', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `camiones`
--

CREATE TABLE `camiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_simple_camiones` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patente` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vtv_vencimiento` date NOT NULL,
  `senasa_vencimiento` date NOT NULL,
  `seguro_vencimiento` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ruta_vencimiento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camiones`
--

INSERT INTO `camiones` (`id`, `id_simple_camiones`, `patente`, `vtv_vencimiento`, `senasa_vencimiento`, `seguro_vencimiento`, `created_at`, `updated_at`, `ruta_vencimiento`) VALUES
(9, 'CA009', 'ECI944', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:41:23', '2020-08-14 14:45:23', '2020-12-31'),
(10, 'CA010', 'JDU750', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:41:57', '2020-08-14 14:45:35', '2020-12-31'),
(11, 'CA011', 'RWP022', '2020-12-31', '2020-12-31', '2020-12-31', '2020-08-14 14:42:36', '2020-08-14 14:42:36', '2020-12-31'),
(12, 'CA012', 'FWB066', '2021-02-15', '2020-12-31', '2021-04-08', '2020-08-14 14:45:00', '2020-08-14 14:45:00', '2020-09-18'),
(13, 'CA013', 'GOH832', '2020-11-06', '2020-12-31', '2021-04-08', '2020-08-14 14:46:21', '2020-08-14 19:24:49', '2020-08-06'),
(14, 'CA014', 'IRO909', '2021-04-24', '2020-12-31', '2021-04-08', '2020-08-14 14:46:46', '2020-08-14 16:40:08', '2020-11-12'),
(15, 'CA015', 'KRY102', '2020-12-31', '2020-12-31', '2021-04-08', '2020-08-14 14:47:14', '2020-08-14 14:47:14', '2020-12-31'),
(16, 'CA016', 'AD103GB', '2020-09-19', '2020-12-31', '2021-07-31', '2020-08-14 14:50:59', '2020-08-14 14:50:59', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `provincia_id` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id`, `ciudad_nombre`, `cp`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Pergamino', 2700, 1, '2020-08-05 06:22:28', '2020-08-05 06:22:28'),
(2, 'San Nicolas', 2701, 1, '2020-08-05 06:22:28', '2020-08-05 06:22:28'),
(3, 'Colon', 2702, 1, '2020-08-05 06:22:29', '2020-08-05 06:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades_viajes`
--

CREATE TABLE `ciudades_viajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ciudad` bigint(20) UNSIGNED NOT NULL,
  `id_viajes` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_simple_clientes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUIL` bigint(20) NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `id_simple_clientes`, `CUIL`, `nombre`, `direccion`, `telefono`, `correo`, `created_at`, `updated_at`) VALUES
(5, 'CL005', 30666828484, 'INPLA SA', 'AV VENINI NORTE 155', 2477464381, 'inpla@inpla.com', '2020-08-14 21:40:13', '2020-08-14 21:40:13'),
(6, 'CL006', 30712147845, 'GUARDAR SA', 'AV FRONDIZI 1150', 2477464381, 'inpla@inpla.com', '2020-08-14 21:41:10', '2020-08-14 21:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_simple_comprobante` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_camioneros` bigint(20) UNSIGNED NOT NULL,
  `id_viaje` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` double(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comprobantes`
--

INSERT INTO `comprobantes` (`id`, `id_simple_comprobante`, `id_camioneros`, `id_viaje`, `fecha`, `detalles`, `tipo`, `monto`, `created_at`, `updated_at`) VALUES
(6, 'CP006', 13, 7, '2020-08-06', 'FLETE PERGAMINO A MENZOZA 06/08/2020', 'adelanto', 5000.00, '2020-08-14 21:56:59', '2020-08-14 21:56:59'),
(7, 'CP007', 13, 6, '2020-08-17', 'adelanto de prueba', 'adelanto', 1500.00, '2020-08-20 01:45:32', '2020-08-20 01:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_27_211533_create_camiones_table', 1),
(5, '2020_06_27_215403_create_ciudades_table', 1),
(6, '2020_06_27_220027_create_acoplado_table', 1),
(7, '2020_06_27_220151_create_clientes_table', 1),
(8, '2020_06_27_220730_create_provincias_table', 1),
(9, '2020_06_27_220835_create_camioneros_table', 1),
(10, '2020_06_27_232324_create_viajes_table', 1),
(11, '2020_06_27_232325_create_ciudades_viajes_table', 1),
(12, '2020_06_27_232326_create_comprobantes_table', 1),
(13, '2020_06_28_185512_create_roles_table', 1),
(14, '2020_06_28_190049_create_role_user_table', 1),
(15, '2020_08_06_041705_add_columns_camioneros', 2),
(16, '2020_08_06_042313_add_columns_viajes', 2),
(17, '2020_08_06_042413_add_columns_acoplado', 3),
(18, '2020_08_06_042500_add_columns_camiones', 4),
(19, '2020_08_06_045732_add_columns_v2_viajes', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--

CREATE TABLE `provincias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provincia_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provincias`
--

INSERT INTO `provincias` (`id`, `provincia_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Buenos Aires', '2020-08-05 06:22:27', '2020-08-05 06:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador del sistema', '2020-08-05 06:22:24', '2020-08-05 06:22:24'),
(2, 'user', 'Usuario limitado', '2020-08-05 06:22:25', '2020-08-05 06:22:25'),
(3, 'admin', 'Administrador del sistema', '2020-08-06 03:13:11', '2020-08-06 03:13:11'),
(4, 'user', 'Usuario limitado', '2020-08-06 03:13:13', '2020-08-06 03:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-08-05 06:22:26', '2020-08-05 06:22:26'),
(2, 1, 2, '2020-08-05 06:22:27', '2020-08-05 06:22:27'),
(5, 1, 4, '2020-08-05 23:28:54', '2020-08-05 23:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@thinco.com', NULL, '$2y$10$/Y6OSWdf3Gb7eANxBWVBVuKaN2IF7nCTtAitd2AvnRvEJUoIzhZYO', NULL, '2020-08-05 06:22:26', '2020-08-05 06:22:26'),
(2, 'Admin', 'admin@thinco.com', NULL, '$2y$10$VyvyNAUCMv70CKmdxQ0hrOdDhKv2Wso9HWc.IxXmzlmZZNZKEezCK', NULL, '2020-08-05 06:22:27', '2020-08-05 06:22:27'),
(4, 'Gerardo', 'fanucchi@thinco.com', NULL, '$2y$10$1Xq8UWk1NsDRSJIqT.wM4./U0LzPU30Sx.tKTE4PPjSmlIwMgOgJC', 'PzJfcPYvch97Oqif1YKxTk1DoXqjA3Vrp81cAB93z6oNUbPUK2qtTx96Qzqi', '2020-08-05 23:28:54', '2020-08-05 23:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `viajes`
--

CREATE TABLE `viajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_camiones` bigint(20) UNSIGNED NOT NULL,
  `id_acoplado` bigint(20) UNSIGNED DEFAULT NULL,
  `id_camionero` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `idSimpleViaje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km_inicial` double(8,2) DEFAULT NULL,
  `km_final` double(8,2) DEFAULT NULL,
  `distancia` double(8,2) DEFAULT NULL,
  `origen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estados` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `ganancia_camionero` double(8,2) NOT NULL,
  `tipoCamion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `peajes` double(8,2) DEFAULT NULL,
  `gasoil_litros` double(8,2) DEFAULT NULL,
  `gasoil_precio` double(8,2) DEFAULT NULL,
  `notaViaje` int(11) DEFAULT NULL,
  `guia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remitos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carta_porte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `precio` double(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viajes`
--

INSERT INTO `viajes` (`id`, `id_camiones`, `id_acoplado`, `id_camionero`, `id_cliente`, `idSimpleViaje`, `km_inicial`, `km_final`, `distancia`, `origen`, `destino`, `estados`, `valor`, `ganancia_camionero`, `tipoCamion`, `fecha`, `peajes`, `gasoil_litros`, `gasoil_precio`, `notaViaje`, `guia`, `created_at`, `updated_at`, `remitos`, `carta_porte`, `cantidad`, `precio`) VALUES
(6, 10, 6, 13, 6, 'VJ006', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-06', 0.00, 0.00, 0.00, 0, 2481, '2020-08-14 21:47:54', '2020-08-14 21:48:47', '2-1382/1-3115/1-3114/1-3113', '0', 1.00, 5000.00),
(7, 10, 6, 13, 5, 'VJ007', 0.00, 0.00, 0.00, 'PERGAMINO', 'MENDOZA', 'Terminado', 55000.00, 9900.00, 'Acoplado', '2020-08-06', 1715.00, 496.00, 23103.68, 0, 2482, '2020-08-14 21:52:03', '2020-08-14 21:55:31', '17189/17198', '0', 1.00, 55000.00),
(8, 15, 10, 11, 5, 'VJ008', 0.00, 0.00, 0.00, 'COLON', 'SALTO/ARRECIFES/PERGAMINO', 'Iniciado', 0.00, 0.00, 'Chasis', '2020-08-14', 0.00, 0.00, 0.00, 0, 0, '2020-08-14 22:01:21', '2020-08-14 22:01:21', '0', '0', 0.00, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acoplado`
--
ALTER TABLE `acoplado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camioneros`
--
ALTER TABLE `camioneros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudades_viajes`
--
ALTER TABLE `ciudades_viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudades_viajes_id_ciudad_foreign` (`id_ciudad`),
  ADD KEY `ciudades_viajes_id_viajes_foreign` (`id_viajes`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comprobantes_id_camioneros_foreign` (`id_camioneros`),
  ADD KEY `comprobantes_id_viaje_foreign` (`id_viaje`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viajes_id_camiones_foreign` (`id_camiones`),
  ADD KEY `viajes_id_acoplado_foreign` (`id_acoplado`),
  ADD KEY `viajes_id_camionero_foreign` (`id_camionero`),
  ADD KEY `viajes_id_cliente_foreign` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acoplado`
--
ALTER TABLE `acoplado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `camioneros`
--
ALTER TABLE `camioneros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `camiones`
--
ALTER TABLE `camiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ciudades_viajes`
--
ALTER TABLE `ciudades_viajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
