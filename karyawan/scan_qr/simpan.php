<!-- Tambahkan di bagian head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Koneksi ke database
$servername = "localhost";  // Ganti dengan nama server Anda
$username = "root";     // Ganti dengan nama pengguna database Anda
$password = "";     // Ganti dengan kata sandi database Anda
$database = "db_absensi_kominfo"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$id_qrcode = $_POST['id_qrcode'];
// $no_pelatihan = $_POST['no_pelatihan'];
$nik = $_POST['nik'];
// $jam_masuk = $_POST['jam_masuk'];
$tanggal_masuk = $_POST['tanggal_masuk'];

// Masukkan data ke tabel database (gantilah 'nama_tabel' dengan nama tabel sesuai kebutuhan)
$sql = "INSERT INTO kehadiran (id_qrcode, nik, tanggal_masuk) VALUES ('$id_qrcode','$nik', '$tanggal_masuk')";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil, tampilkan alert Bootstrap
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function(){
                window.location = "../index.php?menu=6";
            }, 2000); // Mengarahkan ke halaman lain setelah 2 detik
        </script>
    ';
} else {
    // Jika terjadi kesalahan, tampilkan alert Bootstrap dengan pesan kesalahan
    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $conn->error . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
}

// Tutup koneksi ke database
$conn->close();
?>
