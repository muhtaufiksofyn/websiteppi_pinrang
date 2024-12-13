<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Periksa apakah email terdaftar
    $query = "SELECT * FROM users WHERE email = '$email' AND role = 'admin'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Buat token reset password
        $token = bin2hex(random_bytes(32));
        $expire_time = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token berlaku 1 jam

        // Simpan token ke database
        $koneksi->query("UPDATE users SET reset_token = '$token', token_expiry = '$expire_time' WHERE email = '$email'");

        // Kirim email ke admin
        $reset_link = "http://localhost/Penjualan_Hp/reset_password.php?token=$token";
        $subject = "Reset Password";
        $message = "Klik tautan berikut untuk mereset password Anda: $reset_link";
        $headers = "From: noreply@example.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "<p class='success-message'>Tautan reset password telah dikirim ke email Anda.</p>";
        } else {
            echo "<p class='error-message'>Gagal mengirim email. Coba lagi nanti.</p>";
        }
    } else {
        echo "<p class='error-message'>Email tidak ditemukan!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Arial', sans-serif;
            background: url('assets/images/paskibraka.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        /* Form container styling */
        .form-container {
            background: rgba(0, 0, 0, 0.7); /* Transparan hitam */
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: slideIn 0.8s ease-out;
        }

        /* Animation for form */
        @keyframes slideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Form title */
        .form-container h2 {
            font-size: 24px;
            color: #FF6347;
            margin-bottom: 20px;
        }

        /* Input styling */
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        /* Button styling */
        .form-container button {
            width: 100%;
            padding: 12px;
            background: #FF6347;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-container button:hover {
            background: #8B0000;
        }

        /* Error & Success message styling */
        .error-message {
            color: #FF6347;
            font-size: 14px;
            margin-top: 10px;
        }

        .success-message {
            color: #32CD32;
            font-size: 14px;
            margin-top: 10px;
        }

        .form-container p {
            margin-top: 10px;
            font-size: 14px;
        }

        .form-container p a {
            color: #FF6347;
            text-decoration: none;
            font-weight: bold;
        }

        .form-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Lupa Password</h2>
        <form method="POST" action="">
            <label for="email">Masukkan Email:</label>
            <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
            <button type="submit">Kirim Tautan Reset</button>
        </form>
        <p><a href="admin_login.php">Kembali ke Login</a></p>
    </div>
</body>
</html>
