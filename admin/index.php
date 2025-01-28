<?php
include "../config/koneksi.php";  
session_start();

if (isset($_SESSION['id_admin'])) {
  // code...
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absen Pelatihan</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/logo_kominfo.png" />
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
        <a class="navbar-brand brand-logo" href="index.php">Absensi Pelatihan</a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            
              
            </a>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
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
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $_SESSION['nama_admin']?></span>
              </div>
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
          } elseif($menu == 2) {
            include'buat_qr/buatqr.php';
          } elseif($menu == 3) {
            include'perkuliahan/perkuliahan.php';
          } elseif($menu == 4) {
            include'perkuliahan/detailkehadiran.php';
          } elseif($menu == 5) {
            include'karyawan/karyawan.php';
          } elseif($menu == 6) {
            include'tambah_pelatihan/tambah_pelatihan.php';
          } elseif($menu == 7) {
            include'karyawan/edit.php';
          } else {
            include'error.php';
          }
        } else {
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

  <!-- container-scroller -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>

  <!-- Ensure Bootstrap 5 bundle script is included (with Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="../assets/js/qrcode.js"></script>
  <script src="../assets/js/qrcode.min.js"></script>
  <script src="../assets/js/jquery.qrcode.min.js"></script>

</body>
</html>

<?php 
  } else {
    echo "<script>
      alert('Harap Login Terlebih Dahulu');
      window.location='../admin.php';
    </script>";
  }
?>
