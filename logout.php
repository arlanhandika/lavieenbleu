<?php
  session_start();
  unset ($_SESSION['valid']);
  echo "<script>alert('Logout Berhasil'); window.location.href='index.php';</script>";
  exit();
?>
