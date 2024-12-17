<?php
// Menghubungkan ke database
include 'config.php';

// Mengecek apakah form dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form menggunakan $_POST
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validasi sederhana: pastikan tidak ada field yang kosong
    if (empty($nama) || empty($email) || empty($password)) {
        echo "Semua field harus diisi!";
        exit;
    }

    // Hash password untuk keamanan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar!";
        exit;
    }

    // Menyimpan data pengguna ke database
    $insertQuery = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Registrasi berhasil! <a href='login.html'>Login di sini</a>";
    } else {
        echo "Terjadi kesalahan saat registrasi: " . mysqli_error($conn);
    }

    // Menutup koneksi
    mysqli_close($conn);
}
?>
