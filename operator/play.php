<?php
include ("../koneksi.php");
$id = $_POST['st'];
$sql_update = mysqli_query($koneksi,"update transaksi set status = 'Playing' where id_book= '$id'");
if($sql_update){
	echo "<script> alert(\"Telah dikonfirmasi..!!\"); window.location = \"Operator.php\"; </script>";
				}   
?>