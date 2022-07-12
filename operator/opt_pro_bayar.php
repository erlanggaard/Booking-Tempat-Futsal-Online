<?php
include "../koneksi.php";
//ketika operator menekan tombol bayar maka akan menjalankan code file ini
//variabel yang berisi data yang telah diinputkan di form pembayaran
$id_book = $_POST['id_book'];
$jumlah_bayar = $_POST['jumlah_harga'];
$bayar = $_POST['bayar'];
//memanggil data di tabel transaksi dan bayar_cod
$t = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where id_book='$id_book'"));
$m = mysqli_fetch_array(mysqli_query($koneksi, "select * from bayar_cod where id_book='$id_book'"));

if($m < 1){ //jika di tabel bayar_cod tidak ada
if($bayar<$jumlah_bayar){ //jika bayar kurang dari jumlah harga yang seharusnya dibayarkan
	$status = 'Belum Lunas'; //maka status Belum Lunas
		} else { //jika tidak
	$status = 'Lunas'; // maka status Lunas
			}
if($bayar>$jumlah_bayar){ //jika jumlah bayar melebihi dari jumlah yang seharusnya dibayarkan
	//alert muncul dibawah ini
	echo "<script> alert(\"Jumlah yang dibayarkan terlalu besar\"); window.location = \"opt_profil.php?url=bayaroff\"; </script>";
	}else{ //jika tidak
	//maka akan update data di tabel transaksi dan menyimpan tabel di bayar_cod
	$simpan = mysqli_query($koneksi,"update transaksi set status='$status' where id_book='$id_book'");
	$simpan2 = mysqli_query($koneksi,"insert into bayar_cod values('$id_book','$jumlah_bayar','$bayar','$status')");
	if($simpan && $simpan2){ //jika dapat menyimpan 
		if($t['jenis_bayar']!='off cod'){ // jika jenis bayar tidak sama dengan off cod
			echo "<script> alert(\"Berhasil.!!!\"); window.location = \"opt_profil.php?url=bayaroff\"; </script>";
			}else{ //jika tidak 
			echo "<script> alert(\"Berhasil.!!!\"); window.location = \"opt_profil.php?url=pesanbayaroff\"; </script>";
				}
		}
	}
}else{
if(($m['bayar']+$bayar) == $jumlah_bayar){
	$status = 'Lunas';
		} else {
	$status = 'Belum Lunas';		
			}
if(($m['bayar']+$bayar) > $jumlah_bayar){
	echo "<script> alert(\"Jumlah yang dibayarkan terlalu besar\"); window.location = \"opt_profil.php?url=bayaroff\"; </script>";
	}else{
	$simpan = mysqli_query($koneksi,"update transaksi set status='$status' where id_book='$id_book'");
	$simpan2 = mysqli_query($koneksi,"update bayar_cod set status='$status', bayar=$m[bayar]+$bayar where id_book='$id_book'");
	if($simpan && $simpan2){
		if($t['jenis_bayar']!='off cod'){
			echo "<script> alert(\"Berhasil.!!!\"); window.location = \"opt_profil.php?url=bayaroff\"; </script>";
			}else{
			echo "<script> alert(\"Berhasil.!!!\"); window.location = \"opt_profil.php?url=pesanbayaroff\"; </script>";
				}
		}
	}
}
?>