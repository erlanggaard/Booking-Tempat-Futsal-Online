<div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Konfirmasi Bermain (Bayar Offline)</h4>
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
        <th>Tanggal Main</th>
        <th>Mulai</th>
		<th>Selesai</th>
		<th>Status</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		$sql_sel = "select transaksi.*, lapangan.* from transaksi inner join lapangan on (transaksi.id_lap=lapangan.id_lap) where ((status='Lunas' or status='Selesai' or status='Dibatalkan') and jenis_bayar='cod') and username='$username'";
		$query_sel = mysqli_query($koneksi,$sql_sel);
		while($sql_res = mysqli_fetch_array($query_sel)){
											
	?>
          <tr>
             <td><?php echo $sql_res['id_book']; ?></td>
             <td><?php echo $sql_res['username_member']; ?></td>
             <td><?php echo $sql_res['no_lap']; ?></td>
             <td><?php echo $sql_res['tgl_main']; ?></td>
             <td><?php echo $sql_res['jam_mulai']; ?></td>
             <td><?php echo $sql_res['jam_berakhir']; ?></td>
             <td>
			 <?php 
			 echo $sql_res['status']; 
			 ?>
             </td>
             <td>
             <?php if($sql_res['status'] == 'Selesai') {
				 echo "Telah Bermain";
			 }elseif($sql_res['status'] == 'Dibatalkan') {
				 echo "Dibatalkan";
				 ?>
             <?php } else {?>
             
             <form method="post"><input type="hidden" value="<?php echo $sql_res['id_book']; ?>" name="id_book" /><button type="submit" name="main2" class="btn btn-warning btn-xs"><i class="fa fa-play"></i> Main</button></form></td>
             <?php
			 }
                ?>
                <?php 
	  if(isset($_POST['main2'])){
		  $idb = $_POST['id_book'];
		  $up = mysqli_query($koneksi,"update transaksi set status='Selesai' where id_book = '$idb'");
		  $up2 = mysqli_query($koneksi, "update bayar_cod set status='Selesai' where id_book='$idb'");
		  if($up && $up2){
			  echo "<script> alert(\"Berhasil..!!\");  window.location = \"opt_profil.php?url=mBayOff\"; </script>";
			  }
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
      