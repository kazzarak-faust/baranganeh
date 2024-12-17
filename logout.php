<?php
// Mulai sesi
session_start();

// Menghapus semua session
session_unset();

// Menghancurkan sesi
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: login.html");
exit();
?>
