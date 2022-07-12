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
	// fungsi untuk mengacak angka dan huruf
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
	
	
	if(isset($_POST['submit'])){ // jika tombol set ulang password ditekan akan menjalankan code bagian ini
		$email = $_POST['email']; 
		$lupa_pass = acakangkahuruf(6); //variabel dengan nilai huruf dan angka yang telah diacak
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email'")); 
		// cek ke database apakah ada data yang memiliki email yg telah diinputkan
		$cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT lupa_pass FROM member WHERE email='$email'"));
		if($cek <= 0){ // cek apakah data ada di dalam database
					//jika tidak ada maka email belum terdaftar
					echo "<script>window.alert(\"Email belum terdaftar\"); window.location = \"member_lupa_pass.php\"; </script>";
			} else {
				//jika ada maka menjalankan code berikut
				$sql = "update member set lupa_pass = '$lupa_pass' where email = '$email'";
				//menyimpan kode acak ke dalam database
				$simpan = mysqli_query($koneksi,$sql) or die (mysqli_error());
				if($simpan)
        {
            $to = $email;
            $subject = "Konfirmasi Akun Anda";
            $message = "Gunakan kode berikut <br> $lupa_pass <br> http://localhost/project/home/member/member_code_pass.php";
			
			//sender
			$sender = "gofutsaldev@gmail.com";
			$password = "tif20152016";

            $sentmail = (email_localhost($to,$subject,$message,$sender,$password)); //mengirim email ke email yang telah dimasukkan dan jika email telah terdaftar

            if($sentmail)
            {
                echo "<script> alert(\"Kode Konfirmasi Telah Dikirim Ke Email Anda\"); window.location = \"member_lupa_pass.php\"; </script>";
            }
            else
            {
                echo "<script> alert(\"Maaf!! Terjadi Kesalahan\"); window.location = \"member_lupa_pass.php\"; </script>";
            }
        }
				}
		}
	?>
  </div>
</body>
</html>
