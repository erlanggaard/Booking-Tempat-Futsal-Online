
 <DOCTYPE html>
<html>
	<head>
		<title>COD </title>
     </head>
     <body> 
     <?php
include ("konek.php");
if(isset($_POST['submit'])){
 $id_book = $_POST['id_book'];
 $total_bayar = $_POST['total_bayar'];
 $bayar = $_POST['bayar'];
 $status = $_POST['status'];
  $sql = "insert into bayar_cod values ('$id_book','$total_bayar','$bayar' ";
 $query = mysqli_query($konek,$sql);
}
if($total_bayar > $bayar){
	$status = "belum lunas";
}else if ($total_bayar == $bayar){
	$status= "lunas";
}
  ?>

      <form name="input" action="" method="post" enctype="multipart/form-data"> <br/>
        Kode Booking: <br/> <input type="text"name="id_book" placeholder="Kode Booking" ><br/>
       	Jumlah Bayar :</br><input type="text" name="harga" placeholder="jumlah bayar" > <br/>
        Bayar :</br><input type="text" name="bayar" placeholder="bayar" > <br/><br/>
                <input type="submit" name="submit" value="submit">
                
       </body>
           </html>


