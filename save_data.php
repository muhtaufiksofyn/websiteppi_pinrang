<?php
include 'config.php';

// Ambil data dari form
$nama_organisasi = mysqli_real_escape_string($conn, $_POST['nama_organisasi']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$tanggal_berdiri = mysqli_real_escape_string($conn, $_POST['tanggal_berdiri']);
$ketua = mysqli_real_escape_string($conn, $_POST['ketua']);
$jumlah_anggota = mysqli_real_escape_string($conn, $_POST['jumlah_anggota']);

// Query untuk menyimpan data
$query = "INSERT INTO organisasi_paskibraka (nama_organisasi, alamat, tanggal_berdiri, ketua, jumlah_anggota)
          VALUES ('$nama_organisasi', '$alamat', '$tanggal_berdiri', '$ketua', '$jumlah_anggota')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan!";
    echo "<br><a href='form_data.php'>Kembali ke Form</a>";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
