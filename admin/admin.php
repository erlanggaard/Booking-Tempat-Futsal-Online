
<?php
include ("../koneksi.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
 <div class="container">            
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Kode Booking</th>
        <th>Username</th>
      	<th>ID</th>
        <th>Tanggal Booking</th>
        <th>Tanggal Main</th>
        <th>Mulai</th>
		<th>Selesai</th>
		<th>Pembayaran</th>
		<th>Status</th>
		<th>Bukti Pembayaran</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		$sql_sel = "select * from transaksi";
		$query_sel = mysqli_query($koneksi,$sql_sel);
		while($sql_res = mysqli_fetch_array($query_sel)){
											
	?>
          <tr>
             <td><?php echo $sql_res['id_book']; ?></td>
             <td><?php echo $sql_res['username_member']; ?></td>
             <td><?php echo $sql_res['id_lap']; ?></td>
             <td><?php echo $sql_res['tgl_book']; ?></td>
             <td><?php echo $sql_res['tgl_main']; ?></td>
             <td><?php echo $sql_res['jam_mulai']; ?></td>
             <td><?php echo $sql_res['jam_berakhir']; ?></td>
             <td><?php echo $sql_res['jenis_bayar']; ?></td>
             <td><?php if ($sql_res['status']=='Menunggu Konfirmasi admin'){ ?>
             <form method="post"><input type="submit" name="kirim" value="<?php echo $sql_res['status']; ?>" rel="tooltip" title="Konfirmasi Sekarang"></form>
			 <?php } else { 
			 echo $sql_res['status']; 
			 }
			 ?>
             </td>
             <td class="center">
                <img src="assets/foto_bukti/<?php echo $sql_res['bukti_bayar']; ?>" width="90" height="30">
                </td>
                 <?php 
				 $sql_selmem = "select * from member where username_member='$sql_res[username_member]'";
				 $selmem = mysqli_query ($koneksi,$sql_selmem);
				 $member = mysqli_fetch_array($selmem);
                include ("sendEmail-v156.php");
				if(isset($_POST['kirim'])){
					$message = "Sukses";  
					//$message = file_get_contents("email_template.html");
					//$message = '';
					$email = $member['email'];
					$to = $email;
					$subject = "Pembayaran dengan kode booking $sql_res[id_book] telah Admin konfirmasi. Terimakasih telah melakukan pembayaran. Silahkan bermain dengan menunjukkan email Anda pada operator tempat futsal terlebih dahulu.";
					
					//sender
					$sender = "gofutsal.member@gmail.com";
					$password = "tif20152016";
		
					$sentmail = (email_localhost1($to,$subject,$message,$sender,$password));
		
					if($sentmail)
					{
						$sql_update = mysqli_query($koneksi,"update transaksi set status = 'Telah Dikonfirmasi' where id_book= '$sql_res[id_book]'");
						echo "<script> alert(\"Telah dikonfirmasi..!!\"); window.location = \"admin.php\"; </script>";
						
					}
					else
					{
						echo "<script> alert(\"Maaf!! Terjadi Kesalahan\");</script>";
					}
				}
                ?></td>
             </tr>
    <?php }?>
    </tbody>
  </table>
</div>
   
</body>
</html>