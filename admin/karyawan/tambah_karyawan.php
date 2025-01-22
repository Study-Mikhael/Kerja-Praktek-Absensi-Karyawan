<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $no_hp = $_POST['no_hp'];
    $password = md5($_POST['password']);
    $id_google = $_POST['id_google'];

    // Upload Foto
    $foto = "";
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "uploud/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat folder jika belum ada
        }
        
        $file_name = time() . "_" . basename($_FILES["foto"]["name"]); // Hindari nama file duplikat
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto = $file_name; // Simpan hanya nama file ke database
        }
    }

    $query = "INSERT INTO karyawan (nik, nama_lengkap, email, tanggal_lahir, alamat, kota, no_hp, password, foto, id_google) 
              VALUES ('$nik', '$nama_lengkap', '$email', '$tanggal_lahir', '$alamat', '$kota', '$no_hp', '$password', '$foto', '$id_google')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data karyawan berhasil ditambahkan!'); window.location.href='../index.php?menu=5';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data! Error: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
}
?>
