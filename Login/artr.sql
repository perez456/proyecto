-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-03-2020 a las 20:48:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `cargo` int(11) NOT NULL,
  `nombreCargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`cargo`, `nombreCargo`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `codigoCita` int(11) NOT NULL,
  `documentoCli` int(11) NOT NULL,
  `documentoEmp` int(11) NOT NULL,
  `valorCita` int(11) NOT NULL,
  `fechaHora` datetime NOT NULL,
  `estadoCita` enum('Espera','Activa','Cancelada','Finalizada') NOT NULL,
  `nombreServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `documentoCli` int(11) NOT NULL,
  `nombreCli` varchar(50) NOT NULL,
  `apellidoCli` varchar(50) NOT NULL,
  `telefonoCli` int(11) NOT NULL,
  `direccionCli` varchar(50) NOT NULL,
  `tipoDocumentoCli` varchar(50) NOT NULL,
  `fechaInscripcionCli` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`documentoCli`, `nombreCli`, `apellidoCli`, `telefonoCli`, `direccionCli`, `tipoDocumentoCli`, `fechaInscripcionCli`, `id`) VALUES
(12378234, 'Daniel', 'Fajardo', 123, '123', 'cedula', '24/3/2020', 159),
(1193419700, 'Cristian', 'Danilo', 123, '123', 'cedula', '24/3/2020', 157);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecita`
--

CREATE TABLE `detallecita` (
  `idDetalle` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `documentoEmp` int(11) NOT NULL,
  `nombreEmp` varchar(50) NOT NULL,
  `apellidoEmp` varchar(50) NOT NULL,
  `telefonoEmp` bigint(15) NOT NULL,
  `direccionEmp` varchar(50) NOT NULL,
  `tipoDocumentoEmp` varchar(50) NOT NULL,
  `fechaInscripcionEmp` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_ser` int(11) NOT NULL,
  `nombre_ser` varchar(50) NOT NULL,
  `precio_ser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_ser`, `nombre_ser`, `precio_ser`) VALUES
(2, 'Corte Mujer', 10000),
(3, 'Lavado de Cabello', 12312321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`, `cargo`) VALUES
(157, 'cristian.montero1234@gmail.com', '$2y$10$ZucYbLMpmEWVFJnF.GxxouFSbTF07OqbOsgRZntPR.xe2yloNVMOy', 3),
(159, 'melissarrigui@gmail.com', '$2y$10$H9s.nUdoV78WnkObjliYC.l3mCJBYJU9e2BfuFxWXB3UvsDlaFHFa', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cargo`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`codigoCita`),
  ADD KEY `documentoCli` (`documentoCli`),
  ADD KEY `documentoEmp` (`documentoEmp`),
  ADD KEY `documentoCli_2` (`documentoCli`),
  ADD KEY `codigoServicio` (`nombreServicio`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documentoCli`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `detallecita`
--
ALTER TABLE `detallecita`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`documentoEmp`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_ser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cargo` (`cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `codigoCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecita`
--
ALTER TABLE `detallecita`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`documentoEmp`) REFERENCES `empleado` (`documentoEmp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`documentoCli`) REFERENCES `cliente` (`documentoCli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
