<?php

// Atur zona waktu ke Asia/Jakarta biar sesuai dengan jam di Indonesia
date_default_timezone_set("Asia/Jakarta");

// Format tanggal dan waktu
$hari  = date("l");       // Hari (Monday, Tuesday, dst)
$tanggal = date("d");     // Tanggal (01 - 31)
$bulan = date("F");       // Bulan (January, February, dst)
$tahun = date("Y");       // Tahun (2025, dll)
$jam   = date("H:i:s");   // Jam (24 jam:menit:detik)
$coba = 

// Tampilkan hasilnya
echo "Nama saya wafa, hari ini $hari, $tanggal $bulan $tahun $jam<br>";

?>