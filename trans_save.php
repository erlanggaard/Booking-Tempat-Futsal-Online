<?php 
require "koneksi.php";
$id_book = $_POST['id_book'];
$username = $_POST['username'];
$id_lap = $_POST['id_lap'];					//variabel yang berisi inputan yang diisi oleh member pada form transaksi
$tanggal_main = $_POST['tanggal_main'];
$jam_mulai = $_POST['jam_mulai'];
$durasi = $_POST['durasi'];
//penambahan pada jam mulai dan durasi
$jamdur = $durasi + $jam_mulai;
$jam_berakhir = $jamdur.":00:00";
//echo $jam_berakhir;
$jenis_bayar = $_POST['jenis_bayar'];
$total = $_POST['total_harga'];

if($jenis_bayar == 'transfer'){ // jika jenis bayar transfer
	$status = "Menunggu Transfer"; // maka status Menunggu Transfer
	}else { //jika tidak
	$status = "Menunggu Pembayaran"; //maka status menjadi Menunggu pembayaran
		}

while($ceklap = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where id_lap = '$id_lap' && tgl_main='$tanggal_main' && status!='Dibatalkan' order by tgl_book"))){
	echo $ceklap['jam_mulai'];
if($ceklap > 0){
	if($jam_mulai > $ceklap['jam_mulai'] && $jam_mulai < $ceklap['jam_berakhir']){
		echo "<script> alert(\"Pilih jam mulai yang lain\");</script>";	
	}elseif($jam_mulai < $ceklap['jam_mulai'] && ($jam_berakhir > $ceklap['jam_mulai'] && $jam_berakhir < $ceklap['jam_berakhir'])){
		echo "<script> alert(\"Durasi yang Anda pilih telah dipesan. Kurangi durasi Anda atau pesan di lain waktu.\");</script>";
	}elseif($jam_mulai < $ceklap['jam_mulai'] && ($jam_berakhir > $ceklap['jam_berakhir'])){
		echo "<script> alert(\"Durasi yang Anda pilih telah dipesan. Kurangi durasi Anda atau pesan di lain waktu.\");</script>";
		}
	} else {
		$simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$username','$id_lap',NOW(),'$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");

if($simpan & $jenis_bayar=='transfer'){
	echo "<script> alert(\"Silakan Lakukan Pembayaran\"); window.location = \"trans_upload_bayar.php?kd=$id_book\"; </script>";
	} elseif($jenis_bayar=='cod') {
	echo "<script> alert(\"Segera Lakukan Pembayaran Kepada Operator Futsal Yang Dituju\"); window.location = \"index.php\"; </script>";
		} else {
		echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";		
			}
	}
	
}
?>