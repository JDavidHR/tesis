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
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL,
  `estado` INT NOT NULL,
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
-- Table `asistencia`.`Clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Clase` (
  `id_clase` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase',
  `dia` DATE NOT NULL COMMENT 'Dia de la clase',
  `codigo` VARCHAR(45) NOT NULL,
  `Docente_id_docente` INT(11) NOT NULL,
  PRIMARY KEY (`id_clase`, `Docente_id_docente`),
  UNIQUE INDEX `id_UNIQUE` (`id_clase` ASC) ,
  INDEX `fk_Clase_Docente1_idx` (`Docente_id_docente` ASC) ,
  CONSTRAINT `fk_Clase_Docente1`
    FOREIGN KEY (`Docente_id_docente`)
    REFERENCES `asistencia`.`Docente` (`id_docente`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Materia` (
  `id_materia` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la materia',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la materia',
  PRIMARY KEY (`id_materia`),
  UNIQUE INDEX `id_UNIQUE` (`id_materia` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Horario` (
  `id_horario` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del horario',
  `hora` TIME NOT NULL COMMENT 'Fecha del horario',
  `materia_id_materia` INT(11) NOT NULL,
  `aula_id_aula` INT(11) NOT NULL,
  PRIMARY KEY (`id_horario`, `materia_id_materia`, `aula_id_aula`),
  INDEX `fk_horario_materia1_idx` (`materia_id_materia` ASC) ,
  INDEX `fk_horario_aula1_idx` (`aula_id_aula` ASC) ,
  CONSTRAINT `fk_horario_materia1`
    FOREIGN KEY (`materia_id_materia`)
    REFERENCES `asistencia`.`Materia` (`id_materia`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_horario_aula1`
    FOREIGN KEY (`aula_id_aula`)
    REFERENCES `asistencia`.`Aula` (`id_aula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `asistencia`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`Carrera` (
  `id_carrera` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
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
  `Carrera_id_carrera` INT NOT NULL,
  `tipo_usuario_id_tipo_usuario` INT(11) NOT NULL,
  `estado` INT NOT NULL,
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
  `Horario_id_horario` INT(11) NOT NULL,
  `Clase_id_clase` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_grupo`, `Estudiante_id_estudiante`, `Horario_id_horario`, `Clase_id_clase`),
  INDEX `fk_Grupo_Estudiante1_idx` (`Estudiante_id_estudiante` ASC) ,
  INDEX `fk_Grupo_Horario1_idx` (`Horario_id_horario` ASC) ,
  INDEX `fk_Grupo_Clase1_idx` (`Clase_id_clase` ASC) ,
  CONSTRAINT `fk_Grupo_Estudiante1`
    FOREIGN KEY (`Estudiante_id_estudiante`)
    REFERENCES `asistencia`.`Estudiante` (`id_estudiante`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Grupo_Horario1`
    FOREIGN KEY (`Horario_id_horario`)
    REFERENCES `asistencia`.`Horario` (`id_horario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Grupo_Clase1`
    FOREIGN KEY (`Clase_id_clase`)
    REFERENCES `asistencia`.`Clase` (`id_clase`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
