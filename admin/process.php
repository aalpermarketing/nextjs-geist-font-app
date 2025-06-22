<?php
require_once '../db.php';

// Admin girişi kontrolü
if (!isAdminLoggedIn()) {
    die('Yetkisiz erişim');
}

// POST verilerini güvenli şekilde al
function getPostData($key, $default = '') {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

// İşlem türünü kontrol et
$action = getPostData('action');

switch ($action) {
    // Vitrin Ekleme
    case 'add_vitrin':
        $kategori = getPostData('kategori');
        $bonus_baslik = getPostData('bonus_baslik');
        $bonus_aciklama = getPostData('bonus_aciklama');
        $bonus_link = getPostData('bonus_link');
        $resim_linki = getPostData('resim_linki');
        $sira = (int)getPostData('sira', 0);

        try {
            $stmt = $pdo->prepare("INSERT INTO vitrinler (kategori, bonus_baslik, bonus_aciklama, bonus_link, resim_linki, sira) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$kategori, $bonus_baslik, $bonus_aciklama, $bonus_link, $resim_linki, $sira]);
            echo json_encode(['success' => true, 'message' => 'Vitrin başarıyla eklendi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Vitrin Güncelleme
    case 'update_vitrin':
        $id = (int)getPostData('id');
        $bonus_baslik = getPostData('bonus_baslik');
        $bonus_aciklama = getPostData('bonus_aciklama');
        $bonus_link = getPostData('bonus_link');
        $resim_linki = getPostData('resim_linki');
        $sira = (int)getPostData('sira');

        try {
            $stmt = $pdo->prepare("UPDATE vitrinler SET bonus_baslik = ?, bonus_aciklama = ?, bonus_link = ?, resim_linki = ?, sira = ? WHERE id = ?");
            $stmt->execute([$bonus_baslik, $bonus_aciklama, $bonus_link, $resim_linki, $sira, $id]);
            echo json_encode(['success' => true, 'message' => 'Vitrin başarıyla güncellendi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Vitrin Silme
    case 'delete_vitrin':
        $id = (int)getPostData('id');

        try {
            $stmt = $pdo->prepare("DELETE FROM vitrinler WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Vitrin başarıyla silindi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Popup Ekleme
    case 'add_popup':
        $bonus_detay = getPostData('bonus_detay');
        $bonus_linki = getPostData('bonus_linki');
        $resim_linki = getPostData('resim_linki');
        $boyut = getPostData('boyut');
        $aktif = (int)getPostData('aktif', 1);

        try {
            $stmt = $pdo->prepare("INSERT INTO popup (bonus_detay, bonus_linki, resim_linki, boyut, aktif) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$bonus_detay, $bonus_linki, $resim_linki, $boyut, $aktif]);
            echo json_encode(['success' => true, 'message' => 'Popup başarıyla eklendi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Popup Güncelleme
    case 'update_popup':
        $id = (int)getPostData('id');
        $bonus_detay = getPostData('bonus_detay');
        $bonus_linki = getPostData('bonus_linki');
        $resim_linki = getPostData('resim_linki');
        $boyut = getPostData('boyut');
        $aktif = (int)getPostData('aktif');

        try {
            $stmt = $pdo->prepare("UPDATE popup SET bonus_detay = ?, bonus_linki = ?, resim_linki = ?, boyut = ?, aktif = ? WHERE id = ?");
            $stmt->execute([$bonus_detay, $bonus_linki, $resim_linki, $boyut, $aktif, $id]);
            echo json_encode(['success' => true, 'message' => 'Popup başarıyla güncellendi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Popup Silme
    case 'delete_popup':
        $id = (int)getPostData('id');

        try {
            $stmt = $pdo->prepare("DELETE FROM popup WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Popup başarıyla silindi']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
        }
        break;

    // Geçersiz işlem
    default:
        echo json_encode(['success' => false, 'message' => 'Geçersiz işlem']);
        break;
}
