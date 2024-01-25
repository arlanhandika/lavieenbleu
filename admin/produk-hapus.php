<?php
session_start();
require_once("../config/koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$id'");
    if($sql){
        echo "<script>alert('Produk berhasil dihapus'); window.location.href='produk.php';</script>";
    } 
}
?>
