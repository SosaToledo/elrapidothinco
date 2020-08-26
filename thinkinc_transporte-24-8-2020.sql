-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2020 at 10:10 PM
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
(13, 'CM013', 20143454267, NULL, 542477398900, 'MIGUEL ANGEL', 'CALDERONE', 'DIEGO DE LA FUENTE 1244', '2020-08-14 15:51:38', '2020-08-14 16:23:03', '0110138230013811667833', '2020-06-01'),
(14, 'CM014', 20217742103, NULL, 2477568029, 'JAVIER ORLANDO', 'NAVARRO', 'MAGALLANES 1559', '2020-08-21 22:52:10', '2020-08-21 22:52:10', '0000000000000000000000', '2019-01-01');

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
(6, 'CL006', 30712147845, 'GUARDAR SA', 'AV FRONDIZI 1150', 2477464381, 'inpla@inpla.com', '2020-08-14 21:41:10', '2020-08-14 21:41:10'),
(9, 'CL009', 23218258719, 'CECCHINI RUBEN DARIO', 'LOS PUMAS 2250', 2477464381, 'martin@martin.com', '2020-08-21 18:12:08', '2020-08-21 18:12:08'),
(8, 'CL007', 33709639809, 'HIERROMAD SANITARIOS SA', 'AV ILLIA', 2477000000, 'hierromad@hierromad.com', '2020-08-20 23:56:12', '2020-08-20 23:56:12'),
(10, 'CL010', 20271215011, 'TRANSPORTE EL TONY', 'XXX', 2477464381, 'martin@martin.com', '2020-08-21 18:19:39', '2020-08-21 18:19:39'),
(11, 'CL011', 30715860682, 'CROP CORPORATION SA', 'SANTA RITA 2731 PISO 1 DTO 2 BOULOGNE', 1127068380, 'emiliano.trapano@qseeds.com.ar', '2020-08-21 20:57:42', '2020-08-21 20:57:42'),
(12, 'CL012', 33708494629, 'EL AVESTRUZ DE LOS CAMINOS SA', 'RUTA NAC N° 8 KM 172.5', 2478455942, 'administracion@gomatro.com.ar', '2020-08-21 21:15:45', '2020-08-21 21:15:45'),
(13, 'CL013', 30533935687, 'R Y E NATALI SA', 'AV UGARTE 660', 2477441455, 'martin@martin.com', '2020-08-21 21:48:56', '2020-08-21 21:48:56'),
(14, 'CL014', 20120325974, 'FARINI JOSE MARIA', 'BELTRAN 154', 2477123456, 'martin@martin.com', '2020-08-21 23:21:13', '2020-08-21 23:21:13'),
(15, 'CL015', 0, 'TRANSPORTE DANIEL', 'X', 247464381, 'martin@martin.com', '2020-08-24 15:37:32', '2020-08-24 15:37:32'),
(16, 'CL016', 33708235909, 'PARMENTIER SRL', 'PAZ GRAL AV 10696', 2477464381, 'martin@martin.com', '2020-08-24 16:23:09', '2020-08-24 16:23:09'),
(17, 'CL017', 20218213120, 'LENARDUCCI, DIEGO LEONARDO', 'RUTA 11 KM 568', 3498476559, 'MARCELA@LOGISTICALENARDUCCI.COM.AR', '2020-08-24 16:44:06', '2020-08-24 16:44:06'),
(18, 'CL018', 30711024235, 'PACHAMAMA PRODUCTS SRL', 'TUCUMAN 1455, PISO 16, DPTO D, 1050 CAPITAL FEDERAL', 2477469980, 'FVAGNI@PACHAMAMAPRODUCTS.COM', '2020-08-24 17:07:41', '2020-08-24 17:07:41');

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
  `ltsgasoil` double(8,2) NOT NULL,
  `medioPago` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comprobantes`
--

INSERT INTO `comprobantes` (`id`, `id_simple_comprobante`, `id_camioneros`, `id_viaje`, `fecha`, `detalles`, `tipo`, `monto`, `ltsgasoil`, `medioPago`, `created_at`, `updated_at`) VALUES
(6, 'CP006', 13, 7, '2020-08-06', 'FLETE PERGAMINO A MENZOZA 06/08/2020', 'adelanto', 5000.00, 0.00, 'Efectivo', '2020-08-14 21:56:59', '2020-08-20 06:26:33'),
(10, 'CP010', 12, 10, '2020-08-20', 'Lleno 2 tanques', 'combustible', 16819.00, 361.00, 'Efectivo', '2020-08-21 00:07:14', '2020-08-21 00:07:14'),
(13, 'CP013', 13, 13, '2020-08-03', 'ENTREGÓ LUCIA', 'adelanto', 3000.00, 0.00, 'Efectivo', '2020-08-21 17:42:11', '2020-08-21 22:02:49'),
(12, 'CP011', 12, 10, '2020-08-20', '', 'adelanto', 1000.00, 0.00, 'Efectivo', '2020-08-21 00:10:45', '2020-08-21 00:10:45'),
(14, 'CP014', 13, 13, '2020-08-03', 'CARGA EN EL TRANSPORTE N° 42', 'combustible', 21572.00, 463.00, 'Efectivo', '2020-08-21 17:46:55', '2020-08-21 17:46:55'),
(15, 'CP015', 13, 15, '2020-08-09', 'ENTREGÓ MARTIN VIAJE SAN LUIS', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-21 18:25:35', '2020-08-21 18:25:35'),
(19, 'CP019', 13, 7, '2020-08-06', 'CARGÓ EN EL TRANSPORTE N° 48', 'combustible', 23109.00, 496.00, 'Efectivo', '2020-08-21 20:47:41', '2020-08-21 20:47:41'),
(17, 'CP017', 13, 15, '2020-08-07', 'FC 24-16073', 'combustible', 20696.00, 405.00, 'Efectivo', '2020-08-21 18:29:20', '2020-08-21 18:29:20'),
(18, 'CP018', 13, 15, '2020-08-07', 'TRANFERENCIA', 'adelanto', 20696.00, 0.00, 'Transferencia', '2020-08-21 18:30:35', '2020-08-21 18:30:35'),
(20, 'CP020', 13, 16, '2020-08-10', 'ENTREGÓ MARTIN 10/08/2020', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-21 21:03:12', '2020-08-21 21:03:12'),
(21, 'CP021', 13, 16, '2020-08-10', 'CARGO EN EL TRANSPORTE N° 58', 'combustible', 7548.00, 162.00, 'Efectivo', '2020-08-21 21:06:40', '2020-08-21 21:06:40'),
(22, 'CP022', 13, 18, '2020-08-17', 'MARTIN ENTREGÓ EL ADELANTO', 'adelanto', 1000.00, 0.00, 'Efectivo', '2020-08-21 21:19:45', '2020-08-21 21:19:45'),
(23, 'CP023', 13, 19, '2020-08-18', 'ENTREGÓ MARTIN', 'adelanto', 1000.00, 0.00, 'Efectivo', '2020-08-21 21:31:21', '2020-08-21 21:31:21'),
(24, 'CP024', 12, 21, '2020-08-13', 'CARGÓ EN EL TRANSPORTE N° 61', 'combustible', 19800.00, 425.00, 'Efectivo', '2020-08-21 21:44:16', '2020-08-21 22:16:41'),
(25, 'CP025', 12, 21, '2020-08-15', 'ENTREGÓ MARTIN', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-21 22:13:12', '2020-08-21 22:13:12'),
(26, 'CP026', 12, 24, '2020-08-18', 'ENTREGO MARTIN', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-21 22:45:27', '2020-08-21 22:45:27'),
(27, 'CP027', 9, 32, '2020-08-03', 'ENTREGÓ MARTIN', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-21 23:16:56', '2020-08-21 23:16:56'),
(28, 'CP028', 9, 35, '2020-08-05', '', 'adelanto', 4000.00, 0.00, 'Efectivo', '2020-08-24 15:31:25', '2020-08-24 15:32:19'),
(29, 'CP029', 9, 35, '2020-08-05', 'N° 45', 'combustible', 19754.00, 424.00, 'Efectivo', '2020-08-24 15:34:22', '2020-08-24 15:34:53'),
(30, 'CP030', 9, 36, '2020-08-08', 'ENTREGÓ MARTIN FLETE DE PAPA', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-24 15:42:39', '2020-08-24 15:42:39'),
(31, 'CP031', 9, 36, '2020-08-10', 'N° 56', 'combustible', 22315.00, 480.00, 'Efectivo', '2020-08-24 15:45:57', '2020-08-24 15:47:29'),
(32, 'CP032', 9, 37, '2020-08-12', 'CARGÓ EN EL TRANSPORTE N° 60', 'combustible', 8199.00, 176.00, 'Efectivo', '2020-08-24 16:09:00', '2020-08-24 16:13:52'),
(33, 'CP033', 9, 37, '2020-08-12', 'ENTREGO MARTIN', 'adelanto', 3000.00, 0.00, 'Efectivo', '2020-08-24 16:15:52', '2020-08-24 16:15:52'),
(34, 'CP034', 7, 39, '2020-08-06', '$5000 ADELANTO', 'adelanto', 5000.00, 0.00, 'Efectivo', '2020-08-24 17:37:31', '2020-08-24 17:37:31'),
(35, 'CP035', 7, 38, '2020-08-06', '$2000 ADELANTO', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-24 17:38:50', '2020-08-24 17:38:50'),
(36, 'CP036', 9, 41, '2020-08-16', 'ENTREGÓ MARTIN', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-24 19:39:52', '2020-08-24 19:39:52'),
(37, 'CP037', 9, 41, '2020-08-16', 'CARGÓ EN EL TRANSPORTE N° 65', 'combustible', 13138.00, 282.00, 'Efectivo', '2020-08-24 19:41:01', '2020-08-24 19:44:54'),
(38, 'CP038', 9, 41, '2020-08-15', 'FC 65568', 'combustible', 3479.00, 60.00, 'Efectivo', '2020-08-24 19:56:13', '2020-08-24 19:56:30'),
(39, 'CP039', 9, 41, '2020-08-16', 'TRANSFERENCIA A CTA GIMENEZ', 'adelanto', 3479.00, 0.00, 'Efectivo', '2020-08-24 19:57:03', '2020-08-24 19:57:03'),
(40, 'CP040', 9, 43, '2020-08-19', 'ENTREGO MARTIN', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-24 20:05:33', '2020-08-24 20:05:33'),
(41, 'CP041', 9, 43, '2020-08-19', 'CARGO EN EL TRANSPORTE N° 67', 'combustible', 18077.00, 388.00, 'Efectivo', '2020-08-24 20:06:33', '2020-08-24 20:09:24'),
(42, 'CP042', 7, 38, '2020-08-06', 'CARGO EN EL TRANSPORTE N° 46', 'combustible', 21152.00, 454.00, 'Efectivo', '2020-08-24 20:25:39', '2020-08-24 21:20:16'),
(43, 'CP043', 7, 49, '2020-08-22', 'ENTREGÓ MARTIN', 'adelanto', 1000.00, 0.00, 'Efectivo', '2020-08-24 20:36:07', '2020-08-24 21:02:18'),
(44, 'CP044', 7, 46, '2020-08-18', 'CARGO EN EL TRANSPORTE N° 66', 'combustible', 24832.00, 533.00, 'Efectivo', '2020-08-24 20:36:42', '2020-08-24 20:50:30'),
(45, 'CP045', 7, 39, '2020-08-07', 'CARGO EN EL TRANSPORTE N° 54', 'combustible', 13900.00, 299.00, 'Efectivo', '2020-08-24 20:38:33', '2020-08-24 21:20:31'),
(46, 'CP046', 7, 39, '2020-08-09', 'FC 148060', 'combustible', 25000.00, 462.00, 'Efectivo', '2020-08-24 20:39:17', '2020-08-24 21:14:06'),
(47, 'CP047', 7, 46, '2020-08-19', 'ENTREGO GERARDO', 'adelanto', 2000.00, 0.00, 'Efectivo', '2020-08-24 20:48:37', '2020-08-24 20:48:37');

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
(5, 1, 4, '2020-08-05 23:28:54', '2020-08-05 23:28:54'),
(6, 2, 5, '2020-08-23 09:35:55', '2020-08-23 09:35:55');

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
(4, 'Gerardo', 'fanucchi@thinco.com', NULL, '$2y$10$1Xq8UWk1NsDRSJIqT.wM4./U0LzPU30Sx.tKTE4PPjSmlIwMgOgJC', 'P2rZR8AsHTLuAtSY1LiyrDvWbV8atoUSescSzFdlCnTED4UOhaaFUONcZtnZ', '2020-08-05 23:28:54', '2020-08-05 23:28:54'),
(5, 'Frank Toledo', 'srfrankie2010@gmail.com', NULL, '$2y$10$WvvVbGi4DXJtb1yEXbputesWVPYPLGfNdnWZ7CAwysInSAcmwqxyG', NULL, '2020-08-23 09:35:55', '2020-08-23 09:35:55');

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
  `precio` double(8,2) NOT NULL,
  `comision` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viajes`
