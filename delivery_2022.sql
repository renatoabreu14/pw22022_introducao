-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19-Maio-2022 às 20:00
-- Versão do servidor: 10.6.7-MariaDB-2ubuntu1
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery_2022`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Renato', 'renato.abreu.info@gmail.com', '123456', '64992481630'),
(4, 'Renato', 'renato.abreu.info@gmail.com', '654987', '6513213215'),
(5, 'Gabriel', 'gabriel.marques@estudantes.ifg.edu.br', '32165654', '31354+654');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
