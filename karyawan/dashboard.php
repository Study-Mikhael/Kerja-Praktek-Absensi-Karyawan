<?php
include '../config/koneksi.php';

// session_start(); // Ensure the session is started

$nik = $_SESSION['nik'];

// Sanitize the nik to ensure it's an integer (just in case)
$nik = intval($nik);

// Prepare the SQL query with a prepared statement to prevent SQL injection
$query = "SELECT COUNT(*) AS record
FROM karyawan
JOIN kehadiran ON karyawan.nik = kehadiran.nik
JOIN buatqr ON buatqr.id_qrcode = kehadiran.id_qrcode
JOIN pelatihan ON pelatihan.no_pelatihan = buatqr.no_pelatihan
WHERE karyawan.nik = ?";

// Prepare the statement
$stmt = mysqli_prepare($koneksi, $query);
if ($stmt === false) {
    die('Error preparing the statement: ' . mysqli_error($koneksi));
}

// Bind the parameter
mysqli_stmt_bind_param($stmt, 'i', $nik);

// Execute the query
mysqli_stmt_execute($stmt);

// Fetch the result
$result = mysqli_stmt_get_result($stmt);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_pelatihan = $row['record'];
} else {
    $total_pelatihan = 0; // In case of query failure or no results
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grno-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">
                            Total Pelatihan Diikuti <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?php echo $total_pelatihan; ?></h2>
                        <p>Jumlah pelatihan yang telah Anda hadiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
