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
        echo "<script>alert('Pesan berhasil dikirim'); window.location.href='account.php';</script>";
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
                  <a class="dropdown-item active" href="account.php">Profil Saya</a>
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

    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>DETAIL AKUN</h1>
            <span>PERBARUI DATAMU</span>
          </div>
        </div>
      </div>
    </div>

    <?php 
    if(isset($_POST['submit'])){
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $umur = $_POST['umur'];
      $no_telp = $_POST['no_telp'];
      $provinsi = $_POST['provinsi'];
      $kota = $_POST['kota'];
      $kecamatan = $_POST['kecamatan'];
      $kode_pos = $_POST['kode_pos'];
      $alamat = $_POST['alamat'];
      $password = $_POST['password'];

      $id = $_SESSION['valid'];
      if($password!="") {
        $edit_query = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE email='".$id."' ") or die("error occurred");
      }
      $edit_query = mysqli_query($koneksi,"UPDATE user SET nama='$nama', email='$email', umur='$umur', no_telp='$no_telp', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', kode_pos='$kode_pos', alamat='$alamat' WHERE email='".$id."' ") or die("error occurred");

      if($edit_query){
        echo "<script>alert('Data Akun Berhasil Diperbarui'); window.location.href='account.php';</script>";
      }
      } else {
          $id = $_SESSION['valid'];
          $query = mysqli_query($koneksi,"SELECT*FROM user WHERE email='".$id."' ");

          while($result = mysqli_fetch_assoc($query)){
            $res_Nama = $result['nama'];
            $res_Email = $result['email'];
            $res_Umur = $result['umur'];
            $res_Notelp = $result['no_telp'];
            $res_Provinsi = $result['provinsi'];
            $res_Kota = $result['kota'];
            $res_Kecamatan = $result['kecamatan'];
            $res_Kodepos = $result['kode_pos'];
            $res_Alamat = $result['alamat'];
            $res_Password = $result['password'];
          } ?>
          <br>
          <div class="container">
            <form action="" method="post">
              <div class="field input">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo $res_Nama; ?>" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="umur">Umur</label>
                <input type="number" name="umur" id="umur" value="<?php echo $res_Umur; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="no_telp">No. Telpon</label>
                <input type="number" name="no_telp" id="no_telp" value="<?php echo $res_Notelp; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" value="<?php echo $res_Provinsi; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="kota">Kota</label>
                <input type="text" name="kota" id="kota" value="<?php echo $res_Kota; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" value="<?php echo $res_Kecamatan; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" name="kode_pos" id="kode_pos" value="<?php echo $res_Kodepos; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo $res_Alamat; ?>" autocomplete="off" required>
              </div>
              
              <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off">
              </div>
              <div class="field input">
                <div class="field">
                    <input type="submit" class="btn btn-success" name="submit" value="Perbarui" required>
                </div>
              </div>
            </form>
          </div>
      <?php } ?>
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