--

INSERT INTO `viajes` (`id`, `id_camiones`, `id_acoplado`, `id_camionero`, `id_cliente`, `idSimpleViaje`, `km_inicial`, `km_final`, `distancia`, `origen`, `destino`, `estados`, `valor`, `ganancia_camionero`, `tipoCamion`, `fecha`, `peajes`, `gasoil_litros`, `gasoil_precio`, `notaViaje`, `guia`, `created_at`, `updated_at`, `remitos`, `carta_porte`, `cantidad`, `precio`, `comision`) VALUES
(6, 10, 6, 13, 6, 'VJ006', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-06', 0.00, 0.00, 0.00, 0, 2481, '2020-08-14 21:47:54', '2020-08-14 21:48:47', '2-1382/1-3115/1-3114/1-3113', '0', 1.00, 5000.00, 0),
(7, 10, 6, 13, 5, 'VJ007', 465435.00, 0.00, 0.00, 'PERGAMINO', 'MENDOZA', 'Terminado', 55000.00, 9900.00, 'Acoplado', '2020-08-06', 1715.00, 0.00, 0.00, 0, 2482, '2020-08-14 21:52:03', '2020-08-21 20:48:14', '17189/17198', '0', 1.00, 55000.00, 0),
(8, 15, 10, 11, 5, 'VJ008', 2000.00, 2500.00, 500.00, 'COLON', 'SALTO/ARRECIFES/PERGAMINO', 'Iniciado', 55000.00, 9000.00, 'Chasis', '2020-08-14', 0.00, 0.00, 0.00, 0, 0, '2020-08-14 22:01:21', '2020-08-20 23:44:27', '0', '0', 1.00, 55000.00, 5000),
(10, 15, 10, 12, 8, 'VJ010', 673465.00, 0.00, 0.00, 'Weber rosario', 'Pergamino hierro mad', 'Iniciado', 14000.00, 2520.00, 'Chasis', '2020-08-20', 0.00, 0.00, 0.00, 0, 0, '2020-08-21 00:01:40', '2020-08-21 00:01:40', '0', '0', 1.00, 14000.00, 0),
(12, 11, 8, 14, 11, 'VJ012', 1.00, 485.00, 484.00, 'PARQUE INDUSTRIAL PERGAMINO', 'COLON, VILLAGUAY', 'Iniciado', 32999.12, 30356.32, 'Chasis', '2020-08-21', 0.00, 0.00, 0.00, 0, 2306, '2020-08-21 00:29:31', '2020-08-24 21:45:03', '141/144/142/143', '0', 484.00, 68.18, 0),
(13, 10, 6, 13, 5, 'VJ013', 464233.00, 0.00, 0.00, 'PERGAMINO', 'CORDOBA', 'Terminado', 35500.00, 6390.00, 'Acoplado', '2020-08-03', 765.00, 0.00, 0.00, 2730, 2479, '2020-08-21 17:36:24', '2020-08-21 17:37:24', '603/164/167/171/162', '0', 1.00, 35500.00, 0),
(14, 10, 6, 13, 9, 'VJ014', 0.00, 0.00, 0.00, 'VILLA DEL TOTORAL', 'ROSARIO', 'Terminado', 28000.00, 5040.00, 'Acoplado', '2020-08-04', 280.00, 0.00, 0.00, 2745, 2480, '2020-08-21 18:14:46', '2020-08-21 20:42:20', '1869', '0', 1.00, 28000.00, 0),
(15, 10, 6, 13, 10, 'VJ015', 0.00, 0.00, 0.00, 'SAN LUIS', 'CAPITAL FEDERAL', 'Terminado', 42900.00, 7254.00, 'Acoplado', '2020-08-09', 22101.00, 0.00, 0.00, 0, 2483, '2020-08-21 18:21:30', '2020-08-21 20:54:50', '0', '0', 1.00, 42900.00, 2600),
(16, 10, 6, 13, 11, 'VJ016', 467819.00, 468351.00, 532.00, 'COLON', 'SALTO-VILLAGUAY', 'Terminado', 38530.00, 6935.00, 'Acoplado', '2020-08-11', 1045.00, 0.00, 0.00, 0, 2484, '2020-08-21 21:01:42', '2020-08-21 21:07:12', '4/6/5/12/124', '0', 1.00, 38530.00, 0),
(17, 10, 6, 13, 5, 'VJ017', 0.00, 0.00, 0.00, 'PERGAMINO', 'ROSARIO', 'Terminado', 14500.00, 2610.00, 'Acoplado', '2020-08-12', 560.00, 0.00, 0.00, 0, 2485, '2020-08-21 21:10:04', '2020-08-21 21:10:52', '17232/17225/17200/17221/17208/17210/17229/17215', '0', 1.00, 14500.00, 0),
(18, 10, 6, 13, 12, 'VJ018', 0.00, 0.00, 0.00, 'ALVEAR', 'ARRECIFES', 'Terminado', 19000.00, 3420.00, 'Acoplado', '2020-08-18', 455.00, 0.00, 0.00, 0, 2486, '2020-08-21 21:17:04', '2020-08-21 21:17:15', '3-7465', '0', 1.00, 19000.00, 0),
(19, 15, 10, 13, 5, 'VJ019', 0.00, 0.00, 0.00, 'PERGAMINO', 'ROSARIO', 'Terminado', 14500.00, 2610.00, 'Acoplado', '2020-08-18', 560.00, 0.00, 0.00, 0, 2487, '2020-08-21 21:30:28', '2020-08-21 21:30:40', '17269-17262-17270', '0', 1.00, 14500.00, 0),
(20, 15, 10, 13, 13, 'VJ020', 0.00, 0.00, 0.00, 'ROSARIO', 'PERGAMINO', 'Terminado', 8000.00, 1440.00, 'Acoplado', '2020-08-19', 0.00, 0.00, 0.00, 0, 2488, '2020-08-21 21:50:44', '2020-08-21 21:50:44', '2488', '0', 1.00, 8000.00, 0),
(21, 10, NULL, 12, 5, 'VJ021', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 3816.00, 'Chasis', '2020-08-13', 426.50, 0.00, 0.00, 0, 2101, '2020-08-21 22:11:09', '2020-08-21 22:11:28', '86720/86721/86719/86709/86709', '0', 1.00, 21200.00, 0),
(22, 10, NULL, 12, 6, 'VJ022', 0.00, 0.00, 0.00, 'CAPITAL FEDERAL', 'PERGAMINO', 'Terminado', 12720.00, 2289.00, 'Chasis', '2020-08-14', 140.00, 0.00, 0.00, 0, 2102, '2020-08-21 22:22:49', '2020-08-21 22:23:09', '30636', '0', 1.00, 12720.00, 0),
(23, 10, 6, 12, 6, 'VJ023', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-16', 0.00, 0.00, 0.00, 0, 2103, '2020-08-21 22:25:29', '2020-08-21 22:25:29', '1388', '0', 1.00, 5000.00, 0),
(24, 10, NULL, 12, 5, 'VJ024', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 3816.00, 'Chasis', '2020-08-18', 736.00, 0.00, 0.00, 0, 2104, '2020-08-21 22:34:13', '2020-08-21 22:35:33', '86795/86778/6617/86776/86792/86783/86785/86786/143838', '0', 1.00, 21200.00, 0),
(26, 11, NULL, 14, 5, 'VJ025', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 19504.00, 'Chasis', '2020-08-05', 0.00, 0.00, 0.00, 2731, 1400, '2020-08-21 22:53:35', '2020-08-24 21:41:59', '86684', '0', 1.00, 21200.00, 0),
(27, 11, NULL, 14, 6, 'VJ027', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 4600.00, 'Chasis', '2020-08-07', 0.00, 0.00, 0.00, 2732, 2301, '2020-08-21 22:56:46', '2020-08-21 22:56:46', '3116/1389', '0', 1.00, 5000.00, 0),
(28, 11, NULL, 14, 5, 'VJ028', 0.00, 0.00, 0.00, 'PERGAMINO', 'LA PLATA', 'Terminado', 27000.00, 24840.00, 'Chasis', '2020-08-10', 0.00, 0.00, 0.00, 0, 2302, '2020-08-21 22:59:00', '2020-08-21 22:59:00', '86715', '0', 1.00, 27000.00, 0),
(29, 11, NULL, 14, 5, 'VJ029', 0.00, 0.00, 0.00, 'PERGAMINO', 'ROSARIO', 'Terminado', 14500.00, 10672.00, 'Chasis', '2020-08-11', 0.00, 0.00, 0.00, 0, 2303, '2020-08-21 23:02:10', '2020-08-21 23:02:10', '86711/86653', '0', 1.00, 14500.00, 0),
(30, 11, NULL, 14, 5, 'VJ030', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 19504.00, 'Chasis', '2020-08-12', 0.00, 0.00, 0.00, 0, 2304, '2020-08-21 23:04:34', '2020-08-21 23:04:34', '143803/86739/86742/86743/86665', '0', 1.00, 21200.00, 0),
(31, 11, NULL, 14, 5, 'VJ031', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 19504.00, 'Chasis', '2020-08-13', 0.00, 0.00, 0.00, 0, 2305, '2020-08-21 23:07:23', '2020-08-21 23:07:23', '86732/86753/86754/143804/86756/86757', '0', 1.00, 21200.00, 0),
(32, 12, 7, 9, 5, 'VJ032', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 26500.00, 4770.00, 'Acoplado', '2020-08-03', 1085.00, 0.00, 0.00, 2735, 2069, '2020-08-21 23:14:49', '2020-08-21 23:15:03', 'VARIOS', '0', 1.00, 26500.00, 0),
(33, 12, 7, 9, 14, 'VJ033', 0.00, 0.00, 0.00, 'CAPITAL FEDERAL', 'PERGAMINO', 'Terminado', 14000.00, 2520.00, 'Acoplado', '2020-08-04', 45.00, 0.00, 0.00, 0, 2070, '2020-08-21 23:22:00', '2020-08-21 23:22:31', '2070', '0', 1.00, 14000.00, 0),
(34, 12, 7, 9, 6, 'VJ034', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-04', 0.00, 0.00, 0.00, 2733, 2071, '2020-08-24 15:25:58', '2020-08-24 15:25:58', '1380/3108/3110/3109', '0', 1.00, 5000.00, 0),
(35, 12, 7, 9, 5, 'VJ035', 0.00, 0.00, 0.00, 'PERGAMINO', 'RIO CUARTO', 'Terminado', 25000.00, 4500.00, 'Acoplado', '2020-08-05', 200.00, 0.00, 0.00, 2736, 2072, '2020-08-24 15:27:25', '2020-08-24 15:27:25', '0', '0', 1.00, 25000.00, 0),
(36, 12, 7, 9, 15, 'VJ036', 0.00, 0.00, 0.00, 'VILLA DOLORES', 'CAPITAL FEDERAL', 'Terminado', 71910.00, 12943.00, 'Chasis', '2020-08-10', 1610.00, 0.00, 0.00, 417, 2073, '2020-08-24 15:38:56', '2020-08-24 15:40:34', '2073', '0', 1.00, 71910.00, 0),
(37, 12, 7, 9, 5, 'VJ037', 0.00, 0.00, 0.00, 'PERGAMINO', 'RIO CUARTO', 'Terminado', 25000.00, 4500.00, 'Acoplado', '2020-08-13', 200.00, 0.00, 0.00, 0, 2074, '2020-08-24 15:51:48', '2020-08-24 15:51:48', '86735/86736/86737/8673486725', '0', 1.00, 25000.00, 0),
(38, 13, 8, 7, 5, 'VJ038', 328168.00, 328446.00, 278.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 26500.00, 4770.00, 'Acoplado', '2020-08-06', 1545.00, 0.00, 0.00, 0, 2009, '2020-08-24 16:19:05', '2020-08-24 16:19:05', '86691, 96690, 86693, 86692,86696, 44793', '0', 1.00, 26500.00, 0),
(39, 13, 8, 7, 17, 'VJ039', 328691.00, 330513.00, 1822.00, 'CHACABUCO', 'SALVADOR MAZA', 'Terminado', 95200.00, 15593.00, 'Acoplado', '2020-08-06', 720.00, 0.00, 0.00, 0, 2010, '2020-08-24 16:59:26', '2020-08-24 20:35:03', '6944', '0', 28.00, 3400.00, 8568),
(40, 13, 8, 7, 18, 'VJ040', 330513.00, 332195.00, 1682.00, 'CAMPO DURAN', 'ACEVEDO', 'Terminado', 108216.00, 18126.00, 'Acoplado', '2020-08-12', 760.00, 0.00, 0.00, 0, 2011, '2020-08-24 17:22:27', '2020-08-24 17:35:59', '586730346', '0', 30.06, 3600.00, 7515),
(41, 12, 7, 9, 16, 'VJ041', 0.00, 0.00, 0.00, 'CANDELARIA SAN LUIS', 'CAPITAL FEDERAL', 'Terminado', 75125.00, 12802.00, 'Acoplado', '2020-08-16', 5448.00, 0.00, 0.00, 0, 2075, '2020-08-24 19:32:39', '2020-08-24 19:58:16', '2075', '0', 1.00, 75125.00, 4000),
(42, 12, 7, 9, 14, 'VJ042', 0.00, 0.00, 0.00, 'VIRREY DEL PINO', 'PERGAMINO', 'Terminado', 14000.00, 2520.00, 'Acoplado', '2020-08-18', 145.00, 0.00, 0.00, 0, 2076, '2020-08-24 20:01:31', '2020-08-24 20:01:31', '2076', '0', 1.00, 14000.00, 0),
(43, 12, 7, 9, 5, 'VJ043', 0.00, 0.00, 0.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 21200.00, 3816.00, 'Chasis', '2020-08-20', 631.00, 0.00, 0.00, 0, 2077, '2020-08-24 20:03:40', '2020-08-24 20:08:49', '86818/86819/6621/86826/86788/86787/86846/86845/86806/86805/86829/86798', '0', 1.00, 21200.00, 0),
(44, 12, NULL, 9, 6, 'VJ044', 0.00, 0.00, 0.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PARQUE INDUSTRIAL PERGAMINO', 'Terminado', 12720.00, 2289.00, 'Chasis', '2020-08-21', 325.00, 0.00, 0.00, 0, 2078, '2020-08-24 20:11:36', '2020-08-24 21:54:11', '30660/30661', '0', 1.00, 12720.00, 0),
(45, 13, 8, 7, 6, 'VJ045', 332195.00, 332282.00, 87.00, 'PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-19', 0.00, 0.00, 0.00, 0, 2012, '2020-08-24 20:23:56', '2020-08-24 20:44:12', '3133', '0', 1.00, 5000.00, 0),
(46, 13, 8, 7, 5, 'VJ046', 332282.00, 332550.00, 268.00, 'PERGAMINO', 'CAPITAL FEDERAL', 'Terminado', 26500.00, 4770.00, 'Acoplado', '2020-08-19', 1890.00, 0.00, 0.00, 0, 2013, '2020-08-24 20:46:40', '2020-08-24 20:47:36', '17268/86827/86823/86824', '0', 1.00, 26500.00, 0),
(47, 13, 8, 7, 6, 'VJ047', 332550.00, 332789.00, 239.00, 'CAPITAL FEDERAL', 'PERGAMINO', 'Terminado', 15900.00, 2862.00, 'Acoplado', '2020-08-20', 1000.00, 0.00, 0.00, 0, 2014, '2020-08-24 20:52:53', '2020-08-24 20:52:53', '361', '0', 1.00, 15900.00, 0),
(48, 13, 8, 7, 6, 'VJ048', 332789.00, 332796.00, 7.00, 'PARQUE INDUSTRIAL PERGAMINO', 'PLANTA INPLA SA', 'Terminado', 5000.00, 900.00, 'Acoplado', '2020-08-21', 0.00, 0.00, 0.00, 0, 2015, '2020-08-24 20:54:38', '2020-08-24 20:54:38', '3142/3140/3139', '0', 1.00, 5000.00, 0),
(49, 13, 8, 7, 5, 'VJ049', 332850.00, 332963.00, 113.00, 'PERGAMINO', 'ROSARIO', 'Terminado', 14500.00, 2610.00, 'Acoplado', '2020-08-22', 825.00, 0.00, 0.00, 0, 2016, '2020-08-24 20:57:04', '2020-08-24 20:57:04', '17285/17288/17281/17300/17290/17291/17282/17271', '0', 1.00, 14500.00, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
