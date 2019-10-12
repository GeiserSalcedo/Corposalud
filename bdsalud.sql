-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2019 a las 17:39:51
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdsalud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_laboral1`
--

CREATE TABLE IF NOT EXISTS `area_laboral1` (
  `laboral1Id` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_area1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`laboral1Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area_laboral1`
--

INSERT INTO `area_laboral1` (`laboral1Id`, `nombre_area1`) VALUES
('03', 'OFICINA CENTRAL MANTENIMIENTO'),
('05', 'MANTENIMIENTO GENERAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_laboral2`
--

CREATE TABLE IF NOT EXISTS `area_laboral2` (
  `laboral2Id` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_area2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`laboral2Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area_laboral2`
--

INSERT INTO `area_laboral2` (`laboral2Id`, `nombre_area2`) VALUES
('03', 'OFICINA CENTRAL MANTENIMIENTO'),
('05', 'MANTENIMIENTO GENERAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
  `asignacionId` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `frecuencia` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`asignacionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`asignacionId`, `concepto`, `frecuencia`, `valor`) VALUES
('0001', 'PRIMA HIJO', 'MM', '2000.00'),
('0002', 'DOMINGO/FERIADO DIURNO', 'MM', '0'),
('0003', 'DOMINGO/FERIADO NOCTURNO', 'MM', '0'),
('0004', 'DIA ADICIONAL', 'MM', '30'),
('0101', 'GUARDIA NOCTURNA', 'MM', '0'),
('0201', 'BONO NOCTURNO FIJO', 'MM', '50%'),
('0301', 'PRIMA ANTIGUEDAD', 'MM', '10%'),
('0302', 'PRIMA ANTIGUEDAD', 'MM', '15%'),
('0303', 'PRIMA ANTIGUEDAD', 'MM', '20%'),
('0304', 'PRIMA ANTIGUEDAD', 'MM', '26%'),
('0305', 'PRIMA ANTIGUEDAD', 'MM', '30%'),
('0401', 'PRIMA PROFESIONALIZACIÃ³N', 'MM', '18%'),
('0402', 'PRIMA PROFESIONALIZACIÃ³N', 'MM', '22%'),
('0403', 'PRIMA PROFESIONALIZACIÃ³N', 'MM', '26%'),
('0404', 'PRIMA PROFESIONALIZACIÃ³N', 'MM', '28%'),
('0501', 'PRIMA ACT SISTEMA PUBLICO NAC', 'MM', '10%'),
('0601', 'COMPENSACIÃ“N', 'MM', '0'),
('0701', 'COMPENSACIÃ“N POR EVALUACIÃ“N', 'MM', '0'),
('0801', 'COMPLEMENTO ESPECIAL DE EST. ECONÃ“MICA ', 'MM', '40%'),
('0901', 'ESCALAFÃ“N', 'MM', '14%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_empleado`
--

CREATE TABLE IF NOT EXISTS `asigna_empleado` (
  `codigoRac` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `asignacionId` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL,
  `monto` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  KEY `codigoRac` (`codigoRac`),
  KEY `asignacionId` (`asignacionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asigna_empleado`
--

INSERT INTO `asigna_empleado` (`codigoRac`, `asignacionId`, `mes`, `ano`, `monto`) VALUES
('62366', '0001', 7, 2019, '6000'),
('62366', '0801', 7, 2019, '2016'),
('62366', '0601', 7, 2019, '1500'),
('62366', '0701', 7, 2019, '1200'),
('62366', '0501', 7, 2019, '504'),
('62366', '0305', 7, 2019, '2473.20'),
('62366', '0401', 7, 2019, '1929.10'),
('62366', '0201', 7, 2019, '6323.15'),
('62366', '0101', 7, 2019, '0'),
('62366', '0002', 7, 2019, '0'),
('62366', '0003', 7, 2019, '0'),
('62366', '0004', 7, 2019, '421.54'),
('62366', '0901', 7, 2019, '0'),
('23483', '0001', 7, 2019, '2000'),
('23483', '0801', 7, 2019, '2016'),
('23483', '0601', 7, 2019, '2500'),
('23483', '0701', 7, 2019, '2500'),
('23483', '0501', 7, 2019, '504'),
('23483', '0303', 7, 2019, '2108.80'),
('23483', '0401', 7, 2019, '2277.50'),
('23483', '0201', 7, 2019, '7465.15'),
('23483', '0101', 7, 2019, '7465.15'),
('23483', '0002', 7, 2019, '5897.47'),
('23483', '0003', 7, 2019, '8846.20'),
('23483', '0004', 7, 2019, '497.68'),
('23483', '0901', 7, 2019, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `cargoId` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombreCargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grado` int(2) NOT NULL,
  `nivel_instruccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `horas` int(2) NOT NULL,
  `salario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cargoId`),
  KEY `nivel_instruccion` (`nivel_instruccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`cargoId`, `nombreCargo`, `grado`, `nivel_instruccion`, `horas`, `salario`) VALUES
('07204', 'SUPERVISOR SERVICIOS INTERNOS', 1, 'PIII', 0, '5040.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE IF NOT EXISTS `deducciones` (
  `deduccionId` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `frecuencia` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`deduccionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`deduccionId`, `concepto`, `frecuencia`, `valor`) VALUES
('5001', 'IVSS', 'MM', '4%'),
('5002', 'FAOV', 'MM', '1%'),
('5003', 'RPE', 'MM', '0.5%'),
('5004', 'FONDO DE PENSION Y JUBILACION', 'MM', '3%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deduc_empleado`
--

CREATE TABLE IF NOT EXISTS `deduc_empleado` (
  `codigoRac` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `deduccionId` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL,
  `monto` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  KEY `codigoRac` (`codigoRac`),
  KEY `deduccionId` (`deduccionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deduc_empleado`
--

INSERT INTO `deduc_empleado` (`codigoRac`, `deduccionId`, `mes`, `ano`, `monto`) VALUES
('62366', '5001', 7, 2019, '466.94'),
('62366', '5002', 7, 2019, '126.46'),
('62366', '5003', 7, 2019, '58.37'),
('62366', '5004', 7, 2019, '379.39'),
('23483', '5001', 7, 2019, '551.27'),
('23483', '5002', 7, 2019, '149.30'),
('23483', '5003', 7, 2019, '68.91'),
('23483', '5004', 7, 2019, '447.91');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `departamentoId` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_depart` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`departamentoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamentoId`, `nombre_depart`) VALUES
('05', 'DEPARTAMENTO DE ENFERMERÃA'),
('06', 'DEPART. DE SERV. GENERALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE IF NOT EXISTS `distrito` (
  `distritoId` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_distrito` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`distritoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`distritoId`, `nombre_distrito`) VALUES
('02', 'DISTRITO SANIT.MERIDA'),
('03', 'DISTRITO SANITARIO EL VIGIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `codigoRac` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Código asignado a cada trabajador',
  `cedula` int(8) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `estadoCivil` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaInicioAdm` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `numeroHijos` int(2) NOT NULL,
  `numeroCuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `anosServicio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_instruccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `cargoId` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacionId` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estatusId` int(1) NOT NULL,
  `photo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoRac`),
  KEY `cargoId` (`cargoId`),
  KEY `ubicacionId` (`ubicacionId`),
  KEY `estatusId` (`estatusId`),
  KEY `cargoId_2` (`cargoId`),
  KEY `ubicacionId_2` (`ubicacionId`),
  KEY `estatusId_2` (`estatusId`),
  KEY `ubicacionId_3` (`ubicacionId`),
  KEY `nivel_instruccion` (`nivel_instruccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`codigoRac`, `cedula`, `nombre`, `apellido`, `genero`, `estadoCivil`, `fechaNacimiento`, `direccion`, `telefono`, `fechaInicio`, `fechaInicioAdm`, `fechaEgreso`, `numeroHijos`, `numeroCuenta`, `anosServicio`, `nivel_instruccion`, `cargoId`, `ubicacionId`, `estatusId`, `photo`) VALUES
('23483', 17664849, 'LUZ ANABEL', 'PEÃ‘A TORO', 'F', 'S', '1986-02-02', 'URB CARABOBO VEREDA 05 CASA 10', '04267347550', '2005-05-10', '2005-05-10', '0000-00-00', 1, '01029487487548745874', '14', 'TII', '07204', '0102060505', 2, ''),
('62366', 25152789, 'JESUS LEONEL', 'PEÃ±A TORO', 'M', 'S', '1995-05-16', 'AV BOLIVAR SECTOR SAN ANTONIO', '04262753539', '2002-01-20', '1998-02-10', '0000-00-00', 3, '01029487487548745874', '21', 'TI', '07204', '0103050303', 1, 'img003 - copia.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `estatusId` int(1) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`estatusId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`estatusId`, `tipo`) VALUES
(1, 'OBRERO FIJO MPPS'),
(2, 'OBRERO CONTRATADO MPPS'),
(3, 'OBRERO CLAUSURA 63'),
(4, 'EMPLEADO FIJO MPPS'),
(5, 'EMPLEADO CONTRATADO MPPS'),
(6, 'EMPLEADO MEDICO'),
(7, 'EMPLEADO ADMINISTRATIVO'),
(8, 'EMPLEADO MEDICO RURAL INTERNO'),
(9, 'EMPLEADO ALTO NIVEL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `institucionId` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_institucion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`institucionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`institucionId`, `nombre_institucion`) VALUES
('01', 'CORPORACIÃ“N DE SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_instruccion`
--

CREATE TABLE IF NOT EXISTS `nivel_instruccion` (
  `nivelId` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nivelId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel_instruccion`
--

INSERT INTO `nivel_instruccion` (`nivelId`, `concepto`) VALUES
('BI', 'BACHILLER I'),
('BII', 'BACHILLER II'),
('BIII', 'BACHILLER III'),
('PI', 'PROFESIONAL'),
('PII', 'ESPECIALISTA Y/O MAESTRIA'),
('PIII', 'DOCTORADO'),
('TI', 'TECNICO SUPERIOR I'),
('TII', 'TECNICO SUPERIOR II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE IF NOT EXISTS `nomina` (
  `codigoRac` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `percibido` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `deducido` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `total` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  KEY `codigoRac` (`codigoRac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`codigoRac`, `percibido`, `deducido`, `mes`, `ano`, `fecha`, `total`) VALUES
('62366', '27406.99', '1031.16', 7, 2019, '2019-07-01', '26375.83'),
('23483', '49117.95', '1217.39', 7, 2019, '2019-07-01', '47900.56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `ubicacionId` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `institucionId` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `distritoId` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `departamentoId` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `laboral1Id` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `laboral2Id` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ubicacionId`),
  KEY `institucion` (`institucionId`),
  KEY `distrito` (`distritoId`),
  KEY `departamento` (`departamentoId`),
  KEY `area1` (`laboral1Id`),
  KEY `area2` (`laboral2Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ubicacionId`, `institucionId`, `distritoId`, `departamentoId`, `laboral1Id`, `laboral2Id`) VALUES
('0102060505', '01', '02', '06', '05', '05'),
('0103050303', '01', '03', '05', '03', '03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nivel` varchar(12) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nivel`, `tipo`, `photo`, `created_on`) VALUES
(1, 'Coordinador', 'admin', 'Admin', 'Administrador', '', '2018-04-30'),
(2, 'Analista', '25152', 'Analista', 'Analista Empleados', '', '2019-06-02');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asigna_empleado`
--
ALTER TABLE `asigna_empleado`
  ADD CONSTRAINT `asigna_empleado_ibfk_1` FOREIGN KEY (`codigoRac`) REFERENCES `empleados` (`codigoRac`) ON DELETE CASCADE,
  ADD CONSTRAINT `asigna_empleado_ibfk_2` FOREIGN KEY (`asignacionId`) REFERENCES `asignaciones` (`asignacionId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`nivelId`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `deduc_empleado`
--
ALTER TABLE `deduc_empleado`
  ADD CONSTRAINT `deduc_empleado_ibfk_1` FOREIGN KEY (`codigoRac`) REFERENCES `empleados` (`codigoRac`) ON DELETE CASCADE,
  ADD CONSTRAINT `deduc_empleado_ibfk_2` FOREIGN KEY (`deduccionId`) REFERENCES `deducciones` (`deduccionId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`cargoId`) REFERENCES `cargos` (`cargoId`),
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`estatusId`) REFERENCES `estatus` (`estatusId`),
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`ubicacionId`) REFERENCES `ubicacion` (`ubicacionId`),
  ADD CONSTRAINT `empleados_ibfk_5` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`nivelId`);

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`codigoRac`) REFERENCES `empleados` (`codigoRac`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`institucionId`) REFERENCES `institucion` (`institucionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicacion_ibfk_2` FOREIGN KEY (`distritoId`) REFERENCES `distrito` (`distritoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicacion_ibfk_3` FOREIGN KEY (`departamentoId`) REFERENCES `departamento` (`departamentoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicacion_ibfk_4` FOREIGN KEY (`laboral1Id`) REFERENCES `area_laboral1` (`laboral1Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ubicacion_ibfk_5` FOREIGN KEY (`laboral2Id`) REFERENCES `area_laboral2` (`laboral2Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
