-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Out-2019 às 22:42
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `usuario`, `senha`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `flagAtivo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `flagAtivo`) VALUES
(1, 'Sapatos', 1),
(3, 'Camisas', 1),
(5, 'Calças', 1),
(7, 'Bonés', 1),
(31, 'Motos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `flagAtivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `nome`, `flagAtivo`) VALUES
(5, 'Cortesia', 1),
(7, 'PagSeguro', 1),
(10, 'PayPal', 1),
(12, 'Boleto', 1),
(13, 'MoIP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preco` float(10,0) NOT NULL,
  `qtde` int(11) NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `flagAtivo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `qtde`, `descricao`, `idCategoria`, `flagAtivo`) VALUES
(1, 'produto1', 'sapato.jpg', 21, 30, 'descrição teste do produto teste pra testar', 1, 1),
(2, 'produto2', 'camisa.jpg', 45, 25, 'descrição teste produto 2', 3, 1),
(3, 'produto3', 'calca.jpg', 30, 25, 'descrição teste produto 3', 5, 1),
(4, 'produto3', 'bones.jpg', 45, 45, 'descrição teste produto 3', 7, 1),
(5, 'produto5', 'camisa.jpg', 55, 25, 'descrição teste produto 5', 3, 1),
(6, 'produto6', 'sapato.jpg', 20, 35, 'descrição teste produto 6', 1, 1),
(7, 'produto7', 'calca.jpg', 85, 25, 'descrição teste produto 7', 5, 1),
(8, 'produto8', 'calca.jpg', 45, 25, 'descrição teste produto 8', 5, 1),
(9, 'produto9', 'bones.jpg', 35, 25, 'descrição teste produto 9', 7, 1),
(15, 'teste', 'bdbe06e3aa89b57673bc9816445b0241.jpg', 200, 80, 'teste', 1, 1),
(20, 'Moto', 'e814851c1e5d83109fac64e97b7ca3a4.jpg', 40000, 1, 'Moto maneira', 3, 1),
(21, 'Moto', '514768fcc451406dabb6676428ece04b.jpg', 40000, 1, 'Moto maneira', 3, 1),
(22, 'Moto', 'c7e63478ecf91904c4443a45c2dc96f3.jpg', 20000, 2, 'moto maneira', 1, 1),
(23, 'Moto', '08507073edef2b8766edca004d057dfe.jpg', 5555, 2, 'teste', 1, 1),
(24, 'Moto', '9f8e8d1c3c5b169f4a19bb808e181a26.jpg', 20000, 56, 'teste', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flagAtivo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `flagAtivo`) VALUES
(1, 'tiago', 'tmarins@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'tiago', 'tiagomarins@gmail.com', '3546ab441e56fa333f8b44b610d95691', 1),
(5, 'Joselito Junior silva', 'junior_joselito@hotmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', 1),
(6, 'Revolverson', 'Revolverson@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'usuario teste', 'usertest@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaproduto`
--

CREATE TABLE `vendaproduto` (
  `id` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vendaproduto`
--

INSERT INTO `vendaproduto` (`id`, `idVenda`, `idProduto`, `qtde`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 1),
(3, 1, 8, 1),
(4, 3, 5, 1),
(5, 3, 9, 1),
(6, 4, 1, 1),
(7, 4, 5, 1),
(8, 4, 9, 1),
(9, 5, 2, 1),
(10, 5, 5, 1),
(11, 5, 6, 1),
(12, 6, 1, 1),
(13, 6, 5, 1),
(14, 7, 8, 1),
(15, 8, 2, 1),
(16, 8, 6, 1),
(17, 8, 7, 1),
(18, 8, 9, 1),
(19, 9, 5, 1),
(20, 9, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `endereco` text COLLATE utf8_unicode_ci NOT NULL,
  `total` float(10,0) NOT NULL,
  `formaPagamento` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pgLink` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dataVenda` date NOT NULL,
  `flagAtivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `idUsuario`, `endereco`, `total`, `formaPagamento`, `status`, `pgLink`, `dataVenda`, `flagAtivo`) VALUES
(1, 1, 'endereco 1', 110, 5, 2, '', '2019-09-24', 1),
(2, 2, 'endereco 2', 0, 5, 2, '', '2019-09-24', 1),
(3, 1, 'endereco 1', 90, 5, 2, '/projetoBase/carrinho/compraRealizada', '2019-09-24', 1),
(4, 2, 'endereco 2', 111, 7, 1, '', '2019-08-06', 1),
(5, 1, 'endereco 1', 120, 7, 1, '', '2019-09-10', 1),
(6, 2, 'endereco 2', 76, 7, 1, '', '2019-09-01', 1),
(7, 1, 'endereco 1', 45, 7, 1, '', '2019-07-05', 1),
(8, 2, 'endereco 2', 185, 7, 1, '', '2019-04-05', 1),
(9, 1, 'endereco 1', 75, 7, 1, '', '2019-03-14', 1),
(10, 2, 'endereco 2', 110, 7, 2, '', '2019-01-01', 1),
(11, 1, 'endereco 1', 19, 7, 2, '', '2019-01-10', 1),
(12, 2, 'endereco 2', 50, 7, 2, '', '2019-01-20', 1),
(13, 1, 'endereco 1', 20, 7, 2, '', '2019-01-30', 1),
(14, 2, 'endereco 2', 65, 7, 2, '', '2019-02-02', 1),
(15, 1, 'endereco 1', 35, 7, 2, '', '2019-02-12', 1),
(16, 2, 'endereco 2', 60, 7, 2, '', '2019-02-20', 1),
(17, 1, 'endereco 1', 76, 7, 2, '', '2019-02-25', 1),
(18, 2, 'endereco 2', 100, 7, 2, '', '2019-03-12', 1),
(19, 1, 'endereco 1', 44, 7, 2, '', '2019-03-20', 1),
(20, 2, 'endereco 2', 29, 7, 2, '', '2019-03-22', 1),
(21, 1, 'endereco 1', 120, 7, 2, '', '2019-04-01', 1),
(22, 2, 'endereco 2', 15, 7, 2, '', '2019-04-05', 1),
(23, 1, 'endereco 1', 65, 7, 2, '', '2019-04-05', 1),
(24, 2, 'endereco 2', 65, 7, 2, '', '2019-04-10', 1),
(25, 1, 'endereco 1', 35, 7, 2, '', '2019-04-15', 1),
(26, 2, 'endereco 2', 60, 7, 2, '', '2019-04-20', 1),
(27, 1, 'endereco 1', 76, 7, 2, '', '2019-04-25', 1),
(28, 2, 'endereco 2', 100, 7, 2, '', '2019-05-12', 1),
(29, 1, 'endereco 1', 44, 7, 2, '', '2019-05-20', 1),
(30, 2, 'endereco 2', 29, 7, 2, '', '2019-05-22', 1),
(31, 1, 'endereco 1', 120, 7, 2, '', '2019-05-30', 1),
(32, 2, 'endereco 2', 15, 7, 2, '', '2019-06-05', 1),
(33, 1, 'endereco 1', 65, 7, 2, '', '2019-06-05', 1),
(34, 2, 'endereco 2', 65, 7, 2, '', '2019-06-10', 1),
(35, 1, 'endereco 1', 35, 7, 2, '', '2019-06-15', 1),
(36, 2, 'endereco 2', 60, 7, 2, '', '2019-07-09', 1),
(37, 1, 'endereco 1', 76, 7, 2, '', '2019-07-20', 1),
(38, 2, 'endereco 2', 100, 7, 2, '', '2019-07-29', 1),
(39, 1, 'endereco 1', 44, 7, 2, '', '2019-08-02', 1),
(40, 2, 'endereco 2', 29, 7, 2, '', '2019-08-08', 1),
(41, 1, 'endereco 1', 120, 7, 2, '', '2019-08-12', 1),
(42, 2, 'endereco 2', 15, 7, 2, '', '2019-08-16', 1),
(43, 1, 'endereco 1', 65, 7, 2, '', '2019-08-25', 1),
(44, 2, 'endereco 2', 65, 7, 2, '', '2019-08-30', 1),
(45, 1, 'endereco 1', 35, 7, 2, '', '2019-09-09', 1),
(46, 2, 'endereco 2', 60, 7, 2, '', '2019-09-15', 1),
(47, 1, 'endereco 1', 76, 7, 2, '', '2019-09-20', 1),
(48, 2, 'endereco 2', 100, 7, 2, '', '2019-09-29', 1),
(49, 1, 'endereco 1', 44, 7, 2, '', '2019-10-02', 1),
(50, 2, 'endereco 2', 29, 7, 2, '', '2019-10-08', 1),
(51, 1, 'endereco 1', 120, 7, 2, '', '2019-10-12', 1),
(52, 2, 'endereco 2', 15, 7, 2, '', '2019-10-20', 1),
(53, 1, 'endereco 1', 65, 7, 2, '', '2019-10-25', 1),
(54, 2, 'endereco 2', 65, 7, 2, '', '2019-10-30', 1),
(55, 1, 'endereco 1', 35, 7, 2, '', '2019-11-02', 1),
(56, 2, 'endereco 2', 60, 7, 2, '', '2019-11-08', 1),
(57, 1, 'endereco 1', 76, 7, 2, '', '2019-11-16', 1),
(58, 2, 'endereco 2', 100, 7, 2, '', '2019-11-20', 1),
(59, 1, 'endereco 1', 44, 7, 2, '', '2019-11-22', 1),
(60, 2, 'endereco 2', 29, 7, 2, '', '2019-11-25', 1),
(61, 1, 'endereco 1', 120, 7, 2, '', '2019-11-27', 1),
(62, 2, 'endereco 2', 15, 7, 2, '', '2019-11-29', 1),
(63, 1, 'endereco 1', 65, 7, 2, '', '2019-12-01', 1),
(64, 2, 'endereco 2', 65, 7, 2, '', '2019-12-05', 1),
(65, 1, 'endereco 1', 35, 7, 2, '', '2019-12-09', 1),
(66, 2, 'endereco 2', 60, 7, 2, '', '2019-12-12', 1),
(67, 1, 'endereco 1', 76, 7, 2, '', '2019-12-16', 1),
(68, 2, 'endereco 2', 100, 7, 2, '', '2019-12-20', 1),
(69, 1, 'endereco 1', 44, 7, 2, '', '2019-12-22', 1),
(70, 2, 'endereco 2', 29, 7, 2, '', '2019-12-25', 1),
(71, 1, 'endereco 1', 120, 7, 2, '', '2019-12-27', 1),
(72, 2, 'endereco 2', 15, 7, 2, '', '2019-12-29', 1),
(73, 1, 'endereco 1', 65, 7, 2, '', '2019-05-20', 1),
(74, 2, 'endereco 2', 65, 7, 2, '', '2019-06-05', 1),
(75, 1, 'endereco 1', 35, 7, 2, '', '2019-12-09', 1),
(76, 2, 'endereco 2', 60, 7, 2, '', '2019-04-12', 1),
(77, 1, 'endereco 1', 76, 7, 2, '', '2019-09-16', 1),
(78, 2, 'endereco 2', 100, 7, 2, '', '2019-03-20', 1),
(79, 1, 'endereco 1', 44, 7, 2, '', '2019-02-22', 1),
(80, 2, 'endereco 2', 29, 7, 2, '', '2019-03-25', 1),
(81, 1, 'endereco 1', 120, 7, 2, '', '2019-07-27', 1),
(82, 2, 'endereco 2', 15, 7, 2, '', '2019-04-29', 1),
(83, 1, 'endereco 1', 65, 7, 2, '', '2019-03-20', 1),
(84, 2, 'endereco 2', 65, 7, 2, '', '2019-09-05', 1),
(85, 1, 'endereco 1', 35, 7, 2, '', '2019-08-09', 1),
(86, 2, 'endereco 2', 60, 7, 2, '', '2019-01-12', 1),
(87, 1, 'endereco 1', 76, 7, 2, '', '2019-05-16', 1),
(88, 2, 'endereco 2', 100, 7, 2, '', '2019-07-20', 1),
(89, 1, 'endereco 1', 44, 7, 2, '', '2019-08-22', 1),
(90, 2, 'endereco 2', 29, 7, 2, '', '2019-07-25', 1),
(91, 1, 'endereco 1', 120, 7, 2, '', '2019-03-27', 1),
(92, 2, 'endereco 2', 15, 7, 2, '', '0000-00-00', 1),
(93, 1, 'endereco 1', 65, 7, 2, '', '2019-05-20', 1),
(94, 2, 'endereco 2', 65, 7, 2, '', '2019-07-05', 1),
(95, 1, 'endereco 1', 35, 7, 2, '', '2019-06-09', 1),
(96, 2, 'endereco 2', 60, 7, 2, '', '2019-03-12', 1),
(97, 1, 'endereco 1', 76, 7, 2, '', '2019-07-16', 1),
(98, 2, 'endereco 2', 100, 7, 2, '', '2019-09-20', 1),
(99, 1, 'endereco 1', 44, 7, 2, '', '2019-10-22', 1),
(100, 2, 'endereco 2', 29, 7, 2, '', '2019-09-25', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idVenda` (`idVenda`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComprador` (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD CONSTRAINT `vendaproduto_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `vendaproduto_ibfk_2` FOREIGN KEY (`idVenda`) REFERENCES `vendas` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
