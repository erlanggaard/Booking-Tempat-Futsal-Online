<?php
include ("../koneksi.php");
$data = mysqli_query($koneksi, "select * from lapangan where id_lap = '$_GET[id_lap]'");
	$isi = mysqli_fetch_array($data);
	//memanggil data dari database
	$nama = $isi['foto']; // variabel dengan nilai nama foto
	unlink('assets/foto_lap/'.$nama); //menghapus foto di dalam folder
	mysqli_query($koneksi,"delete from lapangan where id_lap = '$_GET[id_lap]'") or die (mysqli_error()); 
	//menghapus data pada database
	echo "<script language='javascript'>
                    window.location='opt_profil.php';
                    </script>";
?>