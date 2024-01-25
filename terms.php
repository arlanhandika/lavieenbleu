<?php
	session_start();
	require_once("config/koneksi.php");

  if(isset ($_POST['submit_kontak'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    if (empty($email) || empty($nama)){
        echo '<div class="warning">Data tidak boleh kosong</div>';
    } else {
        $insert = mysqli_query ($koneksi,
        "INSERT INTO kontak(email, nama, pesan)
        VALUES ('$email', '$nama', '$pesan')");
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='terms.php';</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="id">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Lavieenbleu</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Lavieenbleu</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Beranda
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkout.php">Checkout</a>
              </li>
              <li class="nav-item dropdown active">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
              
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.php">Tentang Kami</a>
                    <a class="dropdown-item" href="blog.php">Artikel</a>
                    <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                    <a class="dropdown-item active" href="terms.php">Ketentuan</a>
                    <a class="dropdown-item" href="contact.php">Kontak Kami</a>
                </div>
              </li>
              <?php
              if(isset($_SESSION['valid'])) { ?>
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="account.php">Profil Saya</a>
                  <a class="dropdown-item" href="orders.php">Riwayat Pemesanan</a>
                </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Keluar</a>
              <?php }
              else { ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Masuk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Daftar</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>KETENTUAN</h1>
            <span>Ketentuan dan Syarat Berbelanja di Lavieenbleu</span>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="more-info-content">
          <div class="right-content">
            <style>
              h5 {
                  font-size: 1.2em;
                  color: #0077b6;
              }

              p {
                  font-size: 1em;
                  color: #333; 
                  margin: 0;
                  line-height: 1.4; 
              }

              span {
                  font-size: 1.2em;
                  font-weight: bold;
                  color: #ff5733;
              }

              h5 + span {
                  font-size: 1em;
                  font-weight: normal;
                  color: #666;
              }
            </style>

            <h5>1. Definisi</h5>
            <br>
            <p>Dalam hal ini, "Lavieenbleu" merujuk kepada situs web e-commerce ini. "Pengguna" adalah setiap individu atau entitas yang mengakses atau menggunakan situs web ini.</p>

            <br>

            <h5>2. Ketentuan dan Penggunaan</h5>
            <br>  
            <p>a. Anda harus berusia minimal 18 tahun atau memiliki izin orang tua atau wali hukum untuk menggunakan Lavieenbleu.<br>b. Anda bertanggung jawab untuk menjaga kerahasiaan informasi akun Anda, dan Anda setuju untuk memberikan informasi yang akurat dan lengkap saat mendaftar.<br>c. Penggunaan situs ini harus mematuhi hukum yang berlaku, dan Anda setuju untuk tidak menggunakan Lavieenbleu untuk tujuan ilegal.</p>

            <br>

            <h5>3. Pembelian dan Pengembalian</h5>
            <br>  
            <p>a. Harga produk yang tercantum di situs adalah harga yang berlaku pada saat pembelian.<br>b. Kebijakan pengembalian dan garansi produk dapat ditemukan di halaman yang ditentukan pada situs web.</p>

            <br>

            <h5>4. Hak Cipta dan Kepemilikan Intelektual</h5>
            <br>  
            <p>a. Isi situs web, termasuk gambar, teks, dan desain, dilindungi oleh hak cipta Lavieenbleu.<br>b. Tidak diperbolehkan untuk menggandakan, mendistribusikan, atau menggunakan materi dari Lavieenbleu tanpa izin tertulis.</p>

            <br>

            <h5>5. Pengakhiran dan Perubahan Ketentuan</h5>
            <br>
            <p>Lavieenbleu berhak mengakhiri akses pengguna atau mengubah ketentuan dan syarat ini tanpa pemberitahuan sebelumnya.</p>

            <br>  
            <br>  
            <br>  
            <br>  
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
            <h4>Lavieenbleu</h4>
            <p>Jl. Lap. Golf, Kp. Tengah
              Kec. Pancur Batu, Kabupaten Deli Serdang,
              Sumatera Utara 20353, Indonesia.</p>
            <ul class="social-icons">
              <li><a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.x.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://youtube.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <li><a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          
          <div class="col-md-4 footer-item">
            <h4>Tautan Cepat</h4>
            <ul class="menu-list">
              <li><a href="products.php">Produk</a></li>
              <li><a href="about.php">Tentang Kami</a></li>
              <li><a href="blog.php">Artikel</a></li>
              <li><a href="testimonials.php">Testimoni</a></li>
              <li><a href="terms.php">Ketentuan</a></li>
            </ul>
          </div>
          <div class="col-md-4 footer-item last-item">
          <h4>Kontak Kami</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Anda">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="Alamat E-mail" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="pesan" rows="6" class="form-control" id="pesan" placeholder="Pesan Anda" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="submit_kontak" id="submit_kontak" class="filled-button">Kirim Pesan</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                © Lavieenbleu 2023. Hak Cipta Dilindungi
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

  </body>
</html>