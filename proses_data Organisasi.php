<?php
// Koneksi ke database (pastikan Anda memiliki file koneksi.php)
include('koneksi.php');

// Ambil data dari form
$nama_organisasi = $_POST['nama_organisasi'];
$alamat = $_POST['alamat'];
$tanggal_berdiri = $_POST['tanggal_berdiri'];
$ketua = $_POST['ketua'];
$jumlah_anggota = $_POST['jumlah_anggota'];

// Query untuk memasukkan data ke dalam database
$sql = "INSERT INTO organisasi_paskibraka (nama_organisasi, alamat, tanggal_berdiri, ketua, jumlah_anggota) 
        VALUES ('$nama_organisasi', '$alamat', '$tanggal_berdiri', '$ketua', '$jumlah_anggota')";

// Menjalankan query
if (mysqli_query($koneksi, $sql)) {
    echo "Data berhasil disimpan!";
    // Anda bisa mengarahkan pengguna ke halaman lain setelah pengisian berhasil
    // header("Location: success.php");
} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
