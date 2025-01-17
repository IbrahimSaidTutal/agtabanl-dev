-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Oca 2025, 17:07:59
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `news`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(100) NOT NULL,
  `haber_basligi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `haber_aciklamasi` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `haber_basligi`, `resim_url`, `haber_aciklamasi`, `tarih`) VALUES
(4, 'Dinozorlu Final Fantasy oyunu Steam’i karıştırdı!', 'https://ares.shiftdelete.net/2025/01/epic-games-1-ocak-2025-ucretsiz-oyun-kingdom-come-deliverance-2.webp', 'Sucker Punch Productions çalışanı Jean Nguyen, Dinoblade isimli bağımsız yapımıyla ortalığı karıştırdı. Final Fantasy tarzında bir deneyim vadeden aksiyon rol yapma oyunu, dinozor temasıyla birlikte büyük merak uyandırdı.', '2025-01-17'),
(5, 'Epic Games’in yeni ücretsiz oyunu belli oldu!', 'https://ares.shiftdelete.net/2024/10/epic-games-ucretsiz-oyun-10-17-ekim-kaapak.webp', 'Epic Games Store, 33 TL’lik fiyata sahip Escape Academy’nin 16-23 Ocak tarihleri arasında ücretsiz alınabileceğini açıkladı. Oyunu bu tarihler arasında kütüphanenize eklerseniz, sonsuza kadar sizin olacak.', '2025-01-17'),
(6, 'Sony, PS5 aksesuarları için yepyeni bir renk seçeneği duyurdu!', 'https://ares.shiftdelete.net/2024/11/ps5-pro.jpg', 'Sony, PS5 5 aksesuar serisine Midnight Black (Gece Yarısı Siyahı) adlı yeni bir renk seçeneği ekledi. PlayStation Portal, DualSense Edge, Pulse Elite ve Pulse Explore gibi popüler aksesuarlar, artık siyah renk tasarımıyla sunulacak. Oyuncuların uzun süredir beklediği bu yeni görünüm, 20 Şubat’ta piyasaya sürülecek ve ön sipariş süreci bugün itibarıyla başladı.', '2025-01-17'),
(7, 'Steam’de en çok indirilen oyunlar belli oldu!', 'https://ares.shiftdelete.net/2024/10/steam-en-cok-satanlar-liste-15-ekim-22-ekim-kapak.jpg', 'Steam’in en çok indirilen PC oyunlarının lideri oynaması ücretsiz Counter-Strike 2 oldu. İkinci sırada Marvel Rivals karşımıza çıkarken, üçüncü sıradaysa Valve’ın el konsolu Steam Deck bulunuyor. Listenin dördüncü sırasında oynaması ücretsiz PUBG: BATTLEGROUNDS mevcut.\r\nİşte Steam’de geçtiğimiz hafta en çok indirilen oyunlar;\r\n\r\nCounter-Strike 2\r\nMarvel Rivals\r\nSteam Deck\r\nPUBG: BATTLEGROUNDS\r\nPath of Exile 2\r\nDota 2\r\nWarframe\r\nMonster Hunter Wilds\r\nApex Legends™\r\nSid Meier’s Civilization VII\r\nGrand Theft Auto V\r\nHELLDIVERS™ 2\r\nLimbus Company\r\nTHRONE AND LIBERTY\r\nWar Thunder\r\nNARAKA: BLADEPOINT\r\nCall of Duty®\r\nEA SPORTS FC™ 25\r\nRust\r\nKingdom Come: Deliverance II\r\nNBA 2K25\r\nDead by Daylight\r\nFINAL FANTASY VII REBIRTH\r\nLost Ark\r\nBaldur’s Gate 3\r\nDelta Force\r\nCall of Duty®: Black Ops 6\r\nTom Clancy’s Rainbow Six® Siege\r\nArma Reforger\r\nMiSide\r\nDYNASTY WARRIORS: ORIGINS\r\nBlack Myth: Wukong\r\nBalatro\r\nTorchlight: Infinite\r\nYu-Gi-Oh! Master Duel\r\nELDEN RING\r\nOnce Human\r\nWarhammer 40,000: Rogue Trader\r\nWorld of Warships\r\nPalworld', '2025-01-17'),
(8, 'Oyun dünyası', 'https://ares.shiftdelete.net/2025/01/xbox-1.webp', 'Mükemmel bir younadnuakmls', '2025-01-17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `haber_id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `haber_id`, `kullanici_adi`, `yorum`, `tarih`) VALUES
(4, 4, 'İbrahim Said', 'Çok garip!!', '2025-01-17 15:30:50'),
(5, 7, 'İbrahim Said', 'mükemmel', '2025-01-17 16:39:39'),
(6, 7, 'İbrahim Said', 'bu çok iyi\r\n', '2025-01-17 16:39:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
