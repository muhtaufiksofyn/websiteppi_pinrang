<?php
include 'koneksi.php';

// Masukkan username dan password admin
$username = 'admin'; // Ganti dengan username admin yang diinginkan
$new_password = 'admin123'; // Ganti dengan password admin yang diinginkan

// Enkripsi password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Insert admin ke database dengan role 'admin'
$query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'admin')";
if ($koneksi->query($query)) {
    echo "Admin berhasil ditambahkan!";
} else {
    echo "Gagal menambahkan admin: " . $koneksi->error;
}
?>
