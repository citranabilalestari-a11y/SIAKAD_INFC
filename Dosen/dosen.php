<?php

require_once "../config.php";

// Hindari error "Undefined index"
$keyword  = isset($_POST['keyword']) ? $_POST['keyword'] : "";
$category = isset($_POST['category']) ? $_POST['category'] : "";

// Jika tombol search ditekan
if (isset($_POST['cari'])) {

    // Jika kategori adalah prodi, lakukan konversi kode huruf -> angka
    if ($category == "prodi") {
        if ($keyword == "INF") $prodi = 1;
        elseif ($keyword == "ARS") $prodi = 2;
        elseif ($keyword == "LING") $prodi = 3;
        else $prodi = 0;

        $sql = "SELECT * FROM dsn WHERE prodi LIKE '%$prodi%'";
    } 
    
    // Selain prodi (nama, nidn, gender)
    else {
        $sql = "SELECT * FROM dsn WHERE $category LIKE '%$keyword%'";
    }

} else {
    // Halaman pertama load → tampilkan semua data
    $sql = "SELECT * FROM dsn";
}

$data = $db->query($sql);

?>


<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">UIN Prof. K.H. Saifuddin Zuhri Purwokerto</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active">Dosen</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Konten -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Card -->
          <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title mb-0 fw-semibold">Data Dosen</h3>

              <div class="d-flex align-items-center">
                <!-- Tombol Tambah -->
                <a href="./?p=tambah-dosen" class="btn btn-success me-3">
                  <i class="bi bi-plus-lg"></i> Tambah 
                </a>

                <!-- Form Pencarian -->
                <form method="post" action="#" class="d-flex align-items-center gap-2">
                  <input 
                    type="text" 
                    name="keyword" 
                    class="form-control w-auto" 
                    placeholder="Masukkan kata kunci"
                    value="<?= $keyword ?>"
                  >
                  <select name="category" class="form-select w-auto">
                    <option value="nidn" <?= $category=="nidn"?"selected":""; ?>>NIDN</option>
                    <option value="nama" <?= $category=="nama"?"selected":""; ?>>Nama</option>
                    <option value="prodi" <?= $category=="prodi"?"selected":""; ?>>Prodi</option>
                    <option value="gender" <?= $category=="gender"?"selected":""; ?>>Jenis Kelamin</option>
                  </select>
                  <input type="submit" name="cari" value="Search" class="btn btn-primary">
                </form>
              </div>
            </div>

            <div class="card-body">
              <?php 
              if ($_POST['cari']) {
                $jumlah = $data->num_rows;
                $nama_kategori = ucfirst($category);
                echo "<p class='text-secondary fst-italic mb-3'>
                Ditemukan <b>$jumlah data</b> dengan kata kunci 
                <b>$keyword</b> pada kategori <b>".strtolower($nama_kategori)."</b>.
                </p>";
              }

              if ($data->num_rows == 0): ?>
                <div class="alert alert-warning text-center">
                  Tidak ada data dosen sesuai kriteria.
                  <?php if (!$_POST['cari']): ?>
                    Klik <b>Tambah Dosen</b> untuk menambahkan data baru.
                  <?php endif; ?>
                </div>
              <?php else: ?>
                <table class="table table-striped table-hover align-middle">
                  <thead class="table-primary text-left">
                    <tr>
                      <th>No</th>
                      <th>NIDN</th>
                      <th>Nama</th>
                      <th>Prodi</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th style="text-align:center;">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($d = $data->fetch_assoc()):
                      // Konversi prodi
                      if ($d['prodi'] == 1) {
                        $prodi = "Informatika";
                      } elseif ($d['prodi'] == 2) {
                        $prodi = "Arsitektur";
                      } elseif ($d['prodi'] == 3) {
                        $prodi = "Ilmu Lingkungan";
                      } else {
                        $prodi = "Tidak diketahui";
                      }

                      // Konversi gender
                      $gender = ($d['gender'] == 'L') ? 'Laki-laki' : 'Perempuan';
                    ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $d['nidn'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $prodi ?></td>
                        <td><?= $gender ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td class="text-center">
                          <a href="./?p=detail-dosen&id=<?= $d['id'] ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-eye"></i> Detail
                          </a>
                          <a href="./?p=edit-dosen&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                          </a>
                          <a href="./?p=hapus-dosen&id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Hapus
                          </a>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              <?php endif; ?>
            </div>
          </div>
          <!-- /Card -->
        </div>
      </div>
    </div>
  </div>
</main>