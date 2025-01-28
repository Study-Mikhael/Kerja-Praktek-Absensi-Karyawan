<?php 
include'../config/koneksi.php';

$id_admin = $_SESSION['id_admin'];
$query = "SELECT buatqr.id_qrcode ,buatqr.no_pelatihan, pelatihan.nama_pelatihan, pelatihan.tanggal_acara, pelatihan.tempat_acara FROM buatqr, pelatihan WHERE pelatihan.no_pelatihan = buatqr.no_pelatihan ORDER BY tanggal_acara  DESC";
$sql = mysqli_query($koneksi, $query);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-barcode-scan"></i>
        </span> Daftar Pelatihan
      </h3>
    </div>  
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
            <div class="mb-3 mt-2">
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="filterIdQrCode" placeholder="ID QR Code">
                </div>
                <div class="col-md-4">
                  <button class="btn btn-info" onclick="filterTable()"><i class="mdi mdi-magnify"></i> Cari</button>
                </div>
              </div>
            </div>
              <table class="table table-bordered" id="dataTable">
                <thead class="table-dark">
                  <tr>
                    <th>ID QR</th>
                    <th>No Pelatihan</th>
                    <th>Jenis Pelatihan</th>
                    <th>Tanggal Pelatihan Dimulai</th>
                    <th>Pertemuan</th>
                    <th>Action</th>
                  </tr>
                  <?php 
                    
								    while ($row = mysqli_fetch_array($sql)){		
                      						
							    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['id_qrcode']; ?></td>
                      <td><?php echo $row['no_pelatihan']; ?></td>
                      <td><?php echo $row['nama_pelatihan']; ?></td>
                      <td><?php echo $row['tanggal_acara']; ?></td>
                      <td><?php echo $row['tempat_acara']; ?></td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter" data-kuliah='<?=json_encode($row)?>'>
                          <i class="mdi mdi-barcode-scan"></i> 
                        </button>
                        <a href="index.php?menu=4&id=<?php echo $row['id_qrcode'];?>" class="btn btn-primary btn-sm">
                          <i class="mdi mdi-eye"></i> 
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  ?>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
        <div class="qr-code" id="qrcode">

        </div>
                  </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  $('#exampleModalCenter').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('kuliah') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    var obj = {
      "id_qrcode" : recipient.id_qrcode,
      "no_matakuliah" : recipient.no_matakuliah
    }
    // var obj = {
    //   "id_qrcode" : recipient.id_qrcode,
    //   "nama_matakuliah" : recipient.nama_matakuliah,
    //   "jurusan" : recipient.jurusan,
    //   "kelas" : recipient.kelas,
    //   "id_admin" : recipient.id_admin,
    //   "pertemuan" : recipient.pertemuan,
    //   "ruangan" : recipient.ruangan,
    //   "semester" : recipient.semester,
    //   "latitude" : recipient.latitude,
    //   "longitude" : recipient.longitude 
    // }
    console.log(JSON.stringify(obj))
    $("#qrcode").text("")
    // $("#qrcode").qrcode({
    //   text: JSON.stringify(obj)
    // });
    var qrcode = new QRCode(document.getElementById("qrcode"), JSON.stringify(obj));
    
    // modal.find('.modal-body .qr-code').text(json)
  })
</script>
<script>
  function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterIdQrCode");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");

    // Loop melalui semua baris tabel dan sembunyikan yang tidak sesuai dengan filter
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0]; // Ganti 0 dengan indeks kolom yang ingin Anda filter
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>
<script>
  $('#exampleModalCenter').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('kuliah');
    var obj = {
      "id_qrcode" : recipient.id_qrcode,
      "no_matakuliah" : recipient.no_matakuliah
    }
    console.log(JSON.stringify(obj))
    $("#qrcode").text("")
    var qrcode = new QRCode(document.getElementById("qrcode"), JSON.stringify(obj));
  });
</script>
