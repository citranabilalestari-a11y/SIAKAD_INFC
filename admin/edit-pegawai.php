<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../config.php";

// Cek apakah ID pegawai dikirim
if (!isset($_GET['id'])) {
    echo "<script>alert('ID pegawai tidak ditemukan!'); window.location='./?p=pegawai';</script>";
    exit;
}

$id = $_GET['id'];
$result = $db->query("SELECT * FROM pegawai WHERE id = '$id'");

if ($result->num_rows == 0) {
    echo "<script>alert('Data pegawai tidak ditemukan!'); window.location='./?p=pegawai';</script>";
    exit;
}

$pgw = $result->fetch_assoc();

// Proses ketika tombol simpan ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip     = $_POST['NIP'];
    $nama    = $_POST['Nama'];
    $jabatan = $_POST['Jabatan'];
    $gender  = $_POST['Gender'];
    $telepon = $_POST['Nomor_Telepon'];
    $email   = $_POST['Email'];
    $sql = "UPDATE pegawai 
            SET NIP='$nip', Nama='$nama', Jabatan='$jabatan', Gender='$gender', Nomor_Telepon='$telepon', Email='$email'
            WHERE id='$id'";

    if ($db->query($sql)) {
        echo "<script>
                alert('Data pegawai berhasil diperbarui!');
                window.location='./?p=pegawai';
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
          <h3 class="mb-0">Edit Pegawai</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=pegawai">Pegawai</a></li>
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
              <h5 class="mb-0">Form Edit Pegawai</h5>
            </div>
            <div class="card-body">
              <form method="post">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 200px;">NIP</th>
                    <td><input type="text" name="NIP" class="form-control" value="<?= htmlspecialchars($pgw['NIP']) ?>" required></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><input type="text" name="Nama" class="form-control" value="<?= htmlspecialchars($pgw['Nama']) ?>" required></td>
                  </tr>
                  <tr>
                    <th>Jabatan</th>
                    <td>
                      <select name="Jabatan" class="form-select" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Manager" <?= ($pgw['Jabatan'] == 'Manager') ? 'selected' : '' ?>>Manager</option>
                        <option value="Staff" <?= ($pgw['Jabatan'] == 'Staff') ? 'selected' : '' ?>>Staff</option>
                        <option value="Admin" <?= ($pgw['Jabatan'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="HRD" <?= ($pgw['Jabatan'] == 'HRD') ? 'selected' : '' ?>>HRD</option>
                        <option value="Keuangan" <?= ($pgw['Jabatan'] == 'Keuangan') ? 'selected' : '' ?>>Keuangan</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Gender" value="L" id="GenderL" <?= ($pgw['Gender'] == 'L') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="GenderL">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Gender" value="P" id="GenderP" <?= ($pgw['Gender'] == 'P') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="GenderP">Perempuan</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Nomor Telepon</th>
                    <td><input type="varchar" name="Nomor_Telepon" class="form-control" value="<?= htmlspecialchars($pgw['Nomor_Telepon']) ?>" required></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><input type="email" name="Email" class="form-control" value="<?= htmlspecialchars($pgw['Email']) ?>" required></td>
                  </tr>
                </table>

                <div class="text-start mt-3">
                  <button type="submit" class="btn btn-success px-4">💾 Simpan Perubahan</button>
                  <a href="./?p=Pegawai" class="btn btn-secondary px-4">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
