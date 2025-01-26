<?php
include '../config/koneksi.php';
// session_start();

$query = "SELECT * FROM pelatihan";
$sql = mysqli_query($koneksi, $query);

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-barcode-scan"></i>
                </span> Tambah Pelatihan
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Data Pelatihan</h4>
                        <form method="post" action="tambah_pelatihan/simpan_pelatihan.php">
                            <div class="form-group">
                                <label for="nama_pelatihan">Nama Pelatihan</label>
                                <input type="text" class="form-control append-input" id="nama_pelatihan" name="nama_pelatihan" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_acara">Tanggal Acara</label>
                                <input type="date" class="form-control append-input" id="tanggal_acara" name="tanggal_acara" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_acara">Tempat Acara</label>
                                <input type="text" class="form-control append-input" id="tempat_acara" name="tempat_acara" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control append-input" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>" required readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

