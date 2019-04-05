-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2018 a las 22:45:26
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

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
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
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
  `idGenero` int(6) NOT NULL,
  `nombreGenero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombreGenero`) VALUES
(1, 'Policial'),
(2, 'Novela Negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `Autor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ISBN` int(11) NOT NULL,
  `idGenero` int(6) NOT NULL,
  `anoPublicacion` int(4) NOT NULL,
  `Edicion` int(5) NOT NULL,
  `Editorial` int(11) NOT NULL,
  `nombreOriginal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Sinopsis` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descarga` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `Autor`, `ISBN`, `idGenero`, `anoPublicacion`, `Edicion`, `Editorial`, `nombreOriginal`, `Sinopsis`, `descarga`) VALUES
(1, 'Harry Potter y la piedra Filosofal', 5555555, 1, 1999, 1, 1, 'Harry Potter and philosopher Stone', 'Harry Potter', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idTipo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombre`, `usuario`, `password`, `email`, `idTipo`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coleccionusuario`
--
ALTER TABLE `coleccionusuario`
  ADD PRIMARY KEY (`idColeccion`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `fk_idUsers` (`idUsuario`),
  ADD KEY `fk_idBooks` (`idLibro`);

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
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `fk_idGenero` (`idGenero`),
  ADD KEY `fk_idEditorial` (`Editorial`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_idBookPres` (`idLibro`),
  ADD KEY `fk_idUsersPres` (`idUsuario`);

--
-- Indices de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `idTipo` (`idTipo`);

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
  MODIFY `idGenero` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  MODIFY `idTipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coleccionusuario`
--
ALTER TABLE `coleccionusuario`
  ADD CONSTRAINT `coleccionusuario_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `fk_idBooks` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`),
  ADD CONSTRAINT `fk_idUsers` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_idEditorial` FOREIGN KEY (`Editorial`) REFERENCES `editorial` (`idEditorial`),
  ADD CONSTRAINT `fk_idGenero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_idBookPres` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`),
  ADD CONSTRAINT `fk_idUsersPres` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipousers` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
