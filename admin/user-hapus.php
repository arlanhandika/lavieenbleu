<?php
session_start();
require_once("../config/koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id'");
    if($sql){
        echo "<script>alert('User berhasil dihapus'); window.location.href='user.php';</script>";
    } 
}
?>
