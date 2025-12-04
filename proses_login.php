<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// Cek username dan password
$data = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($data) > 0) {
    $d = mysqli_fetch_assoc($data);

    // Set session
    $_SESSION['isLogin'] = true;
    $_SESSION['username'] = $d['username'];
    $_SESSION['level'] = $d['level'];

    // Arahkan sesuai level
    if ($d['level'] == 'admin') {
        header("Location: admin/?p=admin");
    } elseif ($d['level'] == 'mhs') {
        header("Location: mahasiswa/?p=mahasiswa");
    } elseif ($d['level'] == 'dsn') {
        header("Location: Dosen/?p=dosen");
    }
} else {
    echo "Login gagal! Username atau password salah.";
}
?>