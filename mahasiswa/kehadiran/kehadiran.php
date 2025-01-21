<?php
include '../config/koneksi.php';

$nim = $_SESSION['nim'];
$query = "SELECT kehadiran.id_kehadiran, kehadiran.id_qrcode, kehadiran.nim, matakuliah.no_matakuliah, matakuliah.nama_matakuliah, matakuliah.dosen, buatqr.pertemuan FROM matakuliah, buatqr, kehadiran WHERE kehadiran.no_matakuliah = matakuliah.no_matakuliah AND kehadiran.nim = $nim AND kehadiran.id_qrcode = buatqr.id_qrcode ORDER BY no_matakuliah, pertemuan DESC";
$sql = mysqli_query($koneksi, $query);

$rows = [];
while ($row = mysqli_fetch_array($sql)) {
    $rows[] = $row;
}



$prevNoMatakuliah = null;

$attendanceData = array();

$pertemuanTerbesar = 0;
$l = 1;
foreach ($rows as $index => $value) {
    $matakuliah = $value[3]; // Index 3 corresponds to no_matakuliah
    $pertemuan = $value[6];   // Index 6 corresponds to pertemuan

    // Initialize the array if not set
    if (!isset($attendanceData[$matakuliah])) {
        $attendanceData[$matakuliah] = array_fill(1, 14, ''); // Initialize with empty values for 14 pertemuan
    }
    // Set "v" for the corresponding pertemuan
    $attendanceData[$matakuliah][$pertemuan] = '✓';

    
    $attendanceData[$matakuliah]['nama_matakuliah'] = $value[4]; // Index 4 corresponds to nama_matakuliah
    $attendanceData[$matakuliah]['dosen'] = $value[5];
    if (isset($attendanceData[$matakuliah]['pertemuanTerbesar'])) {
      if ($attendanceData[$matakuliah]['pertemuanTerbesar'] < $pertemuan) {
        $attendanceData[$matakuliah]['pertemuanTerbesar'] = $pertemuan;
      }
    }else {
      $attendanceData[$matakuliah]['pertemuanTerbesar'] = $pertemuan;
    }  
}


foreach ($rows as $attendance) {
  $matakuliah = $attendance[3]; // Index 3 corresponds to no_matakuliah
  $pertemuan = $attendance[6];   // Index 6 corresponds to pertemuan
  if ($pertemuan < $attendanceData[$matakuliah]['pertemuanTerbesar']) {
    for ($h=$attendanceData[$matakuliah]['pertemuanTerbesar']; $h >= 1; $h--) { 
      if ($attendanceData[$matakuliah][$h] == "") {
        $attendanceData[$matakuliah][$h] = "x";
      }
    }
  }
}

