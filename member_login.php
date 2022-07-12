<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masuk GO-Futsal</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
              <h5>Masuk sebagai operator
            </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9"><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#Modal2" data-dismiss="modal"><span class="glyphicon glyphicon-user"></span>&nbsp; Operator</button></h5></div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
              <p>
                Atau masuk dengan akun GO-Futsal Anda
              </p>
          </div>
        </div>
        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Username</label>
            <div class="col-sm-8">
              <input type="text" name="username" class="form-control" id="pwd" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Password</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <a href="member/member_lupa_pass.php">Lupa password?</a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary" name="loginmember"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Masuk</button>
              Atau <a href="member/member_daftar.php">Mendaftar!</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <?php
	include ("koneksi.php");
	if(isset($_POST['loginmember'])){
		$username = $_POST['username'];
		$email = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from member where username_member = '$username' or email = '$email' ";
		$query = mysqli_query($koneksi,$sql);
		
		$cek = mysqli_num_rows($query);
		
		if($cek <> 0 ){
			$sql_sel = mysqli_fetch_array($query);
			$cekuser = $sql_sel['username_member'];
			$cekemail = $sql_sel['email'];
			$cekpass = $sql_sel['password'];
			
			if($sql_sel['ver_code'] <> '' ){	
				echo "<script> alert(\"Anda belum verifikasi email..\"); window.location = \"index.php\"; </script>";
				}else{
				if($username == $cekuser || $email == $cekemail){
					if($_POST['password'] == $cekpass){
						session_start();
						$_SESSION['member']=$cekuser;
							echo "<script> window.location = \"index.php\"; </script>";
						} else {
							echo "<script> alert(\"Password Salah\"); window.location = \"index.php\"; </script>";
						}
					} else {
						echo "<script> alert(\"Username atau Email Salah\"); window.location = \"index.php\"; </script>";	
					}}
			} else {
				echo "<script> alert(\"Username atau Email tidak ditemukan\"); window.location = \"index.php\"; </script>";
				}
		
		}
	?>
  </div>
</div>
