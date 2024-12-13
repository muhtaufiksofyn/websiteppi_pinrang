<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include('db_penjualan_hp.php'); // Pastikan Anda sudah menyiapkan koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // SQL untuk menambahkan informasi ke database
    $query = "INSERT INTO informasi (title, content) VALUES ('$title', '$content')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman home setelah data berhasil ditambahkan
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
