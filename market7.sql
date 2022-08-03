-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 03 2022 г., 13:44
-- Версия сервера: 8.0.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `market7`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Мужское', 'Одежда для мужчин с головы до пят'),
(2, 'Женское', 'Одежда для женщин с головы до пят'),
(3, 'Головные уборы', 'описание головных уборов'),
(4, 'Верхняя одежда', 'описание верхней одежды'),
(5, 'Обувь', 'описание обуви'),
(6, 'Аксессуары', 'описание аксессуаров'),
(7, 'Кроссовки', 'описание Кроссовки'),
(8, 'Рубашки', 'описание Рубашки'),
(9, 'Браслеты', 'описание Браслет');

-- --------------------------------------------------------

--
-- Структура таблицы `category__product`
--

CREATE TABLE `category__product` (
  `category_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category__product`
--

INSERT INTO `category__product` (`category_id`, `product_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 4),
(4, 3),
(4, 5),
(5, 2),
(6, 6),
(6, 7),
(7, 2),
(8, 3),
(8, 5),
(9, 6),
(9, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `customers_question`
--

CREATE TABLE `customers_question` (
  `id` int NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `customers_question`
--

INSERT INTO `customers_question` (`id`, `username`, `email`, `birthday`, `sex`, `theme`, `question`) VALUES
(1, 'Новосибирск', 'kayofi3386@ansomesa.com', '0001-01-01', 'М', 'sdf', 'ds'),
(2, 'Новосибирск', 'kayofi3386@ansomesa.com', '0001-01-01', 'М', 'sdf', 'ds'),
(3, 'выа', 'doyesab8138@wolfpat.com', '0001-01-01', 'Ж', '1', '1'),
(4, 'выа', 'doyesab8138@wolfpat.com', '0001-01-01', 'Ж', '1', '1'),
(5, 'Ива', 'gahed28667@giftcv.com', '2000-10-26', 'М', '123', '1231'),
(6, 'Ива', 'gahed28667@giftcv.com', '2000-10-26', 'М', '123', '1231'),
(7, 'ывфа', 'sjb93691@cuoly.com', '0013-02-02', 'М', 'sad', 'asd'),
(8, 'вы', 'doyesab8138@wolfpat.com', '0001-01-01', 'М', '1', '1'),
(9, 'фваы', 'gahed28667@giftcv.com', '0001-01-01', 'М', '1в', 'alert(123)'),
(10, 'хватит', '1337@gmail.com', '2022-10-11', 'М', 'хватит', 'хватит'),
(11, 'фв', '667@gif.ru', '0111-01-01', 'Ж', '12', '1'),
(12, 'ыфва', '1213@ya.ru', '2020-01-01', 'Ж', '123', '123'),
(13, 'ыфва', '1213@ya.ru', '2020-01-01', 'Ж', '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_image_main_id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `price_old` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_discount` decimal(10,2) NOT NULL,
  `description` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_image_main_id`, `name`, `price_old`, `price`, `price_discount`, `description`, `active`) VALUES
(1, 3, 1, 'Snow Protector', '1200.00', '1100.00', '1050.00', 'Snow Protector описание', 1),
(2, 5, 2, 'Leomax+ tops', '3200.00', '3100.00', '3050.00', 'Leomax+ tops описание', 1),
(3, 4, 3, 'Гавайская', '2200.00', '2100.00', '2050.00', 'Гавайская описание', 1),
(4, 3, 1, 'Snow Protector Man', '1200.00', '1100.00', '1050.00', ' описание', 1),
(5, 4, 4, 'Рубашка Medecine', '2200.00', '2100.00', '2050.00', 'описание Рубашки Medecine', 1),
(6, 6, 5, 'Гвоздь', '82200.00', '71100.00', '60050.00', 'ГВОЗДИ описание', 1),
(7, 6, 6, 'Бугати', '11200.00', '10100.00', '10050.00', 'Бугати описание', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `image` char(30) DEFAULT NULL,
  `alt_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `alt_image`) VALUES
(1, 'urlimg1.png', 'altimg1'),
(2, 'urlimg2.png', 'altimg2'),
(3, 'urlimg3.png', 'altimg3'),
(4, 'urlimg4.png', 'altimg4'),
(5, 'urlimg5.png', 'altimg5'),
(6, 'urlimg6.png', 'altimg6'),
(7, 'urlimg7.png', 'altimg7');

-- --------------------------------------------------------

--
-- Структура таблицы `product__product_image`
--

CREATE TABLE `product__product_image` (
  `product_id` int NOT NULL,
  `product_image_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product__product_image`
--

INSERT INTO `product__product_image` (`product_id`, `product_image_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(4, 7),
(5, 4),
(6, 5),
(7, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category__product`
--
ALTER TABLE `category__product`
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `customers_question`
--
ALTER TABLE `customers_question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_image_main_id` (`product_image_main_id`);

--
-- Индексы таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product__product_image`
--
ALTER TABLE `product__product_image`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_image_id` (`product_image_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `customers_question`
--
ALTER TABLE `customers_question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category__product`
--
ALTER TABLE `category__product`
  ADD CONSTRAINT `category__product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category__product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_image_main_id`) REFERENCES `product_image` (`id`);

--
-- Ограничения внешнего ключа таблицы `product__product_image`
--
ALTER TABLE `product__product_image`
  ADD CONSTRAINT `product__product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product__product_image_ibfk_2` FOREIGN KEY (`product_image_id`) REFERENCES `product_image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
