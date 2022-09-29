-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.20-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla teco_clientes.clientes: ~5 rows (aproximadamente)
INSERT INTO `clientes` (`idcliente`, `dni`, `nombre`, `apellido`, `fk_idgenero`, `telefono`) VALUES
	(24, '36630478', 'Luciana Soledad', 'Ghio', 2, '1149270395'),
	(26, '31729647', 'Juan Ignacio', 'Mc Kenna', 1, '01150571913'),
	(27, '12345678', 'Mariano', 'Perez', 1, '3055923972'),
	(31, '32951753', 'Francesca', 'Fernandez', 2, '1194768532');

-- Volcando datos para la tabla teco_clientes.generos: ~2 rows (aproximadamente)
INSERT INTO `generos` (`idgenero`, `tipo`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
