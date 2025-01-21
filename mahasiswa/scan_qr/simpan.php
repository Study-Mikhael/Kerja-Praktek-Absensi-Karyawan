<!-- Tambahkan di bagian head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Koneksi ke database
$servername = "localhost";  // Ganti dengan nama server Anda
$username = "root";     // Ganti dengan nama pengguna database Anda
$password = "";     // Ganti dengan kata sandi database Anda
$database = "db_absen_mahasiswa"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$id_qrcode = $_POST['id_qrcode'];
$no_matakuliah = $_POST['no_matakuliah'];
$nim = $_POST['nim'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$entry_time = $_POST['entry_time'];
$tanggal_absen = $_POST['tanggal_absen'];

// Masukkan data ke tabel database (gantilah 'nama_tabel' dengan nama tabel sesuai kebutuhan)
$sql = "INSERT INTO kehadiran (id_qrcode,no_matakuliah, nim, latitude, longitude, entry_time, tanggal_absen) VALUES ('$id_qrcode','$no_matakuliah','$nim','$latitude', '$longitude', '$entry_time', '$tanggal_absen')";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil, tampilkan alert Bootstrap
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function(){
                window.location = "../index.php?menu=3";
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
