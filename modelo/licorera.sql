-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2019 a las 21:27:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `licorera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Juan', 'Rodriguez', '123@123.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `direccion`) VALUES
(79634140, 'Sebastian', 'Angel', 'cll 45 sur # 89 - 23'),
(1003456782, 'Daniela', 'Chaparro', 'cll 56 # 23 - 45'),
(1007351788, 'Santiago', 'Vanegas', 'cll 34 # 7 - 23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `idventa`, `idproducto`, `cantidad`, `precio`) VALUES
(28, 29, 8, 1, 58000),
(29, 29, 6, 1, 123000),
(30, 29, 1, 2, 12000),
(31, 29, 9, 1, 15000),
(32, 29, 1, 1, 6000),
(33, 29, 6, 1, 123000),
(34, 29, 9, 1, 15000),
(35, 30, 1, 1, 6000),
(36, 31, 6, 2, 246000),
(37, 31, 15, 1, 300000),
(38, 32, 1, 2, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `idtamaño` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `foto`, `idtamaño`, `cantidad`, `precio`) VALUES
(1, 'Aguardiente ', NULL, 3, 57, 6000),
(2, 'Aguardiente Antioqueño', NULL, 3, 45, 35000),
(3, 'Aguardiente Nectar', NULL, 3, 67, 33000),
(4, 'Ron SantaFe', NULL, 4, 45, 45000),
(5, 'Ron Medellin', NULL, 4, 34, 50000),
(6, 'Whisky Buchanans Deluxe          ', NULL, 4, 41, 123000),
(7, 'Whisky black and white 8 años ', NULL, 3, 13, 40000),
(8, 'Vodka Absolut ', NULL, 3, 32, 58000),
(9, 'Vino Lheritage Cabernet Sauvignon ', NULL, 3, 54, 15000),
(10, 'Vino tinto merlot clásico - Panul b', NULL, 3, 45, 20000),
(11, 'Aguardiente Cristal', NULL, 1, 12, 5500),
(12, 'Aguardiente Amarillo de Caldas', NULL, 3, 12, 45000),
(14, 'Whisky Royal Salute 21 años ', NULL, 3, 2, 644000),
(15, 'Vino penfolds bin 128 coonawarra shiraz', NULL, 3, 1, 300000),
(16, 'Vino Gato Negro', NULL, 3, 23, 50000),
(17, 'Vodka Smirnoff Lulo', NULL, 3, 1, 30000),
(18, 'Vincoca', NULL, 3, 23, 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaño`
--

CREATE TABLE `tamaño` (
  `idtamaño` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tamaño`
--

INSERT INTO `tamaño` (`idtamaño`, `nombre`) VALUES
(1, 'Tetrapack x 250 ml'),
(2, 'Botella x 375 ml'),
(3, 'Botella x 750 ml'),
(4, 'Botella x 1000ml'),
(5, 'Botella x 2000ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idadministrador` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idadministrador`, `idcliente`, `fecha`) VALUES
(1, NULL, NULL, NULL),
(22, 1, 79634140, '2019-07-10'),
(23, 1, 79634140, '2019-07-10'),
(24, 1, 79634140, '2019-07-10'),
(25, 1, 79634140, '2019-07-10'),
(26, 1, 1003456782, '2019-07-10'),
(27, 1, 79634140, '2019-07-10'),
(28, 1, 79634140, '2019-07-10'),
(29, 1, 79634140, '2019-07-10'),
(30, 1, 79634140, '2019-07-10'),
(31, 1, 79634140, '2019-07-10'),
(32, 1, 1007351788, '2019-07-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idtamaño` (`idtamaño`);

--
-- Indices de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`idtamaño`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idadministrador` (`idadministrador`),
  ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007351789;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  MODIFY `idtamaño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idtamaño`) REFERENCES `tamaño` (`idtamaño`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idadministrador`) REFERENCES `administrador` (`idadministrador`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
