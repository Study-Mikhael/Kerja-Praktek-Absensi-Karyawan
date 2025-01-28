<?php 
include'../config/koneksi.php';

// $id_admin = $_SESSION['id_admin'];
$query = "SELECT * FROM karyawan ORDER BY nik  DESC";
$sql = mysqli_query($koneksi, $query);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-barcode-scan"></i>
        </span> Data Karyawan
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
                  <!-- Tombol untuk memunculkan modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data Karyawan
                  </button>
                </div>
               
              </div>
            </div>
              <table class="table table-bordered" id="dataTable">
                <thead class="table-dark">
                  <tr>
                    <th>NIK</th>
                    <th>NAMA LENGKAP</th>
                    <th>EMAIL</th>
                    <th>TANGGAL LAHIR</th>
                    <th>KOTA</th>
                    <th>NO HP</th>
                    <th>Aksi</th>
                  </tr>
                    <?php 
                    
                        while ($row = mysqli_fetch_array($sql)){		
                                
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['nik']; ?></td>
                      <td><?php echo $row['nama_lengkap']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['tanggal_lahir']; ?></td>
                      <td><?php echo $row['kota']; ?></td>
                      <td><?php echo $row['no_hp']; ?></td>
                      <td>
                       <a href="karyawan/hapus.php?nik=<?php echo $row['nik']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">HAPUS</a>
                       <a href="index.php?menu=7&nik=<?php echo $row['nik']; ?>" class="btn btn-warning">EDIT</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="karyawan/tambah_karyawan.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <!-- <label for="id_google">ID Google</label> -->
                <input type="text" class="form-control" id="id_google" name="id_google" hidden>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>