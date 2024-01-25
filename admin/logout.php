<?php
  session_start();
  unset ($_SESSION['valdi']);
  echo "<script>alert('Logout Berhasil'); window.location.href='login.php';</script>";
  exit();
?>
