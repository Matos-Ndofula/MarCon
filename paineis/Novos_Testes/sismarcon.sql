-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2025 at 05:29 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sismarcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendamento_medico`
--

DROP TABLE IF EXISTS `agendamento_medico`;
CREATE TABLE IF NOT EXISTS `agendamento_medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_medico` int NOT NULL,
  `nome_medico` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_da_semana` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendamento_medico`
--

INSERT INTO `agendamento_medico` (`id`, `id_medico`, `nome_medico`, `especialidade`, `dias_da_semana`) VALUES
(1, 9, 'Dadiva ', 'Cardiologia', 'Segunda-feira'),
(2, 11, 'Danilo', 'Dermatologia', 'Terça-feira'),
(3, 7, 'Dr. Antoninho', 'Oftalmologia', 'Quarta-feira'),
(4, 7, 'Dr. Antoninho', 'Oftalmologia', 'Segunda-feira'),
(5, 7, 'Dr. Antoninho', 'Oftalmologia', 'Sexta-feira'),
(6, 11, 'Danilo', 'Dermatologia', 'Quinta-feira'),
(7, 11, 'Danilo', 'Dermatologia', 'Sexta-feira'),
(8, 11, 'Danilo', 'Dermatologia', 'Segunda-feira'),
(9, 11, 'Danilo', 'Dermatologia', 'Domingo'),
(10, 0, 'Dr.Antoninho', '', 'Terça-feira');

-- --------------------------------------------------------

--
-- Table structure for table `calendario_consulta_marcada`
--

DROP TABLE IF EXISTS `calendario_consulta_marcada`;
CREATE TABLE IF NOT EXISTS `calendario_consulta_marcada` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_medico` int NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendario_consulta_marcada`
--

INSERT INTO `calendario_consulta_marcada` (`id`, `id_medico`, `especialidade`, `nome`, `data_consulta`, `hora_consulta`, `email`) VALUES
(1, 0, 'Neurologia', 'Dr. Daniel Valentim', '2024-02-24', '16:11:00', 'drdaniel@gmail.com'),
(2, 0, 'Oftalmologia', 'Dr. Isabel', '2024-02-24', '16:17:00', 'mdani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `calendario_dia_hora`
--

DROP TABLE IF EXISTS `calendario_dia_hora`;
CREATE TABLE IF NOT EXISTS `calendario_dia_hora` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `hora_inicio_interval` time NOT NULL,
  `hora_final_interval` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendario_dia_hora`
--

