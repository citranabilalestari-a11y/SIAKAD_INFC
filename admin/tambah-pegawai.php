<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../config.php";
?>
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Tambah Pegawai</h3>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=pegawai">pegawai</a></li>
            <li class="breadcrumb-item active">Tambah</li>
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
          <!--begin::Card-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>

            <!--begin::Card Body-->
            <div class="card-body">
              <div class="container">
                <?php
                require_once "../config.php";

                if (isset($_POST['simpan'])) {
                    $NIP     = $_POST['NIP'];
                    $Nama     = $_POST['Nama'];
                    $Jabatan  = $_POST['Jabatan'];
                    $Gender   = $_POST['Gender'] ?? '';
                    $Telepon  = $_POST['Telepon'];
                    $Email    = $_POST['Email'];
                    $waktu    = date("Y-m-d H:i:s");

                    if ($NIP == '' || $Nama == '' || $Jabatan == '' || $Gender == '' || $Telepon == '' || $Email == '') {
                        echo "<div class='alert alert-danger mt-3'>Semua field wajib diisi!</div>";
                    } else {
                        $sql = "INSERT INTO pegawai (NIP, Nama, Jabatan, Gender, Telepon, Email, waktu)
                                VALUES ('$NIP', '$Nama', '$Jabatan', '$Gender', '$Telepon', '$Email', '$waktu')";
            

                        if ($simpan) {
                            echo "<div class='alert alert-success mt-3'>
                                    Data pegawai berhasil disimpan.<br>
                                    <a href='./?p=pegawai' class='text-primary'>Lihat Data</a>
                                  </div>";
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data!</div>";
                        }
                    }
                }
                ?>

                <form method="post" action="#" class="mt-4">
                  <table class="table table-borderless" style="width:500px;">
                    <tr>
                      <td>NIP</td>
                      <td><input type="text" name="NIP" class="form-control" value="<?= @$NIP ?>"></td>
                    </tr>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td><input type="text" name="Nama" class="form-control" value="<?= @$Nama ?>"></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>
                        <select class="form-control" name="Jabatan">
                          <option value="">-- Pilih Jabatan --</option>
                          <option value="Manager" <?= ($Jabatan == "Manager") ? "selected" : "" ?>>Manager</option>
                          <option value="Staff" <?= ($Jabatan == "Staff") ? "selected" : "" ?>>Staff</option>
                          <option value="Admin" <?= ($Jabatan == "Admin") ? "selected" : "" ?>>Admin</option>
                          <option value="HRD" <?= ($Jabatan == "HRD") ? "selected" : "" ?>>HRD</option>
                          <option value="Keuangan" <?= ($Jabatan == "Keuangan") ? "selected" : "" ?>>Keuangan</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>
                        <input type="radio" name="Gender" value="L" id="L" <?= ($Gender == "L") ? "checked" : "" ?>>
                        <label for="L">Laki-laki</label>
                        <input type="radio" name="Gender" value="P" id="P" <?= ($Gender == "P") ? "checked" : "" ?>>
                        <label for="P">Perempuan</label>
                      </td>
                    </tr>
                    <tr>
                      <td>Nomor Telepon</td>
                      <td><input type="text" name="Telepon" class="form-control" value="<?= @$Telepon ?>"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="Email" name="Email" class="form-control" value="<?= @$Email ?>"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
            <!--end::Card Body-->
          </div>
          <!--end::Card-->
        </div>
      </div>
    </div>
  </div>
  <!--end::App Content-->
</main>