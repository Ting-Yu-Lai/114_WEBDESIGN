-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-08-01 10:31:01
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '桃太郎大戰老妖婆', 4, 90, '2025-08-01', '桃太郎大戰老妖婆的發行商', '桃太郎大戰老妖婆的導演', '03B25v.mp4', '03B25.png', '桃太郎大戰老妖婆桃太郎大戰老妖婆桃太郎大戰老妖婆桃太郎大戰老妖婆', 1, 1),
(2, '院線片02', 1, 90, '2025-08-01', '院線片02的發行商', '院線片02的導演', '03B02v.mp4', '03B02.png', '院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介', 1, 2),
(3, '院線片03', 2, 90, '2025-08-01', '院線片03的發行商', '院線片03的導演', '03B03v.mp4', '03B03.png', '院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介', 1, 3),
(4, '院線片04', 3, 90, '2025-08-01', '院線片04的發行商', '院線片04的導演', '03B04v.mp4', '03B04.png', '院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介', 1, 4),
(5, '院線片05', 4, 90, '2025-08-01', '院線片05的發行商', '院線片05的導演', '03B05v.mp4', '03B05.png', '院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介', 1, 5),
(6, '院線片06', 1, 90, '2025-07-23', '院線片06的發行商', '院線片06的導演', '03B06v.mp4', '03B06.png', '院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介', 1, 6),
(7, '院線片07', 2, 90, '2025-07-24', '院線片07的發行商', '院線片07的導演', '03B07v.mp4', '03B07.png', '院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介', 1, 7),
(8, '院線片08', 3, 90, '2025-07-25', '院線片08的發行商', '院線片08的導演', '03B08v.mp4', '03B08.png', '院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介', 1, 8),
(9, '院線片09', 4, 90, '2025-07-26', '院線片09的發行商', '院線片09的導演', '03B09v.mp4', '03B09.png', '院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介', 1, 9),
(10, '院線片10', 1, 90, '2025-07-23', '院線片10的發行商', '院線片10的導演', '03B10v.mp4', '03B10.png', '院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介', 1, 10),
(11, '院線片11', 2, 90, '2025-07-24', '院線片11的發行商', '院線片11的導演', '03B11v.mp4', '03B11.png', '院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介', 1, 11);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `tickets` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL,
  `no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '鬼滅之刃-無限城篇', '03A01.jpg', 1, 1, 1),
(3, '預告片03', '03A03.jpg', 1, 3, 2),
(4, '預告片02', '03A02.jpg', 1, 4, 1),
(5, '預告片04', '03A04.jpg', 1, 5, 3),
(6, '預告片05', '03A05.jpg', 1, 7, 2),
(7, '預告片06', '03A06.jpg', 1, 6, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
