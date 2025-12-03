<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];

    $sql = "INSERT INTO mhs (nim, nama, gender, alamat, prodi) VALUES ('$nim', '$nama', '$gender', '$alamat', '$prodi')";
    if ($db->query($sql)) {
        echo "<script>alert('Data berhasil disimpan!');window.location='?p=mahasiswa';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . $db->error . "');</script>";
    }
}
?>

<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Tambah Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=mahasiswa">Mahasiswa</a></li>
            <li class="breadcrumb-item active">Tambah</li>
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
          <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Form Tambah Mahasiswa</h5>
            </div>
            <div class="card-body">
              <form method="post">
                <table class="table table-bordered table-striped align-middle">
                  <tr>
                    <th width="200">NIM</th>
                    <td>
                      <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                    </td>
                  </tr>

                  <tr>
                    <th>Nama Lengkap</th>
                    <td>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </td>
                  </tr>

                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                      <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="L" id="genderL" class="form-check-input" required>
                        <label for="genderL" class="form-check-label">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="P" id="genderP" class="form-check-input">
                        <label for="genderP" class="form-check-label">Perempuan</label>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th>Alamat</th>
                    <td>
                      <textarea name="alamat" class="form-control" placeholder="Masukkan alamat" rows="3"></textarea>
                    </td>
                  </tr>

                  <tr>
                    <th>Program Studi</th>
                    <td>
                      <select name="prodi" class="form-select" required>
                        <option value="">-- Pilih Prodi --</option>
                        <option value="1">Informatika</option>
                        <option value="2">Arsitektur</option>
                        <option value="3">Ilmu Lingkungan</option>
                      </select>
                    </td>
                  </tr>
                </table>

                <div class="mt-3 text-end">
                  <button type="submit" class="btn btn-primary px-4">Simpan</button>
                  <a href="?p=mahasiswa" class="btn btn-secondary px-4 ms-2">Batal</a>
                </div>
              </form>
            </div>
          </div> <!-- /card -->
        </div>
      </div>
    </div>
  </div>
</main>