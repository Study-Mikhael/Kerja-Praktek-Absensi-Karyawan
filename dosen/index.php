<?php
include"../config/koneksi.php";  
session_start();

if (isset($_SESSION['nip'])) {
  # code...

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> -->

    <title>Absen Pelatihan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets//plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/images.jpeg" />
    <style>
      /* Mengaplikasikan animasi ke teks */
      .brand-logo {
        color: purple;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.4); /* Menambahkan efek shadow */
      }
    </style>
  </head>
  <body>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a> -->
          <a class="navbar-brand brand-logo" href="index.php">Absensi Pelatihan</a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION['nama_dosen']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION['nip']?></span>
                  <!-- <span class="text-secondary text-small">Project Manager</span> -->
                </div>
                <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
              </a>
            </li>
            <?php include "menu.php" ?>
          </ul>
        </nav>
        <!-- partial -->

          <?php
           
            if(!empty($_GET['menu'])){
              $menu = $_GET['menu'];
              if($menu == 1){
                include'dashboard.php';
              }elseif($menu == 2) {
                include'buat_qr/buatqr.php';
              }elseif($menu == 3) {
                include'perkuliahan/perkuliahan.php';
              }elseif($menu == 4) {
                include'perkuliahan/detailkehadiran.php';
              // }elseif($menu == 5) {
              //   include'profile/profile.php';
              }else{
                include'error.php';
              }
            }else{
              include'dashboard.php';
            }
          ?>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- DATA TABLES-->
    <!-- <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="../assets/js/qrcode.js"></script>
    <script src="../assets/js/qrcode.min.js"></script>
    <script src="../assets/js/jquery.qrcode.min.js"></script>
    
    <!-- End custom js for this page -->
  </body>
</html>
<?php 
  }else{
    echo 
    "<script>
      alert('Harap Login Terlebih Dahulu');
      window.location='../dosen.php';
    </script>";
    ;
  }
?>