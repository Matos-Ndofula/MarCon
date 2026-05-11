-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jun-2024 às 23:38
-- Versão do servidor: 8.2.0
-- versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `boot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`) VALUES
(1, 'sdfds', 'sdf', '0000-00-00'),
(2, 'sdfds', 'sdf', '0000-00-00'),
(3, 'Danilo', 'ola', '0000-00-00'),
(4, 'Danilo', 'hei', '0000-00-00'),
(5, 'Danni', 'Ola', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatboot`
--

DROP TABLE IF EXISTS `chatboot`;
CREATE TABLE IF NOT EXISTS `chatboot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `perguntas` varchar(300) NOT NULL,
  `respostas` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chatboot`
--

INSERT INTO `chatboot` (`id`, `perguntas`, `respostas`) VALUES
(1, 'Olá|Tudo bem|', 'Olá aqui'),
(2, 'Qual é o seu nome?|Qual é o seu nome?', 'Meu nome é chatboot'),
(3, 'De onde és?|De onde és?', 'Sou do sistema de consultas online.'),
(4, 'Tchau|Adeus', 'ok tchau, até mais window.location=\'../usuario_normal_modal.php\'               \n'),
(5, '4 - Febre alta, dores de cabeça, mal-estar geral, falta de apetite, retardamento do ritmo cardíaco, aumento do volume do baço, manchas rosadas no tronco, prisão de ventre ou diarreia, tosse seca?', 'Possivelmente tenhas Febre Tifóide! Aconselho-te a ir até a um hospital ou posto médico mais próximo, fazer uma análise completa no banco de Urgência.'),
(6, '1 - Febre alta, calafrios, tremores, dor de cabeça, náuseas, vómitos, cansaço e falta de apetite?', 'Possivelmente tenhas Paludismo ou num caso avançado a Malária! Aconselho-te a ir até a um hospital ou posto médico mais próximo, fazer uma análise completa no banco de Urgência.'),
(23, ' Capalanga | Caop B | Caop C ', 'Que consulta pretende fazer?\r\n | Gripe ? | Pneumonia ? | Infecção urinária ? | Amigdalite(Dores de garganta) ? '),
(20, 'ZANGO LESTE', 'De que bairro és do ZANGO LESTE?\r\n | Vila Pacifica | Zango I-B | Zango II-B | Zango III-B | Zango IV-B | Kikuxi 2'),
(7, '2 - Febre, dores musculares com dor lombar proeminente, dor de cabeça, perda de apetite, náusea, vómito, fadiga, icterícia (“amarelamento” da pele e dos olhos), urina escura, sangramentos a partir da boca, nariz, olhos ou estômago?', 'Possivelmente tenhas Febre Amarela! Aconselho-te a ir até a um hospital ou posto médico mais próximo, fazer uma análise completa no banco de Urgência.'),
(17, 'BAIA', 'De que bairro és da BAIA ?\r\n Baia | Tandi | Casa Branca | ZEE '),
(8, '3 - Diarreia leve ou diarreia aquosa e profusa, vómitos, dor abdominal e cãibras?', 'Possivelmente tenhas Cólera! Aconselho-te a ir até a um hospital ou posto médico mais próximo, fazer uma análise completa no banco de Urgência. '),
(12, 'SEDE DE VIANA', 'De que bairro és da SEDE DE VIANA?\r\n Vila-sede ? | Vila Nova ? | Projecto Morar ? | Sagrada \r\n Esperança ? | 1º de Maio ? | 4 de Abril ? | Regedoria ? \r\n | 500 Casas ? | Viana II ? | Zona Industrial ? | Bita Vacaria ? | Complexo habitacional de Kikuxi ? | Kikuxi ? \r\n | Bita Sapú ?'),
(16, 'MULENVOS', 'De que bairro és do MULENVOS ?\r\n Mulenvos de Cima | Km 12B | Km 9B | Km 14B | Boa-Fé'),
(13, ' Vila-sede | Vila Nova | Projecto Morar | Sagrada \r\n Esperança | 1º de Maio | 4 de Abril | Regedoria \r\n | 500 Casas | Viana II | Zona Industrial | Bita Vacaria  | Complexo habitacional de Kikuxi | Kikuxi \r\n | Bita Sapú ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(14, 'CAPALANGA Destrito', 'De que bairro és do CAPALANGA?\r\n Capalanga_bairro | Caop B | Caop C'),
(15, 'ESTALAGEM', 'De que bairro és da ESTALAGEM ?\r\n Km12A | Km 9A | Km 14A'),
(21, 'ZANGO OESTE', 'De que bairro és do ZANGO OESTE?\r\n Zango I-A | Zango II-A | Zango III-A | Zango IV-A | \r\n Kikuxi 1 | Bita Sul'),
(22, 'CALUMBO', 'De que bairro és do CALUMBO?\r\n Calumbo | Zango V | Cassaca | Guengue'),
(24, ' Km12A | Km 9A | Km 14A ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(25, ' Mulenvos de Cima | Km 12B | Km 9B | Km 14B | Boa-Fé ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(26, ' Baia | Tandi | Casa Branca | ZEE  ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(27, ' Vila Pacifica | Zango I-B | Zango II-B | Zango III-B | Zango IV-B | Kikuxi 2 ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(28, ' Zango I-A | Zango II-A | Zango III-A | Zango IV-A | Kikuxi 1 | Bita Sul ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(29, ' Calumbo | Zango V | Cassaca | Guengue ', 'Que consulta pretende fazer? | Gripe ? |                   Hipertensão arterial ? | Infecção urinária ?'),
(30, 'Quero marcar uma consulta com um médico? | marcar consulta | marcar', 'Faça o login: http://localhost/SISTEMA%20CONSULTAS%20ONLINE/MarCOn/login.php |    ou cadastra-se:\r\nhttp://localhost/SISTEMA%20CONSULTAS%20ONLINE/MarCOn/usuario_normal.html'),
(31, '4 - Febre alta, dores de cabeça, mal-estar geral, falta de apetite, retardamento do ritmo cardíaco, aumento do volume do baço, manchas rosadas no tronco, prisão de ventre ou diarreia, tosse seca.?', 'Possivelmente tenhas Febre Tifóide! '),
(32, '4 - Febre alta, dores de cabeça, mal-estar geral, falta de apetite, retardamento do ritmo cardíaco, aumento do volume do baço, manchas rosadas no tronco, prisão de ventre ou diarreia, tosse seca.', 'Possivelmente tenhas Febre Tifóide! Aconselho-te a ir até a um hospital ou posto médico mais próximo, fazer uma análise completa no banco de Urgência.'),
(34, 'Pneumonia', 'Sentes estes sintomas ? | Tosse | Febre | Escarro purulento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nome_utente`
--

DROP TABLE IF EXISTS `nome_utente`;
CREATE TABLE IF NOT EXISTS `nome_utente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utente`
--

DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sobre_nome` varchar(300) NOT NULL,
  `genero` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `data_criacao` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `utente`
--

INSERT INTO `utente` (`id`, `primeiro_nome`, `sobre_nome`, `genero`, `email`, `data_criacao`) VALUES
(1, 'Danilo', 'Valentim', 'Masculino', 'd@gmail.com', '2024-04-08'),
(2, 'Ndofula', 'Maiala', 'Masculino', 'ndo@gmail.com', '2024-04-08'),
(3, 'Teresa', 'Valentim', 'Feminino', 't@gmail.com', '2024-04-08'),
(4, 'Dani', 'Valen', 'Masculino', 'dn@gmail.com', '2024-04-08'),
(5, 'D', 'd', 'Masculino', 'dv@gmail.com', '2024-04-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
