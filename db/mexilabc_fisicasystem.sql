-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-03-2019 a las 19:25:54
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mexilabc_fisicasystem`
--
DROP SCHEMA IF EXISTS mexilabc_fisicasystem;
CREATE SCHEMA mexilabc_fisicasystem;
USE mexilabc_fisicasystem;article
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `idarticle` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `shortDescription` text,
  `file` varchar(250) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `uploadDate` datetime DEFAULT NULL,
  `reviewDate` datetime DEFAULT NULL,
  `idauthor` int(11) NOT NULL,
  `idvolume` int(11) NOT NULL,
  `idjournal` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`idarticle`, `title`, `shortDescription`, `file`, `area`, `uploadDate`, `reviewDate`, `idauthor`, `idvolume`, `idjournal`, `status`) VALUES
(1, 'my article', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'articlemy article-author-omar-hdez-sarmi.pdf', 1, '2017-11-14 01:25:03', NULL, 1, 1, NULL, 3),
(2, 'How to do a virtual journal', 'lalalalalala', 'articleHow to do a virtual journal-author-CINTYA-SANCHEZ DE LA VEGA-PEREZ.pdf', 1, '2017-11-15 03:01:14', NULL, 2, 1, NULL, 2),
(3, 'my article 2.9', 'lalalalalalalala', 'articlemy article 2.9-author-Laura-SÃ¡nchez-Melendez.pdf', 2, '2017-11-21 12:34:24', NULL, 3, 1, NULL, 2),
(4, 'Prueba1', 'Prueba de envÃ­o de articulo', 'articlePrueba1-author-OMAR-HERNANDEZ-SARMIENTO.pdf', 1, '2017-11-22 19:07:11', NULL, 1, 1, NULL, 2),
(5, 'Prueba de envÃ­o de un articulo', 'Descripcion', 'articlePrueba de envÃ­o de un articulo-author-Alejandro-Bautista-Hernandez-Alex.pdf', 1, '2017-11-22 19:12:37', NULL, 4, 1, NULL, 2),
(6, 'Probando funcionamiento', 'En este paso pretendo saber si algo falla para que lo corrijas Mike....pÃ³ngase a trabajar jajajaja', 'articleProbando funcionamiento-author-Ernesto-0-Chigo.pdf', 1, '2017-11-27 13:15:18', NULL, 5, 1, NULL, 3),
(7, 'my article3', 'lalalalaa', 'articlemy article3-author-OMAR-HERNANDEZ-SARMIENTO.pdf', 2, '2017-11-28 13:00:01', NULL, 1, 1, NULL, 1),
(8, 'My other article', 'lalalala', 'RVIyT_2018_4.pdf', 1, '2018-01-23 23:41:03', NULL, 1, 1, NULL, 1),
(9, 'My article 2 demo', 'lalalalala', 'RVIyT_2018_5.pdf', 2, '2018-01-24 13:46:53', NULL, 1, 1, NULL, 1),
(10, 'titulo', 'hola testing', 'RVIyT_2018_6.pdf', 2, '2018-08-29 23:02:06', NULL, 1, 1, NULL, 1),
(11, 'Testing email', 'Estamos probando el mail', 'RVIyT_2018_7.pdf', 1, '2018-08-29 23:04:07', NULL, 1, 1, NULL, 1),
(12, 'Testing 2 email', 'Enviando archivos a diferentes direccions', 'RVIyT_2018_8.pdf', 4, '2018-08-29 23:06:39', NULL, 1, 1, NULL, 1),
(13, 'Testing 3 email', 'Probando sistema de email para varios direcciones de email', 'RVIyT_2018_9.pdf', 2, '2018-08-29 23:10:27', NULL, 1, 1, NULL, 1),
(14, 'Testing 3 email', 'Probando sistema de email para varios direcciones de email', 'RVIyT_2018_10.pdf', 2, '2018-08-29 23:11:19', NULL, 1, 1, NULL, 1),
(15, 'Email testing 1', 'Prueba de correos', 'RVIyT_2018_11.pdf', 2, '2018-08-29 23:12:43', NULL, 1, 1, NULL, 1),
(16, 'Email testing 2', 'Prueba de mas correos para envio', 'RVIyT_2018_12.pdf', 4, '2018-08-29 23:13:34', NULL, 1, 1, NULL, 1),
(17, 'Email testing 2', 'Prueba de mas correos para envio', 'RVIyT_2018_13.pdf', 4, '2018-08-29 23:14:47', NULL, 1, 1, NULL, 1),
(18, 'Emal testing 3', 'Probando', 'RVIyT_2018_14.pdf', 4, '2018-08-29 23:16:13', NULL, 1, 1, NULL, 1),
(19, 'Email testing 4', 'Probando email', 'RVIyT_2018_15.pdf', 2, '2018-08-29 23:18:03', NULL, 1, 1, NULL, 1),
(20, 'Email testing 4', 'Probando email', 'RVIyT_2018_16.pdf', 2, '2018-08-29 23:20:15', NULL, 1, 1, NULL, 1),
(21, 'Email testing 5', 'Prueba de correos', 'RVIyT_2018_17.pdf', 5, '2018-08-29 23:21:23', NULL, 1, 1, NULL, 1),
(22, 'Email testing 6', 'Probando sistema de emails', 'RVIyT_2018_18.pdf', 2, '2018-08-29 23:24:48', NULL, 1, 1, NULL, 1),
(23, 'Email testing 6', 'Probando sistema de emails', 'RVIyT_2018_19.pdf', 2, '2018-08-29 23:29:49', NULL, 1, 1, NULL, 1),
(24, 'Email testing 6', 'Probando sistema de emails', 'RVIyT_2018_20.pdf', 2, '2018-08-29 23:29:49', NULL, 1, 1, NULL, 1),
(25, 'Email testing 7', 'MÃ¡s pruebas', 'RVIyT_2018_21.pdf', 2, '2018-08-29 23:30:15', NULL, 1, 1, NULL, 1),
(26, 'Email testing 7', 'MÃ¡s pruebas', 'RVIyT_2018_22.pdf', 2, '2018-08-29 23:30:39', NULL, 1, 1, NULL, 1),
(27, 'tan tan', 'tan', 'RVIyT_2018_1.pdf', 1, '2018-10-04 22:11:35', NULL, 10, 1, NULL, 1),
(28, 'da da', 'da da', 'RVIyT_2018_1.pdf', 1, '2018-10-05 06:18:09', NULL, 10, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_area`
--

