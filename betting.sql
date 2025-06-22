-- Admin tablosu
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL, -- MD5 için 32 karakter
    api_key VARCHAR(64) NOT NULL UNIQUE, -- API anahtarı
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Admin hesabı oluştur (şifre: admin)
-- Admin hesabı oluştur (şifre: admin) ve API anahtarı ata
INSERT INTO admin (username, password, api_key) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'YOUR_API_KEY_HERE');

-- Vitrinler tablosu
CREATE TABLE IF NOT EXISTS vitrinler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategori ENUM('vip', 'gold', 'silver') NOT NULL,
    bonus_baslik VARCHAR(255) NOT NULL,
    bonus_aciklama TEXT,
    bonus_link VARCHAR(255) NOT NULL,
    resim_linki VARCHAR(255) NOT NULL,
    sira INT DEFAULT 0,
    aktif TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Popup tablosu
CREATE TABLE IF NOT EXISTS popup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bonus_detay TEXT,
    bonus_linki VARCHAR(255) NOT NULL,
    resim_linki VARCHAR(255) NOT NULL,
    boyut ENUM('buyuk', 'kucuk') DEFAULT 'buyuk',
    aktif TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Örnek veriler - VIP Vitrin
INSERT INTO vitrinler (kategori, bonus_baslik, bonus_aciklama, bonus_link, resim_linki, sira) VALUES
('vip', 'Hoşgeldin Bonusu %100', '2000 TL\'ye kadar ilk yatırım bonusu', 'https://example.com/bonus1', 'https://example.com/images/bonus1.jpg', 1),
('vip', 'Çevrimsiz Bonus', 'Yatır çek bonusu - anında çekim', 'https://example.com/bonus2', 'https://example.com/images/bonus2.jpg', 2),
('vip', 'Kombine Bonusu', 'Kaybeden kuponlara %20 iade', 'https://example.com/bonus3', 'https://example.com/images/bonus3.jpg', 3);

-- Örnek veriler - Gold Vitrin
INSERT INTO vitrinler (kategori, bonus_baslik, bonus_aciklama, bonus_link, resim_linki, sira) VALUES
('gold', 'Casino Bonusu', '500 TL Hoşgeldin Bonusu', 'https://example.com/bonus4', 'https://example.com/images/bonus4.jpg', 1),
('gold', 'Yatırım Bonusu', 'Her yatırıma %15 bonus', 'https://example.com/bonus5', 'https://example.com/images/bonus5.jpg', 2),
('gold', 'Arkadaş Bonusu', 'Arkadaşını getir 50 TL kazan', 'https://example.com/bonus6', 'https://example.com/images/bonus6.jpg', 3);

-- Örnek veriler - Silver Vitrin
INSERT INTO vitrinler (kategori, bonus_baslik, bonus_aciklama, bonus_link, resim_linki, sira) VALUES
('silver', 'Deneme Bonusu', '20 TL Bedava Bonus', 'https://example.com/bonus7', 'https://example.com/images/bonus7.jpg', 1),
('silver', 'Kayıp Bonusu', '%10 Nakit İade', 'https://example.com/bonus8', 'https://example.com/images/bonus8.jpg', 2),
('silver', 'Sadakat Bonusu', 'VIP üyelere özel bonus', 'https://example.com/bonus9', 'https://example.com/images/bonus9.jpg', 3);

-- Örnek veriler - Popup
INSERT INTO popup (bonus_detay, bonus_linki, resim_linki, boyut, aktif) VALUES
('Özel VIP Bonus Fırsatı! 2000 TL\'ye kadar %100 bonus', 'https://example.com/vip-bonus', 'https://example.com/images/popup1.jpg', 'buyuk', 1),
('Yeni Üyelere Özel 500 TL Bonus', 'https://example.com/yeni-uye', 'https://example.com/images/popup2.jpg', 'kucuk', 1);
