

<?php
include('db.php');
header('Content-Type: text/html; charset=utf-8');
// Verileri çek
$veriler = $pdo->query("SELECT * FROM vip_reklamlar ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
// Aktif olan uyarıyı veritabanından çek
$stmt = $pdo->query("SELECT icerik FROM vip_uyari WHERE aktif = 1 LIMIT 1");
$uyari = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html ⚡ lang="tr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>Darkwepmaster VİP ESCORT VİTRİN</title>
    <meta name="description" content="İstanbul Vitrin">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://wilad-izmirli35.com/">
   <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
    <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>

<style>
    html, body {
        background-color: red !important;
        background-image: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
</style>

<style>
@media (max-width: 600px) {
  .vip-uyari strong {
    font-size: clamp(7px, 2.8vw, 22px) !important;
  }
}
</style>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
    <noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

    <style amp-custom>
        body {
    background: #f1f1f1;
    font-size: 16px;
    line-height: 1.4;
    font-family: sans-serif
}

a {
    color: #312C7E;
    text-decoration: none
}

.clearfix, .cb {
    clear: both
}

header {
    background: linear-gradient(135deg, var(--primary), var(--secondary), var(--accent));
    background-size: 200% 200%;
    animation: gradient 15s ease infinite;
    padding: 4rem 2rem;
    position: relative;
    overflow: hidden;
    display: flex; /* Flexbox kullanarak ortalamayı sağlar */
    justify-content: center; /* Yatayda ortalar */
    align-items: center; /* Dikeyde ortalar */
    height: 10vh; /* Header'ın tüm ekranı kaplamasını sağlar */
}

header h1 {
    font-size: 1rem; /* Yazı boyutunu küçültür */
    font-weight: 800;
    color: var(--white);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    margin: 0; /* Varsayılan margin'i sıfırlar */
}


.amp-logo {
    left: 0;
    right: 0;
    display: inline-block
}

.amp-logo amp-img {
    margin: 0 auto
}

main {
    padding: 30px 15% 10px 15%
}

#footer {
    background: #FFFFFF;
    font-size: 13px;
    text-align: center;
    letter-spacing: 0.2px;
    padding: 20px 0;
    color: #222222
}

#footer a {
    color: #0074A7
}

@keyframes left_scroll {
    from { background-position: 0 }
    to { background-position: -2988px }
}

@keyframes right_scroll {
    from { background-position: 0 }
    to { background-position: +2988px }
}

@keyframes up_scroll {
    from { background-position-y: +2988px }
    to { background-position-y: 0 }
}

@keyframes down_scroll {
    from { background-position-y: -2988px }
    to { background-position-y: 0 }
}

.animation_left {
    animation: 70s left_scroll infinite linear;
}

.animation_right {
    animation: 70s right_scroll infinite linear;
}

.animation_up {
    animation: 70s up_scroll infinite linear;
}

.animation_bottom {
    animation: 70s down_scroll infinite linear;
}

.ngy-vitrin {
    max-width: 780px;
    margin: 0 auto;
    width: 100%;
}

.ngy-resim {
    width: 100%;
    height: 170px;
    left: 1.5px;
    position: relative;
    background-size: auto 97%;
    margin-bottom: 10px;
    border: 5px solid rgba(255, 20, 147, 0.8);
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden; 
}

.ngy-resim img {
    width: 100%; 
    height: 100%; 
}

.ngy-resim::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background-size: 60px 60px;
    background-repeat: repeat;
    opacity: 0.6; 
    z-index: -1;
    border-radius: 20px;
}

.ngy-resim:hover {
    transform: scale(1.05);
}

.ngy-resim span {
    margin: 10px 0 0 15px;
    font-weight: bold;
    cursor: pointer;
    color: white
}

.feature {
    display: block;
    width: fit-content;
    padding: 3px 7px;
    font-size: 14px;
    border-radius: 10px
}

.float-left {
    float: left
}

.float-right {
    float: right
}

.isim_vip {
    background: rgba(255, 215, 0, 0.64);
}

.telefon_numarasi_arama_vip {
    background: #00ff7f;
}

.ozellikler_vip {
    background: #ff4500; 
}

.gorusme_yeri_vip {
    background: rgba(75, 0, 130, 0.81);
}

