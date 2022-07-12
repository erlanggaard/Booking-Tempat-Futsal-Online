<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Reset Password</title>
  <meta charset="utf-8">
   <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <style media="screen">
  	body { padding-top: 70px; }
    h3, h5 {

      color: #424e5e;
    }
    h4{
      color: 	#d34e5b;
    }

  </style>
</head>
<body>
    <?php
    include "navbar.php";
     ?>
  <div class="container">
    <?php
     include "member_login.php";
    include "opt_login.php";
     ?>
    </div>
<?php
include('../koneksi.php');
$passkey = $_GET['passkey'];// mendapatkan kode yang telah dikirim dalam link
$sql = "UPDATE operator SET ver_code=NULL WHERE ver_code='$passkey'";
// menghapus kode yang terdapat pada database jika kode terhapus maka akun akan aktif
$result = mysqli_query($koneksi,$sql) or die(mysqli_error());
if($result)
{
    echo '

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h3><b>Akun Anda Telah Aktif Silahkan <a href="#" data-toggle="modal" data-target="#Modal2">Login</a></b></h3>
        </div>
      </div>
';
}
else
{
    echo '<div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h3><b>Silahkan Cek Kembali Email Anda</b></h3>
        </div>
      </div>';
}
?>

 </div>
  <br><br><br><br><br>
</body>
</html>
