-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2016 a las 08:07:19
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `galeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadro`
--

CREATE TABLE IF NOT EXISTS `cuadro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(80) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `imagen` longblob,
  PRIMARY KEY (`id`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `cuadro`
--

INSERT INTO `cuadro` (`id`, `autor`, `titulo`, `descripcion`, `fechaCreacion`, `imagen`) VALUES
(20, 'mariangeles11_1994@hotmail.com', 'Granada', 'El poder de Graná', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f5f494750303031342d332e6a7067),
(21, 'mariangeles11_1994@hotmail.com', 'La Alhambra', 'Otra perspectiva de la Alhambra', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f5f494750303031372e6a7067),
(22, 'mariangeles11_1994@hotmail.com', 'Manantial', 'Nacimiento de agua a las afueras de Deifontes', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f5f494750303033392e6a7067),
(23, 'mariangeles11_1994@hotmail.com', 'Albaicin', 'Una de las calles del Albaicin', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303031372d322e6a7067),
(24, 'mariangeles11_1994@hotmail.com', 'La ventana', 'Increíbles vistas desde la Alpujarra', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303034352e6a7067),
(25, 'mariangeles11_1994@hotmail.com', 'Toletum', 'Armadura en una de las calles del casco antiguo de Toledo', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303031392e6a7067),
(26, 'alexita870@gmail.com', 'La leña arde', 'La belleza del fuego', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303030322e6a7067),
(27, 'alexita870@gmail.com', 'Atardecer granaíno', 'Granada soleada', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303030332e6a7067),
(28, 'alexita870@gmail.com', 'La Alhambra', 'A los pies de la Alhambra', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303030362d372e6a7067),
(29, 'alexita870@gmail.com', 'Nube', 'Nube mirando el atardecer en las vias ferroviarias en Deifontes', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303034352d352e6a7067),
(30, 'alexita870@gmail.com', 'Leoncito', 'Leoncito de piedra', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303033312e6a7067),
(31, 'alexita870@gmail.com', 'El maizal', 'Atardecer desde la vega de Albolote', '2016-02-10', 0x2e2e2f696d6167656e65734f627261732f494d4750303036302e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `fechaAlta` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `plantilla` varchar(120) NOT NULL,
  `fotoPerfil` longblob,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellidos`, `fechaNacimiento`, `email`, `clave`, `fechaAlta`, `activo`, `administrador`, `plantilla`, `fotoPerfil`) VALUES
('Miguel', 'Fernandez Ortega', '1990-02-06', 'alexita870@gmail.com', 'fcf84a84d0377324679ac9189db1f10daa4a2483', '2016-02-08', 1, 0, '../cuadros/index2.php?email=alexita870@gmail.com', NULL),
('Mariangeles', 'Fernandez Ortega', '1994-02-26', 'mariangeles11_1994@hotmail.com', 'fcf84a84d0377324679ac9189db1f10daa4a2483', '2016-02-08', 1, 0, '../cuadros/index2.php?email=mariangeles11_1994@hotmail.com', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuadro`
--
ALTER TABLE `cuadro`
  ADD CONSTRAINT `cuadro_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
