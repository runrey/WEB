-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 07 2020 г., 16:21
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sitedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `price`) VALUES
(1, 'IELTS++', 'Prep for listening reading and academic writing', 20000),
(2, 'SAT++', 'SAT Math, Bio, Chem, Critical thinking, Physics, Reasoning', 30000);

-- --------------------------------------------------------

--
-- Структура таблицы `course_content`
--

CREATE TABLE `course_content` (
  `cc_course_id` int(10) NOT NULL,
  `cc_subtitle` varchar(100) NOT NULL,
  `cc_text` varchar(5000) NOT NULL,
  `cc_video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course_content`
--

INSERT INTO `course_content` (`cc_course_id`, `cc_subtitle`, `cc_text`, `cc_video`) VALUES
(1, 'Reading', 'Reading is the second part of the IELTS test, and takes 60 minutes. It consists of three or sometimes four reading passages of increasing difficulty, and there is a total of 40 questions to answer. Though you can mark and write on the Question Paper, you must enter your answers on the Reading Answer Sheet, and be aware that no extra time is given for transferring your answers from the test booklet to the Reading Answer Sheet.', 'movie.mp4'),
(1, 'Listening', 'IELTS consists of IELTS Listeningfour parts; the first one is called IELTS Listening. This section of the exam takes only 30 minutes, but sometimes it is the most difficult part of the test for many candidates. In order to earn a good score in this part you should clearly understand the specifics of the test and follow the technique assignments.', 'movie.mp4'),
(1, 'Writing', 'The IELTS Writing modules test your ability to produce two quite different pieces of writing in a fairly short period of time. Before applying to sit the test, you need to decide whether to take the Academic or the General Training module. Each module is divided into two parts and you have only one hour to complete both pieces of writing', 'movie.mp4'),
(2, 'SAT Math', 'For SAT Math prep, no matter your strategy—whether you\'re doing self-study, taking a prep class, or working with a tutor—you need to be working with real SAT Math practice materials. The SAT Math test will be different from any other math test you\'ve taken. You need to work with the real material to get used to the pacing and style of this unique test.', 'movie.mp4'),
(2, 'SAT Reasoning', 'The SAT Reasoning Test is a long examination (three hours and forty-five minutes) and has three main divisions:', 'movie.mp4');

-- --------------------------------------------------------

--
-- Структура таблицы `enter_logs`
--

CREATE TABLE `enter_logs` (
  `log_id` int(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `enter_logs`
--

INSERT INTO `enter_logs` (`log_id`, `user_id`, `date_time`) VALUES
(1, 1, '2020-03-23 01:45:31'),
(2, 1, '2020-03-23 16:26:27'),
(3, 1, '2020-03-23 20:35:28'),
(4, 2, '2020-03-24 07:26:30'),
(5, 2, '2020-03-24 07:27:10'),
(6, 2, '2020-03-24 07:28:21'),
(7, 1, '2020-03-24 08:00:37'),
(8, 2, '2020-03-24 14:52:31'),
(9, 2, '2020-03-24 15:00:49'),
(10, 1, '2020-03-24 15:01:14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `phone`, `email`, `password`) VALUES
(1, 'Super', 'User', '87715484502', 'ernurbolatkanov@yandex.ru', 'e31305a3b632df3dea6674ffecdc3d4c'),
(2, 'Super', 'User', '87715484502', 'ernur.bolatkanov@yandex.ru', '934a9a544d3560ca89c94408f650aa6d');

-- --------------------------------------------------------

--
-- Структура таблицы `user_courses`
--

CREATE TABLE `user_courses` (
  `uc_user_id` int(10) NOT NULL,
  `uc_course_id` int(10) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `period` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_courses`
--

INSERT INTO `user_courses` (`uc_user_id`, `uc_course_id`, `card_number`, `cvv`, `period`) VALUES
(1, 2, '1234123412341234', '123', '05/22'),
(1, 1, '1234123412341234', '123', '03/22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Индексы таблицы `course_content`
--
ALTER TABLE `course_content`
  ADD KEY `cc_course_id` (`cc_course_id`);

--
-- Индексы таблицы `enter_logs`
--
ALTER TABLE `enter_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_courses`
--
ALTER TABLE `user_courses`
  ADD KEY `user_id` (`uc_user_id`),
  ADD KEY `course_id` (`uc_course_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `enter_logs`
--
ALTER TABLE `enter_logs`
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`cc_course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `enter_logs`
--
ALTER TABLE `enter_logs`
  ADD CONSTRAINT `enter_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`uc_course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`uc_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
