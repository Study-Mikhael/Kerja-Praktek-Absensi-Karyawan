<?php
require '../../config/koneksi.php'; // Pastikan Anda memiliki file koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelatihan = $_POST['nama_pelatihan'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $tempat_acara = $_POST['tempat_acara'];
    $id_admin = $_POST['id_admin'];

    // Query untuk menyimpan data ke dalam tabel pelatihan
    $query = "INSERT INTO pelatihan ('', $nama_pelatihan, $tanggal_acara, $tempat_acara, $id_admin)";
    // $stmt = $koneksi->prepare($query);
    // $stmt->bind_param("iii", $nama_pelatihan, $tanggal_acara, $tempat_acara, $id_admin);
    
    // if ($stmt->execute()) {
    //     echo "<script>alert('Data berhasil disimpan!'); window.location.href='../index.php?menu=3';</script>";
    // } else {
    //     echo "<script>alert('Gagal menyimpan data!'); window.history.back();</script>";
    // }
    
    // $stmt->close();
    // $conn->close();
// } else {
//     echo "<script>alert('Akses ditolak!'); window.history.back();</script>";
}
