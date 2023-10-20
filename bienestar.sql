-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2023 a las 09:48:26
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bienestar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `servidor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `fundamentacion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `folio`, `nombre`, `servidor`, `area`, `motivo`, `fecha`, `fundamentacion`, `archivo`, `status`) VALUES
(4, '0945317268', 'LINDA ALI CRISANTO LOPEZ', '230522', 'Área de becas', 'Motivo particular', '2023-09-27', 'Choque mi auto', '285340.png', ''),
(5, '9852316704', 'OMAR ALI', '123456', 'Área de adultos mayores', 'Motivo de salud', '2023-09-27', 'gripe', 'nuho.jpg', ''),
(6, '1087629345', 'Mac Miller', '2023', 'Área de recursos humanos', 'Motivo de comisión', '2023-09-27', 'Evento', '285340.png', 'Pendiente de revisión'),
(7, '3721658490', 'Hary styles', '2022', 'Área de adultos mayores', 'Motivo de comisión', '2023-09-27', 'Adultos', '285340.png', 'Pendiente de revisión'),
(8, '9658713024', 'Amara', '2021', 'Área de becas', 'Motivo de salud', '2023-09-27', 'TOS', 'Blue horizon.jpg', 'Pendiente de revisión'),
(9, '4719863025', 'Juanpis', '333', 'Director regional', 'Motivo personal', '2023-09-28', 'personal', '203513.jpg', 'Pendiente de revisión'),
(10, '4905861732', 'Sirius black', '1105', 'Director regional', 'Motivo personal', '2023-09-28', 'personal', '20.png', 'Pendiente de revisión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `encargado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `servidor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `sucursal` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `recomendaciones` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id`, `folio`, `encargado`, `servidor`, `sucursal`, `status`, `recomendaciones`) VALUES
(1, '230522', 'Linda', '1', 'Personal', 'Permiso en revision', 'Imagen incorrecta'),
(2, '9658713024', 'Amara', '2021', 'Motivo de salud', 'Pendiente de revisión', ''),
(3, '4719863025', 'Juanpis', '333', 'Motivo personal', 'Pendiente de revisión', ''),
(4, '4905861732', 'Sirius black', '1105', 'Motivo personal', 'Pendiente de revisión', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Director regional'),
(2, 'Área de recursos humanos'),
(3, 'Área de adulto mayor'),
(4, 'Área de becas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `encargado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `sucursal` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `anydesk` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `folio`, `encargado`, `email`, `sucursal`, `fecha`, `anydesk`, `descripcion`, `status`) VALUES
(1, '230522', 'Linda', 'Area de becas', 'Personal', 'Servidor de la nacion', '123456', 'Dolor de estomago', 'Pendiente de revisión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `sucursal` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `sucursal`, `telefono`, `usuario`, `password`, `idRol`) VALUES
(15, 'region', 'Jefe del área', '7841109122', 'region@example.com', '960db2ed82202a9706b97775a4269378', 1),
(16, 'rh', 'Jefe del área', '7841109122', 'rh@example.com', '87e4210c7d7e6dbf9a659a8329577bce', 2),
(17, 'adulto', 'Jefe del área', '7841109122', 'adulto@example.com', 'e4c072dc68bbdab456be63a6225c4dc9', 3),
(18, 'beca', 'Jefe del área', '7841109122', 'beca@example.com', 'e1d3c7ba97eb7a227276f71d20dc51c2', 4),
(19, 'LOPEZ PEREZ OMAR ALI', 'Jefe del área', '782151515', 'aliregion@example.com', '9e566ea0208b201f1a277cc6072e8b96', 1),
(20, 'servidor', 'Servidor de la nación', '7841109172', 'servidor@example.com', '2ae9aaada852dde59607c1fa35011935', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
