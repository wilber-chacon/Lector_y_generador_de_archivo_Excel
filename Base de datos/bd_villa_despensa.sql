-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-07-2024 a las 20:13:31
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_villa_despensa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` text NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `precioUnitario` double(6,2) NOT NULL,
  `existencias` int(11) NOT NULL,
  `proveedor` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `detalle`, `categoria`, `precioUnitario`, `existencias`, `proveedor`) VALUES
(1, 'Bebida con jugo de manzana jumex 1L', 'Bebidas', 1.42, 500, 'Jumex'),
(2, 'Blueberries bandeja', 'Frutas y verduras', 4.60, 200, 'Frutiver'),
(3, 'Cebolla morada 3 lbs red', 'Frutas y verduras', 3.00, 367, 'Frutiver'),
(4, 'Gaseosa coca cola regular 3 L', 'Bebidas', 2.30, 672, 'La constancia'),
(5, '2 pack delisoya natural polvo 360 G', 'Abarrotes', 6.45, 342, 'Jirón'),
(6, '2 pack leche en polvo australian 350 G', 'Abarrotes', 6.50, 437, 'Australian'),
(7, 'Nachos diana 300 GRS', 'Abarrotes', 2.10, 854, 'Diana'),
(8, 'Tortillas jalapeños diana 150 G', 'Abarrotes', 1.15, 895, 'Diana'),
(9, '3pack shaka laka sabor a chocolate 200ML', 'Bebidas', 1.50, 785, 'La constancia'),
(10, '3 PACK AMB GLADE PLUG INS MAN/CAN 63 ML', 'Cuidado del hogar', 10.14, 342, 'Ainsa'),
(11, '3 PACK jabon zixx azul 400 G', 'Cuidado del hogar', 3.50, 268, 'Ainsa'),
(12, '4PACK limpiador baño mr musculo PAST 40G', 'Cuidado del hogar', 6.20, 264, 'Ainsa'),
(13, 'Banano libra', 'Frutas y verduras', 0.35, 834, 'Frutiver'),
(14, 'Fresas libra', 'Frutas y verduras', 4.15, 378, 'Frutiver'),
(15, 'Churritos diana 44 gr', 'Abarrotes', 0.66, 342, 'Diana'),
(16, 'Quesito diana 125g', 'Abarrotes', 1.15, 456, 'Diana'),
(17, 'Alboroto diana 185 gramos', 'Abarrotes', 1.17, 344, 'Diana');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
