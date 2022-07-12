<?php 
include ("../koneksi.php");
include ("sendEmail-v156.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Lupa Password</title>
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
        <label class="control-label col-sm-1" for="email">Email</label>
        <div class="col-sm-4">
          <input type="text" name="email" class="form-control" id="pwd" placeholder="Enter email">
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
	function acakangkahuruf($panjang)
	{
    $karakter= 'ABCDEFGHIJKL1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
	}
	
	
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$lupa_code = acakangkahuruf(6);
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE email='$email'"));
		$cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT lupa_code FROM operator WHERE email='$email'"));
		if($cek <= 0){
					echo "<script>window.alert('Email belum terdaftar')
		window.location='lupa.php'</script>";
			} else {
				$sql = "update operator set lupa_code = '$lupa_code' where email = '$email'";
				$simpan = mysqli_query($koneksi,$sql) or die (mysqli_error());
				if($simpan)
        {
            $to = $email;
            $subject = "Konfirmasi Akun Anda";
            $message = "Gunakan kode berikut <br> $lupa_code <br> http://localhost/project/home/operator/opt_code_pass.php";
			
			//sender
			$sender = "gofutsaldev@gmail.com";
			$password = "tif20152016";

            $sentmail = (email_localhost($to,$subject,$message,$sender,$password));

            if($sentmail)
            {
                echo "<script> alert(\"Kode Konfirmasi Telah Dikirim Ke Email Anda\"); window.location = \"opt_code_pass.php\"; </script>";
            }
            else
            {
                echo "<script> alert(\"Maaf!! Terjadi Kesalahan\"); window.location = \"opt_lupa.php\"; </script>";
            }
        }
				}
		}
	?>
  </div>
</body>
</html>
