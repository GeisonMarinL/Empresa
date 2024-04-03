-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-04-2024 a las 23:53:28
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Codigo` int NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Documento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Codigo`, `Nombre`, `Apellidos`, `Documento`, `Direccion`, `Telefono`, `Foto`) VALUES
(7654, 'Andres', 'Rodriguez', '6789653', 'carrera 13#5-15', '87654493', 0x696d6167656e65732f3632656464623137373465363437333130393132386335322e6a706567),
(7655, 'Aberto ', 'Leon', '1100813441', 'carrera 13#5-15', '3156807365', 0x696d6167656e65732f706e672d7472616e73706172656e742d696d6167652d70696374757265732d69636f6e2d70686f746f2d7468756d626e61696c2e706e67),
(65235, 'Yuberth', 'Silva', '35678845', 'Calle 23#09-15', '67734566', 0x696d6167656e65732f706e672d7472616e73706172656e742d63616d6572612d70686f746f2d696d6167652d6469676974616c2d63616d6572612d70686f746f6772617068792d69636f6e2d696d616765732d7468756d626e61696c2e706e67),
(123421, 'Brahian', 'Ortiz', '98765432', 'carrera 5#15-07', '87654493', 0x696d6167656e65732f6a70672d766563746f722d69636f6e2d706e675f3238373432322e6a7067),
(644534, 'Aberto ', 'Leon', '1100813441', 'carrera 14#5-07', '3156807365', 0x696d6167656e65732f3632656464623137373465363437333130393132386335322e6a706567);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
