<?php
session_start();
if (isset($_SESSION['id']) || (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true)) {
    header("Location: admin");
    exit;
}

require_once 'db.php'; // PDO bağlantısı

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Şifreyi de al

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: nela");
        exit;
    } else {
        $error_message = "Geçersiz kullanıcı adı veya şifre!";
    }
}
?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1E5D74, #70D0D6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
            flex-direction: column;
            overflow: hidden;
            box-sizing: border-box;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            margin-bottom: 40px;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
            width: 100%;
        }

        .input-group label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: border 0.3s;
            box-sizing: border-box;
        }

        .input-group input:focus {
            border-color: #70D0D6;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background-color: #1E5D74;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #70D0D6;
        }

        /* Hata ve başarı mesajı stil */
        .error-message, .success-message {
            font-size: 14px;
            margin-top: 15px;
            padding: 10px;
            border-radius: 8px;
            opacity: 1;
            animation: fadeInOut 3s forwards;
            display: none; /* Başlangıçta gizli */
        }

        .error-message {
            background-color: #F8D7DA;
            color: #721C24;
            border: 1px solid #F5C6CB;
        }

        .success-message {
            background-color: #D4EDDA;
            color: #155724;
            border: 1px solid #C3E6CB;
        }

        /* Geçici gösterme ve gizleme animasyonu */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        .footer {
            background-color: #1E5D74;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            border-top: 1px solid #ddd;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            box-sizing: border-box;
        }

        .footer p {
            margin: 0;
        }

        .footer-links {
            margin-top: 15px;
        }

        .footer-icon {
            margin: 0 15px;
            display: inline-block;
        }

        .footer-icon i {
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .footer-icon:hover i {
            transform: scale(1.2);
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            opacity: 0.8;
        }

        /* Mobil uyumluluk için */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
                margin: 0;
            }

            h2 {
                font-size: 24px;
            }

            .input-group input, .btn {
                font-size: 16px;
                padding: 12px;
            }

            .footer {
                font-size: 12px;
                padding: 15px 0;
            }

            .footer-links {
                margin-top: 10px;
            }

            .footer-icon {
                margin: 0 8px;
            }

            .footer-icon i {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Admin Girişi</h2>

    <!-- Hata ve Başarı Mesajları -->
    <?php if (isset($error_message) && $error_message != ''): ?>
        <div class="error-message" id="error-message"><?php echo $error_message; ?></div>
    <?php elseif (isset($success_message) && $success_message != ''): ?>
        <div class="success-message" id="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
<br>
    <form action="login" method="POST">
        <div class="input-group">
            <label for="username">Kullanıcı Adı</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Şifre</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Giriş Yap</button>
    </form>
</div>

<!-- Footer Bölümü -->
<div class="footer">
    <p>&copy; 2024 Admin Panel <b> | Her Hakkı Saklıdır |</b></p>
    <div class="footer-links">
       <a href="https://sdweb.tr" target="_blank">
            <i class="fa-solid fa-s"></i>
			<i class="fa-solid fa-d"></i>
			<i class="fa-solid fa-w"></i>
			<i class="fa-solid fa-e"></i>
			<i class="fa-solid fa-b"></i>
			<i class="fa-solid fa-">.</i>
			<i class="fa-solid fa-t"></i>
			<i class="fa-solid fa-r"></i>   
        </a>
    </div>
</div>

<script>
    // Hata mesajını göster
    <?php if (isset($error_message) && $error_message != ''): ?>
        document.getElementById("error-message").style.display = 'block';
        setTimeout(function() {
            document.getElementById("error-message").style.display = 'none';
        }, 3000);
    <?php endif; ?>

    // Başarı mesajını göster
    <?php if (isset($success_message) && $success_message != ''): ?>
        document.getElementById("success-message").style.display = 'block';
        setTimeout(function() {
            document.getElementById("success-message").style.display = 'none';
        }, 3000);
    <?php endif; ?>
</script>

</body>
</html>
