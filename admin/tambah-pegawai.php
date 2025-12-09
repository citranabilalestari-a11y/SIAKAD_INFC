<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../config.php";


$NIP = $Nama = $Jabatan = $Gender = $Telepon = $Email = '';
$pesan = '';

if (isset($_POST['simpan'])) {
    $NIP     = $_POST['NIP'] ?? '';
    $Nama    = $_POST['Nama'] ?? '';
    $Jabatan = $_POST['Jabatan'] ?? '';
    $Gender  = $_POST['Gender'] ?? '';
    $Telepon = $_POST['Telepon'] ?? '';
    $Email   = $_POST['Email'] ?? '';
    $waktu   = date("Y-m-d H:i:s");

    
    if ($NIP == '' || $Nama == '' || $Jabatan == '' || $Gender == '' || $Telepon == '' || $Email == '') {
        $pesan = "<div class='alert alert-danger mt-3'>Semua field wajib diisi!</div>";
    } else {
        
        $sql = "INSERT INTO pegawai (NIP, Nama, Jabatan, Gender, Telepon, Email, waktu)
                VALUES ('$NIP', '$Nama', '$Jabatan', '$Gender', '$Telepon', '$Email', '$waktu')";

        
        if (isset($koneksi)) {
            $simpan = mysqli_query($koneksi, $sql);

            if ($simpan) {
                $pesan = "<div class='alert alert-success mt-3'>
                            Data pegawai berhasil disimpan.<br>
                            <a href='./?p=pegawai' class='text-primary'>Lihat Data</a>
                          </div>";
                
                $NIP = $Nama = $Jabatan = $Gender = $Telepon = $Email = '';
            } else {
                $pesan = "<div class='alert alert-danger mt-3'>
                            Gagal menyimpan data! ".mysqli_error($koneksi)."
                          </div>";
            }
        } else {
            $pesan = "<div class='alert alert-danger mt-3'>Koneksi database tidak ditemukan!</div>";
        }
      }
    } 
  ?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <h3>Tambah Pegawai</h3>
      <?php echo $pesan; ?>

      <form method="post" action="#" class="mt-4">
        <table class="table table-borderless" style="width:500px;">
          <tr>
            <td>NIP</td>
            <td><input type="text" name="NIP" class="form-control" value="<?php echo htmlspecialchars($NIP); ?>"></td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="Nama" class="form-control" value="<?php echo htmlspecialchars($Nama); ?>"></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>
              <select class="form-control" name="Jabatan" required>
                <option value="">-- Pilih Jabatan --</option>
                <?php
                $jabatanList = ["Manager", "Staff", "Admin", "HRD", "Keuangan"];
                foreach ($jabatanList as $jab) {
                    $sel = ($Jabatan == $jab) ? "selected" : "";
                    echo "<option value='$jab' $sel>$jab</option>";
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              <div class="form-check form-check-inline">
                <input type="radio" name="Gender" value="L" class="form-check-input" <?php echo ($Gender=='L')?'checked':''; ?> required>
                <label class="form-check-label">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" name="Gender" value="P" class="form-check-input" <?php echo ($Gender=='P')?'checked':''; ?>>
                <label class="form-check-label">Perempuan</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Nomor Telepon</td>
            <td><input type="text" name="Telepon" class="form-control" value="<?php echo htmlspecialchars($Telepon); ?>"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="email" name="Email" class="form-control" value="<?php echo htmlspecialchars($Email); ?>"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</main>
