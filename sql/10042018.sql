-- --------------------------------------------------------
-- Host:                         localhost
-- Server Version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Datenbank Struktur für test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Exportiere Struktur von Tabelle test.produkte
CREATE TABLE IF NOT EXISTS `produkte` (
  `ProduktID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Produktbezeichnung` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Produktpreis` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ProduktID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.produkte: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `produkte` DISABLE KEYS */;
INSERT INTO `produkte` (`ProduktID`, `Produktbezeichnung`, `Produktpreis`) VALUES
	(50, 'Lampe', 19.99),
	(52, 'Stein', 3.00),
	(70, 'GlÃ¼hbirne', 3.90),
	(71, 'Tisch', 250.00),
	(72, 'Stuhl', 45.00),
	(74, 'Bilderrahmen', 16.00),
	(75, 'Vorhang', 29.90);
/*!40000 ALTER TABLE `produkte` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle test.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hash` varchar(32) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle test.users: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`) VALUES
	(1, 'test', 'test', 'h.haida@t-online.de', '$2y$10$ij5F/NEQgDYiftfqoJp91emWmIU06flxHVxZzrRbD/zuRs1i2cjF2', '428fca9bc1921c25c5121f9da7815cde', 1),
	(3, 'Herb', 'Haida', 'haida.herbert@gmail.com', '$2y$10$Z4m83mQcLB.Ie81u2FiCcO01hU4At9zvoaNJqSxoBmPQJ4c5Czllm', '432aca3a1e345e339f35a30c8f65edce', 0),
	(6, 'test2', 'test2', 'info@haida-mediadesign.de', '$2y$10$KvUPTOJuKvaytRTvlDxBZuZ4zjr760qA9Q/f171inJa3VxhZ1BGmW', 'e00da03b685a0dd18fb6a08af0923de0', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
