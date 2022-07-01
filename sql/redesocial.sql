-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Jun-2022 às 14:42
-- Versão do servidor: 5.6.51
-- versão do PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `redesocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pubs`
--

CREATE TABLE `pubs` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `texto` text NOT NULL,
  `imagem` text,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pubs`
--

INSERT INTO `pubs` (`id`, `idUsuario`, `texto`, `imagem`, `data`) VALUES
(41, 18, 'Bom dia, hoje estou com sono', 'Array', '2022-06-30'),
(42, 18, 'PromoÃ§Ã£o relÃ¢mpago!!!', '305088promo.png', '2022-06-30'),
(43, 18, 'PromoÃ§Ã£o relÃ¢mpago!!!', '226448promo.png', '2022-06-30'),
(44, 18, 'oi keridos', '73401.jpg', '2022-06-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `apelido` varchar(150) DEFAULT NULL,
  `img` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `apelido`, `img`, `email`, `senha`, `data`) VALUES
(18, 'Larissa Bandeira', '', 'Screenshot_2.png', 'larissaband13@gmail.com', '123', '2022-06-29'),
(19, 'Nathalia Strehl', '', 'mv.jpg', 'nathy.strehl@hotmail.com', '1234', '2022-06-30'),
(20, 'teste', '', '', 'teste@teste.com', 'teste', '2022-06-30');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pubs`
--
ALTER TABLE `pubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
