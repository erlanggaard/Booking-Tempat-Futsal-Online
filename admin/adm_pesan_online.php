<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemesanan Online</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
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
                      <!-- Tabel Data Pemesanan Online -->
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
		$sql_sel = "select * from transaksi where jenis_bayar = 'transfer' || jenis_bayar = 'cod'"; //variabel berisi bahasa query untuk memilih data di tabel transaksi yang jenis bayar = transfer atau cod
		$query_sel = mysqli_query($koneksi,$sql_sel); // merubah menjadi bahasa query agar dapat memilih data di database
		while($sql_res = mysqli_fetch_array($query_sel)){ //merubah data yang telah dipilih menjadi bentuk array
											
	?>
          <tr>
            <!-- menampilkan data yang telah dipilih dalam bentuk tabel -->
             <td><?php echo $sql_res['id_book']; ?></td>
             <td><?php echo $sql_res['username_member']; ?></td>
             <td><?php echo $sql_res['id_lap']; ?></td>
             <td><?php echo $sql_res['tgl_book']; ?></td>
             <td><?php echo $sql_res['tgl_main']; ?></td>
             <td><?php echo $sql_res['jam_mulai']; ?></td>
             <td><?php echo $sql_res['jam_berakhir']; ?></td>
             <td><?php echo $sql_res['jenis_bayar']; ?></td>
             <td><?php echo $sql_res['status']; ?>
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