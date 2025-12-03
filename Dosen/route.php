<?php

$p=$_GET ['p']; //URL

switch($p){
    
    case 'hapus-mahasiswa': require_once "hapus-mahasiswa.php";break;
    case 'edit-mahasiswa': require_once "edit-mahasiswa.php";break;
    case 'detail-mahasiswa': require_once "detail-mahasiswa.php";break;
    case 'mahasiswa': require_once "mahasiswa.php";break;
    case 'tambah-mahasiswa';require_once "tambah-mahasiswa.php";break;

    case 'pegawai':require_once "pegawai.php";break;

    case 'edit-dosen' ; require_once "edit-dosen.php";break;
    case 'detail-dosen';require_once "detail-dosen.php";break;
    case 'hapus-dosen';require_once "hapus-dosen.php";break;
    case 'tambah-dosen';require_once "tambah-dosen.php";break;
    case 'dosen': require_once "Dosen.php"; break;
    case 'gantipwd':require_once "gantipassword.php";break;

    default:
        require_once "dashboard.php";
        break;
    
}
?>