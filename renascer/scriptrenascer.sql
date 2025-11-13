
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema renascer
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `renascer`;
USE `renascer`;

-- -----------------------------------------------------
-- Tabela: tb_servico
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_servico` (
  `idservico` INT NOT NULL AUTO_INCREMENT,
  `preco_servico` DECIMAL(10,2) NOT NULL,
  `tipo_servico` VARCHAR(10) NOT NULL,
  `descricao_servico` VARCHAR(800) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idservico`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Tabela: tb_usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  `tipo` CHAR(1) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Tabela: tb_agendamento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_agendamento` (
  `idagendamento` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `horario` TIME NOT NULL,
  `tb_servico_id_servico` INT NOT NULL,
  `tb_usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idagendamento`),
  INDEX `fk_tb_agendamento_tb_servico1_idx` (`tb_servico_id_servico` ASC),
  INDEX `fk_tb_agendamento_tb_usuario2_idx` (`tb_usuario_idusuario` ASC),
  CONSTRAINT `fk_tb_agendamento_tb_servico1`
    FOREIGN KEY (`tb_servico_id_servico`)
    REFERENCES `renascer`.`tb_servico` (`idservico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_agendamento_tb_usuario2`
    FOREIGN KEY (`tb_usuario_idusuario`)
    REFERENCES `renascer`.`tb_usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Tabela: tb_taxa
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_taxa` (
  `idtaxa` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  `taxa` DECIMAL(10,2) NULL DEFAULT NULL,
  `tb_agendamento_idagendamento` INT NOT NULL,
  PRIMARY KEY (`idtaxa`),
  INDEX `fk_tb_taxa_tb_agendamento1_idx` (`tb_agendamento_idagendamento` ASC),
  CONSTRAINT `fk_tb_taxa_tb_agendamento1`
    FOREIGN KEY (`tb_agendamento_idagendamento`)
    REFERENCES `renascer`.`tb_agendamento` (`idagendamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Tabela: tb_pagamento, c exclusão em cascata
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_pagamento` (
  `idpagamento` INT NOT NULL AUTO_INCREMENT,
  `valor` DECIMAL(10,2) NOT NULL,
  `forma` VARCHAR(30) NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `tb_agendamento_idagendamento` INT NOT NULL,
  PRIMARY KEY (`idpagamento`),
  INDEX `fk_tb_pagamento_tb_agendamento1_idx` (`tb_agendamento_idagendamento` ASC),
  CONSTRAINT `fk_tb_pagamento_tb_agendamento1`
    FOREIGN KEY (`tb_agendamento_idagendamento`)
    REFERENCES `renascer`.`tb_agendamento` (`idagendamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Restauração das configs iniciais
-- -----------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Dados iniciais (usuários, serviços, agendamentos, taxas e pagamentos)
-- -----------------------------------------------------
USE renascer;

INSERT INTO tb_usuario (email, senha, tipo, nome, telefone) VALUES
('marilene.gerente@gmail.com', '$2y$10$xXhnoo02m00F59k0eOjSCetSM0szfscehDOPsvnpWbDV4zWcurhZi', 'g', 'Marilene', '(43) 53543-5446'), 
('maria.cliente@gmail.com', '$2y$10$4Q458yTE3LBqUgB3wbw8MOdaVBWwfAvylltQ0ti84iPqR5m3L3QcG', 'c', 'Maria Souza', '(43) 53543-5422'),
('joao.cliente@gmail.com', '$2y$10$aqYMHLULzW5.232L5n5eMeXPBCLMotS1890TXBnNpdDZMUE0kbWRO', 'c', 'João Silva', '(43) 52243-5446'),
('ana.cliente@gmail.com', '$2y$10$rTBCNNtRUG5oCDWwS/O2qukCHWpL9wLLugIjUiAMDRTekrMc9Dyvi', 'c', 'Ana Pereira', '(43) 53543-2246'),
('carla.cliente@gmail.com', '$2y$10$yS4IYSomXE/ds4oB28Obxe.FrKLYLwt3jjJCy0Mu3L4ZV2NuafLE2', 'c', 'Carla Dias', '(43) 22543-5446'),
('paulo.cliente@gmail.com', '$2y$10$wz6igcDigAbzsz6XYDPdp./RiiTkrCS5diFi5n1oS4xXSPUZgJS4G', 'c', 'Paulo Oliveira', '(43) 53511-5446'),
('jose.func@gmail.com', '$2y$10$6oVYVY1LtQLdXdhUI9bzGu51B3j66bK2PMMcO53JyNPRYuQisIb/y', 'f', 'José Barbosa', '(43) 51143-5446'),
('lucas.func@gmail.com', '$2y$10$ZIPV/qmoZOjoo6ISisuAU.cGb1byZY9gxqDQmnaAIvpEq3qPTEpzC', 'f', 'Lucas Martins', '(43) 11543-5446'),
('fernanda.func@gmail.com', '$2y$10$EsoxxeapNEMJo5QghvtGwe1RIvEvCeY/yRtlfT809twMHhzsiCyQi', 'f', 'Fernanda Lima', '(43) 53543-1146'),
('aline.func@gmail.com', '$2y$10$MoBFfqkXPkwosHIOM3L5v.c1o38SyuUNlYHj2IRUMZHeakwNvhlqm', 'f', 'Aline Ferreira', '(43) 53543-5123'),
('123@gmail.com', '$2y$10$wUqKjowrYkPyzpusaVrq.eielpGrYZ5SKVjcmau6Pt/mdh3Cwlb9e', 'g', 'ADM', '(11) 11111-1111');

