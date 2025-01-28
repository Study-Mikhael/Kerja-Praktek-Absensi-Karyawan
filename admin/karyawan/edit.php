<?php
// Koneksi ke database
$host = 'localhost'; // Sesuaikan dengan host database Anda
$user = 'root'; // Sesuaikan dengan username database Anda
$password = ''; // Sesuaikan dengan password database Anda
$dbname = 'db_absensi_kominfo'; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai nik dari URL
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk mendapatkan data berdasarkan nik
    $sql = "SELECT * FROM karyawan WHERE nik = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nik); // Bind nik sebagai parameter
        $stmt->execute();
        $result = $stmt->get_result();

        // Jika data ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<script>alert('Data tidak ditemukan.'); window.location='../index.php?menu=5';</script>";
            exit;
        }

        // Tutup statement
        $stmt->close();
    }
} else {
    echo "<script>alert('Nik tidak ditemukan.'); window.location='../index.php?menu=5';</script>";
    exit;
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $foto = $_POST['foto'];

    // Query untuk mengupdate data
    $update_sql = "UPDATE karyawan SET nama_lengkap = ?, email = ?, tanggal_lahir = ?, alamat = ?, kota = ?, no_hp = ?, password = ?, foto = ? WHERE nik = ?";

    if ($stmt = $conn->prepare($update_sql)) {
        $stmt->bind_param("sssssssss", $nama_lengkap, $email, $tanggal_lahir, $alamat, $kota, $no_hp, $password, $foto, $nik);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui.'); window.location='../index.php?menu=5';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }

        // Tutup statement
        $stmt->close();
    }
}

// Tutup koneksi
$conn->close();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-barcode-scan"></i>
        </span> Edit Data Karyawan
      </h3>
    </div>  
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
            <form action="karyawan/edit.php?nik=<?php echo $row['nik']; ?>" method="POST">
                <div class="container mt-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <!-- NIK -->
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" readonly>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?php echo $row['nama_lengkap']; ?>">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>">
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control"><?php echo $row['alamat']; ?></textarea>
                            </div>

                            <!-- Kota -->
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" id="kota" name="kota" class="form-control" value="<?php echo $row['kota']; ?>">
                            </div>

                            <!-- No HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $row['no_hp']; ?>">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                            </div>

                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="text" id="foto" name="foto" class="form-control" value="<?php echo $row['foto']; ?>">
                            </div>

                            <!-- Tombol Submit -->
                            <div class="mb-3 text-center">
                                <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
