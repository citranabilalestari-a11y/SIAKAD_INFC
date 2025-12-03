<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Tambah Pegawai</h3>
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
                    $nip      = $_POST['nip'];
                    $nama     = $_POST['nama'];
                    $jabatan  = $_POST['jabatan'];
                    $gender   = $_POST['gender'] ?? '';
                    $telepon  = $_POST['telepon'];
                    $email    = $_POST['email'];
                    $waktu    = date("Y-m-d H:i:s");

                    if ($nip == '' || $nama == '' || $jabatan == '' || $gender == '' || $telepon == '' || $email == '') {
                        echo "<div class='alert alert-danger mt-3'>Semua field wajib diisi!</div>";
                    } else {
                        $sql = "INSERT INTO pegawai (nip, nama, jabatan, gender, nomor_telepon, email, waktu)
                                VALUES ('$nip', '$nama', '$jabatan', '$gender', '$telepon', '$email', '$waktu')";
                        $simpan = $db->query($sql);

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
                      <td><input type="text" name="nip" class="form-control" value="<?= @$nip ?>"></td>
                    </tr>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td><input type="text" name="nama" class="form-control" value="<?= @$nama ?>"></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>
                        <select class="form-control" name="jabatan">
                          <option value="">-- Pilih Jabatan --</option>
                          <option value="Manager" <?= ($jabatan == "Manager") ? "selected" : "" ?>>Manager</option>
                          <option value="Staff" <?= ($jabatan == "Staff") ? "selected" : "" ?>>Staff</option>
                          <option value="Admin" <?= ($jabatan == "Admin") ? "selected" : "" ?>>Admin</option>
                          <option value="HRD" <?= ($jabatan == "HRD") ? "selected" : "" ?>>HRD</option>
                          <option value="Keuangan" <?= ($jabatan == "Keuangan") ? "selected" : "" ?>>Keuangan</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>
                        <input type="radio" name="gender" value="L" id="L" <?= ($gender == "L") ? "checked" : "" ?>>
                        <label for="L">Laki-laki</label>
                        <input type="radio" name="gender" value="P" id="P" <?= ($gender == "P") ? "checked" : "" ?>>
                        <label for="P">Perempuan</label>
                      </td>
                    </tr>
                    <tr>
                      <td>Nomor Telepon</td>
                      <td><input type="text" name="telepon" class="form-control" value="<?= $telepon ?>"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="email" name="email" class="form-control" value="<?= $email ?>"></td>
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
