-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.17-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test_shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_shop.categories: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Стеллажи торговые'),
	(2, 'Торговые стойки'),
	(3, 'Стеллажи складские'),
	(4, 'Хлебные стеллажи'),
	(5, 'Стеллажи для овощей'),
	(6, 'Ноутбуки'),
	(7, 'Смартфоны');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица test_shop.goods
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__categories` (`category_id`),
  CONSTRAINT `FK__categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_shop.goods: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`id`, `category_id`, `name`, `description`, `price`) VALUES
	(6, 1, 'name1', 'desc1', 312),
	(8, 1, 'чек244', 'проверка 14', 21312),
	(9, 1, 'good_name_2', 'desc_2', 34235),
	(10, 2, 'назва', 'ку', 1111),
	(11, 1, 'name1', 'desc1', 88),
	(12, 1, 'Норм название', 'Норм описание', 1337),
	(15, 4, 'check3', 'check descri', 13),
	(16, 1, '4', '4', 4);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
