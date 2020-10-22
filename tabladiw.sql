-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb28.awardspace.net
-- Tiempo de generación: 22-10-2020 a las 11:04:39
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3598790_cdpjosecabrera`
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
  `bloqueado` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(50) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabladiw`
--

INSERT INTO `tabladiw` (`iduser`, `usuario`, `correo`, `password`, `bloqueado`, `token`, `perfil`) VALUES
(31, 'JManuel', 'ismael99rt@gmail.com', '0510a9c194c145ed7c9e6b0d6', 0, '1679091c5a880faf6fb5e6087eb1b2dc', NULL),
(44, 'Alex', 'ismael99rt@gmail.com', 'd41d8cd98f00b204e9800998e', 0, '192fc044e74dffea144f9ac5dc9f3395', NULL),
(48, 'ismael99rt', 'ismael99rt@gmail.com', '93bcfab6e1f5d1f1190955a04cf931b7', 0, '7f1de29e6da19d22b51c68001e7e0e54', NULL),
(50, 'admin', 'neptunex99@gmail.com', 'a3931ad154b2cd7bc3be8328463831d4', 0, '7634ea65a4e6d9041cfd3f7de18e334a', 'admin'),
(52, 'usuario', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '647bba344396e7c8170902bcf2e15551', NULL);

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
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
