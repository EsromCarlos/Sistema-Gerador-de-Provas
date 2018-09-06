-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Set-2018 às 10:57
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`) VALUES
(3, 'FÃ­sica'),
(4, 'MatemÃ¡tica'),
(5, 'PortuguÃªs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `questao` varchar(255) NOT NULL,
  `gabarito` varchar(100) NOT NULL,
  `disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `questao`, `gabarito`, `disciplina`) VALUES
(14, '', 'A', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`id`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplina` (`disciplina`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
