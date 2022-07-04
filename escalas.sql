-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Dez-2021 às 17:20
-- Versão do servidor: 10.5.4-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escalas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

DROP TABLE IF EXISTS `equipes`;
CREATE TABLE IF NOT EXISTS `equipes` (
  `id_equipes` int(11) NOT NULL AUTO_INCREMENT,
  `equipes` int(11) NOT NULL,
  PRIMARY KEY (`id_equipes`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`id_equipes`, `equipes`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas`
--

DROP TABLE IF EXISTS `escalas`;
CREATE TABLE IF NOT EXISTS `escalas` (
  `id_escala` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipes` int(11) DEFAULT NULL,
  `data_hora` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_escala`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `escalas`
--

INSERT INTO `escalas` (`id_escala`, `id_equipes`, `data_hora`) VALUES
(1, 1, '2021-12-19 00:00:00'),
(2, 1, '2021-12-19 12:00:00'),
(3, 2, '2021-12-19 12:00:00'),
(4, 2, '2021-12-20 00:00:00'),
(5, 3, '2021-12-20 00:00:00'),
(6, 3, '2021-12-20 12:00:00'),
(7, 4, '2021-12-20 12:00:00'),
(8, 4, '2021-12-21 00:00:00'),
(9, 1, '2021-12-21 00:00:00'),
(10, 1, '2021-12-21 12:00:00'),
(11, 2, '2021-12-21 12:00:00'),
(12, 2, '2021-12-22 00:00:00'),
(13, 3, '2021-12-22 00:00:00'),
(14, 3, '2021-12-22 12:00:00'),
(15, 4, '2021-12-22 12:00:00'),
(16, 4, '2021-12-23 00:00:00'),
(17, 1, '2021-12-23 00:00:00'),
(18, 1, '2021-12-23 12:00:00'),
(19, 2, '2021-12-23 12:00:00'),
(20, 2, '2021-12-24 00:00:00'),
(21, 3, '2021-12-24 00:00:00'),
(22, 3, '2021-12-24 12:00:00'),
(23, 4, '2021-12-24 12:00:00'),
(24, 4, '2021-12-25 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
