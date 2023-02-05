-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 14 Ara 2022, 17:36:00
-- Sunucu sürümü: 10.3.37-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `synltnxd_root`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `forUser` varchar(50) DEFAULT NULL,
  `entityID` int(11) DEFAULT NULL,
  `read` tinyint(1) DEFAULT 0,
  `time` datetime DEFAULT current_timestamp(),
  `text` varchar(500) DEFAULT NULL,
  `author` varchar(500) DEFAULT NULL,
  `warning` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `notification`
--

INSERT INTO `notification` (`notificationID`, `type`, `forUser`, `entityID`, `read`, `time`, `text`, `author`, `warning`) VALUES
(539, 'comment', 'seyfo', 149337, 0, '2022-10-18 13:05:35', 'HesabÄ±nÄ±za 176.234.130.253 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(559, 'comment', 'panteon', 219296, 0, '2022-10-21 18:08:33', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(560, 'comment', 'panteon', 227092, 0, '2022-10-21 19:19:18', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(561, 'comment', 'panteon', 233736, 0, '2022-10-21 19:30:45', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(565, 'comment', 'panteon', 105023, 0, '2022-10-21 20:48:42', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(566, 'comment', 'panteon', 187196, 0, '2022-10-21 22:46:19', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(574, 'comment', 'panteon', 123204, 0, '2022-10-22 14:31:52', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(580, 'comment', 'percius', 226700, 0, '2022-10-22 15:43:47', 'Botunuzun sÃ¼resinin bitmesine son 1 saat kalmÄ±ÅŸtÄ±r.', 'Synl.io', 'primary'),
(582, 'comment', 'percius', 149695, 0, '2022-10-22 15:47:17', 'Sistem Ã¼zerinden Percius isimli botunuza +1 gÃ¼n sÃ¼re eklenmiÅŸtir.', 'Synl.io', 'success'),
(584, 'comment', 'panteon', 172954, 0, '2022-10-22 17:19:10', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(585, 'comment', 'panteon', 84548, 0, '2022-10-22 17:22:28', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(587, 'comment', 'panteon', 224661, 0, '2022-10-22 20:35:42', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(588, 'comment', 'panteon', 108184, 0, '2022-10-22 21:32:39', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(589, 'comment', 'panteon', 222991, 0, '2022-10-22 22:40:59', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(590, 'comment', 'panteon', 216467, 0, '2022-10-22 22:41:03', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(591, 'comment', 'panteon', 154488, 0, '2022-10-22 23:24:34', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(592, 'comment', 'panteon', 121245, 0, '2022-10-23 03:21:03', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(593, 'comment', 'panteon', 209543, 0, '2022-10-23 03:48:52', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(594, 'comment', 'panteon', 93899, 0, '2022-10-23 10:44:03', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(595, 'comment', 'panteon', 151046, 0, '2022-10-23 12:25:30', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(596, 'comment', 'panteon', 42526, 0, '2022-10-23 19:23:41', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(597, 'comment', 'panteon', 97256, 0, '2022-10-23 20:19:36', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(598, 'comment', 'panteon', 176987, 0, '2022-10-23 23:33:50', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(601, 'comment', 'panteon', 100592, 0, '2022-10-24 11:11:46', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(603, 'comment', 'panteon', 183027, 0, '2022-10-24 19:01:11', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(604, 'comment', 'panteon', 111467, 0, '2022-10-24 19:01:42', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(605, 'comment', 'panteon', 177683, 0, '2022-10-24 19:25:21', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(607, 'comment', 'panteon', 95398, 0, '2022-10-24 22:24:00', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(610, 'comment', 'panteon', 37310, 0, '2022-10-25 13:06:24', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(611, 'comment', 'panteon', 213335, 0, '2022-10-25 14:43:27', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(612, 'comment', 'panteon', 159046, 0, '2022-10-25 19:01:56', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(613, 'comment', 'panteon', 200235, 0, '2022-10-25 20:09:56', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(614, 'comment', 'panteon', 230321, 0, '2022-10-25 22:14:22', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(615, 'comment', 'panteon', 14748, 0, '2022-10-25 23:06:42', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(616, 'comment', 'panteon', 213041, 0, '2022-10-26 00:33:36', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(617, 'comment', 'panteon', 95615, 0, '2022-10-26 03:03:43', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(618, 'comment', 'panteon', 94805, 0, '2022-10-26 03:15:48', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(619, 'comment', 'panteon', 125442, 0, '2022-10-26 03:32:53', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(620, 'comment', 'panteon', 182618, 0, '2022-10-26 04:23:57', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(621, 'comment', 'panteon', 142822, 0, '2022-10-26 10:18:38', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(622, 'comment', 'panteon', 186775, 0, '2022-10-26 12:07:24', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(623, 'comment', 'panteon', 188790, 0, '2022-10-26 12:18:06', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(627, 'comment', 'panteon', 108496, 0, '2022-10-26 15:06:10', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(645, 'comment', 'panteon', 178344, 0, '2022-10-26 19:04:21', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(647, 'comment', 'panteon', 104196, 0, '2022-10-26 19:58:23', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(648, 'comment', 'panteon', 51771, 0, '2022-10-26 21:28:00', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(649, 'comment', 'panteon', 45167, 0, '2022-10-26 21:45:34', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(650, 'comment', 'panteon', 143943, 0, '2022-10-26 21:58:15', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(651, 'comment', 'panteon', 173269, 0, '2022-10-26 22:22:36', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(655, 'comment', 'deniz', 97317, 0, '2022-10-26 22:43:28', 'HesabÄ±nÄ±za 176.233.98.39 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(656, 'comment', 'panteon', 55067, 0, '2022-10-27 00:10:29', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(657, 'comment', 'panteon', 123033, 0, '2022-10-27 02:37:00', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(658, 'comment', 'panteon', 203839, 0, '2022-10-27 08:24:21', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(659, 'comment', 'panteon', 179405, 0, '2022-10-27 09:10:45', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(660, 'comment', 'panteon', 38144, 0, '2022-10-27 09:31:48', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(661, 'comment', 'panteon', 225675, 0, '2022-10-27 10:58:24', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(662, 'comment', 'panteon', 171673, 0, '2022-10-27 11:50:17', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(663, 'comment', 'panteon', 183793, 0, '2022-10-27 15:22:13', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(664, 'comment', 'panteon', 114815, 0, '2022-10-27 18:13:18', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(667, 'comment', 'panteon', 103388, 0, '2022-10-27 20:39:05', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(669, 'comment', 'panteon', 50215, 0, '2022-10-27 23:58:09', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(679, 'comment', '', 0, 0, '2022-10-28 04:40:06', 'HesabÄ±nÄ±zÄ±n parolasÄ± deÄŸiÅŸtirildi.', 'Sistemsel', 'warning'),
(680, 'comment', '', 99291, 0, '2022-10-28 04:40:50', 'HesabÄ±nÄ±zÄ±n parolasÄ± deÄŸiÅŸtirildi.', 'Sistemsel', 'warning'),
(683, 'comment', 'panteon', 7828, 0, '2022-10-28 07:47:01', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(684, 'comment', 'panteon', 31686, 0, '2022-10-28 10:34:17', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(685, 'comment', 'panteon', 76115, 0, '2022-10-28 11:16:39', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(689, 'comment', 'panteon', 165355, 0, '2022-10-28 20:05:56', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(690, 'comment', 'deniz', 84384, 0, '2022-10-28 20:06:36', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(691, 'comment', 'deniz', 117729, 0, '2022-10-28 20:07:07', 'HesabÄ±nÄ±zÄ±n parolasÄ± deÄŸiÅŸtirildi.', 'Sistemsel', 'warning'),
(692, 'comment', 'deniz', 74993, 0, '2022-10-28 20:07:20', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(694, 'comment', 'panteon', 132814, 0, '2022-10-28 21:58:04', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(695, 'comment', 'panteon', 34261, 0, '2022-10-28 23:46:20', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(696, 'comment', 'panteon', 179915, 0, '2022-10-29 01:29:26', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(698, 'comment', 'panteon', 111126, 0, '2022-10-29 11:32:34', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(700, 'comment', 'panteon', 221583, 0, '2022-10-29 15:00:29', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(720, 'comment', 'deniz', 115712, 0, '2022-10-29 18:05:44', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(721, 'comment', 'deniz', 6500, 0, '2022-10-29 18:06:07', 'HesabÄ±nÄ±zÄ±n profil resmi kaldÄ±rÄ±ldÄ±.', 'Sistemsel', 'success'),
(722, 'comment', 'deniz', 184450, 0, '2022-10-29 18:06:16', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(723, 'comment', 'panteon', 5929, 0, '2022-10-29 19:16:16', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(725, 'comment', 'panteon', 178505, 0, '2022-10-29 21:49:31', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(729, 'comment', 'panteon', 82450, 0, '2022-10-30 02:05:44', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(730, 'comment', 'panteon', 102073, 0, '2022-10-30 07:07:07', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(731, 'comment', 'panteon', 44421, 0, '2022-10-30 08:10:21', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(732, 'comment', 'panteon', 93150, 0, '2022-10-30 08:35:36', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(733, 'comment', 'panteon', 104615, 0, '2022-10-30 08:59:57', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(735, 'comment', 'panteon', 86797, 0, '2022-10-30 10:38:19', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(736, 'comment', 'panteon', 220314, 0, '2022-10-30 11:25:23', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(737, 'comment', 'panteon', 176411, 0, '2022-10-30 12:11:34', 'HesabÄ±nÄ±za 78.180.38.106 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(742, 'comment', 'panteon', 110994, 0, '2022-10-30 14:37:59', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(743, 'comment', 'panteon', 198032, 0, '2022-10-30 15:44:18', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(744, 'comment', 'panteon', 160476, 0, '2022-10-30 16:04:05', 'HesabÄ±nÄ±za 37.130.79.214 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(745, 'comment', 'panteon', 45738, 0, '2022-10-30 16:11:07', 'HesabÄ±nÄ±za 217.131.108.159 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(748, 'comment', 'percius', 37905, 0, '2022-10-30 16:18:11', 'HesabÄ±nÄ±za 217.131.108.159 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(753, 'comment', 'deniz', 57255, 0, '2022-10-30 19:07:50', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(766, 'comment', 'deniz', 177726, 0, '2022-10-31 20:43:28', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(792, 'comment', 'deniz', 199881, 0, '2022-11-01 19:49:29', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(798, 'comment', 'deniz', 42413, 0, '2022-11-03 20:14:08', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(807, 'comment', 'burak000', 46043, 0, '2022-11-05 04:03:32', 'Merhaba! Burak Owner Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(809, 'comment', 'blackn1', 22460, 0, '2022-11-05 04:05:31', 'Merhaba! Devran KaraÃ§ay Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(825, 'comment', 'deniz', 61380, 0, '2022-11-05 19:48:11', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(826, 'comment', 'deniz', 115522, 0, '2022-11-05 21:23:03', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(827, 'comment', 'deniz', 199653, 0, '2022-11-05 22:07:27', 'HesabÄ±nÄ±za 217.131.118.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(828, 'comment', 'equant', 34350, 0, '2022-11-05 22:09:23', 'Merhaba! Equant Eren Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(829, 'comment', 'deniz', 196200, 0, '2022-11-05 22:10:40', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(831, 'comment', 'deniz', 151776, 0, '2022-11-05 22:25:51', 'HesabÄ±nÄ±za 217.131.118.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(832, 'comment', 'equant', 139936, 0, '2022-11-05 23:23:27', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(833, 'comment', 'equant', 77240, 0, '2022-11-05 23:23:54', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(834, 'comment', 'equant', 37273, 0, '2022-11-05 23:24:09', 'HesabÄ±nÄ±za 31.200.18.79 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(835, 'comment', 'equant', 145885, 0, '2022-11-05 23:25:03', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(837, 'comment', 'blackn1', 48323, 0, '2022-11-06 00:23:48', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(840, 'comment', 'equant', 16141, 0, '2022-11-06 10:08:08', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(842, 'comment', 'equant', 237132, 0, '2022-11-06 17:08:31', 'HesabÄ±nÄ±za 217.131.118.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(843, 'comment', 'equant', 199585, 0, '2022-11-06 17:09:50', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(845, 'comment', 'equant', 66121, 0, '2022-11-06 17:18:59', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(846, 'comment', 'equant', 129682, 0, '2022-11-06 18:23:02', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(848, 'comment', 'equant', 140047, 0, '2022-11-06 20:52:16', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(849, 'comment', 'blackn1', 50892, 0, '2022-11-06 21:04:01', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(852, 'comment', 'nightclub', 111573, 0, '2022-11-07 02:59:01', 'HesabÄ±nÄ±za 217.131.118.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(853, 'comment', 'nightclub', 113253, 0, '2022-11-07 03:02:07', 'HesabÄ±nÄ±za 185.135.108.164 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(855, 'comment', 'blackn1', 73832, 0, '2022-11-07 04:59:34', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(856, 'comment', 'equant', 132758, 0, '2022-11-07 08:03:07', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(857, 'comment', 'equant', 152604, 0, '2022-11-07 15:01:56', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(858, 'comment', 'deniz', 152929, 0, '2022-11-07 15:42:35', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(860, 'comment', 'deniz', 14181, 0, '2022-11-07 16:05:00', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(861, 'comment', 'equant', 50480, 0, '2022-11-07 16:33:29', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(862, 'comment', 'equant', 64534, 0, '2022-11-07 16:33:54', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(863, 'comment', 'equant', 146854, 0, '2022-11-07 16:42:26', 'HesabÄ±nÄ±za 94.123.230.166 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(865, 'comment', 'equant', 158149, 0, '2022-11-07 19:45:00', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(866, 'comment', 'blackn1', 29176, 0, '2022-11-07 20:15:41', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(872, 'comment', 'blackn1', 163188, 0, '2022-11-07 21:19:57', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(873, 'comment', 'blackn1', 91016, 0, '2022-11-07 21:30:41', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(879, 'comment', 'deniz', 150756, 0, '2022-11-08 17:12:33', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(891, 'comment', 'Kaczynski', 230199, 0, '2022-11-08 22:16:08', 'HesabÄ±nÄ±za 23.227.141.45 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(892, 'comment', 'Kaczynski', 68570, 0, '2022-11-08 22:18:41', 'HesabÄ±nÄ±za 23.227.140.190 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(893, 'comment', 'Kaczynski', 229400, 0, '2022-11-08 22:19:58', 'HesabÄ±nÄ±za 185.165.242.137 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(894, 'comment', 'Kaczynski', 151099, 0, '2022-11-08 22:23:59', 'HesabÄ±nÄ±za 195.142.69.145 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(895, 'comment', 'Kaczynski', 187602, 0, '2022-11-08 22:27:35', 'HesabÄ±nÄ±za 23.227.140.190 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(896, 'comment', 'Kaczynski', 202140, 0, '2022-11-08 22:29:55', 'HesabÄ±nÄ±za 195.142.69.145 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(898, 'comment', 'Kaczynski', 223453, 0, '2022-11-08 22:30:58', 'HesabÄ±nÄ±za 192.119.10.206 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(899, 'comment', 'Kaczynski', 216674, 0, '2022-11-09 00:26:38', 'HesabÄ±nÄ±za 185.209.179.163 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(900, 'comment', 'Kaczynski', 6185, 0, '2022-11-09 00:29:23', 'HesabÄ±nÄ±za 185.209.179.169 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(902, 'comment', 'equant', 161456, 0, '2022-11-09 13:18:54', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(903, 'comment', 'equant', 22025, 0, '2022-11-09 13:19:15', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(904, 'comment', 'equant', 61023, 0, '2022-11-09 15:04:37', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(906, 'comment', 'Kaczynski', 54248, 0, '2022-11-10 03:19:59', 'HesabÄ±nÄ±za 185.209.179.240 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(908, 'comment', 'deniz', 40154, 0, '2022-11-10 18:14:11', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(911, 'comment', 'Kaczynski', 177626, 0, '2022-11-10 21:35:18', 'HesabÄ±nÄ±za 209.205.197.131 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(912, 'comment', 'Kaczynski', 165280, 0, '2022-11-10 21:37:33', 'HesabÄ±nÄ±za 195.142.70.140 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(913, 'comment', 'Kaczynski', 133837, 0, '2022-11-10 21:38:11', 'HesabÄ±nÄ±za 23.227.141.157 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(916, 'comment', 'blackn1', 41047, 0, '2022-11-11 00:40:30', 'HesabÄ±nÄ±za 176.43.109.184 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(917, 'comment', 'deniz', 174886, 0, '2022-11-11 14:48:55', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(918, 'comment', 'deniz', 28164, 0, '2022-11-11 14:51:00', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(919, 'comment', 'equant', 90028, 0, '2022-11-11 14:55:06', 'HesabÄ±nÄ±za 78.180.7.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(931, 'comment', 'equant', 52214, 0, '2022-11-11 17:13:09', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(940, 'comment', 'Kaczynski', 145076, 0, '2022-11-11 17:58:26', 'HesabÄ±nÄ±za 23.227.142.229 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(941, 'comment', 'Kaczynski', 214806, 0, '2022-11-11 17:58:57', 'HesabÄ±nÄ±za 23.227.142.229 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(942, 'comment', 'Kaczynski', 72794, 0, '2022-11-11 17:59:25', 'HesabÄ±nÄ±za 23.227.142.229 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(944, 'comment', 'Kaczynski', 235554, 0, '2022-11-11 17:59:57', 'HesabÄ±nÄ±za 195.142.70.140 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(945, 'comment', 'equant', 164037, 0, '2022-11-11 19:04:20', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(950, 'comment', 'equant', 139635, 0, '2022-11-11 22:13:01', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(952, 'comment', 'deniz', 114020, 0, '2022-11-11 22:28:21', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(958, 'comment', 'equant', 73153, 0, '2022-11-12 18:16:45', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(960, 'comment', 'deniz', 138849, 0, '2022-11-13 09:17:02', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(961, 'comment', 'equant', 151802, 0, '2022-11-13 20:28:37', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(967, 'comment', 'equant', 165656, 0, '2022-11-14 17:25:52', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(970, 'comment', 'leumonse1979', 15724, 0, '2022-11-15 02:49:39', 'Merhaba! GÃ¶ktuÄŸ Victoria Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(971, 'comment', 'leumonse1979', 201562, 0, '2022-11-15 02:50:45', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(972, 'comment', 'leumonse1979', 105073, 0, '2022-11-15 02:51:49', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(976, 'comment', 'leumonse1979', 6508, 0, '2022-11-15 05:18:51', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(977, 'comment', 'leumonse1979', 22906, 0, '2022-11-15 06:37:53', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(978, 'comment', 'deniz', 76082, 0, '2022-11-15 08:43:50', 'HesabÄ±nÄ±za 176.41.255.1 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(979, 'comment', 'leumonse1979', 139249, 0, '2022-11-15 15:11:58', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(982, 'comment', 'leumonse1979', 35104, 0, '2022-11-15 17:21:51', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(983, 'comment', 'chavo', 113696, 0, '2022-11-15 17:34:23', 'Merhaba! Tayyip TaÅŸkÄ±n Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(984, 'comment', 'equant', 76831, 0, '2022-11-15 17:51:38', 'HesabÄ±nÄ±za 94.123.234.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(985, 'comment', 'deniz', 86486, 0, '2022-11-15 17:53:57', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(986, 'comment', 'leumonse1979', 141374, 0, '2022-11-15 18:35:39', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(987, 'comment', 'deniz', 85899, 0, '2022-11-15 19:26:55', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(988, 'comment', 'chavo', 222985, 0, '2022-11-15 20:36:18', 'HesabÄ±nÄ±za 78.190.129.126 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(990, 'comment', 'leumonse1979', 221104, 0, '2022-11-15 23:24:25', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(991, 'comment', 'leumonse1979', 222754, 0, '2022-11-16 03:00:04', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(992, 'comment', 'leumonse1979', 147572, 0, '2022-11-16 14:13:12', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(993, 'comment', 'deniz', 127988, 0, '2022-11-16 16:46:52', 'HesabÄ±nÄ±za 82.222.212.13 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(995, 'comment', 'leumonse1979', 6214, 0, '2022-11-17 03:14:05', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(998, 'comment', 'leumonse1979', 185443, 0, '2022-11-17 14:24:26', 'HesabÄ±nÄ±za 20.8.122.174 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(999, 'comment', 'leumonse1979', 162727, 0, '2022-11-17 14:28:08', 'HesabÄ±nÄ±za 20.8.122.174 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1001, 'comment', 'leumonse1979', 48864, 0, '2022-11-17 16:28:53', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1005, 'comment', 'equant', 208067, 0, '2022-11-18 07:51:08', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1006, 'comment', 'equant', 30239, 0, '2022-11-18 15:36:52', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1008, 'comment', 'leumonse1979', 124635, 0, '2022-11-19 07:46:36', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1009, 'comment', 'leumonse1979', 125731, 0, '2022-11-19 09:17:52', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1010, 'comment', 'equant', 76008, 0, '2022-11-19 14:45:27', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1012, 'comment', 'jigsaw', 53766, 0, '2022-11-19 20:59:30', 'HesabÄ±nÄ±za 78.169.202.118 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1014, 'comment', 'leumonse1979', 115171, 0, '2022-11-19 23:14:16', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1018, 'comment', 'leumonse1979', 218342, 0, '2022-11-20 03:10:40', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1020, 'comment', 'leumonse1979', 204541, 0, '2022-11-20 04:06:42', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1022, 'comment', 'leumonse1979', 208326, 0, '2022-11-20 05:02:17', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1023, 'comment', 'leumonse1979', 72235, 0, '2022-11-20 05:02:53', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1024, 'comment', 'leumonse1979', 143418, 0, '2022-11-20 05:03:11', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1025, 'comment', 'equant', 125644, 0, '2022-11-20 14:55:28', 'HesabÄ±nÄ±za 78.174.111.29 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1026, 'comment', 'equant', 198666, 0, '2022-11-20 16:59:12', 'HesabÄ±nÄ±za 78.174.111.29 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1027, 'comment', 'leumonse1979', 59883, 0, '2022-11-20 17:56:42', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1028, 'comment', 'equant', 14117, 0, '2022-11-20 20:10:13', 'HesabÄ±nÄ±za 78.174.111.29 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1030, 'comment', 'leumonse1979', 62184, 0, '2022-11-20 23:42:07', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1031, 'comment', 'deniz', 102270, 0, '2022-11-21 06:30:41', 'HesabÄ±nÄ±za 176.232.173.11 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1032, 'comment', 'equant', 188392, 0, '2022-11-21 16:32:45', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1033, 'comment', 'equant', 100975, 0, '2022-11-21 16:33:30', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1034, 'comment', 'equant', 5388, 0, '2022-11-21 16:35:17', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1035, 'comment', 'equant', 27785, 0, '2022-11-21 16:36:21', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1036, 'comment', 'equant', 199203, 0, '2022-11-21 16:37:53', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1037, 'comment', 'equant', 95262, 0, '2022-11-21 16:38:05', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1038, 'comment', 'equant', 158729, 0, '2022-11-21 16:38:14', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1039, 'comment', 'equant', 72149, 0, '2022-11-21 16:38:23', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1040, 'comment', 'equant', 180260, 0, '2022-11-21 16:38:30', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1041, 'comment', 'equant', 131737, 0, '2022-11-21 16:38:59', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1042, 'comment', 'equant', 74732, 0, '2022-11-21 16:39:04', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1043, 'comment', 'equant', 60481, 0, '2022-11-21 16:39:08', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1044, 'comment', 'equant', 223263, 0, '2022-11-21 16:39:11', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1045, 'comment', 'equant', 120603, 0, '2022-11-21 16:39:34', 'HesabÄ±nÄ±zÄ±n parolasÄ± deÄŸiÅŸtirildi.', 'Sistemsel', 'warning'),
(1046, 'comment', 'equant', 65312, 0, '2022-11-21 16:39:50', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1047, 'comment', 'equant', 72905, 0, '2022-11-21 16:45:34', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1048, 'comment', 'equant', 82369, 0, '2022-11-21 17:05:29', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1049, 'comment', 'equant', 189376, 0, '2022-11-21 17:05:34', 'HesabÄ±nÄ±zÄ±n profil resmi deÄŸiÅŸtirildi.', 'Sistemsel', 'success'),
(1052, 'comment', 'equant', 59153, 0, '2022-11-22 19:19:24', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1053, 'comment', 'leumonse1979', 160085, 0, '2022-11-22 21:00:02', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1055, 'comment', 'localhost', 131032, 0, '2022-11-22 23:28:38', 'Merhaba! Polemik Sunucusu Synl.io Web Panele KatÄ±ldÄ±ÄŸÄ±nÄ±z Ä°Ã§in TeÅŸekkÃ¼rler.', 'Synl.io', 'success'),
(1056, 'comment', 'localhost', 105234, 0, '2022-11-22 23:31:04', 'HesabÄ±nÄ±za 78.182.137.41 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1057, 'comment', 'localhost', 127055, 0, '2022-11-22 23:31:15', 'HesabÄ±nÄ±za 217.131.96.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1059, 'comment', 'localhost', 98438, 0, '2022-11-23 16:53:30', 'HesabÄ±nÄ±za 5.27.39.45 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1060, 'comment', 'localhost', 64198, 0, '2022-11-23 16:57:24', 'Sunucunuzdan gÃ¼nÃ¼n fotoÄŸrafÄ± kanalÄ± oluÅŸturuldu.', 'Sistemsel', 'danger'),
(1061, 'comment', 'deniz', 106573, 0, '2022-11-23 17:42:17', 'HesabÄ±nÄ±za 176.232.173.244 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1062, 'comment', 'deniz', 233441, 0, '2022-11-23 17:53:16', 'HesabÄ±nÄ±za 217.131.96.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1063, 'comment', 'deniz', 58593, 0, '2022-11-23 17:53:38', 'Ã–demeniz 850 â‚º olarak gerÃ§ekleÅŸti.', 'Sistemsel', 'success'),
(1068, 'comment', 'leumonse1979', 93877, 0, '2022-11-24 07:14:01', 'HesabÄ±nÄ±za 85.103.108.95 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1069, 'comment', 'leumonse1979', 105705, 0, '2022-11-24 10:01:15', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1074, 'comment', 'leumonse1979', 131381, 0, '2022-11-24 19:33:17', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1091, 'comment', 'leumonse1979', 162723, 0, '2022-11-25 07:04:17', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1093, 'comment', 'deniz', 150098, 0, '2022-11-25 19:00:50', 'HesabÄ±nÄ±za 176.42.43.244 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1097, 'comment', 'leumonse1979', 75507, 0, '2022-11-25 22:45:35', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1100, 'comment', 'equant', 108286, 0, '2022-11-26 15:48:36', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1101, 'comment', 'leumonse1979', 89114, 0, '2022-11-26 20:16:56', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1103, 'comment', 'leumonse1979', 19595, 0, '2022-11-26 21:06:15', 'HesabÄ±nÄ±za 85.103.109.218 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1109, 'comment', 'chavo', 143534, 0, '2022-11-26 21:59:13', 'HesabÄ±nÄ±za 78.190.137.186 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1115, 'comment', 'localhost', 95770, 0, '2022-11-27 18:32:15', 'HesabÄ±nÄ±za 78.182.137.41 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1116, 'comment', 'localhost', 22135, 0, '2022-11-27 18:34:36', 'Sunucunuzdan B O O S T E R rolÃ¼ gÃ¼ncellendi.', 'Sistemsel', 'danger'),
(1118, 'comment', 'localhost', 231085, 0, '2022-11-28 05:24:20', 'HesabÄ±nÄ±za 217.131.96.248 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1119, 'comment', 'leumonse1979', 214632, 0, '2022-11-28 11:44:21', 'HesabÄ±nÄ±za 81.214.162.203 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1120, 'comment', 'leumonse1979', 216575, 0, '2022-11-28 12:02:23', 'HesabÄ±nÄ±za 81.214.162.203 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1121, 'comment', 'leumonse1979', 104020, 0, '2022-11-28 13:58:40', 'HesabÄ±nÄ±za 81.214.162.203 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1122, 'comment', 'leumonse1979', 214053, 0, '2022-11-28 14:15:55', 'Sunucunuzdan DoÄŸum GÃ¼nÃ¼n Kutlu Olsun EYMEN rolÃ¼ gÃ¼ncellendi.', 'Sistemsel', 'danger'),
(1123, 'comment', 'leumonse1979', 194069, 0, '2022-11-28 14:18:48', 'HesabÄ±nÄ±za 81.214.162.203 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1124, 'comment', 'equant', 24996, 0, '2022-11-28 16:09:53', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1125, 'comment', 'deniz', 11822, 0, '2022-11-28 16:09:55', 'HesabÄ±nÄ±za 82.222.213.153 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1128, 'comment', 'equant', 97563, 0, '2022-11-28 19:23:38', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1129, 'comment', 'leumonse1979', 163143, 0, '2022-11-28 21:27:34', 'HesabÄ±nÄ±za 81.214.160.36 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1130, 'comment', 'equant', 129326, 0, '2022-11-28 22:35:18', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1131, 'comment', 'equant', 39745, 0, '2022-11-28 22:45:50', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1132, 'comment', 'localhost', 34305, 0, '2022-11-28 23:52:51', 'HesabÄ±nÄ±za 78.182.137.41 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1133, 'comment', 'equant', 57248, 0, '2022-11-29 00:30:40', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1134, 'comment', 'equant', 99791, 0, '2022-11-29 02:46:49', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1135, 'comment', 'deniz', 137652, 0, '2022-11-29 06:27:25', 'HesabÄ±nÄ±za 82.222.213.153 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1136, 'comment', 'equant', 193626, 0, '2022-11-29 16:10:05', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1138, 'comment', 'equant', 138586, 0, '2022-11-29 19:41:02', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1140, 'comment', 'deniz', 15897, 0, '2022-11-29 19:58:44', 'HesabÄ±nÄ±za 82.222.213.153 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1141, 'comment', 'leumonse1979', 227819, 0, '2022-11-29 21:17:47', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1142, 'comment', 'equant', 123731, 0, '2022-11-29 22:09:31', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1148, 'comment', 'leumonse1979', 57541, 0, '2022-11-30 06:25:25', 'HesabÄ±nÄ±za 217.131.96.176 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1149, 'comment', 'leumonse1979', 164054, 0, '2022-11-30 06:30:19', 'HesabÄ±nÄ±za 217.131.96.176 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1151, 'comment', 'deniz', 110167, 0, '2022-11-30 16:07:37', 'HesabÄ±nÄ±za 82.222.213.153 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1152, 'comment', 'equant', 94799, 0, '2022-11-30 16:07:43', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1153, 'comment', 'leumonse1979', 157637, 0, '2022-11-30 16:23:53', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1154, 'comment', 'equant', 126540, 0, '2022-11-30 17:11:05', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1155, 'comment', 'deniz', 51393, 0, '2022-11-30 18:24:52', 'HesabÄ±nÄ±za 82.222.213.153 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1156, 'comment', 'equant', 4456, 0, '2022-12-01 02:10:18', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1157, 'comment', 'leumonse1979', 223926, 0, '2022-12-01 06:04:01', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1160, 'comment', 'localhost', 199059, 0, '2022-12-01 23:04:38', 'HesabÄ±nÄ±za 88.224.168.30 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1161, 'comment', 'localhost', 54544, 0, '2022-12-01 23:05:14', 'HesabÄ±nÄ±za 217.131.96.176 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1162, 'comment', 'leumonse1979', 66120, 0, '2022-12-02 00:17:34', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1163, 'comment', 'equant', 164315, 0, '2022-12-02 00:29:03', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1164, 'comment', 'equant', 44004, 0, '2022-12-02 06:50:47', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1175, 'comment', 'leumonse1979', 137684, 0, '2022-12-02 22:20:11', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1183, 'comment', 'localhost', 131902, 0, '2022-12-03 11:55:58', 'HesabÄ±nÄ±za 88.228.41.17 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1186, 'comment', 'leumonse1979', 173740, 0, '2022-12-03 18:51:57', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1198, 'comment', 'leumonse1979', 233308, 0, '2022-12-04 08:14:21', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1199, 'comment', 'leumonse1979', 178462, 0, '2022-12-04 08:17:16', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1200, 'comment', 'leumonse1979', 167692, 0, '2022-12-04 08:40:02', 'HesabÄ±nÄ±za 91.109.27.173 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1201, 'comment', 'leumonse1979', 192399, 0, '2022-12-04 08:40:16', 'HesabÄ±nÄ±za 91.109.27.173 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1204, 'comment', 'leumonse1979', 124220, 0, '2022-12-04 11:30:55', 'HesabÄ±nÄ±za 217.131.96.176 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1205, 'comment', 'leumonse1979', 105999, 0, '2022-12-04 11:31:17', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1206, 'comment', 'leumonse1979', 28166, 0, '2022-12-04 11:32:06', 'Sunucuda leu âœ¦#1979 kullanÄ±cÄ±sÄ±na FoundÃ©r. rolÃ¼ verildi.', 'Sistemsel', 'info'),
(1207, 'comment', 'leumonse1979', 87121, 0, '2022-12-04 12:37:36', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1208, 'comment', 'leumonse1979', 4787, 0, '2022-12-04 13:28:26', 'HesabÄ±nÄ±za 85.103.110.114 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1211, 'comment', 'deniz', 228458, 0, '2022-12-04 16:15:14', 'HesabÄ±nÄ±za 154.28.188.202 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1212, 'comment', 'equant', 155485, 0, '2022-12-04 16:17:39', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1214, 'comment', 'equant', 181499, 0, '2022-12-04 23:21:23', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1218, 'comment', 'deniz', 134660, 0, '2022-12-05 06:27:55', 'HesabÄ±nÄ±za 82.222.211.175 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1222, 'comment', 'leumonse1979', 172334, 0, '2022-12-05 11:53:53', 'HesabÄ±nÄ±za 81.214.160.223 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1223, 'comment', 'equant', 13944, 0, '2022-12-05 12:29:37', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1224, 'comment', 'localhost', 52497, 0, '2022-12-05 12:31:19', 'HesabÄ±nÄ±za 5.27.33.123 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1236, 'comment', 'equant', 201667, 0, '2022-12-05 13:45:42', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1237, 'comment', 'equant', 170906, 0, '2022-12-05 14:54:38', 'HesabÄ±nÄ±za 94.123.226.183 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1248, 'comment', 'leumonse1979', 44084, 0, '2022-12-06 11:38:04', 'HesabÄ±nÄ±za 81.214.160.223 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1249, 'comment', 'localhost', 202634, 0, '2022-12-06 11:59:59', 'HesabÄ±nÄ±za 5.27.44.208 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1257, 'comment', 'deniz', 83533, 0, '2022-12-06 15:36:33', 'HesabÄ±nÄ±za 176.232.175.121 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1273, 'comment', 'leumonse1979', 158184, 0, '2022-12-10 13:39:42', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1274, 'comment', 'localhost', 46155, 0, '2022-12-10 17:18:52', 'HesabÄ±nÄ±za 88.228.41.17 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning');
INSERT INTO `notification` (`notificationID`, `type`, `forUser`, `entityID`, `read`, `time`, `text`, `author`, `warning`) VALUES
(1275, 'comment', 'keops', 137501, 0, '2022-12-11 01:53:42', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1276, 'comment', 'keops', 126057, 0, '2022-12-11 01:59:47', 'Botun tÃ¼m kurulum verileri temizlendi.', 'Sistemsel', 'success'),
(1277, 'comment', 'keops', 173414, 0, '2022-12-11 01:59:55', 'Keops yedeÄŸi baÅŸarÄ±yla bota kuruldu.', 'Sistemsel', 'success'),
(1281, 'comment', 'leumonse1979', 58565, 0, '2022-12-12 08:12:22', 'HesabÄ±nÄ±za 95.7.166.223 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1282, 'comment', 'leumonse1979', 139162, 0, '2022-12-12 08:25:07', 'HesabÄ±nÄ±za 95.7.166.223 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1283, 'comment', 'keops', 163512, 0, '2022-12-12 15:27:22', 'HesabÄ±nÄ±za 95.7.139.60 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1284, 'comment', 'acar', 216925, 0, '2022-12-12 18:11:35', 'HesabÄ±nÄ±za 139.28.177.234 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1285, 'comment', 'acar', 46378, 0, '2022-12-12 19:08:41', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1286, 'comment', 'acar', 10860, 0, '2022-12-12 22:32:42', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1287, 'comment', 'keops', 89846, 0, '2022-12-12 23:31:13', 'HesabÄ±nÄ±za 95.7.139.60 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1288, 'comment', 'acar', 99594, 0, '2022-12-13 00:55:05', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1289, 'comment', 'acar', 173732, 0, '2022-12-13 19:03:54', 'HesabÄ±nÄ±za 217.131.98.54 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1290, 'comment', 'keops', 116631, 0, '2022-12-13 20:33:50', 'HesabÄ±nÄ±za 95.7.139.60 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1291, 'comment', 'acar', 30399, 0, '2022-12-13 21:52:17', 'HesabÄ±nÄ±za 217.131.104.185 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1292, 'comment', 'keops', 227192, 0, '2022-12-14 04:05:56', 'HesabÄ±nÄ±za 95.7.139.60 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1293, 'comment', 'keops', 162520, 0, '2022-12-14 04:07:42', 'Sunucuda cosmosbipinnatus#3686 kullanÄ±cÄ±sÄ±na Trailer of Keops rolÃ¼ verildi.', 'Sistemsel', 'info'),
(1294, 'comment', 'keops', 197581, 0, '2022-12-14 06:56:25', 'HesabÄ±nÄ±za 95.7.139.60 numaralÄ± ip adresi ile bir giriÅŸ gerÃ§ekleÅŸti.', 'Sistemsel', 'warning'),
(1295, 'comment', 'keops', 219402, 0, '2022-12-14 06:57:17', 'Sunucuda GÄ±sy#0001 kullanÄ±cÄ±sÄ±na Anubis of Keops rolÃ¼ verildi.', 'Sistemsel', 'info'),
(1296, 'comment', 'keops', 191329, 0, '2022-12-14 07:06:04', 'Sunucuda GÄ±sy#0001 kullanÄ±cÄ±sÄ±ndan @Anubis of Keops rolÃ¼ alÄ±ndÄ±.', 'Sistemsel', 'info'),
(1297, 'comment', 'keops', 145390, 0, '2022-12-14 07:28:21', 'Sunucuda GÄ±sy#0001 kullanÄ±cÄ±sÄ±na The Keops rolÃ¼ verildi.', 'Sistemsel', 'info');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `timeout` datetime DEFAULT NULL,
  `package` varchar(250) DEFAULT NULL,
  `api_url` varchar(250) DEFAULT NULL,
  `api_token` varchar(250) DEFAULT NULL,
  `balance` int(250) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `owner_id`, `timeout`, `package`, `api_url`, `api_token`, `balance`) VALUES
(10, 10, '2022-11-23 16:35:52', 'SEHÄ°RA Ã–ZEL', 'https://percius.synl.io/api/v4', 'Basic YWNhcjoxMjM0', 0),
(12, 1, '2099-11-22 00:00:00', 'SEHÄ°RA Ã–ZEL', 'https://keops.synl.io/api/v6', 'Basic YWNhcjoxMjM0', 0),
(14, 11, '2023-01-05 00:00:00', 'Equant', 'https://equant.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(21, 18, '2022-12-06 00:00:00', 'EQUANT', 'https://equant.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(22, 21, '2022-12-15 02:58:12', 'Victoria', 'https://nightclub.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(23, 22, '2030-11-11 00:00:00', 'KNVS-RUBY', 'https://veronica.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(24, 23, '2030-11-11 00:00:00', 'KNVS-RUBY', 'https://veronica.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(25, 24, '2022-12-22 00:00:00', 'Polemik', 'https://polemik.synl.io/api/v5', 'Basic YWNhcjoxMjM0', 0),
(26, 25, '2023-01-04 00:00:00', 'KEOPS-2', 'https://keops.synl.io/api/v6', 'Basic YWNhcjoxMjM0', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `surname` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT '',
  `balance` int(11) DEFAULT 0,
  `photo` varchar(250) DEFAULT NULL,
  `ip` varchar(255) DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `type` enum('STAFF','USER') DEFAULT 'USER',
  `sub` int(1) DEFAULT 0,
  `sub_perm` int(10) DEFAULT 0,
  `created_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `email`, `phone`, `balance`, `photo`, `ip`, `last_login`, `type`, `sub`, `sub_perm`, `created_time`) VALUES
(1, 'Selahattin', 'ACAR', 'acar', '05523438757Selocan', 'acar.se0666@gmail.com', '5013530006', 0, './profiles/70806146169668595-unknown.png', '217.131.104.185', '2022-12-13 18:52:17', 'STAFF', 0, 0, '2022-12-13 18:52:17'),
(11, 'Deniz Eren', 'AVCI', 'deniz', 'lespacra2', 'sehira0@outlook.com', '5305294906', 19150, './profiles/227675744617489049-unknowsdhfggdfshn.png', '176.232.175.121', '2022-12-06 12:36:33', 'STAFF', 0, 0, '2022-12-06 12:36:33'),
(17, 'Devran', 'KaraÃ§ay', 'blackn1', 'devrankaraÃ§ayn11', 'devran@synl.io', '0501000000', 0, NULL, '176.43.109.184', '2022-11-10 21:40:30', 'USER', 0, 0, '2022-11-10 21:40:30'),
(21, 'GÃ¶ktuÄŸ', 'GOTOS', 'leumonse1979', 'goktug7981125', 'victoria@synl.io', '0500000000', 0, './profiles/112585178954562949-dc979f481ba8b65352d05c3b7d377136.jpg', '95.7.166.223', '2022-12-12 05:25:07', 'USER', 0, 0, '2022-12-12 05:25:07'),
(22, 'Tayyip', 'TaÅŸkÄ±n', 'chavo', '1234567890', 'tayyiptaskinn@gmail.com', '05311313131', 0, NULL, '78.190.137.186', '2022-11-26 18:59:13', 'USER', 0, 0, '2022-11-26 18:59:13'),
(23, 'Jigsaw', 'Jigsaw', 'jigsaw', '1234567890', 'jigsaw@synl.io', '0555555555', 0, NULL, '78.169.202.118', '2022-11-19 17:59:30', 'USER', 0, 0, '2022-11-19 17:59:30'),
(24, 'Polemik', 'Sunucusu', 'localhost', 'root00.', 'polemik@synl.io', '500000000', 0, NULL, '88.228.41.17', '2022-12-10 14:18:52', 'USER', 0, 0, '2022-12-10 14:18:52'),
(25, 'Ceyhun', 'Keops', 'keops', 'Q5LbVXMJfHDSIaD', 'keops@synl.io', '05311313131', 0, './profiles/46068694209063179-Screenshot_24.png', '95.7.139.60', '2022-12-14 03:56:25', 'USER', 0, 0, '2022-12-14 03:56:25');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1298;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
