<?php
include'../config/koneksi.php';

// $id = $_[id_qrcode];
// $query = "SELECT buatqr.id_qrcode, buatqr.no_matakuliah FROM buatqr WHERE buatqr.id_qrcode = ";
// $sql = mysqli_query($koneksi, $query);
// $row = mysqli_fetch_array($sql);
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> Scan QR Code Karyawan
              </h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
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
                    <center>
                      <div class="container">
                        <h1>Scan QR Codes</h1> 
                          <div class="section"> 
                            <div id="my-qr-reader"> 
                          </div> 
                        </div> 
                      </div>
                    </center>
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

<style>
/* body { 
    display: flex; 
    justify-content: center; 
    margin: 0; 
    padding: 0; 
    height: 100vh; 
    box-sizing: border-box; 
    text-align: center; 
    background: rgb(128 0 0 / 66%); 
}  */
.container { 
    width: 100%; 
    max-width: 500px; 
    margin: 5px; 
} 
  
.container h1 { 
    color: #ffffff; 
} 
  
.section { 
    background-color: #ffffff; 
    padding: 50px 30px; 
    border: 1.5px solid #b2b2b2; 
    border-radius: 0.25em; 
    box-shadow: 0 20px 25px rgba(0, 0, 0, 0.25); 
} 
  
#my-qr-reader { 
    padding: 20px !important; 
    border: 1.5px solid #b2b2b2 !important; 
    border-radius: 8px; 
} 
  
#my-qr-reader img[alt="Info icon"] { 
    display: none; 
} 
  
#my-qr-reader img[alt="Camera based scan"] { 
    width: 100px !important; 
    height: 100px !important; 
} 
  
button { 
    padding: 10px 20px; 
    border: 1px solid #b2b2b2; 
    outline: none; 
    border-radius: 0.25em; 
    color: white; 
    font-size: 15px; 
    cursor: pointer; 
    margin-top: 15px; 
    margin-bottom: 10px; 
    background-color: #008000ad; 
    transition: 0.3s background-color; 
} 
  
button:hover { 
    background-color: #008000; 
} 
  
#html5-qrcode-anchor-scan-type-change { 
    text-decoration: none !important; 
    color: #1d9bf0; 
} 
  
video { 
    width: 100% !important; 
    border: 1px solid #b2b2b2 !important; 
    border-radius: 0.25em; 
}
</style>  
<script src="https://unpkg.com/html5-qrcode@latest"></script>

<script>
  // Fungsi untuk menghitung jarak antara dua set koordinat menggunakan rumus Haversine
    function haversineDistance(lat1, lon1, lat2, lon2) {
        const R = 6371; // Radius Bumi dalam kilometer
        const dLat = deg2rad(lat2 - lat1);
        const dLon = deg2rad(lon2 - lon1);
        const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c; // Jarak dalam kilometer

        return distance;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }
    document.addEventListener('DOMContentLoaded', function () {
        const qrReader = new Html5Qrcode('my-qr-reader');
        // -6.973565, 107.569886
        // -6.887093, 107.615215 
        // -6.973540, 107.569731
        const unikomLatitude = -6.887093; // Ganti dengan lintang Unikom yang sebenarnya
        const unikomLongitude = 107.615215; // Ganti dengan bujur Unikom yang sebenarnya
        const distanceThreshold = 20; // Batas jarak dalam kilometer

        const startScanningButton = document.createElement('button');
        startScanningButton.textContent = 'Mulai Pemindaian';
        startScanningButton.classList.add('btn', 'btn-primary', 'mb-3'); // Menambahkan kelas-kelas Bootstrap
        startScanningButton.addEventListener('click', () => {
            qrReader.start(
                { facingMode: 'environment' },
                {
                    fps: 10,
                    qrbox: 250,
                },
                (qrCodeMessage) => {
                    // Stop the QR code scanner
                    qrReader.stop();

                    // Access the device's location using the Geolocation API
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const { latitude, longitude } = position.coords;
                                const jarak = haversineDistance(latitude, longitude, unikomLatitude, unikomLongitude);
                                if (jarak <= distanceThreshold){
                                  // Display the map using the obtained coordinates
                                  displayMap(latitude, longitude, qrCodeMessage);
                                }else{
                                  alert('Anda Berada di Luar jarak yang diijinkan');
                                }
                                console.log(jarak)
                            },
                            (error) => {
                                console.error('Error getting location:', error.message);
                            }
                        );
                    } else {
                        console.error('Geolocation is not supported by this browser.');
                    }
                },
                (errorMessage) => {
                    console.error('Error scanning QR code:', errorMessage);
                }
            );
        });

        document.querySelector('#my-qr-reader').appendChild(startScanningButton);

        function getCurrentDate() {
          const now = new Date();
          const year = now.getFullYear().toString().padStart(4, '0');
          const month = (now.getMonth() + 1).toString().padStart(2, '0');
          const day = now.getDate().toString().padStart(2, '0');
          return `${year}-${month}-${day}`;
        }

        function displayMap(latitude, longitude, qrCodeMessage) {
            // Embed a map from Google Maps using an iframe
            const mapContainer = document.createElement('div');
            mapContainer.style.width = '100%';
            mapContainer.style.height = '400px';

            const iframe = document.createElement('iframe');
            iframe.src = `https://maps.google.com/maps?q=${latitude},${longitude}&z=15&output=embed`;
            iframe.style.width = '100%';
            iframe.style.height = '100%';

            mapContainer.appendChild(iframe);

            console.log(qrCodeMessage);
            var obj = JSON.parse(qrCodeMessage);
            var id_qr = obj.id_qrcode;
            var id_no = obj.no_pelatihan;

            // Add form and button below the map
            const formContainer = document.createElement('div');
            formContainer.classList.add('container', 'mt-3'); // Menambahkan kelas-kelas Bootstrap
            formContainer.innerHTML = `
                <form action="scan_qr/simpan.php" method="post">
                  
                    <div class="col-md-6 mb-3">
                        <label for="qrInfo" class="form-label"></label>
                        <input type="hidden" class="form-control" name="id_qrcode" value="${id_qr}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIK:</label>
                        <input type="number" class="form-control" name="nik" value="<?php echo $_SESSION['nik'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="lat" class="form-label">Latitude:</label>
                        <input type="text" class="form-control" name="latitude" value="${latitude}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="long" class="form-label">Longitude:</label>
                        <input type="text" class="form-control" name="longitude" value="${longitude}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="entryTime" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_masuk" value="${getCurrentDate()}" readonly>
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apa Anda Yakin Untuk Menyimpan Data Ini?')">Simpan Data</button>
                </form>
            `;

            // Replace the content of the container with the map and form
            document.querySelector('.container').innerHTML = '';
            document.querySelector('.container').appendChild(mapContainer);
            document.querySelector('.container').appendChild(formContainer);

            function getCurrentTime() {
                const now = new Date();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                return `${hours}:${minutes}`;
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
