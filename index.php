<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_penjualan_hp");

// Query untuk mendapatkan data berita
$sql = "SELECT * FROM berita ORDER BY id DESC";
$result = $conn->query($sql);



// Ambil data header
$sql = "SELECT * FROM header_content WHERE id=1";
$result = $conn->query($sql);
$header = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisasi Paskibraka</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
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

        /* Header */
        .header {
            position: relative;
            width: 100%;
            height: 450px;
            background: url('assets/images/Paskibraka.jpg') no-repeat center center/cover;
            color: white;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
        }

        /* Navigation */
        .nav {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            z-index: 2;
            padding: 0 20px;
        }

        .nav .logo {
            font-family: 'Montserrat', sans-serif;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav ul {
            list-style: none;
            display: flex;
        }

        .nav ul li {
            margin: 0 15px;
        }

        .nav ul li a {
            color: white;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav ul li a:hover {
            color: #d50000;
        }

        /* Header Content */
        .header-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .header-content h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 50px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .header-content p {
            font-size: 20px;
            color: #ddd;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        /* Main Content */
        .container {
            padding: 60px 20px;
            text-align: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .container h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 32px;
            color: #d50000;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .container p {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta {
            margin-top: 30px;
        }

        .cta a {
            display: inline-block;
            background: #d50000;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .cta a:hover {
            background: #b71c1c;
            transform: scale(1.05);
        }

        /* Video Section */
        .video-container {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 15px;
            margin-top: 40px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .video-player {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            filter: brightness(0.7); /* Gelapkan video untuk teks lebih jelas */
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Overlay gelap di atas video */
            border-radius: 15px;
        }

        .video-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 2;
            font-family: 'Montserrat', sans-serif;
        }

        .video-text h2 {
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
            margin-bottom: 10px;
        }

        .video-text p {
            font-size: 20px;
            font-weight: 500;
            color: #ddd;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
        }

        /* News Section */
            .news-container {
                display: flex; /* Menyusun item secara horizontal */
                justify-content: space-between; /* Memberi jarak antar item */
                flex-wrap: wrap; /* Membungkus jika terlalu banyak item dalam satu baris */
                gap: 20px; /* Jarak antar berita */
                margin-top: 40px;
            }

            .news-item {
                flex: 1 1 30%; /* Membuat setiap item menempati 30% lebar kontainer, tapi bisa mengecil jika dibutuhkan */
                max-width: 700px; /* Menetapkan lebar maksimum untuk item */
                background: white;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
                transition: transform 0.3s ease;
                margin-bottom: 10px; /* Jarak antar baris */
            }

            .news-item:hover {
                transform: translateY(-5px); /* Efek hover lebih halus */
            }

            .news-item img {
                width: 100%;
                height: 300px; /* Menurunkan tinggi gambar agar lebih pas */
                object-fit: cover;
            }

            .news-item h3 {
                font-size: 20px; /* Ukuran font sedikit lebih kecil */
                font-weight: bold;
                margin: 10px 15px; /* Jarak lebih kecil antara judul dan konten */
            }

            .news-item p {
                font-size: 14px; /* Ukuran font lebih kecil untuk teks */
                margin: 0 15px 15px;
                color: #777;
            }


        /* Footer */
        .footer {
            background: #8B0000;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
        }

        .footer .social-icons {
            margin: 10px 0;
        }

        .footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .footer .social-icons a:hover {
            color: #d50000;
        }

        .footer p {
            margin-top: 10px;
            font-size: 12px;
        }

        html {
    scroll-behavior: smooth;
}


        /* Responsive Layout */
        @media (max-width: 768px) {
            .news-container {
                justify-content: center; /* Menyusun berita agar rata di tengah */
            }

            .news-item {
                max-width: 100%; /* Lebar item lebih besar pada layar kecil */
            }
        }
    </style>
</head>
<body>
<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_penjualan_hp");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data header
$sql = "SELECT * FROM header_content WHERE id=1";
$result = $conn->query($sql);
$header = $result->fetch_assoc();
?>

  <!-- Header -->
    <header class="header">
        <div class="header-overlay"></div>
        <nav class="nav">
            <div class="logo">Paskibraka</div>
            <ul>
                <li><a href="from_data.php">Beranda</a></li>
                <li><a href="about">Tentang</a></li>
                <li><a href="from_kegiatan.php">Kegiatan</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href="organisasi.php">Organisasi</a></li>
                <li><a href="Devisi.php">Devisi</a></li>
            </ul>
        </nav>
        <div class="header-content">
            <h1>Organisasi Purna Paskibraka Indonesia Kabupaten Pinrang</h1>
            <p>Mengabdi dan Menjaga Semangat Nasionalisme</p>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <h2>Selamat Datang</h2>
        <p>
            Kami adalah Organisasi Paskibraka Kabupaten Pinrang yang berkomitmen untuk membina pemuda-pemudi Indonesia menjadi generasi yang tangguh, berkarakter, dan mencintai bangsa.
        </p>
        <div class="cta">
            <a href="from_kegiatan.php">Lihat Kegiatan Kami</a>
        </div>
    </div>
    
    <!-- News Section -->
    <div class="news-container">
        <div class="news-item">
            <img src="images koordinator/penerimaananpaskib.jpg" alt="Berita 1">
            <h3>Penerimaan Anggota Baru</h3>
            <p>Proses penerimaan anggota baru paskibraka di tahun 2024.</p>
        </div>
        <div class="news-item">
            <img src="images koordinator/pengukuhan.jpg" alt="Berita 2">
            <h3>Pengukuhan Anggota</h3>
            <p>Pada acara pengukuhan anggota baru, kami menyaksikan semangat dan dedikasi para peserta yang siap untuk memperkuat organisasi dan berkontribusi pada bangsa.</p>
        </div>
        <div class="news-item">
            <img src="images koordinator/pengibaran.jpg" alt="Berita 3">
            <h3>Upacara Pengibaran Bendera</h3>
            <p>Dalam rangka memperingati Hari Kemerdekaan, anggota Paskibraka Kabupaten Pinrang mengadakan upacara pengibaran bendera yang berlangsung khidmat dan penuh makna.</p>
        </div>
    </div>

    <div class="news-container">
    <?php
    // Cek jika ada hasil query berita
    if ($result->num_rows > 0) {
        // Looping melalui setiap baris hasil query
        while($row = $result->fetch_assoc()) {
            echo '<div class="news-item">';
            echo '<img src="images koordinator/' . $row['gambar'] . '" alt="' . $row['judul'] . '">'; // Pastikan kolom 'gambar' dan 'judul' ada di tabel berita
            echo '<h3>' . $row['judul'] . '</h3>';
            echo '<p>' . substr($row['deskripsi'], 0, 150) . '...</p>'; // Menampilkan deskripsi dengan batasan 150 karakter
            echo '</div>';
        }
    } else {
        echo '<p>Tidak ada berita untuk ditampilkan.</p>';
    }
    ?>
</div>


    <!-- Video Section -->
    <div class="video-container">
        <div class="video-overlay"></div>
        <video class="video-player" controls autoplay loop>
            <source src="images video/videopaskibra2024.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-text">
            <h2>Video Dokumentasi Paskibraka</h2>
            <p>Semangat dan dedikasi kami dalam menjalankan tugas kebangsaan.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" id="kontak">
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
    </div>
    <div class="footer-info">
        <p><strong>Kontak Kami:</strong></p>
        <p>Email: contact@paskibraka.com</p>
        <p>Telp: (021) 123456789</p>
    </div>
    <p>&copy; 2024 Organisasi Paskibraka Kabupaten Pinrang. Semua Hak Dilindungi.</p>
</div>

