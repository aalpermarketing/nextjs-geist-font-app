<?php
session_start();
mb_internal_encoding("UTF-8");
include('db.php');
header('Content-Type: text/html; charset=utf-8');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type'])) {
    $form_type = $_POST['form_type'];

    // Uyarıyı düzenleme
    if ($form_type === 'uyari_duzenle') {
        $uyari_id = $_POST['uyari_id'];
        $icerik = trim($_POST['yeni_uyari_metni']);

        $update_stmt = $pdo->prepare("UPDATE vip_uyari SET icerik = ? WHERE id = ?");
        $update_stmt->execute([$icerik, $uyari_id]);

        $_SESSION['success_message'] = "Uyarı başarıyla güncellendi!";
    }

    // Son aktif uyarıyı silme
    if ($form_type === 'son_uyari_sil') {
        $delete_stmt = $pdo->prepare("DELETE FROM vip_uyari WHERE aktif = 1 LIMIT 1");
        $delete_stmt->execute();

        $_SESSION['success_message'] = "Son aktif uyarı başarıyla silindi!";
    }

    // İşlem sonrası yönlendirme
    header("Location: admin.php");
    exit();
}


// Son aktif uyarıyı silme
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'son_uyari_sil') {
    // 1. Son aktif uyarıyı silme
    $delete_stmt = $pdo->prepare("DELETE FROM vip_uyari WHERE aktif = 1 LIMIT 1");
    $delete_stmt->execute();

    $_SESSION['success_message'] = "Son aktif uyarı başarıyla silindi!";
    header("Location: admin.php");
    exit();
}


// Uyarı ekleme, düzenleme, güncelleme ve silme işlemleri
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_typee'])) {
    $form_type = $_POST['form_typee'];

    // Uyarı ekleme işlemi
    if ($form_type === 'uyari_ekle') {
        $icerik = trim($_POST['yeni_uyari_metni']);

        // 1. Eski aktif uyarıyı silme
        $delete_stmt = $pdo->prepare("DELETE FROM vip_uyari WHERE aktif = 1");
        $delete_stmt->execute();

        // 2. Yeni uyarıyı aktif olarak ekle
        $stmt = $pdo->prepare("INSERT INTO vip_uyari (aktif, icerik) VALUES (1, ?)");
        $stmt->execute([$icerik]);

        $_SESSION['success_message'] = "Yeni uyarı başarıyla eklendi!";
    }

    // Uyarı düzenleme işlemi
    if ($form_type === 'uyari_duzenle') {
        $uyari_id = $_POST['uyari_id'];  // Güncellenecek uyarının ID'si
        $icerik = trim($_POST['yeni_uyari_metni']);  // Yeni uyarı metni

        // 1. Uyarıyı güncelleme
        $update_stmt = $pdo->prepare("UPDATE vip_uyari SET icerik = ? WHERE id = ?");
        $update_stmt->execute([$icerik, $uyari_id]);

        $_SESSION['success_message'] = "Uyarı başarıyla güncellendi!";
    }

    // Uyarı silme işlemi
    if ($form_type === 'uyari_sil') {
        $uyari_id = $_POST['uyari_id'];  // Silinecek uyarının ID'si

        // 1. Uyarıyı silme
        $delete_stmt = $pdo->prepare("DELETE FROM vip_uyari WHERE id = ?");
        $delete_stmt->execute([$uyari_id]);

        $_SESSION['success_message'] = "Uyarı başarıyla silindi!";
    }

    // Yönlendirme
    header("Location: admin.php");
    exit();
}


// Uyarı ekleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'uyari_ekle') {
    $icerik = trim($_POST['yeni_uyari_metni']);

    // 1. Eski aktif uyarıyı silme
    $delete_stmt = $pdo->prepare("DELETE FROM vip_uyari WHERE aktif = 1");
    $delete_stmt->execute();

    // 2. Yeni uyarıyı aktif olarak ekle
    $stmt = $pdo->prepare("INSERT INTO vip_uyari (aktif, icerik) VALUES (1, ?)");
    $stmt->execute([$icerik]);

    $_SESSION['success_message'] = "Yeni uyarı başarıyla eklendi!";
    header("Location: admin.php");
    exit();
}

