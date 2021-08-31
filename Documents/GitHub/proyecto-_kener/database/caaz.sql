-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2021 a las 01:51:02
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caaz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `severity` varchar(30) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `case_num` varchar(30) NOT NULL,
  `medida1` varchar(100) NOT NULL,
  `medida2` varchar(100) NOT NULL,
  `medida3` varchar(100) NOT NULL,
  `medida4` varchar(100) NOT NULL,
  `medida5` varchar(100) NOT NULL,
  `porcentaje` varchar(10) NOT NULL,
  `e_id2` varchar(10) NOT NULL,
  `calificaciona` varchar(10) NOT NULL,
  `justificacion` varchar(150) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `eva1` varchar(10) NOT NULL,
  `eva2` varchar(10) NOT NULL,
  `calificacionm` varchar(10) NOT NULL,
  `calificacionf` varchar(10) NOT NULL,
  `justificacionm` varchar(150) NOT NULL,
  `justificacionf` varchar(150) NOT NULL,
  `periodo1` varchar(200) NOT NULL,
  `periodo2` varchar(50) NOT NULL,
  `periodo3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cases`
--

INSERT INTO `cases` (`id`, `employee_id`, `severity`, `notes`, `case_num`, `medida1`, `medida2`, `medida3`, `medida4`, `medida5`, `porcentaje`, `e_id2`, `calificaciona`, `justificacion`, `estado`, `eva1`, `eva2`, `calificacionm`, `calificacionf`, `justificacionm`, `justificacionf`, `periodo1`, `periodo2`, `periodo3`) VALUES
(111, '5216', 'En Proceso', 'objetivo 2', '2021/06/12.342', 'uno', 'dos ', 'tres', 'cuatro', 'cinco', '30', '5216', '', '', '0', '5188', '5236', '', '', 'corrige tu distribucion', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', ''),
(112, '5216', 'En Proceso', 'objetivo 3', '2021/06/12.861', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '20', '5216', '3', 'lo mismo', '5', '5188', '5236', '', '', 'este no', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', ''),
(113, '5216', 'En Proceso', 'objetivo 4', '2021/06/12.528', 'uno ', 'dos', 'tres', 'cuatro', 'cinco', '40', '5216', '', '', '0', '5188', '5236', '', '', 'muy mal', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', ''),
(114, '5188', 'En Proceso', 'primero', '2021/06/12.58', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '25', '5188', '', '', '1', '5236', '0143', '', '', 'correcto', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', ''),
(115, '5188', 'En Proceso', 'dos', '2021/06/12.691', 'dos', 'tres', 'cuatro', 'cinco', 'seis', '20', '5188', '', '', '2', '5236', '0143', '', '', 'corregir', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', ''),
(116, '5188', 'En Proceso', 'objetivo 1', '2021/06/12.937', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '40', '5188', '', '', '4', '5236', '0143', '', '', 'corregir', '', 'June 11, 2021 June 11, 2021 Establecimiento de Objetivos', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `comp1` varchar(200) NOT NULL,
  `p1` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fortalezas` varchar(100) NOT NULL,
  `oportunidades` varchar(100) NOT NULL,
  `conocimientos` varchar(100) NOT NULL,
  `habilidades` varchar(100) NOT NULL,
  `c_evaluador` varchar(100) NOT NULL,
  `c_evaluado` varchar(100) NOT NULL,
  `periodo1` varchar(150) NOT NULL,
  `periodo2` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `case_num` varchar(80) NOT NULL,
  `c_coment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id`, `employee_id`, `comp1`, `p1`, `estado`, `fortalezas`, `oportunidades`, `conocimientos`, `habilidades`, `c_evaluador`, `c_evaluado`, `periodo1`, `periodo2`, `tipo`, `case_num`, `c_coment`) VALUES
(158, '5216', 'competencia final de año', '3', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/30.558', ''),
(159, '5216', 'competencia final de año', '4', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/30.831', ''),
(160, '5216', 'competencia final de año', '4', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/30.835', ''),
(161, '5188', 'competencia nivel 2', '2', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Orientación a resultados', '2021/06/30.86', ''),
(162, '5188', 'competencia nivel 2', '3', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Manejo del cambio', '2021/06/30.304', ''),
(163, '5188', 'competencia nivel 2', '3', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/30.780', ''),
(164, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/30.281', ''),
(165, '5188', 'competencia nivel 2', '1', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/30.731', ''),
(166, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Liderazgo', '2021/06/30.157', ''),
(167, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Desarrollo de personal y de talento', '2021/06/30.533', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `joined` varchar(30) NOT NULL,
  `tmp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `surname`, `phone`, `email`, `gender`, `joined`, `tmp`) VALUES
(32, '1010', 'usuario 1', 'ususario 1', '7227843500', 'usuario1@gmail.com', 'M', ' 11 May 2021 ', '1010'),
(33, '2020', 'usuario 2', 'usuario 2', '7227843647', 'usuario2@gmail.com', 'F', ' 11 May 2021 ', '2020'),
(40, '0110', 'Administrador', 'General', '7222799314', 'mesa.ayuda@kener.com.mx', 'M', ' 11 Jun 2021 ', '0110'),
(41, '5216', 'Valeria Anaisa', 'Cruz Encinas', '7227158901', 'valeria.cruz@kener.com.mx', 'M', ' 12 Jun 2021 ', '5216'),
(42, '5236', 'Diana', 'Zenon Becerril', '7227834744', 'diana.zenon@kener.com.mx', 'F', ' 12 Jun 2021 ', '5236'),
(43, '5188', 'Hail Alejandro', 'Gonzalez Zepeda', '722 7843512', 'hail.gonzalez@kener.com.mx', 'M', ' 12 Jun 2021 ', '5188');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `severity` varchar(30) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `case_num` varchar(30) NOT NULL,
  `medida1` varchar(100) NOT NULL,
  `medida2` varchar(100) NOT NULL,
  `medida3` varchar(100) NOT NULL,
  `medida4` varchar(100) NOT NULL,
  `medida5` varchar(100) NOT NULL,
  `porcentaje` varchar(10) NOT NULL,
  `e_id2` varchar(10) NOT NULL,
  `calificaciona` varchar(10) NOT NULL,
  `justificacion` varchar(150) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `eva1` varchar(10) NOT NULL,
  `eva2` varchar(10) NOT NULL,
  `calificacionm` varchar(10) NOT NULL,
  `calificacionf` varchar(10) NOT NULL,
  `justificacionm` varchar(150) NOT NULL,
  `justificacionf` varchar(150) NOT NULL,
  `Periodo1` varchar(50) NOT NULL,
  `periodo2` varchar(50) NOT NULL,
  `periodo3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `employee_id`, `severity`, `notes`, `case_num`, `medida1`, `medida2`, `medida3`, `medida4`, `medida5`, `porcentaje`, `e_id2`, `calificaciona`, `justificacion`, `estado`, `eva1`, `eva2`, `calificacionm`, `calificacionf`, `justificacionm`, `justificacionf`, `Periodo1`, `periodo2`, `periodo3`) VALUES
(1, '5216', 'Finalizado', 'test', '2021/06/18.308', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '10', '5216', '4', 'ok', '11', '5188', '5236', '3', '', 'nueva actualizacion x3', 'actualizacion final x4', 'June 15, 2021 June 16, 2021 Establecimiento de Obj', 'June 17, 2021 June 24, 2021 Evaluacion Medio Año', 'June 30, 2021 June 30, 2021 Evaluacion Final'),
(79, '5188', 'En Proceso', 'asdasda', '2021/05/08.876', 'asdasd', 'asd', 'asdsa', 'asdasd', 'asdsad', '60', '5188', '3', 'por que si', '1', '5188', '7000', '', '2', 'mando a revision', 'justificacion 1+1 prueba', '', '', ''),
(90, '5188', 'as', 'asdasdasd', '2021/05/08.786', 'asd', 'asd', 'asd', 'asd', 'asd', '30', '5188', '3', 'ok', '0', '6000', '7000', '4', '5', 'ok', 'ok', '', '', ''),
(95, '2020', 'En Proceso', 'nuevo objetivo 1', '2021/05/12.346', 'medida nueva 1', 'medida nueva 2', 'medida nueva 3', 'medida nueva 3', 'medida nueva 5', '10', '2020', '3', 'se envia a evaluacion medio año nivel 2', '4', '5188', '5188', '3', '3', 'se envia al siguiente nivel', '', '', '', ''),
(98, '2020', '', 'ok', '2021/05/27.346', 'nuev', 'ok', 'ok', 'ok', 'ok', '10', '2020', '', '', '0', '5188', '5188', '', '3', '', '', '', '', ''),
(101, '2020', 'En Proceso', 'objetivo con valeria y diana', '2021/05/28.824', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '45', '2020', '2', 'por que si', '2', '5188', '5188', '1', '4', 'prueba', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(102, '2020', 'Revisión', 'por que te vale', '2021/05/28.735', 'te vale', 'te vale', 'te vale', 'te vale', 'te vale', '10', '2020', '1', 'por que me valio lo suficiente', '0', '5188', '5188', '0', '', 'no tuviste impacto a nivel compañía...', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(103, '2020', '', 'asd', '2021/05/28.203', 'asd', 'asd', 'asd', 'asd', 'asd', '10', '2020', '', '', '0', '5188', '5188', '', '', '', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(104, '1010', 'En Proceso', 'tercero', '2021/06/02.745', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '30', '1010', '', '', '11', '2020', '5188', '', '', 'verificacion segunda', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(105, '2020', 'En Proceso', 'otro objetivo', '2021/06/02.302', 'a', 'b', 'c', 'd', 'e', '10', '2020', '', '', '2', '5188', '5188', '', '', 'enviado a autoevaluacion', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(106, '1010', 'En Proceso', 'otro objetivo', '2021/06/02.936', '1', '2', '4', '3', '4', '20', '1010', '3', 'nivel estado 9', '11', '2020', '5188', '2', '', 'si me salio ', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(108, '1010', 'En Proceso', 'nuevo objetivo', '2021/06/02.124', 'asd', 'sad', 'asd', 'asd', 'asd', '20', '1010', '3', 'sin cambios', '11', '2020', '5188', '3', '', 'me llamo hail ', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(109, '1010', 'En Proceso', 'objetivo chido', '2021/06/07.492', 'primera ', 'segunda', 'tercera', 'cuarta', 'quinta', '30', '1010', '3', 'a', '', '2020', '5188', '0', '', 'c', '', 'April 2, 2021 April 21, 2021 Establecimiento de Ob', '', ''),
(110, '5216', 'Finalizado', 'prueba final', '2021/06/18.951', 'uno', 'dos', 'tres', 'cuatro', 'cinco', '10', '5216', '5', 'ok 3', '11', '5188', '5236', '3', '3', 'ok 6', 'ok 7', 'June 15, 2021 June 16, 2021 Establecimiento de Obj', 'June 17, 2021 June 24, 2021 Evaluacion Medio Año', 'June 30, 2021 June 30, 2021 Evaluacion Final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_comp`
--

CREATE TABLE `historico_comp` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `comp1` varchar(200) NOT NULL,
  `p1` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fortalezas` varchar(100) NOT NULL,
  `oportunidades` varchar(100) NOT NULL,
  `conocimientos` varchar(100) NOT NULL,
  `habilidades` varchar(100) NOT NULL,
  `c_evaluador` varchar(100) NOT NULL,
  `c_evaluado` varchar(100) NOT NULL,
  `periodo1` varchar(150) NOT NULL,
  `periodo2` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `case_num` varchar(80) NOT NULL,
  `c_coment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historico_comp`
--

INSERT INTO `historico_comp` (`id`, `employee_id`, `comp1`, `p1`, `estado`, `fortalezas`, `oportunidades`, `conocimientos`, `habilidades`, `c_evaluador`, `c_evaluado`, `periodo1`, `periodo2`, `tipo`, `case_num`, `c_coment`) VALUES
(112, '5216', 'de nuevo', '1', '2', 'esta es una nueva fortaleza', 'esta es una nueva oportunidad', '', '', 'ok', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Orientación a resultados', '2021/06/24.478', 'no es correcto'),
(113, '5216', 'prueba con diferenciador de de estado', '1', '6', 'esta es otra fortaleza', '', '', '', 'muy bien', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Manejo del Cambio', '2021/06/24.423', 'esta si '),
(114, '5216', 'edicion final ', '5', '6', 'bien ', 'bien', 'bien', '', 'bien', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/24.454', 'perfecto'),
(115, '5216', 'prueba con diferenciador de de estado', '1', '6', 'todo bien', 'todo bien', 'todo bien', '', 'todo bien', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/24.58', 'pasa a historial'),
(116, '5216', 'prueba con diferenciador de de estado', '1', '3', '', '', '', '', '', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/24.943', ''),
(117, '5188', 'prueba con diferenciador de de estado', '2', '5', 'bien', 'bien', '', '', 'bien', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Orientación a resultados', '2021/06/24.188', ''),
(118, '5188', 'aqui va mi cambio ', '5', '6', 'vale si ', 'ok', '', '', 'vale si ', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Manejo del Cambio', '2021/06/24.747', 'ok muy bien '),
(119, '5188', 'prueba con diferenciador de de estado', '2', '5', 'ok', '', '', '', 'ok', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/24.46', ''),
(120, '5188', 'prueba con diferenciador de de estado', '2', '5', 'ok', 'ok', '', '', 'ok', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/24.194', ''),
(121, '5188', 'prueba con diferenciador de de estado', '2', '5', 'ok', 'ok', 'ok', '', 'ok', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/24.250', ''),
(122, '5188', 'prueba con diferenciador de de estado', '2', '5', 'okokoko', 'okokoko', 'okokokoko', '', 'ok', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Liderazgo', '2021/06/24.600', ''),
(123, '5188', 'prueba con diferenciador de de estado', '2', '4', '', '', '', '', '', 'prueba con diferenciador de de estado', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Desarrollo de personal y de talento', '2021/06/24.641', ''),
(124, '5216', 'uno', '4', '2', '', '', '', '', 'ok', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Orientación a resultados', '2021/06/30.144', ''),
(125, '5216', 'dos', '3', '2', '', '', '', '', 'ok\r\n', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Manejo del Cambio', '2021/06/30.122', ''),
(126, '5216', 'de nuevo', '4', '2', '', '', '', '', 'ok \r\n', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Actuar con integridad', '2021/06/30.497', ''),
(127, '5216', 'cuatro', '1', '2', '', '', '', '', 'ok', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Influencia', '2021/06/30.881', ''),
(128, '5216', 'cinco', '5', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Trabajo en equipo', '2021/06/30.189', ''),
(129, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Orientación a resultados', '2021/06/30.250', ''),
(130, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Manejo del Cambio', '2021/06/30.794', ''),
(131, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Actuar con integridad', '2021/06/30.668', ''),
(132, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Influencia', '2021/06/30.387', ''),
(133, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Trabajo en equipo', '2021/06/30.348', ''),
(134, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Orientación a resultados', '2021/06/30.521', ''),
(135, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Manejo del Cambio', '2021/06/30.501', ''),
(136, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Actuar con integridad', '2021/06/30.480', ''),
(137, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Influencia', '2021/06/30.708', ''),
(138, '5216', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Trabajo en equipo', '2021/06/30.987', ''),
(139, '5188', 'ok', '4', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Orientación a resultados', '2021/06/30.345', ''),
(140, '5188', 'ok', '3', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Manejo del Cambio', '2021/06/30.108', ''),
(141, '5188', 'ok', '4', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Actuar con integridad', '2021/06/30.850', ''),
(142, '5188', 'ok', '1', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Influencia', '2021/06/30.265', ''),
(143, '5188', 'ok', '3', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Trabajo en equipo', '2021/06/30.452', ''),
(144, '5188', 'ok', '4', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Liderazgo', '2021/06/30.300', ''),
(145, '5188', 'ok', '2', '1', '', '', '', '', '', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Desarrollo de personal y de talento', '2021/06/30.400', ''),
(146, '5216', 'una nueva', '4', '2', '', '', '', '', 'ok correcto', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Orientación a resultados', '2021/06/30.280', ''),
(147, '5216', 'va de nuevo', '4', '2', '', '', '', '', 'ok', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Manejo del cambio', '2021/06/30.683', ''),
(148, '5216', 'una nueva', '2', '2', '', '', '', '', 'ok', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Actuar con integridad', '2021/06/30.461', ''),
(149, '5216', 'una nueva', '3', '2', '', '', '', '', 'una nueva', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Influencia', '2021/06/30.101', ''),
(150, '5216', 'una nueva', '4', '2', '', '', '', '', 'una nueva', '', 'June 9, 2021 June 23, 2021 Evaluacion Medio Año', '', 'Trabajo en equipo', '2021/06/30.803', ''),
(151, '5216', 'competencia final de año', '3', '6', 'fortaleza 1', 'oportunidad 1', '', '', 'todo bien', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Orientación a resultados', '2021/06/30.130', 'comentario final '),
(152, '5216', 'si me lo merezco', '3', '6', 'competencia nivel 2', 'competencia nivel 2', 'competencia nivel 2', '', 'competencia nivel 2', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Manejo del cambio', '2021/06/30.718', 'ok'),
(153, '5216', 'competencia final de año', '3', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/30.558', ''),
(154, '5216', 'competencia final de año', '4', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/30.831', ''),
(155, '5216', 'competencia final de año', '4', '3', '', '', '', '', '', 'comentario de competencias final', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/30.835', ''),
(156, '5188', 'competencia nivel 2', '2', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Orientación a resultados', '2021/06/30.86', ''),
(157, '5188', 'competencia nivel 2', '3', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Manejo del cambio', '2021/06/30.304', ''),
(158, '5188', 'competencia nivel 2', '3', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Actuar con integridad', '2021/06/30.780', ''),
(159, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Influencia', '2021/06/30.281', ''),
(160, '5188', 'competencia nivel 2', '1', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Trabajo en equipo', '2021/06/30.731', ''),
(161, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Liderazgo', '2021/06/30.157', ''),
(162, '5188', 'competencia nivel 2', '4', '4', '', '', '', '', '', 'comentarios competencia nivel 2', '', 'June 30, 2021 June 30, 2021 Evaluacion Final', 'Desarrollo de personal y de talento', '2021/06/30.533', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id` int(100) NOT NULL,
  `fechai` varchar(50) NOT NULL,
  `fechaf` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `activo` int(10) NOT NULL,
  `finalizado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `fechai`, `fechaf`, `type`, `activo`, `finalizado`) VALUES
(33, 'June 30, 2021', 'June 30, 2021', 'Evaluacion Final', 1, '1'),
(34, 'June 9, 2021', 'June 23, 2021', 'Evaluacion Medio Año', 0, ''),
(35, '2021-06-17', '2021-06-24', 'Establecimiento de Objetivos', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `tmp` varchar(90) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `picture`
--

INSERT INTO `picture` (`id`, `tmp`, `name`) VALUES
(2, '5188', 'user5188.jpg'),
(3, '5267', 'user5267.jpg'),
(13, '1010', '1010.jpg'),
(14, '2020', '2020.jpg'),
(15, '5236', '5236.jpg'),
(16, '2200', '2200.jpg'),
(17, '9090', '9090.jpg'),
(25, '0110', '0110.jpg'),
(26, '5216', '5216.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `joined` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `evaluador1` varchar(40) NOT NULL,
  `evaluador2` varchar(40) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `area` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `joined`, `type`, `permission`, `gender`, `phone`, `evaluador1`, `evaluador2`, `employee_id`, `area`, `puesto`) VALUES
(48, 'usuario 1', 'ususario 1', 'usuario1@gmail.com', '1010', '04445361dde28d5c87c5d4d2a7102bd6', ' 11 May 2021 ', 'user', '1', 'M', '7227843500', '2020', '5188', '0', 'sistemas', 'analista'),
(49, 'usuario 2', 'usuario 2', 'usuario2@gmail.com', '2020', '04445361dde28d5c87c5d4d2a7102bd6', ' 11 May 2021 ', 'user', '2', 'F', '7227843647', '5188', '5188', '', 'sistemas', 'ing. en soporte'),
(67, 'Administrador', 'General', 'mesa.ayuda@kener.com.mx', '0110', '8bf685ae7663ef0f781f0315f115fd02', ' 11 Jun 2021 ', 'user', '4', 'M', '7222799314', '', '', '', 'sistemas', 'administrador'),
(68, 'Valeria Anaisa', 'Cruz Encinas', 'valeria.cruz@kener.com.mx', '5216', '808e53023ea4a8a9d6ecbc1290580f72', ' 12 Jun 2021 ', 'user', '1', 'M', '7227158901', '5188', '5236', '', 'RH', 'Analista de DO y Ca'),
(69, 'Diana', 'Zenon Becerril', 'diana.zenon@kener.com.mx', '5236', '78289d91e9c4adcf4e97d6b3d4df6ae0', ' 12 Jun 2021 ', 'user', '3', 'F', '7227834744', '0143', '0143', '', 'RH', 'Analista de DO y Ca'),
(70, 'Hail Alejandro', 'Gonzalez Zepeda', 'hail.gonzalez@kener.com.mx', '5188', '04445361dde28d5c87c5d4d2a7102bd6', ' 12 Jun 2021 ', 'user', '2', 'M', '722 7843512', '5236', '0143', '', 'sistemas', 'ing. en soporte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico_comp`
--
ALTER TABLE `historico_comp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmp` (`tmp`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `historico_comp`
--
ALTER TABLE `historico_comp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
