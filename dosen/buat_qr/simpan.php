<!-- Tambahkan di bagian head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php
include'../../config/koneksi.php';

// Ambil data dari formulir
$nip = $_POST['nip'];
$id_qrcode = $_POST['id_qrcode'];
$no_matakuliah = $_POST['no_matakuliah'];
$jurusan = $_POST['jurusan'];
$ruangan = '';
$kelas = $_POST['kelas'];
$semester = '';
$pertemuan = $_POST['pertemuan'];
$latitude = '';
$longitude = '';

// Masukkan data ke tabel database (gantilah 'nama_tabel' dengan nama tabel sesuai kebutuhan)
$sql = "INSERT INTO buatqr (id_qrcode, nip, no_matakuliah, jurusan, ruangan, kelas, semester, pertemuan, latitude, longitude) VALUES ('$id_qrcode','$nip','$no_matakuliah','$jurusan','$ruangan','$kelas','$semester','$pertemuan','$latitude', '$longitude')";

if ($koneksi->query($sql) === TRUE) {
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
            <strong>Error!</strong> ' . $koneksi->error . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
}

// Tutup koneksi ke database
$koneksi->close();
?>
