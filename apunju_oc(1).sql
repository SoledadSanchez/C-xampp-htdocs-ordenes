-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2021 a las 01:06:11
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apunju_oc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE `afiliados` (
  `id_afiliado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nro_doc` int(11) NOT NULL,
  `legajo` int(11) NOT NULL,
  `correo` text NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` double NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `cuil` varchar(15) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `dependencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`id_afiliado`, `nombre`, `apellido`, `nro_doc`, `legajo`, `correo`, `domicilio`, `telefono`, `estado`, `cuil`, `sexo`, `fecha_nac`, `dependencia`) VALUES
(1, 'Pamela', 'paredes', 26006258, 2825, '', '', 0, 0, NULL, NULL, NULL, NULL),
(4, 'selena estela', 'gomez', 27007377, 7854, 'romina@hotmail.com', 'alvear 846', 0, 1, NULL, NULL, NULL, NULL),
(8, 'MILI', 'ESPINO', 26007377, 78965, 'mili@hotmail.com', 'avenida exodo 330 - barrio gorriti', 0, 0, NULL, NULL, NULL, NULL),
(9, 'daniel', 'espino', 27232288, 7845, 'daniel@yahoo.com', '', 0, 1, NULL, NULL, NULL, NULL),
(10, 'lucas', 'hernandez', 25478478, 0, 'rominastach@gmail.com', '', 3884782908, 0, NULL, NULL, NULL, NULL),
(11, 'nelson martin', 'mandela', 124578, 254, '', 'maimara 233', 0, 0, NULL, NULL, NULL, NULL),
(12, 'miliqui', 'flower', 45789654, 2547, 'mili@hotmail.com', 'avenida exodo 330 - barrio gorriti', 0, 0, NULL, NULL, NULL, NULL),
(13, 'erica', 'sanchez', 58745874, 0, 'eri@gmail.com', 'juan manuel de rosas', 0, 0, NULL, NULL, NULL, NULL),
(14, 'lucas', 'hernandez', 58963963, 0, 'rominastach@gmail.com', '', 0, 1, NULL, NULL, NULL, NULL),
(15, 'horacio', 'melo', 5874587, 1225, 'horacio@hotmail.com', '', 0, 1, NULL, NULL, NULL, NULL),
(16, 'raquel', 'palacios', 2563987, 1215, 'raquel@yahoo.com', '', 0, 0, NULL, NULL, NULL, NULL),
(17, 'sergio', 'altamirano', 26547547, 2145, '', '', 0, 0, NULL, NULL, NULL, NULL),
(18, 'Julian', 'acosta', 1245, 1215, 'acosta@gmail.com', '', 0, 0, NULL, NULL, NULL, NULL),
(19, 'Martina ', 'acosta', 6398, 1215, 'acosta@gmail.com', 'avenida fascio 236', 0, 1, NULL, NULL, NULL, NULL),
(20, 'Romina', 'acosta', 5689, 1215, 'acosta@gmail.com', 'iriarte 2547', 0, 1, NULL, NULL, NULL, NULL),
(21, 'sebastian', 'arias', 25896321, 2569, 'arias@gmail.com', 'avenida los lapachos 255', 0, 0, NULL, 'Masculino', '1975-02-05', 2),
(22, 'sebastian', 'arias', 92563562, 1523, 'arias@gmail.com', 'avenida los lapachos 257', 0, 1, '', 'Masculino', '1979-05-02', 7),
(23, 'Milagros Soledad', 'Alcoba Gomez', 2659874, 111, 'raquel12@yahoo.com', 'almada 255', 0, 1, '', 'Femenino', '1978-05-28', 3),
(24, 'francisco', 'montes', 25896896, 0, '', 'avenida peru 2893', 0, 1, NULL, 'Masculino', '0000-00-00', 1),
(25, 'Romina Paola', 'stach', 27007377, 2333, '', 'exodo 330', 0, 1, NULL, 'Femenino', '0000-00-00', 1),
(26, 'andrea', 'velazquez', 27007376, 3636, '', 'puya puya 698', 0, 1, NULL, 'Femenino', '1990-05-15', 7),
(27, 'estela', 'chavez', 27008999, 2589, '', 'av bolivia 235', 0, 1, NULL, 'Femenino', '1990-06-30', 5),
(28, 'alejandro', 'toconas', 27111, 555, '', 'exodo 330', 0, 1, NULL, 'Masculino', '1986-12-02', 5),
(29, '', '', 20089999, 0, '', '', 0, 0, NULL, '', '0000-00-00', 0),
(30, '', '', 2700737, 0, '', '', 0, 0, NULL, '', '0000-00-00', 0),
(778, ' Fernando Carlos Martin', 'AGUIRRE', 22094518, 1024, ' ', 'calle 454 nro1138', 99999, 1, '23220945189', 'Masculino', '0000-00-00', 5),
(779, 'Norberto Gustavo', 'AGUIRRE', 21846056, 1025, ' ', 'MADRESELVA 300', 99999, 1, '23218460569', 'Masculino', '1970-10-05', 3),
(780, 'Roberto Luis', 'ALBERTO', 13121526, 1034, ' ', 'Barcena nro. 859', 99999, 1, '20131215267', 'Masculino', '1959-02-11', 1),
(781, 'Miriam Isabel', 'ALEJO', 13550594, 1043, ' ', 'Pje Alberto Genari nro. 200', 3884782908, 1, '27135505949', 'Femenino', '1959-08-03', 2),
(782, 'Sandra Anabel Silvan', 'ARAYA', 21665821, 1068, ' ', 'Gobernador Tello nro. 704', 3884382546, 1, '27216658219', 'Femenino', '1970-12-22', 5),
(783, 'Myriam Norma', 'ARIÑEZ', 13828583, 1079, ' ', 'Azul nro. 217', 99999, 1, '27138285834', 'Femenino', '1960-07-22', 5),
(784, 'Manuel', 'ARJONA', 17080326, 1080, ' ', 'PUEYRREDON nro. 763', 3884773779, 1, '20170803265', 'Masculino', '1965-05-19', 3),
(785, 'Ramon Roberto', 'ARJONA', 18444094, 1081, ' ', 'Mza 32 Lote 20 - 44 Viviendas nro. S/N', 3884086050, 1, '20184440947', 'Masculino', '1967-08-31', 6),
(786, ' Rodolfo', 'ARJONA', 16186773, 1082, ' ', 'L2-M13-308 VIV. nro.', 3885185113, 1, '20161867730', 'Masculino', '1962-11-06', 3),
(787, ' Lucia', 'AUCAPIÑA CASTILLO', 11663306, 1089, ' ', 'Roberto Sancho nro. 3457', 3885394420, 1, '27116633065', 'Femenino', '1955-05-23', 4),
(788, ' Manuel Gabriel', 'AVELLANEDA ZULETA', 17581104, 1091, ' ', 'JOSE DE LA IGLESIA nro. 1075', 99999, 1, '20175811045', 'Masculino', '1965-07-11', 12),
(789, ' Jose Marcelo', 'BARRIONUEVO', 11952294, 1111, ' ', 'REMEDIO DE ESCALADA nro. 252', 3884207595, 1, '20119522944', 'Masculino', '1956-06-10', 4),
(790, ' Maria Susana', 'BARTOLETTI', 13729236, 1116, ' ', 'RAMIREZ DE VELAZCO nro. 232', 3884700916, 1, '27137292365', 'Femenino', '1959-08-07', 2),
(791, ' Favio', 'BERDEJA', 10186910, 1126, ' ', 'M.73  L.7 nro.', 3884121325, 1, '20101869106', 'Masculino', '1952-05-11', 1),
(792, ' Mirta Mabel', 'BORJA', 13284838, 1143, ' ', '13 De Diciembre nro. 1441', 3884376716, 1, '27132848381', 'Femenino', '1959-11-19', 3),
(793, ' Cesar Miguel', 'BOVEDA', 14787406, 1149, ' ', 'desconocido', 3885876484, 1, '20147874066', 'Masculino', '1961-11-05', 16),
(794, ' Jorge Silvio', 'BRITO', 12684465, 1157, ' ', 'NICARAGUA nro. 980', 3885062423, 1, '20126844655', 'Masculino', '1958-08-14', 7),
(795, ' Luis Rafael', 'RAMOS', 16756197, 1173, ' ', 'AVELLANEDA nro. 366', 3885869988, 1, '20167561978', 'Masculino', '1963-10-09', 2),
(796, ' Ignacia', 'CARRILLO', 12910833, 1206, ' ', '1º De Mayo- Mza 1 Lote nro. 12', 99999, 1, '27129108334', 'Femenino', '1959-07-31', 5),
(797, ' Hector Javier', 'CASADO', 25165025, 1213, ' ', 'Adrian Garcia Del Rio nro. 1164', 99999, 1, '20251650250', 'Masculino', '1976-02-17', 4),
(798, ' Norma del Rosario', 'CAYO', 13121485, 1225, ' ', 'DR. SABIN nro. 1112', 3885803732, 1, '27131214850', 'Femenino', '1959-06-23', 3),
(799, ' Noemi Francisca', 'CEBALLOS', 16485282, 1227, ' ', 'MZA.C - LOTE 24 nro. S/N', 3885212751, 1, '27164852828', 'Femenino', '1963-12-29', 2),
(800, ' Estela Raquel', 'CHAVES', 23755112, 1236, ' ', 'La Porteña nro. 457', 3884334353, 1, '27237551120', 'Femenino', '1973-12-23', 13),
(801, ' Ricardo Jose', 'CHIRI', 16210128, 1241, ' ', 'Mza 544 Lote 2 - 370 Viviendas nro.', 3885734437, 1, '20162101286', 'Masculino', '1963-02-15', 3),
(802, ' Ricardo Ceferino', 'CONDORI', 18504794, 1261, ' ', 'Capitan Lotuffo nro. 832', 99999, 1, '20185047947', 'Masculino', '1967-04-20', 2),
(803, ' Claudia Margarita', 'CORDOBA', 13771630, 1269, ' ', 'FLORIDA nro. 188', 3884773331, 1, '27137716300', 'Femenino', '1957-11-01', 4),
(804, ' Bernardo', 'CRUZ', 12618334, 1286, ' ', 'ODONELL nro. 652', 3885826448, 1, '20126183349', 'Masculino', '1958-03-12', 7),
(805, ' Hugo Daniel', 'CRUZ', 20419089, 1290, ' ', 'Puerto Argentino nro. 648', 3884399088, 1, '20204190896', 'Masculino', '1968-11-14', 2),
(806, ' Carlos Eduardo', 'CUEVAS', 13016480, 1295, ' ', 'EL GAUCHO nro. 91', 99999, 1, '20130164804', 'Masculino', '1957-05-16', 1),
(807, ' Lucia Teresa', 'DURAN', 17661421, 1332, ' ', 'Las Heras nro. 1060', 99999, 1, '27176614213', 'Femenino', '1965-10-04', 1),
(808, ' Juan Francisco', 'FERNANDEZ', 12618590, 1356, ' ', 'Caseros nro. 56', 99999, 1, '20126185902', 'Masculino', '1955-06-24', 11),
(809, ' Silvia Elisa', 'FERNANDEZ', 16168007, 1359, ' ', 'Republica De Siria nro. 431', 3884290147, 1, '27161680074', 'Femenino', '1962-09-12', 6),
(810, ' Miguel Angel', 'FLORES', 13016894, 1375, ' ', 'Juan De Garay nro. 352', 3885035371, 1, '23130168949', 'Masculino', '1959-01-06', 8),
(811, ' Carmela', 'FLORES', 17502648, 1380, ' ', 'Bustamante nro. 140', 99999, 1, '27175026482', 'Femenino', '1964-10-30', 13),
(812, ' Osmany Rafael', 'FUNES GONZALEZ', 24803391, 1387, ' ', '9 De Julio nro. 159', 3884146481, 1, '20248033917', 'Masculino', '1975-08-11', 1),
(813, ' Nestor Arturo', 'GAMBOA', 11664958, 1401, ' ', 'Valle Grande nro. 1110', 3884082354, 1, '20116649587', 'Masculino', '1958-02-15', 5),
(814, ' Miriam Ruth', 'GARCIA', 14553958, 1411, ' ', 'desconocido', 3884389495, 1, '27145539582', 'Femenino', '1961-04-16', 5),
(815, ' Rosa', 'GARECA', 6559907, 1414, ' ', 'SARGENTO CABRAL nro. 1067', 3885875484, 1, '23065599074', 'Femenino', '1951-08-07', 1),
(816, ' Maria Elena', 'GODOY', 20392345, 1423, ' ', 'Jaime Freire nro. 559', 99999, 1, '27203923452', 'Femenino', '1969-03-29', 2),
(817, ' Claudia Susana', 'GONZALEZ GRANARA', 16032122, 1435, ' ', 'EL TARCO nro. 82', 3885206326, 1, '27160321224', 'Femenino', '1962-06-09', 2),
(818, ' Felipe Eusebio', 'GUANUCO', 24175243, 1444, ' ', 'HAITI ESQ. CASABINDO nro. 400', 3885812153, 1, '20241752438', 'Masculino', '1974-08-19', 4),
(819, ' Miguel Angel', 'GUANUCO', 17259818, 1445, ' ', 'Humahuaca nro. 134', 99999, 1, '20172598189', 'Masculino', '1965-03-08', 6),
(820, ' Claudio Alejandro', 'GUTIERREZ', 24399260, 1454, ' ', 'ALBERRO nro. 1033', 3884198152, 1, '20243992606', 'Masculino', '1975-01-13', 4),
(821, ' Jose Arturo', 'GUTIERREZ', 11826663, 1456, ' ', 'Ecuador nro. 218', 3885873018, 1, '20118266634', 'Masculino', '1955-09-25', 5),
(822, ' Liliana Beatriz', 'GUTIERREZ', 18156725, 1457, ' ', 'Mza B - Lote 15 - 68 Viviendas nro. S/N', 3885268306, 1, '27181567258', 'Femenino', '1966-08-07', 3),
(823, ' Amelia Noemi', 'HERRERA', 12433247, 1468, ' ', 'LAVALLE nro. 149', 99999, 1, '27124332473', 'Femenino', '1956-10-20', 12),
(824, ' Susana Alejandra', 'HERRERA', 23984588, 1470, ' ', 'Puya Puya nro. 175', 3884969966, 1, '27239845881', 'Femenino', '1968-08-11', 6),
(825, ' Jose Agustin', 'HUANCO', 14787117, 1471, ' ', 'Carlos Gardel nro. 931', 3885709143, 1, '20147871172', 'Masculino', '1961-05-05', 4),
(826, ' Cristian Ariel', 'HUMANO', 22820650, 1473, ' ', 'Iturbe nro. 269', 3884200885, 1, '20228206505', 'Masculino', '1972-09-17', 2),
(827, ' Osvaldo Antonio', 'IGLESIAS ABUD', 14089583, 1475, ' ', 'Mza 106 Lote 32  -  La Rural nro.', 99999, 1, '20140895831', 'Masculino', '1961-01-06', 3),
(828, ' Joaquin Roque', 'JULIAN', 18505387, 1494, ' ', 'Pje Tte. Vasquez 65 Viv. nro. 816', 99999, 1, '20185053874', 'Masculino', '1967-08-16', 10),
(829, ' Maria Ines', 'KUGLER', 11746558, 1503, ' ', 'JORGE NEWBERY nro. 328', 3884760436, 1, '27117465581', 'Femenino', '1954-12-04', 3),
(830, ' Marcelo Alejandro', 'LIENDRO', 22281039, 1528, ' ', 'Burela nro. 614', 3885763647, 1, '20222810397', 'Masculino', '1971-04-27', 5),
(831, ' Mirta Liliana', 'LOPEZ', 17402015, 1551, ' ', 'HAITI ESQ CASABINDO nro. 400', 3884490063, 1, '27174020154', 'Femenino', '1965-06-18', 4),
(832, ' Marta Raquel', 'LOZA', 22461993, 1562, ' ', 'Cordoba nro. 1859', 3884801780, 1, '27224619931', 'Femenino', '1972-05-29', 5),
(833, ' Laura Beatriz', 'LUNA', 18581205, 1567, ' ', 'BUSTAMANTE nro. 256', 99999, 1, '27185812052', 'Femenino', '1967-10-17', 3),
(834, ' Damian Fidencio', 'MACHACA', 12738535, 1572, ' ', 'LAS AMERICAS nro. 23', 3885143869, 1, '20127385352', 'Masculino', '1958-09-27', 7),
(835, ' Horacio Benito', 'MAIDANA', 14587528, 1579, ' ', 'Prolongacion Pje Tres Sargento nro. S/N', 99999, 1, '20145875286', 'Masculino', '1961-03-02', 14),
(836, ' Nilda Azucena', 'MAMANI', 12007505, 1588, ' ', 'ECUADOR nro. 476', 3885804515, 1, '27120075050', 'Femenino', '1956-11-24', 4),
(837, ' Oscar Silvio', 'MANCILLA', 14787362, 1590, ' ', 'Destr. Bouchatt-Lote 5 Mza 707 nro. 809', 3886852652, 1, '20147873620', 'Masculino', '1961-11-03', 6),
(838, ' Patricia Nieve', 'MARCIAL', 18665745, 1592, ' ', 'Peatonal 32 - 560 Viviendas nro. 438', 99999, 1, '23186657454', 'Femenino', '1967-09-03', 12),
(839, ' Marta Susana', 'MARTINEZ', 13729936, 1605, ' ', 'TAMBO NUEVO nro. 2565', 3884975553, 1, '23137299364', 'Femenino', '1960-04-02', 4),
(840, ' Jesus', 'MAYGUA', 13981687, 1618, ' ', 'Sergio Alvarado nro. 943', 99999, 1, '20139816871', 'Masculino', '1959-10-15', 11),
(841, ' Abel Alejandro', 'MAYO', 20455539, 1619, ' ', 'La Porteña nro. 457', 3884626227, 1, '20204555398', 'Masculino', '1969-09-21', 5),
(842, ' Alfredo', 'MENDEZ', 16032068, 1624, ' ', '22 DE MAYO nro. 482', 99999, 1, '20160320681', 'Masculino', '1962-04-18', 3),
(843, ' Carlos Alberto', 'MENDEZ', 22820983, 1625, ' ', 'Ruta Provincial Nº 56 nro. S/N', 99999, 1, '20228209830', 'Masculino', '1972-12-06', 1),
(844, ' Juan Bautista', 'MENOR', 16486653, 1634, ' ', 'MONROY nro. 215', 99999, 1, '20164866530', 'Masculino', '1962-04-13', 4),
(845, ' Antonio Victor', 'MERUVIA', 14787402, 1635, ' ', 'Palpala nro. 1021', 99999, 1, '20147874023', 'Masculino', '1962-02-16', 17),
(846, ' Gustavo Antonio', 'MIRANDA DELGADO', 10853309, 1646, ' ', 'La Amistad nro. 332', 3884671163, 1, '23108533099', 'Masculino', '1953-03-01', 4),
(847, ' Miguel Angel', 'MONCERRAT', 16431018, 1651, ' ', 'Capinan Palaver nro. 395', 3884671163, 1, '20164310184', 'Masculino', '1963-05-02', 6),
(848, ' Carlos Daniel', 'MONTAÑEZ', 22649609, 1652, ' ', 'Tte Bono - 117 Viviendas nro. 35', 99999, 1, '20226496093', 'Masculino', '1972-05-01', 1),
(849, ' Carlos Francisco', 'MONTES', 25377781, 1659, ' ', 'DIAGONAL ESTE nro. 1450', 3885125898, 1, '20253777819', 'Masculino', '1976-09-08', 1),
(850, ' Roberto Daniel', 'MORALES', 17451580, 1664, ' ', 'CALLE PAMPA 56 nro. 62', 3884348585, 1, '20174515809', 'Masculino', '1965-08-23', 2),
(851, ' Daniel Alberto', 'NASER', 18590117, 1675, ' ', '0', 3885742972, 1, '20185901174', 'Masculino', '1967-07-05', 10),
(852, ' Eduardo Horacio', 'PALACIOS', 20799227, 1706, ' ', 'REP. DOMINICANA nro. 645', 99999, 1, '20207992276', 'Masculino', '1969-10-24', 4),
(853, ' Nelidad Raquel', 'PALACIOS', 17262654, 1707, ' ', 'Mza C3 Lote 18 - 70 Viviendas nro.', 3885145050, 1, '27172626543', 'Femenino', '1964-12-17', 1),
(854, ' Maria Estela', 'PEREIRA', 12618364, 1720, ' ', 'Escaya nro. 749', 3884096155, 1, '27126183645', 'Femenino', '1957-01-28', 4),
(855, ' Reynaldo Horacio', 'POLO', 14089471, 1739, ' ', 'JUNQUILLO nro. 250', 3884140283, 1, '20140894711', 'Masculino', '1961-01-04', 7),
(856, ' Maria Lidia', 'PORTAL', 17909455, 1740, ' ', 'El Naranjito 370 Viviendas nro. 1233', 3884796246, 1, '27179094555', 'Femenino', '1966-10-13', 1),
(857, ' Mario Eleuterio', 'PORTUGUEZ', 11936427, 1742, ' ', 'VENEZUELA nro. 1182', 99999, 1, '20119364273', 'Masculino', '1957-04-18', 14),
(858, ' Santiago Fernando', 'PUCA', 22188619, 1749, ' ', 'Calle 66 - MZA 55 Lote 14 nro.', 3884214330, 1, '20221886195', 'Masculino', '1971-08-10', 5),
(859, ' Norberto Hugo', 'QUIROGA', 17581636, 1760, ' ', 'LOTE 13 MAN. 54 nro.', 3884750750, 1, '20175816365', 'Masculino', '1965-11-12', 1),
(860, ' Ceferino Gustavo', 'QUISPE', 20811190, 1762, ' ', 'AV. CHUBUT nro. 2974', 3884305634, 1, '20208111907', 'Masculino', '1969-05-22', 4),
(861, ' Susana del Valle', 'QUISPE', 13550513, 1765, ' ', 'AGUILAR nro. 920', 99999, 1, '27135505132', 'Femenino', '1957-11-30', 4),
(862, ' Jose Antonio', 'RAMIREZ', 18156683, 1771, ' ', 'CORANZULI nro. 374', 99999, 1, '20181566834', 'Masculino', '1967-01-17', 7),
(863, ' Luis', 'RAMOS', 12827420, 1776, ' ', 'LAPRIDA nro. 80', 3884679406, 1, '20128274201', 'Masculino', '1957-06-21', 7),
(864, ' Liborio Tomas', 'REINAGA', 17081933, 1783, ' ', 'Teniente Bolzan - 308 Vivienda nro. 1247', 99999, 1, '20170819331', 'Masculino', '1964-07-23', 1),
(865, ' Adela del Milagro', 'RIVERA', 14811586, 1799, ' ', 'Lote 101 Mza 4 nro.', 3885134652, 1, '27148115864', 'Femenino', '1961-09-14', 2),
(866, ' Omar Marcelo', 'RODRIGUEZ', 14787130, 1811, ' ', 'TEJADA nro. 250', 3884094214, 1, '23147871309', 'Masculino', '1961-08-06', 7),
(867, ' Andres Roberto', 'ROMERO', 17420610, 1821, ' ', 'Pedro  Diaz Pereyra nro. 1459', 3885961297, 1, '20174206105', 'Masculino', '1965-02-05', 16),
(868, ' Hugo Mario', 'RUEDA', 20455053, 1831, ' ', 'LOS HELECHOS nro. 553', 99999, 1, '20204550531', 'Masculino', '1969-04-18', 2),
(869, ' Guillermo', 'SAJAMA', 14787666, 1847, ' ', 'ZAPALERI nro. 679', 99999, 1, '20147876662', 'Masculino', '1962-03-14', 7),
(870, ' Juan Carlos', 'SALA', 13016442, 1849, ' ', 'Owen - Mza.62 L1- Sgto Cabral nro. 96', 3885875535, 1, '20130164421', 'Masculino', '1959-02-14', 1),
(871, ' Luis Alfredo', 'SOLALIGUE', 20455813, 1898, ' ', 'VENEZUELA nro. 225', 3884388820, 1, '20204558133', 'Masculino', '1970-11-01', 3),
(872, ' Marcela Alejandra', 'SPOLITA', 14058042, 1915, ' ', 'General Paz nro. 475', 3885147577, 1, '27140580428', 'Femenino', '1960-04-03', 5),
(873, ' Silvia Cristina', 'TARIFA', 14268411, 1925, ' ', 'Goyechea nro. 11', 3884738544, 1, '27142684115', 'Femenino', '1960-08-16', 8),
(874, ' Jose Alberto', 'TEJERINA', 17080186, 1927, ' ', 'El Carmen nro. 651', 3885233650, 1, '20170801866', 'Masculino', '1965-03-16', 1),
(875, ' Patricia Liliana', 'TITO', 21665789, 1933, ' ', 'PJE.  ZEGADA nro. 404', 3884774131, 1, '27216657891', 'Femenino', '1970-12-15', 4),
(876, ' Sergio Antonio', 'TOLAY', 17502736, 1939, ' ', 'Comandante De La Corte nro. 329', 4275854, 1, '20175027360', 'Masculino', '1965-05-04', 12),
(877, ' Alejandro Ernesto', 'VARELA', 21437657, 1967, ' ', 'Curupayti nro. 375', 3884778437, 1, '20214376572', 'Masculino', '1969-11-10', 5),
(878, ' Oscar Raul', 'VEGA', 11571559, 1977, ' ', 'Mza. 315  Lote 12 nro. 315', 3885737680, 1, '20115715594', 'Masculino', '1955-08-13', 2),
(879, ' Fermin Armando', 'VILLARRUBIA', 12007916, 1996, ' ', 'Av. Tte Farias nro. 290', 99999, 1, '20120079167', 'Masculino', '1956-11-24', 17),
(880, ' Jorge Antonio', 'YAÑEZ MENA', 17651949, 2015, ' ', 'AV. BOLIVIA nro. 1821', 99999, 1, '20176519496', 'Masculino', '1965-08-26', 3),
(881, ' Pedro Antonio', 'ZAMBRANA', 24787954, 2022, ' ', 'Las Capillas nro. 246', 3884179274, 1, '20247879545', 'Masculino', '1971-01-16', 8),
(882, ' Francisco Javier', 'ZAPANA', 16790279, 2024, ' ', 'Puya Puya Este nro. 19', 3884070732, 1, '20167902791', 'Masculino', '1963-12-16', 1),
(883, ' Fernando Alfredo', 'AGUIRRE', 23053682, 2029, ' ', 'SANTA FE nro. 1555', 3884291955, 1, '20230536822', 'Masculino', '1972-10-01', 3),
(884, ' Ana Carolina', 'CARUSO', 25613714, 2042, ' ', 'PJE. EL TALA nro. 119', 3885088389, 1, '27256137149', 'Femenino', '1977-02-13', 4),
(885, ' Claudia Maria', 'ESTOPIÑAN', 16031978, 2048, ' ', 'FELIX CABALLERO nro. S/N', 3885805088, 1, '27160319785', 'Femenino', '1962-04-06', 4),
(886, ' Gerardo', 'JULIAN', 23096840, 2052, ' ', 'PANAMA nro. 1254', 3885823614, 1, '20230968404', 'Masculino', '1974-09-28', 5),
(887, ' Jose Luis', 'JURADO', 20811994, 2053, ' ', 'Mza 11 Lote 13 nro.', 3884394363, 1, '20208119940', 'Masculino', '1969-10-27', 7),
(888, ' Jorge Gustavo', 'MARTINEZ', 16210073, 2055, ' ', 'HUGO WAST nro. 190', 3885161343, 1, '20162100735', 'Masculino', '1963-01-24', 3),
(889, ' Ester', 'ORTEGA', 17080268, 2059, ' ', 'URUNDEL nro. 835', 99999, 1, '27170802689', 'Femenino', '1964-09-27', 3),
(890, ' Ramona del Huerto', 'QUIROGA', 17220143, 2062, ' ', 'GORDALIZA nro. 1755', 3884425365, 1, '27172201437', 'Femenino', '1964-08-30', 3),
(891, ' Martin Cesar', 'TOLABA', 23053852, 2078, ' ', 'PUERTO ARGENTINO nro. 544', 3884351648, 1, '20230538523', 'Masculino', '1972-11-05', 1),
(892, ' Marcos Napoleon', 'IVANOVIC GIL', 92836405, 2096, ' ', 'CAPITAN LUCIO FEDERICO nro. 191', 3884097219, 1, '20928364055', 'Masculino', '1966-10-01', 2),
(893, ' Jorge Alejandro', 'CRUZ', 21165873, 2097, ' ', 'Gobernador Tello nro. 153', 3884777421, 1, '20211658739', 'Masculino', '1969-11-22', 9),
(894, ' Pablo Nestor Ulises', 'JEREZ LEIVA', 27111036, 2099, ' ', 'SAN LUIS nro. 2409', 3884480400, 1, '20271110368', 'Masculino', '1979-05-10', 9),
(895, ' Marco Antonio', 'ZIMERMAN', 17262717, 2120, ' ', 'Baigorria nro. 714', 3884881863, 1, '20172627170', 'Masculino', '1965-06-16', 5),
(896, ' Aldo Dante', 'GUTIERREZ', 13609423, 2123, ' ', 'Campero nro. 476', 99999, 1, '20136094239', 'Masculino', '1962-06-06', 15),
(897, ' Pablo Alberto', 'GONZALEZ', 20604029, 2128, ' ', 'Juan De Garay nro. 179', 3884149905, 1, '20206040298', 'Masculino', '1969-03-07', 2),
(898, ' Walter Hernan', 'CASTILLO', 23581680, 2138, ' ', 'El Clavel nro. 123', 3884863671, 1, '20235816807', 'Masculino', '1974-02-04', 12),
(899, ' Edgardo', 'GUTIERREZ', 31687436, 2148, ' ', 'AV. BOLIVIA nro. 1685', 3884875399, 1, '20316874364', 'Masculino', '1973-05-29', 14),
(900, ' Fernando Daniel', 'NARVAEZ', 24153145, 2162, ' ', 'Altamirano - 94 Viviendas nro. 2913', 3884385430, 1, '20241531458', 'Masculino', '1974-09-04', 10),
(901, ' Iris Natalia', 'BARBAGELATA', 24504844, 2164, ' ', 'Pasaje 8 - 530 Viviendas nro. 299', 99999, 1, '27245048446', 'Femenino', '1975-04-10', 2),
(902, ' Sergio Enrique', 'FLORES', 23185831, 2165, ' ', 'AVDA. TTE. FARIAS nro. 1374', 3885058990, 1, '20231858319', 'Masculino', '1973-03-10', 4),
(903, ' Carlos Alberto', 'AYARDE', 17502682, 2171, ' ', 'Cerro Centinela nro. 839', 3884703870, 1, '20175026828', 'Masculino', '1965-09-06', 5),
(904, ' Roberto Carlos', 'PELLISCO', 22398529, 2172, ' ', 'Escolástico Zegada nro. 1002', 3884629111, 1, '20223985298', 'Masculino', '1971-09-16', 10),
(905, ' Rosa Cristina', 'LLAMPA', 17451807, 2173, ' ', 'TENIENTE BOLZANO nro. 1247', 99999, 1, '27174518071', 'Femenino', '1965-07-05', 1),
(906, ' Pablo Ernesto', 'SANTILLAN', 25613269, 2182, ' ', 'Pasaje 12 nro. 428', 3884704024, 1, '23256132699', 'Masculino', '1976-11-28', 7),
(907, ' Mario Daniel', 'ALARCON', 22777223, 2184, ' ', '283 - 67 Viviendas nro. 869', 3884698547, 1, '23227772239', 'Masculino', '1972-07-03', 5),
(908, ' Rodrigo Jose', 'ROMERO', 22420545, 2186, ' ', 'San Martin nro. 954', 3885723733, 1, '20224205458', 'Masculino', '1971-10-09', 5),
(909, ' Homar Esteban', 'FARFAN', 21578003, 2187, ' ', 'Estados Unidos nro. 820', 3884728900, 1, '20215780032', 'Masculino', '1970-03-23', 10),
(910, ' Enrique Julian', 'HAMITY', 22970412, 2227, ' ', 'HUMAITA nro. 2952', 99999, 1, '20229704126', 'Masculino', '1972-09-21', 5),
(911, ' Sebastian Marcos', 'FIGUEROA', 23194260, 2237, ' ', 'Jorge Newbery nro. 333', 99999, 1, '20231942603', 'Masculino', '1973-01-11', 4),
(912, ' Diego Cecilio', 'BARBAGELATA', 25613157, 2241, ' ', '25 De Mayo nro. 181', 99999, 1, '23256131579', 'Masculino', '1976-11-05', 4),
(913, ' Jorge Ramon', 'ROMERO', 21665749, 2255, ' ', 'Chacabuco nro. 248', 99999, 1, '20216657498', 'Masculino', '1970-11-30', 9),
(914, ' Guido Horacio', 'MARTINEZ', 22461768, 2276, ' ', 'Tesorero nro. 962', 3885872831, 1, '20224617683', 'Masculino', '1972-04-12', 12),
(915, ' Miriam del Valle', 'CABANA', 13889235, 2283, ' ', 'VILLAFAÑE nro. 630', 3884562543, 1, '27138892358', 'Femenino', '1960-05-06', 3),
(916, ' Ruben Daniel', 'CARDOZO', 18509134, 2285, ' ', 'Heroinas Jujeñas nro. 177', 99999, 1, '20185091342', 'Masculino', '1967-04-09', 7),
(917, ' Pablo Ariel', 'SADIR', 23167798, 2286, ' ', 'Carlos Gardel nro. 941', 3885243572, 1, '20231677985', 'Masculino', '1973-07-15', 3),
(918, ' Armando Raul', 'COLQUE', 24684758, 2300, ' ', 'Cabo 1° Carrizo 370 Viviendas nro. 739', 3885748631, 1, '20246847585', 'Masculino', '1975-05-16', 2),
(919, ' Hernan Augusto', 'MENDEZ', 28036447, 2301, ' ', 'Ernesto La Corcova nro. 245', 99999, 1, '23280364479', 'Masculino', '1980-06-07', 1),
(920, ' Juan Abel', 'ARAMAYO', 27686292, 2302, ' ', 'Pemberton nro. 258', 3884398196, 1, '20276862929', 'Masculino', '1979-10-01', 1),
(921, ' Martin Fernando', 'ROBLERO', 25377754, 2304, ' ', 'Peatonal 39 nro. 466', 99999, 1, '20253777541', 'Masculino', '1976-09-01', 9),
(922, ' Jose Rodrigo', 'JURADO', 26232320, 2306, ' ', 'Juan Pablo II nro. 893', 3886824205, 1, '20262323200', 'Masculino', '1977-10-16', 12),
(923, ' Nestor Hugo', 'VENENCIA', 18447076, 2308, ' ', 'Miguel Angel Avila nro. 3420', 99999, 1, '20184470765', 'Masculino', '1967-03-21', 4),
(924, ' Mauricio Rodrigo Eze', 'MOLINA', 26793159, 2316, ' ', 'Rio De La Plata nro. 973', 3884370039, 1, '20267931594', 'Masculino', '1978-09-11', 2),
(925, ' Dago Alberto Justo', 'PUBZOLU', 22094261, 2324, ' ', 'Prolongacion De Los Cardenales nro. 927', 3885013487, 1, '23220942619', 'Masculino', '1971-04-26', 5),
(926, ' Monica Patricia', 'TOLAY', 23581497, 2327, ' ', 'Peru nro. 1139', 99999, 1, '27235814973', 'Femenino', '1973-12-28', 9),
(927, ' Victor Orlando', 'ARECO', 10008314, 2368, ' ', 'Soldado Aguirre nro. 267', 99999, 1, '20100083141', 'Masculino', '1952-02-17', 2),
(928, ' Jose Luis', 'QUIROGA GUILLEN', 93862066, 2376, ' ', 'Mza 322 Lote 14 Sector B5 nro.', 99999, 1, '20938620661', 'Masculino', '1960-10-10', 6),
(929, ' Oscar Emilio', 'CARABAJAL', 21629396, 2391, ' ', 'PUNA OESTE nro. 84', 99999, 1, '20216293968', 'Masculino', '1970-08-19', 8),
(930, ' Victor Horacio', 'YAÑEZ MENA', 22583439, 2395, ' ', 'Avda Bolivia nro. 1821', 99999, 1, '20225834394', 'Masculino', '1972-04-14', 7),
(931, ' Patricia Del Valle', 'BARRERA', 20358632, 2397, ' ', '13 De Diciembre nro. 1431', 3885222208, 1, '27203586324', 'Femenino', '1969-01-10', 3),
(932, ' Oscar Ruben', 'PELOX', 20455125, 2398, ' ', 'San Lorenzo nro. 1225', 99999, 1, '20204551252', 'Masculino', '1969-05-11', 7),
(933, ' Jorge Antonio', 'USTARES', 28998767, 2401, ' ', 'Teniente Lopez - 284 Viviendas nro. 1133', 3885826313, 1, '20289987674', 'Masculino', '1981-10-19', 3),
(934, ' Claudia Mariana', 'PRIETO', 24790833, 2402, ' ', 'Vieytes nro. 570', 99999, 1, '27247908337', 'Femenino', '1975-11-11', 3),
(935, ' Claudia Estela', 'ROJAS', 24324633, 2404, ' ', 'Balcarce nro. 389', 3884658163, 1, '23243246334', 'Femenino', '1974-12-03', 3),
(936, ' Elizabeth Edith Del', 'LLAMPA', 29629093, 2405, ' ', 'Colon nro. 1113', 3884966153, 1, '27296290934', 'Femenino', '1982-08-03', 3),
(937, ' Miriam Claudia', 'GUTIERREZ', 20358664, 2406, ' ', 'Incahuasi - 249 Viviendas nro. 1377', 3885195399, 1, '27203586642', 'Femenino', '1969-01-23', 3),
(938, ' Miguel Angel', 'MARTINEZ', 20549338, 2407, ' ', 'Mariano Moreno nro. 129', 3885108974, 1, '20205493388', 'Masculino', '1969-01-05', 3),
(939, ' Marcela Alejandra', 'TAPIA', 25798535, 2411, ' ', 'Rivadavia nro. 16', 99999, 1, '27257985356', 'Femenino', '1977-04-09', 4),
(940, ' Matias', 'TERUEL', 29707815, 2421, ' ', 'San Martin 327 nro. 327', 3885213608, 1, '20297078152', 'Masculino', '1982-11-04', 14),
(941, ' Etelvina Noemi', 'CRUZ', 13284150, 2422, ' ', 'Avda 1º De Mayo nro. 124', 3884139807, 1, '27132841506', 'Femenino', '1959-07-18', 4),
(942, ' Victor Hugo', 'CELI', 17080479, 2423, ' ', 'CASABINDO nro. 985', 99999, 1, '20170804792', 'Masculino', '1965-04-25', 2),
(943, ' Ariel', 'FIGUEROA', 27514789, 2425, ' ', 'Mza 34 Lote 16 nro.', 99999, 1, '20275147894', 'Masculino', '1980-08-31', 2),
(944, ' Hector Manuel', 'CARRAL', 21102707, 2427, ' ', 'Fca Zabala nro.', 3884411925, 1, '20211027070', 'Masculino', '1969-06-28', 2),
(945, ' Franco Dario', 'RAMOA', 31455427, 2428, ' ', 'Rio Bamba nro. 258', 99999, 1, '20314554273', 'Masculino', '1985-03-07', 15),
(946, ' Hugo Ariel', 'MAMANI', 25448873, 2429, ' ', 'Escaya nro. 749', 3884299413, 1, '23254488739', 'Masculino', '1976-07-24', 4),
(947, ' Noemy Alicia', 'TOLAY', 14787453, 2431, ' ', 'Peru nro. 1139', 3885961586, 1, '27147874532', 'Femenino', '1961-04-27', 4),
(948, ' Fernando Ciro', 'BORQUEZ ROMANO', 17879312, 2432, ' ', 'Jorge Newbery nro. 328', 3886040901, 1, '20178793129', 'Masculino', '1966-04-26', 4),
(949, ' Cesar Francisco', 'VEDIA', 23755371, 2433, ' ', 'H. Orellana nro. 1525', 99999, 1, '20237553714', 'Masculino', '1974-02-14', 6),
(950, ' Maria Angelica', 'FLORES', 24504445, 2446, ' ', 'DR. ZABALA nro. 42', 3884758173, 1, '27245044459', 'Femenino', '1975-02-23', 8),
(951, ' Sergio Daniel', 'RIVERO', 25663854, 2453, ' ', 'Mza 589 Lote 33 - Sector B6 nro.', 3884394354, 1, '20256638542', 'Masculino', '1977-02-16', 4),
(952, ' Diego Martin', 'ZEBALLOS', 25954080, 2455, ' ', 'Remedios De Escalada nro. 214', 3885766076, 1, '24259540808', 'Masculino', '1977-04-16', 3),
(953, ' Juan Manuel', 'OVEJERO', 22874468, 2466, ' ', 'Tte Bean-Mza712 Lote15- 65 Viv nro. 936', 99999, 1, '23228744689', 'Masculino', '1972-11-11', 4),
(954, ' Eduardo Martin', 'MAMANI', 23943128, 2468, ' ', 'Avda Mina El Aguilar nro. 439', 3885893879, 1, '20239431284', 'Masculino', '1974-07-20', 2),
(955, ' Gustavo Daniel', 'CASTILLO', 25954561, 2483, ' ', 'Zurita nro. 309', 3885700197, 1, '20259545618', 'Masculino', '1977-06-17', 14),
(956, ' Martin Alejandro', 'PALMA', 23755078, 2506, ' ', 'Av nro. El Exodo nro. 654', 99999, 1, '20237550782', 'Masculino', '1974-01-08', 5),
(957, ' Laura Jimena', 'CANTERO', 26793174, 2531, ' ', 'Av. Sajama nro. MZ.C LOTE4', 99999, 1, '27267931742', 'Femenino', '1978-09-08', 5),
(958, ' Cecilia Milagros', 'AGUILERA', 27520920, 2533, ' ', 'Palenque nro. 128', 3885141070, 1, '27275209207', 'Femenino', '1979-11-06', 2),
(959, ' Victor Alejandro', 'ORTEGA', 25287313, 2534, ' ', 'Monteagudo nro. 60', 3885888279, 1, '23252873139', 'Masculino', '1976-11-11', 12),
(960, ' Jose Ariel', 'MAMANI', 26793759, 2544, ' ', 'Pasaje 90 nro. 592', 3884854175, 1, '20267937592', 'Masculino', '1978-11-14', 6),
(961, ' Hugo Cesar', 'BACA', 25954363, 2559, ' ', 'PJE. 12 nro. 477', 3885074116, 1, '20259543631', 'Masculino', '1977-05-30', 6),
(962, ' Edgardo Domingo', 'MENDOZA', 28124612, 2561, ' ', 'Leon Este nro. 954', 3884107448, 1, '20281246128', 'Masculino', '1980-06-30', 5),
(963, ' Leonardo Antonio', 'HEREDIA', 29211032, 2562, ' ', 'Toquero nro. 1073', 99999, 1, '20292110325', 'Masculino', '1982-02-03', 5),
(964, ' Armando', 'MACHACA', 26669194, 2565, ' ', 'Purma nro. 956', 3884659850, 1, '20266691948', 'Masculino', '1978-08-10', 1),
(965, ' Oscar Osvaldo', 'TARRAGA', 23986049, 2568, ' ', '24 De Septiembre nro. 1120', 3886860054, 1, '20239860495', 'Masculino', '1968-08-17', 4),
(966, ' Oscar Julian Marcelo', 'FLORES', 25064395, 2571, ' ', 'Avda Mina Puesto Viejo nro. 1152', 3884969743, 1, '20250643951', 'Masculino', '1976-01-03', 6),
(967, ' Jesus Maria', 'PELLEGRINI', 23167063, 2572, ' ', 'Lavalle nro. 137', 99999, 1, '20231670638', 'Masculino', '1973-01-01', 6),
(968, ' Concepcion Pamela Mo', 'PAREDES', 27874025, 2575, ' ', '23 De Agosto nro. 889', 3884191946, 1, '27278740256', 'Femenino', '1979-12-08', 2),
(969, ' Soledad Maria', 'VARGAS LUXARDO', 25954840, 2576, ' ', 'Olegario Victor Andrade nro. 953', 3885264082, 1, '27259548409', 'Femenino', '1977-08-05', 5),
(970, ' Sebastian Federico', 'MENDIETA', 28227385, 2577, ' ', 'Tres Cruces nro. 318', 3885041940, 1, '20282273854', 'Masculino', '1981-02-17', 3),
(971, ' Jose Orlando', 'ZAPANA', 14374225, 2579, ' ', 'Avda Jose H. Martiarena nro. 217', 99999, 1, '20143742254', 'Masculino', '1961-05-14', 2),
(972, ' Norberto Elio', 'TEJERINA', 28205883, 2582, ' ', 'Los Quebrachales nro. 669', 3884622665, 1, '23282058839', 'Masculino', '1980-10-22', 8),
(973, ' Emilio Miguel', 'SURUGUAY', 20105841, 2583, ' ', 'desconocido', 99999, 1, '20201058415', 'Masculino', '0000-00-00', 5),
(974, ' Maria Soledad', 'BENITEZ', 23167416, 2603, ' ', 'Francisco Ferraro nro. 3662', 3884442430, 1, '27231674166', 'Femenino', '1973-04-08', 5),
(975, ' Juan Orlando', 'AGUIRRE', 13729418, 2604, ' ', 'Lote 14 Mza PA8 - Aeroparque nro.', 3885276453, 1, '20137294185', 'Masculino', '1957-09-13', 5),
(976, ' Sergio Hernan', 'SALVA', 26988912, 2613, ' ', 'Cabo 1º  Maldonado nro. 812', 99999, 1, '20269889129', 'Masculino', '1979-01-29', 10),
(977, ' Raquel Adela', 'FEILBOGEN', 13550410, 2617, ' ', 'Mariano Moreno nro. 1322', 3885173673, 1, '27135504101', 'Femenino', '1959-10-16', 4),
(978, ' Diego Esteban', 'GUTIERREZ', 28537169, 2621, ' ', 'Pueyrredon nro. 647', 99999, 1, '20285371695', 'Masculino', '1981-05-16', 12),
(979, ' Alberto', 'CARDOZO', 25377179, 2622, ' ', 'Rio Pilcomayo nro. 1350', 3885857646, 1, '20253771799', 'Masculino', '1976-05-29', 11),
(980, ' Alejandro Fidel', 'MAMANI', 28784282, 2623, ' ', 'Colon nro. 1084', 99999, 1, '20287842822', 'Masculino', '1981-04-13', 2),
(981, ' Juan Antonio', 'FERNANDEZ', 27220635, 2624, ' ', 'Caseros nro. 56', 99999, 1, '20272206350', 'Masculino', '1979-03-07', 12),
(982, ' Osvaldo Pedro', 'JULIAN', 23430483, 2625, ' ', 'San Pablo nro. 1425', 99999, 1, '20234304837', 'Masculino', '1973-09-11', 13),
(983, ' Brigido', 'TOCONAS', 18289745, 2626, ' ', 'Lote 10 Mza Pa 3 nro.', 99999, 1, '20182897451', 'Masculino', '1967-10-08', 2),
(984, ' Sebastian Alejandro', 'ARIAS', 26232941, 2627, ' ', 'Dr. Vidal nro. 1138', 99999, 1, '20262329411', 'Masculino', '1978-02-03', 5),
(985, ' Roberto Felix', 'GASPAR', 27232246, 2630, ' ', 'Gobernador Villafañe nro. 74', 3884612378, 1, '20272322466', 'Masculino', '1979-06-27', 5),
(986, ' Julio Cesar', 'MARTINEZ', 22210461, 2631, ' ', 'Peatonal 21 nro. 216', 3884419804, 1, '20222104611', 'Masculino', '1971-09-30', 6),
(987, ' Ariel Alejandro', 'AISAMA', 24504993, 2632, ' ', 'Jose De La Iglesia nro. 2208', 3885803797, 1, '20245049936', 'Masculino', '1975-04-15', 12),
(988, ' Victor Omar Ernesto', 'BARRIOS', 26675122, 2640, ' ', 'Pasaje Ushuaia nro. 505', 3884379451, 1, '27266751228', 'Masculino', '1978-07-01', 3),
(989, ' Guillermo Sebastian', 'REINOSO', 25954654, 2655, ' ', 'Tiraxi nro. 1068', 99999, 1, '20259546541', 'Masculino', '1977-07-20', 5),
(990, ' Ezequiel Ernesto', 'VILCA OCHOA', 26232868, 2656, ' ', 'Cuba nro. 1086', 3885044714, 1, '20262328687', 'Masculino', '1978-01-21', 5),
(991, ' Marcos Sebastian', 'FLORES', 27110633, 2657, ' ', 'Jorge Calvetti nro. 953', 3884291798, 1, '20271106336', 'Masculino', '1979-02-20', 5),
(992, ' Jorge Luis', 'PEÑALOZA', 22820852, 2658, ' ', 'Ejercito Del Norte nro. 1165', 99999, 1, '20228208524', 'Masculino', '1972-11-05', 5),
(993, ' Felipe Walter Dario', 'BELIZAN', 16434881, 2677, ' ', 'Roca nro. 374', 3884755761, 1, '20164348815', 'Masculino', '1963-11-03', 3),
(994, ' Daniel Alejandro', 'CHAVEZ', 27110530, 2702, ' ', 'Mina Tabacal nro. 728', 99999, 1, '20271105305', 'Masculino', '1979-03-06', 4),
(995, ' Estela Evangelina', 'CORIMAYO', 27872926, 2703, ' ', 'Capitan Krausse nro. 907', 3884874051, 1, '27278729260', 'Femenino', '1980-04-17', 4),
(996, ' Alfredo Rolando', 'ESPINOZA', 26130756, 2705, ' ', 'Zurita nro. 14', 3884394636, 1, '20261307562', 'Masculino', '1977-11-22', 1),
(997, ' Romina Paola', 'STACH', 27007377, 2706, ' ', 'Iriarte nro. 255', 3884075772, 1, '27270073773', 'Femenino', '1979-01-09', 1),
(998, ' Romina Alejandra', 'ARANCIBIA', 28856546, 2708, ' ', 'Edmundo Saldivar nro. 191', 3884756604, 1, '20288565466', 'Femenino', '1981-11-03', 6),
(999, ' Oscar Raul', 'MUGUERTEGUI', 14303948, 2717, ' ', 'Cabo Vargas - 281 Viviendas nro. 310', 3885072815, 1, '20143039480', 'Masculino', '1961-05-03', 4),
(1000, ' Oscar Alfredo', 'VALERIO IGNACIO', 25954860, 2719, ' ', 'Peatonal 25 nro. 1442', 3885097872, 1, '20259548609', 'Masculino', '1977-08-14', 4),
(1001, ' Fabian Santiago', 'GALLO', 28310851, 2720, ' ', 'Alvarez Prado nro. S/N', 3886043100, 1, '20283108512', 'Masculino', '1981-02-10', 4),
(1002, ' Miriam Beatriz', 'ALARCON', 16210085, 2721, ' ', 'Pueyrredon nro. 763', 99999, 1, '27162100853', 'Femenino', '1961-11-11', 13),
(1003, ' Claudia Giannina', 'RIVERO', 26232555, 2722, ' ', 'Avellaneda nro. 335', 99999, 1, '27262325550', 'Femenino', '1977-11-28', 3),
(1004, ' Bernardo Abraham', 'CRUZ', 30765456, 2723, ' ', 'Manuel de Azcuenaga nro. 444', 3884727039, 1, '20307654564', 'Masculino', '1984-04-04', 3),
(1005, ' Zulma Viviana', 'RAMIREZ', 27810845, 2724, ' ', 'Coranzuli nro. 374', 3884030918, 1, '27278108452', 'Femenino', '1980-01-21', 3),
(1006, ' Ruben Fabricio', 'RAMOA', 25287333, 2726, ' ', 'Rio Bamba nro. 258', 3885830923, 1, '20252873334', 'Masculino', '1976-10-17', 2),
(1007, ' Roque Sebastian', 'AGUIRRE', 26232447, 2727, ' ', 'Madreselva nro. 300', 3884616116, 1, '20262324479', 'Masculino', '1977-10-22', 7),
(1008, ' Gustavo Fabian', 'ALVAREZ', 24009708, 2728, ' ', 'Costanera nro. 108', 3885841476, 1, '20240097088', 'Masculino', '1974-09-16', 7),
(1009, ' Adalberto Ezequiel', 'COLQUE', 28310254, 2729, ' ', 'Teniente Bolzan Mza 13 Lote 2 nro.', 99999, 1, '20283102549', 'Masculino', '1980-11-21', 7),
(1010, ' Nestor Horacio', 'FARFAN', 23984263, 2735, ' ', 'Facundo Quiroga nro. 188', 99999, 1, '20239842632', 'Masculino', '1968-03-30', 2),
(1011, ' Hector Luis', 'MOLLO', 14787586, 2754, ' ', 'El Palenque nro. 187', 3884391727, 1, '20147875860', 'Masculino', '1961-01-05', 2),
(1012, ' Ernesto Ramon', 'VILTE', 28998297, 2765, ' ', 'Pablo Soria nro. 1195', 3884701448, 1, '20289982974', 'Masculino', '1981-08-30', 2),
(1013, ' Victor David', 'SAJAMA', 26793230, 2815, ' ', 'Republica Dominicana nro. 1165', 3884160511, 1, '20267932302', 'Masculino', '1978-09-16', 2),
(1014, ' Andrea Gabriela', 'CANDIDO', 24399329, 2930, ' ', 'Roque Alvarado nro. 1630', 3884169888, 1, '27243993291', 'Femenino', '1975-01-29', 4),
(1015, ' Hector Oscar', 'TARIFA', 13550399, 2947, ' ', 'Calilegua nro. 847', 99999, 1, '20135503992', 'Masculino', '1959-11-30', 2),
(1016, ' Carmen Esther', 'DOMINGUEZ', 25064174, 2948, ' ', 'Prol. Ascasubi Lote 17 Mza 1 nro.', 3886850666, 1, '27250641740', 'Femenino', '1975-11-20', 2),
(1017, ' Marcos Antonio', 'SAPAG', 23167118, 2976, ' ', 'Peatonal 38 nro. 554', 3885799730, 1, '20231671189', 'Masculino', '1973-01-10', 2),
(1018, ' Eva Fatima', 'ALEJO', 14089788, 3019, ' ', 'Talcahuano nro. 1237', 3885840331, 1, '23140897884', 'Femenino', '1961-02-02', 2),
(1019, ' Judith Elizabeth', 'PAREDES GARCIA', 24504853, 3032, ' ', 'Pje S/N E/Vivaro Y Guayacan nro.', 3885854918, 1, '27245048535', 'Femenino', '1975-04-03', 2),
(1020, ' Maria Marta', 'PINTADO', 17502987, 3070, ' ', 'Barcena Mza 102 Lote 28 nro.', 99999, 1, '27175029872', 'Femenino', '1965-12-22', 1),
(1021, ' Cristian Ezequiel', 'JARA', 28157133, 3189, ' ', 'El Piquete nro. 1166', 99999, 1, '20281571339', 'Masculino', '1980-05-20', 3),
(1022, ' Ana Veronica', 'GALLARA', 31590363, 3195, ' ', 'Padre Enrique Dimario nro. 79', 3884883697, 1, '27315903632', 'Femenino', '1985-05-12', 5),
(1023, ' Analia Raquel', 'VERA', 26793084, 3197, ' ', 'SANTA FE nro. 2111', 99999, 1, '27267930843', 'Femenino', '1978-07-22', 5),
(1024, ' Carlos Romualdo', 'CORTEZ', 24153110, 3200, ' ', 'Estados Unidos nro. 1199', 3884173918, 1, '20241531105', 'Masculino', '1974-08-24', 9),
(1025, ' Ariadna', 'TABERA', 21520606, 3201, ' ', 'desconocido', 3884709482, 1, '27215206063', 'Femenino', '1971-02-24', 9),
(1026, ' Patricia Isabel', 'BARRO MALDONADO', 30029403, 3203, ' ', 'desconocido', 3885876905, 1, '27300294036', 'Femenino', '1983-09-06', 9),
(1027, ' Diego Rene', 'CABRERA TAMES', 28124642, 3204, ' ', 'desconocido', 99999, 1, '23281246429', 'Masculino', '1980-07-14', 9),
(1028, ' Liliana Griselda', 'COSTILLA', 23755102, 3206, ' ', '0', 99999, 1, '27237551023', 'Femenino', '1973-12-28', 5),
(1029, ' Luis Enrique', 'TOLABA', 23813156, 3209, ' ', 'Zurita nro. 516', 99999, 1, '20238131562', 'Masculino', '1974-06-08', 5),
(1030, ' Maria Ofelia', 'PEREZ', 14924545, 3211, ' ', 'Dr Moreno nro. 2236', 3884868366, 1, '27149245451', 'Femenino', '1962-04-27', 5),
(1031, ' Diego Pablo Gabriel', 'EL JADUE', 30858218, 3212, ' ', 'Peatonal 25 nro. 1557', 3884195902, 1, '20308582184', 'Masculino', '1984-07-05', 16),
(1032, ' Nelda Adriana', 'PERALTA', 17402306, 3215, ' ', 'Tte. Bolzan - 337 Viviendas nro. 1073', 3885851571, 1, '27174023064', 'Femenino', '1964-12-16', 12),
(1033, ' Viviana Elizabeth', 'TABOADA', 23581389, 3219, ' ', 'Leguizamon nro. 1044', 99999, 1, '24235813897', 'Femenino', '1973-01-01', 3),
(1034, ' Bruno', 'LENARDUZZI', 33236543, 3220, ' ', 'Curupaiti nro. 781', 3884296486, 1, '20332365437', 'Masculino', '1988-03-03', 5),
(1035, ' Diego Joaquin', 'COLINA', 28250293, 3345, ' ', 'El Rosedal nro. 148', 3884674242, 1, '20282502934', 'Masculino', '1980-11-12', 3),
(1036, ' Carina Griselda', 'VARGAS', 28310109, 3407, ' ', 'Leon Este nro. 954', 3885874964, 1, '27283101091', 'Femenino', '1980-11-04', 4),
(1037, ' Ines Valeria', 'CHAPUR', 28250134, 3408, ' ', 'Balcarce nro. 389', 3884840840, 1, '27282501347', 'Femenino', '1980-11-02', 4),
(1038, ' Silvia Alejandra', 'NOLASCO', 30417511, 3409, ' ', 'Dr. Baldi nro. 1494', 99999, 1, '27304175112', 'Femenino', '1983-11-10', 4),
(1039, ' Rodrigo Fernando', 'ARMATA', 30541635, 3410, ' ', 'Las Vicuñas nro. 103', 99999, 1, '20305416356', 'Masculino', '1983-10-14', 1),
(1040, ' Maria Ines', 'PEREZ REINALDI', 23167043, 3411, ' ', 'Pje. Boedo nro. 899', 3885701796, 1, '27231670438', 'Femenino', '1972-12-22', 1),
(1041, ' Victor Fernando', 'ARAMAYO', 24816639, 3475, ' ', 'Las Heras nro. 828', 3885013036, 1, '20248166399', 'Masculino', '1975-09-01', 4),
(1042, ' Claudia Beatriz', 'UGARTE SOTELO', 17771371, 3479, ' ', 'Pje Boedo nro. 978', 99999, 1, '27177713711', 'Femenino', '1966-06-14', 4),
(1043, ' Nelson', 'TARRAGA', 13016907, 3480, ' ', '0', 99999, 1, '20130169075', 'Masculino', '1959-02-13', 4),
(1044, ' Rafael Americo', 'AGUIRRE', 20455463, 3517, ' ', '0', 3885171182, 1, '20204554634', 'Masculino', '1969-08-13', 4),
(1045, ' Pablo Rolando', 'MANZARA', 25448869, 3586, ' ', 'TTE Guadagnini nro. 90', 3885198666, 1, '20254488691', 'Masculino', '1976-08-02', 5),
(1046, ' Eduardo Marcelo', 'RIVERO', 20347669, 3588, ' ', 'Incahuasi nro. 1175', 99999, 1, '20203476699', 'Masculino', '1968-10-06', 5),
(1047, ' Sol Lihue', 'ABAN', 31036880, 3592, ' ', 'Tapalque nro. 24', 3886859233, 1, '27310368801', 'Femenino', '1985-01-23', 5),
(1048, ' Juan Ezequiel', 'OZAN', 30029254, 3595, ' ', 'Gdor. Tello nro. 115', 3885018274, 1, '20300292543', 'Masculino', '1983-06-19', 5),
(1049, ' Saturnino', 'PEÑALVA', 24637387, 3597, ' ', 'desconocido', 99999, 1, '20246373877', 'Masculino', '1999-01-01', 5),
(1050, ' Fernando Gabriel', 'PEREZ', 24504735, 3598, ' ', 'desconocido', 3885809015, 1, '20245047356', 'Masculino', '1975-03-09', 5),
(1051, ' Dario Hernan', 'TORREGGIANI ESTOPIÑA', 25954932, 3603, ' ', 'Peatonal 38 nro. 475', 3885719495, 1, '23259549329', 'Masculino', '1977-08-31', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_afiliado`
--

CREATE TABLE `aud_afiliado` (
  `idusuario` int(11) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `operacion` char(1) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nro_doc` int(11) NOT NULL,
  `legajo` int(11) NOT NULL,
  `correo` text NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `cuil` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `dependencia` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aud_afiliado`
--

INSERT INTO `aud_afiliado` (`idusuario`, `dateadd`, `operacion`, `nombre`, `apellido`, `nro_doc`, `legajo`, `correo`, `domicilio`, `telefono`, `cuil`, `sexo`, `fecha_nac`, `dependencia`, `estado`) VALUES
(1, '2021-05-06 10:52:16', 'A', 'ro', 'stach', 25487, 5874, '', '', 154878965, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-06 11:12:49', 'A', 'nelson', 'mandela', 124578, 0, '', '', 124587, NULL, NULL, NULL, NULL, 1),
(2, '2021-05-06 11:23:35', 'A', 'miliqui', 'flower', 45789654, 2547, 'mili@hotmail.com', 'avenida exodo 330 - barrio gorriti', 388794562, NULL, NULL, NULL, NULL, 1),
(2, '2021-05-06 11:28:02', 'A', 'erica', 'sanchez', 58745874, 0, 'eri@gmail.com', 'juan manuel de rosas', 45785698, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-07 08:04:32', 'M', 'nelson martin', 'mandela', 124578, 254, '', 'maimara 233', 124587, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:26:20', 'B', '', '', 0, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:27:56', 'B', '', '', 0, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:30:25', 'B', '', '', 0, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:45:34', 'B', 'lucas', '', 0, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:48:21', 'B', 'erica', 'sanchez', 58745874, 0, '', 'juan manuel de rosas', 45785698, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-07 09:49:16', 'B', 'erica', 'sanchez', 58745874, 0, 'eri@gmail.com', 'juan manuel de rosas', 45785698, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-13 19:56:27', 'A', 'raquel', 'palacios', 2563987, 0, '', '', 154789654, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-13 19:58:33', 'M', 'daniel', 'espino', 27232288, 7845, 'daniel@yahoo.com', '', 154789632, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-13 19:59:00', 'M', 'raquel', 'palacios', 2563987, 1215, 'raquel@yahoo.com', '', 154789654, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-13 20:00:14', 'B', 'raquel', 'palacios', 2563987, 1215, 'raquel@yahoo.com', '', 154789654, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-14 19:28:11', 'A', 'sergio', 'altamirano', 26547547, 2145, '', '', 2147483647, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-17 10:01:13', 'B', 'sergio', 'altamirano', 26547547, 2145, '', '', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-27 17:59:26', 'A', 'sebastian', 'arias', 25896321, 2569, 'arias@gmail.com', 'avenida los lapachos 255', 2147483647, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-27 18:00:48', 'A', 'sebastian', 'arias', 92563562, 1523, 'arias@gmail.com', 'avenida los lapachos 255', 3885236, NULL, NULL, NULL, NULL, 1),
(1, '2021-05-27 18:01:24', 'B', 'sebastian', 'arias', 25896321, 2569, 'arias@gmail.com', 'avenida los lapachos 255', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-05-27 20:15:42', 'A', 'Milagros Soledad', 'Alcoba', 2659874, 111, 'raquel12@yahoo.com', 'almada 255', 154789665, 0, 'Femenino', '1978-05-28', 3, 1),
(1, '2021-05-30 18:23:33', 'M', 'sebastian', 'arias', 92563562, 1523, 'arias@gmail.com', 'avenida los lapachos 257', 3885236, 0, 'Masculino', '1979-05-02', 7, 1),
(1, '2021-05-30 19:25:14', 'A', 'alejandro', 'toconas', 27111, 555, '', 'exodo 330', 3887957, NULL, 'Masculino', '1986-12-02', 5, 0),
(1, '2021-06-17 20:13:24', 'B', 'Julian', 'acosta', 1245, 1215, 'acosta@gmail.com', '', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-07-23 09:41:27', 'A', '', '', 20089999, 0, '', '', 0, NULL, '', '0000-00-00', 0, 0),
(1, '2021-07-28 16:32:04', 'A', '', '', 2700737, 0, '', '', 0, NULL, '', '0000-00-00', 0, 0),
(1, '2021-07-28 16:32:04', 'A', '', '', 27007377, 0, '', '', 0, NULL, '', '0000-00-00', 0, 0),
(4, '2021-09-13 16:49:31', 'B', '', '', 27007377, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(4, '2021-09-13 16:49:35', 'B', '', '', 2700737, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(4, '2021-09-13 16:49:37', 'B', '', '', 20089999, 0, '', '', 0, NULL, NULL, NULL, NULL, 0),
(1, '2021-09-13 16:51:01', 'A', '', '', 6398, 0, '', '', 0, NULL, '', '0000-00-00', 0, 0),
(1, '2021-09-21 19:10:37', 'B', ' Lucia', 'AUCAPIÑA CASTILLO', 11663306, 1089, ' ', 'Roberto Sancho, 3457', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-09-21 19:10:48', 'B', ' Mario Daniel', 'ALARCON', 22777223, 2184, ' ', '283 - 67 Viviendas, 869', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-09-21 19:10:56', 'B', ' Fernando Alfredo', 'AGUIRRE', 23053682, 2029, ' ', 'SANTA FE, 1555', 2147483647, NULL, NULL, NULL, NULL, 0),
(1, '2021-09-21 19:11:57', 'B', 'Miriam Isabel', 'ALEJO', 13550594, 1043, ' ', 'Pje Alberto Genari, 200', 2147483647, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_financiera`
--

CREATE TABLE `aud_financiera` (
  `nombre` varchar(50) NOT NULL,
  `cuil` int(13) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `operacion` varchar(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aud_financiera`
--

INSERT INTO `aud_financiera` (`nombre`, `cuil`, `domicilio`, `telefono`, `correo`, `estado`, `operacion`, `id_usuario`, `fecha`) VALUES
('eye', 232323, 'avenida fascio 110', 15489654, 'sanchez@gmail.com', 1, 'M', 1, '2021-05-13 19:44:19'),
('mar y marea', 656565, '', 1547896321, '', 1, 'A', 1, '2021-05-13 19:45:15'),
('mar y marea', 656565, '', 1547896321, '', 0, 'B', 1, '2021-05-13 19:46:50'),
('alancay', 787878, 'iriarte 55', 388456987, 'alancay@gmail.com', 1, 'M', 1, '2021-05-13 19:47:17'),
('', 0, '', 0, '', 0, 'B', 1, '2021-05-17 08:30:49'),
('alancay', 787878, 'iriarte 55', 388456987, 'alancay@gmail.com', 0, 'B', 1, '2021-05-17 10:01:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_ordenes`
--

CREATE TABLE `aud_ordenes` (
  `id_orden` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `id_financiera` int(11) NOT NULL,
  `id_cuota` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `n_cuotas` int(2) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `operacion` varchar(1) NOT NULL,
  `fecha_operacion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usuario_alta` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aud_ordenes`
--

INSERT INTO `aud_ordenes` (`id_orden`, `id_afiliado`, `id_financiera`, `id_cuota`, `estado`, `monto`, `n_cuotas`, `id_usuario`, `operacion`, `fecha_operacion`, `id_usuario_alta`, `fecha_alta`) VALUES
(48, 26, 1, 1, 'Pendiente', '1000.00', 3, 1, 'A', '2021-08-23 09:07:44', 1, '2021-08-23 09:07:44'),
(49, 26, 1, 147, 'Pendiente', '17000.00', 6, 1, 'A', '2021-08-30 08:31:29', 1, '2021-08-30 08:31:29'),
(50, 26, 1, 97, 'Pendiente', '2000.00', 9, 1, 'A', '2021-08-30 09:07:11', 1, '2021-08-30 09:07:11'),
(0, 26, 1, 97, 'Autorizada', '2000.00', 9, 1, 'M', '2021-08-30 09:07:55', 0, '0000-00-00 00:00:00'),
(0, 26, 1, 147, 'Autorizada', '17000.00', 6, 1, 'M', '2021-08-30 10:47:18', 0, '0000-00-00 00:00:00'),
(0, 27, 1, 3, 'Autorizada', '50000.00', 10, 4, 'M', '2021-09-13 16:46:29', 0, '0000-00-00 00:00:00'),
(53, 19, 2, 8, 'Pendiente', '9000.00', 3, 1, 'A', '2021-09-15 15:01:59', 1, '2021-09-15 15:01:59'),
(54, 19, 2, 10, 'Pendiente', '9000.00', 9, 1, 'A', '2021-09-15 15:04:49', 1, '2021-09-15 15:04:49'),
(55, 19, 2, 8, 'Pendiente', '300.00', 3, 1, 'A', '2021-09-15 15:07:32', 1, '2021-09-15 15:07:32'),
(56, 20, 2, 9, 'Pendiente', '100.00', 6, 1, 'A', '2021-09-17 10:27:36', 1, '2021-09-17 10:27:36'),
(57, 20, 2, 9, 'Pendiente', '1548.00', 6, 1, 'A', '2021-09-17 11:29:28', 1, '2021-09-17 11:29:28'),
(0, 20, 2, 9, 'Autorizada', '100.00', 6, 1, 'M', '2021-09-17 12:11:10', 0, '0000-00-00 00:00:00'),
(58, 20, 2, 9, 'Pendiente', '1548444.00', 6, 1, 'A', '2021-09-17 12:12:35', 1, '2021-09-17 12:12:35'),
(0, 20, 2, 9, 'Autorizada', '1548444.00', 6, 1, 'M', '2021-09-17 12:12:52', 0, '0000-00-00 00:00:00'),
(59, 20, 2, 9, 'Pendiente', '15487.00', 6, 1, 'A', '2021-09-21 16:26:13', 1, '2021-09-21 16:26:13'),
(60, 19, 2, 10, 'Pendiente', '1000.00', 9, 1, 'A', '2021-09-21 16:53:10', 1, '2021-09-21 16:53:10'),
(60, 19, 2, 10, 'Autorizada', '1000.00', 9, 1, 'M', '2021-09-21 16:59:06', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_pagos_oc`
--

CREATE TABLE `aud_pagos_oc` (
  `id_orden` int(11) NOT NULL,
  `id_financiera` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `id_usuario_alta` int(11) NOT NULL,
  `importe_cuota` decimal(10,2) NOT NULL,
  `nro_cuota` int(2) NOT NULL,
  `fecha_vencimiento` varchar(20) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `estado` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `operacion` varchar(1) NOT NULL,
  `fecha_operacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aud_pagos_oc`
--

INSERT INTO `aud_pagos_oc` (`id_orden`, `id_financiera`, `id_afiliado`, `id_usuario_alta`, `importe_cuota`, `nro_cuota`, `fecha_vencimiento`, `fecha_pago`, `estado`, `id_usuario`, `operacion`, `fecha_operacion`) VALUES
(19, 0, 0, 1, '830360.87', 1, '6/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 2, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 3, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 4, '9/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 5, '10/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 6, '11/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(19, 0, 0, 1, '830360.87', 7, '12/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:29:12'),
(20, 0, 0, 1, '213274.35', 1, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(20, 0, 0, 1, '213274.35', 2, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(20, 0, 0, 1, '213274.35', 3, '9/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(20, 0, 0, 1, '213274.35', 4, '10/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(20, 0, 0, 1, '213274.35', 5, '11/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(20, 0, 0, 1, '213274.35', 6, '12/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:34:35'),
(21, 0, 0, 1, '2040.00', 1, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:37:39'),
(21, 0, 0, 1, '2040.00', 2, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:37:39'),
(21, 0, 0, 1, '2040.00', 3, '9/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-16 16:37:39'),
(21, 0, 0, 1, '2040.00', 1, '', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:50:26'),
(21, 0, 0, 1, '2040.00', 2, '', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:50:26'),
(21, 0, 0, 1, '2040.00', 3, '', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:50:26'),
(21, 0, 0, 1, '2040.00', 1, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:51:56'),
(21, 0, 0, 1, '2040.00', 2, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:51:56'),
(21, 0, 0, 1, '2040.00', 3, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:51:56'),
(21, 0, 0, 1, '2040.00', 1, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:52:29'),
(21, 0, 0, 1, '2040.00', 2, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:52:29'),
(21, 0, 0, 1, '2040.00', 3, '6/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:52:29'),
(19, 0, 0, 1, '830360.87', 1, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 2, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 3, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 4, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 5, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 6, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(19, 0, 0, 1, '830360.87', 7, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 09:57:15'),
(6, 0, 0, 1, '3060.00', 1, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 19:41:09'),
(6, 0, 0, 1, '3060.00', 2, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 19:41:10'),
(6, 0, 0, 1, '3060.00', 3, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 19:41:10'),
(6, 0, 0, 1, '3060.00', 4, '05/2021', '0000-00-00 00:00:00', 0, 1, 'B', '2021-05-17 19:41:10'),
(1548, 0, 0, 1, '1020.00', 1, '6/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1548, 0, 0, 1, '1020.00', 2, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1548, 0, 0, 1, '1020.00', 3, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1548, 0, 0, 1, '1020.00', 4, '9/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1548, 0, 0, 1, '1020.00', 5, '10/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1548, 0, 0, 1, '1020.00', 6, '11/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-19 18:58:45'),
(1256, 0, 0, 1, '3400.00', 1, '6/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:12:54'),
(1256, 0, 0, 1, '3400.00', 2, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:12:54'),
(1256, 0, 0, 1, '3400.00', 3, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:12:54'),
(1256, 0, 0, 1, '3400.00', 4, '9/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:12:54'),
(1256, 0, 0, 1, '3400.00', 5, '10/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:12:54'),
(589, 0, 0, 1, '20400.00', 1, '6/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:13:36'),
(589, 0, 0, 1, '20400.00', 2, '7/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:13:36'),
(589, 0, 0, 1, '20400.00', 3, '8/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-05-24 11:13:36'),
(1256, 0, 0, 0, '3400.00', 1, '', '0000-00-00 00:00:00', 1, 1, 'M', '2021-06-17 20:56:56'),
(15, 0, 0, 0, '5100.00', 1, '6/2021', '2021-06-17 21:34:10', 1, 1, 'M', '2021-06-17 21:34:10'),
(15, 0, 0, 0, '5100.00', 2, '7/2021', '2021-06-17 21:35:47', 1, 1, 'M', '2021-06-17 21:35:47'),
(15, 0, 0, 0, '5100.00', 3, '8/2021', '2021-06-17 21:36:07', 1, 1, 'M', '2021-06-17 21:36:07'),
(1256, 0, 0, 0, '3400.00', 2, '7/2021', '2021-06-21 17:25:21', 1, 1, 'M', '2021-06-21 17:25:21'),
(1256, 0, 0, 0, '3400.00', 3, '8/2021', '2021-06-21 17:27:09', 1, 1, 'M', '2021-06-21 17:27:09'),
(1256, 0, 0, 0, '3400.00', 4, '9/2021', '2021-06-21 17:27:14', 1, 1, 'M', '2021-06-21 17:27:14'),
(1256, 0, 0, 0, '3400.00', 5, '10/2021', '2021-06-21 17:27:20', 1, 1, 'M', '2021-06-21 17:27:20'),
(1256, 0, 0, 0, '3400.00', 6, '11/2021', '2021-06-21 17:46:59', 1, 1, 'M', '2021-06-21 17:46:59'),
(123, 0, 0, 4, '1020.00', 1, '8/2021', '0000-00-00 00:00:00', 2, 4, 'A', '2021-07-19 19:40:26'),
(123, 0, 0, 4, '1020.00', 2, '9/2021', '0000-00-00 00:00:00', 2, 4, 'A', '2021-07-19 19:40:26'),
(123, 0, 0, 4, '1020.00', 3, '10/2021', '0000-00-00 00:00:00', 2, 4, 'A', '2021-07-19 19:40:26'),
(123, 0, 0, 4, '1020.00', 4, '11/2021', '0000-00-00 00:00:00', 2, 4, 'A', '2021-07-19 19:40:26'),
(123, 0, 0, 4, '1020.00', 5, '12/2021', '0000-00-00 00:00:00', 2, 4, 'A', '2021-07-19 19:40:26'),
(50, 0, 0, 0, '355.00', 1, '9/2021', '2021-08-30 09:22:07', 1, 1, 'M', '2021-08-30 09:22:07'),
(60, 2, 19, 1, '168.89', 1, '10/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 2, '11/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 3, '12/2021', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 4, '1/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 5, '2/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 6, '3/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 7, '4/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 8, '5/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 9, '6/2022', '0000-00-00 00:00:00', 2, 1, 'A', '2021-09-21 16:53:10'),
(60, 2, 19, 1, '168.89', 1, '10/2021', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 2, '11/2021', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 3, '12/2021', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 4, '1/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 5, '2/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 6, '3/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 7, '4/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 8, '5/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 2, 19, 1, '168.89', 9, '6/2022', '0000-00-00 00:00:00', 3, 1, 'M', '2021-09-21 16:59:06'),
(60, 0, 0, 0, '168.89', 1, '10/2021', '2021-09-21 17:29:07', 1, 1, 'M', '2021-09-21 17:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aud_usuario`
--

CREATE TABLE `aud_usuario` (
  `idusuario_sesion` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `documento` int(11) NOT NULL,
  `operacion` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aud_usuario`
--

INSERT INTO `aud_usuario` (`idusuario_sesion`, `fecha`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `status`, `apellido`, `documento`, `operacion`) VALUES
(1, '2021-05-02 12:09:33', '', '', '', '', 0, 0, '', 0, ''),
(1, '2021-05-06 11:51:30', 'alejandra', 'ale@hotmail.com', 'ale123', 'a62039e2dd75ceffa3b72c632010c53a', 1, 1, 'di marco', 58963963, ''),
(1, '2021-05-06 16:00:21', 'luna', 'luna@gmail.com', 'luna', 'ba8a48b0e34226a2992d871c65600a7c', 2, 1, 'alejo', 58965896, 'A'),
(1, '2021-05-07 08:08:34', 'constanza daniela', 'cony@yahoo.com', 'cony123', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 'espinosa', 46235897, 'M'),
(4, '2021-05-07 08:14:43', 'constanza daniela', 'cony@yahoo.com', 'cony123', 'd41d8cd98f00b204e9800998ecf8427e', 2, 1, 'espinosa', 46235897, 'M'),
(4, '2021-05-07 08:14:49', 'constanza daniela', 'cony@yahoo.com', 'cony123', 'd41d8cd98f00b204e9800998ecf8427e', 2, 1, 'espinosa', 46235897, 'M'),
(1, '2021-05-07 10:29:08', 'LAURA', '', 'dde', 'ba00ecaaf5eb69e744692e9f0fded636', 0, 0, 'urzagasti', 568956, 'B'),
(1, '2021-05-07 10:31:17', 'julio', '', 'julio', '72af25874f0ddf0a3b2d7f0e70d05c40', 0, 0, 'gutierres', 26589478, 'B'),
(1, '2021-05-07 10:32:55', 'LAURA', 'roo@gmail.com', 'dde', 'ba00ecaaf5eb69e744692e9f0fded636', 0, 0, 'urzagasti', 568956, 'B'),
(1, '2021-05-08 20:06:10', 'LAURA', 'roo@gmail.com', 'dde_rr', 'd41d8cd98f00b204e9800998ecf8427e', 2, 1, 'urzagasti', 568956, 'M'),
(1, '2021-05-17 10:01:29', 'mariel', 'drgty@gmail.com', 'mariel', 'e23c619dac6c5d882be61b3970f21996', 0, 0, 'stach', 26589999, 'B'),
(1, '2021-05-19 18:38:34', 'constanza daniela', 'cony@yahoo.com', 'cony123', '38e63f10e615a64a08767e2d4840fc6f', 2, 1, 'espinosa', 46235897, 'M'),
(1, '2021-05-19 18:41:44', 'constanza daniela', 'cony@yahoo.com.ar', 'cony123', 'd41d8cd98f00b204e9800998ecf8427e', 2, 1, 'espinosa', 46235897, 'M'),
(1, '2021-05-31 18:07:15', 'Romina Paola', 'rominastach@gmail.com', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 'Stach', 26007377, 'M'),
(1, '2021-06-10 18:28:29', 'constanza daniela', 'cony@yahoo.com.ar', 'cony123', '38e63f10e615a64a08767e2d4840fc6f', 2, 1, 'espinosa', 46235897, 'M'),
(1, '2021-06-17 20:13:37', 'daniel david', 'dde@hotmail.com', 'daniel123', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 0, 0, ' espinosa', 26278596, 'B'),
(1, '2021-06-17 20:13:45', 'dedee', 'ddd@gmail.com', 'dede', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'alcocer', 26589741, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` bigint(20) NOT NULL,
  `cuit` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `cuit`, `nombre`, `razon_social`, `telefono`, `email`, `direccion`) VALUES
(1, '30-71015236-1', 'APUNJU', 'ASOCIACIÓN DE TRABAJADORES DE LA UNIVERSIDAD NACIONAL DE JUJUY', 4244435, 'contacto@apunju.org.ar', 'Gral. Alvear N° 1337');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuota` int(11) NOT NULL,
  `id_financiera` int(11) NOT NULL,
  `interes` decimal(10,2) NOT NULL,
  `n_cuotas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuota`, `id_financiera`, `interes`, `n_cuotas`) VALUES
(8, 2, '0.40', 3),
(9, 2, '0.50', 6),
(10, 2, '0.52', 9),
(92, 1, '1000.00', 3),
(93, 1, '1000.00', 6),
(94, 1, '1000.00', 9),
(95, 1, '2000.00', 3),
(96, 1, '2000.00', 6),
(97, 1, '2000.00', 9),
(98, 1, '3000.00', 3),
(99, 1, '3000.00', 6),
(100, 1, '3000.00', 9),
(101, 1, '3000.00', 12),
(102, 1, '4000.00', 3),
(103, 1, '4000.00', 6),
(104, 1, '4000.00', 9),
(105, 1, '4000.00', 12),
(106, 1, '5000.00', 3),
(107, 1, '5000.00', 6),
(108, 1, '5000.00', 9),
(109, 1, '5000.00', 12),
(110, 1, '5000.00', 18),
(111, 1, '6000.00', 3),
(112, 1, '6000.00', 6),
(113, 1, '6000.00', 9),
(114, 1, '6000.00', 12),
(115, 1, '6000.00', 18),
(116, 1, '7000.00', 3),
(117, 1, '7000.00', 6),
(118, 1, '7000.00', 9),
(119, 1, '7000.00', 12),
(120, 1, '7000.00', 18),
(121, 1, '8000.00', 3),
(122, 1, '8000.00', 6),
(123, 1, '8000.00', 9),
(124, 1, '8000.00', 12),
(125, 1, '8000.00', 18),
(126, 1, '9000.00', 3),
(127, 1, '9000.00', 6),
(128, 1, '9000.00', 9),
(129, 1, '9000.00', 12),
(130, 1, '9000.00', 18),
(131, 1, '10000.00', 3),
(132, 1, '10000.00', 6),
(133, 1, '10000.00', 9),
(134, 1, '10000.00', 12),
(135, 1, '10000.00', 18),
(136, 1, '12000.00', 3),
(137, 1, '12000.00', 6),
(138, 1, '12000.00', 9),
(139, 1, '12000.00', 12),
(140, 1, '12000.00', 18),
(141, 1, '15000.00', 3),
(142, 1, '15000.00', 6),
(143, 1, '15000.00', 9),
(144, 1, '15000.00', 12),
(145, 1, '15000.00', 18),
(146, 1, '17000.00', 3),
(147, 1, '17000.00', 6),
(148, 1, '17000.00', 9),
(149, 1, '17000.00', 12),
(150, 1, '17000.00', 18),
(151, 1, '20000.00', 3),
(152, 1, '20000.00', 6),
(153, 1, '20000.00', 9),
(155, 1, '20000.00', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencia` int(11) NOT NULL,
  `nombre_dep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencia`, `nombre_dep`) VALUES
(1, 'Facultad de Ciencias Económicas'),
(2, 'Facultad de Ciencias Agrarias'),
(3, 'Facultad de Ingeniería'),
(4, 'Facultad de Humanidades y Ciencias Sociales'),
(5, 'Rectorado'),
(6, 'Escuela de Minas'),
(7, 'INTEMI'),
(8, 'Instituto de Geología'),
(9, 'Radio'),
(10, 'SeCTER'),
(11, 'Mantenimiento'),
(12, 'Secretaría de Bienestar Universitario'),
(13, 'Instituto de Biología de la Altura'),
(14, 'Casa de la Cultura'),
(15, 'Secretaría de Extensión Universitaria'),
(16, 'Imprenta Universitaria'),
(17, 'Proyectos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financieras`
--

CREATE TABLE `financieras` (
  `id_financiera` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cuil` int(11) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `financieras`
--

INSERT INTO `financieras` (`id_financiera`, `nombre`, `cuil`, `domicilio`, `telefono`, `correo`, `estado`) VALUES
(1, 'eye', 232323, 'avenida fascio 110', 15489654, 'sanchez@gmail.com', 1),
(2, 'stach informatica', 1, 'exodo 330', 388547878, 'stach@gmail.com', 1),
(3, 'alancay', 787878, 'iriarte 55', 388456987, 'alancay@gmail.com', 0),
(4, 'mar y marea', 656565, '', 1547896321, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_afiliado` int(11) NOT NULL,
  `id_financiera` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `n_cuotas` int(3) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `id_cuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_afiliado`, `id_financiera`, `id_orden`, `fecha_alta`, `id_usuario`, `estado`, `n_cuotas`, `monto`, `id_cuota`) VALUES
(4, 2, 1, '2021-05-15 10:16:53', 1, 'Baja', 3, '30000.00', 0),
(4, 1, 2, '2021-05-15 10:22:55', 1, 'Pendiente', 5, '0.00', 0),
(9, 1, 5, '2021-05-15 10:46:46', 1, 'Baja', 3, '9000.00', 0),
(4, 2, 6, '2021-05-15 10:48:05', 1, 'Baja', 4, '12000.00', 0),
(17, 3, 18, '2021-05-15 11:19:18', 1, 'Pendiente', 4, '4000.00', 0),
(17, 3, 19, '2021-05-15 11:22:20', 1, 'Pendiente', 5, '5000.00', 0),
(17, 3, 20, '2021-05-15 11:31:28', 1, 'Pendiente', 5, '5000.00', 0),
(17, 3, 21, '2021-05-15 11:34:33', 1, 'Pendiente', 5, '5000.00', 0),
(9, 3, 25, '2021-05-16 15:29:38', 1, 'Pendiente', 6, '6000.00', 0),
(17, 3, 27, '2021-05-16 15:37:44', 1, 'Cancelada', 3, '25000.00', 0),
(17, 3, 28, '2021-05-16 15:40:12', 1, 'Autorizada', 5, '25000.00', 0),
(4, 1, 29, '2021-05-16 15:41:28', 1, 'Autorizada', 10, '12000.00', 0),
(4, 2, 30, '2021-05-16 16:11:18', 1, 'Pendiente', 3, '80000.00', 0),
(14, 2, 31, '2021-05-16 16:20:14', 1, 'Cancelada', 3, '3000.00', 0),
(14, 3, 32, '2021-05-16 16:29:12', 1, 'Baja', 7, '5698555.00', 0),
(17, 3, 33, '2021-05-16 16:34:35', 1, 'Pendiente', 6, '1254555.00', 0),
(9, 2, 34, '2021-05-16 16:37:39', 1, 'Baja', 3, '6000.00', 0),
(14, 1, 35, '2021-05-19 18:58:45', 1, 'Autorizada', 6, '6000.00', 0),
(14, 1, 36, '2021-05-24 11:12:54', 1, 'Cancelada', 6, '20000.00', 0),
(9, 1, 37, '2021-05-24 11:13:36', 1, 'Cancelada', 3, '60000.00', 0),
(19, 1, 38, '2021-07-19 19:40:26', 4, 'Autorizada', 5, '5000.00', 0),
(9, 1, 39, '2021-07-28 16:11:27', 1, '1', 3, '1000.00', 0),
(9, 1, 40, '2021-07-28 16:12:46', 1, 'Pendiente', 3, '1000.00', 1),
(4, 1, 41, '2021-08-02 18:46:26', 1, 'Pendiente', 6, '1000.00', 2),
(27, 1, 42, '2021-08-02 18:49:18', 1, 'Autorizada', 10, '50000.00', 3),
(27, 1, 43, '2021-08-02 19:13:46', 1, 'Pendiente', 3, '1000.00', 1),
(27, 1, 44, '2021-08-02 19:15:58', 1, 'Pendiente', 10, '50000.00', 3),
(19, 1, 45, '2021-08-10 08:48:26', 1, 'Pendiente', 10, '50000.00', 3),
(19, 1, 46, '2021-08-10 09:55:35', 1, 'Pendiente', 3, '1000.00', 1),
(19, 1, 47, '2021-08-10 09:55:41', 1, 'Pendiente', 3, '1000.00', 1),
(26, 1, 48, '2021-08-23 09:07:44', 1, 'Pendiente', 3, '1000.00', 1),
(26, 1, 49, '2021-08-30 08:31:29', 1, 'Autorizada', 6, '17000.00', 147),
(26, 1, 50, '2021-08-30 09:07:11', 1, 'Autorizada', 9, '2000.00', 97),
(19, 2, 51, '2021-09-14 18:19:45', 1, 'Pendiente', 9, '100.00', 10),
(19, 2, 52, '0000-00-00 00:00:00', 1, 'Pendiente', 5, '0.00', 8),
(19, 2, 53, '2021-09-15 15:01:59', 1, 'Pendiente', 3, '9000.00', 8),
(19, 2, 54, '2021-09-15 15:04:49', 1, 'Pendiente', 9, '9000.00', 10),
(19, 2, 55, '2021-09-15 15:07:32', 1, 'Pendiente', 3, '300.00', 8),
(20, 2, 56, '2021-09-17 10:27:36', 1, 'Autorizada', 6, '100.00', 9),
(20, 2, 57, '2021-09-17 11:29:28', 1, 'Pendiente', 6, '1548.00', 9),
(20, 2, 58, '2021-09-17 12:12:35', 1, 'Autorizada', 6, '1548444.00', 9),
(20, 2, 59, '2021-09-21 16:26:13', 1, 'Pendiente', 6, '15487.00', 9),
(19, 2, 60, '2021-09-21 16:53:10', 1, 'Autorizada', 9, '1000.00', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_oc`
--

CREATE TABLE `pagos_oc` (
  `id_orden` int(11) NOT NULL,
  `id_financiera` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `nro_cuota` int(3) NOT NULL,
  `fecha_vencimiento` varchar(10) NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `importe_cuota` decimal(10,2) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_oc`
--

INSERT INTO `pagos_oc` (`id_orden`, `id_financiera`, `id_afiliado`, `nro_cuota`, `fecha_vencimiento`, `fecha_pago`, `importe_cuota`, `estado`, `id_usuario`) VALUES
(6, 0, 0, 1, '', NULL, '3200.00', 0, 1),
(14, 0, 0, 1, 'null', NULL, '8500.00', 1, 1),
(14, 0, 0, 2, 'null', NULL, '8500.00', 1, 1),
(14, 0, 0, 3, 'null', '2021-05-17 20:57:59', '8500.00', 1, 1),
(15, 0, 0, 1, '6/2021', '2021-06-17 21:34:10', '5100.00', 1, 1),
(15, 0, 0, 2, '7/2021', '2021-06-17 21:35:47', '5100.00', 1, 1),
(15, 0, 0, 3, '8/2021', '2021-06-17 21:36:07', '5100.00', 1, 1),
(15, 0, 0, 4, '9/2021', NULL, '5100.00', 2, 1),
(15, 0, 0, 5, '10/2021', NULL, '5100.00', 2, 1),
(16, 0, 0, 1, '6/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 2, '7/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 3, '8/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 4, '9/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 5, '10/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 6, '11/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 7, '12/2021', NULL, '1224.00', 2, 1),
(16, 0, 0, 8, '1/2022', NULL, '1224.00', 2, 1),
(16, 0, 0, 9, '2/2022', NULL, '1224.00', 2, 1),
(16, 0, 0, 10, '3/2022', NULL, '1224.00', 2, 1),
(17, 0, 0, 1, '6/2021', NULL, '27200.00', 2, 1),
(17, 0, 0, 2, '7/2021', NULL, '27200.00', 2, 1),
(17, 0, 0, 3, '8/2021', NULL, '27200.00', 2, 1),
(18, 0, 0, 1, '6/2021', '2021-05-18 11:21:32', '1020.00', 1, 1),
(18, 0, 0, 2, '7/2021', '2021-06-17 20:09:37', '1020.00', 1, 1),
(18, 0, 0, 3, '8/2021', '2021-06-17 20:53:15', '1020.00', 1, 1),
(19, 0, 0, 1, '6/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 2, '7/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 3, '8/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 4, '9/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 5, '10/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 6, '11/2021', NULL, '830360.87', 0, 1),
(19, 0, 0, 7, '12/2021', NULL, '830360.87', 0, 1),
(20, 0, 0, 1, '7/2021', NULL, '213274.35', 1, 1),
(20, 0, 0, 2, '8/2021', NULL, '213274.35', 1, 1),
(20, 0, 0, 3, '9/2021', NULL, '213274.35', 2, 1),
(20, 0, 0, 4, '10/2021', NULL, '213274.35', 1, 1),
(20, 0, 0, 5, '11/2021', NULL, '213274.35', 1, 1),
(20, 0, 0, 6, '12/2021', NULL, '213274.35', 1, 1),
(21, 0, 0, 1, '7/2021', NULL, '2040.00', 2, 1),
(21, 0, 0, 2, '8/2021', NULL, '2040.00', 2, 1),
(21, 0, 0, 3, '9/2021', NULL, '2040.00', 2, 1),
(1548, 0, 0, 1, '6/2021', NULL, '1020.00', 2, 1),
(1548, 0, 0, 2, '7/2021', NULL, '1020.00', 2, 1),
(1548, 0, 0, 3, '8/2021', NULL, '1020.00', 2, 1),
(1548, 0, 0, 4, '9/2021', NULL, '1020.00', 2, 1),
(1548, 0, 0, 5, '10/2021', NULL, '1020.00', 2, 1),
(1548, 0, 0, 6, '11/2021', NULL, '1020.00', 2, 1),
(1256, 0, 0, 1, '6/2021', '2021-06-17 20:56:56', '3400.00', 1, 1),
(1256, 0, 0, 2, '7/2021', '2021-06-21 17:25:21', '3400.00', 1, 1),
(1256, 0, 0, 3, '8/2021', '2021-06-21 17:27:09', '3400.00', 1, 1),
(1256, 0, 0, 4, '9/2021', '2021-06-21 17:27:14', '3400.00', 1, 1),
(1256, 0, 0, 5, '10/2021', '2021-06-21 17:27:20', '3400.00', 1, 1),
(589, 0, 0, 1, '6/2021', '2021-06-17 12:25:36', '20400.00', 1, 1),
(589, 0, 0, 2, '7/2021', '2021-06-17 20:18:05', '20400.00', 1, 1),
(589, 0, 0, 3, '8/2021', '2021-06-17 21:28:53', '20400.00', 1, 1),
(1256, 0, 0, 6, '11/2021', '2021-06-21 17:46:59', '3400.00', 1, 1),
(123, 0, 0, 1, '8/2021', NULL, '1020.00', 2, 4),
(123, 0, 0, 2, '9/2021', NULL, '1020.00', 2, 4),
(123, 0, 0, 3, '10/2021', NULL, '1020.00', 2, 4),
(123, 0, 0, 4, '11/2021', NULL, '1020.00', 2, 4),
(123, 0, 0, 5, '12/2021', NULL, '1020.00', 2, 4),
(43, 0, 0, 1, '08/2021', NULL, '419.00', 2, 1),
(43, 0, 0, 2, '9/2021', NULL, '419.00', 2, 1),
(43, 0, 0, 3, '10/2021', NULL, '419.00', 2, 1),
(44, 0, 0, 1, '08/2021', NULL, '560.00', 2, 1),
(44, 0, 0, 2, '9/2021', NULL, '560.00', 2, 1),
(44, 0, 0, 3, '10/2021', NULL, '560.00', 2, 1),
(44, 0, 0, 4, '11/2021', NULL, '560.00', 2, 1),
(44, 0, 0, 5, '12/2021', NULL, '560.00', 2, 1),
(44, 0, 0, 6, '1/2022', NULL, '560.00', 2, 1),
(44, 0, 0, 7, '2/2022', NULL, '560.00', 2, 1),
(44, 0, 0, 8, '3/2022', NULL, '560.00', 2, 1),
(44, 0, 0, 9, '4/2022', NULL, '560.00', 2, 1),
(44, 0, 0, 10, '5/2022', NULL, '560.00', 2, 1),
(45, 0, 0, 1, '08/2021', NULL, '560.00', 2, 1),
(45, 0, 0, 2, '9/2021', NULL, '560.00', 2, 1),
(45, 0, 0, 3, '10/2021', NULL, '560.00', 2, 1),
(45, 0, 0, 4, '11/2021', NULL, '560.00', 2, 1),
(45, 0, 0, 5, '12/2021', NULL, '560.00', 2, 1),
(45, 0, 0, 6, '1/2022', NULL, '560.00', 2, 1),
(45, 0, 0, 7, '2/2022', NULL, '560.00', 2, 1),
(45, 0, 0, 8, '3/2022', NULL, '560.00', 2, 1),
(45, 0, 0, 9, '4/2022', NULL, '560.00', 2, 1),
(45, 0, 0, 10, '5/2022', NULL, '560.00', 2, 1),
(48, 0, 0, 1, '9/2021', NULL, '419.00', 2, 1),
(48, 0, 0, 2, '10/2021', NULL, '419.00', 2, 1),
(48, 0, 0, 3, '11/2021', NULL, '419.00', 2, 1),
(49, 0, 0, 1, '9/2021', NULL, '4105.00', 2, 1),
(49, 0, 0, 2, '10/2021', NULL, '4105.00', 2, 1),
(49, 0, 0, 3, '11/2021', NULL, '4105.00', 2, 1),
(49, 0, 0, 4, '12/2021', NULL, '4105.00', 2, 1),
(49, 0, 0, 5, '1/2022', NULL, '4105.00', 2, 1),
(49, 0, 0, 6, '2/2022', NULL, '4105.00', 2, 1),
(50, 0, 0, 1, '9/2021', '2021-08-30 09:38:28', '355.00', 1, 1),
(50, 0, 0, 2, '10/2021', '2021-08-30 09:38:36', '355.00', 1, 1),
(50, 0, 0, 3, '11/2021', NULL, '355.00', 2, 1),
(50, 0, 0, 4, '12/2021', NULL, '355.00', 2, 1),
(50, 0, 0, 5, '1/2022', NULL, '355.00', 2, 1),
(50, 0, 0, 6, '2/2022', NULL, '355.00', 2, 1),
(50, 0, 0, 7, '3/2022', NULL, '355.00', 2, 1),
(50, 0, 0, 8, '4/2022', NULL, '355.00', 2, 1),
(50, 0, 0, 9, '5/2022', NULL, '355.00', 2, 1),
(51, 0, 0, 1, '', NULL, '100.00', 2, 1),
(53, 0, 0, 1, '09/2021', NULL, '0.00', 2, 1),
(53, 0, 0, 2, '10/2021', NULL, '0.00', 2, 1),
(53, 0, 0, 3, '11/2021', NULL, '0.00', 2, 1),
(54, 0, 0, 1, '09/2021', NULL, '0.00', 2, 1),
(54, 0, 0, 2, '10/2021', NULL, '0.00', 2, 1),
(54, 0, 0, 3, '11/2021', NULL, '0.00', 2, 1),
(54, 0, 0, 4, '12/2021', NULL, '0.00', 2, 1),
(54, 0, 0, 5, '1/2022', NULL, '0.00', 2, 1),
(54, 0, 0, 6, '2/2022', NULL, '0.00', 2, 1),
(54, 0, 0, 7, '3/2022', NULL, '0.00', 2, 1),
(54, 0, 0, 8, '4/2022', NULL, '0.00', 2, 1),
(54, 0, 0, 9, '5/2022', NULL, '0.00', 2, 1),
(55, 0, 0, 1, '09/2021', NULL, '0.00', 2, 1),
(55, 0, 0, 2, '10/2021', NULL, '0.00', 2, 1),
(55, 0, 0, 3, '11/2021', NULL, '0.00', 2, 1),
(56, 0, 0, 1, '10/2021', NULL, '25.00', 3, 1),
(56, 0, 0, 2, '11/2021', NULL, '25.00', 3, 1),
(56, 0, 0, 3, '12/2021', NULL, '25.00', 3, 1),
(56, 0, 0, 4, '1/2022', NULL, '25.00', 3, 1),
(56, 0, 0, 5, '2/2022', NULL, '25.00', 3, 1),
(56, 0, 0, 6, '3/2022', NULL, '25.00', 3, 1),
(57, 2, 20, 1, '10/2021', NULL, '387.00', 3, 1),
(57, 2, 20, 2, '11/2021', NULL, '387.00', 3, 1),
(57, 2, 20, 3, '12/2021', NULL, '387.00', 3, 1),
(57, 2, 20, 4, '1/2022', NULL, '387.00', 3, 1),
(57, 2, 20, 5, '2/2022', NULL, '387.00', 3, 1),
(57, 2, 20, 6, '3/2022', NULL, '387.00', 3, 1),
(58, 2, 20, 1, '10/2021', NULL, '387111.00', 3, 1),
(58, 2, 20, 2, '11/2021', NULL, '387111.00', 3, 1),
(58, 2, 20, 3, '12/2021', NULL, '387111.00', 3, 1),
(58, 2, 20, 4, '1/2022', NULL, '387111.00', 3, 1),
(58, 2, 20, 5, '2/2022', NULL, '387111.00', 3, 1),
(58, 2, 20, 6, '3/2022', NULL, '387111.00', 3, 1),
(59, 2, 20, 1, '10/2021', NULL, '3871.75', 2, 1),
(59, 2, 20, 2, '11/2021', NULL, '3871.75', 2, 1),
(59, 2, 20, 3, '12/2021', NULL, '3871.75', 2, 1),
(59, 2, 20, 4, '1/2022', NULL, '3871.75', 2, 1),
(59, 2, 20, 5, '2/2022', NULL, '3871.75', 2, 1),
(59, 2, 20, 6, '3/2022', NULL, '3871.75', 2, 1),
(60, 2, 19, 1, '10/2021', '2021-09-21 17:29:07', '168.89', 1, 1),
(60, 2, 19, 2, '11/2021', NULL, '168.89', 3, 1),
(60, 2, 19, 3, '12/2021', NULL, '168.89', 3, 1),
(60, 2, 19, 4, '1/2022', NULL, '168.89', 3, 1),
(60, 2, 19, 5, '2/2022', NULL, '168.89', 3, 1),
(60, 2, 19, 6, '3/2022', NULL, '168.89', 3, 1),
(60, 2, 19, 7, '4/2022', NULL, '168.89', 3, 1),
(60, 2, 19, 8, '5/2022', NULL, '168.89', 3, 1),
(60, 2, 19, 9, '6/2022', NULL, '168.89', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE `prestadores` (
  `id_prestador` int(11) NOT NULL,
  `cuil` varchar(13) DEFAULT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `intereses` int(11) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(1) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `apellido` varchar(50) NOT NULL,
  `documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `estatus`, `apellido`, `documento`) VALUES
(1, 'Romina Paola', 'rominastach@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, 'Stach', 26007377),
(2, 'LAURA', 'roo@gmail.com', 'dde_rr', 'ba00ecaaf5eb69e744692e9f0fded636', 2, 0, 'urzagasti', 568956),
(3, 'daniel david', 'dde@hotmail.com', 'daniel123', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 2, 0, ' espinosa', 26278596),
(4, 'constanza daniela', 'cony@yahoo.com.ar', 'cony123', '38e63f10e615a64a08767e2d4840fc6f', 2, 1, 'espinosa', 46235897),
(5, 'lucas alberto', 'rominastach1@gmail.com', 'ssss', '9f53558e7c2556a5cd0087b794ec4fff', 1, 0, 'hernandez', 27007377),
(6, 'dedee', 'ddd@gmail.com', 'dede', 'e10adc3949ba59abbe56e057f20f883e', 2, 0, 'alcocer', 26589741),
(9, 'julio', 'julio@gmail.com', 'julio', '72af25874f0ddf0a3b2d7f0e70d05c40', 1, 0, 'gutierres', 26589478),
(10, 'mariel', 'drgty@gmail.com', 'mariel', 'e23c619dac6c5d882be61b3970f21996', 2, 0, 'stach', 26589999),
(11, 'erica', 'eri@gmail.com', 'eri', 'ea6b2efbdd4255a9f1b3bbc6399b58f4', 1, 1, 'sanchez', 5698),
(12, 'MILI', 'mili@hotmail.com', 'miloi', 'cc9e025c84397dc8c0a71176649329cf', 1, 1, 'ESPINO', 45698877),
(13, 'alejandra', 'ale@hotmail.com', 'ale123', 'a62039e2dd75ceffa3b72c632010c53a', 1, 1, 'di marco', 58963963),
(14, 'luna', 'luna@gmail.com', 'luna', 'ba8a48b0e34226a2992d871c65600a7c', 2, 1, 'alejo', 58965896);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id_afiliado`);

--
-- Indices de la tabla `aud_afiliado`
--
ALTER TABLE `aud_afiliado`
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `aud_financiera`
--
ALTER TABLE `aud_financiera`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `aud_usuario`
--
ALTER TABLE `aud_usuario`
  ADD KEY `idusuario_sesion` (`idusuario_sesion`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `id_financiera` (`id_financiera`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencia`);

--
-- Indices de la tabla `financieras`
--
ALTER TABLE `financieras`
  ADD PRIMARY KEY (`id_financiera`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_afiliado` (`id_afiliado`),
  ADD KEY `id_financiera` (`id_financiera`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cuota` (`id_cuota`);

--
-- Indices de la tabla `pagos_oc`
--
ALTER TABLE `pagos_oc`
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id_prestador`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id_afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1052;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `financieras`
--
ALTER TABLE `financieras`
  MODIFY `id_financiera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id_prestador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