INSERT INTO tb_servico (preco_servico, tipo_servico, descricao_servico, foto) VALUES
(250.00, 'Cabelo', 'Corte de cabelo feminino', 'corte_feminino.jpg'),
(100.00, 'Maquiagem', 'Maquiagem completa', 'maquiagem.jpg'),
(80.00, 'Unha', 'Manicure completa', 'manicure.jpg'),
(300.00, 'Especial', 'Pacote noiva completo', 'noiva.jpg'),
(250.00, 'Cabelo', 'Cabelo com luzes em moreno', '6915c61856752.jpeg'),
(250.00, 'Cabelo', 'Corte de cabelo Wolf cut cacheado', '6915c71c36955.jpg'),
(250.00, 'Cabelo', 'Finalização para cabelo ondulado', '6915c7777df9a.jpg'),
(250.00, 'Cabelo', 'Corte em camadas', '6915c7b76d9dd.jpg'),
(250.00, 'Cabelo', 'Penteado cabelo preso', '6915c83d463fa.jpg'),
(80.00, 'Unha', 'Unha arredondada ', '6915c8bf64c4a.jpg'),
(80.00, 'Unha', 'Unha verde', '6915c8e536791.jpg'),
(80.00, 'Unha', 'Unha primavera', '6915c9018a4d3.jpg'),
(80.00, 'Unha', 'Unha azul bebê', '6915c93d3a9ce.jpg'),
(80.00, 'Unha', 'Unha Romântica', '6915c97d95d8f.jpg'),
(100.00, 'Maquiagem', 'Maquiagem básica', '6915c9bef0067.jpg'),
(100.00, 'Maquiagem', 'Maquiagem glow', '6915ca2c3ea1a.jpg'),
(100.00, 'Maquiagem', 'Maquiagem em alta 2025', '6915ca66e81db.jpg'),
(100.00, 'Maquiagem', 'Maquiagem outono', '6915cae917dcd.jpg'),
(100.00, 'Maquiagem', 'Maquiagem sombra simples', '6915cb417187c.jpg'),
(300.00, 'Especial', 'Pacote formatura', '6915cbc9df56a.jpg'),
(300.00, 'Especial', 'Pacote dia de Spa', '6915cc4d32402.jpg'),
(300.00, 'Especial', 'Pacote dia das maẽs', '6915ccc44f6a3.jpg'),
(300.00, 'Especial', 'Pacote natal', '6915cd0a92a33.jpg');

INSERT INTO tb_agendamento (data, horario, tb_servico_id_servico, tb_usuario_idusuario) VALUES
('2025-09-15', '10:00:00', 1, 2),
('2025-09-15', '11:00:00', 2, 3),
('2025-09-16', '14:00:00', 3, 4),
('2025-09-16', '15:00:00', 4, 5),
('2025-09-17', '09:00:00', 5, 6),
('2025-09-17', '10:00:00', 6, 2),
('2025-09-18', '13:00:00', 7, 3),
('2025-09-18', '14:00:00', 8, 4),
('2025-09-19', '15:00:00', 9, 5),
('2025-09-20', '16:00:00', 10, 6);

INSERT INTO tb_taxa (status, taxa, tb_agendamento_idagendamento) VALUES
('pendente', 10.00, 1),
('pago', 5.00, 2),
('pendente', 12.00, 3),
('pago', 8.00, 4),
('pendente', 15.00, 5),
('pago', 6.00, 6),
('pendente', 10.00, 7),
('pago', 5.00, 8),
('pendente', 7.00, 9),
('pago', 20.00, 10);

INSERT INTO tb_pagamento (valor, forma, descricao, tb_agendamento_idagendamento) VALUES
(50.00, 'Cartão', 'Pagamento corte feminino', 1),
(40.00, 'Dinheiro', 'Pagamento corte masculino', 2),
(120.00, 'Cartão', 'Pagamento coloração', 3),
(80.00, 'Pix', 'Pagamento escova progressiva', 4),
(150.00, 'Cartão', 'Pagamento luzes', 5),
(60.00, 'Dinheiro', 'Pagamento hidratação', 6),
(200.00, 'Cartão', 'Pagamento penteado festa', 7),
(100.00, 'Pix', 'Pagamento maquiagem', 8),
(80.00, 'Dinheiro', 'Pagamento manicure', 9),
(300.00, 'Cartão', 'Pagamento pacote noiva', 10);
