-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 20:45:11
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
-- Base de datos: `faltas`
--

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cial`, `dni`, `idCurso`) VALUES
('2455647637856387385738738738738638', '12345678B', '2asir'),
('3543876879689689698767678687', '78968213B', '2asir'),
('457884164563468465465445234', '42424242P', '2daw'),
('54635463868768778678', '78965413A', '2daw');

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`nombre`, `idCurso`) VALUES
('2ASIR', '2asir'),
('2DAW', '2daw');

--
-- Volcado de datos para la tabla `falta`
--

INSERT INTO `falta` (`idfalta`, `cial`, `idCorreo`, `sesion`, `dia`, `fecha`, `tipoFalta`) VALUES
(211, '457884164563468465465445234', 'prof@prof.com', 1, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar'),
(212, '457884164563468465465445234', 'prof@prof.com', 2, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar'),
(213, '457884164563468465465445234', 'prof@prof.com', 3, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar'),
(214, '457884164563468465465445234', 'prof@prof.com', 4, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar'),
(215, '457884164563468465465445234', 'prof@prof.com', 5, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar'),
(216, '457884164563468465465445234', 'prof@prof.com', 6, '2023-11-14', '2023-11-14 20:42:02', 'Falta sin Justificar');

--
-- Volcado de datos para la tabla `imparte`
--

INSERT INTO `imparte` (`idCorreo`, `idCurso`) VALUES
('prof@prof.com', '2daw');

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idCorreo`, `dni`) VALUES
('prof@prof.com', '12345678A');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `contrasena`) VALUES
('prof', 'prorf', 'prof', '12345678A', '123456'),
('juan', 'juan', 'juan', '12345678B', '1234'),
('aaron', 'medina', 'rodriguez', '42424242P', '1234'),
('antonio', 'antonio', 'antonio', '78965413A', '1234'),
('paco', 'paco', 'paco', '78968213B', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
