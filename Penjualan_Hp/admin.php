<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_penjualan_hp");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses update header content
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];

    if ($gambar) {
        $target = "uploads/" . basename($gambar);
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
            $sql = "UPDATE header_content SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=1";
        }
    } else {
        $sql = "UPDATE header_content SET judul='$judul', deskripsi='$deskripsi' WHERE id=1";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Header berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fungsi untuk menambahkan berita
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $target = "uploads/" . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO berita (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
        $conn->query($sql);
    }
}

// Fungsi untuk menghapus berita
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM berita WHERE id = $id";
    $conn->query($sql);
}

// Fungsi untuk memperbarui berita
if (isset($_POST['updateBerita'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $target = "uploads/" . basename($gambar);
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
            $sql = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
        }
    } else {
        $sql = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
    }
    $conn->query($sql);
}

// Ambil data berita
$sql = "SELECT * FROM berita ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Organisasi Paskibraka</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f9fafc;
        }

        .sidebar {
            width: 250px;
            background-color: #d50000;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #b71c1c;
        }

        .sidebar .active {
            background-color: #b71c1c;
        }

        .main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .header {
            background-color: #d50000;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            background-color: #d50000;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #b71c1c;
        }

        .button-group a, .button-group button {
            padding: 10px 15px;
            margin-right: 5px;
            text-decoration: none;
            color: white;
            background-color: #d50000;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button-group a:hover, .button-group button:hover {
            background-color: #b71c1c;
        }

        img {
            max-width: 100px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin.php" class="active">Beranda</a>
        <a href="#">Kegiatan</a>
        <a href="#">Organisasi</a>
        <a href="#">Divisi</a>
    </div>

    <div class="main">
        <div class="header">
            <h1>Halaman Admin</h1>
        </div>

        <h2>Tambah Berita</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="judul" placeholder="Judul Berita" required>
            <textarea name="deskripsi" placeholder="Deskripsi Berita" rows="5" required></textarea>
            <input type="file" name="gambar" required>
            <button type="submit" name="tambah">Tambah Berita</button>
        </form>

        <h2>Daftar Berita</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= !empty($row['deskripsi']) ? substr($row['deskripsi'], 0, 50) . '...' : 'Deskripsi tidak tersedia' ?></td>
                        <td>
                            <?php 
                            $filePath = "uploads/" . $row['gambar'];
                            if (file_exists($filePath)): ?>
                                <img src="<?= $filePath ?>" alt="<?= $row['judul'] ?>">
                            <?php else: ?>
                                <span>Gambar tidak tersedia</span>
                            <?php endif; ?>
                        </td>
                        <td class="button-group">
                            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <?php if (isset($_GET['edit'])): ?>
            <?php
            $id = $_GET['edit'];
            $editSql = "SELECT * FROM berita WHERE id=$id";
            $editResult = $conn->query($editSql);
            $editData = $editResult->fetch_assoc();
            ?>
            <h2>Edit Berita</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
                <input type="text" name="judul" value="<?= $editData['judul'] ?>" required>
                <textarea name="deskripsi" rows="5" required><?= $editData['deskripsi'] ?></textarea>
                <input type="file" name="gambar">
                <button type="submit" name="updateBerita">Update Berita</button>
            </form>
        <?php endif; ?>

    </div>
</body>
</html>
