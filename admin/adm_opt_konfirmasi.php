 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Konfirmasi Operator</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown"><a href="adm_opt_konfirmasi.php"></a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  		<!-- Isi disini -->
                     
                     
                     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_content">
                   
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Nama</th>
                          <th>Nama Futsal</th>
                          <th>Alamat Futsal</th>
                          <th>Kota</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
						require "../koneksi.php";
						$query = mysqli_query($koneksi,"select * from operator where ver_code != ''");
						while($sel = mysqli_fetch_array($query)){
						?>
                        <tr>
                          <td><img align="middle" src="../operator/assets/foto_opt/<?php echo $sel['foto']; ?>" style="width:50px; height:50px;"/></td>
                          <td><?php echo $sel['nama_opt']; ?></td>
                          <td><?php echo $sel['nama_futsal']; ?></td>
                          <td><?php echo $sel['alamat_futsal']; ?></td>
                          <td><?php echo $sel['kota']; ?></td>
                          <td><?php echo $sel['email']; ?></td>
                          <td><a href="adm_opt_konfirmasi.php?url=confirm&&username=<?php echo $sel['username']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Aktifkan </a><a href="adm_opt_konfirmasi.php?url=hapus&&username=<?php echo $sel['username']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus </a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
			</div>
                     <?php 
					 include "sendEmail-v156.php";
					 if(isset($_GET['url'])){
						if($_GET['url'] == "confirm" ){
							//jika tombol aktifkan ditekan maka code ini akan dijalankan
							//$username = $_GET['username'];
							$pilih = "select * from operator where username = '$_GET[username]'";
							$oue = mysqli_query($koneksi,$pilih);
							$pil = mysqli_fetch_array($oue);
							//menampilkan tabel operator yang memiliki username yang telah dipilih
							$to = $pil['email'];
							$subject = "Konfirmasi Akun Anda $pil[nama_opt]";
							$message = "http://localhost/project/Home/operator/opt_konfirmasi.php?passkey=".$pil['ver_code']."";
							
							//sender
							$sender = "gofutsaldev@gmail.com";
							$password = "tif20152016";
				
							$sentmail = (email_localhost($to,$subject,$message,$sender,$password));
							// mengirim email ke operator yang diaktifkan
							if($sentmail)
							{
								echo "<script> alert(\"Berhasil\"); window.location = \"index.php?url=opt_confirm\"; </script>";
							}
							else
							{
								echo "<script> alert(\"Gagal\"); window.location = \"index.php?url=opt_confirm\"; </script>";
							}
							}
							
						if($_GET['url'] == "hapus"){
							// jika tombol hapus yang ditekan maka code bagian ini yang akan dijalankan 
							$pilih = "select * from operator where username = '$_GET[username]'";
							$oue = mysqli_query($koneksi,$pilih);
							$pil = mysqli_fetch_array($oue);
							
							$to = $pil['email'];
							$subject = "Konfirmasi Akun Anda ".$pil['nama_opt']."";
							$message = "Maaf, Akun Anda tidak dapat kami konfirmasi. Silakan daftar kembali dengan data yang benar. Terima Kasih";
							
							//sender
							$sender = "gofutsaldev@gmail.com";
							$password = "tif20152016";
				
							$sentmail = (email_localhost($to,$subject,$message,$sender,$password));
							// mengirim email bahwa akun yang telah didaftarkan gagal dikonfirmasi
							
							
							if($sentmail){
							$del = "delete from operator where username = '$_GET[username]'";
							$que = mysqli_query($koneksi,$del);
				
							if($que)
							{
								echo "<script> alert(\"Berhasil\"); window.location = \"index.php?url=opt_confirm\"; </script>";
							}
							else
							{
								echo "<script> alert(\"Gagal\"); window.location = \"index.php?url=opt_confirm\"; </script>";
							}
							}
												 
						 }}
					 ?>
                     
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
