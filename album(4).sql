-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2023 a las 21:33:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `album`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(1, 8, 9, 'nervous\n', 0, '2023-03-16 11:43:45'),
(2, 8, 9, 'sd', 0, '2023-03-16 11:45:39'),
(3, 8, 9, 'd', 0, '2023-03-16 11:45:58'),
(4, 8, 9, 'sd', 0, '2023-03-16 11:46:54'),
(5, 8, 9, 'Hola', 0, '2023-03-16 12:25:15'),
(6, 8, 9, 'hola', 0, '2023-03-16 12:41:33'),
(7, 9, 8, 'K onda', 0, '2023-03-16 12:47:10'),
(8, 8, 9, 'Exito!', 0, '2023-03-16 12:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 8, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre`, `imagen`, `descripcion`, `categoria`, `precio`, `user_id`) VALUES
(46, 'Ropa deportiva', '1678899708WhatsApp Image 2023-03-14 at 4.25.56 PM.jpeg', 'Vendo ropa deportiva de buenisima calidad, manden inbox para mas detalles', 'Ropa', 500, 9),
(47, 'Vendo libro de ingles B2', '1678899780Screenshot_20230116_120841.png', 'Vendo libro de ingles macmillan para personas que son nivel B2', 'Vehiculos', 1200, 9),
(48, 'Vendo MacBook pro', '1678899882AKA8518.jpg', 'Totalmente nueva con caja y todo, lo vendo porque me comprare una pc gamer.', 'Electronica', 21000, 8),
(49, 'Vendo samsung galaxy pocket neo', '1678932081proxy.jpg', 'En muy buen estado, bateria al 80%, no cambios solo efectivo', 'Electronica', 1500, 22),
(50, 'Telefono', '1678998559proxy.jpg', 'Es una prueba ', 'Electronica', 15000, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `imagen`, `descripcion`, `categoria`, `user_id`) VALUES
(10, 'Servicio de carpiteria', '1678899944WhatsApp Image 2023-03-14 at 4.23.01 PM.jpeg', 'Somos el grupo el TUPpenteria, contrata nuestros servicios mandandos un mensaje', 'Carpinteria', 8),
(11, 'Doy clases particulares de matematicas', '1678900005WhatsApp Image 2023-03-14 at 4.19.31 PM.jpeg', 'Enviame mensaje para acordar la clase :D', 'Escolares', 9),
(12, 'Reparo equipo de computo', '1678900092WhatsApp Image 2023-03-14 at 4.17.29 PM.jpeg', 'Mantenimiento preventivo y correctivo a cualquier equipo de computo envíame un mensaje para consultar los precios.', 'Tecnologia', 24),
(13, 'Veterinaria el TUPDoggie', '1678900158WhatsApp Image 2023-03-14 at 4.14.06 PM.jpeg', 'Somos una veterinaria que amamos a los animales, si quieres una consulta, envíanos un mensaje y acordamos cita.', 'Veterinaria', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `perfil` varchar(500) DEFAULT NULL,
  `roll` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `password`, `nombre`, `perfil`, `roll`) VALUES
(7, 'bluechini@gmail.com', '123456', 'BluchinBonita', '12313231232.jpg', 'usuario'),
(8, 'judi@gmail.com', '$2y$10$JJ60NePaMFIba7/rWN47C.t8VUyxd.9CpXkjmuWEIAqhj2dSMdBeS', 'JudithEst', '1676829152Captura de pantalla 2022-02-21 085648.png', 'usuario'),
(9, 'sofia@gmail.com', '$2y$10$QLy5OMz2mBI1rcmAo2VaT.1N7iYQkXm1uck9fERQcRUBm0z.Qdk4S', 'Sofi', '1676923237WhatsApp Image 2023-02-17 at 9.58.46 PM.jpeg', 'usuario'),
(10, 'yadi@gmail.com', '$2y$10$tzU4lpjGZXE6.Ghxu7oeXuNrA/9uYZCZg3vOoyfTQupMsZ08kv6zC', 'Yadira Perez', NULL, 'usuario'),
(11, 'roger@gmail.com', '$2y$10$/BpXvKEIVJ3WeCyfZ6qDK.Q4JC4.j.ngaxEEw8g0y5lEbT1DjmXXm', 'Rogelio Gonz', NULL, 'usuario'),
(12, 'lachofi@gmail.com', '$2y$10$xd6JtHm/.pgx8ckNKh6.MuEo3LipuCciYr4RpR7V9sUuFTkIDhZG.', 'Sofia Avila', NULL, 'usuario'),
(20, 'eltigreroger@gmail.com', '$2y$10$mh6tCRu9mUmLcdnexRV27ee9PMPV/pxxb2.O8KjX.LtT7gVXYM7JG', 'ElTigreRoger', '1677172469kari-shea-MrXipNsTSbA-unsplash.jpg', 'usuario'),
(21, 'prueba@gmail.com', '$2y$10$Ag5nFZrGri3nnvOuCkPl4OGESazVgVkFv0Keohic/4d.zKdGagfYW', 'Prueba', NULL, 'usuario'),
(22, 'emma@gmail.com', '$2y$10$yAkgwBv06zAOMCI./o4UTe1UPRxowmySc3f00jdCzNtYzYE6AxTqy', 'Emmanuel', '1678932126Screenshot 2023-03-15 162240.png', 'usuario'),
(23, 'sebas.elwasa@gmail.com', '$2y$10$RI4OQ/ZLC.35XExn1rms4.bPuJqe30oEWBi1s.jrHCNIIhCCDxnhy', 'sebaswazza', '1678071863WhatsApp Image 2023-01-29 at 2.54.44 PM.jpeg', 'usuario'),
(24, 'roger312@gmail.com', '$2y$10$n5VdYTudAvjCyFrH8grHJeCbDyWEKzR4BhAL9vNG7CkoPXRrDZaQu', 'Roger', '1678712493Captura de pantalla 2022-04-16 165437.png', 'usuario'),
(25, 'pedritosola@gmail.com', '$2y$10$EsJmgm2NN8WlHNSzNc1IDuOPLJEk4BaEgkERQUjoRxeS.uy3dIpwC', 'Pedrito Sola', '1678915418Screenshot 2023-03-15 162240.png', 'usuario'),
(26, 'susy@gmail.com', '$2y$10$wXZ1KxihbK/eP5f6E8/Cdek9pFjkSDTsEIvHUPBns/aTzembNlCya', 'Susana perez', '1678998398perfil.jpg', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indices de la tabla `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
