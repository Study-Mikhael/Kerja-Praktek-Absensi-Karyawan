<?php 
include"config/koneksi.php";
session_start();

if (isset($_POST['login'])){

$nik = $_POST['nik'];
$password = md5($_POST['password']);

$q2 = "SELECT * FROM karyawan WHERE nik='$nik' AND password='$password'";
$r2 = mysqli_query($koneksi, $q2);
$d2 = mysqli_fetch_array($r2);

if (mysqli_num_rows($r2) > 0){
  $_SESSION['nama_lengkap'] = $d2['nama_lengkap'];
  $_SESSION['nik'] = $d2['nik'];
  $_SESSION['foto'] = $d2['foto'];
  echo "
  <script>
  alert('Anda Berhasil Login');
  window.location = 'karyawan/index.php';
  </script>
  ";
}else{
  echo "
  <script>
  alert('Anda Gagal Login');
  window.location = 'index.php';
  </script>
  ";
  }
}
?>

<?php 
// Include configuration file 
require_once 'config/koneksiGoogle.php'; 
require_once 'config/koneksi.php'; 
 
// Include User library file 
// require_once 'User.class.php'; 
// echo "<pre>";
// print_r($gClient);
// die;

// unset($_SESSION['token']);
 
if(isset($_GET['code'])){ 
    $gClient->authenticate($_GET['code']); 
    $_SESSION['token'] = $gClient->getAccessToken(); 
    $gpUserProfile = $google_oauthV2->userinfo->get(); 
    $id_google = $gpUserProfile['id'];
    $q2 = "SELECT * FROM karyawan WHERE id_google='$id_google'";
    $r2 = mysqli_query($koneksi, $q2);
    $d2 = mysqli_fetch_array($r2);

    if (mysqli_num_rows($r2) > 0){
      $_SESSION['nama_lengkap'] = $d2['nama_lengkap'];
      $_SESSION['nik'] = $d2['nik'];
      $_SESSION['foto'] = $d2['foto'];
      echo "
      <script>
      alert('Anda Berhasil Login');
      window.location = 'mahasiswa/index.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('Anda Gagal Login');
      window.location = 'index.php';
      </script>
      ";
      }
    // header('Location: ' . filter_var('http://' . $_SERVER['HTTP_HOST'] . '/absen_mahasiswa/mahasiswa/index.php', FILTER_SANITIZE_URL)); 
} 
 
if(isset($_SESSION['token'])){ 
    $gClient->setAccessToken($_SESSION['token']); 
} 
 
if($gClient->getAccessToken()){ 
    // Get user profile data from google 
    $gpUserProfile = $google_oauthV2->userinfo->get(); 
    // echo "<pre>";
    //  print_r($gpUserProfile);
    //  die;
    // Initialize User class 
    // $user = new User(); 
    $_SESSION['token'] = $gClient->getAccessToken(); 
    $gpUserProfile = $google_oauthV2->userinfo->get(); 
    $id_google = $gpUserProfile['id'];
    $q2 = "SELECT * FROM karyawan WHERE id_google='$id_google'";
    $r2 = mysqli_query($koneksi, $q2);
    $d2 = mysqli_fetch_array($r2);

    if (mysqli_num_rows($r2) > 0){
      $_SESSION['nama_lengkap'] = $d2['nama_lengkap'];
      $_SESSION['nik'] = $d2['nik'];
      $_SESSION['foto'] = $d2['foto'];
      echo "
      <script>
      alert('Anda Berhasil Login');
      window.location = 'karyawan/index.php';
      </script>
      ";
    }else{
      unset($_SESSION['token']);
      // echo "
      // <script>
      // alert('Anda Gagal Login');
      // </script>
      // ";
      }
}else{ 
    // Get login url 
    $authUrl = $gClient->createAuthUrl(); 
     
    // Render google login button 
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="login-btn">Sign in with Google</a>'; 
    // echo $output;
} 
?>

<!DOCTYPE html>
<html lang="en" crossring="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="805599403830-ufq3ifkchv2rgvu9s5q674uhte9ns3i9.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Absen Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo_kominfo.png">
</head>
<body style="background-image: url('assets/img/backgroud.jpg');">

<div class="container col-md-12" >
    <label for=""></label>
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card login-form shadow mt-5 bg-white rounded">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Aplikasi Absen Pelatihan <br>
                 <span class="font-weight-bold text-primary">Berbasis QR Code</span></h5>
                <center><img src="assets/img/logo_diskominfo.jpeg" alt="" width="50%"></center>
            </div>
            <div class="card-body">
  
              <form action="" method="post">
                <div class="form-group">  
                  <input type="text" name="nik" class="form-control" placeholder="Masukan NIK Anda" autocomplete="new-nik">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda" autocomplete="new-password">
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;

  // Kirim id_token ke server untuk verifikasi
  // ...

  // Simpan data pengguna ke session
  session_start();
  $_SESSION['nama'] = profile.getName();
  $_SESSION['email'] = profile.getEmail();
  $_SESSION['foto'] = profile.getImageUrl();

  // Redirect ke halaman utama atau halaman lain yang diinginkan
  window.location = 'karyawan/index.php';
}
</script>
</body>
</html>