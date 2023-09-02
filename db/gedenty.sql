-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 08:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedenty`
--

-- --------------------------------------------------------

--
-- Table structure for table `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `fecha` date NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_labor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cita`
--

INSERT INTO `cita` (`id_cita`, `id_paciente`, `desde`, `hasta`, `fecha`, `id_sucursal`, `id_usuario`, `estado`, `id_labor`) VALUES
(16, 1, '08:15:00', '09:00:00', '2023-04-12', 1, 77, 1, 11),
(17, 6, '09:15:00', '10:00:00', '2023-04-12', 1, 77, 1, 10),
(18, 1, '09:00:00', '09:45:00', '2023-04-13', 1, 79, 1, 12),
(19, 3, '08:00:00', '08:45:00', '2023-04-15', 1, 79, 1, 12),
(20, 3, '08:15:00', '09:00:00', '2023-04-17', 1, 77, 1, 10),
(21, 3, '08:00:00', '09:00:00', '2023-04-21', 1, 1, 1, 6),
(22, 6, '08:00:00', '09:00:00', '2023-04-17', 1, 1, 1, 6),
(23, 3, '10:05:00', '11:00:00', '2023-04-17', 1, 1, 1, 6),
(24, 3, '09:05:00', '10:00:00', '2023-04-18', 1, 1, 1, 6),
(25, 6, '10:05:00', '11:00:00', '2023-04-18', 1, 1, 1, 6),
(26, 3, '09:05:00', '10:00:00', '2023-04-22', 1, 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `estado`) VALUES
(1, 'CG-SMILE', 1),
(2, 'DENTAL LOPEZ', 1),
(3, 'ORTOGLOBAL', 1),
(4, 'SONRISAS BLANCAS', 1),
(5, 'CLÍNICA DENTAL RADIANTE', 1),
(6, 'ODONTOLOGÍA VITAL', 1),
(7, 'DENTALES DEL SOL', 1),
(8, 'SONRISAS HERMOSAS', 1),
(9, 'SONRISAS PERFECTAS', 1),
(10, 'CLÍNICA DENTAL SONRÍE', 1),
(11, 'DIENTES SANOS', 1),
(12, 'CLINICORTO', 1),
(13, 'CLÍNICA DENTAL ESTÉTICA', 1),
(14, 'SONRISAS BRILLANTES', 1),
(15, 'SONRISAS SIN LÍMITES', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `id_formulario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_historia_clinica` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `grupo_menu`
--

CREATE TABLE `grupo_menu` (
  `id_grupo_menu` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grupo_menu`
--

