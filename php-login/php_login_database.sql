-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2022 a las 05:06:31
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@mail.com', '$2y$10$PsL/wTmEg36ZOMZ3gGJh/uiESAhSw0Nz/01Dkt1VHcCg.8HcL48u.'),
(2, 'test@mail.com', '$2y$10$Ym70egpRZsvlKV2JZegCjueLgwwytjqE0EuKzGMd0bT3i4JtIJWX6'),
(3, 'test2@mail.com', '$2y$10$j/NkyN5C5MOJNN7AuFDX/ukFzSh6cFW48S4hekS.CML8mjgFf2xty'),
(4, 'juan@mail.com', '$2y$10$24a3TcEF3iVrQObp4Zs4Oe.lxbJ6mImzLKm9znL5YjNVaJ2.dGOR.'),
(5, 'jose@mail.com', '$2y$10$IGd8qeP.h1BFZW/hzyONB.6VtUuT0pZ08MAe7.Y4txeviAVnCxdW.'),
(6, 'rodolfo@mail.com', '$2y$10$FjXhmIwm14SI8HnbO9wX6u0Qz9KME9BJ1g1C6n41pn7gAJQkkr2la'),
(7, 'milena@mail.com', '$2y$10$UsDgb2YC2Xa/GNHMZU5rrOJaKRXoPJybtS80XvsJLcP/7On/NbF5m');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
