<?php
session_start(); // Oturumu başlat

// Oturumdaki tüm verileri temizle
session_unset();

// Oturumu kapat
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: login.php"); // Giriş sayfasına yönlendirme
exit;
?>
