<?php
session_start();
session_destroy(); // Menghancurkan session
header("Location: admin_login.php"); // Kembali ke halaman login
exit();
?>