.fotograf_onayli_vip {
    background: rgba(0, 161, 255, 0.81);
}

@media screen and (max-width: 800px) {
    .single-post main {
        padding: 12px 10px 10px 10px
    }
}

@media screen and (max-width: 767px) {
    main, .amp-category-block, .category-widget-wrapper {
        padding: 15px 18px 0px 18px
    }
}

.headerlogo a, [class*=icono-] {
    color: #FF0000
}
header.container {
    line-height: 0
}

#header {
    background: #000000;
    text-align: center;
    padding: 17px 0px 17px 0px;
    display: inline-block;
    width: 100%;
    position: relative
}

#header h1 {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    padding: 4px 3px;
    margin: 0
}

.amp-logo {
    left: 0;
    right: 0;
    display: inline-block
}

.amp-logo amp-img {
    margin: 15px 0px 10px 0px
}

.amp-logo amp-img {
    margin: 0 auto
}
.amp-wp-tax-tag a, a, .amp-wp-author, .headerlogo a, [class*=icono-] {
    color: #FF0000	;
}
.hide {
    display: none
}

.lazy-image {
    opacity: 0;
    transition: opacity 0.3s ease-in;
}

.lazy-image.loaded {
    opacity: 1;
}

.yukleniyor-alani {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 150px;
    height: 150px;
}

.animation-alani {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 125px;
    height: 125px;
    border-radius: 50%;
    background: rgba(255, 0, 150, 0.1);
    box-shadow: 0 0 20px rgba(255, 0, 150, 0.8);
    animation: animasyon 2.5s infinite;
}

.yukleniyor-alani svg {
    position: absolute;
    top: 45%;
    left: 47%;
    transform: translate(-50%, -50%);
    width: 125px;
    height: 125px;
    animation: animasyon2 2.5s infinite;
}

.neon-parlama {
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 25px;
    background: rgba(255, 0, 150, 0.4);
    filter: blur(20px);
    z-index: -1;
    animation: glow 2.5s infinite alternate;
}

@keyframes animasyon {
    0% {
        transform: translate(-50%, -50%) scale(1);
        background: rgba(255, 0, 150, 0.1);
    }
    50% {
        transform: translate(-50%, -50%) scale(1.2);
        background: rgba(255, 0, 150, 0.3);
    }
    100% {
        transform: translate(-50%, -50%) scale(1);
        background: rgba(255, 0, 150, 0.1);
    }
}

@keyframes animasyon2 {
    0% {
        transform: translate(-50%, -50%) scale(1);
    }
    50% {
        transform: translate(-50%, -50%) scale(1.2);
    }
    100% {
        transform: translate(-50%, -50%) scale(1);
    }
}

@keyframes glow {
    0% { opacity: 0.5; }
    100% { opacity: 1; }
}

.ngy-resim.loading {
    background-color: #000000; 
    transition: background-color 0.3s ease;
}

/* Modern Değişkenler */
:root {
    /* Ana Renkler */
    --primary: #4f46e5;
    --primary-light: #6366f1;
    --primary-dark: #4338ca;
    --secondary: #7c3aed;
    --accent: #ec4899;
    --success: #10b981;
    --warning: #f59e0b;
    --error: #ef4444;

    /* Nötr Renkler */
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
    --white: #ffffff;

    /* Özel Gölgeler */
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
    --shadow-lg: 0 10px 15px rgba(0,0,0,0.08);
    --shadow-xl: 0 20px 25px rgba(0,0,0,0.1);
    --shadow-inner: inset 0 2px 4px rgba(0,0,0,0.05);
    --shadow-color: 0 4px 14px rgba(79, 70, 229, 0.2);

    /* Özel Z-index Katmanları */
    --z-header: 1000;
    --z-modal: 2000;
    --z-tooltip: 3000;
}

/* Modern Reset */
*, *::before, *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Temel Animasyonlar */
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4); }
    70% { box-shadow: 0 0 0 20px rgba(79, 70, 229, 0); }
    100% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0); }
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}


