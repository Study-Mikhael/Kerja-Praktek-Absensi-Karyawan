<?php
include '../config/koneksi.php';

$nim = $_SESSION['nim'];
// $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$sql = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($sql);
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> Profile Mahasiswa
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
                        <img src="assets/images/faces/face3.jpg" alt="" style="width:10%; border-radius: 100%;">
                        <hr>
                    </center>
                    <div class="container">
                        <form action="" class="form-sample">
                            <div class="form-group">
                                <label for="exampleInputUsername0">NIM</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NIM" value="<?php echo $row['nim']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">NAMA</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['nama_lengkap']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">KELAS</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['kelas']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">SEMESTER</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['semester']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">KOTA</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['kota']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">TANGGAL LAHIR</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['tanggal_lahir']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">PROGRAM STUDI</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['prodi']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">FAKULTAS</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['fakultas']?> ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername0">TAHUN MASUK</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="NAMA" value="<?php echo $row['tahun_masuk']?> ">
                            </div>  
                        </form>
                        
                        <a href="" class="btn btn-gradient-primary me-2" > Ubah Data </a>
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