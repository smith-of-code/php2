-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 27 2019 г., 15:00
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product_id`) VALUES
(278, 'lpcvqn7h555tger6os2uodkf96ltejac', 112),
(279, 'lpcvqn7h555tger6os2uodkf96ltejac', 112),
(280, 'lpcvqn7h555tger6os2uodkf96ltejac', 3),
(281, 'lpcvqn7h555tger6os2uodkf96ltejac', 2),
(282, 'lpcvqn7h555tger6os2uodkf96ltejac', 113),
(283, 'ca6bluvdlddhcb1defj11mq5o1iqfu7v', 2),
(285, 'no11uvhumcuk5ih3a1cpcralu6h29jpo', 112),
(286, 'no11uvhumcuk5ih3a1cpcralu6h29jpo', 3),
(287, '1tojniuab2vgknl0vnkmhbd8abaoibbn', 2),
(288, '1tojniuab2vgknl0vnkmhbd8abaoibbn', 2),
(289, 'm6crikehtsjsi4ib45nifuelcat8aqjs', 2),
(290, 'm6crikehtsjsi4ib45nifuelcat8aqjs', 2),
(291, 'afg6p3ft8j2iijo1hiv13chcbc43sb61', 2),
(292, '8s1m1q7p7n37vs6m7n9nejkkstmilsea', 2),
(293, 'u78pllov01tr16293a0u3bmj8rajg04r', 2),
(294, '406uv4apn0h4cgprbhnkiorl2b0kkmov', 2),
(295, 'bi4pqcj9c1kbc9979i03ad0ite2pbc24', 2),
(296, '020n66f7q0n8761gkjmcc2ob3vnr9ugn', 2),
(299, 'dkp9nkdu27s1c9mev3qv46nqldrgntv6', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent`) VALUES
(1, 'главная', '/', 0),
(2, 'каталог', '/catalog', 0),
(3, 'галлерея', '/gallery', 0),
(4, 'Сабменю1', '#', 0),
(5, 'главная', '/', 4),
(6, 'каталог', '/catalog', 4),
(7, 'сабменю2', '#', 4),
(8, 'главная', '/', 7),
(9, 'каталог', '/catalog', 7),
(10, 'Калькулятор', '/calculator', 0),
(11, 'Корзина', '/cart', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `name`, `status`, `phone`) VALUES
(53, 'lpcvqn7h555tger6os2uodkf96ltejac', 'Василий', 'cancel', '+795568522666'),
(54, 'no11uvhumcuk5ih3a1cpcralu6h29jpo', 'Андрей', 'approved', '545454434343'),
(55, '1tojniuab2vgknl0vnkmhbd8abaoibbn', 'Андрей', 'approved', '33333333333333'),
(56, 'm6crikehtsjsi4ib45nifuelcat8aqjs', 'Андрей', 'disapproved', '33333333333333'),
(57, 'afg6p3ft8j2iijo1hiv13chcbc43sb61', 'ffffffffff', 'disapproved', '44444444444444'),
(58, '8s1m1q7p7n37vs6m7n9nejkkstmilsea', 'Андрей', 'disapproved', '33333333333'),
(59, 'u78pllov01tr16293a0u3bmj8rajg04r', 'fffffffffffff', 'disapproved', '3333333333333333333'),
(60, '406uv4apn0h4cgprbhnkiorl2b0kkmov', 'Андрей', 'disapproved', '33333333333333'),
(61, 'bi4pqcj9c1kbc9979i03ad0ite2pbc24', 'Андрей', 'disapproved', '4444444444'),
(62, '020n66f7q0n8761gkjmcc2ob3vnr9ugn', 'ffffffffffffffff', 'disapproved', '444444444444444');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `short_desc`, `full_desc`, `image`, `category`, `price`) VALUES
(2, 'Ноутбук', ' переносной персональный компьютер', 'К ноутбукам обычно относят лэптопы (часто употребляется «лаптоп»), выполненные в раскладном форм-факторе. Ноутбук переносят в сложенном виде, это позволяет защитить экран, клавиатуру и тачпад при транспортировке. Также это связано с удобством транспортировки (чаще всего ноутбук транспортируется в портфеле, что позволяет не держать его в руках, а повесить на плечо).', 'notebook.jpg', 'электроника', 1400),
(3, 'кошка', 'домашнее животное, одно из наиболее популярных', 'С точки зрения научной систематики, домашняя кошка — млекопитающее семейства кошачьих отряда хищных. Ранее домашнюю кошку нередко рассматривали как отдельный биологический вид. С точки зрения современной биологической систематики домашняя кошка (Felis silvestris catus) является подвидом лесной кошки', 'cat.jpg', 'животные', 3000),
(112, 'боты', 'lorem lorem', 'loremloremloremloremloremloremlorem', 'boots.jpg', 'одежда', 100),
(113, 'кепка', 'lorem lorem', 'loremloremloremloremloremloremlorem', 'head.jpg', 'одежда', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$epnTaveZrF2nyyd0ePk4tOwHOlJC48JtBA1HoYs7BXC8MEzzOEcTW', '7991257705dde642cb9bc88.53334377'),
(2, 'user', '$2y$10$epnTaveZrF2nyyd0ePk4tOwHOlJC48JtBA1HoYs7BXC8MEzzOEcTW', '8027518085dde64ebe34ca9.59171498');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
