<?php
require ("koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
	$sql = "select * from member where username_member = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pemesanan</title>
    <!-- Custom Theme Style -->
    
    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
	  <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
  	body { 
			padding-top: 60px;
			background-color:#CCC;
	}
	.container {
		background-color:#FFF;
		}
	
	</style>
    
    
  </head>
  <body>
  <?php
  include "navbar.php";
    include "member_login.php";
    include "opt_login.php";
     ?>
        <!-- page content -->
        <div class="container">
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">Pemesanan Lapangan</div>
          <div class="panel-body">
          <h4>Konfirmasi Pembayaran </h4>
          <hr>
          
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <h2>Selamat transaksi anda telah dikonfirmasi </h2>
                            </div>
                          </div>
                          <?php
						  //select transaksi
						  $id = $_GET['id'];
						  $f = mysqli_query($koneksi, "select * from transaksi where id_book='$id'");
						  $s = mysqli_fetch_array($f);
						  $e = $s['jam_berakhir']-$s['jam_mulai'];
						  //select lapangan
						  $q = mysqli_fetch_array(mysqli_query($koneksi, "select * from lapangan where id_lap='$s[id_lap]'"));
						  //select operator
						  $w = mysqli_fetch_array(mysqli_query($koneksi, "select * from operator where username='$q[username]'"));
						   ?>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>Kode Booking :  <?php echo $id; ?></h4>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>Nama Futsal &nbsp;&nbsp;: <?php echo $w['nama_futsal']; ?> </h4>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>No Lapangan &nbsp;: <?php echo $q['no_lap']; ?> </h4> </h4>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>Tanggal Main &nbsp;: <?php echo $s['tgl_main']; ?> </h4>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>Durasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $e; ?> Jam</h4>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h4>Total Harga &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $s['total_harga']; ?> </h4>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <h3 align="center">Selamat bermain dengan menunjukkan halaman ini atau dengan menunjukkan bukti email yang telah dikirim ke email Anda kepada Operator tempat futsal</h3>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><span class="required"></span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <img src="assets/images/Goputsal2.png" style="width:200px; height:50px;">
                            </div>
                          </div>
                      </div>
          </div>
        </div>
        
        
        </div>

</body>
</html>
<?php 
}else {
    echo "<script> alert(\"Silakan Login Sebagai Member\"); window.location = \"index.php\" </script>";
  }
?>
   