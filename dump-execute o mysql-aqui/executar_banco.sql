-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.22-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para estoque_laravel
CREATE DATABASE IF NOT EXISTS `estoque_laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `estoque_laravel`;

-- Copiando estrutura para tabela estoque_laravel.back_produtos
CREATE TABLE IF NOT EXISTS `back_produtos` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `valor` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_laravel.back_produtos: 3 rows
/*!40000 ALTER TABLE `back_produtos` DISABLE KEYS */;
INSERT INTO `back_produtos` (`ID`, `nome`, `valor`, `descricao`, `quantidade`) VALUES
	(1, 'Geladeira', '5900.00', 'Side by Side com gelo na porta', 2),
	(2, 'FogÃ£o', '950.00', 'Painel automÃ¡tico e forno elÃ©trico', 5),
	(3, 'Microondas', '1520.00', 'Manda SMS quando termina de esquentar', 1);
/*!40000 ALTER TABLE `back_produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque_laravel.migrations: 4 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2018_10_28_220110_create_produtos_table', 2),
	('2018_11_04_170120_create_produtos_novo', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque_laravel.password_resets: 1 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('uilan.souza@uol.com.br', '0f5d3a19b419161073f9d2f469d4d19d51916fc1e8e742ef5bea9cf001783646', '2018-11-25 17:49:37');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_laravel.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque_laravel.produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `quantidade`, `created_at`, `updated_at`) VALUES
	(13, 'Liquidificador', 35.27, 'usado para triturar frutas', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'Controle de Xbox One', 150.00, 'para Xbox One', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque_laravel.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(8, 'Uilan Souza', 'uilan.souza@gmail.com', '$2y$10$.nzAaNO57ibO0QM9fabNjufz0hzJZMfJ7rLJCjL2xwrGhtdKjVCAS', 'JVuWWpeIM2H6xxeybhozn2u1YgTK9jQfTsAtJ3Knh0gEt3tbvDbpZef3Lekg', '2018-11-25 00:43:55', '2018-11-25 00:58:15'),
	(9, 'Uilan', 'uilan.souza@uol.com.br', '$2y$10$YCPS6m1RPuR1bMLaEL372OsF8fsge5xyT0IC/21Tj.d/caxcKHOxG', 'TwYA48P4YEoXwxFl0K4L4O5rWuaKVYlMqYlXLXrgLvJAkeqHkFzmd8fhvfpq', '2018-11-25 01:41:06', '2018-11-25 01:42:25'),
	(10, 'Pedro', 'pedro@uol.com.br', '$2y$10$y6Hv.jsP1DpKoTu9RX3o6eyyK0TvWhG0S/TI4IKY38Ob.u.YiLqSa', 'CjdQHWPWy2WN4vQuHV9LcXAlULGXAgrg6HhvWHIenlxhPraK3Gjk3rHPn1kp', '2018-12-14 14:33:42', '2018-12-14 14:35:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
