<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-barcode-scan"></i>
                </span> ID CARD MAHASISWA
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
                    <center>
                        <h4 class="card-title">KARTU IDENTITAS MAHASISWA</h4>
                        <div class="card-idcard">
                            <p class="nama" style="padding-top: 5%;"><b>MAHASISWA UNIVERSITAS KOMPUTER INDONESIA</b></p>
                            <img src="assets/images/foto_mahasiswa/<?php echo $_SESSION['foto'] ?>" alt="" style="width:50%; height: 160px;border-radius: 100%;">
                            <h1></h1>
                            <!-- <div id="qrcode"></div> -->
                            <p style="margin-top: 5%; color: white;"><?php echo $_SESSION['nama_lengkap']?></p>
                            <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?= $_SESSION['nim'] ?>&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive mb-5" />
                            <input type="text" class="form-control" id="nim" value="<?php echo $_SESSION['nim']?>" style="text-align: center; font-family: arial; font-size: 18px; border: none; background: none; margin-top: -10%;" disabled/>
                            <div style="margin: 24px 0;">
                                 
                            </div>
                        </div>
                    </center>
                    
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

<style>
.card-idcard {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: 'Arial', sans-serif;
  border-radius: 20px;
  padding: 20px;
  background: linear-gradient(to right, #673AB7, #AB47BC); /* Gradasi warna ungu */
}

.nama {
  color: #ffffff; /* Warna teks putih */
  font-size: 18px;
}

#nim {
  text-align: center;
  font-family: 'Arial', sans-serif;
  font-size: 18px;
  border: none;
  color: white;
}

.qr-code {
  max-width: 160px;
  margin-top: 10px;
  border: 2px solid #ffffff; /* Warna border QR code putih */
  border-radius: 10px;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script>
    // Function to HTML encode the text
    // This creates a new hidden element,
    // inserts the given text into it 
    // and outputs it out as HTML
    function htmlEncode(value) {
      return $('<div/>').text(value)
        .html();
    }

    $(function () {

      // Specify an input event listener for the NIM input
      $('#nim').on('input', function () {

        // Generate the link that would be
        // used to generate the QR Code
        // with the given data 
        let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' +
          htmlEncode($(this).val()) +
          '&chs=160x160&chld=L|0'

        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
      });

      // Specify an onclick function
      // for the generate button
      $('#generate').click(function () {

        // Generate the link that would be
        // used to generate the QR Code
        // with the given data 
        let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' +
          htmlEncode($('#nim').val()) +
          '&chs=160x160&chld=L|0'

        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
      });
    });
</script>

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Get the input element
      var inputElement = document.getElementById("textInput");

      // Get the output element
      var outputElement = document.getElementById("qrcode");
      var qrcode = new QRCode(outputElement, {
          text: "Qaysa Ganteng",
          width: 128,
          height: 128
        });

      // Attach an event listener to the input element
      // inputElement.addEventListener("input", function() {
      //   // Get the value from the input element
      //   var inputValue = inputElement.value;

      //   // Clear previous QR code
      //   outputElement.innerHTML = '';

      //   // Create QR code
        
      // });
    });
  </script> -->