/* Özel Mixins */
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.text-gradient {
    background: linear-gradient(135deg, var(--primary), var(--accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Temel Sayfa Yapısı */
body {
    color: var(--gray-800);
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--white) 100%);
}

/* Premium Header */
header {
    background: linear-gradient(135deg, var(--primary), var(--secondary), var(--accent));
    background-size: 200% 200%;
    animation: gradient 15s ease infinite;
    padding: 4rem 2rem;
    position: relative;
    overflow: hidden;
}

header::before {
    content: '';
    position: absolute;
    width: 200%;
    height: 200%;
    top: -50%;
    left: -50%;
    background: radial-gradient(circle at center, rgba(255,255,255,0.2) 0%, transparent 60%);
    animation: rotate 20s linear infinite;
}

header h1 {
    font-size: clamp(1rem, 5vw, 2.5rem);
    font-weight: 800;
    color: var(--white);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1;
    animation: float 6s ease-in-out infinite;
    max-width: 1200px;
    margin: 0 auto;
}

/* Modern Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
}

/* Premium Section */
section {
    background: var(--white);
    border-radius: 1.5rem;
    padding: 0.5rem;
    margin: 3rem 0;
    box-shadow: var(--shadow-lg);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--gray-200);
}

section::before {
    content: '';
    position: absolute;
    top: 0;
    left: -150%;
    width: 150%;
    height: 100%;
}

section:hover::before {
    left: 100%;
    transition: 0.8s;
}

section:hover {
    transform: translateY(-10px) scale(1.01);
    box-shadow: var(--shadow-xl), 0 0 20px rgba(79, 70, 229, 0.1);
}

/* Modern Başlıklar */
section h2 {
    font-size: 2rem;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
}

section h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease;
}

section:hover h2::after {
    transform: scaleX(1);
}

/* Modern Liste */
section ul {
    list-style: none;
    margin: 2rem 0;
}

section ul li {
    background: var(--gray-50);
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 1rem;
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

section ul li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(to bottom, var(--primary), var(--secondary));
    transition: width 0.3s ease;
}

section ul li:hover {
    transform: translateX(10px);
    background: var(--white);
    box-shadow: var(--shadow-color);
}

section ul li:hover::before {
    width: 8px;
}

/* Premium Footer */
footer {
    background: linear-gradient(135deg, var(--gray-900), var(--gray-800));
    color: var(--white);
    padding: 4rem 2rem;
    margin-top: 5rem;
    position: relative;
    overflow: hidden;
}

footer::before,
footer::after {
    content: '';
    position: absolute;
    width: 200%;
    height: 200%;
    top: -50%;
    left: -50%;
    background: radial-gradient(circle at center, rgba(255,255,255,0.1) 0%, transparent 60%);
    animation: rotate 30s linear infinite;
}

footer::after {
    animation-direction: reverse;
    animation-duration: 20s;
}

footer p {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    font-size: 1.1rem;
    line-height: 1.8;
}

::-webkit-scrollbar-track {
    background: var(--gray-100);
    border-radius: 7px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(var(--primary), var(--secondary));
    border-radius: 7px;
    border: 4px solid var(--gray-100);
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(var(--primary-dark), var(--secondary));
}

/* Medya Sorguları */
@media (max-width: 768px) {
    section {
        padding: 0.7rem;
        margin: 2rem 0;
    }

    header {
        padding: 3rem 1.5rem;
    }

    section h2 {
        font-size: 1.75rem;
    }
}

/* Dark Mode 
@media (prefers-color-scheme: dark) {
    :root {
        --white: #1a1a1a;
        --gray-50: #121212;
        --gray-100: #1e1e1e;
        --gray-200: #2d2d2d;
        --gray-800: #e5e7eb;
        --gray-900: #f3f4f6;
    }

    body {
        background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
    }

    section {
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    section ul li {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    ::-webkit-scrollbar-track {
        background: var(--gray-900);
    }

    ::-webkit-scrollbar-thumb {
        border-color: var(--gray-900);
    }
}

@media (prefers-reduced-motion: no-preference) {
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }
}*/

    </style>
	
