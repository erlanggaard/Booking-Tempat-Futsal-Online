<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Konfirmasi Pembayaran</h2>
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
                         <th>Kode Booking</th>
                        <th>Username</th>
                        <th>ID</th>
                        <th>Tanggal Booking</th>
                        <th>Tanggal Main</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
		$sql_sel = "select * from transaksi where jenis_bayar = 'transfer'";
		$query_sel = mysqli_query($koneksi,$sql_sel);
		while($sql_res = mysqli_fetch_array($query_sel)){
											
	?>
          <tr>
             <td><?php echo $sql_res['id_book']; ?></td>
             <td><?php echo $sql_res['username_member']; ?></td>
             <td><?php echo $sql_res['id_lap']; ?></td>
             <td><?php echo $sql_res['tgl_book']; ?></td>
             <td><?php echo $sql_res['tgl_main']; ?></td>
             <td><?php echo $sql_res['jam_mulai']; ?></td>
             <td><?php echo $sql_res['jam_berakhir']; ?></td>
             <td><?php echo $sql_res['jenis_bayar']; ?></td>
             <td><?php if ($sql_res['status']=='Menunggu Konfirmasi admin'){ ?>
             <form method="post"><input name="id_book" value="<?php echo $sql_res['id_book']; ?>" type="hidden" /><input type="submit" class="btn btn-warning btn-xs" name="kirim" value="<?php echo $sql_res['status']; ?>" rel="tooltip" title="Konfirmasi Sekarang"></form>
			 <?php } else { 
			 echo $sql_res['status']; 
			 }
			 ?>
             </td>
             <td class="center">
             	
                <img src="../assets/bukti_bayar/<?php 
				$q = mysqli_query($koneksi, "select * from bayar_transfer where id_book='$sql_res[id_book]'");
				$l=mysqli_fetch_array($q);
				echo $l['bukti_bayar']; ?>" width="90" height="30" alt="Belum Upload">
                </td>
                 
             </tr>
    <?php }?>
                      </tbody>
                    </table>
                     </div>
                </div>
              </div>
            </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php
			if(isset($_POST['kirim'])){
				//ketika admin menekan tombol konfirmasi pembayaran
				 include "../sendEmail-v156.php";
				 $q = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where id_book='$_POST[id_book]'"));
				 //mengambil data dari database
				 $sql_selmem = "select * from member where username_member='$q[username_member]'";
				 $selmem = mysqli_query ($koneksi,$sql_selmem);
				 $member = mysqli_fetch_array($selmem);
				 //menseleksi data dari
               
				//format email yang akan dikirim ke email pemesan
					$message = "Pembayaran dengan kode booking $_POST[id_book] telah Admin konfirmasi. Terimakasih telah melakukan pembayaran. Silahkan bermain dengan menunjukkan email Anda pada operator tempat futsal terlebih dahulu.";  
					//$message = file_get_contents("email_template.html");
					//$message = '';
					$email = $member['email'];
					$to = $email;
					$subject = "Transaksi Sukses";
					
					//sender
					$sender = "gofutsal.member@gmail.com";
					$password = "tif20152016";
		
					$sentmail = (email_localhost($to,$subject,$message,$sender,$password)); // fungsi untuk mengirim email
		
					if($sentmail) //jika email berhasil dikirim 
					{
						//update data di database yang memiliki id book seperti di tabel
						$sql_update = mysqli_query($koneksi,"update transaksi set status = 'Telah Dikonfirmasi' where id_book= '$q[id_book]'");
						$sql_update2 = mysqli_query($koneksi,"update bayar_transfer set status = 'Telah Dikonfirmasi' where id_book= '$q[id_book]'");
						echo "<script> alert(\"Telah dikonfirmasi..!!\"); window.location = \"index.php?url=bayar_confirm\"; </script>";
						
					}
					else //jika tidak 
					{
						echo "<script> alert(\"Maaf!! Terjadi Kesalahan\");</script>";
					}
				}
                ?>
