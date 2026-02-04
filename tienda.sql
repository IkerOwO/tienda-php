-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-02-2026 a las 09:36:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `idTipos` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `descuento` decimal(5,2) NOT NULL,
  `detalles` text NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `articulo`, `idTipos`, `precio`, `descuento`, `detalles`, `imagen`) VALUES
(9, 'Piano Yamaha', 4, 1200.00, 10.00, 'Piano Grande Yamaha', 'piano1.jfif'),
(10, 'Bateria Alesis', 3, 320.00, 0.00, 'Bateria para niños', 'drums2.png'),
(11, 'Controladora DJ', 5, 160.00, 0.00, 'Controladora DJ Pioneer', 'dj1.jpg'),
(12, 'Guitarra Jackson', 1, 180.00, 0.00, 'Guitarra Jackson con cuerpo dinky', 'guitarra1.png'),
(13, 'Controladora DJ', 5, 600.95, 0.00, 'Controladora Serato', 'dj2.jpg'),
(21, 'Guitarra Jackson', 1, 180.00, 0.00, 'Guitarra con cuerpo dinky', '1770017986_guitarra2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idTipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idTipo`, `tipo`) VALUES
(1, 'Guitarras'),
(2, 'Bajos'),
(3, 'Baterias'),
(4, 'Pianos'),
(5, 'DJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nombreCompleto` varchar(60) NOT NULL,
  `movil` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `nombreCompleto`, `movil`) VALUES
('erdociainveike24@zaragoza.salesianos.edu', '1234', 'Iker Erdociain', '123456789'),
('juan.apellaniz@zaragoza.salesianos.edu', '1234', 'Juan Apellaniz', '321654987');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `tipo` (`idTipos`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idTipos`) REFERENCES `tipos` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
