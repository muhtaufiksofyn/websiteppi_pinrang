<?php
// Contoh data divisi dengan foto koordinator
$divisiData = [
    "Devisi Humas" => [
        "deskripsi" => "Divisi Humas adalah bagian dari suatu organisasi yang bertugas menjaga hubungan baik antara organisasi dengan publik.",
        "koordinator" => "Anzar Azis",
        "biografi" => "John Doe memiliki pengalaman lebih dari 5 tahun di bidang pemasaran.",
        "foto_koordinator" => "anzarazis.jpg",
    ],
    "Devisi Minat Dan Bakat" => [
        "deskripsi" => "Divisi Minat dan Bakat fokus pada pengembangan minat dan bakat anggota.",
        "koordinator" => "Emha",
        "biografi" => "Emha memiliki keahlian luar biasa dalam memotivasi anggota untuk mengembangkan potensinya.",
        "foto_koordinator" => "emha.jpg"
    ],
    "Devisi Koperasi" => [
        "deskripsi" => "Divisi Koperasi bertanggung jawab atas aktivitas terkait koperasi.",
        "koordinator" => "Emily Johnson",
        "biografi" => "Emily Johnson adalah seorang HRD dengan pengalaman dalam manajemen sumber daya manusia.",
        "foto_koordinator" => "pocang.jpg",
        "galeri" => ["koperasi_event1.jpg", "koperasi_event2.jpg"]
    ],
    "Devisi SDM" => [
        "deskripsi" => "Divisi SDM adalah mitra strategis bagi manajemen dalam mencapai tujuan organisasi melalui pengelolaan sumber daya manusia secara efektif.",
        "koordinator" => "Kharim",
        "biografi" => "Michael Lee memiliki keahlian di bidang pengembangan SDM selama lebih dari 10 tahun.",
        "foto_koordinator" => "kharim.jpg",
        "galeri" => ["sdm_event1.jpg", "sdm_event2.jpg"]
    ],
    "Devisi Infokom" => [
        "deskripsi" => "Divisi Infokom bertanggung jawab atas pengelolaan teknologi informasi dan komunikasi dalam organisasi.",
        "koordinator" => "David Williams",
        "biografi" => "David Williams adalah seorang ahli teknologi dengan pengalaman dalam pengelolaan infrastruktur IT.",
        "foto_koordinator" => "david_williams.jpg",
        "galeri" => ["infokom_event1.jpg", "infokom_event2.jpg"]
    ]
];
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

        .nav a:hover {
            color: #ff4500;
            transform: translateY(-3px);
        }

        /* Main Content */
        .main-content {
            padding: 40px 20px;
            text-align: center;
        }

        .main-content h2 {
            font-size: 32px;
            color: #d50000;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .divisi-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .divisi-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ddd;
        }

        .divisi-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .divisi-card h3 {
            color: #d50000;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .divisi-card p {
            font-size: 14px;
            color: #777;
        }

        /* Detail Divisi */
        #divisi-detail {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 20px auto;
            display: none;
        }

        #divisi-detail h2 {
            color: #d50000;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        #divisi-detail img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
            border: 2px solid #d50000;
        }

        .profile-info {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-info h4 {
            font-size: 18px;
            color: #d50000;
            font-weight: bold;
        }

        .profile-info p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
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

                html {
            scroll-behavior: smooth;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>Divisi Organisasi Paskibraka</h1>
        <div class="nav">
            <a href="from_data.php">Beranda</a>
            <a href="#">Tentang</a>
            <a href="">Kegiatan</a>
            <a href="#kontak">Kontak</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Divisi Organisasi Kami</h2>
        <div class="divisi-container">
            <?php foreach ($divisiData as $divisi => $data): ?>
                <div class="divisi-card" onclick="showDivisiDetail('<?php echo $divisi; ?>')">
                    <h3><?php echo $divisi; ?></h3>
                    <p><?php echo $data['deskripsi']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Detail Divisi -->
    <div id="divisi-detail">
        <h2 id="divisi-name"></h2>
        <div class="profile-info">
            <img id="divisi-photo" src="" alt="Foto Koordinator">
            <div>
                <h4>Koordinator:</h4>
                <p id="divisi-koordinator"></p>
                <h4>Biografi:</h4>
                <p id="divisi-biografi"></p>
            </div>
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

    <script>
        function showDivisiDetail(divisi) {
            const divisiData = <?php echo json_encode($divisiData); ?>;
            const divisiInfo = divisiData[divisi];
            if (divisiInfo) {
                document.getElementById("divisi-name").innerText = divisi;
                document.getElementById("divisi-koordinator").innerText = divisiInfo.koordinator;
                document.getElementById("divisi-biografi").innerText = divisiInfo.biografi;

                // Menampilkan foto koordinator
                const photo = `images koordinator/${divisiInfo.foto_koordinator}`;
                document.getElementById("divisi-photo").src = photo;

                document.getElementById("divisi-detail").style.display = "block";
            }
        }
    </script>
</body>
</html>
