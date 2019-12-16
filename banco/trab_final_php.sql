-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2019 às 00:25
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trab_final_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `admnome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admsenha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admcodig` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`admnome`, `admemail`, `admsenha`, `admcodig`) VALUES
('Babika top', 'Babi.gatinha.eu@gmail.com', '294f7e62379b11cc3d2402de26d2a3d7', 2),
('al', 'al', 'YWw=', 3),
('mimosa', 'mimosa', 'bWltb3Nh', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `catcodig` int(11) NOT NULL,
  `catdescr` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`catcodig`, `catdescr`) VALUES
(3, 'Massas'),
(6, 'comidinha de mamae'),
(8, 'refrigerantes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `clicodig` int(11) NOT NULL,
  `clinome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clisenha` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `climagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`clicodig`, `clinome`, `cliemail`, `clisenha`, `climagem`) VALUES
(130, 'aaa', 'adsadsas', 'YXNkYWRzYWRz', '0.png'),
(132, 'alo', 'alo', 'alo', '132.jpg'),
(133, 'alice quadros', 'alicequadros63@gmail.com', 'YWxpY2U=', '0.png'),
(134, 'asdads', 'asasd', 'YWFkc2Fkc2Fkcw==', '0.png'),
(135, '', '', '', '0.png'),
(136, '', '', '', '0.png'),
(138, 'ali', 'ali', 'YWxp', '0.png'),
(139, 'alicinha', 'alicinha', 'YWxpY2luaGE=', '139.jpg'),
(140, 'alice', 'aliice', 'YWxpY2U=', '140.jpg'),
(141, 'alll', 'allla', 'YWxhbGFsYQ==', '141.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `pedcodig` int(255) NOT NULL,
  `pedata` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `clicodig` int(255) NOT NULL,
  `procodig` int(255) NOT NULL,
  `pedquant` int(255) NOT NULL,
  `pedtotal` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`pedcodig`, `pedata`, `clicodig`, `procodig`, `pedquant`, `pedtotal`) VALUES
(6, '2019-12-11 16:41:54.567951', 0, 100, 1, 6),
(7, '2019-12-11 16:41:54.567951', 0, 99, 3, 27),
(8, '2019-12-11 16:41:54.567951', 3, 99, 1, 9),
(9, '2019-12-11 16:41:54.567951', 3, 100, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `procodig` int(11) NOT NULL,
  `pronome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `promarca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `procateg` int(11) NOT NULL,
  `propreco` decimal(10,2) NOT NULL,
  `proestoq` int(255) NOT NULL,
  `proimagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`procodig`, `pronome`, `promarca`, `procateg`, `propreco`, `proestoq`, `proimagem`) VALUES
(99, 'coca cola', 'coca cola', 8, '4.99', 0, '99.jpg'),
(100, 'sprite', 'coca cola', 8, '5.00', 20, '100.jpg'),
(101, 'pizza', 'sadia', 3, '22.00', 0, '101.jpg'),
(103, 'massa', 'isabela', 3, '2.00', 0, '103.jpg'),
(104, 'chocolate ao leite', 'nestle', 3, '6.00', 0, '104.jpg'),
(105, 'sadsad', 'saddsaa', 3, '22.00', 0, '105.jpg'),
(106, 'asddsa', 'asdads', 3, '1.00', 0, '106.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admcodig`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`catcodig`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clicodig`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedcodig`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`procodig`),
  ADD KEY `prodcat` (`procateg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admcodig` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `catcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clicodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedcodig` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `procodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `prodcat` FOREIGN KEY (`procateg`) REFERENCES `categorias` (`catcodig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
