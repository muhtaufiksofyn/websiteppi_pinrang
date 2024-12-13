<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_name = $_POST['form_name'];
    $form_data = $_POST['form_data'];

    $koneksi->query("INSERT INTO forms (form_name, form_data) VALUES ('$form_name', '$form_data')");
    header("Location: manage_forms.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Formulir</title>
</head>
<body>
    <h1>Tambah Formulir Baru</h1>
    <form method="POST">
        <label for="form_name">Nama Formulir:</label>
        <input type="text" id="form_name" name="form_name" required>
        <label for="form_data">Data Formulir:</label>
        <textarea id="form_data" name="form_data" required></textarea>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
