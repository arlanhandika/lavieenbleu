<?php
session_start();
require_once("../config/koneksi.php");

if(isset($_SESSION['valdi'])) {
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<title>Lavieenbleu Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar" class="hide">
		<a href="index.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">LavieenbleuAdmin</span>
		</a>
		<ul class="side-menu top">
            <li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
            </li>
			<li class="active">
				<a href="produk.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Produk</span>
				</a>
			</li>
			<li>
				<a href="transaksi.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Transaksi</span>
				</a>
			</li>
			<li>
				<a href="pesan.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Pesan</span>
				</a>
			</li>
			<li>
				<a href="user.php">
					<i class='bx bxs-group' ></i>
					<span class="text">User</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="pengaturan.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Pengaturan</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Keluar</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form>
			</form>
			<a href="pengaturan.php" class="profile">
				<img src="assets/img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a>Produk</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data-produk">
				<div class="order">
					<div class="head">
						<h3>Produk</h3>
					</div>
					<div class="head">
						<a href="produk-tambah.php" class="ijo">Tambah Produk</a>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Gambar</th>
								<th>Nama Produk</th>
								<th>Spesifikasi</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$result = $koneksi->query('SELECT * FROM produk');

								if($result){

									while($obj = $result->fetch_object()) {
									?>
									<td><?php echo $obj->id?></td>
									<td><img src="../assets/images/produk/<?php echo $obj->gambar?>"></td>
									<td><?php echo $obj->nama_produk?></td>
									<td><?php echo $obj->spek?></td>
									<td>Rp<?php echo number_format ($obj->harga, 0, ',', '.');?></td>
									<td><?php echo $obj->stok?></td>	
									<td><a href="produk-edit.php?id=<?php echo $obj->id ?>"><span class="status completed">Edit</span><br><br>
									<a href="produk-hapus.php?id=<?php echo $obj->id ?>"><span class="status pending">Hapus</span></td>
							</tr>
						</tbody>
							<?php 
							}
						}?>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->

        <script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
else {
	header("location:login.php");
}