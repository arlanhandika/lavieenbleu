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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='blog-details1.php';</script>";
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
            <h1>TIPS DAN TRIK LAPTOP YANG HARUS DIKETAHUI SEMUA ORANG</h1>
            <span><i class="fa fa-user"></i> Firdha Hapsari &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 22.10.2023 13:04</span>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="more-info-content">
          <div class="right-content">
            <div>
              <img src="assets/images/artikel1.jpg" class="img-fluid" alt="">
            </div>
            <br>
            
            <h4>Tips Dan Trik Laptop Yang Harus Diketahui Semua Orang</h4>

            <br>

            <p>Dengan komputer laptop, Anda dapat menunjukkan kepada klien Anda situs web baru Anda dari mana saja. Saat Anda menghadiri kuliah, tidak mungkin menuliskan setiap kata dengan tangan. Pelajari tentang membeli laptop baru di artikel ini. Pertimbangkan untuk membeli laptop konvertibel jika Anda ingin membeli tablet dan komputer laptop. Laptop ini menawarkan Anda berdua dalam satu mesin, dan tentu saja Anda akan menghabiskan lebih sedikit. Pastikan Anda tahu berapa banyak ruang yang akan dimiliki laptop. Ini harus menjadi sesuatu yang Anda baca di tempat Anda membelinya, atau sesuatu yang Anda tanyakan kepada orang yang menjualnya. Ini menunjukkan berapa banyak yang dapat Anda simpan di komputer Anda. Anda ingin dapat memiliki sesuatu yang dapat Anda kerjakan saat Anda membutuhkan banyak ruang untuk hal-hal seperti file video. </p>

            <p>Sebelum memulai belanja laptop, dapatkan ide tentang jenis pekerjaan yang Anda harapkan untuk keluar darinya. Anda mungkin menemukan bahwa Anda benar-benar tidak memerlukan model top of the line yang super mahal untuk pekerjaan yang benar-benar perlu Anda lakukan. Ini bisa menghemat banyak uang. Selalu pertimbangkan berat laptop yang Anda inginkan. Laptop yang berat dapat melukai punggung Anda, jadi pilihlah opsi yang ringan jika Anda membutuhkan portabilitas. Hanya karena ringan, bukan berarti harganya lebih mahal. Namun, Anda mungkin harus mengorbankan masa pakai baterai ekstra. Jika Anda perlu memperbaiki sesuatu di komputer Anda, pastikan Anda tahu berapa lama waktu yang dibutuhkan tempat perbaikan untuk melakukannya. Anda tidak ingin harus mengirim komputer yang Anda butuhkan hanya untuk waktu yang lama untuk kembali. Cobalah mencari tempat yang tidak terlalu sibuk dan bekerja dengan baik di daerah Anda. </p>

            <p>Laptop akan bertahan lebih lama dan berjalan lebih lancar jika memiliki bantalan pendingin untuk mencegahnya dari panas berlebih. Kelebihan panas adalah salah satu penyebab paling umum dari masalah laptop. Bantalan pendingin ini tidak mahal dan dapat membuat laptop Anda berjalan lebih lama. Dapatkan kasus ketika Anda mendapatkan laptop Anda. Ini akan mencegah keausan pada investasi Anda, dan juga akan memungkinkan Anda untuk menyimpan kertas dan beberapa item lain-lain saat Anda menggunakan laptop Anda. Kasing juga merupakan cara yang lebih mudah untuk membawa laptop Anda saat Anda tidak di rumah. Jangan mengeluarkan terlalu banyak uang untuk pembelian laptop Anda. Ada saat ketika Anda harus menghabiskan $1000 atau lebih untuk mendapatkan laptop yang bagus</p>

            <p>Laptop yang diperbaharui bisa menjadi ide bagus jika Anda tahu dari mana membelinya. Misalnya, barang elektronik Apple yang diperbaharui datang dengan garansi yang sama seperti produk baru. Pastikan komputer Anda yang diperbarui dilengkapi dengan baterai yang diperbarui. Ingatlah bahwa Anda mungkin tidak mendapatkan opsi yang sama yang tersedia di komputer baru. Jika Anda membeli laptop dengan anggaran kecil, carilah laptop rekondisi. Ini adalah laptop bekas yang telah dibersihkan dan disetel. Anda bisa mendapatkan banyak hal pada laptop yang berfungsi sempurna. Anda masih perlu melakukan riset untuk memastikan komputer yang Anda pilih sesuai dengan kebutuhan Anda.</p>

            <p>Anda sekarang memiliki kekuatan untuk menunjukkan kepada klien apa saja kapan saja. Buat catatan dengan mudah, di ruang kuliah atau ruang konferensi. Karena saran yang diperoleh dalam artikel ini, Anda akan memiliki kekuatan untuk menghitung kapan saja atau di mana saja Anda inginkan.</p>
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