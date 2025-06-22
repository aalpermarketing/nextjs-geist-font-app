<?php
require_once '../db.php';

// Admin girişi kontrolü
if (!isAdminLoggedIn()) {
    header('Location: login.php');
    exit;
}

// Çıkış işlemi
if (isset($_GET['logout'])) {
    adminLogout();
    header('Location: login.php');
    exit;
}

// Vitrinleri kategorilerine göre çek
$stmt = $pdo->prepare("SELECT * FROM vitrinler WHERE kategori = ? ORDER BY sira ASC");

// VIP vitrinleri çek
$stmt->execute(['vip']);
$vip_vitrinler = $stmt->fetchAll();

// Gold vitrinleri çek
$stmt->execute(['gold']);
$gold_vitrinler = $stmt->fetchAll();

// Silver vitrinleri çek
$stmt->execute(['silver']);
$silver_vitrinler = $stmt->fetchAll();

// Aktif popupları çek
$popup_stmt = $pdo->query("SELECT * FROM popup WHERE aktif = 1 ORDER BY id DESC");
$popuplar = $popup_stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Bahis Vitrini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #1a1a1a;
            color: white;
        }
        .admin-header {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            margin-bottom: 2rem;
        }
        .admin-container {
            padding: 2rem;
        }
        .vitrin-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .btn-admin {
            background: #ffd700;
            border: none;
            color: #1a1a1a;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-admin:hover {
            background: #ffed4a;
            transform: translateY(-2px);
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background: #bb2d3b;
        }
        .section-title {
            color: #ffd700;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #ffd700;
        }
        .welcome-message {
            color: #ffd700;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Admin Panel</h1>
            <div>
                <span class="me-3">Hoş geldin, <?= escape($_SESSION['admin_username']) ?></span>
                <a href="?logout=1" class="btn btn-danger">Çıkış Yap</a>
            </div>
        </div>
    </div>

    <div class="container admin-container">
        <div class="row">
            <!-- VIP Vitrinler -->
            <div class="col-md-4">
                <h2 class="section-title">VIP Vitrinler</h2>
                <?php foreach ($vip_vitrinler as $vitrin): ?>
                    <div class="vitrin-card">
                        <h3><?= escape($vitrin['bonus_baslik']) ?></h3>
                        <p><?= escape($vitrin['bonus_aciklama']) ?></p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-admin btn-sm me-2">Düzenle</button>
                            <button class="btn btn-danger btn-sm">Sil</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-admin w-100 mt-3">Yeni VIP Vitrin Ekle</button>
            </div>

            <!-- Gold Vitrinler -->
            <div class="col-md-4">
                <h2 class="section-title">Gold Vitrinler</h2>
                <?php foreach ($gold_vitrinler as $vitrin): ?>
                    <div class="vitrin-card">
                        <h3><?= escape($vitrin['bonus_baslik']) ?></h3>
                        <p><?= escape($vitrin['bonus_aciklama']) ?></p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-admin btn-sm me-2">Düzenle</button>
                            <button class="btn btn-danger btn-sm">Sil</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-admin w-100 mt-3">Yeni Gold Vitrin Ekle</button>
            </div>

            <!-- Silver Vitrinler -->
            <div class="col-md-4">
                <h2 class="section-title">Silver Vitrinler</h2>
                <?php foreach ($silver_vitrinler as $vitrin): ?>
                    <div class="vitrin-card">
                        <h3><?= escape($vitrin['bonus_baslik']) ?></h3>
                        <p><?= escape($vitrin['bonus_aciklama']) ?></p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-admin btn-sm me-2">Düzenle</button>
                            <button class="btn btn-danger btn-sm">Sil</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-admin w-100 mt-3">Yeni Silver Vitrin Ekle</button>
            </div>
        </div>

        <!-- Popuplar -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="section-title">Aktif Popuplar</h2>
                <div class="row">
                    <?php foreach ($popuplar as $popup): ?>
                        <div class="col-md-4">
                            <div class="vitrin-card">
                                <h3>Popup #<?= $popup['id'] ?></h3>
                                <p><?= escape($popup['bonus_detay']) ?></p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-admin btn-sm me-2">Düzenle</button>
                                    <button class="btn btn-danger btn-sm">Sil</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="btn btn-admin mt-3">Yeni Popup Ekle</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