CREATE TABLE `article_area` (
  `idarea` int(11) NOT NULL,
  `area` varchar(250) NOT NULL,
  `short_description` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `article_area`
--

INSERT INTO `article_area` (`idarea`, `area`, `short_description`) VALUES
(1, 'TECNOLOGY', 'LALALALA lolololo'),
(2, 'PROGRAMMING', 'OLALALALA'),
(4, 'PHP', 'LALALALA '),
(5, 'HTML', 'LALALALA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `idautor` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `familyName` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `institution` varchar(200) DEFAULT NULL,
  `acronym` varchar(200) DEFAULT NULL,
  `dependence` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `public_key` varchar(250) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`idautor`, `name`, `lastName`, `familyName`, `city`, `state`, `country`, `degree`, `institution`, `acronym`, `dependence`, `phone`, `email`, `iduser`, `public_key`, `registration_date`) VALUES
(1, 'OMAR', 'HERNANDEZ', 'SARMIENTO', 'PUEBLA', 'PUEBLA', 'MEXICO', 'DR.', 'BUAP', 'BUAP', 'COMPUTACION', '123456789', 'omar@correo.com', 1, 'f20134a1ccea75735f7527a962764268', '2017-11-11'),
(2, 'CINTYA', 'SANCHEZ DE LA VEGA', 'PEREZ', 'PUEBLA', 'PUEBLA', 'MEXICO', 'DRA.', 'BUAP', 'BUAP', 'COMPUTACION', '123456789', 'cintya@correo.com', 2, '3d7b326718a7895723b5759af0929b39', '2017-11-11'),
(3, 'Laura', 'SÃ¡nchez', 'Melendez', 'Puebla', 'Puebla', 'MÃ©xico', 'Dr', 'BenemÃ©rita Universidad AutÃ³noma de Puebla', 'BUAP', 'Facultad de Ciencias de la ComputaciÃ³n', '123456789', 'lau@correo.com', 5, 'c43b36b320115b258af84488d4bf9bc1', '2017-11-21'),
(4, 'Alejandro', 'Bautista-Hernandez', 'Alex', 'Puebla', 'Puebla', 'Mexico', 'Dr', 'IF-BUAP', 'sas', 'Facultad de Ingenieria', '2295500', 'alejandro.bautistah@hotmail.com', 6, '640d3e79316b30b737583f2f3fec454d', '2017-11-22'),
(5, 'Ernesto', '0', 'Chigo', 'Puebla', 'Puebla', 'Mexico', 'Dr.', 'Benemerita Universidad Autonoma de Puebla', 'BUAP', 'Facultad de Ingenieria Quimica', '2225194981', 'echigoa@yahoo.es', 7, 'a76c37e8578de89ae50122bf392f9ec9', '2017-11-24'),
(6, 'Alejandro', 'NA', 'Escobedo Morales', 'Puebla', 'Puebla', 'Mexico', 'Dr.', 'BenemÃ©rita Universidad AutÃ³noma de Puebla', 'BUAP', 'Facultad de IngenierÃ­a QuÃ­mica', 'NA', 'alejandro.escobedo@correo.buap.mx', 9, '95f71013e64f04654805cd5f901c45dc', '2017-11-28'),
(7, 'Omar', 'Hdez', 'Sar', 'PUEBLA', 'Puebla', 'MÃ©xico', 'DR', 'BUAP', 'BUAP', 'Science Computer', '123456789', 'omar.350.hs@gmail.com', 15, '1f837242dd86de6a585347b1caedbfb3', '2018-03-05'),
(8, 'Pablo', 'Hernandez', 'Trompito', 'Puebla', 'Puebla', 'MÃ©xico', 'Dr.', 'Benemerita Universidad Autonoma de Puebla', 'BUAP', 'Facultad de IngenierÃ­a QuÃ­mica', '+52 222 229500 ext. 7253', 'heribert@ifuap.buap.mx', 16, '42b55d02de6d134e9413285db3d8361e', '2018-08-01'),
(9, 'Mike', 'Camacho', 'T', 'Puebla', 'Puebla', 'MÃ©xico', 'Master', 'IFUAP', 'IF', 'Sistemas', '225500', 'camachot@hotmail.com', 17, 'f81350c7d909a833b37fb4cfd8a9ce33', '2018-08-09'),
(10, 'kokil', 'Hernandez', 'Cocoletzi', 'Puebla', 'Puebla', 'MÃ©xico', 'Ph. D.', 'Benemerita Universidad Autonoma de Puebla', 'BUAP', 'Facultad de IngenierÃ­a QuÃ­mica', '+52 222 229500 ext. 7253', 'kokil44@gmail.com', 18, '139e2539cec009e493f69de4402f6e1b', '2018-10-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correction`
--

CREATE TABLE `correction` (
  `idcorrection` int(11) NOT NULL,
  `correctionType` varchar(200) DEFAULT NULL,
  `description` text,
  `correctionDate` date DEFAULT NULL,
  `idarticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correction`
--

INSERT INTO `correction` (`idcorrection`, `correctionType`, `description`, `correctionDate`, `idarticle`) VALUES
(1, '0', 'Valid and revised article', '2018-01-24', 1),
(2, '3', 'Send again', '2018-01-24', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journal`
--

CREATE TABLE `journal` (
  `idjournal` int(11) NOT NULL,
  `NoJournal` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `volume` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `journal`
--

INSERT INTO `journal` (`idjournal`, `NoJournal`, `name`, `volume`, `date`, `status`) VALUES
(2, 1, 'Mexican Journal of Materials Science and Engineering', 1, '2017-11-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `familyName` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `university` varchar(200) DEFAULT NULL,
  `acronym` varchar(200) DEFAULT NULL,
  `dependence` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`, `name`, `lastName`, `familyName`, `phone`, `email`, `degree`, `university`, `acronym`, `dependence`, `city`, `state`, `country`, `iduser`, `registration_date`) VALUES
(1, 3, 'Heriberto', '', '', '123456789', 'heribert@ifuap.buap.mx', 'Dr', 'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA', 'BUAP', 'Fisica', 'Puebla', 'Puebla', 'Puebla', 3, '2017-11-11'),
(2, 2, 'Miguel', 'Camacho', 'Tellez', '123456789', 'camachot@hotmail.com', 'MTRO', 'BUAP', 'BUAP', 'COMPUTACION', 'PUEBLA', 'PUEBLA', 'MEXICO', 4, '2017-11-11'),
(3, 3, 'Irving', 'Luna', 'Gutierrez', '123456789', 'evaluador2@correo.com', 'Dr', 'BUAP', 'BUAP', 'Physics', 'Puebla', 'Puebla', 'Mexico', 8, '2017-11-27'),
(5, 2, 'Miguel', 'Camacho', 'Tellez', '123456789', 'miguel@correo.com', 'DR', 'BUAP', 'BUAP', 'Physical', 'Puebla', 'Puebla', 'Puebla', 10, '2018-01-24'),
(6, 2, 'Ernesto', NULL, NULL, NULL, 'ernesto.chigo@correo.buap.mx', NULL, 'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA', 'BUAP', 'FISICA', 'PUEBLA', 'PUEBLA', 'MEXICO', 11, '2018-02-14'),
(7, 2, 'Alejandro', 'Escobedo', NULL, NULL, 'alejandrro.escobedo@correo.buap.mx', NULL, 'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA', 'BUAP', 'FISICA', 'PUEBLA', 'PUEBLA', 'MEXICO', 12, '2018-02-14'),
(8, 2, 'Heriberto', 'Hernandez', NULL, NULL, 'heriberto.hernandez@correo.buap.mx', NULL, 'BUAP', 'BUAP', 'FISICA', 'PUEBLA', 'PUEBLA', 'MEXICO', 14, '2018-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_has_article`
--

CREATE TABLE `rol_has_article` (
  `idrol` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol_has_article`
--

INSERT INTO `rol_has_article` (`idrol`, `idarticle`, `status`) VALUES
(1, 1, 3),
(1, 2, 2),
(1, 3, 2),
(1, 4, 2),
(1, 5, 2),
(1, 6, 3),
(1, 11, NULL),
(1, 12, NULL),
(1, 18, NULL),
(1, 19, NULL),
(1, 20, NULL),
(1, 21, NULL),
(1, 27, NULL),
(1, 28, NULL),
(2, 7, NULL),
(2, 8, NULL),
(2, 9, NULL),
(3, 6, NULL),
(3, 10, NULL),
(3, 13, NULL),
(3, 14, NULL),
(3, 15, NULL),
(3, 16, NULL),
(3, 17, NULL),
(3, 22, NULL),
(3, 23, NULL),
(3, 24, NULL),
(3, 25, NULL),
(3, 26, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `rol`, `status`) VALUES
(1, 'omar@correo.com', 'd4466cce49457cfea18222f5a7cd3573', 4, 1),
(2, 'cintya@correo.com', 'd4466cce49457cfea18222f5a7cd3573', 4, 1),
(3, 'heribert@ifuap.buap.mx', '31f39a2fdd9be65a8880e8acef50e46d', 3, 1),
(4, 'camachot@hotmail.com', '5aee9dbd2a188839105073571bee1b1f', 2, 1),
(5, 'lau@correo.com', 'd4466cce49457cfea18222f5a7cd3573', 4, 1),
(6, 'alejandro.bautistah@hotmail.com', '534b44a19bf18d20b71ecc4eb77c572f', 4, 1),
(7, 'echigoa@yahoo.es', 'ea54f4936932212c52b2f58257038868', 4, 1),
(8, 'evaluador2@correo.com', '79ea73393f8b6c9e544960ab16e6403c', 3, 1),
(9, 'alejandro.escobedo@correo.buap.mx', '5f67f6a0b3c3e1a7301febfd623d6b5f', 4, 1),
(10, 'coeditor@correo.com', 'b3986806c90185897e051182180ac0ec', 2, 1),
(11, 'ernesto.chigo@correo.buap.mx', '5e85cc41a0f62ca4d9633982d6317d1d', 2, 1),
(12, 'alejandrro.escobedo@correo.buap.mx', 'a11f4fdfdba1f568a0832a9d64258d5c', 2, 1),
(14, 'heriberto.hernandez@correo.buap.mx', 'bd8797279a611ea778f7e3a04e089d41', 2, 1),
(15, 'omar.350.hs@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 4, 1),
(18, 'kokil44@gmail.com', '48131028da3a85318262b340fd8d853e', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_activity`
--

CREATE TABLE `user_activity` (
  `idactivity` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `activity_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_activity`
--

INSERT INTO `user_activity` (`idactivity`, `iduser`, `activity_date`) VALUES
(1, 1, '2017-11-11 23:13:58'),
(2, 1, '2017-11-11 23:16:57'),
(3, 1, '2017-11-11 23:42:34'),
(4, 1, '2017-11-14 00:08:33'),
(5, 1, '2017-11-14 18:37:58'),
(6, 2, '2017-11-15 03:01:31'),
(7, 1, '2017-11-20 03:16:41'),
(8, 2, '2017-11-20 03:17:42'),
(9, 1, '2017-11-20 11:51:12'),
(10, 1, '2017-11-20 14:34:57'),
(11, 1, '2017-11-21 12:11:16'),
(12, 1, '2017-11-21 12:20:14'),
(13, 1, '2017-11-21 12:20:23'),
(14, 5, '2017-11-21 12:21:53'),
(15, 1, '2017-11-21 12:25:33'),
(16, 1, '2017-11-21 12:29:47'),
(17, 5, '2017-11-21 12:36:03'),
(18, 1, '2017-11-21 12:44:17'),
(19, 1, '2017-11-22 19:07:46'),
(20, 6, '2017-11-22 19:18:50'),
(21, 6, '2017-11-23 12:01:38'),
(22, 7, '2017-11-27 15:11:52'),
(23, 1, '2017-11-28 10:36:38'),
(24, 1, '2017-11-28 12:57:30'),
(25, 1, '2017-11-28 13:01:02'),
(26, 7, '2017-11-28 13:03:51'),
(27, 1, '2017-11-28 13:07:24'),
(28, 1, '2017-11-28 13:09:06'),
(29, 1, '2017-11-28 13:17:01'),
(30, 1, '2017-11-28 15:53:15'),
(31, 4, '2018-01-04 11:42:00'),
(32, 1, '2018-01-04 11:56:30'),
(33, 1, '2018-01-23 23:42:28'),
(34, 1, '2018-01-24 13:49:02'),
(35, 1, '2018-01-24 13:52:06'),
(36, 1, '2018-01-24 15:44:36'),
(37, 1, '2018-01-25 10:26:01'),
(38, 7, '2018-02-02 11:22:12'),
(39, 7, '2018-02-08 11:51:58'),
(40, 7, '2018-02-08 13:33:33'),
(41, 1, '2018-03-05 01:13:36'),
(42, 1, '2018-03-05 01:46:56'),
(43, 15, '2018-03-05 01:47:32'),
(44, 1, '2018-07-11 21:29:21'),
(45, 15, '2018-07-19 12:10:07'),
(46, 18, '2018-10-04 21:51:55'),
(47, 18, '2018-10-04 21:55:19'),
(48, 18, '2018-10-05 06:16:51'),
(49, 18, '2018-10-05 06:24:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`,`iduser`),
  ADD KEY `fk_administrador_usuario1_idx` (`iduser`);

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`,`idauthor`,`idvolume`),
  ADD KEY `fk_articulo_autor1_idx` (`idauthor`),
  ADD KEY `fk_articulo_volumen1_idx` (`idvolume`);

--
-- Indices de la tabla `article_area`
--
ALTER TABLE `article_area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`idautor`,`iduser`),
  ADD KEY `fk_autor_usuario1_idx` (`iduser`);

--
-- Indices de la tabla `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`idcorrection`,`idarticle`),
  ADD KEY `fk_correcion_articulo1_idx` (`idarticle`);

--
-- Indices de la tabla `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`idjournal`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`,`iduser`),
  ADD KEY `fk_editor_usuario1_idx` (`iduser`);

--
-- Indices de la tabla `rol_has_article`
--
ALTER TABLE `rol_has_article`
  ADD PRIMARY KEY (`idrol`,`idarticle`),
  ADD KEY `fk_rol_has_article_article1_idx` (`idarticle`),
  ADD KEY `fk_rol_has_article_rol1_idx` (`idrol`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`idactivity`,`iduser`),
  ADD KEY `fk_actividad_usuario_usuario_idx` (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `article_area`
--
ALTER TABLE `article_area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `idautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `correction`
--
ALTER TABLE `correction`
  MODIFY `idcorrection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `journal`
--
ALTER TABLE `journal`
  MODIFY `idjournal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `idactivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_administrador_usuario1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
