<?php
$nip = $_SESSION['nip'];
$query2 = "SELECT matakuliah.no_matakuliah , dosen.prodi , matakuliah.nama_matakuliah, matakuliah.semester, dosen.nip FROM matakuliah, dosen WHERE dosen.nip = $nip and matakuliah.nip = dosen.nip";
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
                    // $jumlah_kehadiran = $row['jumlah_kehadiran'];
                    // $total_pertemuan = 14;
                    // $persentase_kehadiran = ($jumlah_kehadiran / $total_pertemuan) * 100;
              ?>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"><?php echo 'Kode Pelatihan: ', $row['no_matakuliah']; ?>
                    </h4>
                    <h2 class="mb-5"><?php echo $row['nama_matakuliah']; ?></h2>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>