<?php
require_once '../db.php';

// CORS ayarları - Güvenlik için sadece izin verilen domainler
header('Access-Control-Allow-Origin: *'); // Tüm domainlere izin ver (production'da spesifik domainler belirtilmeli)
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');

// API anahtarı kontrolü
$api_key = $_GET['api_key'] ?? '';

// API anahtarını veritabanından kontrol et
$stmt = $pdo->prepare("SELECT id FROM admin WHERE api_key = ? LIMIT 1");
$stmt->execute([$api_key]);

if ($stmt->rowCount() === 0) {
    http_response_code(401);
    echo json_encode(['error' => 'Geçersiz API anahtarı']);
    exit;
}

// İstenilen kategoriyi al
$kategori = $_GET['kategori'] ?? 'all';

try {
    if ($kategori === 'all') {
        // Tüm vitrinleri çek
        $stmt = $pdo->query("SELECT * FROM vitrinler ORDER BY kategori, sira ASC");
        $vitrinler = $stmt->fetchAll();
        
        // Popupları çek
        $popup_stmt = $pdo->query("SELECT * FROM popup WHERE aktif = 1");
        $popuplar = $popup_stmt->fetchAll();
        
        echo json_encode([
            'success' => true,
            'data' => [
                'vitrinler' => $vitrinler,
                'popuplar' => $popuplar
            ]
        ]);
    } else {
        // Belirli kategorideki vitrinleri çek
        $stmt = $pdo->prepare("SELECT * FROM vitrinler WHERE kategori = ? ORDER BY sira ASC");
        $stmt->execute([$kategori]);
        $vitrinler = $stmt->fetchAll();
        
        echo json_encode([
            'success' => true,
            'data' => [
                'vitrinler' => $vitrinler
            ]
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
}
