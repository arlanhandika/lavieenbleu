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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='index.php';</script>";
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
              <li class="nav-item active">
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
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.php">Tentang Kami</a>
                    <a class="dropdown-item" href="blog.php">Artikel</a>
                    <a class="dropdown-item" href="testimonials.php">Testimoni</a>
                    <a class="dropdown-item" href="terms.php">Ketentuan</a>
                    <a class="dropdown-item" href="contact.php">Kontak Kami</a>
                </div>
              </li>
              <?php
              if(isset($_SESSION['valid'])) {
              ?>
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
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                  <h6>Laptop yang Memadukan Gaya dan Daya</h6>
                  <h4>Kesempurnaan dalam <br>Mobilitas Anda</h4>
                  <p>Pembaruan laptop kami sangat dinantikan dan siap memberikan pengalaman yang lebih baik daripada sebelumnya</p>
                  <a href="products.php" class="filled-button">Produk</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
          <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                  <h6>Tentang Kami</h6>
                  <h4>Komitmen Prioritas <br> kepada Pelanggan</h4>
                  <p>Kami hadir dengan tujuan yang kuat, untuk memenuhi kebutuhan dan memberikan nilai kepada pelanggan kami</p>
                  <a href="about.php" class="filled-button">Tentang Kami</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                <h6>Hubungi Kami dengan Percaya Diri</h6>
                  <h4>Kami Ingin Mendengar<br> dari Anda</h4>
                  <p>Kapan pun Anda butuhkan bantuan, tim dukungan kami siap membantu Anda, 24 jam sehari, 7 hari seminggu</p>
                  <a href="contact.php" class="filled-button">Kontak Kami</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->
    <div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <a href="products.php"> <h2> <em>Produk</em></a> Unggulan</h2>
            <span>Sebelum Keburu Habis!</span>
          </div>
        </div>
      <?php
      $result = $koneksi->query('SELECT * FROM produk limit 3');
      if($result){
        while($obj = $result->fetch_object()) {
      ?>
      <div class="col-md-4">
        <div class="service-item">
          <img src="assets/images/produk/<?php echo $obj->gambar ?>">
          <div class="down-content">
            <h4><?php echo $obj->nama_produk?></h4>
              <div style="margin-bottom: 10px;">
                <span><sup>Rp</sup><?php echo number_format($obj->harga, 0, ',', '.');?></span>
              </div>
              <p><?php echo $obj->spek?></p>
              <div class="stok-text">
                <p>STOK: <?php echo $obj->stok?> <p>
              </div>
              <?php 
              if($obj->stok > 0){ ?>
                <a input type="submit" href="tambah_ke_keranjang.php?action=add&id=<?php echo $obj->id ?>" class="filled-button tombolTambahKeranjang">
                <i class="fa fa-shopping-cart"></i> Tambahkan ke Keranjang</a>
              <?php }
              else {
                echo 'Stok Habis!';
              } ?>
          </div>
        </div>
        <br>
      </div>
      <?php
            }
          }
        ?>
        </div>
      </div>
    </div>

    <div class="fun-facts">
      <div class="container">
        <div class="more-info-content">
          <div class="row">
            <div class="col-md-6">
              <div class="left-image">
                <img src="assets/images/tentang2.jpg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="col-md-6 align-self-center">
              <div class="right-content">
                <span>Lavieenbleu</span>
                <h2>Ketahui Lebih Lengkap <a href="about.php"><em>Tentang</em></a> Kami</h2>
                <p>Selamat datang di Lavieenbleu, tempat di mana teknologi bertemu dengan gaya. Kami adalah toko laptop yang didedikasikan untuk memberikan pengalaman berbelanja yang unik, elegan, dan informatif kepada pelanggan kami.</p>
                <a href="about.php" class="filled-button">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="section-heading">
          <h2><a href="blog.php"><em>Artikel</em></a> Kami</h2>
          <span>Baca Artikel Kami Untuk Referensi Perangkat Kebutuhanmu!</span>
        </div>
        <div class="row" id="tabs">
          <div class="col-md-4">
            <ul>
              <li><a href='#tabs-1'>Tips Dan Trik Laptop Yang Harus Diketahui Semua Orang <br> <small>Firdha Hapsari &nbsp;|&nbsp; 22.10.2023 13:04</small></a></li>
              <li><a href='#tabs-2'>Rekomendasi Laptop Untuk Mahasiswa Sistem Informasi <br> <small>Khalisah Khirman &nbsp;|&nbsp; 22.10.2023 14:29</small></a></li>
              <li><a href='#tabs-3'>Fungsi dan Manfaat Laptop <br> <small>Nazwa Ali Nasution &nbsp;|&nbsp; 22.10.2023 17:36</small></a></li>
              <li><a href='#tabs-4'>Laptop Sebagai Alat Penunjang Segala Kebutuhan Saat Ini <br> <small>Arlan Tri Handika &nbsp;|&nbsp; 22.10.2023 23:12</small></a></li>
            </ul>

            <br>

            <div class="text-center">
              <a href="blog.php" class="filled-button">Baca Selengkapnya</a>
            </div>

            <br>
          </div>

          <div class="col-md-8">
            <section class='tabs-content'>
              <article id='tabs-1'>
                <img src="assets/images/artikel1.jpg" alt="">
                <h4><a href="blog-details.php">Tips Dan Trik Laptop Yang Harus Diketahui Semua Orang</a></h4>
                <p>Dengan komputer laptop, Anda dapat menunjukkan kepada klien Anda situs web baru Anda dari mana saja. Saat Anda menghadiri kuliah, tidak mungkin menuliskan setiap kata dengan tangan. Pelajari tentang membeli laptop baru di artikel ini.</p>
              </article>
              <article id='tabs-2'>
                <img src="assets/images/artikel2.jpg" alt="">
                <h4><a href="blog-details.php">Rekomendasi Laptop Untuk Mahasiswa Sistem Informasi</a></h4>
                <p>Dalam artikel ini, Anda akan menemukan panduan mengenai spesifikasi standar dan rekomendasi laptop yang cocok untuk mahasiswa jurusan Sistem Informasi, mulai dari harga terjangkau hingga yang lebih mahal. </p>
              </article>
              <article id='tabs-3'>
                <img src="assets/images/artikel3.jpg" alt="">
                <h4><a href="blog-details.php">Fungsi dan Manfaat Laptop</a></h4>
                <p>Laptop dapat juga di katakan menjadi sebuah perangkat yang sangat di butuhkan pada zaman saat ini selain pengguna smartphone. Selain dapat mudah di bawa ke mana-mana, laptop juga memiliki berbagai macam manfaat dan kelebihan yang ditawarkan sehingga dapat mempermudah untuk  penggunanya dalam kegiatan sehari-hari. </p>
              </article>
              <article id='tabs-4'>
                <img src="assets/images/artikel4.jpg" alt="">
                <h4><a href="blog-details.php">Laptop Sebagai Alat Penunjang Segala Kebutuhan Saat Ini</a></h4>
                <p>Sebagai komputer pribadi, Laptop memiliki fungsi yang sama dengan Komputer Desktop meskipun dengan kemampuan yang lebih rendah. Komponen yang terdapat didalamnya adalah sama dengan yang terdapat pada Komputer Desktop dengan ukuran yang diperkecil, lebih ringan, tidak panas dan irit listrik. </p>
              </article>
            </section>
          </div>
        </div>

        
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Mereka<a href="testimonials.php"><em> Pernah </em></a>Beli Di sini!</h2>
              <span>Lihat Ulasan Mereka Tentang Produk Kami</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="assets/images/hanni.jpg">
                  <h4>Hanni Pham</h4>
                  <span>Anggotal Girlgroup NewJeans</span>
                  <p>"Mang boleh sebagus ini? Boleh banget Lavieenbleu."</p>
                </div>
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="assets/images/cipung.jpg" alt="">
                  <h4>Cipung</h4>
                  <span>Selebritas</span>
                  <p>"Belanja Laptop? Ya kali engga di Lavieenbleu yagesya."</p>
                </div>
              </div>
            </div>
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
                      <input name="nama" type="text" class="form-control" placeholder="Nama Anda">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Alamat E-mail" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="pesan" rows="6" class="form-control" placeholder="Pesan Anda" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="submit_kontak"class="filled-button">Kirim Pesan</button>
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