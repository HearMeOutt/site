-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/10/2024 às 13:37
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hearmeout`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `numero_aula` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `videoaula` text DEFAULT NULL,
  `fk_cursos_id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aulas`
--

INSERT INTO `aulas` (`id_aula`, `numero_aula`, `nome`, `videoaula`, `fk_cursos_id_curso`) VALUES
(1, 1, 'Origem das Libras', 'aula1', 1),
(2, 2, 'produção', 'aula2', 1),
(3, 3, 'aula 3', 'aula3', 1),
(4, 1, 'aula1', 'aula1', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`, `nivel`, `descricao`, `valor`) VALUES
(1, 'Teórico', 1, 'Neste módulo de Introdução a Libras, você explorará a história, a importância e os fundamentos da Língua Brasileira de Sinais. Com aulas interativas, o curso é ideal para iniciantes, proporcionando um entendimento da Libras e suas diferenças em relação à Língua Portuguesa. Prepare-se para uma experiência de aprendizado envolvente e acessível!', '10,00'),
(2, 'Alfabeto em libras', 1, 'Neste módulo do alfabeto em Libras, você aprenderá a soletrar e reconhecer cada letra por meio de aulas práticas e interativas. Projetado para iniciantes, o curso combina material didático de alta qualidade com tecnologia de ponta para garantir um aprendizado eficaz e acessível.', '10,00'),
(3, 'Números em libras', 1, 'Neste módulo do alfabeto em Libras, você aprenderá a soletrar e reconhecer cada letra por meio de aulas práticas e interativas. Projetado para iniciantes, o curso combina material didático de alta qualidade com tecnologia de ponta para garantir um aprendizado eficaz e acessível.', '10,00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `fk_usuarios_id_usuario` int(11) DEFAULT NULL,
  `fk_cursos_id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `fk_usuarios_id_usuario`, `fk_cursos_id_curso`) VALUES
(17, 1, 2),
(18, 1, 1),
(19, 9, 1),
(20, 8, 1),
(21, 8, 2),
(22, 10, 1),
(23, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'Marcus', 'moreira.marcus.vb@gmail.com', '11997076335', '$2y$10$26RI0af.0wxYO762TAkblehbgMlbyeBrAJrefvAj5TFxoD03TU.hi'),
(5, 'teste', 'teste@gmail.com', '', '$2y$10$Ac17NsIUAj.8CSkdb5zh6eaECDOVuIVyzzdNDperEdZKYfBcwlpu6'),
(7, 'teste2', 'teste2@gmail.com', '(11)12345-6798', '$2y$10$.kecmYn/H7liIGFVkr1kLe5Cn8VmRpYZQhdZIeE04GTY1Mzr074sK'),
(8, 'thifany', 'thifany@gmail.com', '(11)95948-2807', '$2y$10$MdaXR7knMukh2jIYKOxTVO37nM1/8TeMUKTeBIChlXKnx2E98jjgu'),
(9, 'Vinicius', 'spaccxproject@gmail.com', '(11)98239-3222', '$2y$10$nFotWmlM4MBE/iLXj/CmTuJmJarE/8O2iheJHATLGmv8No3v.VrTq'),
(10, 'Maria', 'mariaisadoraclaudino1@gmail.com', '(11)99698-7411', '$2y$10$zWukB1fV2j2C9Abut8Fyi.UKwv5WSft6I9EG/p8o6dKwQl3yRhe22');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `fk_cursos_id_curso` (`fk_cursos_id_curso`);

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
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `FK_matriculas_2` FOREIGN KEY (`fk_usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `FK_matriculas_3` FOREIGN KEY (`fk_cursos_id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
