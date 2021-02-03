-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2020 a las 14:06:00
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Clientes_ID` int(5) NOT NULL,
  `Clientes_Nombre` varchar(45) NOT NULL,
  `Clientes_Apellido1` varchar(100) NOT NULL,
  `Clientes_Apellido2` varchar(100) NOT NULL,
  `Clientes_Clave` varchar(100) NOT NULL,
  `Clientes_Direccion` varchar(100) DEFAULT NULL,
  `Clientes_NIF` varchar(10) NOT NULL,
  `Clientes_IBAN` varchar(24) DEFAULT NULL,
  `Clientes_Telefono` int(9) NOT NULL,
  `Clientes_URL` varchar(100) DEFAULT NULL,
  `Clientes_Longitud` float(13,10) DEFAULT NULL,
  `Clientes_Latitud` float(13,10) DEFAULT NULL,
  `Clientes_Email` varchar(45) NOT NULL,
  `Clientes_Foto` varchar(45) DEFAULT NULL,
  `Clientes_Melodia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Clientes_ID`, `Clientes_Nombre`, `Clientes_Apellido1`, `Clientes_Apellido2`, `Clientes_Clave`, `Clientes_Direccion`, `Clientes_NIF`, `Clientes_IBAN`, `Clientes_Telefono`, `Clientes_URL`, `Clientes_Longitud`, `Clientes_Latitud`, `Clientes_Email`, `Clientes_Foto`, `Clientes_Melodia`) VALUES
(3, 'junior', 'RRRR', 'RRRRRRRT', 'a7151c6600f87ff6ce35afd6c9a5373a', 'trebujena', '49620406E', 'ES01234567890123456789', 642029820, 'cdpjosecabrera.es', 0.0000000000, 0.0000000000, 'ismaelrt@gmail.com', 'sol.jpg', NULL),
(4, 'probador', 'rt', 'rrrr', 'a7151c6600f87ff6ce35afd6c9a5373a', 'Calle Santiago 10 Puerta 30', '49620406E', 'ES01234567890123456789', 642029820, 'cdpjosecabrera.es', 0.0000000000, 0.0000000000, 'ismael99rt@gmail.com', 'sol.jpg', NULL),
(5, 'tester', 'uno', 'dos', 'a7151c6600f87ff6ce35afd6c9a5373a', 'Calle Federica Montseny 27', '49620406E', 'ES01234567890123456789', 642029820, 'cdpjosecabrera.es', 0.0000000000, 0.0000000000, 'ismael99rt@gmail.com', 'DtP7ryCXgAA4tmJ.jpg', NULL),
(6, 'programador2', 'rt', 'rrrr', 'a7151c6600f87ff6ce35afd6c9a5373a', 'Calle Federica Montseny 27', '49620406E', 'ES01234567890123456789', 642029820, 'cdpjosecabrera.es', 0.0000000000, 0.0000000000, 'ismael99rt@gmail.com', 'montana.jpg', NULL);

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
  `foto` varchar(50) DEFAULT NULL,
  `ultimaConexion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabladiw`
--

INSERT INTO `tabladiw` (`iduser`, `usuario`, `correo`, `password`, `bloqueado`, `token`, `perfil`, `numeroIntentos`, `foto`, `ultimaConexion`) VALUES
(76, 'IsmaelDAW', 'ismael99rt@gmail.com', 'a7151c6600f87ff6ce35afd6c9a5373a', 0, '0c74b7f78409a4022a2c4c5a5ca3ee19', 'admin', 0, 'd8nzoxgxkaehd-q.jpg', '2020-11-24'),
(78, 'programador', 'ismael99rt@gmail.com', 'a7151c6600f87ff6ce35afd6c9a5373a', 0, 'a9a6653e48976138166de32772b1bf40', 'usuario', 0, 'd8nzoxgxkaehd-q.jpg', '2020-11-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Clientes_ID`);

--
-- Indices de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Clientes_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
