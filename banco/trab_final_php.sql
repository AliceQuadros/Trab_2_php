-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2019 às 14:51
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
('admilson', 'adminboladao@gmail.com', '578be958e9ee77dd5a13f02211555d87', 1),
('Babika top', 'Babi.gatinha.eu@gmail.com', '294f7e62379b11cc3d2402de26d2a3d7', 2),
('al', 'al', 'YWw=', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinhos`
--

CREATE TABLE `carrinhos` (
  `carprodu` int(11) NOT NULL,
  `carquant` int(11) NOT NULL,
  `cardata` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `carusuar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinhos`
--

INSERT INTO `carrinhos` (`carprodu`, `carquant`, `cardata`, `carusuar`) VALUES
(106, 5, '2019-12-03 12:46:13', 1),
(106, 1, '2019-12-03 12:50:40', 1),
(106, 1, '2019-12-03 12:59:12', 1),
(106, 1, '2019-12-03 13:00:37', 1),
(107, 1, '2019-12-03 12:50:40', 1),
(107, 1, '2019-12-03 12:52:17', 1),
(108, 1, '2019-12-03 12:50:30', 1),
(108, 3, '2019-12-03 12:50:40', 1),
(108, 1, '2019-12-03 12:52:17', 1),
(109, 1, '2019-12-03 12:46:58', 1),
(109, 1, '2019-12-03 12:47:51', 1),
(109, 1, '2019-12-03 12:47:52', 1),
(110, 1, '2019-12-03 12:46:58', 1),
(110, 1, '2019-12-03 12:47:51', 1),
(110, 1, '2019-12-03 12:47:52', 1),
(110, 1, '2019-12-03 12:48:28', 1),
(110, 1, '2019-12-03 12:49:58', 1),
(110, 1, '2019-12-03 12:57:19', 1),
(110, 1, '2019-12-03 12:59:33', 1),
(111, 1, '2019-12-03 12:46:13', 1),
(111, 1, '2019-12-03 12:48:28', 1),
(111, 1, '2019-12-03 12:50:30', 1),
(112, 1, '2019-12-03 12:45:55', 1),
(112, 1, '2019-12-03 12:46:13', 1),
(112, 1, '2019-12-03 12:49:01', 1),
(112, 1, '2019-12-03 12:49:02', 1),
(112, 1, '2019-12-03 12:49:58', 1),
(112, 1, '2019-12-03 12:50:30', 1),
(112, 1, '2019-12-03 12:51:08', 1),
(112, 1, '2019-12-03 12:57:19', 1),
(114, 1, '2019-12-03 12:45:55', 1),
(114, 1, '2019-12-03 12:51:08', 1),
(114, 1, '2019-12-03 12:51:54', 1),
(114, 1, '2019-12-03 12:52:17', 1),
(114, 1, '2019-12-03 12:58:42', 1);

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
(1, 'cuzao'),
(2, 'saladas'),
(3, 'Massas'),
(6, 'comidinha de mamae');

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
(131, 'alice', 'alice', 'YWxpY2U=', '0.png'),
(132, 'alo', 'alo', 'YWxv', '0.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `pedcodig` int(255) NOT NULL,
  `clicodig` int(255) NOT NULL,
  `procodig` int(255) NOT NULL,
  `pedquant` int(255) NOT NULL,
  `pedtotal` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`pedcodig`, `clicodig`, `procodig`, `pedquant`, `pedtotal`) VALUES
(1, 6, 99, 3, 27),
(2, 6, 99, 1, NULL),
(3, 6, 99, 1, NULL);

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
(98, 'cca cola', 'coca cola', 6, '7.99', 0, '98.jpg'),
(99, 'cocacola', 'coca cola', 6, '9.00', 0, '99.jpg');

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
  MODIFY `admcodig` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `catcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clicodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedcodig` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `procodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
