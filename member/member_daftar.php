<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Pendaftaran Member</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
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
     
     <?php
include ("../koneksi.php");
include "sendEmail-v156.php";
if(isset($_POST['submit'])){
 $username = $_POST['username'];
 $nama = $_POST['nama'];
 $tgl_lahir = $_POST['tgl_lahir'];
 $jk = $_POST['jk'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 //acak karakter
 $ver_code = md5(uniqid(rand()));
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE email='$email'"));
		$cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE username='$username'"));
		$cek3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email'"));
		$cek4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE username_member ='$username'"));
			if ($cek > 0 || $cek3 > 0){
		echo "<script>window.alert('Email yang anda masukan sudah ada')
		window.location='member_daftar.php'</script>";
		} elseif($cek2 > 0 || $cek4 > 0){
			echo "<script>window.alert('Username yang anda masukan sudah ada')
		window.location='member_daftar.php'</script>";
		} elseif($_POST['username'] == ''){
			echo "<script>window.alert('Username belum diisi')
		window.location='member_daftar.php'</script>";
		} elseif($_POST['email'] == ''){
			echo "<script>window.alert('Username belum diisi')
		window.location='member_daftar.php'</script>";
		} else {
			//upload foto
			 $foto = $_FILES['foto']['name'];
			 $lokasi=$_FILES['foto']['tmp_name'];
			copy ($lokasi,"assets/foto_member/".$foto);
			 $sql = "insert into member values ('$username','$nama','$tgl_lahir','$jk','$email','$password','$foto','$ver_code','')";
			 $query = mysqli_query($koneksi,$sql) or die(mysqli_error());
        if($query)
            {
				$to = $email;
				$subject = "Konfirmasi Akun Anda $nama";
				$message = "http://localhost/project/Home/member/member_konfirmasi.php?passkey=$ver_code";
				
				//sender
				$sender = "gofutsaldev@gmail.com";
				$password = "tif20152016";
	
				$sentmail = (email_localhost($to,$subject,$message,$sender,$password));
	
				if($sentmail)
				
                echo "<script> alert(\"Silakan Tunggu Dan Cek Email Anda....\"); window.location = \"member_daftar.php\"; </script>";
           		 }
            	else
            	{
                echo "<script> alert(\"Maaf!! Silakan Cek Kembali Form Yang Telah Anda Isi\"); window.location = \"member_daftar.php\"; </script>";
            	}
		}
}
  ?>
    <h5><b>Form Registrasi</b></h5>
    <hr>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3"></div>
      <div class="col-sm-8">

      </div>
    </div>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h3><b>Sekarang Anda Mendaftar Sebagai Member</b></h3>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <a href="../operator/opt_daftar.php"><h4><b>Anda Ingin Mendaftar Sebagai Operator?</b></h4></a>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Nama Lengkap</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama" id="pwd" placeholder="Nama Lengkap" required>
        </div>
        <div class="col-sm-4"></div>
      </div>
      
       <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Username</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="username" id="pwd" placeholder="Username" required>
        </div>
        <div class="col-sm-4"></div>
      </div>
      
       <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Tanggal Lahir</label>
        <div class="col-sm-4">
           <div class='input-group date' id='datepicker'>
                                <input type='text' class="form-control" name="tgl_lahir" value="1990-01-01" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
        </div>
        <div class="col-sm-4"></div>
      </div>

        <div class="form-group">
          <div class="col-sm-1"></div>
          <label class="control-label col-sm-3" for="email">Jenis Kelamin</label>
          <div class="col-sm-4">
            <label class="radio-inline"><input type="radio" name="jk" value="L">Laki-laki</label>
<label class="radio-inline"><input type="radio" name="jk" value="P">Perempuan</label>
          </div>
          <div class="col-sm-4"></div>
        </div>

			<div class="form-group">
            <div class="col-sm-3"></div>
            <label class="control-label col-sm-1" for="email">Email</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" name="email" id="pwd" placeholder="Email" required>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-3"></div>
            <label class="control-label col-sm-1" for="email">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="pwd" placeholder="Password" required>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="control-label col-sm-3" for="email">Konfirmasi Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Konfirmasi Password" required>
            </div>
            <div class="col-sm-4"></div>
          </div>

              <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="control-label col-sm-3" for="email">Foto Profil</label>
                <div class="col-sm-8">
                  <label class="btn btn-info" for="my-file-selector2">
                      <input id="my-file-selector2" name="foto" required type="file" style="display:none;" onchange="$('#upload-file-foto').html($(this).val());">
                      Upload Foto
                  </label>
                  <p>* Ukuran file maksimal kurang dari 2 MB</p>
                  <span class='label label-danger' id="upload-file-foto"></span>
                </div>

              </div>

              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="checkbox col-sm-8">
                  <label><input type="checkbox" name="aturan" value=""><h5><b>Saya mengerti dan menyetujui dengan aturan pengguna yang berlaku</b></h5></label>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-danger btn-block" name="submit">Daftar</button>
                </div>
                <div class="col-sm-5"></div>
              </div>

    </form>
    
  </div>
  <br><br><br><br><br>
</body>
<!-- jQuery -->
    <script src="../admin/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../admin/assets/vendors/nprogress/nprogress.js"></script>
  <!-- jQuery Smart Wizard -->
    <script src="../admin/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../admin/assets/build/js/custom.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/min/moment.min.js"></script>
    <script src="../admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../assets/js/moment.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker').datetimepicker({
					format: 'DD MMMM YYYY HH:mm',
                });
				
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				
				$('#timepicker').datetimepicker({
					format: 'HH:mm'
				});
			});
		</script>

</html>
