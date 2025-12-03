<?php
require_once "../config.php";

// Pastikan ada parameter ID
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak ditemukan!');window.location='./?p=dosen';</script>";
  exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM dsn WHERE id = $id";
$result = $db->query($sql);

if ($result->num_rows == 0) {
  echo "<script>alert('Data dosen tidak ditemukan!');window.location='./?p=dosen';</script>";
  exit;
}

$d = $result->fetch_assoc();

// Konversi gender
$jk = ($d['gender'] == "L") ? "Laki-laki" : "Perempuan";

// Konversi prodi
switch ($d['prodi']) {
  case '1': $prodi = "Informatika"; break;
  case '2': $prodi = "Arsitektur"; break;
  case '3': $prodi = "Ilmu Lingkungan"; break;
  default:  $prodi = "Tidak dikenal"; break;
}
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Detail Dosen</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=Dosen">Dosen</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Informasi Dosen</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered align-middle">
                <tr><th width="200">NIDN</th><td><?= htmlspecialchars($d['nidn']) ?></td></tr>
                <tr><th>Nama Lengkap</th><td><?= htmlspecialchars($d['nama']) ?></td></tr>
                <tr><th>Jenis Kelamin</th><td><?= $jk ?></td></tr>
                <tr><th>Alamat</th><td><?= htmlspecialchars($d['alamat']) ?></td></tr>
                <tr><th>Program Studi</th><td><?= $prodi ?></td></tr>
              </table>
              <div class="mt-4">
                <a href="./?p=dosen" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="./?p=edit-dosen&id=<?= $d['id'] ?>" class="btn btn-warning">
                  <i class="bi bi-pencil"></i> Edit Data
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>