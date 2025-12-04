<?php
$idx = $_GET['id'];
require_once "../config.php";
$sql = "delete from dsn where id='$idx'";
if ($db->query($sql)) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href='./?p=dosen';
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus');
        window.location.href='./?p=dosen';
    </script>";
}
?>