-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2020 a las 09:12:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diwrepaso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabladiw`
--

CREATE TABLE `tabladiw` (
  `iduser` int(2) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(50) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  `numeroIntentos` int(1) NOT NULL DEFAULT 0,
  `foto` varchar(50) DEFAULT NULL,
  `ultimaConexion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabladiw`
--

INSERT INTO `tabladiw` (`iduser`, `usuario`, `correo`, `password`, `bloqueado`, `token`, `perfil`, `numeroIntentos`, `foto`, `ultimaConexion`) VALUES
(76, 'IsmaelDAW', 'ismael99rt@gmail.com', 'a7151c6600f87ff6ce35afd6c9a5373a', 0, '0c74b7f78409a4022a2c4c5a5ca3ee19', 'admin', 0, 'd8nzoxgxkaehd-q.jpg', '2020-11-19'),
(78, 'programador', 'ismael99rt@gmail.com', 'a7151c6600f87ff6ce35afd6c9a5373a', 0, 'a9a6653e48976138166de32772b1bf40', 'usuario', 0, 'd8nzoxgxkaehd-q.jpg', '2020-11-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
