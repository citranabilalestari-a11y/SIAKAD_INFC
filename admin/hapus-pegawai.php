<main class="app-main"> 
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Delete Pegawai</h3>
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

                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h4 class="mb-0">Hapus Data Pegawai</h4>
                        </div>

                        <!--begin::Card Body-->
                        <div class="card-body">
                            <p>Apakah Anda yakin ingin menghapus data pegawai ini?</p>
                            <form action="" method="POST">
                                <button type="submit" name="hapus" class="btn btn-danger">
                                    🗑️ Hapus Pegawai
                                </button>
                                <a href="./?p=Pegawai" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>

                        <?php
                        require_once "../config.php";

                        // Pastikan ID dikirim dari URL
                        if (isset($_GET['id'])) {
                            $idx = $_GET['id'];

                            // Jika tombol hapus ditekan
                            if (isset($_POST['hapus'])) {
                                $sql = "DELETE FROM pegawai WHERE id='$idx'";
                                if ($db->query($sql)) {
                                    echo "<script>
                                            alert('Data pegawai berhasil dihapus!');
                                            window.location='?p=Pegawai';
                                          </script>";
                                } else {
                                    echo "<script>
                                            alert('Data gagal dihapus!');
                                            window.location='?p=Pegawai';
                                          </script>";
                                }
                            }
                        } else {
                            echo "<div class='alert alert-warning m-3'>ID pegawai tidak ditemukan.</div>";
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--end::App Content-->
</main>
