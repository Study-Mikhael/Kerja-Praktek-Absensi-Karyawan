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
                </span> Buat QR Pelatihan
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Data Pelatihan</h4>
                        <form method="post" action="buat_qr/simpan.php">
                            <div class="form-group">
                                <label for="nama_pelatihan">id_admin Pelatih</label>
                                <input type="text" class="form-control append-input" id="id_admin" name="id_admin" value="<?php echo $_SESSION['id_admin']?>" required readonly>
                                <input type="hidden" class="form-control append-input" id="id_admin" name="id_admin" value="<?php echo $_SESSION['id_admin']?>" required>
                            </div>
                            <div class="form-group">
                                <?php
                                    $length = 10; // Panjang angka yang diinginkan

                                    // Menghasilkan nilai integer acak
                                    $randomNumber = random_int(pow(10, $length - 1), pow(10, $length) - 1);

                                    // Mengonversi nilai integer ke dalam bentuk string
                                    $randomString = (string) $randomNumber;

                                ?>
                                <label for="id_qrcode">Kode QR</label>
                                <input type="text" class="form-control append-input" id="id_qrcode" name="id_qrcode" value="<?php echo $randomString; ?>" required readonly>
                                <!-- <input type="hidden" class="form-control append-input" id="id_qrcode" name="id_qrcode" value="" required> -->
                            </div>
                            <div class="form-group">
                                <label for="nama_pelatihan">Nomor Pelatihan</label>
                                <select class="form-control append-input" name="no_pelatihan" id="pelatihan">
                                    <option value="">Pilih Nama Pelatihan</option>
                                    <?php
                                    // Tampilkan data pelatihan dalam option
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='{$row['no_pelatihan']}'>{$row['nama_pelatihan']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

