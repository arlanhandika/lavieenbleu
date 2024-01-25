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
       echo "<script>alert('Pesan berhasil dikirim'); window.location.href='blog-details2.php';</script>";
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
            <h1>REKOMENDASI LAPTOP UNTUK MAHASISWA SISTEM INFORMASI</h1>
            <span><i class="fa fa-user"></i> Khalisah Khirman &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 14:29</span>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="more-info-content">
          <div class="right-content">
            <div>
              <img src="assets/images/artikel2.jpg" class="img-fluid" alt="">
            </div>
            <br>
            <h4>Rekomendasi Laptop Untuk Mahasiswa Sistem Informasi</h4>

            <br>

            
            <p>Dalam artikel ini, Anda akan menemukan panduan mengenai spesifikasi standar dan rekomendasi laptop yang cocok untuk mahasiswa jurusan Sistem Informasi, mulai dari harga terjangkau hingga yang lebih mahal. Saat ini, dunia pendidikan tinggi semakin berkembang pesat, terutama dalam bidang teknologi informasi. Salah satu jurusan yang populer di perguruan tinggi adalah Sistem Informasi. Jurusan ini memberikan pelatihan yang komprehensif dalam bidang teknologi informasi dan bisnis, menggabungkan pemahaman tentang sistem informasi, manajemen bisnis, dan teknologi.</p>
            
            <p>Mahasiswa jurusan Sistem Informasi seringkali memerlukan teknologi, khususnya laptop, dalam menjalankan tugas dan proyek mereka. Oleh karena itu, sangat penting untuk memilih laptop dengan spesifikasi yang tepat agar dapat menunjang kegiatan akademik dengan lancar. Tetapi, dengan banyaknya pilihan laptop di pasar, seringkali sulit untuk memutuskan laptop mana yang sesuai untuk mahasiswa Sistem Informasi. Oleh karena itu, artikel ini akan membahas standar spesifikasi laptop yang disarankan untuk jurusan Sistem Informasi, serta faktor-faktor yang perlu dipertimbangkan saat memilih laptop sesuai dengan kebutuhan dan anggaran Anda.</p>
            
            <p>Spesifikasi laptop yang disarankan untuk jurusan Sistem Informasi dapat bervariasi tergantung pada kebutuhan spesifik dari program studi dan kursus yang diambil. Namun, secara umum, berikut adalah beberapa spesifikasi yang bisa menjadi panduan:<br>1.	Prosesor: Intel Core i5 atau i7 (atau setara AMD)<br>2.	RAM: Minimum 8GB<br>3.	Penyimpanan: SSD minimum 256GB<br>4.	Kartu grafis: Kartu grafis terintegrasi seperti Intel UHD Graphics atau AMD Radeon Graphics.<br>5.	Layar: Layar minimal 13 inci dengan resolusi minimal Full HD (1920 x 1080)<br>6.	Sistem Operasi: Windows 10 atau macOS (sesuai preferensi)<br>7.	Koneksi: WiFi, Bluetooth, port Ethernet, dan minimal dua port USB
</p>
            
            <p>Selain itu, untuk jurusan Sistem Informasi, penting untuk mempertimbangkan kemampuan laptop dalam menjalankan perangkat lunak pengembangan seperti Visual Studio Code, NetBeans, dan Eclipse. Pastikan laptop memiliki spesifikasi yang memadai untuk menjalankan perangkat lunak tersebut dengan lancar. Berdasarkan kebutuhan khusus dari program studi dan kursus, beberapa program dalam jurusan Sistem Informasi mungkin memerlukan spesifikasi laptop yang lebih tinggi daripada yang telah disebutkan di atas. Misalnya, jika program studi Anda membutuhkan perangkat lunak pengembangan berat seperti MATLAB, AutoCAD, atau Adobe Creative Suite, maka Anda mungkin memerlukan laptop dengan spesifikasi yang lebih tinggi.</p>
            
            <p>Selain itu, jika Anda terlibat dalam kegiatan presentasi atau desain, Anda mungkin memprioritaskan laptop dengan layar berkualitas seperti layar IPS atau OLED dengan resolusi yang lebih tinggi. Jika Anda perlu menjalankan banyak tugas sekaligus atau melakukan pengolahan data yang besar, maka RAM lebih besar dari 8GB mungkin diperlukan. Namun, ketika memilih laptop, selalu pertimbangkan anggaran dan kebutuhan sehari-hari Anda. Kadang-kadang, laptop dengan spesifikasi terlalu tinggi bisa menjadi mahal dan tidak sesuai dengan anggaran Anda, sementara laptop dengan spesifikasi terlalu rendah mungkin tidak dapat memenuhi kebutuhan Anda. Oleh karena itu, bijaklah dalam mempertimbangkan kebutuhan Anda sebelum memilih laptop yang tepat.</p>
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