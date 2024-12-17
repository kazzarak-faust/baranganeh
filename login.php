<?php
// Pastikan session_start hanya dipanggil sekali
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Menghubungkan ke database
include 'config.php';

// Memeriksa jika form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi untuk memastikan username dan password diisi
    if (empty($username) || empty($password)) {
        echo "Username dan password harus diisi!";
        exit;
    }

    // Mencari username di database
    $query = "SELECT * FROM users WHERE nama = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "Username tidak ditemukan!";
        exit;
    }

    // Ambil data pengguna
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password dengan password_verify()
    if (password_verify($password, $user['password'])) {
        // Menyimpan data pengguna dalam session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nama']; // Menyimpan nama pengguna untuk keperluan lain

        // Redirect ke halaman beranda atau halaman yang diinginkan setelah login
        header("Location: index.html");
        exit();
    } else {
        echo "Password salah!";
    }
    
    // Menutup koneksi
    mysqli_close($conn);
}
?>
