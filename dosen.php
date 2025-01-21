<?php 
include"config/koneksi.php";
session_start();

if (isset($_POST['login'])){

$nip = $_POST['nip'];
$password2 = md5($_POST['password']);

$q3 = "SELECT * FROM dosen WHERE nip='$nip' AND password='$password2'";
$r3 = mysqli_query($koneksi, $q3);
$d3 = mysqli_fetch_array($r3);

if (mysqli_num_rows($r3) > 0){
  $_SESSION['nama_dosen'] = $d3['nama_dosen'];
  $_SESSION['nip'] = $d3['nip'];
  echo "
  <script>
  alert('Anda Berhasil Login');
  window.location = 'dosen/index.php';
  </script>
  ";
}else{
  echo "
  <script>
  alert('Anda Gagal Login');
  window.location = 'dosen.php';
  </script>
  ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<div class="container">
    <label for=""></label>
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card login-form shadow mt-5 bg-white rounded">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Aplikasi Absen Pelatihan <br>
                 <span class="font-weight-bold text-primary">Berbasis QR Code</span></h5>
                <center><img src="assets/img/logo_unikom_kuning.png" alt="" width="20%"></center>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <input type="number" name="nip" class="form-control" placeholder="NIP">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>