-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 06:06:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `generadorqr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id` int(100) NOT NULL,
  `nombre_equipo` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `advertencias` longtext NOT NULL,
  `nota_partes` longtext NOT NULL,
  `nota_funcionamiento` longtext NOT NULL,
  `limpieza` longtext NOT NULL,
  `nota_limpieza` longtext NOT NULL,
  `estado` int(10) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `url_guia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guia`
--

INSERT INTO `guia` (`id`, `nombre_equipo`, `descripcion`, `advertencias`, `nota_partes`, `nota_funcionamiento`, `limpieza`, `nota_limpieza`, `estado`, `fecha_creacion`, `url_guia`) VALUES
(1, 'pruebas', 'pruebas', 'pruebas', 'pruebas', 'pruebas', 'pruebas', 'pruebas', 0, '2023-09-10 01:01:05', 'GMREM'),
(2, 'a', '', '', '', '', '', '', 0, NULL, NULL),
(3, 'd', '', '', '', '', '', '', 0, NULL, NULL),
(4, 'v', '', '', '', '', '', '', 0, NULL, NULL),
(5, 'BOMBA DE INFUSIÓN EVO-IQ', 'Este equipo es un sistema diseñado para el proceso de administración de medicamentos al paciente, diseñado para ser usado en una variedad de entornos de atención a pacientes que incluyen adultos, pediátricos y neonatales.', 'El equipo administra hasta 360 J de energía eléctrica, esta energía eléctrica puede provocar lesiones graves o la muerte. Mantenga la distancia con dispositivos metálicos conectados a él durante la desfibrilación.', 'Pantalla.', 'Para realizar la instalación el sistema debe estar prugado adecuadamente.', 'Aplique el desinfectante a usar de manera moderada a la toalla.', 'Para evitar daños en el equipo al momendo de la desinfección tenga en cuenta que:', 0, '2023-09-10 01:07:22', 'GMREM'),
(6, 'VENTILADOR MECÁNICO - SV600', 'El ventilador Mindray SV600 está diseñado para ser utilizado dentro de un centro sanitario, en cuidados intensivos o durante el traslado dentro de la instalación. Este equipo está concebido para proporcionar ayuda en la ventilación y respiración de pacientes adultos, pediátricos o recién nacidos.\r\n', 'Este ventilador solo debe ser usado por el personal médico autorizado. Antes de poner en marcha el sistema el operador debe verificar el buen estado de los accesorios y el equipo.\r\n', 'Antes de inciar la ventilación del paciente verifique que la autocomprobación haya sido aprobada.\r\n', 'Antes de inciar la ventilación del paciente verifique que la autocomprobación haya sido aprobada.\r\n', '', 'Para evitar daños en el equipo al momendo de la desinfección tenga en cuenta que:\r\nNo debe apliquar el desinfectante directamente al equipo o accesorios.\r\nNo debe dejar excesos de desinfectante en el equipo o accesorios.\r\n', 0, '2023-09-12 19:01:58', 'GMREM'),
(7, 'prueba llamada ', 'prueba llamada ', 'prueba llamada ', 'prueba llamada ', 'prueba llamada ', 'prueba llamada ', 'prueba llamada ', 0, '2023-09-12 19:28:57', 'GMREM'),
(8, '', '', '', '', '', '', '', 0, '2023-09-16 01:02:09', 'GMREM'),
(9, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 0, '2023-09-19 18:54:33', 'GMREM'),
(10, 'Daniela Polanco', 'Lorem Ipssmun Daniela Polanco', 'Daniela PolancoDaniela PolancoDaniela PolancoDaniela PolancoDaniela Polanco', 'Daniela PolancoDaniela PolancoDaniela Polanco', 'Daniela PolancoDaniela PolancoDaniela Polanco', 'Daniela PolancoDaniela PolancoDaniela Polanco', 'Daniela PolancoDaniela PolancoDaniela Polancov', 0, '2023-09-19 22:32:56', 'GMREM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_guia`
--

CREATE TABLE `imagen_guia` (
  `idimagen_guia` int(11) NOT NULL,
  `nombre_img` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idguia` int(11) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen_guia`
--

INSERT INTO `imagen_guia` (`idimagen_guia`, `nombre_img`, `descripcion`, `idguia`, `seccion`, `ubicacion`) VALUES
(1, 'Imagen1.jpg', 'asdasdad', 5, 'partes', 'principal'),
(2, 'Imagen2.jpg', 'asdasdadasdasdasd', 5, 'partes', 'partes'),
(3, 'Imagen3.jpg', 'funcion 1', 5, 'funciones', 'funciones'),
(4, 'Imagen4.jpg', 'funcion 2', 5, 'funciones', 'funciones'),
(5, 'Imagen5.jpg', 'funcion 3', 5, 'funciones', 'funciones'),
(6, 'Imagen6.jpg', 'funcion 4', 5, 'funciones', 'funciones'),
(7, '6113.jpg', 'Monitor.\r\nVálvula de inspiración.\r\nVálvula de', 6, 'partes', NULL),
(8, '3524.jfif', 'Área de modo y de talla del paciente.\r\nÁrea d', 6, 'partes', NULL),
(9, '9142.png', 'Área de teclas funcionales.\r\nModo de ventilac', 6, 'funciones', NULL),
(10, '1950.png', 'asdasdasd', 7, 'partes', NULL),
(11, '930.jpg', 'asdadasd', 7, 'partes', NULL),
(12, '3094.png', 'fffffff', 7, 'funciones', NULL),
(13, '8267.', 'Principal', 8, 'principal', NULL),
(14, '6139.png', 'asd', 8, 'principal', NULL),
(15, '4208.png', '', 9, 'principal', NULL),
(16, '3594.jpg', '', 10, 'principal', NULL),
(17, '8616.png', 'alsdkjalsdkjalsdkjaldskjalsdkja descripcion ', 10, 'partes', NULL),
(18, '3817.png', 'asdasdassdasdasdasd', 10, 'partes', NULL),
(19, '7017.png', 'asdasdasdasdasdasd', 10, 'partes', NULL),
(20, '1698.png', 'asdasdasdasdasds', 10, 'funciones', NULL),
(21, '5562.png', 'asdasdasdasdasdasaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 10, 'funciones', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_guia`
--
ALTER TABLE `imagen_guia`
  ADD PRIMARY KEY (`idimagen_guia`),
  ADD KEY `fk_guia_has_image` (`idguia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `imagen_guia`
--
ALTER TABLE `imagen_guia`
  MODIFY `idimagen_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_guia`
--
ALTER TABLE `imagen_guia`
  ADD CONSTRAINT `fk_guia_has_image` FOREIGN KEY (`idguia`) REFERENCES `guia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
