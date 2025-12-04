<?php
session_start();


function require_level($required_level): void{
    if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true){
        header("Location: ../index.php");
        exit;
    }

    if ($_SESSION['level'] != $required_level){
        switch($_SESSION['level']){
            case 'admin';
                header(header: "Location: ../admin/?p=admin");
                break;
            case 'mhs';
                header(header: "Location: ../mahasiswa/?p=mahasiswa");
                break;
            case 'dsn';
                header(header: "Location: ../dosen/?p=dosen");
                break;
        }
        exit;
    }
}
?>