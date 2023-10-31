-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2023 a las 03:05:51
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activacionmuscular`
--

CREATE TABLE `activacionmuscular` (
  `id` int(11) NOT NULL,
  `brazo` text DEFAULT NULL,
  `pecho` text DEFAULT NULL,
  `abdominal` text DEFAULT NULL,
  `pierna` text DEFAULT NULL,
  `act_cinco` text DEFAULT NULL,
  `act_seis` text DEFAULT NULL,
  `act_siete` text DEFAULT NULL,
  `act_ocho` text DEFAULT NULL,
  `act_nueve` text DEFAULT NULL,
  `act_diez` text DEFAULT NULL,
  `act_once` text DEFAULT NULL,
  `act_doce` text DEFAULT NULL,
  `act_trece` text DEFAULT NULL,
  `act_catorce` text DEFAULT NULL,
  `act_quince` text DEFAULT NULL,
  `act_dieciseis` text DEFAULT NULL,
  `core_uno` text DEFAULT NULL,
  `core_dos` text DEFAULT NULL,
  `core_tres` text DEFAULT NULL,
  `core_cuatro` text DEFAULT NULL,
  `core_cinco` text DEFAULT NULL,
  `core_seis` text DEFAULT NULL,
  `core_siete` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activacionmuscular`
--