INSERT INTO `grupo_menu` (`id_grupo_menu`, `nombre`, `fecha_registro`, `estado`) VALUES
(12, 'ADMINISTRACION', '2023-03-29 23:36:39', 1),
(13, 'NEGOCIO', '2023-03-29 23:43:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id_historia_clinica` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `historia_clinica`
--

INSERT INTO `historia_clinica` (`id_historia_clinica`, `id_paciente`, `codigo`, `fecha_registro`) VALUES
(1, 3, 'HC-007', '2023-04-18'),
(2, 6, 'HC-1760039642', '2023-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id_horario`, `desde`, `hasta`, `id_usuario`, `id_sucursal`) VALUES
(4, '08:00:00', '09:00:00', 1, 1),
(5, '09:05:00', '10:00:00', 1, 1),
(6, '10:05:00', '11:00:00', 1, 1),
(7, '11:30:00', '12:00:00', 1, 1),
(176, '13:00:00', '14:00:00', 1, 1),
(177, '14:05:00', '15:00:00', 1, 1),
(178, '15:05:00', '16:00:00', 1, 1),
(179, '08:00:00', '09:00:00', 1, 2),
(180, '09:05:00', '10:00:00', 1, 2),
(181, '10:05:00', '11:00:00', 1, 2),
(182, '11:30:00', '12:00:00', 1, 2),
(183, '13:00:00', '14:00:00', 1, 2),
(184, '14:05:00', '15:00:00', 1, 2),
(185, '15:05:00', '16:00:00', 1, 2),
(186, '08:00:00', '09:00:00', 1, 10),
(187, '09:05:00', '10:00:00', 1, 10),
(188, '10:05:00', '11:00:00', 1, 10),
(189, '11:30:00', '12:00:00', 1, 10),
(190, '13:00:00', '14:00:00', 1, 10),
(191, '14:05:00', '15:00:00', 1, 10),
(192, '15:05:00', '16:00:00', 1, 10),
(193, '08:00:00', '09:00:00', 1, 9),
(194, '09:05:00', '10:00:00', 1, 9),
(195, '10:05:00', '11:00:00', 1, 9),
(196, '11:30:00', '12:00:00', 1, 9),
(197, '13:00:00', '14:00:00', 1, 9),
(198, '14:05:00', '15:00:00', 1, 9),
(199, '15:05:00', '16:00:00', 1, 9),
(200, '08:00:00', '09:00:00', 1, 11),
(201, '09:05:00', '10:00:00', 1, 11),
(202, '10:05:00', '11:00:00', 1, 11),
(203, '11:30:00', '12:00:00', 1, 11),
(204, '13:00:00', '14:00:00', 1, 11),
(205, '14:05:00', '15:00:00', 1, 11),
(206, '15:05:00', '16:00:00', 1, 11),
(207, '08:00:00', '09:00:00', 1, 18),
(208, '09:05:00', '10:00:00', 1, 18),
(209, '10:05:00', '11:00:00', 1, 18),
(210, '11:30:00', '12:00:00', 1, 18),
(211, '13:00:00', '14:00:00', 1, 18),
(212, '14:05:00', '15:00:00', 1, 18),
(213, '15:05:00', '16:00:00', 1, 18),
(214, '08:00:00', '09:00:00', 1, 17),
(215, '09:05:00', '10:00:00', 1, 17),
(216, '10:05:00', '11:00:00', 1, 17),
(217, '11:30:00', '12:00:00', 1, 17),
(218, '13:00:00', '14:00:00', 1, 17),
(219, '14:05:00', '15:00:00', 1, 17),
(220, '15:05:00', '16:00:00', 1, 17),
(221, '08:00:00', '09:00:00', 1, 19),
(222, '09:05:00', '10:00:00', 1, 19),
(223, '10:05:00', '11:00:00', 1, 19),
(224, '11:30:00', '12:00:00', 1, 19),
(225, '13:00:00', '14:00:00', 1, 19),
(226, '14:05:00', '15:00:00', 1, 19),
(227, '15:05:00', '16:00:00', 1, 19),
(228, '08:05:00', '09:00:00', 77, 20),
(229, '09:15:00', '10:00:00', 77, 20),
(230, '10:15:00', '11:00:00', 77, 20),
(231, '11:15:00', '12:00:00', 77, 20),
(236, '13:15:00', '14:00:00', 77, 20),
(237, '14:15:00', '15:00:00', 77, 20),
(238, '15:15:00', '16:00:00', 77, 20),
(239, '08:05:00', '09:00:00', 77, 21),
(240, '09:15:00', '10:00:00', 77, 21),
(241, '10:15:00', '11:00:00', 77, 21),
(242, '11:15:00', '12:00:00', 77, 21),
(243, '13:15:00', '14:00:00', 77, 21),
(244, '14:15:00', '15:00:00', 77, 21),
(245, '15:15:00', '16:00:00', 77, 21),
(247, '08:15:00', '09:00:00', 77, 1),
(248, '08:00:00', '08:45:00', 79, 1),
(249, '09:00:00', '09:45:00', 79, 1),
(250, '09:15:00', '10:00:00', 77, 1),
(251, '10:15:00', '11:00:00', 77, 1),
(252, '10:00:00', '10:45:00', 79, 1);

-- --------------------------------------------------------

--
-- Table structure for table `horario_dia`
--

CREATE TABLE `horario_dia` (
  `id_horario_dia` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `horario_dia`
--

INSERT INTO `horario_dia` (`id_horario_dia`, `id_horario`, `dia`) VALUES
(2, 5, 1),
(3, 5, 2),
(4, 5, 3),
(5, 4, 0),
(6, 4, 4),
(7, 6, 0),
(8, 7, 0),
(9, 6, 1),
(10, 7, 1),
(11, 6, 2),
(12, 7, 2),
(13, 6, 3),
(14, 7, 3),
(15, 6, 4),
(16, 7, 4),
(19, 45, 0),
(20, 44, 1),
(21, 44, 2),
(22, 44, 3),
(23, 45, 4),
(25, 149, 5),
(26, 148, 6),
(27, 148, 5),
(28, 149, 6),
(29, 150, 5),
(30, 150, 6),
(31, 151, 6),
(32, 151, 5),
(33, 177, 4),
(34, 176, 4),
(35, 178, 4),
(36, 5, 4),
(37, 5, 5),
(38, 6, 5),
(39, 177, 5),
(40, 176, 5),
(43, 228, 0),
(44, 228, 1),
(45, 228, 2),
(46, 229, 0),
(47, 229, 1),
(48, 229, 2),
(49, 230, 0),
(50, 230, 1),
(51, 230, 2),
(52, 231, 2),
(53, 231, 1),
(54, 231, 0),
(55, 232, 3),
(56, 232, 4),
(57, 233, 3),
(58, 233, 4),
(59, 232, 5),
(61, 233, 5),
(62, 234, 5),
(63, 234, 4),
(64, 234, 3),
(65, 235, 3),
(66, 235, 4),
(67, 235, 5),
(68, 237, 0),
(69, 236, 0),
(70, 237, 1),
(71, 236, 2),
(72, 237, 2),
(73, 238, 2),
(74, 238, 1),
(75, 238, 0),
(76, 236, 1),
(77, 239, 3),
(78, 239, 4),
(79, 240, 4),
(80, 240, 3),
(81, 241, 3),
(82, 241, 4),
(83, 242, 4),
(84, 242, 3),
(85, 243, 3),
(86, 243, 4),
(87, 244, 4),
(88, 244, 3),
(89, 245, 3),
(90, 245, 4),
(91, 248, 5),
(92, 248, 4),
(93, 248, 3),
(96, 247, 2),
(97, 247, 1),
(98, 247, 0),
(99, 249, 5),
(100, 249, 3),
(101, 249, 4),
(102, 250, 0),
(103, 250, 1),
(104, 250, 2),
(105, 251, 0),
(106, 251, 1),
(107, 251, 2),
(108, 252, 4),
(109, 252, 3),
(110, 252, 5);

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `id_labor` int(11) NOT NULL,
  `nombre` varchar(1500) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`id_labor`, `nombre`, `estado`, `id_usuario`) VALUES
(1, 'ORTODONCIA', 1, 1),
(2, 'PERIODONCIA', 1, 1),
(3, 'ENDODONCIA', 1, 1),
(4, 'ODONTOPEDIATRÍA', 1, 1),
(5, 'PROSTODONCIA', 1, 1),
(6, 'CIRUGÍA ORAL Y MAXILOFACIAL', 1, 1),
(7, 'ODONTOLOGÍA ESTÉTICA', 1, 1),
(8, 'ODONTOLOGÍA DEPORTIVA', 1, 1),
(9, 'ACTIVIDAD 1', 1, 77),
(10, 'ACTIVIDAD 2', 1, 77),
(11, 'ACTIVIDAD 3', 1, 77),
(12, 'ACTIVIDAD 4', 1, 79),
(13, 'ACTIVIDAD 5', 1, 79),
(14, 'ACTIVIDAD 6', 1, 79);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_grupo_menu` int(11) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre`, `estado`, `id_grupo_menu`, `icono`, `url`) VALUES
(41, 'MENU SISTEMA', 1, 12, 'list', 'menu_sistema'),
(42, 'PERMISOS', 1, 12, 'check', 'permisos'),
(43, 'USUARIOS', 1, 12, 'user', 'usuarios'),
(44, 'CLINICAS', 1, 12, 'building', 'empresas'),
(45, 'HORARIOS', 1, 13, 'calendar', 'mis_horarios'),
(46, 'CITAS', 1, 13, 'clock', 'mis_citas'),
(47, 'ESPECIALIDADES', 1, 13, 'tooth', 'mis_labores');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `identificacion` varchar(250) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
(1, '1758130643', 'Rafael', 'Prats Recasen', 1),
(3, '007', 'JAMES', 'BÓNDIGA', 1),
(4, '123456', 'Juan', 'Pérez', 1),
(5, '234567', 'María', 'García', 1),
(6, '1760039642', 'LIANETH', 'CUENCA PEREZ', 1),
(7, '1759722828', 'LUIS', 'RAMIREZ', 1),
(8, '008', 'AGENTE', 'SECRETIÑO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `tipo` char(1) NOT NULL DEFAULT 'S' COMMENT 'P => Principal; S => Secundario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `estado`, `tipo`) VALUES
(1, 'SUPER ADMINISTRADOR', 1, 'P'),
(22, 'ESPECIALISTA', 1, 'S'),
(23, 'PACIENTE', 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `rol_menu`
--

CREATE TABLE `rol_menu` (
  `id_rol_menu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rol_menu`
--

INSERT INTO `rol_menu` (`id_rol_menu`, `id_rol`, `id_menu`) VALUES
(1, 1, 41),
(4, 1, 42),
(7, 1, 43),
(9, 1, 44),
(10, 1, 45),
(11, 1, 46),
(12, 1, 47),
(13, 22, 47),
(14, 22, 46),
(15, 22, 45);

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `id_empresa`, `estado`, `nombre`) VALUES
(1, 1, 1, 'LA FLORIDA'),
(2, 1, 1, 'SAN LORENZO'),
(3, 12, 1, 'SAN MIGUEL'),
(4, 13, 1, 'LA PAZ'),
(5, 13, 1, 'LAS LOMAS'),
(6, 5, 1, 'SAN ISIDRO'),
(7, 10, 1, 'LA PERLA'),
(8, 10, 1, 'SAN BORJA'),
(9, 2, 1, 'LOS OLIVOS'),
(10, 2, 1, 'LA VICTORIA'),
(11, 2, 1, 'PUEBLO LIBRE'),
(12, 7, 1, 'SAN JUAN'),
(13, 11, 1, 'EL PORVENIR'),
(14, 11, 1, 'SAN GABRIEL'),
(15, 6, 1, 'LA MOLINA'),
(16, 6, 1, 'VILLA EL SALVADOR'),
(17, 3, 1, 'SAN ANTONIO'),
(18, 3, 1, 'EL AGUSTINO'),
(19, 3, 1, 'VILLA MARÍA'),
(20, 4, 1, 'SAN FELIPE'),
(21, 14, 1, 'SAN JACINTO'),
(22, 8, 1, 'SANTA ROSA'),
(23, 9, 1, 'VILLA HERMOSA'),
(24, 9, 1, 'EL BOSQUE'),
(25, 15, 1, 'SAN FRANCISCO');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `imagen_perfil` varchar(250) NOT NULL DEFAULT 'logo_usuario.png',
  `tipo` char(1) NOT NULL COMMENT 'Asistente; Especialista; Mixto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_completo`, `correo`, `username`, `password`, `id_rol`, `fecha_registro`, `estado`, `imagen_perfil`, `tipo`) VALUES
(1, 'RAFAEL PRATS RECASEN', 'prats@pyganflor.com', 'rprats', '$2y$10$/4r03ut6s9e6mQiL9w4dgOsASKIOrUqdr1AtsO.lc5.dvb/ydl7Bq', 1, '2018-10-02 10:50:24', 1, 'imagen_perfil_2021_04_03_14_51_12-rprats.jpg', 'E'),
(77, 'LUIS RAMIREZ', 'luis@luis.com', 'luis', '$2y$10$7H0G9OrfxuHLRY.USaAyy.hebWIS6P76VAP8oSLtzWndQqoVkdKIW', 22, '2023-03-30 23:52:12', 1, 'logo_usuario.png', 'E'),
(79, 'JUAN', 'info@cg_smile.com', 'juan', '$2y$10$u7.bi.mcc.WpQoC3x4mntuqixa/V44ZWpx1onNhRswYGHXeCugmVe', NULL, '2023-04-02 18:23:44', 1, 'logo_usuario.png', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_sucursal`
--

CREATE TABLE `usuario_sucursal` (
  `id_usuario_sucursal` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuario_sucursal`
--

INSERT INTO `usuario_sucursal` (`id_usuario_sucursal`, `id_sucursal`, `id_usuario`) VALUES
(5, 1, 1),
(6, 9, 1),
(7, 10, 1),
(8, 11, 1),
(9, 17, 1),
(10, 18, 1),
(11, 19, 1),
(12, 2, 1),
(15, 20, 77),
(16, 21, 77),
(17, 4, 79),
(18, 3, 79),
(19, 1, 77),
(20, 2, 77),
(21, 1, 79),
(22, 2, 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_formulario`),
  ADD KEY `FK_FormularioCita` (`id_cita`);

--
-- Indexes for table `grupo_menu`
--
ALTER TABLE `grupo_menu`
  ADD PRIMARY KEY (`id_grupo_menu`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id_historia_clinica`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `horario_dia`
--
ALTER TABLE `horario_dia`
  ADD PRIMARY KEY (`id_horario_dia`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `FK_Menu_GrupoMenu` (`id_grupo_menu`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `rol_menu`
--
ALTER TABLE `rol_menu`
  ADD PRIMARY KEY (`id_rol_menu`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nombre_completo` (`nombre_completo`),
  ADD KEY `FK_Usuario_Rol` (`id_rol`);

--
-- Indexes for table `usuario_sucursal`
--
ALTER TABLE `usuario_sucursal`
  ADD PRIMARY KEY (`id_usuario_sucursal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo_menu`
--
ALTER TABLE `grupo_menu`
  MODIFY `id_grupo_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia_clinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `horario_dia`
--
ALTER TABLE `horario_dia`
  MODIFY `id_horario_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `id_labor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rol_menu`
--
ALTER TABLE `rol_menu`
  MODIFY `id_rol_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `usuario_sucursal`
--
ALTER TABLE `usuario_sucursal`
  MODIFY `id_usuario_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `FK_FormularioCita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_Menu_GrupoMenu` FOREIGN KEY (`id_grupo_menu`) REFERENCES `grupo_menu` (`id_grupo_menu`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
