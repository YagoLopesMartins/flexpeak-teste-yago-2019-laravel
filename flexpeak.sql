-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Ago-2019 às 11:01
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `flexpeak`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `ID_ALUNO` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `LOGRADOURO` varchar(255) NOT NULL,
  `NUMERO` varchar(20) NOT NULL,
  `BAIRRO` varchar(255) NOT NULL,
  `CIDADE` varchar(255) NOT NULL,
  `ESTADO` varchar(255) NOT NULL,
  `DATA_CRIACAO` date NOT NULL,
  `CEP` varchar(25) NOT NULL,
  `ID_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`ID_ALUNO`, `NOME`, `DATA_NASCIMENTO`, `LOGRADOURO`, `NUMERO`, `BAIRRO`, `CIDADE`, `ESTADO`, `DATA_CRIACAO`, `CEP`, `ID_CURSO`) VALUES
(1, 'RUBIA', '1993-06-27', 'TERRA BRASIL', '410-B', 'NOVO ALEIXO', 'MANAUS', 'AM', '2019-08-08', '69098194', 1),
(2, 'Yago Lopes Martins', '1994-02-26', 'terra', '19', 'terra', 'terra', 'terra', '2019-08-12', '69098194', 3),
(4, 'Yago web service', '2019-08-17', 'Rua João Dourado', '23', 'Novo Aleixo', 'Manaus', 'AM', '2019-08-17', '69098198', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `ID_CURSO` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `DATA_CRIACAO` date NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`ID_CURSO`, `NOME`, `DATA_CRIACAO`, `ID_PROFESSOR`) VALUES
(1, 'LETRAS', '2019-08-08', 1),
(3, 'AED2', '2018-09-06', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `ID_PROFESSOR` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `DATA_CRIACAO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`ID_PROFESSOR`, `NOME`, `DATA_NASCIMENTO`, `DATA_CRIACAO`) VALUES
(1, 'YAGO MARTINS', '1994-02-26', '2019-08-08'),
(2, 'MARCELO CABRAL', '1990-08-08', '2019-08-08'),
(5, 'TESTE', '1994-02-26', '2019-08-08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD KEY `FK_ALUNO_CURSO` (`ID_CURSO`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_CURSO`),
  ADD KEY `FK_CURSO_PROFESSOR` (`ID_PROFESSOR`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID_PROFESSOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALUNO_CURSO` FOREIGN KEY (`ID_CURSO`) REFERENCES `curso` (`ID_CURSO`);

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `FK_CURSO_PROFESSOR` FOREIGN KEY (`ID_PROFESSOR`) REFERENCES `professor` (`ID_PROFESSOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
