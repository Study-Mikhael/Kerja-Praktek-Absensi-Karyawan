<?php
include "../../config/koneksi.php";

// Pastikan semua input telah diterima
$id_kehadiran = $_POST['id_kehadiran'];
$exit_time = $_POST['jam_pulang'];

// Update jam pulang di database
$queryUpdate = "UPDATE kehadiran SET jam_pulang = '$exit_time' WHERE id_kehadiran = $id_kehadiran";

if (mysqli_query($koneksi, $queryUpdate)) {
    echo "
    <script>
        alert('Jam pulang berhasil diupdate!')
        window.location = '../index.php?menu=2'
    </script>";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
