<?php
include '../config/koneksi.php';

$nik = $_SESSION['nik'];
$query = "SELECT kehadiran.id_qrcode, kehadiran.tanggal_masuk, buatqr.no_pelatihan, pelatihan.nama_pelatihan, pelatihan.tempat_acara, pelatihan.tanggal_acara FROM kehadiran, buatqr, pelatihan WHERE kehadiran.id_qrcode = buatqr.id_qrcode AND buatqr.no_pelatihan = pelatihan.no_pelatihan AND kehadiran.nik = $nik ;";
$sql = mysqli_query($koneksi, $query);

?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> Kehadiran Peserta
              </h3>
              <!-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav> -->
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="container">
                        <!-- <a target="_blank" href="kehadiran/export_excel.php">EXPORT KE EXCEL</a><br><br> -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID QR CODE</th>
                                    <th>TANGGAL MASUK</th>
                                    <th>NAMA PELATIHAN</th>
                                    <th>TANGGAL ACARA</th>
                                    <th>TEMPAT ACARA</th>
                                </tr>
                            </thead>
                            <?php
                              while($row = mysqli_fetch_array($sql)){
                            ?>
                            <tbody>
                            <tr>
                              <td><?php echo $row['id_qrcode']; ?></td>
                              <td><?php echo $row['tanggal_masuk']; ?></td>
                              <td><?php echo $row['nama_pelatihan']; ?></td>
                              <td><?php echo $row['tanggal_acara']; ?></td>
                              <td><?php echo $row['tempat_acara']; ?></td>
                            </tr>
                            </tbody>
                            <?php
                              }
                            ?>
                        </table>
                    </div>  
                    <div class="d-flex">
                      <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <!-- <i class="mdi mdi-account-outline icon-sm me-2"></i> -->
                        <!-- <span>jack Menqu</span> -->
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <!-- <i class="mdi mdi-clock icon-sm me-2"></i> -->
                        <!-- <span>October 3rd, 2018</span> -->
                      </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      <!-- <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image"> -->
                      <div class="mb-0 flex-grow">
                        <!-- <h5 class="me-2 mb-2">School Website - Authentication Module.</h5> -->
                        <!-- <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p> -->
                      </div>
                      <div class="ms-auto">
                        <!-- <i class="mdi mdi-heart-outline text-muted"></i> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>