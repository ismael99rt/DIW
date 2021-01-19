-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2021 a las 08:42:34
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
-- Base de datos: `ejerciciodwes`
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
(4, 'Raqueta HEAD Negra', 1, 99, 'raqueta4.jpg'),
(5, 'Raqueta HEAD Degradado', 1, 99, 'raqueta5.jpg'),
(6, 'Raqueta Wilson Roja', 1, 99, 'raqueta6.jpg'),
(7, 'Raqueta Wilson Verde', 1, 99, 'raqueta7.jpg'),
(8, 'Raqueta Wilson Roja Negra', 1, 99, 'raqueta8.jpg'),
(9, 'Raqueta Rafael Nadal Especial', 1, 130, 'raqueta9.jpg'),
(10, 'Raqueta Roger Federer Especial', 1, 130, 'raqueta10.jpg'),
(11, 'Pelotas ATP Tour', 2, 20, 'pelotas1.jpg'),
(12, 'Pack Pelotas ATP Tour', 2, 55, 'pelotas2.jpg'),
(13, 'Pelotas Roland Garros', 2, 30, 'pelotas3.jpg'),
(14, 'Pack Pelotas Roland Garros', 2, 60, 'pelotas4.jpg'),
(15, 'Pelotas Australia Open', 2, 28, 'pelotas5.jpg'),
(16, 'Pelotas HEAD', 2, 18, 'pelotas6.jpg'),
(17, 'Pelotas Wilson', 2, 18, 'pelotas7.jpg'),
(18, 'Pelotas Babolat', 2, 19, 'pelotas8.jpg'),
(19, 'Carrito Pelotas Babolat', 2, 65, 'pelotas9.jpg'),
(20, 'Carrito Pelotas HEAD', 2, 65, 'pelotas10.jpg'),
(21, 'Zapatillas Nike 1', 3, 50, 'deportes1.jpg'),
(22, 'Zapatillas Nike 2', 3, 49, 'deportes2.jpg'),
(23, 'Zapatillas Nike 3', 3, 52, 'deportes3.jpg\r\n'),
(24, 'Zapatillas Asics Mujer', 3, 50, 'deportes4.jpg'),
(25, 'Zapatillas Adidas 1', 3, 58, 'deportes5.jpg'),
(26, 'Zapatillas Joma 1', 3, 46, 'deportes6.jpg'),
(27, 'Zapatillas Joma 2', 3, 46, 'deportes7.jpg'),
(28, 'Zapatillas HEAD', 3, 48, 'deportes8.jpg'),
(29, 'Zapatillas Adidas 2 Mujer', 3, 58, 'deportes9.jpg'),
(30, 'Zapatillas Nike 4', 3, 53, 'deportes10.jpg'),
(31, 'Camiseta Tenis Lotto', 4, 29, 'camiseta1.jpg'),
(32, 'Camiseta Tenis Adidas', 4, 33, 'camiseta2.jpg'),
(33, 'Camiseta Tenis Mujer Adidas', 4, 33, 'camiseta3.jpg'),
(34, 'Camiseta Tenis Nike', 4, 35, 'camiseta4.jpg'),
(35, 'Camiseta Tenis Rafael Nadal', 4, 38, 'camiseta5.jpg'),
(36, 'Equipaje Tenis Dunlop', 5, 67, 'equipaje1.jpg'),
(37, 'Equipaje Tenis Babolat', 5, 70, 'equipaje2.jpg'),
(38, 'Equipaje Tenis HEAD', 5, 70, 'equipaje3.jpg'),
(39, 'Equipaje Tenis HEAD Nuevo', 5, 72, 'equipaje4.jpg'),
(40, 'Equipaje Tenis Wilson', 5, 75, 'equipaje5.jpg');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
