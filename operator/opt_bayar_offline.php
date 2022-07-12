<div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Bayar Offline</h4>
        <hr class="w3-clear">
          <div class="w3-row-padding" style="margin:0 -16px">
            
            <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Pemesan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
      <tr>
        <th>Kode Booking</th>
        <th>Username</th>
      	<th>No Lap</th>
        <th>Batas Bayar</th>
        <th>Tanggal Main</th>
        <th>Mulai</th>
		<th>Selesai</th>
        <th>Total Bayar</th>
		<th>Status</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		$sql_sel = "select transaksi.*, lapangan.* from transaksi inner join lapangan on (transaksi.id_lap=lapangan.id_lap) where (status='Menunggu Pembayaran' or status='Belum Lunas' and (jenis_bayar='cod')) and username='$username'";
		$query_sel = mysqli_query($koneksi,$sql_sel);
		while($sql_res = mysqli_fetch_array($query_sel)){
											
	?>
          <tr>
             <td><?php echo $sql_res['id_book']; ?></td>
             <td><?php echo $sql_res['username_member']; ?></td>
             <td><?php echo $sql_res['no_lap']; ?></td>
             <td><?php echo $sql_res['batas_bayar']; ?></td>
             <td><?php echo $sql_res['tgl_main']; ?></td>
             <td><?php echo $sql_res['jam_mulai']; ?></td>
             <td><?php echo $sql_res['jam_berakhir']; ?></td>
             <td><?php 
			 $d = mysqli_fetch_array(mysqli_query($koneksi,"select * from bayar_cod where id_book='$sql_res[id_book]'"));
			 if($d > 0){
				 echo $d['bayar']."(".$sql_res['total_harga'].")";
				 }else{
				 echo "0($sql_res[total_harga])";	 
					 }?>
             </td>
             <td>
			 <?php 
			 echo $sql_res['status']; 
			 ?>
             </td>
             <td>
             <?php if($sql_res['status'] == 'Lunas') {
				 echo "Selesai";
				 ?>
             <?php } else {?>
             
            <a href="#" class='open_bayar btn btn-primary btn-xs' id='<?php echo $sql_res['id_book']; ?>'><span class="fa fa-money"></span> bayar</a>
             <?php
			 }
                ?>
             </tr>
             <?php
			 }
                ?>
    </tbody>
                                </table>
            
        </div>
      </div>