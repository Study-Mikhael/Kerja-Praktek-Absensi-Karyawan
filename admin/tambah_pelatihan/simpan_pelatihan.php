<?php
// session_start();

use Google\Service\Adsense\Alert;

include('../../config/koneksi.php'); // Pastikan koneksi ke database sudah benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama_pelatihan = $_POST['nama_pelatihan'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $tempat_acara = $_POST['tempat_acara'];
    $id_admin = $_POST['id_admin'];

    // Validasi input jika perlu (misalnya untuk format tanggal atau panjang karakter)

    // SQL query untuk menyimpan data ke dalam database
    $query = "INSERT INTO pelatihan (nama_pelatihan, tanggal_acara, tempat_acara, id_admin) 
              VALUES ('$nama_pelatihan', '$tanggal_acara', '$tempat_acara', '$id_admin')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman yang diinginkan setelah berhasil
        // echo "<script>alert('Data Berhasil Ditambahkan')</script>";
        header("Location: ../index.php"); // Ganti dengan halaman yang sesuai
        exit();
    } else {
        // Jika terjadi error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