INSERT INTO `activacionmuscular` (`id`, `brazo`, `pecho`, `abdominal`, `pierna`, `act_cinco`, `act_seis`, `act_siete`, `act_ocho`, `act_nueve`, `act_diez`, `act_once`, `act_doce`, `act_trece`, `act_catorce`, `act_quince`, `act_dieciseis`, `core_uno`, `core_dos`, `core_tres`, `core_cuatro`, `core_cinco`, `core_seis`, `core_siete`) VALUES
(1, 'Activacion #1', 'Activacion #2', 'Activacion #3', 'Activacion #4', 'Activacion #5', 'Activacion #6', 'Activacion #7', 'Activacion #8', 'Activacion #9', 'Activacion #10', 'Activacion #11', 'Activacion #12', 'Activacion #13', 'Activacion #14', 'Activacion #15', 'Activacion #16', 'Core #1.0', 'Core #2', 'Core #3.3', 'Core #4', 'Core #5', 'Core #6', 'Core #7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `disciplina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `disciplina`) VALUES
(1, 'Pedro', 'García', '1970-01-01', 87654321, 'Body_Combat'),
(2, 'Juan', 'Aguirre', '1985-07-25', 30987321, 'Musculacion'),
(3, 'leandro', 'manna', NULL, 191203, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `disciplina` varchar(50) DEFAULT NULL,
  `disciplina_dos` varchar(50) DEFAULT NULL,
  `clases` int(5) DEFAULT NULL,
  `grupo_familiar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `detalle`, `celular`, `disciplina`, `disciplina_dos`, `clases`, `grupo_familiar`) VALUES
(1, 'Zaida', 'Abraham', '0000-00-00', 0, '', 3884889698, 'Body_Pump', ' ', 17, 'manna'),
(2, 'Leandro', 'Manna', '1987-07-25', 32877065, '', 3884695353, 'Musculacion', 'Body_Pump', 0, 'manna'),
(3, 'Paula', 'Agüero ', '0000-00-00', 0, '', 3884086363, 'Ritmos_Flow', 'Mini_Voley', 10, ''),
(4, 'Pepe', 'Perez', '2000-07-25', 32877090, '', 0, 'URKU', '', 25, ''),
(5, 'Franco', 'Manna', '1990-12-30', 32988012, '', 0, 'Funcional', '', 12, 'manna'),
(9, 'JULIETA', 'ALBARRACIN', '0000-00-00', 0, '', 3884161619, 'Body_Pump', '', 0, ''),
(10, 'Abril', 'Allende', '0000-00-00', 0, '', 3884170862, 'Musculacion', NULL, 3, NULL),
(11, 'LORENA', 'ALTAMIRANO', '0000-00-00', 0, '', 3815063862, 'Body_Pump', '', 5, ''),
(12, 'ALEJANDRO', 'ALVAREZ', '0000-00-00', 0, '', 3884878506, 'Funcional', '', 11, ''),
(18, 'CARLOS', 'ARAMAYO', '0000-00-00', 0, '', 3885040207, 'URKU', '', 8, ''),
(21, 'SERGIO', 'ARAMAYO', '0000-00-00', 0, '', 3884448263, 'Funcional', '', 12, ''),
(23, 'ANDREA', 'ARIAS', '0000-00-00', 0, '', 3884167042, 'Musculacion', '', 0, ''),
(24, 'CECILIA', 'ARIAS', '1982-04-16', 0, '', 3884455051, 'Body_Pump', '', 0, ''),
(30, 'AGUSTINA', 'BAILON', '0000-00-00', 0, '', 3885705646, 'Musculacion', '', 0, ''),
(33, 'Patricia', 'Barra', '2023-04-07', 0, '', 3884100994, 'Musculacion', NULL, NULL, NULL),
(38, 'EMILIA', 'BENITEZ', '2005-12-11', 0, '', 3886827244, 'Body_Pump', '', 0, ''),
(53, 'LAURA', 'CABANA', '0000-00-00', 0, '', 3884384882, 'Body_Pump', '', 0, ''),
(58, 'Analia', 'Capponi', '0000-00-00', 0, '', 3885850673, 'body_Combat', NULL, NULL, NULL),
(61, 'Mercedes', 'Carreras', '0000-00-00', 0, '', 3885871523, 'Body_Pump', NULL, NULL, NULL),
(64, 'VALENTINA', 'CASALI', '0000-00-00', 0, '', 3884044203, 'Body_Pump', '', 0, ''),
(76, 'ANA', 'CIVETTA', '0000-00-00', 0, '', 3885807996, 'Body_Pump', '', 13, ''),
(77, 'Noelia', 'Cognetta', NULL, 0, '', 3884147050, 'Body_Pump', NULL, NULL, NULL),
(78, 'Silvia', 'Colla', '0000-00-00', 0, '', 3884081806, 'Body_Pump', NULL, NULL, NULL),
(85, 'MARIELA', 'CORTEZ', '1981-05-14', 28784543, '', 3884075264, 'Musculacion', '', 0, ''),
(89, 'Fabiola', 'Cruz', '0000-00-00', 0, '', 3884330006, 'Musculacion', '', 8, ''),
(90, 'Claudia', 'Dagun', '0000-00-00', 0, '', 3884868223, 'Body_Pump', NULL, NULL, NULL),
(92, 'CARMEN', 'DE MENDOZA', '0000-00-00', 0, '', 3884212935, 'Musculacion', '', 13, ''),
(99, 'Gabriela', 'Escudero', '0000-00-00', 0, '', 3884295764, 'Body_Pump', NULL, NULL, NULL),
(101, 'Florencia', 'Etchart', '1985-04-30', 0, '', 3884817691, 'body_Combat', NULL, NULL, NULL),
(111, 'Silvia', 'Ficoseco', '0000-00-00', 0, '', 3886827244, 'Body_Pump', NULL, NULL, NULL),
(113, 'Gabriela', 'Figueroa', '0000-00-00', 0, '', 3885041149, 'Funcional', NULL, 10, NULL),
(116, 'AYELEN', 'FRANCOS', '0000-00-00', 0, '', 2213532548, 'Body_Pump', '', 0, ''),
(126, 'NATALIA', 'GERACE', '0000-00-00', 0, '', 3885703474, 'Musculacion', '', 0, ''),
(130, 'Natalia', 'Gonzalez', '0000-00-00', 0, '', 3885194236, 'Funcional', NULL, NULL, NULL),
(133, 'MARIA', 'GUIBARGUIS', '0000-00-00', 0, '', 3884349818, 'Musculacion', '', 0, ''),
(136, 'Adriana', 'Hernandez', '2023-04-06', 0, '', 3884738139, 'Musculacion', NULL, NULL, NULL),
(144, 'GABRIEL', 'INSAUSTI', '0000-00-00', 0, '', 3884332634, 'Musculacion', '', 0, ''),
(145, 'NATALIA', 'JARMA', '0000-00-00', 0, '', 3885044900, 'Body_Pump', '', 0, ''),
(148, 'Graciela', 'Jorge', '0000-00-00', 0, '', 3884851767, 'body_Combat', NULL, NULL, NULL),
(155, 'MARIA', 'LANFRANCO', '0000-00-00', 0, '', 3886822954, 'Body_Pump', '', 0, ''),
(157, 'Susana', 'Lemir', '0000-00-00', 0, '', 3885769721, 'Body_Pump', NULL, NULL, NULL),
(158, 'Silvia', 'Lobos', '0000-00-00', 0, '', 3884078669, 'Musculacion', NULL, NULL, NULL),
(159, 'MARIA', 'LONDERO', '0000-00-00', 0, '', 3885217070, 'Ritmos_Flow', '', 0, ''),
(163, 'Paula', 'Lopez', '0000-00-00', 0, '', 3884208975, 'Body_Pump', NULL, 10, NULL),
(164, 'SILVINA', 'LOPEZ', '0000-00-00', 0, '', 3886869608, 'body_Combat', '', 0, ''),
(165, 'Veronica', 'Lorenzone', '0000-00-00', 0, '', 3884049227, 'Funcional', NULL, NULL, NULL),
(172, 'DANIELA', 'MANZUR', '0000-00-00', 0, '', 3884092982, 'Musculacion', '', 0, ''),
(181, 'EDUARDO', 'MASSERE', '0000-00-00', 0, '', 3884331318, 'Body_Pump', '', 0, ''),
(182, 'GABRIELA', 'MATEOS', '0000-00-00', 0, '', 3885177705, 'Musculacion', '', 0, ''),
(191, 'LORENA', 'MOLINA', '0000-00-00', 0, '', 3512182002, 'Especifico', '', 5, ''),
(192, 'Ernestina', 'Monaldi', '0000-00-00', 0, '', 0, 'Musculacion', NULL, NULL, NULL),
(197, 'ALEJANDRA', 'MONTENOVI', '0000-00-00', 0, '', 3885000900, 'body_Combat', '', 0, ''),
(198, 'CARLOS', 'MONTENOVI', '0000-00-00', 0, '', 3885764947, 'body_Combat', '', 8, ''),
(199, 'MARIA', 'MONTERO', '0000-00-00', 0, '', 3884070632, 'Musculacion', '', 0, ''),
(200, 'Adolfo', 'Morales', '0000-00-00', 0, '', 3886823862, 'Musculacion', NULL, NULL, NULL),
(205, 'ANA', 'OCHOA', '0000-00-00', 0, '', 3885229464, 'Musculacion', '', 13, ''),
(211, 'Marcela', 'Ordoñez', '0000-00-00', 0, '', 3885013471, 'Musculacion', NULL, NULL, NULL),
(212, 'Claudia', 'Orillo', '0000-00-00', 0, '', 3884657019, 'Body_Pump', NULL, NULL, NULL),
(213, 'Cristina', 'Oviedo', '0000-00-00', 0, '', 3885011200, 'Funcional', NULL, NULL, NULL),
(216, 'Julio', 'Pardo de Figueroa', '0000-00-00', 0, '', 3884290488, 'Funcional', NULL, NULL, NULL),
(217, 'ARIEL', 'PAREDES', '0000-00-00', 0, '', 3885090764, 'Funcional', '', 0, ''),
(218, 'LUCIA', 'PAREDES', '0000-00-00', 0, '', 3885027395, 'Funcional', '', 0, ''),
(225, 'MARIEL', 'PENEDO', '0000-00-00', 0, '', 3886821791, 'Body_Pump', '', 0, ''),
(227, 'ALEJANDRO', 'PEREIRA', '0000-00-00', 0, '', 3884384882, 'Musculacion', '', 11, ''),
(242, 'JIMENA', 'ROCO', '0000-00-00', 0, '', 3816252376, 'Musculacion', '', 0, ''),
(245, 'EULALIA', 'RODRIGUEZ LAUANDOS', '0000-00-00', 0, '', 3884140277, 'Body_Pump', '', 0, ''),
(256, 'NILDA', 'SAEZ', '0000-00-00', 0, '', 3884722862, 'Body_Pump', '', 0, ''),
(258, 'JUAN', 'SALGADO', '0000-00-00', 0, '', 92213609320, 'Musculacion', '', 0, ''),
(259, 'Julia', 'Salomon', '0000-00-00', 0, '', 3885190826, 'Musculacion', NULL, NULL, NULL),
(260, 'Celeste', 'Sanhez', '0000-00-00', 0, '', 3884556285, 'Body_Pump', NULL, NULL, NULL),
(269, 'TRINIDAD', 'SIARES', '0000-00-00', 0, '', 3885070546, 'Body_Pump', '', 0, ''),
(275, 'Valeria', 'Soria', '0000-00-00', 0, '', 3884703152, 'Body_Pump', NULL, NULL, NULL),
(279, 'Paula', 'Storni', '0000-00-00', 0, '', 3885074118, 'Musculacion', NULL, 10, NULL),
(306, 'Silvia', 'Verzini', '0000-00-00', 0, '', 3885042535, 'Musculacion', NULL, NULL, NULL),
(311, 'SIMON', 'VILLAROEL', '0000-00-00', 0, '', 3885842422, 'Musculacion', '', 0, ''),
(314, 'ANDREA', 'VOTTERO', '0000-00-00', 0, '', 3884176006, 'Funcional', '', 0, ''),
(315, 'Karina', 'Zapatiel', '0000-00-00', 0, '', 3513417835, 'Funcional', NULL, NULL, NULL),
(335, 'Sonia', 'Gutierrez', '0000-00-00', 0, '', 3884171822, 'URKU', NULL, NULL, NULL),
(338, 'Lucia', 'Izquierdo', '0000-00-00', 0, '', 3884047468, 'Musculacion', NULL, NULL, NULL),
(347, 'Sebastian', 'Cabana', '0000-00-00', 0, '', 3885813601, 'Musculacion', NULL, NULL, NULL),
(351, 'RUBEN', 'RAMOS', '0000-00-00', 0, '', 3884371175, 'Musculacion', '', 0, ''),
(360, 'Federico', 'Cabana', '0000-00-00', 0, '', 3884309917, 'Musculacion', NULL, NULL, NULL),
(364, 'Martina', 'Hansen', '2008-06-09', 0, '', 3884340391, 'Musculacion', NULL, NULL, NULL),
(370, 'MARTIN', 'BUSTAMANTE', '0000-00-00', 0, '', 3885097415, 'Musculacion', '', 0, ''),
(373, 'Agustin', 'Gomez', '2000-12-04', 0, '', 3884454976, 'Musculacion', NULL, NULL, NULL),
(375, 'SOLEDAD', 'CEBALLOS', '0000-00-00', 0, '', 3884736228, 'URKU', '', 0, ''),
(376, 'SANTIAGO', 'BUSTAMANTE', '0000-00-00', 0, '', 388, 'Musculacion', '', 0, ''),
(390, 'Emiliano', 'Belotti', '2008-07-15', 0, '', 3884385029, 'Especifico', NULL, NULL, NULL),
(399, 'IVAN', 'GALARZA', '0000-00-00', 0, '', 3884433686, 'Musculacion', '', 0, ''),
(403, 'Alejandro', 'Talavera', '0000-00-00', 0, '', 3885130296, 'Musculacion', NULL, 11, NULL),
(404, 'VALENTINA', 'MANERO', '0000-00-00', 0, '', 3885968107, 'Musculacion', '', 0, ''),
(405, 'MICAELA', 'CABANA', '0000-00-00', 0, '', 3885057098, 'Musculacion', '', 0, ''),
(418, 'MARIA', 'TELL', '0000-00-00', 0, '', 3885214991, 'Body_Pump', '', 0, ''),
(429, 'Jorgelina', 'Duhart', '0000-00-00', 0, '', 3884092412, 'Funcional', NULL, NULL, NULL),
(473, 'Lucas', 'Rendon ', '0000-00-00', 0, '', 3884490581, 'Musculacion', NULL, NULL, NULL),
(483, 'FLORENCIA', 'ORTIZ', '0000-00-00', 0, '', 3884393729, 'Body_Pump', '', 0, ''),
(507, 'FERNANDA', 'BARRERA JORGE', '0000-00-00', 0, '', 3884728935, 'URKU', '', 0, ''),
(508, 'MARIANA', 'MARTINEZ', '1973-10-23', 0, '', 3886857553, 'URKU', '', 0, ''),
(513, 'GABRIEL', 'GONZALEZ', '0000-00-00', 0, '', 3884350209, 'Musculacion', '', 0, ''),
(516, 'LUCERO', 'MENDIVIL', '0000-00-00', 0, '', 3885835306, 'Body_Pump', '', 0, ''),
(519, 'Nicolas', 'Daher', '0000-00-00', 0, '', 3884864121, 'Musculacion', NULL, NULL, NULL),
(522, 'LUCIO', 'TORRENTE', '0000-00-00', 0, '', 3884070632, 'Musculacion', '', 0, ''),
(523, 'JUAN', 'BELOTTI', '1972-06-24', 0, '', 3885841124, 'Musculacion', '', 0, ''),
(524, 'Claudia', 'Hoyos', '1971-10-19', 0, '', 3885841124, 'Musculacion', NULL, NULL, NULL),
(527, 'ROSARIO', 'ZARIF', '2008-09-19', 0, '', 3884386325, 'Musculacion', '', 0, ''),
(534, 'VALENTIN', 'DAVILA', '2006-12-13', 0, '', 3884858044, 'Musculacion', '', 0, ''),
(535, 'CECILIA', 'MURIEL', '0000-00-00', 0, '', 3884072380, 'Musculacion', '', 0, ''),
(536, 'PAULA', 'MURIEL', '0000-00-00', 0, '', 3885840531, 'Musculacion', '', 10, ''),
(551, 'CECILIA', 'ABDALA', '1984-12-11', 0, '', 3885807064, 'Musculacion', '', 0, ''),
(552, 'Letizia', 'Talavera', '0000-00-00', 0, '', 3885173132, 'Funcional', NULL, NULL, NULL),
(554, 'Maria', 'Castilla', '0000-00-00', 0, '', 3885826325, 'Funcional', NULL, NULL, NULL),
(556, 'Bruno', 'Hernandez', '1997-10-17', 0, '', 3885841590, 'URKU', NULL, NULL, NULL),
(560, 'Amalia', 'Carrizo', '0000-00-00', 0, '', 3885017160, 'Body_Pump', NULL, NULL, NULL),
(563, 'SERGIO', 'COCA RIOS', '1993-03-22', 0, '', 3884562790, 'Funcional', '', 0, ''),
(573, 'Valeria', 'Garcia Gnecco', '0000-00-00', 0, '', 3885148596, 'Especifico', NULL, NULL, NULL),
(576, 'JOSE', 'GARCIA', '0000-00-00', 0, '', 3884320261, 'Musculacion', '', 0, ''),
(580, 'VICTORIA', 'AGOSTINI', '0000-00-00', 0, '', 3885313243, 'Musculacion', '', 0, ''),
(583, 'Tomas', 'Cardozo Zerdan', '2008-07-31', 0, '', 3885033034, 'Musculacion', NULL, NULL, NULL),
(584, 'MAXIMILIANO', 'ARABE DIP', '0000-00-00', 0, '', 3884710713, 'Musculacion', '', 0, ''),
(585, 'MARIA', 'ROCCA', '0000-00-00', 0, '', 3885737478, 'Musculacion', '', 0, ''),
(588, 'SERGIO', 'HIGA', '0000-00-00', 0, '', 3884709747, 'Musculacion', '', 0, ''),
(605, 'Rolando', 'Rodriguez', '0000-00-00', 0, '', 3512182002, 'Musculacion', NULL, NULL, NULL),
(607, 'MARIANO', 'PERALTA TESTARELLI', '0000-00-00', 0, '', 3884138952, 'Musculacion', '', 0, ''),
(618, 'Maria', 'Navarro', '1993-06-08', 0, '', 3888560127, 'Musculacion', NULL, NULL, NULL),
(625, 'MONICA', 'VIDAL', '0000-00-00', 0, '', 3884886631, 'Musculacion', '', 0, ''),
(631, 'EUGENIA', 'JURE', '0000-00-00', 0, '', 3884335721, 'body_Combat', '', 0, ''),
(634, 'Ediardo', 'Roca', '2007-12-05', 0, '', 3884449086, 'Musculacion', NULL, NULL, NULL),
(642, 'DANIELA', 'VEDIA', '0000-00-00', 0, '', 3885071746, 'Musculacion', '', 0, ''),
(645, 'TATIANA', 'CORONEL', '0000-00-00', 0, '', 3886852882, 'Musculacion', '', 0, ''),
(655, 'LAUTARO', 'FERNANDEZ JUAREZ', '0000-00-00', 0, '', 3886031059, 'Musculacion', '', 0, ''),
(691, 'SERENA', 'STORNI', '0000-00-00', 0, '', 3885097415, 'Musculacion', '', 0, ''),
(692, 'Anita', 'Molina', '0000-00-00', 0, '', 3885067857, 'Especifico', NULL, NULL, NULL),
(694, 'Maria', 'Argañaraz', '1956-07-29', 0, '', 3884161619, 'Musculacion', NULL, NULL, NULL),
(704, 'DANIELA', 'MASSERE', '0000-00-00', 0, '', 3884375697, 'Body_Pump', '', 0, ''),
(723, 'Antonio', 'Gorena', '0000-00-00', 0, '', 3884072781, 'URKU', NULL, NULL, NULL),
(733, 'Maria', 'Lamas', '0000-00-00', 0, '', 3884762490, 'Musculacion', NULL, NULL, NULL),
(743, 'AGUSTINA', 'GOMEZ', '1993-11-06', 0, '', 3884302263, 'Musculacion', '', 0, ''),
(757, 'Octavio', 'Cuestas Ackerman', '2018-02-28', 0, '', 3884444914, 'Futbol_Infantil', NULL, NULL, NULL),
(764, 'SILVANA', 'PALLERES', '0000-00-00', 0, '', 3884356625, 'EVERLAST BOXING', '', 0, ''),
(773, 'Blas', 'Nieto Yufra', '0000-00-00', 0, '', 3884778256, 'Musculacion', NULL, NULL, NULL),
(774, 'Marina', 'Suzzivalli', '1987-08-23', 0, '', 3884329145, 'Musculacion', NULL, NULL, NULL),
(784, 'MARCELA', 'DE LOS RIOS', '1982-03-22', 0, '', 3885796160, 'Musculacion', '', 0, ''),
(792, 'Raquel', 'Quintar', '0000-00-00', 0, '', 3884968324, 'Musculacion', NULL, NULL, NULL),
(819, 'ELENA', 'PUENTEDURA', '2017-03-08', 0, '', 3883298825, 'Taekwondo', '', 0, ''),
(824, 'PABLO', 'MERCADO', '1961-11-21', 0, '', 3885814788, 'Musculacion', '', 0, ''),
(829, 'JUAN', 'GARCIA', '0000-00-00', 0, '', 3884043054, 'Musculacion', '', 0, ''),
(839, 'MARCOS', 'IVANOVICH', '1967-10-01', 0, '', 3884149905, 'URKU', '', 0, ''),
(840, 'ADRIANA', 'HUMACATA', '1998-04-03', 0, '', 3884616890, 'Musculacion', '', 0, ''),
(842, 'JULIETA', 'CARDOZO', '1990-02-19', 0, '', 3885070080, 'Musculacion', '', 0, ''),
(843, 'FERNANDA', 'CARDOZO', '1992-06-18', 0, '', 3885070071, 'Musculacion', '', 0, ''),
(845, 'GISELA', 'SANDOVAL SOLIS', '1979-02-26', 0, '', 3885822969, 'body_Combat', '', 0, ''),
(849, 'Guillermo', 'Bernardo', '0000-00-00', 0, '', 3884083292, 'Musculacion', NULL, NULL, NULL),
(851, 'RICARDO', 'FERREYRA', '0000-00-00', 0, '', 3885703579, 'Musculacion', '', 0, ''),
(862, 'Agustin', 'Barrios Moran', '0000-00-00', 0, '', 3886037982, 'Musculacion', NULL, NULL, NULL),
(869, 'Maria', 'Virulon', '1990-09-20', 0, '', 3815391763, 'Musculacion', NULL, NULL, NULL),
(870, 'Rodrigo', 'Perez', '1988-06-05', 0, '', 3884176745, 'Musculacion', NULL, NULL, NULL),
(888, 'Santiago', 'Gonzales', '1990-10-01', 0, '', 3883314002, 'URKU', NULL, NULL, NULL),
(891, 'JOSE', 'BELLOMO', '1978-12-19', 0, '', 3886868872, 'Musculacion', '', 0, ''),
(895, 'RICARDO', 'CORTES', '1973-03-14', 0, '', 3884717534, 'Musculacion', '', 0, ''),
(897, 'CARLOS', 'HERNAEZ', '1970-08-30', 0, '', 3884449084, 'Musculacion', '', 8, ''),
(918, 'ELISA', 'MARCET', '1975-10-14', 0, '', 3886863230, 'Musculacion', '', 0, ''),
(921, 'GUSTAVO', 'RONDON', '1974-03-24', 0, '', 3885059881, 'Musculacion', '', 0, ''),
(927, 'SOFIA', 'MARTINICH', '2009-02-24', 0, '', 3886863230, 'Musculacion', '', 0, ''),
(928, 'CELESTE', 'BELTRAN', '1990-09-16', 0, '', 3885050166, 'Musculacion', '', 0, ''),
(932, 'JOSEFINA', 'MARTINICH', '2005-08-10', 0, '', 3884428500, 'Musculacion', '', 0, ''),
(941, 'Pablo', 'Bianchini', '1977-03-11', 0, '', 3885228181, 'Funcional', NULL, NULL, NULL),
(945, 'Natalia', 'Ortiz', '1976-08-08', 0, '', 1157319012, 'Funcional', NULL, NULL, NULL),
(953, 'DANIELA', 'PANTOJA', '1980-03-24', 0, '', 3885838589, 'Musculacion', '', 0, ''),
(955, 'Karina', 'Testarelli', '0000-00-00', 0, '', 3884214605, 'Musculacion', NULL, NULL, NULL),
(958, 'JAZMIN', 'MAESTRO', '0000-00-00', 0, '', 3874417656, 'Body_Pump', '', 0, ''),
(964, 'Natalia', 'Soto Lescano', '1976-09-21', 0, '', 3886820818, 'Musculacion', NULL, 12, NULL),
(968, 'MICAELA', 'NAVARRO', '1998-09-15', 0, '', 3883389258, 'Musculacion', '', 0, ''),
(976, 'Alejandro', 'Loiacono', '1976-11-20', 0, '', 3884393479, 'Musculacion', NULL, 11, NULL),
(980, 'Paola', 'Monaco', '0000-00-00', 0, '', 3884108178, 'Musculacion', NULL, NULL, NULL),
(981, 'CLAUDIA', 'CABEZAS', '1983-04-03', 0, '', 3885830049, 'Musculacion', '', 0, ''),
(989, 'MARCO', 'FARFAN SUAREZ', '1985-10-14', 0, '', 3884389643, 'Musculacion', '', 0, ''),
(996, 'Laura', 'Peirone', '1976-11-06', 0, '', 3885730258, 'Musculacion', NULL, NULL, NULL),
(998, 'Joaquin', 'Villanueva', '2007-06-28', 0, '', 3884766330, 'Musculacion', NULL, NULL, NULL),
(1005, 'Paulina', 'Villanueva', '2009-06-12', 0, '', 3884669523, 'Musculacion', NULL, NULL, NULL),
(1008, 'CARLOS', 'BARANOVSKY', '1986-06-30', 0, '', 3885716779, 'Especifico', '', 8, ''),
(1009, 'ANDREA', 'MORENO FRANCK', '1969-07-06', 0, '', 3886857528, 'URKU', '', 0, ''),
(1010, 'ERNESTO', 'GIANNATTASIO', '1968-05-28', 0, '', 3884612409, 'URKU', '', 0, ''),
(1013, 'Federico', 'Sierra Guzman', '1995-02-23', 0, '', 3885265794, 'Musculacion', NULL, NULL, NULL),
(1017, 'MARIA', 'REYNOSO', '2009-06-18', 0, '', 3886137484, 'Musculacion', '', 0, ''),
(1020, 'ANA', 'REYNAUD', '1969-06-30', 0, '', 3885858934, 'Funcional', '', 13, ''),
(1023, 'Daniel', 'Gutierrez', '1992-05-07', 0, '', 3884787166, 'Musculacion', NULL, NULL, NULL),
(1027, 'Tiago', 'Bosio Barberis ', '2008-07-25', 0, '', 3884073733, 'Musculacion', NULL, NULL, NULL),
(1031, 'Mario', 'Gira', '2005-10-28', 0, '', 3884767538, 'Musculacion', NULL, NULL, NULL),
(1032, 'VALERIA', 'RODRIGUEZ', '1980-04-12', 0, '', 3884122236, 'body_Combat', '', 0, ''),
(1033, 'AGUSTINA', 'SETTI', '2009-02-18', 0, '', 3884395801, 'Musculacion', '', 0, ''),
(1035, 'CECILIA', 'LARA', '1985-09-06', 0, '', 3884037686, 'URKU', '', 0, ''),
(1052, 'Maria', 'Izquierdo', '2009-10-08', 0, '', 3884107911, 'Musculacion', NULL, NULL, NULL),
(1058, 'RENATA', 'AUIL', '2009-06-08', 0, '', 3855162438, 'Funcional', '', 0, ''),
(1060, 'Gaston', 'Artunduaga', '2003-05-15', 0, '', 3885737498, 'Musculacion', NULL, NULL, NULL),
(1062, 'ANELISE', 'MORENO SAN MILLAN', '1971-01-05', 0, '', 3884343538, 'Musculacion', '', 0, ''),
(1065, 'VANESA', 'MASSACCESI', '1975-07-18', 0, '', 3885820673, 'Musculacion', '', 0, ''),
(1083, 'Gabriel', 'Perez', '1983-02-09', 0, '', 3886858212, 'Musculacion', NULL, NULL, NULL),
(1084, 'Bianca', 'Fabiani', '2007-02-25', 0, '', 3885828557, 'Musculacion', NULL, NULL, NULL),
(1085, 'Noelia', 'Toranzo', '0000-00-00', 0, '', 3884096232, 'Funcional', NULL, NULL, NULL),
(1089, 'Lucia', 'Maidana', '0000-00-00', 0, '', 3885030535, 'Musculacion', NULL, NULL, NULL),
(1100, 'Baltazar', 'Bonilla', '2007-12-19', 0, '', 3884556888, 'Musculacion', NULL, NULL, NULL),
(1106, 'Marcelo', 'Ruiz', '1986-10-04', 0, '', 3884710405, 'Musculacion', NULL, NULL, NULL),
(1109, 'HUMBERTO', 'PASQUINI', '1966-10-11', 0, '', 3884142182, 'Musculacion', '', 0, ''),
(1118, 'CLAUDIO', 'GARZON', '0000-00-00', 0, '', 3884972602, 'Musculacion', '', 0, ''),
(1119, 'Mercedes', 'Miranda', '1981-04-18', 0, '', 3884323113, 'Musculacion', NULL, NULL, NULL),
(1124, 'Roque', 'Pereyra', '1965-08-16', 0, '', 3886855147, 'Musculacion', NULL, NULL, NULL),
(1128, 'MARIA', 'OCARANZA', '1992-05-18', 0, '', 3815512788, 'Musculacion', '', 0, ''),
(1131, 'MARIA', 'VILLAFAÑE', '2003-03-10', 0, '', 3884042112, 'Musculacion', '', 0, ''),
(1134, 'Federico', 'Orloff', '1977-03-19', 0, '', 3885174361, 'Musculacion', NULL, NULL, NULL),
(1139, 'JOAQUIN', 'CALLEJO', '2007-08-12', 0, '', 3884084944, 'Musculacion', '', 0, ''),
(1145, 'Leonardo', 'Villanueva', '1977-01-21', 0, '', 3884374334, 'Musculacion', NULL, NULL, NULL),
(1153, 'Pablo', 'Lucero', '2009-09-10', 0, '', 3884874727, 'Funcional', NULL, NULL, NULL),
(1163, 'MAURICIO', 'AGUIRRE', '1988-11-08', 0, '', 3885759216, 'Musculacion', '', 0, ''),
(1164, 'Martin', 'Baspineiro', '1979-12-09', 0, '', 3885006135, 'Musculacion', NULL, NULL, NULL),
(1170, 'SANTIAGO', 'GIORDANA SABBAG', '2008-12-20', 0, '', 3885013261, 'Musculacion', '', 0, ''),
(1176, 'MERCEDES', 'PALACIOS', '0000-00-00', 0, '', 3884297472, 'body_Combat', '', 0, ''),
(1182, 'NESTOR', 'CRUZ', '2003-02-17', 0, '', 3885798252, 'Musculacion', '', 0, ''),
(1198, 'Nicolas', 'Lopez', '1984-03-22', 0, '', 3885731930, 'Musculacion', NULL, NULL, NULL),
(1200, 'Mercedes', 'Solis', '1982-11-11', 0, '', 3884197096, 'Musculacion', NULL, NULL, NULL),
(1212, 'Geronimo', 'Gerbino', '2009-10-02', 0, '', 3884883395, 'Musculacion', NULL, NULL, NULL),
(1216, 'ANGEL', 'MENDOZA', '1988-03-05', 0, '', 3884071694, 'Musculacion', '', 0, ''),
(1221, 'Gisella', 'Gonzalez', '1995-12-13', 0, '', 3884047919, 'Musculacion', NULL, NULL, NULL),
(1224, 'Belen', 'Bueno', '1988-04-14', 0, '', 3885829563, 'Body_Pump', NULL, NULL, NULL),
(1225, 'MARIA', 'CABEZAS', '1986-03-18', 0, '', 3884290488, 'Musculacion', '', 0, ''),
(1227, 'Jorge', 'Miranda', '1991-03-21', 0, '', 3884377438, 'Musculacion', NULL, NULL, NULL),
(1228, 'Eleonor', 'Bellman', '1974-04-19', 0, '', 3884808011, 'Musculacion', NULL, NULL, NULL),
(1232, 'Maria', 'Arias Dip', '2000-03-03', 0, '', 3884972596, 'Musculacion', NULL, NULL, NULL),
(1237, 'Luis', 'Revollo', '1977-04-06', 0, '', 3884646673, 'Musculacion', NULL, NULL, NULL),
(1244, 'SONIA', 'GARECA', '1996-06-19', 0, '', 3884724480, 'Musculacion', '', 0, ''),
(1247, 'LAURA', 'ALTEA', '1984-02-11', 0, '', 3885882741, 'Musculacion', '', 0, ''),
(1249, 'Dana', 'Barrionuevo', '1988-05-08', 0, '', 3885749619, 'Body_Pump', NULL, NULL, NULL),
(1259, 'AGUSTIN', 'HOVSEPIAN', '1987-10-25', 0, '', 1169808015, 'Musculacion', '', 0, ''),
(1261, 'Eduardo', 'Gonzalez', '1990-07-31', 0, '', 3884858907, 'Musculacion', NULL, NULL, NULL),
(1264, 'Natalia', 'Dumon', '1988-01-29', 0, '', 3884385266, 'Funcional', NULL, NULL, NULL),
(1269, 'Liliana', 'Chorolque', '1964-09-10', 0, '', 3884141610, 'Musculacion', NULL, NULL, NULL),
(1271, 'Bautista', 'Vallespinos', '2009-06-18', 0, '', 3884667692, 'Musculacion', NULL, NULL, NULL),
(1274, 'VALERIA', 'ABUD', '1992-01-21', 0, '', 3884798526, 'Body_Pump', '', 0, ''),
(1275, 'Diego', 'Fehleisen', '1993-02-02', 0, '', 3885170684, 'Musculacion', NULL, NULL, NULL),
(1281, 'PABLO', 'MEZZENA', '0000-00-00', 0, '', 2995553594, 'Musculacion', '', 0, ''),
(1288, 'ANDREA', 'BARANOVSKV', '1955-11-30', 0, '', 3885023148, 'Musculacion', '', 0, ''),
(1289, 'Mabel', 'Mealla', '0000-00-00', 0, '', 3884075326, 'Body_Pump', NULL, NULL, NULL),
(1290, 'AGUSTINA', 'MULQUI', '1988-05-15', 0, '', 3886854454, 'Musculacion', '', 0, ''),
(1292, 'Monica', 'Cresppe', '1963-10-09', 0, '', 3884414380, 'Musculacion', NULL, NULL, NULL),
(1293, 'Carolina', 'Fernandez', '1983-12-10', 0, '', 3885129704, 'Musculacion', NULL, NULL, NULL),
(1294, 'Juana', 'Diaz', '1972-04-19', 0, '', 3888488109, 'Musculacion', NULL, NULL, NULL),
(1295, 'Rozas', 'Chuquisaca', '1988-07-01', 0, '', 3884483244, 'Funcional', NULL, NULL, NULL),
(1296, 'Carina', 'Murillo', '1981-01-21', 0, '', 3884750322, 'Musculacion', NULL, NULL, NULL),
(1297, 'Victor', 'Ubeid ', '1968-05-12', 0, '', 3885085215, 'Musculacion', NULL, NULL, NULL),
(1298, 'Maria', 'Fortuni', '1977-01-25', 0, '', 3885751906, 'body_Combat', NULL, NULL, NULL),
(1299, 'Elena', 'Alfonso', '1981-08-05', 0, '', 3884321158, 'body_Combat', NULL, NULL, NULL),
(1300, 'MARIA', 'BREGGIA', '1969-06-14', 0, '', 3885236848, 'Musculacion', '', 0, ''),
(1301, 'Julio', 'Medina', '1987-02-03', 0, '', 3885749706, 'Funcional', NULL, NULL, NULL),
(1302, 'Tiziano', 'Poggio', '2007-06-07', 0, '', 3884882501, 'Musculacion', NULL, NULL, NULL),
(1303, 'LUCIA', 'AREVALOS SAIDE', '2007-12-12', 0, '', 3884864621, 'EVERLAST BOXING', '', 0, ''),
(1304, 'Juan', 'Reales', '2009-11-23', 0, '', 3884880744, 'Musculacion', NULL, NULL, NULL),
(1305, 'Leandro', 'Cavelli', '2009-03-09', 0, '', 3884551845, 'Musculacion', NULL, 0, NULL),
(1306, 'Simon', 'Muro', '2009-12-26', 0, '', 3884692402, 'Musculacion', NULL, NULL, NULL),
(1307, 'Tatiana', 'Lopez Delgado', '1988-05-21', 0, '', 3885837363, 'Musculacion', NULL, NULL, NULL),
(1308, 'Gustavo', 'Villegas Babicz', '1983-12-22', 0, '', 3884773852, 'Musculacion', NULL, NULL, NULL),
(1309, 'IGNACIO', 'VALLESPINOS', '0000-00-00', 0, '', 3885141057, 'Musculacion', '', 0, ''),
(1310, 'Francisco', 'Pintado', '0000-00-00', 0, '', 3884627950, 'Musculacion', NULL, NULL, NULL),
(1311, 'Isaac', 'Berca Muñoz', '0000-00-00', 0, '', 3885927900, 'Musculacion', NULL, NULL, NULL),
(1312, 'Fabiana', 'Alcoser', '1980-11-14', 0, '', 3884109714, 'URKU', NULL, NULL, NULL),
(1313, 'Raul', 'Tarraga', '1970-11-14', 0, '', 3884109714, 'URKU', NULL, NULL, NULL),
(1314, 'Carlos', 'Ferretti', '0000-00-00', 0, '', 3885212642, 'Musculacion', NULL, 8, NULL),
(1315, 'Hugo', 'Cornejo', '1977-07-01', 0, '', 3886860436, 'Musculacion', NULL, NULL, NULL),
(1316, 'Joel', 'Segovia', '1991-08-14', 0, '', 1131198186, 'Musculacion', NULL, NULL, NULL),
(1317, 'Lorena', 'Torrilla', '1978-03-20', 0, '', 3885867611, 'Musculacion', NULL, 5, NULL),
(1318, 'FACUNDO', 'SURUGUAY', '0000-00-00', 0, '', 3884686844, 'Musculacion', '', 0, ''),
(1319, 'MATIAS', 'BOSSATTI', '2009-08-21', 0, '', 3885044900, 'Mini_Voley', '', 0, ''),
(1320, 'Nicole', 'Abalos Madrigal', '2009-04-15', 0, '', 3883305285, 'Funcional', NULL, NULL, NULL),
(1321, 'Martino', 'Gonzalez', '2017-03-09', 0, '', 3885000832, 'Taekwondo', NULL, NULL, NULL),
(1322, 'Lucas', 'Molina', '0000-00-00', 0, '', 3884449071, 'Taekwondo', NULL, NULL, NULL),
(1323, 'Adrian', 'Molina', '0000-00-00', 0, '', 3884449071, 'Taekwondo', NULL, NULL, NULL),
(1324, 'CRISTIAN', 'PEREZ', '1988-02-17', 0, '', 3884047955, 'Taekwondo', '', 0, ''),
(1325, 'Maria', 'Fernandez', '2008-11-25', 0, '', 3884559938, 'Funcional', NULL, NULL, NULL),
(1326, 'Irina', 'Ramirez', '1998-05-11', 0, '', 3885128585, 'body_Combat', NULL, NULL, NULL),
(1327, 'Brno', 'Beron', '1916-07-24', 0, '', 3885128585, 'Futbol_Infantil', NULL, NULL, NULL),
(1328, 'Claudia', 'Miranda', '1987-03-13', 0, '', 3884724801, 'Musculacion', NULL, NULL, NULL),
(1329, 'Nahiara', 'Bautista', '2011-05-30', 0, '', 3884603396, 'Taekwondo', NULL, NULL, NULL),
(1330, 'Delfina', 'Macedo Modena', '2008-09-23', 0, '', 3884344639, 'Musculacion', NULL, NULL, NULL),
(1331, 'LUCAS', 'CAYGUARA', '2007-12-28', 0, '', 3884773720, 'Musculacion', '', 0, ''),
(1332, 'Federico', 'Fernandez', '1984-06-04', 0, '', 3885067159, 'Musculacion', NULL, NULL, NULL),
(1333, 'Patricia', 'Ortiz', '1981-11-27', 0, '', 3884214615, 'Musculacion', NULL, NULL, NULL),
(1334, 'Jorge', 'Gentilnomo', '1975-05-23', 0, '', 3885753317, 'Musculacion', NULL, NULL, NULL),
(1335, 'Gabriela', 'Diaz', '0000-00-00', 0, '', 3887471174, 'Ritmos_Flow', NULL, NULL, NULL),
(1336, 'Agustin', 'Almenar', '1998-06-18', 0, '', 3884864048, 'Musculacion', NULL, NULL, NULL),
(1337, 'Rosana', 'Silva', '1985-08-22', 0, '', 3884673814, 'Especifico', NULL, NULL, NULL),
(1338, 'MIA', 'GUALAMPE', '2013-08-01', 0, '', 3884537676, 'Taekwondo', '', 0, ''),
(1339, 'Lara', 'Nasif', '2001-07-03', 0, '', 3884480638, 'Musculacion', NULL, NULL, NULL),
(1341, 'Leonardo', 'Rodriguez', '1995-03-17', 0, '', 3884862686, 'Musculacion', NULL, NULL, NULL),
(1342, 'Benjamin', 'Calvo', '2018-06-27', 0, '', 3884382909, 'Futbol_Infantil', NULL, NULL, NULL),
(1343, 'Federico', 'Krebs', '1978-05-21', 0, '', 3884137570, 'Musculacion', NULL, NULL, NULL),
(1344, 'Pamela', 'Camacho', '1985-07-17', 0, '', 3885722164, 'Musculacion', NULL, NULL, NULL),
(1345, 'Maria', 'Ibañez', '1990-10-19', 0, '', 3884215781, 'Especifico', NULL, NULL, NULL),
(1346, 'Diego', 'Villalba Frias', '1988-05-27', 0, '', 3884780682, 'Especifico', NULL, NULL, NULL),
(1347, 'Julieta', 'Villalba Frias', '1991-08-06', 0, '', 3886014484, 'Especifico', NULL, 0, NULL),
(1348, 'Maria', 'Canizzo', '1985-07-13', 0, '', 3885238345, 'Body_Pump', NULL, NULL, NULL),
(1349, 'LAURA', 'GUAIMAS', '1984-01-11', 0, '', 3885051788, 'Body_Pump', '', 0, ''),
(1350, 'Analia', 'Mansilla', '1977-09-06', 0, '', 3517643361, 'Musculacion', NULL, NULL, NULL),
(1351, 'Thomas', 'Cordero', '2009-03-25', 0, '', 3855984694, 'Musculacion', NULL, NULL, NULL),
(1352, 'Tadeo', 'Cordero', '2011-12-03', 0, '', 3855984694, 'Musculacion', NULL, NULL, NULL),
(1353, 'Romina', 'Pardiñas', '1969-12-20', 0, '', 3884801501, 'Musculacion', NULL, NULL, NULL),
(1354, 'Emma', 'Ferreyra Yrigoyen', '0000-00-00', 0, '', 3884086582, 'Taekwondo', NULL, NULL, NULL),
(1355, 'Alina', 'Ferreyra Yrigoyen', '2014-08-21', 0, '', 3884086582, 'Taekwondo', NULL, NULL, NULL),
(1356, 'Guadalupe', 'Ferreyra Yrigoyen', '2016-06-13', 0, '', 3884086582, 'Taekwondo', NULL, NULL, NULL),
(1357, 'Valeria', 'Brizuela', '1987-07-14', 0, '', 3884092046, 'Musculacion', NULL, NULL, NULL),
(1358, 'Valeria', 'Rodriguez', '1982-01-30', 0, '', 3884090620, 'Musculacion', NULL, NULL, NULL),
(1359, 'Micaela', 'Assef', '2011-06-16', 0, '', 3886822516, 'Mini_Voley', NULL, NULL, NULL),
(1360, 'Hector', 'Claure', '1978-09-15', 0, '', 3885711142, 'Musculacion', NULL, NULL, NULL),
(1361, 'Pablo', 'Yahagi Isao', '2016-09-22', 0, '', 3884862227, 'Taekwondo', NULL, NULL, NULL),
(1362, 'Ana', 'Barengo', '2013-03-31', 0, '', 3884862227, 'Taekwondo', NULL, 13, NULL),
(1363, 'Valentina', 'Dominguez', '2014-01-26', 0, '', 3885173732, 'Taekwondo', NULL, NULL, NULL),
(1364, 'Maria', 'Zapana', '1996-02-14', 0, '', 3885173732, 'Musculacion', NULL, NULL, NULL),
(1366, 'VANINA', 'SILVI', '1988-10-22', 0, '', 3886869393, 'Musculacion', '', 0, ''),
(1367, 'Andrea', 'Madariaga', '1973-02-19', 0, '', 3875377945, 'Musculacion', NULL, NULL, NULL),
(1368, 'Patricia', 'Llanez', '1983-02-22', 0, '', 3885124179, 'Musculacion', NULL, NULL, NULL),
(1369, 'Maria', 'Bidondo', '1976-07-05', 0, '', 3885128247, 'Musculacion', NULL, NULL, NULL),
(1370, 'Candelaria', 'Caballero', '2006-04-10', 0, '', 3884081843, 'Musculacion', NULL, NULL, NULL),
(1371, 'JORGE', 'ZAMUDIO', '1963-02-19', 0, '', 3886853987, 'Musculacion', '', 0, ''),
(1373, 'MARCELO', 'ALFONSO SAENZ', '1984-06-15', 0, '', 3885065012, 'Funcional', '', 0, ''),
(1374, 'MERCEDES', 'GARZON', '0000-00-00', 0, '', 3884385285, 'URKU', '', 0, ''),
(1375, 'Camila', 'Aban', '1993-08-13', 0, '', 3886823719, 'body_Combat', NULL, NULL, NULL),
(1376, 'Morena', 'Monteleone', '2004-04-15', 0, '', 3884157237, 'Musculacion', NULL, NULL, NULL),
(1377, 'Ernesto', 'Gutierrez', '1983-04-08', 0, '', 3885704054, 'Musculacion', NULL, NULL, NULL),
(1379, 'IGNACIO', 'SOLIS', '2013-03-25', 0, '', 3885043304, 'Taekwondo', '', 0, ''),
(1380, 'FEDERICO', 'ARLLA', '1993-02-24', 0, '', 3525628866, 'Musculacion', '', 0, ''),
(1381, 'Maria', 'Tejerina', '1980-04-13', 0, '', 3884806576, 'Musculacion', NULL, NULL, NULL),
(1395, 'GENARO', 'MUÑOZ FERRI', '2007-07-05', 0, '', 3884049404, 'Musculacion', '', 0, ''),
(1403, 'JOAQUIN', 'LOBO', '1992-11-10', 0, '', 3885127529, 'Musculacion', '', 0, ''),
(1404, 'NATALIA', 'BALZANO', '1989-01-14', 0, '', 3884192071, 'body_Combat', '', 0, ''),
(1416, 'NESTOR', 'CABRERA', '0000-00-00', 0, '', 3885960996, 'Musculacion', '', 0, ''),
(1419, 'SONIA', 'FERNANDEZ', '1964-07-01', 0, '', 3885142745, 'Musculacion', '', 0, ''),
(1422, 'MARIA', 'GRACIA CARDONE', '1984-04-09', 0, '', 3884363619, 'Musculacion', '', 0, ''),
(1423, 'JIMENA', 'BERNAL', '0000-00-00', 0, '', 3884297097, 'Body_Pump', '', 0, ''),
(1424, 'MONICA', 'AMADO', '1973-01-12', 0, '', 3885826634, 'Body_Pump', '', 0, ''),
(1428, 'NAYRA', 'IVANOVIC', '0000-00-00', 0, '', 3884149905, 'URKU', '', 0, ''),
(1433, 'BRUNO', 'GREPPI', '1994-12-02', 0, '', 38512030241, 'Musculacion', '', 0, ''),
(1443, 'GRISELDA', 'CAMPOSANO', '1985-05-11', 0, '', 3884852789, 'Musculacion', '', 0, ''),
(1453, 'CLAUDIA', 'VILLALTA', '1979-10-09', 0, '', 3885173721, 'Musculacion', '', 0, ''),
(1460, 'BENJAMIN', 'AUIL', '2011-08-15', 0, '', 3875821864, 'Musculacion', '', 0, ''),
(1465, 'THIAGO', 'ESPINOZA CHAILE', '2014-07-08', 0, '', 2966548209, 'Taekwondo', '', 0, ''),
(1467, 'FERNANDO', 'USTARES', '1971-01-23', 0, '', 3885811058, 'Funcional', '', 0, ''),
(1474, 'LAURA', 'DIEZ YARADE', '1978-12-18', 0, '', 3884728477, 'Especifico', '', 0, ''),
(1477, 'MARIA', 'SANCHEZ', '1994-07-09', 0, '', 3885751550, 'Musculacion', '', 0, ''),
(1479, 'CRISTIAN', 'ACORIDO', '1989-02-09', 0, '', 3886867802, 'Especifico', '', 0, ''),
(1485, 'PABLO', 'QUIROZ', '1975-09-02', 0, '', 3884800761, 'Musculacion', '', 0, ''),
(1486, 'GABRIELA', 'PORRAS', '1976-05-31', 0, '', 3885217654, 'Musculacion', '', 0, ''),
(1498, 'ELISEO', 'GAUNA', '1974-09-11', 0, '', 3886820067, 'Musculacion', '', 0, ''),
(1502, 'GRACIELA', 'BARAC', '0000-00-00', 0, '', 3884123395, 'Musculacion', '', 0, ''),
(1503, 'ANTONELLA', 'RAMIREZ', '1992-11-29', 0, '', 3885067875, 'Musculacion', '', 0, ''),
(1504, 'SOFIA', 'FERREYRA', '2003-08-30', 0, '', 3884770788, 'Musculacion', '', 0, ''),
(1505, 'GABRIELA', 'FUENTELSAZ', '0000-00-00', 0, '', 3886098207, 'Body_Pump', '', 0, ''),
(1506, 'ABEL', 'MENDOZA', '2014-04-26', 0, '', 3884071694, 'Taekwondo', '', 0, ''),
(1507, 'ELENA', 'BOSCARIOL', '1962-10-31', 0, '', 3886866752, 'Body_Pump', '', 0, ''),
(1508, 'MARCOS', 'ALARCON', '1977-11-05', 0, '', 3886857161, 'body_Combat', '', 0, ''),
(1509, 'PATRICIA', 'MAIDANA', '1963-01-17', 0, '', 3886827713, 'Musculacion', '', 0, ''),
(1510, 'CLAUDIA', 'MENDIETA', '1973-11-08', 0, '', 3884093503, 'Musculacion', '', 0, ''),
(1511, 'CAMILO', 'SOAJE', '1978-09-16', 0, '', 3884043056, 'Musculacion', '', 0, ''),
(1513, 'ESTANISLAO', 'PFISTER', '2004-05-21', 0, '', 3886828057, 'Musculacion', '', 0, ''),
(1514, 'NELLY', 'VARGAS RODRIGUEZ', '1965-01-12', 0, '', 3884075265, 'Musculacion', '', 0, ''),
(1515, 'LAURA', 'CORBACHO', '1984-04-18', 0, '', 3885231955, 'Musculacion', '', 0, ''),
(1516, 'LOURDES', 'AVALOS', '1988-12-23', 0, '', 3885706135, 'Body_Pump', '', 0, ''),
(1517, 'SANTIAGO', 'MEROI', '1995-05-18', 0, '', 3884106040, 'Musculacion', '', 0, ''),
(1518, 'ALEJANDRA', 'RANIERI', '1959-06-02', 0, '', 3884103196, 'Musculacion', '', 0, ''),
(1520, 'MAURICIO', 'FERREYRA', '2004-01-25', 0, '', 3885018464, 'Musculacion', '', 0, ''),
(1521, 'MILO', 'MARTINEZ', '2012-04-04', 0, '', 3884884766, 'Futbol_Infantil', '', 0, ''),
(1522, 'NOELIA', 'FERNANDEZ', '1983-08-13', 0, '', 3885178298, 'body_Combat', '', 0, ''),
(1524, 'CAMILA', 'RIVAS', '2001-05-12', 0, '', 3884979626, 'Musculacion', '', 0, ''),
(1525, 'ANALIA', 'MEALLA', '1974-09-20', 0, '', 3885703463, 'Musculacion', '', 0, ''),
(1526, 'VALENTIN', 'MONTENOVI', '2005-02-10', 0, '', 3884177723, 'Musculacion', '', 0, ''),
(1527, 'SILVIA', 'PAREDES', '1970-07-16', 0, '', 3885818759, 'Body_Pump', '', 0, ''),
(1528, 'ALFONSINA', 'PARRA', '1999-03-06', 0, '', 3884097073, 'Musculacion', '', 0, ''),
(1529, 'CESAR', 'MURO', '1978-06-11', 0, '', 3884767175, 'Musculacion', '', 0, ''),
(1532, 'MARCELO', 'PAOLONI', '1979-09-29', 0, '', 3885203476, 'URKU', '', 0, ''),
(1533, 'SILVINA', 'LOPEZ', '1981-01-12', 0, '', 3885886602, 'Musculacion', '', 0, ''),
(1534, 'KIARA', 'CERVANTES', '0000-00-00', 0, '', 3884073608, 'Musculacion', '', 0, ''),
(1535, 'SOL', 'MEJIDE', '1999-07-02', 0, '', 3886821791, 'Body_Pump', '', 0, ''),
(1536, 'MARIA', 'FLORES', '1980-04-29', 0, '', 3884131740, 'Funcional', '', 0, ''),
(1537, 'LOLA', 'ALURRALDE FARFAN', '2008-04-04', 0, '', 3885826909, 'Musculacion', '', 0, ''),
(1538, 'MARIA', 'MARMOL', '1974-10-22', 0, '', 3885884070, 'Body_Pump', '', 0, ''),
(1539, 'IVAN', 'ARROYO', '2005-07-05', 0, '', 3885740048, 'Musculacion', '', 0, ''),
(1540, 'ADRIANA', 'SANCHEZ', '1962-01-26', 0, '', 3884077495, 'Musculacion', '', 0, ''),
(1542, 'MARIA', 'PAREDES', '1984-12-05', 0, '', 3885013630, 'Body_Pump', '', 0, ''),
(1543, 'ANA', 'RODRIGUEZ DE APARICI', '2008-09-12', 0, '', 3884041523, 'Musculacion', '', 13, ''),
(1544, 'LUIS', 'RODRIGUEZ DE APARICI', '2010-02-01', 0, '', 3885816080, 'Musculacion', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `monto` int(11) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL,
  `disciplina_dos` varchar(50) DEFAULT NULL,
  `tipo_pago` varchar(50) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_cliente`, `nombre`, `apellido`, `monto`, `disciplina`, `disciplina_dos`, `tipo_pago`, `fecha_pago`, `fecha_vencimiento`) VALUES
(238, 4, 'Mariela', 'Cortez', 5500, 'body_Combat', NULL, 'Efectivo', '2023-08-04', '2023-09-04'),
(242, 1, 'Zaida', 'Abraham', 3200, 'Body_Pump', NULL, 'Transferencia', '2023-08-08', '2023-09-08'),
(270, 18, 'CARLOS', 'ARAMAYO', 3000, 'URKU', NULL, 'Transferencia', '2023-08-12', '2023-09-13'),
(275, 2, 'Leandro', 'Manna', 6000, NULL, 'URKU', 'Efectivo', '2023-08-12', '2023-09-12'),
(278, 1, 'Zaida', 'Abraham', 2500, 'Body_Pump', NULL, 'Efectivo', '2023-08-12', '2023-09-12'),
(281, 4, 'Mariela', 'Cortez', 1500, 'body_Combat', NULL, 'Efectivo', '2023-08-12', '2023-09-12'),
(282, 4, 'Mariela', 'Cortez', 1000, NULL, 'Funcional', 'Efectivo', '2023-08-12', '2023-09-12'),
(289, 3, 'Paula', 'Agüero ', 3200, NULL, 'Mini_Voley', 'Transferencia', '2023-08-12', '2023-09-12'),
(292, 9, 'JULIETA', 'ALBARRACIN', 5000, 'Body_Pump', NULL, 'Transferencia', '2023-08-12', '2023-09-12'),
(293, 12, 'ALEJANDRO', 'ALVAREZ', 3900, 'Funcional', NULL, 'Transferencia', '2023-08-12', '2023-09-12'),
(294, 10, 'Abril', 'Allende', 3800, 'Musculacion', NULL, 'Transferencia', '2023-08-12', '2023-09-12'),
(295, 5, 'Franco', 'Manna', 7000, 'Taekwondo', NULL, 'Efectivo', '2023-08-12', '2023-09-12'),
(296, 5, 'Franco', 'Manna', 6500, NULL, 'Ritmos_Flow', 'Efectivo', '2023-08-12', '2023-09-12'),
(297, 21, 'SERGIO', 'ARAMAYO', 2000, 'Funcional', NULL, 'Efectivo', '2023-08-12', '2023-09-12'),
(304, 1, 'Zaida', 'Abraham', 3000, 'Body_Pump', NULL, 'Efectivo', '2023-07-17', '2023-08-17'),
(306, 2, 'Leandro', 'Manna', 4000, 'Musculacion', NULL, 'Efectivo', '2023-08-17', '2023-09-17'),
(308, 964, 'Natalia', 'Soto Lescano', 5200, 'Musculacion', NULL, 'Efectivo', '2023-08-15', '2023-09-10'),
(323, 2, 'Leandro', 'Manna', 1200, 'Musculacion', NULL, 'Efectivo', '2023-08-23', '2023-09-23'),
(324, 4, 'Pepito', 'Pepe', 1230, 'Musculacion', NULL, 'Efectivo', '2023-08-23', '2023-09-23'),
(327, 1, 'Zaida', 'Abraham', 1000, 'Body_Pump', NULL, 'Transferencia', '2023-08-24', '2023-09-24'),
(328, 2, 'Leandro', 'Manna', 4500, 'Musculacion', NULL, 'Efectivo', '2023-08-24', '2023-09-24'),
(329, 2, 'Leandro', 'Manna', 4300, NULL, 'Body_Pump', 'Efectivo', '2023-08-24', '2023-09-24'),
(330, 5, 'Franco', 'Manna', 4300, 'Funcional', NULL, 'Transferencia', '2023-08-24', '2023-09-24'),
(332, 12, 'ALEJANDRO', 'ALVAREZ', 4500, 'Funcional', NULL, 'Efectivo', '2023-09-05', '2023-10-05'),
(333, 76, 'ANA', 'CIVETTA', 4600, 'Body_Pump', NULL, 'Efectivo', '2023-09-01', '2023-10-01'),
(334, 113, 'Gabriela', 'Figueroa', 4000, 'Funcional', NULL, 'Transferencia', '2023-08-31', '2023-09-30'),
(335, 92, 'CARMEN', 'DE MENDOZA', 3800, 'Musculacion', NULL, 'Efectivo', '2023-08-15', '2023-09-15'),
(336, 11, 'LORENA', 'ALTAMIRANO', 3000, 'Body_Pump', NULL, 'Efectivo', '2023-08-11', '2023-09-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activacionmuscular`
--
ALTER TABLE `activacionmuscular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_id` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activacionmuscular`
--
ALTER TABLE `activacionmuscular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1546;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_cliente_id` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
