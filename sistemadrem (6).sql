-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 13:57:11
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadrem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `nombrearea` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcionarea` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombrearea`, `descripcionarea`) VALUES
(0, 'DataMaster', 'Administrador total del sistema'),
(1, 'Dirección DREM', 'Director General de la DREM. \r\nDepende jerárquica y administrativamente de la Gerencia Regional de Desarrollo\r\nEconómico del Gobierno Regional de Apurímac; mantiene dependencia técnica y\r\nnormativa del Ministerio de Energía y Minas. '),
(2, 'Mesa de Partes', 'mesa de partes es .....'),
(3, 'Área Logística', 'dsfsdfsd'),
(4, 'Asesoría Legal', 'asdsa'),
(5, 'Área de resoluciones', 'msakdamkd'),
(6, 'Sub Direccion De Energia', 'asdada'),
(7, 'Área de concesiones', 'areea de concesiones mineras bla bla bla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('65a18a44e1f31392949e71e9cf6d6053', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 1629371854, 'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"nombres\";s:5:\"admin\";s:2:\"id\";s:1:\"1\";s:7:\"permiso\";s:1:\"0\";s:6:\"logado\";b:1;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `iddocumento` int(11) NOT NULL,
  `tipotramite_id` int(11) NOT NULL,
  `nombredocumento` varchar(80) NOT NULL,
  `descripciondocumento` text DEFAULT NULL,
  `estado` varchar(1) NOT NULL,
  `dniremitente` varchar(8) NOT NULL,
  `emailremitente` text NOT NULL,
  `cargodestinatario` text NOT NULL,
  `apellidopaternoremitente` varchar(25) NOT NULL,
  `apellidomaternoremitente` varchar(25) NOT NULL,
  `nombresremitente` varchar(50) NOT NULL,
  `fechaingreso` date NOT NULL,
  `fechafin` date DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `anexos` text DEFAULT NULL,
  `archivodocumento` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iteraciondocumento`
--

CREATE TABLE `iteraciondocumento` (
  `iditeraciondocumento` int(11) NOT NULL,
  `iddocumento` int(11) NOT NULL,
  `dniaprobacion` varchar(45) DEFAULT NULL,
  `codsecuenciatramite` varchar(10) DEFAULT NULL,
  `idareaactual` int(11) NOT NULL,
  `idareasiguiente` int(11) DEFAULT NULL,
  `observaciones` longtext DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechaaprobacion` date DEFAULT NULL,
  `estadotramite` tinytext NOT NULL,
  `anexos` text DEFAULT NULL,
  `permiso` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `iteraciondocumento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `cargo` varchar(80) NOT NULL,
  `permisos` text DEFAULT NULL,
  `estadopermiso` tinyint(1) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `cargo`, `permisos`, `estadopermiso`, `fechacreacion`) VALUES
(0, 'Administrador', 'a:28:{s:5:\"aArea\";s:1:\"1\";s:5:\"eArea\";s:1:\"1\";s:5:\"dArea\";s:1:\"1\";s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";s:1:\"1\";s:12:\"eTipotramite\";s:1:\"1\";s:12:\"dTipotramite\";s:1:\"1\";s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";s:1:\"1\";s:10:\"eDocumento\";s:1:\"1\";s:10:\"dDocumento\";s:1:\"1\";s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";s:1:\"1\";s:19:\"eiteraciondocumento\";s:1:\"1\";s:19:\"diteraciondocumento\";s:1:\"1\";s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";s:1:\"1\";s:17:\"esecuenciatramite\";s:1:\"1\";s:17:\"dsecuenciatramite\";s:1:\"1\";s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";s:1:\"1\";s:8:\"cpermiso\";s:1:\"1\";s:7:\"cBackup\";s:1:\"1\";s:5:\"rArea\";s:1:\"1\";s:12:\"rTipotramite\";s:1:\"1\";s:10:\"rDocumento\";s:1:\"1\";s:19:\"riteraciondocumento\";s:1:\"1\";s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2020-08-03'),
(1, 'Director', 'a:28:{s:5:\"aArea\";s:1:\"1\";s:5:\"eArea\";s:1:\"1\";s:5:\"dArea\";s:1:\"1\";s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";s:1:\"1\";s:12:\"eTipotramite\";s:1:\"1\";s:12:\"dTipotramite\";s:1:\"1\";s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";s:1:\"1\";s:10:\"eDocumento\";s:1:\"1\";s:10:\"dDocumento\";s:1:\"1\";s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";s:1:\"1\";s:19:\"eiteraciondocumento\";s:1:\"1\";s:19:\"diteraciondocumento\";s:1:\"1\";s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";s:1:\"1\";s:17:\"esecuenciatramite\";s:1:\"1\";s:17:\"dsecuenciatramite\";s:1:\"1\";s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";s:1:\"1\";s:8:\"cpermiso\";s:1:\"1\";s:7:\"cBackup\";s:1:\"1\";s:5:\"rArea\";s:1:\"1\";s:12:\"rTipotramite\";s:1:\"1\";s:10:\"rDocumento\";s:1:\"1\";s:19:\"riteraciondocumento\";s:1:\"1\";s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-05-20'),
(2, 'Oficinista Mesa de Partes', 'a:28:{s:5:\"aArea\";s:1:\"1\";s:5:\"eArea\";b:0;s:5:\"dArea\";b:0;s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";s:1:\"1\";s:12:\"eTipotramite\";b:0;s:12:\"dTipotramite\";b:0;s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";s:1:\"1\";s:10:\"eDocumento\";b:0;s:10:\"dDocumento\";b:0;s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";s:1:\"1\";s:19:\"eiteraciondocumento\";b:0;s:19:\"diteraciondocumento\";b:0;s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";s:1:\"1\";s:17:\"esecuenciatramite\";b:0;s:17:\"dsecuenciatramite\";b:0;s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cpermiso\";b:0;s:7:\"cBackup\";b:0;s:5:\"rArea\";s:1:\"1\";s:12:\"rTipotramite\";s:1:\"1\";s:10:\"rDocumento\";s:1:\"1\";s:19:\"riteraciondocumento\";s:1:\"1\";s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-08-13'),
(3, 'Secretario', 'a:28:{s:5:\"aArea\";b:0;s:5:\"eArea\";b:0;s:5:\"dArea\";b:0;s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";b:0;s:12:\"eTipotramite\";b:0;s:12:\"dTipotramite\";b:0;s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";b:0;s:10:\"eDocumento\";b:0;s:10:\"dDocumento\";b:0;s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";b:0;s:19:\"eiteraciondocumento\";b:0;s:19:\"diteraciondocumento\";b:0;s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";b:0;s:17:\"esecuenciatramite\";b:0;s:17:\"dsecuenciatramite\";b:0;s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cpermiso\";b:0;s:7:\"cBackup\";b:0;s:5:\"rArea\";b:0;s:12:\"rTipotramite\";b:0;s:10:\"rDocumento\";b:0;s:19:\"riteraciondocumento\";b:0;s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-07-01'),
(4, 'Evaluador', 'a:28:{s:5:\"aArea\";b:0;s:5:\"eArea\";b:0;s:5:\"dArea\";b:0;s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";b:0;s:12:\"eTipotramite\";b:0;s:12:\"dTipotramite\";b:0;s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";b:0;s:10:\"eDocumento\";b:0;s:10:\"dDocumento\";b:0;s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";b:0;s:19:\"eiteraciondocumento\";b:0;s:19:\"diteraciondocumento\";b:0;s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";b:0;s:17:\"esecuenciatramite\";b:0;s:17:\"dsecuenciatramite\";b:0;s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cpermiso\";b:0;s:7:\"cBackup\";b:0;s:5:\"rArea\";b:0;s:12:\"rTipotramite\";b:0;s:10:\"rDocumento\";b:0;s:19:\"riteraciondocumento\";b:0;s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-07-01'),
(5, 'Oficinista', 'a:28:{s:5:\"aArea\";b:0;s:5:\"eArea\";b:0;s:5:\"dArea\";b:0;s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";b:0;s:12:\"eTipotramite\";b:0;s:12:\"dTipotramite\";b:0;s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";b:0;s:10:\"eDocumento\";b:0;s:10:\"dDocumento\";b:0;s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";b:0;s:19:\"eiteraciondocumento\";b:0;s:19:\"diteraciondocumento\";b:0;s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";b:0;s:17:\"esecuenciatramite\";b:0;s:17:\"dsecuenciatramite\";b:0;s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cpermiso\";b:0;s:7:\"cBackup\";b:0;s:5:\"rArea\";b:0;s:12:\"rTipotramite\";b:0;s:10:\"rDocumento\";b:0;s:19:\"riteraciondocumento\";b:0;s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-08-13'),
(6, 'Registrador', 'a:28:{s:5:\"aArea\";b:0;s:5:\"eArea\";b:0;s:5:\"dArea\";b:0;s:5:\"vArea\";s:1:\"1\";s:12:\"aTipotramite\";b:0;s:12:\"eTipotramite\";b:0;s:12:\"dTipotramite\";b:0;s:12:\"vTipotramite\";s:1:\"1\";s:10:\"aDocumento\";b:0;s:10:\"eDocumento\";b:0;s:10:\"dDocumento\";b:0;s:10:\"vDocumento\";s:1:\"1\";s:19:\"aiteraciondocumento\";b:0;s:19:\"eiteraciondocumento\";b:0;s:19:\"diteraciondocumento\";b:0;s:19:\"viteraciondocumento\";s:1:\"1\";s:17:\"asecuenciatramite\";b:0;s:17:\"esecuenciatramite\";b:0;s:17:\"dsecuenciatramite\";b:0;s:17:\"vsecuenciatramite\";s:1:\"1\";s:8:\"cUsuario\";b:0;s:8:\"cpermiso\";b:0;s:7:\"cBackup\";b:0;s:5:\"rArea\";b:0;s:12:\"rTipotramite\";b:0;s:10:\"rDocumento\";b:0;s:19:\"riteraciondocumento\";b:0;s:12:\"eSeguimiento\";s:1:\"1\";}', 1, '2021-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secuenciatramite`
--

CREATE TABLE `secuenciatramite` (
  `idsecuenciatramite` int(11) NOT NULL,
  `codsecuenciatramite` varchar(10) NOT NULL,
  `nombresecuencia` text NOT NULL,
  `tipotramite_id` int(11) NOT NULL,
  `codsecuenciaprevia` varchar(10) DEFAULT NULL,
  `estadoaccionsecuencia` tinytext NOT NULL,
  `idarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secuenciatramite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotramite`
--

CREATE TABLE `tipotramite` (
  `idtipotramite` int(11) NOT NULL,
  `nombretipotramite` mediumtext NOT NULL,
  `descripciontipotramite` longtext DEFAULT NULL,
  `imagen` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipotramite`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `apellidopaterno` varchar(20) NOT NULL,
  `apellidomaterno` varchar(70) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `fotoperfil` text DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `contrasenha` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `idarea` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombres`, `dni`, `apellidopaterno`, `apellidomaterno`, `cargo`, `fotoperfil`, `email`, `contrasenha`, `telefono`, `celular`, `estado`, `fechaCreacion`, `idarea`, `permisos_id`) VALUES
(1, 'admin', '0000000', '', NULL, NULL, 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'admin@admin.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', NULL, 1, '2019-11-22', 0, 0),
(2, 'lalito', '1111111', 'asda', 'sadasjdj', 'Director', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'director@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '38428328', '82384823', 1, '2019-11-22', 1, 1),
(3, 'secretaria DD', '22222222', 'DD', 'DD', 'Secretaria', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'secretariadd@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '324832843', '973274732', 1, '2021-08-13', 1, 3),
(4, 'Oficinista', '33333333', 'Mesa', 'Partes', 'Oficinista Mesa Partes', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'oficinistamp@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '888888888', '888888888', 1, '2021-08-13', 2, 2),
(5, 'Evaluador', '44444444', 'técnico', 'concesiones', 'evaluador', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'evaluadortc@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '888888888', '888888889', 1, '2021-08-13', 7, 4),
(6, 'Oficinista', '55555555', 'técnico', 'resoluciones', 'Oficinista técnico resoluciones', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'oficinistatrs@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '888888888', '888888888', 1, '2021-08-13', 5, 5),
(7, 'Registrador', '66666666', 'área', 'concesiones', 'Registrador área concesiones', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'registradorac@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '888888888', '999999999', 1, '2021-08-13', 7, 6),
(8, 'ksakmd', '7777777', 'sakmdkmaksa', 'ksmamdkkm', 'akdmakkmsad', 'http://localhost/SistemaDREM/assets/fotoperfil/imagendefecto.png', 'evaluadordd@drem.gob.pe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '838284324', '283483248', 1, '2021-08-18', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`iddocumento`);

--
-- Indices de la tabla `iteraciondocumento`
--
ALTER TABLE `iteraciondocumento`
  ADD PRIMARY KEY (`iditeraciondocumento`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `secuenciatramite`
--
ALTER TABLE `secuenciatramite`
  ADD PRIMARY KEY (`idsecuenciatramite`);

--
-- Indices de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  ADD PRIMARY KEY (`idtipotramite`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_usuarios_permissoes1_idx` (`permisos_id`),
  ADD KEY `idarea` (`idarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `iddocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `iteraciondocumento`
--
ALTER TABLE `iteraciondocumento`
  MODIFY `iditeraciondocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `secuenciatramite`
--
ALTER TABLE `secuenciatramite`
  MODIFY `idsecuenciatramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  MODIFY `idtipotramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
