<?php 
include ("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['operator'])){
	$username = $_SESSION['operator'];
	$sql = "select * from operator where username = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
    
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">GO-Futsal</a>
          </div>



          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" method="post" action="../cari_filter.php">
              <div class="form-group">
                <input type="text" name="mencari" class="form-control" placeholder="Search">
              </div>
              <button type="submit" name="cari" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>

            <ul class="nav navbar-nav">
              <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Home"><i class="fa fa-home"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Riwayat Pesan"><i class="fa fa-calendar-check-o"></i></a></li>
  
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="w3-hide-small w3-dropdown-hover">
              <a href="#" class="w3-padding-large w3-hover-white"><img src="operator/assets/foto_opt/<?php echo $sql_sel['foto']; ?>" class="w3-circle" style="height:25px;width:25px" alt="Avatar">&nbsp;&nbsp;Hi, <?php echo $sql_sel['nama_opt']; ?> &nbsp;<i class="fa fa-caret-down"></i></a>
                <div class="w3-dropdown-content w3-white w3-card-4">
                  <a href="operator/opt_profil.php"><i class="fa fa-user"></i>&nbsp;Accounts</a>
                  <!--<a href="#"><i class="fa fa-cog"></i>&nbsp;Settings</a>-->
                  <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                </div>
               </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
     <?php 
}elseif(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
	$sql = "select * from member where username_member = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
 <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">GO-Futsal</a>
          </div>



          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" method="post" action="../cari_filter.php">
              <div class="form-group">
                <input type="text" name="mencari" class="form-control" placeholder="Search">
              </div>
              <button type="submit" name="cari" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>

            <ul class="nav navbar-nav">
              <li class="w3-hide-small"><a href="../" class="w3-padding-large w3-hover-white" title="Home"><i class="fa fa-home"></i></a></li>
  <li class="w3-hide-small"><a href="member_profil.php" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>

  
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="w3-hide-small w3-dropdown-hover">
              <a href="#" class="w3-padding-large w3-hover-white"><img src="assets/foto_member/<?php echo $sql_sel['foto']; ?>" class="w3-circle" style="height:25px;width:25px" alt="Avatar">&nbsp;&nbsp;Hi, <?php echo $sql_sel['nama']; ?> &nbsp;<i class="fa fa-caret-down"></i></a>
                <div class="w3-dropdown-content w3-white w3-card-4">
                  <a href="member_profil.php"><i class="fa fa-user"></i>&nbsp;Accounts</a>
                  <!--<a href="#"><i class="fa fa-cog"></i>&nbsp;Settings</a>-->
                  <a href="../logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                </div>
               </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <?php
	} else {
		?>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">GO-Futsal</a>
          </div>



          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="../cari_filter.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="mencari">
              </div>
              <button type="submit" name="cari" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>

            

            <ul class="nav navbar-nav navbar-right">
              <li><a href="../operator/opt_daftar.php">Daftar</a></li>
              
              <form class="navbar-form navbar-right">
                &nbsp;&nbsp;&nbsp;&nbsp;Atau Masuk sebagai &nbsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Member</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal2">Operator</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </form> 
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<?php
		}
?>