-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Dez-2019 às 22:12
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
('alice', 'alice', 'YWxpY2U=', 5);

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
(2, 'saladas'),
(3, 'Massas'),
(6, 'comidinha de mamae'),
(7, 'refrigerantes');

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
(133, 'alo', 'alo', 'YWxv', '0.png');

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
(64, '2019-12-10 19:19:41.767254', 131, 1, 2, 20),
(65, '2019-12-10 19:19:41.773235', 131, 2, 2, 44),
(66, '2019-12-17 17:01:43.156195', 133, 1, 2, 20),
(67, '2019-12-17 17:01:43.165310', 133, 2, 4, 88),
(68, '2019-12-17 17:03:46.272406', 133, 1, 4, 40),
(69, '2019-12-17 17:03:46.280421', 133, 2, 4, 88),
(70, '2019-12-17 17:10:19.844956', 134, 1, 4, 40),
(71, '2019-12-17 17:10:19.852316', 134, 2, 4, 88),
(72, '2019-12-17 17:10:19.864281', 134, 101, 3, 18);

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
(1, 'coca', 'coca cola', 2, '10.00', 20, '1.jpg'),
(2, 'pizza', 'sadia', 3, '22.00', 10, '2.jpg'),
(101, 'sprite', 'coca cola', 7, '6.00', 0, '101.jpg'),
(102, 'coquinha', 'coca cola', 7, '2.00', 0, '102.jpg'),
(103, 'coca lata', 'coca cola', 7, '3.00', 0, '103.jpg');

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
  MODIFY `catcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clicodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedcodig` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `procodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
