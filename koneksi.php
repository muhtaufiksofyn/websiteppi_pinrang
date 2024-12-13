<?php
$host = 'localhost';      // Host database
$username = 'root';       // Username database
$password = '';           // Password database
$dbname = 'db_penjualan_hp'; // Nama database

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi database
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
