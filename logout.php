<?php
session_start();
if(isset($_SESSION['operator'])){
	unset($_SESSION['operator']);
	}
elseif(isset($_SESSION['member'])){
	unset($_SESSION['member']);
	}

echo "<script language='javascript'>alert('Terima kasih, Anda Berhasil Logout'); document.location='index.php';</script>";
?>
