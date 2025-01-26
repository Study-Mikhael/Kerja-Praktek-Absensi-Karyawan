<?php
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_qrcode = $_POST['id_qrcode'];
    $no_pelatihan = $_POST['no_pelatihan'];
    $id_admin = $_POST['id_admin'];

    $query = "INSERT INTO buatqr (id_qrcode, no_pelatihan, id_admin) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("iii", $id_qrcode, $no_pelatihan, $id_admin);

    if ($stmt->execute()) {
        header('Location: ../index.php?status=success');
    } else {
        echo "Error: " . $stmt->error; // Tampilkan pesan error yang lebih spesifik
        header('Location: ../index.php?status=error');
    }

    $stmt->close();
    $koneksi->close();
} else {
    echo "Akses ditolak!";
}