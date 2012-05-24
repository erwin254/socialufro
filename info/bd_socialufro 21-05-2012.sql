-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2012 a las 18:13:35
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_socialufro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_alumno`
--

CREATE TABLE IF NOT EXISTS `su_alumno` (
  `al_id_alumno` int(10) NOT NULL AUTO_INCREMENT,
  `al_nombre` varchar(255) NOT NULL,
  `al_matricula` varchar(12) NOT NULL,
  `al_contrasena` varchar(20) NOT NULL,
  PRIMARY KEY (`al_id_alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `su_alumno`
--

INSERT INTO `su_alumno` (`al_id_alumno`, `al_nombre`, `al_matricula`, `al_contrasena`) VALUES
(5, 'Diego NicolÃ¡s Casetti Venegas', '17590492111', '12345'),
(6, 'Erwin Alexis Henriquez Ferrada', '16635631807', '123asd'),
(7, 'Luis Gómez Calfumil', '16949956007', 'qwerty'),
(8, 'Jóse locotal', '12123123207', '123qwe'),
(9, 'Monoasd', '12123123k07', '123qwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_archivo`
--

CREATE TABLE IF NOT EXISTS `su_archivo` (
  `ar_id_link` int(10) NOT NULL AUTO_INCREMENT,
  `ar_nombre` varchar(255) NOT NULL,
  `ar_link` varchar(255) NOT NULL COMMENT 'direccion del link donde se almacena o se encuentra el archivo',
  `ar_tipo` varchar(255) NOT NULL,
  `ar_estado` varchar(50) NOT NULL COMMENT 'este es el estado del link, si esta correcto o si es malicioso, en caso de ser malicioso se puede borrar',
  `ar_fecha` datetime NOT NULL,
  `cu_id_ramo` varchar(10) NOT NULL,
  `ar_anio` varchar(10) NOT NULL,
  PRIMARY KEY (`ar_id_link`),
  KEY `FKsu_archivo828987` (`cu_id_ramo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `su_archivo`
--

INSERT INTO `su_archivo` (`ar_id_link`, `ar_nombre`, `ar_link`, `ar_tipo`, `ar_estado`, `ar_fecha`, `cu_id_ramo`, `ar_anio`) VALUES
(1, 'Prueba 1', 'aksdjalsdjlasd', 'prueba', 'disponible', '2012-05-05 19:00:00', 'ICF-053', '2009'),
(2, 'primera prueba', 'asdkjalskdjl', 'prueba', 'disponible', '2012-05-13 14:00:00', 'ICF-053', '2007'),
(3, 'asdasd', 'manual-php.pdf', 'prueba', 'disponible', '2012-05-13 23:25:18', 'ICF-053', '2012'),
(4, 'asdasd', 'manual-php.pdf', 'prueba', 'disponible', '2012-05-13 23:27:46', 'ICF-053', '2012'),
(5, 'prueba 2', 'manual-php.pdf', 'prueba', 'disponible', '2012-05-14 00:44:06', 'ICF-053', '2012'),
(6, '', 'manual-php.pdf', 'prueba', 'disponible', '2012-05-14 00:55:30', 'ICF-053', '2012'),
(7, '', 'manual-php.pdf', 'prueba', 'disponible', '2012-05-14 00:56:17', 'ICF-053', '2012'),
(8, '', 'manual-php.pdf', 'apunte', 'disponible', '2012-05-14 00:56:40', 'ICF-053', '2012'),
(9, 'lkasdkjasd', 'Tutorial de PHP y MySQL completo.pdf', 'prueba', 'disponible', '2012-05-14 17:04:00', 'ICF-053', '2012');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_post`
--

CREATE TABLE IF NOT EXISTS `su_post` (
  `po_id_post` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id de post',
  `po_comentario` varchar(255) NOT NULL COMMENT 'aca van los comentarios de los post',
  `ar_id_link` int(10) NOT NULL,
  PRIMARY KEY (`po_id_post`),
  KEY `FKsu_post632259` (`ar_id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_ramo`
--

CREATE TABLE IF NOT EXISTS `su_ramo` (
  `cu_id_ramo` varchar(10) NOT NULL COMMENT 'id del curso, por ahora es un numero mas adelante puede ser un codigo como el que se maneja en la ufro',
  `cu_nombre` varchar(255) NOT NULL COMMENT 'nombre del curso ejemplo: Base de Datos',
  PRIMARY KEY (`cu_id_ramo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_ramo`
--

INSERT INTO `su_ramo` (`cu_id_ramo`, `cu_nombre`) VALUES
('ICF-053', 'FISICA 1'),
('ICF-164', 'FISICA 2'),
('IIS-113', 'GESTION DE ORGANIZACIONES'),
('IIS-151', 'FUNDAMENTOS DE PROGRAMACION'),
('IIS-200', 'ECONOMIA'),
('IIS-225', 'PROGRAMACION'),
('IIS-250', 'GESTION FINANCIERA'),
('IIS-262', 'ESTRUCTURA DE DATOS'),
('IIS-307', 'GESTION DE RECURSOS HUMANOS'),
('IIS-328', 'BASE DE DATOS 1'),
('IIS-329', 'SISTEMAS OPERATIVOS'),
('IIS-352', 'REDES DE COMPUTADORAS 1'),
('IIS-362', 'SISTEMAS DE INFORMACION'),
('IIS-410', 'INGENIERIA DE SOFTWARE'),
('IIS-454', 'PROYECTO DE DESARROLLO DE SOFTWARE'),
('IIS-455', 'FORMULACION Y EVALUACION DE PROYECTOS'),
('IIS-457', 'METODOLOGIA DE LA INVESTIGACION'),
('IIS-495', 'GESTION DE PROYECTO DE SOFTWARE'),
('IIS-498', 'ASPECTOS LEGALES EN INGENIERIA INFORMATICA'),
('IIS112', 'FUNDAMENTOS HARDWARE Y SOFTWARE'),
('IME-010', 'CALCULO 1'),
('IME-012', 'ALGEBRA'),
('IME-053', 'CALCULO 2'),
('IME-190', 'MATEMATICAS DISCRETAS'),
('IME-305', 'ESTADISTICA APLICADA');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `su_archivo`
--
ALTER TABLE `su_archivo`
  ADD CONSTRAINT `FKsu_archivo828987` FOREIGN KEY (`cu_id_ramo`) REFERENCES `su_ramo` (`cu_id_ramo`);

--
-- Filtros para la tabla `su_post`
--
ALTER TABLE `su_post`
  ADD CONSTRAINT `FKsu_post632259` FOREIGN KEY (`ar_id_link`) REFERENCES `su_archivo` (`ar_id_link`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
