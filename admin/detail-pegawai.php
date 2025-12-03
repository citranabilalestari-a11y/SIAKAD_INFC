<?php
$idx = $_GET['id'];
require_once "../config.php";

$sql = "SELECT * FROM pegawai WHERE id = $idx";
$data = $db->query($sql);
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Detail Pegawai</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="./?p=pegawai">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
        <!--begin::Col-->
        <div class="col-12">
          <!--begin::Card-->
          <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Data Pegawai</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <?php
                foreach ($data as $d) {
                    if ($d['Gender'] == "L") {
                        $jk = "Laki-laki";
                    } else {
                        $jk = "Perempuan";
                    }

                    echo "<tr><td style='width:200px;'>No</td><td>: $d[id]</td></tr>";
                    echo "<tr><td>NIP</td><td>: $d[NIP]</td></tr>";
                    echo "<tr><td>Nama</td><td>: $d[Nama]</td></tr>";
                    echo "<tr><td>Jenis Kelamin</td><td>: $jk</td></tr>";
                    echo "<tr><td>Nomor_Telepon</td><td>: $d[Nomor_Telepon]</td></tr>";
                    echo "<tr><td>Email</td><td>: $d[Email]</td></tr>";
                }
                ?>
                </table>
                <a href="./?p=Pegawai" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
          </div>
          <!--end::Card-->
        </div>
        <!--end::Col-->
      </div>
    </div>
  </div>
</main>
