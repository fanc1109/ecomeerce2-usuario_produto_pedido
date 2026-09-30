-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ecommerce2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecommerce2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce2` DEFAULT CHARACTER SET utf8 ;
USE `ecommerce2` ;

-- -----------------------------------------------------
-- Table `ecommerce2`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce2`.`Usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome_usuario` VARCHAR(45) NOT NULL,
  `senha_usuario` VARCHAR(45) NOT NULL,
  `email_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `email_usuario_UNIQUE` (`email_usuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce2`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce2`.`Pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `valor_total_pedido` DECIMAL(10,2) NOT NULL,
  `data_pedido` DATETIME NOT NULL,
  `forma_pagamento` VARCHAR(45) NOT NULL,
  `Usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_pedido`, `Usuario_id_usuario`),
  INDEX `fk_Pedido_Usuario_idx` (`Usuario_id_usuario` ASC) ,
  CONSTRAINT `fk_Pedido_Usuario`
    FOREIGN KEY (`Usuario_id_usuario`)
    REFERENCES `ecommerce2`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce2`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce2`.`Produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `foto_produto` VARCHAR(45) NULL,
  `nome_produto` VARCHAR(45) NOT NULL,
  `preco_produto` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce2`.`Contem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce2`.`Contem` (
  `id_contem` INT NOT NULL AUTO_INCREMENT,
  `Pedido_id_pedido` INT NOT NULL,
  `Produto_id_produto` INT NOT NULL,
  `quantidade_contem` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_contem`, `Pedido_id_pedido`, `Produto_id_produto`),
  INDEX `fk_Pedido_has_Produto_Produto1_idx` (`Produto_id_produto` ASC) ,
  INDEX `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_id_pedido` ASC, `id_contem` ASC) ,
  CONSTRAINT `fk_Pedido_has_Produto_Pedido1`
    FOREIGN KEY (`Pedido_id_pedido` , `id_contem`)
    REFERENCES `ecommerce2`.`Pedido` (`id_pedido` , `Usuario_id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Produto_Produto1`
    FOREIGN KEY (`Produto_id_produto`)
    REFERENCES `ecommerce2`.`Produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
