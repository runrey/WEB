-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2020 г., 19:43
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `a_username` varchar(20) NOT NULL,
  `a_fname` varchar(20) NOT NULL,
  `a_lname` varchar(20) NOT NULL,
  `a_url` text NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`admin_id`, `a_username`, `a_fname`, `a_lname`, `a_url`, `a_email`, `a_pass`) VALUES
(1, 'Admin', 'Ad', 'Min', 'https://avatars.mds.yandex.net/get-pdb/1651533/5167bbda-217e-4097-af53-9458e9b4d806/s1200?webp=false', 'email@mail.ru', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_text` text NOT NULL,
  `n_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `editor_id`, `n_title`, `n_text`, `n_date`) VALUES
(3, 1, 'The battery in the iPhone SE: stunted or cool?', 'More than a year ago, I wrote about the second-generation iPhone SE successor:\r\nThe main thing from that text is as follows: the second-generation iPhone SE will be almost a complete copy of the iPhone 8. From this, it could be concluded that the battery capacity will not change. And this upset me: the iPhone 8 is not the most resilient smartphone in the world. And after the release of the iPhone 11 Pro / ProMax, so in General, these 1821 matches of conditional battery capacity sound like a mockery!\r\nFor me, these numbers were not just numbers. My second smartphone in the days when there is no other device on the market, last summer was the Google Pixel 3.', '2020-06-01'),
(4, 1, 'Halide developers told what\'s cool about the iPhone SE portrait mode', 'The Halide app is one of the most famous third-party soft cameras on iOS. Its developers are studying the source code and all available APIs distributed by Apple.\r\n\r\nThe new iPhone SE is the first smartphone that relies only on artificial intelligence to blur the background when taking portraits.', '2020-06-01'),
(6, 1, 'Googled has released the Pixel Buds 2 TWS headphones for sale. What do they say about them?', 'Without any fuss, Google released the Pixel Buds 2-TWS headphones, shown more than six months ago along with the fourth \"Pixel\". In General there were a few clarifications after my last text:\r\n\r\nGoogle does not provide any other characteristics other than size. And it is, in fact, correct: you will not be given any idea about the sound of these technical characteristics. Generally. Frequency? Pfft! Many smartphones are not initially able to transmit audio at frequencies higher than 15-17 kHz in AAC or aptX.', '2020-06-01'),
(7, 1, 'We understand how to choose a good computer chair', 'As the statistics of search queries show, people began to buy furniture and various items for home comfort more often. Here everything is clear: you will have to stay at home for a long time.\r\n\r\nMany people switched to remote control, although they used to do nothing at home but check their email on their laptop and respond to very important messages in chat rooms. Life has changed a little, let\'s be honest. You need to adapt to changes. We don\'t know how long we\'ll have to forget about the office. Well, if it\'s all over by the fall, but who knows.', '2020-06-01'),
(8, 1, 'All things interesting for week # 41: Travis Scott in Fortnite and the transfer of Marvel movies', 'Collapse of the month, or maybe the year: Travis Scott performed in the game Fortnite\r\nAnd set a new record for the number of simultaneous players — 12.3 million. And the performance lasted only 10 minutes, but with effects and all this! Immediately after the performance, a merch was announced, which looks not so bad, fans of the game will definitely appreciate.\r\nMarvel has announced new release dates for movies. I don\'t think you need to explain the reason for the transfer. Here is a small sign with updated dates, this year we are waiting for only one movie.', '2020-06-01'),
(9, 1, 'Looking for an alternative to the iPhone SE on Android', 'I have nothing against phones with very large screens, but I prefer not the largest devices myself. I don\'t watch a lot of videos on my phone, and for reading, texting, processing photos and other necessary things, the display is enough as in the iPhone X, XS or 11 Pro.\r\n\r\nApple recently revealed the iPhone SE — essentially a redesigned iPhone 8 with a 4.7-inch screen. By modern standards, the display is small, especially since part of the space is consumed by the physical key under the screen. But it has a great filling, the most powerful Apple processor, as in the top iPhone 11 Pro.', '2020-06-01'),
(10, 1, 'What to listen to: AWOLNATION, The Used, IC3PEAK, Moth and 11 more new albums', 'Another week is coming to an end. I decided to change the format by putting more new albums in the selection, but I removed the major reviews of three or four of the most important records. Your reaction to these texts was not there, and their preparation took a lot of time. Now a few suggestions and the album itself. Let\'s go!\r\nAWOLNATION — Angel Miners & the Lightning Riders\r\nA band that fell victim to their own song Sail. With each album, fans of this track try to find something similar in energy, but it doesn\'t work out. Look, she\'s cool even after more than nine years:', '2020-06-01'),
(11, 1, 'Nine books about man in the technological world of...', '«Self-isolation». How much is in this word… Hatred, fatigue, insanity, and other negative moments. To save the brain, various things are used: live broadcasts on Instagram, an infinite number of tweets, cooking, travel nostalgia in photo albums and social networks, TV series, music, and home sports (I fell on the floor to do push-UPS, and woke up there, but eight hours later because of a stiff back from an uncomfortable position for sleeping). One of the ways to distract yourself, in addition to the above, can be books. I decided to put together a selection of books that tell the story of man through the spectrum of technology. Each of the books deals in one way or another with topics that we tell you about every day.', '2020-06-01'),
(13, 1, 'How Apple\'s hardware repair service center survives', 'Specialists are always needed\r\nService is not only spare parts and components, but also people, specialists in repairing equipment. The staff is all right, no one is being fired, no one is being cut, and the salaries are the same. All masters can take up the repair of an iPhone, MacBook or iPad, in times of crisis it is difficult to be a specialist only on phones or tablets.\r\nDevices are disinfected during repairs, all employees are masked — safety and health care above all.', '2020-06-01'),
(14, 1, 'What to choose: iPhone XR or the new iPhone SE?', 'After Apple announced the characteristics and prices of the new iPhone SE, comments immediately flew in the spirit of \"why do you need a SE, when you can buy an iPhone XR for the same money\". This is a good question, let\'s think about it.\r\nWhy is it so expensive\r\nSales of the iPhone XR are breaking records, it is never the cheapest phone, yet it sells better than any other smartphone in the world.\r\nThe smartphone was one and a half years old in April 2020, but it remains relevant, loved and in demand even after the release of the more technological iPhone 11.', '2020-06-01');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(4) NOT NULL,
  `prod_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `isOrdered` tinyint(1) NOT NULL DEFAULT 0,
  `delivery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `prod_id`, `user_id`, `quantity`, `color`, `total_price`, `isOrdered`, `delivery`) VALUES
