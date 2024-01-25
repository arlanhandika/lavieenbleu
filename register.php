<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/foundation.css">
    <title>Lavieenbleu</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

         <?php 
         
         include("config/koneksi.php");
         if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $umur = $_POST['umur'];
            $password = ($_POST['password']);
            $cpassword = ($_POST['cpassword']);
            $provinsi = $_POST['provinsi'];
            $kota = $_POST['kota'];
            $kecamatan = $_POST['kecamatan'];
            $kode_pos = $_POST['kode_pos'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];

         $verify_query = mysqli_query($koneksi,"SELECT email FROM user WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message-error'>
                      <p>Alamat email ini sudah digunakan, <br>daftar dengan alamat email lain!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn-back-regist'>Daftar kembali</button>";
         }
         else{
            if($password !== $cpassword){
                echo "<div class='message-error'>
                      <p>Password tidak sama. Silahkan coba lagi.</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn-back-regist'>Daftar kembali</button>";
            }
            else {
            mysqli_query($koneksi,"INSERT INTO user(nama,email,umur,password,provinsi,kota,kecamatan,kode_pos,alamat,no_telp) VALUES('$nama','$email','$umur','$password','$provinsi','$kota','$kecamatan','$kode_pos','$alamat','$no_telp')") or die("Erroe Occured");

            echo "<div class='message-success'>
                      <p>Pendaftaran berhasil!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Masuk sekarang</button>";
            }

         }

         } else{
         
         ?>

            <header>Daftar</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="no_telp">No. Telpon</label>
                    <input type="number" name="no_telp" id="no_telp" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="kota">Kabupaten/Kota</label>
                    <input type="text" name="kota" id="kota" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" name="kode_pos" id="kode_pos" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" autocomplete="off" required>
                </div>
            
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="cpassword" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Daftar" required>
                </div>
                <div class="links">
                    Sudah memiliki akun? <a href="login.php">Masuk</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>