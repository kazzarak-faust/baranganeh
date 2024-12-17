<?php
$servername = "localhost";
$username = "root"; // Default username untuk XAMPP
$password = ""; // Default password untuk XAMPP (kosongkan)
$dbname = "baranganeh"; // Nama database Anda

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
