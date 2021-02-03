-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2021 a las 20:25:16
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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `precio` double NOT NULL,
  `foto` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `idCategoria`, `precio`, `foto`) VALUES
(1, 'Raqueta Babolat Azul', 1, 90, 'raqueta1.jpg'),
(2, 'Raqueta Babolat Amarillo Verde', 1, 90, 'raqueta2.jpg'),
(3, 'Raqueta Babolat Verde', 1, 90, 'raqueta3.jpg'),
(5, 'Raqueta HEAD Degradado', 1, 99, 'raqueta5.jpg'),
(10, 'Raqueta Roger Federer Especial', 1, 130, 'raqueta10.jpg'),
(11, 'Pelotas ATP Tour', 2, 20, 'pelotas1.jpg'),
(13, 'Pelotas Roland Garros', 2, 30, 'pelotas3.jpg'),
(16, 'Pelotas HEAD', 2, 18, 'pelotas6.jpg'),
(19, 'Carrito Pelotas Babolat', 2, 65, 'pelotas9.jpg'),
(20, 'Carrito Pelotas HEAD', 2, 65, 'pelotas10.jpg'),
(21, 'Zapatillas Nike 1', 3, 50, 'deportes1.jpg'),
(22, 'Zapatillas Nike 2', 3, 49, 'deportes2.jpg'),
(23, 'Zapatillas Nike 3', 3, 52, 'deportes3.jpg\r\n'),
(25, 'Zapatillas Adidas 1', 3, 58, 'deportes5.jpg'),
(26, 'Zapatillas Joma 1', 3, 46, 'deportes6.jpg'),
(29, 'Zapatillas Adidas 2 Mujer', 3, 58, 'deportes9.jpg'),
(30, 'Zapatillas Nike 4', 3, 53, 'deportes10.jpg'),
(31, 'Camiseta Tenis Lotto', 4, 29, 'camiseta1.jpg'),
(32, 'Camiseta Tenis Adidas', 4, 33, 'camiseta2.jpg'),
(34, 'Camiseta Tenis Nike', 4, 35, 'camiseta4.jpg'),
(36, 'Equipaje Tenis Dunlop', 5, 67, 'equipaje1.jpg'),
(37, 'Equipaje Tenis Babolat', 5, 70, 'equipaje2.jpg'),
(38, 'Equipaje Tenis HEAD', 5, 70, 'equipaje3.jpg'),
(39, 'Equipaje Tenis HEAD Nuevo', 5, 72, 'equipaje4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabladiw`
--

CREATE TABLE `tabladiw` (
  `iduser` int(2) NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `bloqueado` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `numeroIntentos` int(1) NOT NULL DEFAULT 0,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `altitud` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `longitud` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabladiw`
--

INSERT INTO `tabladiw` (`iduser`, `usuario`, `correo`, `password`, `bloqueado`, `token`, `perfil`, `numeroIntentos`, `foto`, `altitud`, `longitud`, `nombre`, `apellidos`) VALUES
(77, 'admin', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '3b5dca501ee1e6d8cd7b905f4e1bf723', 'admin', 0, 'usuario.png', '37.38415925429511', '-5.970674109536306', 'Ismael', 'Tejero'),
(78, 'daw', 'ismael99rt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '8c6744c9d42ec2cb9e8885b54ff744d0', 'admin', 0, 'daw.jpg', '36.85755934885341', '-6.040016325496083', 'ISMAEL', 'TEJERO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`) USING BTREE,
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tabladiw`
--
ALTER TABLE `tabladiw`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
