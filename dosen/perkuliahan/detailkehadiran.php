<?php
include"../config/koneksi.php";

$id = $_GET['id'];
// $query3 = "SELECT * FROM buatqr WHERE id_qrcode = '$id'";
$query = "SELECT kehadiran.id_kehadiran, kehadiran.id_qrcode , buatqr.no_matakuliah ,mahasiswa.nim , mahasiswa.nama_lengkap, mahasiswa.kelas, mahasiswa.semester, kehadiran.tanggal_absen FROM kehadiran, mahasiswa , buatqr WHERE kehadiran.id_qrcode = '$id' and kehadiran.id_qrcode = buatqr.id_qrcode AND mahasiswa.nim = kehadiran.nim";
$sql3 = mysqli_query($koneksi, $query);
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-barcode-scan"></i>
        </span> Daftar Perkuliahan
      </h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
            <div class="form-group">
              <table class="table table-bordered" id="dataTable">
                <thead class="table-dark">
                  <tr>
                    <th>No Pelatihan</th>
                    <th>No Telp</th>
                    <th>Nama Siswa</th>
                    <th>Jam Masuk</th>
                    <th>Tanggal Absen</th>
                  </tr>
                </thead>
                  <?php
                    while($row = mysqli_fetch_array($sql3)){
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['no_matakuliah']; ?></td>
                      <td><?php echo $row['nim']?></td>
                      <td><?php echo $row['nama_lengkap']?></td>
                      <td><?php echo $row['kelas']?></td>
                      <td><?php echo $row['tanggal_absen']?></td>
                    </tr>
                  </tbody>
                  <?php
                        }
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#example").DataTable({
		"ajax": {
			"url" : "data.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data" : "title"},
			{"data": "body"},
			{"data" : "created_at"}
		]
	})
})
</script>

