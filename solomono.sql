-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Жов 10 2022 р., 17:27
-- Версія сервера: 10.4.21-MariaDB
-- Версія PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `solomono`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Laptops'),
(2, 'Smartphones'),
(3, 'TV'),
(4, 'PC'),
(5, 'Tablets');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `category_id`, `created_at`) VALUES
(3, 'Apple MacBook Pro', '3031.00', 1, '2022-10-03 11:00:54'),
(4, 'Lenovo Yoga 3 Pro', '1339.47', 1, '2022-10-03 11:00:54'),
(5, 'Sony Vaio Flip 15', '1074.00', 1, '2022-10-03 11:02:07'),
(6, 'Acer Nitro 5 Shale Black', '1000.00', 1, '2022-10-03 11:02:07'),
(7, 'Xiaomi Mi Pad 64Gb Wi-Fi', '178.00', 5, '2022-10-03 11:03:07'),
(8, 'Lenovo Tab3 7 Essential 710F Wi-Fi 8Gb', '85.00', 5, '2022-10-03 11:03:07'),
(9, 'Xiaomi Redmi 4A', '119.00', 2, '2022-10-03 11:04:21'),
(10, 'Apple iPhone 8 Plus', '1171.70', 2, '2022-10-03 11:04:21'),
(11, 'Meizu Pro 7 Plus', '145.00', 2, '2022-10-03 11:05:00'),
(12, 'Samsung Galaxy S8 Plus', '925.00', 2, '2022-10-03 11:05:00'),
(13, 'Samsung UE65JS9000TXUA', '3750.00', 3, '2022-10-03 11:07:25'),
(14, 'Sony KDL43WD752SR2', '685.00', 3, '2022-10-03 11:07:25'),
(15, 'Xiaomi Mi TV3 60', '1000.00', 3, '2022-10-03 11:08:19'),
(16, 'LG OLED65E6V', '6855.00', 3, '2022-10-03 11:08:19'),
(17, 'HP Compaq 6300 SFF i5-3470/8GB/128SSD/500HDD', '1100.00', 4, '2022-10-03 11:10:20'),
(18, 'A10 5800K 4-ядра/RAM 8GB/SSD 128', '959.00', 4, '2022-10-03 11:10:20');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
