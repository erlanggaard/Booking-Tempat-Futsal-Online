<?php 
include ("../koneksi.php");
include ("sendEmail-v156.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Code Pass</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <style media="screen">
  	body { padding-top: 70px; }
    p, h4 {

      color: #424e5e;
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
    <br>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-7">
        <h4>Password reset</h4>
        <hr></div>
      <div class="col-sm-3"></div>
    </div>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <div class="col-sm-3"></div>
        <label class="control-label col-sm-1" for="email">Kode</label>
        <div class="col-sm-4">
          <input type="text" name="lupa_code" class="form-control" id="pwd" placeholder="Masukkan Kode">
        </div>
        <div class="col-sm-4"></div>
      </div>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-7">
          <button type="submit" class="btn btn-primary" name="submit">Set Ulang Password</button>
          </div>
        <div class="col-sm-1"></div>
      </div>
    </form>
    <?php 
    if(isset($_POST['submit'])){
    	$lupa_code = $_POST['lupa_code'];
    	$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE lupa_code='$lupa_code'"));
        if($cek > 0){
        echo "<script> alert(\"Silahkan Masukkan Password Baru Anda\"); window.location = \"opt_new_pass.php?lupa_code=$lupa_code\"; </script>";
        } else {
			echo "<script> alert(\"Kode Konfirmasi Salah\"); window.location = \"opt_code_pass.php\"; </script>";
			}
    }
    ?>

  </div>
</body>
</html>
