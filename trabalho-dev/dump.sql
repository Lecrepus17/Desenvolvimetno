-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema banco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8 ;

USE `banco` ;


drop table if exists `banco`.`nivel_ensino`;
drop table if exists `banco`.`cursos`;
drop table if exists `banco`.`turmas`;
drop table if exists `banco`.`alunos`;

-- -----------------------------------------------------
-- Table `banco`.`nivel_ensino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`nivel_ensino` (
  `idNivel_ensino` INT NOT NULL AUTO_INCREMENT,
  `nome_nivel` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idNivel_ensino`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`cursos` (
  `idcursos` INT NOT NULL AUTO_INCREMENT,
  `nome_curso` VARCHAR(200) NOT NULL,
  `nivel_ensino_idNivel_ensino` INT NOT NULL,
  PRIMARY KEY (`idcursos`, `nivel_ensino_idNivel_ensino`),
    FOREIGN KEY (`nivel_ensino_idNivel_ensino`)
    REFERENCES `banco`.`nivel_ensino` (`idNivel_ensino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`turmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`turmas` (
  `idturmas` INT NOT NULL AUTO_INCREMENT,
  `nome_turma` VARCHAR(200) NOT NULL,
  `cursos_idcursos` INT NOT NULL,
  PRIMARY KEY (`idturmas`, `cursos_idcursos`),
    FOREIGN KEY (`cursos_idcursos`)
    REFERENCES `banco`.`cursos` (`idcursos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`alunos` (
  `idalunos` INT NOT NULL AUTO_INCREMENT,
  `nome_aluno` VARCHAR(150) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `foto` VARCHAR(300) NOT NULL,
  `turmas_idturmas` INT NOT NULL,
  `senha` VARCHAR(300),
  PRIMARY KEY (`idalunos`, `turmas_idturmas`),
    FOREIGN KEY (`turmas_idturmas`)
    REFERENCES `banco`.`turmas` (`idturmas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;






-- -----------------------------------------------------
-- Table `banco`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`admin` (
  `idadmin` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NOT NULL,
  `senha` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


insert into nivel_ensino (nome_nivel) values ('Técnico Integrado'), ('Subsequente');
insert into cursos (nome_curso, nivel_ensino_idNivel_ensino) values ('Info', 1), ('ads', 2);
insert into turmas (nome_turma, cursos_idcursos) values ('1 info', 1), ('2 info', 1), ('2 ads', 2), ('1 ads', 2);
insert into alunos (nome_aluno, data_nasc, foto, turmas_idturmas, senha) values ('Pedro Sperotto', '2006-12-12', 'assets/imagem_user/bento.jpg', 1, '111'), ('Alexandre', '2005-09-21', 'assets/imagem_user/download2.jpg', 2, '111')
, ('Cybelle', '2006-12-12', 'assets/imagem_user/cybele.png', 3, '111'), ('Gustavo', '2006-12-12', 'assets/imagem_user/joao.jpg', 4, '111');

insert into `admin` (nome, senha) values ('adm1', '123'), ('adm2', '111');

