<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
session_start();
if($_SESSION['isLogin'] != true || $_SESSION['level'] != "dsn") {
    header("location:../index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Siakad UIN Saizu</title>
    <link rel="stylesheet" href="../assets/css/adminlte.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="sidebar-expand-lg sidebar-open bg-body-tertiary">
<div class="app-wrapper">

    <!-- HEADER DAN NAVBAR (sama seperti file kamu) -->

    <!-- SIDEBAR -->
    <aside class="app-sidebar bg-primary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="./?p=dashboard" class="brand-link">
                <img src="../assets/img/logouin.jpg" alt="logouin" class="brand-image opacity-75 shadow">
                <span class="brand-text fw-light">SIAKAD UIN SAIZU</span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU UTAMA</li>
                    <li class="nav-item">
                        <a href="./?p=dashboard" class="nav-link">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./?p=dosen" class="nav-link">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>Dosen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./?p=mahasiswa" class="nav-link">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./?p=gantipwd" class="nav-link">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>Ganti Password</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- APP MAIN -->
    <div class="app-main">
        <?php require_once "route.php"; ?>
    </div>

</div>
<script src="../assets/js/adminlte.js"></script>
</body>
</html>