INSERT INTO `calendario_dia_hora` (`id`, `dia_semana`, `hora_inicio`, `hora_termino`, `hora_inicio_interval`, `hora_final_interval`) VALUES
(1, 'Segunda-feira', '10:00:00', '17:00:00', '12:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `codigo_senha`
--

DROP TABLE IF EXISTS `codigo_senha`;
CREATE TABLE IF NOT EXISTS `codigo_senha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `codigo_senha`
--

INSERT INTO `codigo_senha` (`id`, `codigo`, `data`) VALUES
(1, 'YW5hQGdtYWlsLmNvbQ==', '2024-04-28'),
(2, 'YW5hQGdtYWlsLmNvbQ==', '2024-04-28'),
(3, 'YW5hQGdtYWlsLmNvbQ==', '2024-04-28'),
(4, 'bmRvQGdtYWlsLmNvbQ==', '2024-05-24'),
(5, 'bmRvQGdtYWlsLmNvbQ==', '2024-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `status` enum('Agendada','Confirmada','Atendida','Cancelada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Agendada',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `paciente_nome`, `data_hora`, `status`) VALUES
(1, 'Daniel', '2024-06-12 18:36:39', 'Agendada');

-- --------------------------------------------------------

--
-- Table structure for table `consultas_demarcadas`
--

DROP TABLE IF EXISTS `consultas_demarcadas`;
CREATE TABLE IF NOT EXISTS `consultas_demarcadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_horario` date NOT NULL,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas_demarcadas`
--

INSERT INTO `consultas_demarcadas` (`id`, `nome_utente`, `especialidade`, `data_horario`, `horario`) VALUES
(1, '', '', '0000-00-00', '00:00:00'),
(2, '', '', '0000-00-00', '00:00:00'),
(3, '', '', '0000-00-00', '00:00:00'),
(4, '', '', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exame_consulta`
--

DROP TABLE IF EXISTS `exame_consulta`;
CREATE TABLE IF NOT EXISTS `exame_consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_exame_consulta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `tempo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exame_` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exame_consulta`
--

INSERT INTO `exame_consulta` (`id`, `nome_exame_consulta`, `valor`, `tempo`, `exame_`) VALUES
(1, 'Exame Covid', 1000, '20', 'Nao'),
(2, 'Consulta Dermatologia', 1500.5, '30', 'Nao'),
(3, 'Consulta Hipertensão Arterial', 3000, '30', 'Nao'),
(4, 'Exame Sangue', 1500, '20', 'Sim'),
(5, 'Consulta Infecção urinária', 2000, '40', 'Nao'),
(6, 'Consulta Gripe', 1000, '20', 'Nao'),
(7, 'Consulta Amigdalite', 1000, '30', 'Nao'),
(8, 'Consulta Pneumonia', 1500.5, '30', 'Nao');

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
CREATE TABLE IF NOT EXISTS `Admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `BI` text NOT NULL,
  `nome_sistema` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefone` text NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `nivel` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `nome`, `email`, `BI`, `nome_sistema`, `telefone`, `endereco`, `senha`, `msg`, `nivel`, `status`) VALUES
(11, 'Admin', 'admin@gmail.com', '99999009AB323', 'SisCOns', '9333333334', 'Cacuaco Vila', '202cb962ac59075b964b07152d234b70', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `historico_medico`
--

DROP TABLE IF EXISTS `historico_medico`;
CREATE TABLE IF NOT EXISTS `historico_medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `especialidade` varchar(300) NOT NULL,
  `questao` varchar(300) NOT NULL,
  `acrescentar` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `historico_medico`
--

INSERT INTO `historico_medico` (`id`, `especialidade`, `questao`, `acrescentar`) VALUES
(1, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(2, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(3, 'Oftalmologia', '', ',');

-- --------------------------------------------------------

--
-- Table structure for table `horarios_calculo`
--

DROP TABLE IF EXISTS `horarios_calculo`;
CREATE TABLE IF NOT EXISTS `horarios_calculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horarios_calculo`
--

INSERT INTO `horarios_calculo` (`id`, `horario`) VALUES
(1, '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `horario_medico`
--

DROP TABLE IF EXISTS `horario_medico`;
CREATE TABLE IF NOT EXISTS `horario_medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horario_medico`
--

INSERT INTO `horario_medico` (`id`, `horario`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '14:00:00'),
(6, '15:00:00'),
(7, '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `justificar`
--

DROP TABLE IF EXISTS `justificar`;
CREATE TABLE IF NOT EXISTS `justificar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_horario` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `justificar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `justificar`
--

INSERT INTO `justificar` (`id`, `nome_utente`, `data_horario`, `justificar`) VALUES
(1, '', '', 'Tenho um casamento nesse dia'),
(2, 'Ndofula', '', 'Tenho um boda'),
(3, 'Nilson', '', 'Estive num pedido Rijo ');

-- --------------------------------------------------------

--
-- Table structure for table `marcacao_consulta_exame`
--

DROP TABLE IF EXISTS `marcacao_consulta_exame`;
CREATE TABLE IF NOT EXISTS `marcacao_consulta_exame` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente_BI` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_especialista` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_consulta_exame` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_horario_especialista` date NOT NULL,
  `obs` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marcacao_consulta_exame`
--

INSERT INTO `marcacao_consulta_exame` (`id`, `nome_utente_BI`, `nome_especialista`, `tipo_consulta_exame`, `data_horario_especialista`, `obs`, `horario`) VALUES
(1, 'Ndofula(2222222BR11111)', 'Dadiva ', 'Consulta Dermatologia', '2024-04-09', 'ghmgfc', '10:00'),
(2, 'Nilson(1257678BA024)', 'func novo', 'Exame Covid', '2024-04-11', 'nmgjkg', '9:00'),
(3, 'Nilson(1257678BA024)', 'func novo', 'Exame Covid', '0000-00-00', '', '11:00'),
(4, 'Nilson(1257678BA024)', 'func novo', 'Exame Covid', '2024-04-02', '', '14:00'),
(5, 'Nilson(1257678BA024)', 'func novo', 'Exame Covid', '2024-04-03', '', '10:00'),
(6, 'Nilson(1257678BA024)', 'Dadiva ', 'Exame Covid', '2024-04-16', '', '9:00'),
(8, 'Ndofula(2222222BR11111)', 'Dadiva ', 'Consulta Dermatologia', '2024-04-09', '', '14:00'),
(9, 'Nilson(1257678BA024)', 'func novo', 'Exame Covid', '2024-04-18', '', '15:00'),
(10, 'Daniel Valentim(424242242BA042)', 'Elizabeth', 'Consulta Infecção urinária', '2024-04-25', '', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `BI` varchar(500) NOT NULL,
  `telefone` text NOT NULL,
  `localidade` varchar(300) NOT NULL,
  `data_nascimento` date NOT NULL,
  `especialidade` varchar(300) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `nivel` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`id`, `nome`, `email`, `genero`, `BI`, `telefone`, `localidade`, `data_nascimento`, `especialidade`, `senha`, `msg`, `nivel`, `status`) VALUES
(7, 'Dr.Antoninho', 'at@gmail.com', 'Masculino', '', '924258101', 'Sambizanga', '0000-00-00', 'Oftalmologia', '202cb962ac59075b964b07152d234b70', '', 2, 1),
(9, 'Dadiva ', 'dadiva@gmail.com', 'Feminino', '', '1234567899', 'Viana', '2024-04-04', 'Cardiologia', '202cb962ac59075b964b07152d234b70', '', 2, 1),
(11, 'Danilo', 'danilomedico@gmail.com', 'Masculino', '1222222321AO042', '940045812', 'Cacuaco', '1992-11-15', 'Dermatologia', '202cb962ac59075b964b07152d234b70', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('notificacao','mensagem') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinatario_id` int NOT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enviada` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nomediasemana`
--

DROP TABLE IF EXISTS `nomediasemana`;
CREATE TABLE IF NOT EXISTS `nomediasemana` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeDiaSemana` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomediasemana`
--

INSERT INTO `nomediasemana` (`id`, `nomeDiaSemana`) VALUES
(1, 'Domingo'),
(2, 'Segunda-feira'),
(3, 'Terça-feira'),
(4, 'Quarta-feira'),
(5, 'Quinta-feira'),
(6, 'Sexta-feira'),
(7, 'Sábado');

-- --------------------------------------------------------

--
-- Table structure for table `questao`
--

DROP TABLE IF EXISTS `questao`;
CREATE TABLE IF NOT EXISTS `questao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `especialidade` varchar(300) NOT NULL,
  `questao` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questao`
--

INSERT INTO `questao` (`id`, `especialidade`, `questao`) VALUES
(1, 'Oftalmologia', 'dor nos olhos');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

DROP TABLE IF EXISTS `schedule_list`;
CREATE TABLE IF NOT EXISTS `schedule_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'aqui', 'ola', '2024-04-10 01:00:00', '2024-04-10 01:02:00'),
(2, 'Para dia 29', 'trgf', '2024-04-29 01:00:00', '2024-04-30 01:01:00'),
(3, 'Hoje', '~r5f', '2024-04-30 02:00:00', '2024-04-30 02:00:00'),
(4, 'Aqui', 'Para hj 19/05', '2024-05-20 03:00:00', '2024-05-22 05:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_eventos_calendario`
--

DROP TABLE IF EXISTS `tabela_eventos_calendario`;
CREATE TABLE IF NOT EXISTS `tabela_eventos_calendario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) NOT NULL,
  `especialidade` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nome_medico` varchar(300) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `data_horario` date DEFAULT NULL,
  `horario` varchar(300) DEFAULT NULL,
  `estado` varchar(300) NOT NULL,
  `obs` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabela_eventos_calendario`
--

INSERT INTO `tabela_eventos_calendario` (`id`, `nome_utente`, `especialidade`, `nome_medico`, `color`, `data_horario`, `horario`, `estado`, `obs`) VALUES
(96, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-27', 'Livre', 'Desmarcada', ''),
(95, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#008000', '2025-05-29', 'Livre', 'Atendido', ''),
(94, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-29', '10:00:00', 'Agendado', ''),
(97, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-24', '08:00:00', 'Agendado', ''),
(92, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#0000ff', '2025-05-23', '10:00:00', 'Confirmada', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_n`
--

DROP TABLE IF EXISTS `usuarios_n`;
CREATE TABLE IF NOT EXISTS `usuarios_n` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_n`
--

INSERT INTO `usuarios_n` (`id`, `nome`, `email`, `idade`) VALUES
(1, 'Telciane', 'telci@gmail.com', '18'),
(2, 'Man Dani Novo', 'mdaninovo@gmail.com', '23'),
(3, 'R', 'r@gmail.com', '22'),
(4, 'Dr. Daniel Valentim', 'drdaniel@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_normal`
--

DROP TABLE IF EXISTS `usuario_normal`;
CREATE TABLE IF NOT EXISTS `usuario_normal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` int NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `nivel` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_normal`
--

INSERT INTO `usuario_normal` (`id`, `nome`, `email`, `telefone`, `sexo`, `localidade`, `data_nascimento`, `senha`, `msg`, `nivel`, `status`) VALUES
(1, 'A', 'a@gmail.com', 933699499, '2', 'Cacuaco', '2024-02-15', '202cb962ac59075b964b07152d234b70', 'ola', 1, 1),
(2, 'Ndofula Afonso', 'ndofula@gmail.com', 999999993, '1', 'Viana', '2024-02-04', '202cb962ac59075b964b07152d234b70', 'ola', 1, 1),
(3, 'Elisa', 'elisa@gmail.com', 953456454, '2', 'Cacuaco', '2024-02-15', '202cb962ac59075b964b07152d234b70', 'Ei!', 1, 1),
(4, 'danilo', 'd@gmail.com', 12445567, 'Masculino', 'Viana', '2024-04-03', '65ded5353c5ee48d0b7d48c591b8f430', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `BI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_sanguinio` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_responsavel` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `BI_responsavel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id`, `nome_utente`, `email`, `BI`, `sexo`, `telefone`, `tipo_sanguinio`, `endereco`, `data_nascimento`, `senha`, `nome_responsavel`, `BI_responsavel`, `nivel`, `status`) VALUES
(1, 'Nilson', 'ns@gmail.com', '1257678BA024', 'M', '1234567899', 'A', 'Acolá', '2024-04-17', '202cb962ac59075b964b07152d234b70', 'Ana', '23232332BA042', 1, 1),
(5, 'Daniel Valentim', 'dn@gmail.com', '424242242BA042', 'M', '940040098', 'A+', 'Viana', '2024-02-15', '202cb962ac59075b964b07152d234b70', 'Ana Paula', '5252525252BA042', 1, 1),
(4, 'Ndofula', 'ndo@gmail.com', '2222222BR11111', 'M', '999999999', 'B', 'Viana', '2024-04-11', '202cb962ac59075b964b07152d234b70', 'Josefina', '122311333BA122', 1, 1),
(6, 'Danilo', 'danilo@gmail.com', '', 'Masculino', '999999999', '', '', '2024-05-15', '202cb962ac59075b964b07152d234b70', '', '', 2, 1),
(7, 'Nova', 'nv@gmail.com', '883828339LA042', 'Feminino', '9333333333', '', 'ali', '2024-05-08', '202cb962ac59075b964b07152d234b70', '', '', 1, 1),
(8, 'Elizabeth', 'elisa@gmail.com', '', 'Feminino', '946966317', '', '', '2000-11-15', '202cb962ac59075b964b07152d234b70', '', '', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
