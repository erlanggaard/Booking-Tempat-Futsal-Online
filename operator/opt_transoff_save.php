<?php 
include "../koneksi.php";
$id_book = $_POST['id_book'];
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$user = $nama."-".$kode;
$id_lap = $_POST['id_lap1'];
$tgl_main = $_POST['tanggal_main'];
$jam_mulai = $_POST['jam_mulai'];
$durasi = $_POST['durasi'];
$jamdur = $durasi + $jam_mulai;
$total_harga = $_POST['total_harga'];
$jenis_bayar = 'off cod';
$status = 'Belum Bayar';

$simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$user','$id_lap',NOW(),'$tgl_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total_harga','$status')");

if($simpan){
	echo "<script> alert(\"Silakan Lakukan Pembayaran\"); window.location = \"opt_profil.php?url=pesanbayaroff\"; </script>";
	} else {
	echo "<script> alert(\"Maaf, terjadi kesalahan..!!\"); window.location = \"opt_profil.php?url=pesanoff\"; </script>";
		}
?>