<?php
require_once "../config.php";

// ambil semua data pegawai
$data = $db->query("SELECT * FROM pegawai");

// ambil input pencarian
$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';

if (isset($_POST['cari'])) {
    // filter berdasarkan kategori yang dipilih
    if ($category == "NIP") {
        $data = $db->query("SELECT * FROM pegawai WHERE NIP LIKE '%$keyword%' ");
    } elseif ($category == "Nama") {
        $data = $db->query("SELECT * FROM pegawai WHERE Nama LIKE '%$keyword%' ");
    } elseif ($category == "Jabatan") {
        $data = $db->query("SELECT * FROM pegawai WHERE Jabatan LIKE '%$keyword%' ");
    } elseif ($category == "Gender") {
        $data = $db->query("SELECT * FROM pegawai WHERE Gender LIKE '%$keyword%' ");
    } elseif ($category == "Nomor_Telepon") {
        $data = $db->query("SELECT * FROM pegawai WHERE Nomor_Telepon LIKE '%$keyword%' ");
    } elseif ($category == "Email") {
        $data = $db->query("SELECT * FROM pegawai WHERE Email LIKE '%$keyword%' ");
    }
}
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dashboard Pegawai UIN SAIZU Purwokerto</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <table>
                <tr>
                  <td>
                    <a href="../admin?p=tambah-pegawai" class="btn btn-sm btn-success mb-3">+ Pegawai</a>
                  </td>
                  <td>
                    <form method="POST" action="" class="d-flex mb-3 ms-2">
                      <input type="text" name="keyword" class="form-control form-control-sm"
                        placeholder="Search..." value="<?= $keyword ?>">
                      <select name="category" class="form-select form-select-sm ms-2">
                        <option value="" <?php if ($category == '') echo "selected"; ?>>Pilih Category</option>
                        <option value="NIP" <?php if ($category == "NIP") echo "selected"; ?>>NIP</option>
                        <option value="Nama" <?php if ($category == "Nama") echo "selected"; ?>>Nama</option>
                        <option value="Jabatan" <?php if ($category == "Jabatan") echo "selected"; ?>>Jabatan</option>
                        <option value="Gender" <?php if ($category == "Gender") echo "selected"; ?>>Gender</option>
                        <option value="Nomor_Telepon" <?php if ($category == "Nomor_Telepon") echo "selected"; ?>>Nomor Telepon</option>
                        <option value="Email" <?php if ($category == "Email") echo "selected"; ?>>Email</option>
                      </select>
                  </td>
                  <td>
                    <button type="submit" name="cari" class="btn btn-sm btn-primary ms-2">Cari</button>
                  </td>
                </tr>
              </table>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Gender</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data as $d) {
                    $no++;
                    echo "
                    <tr>
                      <td>$no</td>
                      <td>{$d['NIP']}</td>
                      <td>{$d['Nama']}</td>
                      <td>{$d['Jabatan']}</td>
                      <td>{$d['Gender']}</td>
                      <td>{$d['Nomor_Telepon']}</td>
                      <td>{$d['Email']}</td>
                      <td>
                        <a href='./?p=detail-pegawai&id=$d[id]' class='btn btn-xs btn-primary'>Detail</a>
                        <a href='./?p=edit-pegawai&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                        <a href='./?p=hapus-pegawai&id=$d[id]' class='btn btn-xs btn-danger'>Delete</a>
                      </td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div> <!-- end card header -->
          </div> <!-- end card -->
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </div> <!-- end app content -->
</main>
