<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Administration | GO-Futsal</title>
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <!-- Bootstrap -->
  <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="" method="post">
            <h1>Administration</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username Or Email" name="id" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <button type="submit" class="btn btn-success" name="adm"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Masuk</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <div class="clearfix"></div>
              <br />

              <div>
                <h1><img src="../assets/images/Goputsalgaji.png" style="width:25px; height:25px;"> GO-<font color="#6fcb44">Futsal</font>
                </h1>
                <p>GO Futsal By GO-Team</p>
                <p>©2016 All Rights Reserved</p>
                <p>Repost by <a href="https://stokcoding.com/" title="StokCoding.com" target="_blank">StokCoding.com</a></p>
              </div>
            </div>
          </form>
          <?php
          include("../koneksi.php");
          if (isset($_POST['adm'])) {
            //jika tombol masuk ditekan akan menjalankan code ini
            $id = $_POST['id'];
            $email = $_POST['id'];
            $password = $_POST['password'];

            $sql = "select * from admin where id = '$id' or email = '$email' ";
            $query = mysqli_query($koneksi, $sql);
            //cek data apakah ada di database
            $cek = mysqli_num_rows($query);

            if ($cek <> 0) { //jika data ada di database maka akan menjalankan code bagian ini
              while ($sql_sel = mysqli_fetch_array($query)) {
                //memanggil data di database
                $cekid = $sql_sel['id'];
                $cekemail = $sql_sel['email'];
                $cekpass = $sql_sel['password'];
              }
              if ($_POST['id'] == $cekid || $_POST['id'] == $cekemail) { //cek apakah username atau email sama dengan yang ada di database
                if ($_POST['password'] == $cekpass) { // cek apakah password sama dengan yang ada di database
                  session_start(); // untuk memulai session
                  $_SESSION['admin'] = $cekemail; //menamai session dengan email
                  echo "<script>alert(\"Terima Kasih.!!\"); window.location = \"index.php\"; </script>";
                } else {
                  echo "<script> alert(\"Password Salah\"); window.location = \"adm_login.php\"; </script>";
                }
              } else {
                echo "<script> alert(\"Username atau Email Salah\"); window.location = \"adm_login.php\"; </script>";
              }
            } else {
              echo "<script> alert(\"Username atau Email tidak ditemukan\"); window.location = \"adm_login.php\"; </script>";
            }
          }
          ?>
        </section>
      </div>
    </div>
  </div>
</body>

</html>