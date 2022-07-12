<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Pendaftaran Operator</title>
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
    <h5><b>Form Registrasi</b></h5>
    <hr>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3"></div>
      <div class="col-sm-8">

      </div>
    </div>
    <form class="form-horizontal" action="opt_pro_reg.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h3><b>Sekarang Anda Mendaftar Sebagai Operator</b></h3>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <a href="../member/member_daftar.php"><h4><b>Anda Ingin Mendaftar Sebagai Member?</b></h4></a>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Nama Operator</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama_opt" id="pwd" placeholder="Nama Operator" required>
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
        <label class="control-label col-sm-3" for="email">Nama Futsal</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama_futsal" id="pwd" placeholder="Nama Tempat Futsal" required>
        </div>
        <div class="col-sm-4"></div>
      </div>

        <div class="form-group">
          <div class="col-sm-3"></div>
          <label class="control-label col-sm-1" for="email">Email</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="email" id="pwd" placeholder="Email" required>
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
              <div class="col-sm-3"></div>
              <label class="control-label col-sm-1" for="email">Alamat</label>
              <div class="col-sm-4">
                <textarea class="form-control" rows="5" name="alamat" id="comment" required></textarea>
              </div>
              <div class="col-sm-4"></div>
            </div>

              <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="control-label col-sm-3">Alamat Futsal</label>
                <div class="col-sm-4">

                  <textarea class="form-control" rows="5" name="alamat_futsal" id="comment" required></textarea>
                </div>
                <div class="col-sm-4"></div>
              </div>
              
               <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="control-label col-sm-3" for="email">Kota</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="kota" id="pwd" placeholder="Kota Tempat Futsal" required>
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
</html>
