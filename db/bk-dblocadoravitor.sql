-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Maio-2024 às 20:28
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dblocadoravitor`
--
CREATE DATABASE IF NOT EXISTS `dblocadoravitor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dblocadoravitor`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategorias`
--

DROP TABLE IF EXISTS `tbcategorias`;
CREATE TABLE IF NOT EXISTS `tbcategorias` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcategorias`
--

INSERT INTO `tbcategorias` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Ação'),
(2, 'Terror'),
(3, 'Romance'),
(4, 'Ficção Ciêntifica'),
(5, 'Documentario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvideos`
--

DROP TABLE IF EXISTS `tbvideos`;
CREATE TABLE IF NOT EXISTS `tbvideos` (
  `idVideo` int NOT NULL AUTO_INCREMENT,
  `tituloVideo` varchar(255) NOT NULL,
  `duracaoVideo` varchar(100) NOT NULL,
  `valorLocacaoVideo` decimal(10,2) NOT NULL,
  `idCategoria` int NOT NULL,
  `statusVideo` int NOT NULL,
  PRIMARY KEY (`idVideo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbvideos`
--

INSERT INTO `tbvideos` (`idVideo`, `tituloVideo`, `duracaoVideo`, `valorLocacaoVideo`, `idCategoria`, `statusVideo`) VALUES
(1, 'Caça Fantasmas', '2 horas', '5.00', 4, 1),
(2, 'Rambo 1', '2:30 horas', '9.00', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