</head>
<div class="ngy-vitrin">
    <section class="vip">
        <?php
        // Sabit ilanları ve normal ilanları ayrı dizilerde tutuyoruz
        $sabit_ilans = [];
        $normal_ilans = [];

        foreach ($veriler as $veri) {
            if ($veri['sabit'] == 1) {
                $sabit_ilans[] = $veri;  // Sabit ilanları sabit_ilans dizisine ekliyoruz
            } else {
                $normal_ilans[] = $veri; // Diğer ilanları normal_ilans dizisine ekliyoruz
            }
        }

        // Sabit ilanları önce ekleyip, ardından normal ilanları ekliyoruz
        $sorted_veriler = array_merge($sabit_ilans, $normal_ilans);

        // Verileri sırasıyla ekliyoruz
        foreach ($sorted_veriler as $veri): ?>

    <div class="col-6 col-md-2 mb-4">


<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      perspective: 1000px; /* 3D alanı tanımlıyoruz */
    }

    .kart-icerik {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between; /* Kutuları hizalamak için */
      gap: 2px; /* Mobilde kutular arası boşluğu daha da azalttım */
      padding: 8px;
      margin: 5px;
    }

    .etiket {
      padding: 2px 4px; /* Daha dar padding */
      font-size: 9px;  /* Mobilde daha büyük yazı boyutu */
      font-weight: bold;
      color: #fff;
      border-radius: 5px;
      white-space: nowrap;
      max-width: 45%; /* Her kutu için max-width sınırlandırma */
      overflow: hidden;
      text-overflow: ellipsis;
      text-align: center;
      flex-basis: 20%; /* 4 kutu düzgün sığacak şekilde ayarlandı */
      background-color: #333;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Kutulara gölge ekleyerek derinlik oluşturduk */
      transition: transform 0.3s ease, box-shadow 0.3s ease; /* Geçiş efekti ekledik */
    }

    .etiket:hover {
      transform: translateY(-5px) scale(1.05); /* Hover efekti ile kutu biraz havada duruyor */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Hover'da gölgeyi büyütüyoruz */
    }

    .sabit-badge {
      background-color: red;
      padding: 3px 6px;
      font-size: 8px;
      font-weight: bold;
      color: white;
      border-radius: 5px;
      margin: 5px auto 3px auto;
      display: inline-block;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sabit badge'e gölge ekledik */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .sabit-badge:hover {
      transform: translateY(-3px) scale(1.1); /* Hover'da sabit badge biraz havada */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Hover'da sabit badge gölgesini büyütüyoruz */
    }

    .resim-ic {
      position: relative;
      display: block;
      margin-top: 15px;
      width: 100%;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Resim kutusuna gölge ekledik */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .resim-ic:hover {
      transform: scale(1.05); /* Resim kutusu hover'da biraz büyüyecek */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Resim kutusunun gölgesi hover'da büyüyor */
    }

    .resim-ic img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .resim-ic .resim-isareti {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: rgba(0, 0, 0, 0.6);
      color: #fff;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 10px;
      font-weight: bold;
    }

    /* Masaüstü için boyutlandırma */
    @media (min-width: 768px) {
      .etiket {
        font-size: 14px;  /* Yazı boyutunu masaüstünde biraz büyütüyoruz */
        padding: 6px 12px;
        flex-basis: 22%; /* Kutuları biraz daha büyütüyoruz */
      }

      .sabit-badge {
        font-size: 10px; /* Sabit etiket boyutunu biraz büyütüyoruz */
        padding: 4px 8px;
      }
    }

/* Mobil için boyutlandırma */
@media (max-width: 600px) {
  .etiket {
    font-size: 8px;  /* Mobilde yazı boyutunu büyütüyoruz */
    padding: 5px 10px; /* Daha geniş padding ile kutuları büyütüyoruz */
    max-width: 45%; /* Her kutu için max-width sınırlandırma */
    flex-basis: 20%; /* Kutuları daha küçük tutmak için flex-basis değerini 20% yaptık */
    word-wrap: break-word; /* Uzun kelimelerin kutu dışına taşmasını engeller */
    box-sizing: border-box; /* Padding dahil kutu boyutunu ayarlıyoruz */
    text-align: center; /* Yazıların ortalanması */
    overflow: visible; /* Yazıların taşmasını engellemek için overflow: visible kullanıyoruz */
  }

  .sabit-badge {
    font-size: 6px;
    padding: 2px 6px;
  }

  .kart-icerik {
    justify-content: space-between; /* Kutuları daha düzenli bir şekilde hizalar */
    flex-wrap: wrap;  /* Kutuların taşmasını önler */
    width: 100%; /* Tüm alanı kullanarak kutuları sığdırıyoruz */
  }

  .resim-ic {
    margin-top: 10px;
  }
}

  </style>
</head>
<body>
<a target="_blank" href="https://wa.me/<?= htmlspecialchars($veri['telefon']) ?>?text=Merhaba+can%C4%B1m%2C+%C5%9Eartlar%C4%B1n%C4%B1+%C3%B6%C4%9Frenebilir+miyim%3F&type=phone_number&app_absent=0" style="text-decoration: none; color: inherit;">
  <?php if ($veri['sabit'] == 1): ?>
    <div class="sabit-badge">Sabit İlan</div>
  <?php endif; ?>

  <div class="kart-icerik">
    <span class="etiket" style="background-color: #ff4d4d;">👩‍🦰 <?= htmlspecialchars($veri['isim']) ?></span>

    <?php if (!empty($veri['etiket1'])): ?>
      <span class="etiket" style="background-color: #28a745;"><?= htmlspecialchars($veri['etiket1']) ?></span>
    <?php endif; ?>

    <?php if (!empty($veri['etiket2'])): ?>
      <span class="etiket" style="background-color: #007bff;"><?= htmlspecialchars($veri['etiket2']) ?></span>
    <?php endif; ?>

    <?php if (!empty($veri['telefon'])): ?>
      <span class="etiket" style="background-color: #fd7e14;">📞 <?= htmlspecialchars($veri['telefon']) ?></span>
    <?php endif; ?>
  </div>

</body>
</html>



        
            <div class="ngy-resim animation_right lazy" style="background-image: url('<?= htmlspecialchars($veri['resim_yolu']) ?>'); padding: 5px; background-size: cover; background-position: center; min-height: 150px; position: relative; display: flex; flex-direction: column; justify-content: flex-end; height: 100%; overflow: hidden;"> 
                
				</div>
				</a>
   <?php endforeach; ?>
    </section>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tüm col-6 col-md-2 mb-4 div'lerini seç
        var items = Array.from(document.querySelectorAll('.col-6.col-md-2.mb-4'));

        // Sıralama işlemini fonksiyon haline getir
        function shuffleItems() {
            // Rastgele sıraya diz
            const shuffledItems = items.slice(); // items dizisinin bir kopyasını al
            shuffledItems.sort(function() {
                return Math.random() - 0.5;
            });

            // Sıralama işlemi yapılmadan önce, parent öğeyi al
            var parent = items[0].parentNode;

            // Parent öğesine bir kez ekleme işlemi yapılacak şekilde tüm öğeleri ekleyin
            shuffledItems.forEach(function(item) {
                parent.appendChild(item);
            });
        }

        // Sayfa ilk kez yüklendiğinde sıralamayı başlat
        shuffleItems();
    });
