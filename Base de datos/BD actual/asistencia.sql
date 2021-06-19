-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema asistencia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema asistencia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asistencia` DEFAULT CHARACTER SET utf8 ;
USE `asistencia` ;

-- -----------------------------------------------------
-- Table `asistencia`.`Tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Tipo_usuario` (
  `id_tipo_usuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre (Administrador, Estudiante o Docente)',
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE INDEX `id_UNIQUE` (`id_tipo_usuario` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Administrador` (
  `id_administrador` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del administrador',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del administrador',
  `clave` VARCHAR(45) NOT NULL,
  `estado` INT(11) NOT NULL,
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_administrador`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id_administrador` ASC) ,
  INDEX `fk_administrador_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_administrador_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`Tipo_usuario` (`id_tipo_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Aula` (
  `id_aula` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del aula',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del aula',
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_aula`),
  UNIQUE INDEX `id_UNIQUE` (`id_aula` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Docente` (
  `id_docente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del docente',
  `documento` VARCHAR(45) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del docente\n\n',
  `apellidos` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`id_docente`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `id_docente_UNIQUE` (`id_docente` ASC) ,
  INDEX `fk_docente_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  CONSTRAINT `fk_docente_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`Tipo_usuario` (`id_tipo_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`Materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Materia` (
  `id_materia` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la materia',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la materia',
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_materia`),
  UNIQUE INDEX `id_UNIQUE` (`id_materia` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Carrera` (
  `id_carrera` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_carrera`),
  UNIQUE INDEX `id_carrera_UNIQUE` (`id_carrera` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`Estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Estudiante` (
  `id_estudiante` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del estudiante',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del estudiante',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del estudiante',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del estudiante',
  `jornada` VARCHAR(45) NOT NULL COMMENT 'Jornada del estudiante',
  `semestre` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `estado` INT(11) NOT NULL,
  `Carrera_id_carrera` INT NOT NULL,
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`, `Carrera_id_carrera`, `tipo_usuario_id_tipo_usuario`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id_estudiante` ASC) ,
  INDEX `fk_estudiante_Carrera1_idx` (`Carrera_id_carrera` ASC) ,
  INDEX `fk_estudiante_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario` ASC) ,
  CONSTRAINT `fk_estudiante_Carrera1`
    FOREIGN KEY (`Carrera_id_carrera`)
    REFERENCES `asistencia`.`Carrera` (`id_carrera`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiante_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `asistencia`.`Tipo_usuario` (`id_tipo_usuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Grupo` (
  `id_grupo` INT(11) NOT NULL AUTO_INCREMENT,
  `Estudiante_id_estudiante` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_grupo`, `Estudiante_id_estudiante`),
  INDEX `fk_Grupo_Estudiante1_idx` (`Estudiante_id_estudiante` ASC) ,
  CONSTRAINT `fk_Grupo_Estudiante1`
    FOREIGN KEY (`Estudiante_id_estudiante`)
    REFERENCES `asistencia`.`Estudiante` (`id_estudiante`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`Dias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Dias` (
  `id_dia` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_dia`),
  UNIQUE INDEX `id_dia_UNIQUE` (`id_dia` ASC) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`Clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Clase` (
  `id_clase` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase',
  `Dias_id_dia` INT(11) NOT NULL,
  `hora` TIME NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  `Docente_id_docente` INT(11) NOT NULL,
  `Aula_id_aula` INT(11) NOT NULL,
  `Materia_id_materia` INT(11) NOT NULL,
  `Grupo_id_grupo` INT(11) NOT NULL,
  PRIMARY KEY (`id_clase`, `Dias_id_dia`, `Docente_id_docente`, `Aula_id_aula`, `Materia_id_materia`, `Grupo_id_grupo`),
  UNIQUE INDEX `id_UNIQUE` (`id_clase` ASC) ,
  INDEX `fk_Clase_Docente1_idx` (`Docente_id_docente` ASC) ,
  INDEX `fk_Clase_Aula1_idx` (`Aula_id_aula` ASC) ,
  INDEX `fk_Clase_Materia1_idx` (`Materia_id_materia` ASC) ,
  INDEX `fk_Clase_Grupo1_idx` (`Grupo_id_grupo` ASC) ,
  INDEX `fk_Clase_Dias1_idx` (`Dias_id_dia` ASC) ,
  CONSTRAINT `fk_Clase_Docente1`
    FOREIGN KEY (`Docente_id_docente`)
    REFERENCES `asistencia`.`Docente` (`id_docente`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Aula1`
    FOREIGN KEY (`Aula_id_aula`)
    REFERENCES `asistencia`.`Aula` (`id_aula`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Materia1`
    FOREIGN KEY (`Materia_id_materia`)
    REFERENCES `asistencia`.`Materia` (`id_materia`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Grupo1`
    FOREIGN KEY (`Grupo_id_grupo`)
    REFERENCES `asistencia`.`Grupo` (`id_grupo`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Clase_Dias1`
    FOREIGN KEY (`Dias_id_dia`)
    REFERENCES `asistencia`.`Dias` (`id_dia`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
