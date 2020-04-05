-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2020 a las 02:39:13
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

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
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estadoCita` varchar(50) NOT NULL,
  `nombreServicio` varchar(50) NOT NULL,
  `Servicio2` varchar(50) NOT NULL,
  `Servicio3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`codigoCita`, `documentoCli`, `documentoEmp`, `fecha`, `hora`, `estadoCita`, `nombreServicio`, `Servicio2`, `Servicio3`) VALUES
(1, 123456, 12345, '2020-04-22', '16:54:05', 'Finalizada', 'corte infantil', 'corte infantil', 'corte dama'),
(2, 123456789, 12345, '2020-04-16', '16:55:04', 'Finalizada', 'corte infantil', 'corte dama', 'corte infantil'),
(3, 123456, 12345, '2020-04-23', '08:45:54', 'Asignada', 'corte infantil', 'corte dama', 'corte infantil'),
(4, 123456, 1, '2020-04-22', '16:55:44', 'Espera', 'corte dama', 'corte infantil', 'corte infantil');

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
(1223, 'cris', 'cris', 6566, 'cll 456', 'cedula', '4/4/2020', 195),
(4456, 'camilo', 'camilo', 225634, 'df 45', 'tarjeta de identidad', '4/4/2020', 199),
(11223, 'carlos', 'carlos', 78956, 'cll 456', 'cedula', '3/4/2020', 193),
(112233, 'cristian', 'cristian', 123456, 'cll 4562', 'cedula', '4/4/2020', 197),
(123456, 'cristian', 'sgd', 52136, 'cll 452 55 ', 'tarjeta de identidad', '3/4/2020', 176),
(123456789, 'carlos', 'carlos', 123456, 'cll 25689', 'cedula', '3/4/2020', 184);

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
  `horario` varchar(50) NOT NULL,
  `estadoEmp` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`documentoEmp`, `nombreEmp`, `apellidoEmp`, `telefonoEmp`, `direccionEmp`, `tipoDocumentoEmp`, `fechaInscripcionEmp`, `horario`, `estadoEmp`, `id`) VALUES
(1, 'no aplica', 'no aplica', 0, 'no aplica', 'no aplica', '2020-03-30', '', '', 180),
(12345, 'carlos', 'per', 12345, '', 'cedula', '3/4/2020', 'MaÃ±ana 8AM-2PM', 'Activo', 186),
(12346, 'carlos', 'per', 12345, '', 'cedula', '3/4/2020', 'MaÃ±ana 8AM-2PM', 'Activo', 188),
(12348, 'admin', 'admin', 123456, '', 'cedula', '3/4/2020', 'vacio', 'Activo', 191),
(123467, 'carlos', 'per', 12345, '', 'cedula', '3/4/2020', 'MaÃ±ana 8AM-2PM', 'Activo', 189),
(123456789, 'carmen', 'carmen', 1123456, '', 'cedula', '3/4/2020', 'Tarde 2PM-10PM', 'Activo', 192);

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
(4, 'corte infantil', 5000),
(5, 'corte dama', 2000);

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
(174, 'sfcsfs@fgmblkcb', '$2y$10$7lFXcx6dkCePmn3hmlBhi.wwN.EOrMuaHGWpmixHb0vVP4jET1HAG', 2),
(175, 'crkn@gmail.com', '$2y$10$p4sma7kysLb5yf8IzDcPweb2GD3UFd23qk7Bz3x0OJ9xpraAGx3eq', 2),
(176, 'vrdk@gmaiol.com', '$2y$10$gpNaFyKaCrYztRJDL4jp2.DvTfeanj88VeS1vAM7WV6M.6.SHcdGK', 3),
(178, 'vdk@gmaiol.com', '$2y$10$U1FH7in6l8E24j4uBVPO/O2hjg2Lu5rb/uN/0e9ay8.3hVnGdby/K', 3),
(180, 'vdk@gmail.com', '$2y$10$eIJ16tahLugeSpK4dY/KYO28ThFYCOnokeJqJNZayw9hEfoFhrFFK', 3),
(182, 'cristian@gmail.com', '$2y$10$a.vcrP7yxcMTuiDYj3t3P.SJ0fGIVp9rT8aBFy8f8ooa/yW27QZ8a', 3),
(184, 'cristianv@gmail.com', '$2y$10$Zwj5NmgZgH6AjjhGotJjpuL6mA/D77pR3tLnC0ZKMJA6PEvl9ft5C', 3),
(186, 'trabajo@gmail.com', '$2y$10$8FOFmsP08WUOzoe0auDTr.5bQSZcw2Q.jGq7sE7.5SLuNAcvbm9Be', 2),
(188, 'trabajo1@gmail.com', '$2y$10$F8Xkn4AbMzNacaJgnLEXmuwksKppkOrWwL/fv3iQ9xsIEzbpw76BG', 2),
(189, 'trabajo12@gmail.com', '$2y$10$dtoK0WYp1t0jhfStFBtkVusLmEC6eEsNYKHBMX7EGoylLSNGd1j8S', 2),
(190, 'admin@gmail.com', '$2y$10$wzb9YgCpCO8..SpcIFtsVeA4KbkSbSThahi7w95bRNy3bG0hjvPFy', 1),
(191, 'admin12@gmail.com', '$2y$10$98CBeX51qb3Hf9A/3fT8perImcZ83RA314vQUIp5X1cBJCUbWQVLm', 1),
(192, 'carmen@gmail.com', '$2y$10$3J9SiDxg1FXCkkFY8pYq7OSVEfSKL4Tpkr.emiaf.MN3Jd1z8iU9q', 2),
(193, 'cri@gmail.com', '$2y$10$1mp2mDg6QEHuRMMfEsSfwu3gyClHKm7Kyh2nsf97tqDigSQ/L9Axi', 3),
(195, 'criss@gmail.com', '$2y$10$OhukW4iuLkMH1mg8BVNjVusUiH22xQYQbbTj/YLCpzbqA6UyBX5HO', 3),
(197, 'criss1@gmail.com', '$2y$10$Nd0zrqUUceopc1OS52Le8eVSzceUg/RapTdXumj4itisFpNp2Y4kW', 3),
(199, 'camilo12@gmail.com', '$2y$10$6Fl0tRStQwZciwKk/vqeQ.86uSQvpoQx9WEUUCuHzVMKlcHZ7naUe', 3);

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
  ADD KEY `documentoCli_2` (`documentoCli`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documentoCli`),
  ADD KEY `id` (`id`);

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
  MODIFY `codigoCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

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
