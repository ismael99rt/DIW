-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb28.awardspace.net
-- Tiempo de generación: 13-11-2020 a las 08:15:56
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
  `perfil` varchar(50) DEFAULT NULL,
  `numeroIntentos` int(1) NOT NULL DEFAULT '0',
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabladiw`
--

INSERT INTO `tabladiw` (`iduser`, `usuario`, `correo`, `password`, `bloqueado`, `token`, `perfil`, `numeroIntentos`, `foto`) VALUES
(50, 'admin', 'neptunex99@gmail.com', 'a3931ad154b2cd7bc3be8328463831d4', 0, '7634ea65a4e6d9041cfd3f7de18e334a', 'admin', 0, NULL),
(52, 'usuario', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '647bba344396e7c8170902bcf2e15551', 'usuario', 0, NULL),
(55, 'usuario2', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '23ce1851341ec1fa9e0c259de10bf87c', 'usuario', 0, NULL),
(63, 'contador', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 1, 'ec8ce6abb3e952a85b8551ba726a1227', NULL, 0, NULL),
(68, 'ingeniero', 'ismael99rt@gmail.com', 'a3931ad154b2cd7bc3be8328463831d4', 0, '6c4b761a28b734fe93831e3fb400ce87', NULL, 0, 'DtP7ryCXgAA4tmJ.png'),
(69, 'designer', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 1, 'ddb30680a691d157187ee1cf9e896d03', NULL, 0, 'DtP7ryCXgAA4tmJ.png'),
(70, 'usuario2', 'ismael99rt@gmail.com', '576bf09efbbc72eb17361202b592e7ee', 1, 'eddea82ad2755b24c4e168c5fc2ebd40', NULL, 0, ''),
(71, 'mantenimiento2', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '428fca9bc1921c25c5121f9da7815cde', NULL, 0, '/tmp/phpB41MS5');

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
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
