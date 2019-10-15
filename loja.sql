-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Set-2019 às 21:28
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.22

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
  `titulo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`) VALUES
(1, 'Sapatos'),
(3, 'Camisas'),
(5, 'Calças'),
(7, 'Bonés');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `nome`) VALUES
(5, 'Cortesia'),
(7, 'PagSeguro'),
(10, 'PayPal'),
(12, 'Boleto'),
(13, 'MoIP');

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
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `qtde`, `descricao`, `idCategoria`) VALUES
(1, 'produto1', 'sapato.jpg', 21, 30, 'descrição teste do produto teste pra testar', 1),
(2, 'produto2', 'camisa.jpg', 45, 25, 'descrição teste produto 2', 3),
(3, 'produto3', 'calca.jpg', 30, 25, 'descrição teste produto 3', 5),
(4, 'produto3', 'bones.jpg', 45, 45, 'descrição teste produto 3', 7),
(5, 'produto5', 'camisa.jpg', 55, 25, 'descrição teste produto 5', 3),
(6, 'produto6', 'sapato.jpg', 20, 35, 'descrição teste produto 6', 1),
(7, 'produto7', 'calca.jpg', 85, 25, 'descrição teste produto 7', 5),
(8, 'produto8', 'calca.jpg', 45, 25, 'descrição teste produto 8', 5),
(9, 'produto9', 'bones.jpg', 35, 25, 'descrição teste produto 9', 7),
(15, 'teste', 'bdbe06e3aa89b57673bc9816445b0241.jpg', 200, 80, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'tiago', 'tmarins@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'tiago', 'tiagomarins@gmail.com', '3546ab441e56fa333f8b44b610d95691'),
(5, 'Joselito Junior silva', 'junior_joselito@hotmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(6, 'Revolverson', 'Revolverson@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e');

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
  `dataVenda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `idUsuario`, `endereco`, `total`, `formaPagamento`, `status`, `pgLink`, `dataVenda`) VALUES
(1, 1, 'rua teste, 5', 110, 5, 2, '', '2019-09-24'),
(2, 1, 'rua teste, 5', 0, 5, 2, '', '2019-09-24'),
(3, 2, 'rua teste, 2', 90, 5, 2, '/projetoBase/carrinho/compraRealizada', '2019-09-24'),
(4, 1, 'teste, 55', 111, 7, 1, '', '2019-08-06'),
(5, 1, 'Oto teste, 666', 120, 7, 1, '', '2019-09-10'),
(6, 1, 'mais oto, 56', 76, 7, 1, '', '2019-09-01'),
(7, 1, 'miasum, 333', 45, 7, 1, '', '2019-07-05'),
(8, 1, 'maisum', 185, 7, 1, '', '2019-04-05'),
(9, 1, 'Rua acre', 75, 7, 1, '', '2019-03-14');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
