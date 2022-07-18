-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2022 a las 19:40:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `ingre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `tipo`, `ingre`) VALUES
(1, 'verdura', 'Aceituna'),
(2, 'verdura', 'Ají amarillo'),
(3, 'verdura', 'Ajos'),
(4, 'verdura', 'Albahaca'),
(5, 'verdura', 'Alcachofa'),
(6, 'cereal', 'Alpiste'),
(7, 'verdura', 'Alverja'),
(8, 'verdura', 'Apio'),
(9, 'Cereal', 'Arroz'),
(10, 'cereal', 'Avena'),
(11, 'verdura', 'Betarraga'),
(12, 'verdura', 'Brocoli'),
(13, 'verdura', 'Calabaza'),
(14, 'verdura', 'Camote'),
(15, 'carne', 'Carne de cerdo'),
(16, 'carne', 'Carne de pollo'),
(17, 'carne', 'Carne de res'),
(18, 'cereal', 'Cebada'),
(19, 'verdura', 'Cebolla'),
(20, 'verdura', 'Cebolla china'),
(21, 'cereal', 'Centeno'),
(22, 'verdura', 'Champiñones'),
(23, 'verdura', 'Choclo'),
(24, 'verdura', 'Coliflor'),
(25, 'especia', 'Comino'),
(26, 'verdura', 'Culantro'),
(27, 'verdura', 'Espinaca'),
(28, 'cereal', 'Fideos'),
(29, 'verdura', 'Kion'),
(30, 'lacteo', 'Leche'),
(31, 'verdura', 'Lechuga'),
(32, 'verdura', 'Limón'),
(33, 'cereal', 'Maíz'),
(34, 'lacteo', 'Mantequilla'),
(35, 'especia', 'Orégano'),
(36, 'verdura', 'Olluco'),
(37, 'verdura', 'Palta'),
(38, 'verdura', 'Papa'),
(39, 'verdura', 'Pepino'),
(40, 'verdura', 'Perejil'),
(41, 'carne', 'Pescado'),
(42, 'especia', 'Pimienta'),
(43, 'verdura', 'Pimiento'),
(44, 'lacteo', 'Queso'),
(45, 'cereal', 'Quinua'),
(46, 'verdura', 'Tomate'),
(47, 'cereal', 'Trigo'),
(48, 'verdura', 'Vainita'),
(49, 'lacteo', 'Yogurt'),
(50, 'verdura', 'Zanahoria'),
(51, 'verdura', 'Zapallo'),
(53, 'cereal', 'Pasas'),
(54, '', 'Huevos'),
(55, '', 'Canela'),
(56, '', 'Manzana'),
(57, '', 'Membrillo'),
(58, '', 'Maiz Morado'),
(59, '', 'Masa Wanton');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
