-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2021 a las 12:56:01
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
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_fabricante` varchar(20) NOT NULL,
  `precio` int(20) NOT NULL,
  `peso` int(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `nombre_fabricante`, `precio`, `peso`, `descripcion`, `categoria`, `url`, `fecha`) VALUES
(3, 'Raqueta Head Roja', 'Head', 50, 1, 'Raqueta Novak Prueba', 'Raquetas', 'https://www.head.com/es_ES/', '2021/10/09'),
(4, 'Raqueta Lotto Ferrer', 'Lotto', 55, 1, 'Raqueta Lotto David Ferrer', 'Pelotas', 'https://www.lotto.it/es/', '2021/10/09'),
(5, 'Pelotas Roland Garros', 'RG', 30, 4, 'Pelotas Roland Garros 2021', 'Pelotas', 'https://www.decathlon.es/es/', '2020/11/11'),
(6, 'Pelotas Open Australia', 'AO', 35, 3, 'Pelotas Open Australia 2021', 'Pelotas', 'https://www.decathlon.es/es/', '2020/11/11'),
(7, 'Pelotas ATP', 'ATP', 40, 3, 'Pelotas ATP World Tour', 'Pelotas', 'https://www.decathlon.es/es/', '2020/11/11'),
(8, 'Equipaje Babolat Nadal', 'Babolat', 75, 6, 'Equipaje Verde Edicion Nadal', 'Equipajes', 'https://www.babolat.com/es', '2020/08/12'),
(9, 'Equipaje Wilson Federer', 'Wilson', 88, 6, 'Equipaje Roger Federer Wimbledon', 'Equipajes', 'https://www.wilson.com/es-es', '2020/08/12'),
(11, 'Raqueta Babolat Nadal', 'Babolat', 100, 1, 'Raqueta Babolat Nadal Profesional', 'Raquetas', 'https://www.babolat.com/es', '2021/10/09');

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
(23, 'Zapatillas Nike 3', 3, 52, 'deportes3.jpg\r\n'),
(25, 'Zapatillas Adidas 1', 3, 58, 'deportes5.jpg'),
(26, 'Zapatillas Joma 1', 3, 46, 'deportes6.jpg'),
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
  `bloqueado` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `numeroIntentos` int(1) NOT NULL DEFAULT '0',
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
(78, 'daw', 'ismaelrt@gmail.com', 'ff978549f4adba048bb3e08221399511', 0, '8c6744c9d42ec2cb9e8885b54ff744d0', 'admin', 0, 'daw.jpg', '36.85755934885341', '-6.040016325496083', 'ISMAEL', 'RUIZ TEJERO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Clientes_ID`);

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
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Clientes_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
