-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql07-farm88.kinghost.net
-- Tempo de geração: 12/01/2023 às 18:31
-- Versão do servidor: 10.6.11-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `senhafacil`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL,
  `collector_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_last_updated` timestamp NULL DEFAULT NULL,
  `date_of_expiration` timestamp NULL DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_method_id` varchar(255) DEFAULT NULL,
  `status_detail` varchar(255) DEFAULT NULL,
  `transaction_amount` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `collector_id`, `status`, `id_cliente`, `date_approved`, `date_created`, `date_last_updated`, `date_of_expiration`, `description`, `payment_id`, `payment_method_id`, `status_detail`, `transaction_amount`) VALUES
(1, '1143232977', 'approved', 2, '2022-06-22 21:55:38', '2022-06-22 18:55:37', '2022-06-22 22:06:51', NULL, 'Plano Um', '23394501759', 'master', 'refunded', 75),
(2, '1143232977', 'approved', 2, '2022-06-22 21:55:38', '2022-06-22 18:55:37', '2022-06-22 22:06:51', NULL, 'Plano Um', '23394501759', 'master', 'refunded', 75),
(4, '1240828911', 'refunded', 1, '2022-11-16 22:52:11', '2022-11-16 19:52:10', '2022-11-16 22:54:12', NULL, 'Plano Tres', '51592844432', 'master', 'refunded', 20),
(5, '1240828911', 'refunded', 1, '2022-11-16 22:55:17', '2022-11-16 19:55:17', '2022-11-16 22:57:19', NULL, 'Plano Tres', '51592933072', 'master', 'refunded', 20),
(6, '1240828911', 'refunded', 1, '2022-11-16 23:04:58', '2022-11-16 20:04:57', '2022-11-16 23:06:59', NULL, 'Plano Um', '51593280755', 'master', 'refunded', 75),
(7, '1240828911', 'refunded', 1, '2022-11-16 23:05:56', '2022-11-16 20:05:55', '2022-11-16 23:11:48', NULL, 'Plano Dois', '51593332404', 'master', 'refunded', 50),
(8, '1240828911', 'refunded', 1, '2022-11-16 23:06:37', '2022-11-16 20:06:36', '2022-11-16 23:08:38', NULL, 'Plano Tres', '51593357251', 'master', 'refunded', 20),
(9, '1240828911', 'approved', 1, '2022-11-21 15:57:08', '2022-11-21 12:57:09', '2022-11-21 15:57:09', NULL, 'Plano Tres', '51744708786', 'master', 'accredited', 20),
(10, '1240828911', 'approved', 1, '2022-11-28 10:06:32', '2022-11-28 07:06:33', '2022-11-28 10:06:33', NULL, 'Plano Tres', '51967099675', 'master', 'accredited', 20),
(11, '1240828911', 'approved', 1, '2022-11-29 20:52:28', '2022-11-29 17:52:29', '2022-11-29 20:52:29', NULL, 'Plano Um', '52021216982', 'master', 'accredited', 75),
(12, '1240828911', 'approved', 1, '2022-11-29 20:54:34', '2022-11-29 17:54:34', '2022-11-29 20:54:34', NULL, 'Plano Dois', '52021310753', 'master', 'accredited', 50),
(13, '1240828911', 'approved', 1, '2022-11-29 20:56:54', '2022-11-29 17:56:55', '2022-11-29 20:56:55', NULL, 'Plano Um', '52021414421', 'visa', 'accredited', 75);

-- --------------------------------------------------------

--
-- Estrutura para tabela `senhas`
--

CREATE TABLE IF NOT EXISTS `senhas` (
  `id` int(11) NOT NULL,
  `nome_senha` varchar(44) NOT NULL,
  `sits_senha_id` int(11) NOT NULL,
  `tipos_senha_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `senhas`
--

