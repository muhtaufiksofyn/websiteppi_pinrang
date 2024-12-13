<?php
// Contoh data divisi dengan foto koordinator
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisi Organisasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

       /* Header Geometric */
        .header {
            background: #8B0000; /* Merah darah */
            height: 250px; /* Mengurangi tinggi header */
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .header h1 {
            font-size: 40px; /* Menyesuaikan ukuran font agar lebih pas */
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1); /* Sedikit efek transparansi */
            z-index: 1;
        }

        .header h1, .nav {
            z-index: 2;
        }

        .nav {
            display: flex;
            justify-content: center;
            margin-top: 10px; /* Mengurangi jarak antara judul dan menu */
        }

        .nav a {
            font-size: 16px;
            font-weight: 500;
            margin: 0 15px;
            color: white;
            transition: color 0.3s, transform 0.3s;
        }

        .nav a {
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeIn 0.6s forwards;
            animation-delay: calc(0.1s * var(--index));
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* Visi Misi */
        .visi-misi-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background: #fff;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        @media (max-width: 768px) {
    .header h1 {
        font-size: 28px;
    }
    .visi-misi-container {
        flex-direction: column;
    }
}


        .visi-misi-container:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
        }

        .visi-misi {
            max-width: 800px;
            width: 100%;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .visi-misi h2 {
            color: #8B0000;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .visi-misi p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Footer */
        .footer {
            background: #8B0000;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .footer p {
            margin: 0;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            color: white;
            font-size: 24px;
            margin: 0 15px;
            transition: color 0.3s, transform 0.3s;
        }

        .social-icons a:hover {
            color: #ff4500;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>
            Visi Misi Organisasi Purna Paskibraka<br>
            Indonesia Kabupaten Pinrang
        </h1>
        <div class="nav">
            <a href="from_data.php">Beranda</a>
            <a href="#">Tentang</a>
            <a href="">Kegiatan</a>
            <a href="#">Kontak</a>
        </div>
    </header>

    <!-- Visi Misi Wadah -->
    <div class="visi-misi-container">
        <div class="visi-misi">
            <h2>Visi</h2>
            <p>Menjadi organisasi yang unggul dalam membentuk karakter generasi muda yang berdisiplin, bertanggung jawab, dan siap menghadapi tantangan masa depan.</p>

            <h2>Misi</h2>
            <p>1. Menyediakan pelatihan dan pembinaan yang berkualitas bagi anggota untuk meningkatkan keterampilan dan kepemimpinan.</p>
            <p>2. Membangun kerja sama yang solid antara anggota dan masyarakat dalam menciptakan lingkungan yang harmonis dan produktif.</p>
            <p>3. Mengembangkan potensi diri setiap anggota dalam berbagai aspek kehidupan untuk mencapai tujuan bersama.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
        <p>&copy; 2024 Organisasi Paskibraka Kabupaten Pinrang. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>
