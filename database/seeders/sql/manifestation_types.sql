-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/04/2024 às 17:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ouvidoria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `manifestation_types`
--

CREATE TABLE `manifestation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `manifestation_types`
--

INSERT INTO `manifestation_types` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'DENÚNCIA (PROBIDADE EMPRESARIAL)', '2024-04-01 14:33:20', '2024-04-01 14:33:20'),
(2, '2', 'DENÚNCIA (ASSÉDIO OU VIOLÊNCIA CONTRA MULHERES)', '2024-04-01 14:33:31', '2024-04-01 14:33:31'),
(3, '3', 'ELOGIO, RECLAMAÇÃO OU SUGESTÃO', '2024-04-01 14:33:35', '2024-04-01 14:33:35'),
(4, '4', 'REQUISIÇÃO (LGPD – PROTEÇÃO DE DADOS)', '2024-04-01 14:33:44', '2024-04-05 15:55:44');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `manifestation_types`
--
ALTER TABLE `manifestation_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `manifestation_types`
--
ALTER TABLE `manifestation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