(25, 3, 3, 22, 'Red', 31680, 1, 0),
(26, 2, 3, 222, 'Classic', 426240, 1, 1),
(27, 1, 3, 2222, 'Coral', 6399360, 1, 1),
(37, 1, 1, 122, 'Classic', 292800, 0, 1),
(38, 1, 1, 2, 'Choco', 5760, 0, 1),
(39, 1, 1, 2, 'Choco', 5760, 0, 1),
(40, 1, 1, 2, 'Classic', 4000, 0, 0),
(41, 1, 1, 222, 'Red', 639360, 0, 1),
(42, 2, 1, 21, 'Red', 48384, 0, 1),
(43, 2, 1, 21, 'Red', 48384, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `prod_id` int(4) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `prod_price` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`) VALUES
(1, '8-wave', 2000.00),
(2, '7-wave', 1600.00),
(3, '6-wave', 1200.00);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `url` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `url`, `email`, `pass`) VALUES
(1, 'SuperUser', 'Edward', 'McGregor', 'https://yt3.ggpht.com/a/AATXAJy4jXnK6zNEaQ-zYVab8oYdAgpcSAjUCnT8_g=s900-c-k-c0xffffffff-no-rj-mo', 'email@mail.ru', 'fb23ceb5b78c68623ec52c801670fe0e'),
(2, 'Reus', 'User', 'User', 'https://68.media.tumblr.com/73f2fa93a82530beffad9faf735b98d8/tumblr_opbal5s8zL1teokn0o2_1280.jpg', 'user@mail.r', 'fb23ceb5b78c68623ec52c801670fe0e'),
(3, 'runrey', 'Yernur', 'Yernur', 'https://maendfrisurer.info/wp-content/uploads/2018/12/Spændende-Cole-Sprouse-frisure-34.png', 'Yernur', 'fb23ceb5b78c68623ec52c801670fe0e'),
(80, 'sFDADSFSAD', 'ASDADS', 'ASDAS', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'ADAS@mail.ru', 'b2ef9c7b10eb0985365f913420ccb84a'),
(81, 'User2', 'Melody', 'Norton', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'mel@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f'),
(82, 'User3', 'Sidney', 'Tucker', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'sidn@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f'),
(83, 'User4', 'Rachel', 'Lucas', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'rach@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f'),
(84, 'User5', 'Vicky', 'Silva', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'vick@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f'),
(85, 'User6', 'Becky', 'Dunn', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'beck@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f'),
(86, 'User7', 'Daisy', 'Gilbert', 'https://i12.fotocdn.net/s121/2728227276296645/public_pin_l/2761262839.jpg', 'daisy@mail.ru', 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `editor_id` (`editor_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`editor_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
