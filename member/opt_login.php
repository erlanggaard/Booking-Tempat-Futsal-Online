<div id="Modal2" class="modal fade" role="dialog">
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
              <h5>Masuk sebagai Member
            </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9"><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-dismiss="modal"><span class="glyphicon glyphicon-user"></span>&nbsp; Member</button></div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
              <p>
                Atau masuk dengan akun Operator GO-Futsal Anda
              </p>
          </div>
        </div>
        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Email</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="username" id="pwd" placeholder="Enter email or username" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <a href="../operator/opt_lupa.php">Lupa password?</a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary" name="loginopt"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Masuk</button>
              Atau <a href="../operator/opt_daftar.php">Mendaftar!</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <?php 
	include ("../koneksi.php");
	if(isset($_POST['loginopt'])){
		$username = $_POST['username'];
		$email = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from operator where username = '$username' or email = '$email' ";
		$query = mysqli_query($koneksi,$sql);
		
		$cek = mysqli_num_rows($query);
		
		if($cek <> 0 ){
			if($cek2['ver_code'] <> '' ){
				$cek2 = mysqli_fetch_array($query);
				echo "<script> alert(\"Anda belum verifikasi email..\"); window.location = \"../index.php\"; </script>";
				}else{
			while ($sql_sel = mysqli_fetch_array($query)){
				$cekuser = $sql_sel['username'];
				$cekemail = $sql_sel['email'];
				$cekpass = $sql_sel['password'];
				}
				if($_POST['username'] == $cekuser || $_POST['username'] == $cekemail){
					if($_POST['password'] == $cekpass){
						session_start();
						$_SESSION['operator']=$cekuser;
							echo "<script> window.location = \"../index.php\"; </script>";
						} else {
							echo "<script> alert(\"Password Salah\"); window.location = \"../index.php\"; </script>";
						}
					} else {
						echo "<script> alert(\"Username atau Email Salah\"); window.location = \"../index.php\"; </script>";	
					}}
			} else {
				echo "<script> alert(\"Username atau Email tidak ditemukan\"); window.location = \"../index.php\"; </script>";
				}
	
	}
	?>
    

  </div>
</div>
