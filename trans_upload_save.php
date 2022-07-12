<?php
include "koneksi.php";
//variabel yang berisi inputan dari member
$id_book = $_POST['id_book'];
$rek_kirim = $_POST['rek_kirim'];
$rek_tuju = $_POST['rek_tuju'];
$status = "Menunggu Konfirmasi admin";
$foto = $_FILES['foto_bukti']['name'];
$lokasi= $_FILES['foto_bukti']['tmp_name'];
//simpan foto ke folder
copy ($lokasi,"assets/bukti_bayar/".$foto);
//simpan ke database
$simpan = "insert into bayar_transfer values('$id_book','$rek_kirim','$rek_tuju','$status','$foto')";
//update data di database
$s = mysqli_query($koneksi, "update transaksi set status = '$status' where id_book = '$id_book'"); 
$pro = mysqli_query($koneksi, $simpan);
    
	
	if($pro && $s){ //jika berhasil menyimpan dan update
		echo "<script> alert(\"Silahkan tunggu email konfirmasi\"); window.location = \"index.php\"; </script>";	
		} else { //jika tidak
		echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";		
			}

?>