// Dosya adı temizleme fonksiyonu
function dosyaAdiTemizle($dosyaAdi) {
    $turkce = ['ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç'];
    $duzgun = ['s','s','i','i','g','g','u','u','o','o','c','c'];
    $dosyaAdi = str_replace($turkce, $duzgun, $dosyaAdi);
    $dosyaAdi = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $dosyaAdi);
    return $dosyaAdi;
}

// Admin kontrolü
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login");
    exit();
}

// Çıkış işlemi
if (isset($_GET['cikis'])) {
    session_destroy();
    header("Location: login");
    exit();
}

// Silme işlemi
if (isset($_GET['sil'])) {
    $id = intval($_GET['sil']);
    $pdo->prepare("DELETE FROM vip_reklamlar WHERE id = ?")->execute([$id]);
    $_SESSION['success_message'] = 'Reklam başarıyla silindi!';
    header("Location: admin.php");
    exit();
}

// Düzenleme işlemi
if (isset($_GET['duzenle'])) {
    $id = intval($_GET['duzenle']);
    $reklam = $pdo->prepare("SELECT * FROM vip_reklamlar WHERE id = ?");
    $reklam->execute([$id]);
    $reklam = $reklam->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isim = $_POST['isim'];
        $telefon = $_POST['telefon'];
        $resim = $_FILES['resim']['name'] ? dosyaAdiTemizle($_FILES['resim']['name']) : basename($reklam['resim_yolu']);
        if ($_FILES['resim']['name']) {
            move_uploaded_file($_FILES['resim']['tmp_name'], "images/$resim");
        }

        $pdo->prepare("UPDATE vip_reklamlar SET isim = ?, telefon = ?, resim_yolu = ?, etiket1 = ?, etiket2 = ?, etiket3 = ?, etiket4 = ? WHERE id = ?")
            ->execute([
                $isim, $telefon, "/images/$resim",
                $_POST['etiket1'], $_POST['etiket2'], $_POST['etiket3'], $_POST['etiket4'], $id
            ]);

        $_SESSION['success_message'] = 'Reklam başarıyla güncellendi!';
        header("Location: admin.php");
        exit();
    }
}if (isset($_GET['sabit']) && isset($_GET['id'])) {    $id = (int) $_GET['id'];    $sabit = (int) $_GET['sabit'];    try {        $stmt = $pdo->prepare("UPDATE vip_reklamlar SET sabit = ? WHERE id = ?");        $stmt->execute([$sabit, $id]);        if ($sabit == 1) {            $_SESSION['popup_message'] = "İlan başarıyla sabitlendi.";        } else {            $_SESSION['popup_message'] = "İlan sabitlikten kaldırıldı.";        }        header("Location: admin.php");        exit();    } catch (PDOException $e) {        echo "Hata oluştu: " . $e->getMessage();    }}
// Ekleme işlemi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_GET['duzenle'])) {
    // Verileri düzenle
    $isim = mb_convert_case(trim($_POST['isim']), MB_CASE_TITLE, "UTF-8");
    $telefon = trim($_POST['telefon']);
    $etiket1 = mb_convert_case(trim($_POST['etiket1']), MB_CASE_TITLE, "UTF-8");
    $etiket2 = mb_convert_case(trim($_POST['etiket2']), MB_CASE_TITLE, "UTF-8");
    $etiket3 = mb_convert_case(trim($_POST['etiket3']), MB_CASE_TITLE, "UTF-8");
    $etiket4 = mb_convert_case(trim($_POST['etiket4']), MB_CASE_TITLE, "UTF-8");

    $resim = dosyaAdiTemizle($_FILES['resim']['name']);

    if (move_uploaded_file($_FILES['resim']['tmp_name'], "images/$resim")) {
        $pdo->prepare("INSERT INTO vip_reklamlar (isim, telefon, resim_yolu, etiket1, etiket2, etiket3, etiket4)
                       VALUES (?, ?, ?, ?, ?, ?, ?)")
            ->execute([
                $isim, $telefon, "images/$resim",
                $etiket1, $etiket2, $etiket3, $etiket4
            ]);
        $_SESSION['success_message'] = 'Reklam başarıyla eklendi!';
    } else {
        $_SESSION['error_message'] = 'Resim yüklenemedi, lütfen tekrar deneyin.';
    }

    header("Location: admin.php");
    exit();
}

