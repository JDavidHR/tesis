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
-- Table `asistencia`.`aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`aula` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id del aula',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del aula',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`horario` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id del horario',
  `hora` DATETIME NOT NULL COMMENT 'Fecha del horario',
  `materias` VARCHAR(45) NOT NULL COMMENT 'Materias del horario',
  `aula_id` INT NOT NULL COMMENT 'Id del aula',
  PRIMARY KEY (`id`, `aula_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_horario_aula1_idx` (`aula_id` ASC) ,
  CONSTRAINT `fk_horario_aula1`
    FOREIGN KEY (`aula_id`)
    REFERENCES `asistencia`.`aula` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`clases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`clases` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase',
  `hora` DATETIME NOT NULL COMMENT 'Fecha de la clase',
  `aula_id` INT NOT NULL COMMENT 'Id del aula',
  `horario_id` INT NOT NULL COMMENT 'Id del horario',
  PRIMARY KEY (`id`, `aula_id`, `horario_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_clases_aula1_idx` (`aula_id` ASC) ,
  INDEX `fk_clases_horario1_idx` (`horario_id` ASC) ,
  CONSTRAINT `fk_clases_aula1`
    FOREIGN KEY (`aula_id`)
    REFERENCES `asistencia`.`aula` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_clases_horario1`
    FOREIGN KEY (`horario_id`)
    REFERENCES `asistencia`.`horario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`tipo_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre (Administrador, Estudiante o Docente)',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del usuario',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del usuario',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del usuario',
  `jornada` VARCHAR(45) NOT NULL COMMENT 'Jornada del usuario',
  `tipo_usuario_id` INT NOT NULL COMMENT 'Id del tipo de usuario',
  `horario_id` INT NOT NULL COMMENT 'Id del horario',
  PRIMARY KEY (`id`, `tipo_usuario_id`, `horario_id`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_id` ASC) ,
  INDEX `fk_usuario_horario1_idx` (`horario_id` ASC) ,
  CONSTRAINT `fk_usuario_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id`)
    REFERENCES `asistencia`.`tipo_usuario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_horario1`
    FOREIGN KEY (`horario_id`)
    REFERENCES `asistencia`.`horario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`administrador` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador',
  `documento` VARCHAR(45) NOT NULL COMMENT 'Documento del administrador',
  `nombres` VARCHAR(45) NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del administrador',
  `tipo_usuario_id` INT NOT NULL COMMENT 'Id del tipo de usuario',
  PRIMARY KEY (`id`, `tipo_usuario_id`),
  UNIQUE INDEX `documento_UNIQUE` (`documento` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_administrador_tipo_usuario1_idx` (`tipo_usuario_id` ASC) ,
  CONSTRAINT `fk_administrador_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_id`)
    REFERENCES `asistencia`.`tipo_usuario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencia`.`clases_has_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia`.`clases_has_usuario` (
  `clases_id` INT NOT NULL COMMENT 'Id de la clase',
  `usuario_id` INT NOT NULL COMMENT 'Id de los usuarios',
  PRIMARY KEY (`clases_id`, `usuario_id`),
  INDEX `fk_clases_has_usuario_usuario1_idx` (`usuario_id` ASC) ,
  INDEX `fk_clases_has_usuario_clases1_idx` (`clases_id` ASC) ,
  CONSTRAINT `fk_clases_has_usuario_clases1`
    FOREIGN KEY (`clases_id`)
    REFERENCES `asistencia`.`clases` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_clases_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `asistencia`.`usuario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
