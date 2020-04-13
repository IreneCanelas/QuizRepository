-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Abr-2020 às 20:17
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quizwebsite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registos`
--

CREATE TABLE `registos` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` text NOT NULL,
  `psw` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registos`
--

INSERT INTO `registos` (`id`, `name`, `email`, `psw`) VALUES
(1, 'Layla Reis', 'layla@gmail.com', 'laylalayla'),
(2, 'Irene Canelas', 'irene@yahoo.pt', 'ireneirene'),
(3, 'Sara Rocha', 'sara@hotmail.com', 'sarasara'),
(4, 'Marcia Ferreira', 'marcia@outlook.com', 'marciamarcia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registos`
--
ALTER TABLE `registos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registos`
--
ALTER TABLE `registos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
