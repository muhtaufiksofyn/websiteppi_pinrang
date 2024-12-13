<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_ppi_pinrang';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}

// Ambil informasi terbaru dari database
$sql = "SELECT * FROM informasi ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisasi Paskibraka</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #d50000; /* Merah */
            padding: 20px 40px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .header .logo {
            display: flex;
            align-items: center;
        }
        .header .logo img {
            width: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .header h1 {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-info span {
            font-size: 16px;
        }
        .logout-btn {
            background: white;
            color: #d50000;
            padding: 8px 16px;
            border: 2px solid white;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .logout-btn:hover {
            background: #b71c1c;
            color: white;
            border-color: #b71c1c;
        }

        /* Navigation Menu */
        .news-nav {
            background: #b71c1c;
            padding: 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .news-nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .news-nav a {
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: color 0.3s, border-bottom 0.3s;
            padding-bottom: 5px;
        }
        .news-nav a:hover {
            color: #ffcccb;
            border-bottom: 2px solid #ffcccb;
        }
        
        /* Main Content */
        .container {
            flex: 1;
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .info-section h2 {
            font-size: 24px;
            color: #d50000;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .info-section p, .info-section ul {
            font-size: 16px;
            color: #4b5563;
            line-height: 1.6;
        }

        .info-section ul {
            padding-left: 20px;
            list-style: none;
        }

        .info-section ul li {
            margin-bottom: 10px;
        }

        /* Gallery Section */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .gallery img {
            width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        /* Footer */
        .footer {
            background: #b71c1c;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
        }

        /* Social Media Widget */
        .social-widget {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: fixed;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            gap: 15px;
        }
        .social-widget h3 {
            font-size: 18px;
            color: #d50000;
            margin-bottom: 10px;
        }
        .social-widget .icons a {
            font-size: 28px;
            color: #d50000;
            transition: transform 0.3s, color 0.3s;
        }
        .social-widget .icons a:hover {
            transform: scale(1.2);
            color: #b71c1c;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #d50000;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .header .logo {
                margin-bottom: 10px;
            }
            .news-nav ul {
                flex-wrap: wrap;
                gap: 15px;
            }
            .container {
                grid-template-columns: 1fr;
            }
            .gallery {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="assets/images/Logo_putih.png" alt="Logo putih">
            <h1>Purna Paskibraka Indonesia Kabupaten Pinrang</h1>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <?php else: ?>
                
            <?php endif; ?>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="news-nav">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="berita-terbaru.php">Informasi</a></li>
            <li><a href="Devisi.php">Devisi</a></li>
            <li><a href="Kegiatan.php">Kegiatan</a></li>
            <li><a href="kaLaporan.php">Laporan</a></li>
            <li><a href="Galeri.php">Galeri</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="info-section">
            <h2>Selamat Datang di Organisasi Paskibraka</h2>
            <p>Organisasi Paskibraka adalah tempat di mana pemuda dan pemudi Indonesia berkumpul untuk belajar, berlatih, dan menjaga semangat nasionalisme.</p>
        </div>

        <div class="info-section">
            <h2>Berita Terbaru</h2>
            <ul>
                <li>03 Desember 2024: Acara Pelantikan Anggota Baru.</li>
                <li>01 Desember 2024: Latihan Gabungan Antar Kabupaten.</li>
                <li>27 November 2024: Seminar Nasionalisme di Era Digital.</li>
            </ul>
        </div>

        <div class="info-section">
            <h2>Kegiatan Mendatang</h2>
            <ul>
                <li>10 Desember 2024: Upacara Pengibaran Bendera di Hari Pahlawan.</li>
                <li>15 Desember 2024: Lomba Cerdas Cermat Nasionalisme.</li>
                <li>20 Desember 2024: Bakti Sosial di Desa Pinrang.</li>
            </ul>
        </div>

        <div class="info-section">
            <h2>Testimoni Anggota</h2>
            <blockquote>
                <p>"Bergabung dengan Paskibraka Indonesia Kabupaten Pinrang telah memberikan saya kesempatan untuk berkembang dan berkontribusi kepada negara. Pengalaman yang luar biasa!"</p>
                <footer>- Anggota Paskibraka</footer>
            </blockquote>
        </div>

        <!-- Table Section -->
        <div class="info-section">
            <h2>Data Keanggotaan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Anggota Sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MUH. TAUFIK</td>
                        <td>Pinrang</td>
                        <td>2018</td>
                    </tr>
                    <tr>
                        <td>FATHUL AKBAR</td>
                        <td>Makassar</td>
                        <td>2001</td>
                    </tr>
                    <tr>
                        <td>ADNAN</td>
                        <td>Makassar</td>
                        <td>2001</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container">
        <div class="info-section">
            <h2>Galeri Kegiatan Terbaru</h2>
            <div class="gallery">
                <img src="1.jpg" alt="Kegiatan 1">
                <img src="2.jpg" alt="Kegiatan 2">
                <img src="3.jpg" alt="Kegiatan 3">
                <img src="3.jpg" alt="Kegiatan 3">
            </div>
        </div>
    </div>

    <!-- Social Media Widget -->
    <div class="social-widget">
        <h3>Ikuti Kami</h3>
        <div class="icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date('Y'); ?> Purna Paskibraka Indonesia. Semua Hak Dilindungi.
    </footer>
</body>
</html>
