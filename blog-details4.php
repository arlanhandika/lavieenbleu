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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='blog-details4.php';</script>";
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
            <h1>LAPTOPN SEBAGAI ALAT PENUNJANG SEGALA KEBUTUHAN</h1>
            <span><i class="fa fa-user"></i> Arlan Tri Handika &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 23:12</span>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="more-info-content">
          <div class="right-content">
            <div>
              <img src="assets/images/artikel4.jpg" class="img-fluid" alt="">
            </div>
            <br>
            
            <h4>Laptop Sebagai Alat Penunjang Segala Kebutuhan</h4>

            <br>

            <p>Laptop (dikenal juga dengan istilah notebook/powerbook) adalah komputer portabel (kecil dan dapat dibawa ke mana-mana dengan mudah) yang terintegrasi pada sebuah casing. Beratnya berkisar dari 1 hingga 6 kilogram tergantung dari ukuran, bahan dan spesifikasi. Sumber listrik berasal dari baterai atau A/C adaptor yang dapat digunakan untuk mengisi ulang baterai dan menyalakan laptop itu sendiri. Baterai Laptop pada umumnya dapat bertahan sekitar 1 hingga 6 jam bergantung pada cara pemakaian, spesifikasi, dan ukuran baterai.</p>

            <p>Sebagai komputer pribadi, Laptop memiliki fungsi yang sama dengan Komputer Desktop meskipun dengan kemampuan yang lebih rendah. Komponen yang terdapat didalamnya adalah sama dengan yang terdapat pada Komputer Desktop dengan ukuran yang diperkecil, lebih ringan, tidak panas dan irit listrik. Laptop kebanyakan menggunakan layar LCD (Liquid Crystal Display) berukuran 10 inci hingga 17 inci bergantung dari ukuran laptop itu sendiri. Selain itu, keyboard yang terdapat pada Laptop juga dilengkapi dengan touchpad atau dikenal juga sebagai trackpad yang berfungsi sebagai penggerak kursor mouse. Keyboard dan Mouse tambahan dapat dipasang melalui soket USB. </p>
            
            <p>Komponen tersebut didesain untuk mengakomodasi portabilitas dari laptop sendiri. Sifat utama yang dimiliki oleh komponen penyusun laptop adalah ukuran yang kecil, hemat konsumsi energi, dan efisien. Berbeda dengan komputer desktop, komputer jinjing memiliki komponen pendukung yang didesain secara khusus untuk mengakomodasi sifat komputer jinjing yang portabel. Sifat utama yang dimiliki oleh komponen penyusun laptop adalah ukuran yang kecil, hemat konsumsi energi, dan efisien. Komputer jinjing biasanya berharga lebih mahal, tergantung dari merek dan spesifikasi komponen penyusunnya, walaupun demikian harga komputer jinjing pun semakin mendekati desktop seiring dengan semakin tingginya tingkat permintaan konsumen.</p>
            
            <p>Sebuah laptop adalah komputer pribadi yang dirancang untuk penggunaan mobile dan kecil dan cukup ringan untuk duduk di seseorang pangkuan ketika sedang digunakan. Sebuah laptop mengintegrasikan sebagian besar komponen khas dari sebuah komputer desktop, termasuk sebuah layar, sebuah keyboard, sebuah menunjuk perangkat (a touchpad, juga dikenal sebagai trackpad, dan / atau menunjuk tongkat), speaker, dan sering termasuk baterai, dalam satu unit kecil dan ringan. The rechargeable battery (if present) is charged from an AC adapter and typically stores enough energy to run the laptop for two to three hours in its initial state, depending on the configuration and power management of the computer. The rechargeable baterai (jika ada) dikenakan biaya dari adaptor AC dan biasanya menyimpan energi yang cukup untuk menjalankan laptop selama dua sampai tiga jam dalam keadaan awal, tergantung pada konfigurasi dan manajemen daya computer.</p>
            
            <p>Biasanya laptop besar berbentuk seperti notebook dengan ketebalan antara 0,7-1,5 inci (18-38 mm) dan dimensi mulai dari 10x8 inci (27x22cm, 13 "layar) untuk 15x11 inci (39x28cm, 17" layar) dan ke atas. Berat laptop modern 3-12 pound (1,4-5,4 kg); lebih tua biasanya lebih berat laptop. Kebanyakan laptop dirancang dalam faktor bentuk flip untuk melindungi layar dan keyboard ketika ditutup.Modern tablet laptop memiliki gabungan kompleks perumahan antara keyboard dan layar, mengizinkan panel layar putar dan kemudian berbaring di keyboard perumahan. Mereka biasanya memiliki layar touchscreen dan beberapa termasuk pengenalan tulisan tangan atau menggambar grafik kemampuan.</p>
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