// Mesajlar
$successMessage = $_SESSION['success_message'] ?? null;
$errorMessage = $_SESSION['error_message'] ?? null;
unset($_SESSION['success_message'], $_SESSION['error_message']);

// Verileri çek
$veriler = $pdo->query("SELECT * FROM vip_reklamlar ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>VIP Reklam Yönetim Paneli</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <style>
    html, body {
        background-color: pink !important;
        background-image: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
</style>
  <style>
    body {
      background: #f7f8fa;
      font-family: 'Arial', sans-serif;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin-top: 40px;
    }

    .card-img-top {
      max-height: 200px;
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .card-img-top:hover {
      transform: scale(1.05);
    }

    .etiket {
      display: inline-block;
      margin: 5px 5px 0 0;
      padding: 8px 12px;
      border-radius: 15px;
      color: white;
      background: #6c757d;
      font-size: 0.85rem;
    }

    .card-body {
      background: #fff;
      border-radius: 10px;
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .btn {
      width: 48%;
      margin-top: 10px;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .card-header {
      background-color: #007bff;
      color: white;
      font-size: 1.2rem;
      padding: 15px;
      border-radius: 10px 10px 0 0;
    }

    .modal-content {
      border-radius: 10px;
    }

    .modal-header {
      border-bottom: 1px solid #dee2e6;
    }

    .modal-body img {
      border-radius: 10px;
    }

    .modal-footer .btn-secondary {
      background-color: #6c757d;
    }

    .header-title {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 40px;
      color: #333;
    }

    h2.mb-4.text-center {
      color: #333;
      font-size: 1.5rem;
      margin-top: 40px;
      margin-bottom: 20px;
    }

  </style>
</head>
<body>

<div class="container">

  <style>
@media (max-width: 600px) {
  .vip-uyari strong {
    font-size: clamp(7px, 2.8vw, 22px) !important;
  }
}
</style>

<?php if (isset($_SESSION['popup_message'])): ?>  
  <div id="popup" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(1); background: linear-gradient(135deg, #28a745, #218838); color: white; padding: 20px 30px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3); z-index: 9999; font-weight: bold; text-align: center; min-width: 300px; animation: popup-in 0.4s ease forwards;">    
    <?= $_SESSION['popup_message'] ?>  
  </div>  

  <style>    
    @keyframes popup-in {      
      0% {        
        transform: translate(-50%, -50%) scale(0.8) rotateX(90deg);        
        opacity: 0;      
      }      
      100% {        
        transform: translate(-50%, -50%) scale(1) rotateX(0deg);        
        opacity: 1;      
      }    
    }    
    @keyframes popup-out {      
      0% {        
        transform: translate(-50%, -50%) scale(1) rotateX(0deg);        
        opacity: 1;      
      }      
      100% {        
        transform: translate(-50%, -50%) scale(0.8) rotateX(90deg);        
        opacity: 0;      
      }    
    }  
  </style>  

  <script>    
    setTimeout(function () {      
      var popup = document.getElementById('popup');      
      if (popup) {        
        popup.style.animation = 'popup-out 0.5s ease forwards';        
        setTimeout(() => popup.remove(), 500);      
      }    
    }, 3000);  
  </script>  

  <?php unset($_SESSION['popup_message']); ?><?php endif; ?>

<div class="vip-uyari" style="
    max-width: 500px; 
    width: 70%;
    margin: 30px auto; 
    padding: 25px; 
    border: none; 
    border-radius: 20px; 
    background: linear-gradient(145deg, #e6e6e6, #ffffff); 
    box-shadow: 6px 6px 14px #d1d1d1, -6px -6px 14px #ffffff; 
    font-family: Arial, sans-serif; 
    text-align: center;">

    <strong style='
        font-size: clamp(10px, 4vw, 32px); 
        color: #007BFF; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);'>
        VIP Reklam Yönetim Paneli
        <br>
    <a href="admin" class="btn btn-primary btn-lg fixed-button" style="bottom: 5px; left: 5px;">
    Ana Sayfaya Dön
  </a>
  <br>
  <a href="?cikis=true" class="btn btn-primary btn-lg fixed-button" style="bottom: 5px; left: 5px;">
    Panelden Çıkış Yap</a>
  <br>
  <button type="button" class="btn btn-primary btn-lg fixed-button" style="bottom: 5px; left: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ana Sayfaya Duyuru Ekle
  </button>
  <br>
<a href="index" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg fixed-button" style="bottom: 5px; left: 5px;">
  Siteyi Gör
</a>

  <br>
    </strong>
    <br>
    <br>
    <style>
        .uyari-alani {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            background: #fdfdfd;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .uyari-alani h3 {
            margin-bottom: 15px;
            font-size: 22px;
            color: #333;
        }

        .uyari-alani p {
            font-size: 16px;
            color: #444;
            margin-bottom: 10px;
        }

        .uyari-alani button {
            padding: 10px 20px;
            font-size: 14px;
            margin-right: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .uyari-alani button:hover {
            opacity: 0.9;
            transform: scale(1.03);
        }

        .btn-duzenle {
            background-color: #fca311;
            color: #fff;
        }

        .btn-sil {
            background-color: #e63946;
            color: #fff;
        }

        .btn-kaydet {
            background-color: #2a9d8f;
            color: #fff;
            margin-top: 10px;
        }

        .btn-vazgec {
            background-color: #6c757d;
            color: white;
            margin-top: 10px;
        }

        .uyari-alani textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 5px;
            resize: vertical;
            transition: border 0.2s;
        }

        .uyari-alani textarea:focus {
            outline: none;
            border-color: #2a9d8f;
        }
    </style>

    <div class="uyari-alani">
        <h3>Son Duyuru</h3>

        <?php
        $select_stmt = $pdo->prepare("SELECT id, icerik FROM vip_uyari WHERE aktif = 1 ORDER BY id DESC LIMIT 1");
        $select_stmt->execute();
        $son_uyari = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($son_uyari):
        ?>
            <p><strong>İçerik:</strong> <span id="uyariMetin"><?= htmlspecialchars($son_uyari['icerik']) ?></span></p>

            <!-- Butonlar -->
            <div id="duzenleSilButonlari">
                <button onclick="duzenlemeBaslat()" class="btn-duzenle">Düzenle</button>

                <form method="POST" action="" onsubmit="return confirm('Son uyarıyı silmek istediğinize emin misiniz?');" style="display: inline;">
                    <input type="hidden" name="form_type" value="son_uyari_sil">
                    <button type="submit" class="btn-sil">Sil</button>
                </form>
            </div>

            <!-- Düzenleme Formu (başta gizli) -->
            <form method="POST" action="" id="duzenlemeFormu" style="margin-top: 15px; display: none;">
                <input type="hidden" name="form_type" value="uyari_duzenle">
                <input type="hidden" name="uyari_id" value="<?= $son_uyari['id'] ?>">

                <label for="yeni_uyari_metni">Yeni Duyuru Metni:</label><br>
                <textarea name="yeni_uyari_metni" rows="3"><?= htmlspecialchars($son_uyari['icerik']) ?></textarea>

                <button type="submit" class="btn-kaydet">Kaydet</button>
                <button type="button" onclick="duzenlemeIptal()" class="btn-vazgec">Vazgeç</button>
            </form>
        <?php else: ?>
            <p>Aktif bir Duyuru bulunmamaktadır.</p>
        <?php endif; ?>
    </div>

    <script>
        function duzenlemeBaslat() {
            document.getElementById('duzenlemeFormu').style.display = 'block';
            document.getElementById('duzenleSilButonlari').style.display = 'none';
        }

        function duzenlemeIptal() {
            document.getElementById('duzenlemeFormu').style.display = 'none';
            document.getElementById('duzenleSilButonlari').style.display = 'block';
        }
    </script>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Duyuru Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" name="form_typee" value="uyari_ekle">

          <!-- Uyarı İçeriği -->
          <label for="yeni_uyari_metni" style="font-weight: bold; margin-bottom: 10px;">Duyuru İçeriği:</label>
          <textarea name="yeni_uyari_metni" rows="3" placeholder="Duyuruyu yazınız..." class="form-control" style="resize: none; margin-top: 10px;"></textarea>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Duyuruyu Ekle</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="vip-uyari" style="
    max-width: 500px; 
    width: 70%;
    margin: 30px auto; 
    padding: 25px; 
    border: none; 
    border-radius: 20px; 
    background: linear-gradient(145deg, #e6e6e6, #ffffff); 
    box-shadow: 6px 6px 14px #d1d1d1, -6px -6px 14px #ffffff; 
    font-family: Arial, sans-serif; 
    text-align: center;">

    <strong style='
        font-size: clamp(10px, 4vw, 32px); 
        color: #007BFF; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);'>
     <script>
// Sayfa yüklendiğinde mesajları kontrol et
window.onload = function() {
    // Hata mesajını kontrol et ve popup olarak göster
    var errorMessage = '<?= isset($errorMessage) ? $errorMessage : ''; ?>';
    if (errorMessage) {
        var errorPopup = new bootstrap.Modal(document.getElementById('errorPopup'));
        errorPopup.show();
    }

    // Başarı mesajını kontrol et ve popup olarak göster
    var successMessage = '<?= isset($successMessage) ? $successMessage : ''; ?>';
    if (successMessage) {
        var successPopup = new bootstrap.Modal(document.getElementById('successPopup'));
        successPopup.show();
    }
}
</script>

<!-- Hata Mesajı için Popup Modal -->
<div class="modal fade" id="errorPopup" tabindex="-1" aria-labelledby="errorPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorPopupLabel">Hata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= isset($errorMessage) ? $errorMessage : 'Bilinmeyen bir hata oluştu.' ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

<!-- Başarı Mesajı için Popup Modal -->
<div class="modal fade" id="successPopup" tabindex="-1" aria-labelledby="successPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successPopupLabel">Başarı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= isset($successMessage) ? $successMessage : 'İşlem başarıyla tamamlandı.' ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
<!-- Ekleme Formu -->
<div class="card mb-4">  
  <div class="card-header"><?= isset($_GET['duzenle']) ? 'Reklamı Düzenle' : 'Yeni Reklam Ekle' ?></div>  
  <div class="card-body">   
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <input type="text" name="isim" class="form-control" value="<?= isset($reklam) ? htmlspecialchars($reklam['isim']) : '' ?>" placeholder="İsim" required>
      </div>
      <div class="mb-3">
        <input type="text" name="telefon" class="form-control" value="<?= isset($reklam) ? htmlspecialchars($reklam['telefon']) : '' ?>" placeholder="Telefon Numarası" required>
      </div>
      <div class="mb-3">
        <input type="file" name="resim" class="form-control" accept="image/*" <?= isset($reklam) ? '' : 'required' ?>>
        <?php if (isset($reklam)): ?>         
          <img src="<?= htmlspecialchars($reklam['resim_yolu']) ?>" class="img-fluid mt-2" alt="Mevcut Resim">
        <?php endif; ?>
      </div>
      <div class="mb-3">
        <input type="text" name="etiket1" class="form-control" value="<?= isset($reklam) ? htmlspecialchars($reklam['etiket1']) : '' ?>" placeholder="Etiket 1" required>
      </div>
      <div class="mb-3">
        <input type="text" name="etiket2" class="form-control" value="<?= isset($reklam) ? htmlspecialchars($reklam['etiket2']) : '' ?>" placeholder="Etiket 2" required>
      </div>


      <button type="submit" class="btn btn-success w-100"><?= isset($reklam) ? 'Güncelle' : 'Kaydet' ?></button>
    </form>
  </div>
</div>
    </strong>
</div>
    <style>
@media (max-width: 600px) {
  .vip-uyari strong {
    font-size: clamp(7px, 2.8vw, 22px) !important;
  }
}
</style>

<div class="vip-uyari" style='
    max-width: 500px; 
    width: 90%;
    margin: 30px auto; 
    padding: 25px; 
    border: none; 
    border-radius: 20px; 
    background: linear-gradient(145deg, #e6e6e6, #ffffff); 
    box-shadow: 6px 6px 14px #d1d1d1, -6px -6px 14px #ffffff; 
    font-family: Arial, sans-serif; 
    text-align: center;'>

    <strong style='
        font-size: clamp(10px, 4vw, 32px); 
        color: #007BFF; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);'>
      EKLENEN REKLAMLAR
		<br>
    </strong>

</div>
<!-- Listeleme --><div class="row">  <?php foreach ($veriler as $veri): ?>    <div class="col-md-6 mb-4">      <div class="card">        <img src="<?= htmlspecialchars($veri['resim_yolu']) ?>" class="card-img-top" alt="<?= $veri['isim'] ?>" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="<?= htmlspecialchars($veri['resim_yolu']) ?>">        <div class="card-body">	          <h5 class="card-title text-center"><?= htmlspecialchars($veri['isim']) ?></h5>          <p class="card-text text-center">📞 <?= htmlspecialchars($veri['telefon']) ?></p>          <div class="d-flex justify-content-center mb-3">            <?php foreach (['etiket1', 'etiket2', 'etiket3', 'etiket4'] as $etiket): ?>              <?php if (!empty($veri[$etiket])): ?>                <span class="etiket"><?= htmlspecialchars($veri[$etiket]) ?></span>              <?php endif; ?>            <?php endforeach; ?>          </div>          <a href="?sil=<?= $veri['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a>          <a href="?duzenle=<?= $veri['id'] ?>" class="btn btn-warning btn-sm">Düzenle</a>          <!-- Sabitleme ve Sabitlikten Kaldırma Butonu -->         <?php if ($veri['sabit'] == 0): ?>    <a href="admin.php?sabit=1&id=<?= $veri['id'] ?>" class="btn btn-primary btn-sm">İlanı Sabitle</a><?php else: ?>    <a href="admin.php?sabit=0&id=<?= $veri['id'] ?>" class="btn btn-danger btn-sm">Sabitlikten Kaldır</a>	<br>	<br>    <span class="badge bg-success">İlan Sabit Ana Sayfada En Üstte Gözükecektir.</span><?php endif; ?>        </div>      </div>    </div>  <?php endforeach; ?></div>

<!-- Resim Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Resim Görüntüle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" class="img-fluid" alt="Resim">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn-3d {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 4px #999, 0 -2px 5px rgba(0,0,0,0.1);
            transition: all 0.2s ease-in-out;
        }

        .btn-3d:active {
            box-shadow: 0 2px #999, 0 -1px 3px rgba(0,0,0,0.1);
            transform: translateY(4px);
        }

        .btn-3d:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
</body>
</html>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Modalda resmi değiştirme
  var imageModal = document.getElementById('imageModal');
  imageModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Butona tıklanarak modal açıldı
    var imageUrl = button.getAttribute('data-image'); // Resmin yolu
    var modalImage = document.getElementById('modalImage');
    modalImage.src = imageUrl; // Modalda resmin kaynağını değiştir
  });
</script>

</body>
</html>

