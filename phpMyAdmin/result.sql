-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jun-2020 às 14:17
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

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
-- Estrutura da tabela `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `num_questions` int(11) NOT NULL,
  `score_date` datetime DEFAULT NULL,
  `initialDate` time NOT NULL,
  `finalDate` time NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `result`
--

INSERT INTO `result` (`id`, `user_id`, `category_id`, `score`, `num_questions`, `score_date`, `initialDate`, `finalDate`, `time`) VALUES
(1, 3, 'Biologia', 4, 5, NULL, '00:00:00', '00:00:00', '00:00:00'),
(2, 3, 'Biologia', 12, 5, NULL, '00:00:00', '00:00:00', '00:00:00'),
(3, 3, 'Biologia', 12, 5, '2020-05-23 23:15:03', '00:00:00', '00:00:00', '00:00:00'),
(4, 3, 'Matemática', 8, 10, '2020-05-23 23:28:05', '00:00:00', '00:00:00', '00:00:00'),
(5, 3, 'Biologia', 12, 5, '2020-05-28 17:39:58', '00:00:00', '00:00:00', '00:00:00'),
(6, 3, 'Biologia', 4, 5, '2020-05-28 17:43:24', '00:00:00', '00:00:00', '00:00:00'),
(7, 4, 'Biologia', 0, 5, '2020-05-28 18:58:54', '00:00:00', '00:00:00', '00:00:00'),
(8, 3, 'Biologia', 8, 5, '2020-05-28 23:33:55', '00:00:00', '00:00:00', '00:00:00'),
(9, 0, 'Biologia', 8, 5, '2020-05-28 23:57:28', '00:00:00', '00:00:00', '00:00:00'),
(10, 3, 'Biologia', 12, 5, '2020-05-28 23:57:59', '00:00:00', '00:00:00', '00:00:00'),
(11, 0, 'Biologia', 4, 5, '2020-05-29 00:00:24', '00:00:00', '00:00:00', '00:00:00'),
(12, 3, 'Biologia', 8, 5, '2020-05-29 00:00:46', '00:00:00', '00:00:00', '00:00:00'),
(13, 3, 'Biologia', 0, 5, '2020-05-29 00:00:53', '00:00:00', '00:00:00', '00:00:00'),
(14, 0, 'Biologia', 8, 5, '2020-05-29 00:01:58', '00:00:00', '00:00:00', '00:00:00'),
(15, 3, 'Biologia', 8, 5, '2020-05-29 00:02:17', '00:00:00', '00:00:00', '00:00:00'),
(16, 0, 'Biologia', 8, 5, '2020-05-29 00:03:09', '00:00:00', '00:00:00', '00:00:00'),
(17, 3, 'Biologia', 4, 5, '2020-05-29 00:03:33', '00:00:00', '00:00:00', '00:00:00'),
(18, 0, 'Biologia', 8, 5, '2020-05-29 00:04:46', '00:00:00', '00:00:00', '00:00:00'),
(19, 3, 'Biologia', 8, 5, '2020-05-29 00:05:02', '00:00:00', '00:00:00', '00:00:00'),
(20, 0, 'Biologia', 8, 5, '2020-05-29 00:05:31', '00:00:00', '00:00:00', '00:00:00'),
(21, 1, 'Biologia', 16, 5, '2020-05-29 00:07:08', '00:00:00', '00:00:00', '00:00:00'),
(22, 3, 'Biologia', 20, 5, '2020-05-29 00:52:40', '00:00:00', '00:00:00', '00:00:00'),
(23, 1, 'Biologia', 8, 5, '2020-06-02 11:37:54', '00:00:00', '00:00:00', '00:00:00'),
(24, 1, 'Biologia', 0, 5, '2020-06-02 11:38:05', '00:00:00', '00:00:00', '00:00:00'),
(25, 1, 'Biologia', 8, 5, '2020-06-02 11:40:15', '00:00:00', '00:00:00', '00:00:00'),
(26, 1, 'Biologia', 8, 5, '2020-06-03 01:49:51', '00:00:00', '00:00:00', '00:00:00'),
(50, 2, 'Biologia', 12, 5, '2020-06-03 03:13:51', '03:13:50', '03:13:51', '00:00:00'),
(55, 2, 'Biologia', 12, 5, '2020-06-03 13:13:24', '13:13:23', '13:13:24', '00:00:00'),
(57, 2, 'Biologia', 4, 5, '2020-06-03 13:15:55', '13:15:55', '13:15:55', '00:00:00'),
(58, 2, 'Biologia', 8, 5, '2020-06-03 13:54:03', '13:54:02', '13:54:03', '00:00:00'),
(59, 2, 'Biologia', 8, 5, '2020-06-03 13:54:42', '13:54:41', '13:54:42', '00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
