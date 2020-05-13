-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 04:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
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
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_num`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `userans`, `category`) VALUES
(1, '1', 'Resolva: 194 - 57 + 112 - 89 =', '56', '160', '174', '74', '160', '56', 'Matemática'),
(2, '2', 'Qual é o nome de um polígono de 9 lados?', 'Hexágono', 'Eneágono', 'Décagono', 'Pentágono', 'Eneágono', 'Hexágono', 'Matemática'),
(3, '3', 'Qual o valor de PI?\r\n', '3,14...', '2,14...', '3,15...', 'Nenhuma das opções', '3,14...', '3,14...', 'Matemática'),
(4, '4', 'Que número abaixo completa a sequência 12 -> 6 -> 18 -> 24 -> X?', 'X=30', 'X=78', 'X=15', 'X=42', 'X=42', 'X=42', 'Matemática'),
(5, '5', 'Se seis pessoas comem 6 chocolates em 6 minutos, quantas pessoas comerão 80 chocolates em 48 minutos?', 'Nenhuma das opções', '14', '10', '17', '10', '10', 'Matemática'),
(6, '6', 'O termómetro subiu 6 graus, esse número representa a temperatura marcada antes.\r\nA quantos graus está agora?\r\n', '18', '20', '15', '19', '18', '15', 'Matemática'),
(7, '7', 'Um elevador suporta 600 Kg, quantas caixas de 48 Kg se pode levar de cada vez?', '13', '12', '10', '6', '12', '13', 'Matemática'),
(8, '8', 'Perguntado pela idade, o Pedro responde: \"Daqui a 30 anos terei três vezes a idade de agora\". \r\nQual é a idade do Pedro?', '16', '10', '15', '13', '15', '13', 'Matemática'),
(9, '9', 'Que simbolo representa o Numéro de Neper?', 'e', 'Nenhuma das opções', '%', 'E', 'e', 'e', 'Matemática'),
(10, '10', 'O número 0.333... pode ser representado pela fração:', '3/4', '5/6', '4/12', '7/9', '4/12', '3/4', 'Matemática'),
(11, '1', 'Qual destes passwords foi o mais usado na internet?', 'a1b2c3', 'abcde', '12345', '123abc', '12345', '4/12', 'Tecnologia'),
(12, '2', 'O que significa a sigla “www” na internet?', 'World Wide Web', 'Web World Wide', 'Nenhuma das opções', 'Web Wide World', 'World Wide Web', '4/12', 'Tecnologia'),
(13, '3', 'Em que ano a Inteligência Artificial passou a ser considerada um campo de estudo?', '1999', '1956', '1804', '1972', '1956', 'World Wide Web', 'Tecnologia'),
(14, '4', 'Que nome se dá as tecnologias que são acopladas a roupas e peças diversas de vestuário?', 'Internet of Things', 'Biotecnologia', 'Wearable', 'Clothenology', 'Wearable', 'World Wide Web', 'Tecnologia'),
(15, '5', 'Qual das tecnologias exponenciais aparece no jogo Pokemon Go?', 'Internet of Things', 'Realidade Aumentada', 'Inteligência Artificial', 'Nenhuma das opções', 'Realidade Aumentada', 'Realidade Aumentada', 'Tecnologia'),
(16, '6', 'Qual destes filmes NÃO fala sobre inteligência artificial?', 'O Jogo da Imitação (2014)', 'Ela (2013)', '2001- Uma odisseia no Espaço (1968)', 'Ex-Machina (2015)', 'O Jogo da Imitação (2014)', 'O Jogo da Imitação (2014)', 'Tecnologia'),
(17, '7', 'Em qual dessas profissões a Watson, inteligência artificial da IBM, ainda não atuou?', 'Engenharia', 'Culinária', 'Medicina', 'Já atuou em todas elas', 'Já atuou em todas elas', 'Já atuou em todas elas', 'Tecnologia'),
(18, '8', 'Qual foi a duração do primeiro vídeo do Youtube?', '3 minutos', '1 minuto', '18 segundos ', '9 minutos', '18 segundos ', '18 segundos', 'Tecnologia'),
(19, '9', 'Em média, quantas pesquisas totalmente novas são feitas no Google?', '450 milhões', '1 bilhão ', '280 milhões', '00 milhões', '450 milhões', '450 milhões', 'Tecnologia'),
(20, '10', 'Qual foi a primeira rede social da história?', 'Classemate', 'MySpace', 'Orkut', 'Nenhuma das opções', 'Classemate', 'Classemate', 'Tecnologia'),
(21, '1', 'Como se chama a camada de ar que envolve a Terra?', 'Biosfera', 'Litosfera', 'Oncosfera', 'Atmosfera', 'Atmosfera', 'Atmosfera', 'Biologia'),
(22, '2', 'Qual é o maior mamífero terrestre?', 'Girafa', 'Hipopotamo', 'Elefante', 'Rinoceronte', 'Elefante', 'Elefante', 'Biologia'),
(23, '3', 'Clorofila é um...', 'produto usado para limpeza pesada', 'produto usado para higienizar piscinas', 'pigmento existente nos vegetais', 'substância usada na limpeza dentária', 'pigmento existente nos vegetais', 'pigmento existente nos vegetais', 'Biologia'),
(24, '4', 'Onde está localizada a tireoide?', 'Fígado', 'Pulmão', 'Pescoço', 'Coração', 'Pescoço', 'Pescoço', 'Biologia'),
(25, '5', 'Ovíparos são aqueles animais...', 'que se alimentam apenas de ervas e vegetais', 'que possuem uma dieta baseada apenas em ovos', 'que vivem na água e colocam ovos', 'Nenhuma das opções ', 'Nenhuma das opções ', 'Nenhuma das opções', 'Biologia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
