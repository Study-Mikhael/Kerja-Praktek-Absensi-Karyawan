<?php
require '../config/koneksi.php';

// Query untuk mendapatkan jumlah karyawan dan jumlah pelatihan
$query_karyawan = "SELECT COUNT(*) AS jumlah_karyawan FROM karyawan";
$result_karyawan = mysqli_query($koneksi, $query_karyawan);
$row_karyawan = mysqli_fetch_assoc($result_karyawan);
$jumlah_karyawan = $row_karyawan['jumlah_karyawan'];

$query_pelatihan = "SELECT COUNT(*) AS jumlah_pelatihan FROM pelatihan";
$result_pelatihan = mysqli_query($koneksi, $query_pelatihan);
$row_pelatihan = mysqli_fetch_assoc($result_pelatihan);
$jumlah_pelatihan = $row_pelatihan['jumlah_pelatihan'];
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Jumlah Karyawan</h4>
                        <h2 class="mb-5"><?php echo $jumlah_karyawan; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Jumlah Pelatihan</h4>
                        <h2 class="mb-5"><?php echo $jumlah_pelatihan; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>