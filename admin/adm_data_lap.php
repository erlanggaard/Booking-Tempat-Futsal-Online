<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Lapangan</h2>
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
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_content">
                   <!-- Tabel Lapangan -->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>Foto</th>
                         <th>ID Lapangan</th>
                        <th>Jenis Lapangan</th>
                        
                        <th>Harga</th>
                        <th>No Lapanangan</th>
                        <th>Operator</th>
                        
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
		$sql_sel = "select * from lapangan"; // Variabel berisi perintah untuk memilih data di tabel lapangan di database
		$query_sel = mysqli_query($koneksi,$sql_sel); // merubah menjadi bahasa sql untuk memilih data
		while($sql_res = mysqli_fetch_array($query_sel)){ //membuat data yang telah di pilih menjadi bentuk array
											
	?>
          <tr>
          <!-- menampilkan data dari tabel lapangan pada database -->
          	<td><img src="../operator/assets/foto_lap/<?php echo $sql_res['foto']; ?>" width="50px" height="50px"  /></td>
             <td><?php echo $sql_res['id_lap']; ?></td>
             <td><?php echo $sql_res['jenis_rumput']; ?></td>
             
             <td><?php echo $sql_res['harga']; ?></td>
             <td><?php echo $sql_res['no_lap']; ?></td>
             <td><?php echo $sql_res['username']; ?></td>
             
             
                 
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