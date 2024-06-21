-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2024 às 16:00
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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

CREATE TABLE `tbcategorias` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcategorias`
--

INSERT INTO `tbcategorias` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Ação'),
(2, 'Terror'),
(3, 'Romance'),
(4, 'Ficção Ciêntifica'),
(5, 'Documentario'),
(6, 'Aventura'),
(7, 'Animação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvideos`
--

CREATE TABLE `tbvideos` (
  `idVideo` int(11) NOT NULL,
  `tituloVideo` varchar(255) NOT NULL,
  `duracaoVideo` varchar(100) NOT NULL,
  `valorLocacaoVideo` decimal(10,2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `statusVideo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbvideos`
--

INSERT INTO `tbvideos` (`idVideo`, `tituloVideo`, `duracaoVideo`, `valorLocacaoVideo`, `idCategoria`, `statusVideo`) VALUES
(1, 'Caça Fantasmas', '2 horas', '5.00', 4, 1),
(2, 'Rambo 1', '2:30 horas', '9.00', 1, 3),
(3, 'Exterminador', '2 horas', '10.00', 4, 2),
(4, 'Exterminador II', '2 horas', '10.00', 4, 1),
(5, 'A princesa e a fera', '1:30 h', '5.00', 6, 1),
(7, 'Alien', '3', '12.00', 0, 1),
(8, 'Alien 2', '2', '10.00', 4, 1),
(9, 'Alien 3', '1', '10.00', 4, 1),
(10, 'Predador vs Alien', '1', '10.00', 4, 1),
(11, 'Ezterminardor Vs Alien em Nova York', '2', '10.00', 4, 1),
(12, 'A casa do lago', '2h', '4.00', 3, 2),
(13, 'Um tira da pesada', '1:30 h', '5.00', 1, 1),
(14, 'THE BOYS', '40 M', '9.90', 4, 1),
(15, 'Godzilla', '2 h', '9.90', 4, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategorias`
--
ALTER TABLE `tbcategorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `tbvideos`
--
ALTER TABLE `tbvideos`
  ADD PRIMARY KEY (`idVideo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategorias`
--
ALTER TABLE `tbcategorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbvideos`
--
ALTER TABLE `tbvideos`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
