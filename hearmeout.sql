-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09/10/2024 às 20:50
-- Versão do servidor: 10.11.9-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u301136860_hearmeout`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `imgs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `fk_usuarios_id_usuario` int(11) DEFAULT NULL,
  `fk_cursos_id_curso` int(11) DEFAULT NULL,
  `id_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Relacionamento_1`
--

CREATE TABLE `Relacionamento_1` (
  `fk_aulas_id_aula` int(11) DEFAULT NULL,
  `fk_cursos_id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `email`, `id_usuario`, `senha`) VALUES
('Marcus', 'moreira.marcus.vb@gmail.com', 0, '$2y$10$26RI0af.0wxYO762TAkblehbgMlbyeBrAJrefvAj5TFxoD03TU.hi');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `FK_matriculas_2` (`fk_usuarios_id_usuario`),
  ADD KEY `FK_matriculas_3` (`fk_cursos_id_curso`);

--
-- Índices de tabela `Relacionamento_1`
--
ALTER TABLE `Relacionamento_1`
  ADD KEY `FK_Relacionamento_1_1` (`fk_aulas_id_aula`),
  ADD KEY `FK_Relacionamento_1_2` (`fk_cursos_id_curso`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `FK_matriculas_2` FOREIGN KEY (`fk_usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `FK_matriculas_3` FOREIGN KEY (`fk_cursos_id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Restrições para tabelas `Relacionamento_1`
--
ALTER TABLE `Relacionamento_1`
  ADD CONSTRAINT `FK_Relacionamento_1_1` FOREIGN KEY (`fk_aulas_id_aula`) REFERENCES `aulas` (`id_aula`),
  ADD CONSTRAINT `FK_Relacionamento_1_2` FOREIGN KEY (`fk_cursos_id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