</script>


<style>
.feature {
  font-size: 14px;
  padding: 6px 10px;
  margin: 4px 0;
  color: white;
  border-radius: 8px;
  display: inline-block;
  max-width: 90%;
  font-weight: 500;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
}

@media (max-width: 235px) {
  .feature {
    font-size: 12px;
    padding: 5px 8px;
  }

  .ngy-resim {
    min-height: 260px !important;
  }
}
</style>


      
</div>

<div class="col-12 col-md-2 mb-4" style="width: 100%; max-width: 800px; min-width: 280px; margin: 0 auto;">
    <a target="_blank" href="https://wa.me/+359886867391?text=Merhaba%20Darkwepmaster%20BEY%20sitenize%20ilan%20vermek%20istiyorum&type=phone_number&app_absent=0" style="text-decoration: none; color: inherit;">
        <div class="ngy-resim animation_right lazy" style="background-image: url('https://i.hizliresim.com/ka5sj89.jpg'); padding: 5px; background-size: cover; background-position: center; min-height: 100px; position: relative; display: flex; flex-direction: column; justify-content: flex-end; height: 100%; overflow: hidden;">
        </div>
    </a>
</div>

   <center><strong><font color="white"> <p style="color: white; font-weight: bold; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">
       <font color="white"> &copy; 2025 Vip Escort Vitrin - Tüm hakları saklıdır.</font>
    </p></strong></center>

    
</body>
</html>