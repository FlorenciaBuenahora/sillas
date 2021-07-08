-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2021 at 11:41 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sillasuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `ID` int(1) NOT NULL,
  `Usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `NombreAdmin` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`ID`, `Usuario`, `Contrasenia`, `NombreAdmin`) VALUES
(1, 'admin', '123', 'Florencia Buenahora');

-- --------------------------------------------------------

--
-- Table structure for table `ambientes`
--

CREATE TABLE `ambientes` (
  `ID` tinyint(1) NOT NULL,
  `NombreAmbiente` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ambientes`
--

INSERT INTO `ambientes` (`ID`, `NombreAmbiente`) VALUES
(1, 'Comedor'),
(2, 'Escritorio'),
(3, 'Exterior');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE `colores` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Codigo` varchar(7) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`ID`, `Nombre`, `Codigo`) VALUES
(1, 'Azul', '#3B7DB4'),
(2, 'Beige', '#AF8F6C'),
(3, 'Blanco', '#E7E7E7'),
(4, 'Celeste', '#03BFFE'),
(5, 'Gris', '#A5A49D'),
(6, 'Marrón', '#753310'),
(7, 'Mostaza', '#E7B35B'),
(8, 'Naranja', '#E15B38'),
(9, 'Natural', '#F1D4AA'),
(10, 'Negro', '#020203'),
(11, 'Rosa', '#C09D94'),
(12, 'Turquesa', '#456B74'),
(13, 'Verde', '#023F38');

-- --------------------------------------------------------

--
-- Table structure for table `estilos`
--

CREATE TABLE `estilos` (
  `ID` tinyint(1) NOT NULL,
  `NombreEstilo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estilos`
--

INSERT INTO `estilos` (`ID`, `NombreEstilo`) VALUES
(1, 'Colonial'),
(2, 'Moderno'),
(3, 'Nórdico'),
(4, 'Rústico'),
(5, 'Vintage');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `ID` smallint(10) NOT NULL,
  `IDSilla` smallint(6) NOT NULL,
  `NombreImagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `AltImagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `DestinoImagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`ID`, `IDSilla`, `NombreImagen`, `AltImagen`, `DestinoImagen`) VALUES
