<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

include 'koneksi.php';

$forms = $koneksi->query("SELECT * FROM forms");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Formulir</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-management-container">
        <h1>Kelola Formulir</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Formulir</th>
                    <th>Data</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($form = $forms->fetch_assoc()): ?>
                <tr>
                    <td><?= $form['id'] ?></td>
                    <td><?= $form['form_name'] ?></td>
                    <td><?= $form['form_data'] ?></td>
                    <td>
                        <a href="edit_form.php?id=<?= $form['id'] ?>">Edit</a> |
                        <a href="delete_form.php?id=<?= $form['id'] ?>" onclick="return confirm('Hapus formulir ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="add_form.php">Tambah Formulir Baru</a>
    </div>
</body>
</html>
