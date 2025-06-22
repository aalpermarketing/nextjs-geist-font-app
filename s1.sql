-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 Nis 2025, 10:57:47
-- Sunucu sürümü: 10.6.21-MariaDB-cll-lve
-- PHP Sürümü: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `s1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$gNKQYf4Tl5weHR1ZJcNZce3YEuWkwK.AUewiuRqW9yCJrrr/dHsNC', '2025-04-18 01:28:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vip_reklamlar`
--

CREATE TABLE `vip_reklamlar` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `resim_yolu` varchar(255) NOT NULL,
  `etiket1` varchar(100) DEFAULT NULL,
  `etiket2` varchar(100) DEFAULT NULL,
  `etiket3` varchar(100) DEFAULT NULL,
  `etiket4` varchar(100) DEFAULT NULL,
  `sabit` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `vip_reklamlar`
--

INSERT INTO `vip_reklamlar` (`id`, `isim`, `telefon`, `resim_yolu`, `etiket1`, `etiket2`, `etiket3`, `etiket4`, `sabit`) VALUES
(21, 'Derya', '55555555555555', '/images/261f20347dac11ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', NULL, NULL, 0),
(22, 'Vip Buse', '5555555555555', 'images/ajda.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(23, 'Üniversteli Sevgi', '5555555555555', 'images/arven.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(25, 'Monika Ajans', '5555555555555', 'images/5b3751207dc911ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(26, 'Vip Yabancı Kızlar', '5555555555555', 'images/a6e4a40e857811ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(28, 'Sarışın Vip Sevgi', '5555555555555', 'images/7939e40c835111ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(29, 'Rus Ukraine Belarus', '5555555555555', 'images/f0a5cc2e800711ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0),
(30, 'Sexi Bayan Gözde', '5555555555555', 'images/6d3320fe7cc311ef83019d1d67841411.png', 'Eve Otele Gelir', 'Elden Ödeme', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vip_uyari`
--

CREATE TABLE `vip_uyari` (
  `id` int(11) NOT NULL,
  `aktif` tinyint(1) DEFAULT 0,
  `icerik` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `vip_reklamlar`
--
ALTER TABLE `vip_reklamlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vip_uyari`
--
ALTER TABLE `vip_uyari`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `vip_reklamlar`
--
ALTER TABLE `vip_reklamlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `vip_uyari`
--
ALTER TABLE `vip_uyari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
