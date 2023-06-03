-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 18:12:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanas`
--

CREATE TABLE `campanas` (
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `num_jugadores` int(3) NOT NULL,
  `usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanasinvitadas`
--

CREATE TABLE `campanasinvitadas` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitaciones`
--

CREATE TABLE `invitaciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `Nombre` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `Raza` varchar(30) NOT NULL,
  `Clase` varchar(30) NOT NULL,
  `Nivel` int(3) NOT NULL,
  `Trasfondo` varchar(30) NOT NULL,
  `Alineamiento` varchar(30) NOT NULL,
  `Fuerza` int(3) NOT NULL,
  `Destreza` int(3) NOT NULL,
  `Constitucion` int(3) NOT NULL,
  `Inteligencia` int(11) NOT NULL,
  `Sabiduria` int(11) NOT NULL,
  `Carisma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`Nombre`, `usuario`, `Raza`, `Clase`, `Nivel`, `Trasfondo`, `Alineamiento`, `Fuerza`, `Destreza`, `Constitucion`, `Inteligencia`, `Sabiduria`, `Carisma`) VALUES
('pjPrueba2', 'prueba1', 'Gnomo', 'hechicero', 5, 'Timador', 'legal-neutral', 11, 13, 12, 20, 13, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `imagen_perfil` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`, `imagen_perfil`) VALUES
('alvaro', '123', ''),
('prueba1', '123', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campanas`
--
ALTER TABLE `campanas`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `fk_personaje_usuario2` (`usuario`);

--
-- Indices de la tabla `campanasinvitadas`
--
ALTER TABLE `campanasinvitadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invitaciones_usuarios` (`usuario`),
  ADD KEY `fk_invitaciones_campanas` (`nombre`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD KEY `fk_personaje_usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campanasinvitadas`
--
ALTER TABLE `campanasinvitadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campanas`
--
ALTER TABLE `campanas`
  ADD CONSTRAINT `fk_personaje_usuario2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

--
-- Filtros para la tabla `campanasinvitadas`
--
ALTER TABLE `campanasinvitadas`
  ADD CONSTRAINT `campanasinvitadas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`),
  ADD CONSTRAINT `campanasinvitadas_ibfk_2` FOREIGN KEY (`nombre`) REFERENCES `campanas` (`nombre`);

--
-- Filtros para la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  ADD CONSTRAINT `fk_invitaciones_campanas` FOREIGN KEY (`nombre`) REFERENCES `campanas` (`nombre`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_invitaciones_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

--
-- Filtros para la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD CONSTRAINT `fk_personaje_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
