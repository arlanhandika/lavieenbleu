<?php 
if(session_id() == '' || !isset($_SESSION)){
  session_start();}
include 'config/koneksi.php';

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
      echo "<script>alert('Pesan berhasil dikirim'); window.location.href='checkout.php';</script>";
  }
}

if(isset($_SESSION['valid'])) { ?>

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
              <li class="nav-item active">
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
            <h1>Checkout</h1>
            <span>SELAMAT BERBELANJA</span>
          </div>
        </div>
      </div>
    </div>
    <?php
    if (isset($_SESSION['cart'])) {?>
      <div class="checkout-information">
        <div class="container">
          <ul class="list-group product-list">
            <li class="list-group-item product-header">
              <div class="product-row">
                <div class="product-image">
                  <p>&nbsp; &nbsp; &nbsp; Gambar</p>
                </div>
                <div class="product-details">
                  <p>Nama Produk</p>
                </div>
                <div class="product-price">
                    <p>Harga Satuan</p>
                </div>
                <div class="product-quantity">
                    <p>Jumlah</p>
                </div>
                <div class="product-total">
                    <p>Subtotal Produk</p>
                </div>
              </div>
            </li>
            <?php
            $total = 0;
            $jumlah = 0;
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
              $result = $koneksi->query('SELECT nama_produk, gambar, spek, harga, stok FROM produk WHERE id = ' .$product_id);

              if ($result) {
                while ($obj = $result->fetch_object()) {
                  $cost = $obj->harga * $quantity;
                  $total += $cost;
                  $jumlah += $quantity;
                  $ongkir = $jumlah * 150000;
                  ?>
                  <li class="list-group-item">
                    <div class="product-row">
                      <div class="product-image">
                        <img src="assets/images/produk/<?php echo $obj->gambar ?>">
                      </div>
                      <div class="product-details">
                        <p><?php echo $obj->nama_produk?></p>
                      </div>
                      <div class="product-price">
                        <p>Rp<?php echo number_format($obj->harga, 0, ',', '.') ?></p>
                      </div>
                      <div class="product-quantity">
                        <p><a class="btn btn-info" style="padding:5px;" href="tambah_ke_keranjang.php?action=remove&id=<?php echo $product_id; ?>">-</a> &nbsp; <?php echo $quantity ?> &nbsp; &nbsp;<a class="btn btn-danger" style="padding:5px;" href="tambah_ke_keranjang.php?action=add&id=<?php echo $product_id; ?>">+</a></p>
                      </div>
                      <div class="product-total">
                        <p>Rp<?php echo number_format ($cost, 0, ',', '.') ?></p>
                      </div>
                    </div>
                  </li>
                <?php }
              }
            } ?>
              <li class="list-group-item">
                <div class="product-row">
                  <div class="product-image">
                  </div>
                  <div class="product-details">
                  </div>
                  <div class="product-price">
                  </div>
                  <div class="product-quantity">
                  </div>
                  <div class="ongkir-text">
                    <p>Biaya Pengiriman:</p>
                  </div>
                  <div class="ongkir">
                    <p>Rp<?php echo number_format ($ongkir, 0, ',', '.') ?></p>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="product-row">
                  <div class="product-image">
                  </div>
                  <div class="product-details">
                  </div>
                  <div class="product-price">
                  </div>
                  <div class="product-quantity">
                  </div>
                  <div class="total-text">
                    <p>Total Pesanan:</p>
                  </div>
                  <div class="total">
                    <p>Rp<?php echo number_format ($total+$ongkir, 0, ',', '.'); ?></p>
                  </div>
                </div>
              </li>
          </ul>
          <br>
          <div class="tombol">
            <button onclick="konfirmasiHapus()" class="btn btn-danger">Hapus</button>
              <script>
                function konfirmasiHapus() {
                  var konfirmasi = confirm("Apakah Anda yakin ingin menghapus? Tindakan ini berarti mengosongkan semua produk di keranjang Anda.");
                  if (konfirmasi) {
                    window.location.href = 'tambah_ke_keranjang.php?action=empty';
                  }
                }
              </script>
            <button onclick="konfirmasiPesan()" class="btn btn-success">Pembayaran</button>
              <script>
                function konfirmasiPesan() {
                  var konfirmasi = confirm("Apakah anda yakin sudah memilih produk yang ingin di pesan? Jika sudah tekan OK untuk diarahkan ke halaman pembayaran");
                  if (konfirmasi) {
                    window.location.href = 'payment.php';
                  }
                }
              </script>
          </div>
          <div class="tombol-lanjut">
            <a href="products.php" class="btn btn-primary">Lanjut Berbelanja</a>
          </div>
        </div>
      </div>
      <?php 
      if ($jumlah < 1) {
      unset($_SESSION['cart']);
      echo '<script>window.location.reload();</script>';
      }
    } else { ?>
    <div class="alert alert-light" style="margin-bottom: -25px; width: 100%; height: 100px; text-align: center;" role="alert">
      <br>Keranjang Anda Kosong! Silahkan Kembali Ke <a href="products.php" class="alert-link">Halaman Produk</a> Untuk Menambahkan Produk Ke Keranjang.
    </div>
    <?php }?>
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
    <script src="vendor/jquery/jquery2.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/snippets.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

<?php
}
else { ?>
  <script>
  alert("Anda Belum Masuk. Tekan OK Untuk Dialihkan Ke Halaman Masuk Agar Anda Dapat Melihat Produk Di Keranjang Anda.");
  window.location.href = "login.php";
  <?php } ?>
  </script>