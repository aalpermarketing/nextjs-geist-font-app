<?php
require_once '../db.php';

// Zaten giriş yapmışsa yönetim paneline yönlendir
if (isAdminLoggedIn()) {
    header('Location: index.php');
    exit;
}

$error = '';

// Form gönderilmişse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Kullanıcı adı ve şifre gereklidir.';
    } else {
        if (checkAdminLogin($username, $password)) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Geçersiz kullanıcı adı veya şifre.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi - Bahis Vitrini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #1a1a1a;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
        }
        .login-header {
            text-align: center;
            color: #ffd700;
            margin-bottom: 2rem;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffd700;
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }
        .btn-login {
            background: #ffd700;
            border: none;
            color: #1a1a1a;
            font-weight: 600;
            padding: 0.75rem;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: #ffed4a;
            transform: translateY(-2px);
        }
        .error-message {
            color: #ff4444;
            text-align: center;
            margin-top: 1rem;
        }
        .form-label {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Admin Girişi</h2>
        </div>
        
        <?php if ($error): ?>
            <div class="error-message"><?= escape($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-login">Giriş Yap</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
