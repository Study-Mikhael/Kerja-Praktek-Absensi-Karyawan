<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$dbname = 'db_absensi_kominfo'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil nilai nik dari URL
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk menghapus data berdasarkan nik
    $sql = "DELETE FROM karyawan WHERE nik = ?";
    
    // Siapkan statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter dan eksekusi query
        $stmt->bind_param("s", $nik); // "s" untuk string
        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman lain (misalnya ke halaman utama)
            echo "<script>alert('Data berhasil dihapus!'); window.location='../index.php?menu=5';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menghapus data.'); window.location='../index.php?menu=5';</script>";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "<script>alert('Terjadi kesalahan dalam menyiapkan query.'); window.location='../index.php?menu=5';</script>";
    }
} else {
    echo "<script>alert('Nik tidak ditemukan.'); window.location='../index.php?menu=5';</script>";
}

// Tutup koneksi
$conn->close();
?>