INSERT INTO `senhas` (`id`, `nome_senha`, `sits_senha_id`, `tipos_senha_id`, `id_usuario`) VALUES
(1, 'A1', 3, 1, 2),
(2, 'A2', 3, 1, 2),
(3, 'A3', 4, 1, 2),
(4, 'A4', 4, 1, 2),
(5, 'A5', 4, 1, 2),
(6, 'A6', 4, 1, 2),
(7, 'A7', 4, 1, 2),
(8, 'A8', 4, 1, 2),
(9, 'A9', 4, 1, 2),
(10, 'A10', 4, 1, 2),
(11, 'A11', 4, 1, 2),
(12, 'A12', 4, 1, 2),
(13, 'A13', 4, 1, 2),
(14, 'A14', 4, 1, 2),
(15, 'A15', 4, 1, 2),
(16, 'A16', 4, 1, 2),
(17, 'A17', 4, 1, 2),
(18, 'A18', 4, 1, 2),
(19, 'A19', 4, 1, 2),
(20, 'A20', 4, 1, 2),
(21, 'M1', 4, 2, 2),
(22, 'M2', 4, 2, 2),
(23, 'M3', 4, 2, 2),
(24, 'M4', 4, 2, 2),
(25, 'M5', 4, 2, 2),
(26, 'M6', 4, 2, 2),
(27, 'M7', 4, 2, 2),
(28, 'M8', 4, 2, 2),
(29, 'M9', 4, 2, 2),
(30, 'M10', 4, 2, 2),
(31, 'M11', 4, 2, 2),
(32, 'M12', 4, 2, 2),
(33, 'M13', 4, 2, 2),
(34, 'M14', 4, 2, 2),
(35, 'M15', 4, 2, 2),
(36, 'M16', 4, 2, 2),
(37, 'M17', 4, 2, 2),
(38, 'M18', 4, 2, 2),
(39, 'M19', 4, 2, 2),
(40, 'M20', 4, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `senhas_geradas`
--

CREATE TABLE IF NOT EXISTS `senhas_geradas` (
  `id` int(11) NOT NULL,
  `senha_id` int(11) NOT NULL,
  `sits_senha_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `caixa` int(11) DEFAULT NULL,
  `fila` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `senhas_geradas`
--

INSERT INTO `senhas_geradas` (`id`, `senha_id`, `sits_senha_id`, `id_usuario`, `caixa`, `fila`, `created`, `modified`) VALUES
(1, 1, 4, 3, 1, 1, '2022-11-29 10:49:00', NULL),
(2, 2, 4, 12, NULL, 1, '2022-11-29 10:55:14', NULL),
(3, 1, 4, 12, 1, 1, '2022-11-29 10:55:58', '2022-11-29 10:56:03'),
(4, 2, 4, 12, 1, 1, '2022-11-29 10:56:59', '2022-11-29 10:57:04'),
(5, 3, 4, 6, 1, 1, '2022-11-29 10:58:06', NULL),
(6, 1, 4, 12, 2, 1, '2022-11-29 12:42:19', '2022-11-29 12:42:57'),
(7, 2, 4, 12, 2, 1, '2022-11-29 12:43:17', '2022-11-29 12:43:19'),
(8, 3, 4, 10, 1, 1, '2022-11-29 12:52:00', NULL),
(9, 1, 4, 10, 1, 1, '2022-11-29 12:53:02', NULL),
(10, 1, 4, 10, 2, 1, '2022-11-29 12:53:59', NULL),
(11, 1, 4, 6, 1, 1, '2022-11-29 14:27:53', '2022-11-29 14:28:06'),
(12, 2, 4, 10, 1, 1, '2022-11-29 15:56:14', '2022-11-29 15:57:22'),
(13, 3, 4, 9, 1, 1, '2022-11-29 15:56:27', '2022-11-29 15:57:26'),
(14, 1, 4, 6, 1, 1, '2022-11-29 18:18:12', '2022-11-29 18:18:18'),
(15, 1, 4, 6, 1, 1, '2022-11-29 18:55:30', '2022-11-29 18:55:39'),
(16, 2, 4, 9, 1, 1, '2022-11-29 18:55:32', '2022-11-29 18:55:40'),
(17, 1, 4, 10, 1, 1, '2022-11-29 19:11:36', '2022-11-29 19:13:03'),
(18, 2, 4, 6, 1, 1, '2022-11-29 19:11:42', '2022-11-29 19:13:29'),
(19, 1, 3, 6, 2, 1, '2022-11-29 19:14:25', '2022-11-29 19:14:35'),
(20, 2, 3, 10, 2, 1, '2022-11-29 19:14:27', '2022-11-29 19:14:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sits_senhas`
--

CREATE TABLE IF NOT EXISTS `sits_senhas` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `sits_senhas`
--

INSERT INTO `sits_senhas` (`id`, `nome`) VALUES
(1, 'Livre'),
(2, 'Emitida'),
(3, 'Chamada'),
(4, 'Atendida'),
(5, 'Cancelada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos_senhas`
--

CREATE TABLE IF NOT EXISTS `tipos_senhas` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tipos_senhas`
--

INSERT INTO `tipos_senhas` (`id`, `nome`) VALUES
(1, 'Senha Convencional'),
(2, 'Senha Preferencial');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT 'NULL',
  `setor` int(1) NOT NULL DEFAULT 1,
  `plano` int(11) NOT NULL DEFAULT 0,
  `caixa` int(11) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL DEFAULT '+55'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `email`, `nome`, `usuario`, `password`, `recuperar_senha`, `setor`, `plano`, `caixa`, `telefone`) VALUES
(1, 'guiche01@senhafacil.com', 'Guiche 01', 'Guiche 01', '123', 'NULL', 0, 1, 1, ''),
(2, 'guiche02@senhafacil.com', 'Guiche 02', 'Guiche 02', '123', 'NULL', 0, 0, 2, ''),
(3, '', 'Adriana GonÃ§alves Carneiro', '', '', 'NULL', 1, 0, NULL, '(45) 99963-4080'),
(4, '', 'ELIETE KAMECO HOKAMA', '', '', 'NULL', 1, 0, NULL, '(11) 98193-7780'),
(5, '', 'Anderson Ritter', '', '', 'NULL', 1, 0, NULL, '(45) 99143-5017'),
(6, '', 'Mikael ', 'Mikael', '', 'NULL', 1, 0, NULL, '(45) 99154-0729'),
(7, 'admin@senhafacil.com', 'adm', 'adm', '123', 'NULL', 2, 0, NULL, ''),
(8, '', 'Fernando Luis Incerti', '', '', 'NULL', 1, 0, NULL, '(45) 99911-3888'),
(9, '', 'Maikel Benini', '', '', 'NULL', 1, 0, NULL, '(45) 99141-2941'),
(10, '', 'Jean', '', '', 'NULL', 1, 0, NULL, '(45) 98428-6010'),
(11, '', 'Solange schifelbein', '', '', 'NULL', 1, 0, NULL, '(18) 99600-7712'),
(12, '', 'Clarindo jeronimo pinto', '', '', 'NULL', 1, 0, NULL, '(11) 96978-2040'),
(13, '', 'geisa rosana pelegrini leonanjo', '', '', 'NULL', 1, 0, NULL, '(16) 98131-9585'),
(14, '', 'Eliana Silmara Mambelli da Silva', '', '', 'NULL', 1, 0, NULL, '(19) 97422-3439');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices de tabela `senhas`
--
ALTER TABLE `senhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `senhas_geradas`
--
ALTER TABLE `senhas_geradas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sits_senhas`
--
ALTER TABLE `sits_senhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipos_senhas`
--
ALTER TABLE `tipos_senhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `senhas`
--
ALTER TABLE `senhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de tabela `senhas_geradas`
--
ALTER TABLE `senhas_geradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `sits_senhas`
--
ALTER TABLE `sits_senhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `tipos_senhas`
--
ALTER TABLE `tipos_senhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
