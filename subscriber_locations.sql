-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 06 Mar 2020, 10:52:18
-- Sunucu sürümü: 5.7.27-0ubuntu0.18.04.1
-- PHP Sürümü: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `grouping_by_location`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscriber_locations`
--

CREATE TABLE `subscriber_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(9,6) NOT NULL,
  `longitude` double(9,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscriber_locations`
--

INSERT INTO `subscriber_locations` (`id`, `subscriber_id`, `country`, `country_code`, `city`, `district`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Türkiye', 'TR', 'İstanbul', 'Bağcılar', 28.823000, 41.022000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(2, 2, 'Türkiye', 'TR', 'İstanbul', 'Bağcılar', 28.823000, 41.022000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(3, 3, 'Türkiye', 'TR', 'Ankara', 'Çankaya', 32.819000, 39.863000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(4, 4, 'Türkiye', 'TR', 'İstanbul', 'Çekmeköy', 29.167000, 41.032000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(5, 5, 'Türkiye', 'TR', 'Mersin', 'Mut', 33.425000, 36.643000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(6, 6, 'Türkiye', 'TR', 'Samsun', 'Asarcık', 36.231000, 41.035000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(7, 7, 'Türkiye', 'TR', 'İstanbul', 'Zeytinburnu', 28.913000, 40.999000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(8, 8, 'Türkiye', 'TR', 'İzmir', 'Bornova', 27.207000, 38.489000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(9, 9, 'Türkiye', 'TR', 'Ankara', 'Bala', 33.401000, 39.398000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(10, 10, 'Türkiye', 'TR', 'İstanbul', 'Dudullu Osb', 29.201000, 41.010000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(11, 11, 'Türkiye', 'TR', 'İstanbul', 'Sancaktepe', 29.188000, 41.007000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(12, 12, 'Türkiye', 'TR', 'Bursa', 'Mudanya', 28.917000, 40.352000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(13, 13, 'Türkiye', 'TR', 'İstanbul', 'Dudullu Osb', 29.184000, 41.019000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(14, 14, 'Türkiye', 'TR', 'Konya', 'Karatay', 32.526000, 37.800000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(15, 15, 'Türkiye', 'TR', 'İzmir', 'Konak', 27.124000, 38.411000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(16, 16, 'Türkiye', 'TR', 'Adana', 'Ceyhan', 35.824000, 37.012000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(17, 17, 'Türkiye', 'TR', 'Gaziantep', 'Şehitkamil', 37.360000, 37.072000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(18, 18, 'Türkiye', 'TR', 'Denizli', 'Denizli Merkez', 29.070000, 37.778000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(19, 19, 'Türkiye', 'TR', 'Zonguldak', 'Kocaman', 31.319000, 41.129000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(20, 20, 'Türkiye', 'TR', 'Adana', 'Seyhan', 35.315000, 37.007000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(21, 21, 'Türkiye', 'TR', 'Niğde', 'Yelatan', 35.022000, 37.685000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(22, 22, 'Türkiye', 'TR', 'Kayseri', 'Talas', 35.550000, 38.700000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(23, 23, 'Türkiye', 'TR', 'Bursa', 'Yıldırım', 29.161000, 40.196000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(24, 24, 'Türkiye', 'TR', 'İzmir', 'Karabağlar', 27.132000, 38.370000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(25, 25, 'Türkiye', 'TR', 'Konya', 'Yunak', 31.737000, 38.806000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(26, 26, 'Türkiye', 'TR', 'Aydın', 'Aydın Merkez', 27.818000, 37.853000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(27, 27, 'Türkiye', 'TR', 'İstanbul', 'Beylikdüzü Osb', 28.669000, 41.014000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(28, 28, 'Türkiye', 'TR', 'İstanbul', 'Pendik', 29.283000, 40.923000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(29, 29, 'Türkiye', 'TR', 'İstanbul', 'Beşiktaş', 29.011000, 41.056000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(30, 30, 'Türkiye', 'TR', 'Bilecik', 'Bozüyük', 30.035000, 39.904000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(31, 31, 'Türkiye', 'TR', 'İzmir', 'Buca', 27.182000, 38.375000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(32, 32, 'Türkiye', 'TR', 'Balıkesir', 'Susurluk', 28.180000, 39.977000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(33, 33, 'Türkiye', 'TR', 'Sakarya', 'Geyve', 30.297000, 40.526000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(34, 34, 'Türkiye', 'TR', 'Çorum', 'Çorum Merkez', 34.923000, 40.539000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(35, 35, 'Türkiye', 'TR', 'İstanbul', 'Beylikdüzü Organize Sanayi Bölgesi', 28.642000, 40.976000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(36, 36, 'Türkiye', 'TR', 'Antalya', 'Kaş', 29.675000, 36.549000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(37, 37, 'Türkiye', 'TR', 'Manisa', 'Manisa Merkez', 27.410000, 38.619000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(38, 38, 'Türkiye', 'TR', 'Antalya', 'Kepez', 30.730000, 36.937000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(39, 39, 'Türkiye', 'TR', 'Antalya', 'Alanya', 31.714000, 36.642000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(40, 40, 'Türkiye', 'TR', 'Konya', 'Meram', 32.497000, 37.830000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(41, 41, 'Türkiye', 'TR', 'İzmir', 'Güzelbahçe', 26.882000, 38.375000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(42, 42, 'Türkiye', 'TR', 'Çorum', 'Çorum Merkez', 34.934000, 40.546000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(43, 43, 'Türkiye', 'TR', 'Kahramanmaraş', 'Kahramanmaraş Merkez', 36.917000, 37.582000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(44, 44, 'Türkiye', 'TR', 'Muğla', 'Fethiye', 29.383000, 36.639000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(45, 45, 'Türkiye', 'TR', 'Tokat', 'Turhal', 36.079000, 40.384000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(46, 46, 'Türkiye', 'TR', 'Karabük', 'Kavaklar', 32.954000, 41.095000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(47, 47, 'Türkiye', 'TR', 'Hatay', 'Belen', 36.223000, 36.488000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(48, 48, 'Türkiye', 'TR', 'Kahramanmaraş', 'Çağlayancerit', 37.301000, 37.746000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(49, 49, 'Türkiye', 'TR', 'Kocaeli', 'İzmit', 29.872000, 40.768000, '2020-03-03 18:00:00', '2020-03-03 18:00:00'),
(50, 50, 'Türkiye', 'TR', 'Ankara', 'Çankaya', 32.809000, 39.908000, '2020-03-03 18:00:00', '2020-03-03 18:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `subscriber_locations`
--
ALTER TABLE `subscriber_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriber_locations_subscriber_id_foreign` (`subscriber_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `subscriber_locations`
--
ALTER TABLE `subscriber_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `subscriber_locations`
--
ALTER TABLE `subscriber_locations`
  ADD CONSTRAINT `subscriber_locations_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscriber` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
