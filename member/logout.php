<?php
session_start();
unset($_SESSION['operator']);
echo "<script language='javascript'>alert('Terima kasih, Anda Berhasil Logout'); document.location='index.php';</script>";
?>
