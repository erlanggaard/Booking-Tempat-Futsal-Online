<?php 
session_start();
include ("../koneksi.php");
include ("../sendEmail-v156.php");
// jika tombol daftar di klik maka akan mengeksekusi code pada file ini
if(isset($_POST['submit'])){
		$username = $_POST['username'];    // pemberian nilai variabel
		$nama_opt = $_POST['nama_opt'];    // setiap variabel berisi apa yang telah diinputkan user
		$nama_futsal = $_POST['nama_futsal'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];
		$alamat_futsal = $_POST['alamat_futsal'];
		$kota = $_POST['kota'];
		
		$ver_code = md5(uniqid(rand()));
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE email='$email'"));
		$cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE username='$username'"));
		$cek3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email'"));
		$cek4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE username='$username'"));
		//untuk mengecek apakah username maupun email telah terdaftar sebelumnya atau tidak pada database
			if ($cek > 0 || $cek3 > 0){
		echo "<script>window.alert('Email yang anda masukan sudah ada')
		window.location='opt_daftar.php'</script>";
		} elseif($cek2 > 0 || $cek4 > 0){
			echo "<script>window.alert('Username yang anda masukan sudah ada')
		window.location='opt_daftar.php'</script>";
		} elseif($_POST['username'] == ''){
			echo "<script>window.alert('Username belum diisi')
		window.location='opt_daftar.php'</script>";
		} elseif($_POST['email'] == ''){
			echo "<script>window.alert('Username belum diisi')
		window.location='opt_daftar.php'</script>";
		} else {
			//jika tidak terdapat username maupun email yang sama pada database
			//akan menyimpan data yang telah diinputkan
			//Upload Foto
			$filename = $_FILES['foto']['name'];
			$lokasi = $_FILES['foto']['tmp_name'];
			copy($lokasi, "assets/foto_opt/".$filename);
			//untuk menyimpan data
			$sql2 = "INSERT INTO operator VALUES ('$username', '$nama_opt','$nama_futsal', '$email','$password','$alamat','$alamat_futsal','$kota','$filename','$ver_code','')";
        	$result2 = mysqli_query($koneksi,$sql2) or die(mysqli_error());

        if($result2)
            {
				// menampilkan alert jika berhasil
                echo "<script> alert(\"Silakan Tunggu Konfirmasi Email Dari Admin....\"); window.location = \"opt_daftar.php\"; </script>";
            }
            else
            {
				// menampilkan alert jika gagal
                echo "<script> alert(\"Maaf!! Silakan Cek Kembali Form Yang Telah Anda Isi\"); window.location = \"opt_daftar.php\"; </script>";
            }
		}
		}
?>