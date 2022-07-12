<?php 
include ("../koneksi.php");
$lupa_code = $_GET['lupa_code'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Password Baru</title>
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
        <label class="control-label col-sm-1" for="email"></label>
        <div class="col-sm-4">
          <input type="hidden" name="lupa_code" class="form-control" id="pwd" placeholder="Enter email" value="<?php echo $lupa_code; ?>">
        </div>
        <div class="col-sm-4"></div>
      </div>
      <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Password Baru</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="pwd" placeholder="Password Baru">
        </div>
        <div class="col-sm-4"></div>
      </div>
      <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Ulangi Password</label>
        <div class="col-sm-4">
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Ulangi Password">
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
        $password = $_POST['password'];
        $sql = "update operator set password = '$password' where lupa_code = '$lupa_code'";
        $simpan = mysqli_query($koneksi,$sql) or die (mysqli_error());
        
        if($simpan){
        echo "<script> alert(\"Password Anda Telah Dirubah. Silahkan Login\"); window.location = \"../index.php\"; </script>";
        } else {
			echo "<script> alert(\"Terjadi Kesalahan\"); window.location = \"opt_new_pass.php\"; </script>";
			}
    }
     ?>
  </div>
</body>
</html>
