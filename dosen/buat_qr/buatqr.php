<?php
include '../config/koneksi.php';

$query = "SELECT * FROM matakuliah";
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
                                <label for="nama_matakuliah">NIP Pelatih</label>
                                <input type="text" class="form-control append-input" id="nip" name="nip" value="<?php echo $_SESSION['nip']?>" required readonly>
                                <input type="hidden" class="form-control append-input" id="nip" name="nip" value="<?php echo $_SESSION['nip']?>" required>
                            </div>
                            <div class="form-group">
                                <?php
                                    $length = 5; // Panjang angka yang diinginkan

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
                                <label for="nama_matakuliah">Nomor Pelatihan</label>
                                <select class="form-control append-input" name="no_matakuliah" id="matakuliah">
                                    <option value="">Pilih Nomor Matakuliah</option>
                                    <?php
                                    // Tampilkan data matakuliah dalam option
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value='{$row['no_matakuliah']}'>{$row['no_matakuliah']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_matakuliah">Jenis Pelatihan:</label>
                                <select class="form-control append-input" id="jurusan" name="jurusan" required onchange="populateSubJurusan()">
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                                    <option value="Sistem Informasi">SISTEM INFORMASI</option>
                                    <option value="Teknik Elektro">TEKNIK ELEKTRO</option>
                                    <!-- Tambahkan opsi jurusan lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_jurusan">Jam Masuk:</label>
                                <input type="time" id="sub_jurusan" name="kelas" class="form-control">
                                <!-- <select class="form-control" id="sub_jurusan" name="kelas" required>
                                    Opsi untuk Sub Jurusan akan ditambahkan dinamis oleh JavaScript
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="pertemuan">Pertemuan:</label>
                                <select class="form-control append-input" id="pertemuan" name="pertemuan" required>
                                    <option value="">Pilih Pertemuan</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <!-- Tambahkan opsi jurusan lainnya sesuai kebutuhan -->
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

