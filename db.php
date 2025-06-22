<?php
session_start();

// Veritabanı bağlantı bilgileri
$db_host = 'localhost';
$db_name = 'betting_db';
$db_user = 'root';
$db_pass = '';

try {
    // PDO bağlantısı oluştur
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    
    // Hata modunu ayarla
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Varsayılan fetch modunu ayarla
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    // Hata durumunda
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// XSS koruması için yardımcı fonksiyon
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Admin girişi için fonksiyonlar
function checkAdminLogin($username, $password) {
    global $pdo;
    
    // Şifreyi MD5 ile hashleme
    $hashed_password = md5($password);
    
    $stmt = $pdo->prepare("SELECT id, username FROM admin WHERE username = ? AND password = ?");
    $stmt->execute([$username, $hashed_password]);
    
    if ($stmt->rowCount() > 0) {
        $admin = $stmt->fetch();
        
        // Session'a admin bilgilerini kaydet
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        
        // Son giriş zamanını güncelle
        $update = $pdo->prepare("UPDATE admin SET last_login = NOW() WHERE id = ?");
        $update->execute([$admin['id']]);
        
        return true;
    }
    
    return false;
}

// Admin oturum kontrolü
function isAdminLoggedIn() {
    return isset($_SESSION['admin_id']);
}

// Admin oturumunu sonlandır
function adminLogout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_username']);
    session_destroy();
}
