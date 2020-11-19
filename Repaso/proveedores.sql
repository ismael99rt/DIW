-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 17:06:01
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
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Proveedor_ID` int(5) NOT NULL,
  `Proveedor_Nombre` varchar(45) NOT NULL,
  `Proveedor_Clave` varchar(45) NOT NULL,
  `Proveedor_Direccion` varchar(100) DEFAULT NULL,
  `Proveedor_Pais` int(3) NOT NULL,
  `Proveedor_CIF` varchar(10) NOT NULL,
  `Proveedor_Persona_Contacto` varchar(100) NOT NULL,
  `Proveedor_Telefono` int(9) NOT NULL,
  `Proveedor_URL` varchar(100) DEFAULT NULL,
  `Proveedor_Longitud` float(13,10) NOT NULL,
  `Proveedor_Latitud` float(13,10) NOT NULL,
  `Proveedor_Email` varchar(45) NOT NULL,
  `Proveedor_Foto` longblob NOT NULL,
  `Proveedor_Melodia` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Proveedor_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Proveedor_ID` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
