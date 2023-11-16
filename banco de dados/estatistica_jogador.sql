-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Nov-2023 às 02:35
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estatistica_jogador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

DROP TABLE IF EXISTS `jogo`;
CREATE TABLE IF NOT EXISTS `jogo` (
  `id_jogo` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(13) NOT NULL,
  `tempo` time NOT NULL,
  `pontuacao` int NOT NULL,
  PRIMARY KEY (`id_jogo`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `id_user`, `tempo`, `pontuacao`) VALUES
(10, '453kiss123lpa', '00:09:51', 200),
(11, '465ldzep395er', '00:09:45', 0),
(12, '465metal395er', '00:09:13', 0),
(13, '453iron123h98', '00:08:33', 0),
(22, '453iron123h98', '00:45:01', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` varchar(13) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nickname` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `nome`, `nickname`, `email`, `senha`) VALUES
('326pink12asg2', 'David Gilmour', 'Pink Floyd', 'pink.floyd@gmail.com', '1234'),
('453iron123h98', 'Bruce Dickson', 'IronMaiden', 'iron.maiden@gmail.com', '1234'),
('453kiss123lpa', 'Paul Stanley', 'Kiss', 'kiss.kiss@gmail.com', '1234'),
('465ldzep395er', 'Robert Plant', 'LedZepelin', 'led.zeppelin@gmail.com', '1234'),
('465metal395er', 'James Hetfield', 'Metallica', 'metallica@gmail.com', '1234'),
('654a2435dfa7f', 'Username', 'Nickname', 'username@gmail.com', '1234'),
('768queen781ea', 'Freddy Mercuri', 'Queen', 'queen@gmail.com', '1234');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_usuario_jogo` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
