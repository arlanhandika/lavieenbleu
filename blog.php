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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='blog.php';</script>";
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
                    <a class="dropdown-item active" href="blog.php">Artikel</a>
                    <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                    <a class="dropdown-item" href="terms.php">Ketentuan</a>
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
            <h1>BACA ARTIKEL KAMI</h1>
            <span>Referensi Untuk Kebutuhan Perangkatmu</span>
          </div>
        </div>
      </div>
    </div>

    <div class="single-services">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <section class='tabs-content'>
              <article id='tabs-1'>
                <img src="assets/images/artikel1.jpg" alt="">
                <h4><a href="blog-details1.php">Tips Dan Trik Laptop Yang Harus Diketahui Semua Orang</a></h4>
                <div style="margin-bottom:10px;">
                  <span>Firdha Hapsari &nbsp;|&nbsp; 22.10.2023 13:04</span>
                </div>
                <p>Dengan komputer laptop, Anda dapat menunjukkan kepada klien Anda situs web baru Anda dari mana saja. Saat Anda menghadiri kuliah, tidak mungkin menuliskan setiap kata dengan tangan. Pelajari tentang membeli laptop baru di artikel ini</p>
                <br>
                <div>
                  <a href="blog-details1.php" class="filled-button">Lanjutkan membaca</a>
                </div>
              </article>

              <br>
              <br>
              <br>

              <article id='tabs-2'>
                <img src="assets/images/artikel2.jpg" alt="">
                <h4><a href="blog-details2.php"></a>Rekomendasi Laptop Untuk Mahasiswa Sistem Informasi</h4>
                <div style="margin-bottom:10px;">
                  <span> Khalisah Khirman&nbsp;|&nbsp; 22.10.2023 14:29</span>
                </div>
                <p>Dalam artikel ini, Anda akan menemukan panduan mengenai spesifikasi standar dan rekomendasi laptop yang cocok untuk mahasiswa jurusan Sistem Informasi, mulai dari harga terjangkau hingga yang lebih mahal.</p>
                <br>
                <div>
                  <a href="blog-details2.php" class="filled-button">Lanjutkan membaca</a>
                </div>
              </article>

              <br>
              <br>
              <br>

              <article id='tabs-3'>
                <img src="assets/images/artikel3.jpg" alt="">
                <h4><a href="blog-details3.php"></a>Fungsi dan Manfaat Laptop</h4>
                <div style="margin-bottom:10px;">
                  <span> Nazwa Ali Nasution&nbsp;|&nbsp;  22.10.2023 17:36</span>
                </div>
                <p>Laptop dapat juga di katakan menjadi sebuah perangkat yang sangat di butuhkan pada zaman saat ini selain pengguna smartphone. Selain dapat mudah di bawa ke mana-mana, laptop juga memiliki berbagai macam manfaat dan kelebihan yang ditawarkan sehingga dapat mempermudah untuk  penggunanya dalam kegiatan sehari-hari. </p>
                <br>
                <div>
                  <a href="blog-details3.php" class="filled-button">Lanjutkan membaca</a>
                </div>
              </article>

              <br>
              <br>
              <br>

              <article id='tabs-4'>
                <img src="assets/images/artikel4.jpg" alt="">
                <h4><a href="blog-details4.php">Laptop Sebagai Alat Penunjang Segala Kebutuhan</a></h4>
                <div style="margin-bottom:10px;">
                  <span>Arlan Tri Handika &nbsp;|&nbsp; 22.10.2023 23:12</span>
                </div>
                <p>Sebagai komputer pribadi, Laptop memiliki fungsi yang sama dengan Komputer Desktop meskipun dengan kemampuan yang lebih rendah. Komponen yang terdapat didalamnya adalah sama dengan yang terdapat pada Komputer Desktop dengan ukuran yang diperkecil, lebih ringan, tidak panas dan irit listrik.</p>
                <br>
                <div>
                  <a href="blog-details4.php" class="filled-button">Lanjutkan membaca</a>
                </div>
              </article>
            </section>
          </div>

          <div class="col-md-4">

              <h4 class="h4">Postingan terakhir</h4>

              <ul>
                  <li>
                      <h5 style="margin-bottom:10px;"><a href="blog-details1.php">Tips Dan Trik Laptop Yang Harus Diketahui Semua Orang</a></h5>
                      <small><i class="fa fa-user"></i> Firdha Hapsari &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 13:04</small>
                  </li>

                  <li><br></li>

                  <li>
                      <h5 style="margin-bottom:10px;"><a href="blog-details2.php">Rekomendasi Laptop Untuk Mahasiswa Sistem Informasi</a></h5>
                      <small><i class="fa fa-user"></i> Khalisah Khirman &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 14:29</small>
                  </li>

                  <li><br></li>

                  <li>
                    <h5 style="margin-bottom:10px;"><a href="blog-details3.php">Fungsi dan Manfaat Laptop</a></h5>
                    <small><i class="fa fa-user"></i> Nazwa Ali Nasution &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 17:36</small>
                  </li>

                  <li><br></li>
                  
                  <li>
                    <h5 style="margin-bottom:10px;"><a href="blog-details4.php">Laptop Sebagai Alat Penunjang Segala Kebutuhan</a></h5>
                    <small><i class="fa fa-user"></i> Arlan Tri Handika &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 23:12</small>
                  </li>
              </ul>
          </div>
        </div>
      </div>
    </div>

    <br>  
    <br>  
    <br>  
    <br>  

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