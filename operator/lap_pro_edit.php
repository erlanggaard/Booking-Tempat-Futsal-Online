<?php
include ("../koneksi.php");
$data = mysqli_query($koneksi, "select * from lapangan where id_lap='$_REQUEST[id_lap]'");
$isi = mysqli_fetch_array($data);
//memanggil data dari database
$filename = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
//variabel untuk menyimpan foto
if($_FILES['foto']['tmp_name']==""){ // simpan data jika foto tidak dirubah
    $sql="update lapangan set jenis_rumput='$_REQUEST[jenis_rumput]', harga='$_REQUEST[harga]', no_lap='$_REQUEST[no_lap]' where id_lap='$_REQUEST[id_lap]'";
$query = mysqli_query($koneksi,$sql);

} else { 
//menyimpan foto jika foto diubah
copy($lokasi, "assets/foto_lap/".$filename); //menyimpan ke folder
unlink("assets/foto_lap/".$isi['foto']); //menghapus foto sebelumnya
    $sql="update lapangan set jenis_rumput='$_REQUEST[jenis_rumput]', foto='$filename', harga='$_REQUEST[harga]', no_lap='$_REQUEST[no_lap]' where id_lap='$_REQUEST[id_lap]'";
$query = mysqli_query($koneksi, $sql);

}

if($query){
    echo "<script> alert(\"Data Berhasil Disimpan...!\"); window.location = \"opt_profil.php\"; </script>";

}else {
    echo "<script> alert(\"Data Gagal Disimpan...!\"); window.location = \"opt_profil.php\"; </script>";
}

?>
