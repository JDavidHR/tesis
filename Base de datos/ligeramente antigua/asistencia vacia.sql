-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema asistencia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema asistencia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asistencia` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `asistencia` ;

-- -----------------------------------------------------
-- Table `asistencia`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`tipo_usuario` (
  `id_tipo_usuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre (Administrador, Estudiante o Docente)',
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE INDEX `id_UNIQUE` (`id_tipo_usuario` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `asistencia`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`administrador` (
  `id_administrador` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del administrador',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del administrador',
  `clave` VARCHAR(45) NOT NULL COMMENT 'Clave del administrador',
  `estado` INT(11) NOT NULL COMMENT 'Activo o inactiva',
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL COMMENT 'Tipo de usuario',
  PRIMARY KEY (`id_administrador`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id_administrador` ASC) ,
  INDEX `fk_administrador_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_administrador_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`tipo_usuario` (`id_tipo_usuario`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `asistencia`.`aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`aula` (
  `id_aula` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del aula',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del aula',
  `estado` INT(11) NOT NULL COMMENT 'Activa o inactiva',
  PRIMARY KEY (`id_aula`),
  UNIQUE INDEX `id_UNIQUE` (`id_aula` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `asistencia`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`carrera` (
  `id_carrera` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la carrera',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la carrera',
  `estado` INT(11) NOT NULL COMMENT 'Activa o inactiva',
  PRIMARY KEY (`id_carrera`),
  UNIQUE INDEX `id_carrera_UNIQUE` (`id_carrera` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `asistencia`.`dias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`dias` (
  `id_dia` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id el dia',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del dia',
  PRIMARY KEY (`id_dia`),
  UNIQUE INDEX `id_dia_UNIQUE` (`id_dia` ASC) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `asistencia`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`docente` (
  `id_docente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del docente',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del docente',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del docente\\n\\n',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del docente',
  `clave` VARCHAR(45) NOT NULL COMMENT 'Clave del docente',
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL COMMENT 'Tipo de usuario',
  `estado` INT(11) NOT NULL COMMENT 'Activo o inactivo',
  PRIMARY KEY (`id_docente`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `id_docente_UNIQUE` (`id_docente` ASC) ,
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  INDEX `fk_docente_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_docente_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`tipo_usuario` (`id_tipo_usuario`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `asistencia`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`estudiante` (
  `id_estudiante` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del estudiante',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del estudiante',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del estudiante',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del estudiante',
  `jornada` VARCHAR(45) NOT NULL COMMENT 'Jornada del estudiante',
  `semestre` VARCHAR(45) NOT NULL COMMENT 'Semestre en el que se encuentra',
  `clave` VARCHAR(45) NOT NULL COMMENT 'Clave del estudiante',
  `estado` INT(11) NOT NULL COMMENT 'Activo o inactivo',
  `Carrera_id_carrera` INT(11) NOT NULL COMMENT 'Id de la carrera que cursa',
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL COMMENT 'Id del tipo de usuario',
  PRIMARY KEY (`id_estudiante`, `Carrera_id_carrera`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id_estudiante` ASC) ,
  INDEX `fk_estudiante_Carrera1_idx` (`Carrera_id_carrera` ASC) ,
  INDEX `fk_estudiante_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_estudiante_Carrera1`
    FOREIGN KEY (`Carrera_id_carrera`)
    REFERENCES `asistencia`.`carrera` (`id_carrera`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiante_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`tipo_usuario` (`id_tipo_usuario`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `asistencia`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`grupo` (
  `id_grupo` INT(11) NOT NULL COMMENT 'Id del grupo',
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL COMMENT 'Nombre del grupo',
  `Estudiante_id_estudiante` INT(11) NOT NULL COMMENT 'Id del estudiante',
  `estado` INT(11) NOT NULL COMMENT 'Activo o inactivo',
  PRIMARY KEY (`id_grupo`, `Estudiante_id_estudiante`),
  INDEX `fk_Grupo_Estudiante1_idx` (`Estudiante_id_estudiante` ASC) ,
  CONSTRAINT `fk_Grupo_Estudiante1`
    FOREIGN KEY (`Estudiante_id_estudiante`)
    REFERENCES `asistencia`.`estudiante` (`id_estudiante`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `asistencia`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`materia` (
  `id_materia` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la materia',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la materia',
  `estado` INT(11) NOT NULL COMMENT 'Activo o inactivo',
  PRIMARY KEY (`id_materia`),
  UNIQUE INDEX `id_UNIQUE` (`id_materia` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `asistencia`.`clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`clase` (
  `id_clase` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase',
  `Dias_id_dia` INT(11) NOT NULL COMMENT 'Id del dia',
  `hora` TIME NOT NULL COMMENT 'Hora de inicio de la clase',
  `horafin` TIME NOT NULL COMMENT 'Hora fin de la clase',
  `codigo` VARCHAR(45) NOT NULL COMMENT 'Codigo de la clase',
  `Docente_id_docente` INT(11) NOT NULL COMMENT 'Id del docente que la dara',
  `Aula_id_aula` INT(11) NOT NULL COMMENT 'Id del aula en la que se vera',
  `Materia_id_materia` INT(11) NOT NULL COMMENT 'Id de la materia que se vera',
  `Grupo_id_grupo` INT(11) NOT NULL COMMENT 'Id del grupo asignado',
  `estado` INT(11) NOT NULL COMMENT 'Estado de la clase',
  PRIMARY KEY (`id_clase`, `Dias_id_dia`, `Docente_id_docente`, `Aula_id_aula`, `Materia_id_materia`, `Grupo_id_grupo`),
  UNIQUE INDEX `id_UNIQUE` (`id_clase` ASC) ,
  INDEX `fk_Clase_Docente1_idx` (`Docente_id_docente` ASC) ,
  INDEX `fk_Clase_Aula1_idx` (`Aula_id_aula` ASC) ,
  INDEX `fk_Clase_Materia1_idx` (`Materia_id_materia` ASC) ,
  INDEX `fk_Clase_Grupo1_idx` (`Grupo_id_grupo` ASC) ,
  INDEX `fk_Clase_Dias1_idx` (`Dias_id_dia` ASC) ,
  CONSTRAINT `fk_Clase_Aula1`
    FOREIGN KEY (`Aula_id_aula`)
    REFERENCES `asistencia`.`aula` (`id_aula`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Dias1`
    FOREIGN KEY (`Dias_id_dia`)
    REFERENCES `asistencia`.`dias` (`id_dia`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Docente1`
    FOREIGN KEY (`Docente_id_docente`)
    REFERENCES `asistencia`.`docente` (`id_docente`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Grupo1`
    FOREIGN KEY (`Grupo_id_grupo`)
    REFERENCES `asistencia`.`grupo` (`id_grupo`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Materia1`
    FOREIGN KEY (`Materia_id_materia`)
    REFERENCES `asistencia`.`materia` (`id_materia`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
