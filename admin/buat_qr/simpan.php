<?php
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_qrcode = $_POST['id_qrcode']; // id_qrcode bisa berupa string
    $no_pelatihan = $_POST['no_pelatihan']; // no_pelatihan kemungkinan besar integer
    $id_admin = $_POST['id_admin']; // id_admin kemungkinan besar integer

    // Perbaiki tipe data pada bind_param (sesuaikan dengan tipe data di database)
    $query = "INSERT INTO buatqr (id_qrcode, no_pelatihan, id_admin) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    
    // Jika id_qrcode adalah string, gunakan "ssi" (string, integer, integer)
    $stmt->bind_param("sii", $id_qrcode, $no_pelatihan, $id_admin); // Sesuaikan dengan tipe data

    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Ditambahkan!'); window.location.href='../index.php?menu=2';</script>";
        //header('Location: ../index.php?status=success');
    } else {
        //echo "Error: " . $stmt->error; // Tampilkan pesan error yang lebih spesifik
        //header('Location: ../index.php?status=error');
        echo "<script>alert('Data Gagal Ditambahkan!'); window.location.href='../index.php?menu=2';</script>";

    }

    $stmt->close();
    $koneksi->close();
} else {
    echo "Akses ditolak!";
}
