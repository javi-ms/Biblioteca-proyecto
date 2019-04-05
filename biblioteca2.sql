-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2018 a las 14:32:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccionusuario`
--

CREATE TABLE `coleccionusuario` (
  `idColeccion` int(11) NOT NULL,
  `IdLibros` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `IdEstados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `nombreEditorial`) VALUES
(1, 'Salamandra'),
(2, 'Minotauro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nombreEstado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nombreEstado`) VALUES
(1, 'Pendiente'),
(2, 'Leido'),
(3, 'Prestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IdGeneros` int(6) NOT NULL,
  `NombreGeneros` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IdGeneros`, `NombreGeneros`) VALUES
(1, 'Policial'),
(2, 'Novela Negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `IdLibros` int(11) NOT NULL,
  `Nombres` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Autores` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `IdTipos` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `IdGeneros` int(6) NOT NULL,
  `AnoPublicacion` date NOT NULL,
  `Ediciones` int(5) NOT NULL,
  `Editorial` int(11) NOT NULL,
  `NombreOriginal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Sinopsis` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Valoraciones` int(1) NOT NULL,
  `Imagenes` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Descargas` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`IdLibros`, `Nombres`, `Autores`, `IdTipos`, `ISBN`, `IdGeneros`, `AnoPublicacion`, `Ediciones`, `Editorial`, `NombreOriginal`, `Sinopsis`, `Valoraciones`, `Imagenes`, `Descargas`) VALUES
(1, 'Harry Potter y la Piedra Folisofal', 'JKROWLING', 1, 55555, 1, '0000-00-00', 1, 1, 'xasADSA', 'ADA', 1, '', ''),
(2, 'ESDLA La comunidad del anillo', 'JRRTOLKIEN', 1, 1243123123, 2, '0000-00-00', 1, 2, 'sadasd', 'adasd', 10, '', ''),
(3, 'Star wars Vector Prime', 'anonimo', 1, 23414141, 1, '0000-00-00', 1, 2, 'dsfa', 'asda', 10, '', ''),
(4, 'El Lazarillo de Tormes', 'anonimo', 1, 1231321, 2, '0000-00-00', 1, 2, 'adadsasd', 'adadasd', 9, '', ''),
(5, 'El juego de Ender', 'Orson Scot Card', 1, 1231231314, 2, '0000-00-00', 1, 2, 'asda', 'adasda', 8, '', ''),
(6, 'Eragon', 'Christopher Paolini', 1, 1123145151, 2, '0000-00-00', 1, 2, '1231ada', 'adasda', 5, '', ''),
(7, 'Naruto', 'masashi kishimito', 2, 6576, 1, '0000-00-00', 1, 1, '4fjhf', 'shgdhd', 5, '', ''),
(8, 'Bleach', 'Tite Kubo', 2, 6854577, 2, '0000-00-00', 1, 2, 'adasdadsa', 'adsada', 6, '', ''),
(9, 'Mortadelo y filemon', 'Francisco Ibáñez', 3, 12345623, 1, '0000-00-00', 1, 2, 'Mortadelo y Filemon', 'asdadsada', 7, '', ''),
(10, 'Asterix el Galo', 'René Goscinny y Albert Uderzo ', 3, 1245612312, 2, '0000-00-00', 1, 2, 'asgfds', 'aasgsf', 8, '', ''),
(11, 'The New Gate', 'anonimo', 2, 1919154185, 2, '2018-11-09', 5, 1, 'The New Gate', 'Un muchacho se queda encerrado en un juego online', 6, 'asda', 'sfsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `idLibro`, `idUsuario`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipolibro`
--

CREATE TABLE `tipolibro` (
  `IdTipos` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipolibro`
--

INSERT INTO `tipolibro` (`IdTipos`, `Nombres`) VALUES
(1, 'Libro'),
(2, 'Manga'),
(3, 'Comic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousers`
--

CREATE TABLE `tipousers` (
  `idTipo` int(3) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipousers`
--

INSERT INTO `tipousers` (`idTipo`, `tipo`) VALUES
(1, 'admin'),
(2, 'colaborador'),
(3, 'basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuarios` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdTipos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuarios`, `Nombres`, `Usuarios`, `password`, `email`, `IdTipos`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin', 1),
(2, 'col', 'col', 'col', 'col', 2),
(3, 'bas', 'bas', 'bas', 'bas', 3),
(4, 'ingwe', 'ingwe', 'ingwe', 'ingwe', 3),
(5, 'asco', 'asco', 'asco', 'asco', 1),
(6, 'ing', 'ing', 'ing', 'ing', 3),
(7, 'fad', 'ing', 'ing', 'ing', 3),
(8, 'fad', 'fad', 'ing', 'ing', 3),
(9, 'fad', 'fad', 'fad', 'ing', 3),
(10, 'fawe', 'fawe', 'fawe', 'fawe', 2),
(11, 'jms', 'jms', 'jms', 'jms', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `IdValoraciones` int(11) NOT NULL,
  `Valoraciones` int(11) NOT NULL,
  `IdLibros` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coleccionusuario`
--
ALTER TABLE `coleccionusuario`
  ADD PRIMARY KEY (`idColeccion`),
  ADD KEY `idEstado` (`IdEstados`),
  ADD KEY `fk_idUsers` (`IdUsuarios`),
  ADD KEY `fk_idBooks` (`IdLibros`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IdGeneros`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`IdLibros`),
  ADD KEY `fk_idGenero` (`IdGeneros`),
  ADD KEY `fk_idEditorial` (`Editorial`),
  ADD KEY `fk_idTipo` (`IdTipos`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_idBookPres` (`idLibro`),
  ADD KEY `fk_idUsersPres` (`idUsuario`);

--
-- Indices de la tabla `tipolibro`
--
ALTER TABLE `tipolibro`
  ADD PRIMARY KEY (`IdTipos`);

--
-- Indices de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`),
  ADD KEY `idTipo` (`IdTipos`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`IdValoraciones`),
  ADD KEY `fk_IdLibrosVal` (`IdLibros`),
  ADD KEY `fk_IdUsuariosVal` (`IdUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coleccionusuario`
--
ALTER TABLE `coleccionusuario`
  MODIFY `idColeccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `IdGeneros` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `IdLibros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipolibro`
--
ALTER TABLE `tipolibro`
  MODIFY `IdTipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  MODIFY `idTipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `IdValoraciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coleccionusuario`
--
ALTER TABLE `coleccionusuario`
  ADD CONSTRAINT `coleccionusuario_ibfk_1` FOREIGN KEY (`IdEstados`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `fk_idBooks` FOREIGN KEY (`IdLibros`) REFERENCES `libros` (`IdLibros`),
  ADD CONSTRAINT `fk_idUsers` FOREIGN KEY (`IdUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_idEditorial` FOREIGN KEY (`Editorial`) REFERENCES `editorial` (`idEditorial`),
  ADD CONSTRAINT `fk_idGenero` FOREIGN KEY (`IdGeneros`) REFERENCES `genero` (`IdGeneros`),
  ADD CONSTRAINT `fk_idTipo` FOREIGN KEY (`IdTipos`) REFERENCES `tipolibro` (`IdTipos`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_idBookPres` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`IdLibros`),
  ADD CONSTRAINT `fk_idUsersPres` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdTipos`) REFERENCES `tipousers` (`idTipo`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_IdLibrosVal` FOREIGN KEY (`IdLibros`) REFERENCES `libros` (`IdLibros`),
  ADD CONSTRAINT `fk_IdUsuariosVal` FOREIGN KEY (`IdUsuarios`) REFERENCES `usuarios` (`idUsuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
