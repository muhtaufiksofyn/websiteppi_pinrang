<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            color: #b30000;
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
    font-size: 50px; /* Memperbesar ukuran font header */
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin: 0; /* Menghilangkan margin agar teks lebih rata */
    color: white; /* Mengubah warna teks menjadi putih */
}

.nav {
    display: flex;
    justify-content: center;
    margin-top: 10px; /* Mengurangi jarak antara judul dan menu */
}

.nav a {
    font-size: 18px; /* Memperbesar ukuran font menu */
    font-weight: 500;
    margin: 0 15px;
    color: white; /* Mengubah warna teks menu menjadi putih */
    text-decoration: none; /* Menghilangkan garis bawah pada tautan */
    transition: color 0.3s, transform 0.3s;
}

.nav a:hover {
    color: #ff4500; /* Mengubah warna saat hover */
    transform: translateY(-3px); /* Efek gerakan saat hover */
}



       /* Content and Footer Styles */
h1 {
    font-size: 40px; /* Sesuaikan ukuran font dengan header dari form devisi */
    margin: 40px 0;
    text-align: center;
    color: #d50000; /* Merah darah untuk judul */
    font-weight: bold; /* Menebalkan teks */
}


        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Ukuran gambar lebih besar */
            gap: 20px;
            width: 90%;
            max-width: 1000px; /* Batas maksimal lebar galeri */
            margin: 0 auto 30px;
            padding: 15px;
        }

        .gallery-item {
            position: relative;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd; /* Border tambahan */
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 180px; /* Batas tinggi gambar */
            object-fit: cover;
            border-radius: 8px;
        }

        .gallery-item h3 {
            color: #d50000;
            font-size: 20px;
            margin-top: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .description {
            margin-top: 8px;
            font-size: 14px;
            color: #555;
        }

        .location {
            font-size: 12px;
            color: #b30000;
        }

        /* Footer */
        .footer {
            background: #8B0000;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            margin-top: auto;
        }

        .footer .social-icons {
            margin-bottom: 10px;
        }

        .footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .footer .social-icons a:hover {
            color: #FF4500;
        }

        .footer p {
            font-size: 12px;
            margin: 0;
        }

            @media (max-width: 768px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Menyesuaikan ukuran gambar di perangkat kecil */
        }

        .header h1 {
            font-size: 30px; /* Mengurangi ukuran header di perangkat kecil */
        }

        .nav a {
            font-size: 14px; /* Menyesuaikan ukuran font menu */
        }
    }

    html {
            scroll-behavior: smooth;
        }

    </style>
</head>
<body>

   <!-- Header Galeri Kegiatan -->
<header class="header">
    <h1>Galeri Kegiatan</h1>
    <div class="nav">
        <a href="from_data.php">Beranda</a>
        <a href="#">Tentang</a>
        <a href="devisi.php">Devisi</a>
        <a href="from_kegiatan.php">Kegiatan</a>
        <a href="#kontak">Kontak</a>
    </div>
</header>


    <h1>Kegiatan</h1>

    <div class="gallery">
        <div class="gallery-item">
            <img src="images koordinator/galeri1.jpg" alt="Image 1">
            <h3>Kegiatan 1</h3>
            <div class="description">Deskripsi kegiatan 1: Ini adalah gambar pertama dari kegiatan.</div>
            <div class="location">Lokasi: Stadion Bau Massepe</div>
        </div>
        <div class="gallery-item">
            <img src="images koordinator/galeri2.jpg" alt="Image 2">
            <h3>Kegiatan 2</h3>
            <div class="description">Deskripsi kegiatan 2: Gambar kedua menunjukkan kegiatan lain.</div>
            <div class="location">Lokasi: Bandung</div>
        </div>
        <div class="gallery-item">
            <img src="images koordinator/kegiatan3.jpg" alt="Image 3">
            <h3>Kegiatan 3</h3>
            <div class="description">Deskripsi kegiatan 3: Ini adalah gambar dari kegiatan ketiga.</div>
            <div class="location">Lokasi: Surabaya</div>
        </div>
        <div class="gallery-item">
            <img src="images koordinator/kegiatan4.jpg" alt="Image 4">
            <h3>Kegiatan 4</h3>
            <div class="description">Deskripsi kegiatan 4: Gambar kegiatan keempat yang diambil pada acara.</div>
            <div class="location">Lokasi: Yogyakarta</div>
        </div>
        <div class="gallery-item">
            <img src="images koordinator/kegiatan5.jpg" alt="Image 5">
            <h3>Kegiatan 5</h3>
            <div class="description">Deskripsi kegiatan 5: Gambar kelima menggambarkan kegiatan selanjutnya.</div>
            <div class="location">Lokasi: Bali</div>
        </div>
        <div class="gallery-item">
            <img src="images koordinator/kegiatan6.jpg" alt="Image 6">
            <h3>Kegiatan 6</h3>
            <div class="description">Deskripsi kegiatan 6: Ini adalah gambar terakhir dari seri kegiatan ini.</div>
            <div class="location">Lokasi: Medan</div>
        </div>
    </div>

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
    </footer>

</body>
</html>
