<?php
// include '../config/koneksi.php';
// session_start();
// include '../../config/koneksiGoogle.php'; 

$nik = $_SESSION['nik'];
// $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$query = "SELECT * FROM karyawan WHERE nik = '$nik'";
$sql = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($sql);
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> Profile karyawan
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
                    <center>
                        <img src="assets/images/foto_mahasiswa/<?php echo $_SESSION['foto']; ?>" alt="" style="width:10%; height: 120px;; border-radius: 100%;">
                       
                    </center>
                    <div class="container">
                        <form action="" class="form-sample">
                            <div class="form-group">
                                <label for="exampleInputUsername0">nik</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="nik" value="<?php echo $row['nik']?>" readonly >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">NAMA</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['nama_lengkap']?>" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputUsername0">KOTA</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['kota']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">TANGGAL LAHIR</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['tanggal_lahir']?>" readonly>
                            </div>
                        </form>
                        
                        <!-- <a href="" class="btn btn-gradient-primary me-2" > Ubah Data </a> -->
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