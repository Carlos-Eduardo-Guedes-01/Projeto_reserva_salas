CREATE SCHEMA IF NOT EXISTS `salas` DEFAULT CHARACTER SET utf8 ;
USE `salas` ;

CREATE TABLE IF NOT EXISTS `Aluno` (
  `matricula` VARCHAR(40) NOT NULL primary key NOT NULL unique,
  endereco varchar(255),
  `nome` VARCHAR(255) NOT NULL,
  `curso` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(25) NULL
)ENGINE = innodb;


CREATE TABLE IF NOT EXISTS `salas`.`Professor` (
  `matricula` VARCHAR(40) NOT NULL primary key unique,
  endereco varchar(255),
  `nome` VARCHAR(255) NOT NULL,
  `area` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(25) NULL)ENGINE = innodb;


-- -----------------------------------------------------
-- Table `salas`.`Sala`drop table sala
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salas`.`Sala` (
  `numero` varchar(10) NOT NULL primary key,
  `descricao` VARCHAR(255) NULL)ENGINE = innodb;
alter table sala drop column nome,drop column turma,drop column tipo;
alter table sala add column descricao varchar(255);
-- -----------------------------------------------------
-- Table `salas`.`Aluno_Sala`
drop table aluno_sala;
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salas`.`Aluno_Sala` (
  id int primary key auto_increment,
  `Aluno_matricula` varchar(40) NOT NULL,
  `Sala_numero` varchar(10) NOT NULL,
  data_reserva date,
  `fk_Aluno_has_Sala_Sala1_idx` varchar(10),
  `fk_Aluno_has_Sala_Aluno_idx` varchar(40));
  alter table Aluno_Sala add
  CONSTRAINT `fk_Aluno_has_Sala_Aluno`
    FOREIGN KEY (`Aluno_matricula`)
    REFERENCES `salas`.`Aluno` (`matricula`);
    alter table Aluno_Sala add
  CONSTRAINT `fk_Aluno_has_Sala_Aluno`
    FOREIGN KEY (`Aluno_matricula`)
    REFERENCES `Aluno` (`matricula`);
    alter table Aluno_Sala add column horario_inicio time;
    alter table Aluno_Sala add column horario_fim time;

-- -----------------------------------------------------
-- Table `salas`.`Professor_Sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `salas`.`Professor_Sala` (
  id int primary key auto_increment,
  `Professor_matricula` varchar(40) NOT NULL,
  `Sala_numero` varchar(10) NOT NULL,
  data_reserva date,
  `fk_Professor_has_Sala_Sala1_idx` varchar(10),
  `fk_Professor_has_Sala_Professor1_idx` varchar(40));
  alter table Professor_Sala add
  CONSTRAINT `fk_Professor_has_Sala1`
    FOREIGN KEY (Professor_matricula)
    REFERENCES Professor(matricula);
    alter table Professor_Sala add
	CONSTRAINT `fk_Professor_has_Sala2`
    FOREIGN KEY (Sala_numero)
    REFERENCES Sala (numero);
	alter table Professor_Sala add column horario_inicio time;
    alter table Professor_Sala add column horario_fim time;
	alter table professor_Sala add column nome varchar(255);
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
