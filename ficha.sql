-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 16:10:47
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medis_x2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `id_pers_medico_ficha` int(11) DEFAULT NULL,
  `dni_paciente_ficha` varchar(10) NOT NULL,
  `nombres_ficha` varchar(50) NOT NULL,
  `paterno_ficha` varchar(30) NOT NULL,
  `materno_ficha` varchar(30) NOT NULL,
  `fecha_nac_ficha` date NOT NULL,
  `peso_ficha` varchar(10) NOT NULL,
  `estatura_ficha` varchar(10) NOT NULL,
  `dolencia_cron_ficha` varchar(100) NOT NULL,
  `alergia_ficha` varchar(100) NOT NULL,
  `obs_ficha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `id_pers_medico_ficha`, `dni_paciente_ficha`, `nombres_ficha`, `paterno_ficha`, `materno_ficha`, `fecha_nac_ficha`, `peso_ficha`, `estatura_ficha`, `dolencia_cron_ficha`, `alergia_ficha`, `obs_ficha`) VALUES
(1, 2, '12345678-9', 'Jacinto Antonio', 'Pacheco', 'Jerez', '1966-08-12', '78kg', '189cms', 'Hipertensión arterial, diabetes, gota', 'penicilina', 'hgfgh fhgfg'),
(2, 2, '21232343-4', 'Katherin Antonia ', 'Oyarce', 'Molinna', '1973-04-21', '56kg', '160cms', '', '', 'Pacientte sana'),
(3, 2, '20789654-4', 'Paula Isabel', 'García', 'Rodríguez', '2001-12-24', '48kg', '158cms', '', 'Alergias atopicas severas', 'Paciente adolescente '),
(4, 2, '9876453-7', 'Claudia Estrella', 'Ramírez', 'Campillo', '1966-10-13', '62kg', '169cms', 'Dolencias renales', 'Mariscos', 'Grupo de sangre RHNegativo'),
(5, 2, '11837242-5', 'Luis Alfonso', 'García', 'Manzo', '1971-06-25', '90kg', '180cms', 'Hipertensión', '', 'Paciente con stress agudo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
