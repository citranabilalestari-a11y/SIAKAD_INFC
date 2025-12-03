<?php
require_once "../config.php";

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID dosen tidak ditemukan!'); window.location='./?p=dosen';</script>";
    exit;
}

$id = $_GET['id'];
$result = $db->query("SELECT * FROM dsn WHERE id = '$id'");

if ($result->num_rows == 0) {
    echo "<script>alert('Data dosen tidak ditemukan!'); window.location='./?p=dosen';</script>";
    exit;
}

$dsn = $result->fetch_assoc();

// Proses jika tombol simpan ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE dsn 
            SET nidn='$nidn', nama='$nama', gender='$gender', alamat='$alamat', prodi='$prodi' 
            WHERE id='$id'";

    if ($db->query($sql)) {
        echo "<script>
                alert('Data dosen berhasil diperbarui!');
                window.location='./?p=dosen';
              </script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data: " . addslashes($db->error) . "');</script>";
    }
}
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Dosen</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=dosen">Dosen</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Form Edit Dosen</h5>
            </div>
            <div class="card-body">
              <form method="post">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 200px;">NIDN</th>
                    <td><input type="text" name="nidn" class="form-control" value="<?= htmlspecialchars($dsn['nidn']) ?>" required></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($dsn['nama']) ?>" required></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="L" id="genderL" <?= ($dsn['gender'] == 'L') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="genderL">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="P" id="genderP" <?= ($dsn['gender'] == 'P') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="genderP">Perempuan</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($dsn['alamat']) ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Program Studi</th>
                    <td>
                      <select name="prodi" class="form-select" required>
                        <option value="">-- Pilih Prodi --</option>
                        <option value="1" <?= ($dsn['prodi'] == 1) ? 'selected' : '' ?>>Informatika</option>
                        <option value="2" <?= ($dsn['prodi'] == 2) ? 'selected' : '' ?>>Arsitektur</option>
                        <option value="3" <?= ($dsn['prodi'] == 3) ? 'selected' : '' ?>>Ilmu Lingkungan</option>
                      </select>
                    </td>
                  </tr>
                </table>

                <div class="text-start mt-3">
                  <button type="submit" class="btn btn-success px-4">💾 Simpan Perubahan</button>
                  <a href="./?p=dosen" class="btn btn-secondary px-4">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>