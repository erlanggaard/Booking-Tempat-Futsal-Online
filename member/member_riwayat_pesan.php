<div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Riwayat Pemesanan</h4>
        <hr class="w3-clear">
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="panel-heading">
                             Tabel Pemesanan Anda
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Main</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Tempat Futsal (No Lap)</th>
                                            <th>Total Bayar</th>
                                            <th width="10px">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     		$sql_sel = "select * from transaksi where (status='Selesai' || status='Dibatalkan') and username_member='$username'";
                                            $query_sel = mysqli_query($koneksi,$sql_sel);
                                            while($sql_res = mysqli_fetch_array($query_sel)){
                                                                                
                                        ?>
                                              <tr>
                                                
                                                 <td><?php echo $sql_res['tgl_main']; ?></td>
                                                 <td><?php echo $sql_res['jam_mulai']; ?></td>
                                                 <td><?php echo $sql_res['jam_berakhir']; ?></td>
                                                 <td><?php 
												 $s = mysqli_query($koneksi,"select lapangan.*, operator.* from lapangan inner join operator on lapangan.username=operator.username where id_lap='$sql_res[id_lap]'");
												 $p = mysqli_fetch_array($s);
												 echo "$p[nama_futsal] ($p[no_lap])"; ?></td>
                                                 <td><?php echo $sql_res['total_harga']; ?></td>
                                                 <td><?php echo $sql_res['status']; ?></td>
                                                 
                                                  
                                                 </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
        </div>
      </div>
        </div>
      </div>