(10, 1, 'Modena-Olmo_natural.jpg', 'Modena Olmo Natural', 'ampliacion'),
(11, 1, 'Modena-Olmo_natural2.jpg', 'Modena Olmo Natural', 'ampliacion'),
(12, 1, 'Modena-Olmo_natural3.jpg', 'Modena Olmo Natural', 'ampliacion'),
(13, 1, 'Modena-Olmo_natural4.jpg', 'Modena Olmo Natural', 'ampliacion'),
(14, 2, 'Hygge-Olmo_natural.jpeg', 'Hygge Olmo Natural', 'ampliacion'),
(15, 2, 'Hygge-Olmo_natural2.jpeg', 'Hygge Olmo Natural', 'ampliacion'),
(16, 2, 'Hygge-Olmo_natural3.jpeg', 'Hygge Olmo Natural', 'ampliacion'),
(17, 2, 'Hygge-Olmo_natural4.jpeg', 'Hygge Olmo Natural', 'ampliacion'),
(18, 3, 'Bauhaus-Haya_Cromado.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(19, 3, 'Bauhaus-Haya_Cromado2.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(20, 3, 'Bauhaus-Haya_Cromado3.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(21, 3, 'Bauhaus-Haya_Cromado4.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(22, 4, 'Bauhaus-Haya_Cromado-Brazos.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(23, 4, 'Bauhaus-Haya_Cromado-Brazos2.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(24, 4, 'Bauhaus-Haya_Cromado-Brazos3.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(25, 4, 'Bauhaus-Haya_Cromado-Brazos4.jpeg', 'Bauhaus Haya y Cromado', 'ampliacion'),
(27, 5, 'Direction-Naranja.jpeg', 'Direction Naranja', 'ampliacion'),
(28, 5, 'Direction-Naranja2.jpeg', 'Direction Naranja', 'ampliacion'),
(29, 5, 'Direction-Naranja3.jpeg', 'Direction Naranja', 'ampliacion'),
(30, 5, 'Direction-Naranja4.jpeg', 'Direction Naranja', 'ampliacion'),
(31, 6, 'Direction-Negro.jpeg', 'Direction Negro', 'ampliacion'),
(32, 6, 'Direction-Negro2.jpeg', 'Direction Negro', 'ampliacion'),
(33, 6, 'Direction-Negro3.jpeg', 'Direction Negro', 'ampliacion'),
(34, 6, 'Direction-Negro4.jpeg', 'Direction Negro', 'ampliacion'),
(35, 7, 'LC7-Blanco.jpeg', 'LC7 Blanco', 'ampliacion'),
(36, 7, 'LC7-Blanco2.jpeg', 'LC7 Blanco', 'ampliacion'),
(37, 7, 'LC7-Blanco3.jpeg', 'LC7 Blanco', 'ampliacion'),
(38, 7, 'LC7-Blanco4.jpeg', 'LC7 Blanco', 'ampliacion'),
(40, 8, 'LC7-Rosa.jpeg', 'LC7 Rosa', 'ampliacion'),
(41, 8, 'LC7-Rosa2.jpeg', 'LC7 Rosa', 'ampliacion'),
(42, 9, 'LC7-Gris.jpeg', 'LC7 Gris', 'ampliacion'),
(43, 9, 'LC7-Gris2.jpeg', 'LC7 Gris', 'ampliacion'),
(44, 10, 'LC7-Negro.jpeg', 'LC7 Negro', 'ampliacion'),
(45, 10, 'LC7-Negro2.jpeg', 'LC7 Negro', 'ampliacion'),
(46, 11, 'DCM-Natural.jpeg', 'DCM Natural', 'ampliacion'),
(47, 11, 'DCM-Natural2.jpeg', 'DCM Natural', 'ampliacion'),
(48, 11, 'DCM-Natural3.jpeg', 'DCM Natural', 'ampliacion'),
(49, 11, 'DCM-Natural4.jpeg', 'DCM Natural', 'ampliacion'),
(50, 12, 'DCM-Negro.jpeg', 'DCM Negro', 'ampliacion'),
(51, 12, 'DCM-Negro2.jpeg', 'DCM Negro', 'ampliacion'),
(52, 13, 'Elbow-Negro.jpeg', 'Elbow Negro', 'ampliacion'),
(53, 13, 'Elbow-Negro2.jpeg', 'Elbow Negro', 'ampliacion'),
(54, 13, 'Elbow-Negro3.jpeg', 'Elbow Negro', 'ampliacion'),
(55, 13, 'Elbow-Negro4.jpeg', 'Elbow Negro', 'ampliacion'),
(56, 14, 'Suanne-Rosa.jpg', 'Suanne Rosa', 'ampliacion'),
(57, 14, 'Suanne-Rosa2.jpg', 'Suanne Rosa', 'ampliacion'),
(58, 14, 'Suanne-Rosa3.jpg', 'Suanne Rosa', 'ampliacion'),
(59, 14, 'Suanne-Rosa4.jpg', 'Suanne Rosa', 'ampliacion'),
(60, 15, 'Suanne-Gris.jpg', 'Suanne Gris', 'ampliacion'),
(61, 15, 'Suanne-Gris2.jpg', 'Suanne Gris', 'ampliacion'),
(62, 15, 'Suanne-Gris3.jpg', 'Suanne Gris', 'ampliacion'),
(63, 15, 'Suanne-Gris4.jpg', 'Suanne Gris', 'ampliacion'),
(64, 16, 'Suanne-Mostaza.jpg', 'Suanne Mostaza', 'ampliacion'),
(65, 16, 'Suanne-Mostaza2.jpg', 'Suanne Mostaza', 'ampliacion'),
(66, 16, 'Suanne-Mostaza3.jpg', 'Suanne Mostaza', 'ampliacion'),
(67, 16, 'Suanne-Mostaza4.jpg', 'Suanne Mostaza', 'ampliacion'),
(68, 17, 'Calixta.jpg', 'Calixta', 'ampliacion'),
(69, 17, 'Calixta2.jpg', 'Calixta', 'ampliacion'),
(70, 17, 'Calixta3.jpg', 'Calixta', 'ampliacion'),
(71, 17, 'Calixta4.jpg', 'Calixta', 'ampliacion'),
(72, 18, 'Nina-Negro-Mate.jpg', 'Nina Negro Mate', 'ampliacion'),
(73, 18, 'Nina-Negro-Mate2.jpg', 'Nina Negro Mate', 'ampliacion'),
(74, 18, 'Nina-Negro-Mate3.jpg', 'Nina Negro Mate', 'ampliacion'),
(75, 19, 'Nina-Beige.jpg', 'Nina Beige', 'ampliacion'),
(76, 19, 'Nina-Beige2.jpg', 'Nina Beige', 'ampliacion'),
(77, 20, 'Nina-Negro.jpg', 'Nina Negro', 'ampliacion'),
(78, 20, 'Nina-Negro2.jpg', 'Nina Negro', 'ampliacion'),
(79, 21, 'Shann-Negro.jpg', 'Shann Negro', 'ampliacion'),
(80, 21, 'Shann-Negro2.jpg', 'Shann Negro', 'ampliacion'),
(81, 22, 'Shann-Beige.jpg', 'Shann Beige', 'ampliacion'),
(82, 22, 'Shann-Beige2.jpg', 'Shann Beige', 'ampliacion'),
(83, 23, 'Eames-Gris.jpeg', 'Eames Gris', 'ampliacion'),
(84, 23, 'Eames-Gris2.jpeg', 'Eames Gris', 'ampliacion'),
(85, 24, 'Eames-Blanco.jpeg', 'Eames Blanco', 'ampliacion'),
(86, 24, 'Eames-Blanco2.jpeg', 'Eames Blanca', 'ampliacion'),
(87, 25, 'Eames-Beige.jpeg', 'Eames Beige', 'ampliacion'),
(88, 25, 'Eames-Beige2.jpeg', 'Eames Beige', 'ampliacion'),
(89, 26, 'Eames-Negra.jpeg', 'Eames Negra', 'ampliacion'),
(90, 26, 'Eames-Negra2.jpeg', 'Eames Negra', 'ampliacion'),
(91, 27, 'Yvette-Gris.jpg', 'Yvette Gris', 'ampliacion'),
(92, 27, 'Yvette-Gris2.jpg', 'Yvette Gris', 'ampliacion'),
(93, 28, 'Yvette-Negro.jpg', 'Yvette Negro', 'ampliacion'),
(94, 28, 'Yvette-Negro2.jpg', 'Yvette Negro', 'ampliacion'),
(95, 29, 'Yvette-Marron.jpg', 'Yvette Marron', 'ampliacion'),
(96, 29, 'Yvette-Marron2.jpg', 'Yvette Marron', 'ampliacion'),
(97, 30, 'Ivonne-Azul.jpg', 'Ivonne Azul', 'ampliacion'),
(98, 30, 'Ivonne-Azul2.jpg', 'Ivonne Azul', 'ampliacion'),
(99, 31, 'Ivonne-Verde.jpg', 'Ivonne Verde', 'ampliacion'),
(100, 31, 'Ivonne-Verde2.jpg', 'Ivonne Verde', 'ampliacion'),
(101, 32, 'Ivonne-Turquesa.jpg', 'Ivonne Turquesa', 'ampliacion'),
(102, 32, 'Ivonne-Turquesa2.jpg', 'Ivonne Turquesa', 'ampliacion'),
(103, 33, 'Sika.jpeg', 'Sika', 'ampliacion'),
(104, 33, 'Sika2.jpeg', 'Sika', 'ampliacion'),
(105, 34, 'Masters-Negro.jpeg', 'Masters Negro', 'ampliacion'),
(106, 34, 'Masters-Negro2.jpeg', 'Masters Negro', 'ampliacion'),
(107, 35, 'Masters-Celeste.jpeg', 'Masters Celeste', 'ampliacion'),
(108, 35, 'Masters-Celeste2.jpeg', 'Masters Celeste', 'ampliacion'),
(109, 38, 'Lambton-Gris.jpeg', 'Lambton Gris', 'ampliacion'),
(110, 38, 'Lambton-Gris2.jpeg', 'Lambton Gris', 'ampliacion'),
(111, 1, 'modena-cat.jpg', 'modena', 'catalogo');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `ID` tinyint(2) NOT NULL,
  `NombreMarca` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`ID`, `NombreMarca`) VALUES
(1, 'Kave Home'),
(2, 'La Ibérica'),
(3, 'Mad for Modern');

-- --------------------------------------------------------

--
-- Table structure for table `materiales`
--

CREATE TABLE `materiales` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `materiales`
--

INSERT INTO `materiales` (`ID`, `Nombre`) VALUES
(1, 'Acero'),
(2, 'Acero inoxidable'),
(3, 'Aluminio'),
(4, 'Boucle'),
(5, 'Chapa'),
(6, 'Cromo'),
(7, 'Cuerda'),
(8, 'Cuero'),
(9, 'Eucalipto'),
(10, 'Fresno'),
(11, 'Haya'),
(12, 'Olmo'),
(13, 'Pana'),
(14, 'PVC'),
(15, 'Piel sintética'),
(16, 'Polipropileno'),
(17, 'Rattan'),
(18, 'Roble'),
(19, 'Teca'),
(20, 'Tela'),
(21, 'Terciopelo');

-- --------------------------------------------------------

--
-- Table structure for table `sillas`
--

CREATE TABLE `sillas` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `Codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no ingresado',
  `Marca` tinyint(2) NOT NULL,
  `Precio` smallint(4) NOT NULL,
  `Color` smallint(6) NOT NULL,
  `Medidas` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Destacado` tinyint(1) NOT NULL,
  `Nuevo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `sillas`
--

INSERT INTO `sillas` (`ID`, `Codigo`, `Nombre`, `Marca`, `Precio`, `Color`, `Medidas`, `Descripcion`, `Destacado`, `Nuevo`) VALUES
(1, 'S5KY4', 'Modena - Olmo Natural', 2, 152, 9, '45 x 42 cm - Altura: 85 cm', 'Clásica y versátil silla de madera de olmo macizo lustrada color natural, linda y perfecta para lugares donde una silla tapizada no es una opción.', 0, 0),
(2, 'S654C', 'Hygge - Olmo Natural', 2, 201, 9, 'Frente: 55 cm - Profundidad: 55 cm - Altura: 79 cm', 'Divina silla de inspiración danesa en madera maciza de olmo con suave acabado en lustre natural y respaldo curvo.\r\n\r\nCómoda, versátil y con un diseño fresco a prueba del tiempo.', 0, 0),
(3, 'SHH9A', 'Bauhaus - Haya y Cromado', 2, 283, 9, 'Frente: 46 cm - Profundidad: 52 cm - Altura total: 85 cm - Altura del asiento al piso: 46 cm', 'Silla icónica de la escuela Bauhaus diseñada por el arquitecto y diseñador industrial Marcel Breuer en 1925.\r\n\r\nObsesionado por las formas simples y pionero en la incorporación de cromado en el diseño de mobiliario, esta silla representa innovación y vanguardia y se revive con fuerza en el mundo del interiorismo actual.', 0, 0),
(4, 'SK8EW', 'Bauhaus - Haya y Cromado', 2, 340, 9, 'Frente: 46 cm - Profundidad: 52 cm - Altura total: 85 cm - Altura del asiento al piso: 46 cm', 'Silla icónica de la escuela Bauhaus diseñada por el arquitecto y diseñador industrial Marcel Breuer en 1925.\r\n\r\nObsesionado por las formas simples y pionero en la incorporación de cromado en el diseño de mobiliario, esta silla representa innovación y vanguardia y se revive con fuerza en el mundo del interiorismo actual.', 0, 0),
(5, 'SLH5R', 'Direction - Naranja', 3, 490, 8, '62cm x 55cm. Altura: 82cm. Altura asiento: 46cm \r\n', 'Diseño del ingeniero francés, Jean Prouvé, en 1951.\r\n\r\nEstructura de acero tubular y chapa moldeada.\r\nTapizadas en telas tipo boucle o a elección por catálogo.', 0, 0),
(6, 'SA74M', 'Direction - Negro', 3, 490, 10, '62cm x 55cm. Altura: 82cm. Altura asiento: 46cm ', 'Diseño del ingeniero francés, Jean Prouvé, en 1951.\r\n\r\nEstructura de acero tubular y chapa moldeada.\r\nTapizadas en telas tipo boucle o a elección por catálogo.', 0, 0),
(7, 'SVSA8', 'LC7 - Blanco', 3, 500, 3, '60 cm x 53 cm. Altura: 73 cm. Altura asiento: 50 cm', 'La silla LC7 fue diseñada en 1928 por Le Corbusier y su primo Pierre Jeanneret.\r\nEsta silla fue el resultado de una serie de experimentos que llevaron a cabo ambos diseñadores. La estructura de acero tubular sostiene un eje, inspirado en las ruedas de un coche. Sobre él se monta el asiento, ofreciendo gran confort al adaptarse al cuerpo. Originalmente, esta silla giratoria fue diseñada como silla de comedor, pero se transformó en una silla muy popular para oficinas y comercios, ofreciendo una imágen elegante y distinguida.\r\nLa silla LC7 forma parte de la colección permante del MoMA.\r\n\r\nAcero inoxidable pulido con impecables terminaciones.\r\nVersiones en acero pintadas a color a pedido y por catálogo.\r\n\r\nTapizados en cuero italiano full aniline o con telas de nuestros catálogos.', 0, 0),
(8, 'S3GCE', 'LC7 - Rosa', 3, 500, 11, '60 cm x 53 cm. Altura: 73 cm. Altura asiento: 50 cm', 'La silla LC7 fue diseñada en 1928 por Le Corbusier y su primo Pierre Jeanneret.\r\nEsta silla fue el resultado de una serie de experimentos que llevaron a cabo ambos diseñadores. La estructura de acero tubular sostiene un eje, inspirado en las ruedas de un coche. Sobre él se monta el asiento, ofreciendo gran confort al adaptarse al cuerpo. Originalmente, esta silla giratoria fue diseñada como silla de comedor, pero se transformó en una silla muy popular para oficinas y comercios, ofreciendo una imágen elegante y distinguida.\r\nLa silla LC7 forma parte de la colección permante del MoMA.\r\n\r\nAcero inoxidable pulido con impecables terminaciones.\r\nVersiones en acero pintadas a color a pedido y por catálogo.\r\n\r\nTapizados en cuero italiano full aniline o con telas de nuestros catálogos.', 0, 0),
(9, 'S2UNU', 'LC7 - Gris', 3, 500, 5, '60 cm x 53 cm. Altura: 73 cm. Altura asiento: 50 cm', 'La silla LC7 fue diseñada en 1928 por Le Corbusier y su primo Pierre Jeanneret.\r\nEsta silla fue el resultado de una serie de experimentos que llevaron a cabo ambos diseñadores. La estructura de acero tubular sostiene un eje, inspirado en las ruedas de un coche. Sobre él se monta el asiento, ofreciendo gran confort al adaptarse al cuerpo. Originalmente, esta silla giratoria fue diseñada como silla de comedor, pero se transformó en una silla muy popular para oficinas y comercios, ofreciendo una imágen elegante y distinguida.\r\nLa silla LC7 forma parte de la colección permante del MoMA.\r\n\r\nAcero inoxidable pulido con impecables terminaciones.\r\nVersiones en acero pintadas a color a pedido y por catálogo.\r\n\r\nTapizados en cuero italiano full aniline o con telas de nuestros catálogos.', 0, 0),
(10, 'S2BB6', 'LC7 - Negro', 3, 500, 10, '60 cm x 53 cm. Altura: 73 cm. Altura asiento: 50 cm', 'La silla LC7 fue diseñada en 1928 por Le Corbusier y su primo Pierre Jeanneret.\r\nEsta silla fue el resultado de una serie de experimentos que llevaron a cabo ambos diseñadores. La estructura de acero tubular sostiene un eje, inspirado en las ruedas de un coche. Sobre él se monta el asiento, ofreciendo gran confort al adaptarse al cuerpo. Originalmente, esta silla giratoria fue diseñada como silla de comedor, pero se transformó en una silla muy popular para oficinas y comercios, ofreciendo una imágen elegante y distinguida.\r\nLa silla LC7 forma parte de la colección permante del MoMA.\r\n\r\nAcero inoxidable pulido con impecables terminaciones.\r\nVersiones en acero pintadas a color a pedido y por catálogo.\r\n\r\nTapizados en cuero italiano full aniline o con telas de nuestros catálogos.', 0, 0),
(11, 'SNTP8', 'DCM - Natural', 3, 450, 9, '53cm x 55cm. Altura: 76cm. Altura asiento: 44cm', 'Silla icónica diseñada, junto con la DCW (dining chair wood), en 1946 por Charles & Ray Eames.\r\nNuestra silla DCM es una reproducción muy precisa de la original de Charles & Ray Eames, mejorando quizá en la utilización de acero inoxidable en vez de hierro cromado. La primera foto es de nuestro remake.\r\n\r\nRoble contrachapado y pulido, de 8 capas.\r\nEstructura de acero inoxidable.', 0, 0),
(12, 'SG34R', 'DCM - Negro', 3, 450, 10, '53cm x 55cm. Altura: 76cm. Altura asiento: 44cm', 'Silla icónica diseñada, junto con la DCW (dining chair wood), en 1946 por Charles & Ray Eames.\r\nNuestra silla DCM es una reproducción muy precisa de la original de Charles & Ray Eames, mejorando quizá en la utilización de acero inoxidable en vez de hierro cromado. La primera foto es de nuestro remake.\r\n\r\nRoble contrachapado y pulido, de 8 capas.\r\nEstructura de acero inoxidable.', 0, 0),
(13, 'S8CKN', 'Elbow - Negro', 3, 390, 10, '51cm  x 55cm. Altura: 47cm. Altura: asiento 74cm', 'Los prototipos de ésta silla fueron creados en 1956 por el gran maestro carpintero Hans Wegner, pero su producción se inició recién en 2005.\r\nElegante y a la vez sencilla silla de comedor, por su respaldo bajo y recto también la hacen muy adecuada para el trabajo de escritorio.\r\n\r\nMadera de haya y telas italianas.\r\nConsulta por madera de nogal o roble y con cuero italiano ‘top grain’ o ‘full grain’.', 0, 0),
(14, 'SFVJ2', 'Suanne Pana Gruesa - Rosa', 1, 290, 11, 'Al 79 cm x An 54 cm x Pr 55 cm', 'Silla tapizada en pana rosa, con un diseño contemporáneo ideal tanto para tener en casa como zona de trabajo. Los setenta vuelven con fuerza, ahora también para formar parte del outfit de tu casa.', 1, 0),
(15, 'SPRB6', 'Suanne Pana Gruesa - Gris', 1, 290, 5, 'Al 79 cm x An 54 cm x Pr 55 cm', 'Silla tapizada en pana rosa, con un diseño contemporáneo ideal tanto para tener en casa como zona de trabajo. Los setenta vuelven con fuerza, ahora también para formar parte del outfit de tu casa.', 1, 0),
(16, 'SKX3E', 'Suanne Pana Gruesa - Mostaza', 1, 290, 7, 'Al 79 cm x An 54 cm x Pr 55 cm', 'Silla tapizada en pana rosa, con un diseño contemporáneo ideal tanto para tener en casa como zona de trabajo. Los setenta vuelven con fuerza, ahora también para formar parte del outfit de tu casa.', 1, 0),
(17, 'SH9JJ', 'Calixta', 1, 580, 9, 'Al 86 cm x An 46 cm x Pr 59 cm', 'Qué mejor para tu comedor que con esta pieza para el confort hecha con materia 100% natural, como la piel y la madera maciza de teca, dos materiales altamente resistentes, sostenibles, y que ganan carácter con el paso del tiempo.', 1, 0),
(18, 'SJ7B7', 'Nina - Negro Mate', 1, 520, 10, 'Al 78 cm x An 56 cm x Pr 50 cm', 'La silla Nina es un diseño con una estructura de madera maciza de eucalipto lacada y un trenzado en el asiento trabajado a mano. Además, los materiales son eco y están tratados para disfrutar también en exteriores bajo techo.', 0, 0),
(19, 'SQE5H', 'Nina - Beige', 1, 520, 2, 'Al 78 cm x An 56 cm x Pr 50 cm', 'La silla Nina es un diseño con una estructura de madera maciza de eucalipto lacada y un trenzado en el asiento trabajado a mano. Además, los materiales son eco y están tratados para disfrutar también en exteriores bajo techo.', 0, 0),
(20, 'SZ5XN', 'Nina - Negro', 1, 520, 10, 'Al 78 cm x An 56 cm x Pr 50 cm', 'La silla Nina es un diseño con una estructura de madera maciza de eucalipto lacada y un trenzado en el asiento trabajado a mano. Además, los materiales son eco y están tratados para disfrutar también en exteriores bajo techo.', 1, 0),
(21, 'SNLT6', 'Shann - Negro', 1, 385, 10, 'Al 85 cm x An 56 cm x Pr 63 cm', 'Disfruta de tus días de sol y noches de verano en tu terraza. La silla Shann, con asiento cordado a mano, es la indicada para tener una sentada cómoda y flexible, además de añadir la cuerda, material en tendencia, para añadir estilo a tus exteriores bajo.', 0, 0),
(22, 'SEN73', 'Shann - Beige', 1, 385, 2, 'Al 85 cm x An 56 cm x Pr 63 cm', 'Disfruta de tus días de sol y noches de verano en tu terraza. La silla Shann, con asiento cordado a mano, es la indicada para tener una sentada cómoda y flexible, además de añadir la cuerda, material en tendencia, para añadir estilo a tus exteriores bajo.', 0, 0),
(23, 'S6GSS', 'Eames - Gris', 2, 77, 5, 'Frente: 46 cm - Profundidad: 43 cm - Altura: 80 cm', 'Cómoda, ergonómica, eternamente moderna, lavable.\r\n\r\nSilla de autor diseñada por el arquitecto estadounidense Charles Eames (1907-1978) cuyos diseños se reviven con fuerza en las últimas revistas de interiorismo.\r\n\r\nCalidad: patas de haya maciza; tornillos y estructura de metal: firmes y resistentes hasta 120 kg.', 0, 0),
(24, 'SBWC9', 'Eames - Blanca', 2, 77, 3, 'Frente: 46 cm - Profundidad: 43 cm - Altura: 80 cm', 'Cómoda, ergonómica, eternamente moderna, lavable.\r\n\r\nSilla de autor diseñada por el arquitecto estadounidense Charles Eames (1907-1978) cuyos diseños se reviven con fuerza en las últimas revistas de interiorismo.\r\n\r\nCalidad: patas de haya maciza; tornillos y estructura de metal: firmes y resistentes hasta 120 kg.', 0, 0),
(25, 'S7JSE', 'Eames - Beige', 2, 77, 2, 'Frente: 46 cm - Profundidad: 43 cm - Altura: 80 cm', 'Cómoda, ergonómica, eternamente moderna, lavable.\r\n\r\nSilla de autor diseñada por el arquitecto estadounidense Charles Eames (1907-1978) cuyos diseños se reviven con fuerza en las últimas revistas de interiorismo.\r\n\r\nCalidad: patas de haya maciza; tornillos y estructura de metal: firmes y resistentes hasta 120 kg.', 0, 0),
(26, 'SEB6S', 'Eames - Negra', 2, 77, 10, 'Frente: 46 cm - Profundidad: 43 cm - Altura: 80 cm', 'Cómoda, ergonómica, eternamente moderna, lavable.\r\n\r\nSilla de autor diseñada por el arquitecto estadounidense Charles Eames (1907-1978) cuyos diseños se reviven con fuerza en las últimas revistas de interiorismo.\r\n\r\nCalidad: patas de haya maciza; tornillos y estructura de metal: firmes y resistentes hasta 120 kg.', 0, 0),
(27, 'SG8HT', 'Yvette - Gris', 1, 635, 5, 'Al 76 / 88 cm An 66 cm Pr 72 cm', 'El diseño entra en el estudio de tu casa con Yvette, que amplía su colección con esta silla de escritorio con asiento giratorio, ruedas y altura ajustable. Ya no necesitas musas para tener ideas. Disfruta de tu mejor compañera de trabajo.', 0, 0),
(28, 'S3HEK', 'Yvette - Negro', 1, 635, 10, 'Al 76 / 88 cm An 66 cm Pr 72 cm', 'El diseño entra en el estudio de tu casa con Yvette, que amplía su colección con esta silla de escritorio con asiento giratorio, ruedas y altura ajustable. Ya no necesitas musas para tener ideas. Disfruta de tu mejor compañera de trabajo.', 0, 0),
(29, 'SZWN4', 'Yvette - Marrón', 1, 635, 6, 'Al 76 / 88 cm An 66 cm Pr 72 cm', 'El diseño entra en el estudio de tu casa con Yvette, que amplía su colección con esta silla de escritorio con asiento giratorio, ruedas y altura ajustable. Ya no necesitas musas para tener ideas. Disfruta de tu mejor compañera de trabajo.', 0, 0),
(30, 'S87HK', 'Ivonne Terciopelo - Azul', 1, 265, 1, 'Al 79 cm x An 49 cm x Pr 52 cm', 'Nunca se sabe cuando se puede dar una ocasión especial ni lo que durará. Por eso, estate preparado. Las sillas Ivonne, además de envolverte en su respaldo para estar cómodo en las largas sobremesas, su diseño convierte cada momento en especial.', 1, 0),
(31, 'S83H5', 'Ivonne Terciopelo - Verde', 1, 265, 13, 'Al 79 cm x An 49 cm x Pr 52 cm', 'Nunca se sabe cuando se puede dar una ocasión especial ni lo que durará. Por eso, estate preparado. Las sillas Ivonne, además de envolverte en su respaldo para estar cómodo en las largas sobremesas, su diseño convierte cada momento en especial.', 1, 0),
(32, 'S6DGG', 'Ivonne Terciopelo - Turquesa', 1, 265, 12, 'Al 79 cm x An 49 cm x Pr 52 cm', 'Nunca se sabe cuando se puede dar una ocasión especial ni lo que durará. Por eso, estate preparado. Las sillas Ivonne, además de envolverte en su respaldo para estar cómodo en las largas sobremesas, su diseño convierte cada momento en especial.', 1, 0),
(33, 'S78VN', 'Sika - Marrón', 2, 330, 6, 'Frente: 45 cm - Profundidad: 56 cm - Altura hasta el asiento: 45 cm - Altura total: 81 cm', 'Sillas de exterior de diseño, con énfasis en la comodidad, durabilidad y estética.\r\n\r\nEstructura interior de aluminio recubierto con una capa gruesa de fibra sintética símil rattan, desarrollada por la tradicional firma danesa Sika Design (fundada en 1942) con fabricación en Indonesia.\r\n\r\nCómoda y amplia silla de comedor para exterior.', 0, 0),
(34, 'SF8W9', 'Masters - Negro', 3, 120, 10, '57 x 47 x 84h x 46h asiento', 'La silla Masters es un ingenioso homenaje a tres sillas-símbolo, revisadas y re-interpretadas por el genio creativo de Philippe Starck: la “Serie 7” de Arne Jacobsen, la “Tulip Armchair” de Eero Saarinen y la “Eiffel Chair” de Charles & Ray Eames entrelazan sus inconfundibles siluetas en un híbrido sinuoso, para dar vida a una fusión de estilos original y cautivadora.\r\nLa silla Masters ha sido galardonada con el prestigioso “Good Design Award 2010” otorgado por el Chicago Athenaeum – Museum of Architecture and Design, y con el Red Dot Design Award en 2013.\r\nLigera, práctica y apilable, la sillas Masters puede utilizarse tanto en interior como en exterior.\r\n\r\nManufactura premium, realizada en PVC moldeado de alta calidad.', 0, 1),
(35, 'S3K9S', 'Masters - Celeste', 3, 120, 4, '57 x 47 x 84h x 46h asiento', 'La silla Masters es un ingenioso homenaje a tres sillas-símbolo, revisadas y re-interpretadas por el genio creativo de Philippe Starck: la “Serie 7” de Arne Jacobsen, la “Tulip Armchair” de Eero Saarinen y la “Eiffel Chair” de Charles & Ray Eames entrelazan sus inconfundibles siluetas en un híbrido sinuoso, para dar vida a una fusión de estilos original y cautivadora.\r\nLa silla Masters ha sido galardonada con el prestigioso “Good Design Award 2010” otorgado por el Chicago Athenaeum – Museum of Architecture and Design, y con el Red Dot Design Award en 2013.\r\nLigera, práctica y apilable, la sillas Masters puede utilizarse tanto en interior como en exterior.\r\n\r\nManufactura premium, realizada en PVC moldeado de alta calidad.', 0, 1),
(38, 'SMDN8', 'Lambton - Gris', 1, 195, 5, 'Al 84 cm x An 42 cm x Pr 55 cm', 'Disfruta de tus días de sol y noches de verano en tu terraza. La silla Lambton, con asiento cordado a mano, es la indicada para tener una sentada cómoda y flexible, además de añadir la cuerda, material en tendencia, para añadir estilo a tus exteriores.', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sillasAmbientes`
--

CREATE TABLE `sillasAmbientes` (
  `ID` tinyint(2) NOT NULL,
  `IDSilla` tinyint(2) NOT NULL,
  `IDAmbiente` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `sillasAmbientes`
--

INSERT INTO `sillasAmbientes` (`ID`, `IDSilla`, `IDAmbiente`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 3, 2),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 7, 2),
(10, 8, 1),
(11, 8, 2),
(12, 9, 1),
(13, 9, 2),
(14, 10, 1),
(15, 10, 2),
(16, 11, 1),
(17, 12, 1),
(18, 13, 1),
(19, 14, 1),
(20, 15, 1),
(21, 16, 1),
(22, 17, 1),
(23, 17, 2),
(24, 18, 1),
(25, 18, 3),
(26, 19, 1),
(27, 19, 3),
(28, 20, 1),
(29, 20, 3),
(30, 21, 1),
(31, 21, 3),
(32, 22, 1),
(33, 22, 3),
(34, 23, 2),
(35, 24, 2),
(36, 25, 2),
(37, 26, 2),
(38, 27, 2),
(39, 28, 2),
(40, 29, 2),
(41, 30, 1),
(42, 30, 2),
(43, 31, 1),
(44, 31, 2),
(45, 32, 1),
(46, 32, 2),
(47, 33, 3),
(48, 34, 3),
(49, 35, 3),
(53, 38, 1),
(54, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sillasEstilos`
--

CREATE TABLE `sillasEstilos` (
  `ID` tinyint(2) NOT NULL,
  `IDSilla` tinyint(2) NOT NULL,
  `IDEstilo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `sillasEstilos`
--

INSERT INTO `sillasEstilos` (`ID`, `IDSilla`, `IDEstilo`) VALUES
(1, 1, 5),
(2, 2, 2),
(3, 2, 3),
(4, 3, 2),
(5, 3, 5),
(6, 4, 2),
(7, 4, 5),
(8, 5, 5),
(9, 6, 5),
(10, 7, 5),
(11, 8, 5),
(12, 9, 5),
(13, 10, 5),
(14, 11, 2),
(15, 11, 5),
(16, 12, 2),
(17, 12, 5),
(18, 13, 2),
(19, 13, 3),
(20, 13, 5),
(21, 14, 2),
(22, 14, 3),
(23, 15, 2),
(24, 15, 3),
(25, 16, 2),
(26, 16, 3),
(27, 17, 1),
(28, 17, 4),
(29, 18, 2),
(30, 18, 5),
(31, 19, 2),
(32, 19, 3),
(33, 20, 2),
(34, 20, 3),
(35, 21, 1),
(36, 21, 2),
(37, 21, 3),
(38, 22, 1),
(39, 22, 2),
(40, 22, 3),
(41, 23, 2),
(42, 23, 5),
(43, 24, 2),
(44, 24, 5),
(45, 25, 2),
(46, 25, 5),
(47, 26, 2),
(48, 26, 5),
(49, 27, 2),
(50, 27, 3),
(51, 28, 2),
(52, 28, 3),
(53, 29, 2),
(54, 29, 3),
(55, 30, 3),
(56, 30, 5),
(57, 31, 3),
(58, 31, 5),
(59, 32, 3),
(60, 32, 5),
(61, 33, 4),
(62, 34, 2),
(63, 35, 2),
(67, 38, 2),
(68, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sillasMateriales`
--

CREATE TABLE `sillasMateriales` (
  `ID` smallint(6) NOT NULL,
  `IDSilla` smallint(6) NOT NULL,
  `IDMaterial` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `sillasMateriales`
--

INSERT INTO `sillasMateriales` (`ID`, `IDSilla`, `IDMaterial`) VALUES
(1, 1, 12),
(2, 2, 12),
(3, 3, 6),
(4, 3, 11),
(5, 4, 6),
(6, 4, 11),
(7, 5, 1),
(8, 5, 5),
(9, 5, 20),
(10, 6, 1),
(11, 6, 5),
(12, 6, 20),
(13, 7, 2),
(14, 7, 8),
(15, 8, 2),
(16, 8, 8),
(17, 9, 2),
(18, 9, 8),
(19, 10, 2),
(20, 10, 8),
(21, 11, 2),
(22, 11, 18),
(23, 12, 2),
(24, 12, 18),
(25, 13, 11),
(26, 13, 20),
(27, 14, 1),
(28, 14, 13),
(29, 14, 20),
(30, 15, 1),
(31, 15, 13),
(32, 15, 20),
(33, 16, 1),
(34, 16, 13),
(35, 16, 20),
(36, 17, 8),
(37, 17, 19),
(38, 18, 7),
(39, 18, 9),
(40, 19, 7),
(41, 19, 9),
(42, 20, 7),
(43, 20, 9),
(44, 21, 1),
(45, 21, 7),
(46, 22, 1),
(47, 22, 7),
(48, 23, 11),
(49, 23, 16),
(50, 24, 11),
(51, 24, 16),
(52, 25, 11),
(53, 25, 16),
(54, 26, 11),
(55, 26, 16),
(56, 27, 1),
(57, 27, 20),
(58, 28, 1),
(59, 28, 20),
(60, 29, 1),
(61, 29, 15),
(62, 30, 1),
(63, 30, 20),
(64, 30, 21),
(65, 31, 1),
(66, 31, 20),
(67, 31, 21),
(68, 32, 1),
(69, 32, 20),
(70, 32, 21),
(71, 33, 3),
(72, 33, 17),
(73, 34, 14),
(74, 35, 14),
(78, 38, 1),
(79, 38, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sillas`
--
ALTER TABLE `sillas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Nombre` (`Nombre`);

--
-- Indexes for table `sillasAmbientes`
--
ALTER TABLE `sillasAmbientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sillasEstilos`
--
ALTER TABLE `sillasEstilos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sillasMateriales`
--
ALTER TABLE `sillasMateriales`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `ID` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `estilos`
--
ALTER TABLE `estilos`
  MODIFY `ID` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materiales`
--
ALTER TABLE `materiales`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sillas`
--
ALTER TABLE `sillas`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sillasAmbientes`
--
ALTER TABLE `sillasAmbientes`
  MODIFY `ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sillasEstilos`
--
ALTER TABLE `sillasEstilos`
  MODIFY `ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sillasMateriales`
--
ALTER TABLE `sillasMateriales`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
