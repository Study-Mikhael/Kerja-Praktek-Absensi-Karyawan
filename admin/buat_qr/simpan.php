<?php
require '../../config/koneksi.php'; // Pastikan Anda memiliki file koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_qrcode = $_POST['id_qrcode'];
    $no_pelatihan = $_POST['no_pelatihan'];
    $id_admin = $_POST['id_admin'];

    // Query untuk menyimpan data ke dalam tabel pelatihan
    $query = "INSERT INTO buatqr (id_qrcode, no_pelatihan, id_admin) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("iii", $id_qrcode, $no_pelatihan, $id_admin);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='../index.php?menu=3';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!'); window.history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Akses ditolak!'); window.history.back();</script>";
}
?>