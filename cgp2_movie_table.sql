-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 6 月 30 日 03:21
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `cgp2_movie_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cgp2_movie_table`
--

CREATE TABLE `cgp2_movie_table` (
  `id` int(12) NOT NULL,
  `onlineMovieUrl` varchar(64) NOT NULL,
  `title` text NOT NULL,
  `industryCategory1` varchar(64) DEFAULT NULL,
  `industryCategory2` varchar(64) DEFAULT NULL,
  `industryText` varchar(128) DEFAULT NULL,
  `campaignGoal` text DEFAULT NULL,
  `targetType` text DEFAULT NULL,
  `appeal` text DEFAULT NULL,
  `storyTelling1` text DEFAULT NULL,
  `storyTelling2` text DEFAULT NULL,
  `shootingTech` text DEFAULT NULL,
  `editingTech` text DEFAULT NULL,
  `onomatopeLight` text DEFAULT NULL,
  `onomatopeWind` text DEFAULT NULL,
  `onomatopeWater` text DEFAULT NULL,
  `onomatopeSound` text DEFAULT NULL,
  `onomatopeMind` text DEFAULT NULL,
  `onomatopeCondition` text DEFAULT NULL,
  `onomatopeIntuition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `cgp2_movie_table`
--

INSERT INTO `cgp2_movie_table` (`id`, `onlineMovieUrl`, `title`, `industryCategory1`, `industryCategory2`, `industryText`, `campaignGoal`, `targetType`, `appeal`, `storyTelling1`, `storyTelling2`, `shootingTech`, `editingTech`, `onomatopeLight`, `onomatopeWind`, `onomatopeWater`, `onomatopeSound`, `onomatopeMind`, `onomatopeCondition`, `onomatopeIntuition`) VALUES
(76, 'https://www.youtube.com/watch?v=NK6axRUm6yU', '全国都道府県及び20指定都市 LOTO7 話は変わる篇 第五話', 'ギャンブル', '宝くじ/LOTO', 'LOTO7', '認知向上/価値観醸成', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'https://www.youtube.com/watch?v=SVzDfrkmnws', '全国都道府県及び20指定都市 LOTO7　話は変わる篇 第六話', 'ギャンブル', '宝くじ/LOTO', 'LOTO7', '認知向上/価値観醸成', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'https://www.youtube.com/watch?v=RKHVFZAZv4g', 'リクルート　すべての人生が、すばらしい', '金融/保険', 'その他', 'リクルートポイント', '認知向上/価値観醸成', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'https://www.youtube.com/watch?v=NAU83cA9ZHo&t=34s', 'トヨタ　ハリアー　H.H  side A', '自動車/交通', '車両単体', 'トヨタ', '認知向上/価値観醸成', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'https://www.youtube.com/watch?v=KP3WW3W935I&t', 'トヨタ　ハリアー H.H  side B', '自動車/交通', '車両単体', 'トヨタ', '認知向上/価値観醸成', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'https://www.youtube.com/watch?v=7pC0YSdnss4', 'ホンダ Sound of Honda Ayrton Senna 1989', '自動車/交通', '自動車メーカー', 'ホンダ', 'エンゲージメント/関与', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `cgp2_movie_table`
--
ALTER TABLE `cgp2_movie_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `cgp2_movie_table`
--
ALTER TABLE `cgp2_movie_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