?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> Kehadiran Mahasiswa
              </h3>
              <!-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav> -->
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="container">
                        <a target="_blank" href="kehadiran/export_excel.php">EXPORT KE EXCEL</a><br><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NOMOR MATAKULIAH</th>
                                    <th>NAMA MATAKULIAH</th>
                                    <th>DOSEN</th>
                                    <?php
                                        // Header pertemuan diluar loop
                                        for ($j = 1; $j <= 14; $j++) {
                                            echo '<th>' . $j . '</th>';
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                              foreach ($attendanceData as $matakuliah => $data) {
                                echo '<tr>';
                                echo '<td>' . $i++ . '</td>';
                                echo '<td>' . $matakuliah . '</td>';
                                echo '<td>' . $data['nama_matakuliah'] . '</td>';
                                echo '<td>' . $data['dosen'] . '</td>';
                            
                                // Iterate over pertemuans
                                foreach ($data as $key => $value) {
                                    // Skip the columns we already printed
                                    if ($key !== 'nama_matakuliah' && $key !== 'dosen' && $key !== 'pertemuanTerbesar') {
                                        echo '<td>' . $value . '</td>';
                                    }
                                }
                            
                                echo '</tr>';
                            }
                              //  $i = 1;
                              //  foreach ($rows as $row) {
                              //      // Periksa apakah nomor matakuliah berbeda dengan sebelumnya
                              //      if ($row['no_matakuliah'] != $prevNoMatakuliah) {
                              //          // Jika berbeda, tutup baris terakhir jika ada
                              //          if ($prevNoMatakuliah !== null) {
                              //              echo '</tr>';
                              //          }
                              //          // Buka baris baru
                              //          echo '<tr>';
                              //          echo '<td>' . $i++ . '</td>';
                              //          echo '<td>' . $row['no_matakuliah'] . '</td>';
                              //          echo '<td>' . $row['nama_matakuliah'] . '</td>';
                              //          echo '<td>' . $row['dosen'] . '</td>';
                                       
                              //      }
                              //     //  // Mulai pertemuan 1 di luar loop no_matakuliah
                              //     if (condition) {
                              //       # code...
                              //     }
                              //     echo '<td>' . "ini row ke ". $row['pertemuan'] . '</td>';
                              //     for ($k=1; $k <=  14; $k++) { 
                              //      // if ($k == $row['pertemuan']) {
                              //      //   echo '<td>' . "anjing" . '</td>';
                              //      // } else {
                              //      //   echo '<td></td>';
                              //      // }
                              //      break;
                              //     }

                              //     //  echo '<td>' . ($row['pertemuan'] >= 1 ? '✓' : '') . '</td>';
 
                              //      // Inisialisasi kembali variabel no_matakuliah
                              //      $prevNoMatakuliah = $row['no_matakuliah'];
                              //  }
 
                              //  // Tutup baris terakhir jika ada
                              //  if ($prevNoMatakuliah !== null) {
                              //      echo '</tr>';
                              //  }
                            ?>
                            <?php
                            //   $i = 1;
                            //   foreach ($rows as $row) {
                            //       // Periksa apakah nomor matakuliah berbeda dengan sebelumnya
                            //       if ($row['no_matakuliah'] != $prevNoMatakuliah) {
                            //           // Jika berbeda, tutup baris terakhir jika ada
                            //           if ($prevNoMatakuliah !== null) {
                            //               echo '</tr>';
                            //           }
                            //           // Buka baris baru
                            //           echo '<tr>';
                            //           echo '<td>' . $i++ . '</td>';
                            //           echo '<td>' . $row['no_matakuliah'] . '</td>';
                            //           echo '<td>' . $row['nama_matakuliah'] . '</td>';
                            //           echo '<td>' . $row['dosen'] . '</td>';
                                      
                            //           echo '<td>' . ($row['pertemuan'] >= 1 ? '✓' : '') . '</td>';

                            //           // Cetak sel untuk setiap pertemuan di dalam loop baris
                            //           // for ($j = 1; $j <= 14; $j++) {
                            //           //     // Periksa apakah pertemuan ke-$j dihadiri
                            //           //     $hadir = in_array($j, explode(',', $row['pertemuan']));
                            //           //     echo '<td>' . ($hadir ? '✓' : '') . '</td>';
                            //           // }
                              
                            //           // Inisialisasi kembali variabel no_matakuliah
                            //           $prevNoMatakuliah = $row['no_matakuliah'];
                            //       }
                            //   }
                              
                            //   // Tutup baris terakhir jika ada
                            //   if ($prevNoMatakuliah !== null) {
                            //       echo '</tr>';
                            //   }
                              
                            ?>
                            </tbody>
                        </table>
                    </div>  
                    <div class="d-flex">
                      <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <!-- <i class="mdi mdi-account-outline icon-sm me-2"></i> -->
                        <!-- <span>jack Menqu</span> -->
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <!-- <i class="mdi mdi-clock icon-sm me-2"></i> -->
                        <!-- <span>October 3rd, 2018</span> -->
                      </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      <!-- <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image"> -->
                      <div class="mb-0 flex-grow">
                        <!-- <h5 class="me-2 mb-2">School Website - Authentication Module.</h5> -->
                        <!-- <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p> -->
                      </div>
                      <div class="ms-auto">
                        <!-- <i class="mdi mdi-heart-outline text-muted"></i> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>