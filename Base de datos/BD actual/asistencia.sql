-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 00:05:21
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL COMMENT 'Identificador del administrador',
  `documento` varchar(45) NOT NULL COMMENT 'Documento del administrador',
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` varchar(45) NOT NULL COMMENT 'Apellidos del administrador',
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `documento`, `nombres`, `apellidos`, `clave`, `estado`, `tipo_usuario_id_tipo_usuario`) VALUES
(1, '123', 'Juan', 'Hoyos', '123', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL COMMENT 'Id del aula',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del aula',
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `nombre`, `estado`) VALUES
(1, 'LAB C', 1),
(6, 'Texto', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `estado`) VALUES
(1, 'Ingeniería en Sistemas', 1),
(2, 'Administracion Empresas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL COMMENT 'Id de la clase',
  `Dias_id_dia` int(11) NOT NULL,
  `hora` time NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `Docente_id_docente` int(11) NOT NULL,
  `Aula_id_aula` int(11) NOT NULL,
  `Materia_id_materia` int(11) NOT NULL,
  `Grupo_id_grupo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `Dias_id_dia`, `hora`, `codigo`, `Docente_id_docente`, `Aula_id_aula`, `Materia_id_materia`, `Grupo_id_grupo`, `estado`) VALUES
(1, 1, '07:45:00', 'code_lunes', 1, 1, 1, 1, 1),
(6, 2, '11:22:50', 'code_martes', 1, 1, 6, 1, 1),
(11, 6, '09:55:37', 'code_sabado', 1, 1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `nombre`) VALUES
(7, 'Domingo'),
(4, 'Jueves'),
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(6, 'Sabado'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL COMMENT 'Identificador del docente',
  `documento` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del docente\n\n',
  `apellidos` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `documento`, `nombres`, `apellidos`, `clave`, `tipo_usuario_id_tipo_usuario`, `estado`) VALUES
(1, '123', 'Natalia', 'Agudelo', '123', 2, 1),
(2, '456', 'Pruebas', 'Pruebas', '456', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL COMMENT 'Identificador del estudiante',
  `documento` varchar(45) NOT NULL COMMENT 'Documento del estudiante',
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del estudiante',
  `apellidos` varchar(45) NOT NULL COMMENT 'Apellidos del estudiante',
  `jornada` varchar(45) NOT NULL COMMENT 'Jornada del estudiante',
  `semestre` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `Carrera_id_carrera` int(11) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `documento`, `nombres`, `apellidos`, `jornada`, `semestre`, `clave`, `estado`, `Carrera_id_carrera`, `tipo_usuario_id_tipo_usuario`) VALUES
(1, '123', 'Diego', 'Rios', 'Diurna', 'Septimo', '123', 1, 1, 1),
(2, '456', 'Pruebas', 'Pruebas', 'Sabatina', 'Quinto', '456', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `Estudiante_id_estudiante` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre`, `Estudiante_id_estudiante`, `estado`) VALUES
(1, 'grupo 1 dia', 1, 0),
(1, 'grupo 1 dia', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL COMMENT 'Id de la materia',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la materia',
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `estado`) VALUES
(1, 'Gestion Contable', 1),
(6, 'Calculo 2', 1),
(7, 'Ingles A2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL COMMENT 'Id del usuario',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre (Administrador, Estudiante o Docente)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_administrador`),
  ADD KEY `fk_administrador_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_aula`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`),
  ADD UNIQUE KEY `id_carrera_UNIQUE` (`id_carrera`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`,`Dias_id_dia`,`Docente_id_docente`,`Aula_id_aula`,`Materia_id_materia`,`Grupo_id_grupo`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_clase`),
  ADD KEY `fk_Clase_Docente1_idx` (`Docente_id_docente`),
  ADD KEY `fk_Clase_Aula1_idx` (`Aula_id_aula`),
  ADD KEY `fk_Clase_Materia1_idx` (`Materia_id_materia`),
  ADD KEY `fk_Clase_Grupo1_idx` (`Grupo_id_grupo`),
  ADD KEY `fk_Clase_Dias1_idx` (`Dias_id_dia`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`),
  ADD UNIQUE KEY `id_dia_UNIQUE` (`id_dia`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `id_docente_UNIQUE` (`id_docente`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD KEY `fk_docente_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`,`Carrera_id_carrera`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_estudiante`),
  ADD KEY `fk_estudiante_Carrera1_idx` (`Carrera_id_carrera`),
  ADD KEY `fk_estudiante_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`,`Estudiante_id_estudiante`),
  ADD KEY `fk_Grupo_Estudiante1_idx` (`Estudiante_id_estudiante`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_materia`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del aula', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del docente', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del estudiante', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la materia', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario', AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk_Clase_Aula1` FOREIGN KEY (`Aula_id_aula`) REFERENCES `aula` (`id_aula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Clase_Dias1` FOREIGN KEY (`Dias_id_dia`) REFERENCES `dias` (`id_dia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Clase_Docente1` FOREIGN KEY (`Docente_id_docente`) REFERENCES `docente` (`id_docente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Clase_Grupo1` FOREIGN KEY (`Grupo_id_grupo`) REFERENCES `grupo` (`id_grupo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Clase_Materia1` FOREIGN KEY (`Materia_id_materia`) REFERENCES `materia` (`id_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_Carrera1` FOREIGN KEY (`Carrera_id_carrera`) REFERENCES `carrera` (`id_carrera`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiante_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_Grupo_Estudiante1` FOREIGN KEY (`Estudiante_id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
