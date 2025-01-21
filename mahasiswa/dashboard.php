<?php
$nim = $_SESSION['nim'];
// $query2 = "SELECT DISTINCT kehadiran.no_matakuliah, matakuliah.nama_matakuliah FROM kehadiran JOIN matakuliah ON kehadiran.no_matakuliah = matakuliah.no_matakuliah WHERE kehadiran.nim = $nim " ;
$query2 = "SELECT matakuliah.no_matakuliah, matakuliah.nama_matakuliah, COUNT(kehadiran.id_kehadiran) AS jumlah_kehadiran FROM matakuliah JOIN kehadiran ON kehadiran.no_matakuliah = matakuliah.no_matakuliah JOIN buatqr ON kehadiran.id_qrcode = buatqr.id_qrcode WHERE kehadiran.nim = $nim GROUP BY matakuliah.no_matakuliah, matakuliah.nama_matakuliah ORDER BY matakuliah.no_matakuliah ";
$sql2 = mysqli_query($koneksi, $query2);
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
              <?php
                  while($row = mysqli_fetch_array($sql2)){
                    $jumlah_kehadiran = $row['jumlah_kehadiran'];
                    $total_pertemuan = 14;
                    $persentase_kehadiran = ($jumlah_kehadiran / $total_pertemuan) * 100;
              ?>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"><?php echo $row['no_matakuliah']; ?>
                    </h4>
                    <h2 class="mb-5"><?php echo $row['nama_matakuliah']; ?></h2>
                    <h6 class="card-text">kehadiran: <?php echo $jumlah_kehadiran; ?> / 14 pertemuan </h6>
                    <p class="card-text">Persentase Kehadiran: <?php echo number_format($persentase_kehadiran, 2); ?>%</p>
                    <!-- Progress Bar -->
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $persentase_kehadiran; ?>%;" aria-valuenow="<?php echo $persentase_kehadiran; ?>" aria-valuemin="0" aria-valuemax="100">
                            <?php echo number_format($persentase_kehadiran, 2); ?>%
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>