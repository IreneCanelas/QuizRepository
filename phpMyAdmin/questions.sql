-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2020 às 23:23
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
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_num` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `userans` text DEFAULT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`id`, `question_num`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `userans`, `category`) VALUES
(1, '1', 'Resolva: 194 - 57 + 112 - 89 =', '56', '160', '174', '74', '160', '174', 'Matemática'),
(2, '2', 'Qual é o nome de um polígono de 9 lados?', 'Hexágono', 'Eneágono', 'Decágono', 'Pentágono', 'Eneágono', 'Pentágono', 'Matemática'),
(3, '3', 'Qual o valor de PI?\r\n', '3,14...', '2,14...', '3,15...', 'Nenhuma das opções', '3,14...', 'Nenhuma das opções', 'Matemática'),
(4, '4', 'Que número abaixo completa a sequência 12 -> 6 -> 18 -> 24 -> X?', 'X=30', 'X=78', 'X=15', 'X=42', 'X=42', 'X=78', 'Matemática'),
(5, '5', 'Se seis pessoas comem 6 chocolates em 6 minutos, quantas pessoas comerão 80 chocolates em 48 minutos?', '17', '14', '10', 'Nenhuma das opções', '10', '17', 'Matemática'),
(6, '6', 'O termómetro subiu 6 graus, esse número representa a temperatura marcada antes.\r\nA quantos graus está agora?\r\n', '18', '20', '15', '19', '18', '19', 'Matemática'),
(7, '7', 'Um elevador suporta 600 Kg, quantas caixas de 48 Kg se pode levar de cada vez?', '13', '12', '10', '6', '12', '13', 'Matemática'),
(8, '8', 'Perguntado pela idade, o Pedro responde: \"Daqui a 30 anos terei três vezes a idade de agora\". \r\nQual é a idade do Pedro?', '16', '10', '15', '13', '15', '16', 'Matemática'),
(9, '9', 'Que simbolo representa o Numéro de Neper?', 'e', 'E', '%', 'Nenhuma das opções', 'e', 'e', 'Matemática'),
(10, '10', 'O número 0.333... pode ser representado pela fração:', '3/4', '5/6', '4/12', '7/9', '4/12', '4/12', 'Matemática'),
(11, '1', 'Qual destes passwords foi o mais usado na internet?', 'a1b2c3', 'abcde', '12345', '123abc', '12345', 'abcde', 'Tecnologia'),
(12, '2', 'O que significa a sigla “www” na internet?', 'World Wide Web', 'Web World Wide', 'Web Wide World', 'Nenhuma das opções', 'World Wide Web', 'Nenhuma das opções', 'Tecnologia'),
(13, '3', 'Em que ano a Inteligência Artificial passou a ser considerada um campo de estudo?', '1999', '1956', '1804', '1972', '1956', '1804', 'Tecnologia'),
(14, '4', 'Que nome se dá as tecnologias que são acopladas a roupas e peças diversas de vestuário?', 'Internet of Things', 'Biotecnologia', 'Wearable', 'Clothenology', 'Wearable', 'Biotecnologia', 'Tecnologia'),
(15, '5', 'Qual das tecnologias exponenciais aparece no jogo Pokemon Go?', 'Internet of Things', 'Realidade Aumentada', 'Inteligência Artificial', 'Nenhuma das opções', 'Realidade Aumentada', 'Nenhuma das opções', 'Tecnologia'),
(16, '6', 'Qual destes filmes NÃO fala sobre inteligência artificial?', 'O Jogo da Imitação (2014)', 'Ela (2013)', '2001- Uma odisseia no Espaço (1968)', 'Ex-Machina (2015)', 'O Jogo da Imitação (2014)', 'Ex-Machina (2015)', 'Tecnologia'),
(17, '7', 'Em qual dessas profissões a Watson, inteligência artificial da IBM, ainda não atuou?', 'Engenharia', 'Culinária', 'Medicina', 'Já atuou em todas elas', 'Já atuou em todas elas', 'Já atuou em todas elas', 'Tecnologia'),
(18, '8', 'Qual foi a duração do primeiro vídeo do Youtube?', '3 minutos', '1 minuto', '18 segundos ', '9 minutos', '18 segundos ', '9 minutos', 'Tecnologia'),
(19, '9', 'Em média, quantas pesquisas totalmente novas são feitas no Google?', '450 milhões', '1 bilhão ', '280 milhões', '100 milhões', '450 milhões', '100 milhões', 'Tecnologia'),
(20, '10', 'Qual foi a primeira rede social da história?', 'Classemate', 'MySpace', 'Orkut', 'Nenhuma das opções', 'Classemate', 'Nenhuma das opções', 'Tecnologia'),
(21, '1', 'Como se chama a camada de ar que envolve a Terra?', 'Biosfera', 'Litosfera', 'Oncosfera', 'Atmosfera', 'Atmosfera', 'Atmosfera', 'Biologia'),
(22, '2', 'Qual é o maior mamífero terrestre?', 'Girafa', 'Hipopotamo', 'Elefante', 'Rinoceronte', 'Elefante', 'Rinoceronte', 'Biologia'),
(23, '3', 'Clorofila é um(a)...', 'produto usado para limpeza pesada', 'produto usado para higienizar piscinas', 'pigmento existente nos vegetais', 'substância usada na limpeza dentária', 'pigmento existente nos vegetais', 'pigmento existente nos vegetais', 'Biologia'),
(24, '4', 'Onde está localizada a tireoide?', 'Fígado', 'Pulmão', 'Pescoço', 'Coração', 'Pescoço', 'Pescoço', 'Biologia'),
(25, '5', 'Ovíparos são aqueles animais...', 'que se alimentam apenas de ervas e vegetais', 'que possuem uma dieta baseada apenas em ovos', 'que vivem na água e colocam ovos', 'Nenhuma das opções ', 'Nenhuma das opções ', 'Nenhuma das opções ', 'Biologia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
