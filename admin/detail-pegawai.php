<?php
require_once "../config.php";

// Pastikan ada parameter ID
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak ditemukan!');window.location='./?p=pegawai';</script>";
  exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM pegawai WHERE id = $id"; // GANTI TABEL JIKA PERLU
$result = $db->query($sql);

if ($result->num_rows == 0) {
  echo "<script>alert('Data pegawai tidak ditemukan!');window.location='./?p=pegawai';</script>";
  exit;
}

$d = $result->fetch_assoc();

// Konversi gender
$jk = ($d['gender'] == "L") ? "Laki-laki" : "Perempuan";
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Detail Pegawai</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=Pegawai">Pegawai</a></li>
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
              <h5 class="mb-0">Informasi Pegawai</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered align-middle">
                <tr><th width="200">NIP</th><td><?= htmlspecialchars($d['NIP']) ?></td></tr>
                <tr><th>Nama</th><td><?= htmlspecialchars($d['Nama']) ?></td></tr>
                <tr><th>Gender</th><td><?= $jk ?></td></tr>
                <tr><th>Jabatan</th><td><?= htmlspecialchars($d['Jabatan']) ?></td></tr>
                <tr><th>Nomor_Telepon</th><td><?= htmlspecialchars($d['Nomor_Telepon']) ?></td></tr>
                <tr><th>Email</th><td><?= htmlspecialchars($d['Email']) ?></td></tr>
              </table>

              <div class="mt-4">
                <a href="./?p=pegawai" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="./?p=edit-pegawai&id=<?= $d['id'] ?>" class="btn btn-warning">
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
