<?php
include"../config/koneksi.php";

$id = $_GET['id'];
$query = "SELECT karyawan.nik, karyawan.nama_lengkap, karyawan.email, kehadiran.tanggal_masuk, buatqr.id_qrcode FROM karyawan, kehadiran, buatqr WHERE karyawan.nik = kehadiran.nik AND buatqr.id_qrcode = $id;";
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
                    <th>NIK</th>
                    <th>NAMA KARYAWAN</th>
                    <th>TANGGAL MASUK</th>
                    <th>EMAIL</th>
                  </tr>
                </thead>
                  <?php
                    while($row = mysqli_fetch_array($sql3)){
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['nik']; ?></td>
                      <td><?php echo $row['nama_lengkap']?></td>
                      <td><?php echo $row['tanggal_masuk']?></td>
                      <td><?php echo $row['email']?></td>
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

