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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='orders.php';</script>";
    }
  }

  if (isset($_POST['batal'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $status = $_POST['status'];

    $batal = mysqli_query($koneksi, "UPDATE transaksi SET status='Pesanan Batal' WHERE id_transaksi='$id_transaksi'");
    
    if ($batal) {
      header("location:orders.php");
      exit();
    }
  }

  if (isset($_POST['selesai'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $status = $_POST['status'];

    $selesai = mysqli_query($koneksi, "UPDATE transaksi SET status='Pesanan Berhasil' WHERE id_transaksi='$id_transaksi'");
    
    if ($selesai) {
      header("location:orders.php");
      exit();
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
              if(isset($_SESSION['valid'])) { ?>
              <li class="nav-item dropdown active">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="account.php">Profil Saya</a>
                  <a class="dropdown-item active" href="orders.php">Riwayat Pemesanan</a>
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

    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>RIWAYAT PEMESANAN</h1>
            <span>PANTAU TERUS RIWAYAT PEMESANANMU</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:40px;">
      <div class="container">
        <?php
        $user = $_SESSION["valid"];
        $result = $koneksi->query("SELECT * from transaksi where email='" . $user . "'");
        if ($result) {
            while ($obj = $result->fetch_object()) {
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="id_transaksi" value="' . $obj->id_transaksi . '">';
                echo '<h4>ID Transaksi -> ' . $obj->id_transaksi . '</h4>';
                echo '<p><strong>Waktu Pembelian:</strong> ' . $obj->tanggal . '</p>';
                echo '<p><strong>Nama Barang:</strong> ' . $obj->nama_produk . '</p>';
                echo '<p><strong>Harga:</strong> Rp' . number_format($obj->harga, 0, ',', '.') . '</p>';
                echo '<p><strong>Jumlah Barang:</strong> ' . $obj->total_produk . '</p>';
                echo '<p><strong>Biaya Pengiriman:</strong> Rp' . number_format($obj->ongkir, 0, ',', '.') . '</p>';
                echo '<p><strong>Total Harga:</strong> Rp' . number_format($obj->total_harga, 0, ',', '.') . '</p>';
                echo '<p><strong>Status Pengiriman:</strong> ' . $obj->status . '</p>';
                if ($obj->status == 'Sedang Diantar' || $obj->status == 'Pesanan Berhasil') {
                echo '<p><strong>Nomor Resi:</strong> ' . $obj->no_resi . '</p>';
                }
                if ($obj->status == 'Verifikasi Pembayaran') { ?>
                    <button onclick="konfirmasiBatal()" style="margin-top: 8px; margin-left: -1px;" type="submit" name="batal"
                    class="btn btn-danger btn-sm">Batalkan Pesanan</button>
                      <script>
                        function konfirmasiBatal() {
                          var konfirmasi = confirm("Apakah anda yakin ingin membatalkan pesanan?");
                          if (!konfirmasi) {
                            event.preventDefault(); }
                          else {
                            window.location.href = 'orders.php';
                          }
                        }
                      </script>
                <?php }
                if ($obj->status == 'Sedang Diantar') { ?>
                    <button onclick="konfirmasiSelesai()" style="margin-top: 8px; margin-left: -1px;" type="submit" name="selesai"
                    class="btn btn-success btn-sm">Selesaikan Pesanan</button>
                      <script>
                        function konfirmasiSelesai() {
                          var konfirmasi = confirm("Apakah anda yakin ingin menyelesaikan pesanan? Tindakan ini akan mengubah status pengiriman Anda menjadi Selesai.");
                          if (!konfirmasi) {
                            event.preventDefault(); }
                          else {
                            window.location.href = 'orders.php';
                          }
                        }
                      </script>
                <?php } ?>
                </form>
              <p><hr></p> <?php
            }
        }
        ?>
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