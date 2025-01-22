<?php  
include"../config/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$nim = $_SESSION['nim'];
// $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$sql = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($sql);

$tanggal = date('Y-m-d');
$query2 = "SELECT MAX(id_kehadiran) AS kehadiran_new, MAX(entry_time) AS max_jam, DATE_FORMAT(NOW(), '%Y-%m-%d') AS tanggal_sekarang FROM kehadiran WHERE nim = '$nim' AND tanggal_absen = '$tanggal' ";
$sql2 = mysqli_query($koneksi, $query2);
$row2 = mysqli_fetch_array($sql2);

$idkehadiransaatini = $row2['kehadiran_new'];
$maxJam = $row2['max_jam']; // Jam paling besar
$tanggalSekarang = $row2['tanggal_sekarang']; // Tanggal saat ini

?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span>
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
                    <h4 class="card-title">Silahkan Klik Pulang Jika Sudah Pulang</h4><hr>
                    <!-- <div id="map" style="height: 400px;"></div> -->
                    <form action="scan_qr/update_jam_pulang.php" method="post">
                        <label class="form-label">ID Kehadiran</label>
                        <input type="text" class="form-control mb-2" name="id_kehadiran" value="<?php echo $idkehadiransaatini ?>" readonly>
                        <label class="form-label">NIM </label>
                        <input type="text" class="form-control mb-2" value="<?php echo $row['nim']; ?>" readonly>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control mb-2" value="<?php echo $row['nama_lengkap']; ?>" readonly>
                        <label class="form-label">Jam Masuk</label>
                        <input type="text" class="form-control mb-2" value="<?php echo $maxJam?>" readonly>
                        <label class="form-label">Tanggal Absen</label>
                        <input type="text" class="form-control mb-2" value="<?php echo $tanggalSekarang?>" readonly>
                        <label class="form-label">Jam Pulang</label>
                        <input type="time" class="form-control mb-2" name="jam_pulang" value="<?php echo date('H:i'); ?>" readonly>
                        <center>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin Sudah Pulang?')">Pulang</button>
                        </center>
                    </form>
                    <div class="d-flex">
                      <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <!-- <i class="mdi mdi-account-outline icon-sm me-2"></i> -->
                        <!-- <span>jack Menqu</span> -->
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <!-- <i class="mdi mdi-clock icon-sm me-2"></i> -->
                        <!-- <span>October 3rd, 2018</span> -->
                        <!-- Tambahkan form ini di dalam <div class="container mt-3"> -->
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