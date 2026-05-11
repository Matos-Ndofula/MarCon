-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2025 at 06:43 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `BI`, `nome_sistema`, `telefone`, `endereco`, `senha`, `msg`, `nivel`, `status`) VALUES
(11, 'Admin', 'admin@gmail.com', '99999009AB323', 'SisCOns', '9333333334', 'Cacuaco Vila', '202cb962ac59075b964b07152d234b70', '', 3, 1);

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
-- Table structure for table `consultas_atendidas`
--

DROP TABLE IF EXISTS `consultas_atendidas`;
CREATE TABLE IF NOT EXISTS `consultas_atendidas` (
  `id_utente` int NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(300) NOT NULL,
  `especialidade` varchar(300) NOT NULL,
  `nome_medico` varchar(300) NOT NULL,
  `color` varchar(300) NOT NULL,
  `data_horario` date NOT NULL,
  `estado` varchar(300) NOT NULL,
  `obs` varchar(300) NOT NULL,
  `horario` varchar(300) NOT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consultas_atendidas`
--

INSERT INTO `consultas_atendidas` (`id_utente`, `nome_utente`, `especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES
(95, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#008000', '2025-05-29', 'Atendido', '', 'Livre'),
(110, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#008000', '2025-05-29', 'Atendido', '', 'Livre');

-- --------------------------------------------------------

--
-- Table structure for table `consultas_canceladas`
--

DROP TABLE IF EXISTS `consultas_canceladas`;
CREATE TABLE IF NOT EXISTS `consultas_canceladas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utente` int NOT NULL,
  `nome_utente` varchar(300) NOT NULL,
  `especialidade` varchar(300) NOT NULL,
  `nome_medico` varchar(300) NOT NULL,
  `color` varchar(300) NOT NULL,
  `data_horario` date NOT NULL,
  `estado` varchar(300) NOT NULL,
  `obs` varchar(300) NOT NULL,
  `horario` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consultas_canceladas`
--

INSERT INTO `consultas_canceladas` (`id`, `id_utente`, `nome_utente`, `especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES
(1, 108, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-27', 'Agendado', '', '08:00:00'),
(2, 100, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-27', 'Desmarcada', '', 'Livre'),
(3, 109, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-05-28', 'Agendado', '', '08:00:00'),
(4, 124, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-28', 'Agendado', '', '08:00:00'),
(5, 125, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-28', 'Agendado', '', '09:00:00'),
(6, 3, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-05-29', 'Agendado', '', '08:00:00'),
(7, 7, 'Ndofula', 'Dermatologia', 'Danilo', '#ffe000', '2025-05-30', 'Agendado', '', '08:00:00'),
(8, 6, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-05-30', 'Agendado', '', '08:00:00'),
(9, 9, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-05-30', 'Agendado', '', '08:00:00'),
(10, 4, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '0000-00-00', 'Agendado', '', ''),
(11, 5, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '0000-00-00', 'Agendado', '', ''),
(12, 13, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '0000-00-00', 'Agendado', '', ''),
(13, 10, 'Ndofula', 'Dermatologia', 'Danilo', '#ffe000', '2025-06-03', 'Agendado', '', '08:00:00'),
(14, 12, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-06-03', 'Agendado', '', '08:00:00'),
(15, 16, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-06-03', 'Agendado', '', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `consultas_demarcadas`
--

DROP TABLE IF EXISTS `consultas_demarcadas`;
CREATE TABLE IF NOT EXISTS `consultas_demarcadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utente` int NOT NULL,
  `nome_utente` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_medico` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_horario` date NOT NULL,
  `estado` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas_demarcadas`
--

INSERT INTO `consultas_demarcadas` (`id`, `id_utente`, `nome_utente`, `especialidade`, `nome_medico`, `color`, `data_horario`, `estado`, `obs`, `horario`) VALUES
(10, 99, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-28', 'Desmarcada', '', 'Livre'),
(9, 102, 'Ndofula', 'Cardiologia', 'Dadiva', 'gray', '2025-05-28', 'Desmarcada', '', 'Livre'),
(5, 105, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(6, 105, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(7, 105, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(8, 104, 'Ndofula', 'Cardiologia', 'Dadiva', 'gray', '2025-05-28', 'Desmarcada', '', 'Livre'),
(11, 98, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-29', 'Desmarcada', '', 'Livre'),
(12, 94, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-29', 'Desmarcada', '', 'Livre'),
(13, 101, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-06-04', 'Desmarcada', '', 'Livre'),
(14, 113, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-31', 'Desmarcada', '', 'Livre'),
(15, 111, 'Ndofula', 'Cardiologia', 'Dadiva', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(16, 2, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(17, 1, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', 'gray', '2025-05-30', 'Desmarcada', '', 'Livre'),
(18, 8, 'Ndofula', 'Dermatologia', 'Danilo', 'gray', '2025-06-02', 'Desmarcada', '', 'Livre'),
(19, 15, 'Ndofula', 'Dermatologia', 'Danilo', 'gray', '2025-06-03', 'Desmarcada', '', 'Livre'),
(20, 14, 'Ndofula', 'Cardiologia', 'Dadiva', 'gray', '2025-06-06', 'Desmarcada', '', 'Livre');

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
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `historico_medico`
--

INSERT INTO `historico_medico` (`id`, `especialidade`, `questao`, `acrescentar`) VALUES
(1, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(2, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(3, 'Oftalmologia', '', ','),
(4, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(5, 'Oftalmologia', 'dor nos olhos,', ','),
(6, 'Oftalmologia', '', ','),
(7, 'Oftalmologia', '', ','),
(8, 'Cardiologia', '', ','),
(9, 'Dermatologia', '', ','),
(10, 'Cardiologia', '', ','),
(11, 'Oftalmologia', '', ','),
(12, 'Dermatologia', '', ','),
(13, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(14, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(15, 'Cardiologia', '', ','),
(16, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(17, 'Cardiologia', '', ','),
(18, 'Dermatologia', '', ','),
(19, 'Oftalmologia', '', ','),
(20, 'Oftalmologia', '', ','),
(21, 'Dermatologia', '', ','),
(22, 'Dermatologia', '', ','),
(23, 'Dermatologia', '', ','),
(24, 'Dermatologia', '', ','),
(25, 'Dermatologia', '', ','),
(26, 'Dermatologia', '', ','),
(27, 'Dermatologia', '', ','),
(28, 'Dermatologia', '', ','),
(29, 'Dermatologia', '', ','),
(30, 'Cardiologia', '', ','),
(31, 'Oftalmologia', '', ','),
(32, 'Cardiologia', '', ','),
(33, 'Oftalmologia', '', ','),
(34, 'Oftalmologia', '', ','),
(35, 'Oftalmologia', '', ','),
(36, 'Oftalmologia', '', ','),
(37, 'Oftalmologia', '', ','),
(38, 'Dermatologia', '', ','),
(39, 'Dermatologia', '', ','),
(40, 'Cardiologia', '', ','),
(41, 'Cardiologia', '', ','),
(42, 'Cardiologia', '', ','),
(43, 'Cardiologia', '', ','),
(44, 'Cardiologia', '', ','),
(45, 'Cardiologia', '', ','),
(46, 'Cardiologia', '', ','),
(47, 'Cardiologia', '', ','),
(48, 'Cardiologia', '', ','),
(49, 'Cardiologia', '', ','),
(50, 'Cardiologia', '', ','),
(51, 'Oftalmologia', '', ','),
(52, 'Oftalmologia', '', ','),
(53, 'Oftalmologia', '', ','),
(54, 'Oftalmologia', '', ','),
(55, 'Dermatologia', '', ','),
(56, 'Oftalmologia', '', ','),
(57, 'Cardiologia', '', ','),
(58, 'Dermatologia', '', ','),
(59, 'Oftalmologia', '', ','),
(60, 'Cardiologia', '', ','),
(61, 'Cardiologia', '', ','),
(62, 'Oftalmologia', '', ','),
(63, 'Oftalmologia', '', ','),
(64, 'Oftalmologia', '', ','),
(65, 'Oftalmologia', 'dor nos olhos,', 'aqui,'),
(66, 'Cardiologia', '', ','),
(67, 'Dermatologia', '', ','),
(68, 'Oftalmologia', '', ','),
(69, 'Oftalmologia', '', ','),
(70, 'Oftalmologia', '', ','),
(71, 'Oftalmologia', '', ','),
(72, 'Oftalmologia', '', ','),
(73, 'Cardiologia', '', ','),
(74, 'Oftalmologia', '', ','),
(75, 'Oftalmologia', '', ','),
(76, 'Cardiologia', '', ','),
(77, 'Oftalmologia', '', ','),
(78, 'Oftalmologia', '', ','),
(79, 'Oftalmologia', '', ','),
(80, 'Cardiologia', '', ','),
(81, 'Oftalmologia', '', ','),
(82, 'Oftalmologia', '', ','),
(83, 'Cardiologia', '', ','),
(84, 'Dermatologia', '', ','),
(85, 'Oftalmologia', '', ','),
(86, 'Cardiologia', '', ','),
(87, 'Dermatologia', '', ','),
(88, 'Oftalmologia', '', ','),
(89, 'Cardiologia', '', ','),
(90, 'Dermatologia', '', ','),
(91, 'Oftalmologia', '', ','),
(92, 'Cardiologia', '', ','),
(93, 'Dermatologia', '', ','),
(94, 'Oftalmologia', '', ','),
(95, 'Oftalmologia', '', ','),
(96, 'Oftalmologia', '', ','),
(97, 'Oftalmologia', '', ','),
(98, 'Cardiologia', '', ','),
(99, 'Oftalmologia', '', ','),
(100, 'Oftalmologia', '', ','),
(101, 'Oftalmologia', '', ','),
(102, 'Cardiologia', '', ','),
(103, 'Oftalmologia', '', ','),
(104, 'Cardiologia', '', ','),
(105, 'Dermatologia', '', ','),
(106, 'Cardiologia', '', ','),
(107, 'Dermatologia', '', ','),
(108, 'Dermatologia', 'Tem alergia,', ',,e coceiras,'),
(109, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(110, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(111, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(112, 'Cardiologia', '', ',,,'),
(113, 'Dermatologia', '', ',,,'),
(114, 'Oftalmologia', '', ',,,'),
(115, 'Oftalmologia', '', ',,,'),
(116, 'Cardiologia', '', ',,,'),
(117, 'Oftalmologia', '', ',,,'),
(118, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(119, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(120, 'Dermatologia', 'Tem alergia,', ',,e coceiras,'),
(121, 'Oftalmologia', '', ',,,'),
(122, 'Dermatologia', '', ',,,'),
(123, 'Cardiologia', '', ',,,'),
(124, 'Oftalmologia', '', ',,,'),
(125, 'Cardiologia', '', ',,,'),
(126, 'Cardiologia', 'Dor no peito,', ',e tosse,,'),
(127, 'Oftalmologia', '', ',,,'),
(128, 'Oftalmologia', 'dor nos olhos,', 'e coceiras,,,'),
(129, 'Cardiologia', '', ',,,'),
(130, 'Cardiologia', '', ',,,'),
(131, 'Dermatologia', '', ',,,');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`id`, `nome`, `email`, `genero`, `BI`, `telefone`, `localidade`, `data_nascimento`, `especialidade`, `senha`, `msg`, `nivel`, `status`) VALUES
(7, 'Dr.Antoninho', 'at@gmail.com', 'Masculino', '', '924258101', 'Sambizanga', '0000-00-00', 'Oftalmologia', '202cb962ac59075b964b07152d234b70', '', 2, 1),
(9, 'Dadiva ', 'dadiva@gmail.com', 'Feminino', '', '1234567899', 'Viana', '2024-04-04', 'Cardiologia', '202cb962ac59075b964b07152d234b70', '', 2, 1),
(11, 'Danilo', 'danilomedico@gmail.com', 'Masculino', '1222222321AO042', '940045812', 'Cacuaco', '1992-11-15', 'Dermatologia', '202cb962ac59075b964b07152d234b70', '', 2, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questao`
--

INSERT INTO `questao` (`id`, `especialidade`, `questao`) VALUES
(1, 'Oftalmologia', 'dor nos olhos'),
(2, 'Cardiologia', 'Dor no peito'),
(3, 'Dermatologia', 'Tem alergia');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabela_eventos_calendario`
--

INSERT INTO `tabela_eventos_calendario` (`id`, `nome_utente`, `especialidade`, `nome_medico`, `color`, `data_horario`, `horario`, `estado`, `obs`) VALUES
(20, 'Ndofula', 'Dermatologia', 'Danilo', '#ffe000', '2025-06-05', '08:00:00', 'Agendado', ''),
(18, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-06-05', '08:00:00', 'Agendado', ''),
(17, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-06-06', '08:00:00', 'Agendado', ''),
(19, 'Ndofula', 'Oftalmologia', 'Dr.Antoninho', '#ffe000', '2025-06-05', '08:00:00', 'Agendado', ''),
(11, 'Ndofula', 'Cardiologia', 'Dadiva', '#ffe000', '2025-06-09', '08:00:00', 'Agendado', '');

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
