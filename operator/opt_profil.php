<?php
require ("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['operator'])){
	$username = $_SESSION['operator'];
	$sql = "select * from operator where username = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Halaman Operator</title>
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

  <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- <link href="../assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> -->
    <link href="../admin/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <style>
    body {
		background-color:#CCC;
		}
    </style>
    
</head>
<body>
 <!-- edit atau delete lapangan maupun tambah -->
  <?php 
	include ("lap_tambah.php");
	include ("navbar.php");
	?>
    <?php 
if(isset($_GET['lap'])){
if($_GET['lap']=="delete"){
	$data = mysqli_query($koneksi, "select * from lapangan where id_lap = '$_GET[id_lap]'");
	$isi = mysqli_fetch_array($data);
	
	$nama = $isi['foto'];
	unlink('assets/foto/'.$nama);
	mysqli_query($koneksi,"delete from lapangan where id_lap = '$_GET[id_lap]'") or die (mysqli_error());
	echo "<script language='javascript'>
                    window.location='opt_profil.php';
                    </script>";
}}?>
<!-- Page Container -->
<div class="container-fluid w3-content" style="max-width:1400px;margin-top:60px">

<!-- Modal Popup untuk Harga--> 
<div id="Modalharga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- Modal Popup untuk bayar offline--> 
<div id="Modalbayar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data lapangan ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <br>
         <p class="w3-center"><img src="assets/foto_opt/<?php echo $sql_sel['foto']; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p> <br>
         <h4 class="w3-center"><?php echo $sql_sel['nama_opt']; ?></h4>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Status (Operator)</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $sql_sel['nama_futsal']; ?></p>
         <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i><?php echo $sql_sel['username']; ?></p>
        </div>
      </div>
      <br>

      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Data </button>
          <div id="Demo1" class="w3-accordion-content w3-container">
            <a href="opt_profil.php">Lapangan</a>
            <a href="opt_profil.php?url=konfirmasi"> Konfirmasi Pesan Online</a>
            <a href="opt_profil.php?url=mBayOff"> Konfirmasi Main Bayar Offline</a>
            <a href="opt_profil.php?url=mPesanOff"> Konfirmasi Main Pesan Offline</a>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Pemesanan</button>
          <div id="Demo2" class="w3-accordion-content w3-container">
			<a href="opt_profil.php?url=pesanoff"> Pesan Offline</a>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-tags fa-fw w3-margin-right"></i> Pembayaran</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
			<a href="opt_profil.php?url=bayaroff"> Bayar Offline</a>
            <a href="opt_profil.php?url=pesanbayaroff"> Bayar Pesan Offline</a>
			
          </div>
          <button onclick="myFunction('Demo4')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Foto</button>
          <div id="Demo4" class="w3-accordion-content w3-container">
         <div class="w3-row-padding">
         <br>
         	<?php 
			$z = mysqli_query($koneksi, "select * from lapangan where username='$username'");
			while($c = mysqli_fetch_array($z)){
			?>
            <div class="w3-half">
             <img src="assets/foto_lap/<?php echo $c['foto']; ?>" style="width:100%" class="w3-margin-bottom">
             </div>
            <?php } ?>
           
         </div>
          </div>
        </div>
      </div>
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m9">
    
    
    <!-- PHP MIDDLE VIEW -->
    <?php
    	if(isset($_GET['url'])){
        	if($_GET['url']=="pesanoff"){
      		//include "opt_pesan_off.php";
	  ?>
      
      <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Pesan Offline (By Operator)</h4>
        <hr class="w3-clear">
        
          <div class="w3-row-padding" style="margin:0 -16px">
            <?php
					//membuat kode urut sesuai database 
						$sql = "SELECT max(id_book) as terakhir from transaksi";
						$hasil = mysqli_query($koneksi,$sql);
						$data = mysqli_fetch_array($hasil);
						$lastID = $data['terakhir'];
						$lastNoUrut = substr($lastID, 3, 9);
						$nextNoUrut = $lastNoUrut + 1;
						$nextID = "KB".sprintf("%08s",$nextNoUrut);
						?>
                        <?php
						//fungsi membuat acak angka huruf
						function acakangkahuruf($panjang)
						{
						$karakter= 'ABCDEFGHIJKL1234567890';
						$string = '';
						for ($i = 0; $i < $panjang; $i++) {
					  $pos = rand(0, strlen($karakter)-1);
					  $string .= $karakter{$pos};
						}
						return $string;
						}
						$nextID2 = acakangkahuruf(4);
						?>
                       
                      	
                        <form class="form-horizontal form-label-left" method="post">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID; ?>" readonly>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemesan <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="">
                              <input type="hidden" name="kode" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID2; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select class="form-control form-control col-md-4 col-xs-6" name="no_lap1" id="no_lap1">
                               <?php 
                               $p = mysqli_query($koneksi, "select * from lapangan where username = '$username'");
                               while ($o = mysqli_fetch_array($p)) {
							   	echo "<option>$o[no_lap]</option>";
							   
							   }
                               ?>
                               </select>
                               <input type="hidden" id="id_lap1" name="id_lap1" required="required" class="form-control col-md-7 col-xs-12" readonly>
                               <input type="hidden" id="username1" name="username1" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="jenis_rumput1" name="jenis_rumput1" required="required" class="form-control col-md-7 col-xs-12"  readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Per Jam<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="harga1" name="harga1" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Main<span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class='input-group date' id='datepicker'>
                                <input type='text' class="form-control" name="tanggal_main" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <label class="control-label" for="last-name">Mulai<span class="required"></span>
                            </label>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <select class="form-control form-control col-md-4 col-xs-6" name="jam_mulai" id="sel1">
                                <option>00:00</option>
                                <option>01:00</option>
                                <option>02:00</option>
                                <option>03:00</option>
                                <option>04:00</option>
                                <option>05:00</option>
                                <option>06:00</option>
                                <option>07:00</option>
                                <option>08:00</option>
                                <option>09:00</option>
                                <option>10:00</option>
                                <option>11:00</option>
                                <option>12:00</option>
                                <option>13:00</option>
                                <option>14:00</option>
                                <option>15:00</option>
                                <option>16:00</option>
                                <option>17:00</option>
                                <option>18:00</option>
                                <option>19:00</option>
                                <option>20:00</option>
                                <option>21:00</option>
                                <option>22:00</option>
                                <option>23:00</option>
                              </select>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Durasi<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" name="durasi" id="durasi" required>
                                    <option value="0">Pilih Jam</option>
                                    <option value="1">1 Jam</option>
                                    <option value="2">2 Jam</option>
                                    <option value="3">3 Jam</option>
                                    <option value="4">4 Jam</option>
                                  </select>
                        </div>
                          </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Total Harga<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="total" name="total_harga" required="required" class="form-control col-md-7 col-xs-12" value="0" readonly>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-7 col-sm-7 col-xs-12" for="last-name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <button type="submit" class="btn btn-success" name="lanjut">Lanjutkan  <i class="fa fa-arrow-right"></i></button>
                            </div>
                          </div>
                        </form>
                        <?php 
						if(isset($_POST['lanjut'])){
						$id_book = $_POST['id_book'];
						$nama = $_POST['nama'];
						$kode = $_POST['kode'];
						$user = $nama."-".$kode;
						$id_lap = $_POST['id_lap1'];
						$tgl_main = $_POST['tanggal_main'];
						$jam_mulai = $_POST['jam_mulai'];
						$durasi = $_POST['durasi'];
						$jamdur = $durasi + $jam_mulai;
						$jam_berakhir = $jamdur.":00:00";
						//waktu
						$tanggal = date('Y-m-d', time()+60*60*6);
						$jam = date('H:i:s', time()+60*60*6);
						$tanggaljam = date('Y-m-d H:i:s', time()+60*60*6);
						$tgljam = $tgl_main." ".$jam_mulai;
						
						if(strtotime($tgljam)-strtotime($tanggaljam) > 43200){
							$bayarakhir= date('Y-m-d H:i:s', time()+60*60*12);
							} else {
							$bayarakhir= date('Y-m-d H:i:s', time()+60*60*9);
								}
								
						$total_harga = $_POST['total_harga'];
						$jenis_bayar = 'off cod';
						$status = 'Belum Bayar';
						
						
						//cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
						$cek1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tgl_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
						//cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
						$cek2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tgl_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
						
						if($cek1 > 0){
							echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>";	
						}elseif($cek2 > 0){
							echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
						}elseif($tgl_main == $tanggal && $jam_mulai < $jam){
							echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
						}elseif($tgl_main < $tanggal){
							echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
						}elseif(strtotime($tgljam) - strtotime($tanggaljam) <= 10800){
							echo "<script> alert(\"Waktu minimal pemesanan adalah 3 jam\");</script>";
						}else{
							$simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$user','$id_lap',NOW(),'$bayarakhir','$tgl_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total_harga','$status')");
						
						if($simpan){
							echo "<script> alert(\"Silakan Lakukan Pembayaran\"); window.location = \"opt_profil.php?url=pesanbayaroff\"; </script>";
							} else {
							echo "<script> alert(\"Maaf, terjadi kesalahan..!!\"); window.location = \"opt_profil.php?url=pesanoff\"; </script>";
								}
							}
						
						
						
								
						}
						?>

                      </div>

          
          </div>
        </div>
        
        
        </div>

        </div>
      </div>
       <?php
	   		}elseif($_GET['url']=="bayaroff"){
				include "opt_bayar_offline.php";
      ?>
      <?php
	   		}elseif($_GET['url']=="pesanbayaroff"){
				include "opt_bayar_pesanoffline.php";
      ?>
      <?php
	   		}elseif($_GET['url']=="mPesanOff"){
				include "opt_offline_konfirmasi.php";
      ?>
      
      <?php
	   		}elseif($_GET['url']=="mBayOff"){
				include "opt_bayaroff_konfirmasi.php";
      ?>
      
      <?php
      		}elseif($_GET['url']=="konfirmasi"){
      		include "opt_online_konfirmasi.php";
	  ?>
      
      
      <?php
      }
      ?>
      
      <?php 
      		}else{
      ?>
      
      <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
          	<div class="w3-row-padding" style="margin:0 -16px">
            
            <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Lapangan&nbsp;<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>  Tambah</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>ID</th>
                                            <th>No Lapangan</th>
                                            <th>Jenis Lapangan</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     		<?php
											
											$sql_sel = "select * from lapangan where username = '$username'";
											$query_sel = mysqli_query($koneksi,$sql_sel);
											while($sql_res = mysqli_fetch_array($query_sel)){
											?>
                                        <tr>
                                            <td><img src="assets/foto_lap/<?php echo $sql_res['foto']; ?>" width="30" height="30"></td>
                                            <td><?php echo $sql_res['id_lap']; ?></td>
                                            <td><?php echo $sql_res['no_lap']; ?></td>
                                            <td><?php echo $sql_res['jenis_rumput']; ?></td>
                                            <td class="center"><?php
											//$sel_harga = "select * from harga where id_lap = $sql_res[id_lap] ";
											//$qry = mysqli_query($koneksi,$sel_harga);
											//if($qry > 0){
												//echo "<a href='#' class='open_modal btn btn-success btn-xs' id='$sql_res[id_lap]'><span class='glyphicon glyphicon-zoom-in'></span> Lihat</a>&nbsp;<a href='#' class='open_modal1 btn btn-warning btn-xs' id='$sql_res[id_lap]'><span class='glyphicon glyphicon-edit'></span> Edit</a>";
												//} else {
													//echo "<a href='#' class='open_modal1 btn btn-warning btn-xs' id='$sql_res[id_lap]'><span class='glyphicon glyphicon-pencil'></span> Isi Harga</a>";
													//}
													echo $sql_res['harga'];
											 ?></td>
                                            <td class="center">
                                            <a href="#" class='open_modal btn btn-primary btn-xs' id='<?php echo $sql_res['id_lap']; ?>'><span class="glyphicon glyphicon-edit"></span> Edit</a>&nbsp
                                            <a href="#" onClick="confirm_modal('lap_pro_del.php?&id_lap=<?php echo $sql_res['id_lap']; ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                                           
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>

                                       
                                            	
                            </div>
                    
        	</div>
      </div>
      
      
      	
      <?php
      }
      ?>
      

    <!-- End Middle Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div></div>
</div>
<br>

<!-- Footer -->

<?php  
}else {
    echo "<script> alert(\"Silakan Login Terlebih Dahulu\"); window.location = \"../index.php\" </script>";
  }
     ?>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

</script>
<!-- Page-Level Plugin Scripts-->
    <script src="../assets/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/dataTables/dataTables.bootstrap.js"></script>
    <script src="../admin/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../admin/assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
<script>
		$(function() {
			$("#no_lap1").change(function(){
				var no_lap = $("#no_lap1 option:selected").val();
				var username = $("#username1").val();
				

				$.ajax({
					url: 'getSiswa.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'no_lap': no_lap
					},
					success: function (lap) {
						$("#id_lap1").val(lap['id_lap']);
						$("#jenis_rumput1").val(lap['jenis_rumput']);
						$("#harga1").val(lap['harga']);
						$("#username1").val(lap['username']);

					}
				});
			});
		});
	</script>
    <script>
    $(function() {
			$("#durasi").change(function(){
				var durasi = $("#durasi option:selected").val();
				var id_lap = $("#id_lap1").val();
				

				$.ajax({
					url: 'trans_get_harga.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'id_lap': id_lap
					},
					success: function (siswa) {
						$("#total").val(siswa['harga']*durasi);
					}
				});
			});
		});
    </script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lap_edit.php",
    			   type: "GET",
    			   data : {id_lap: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal1").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lap_harga.php",
    			   type: "GET",
    			   data : {id_lap: m,},
    			   success: function (ajaxData){
      			   $("#Modalharga").html(ajaxData);
      			   $("#Modalharga").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_bayar").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "opt_bayar_off.php",
    			   type: "GET",
    			   data : {id_book: m,},
    			   success: function (ajaxData){
      			   $("#Modalbayar").html(ajaxData);
      			   $("#Modalbayar").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

    <!-- jQuery -->
    <script src="../admin/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../admin/assets/vendors/nprogress/nprogress.js"></script>
  <!-- jQuery Smart Wizard -->
    <script src="../admin/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../admin/assets/build/js/custom.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/min/moment.min.js"></script>
    <script src="../admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

		<script src="../assets/js/moment.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
       
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker').datetimepicker({
					format: 'DD MMMM YYYY HH:mm',
                });
				
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				
				$('#timepicker').datetimepicker({
					format: 'HH:mm'
				});
			});
		</script>

<!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

      });
    </script>
    <!-- /jQuery Smart Wizard -->
    <!-- Total Harga -->
    
    
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    <script language="javascript">
	function tambahharga() {
    		var idf = document.getElementById("idf").value;
			var stre;
			stre="<div class='row' id='srow" + idf + "'><div class='col-sm-1'></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='hari1[]' id='sel1'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jum'at</option><option>Sabtu</option><option>Minggu</option></select></div></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='hari2[]' id='sel1'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jum'at</option><option>Sabtu</option><option>Minggu</option></select></div></div><div class='col-sm-1'></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='jam1[]' id='sel1'><option>00:00</option><option>01:00</option><option>02:00</option><option>03:00</option><option>04:00</option><option>05:00</option><option>06:00</option><option>07:00</option><option>08:00</option><option>09:00</option><option>10:00</option><option>11:00</option><option>12:00</option><option>13:00</option><option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option><option>18:00</option><option>19:00</option><option>20:00</option><option>21:00</option><option>22:00</option><option>23:00</option></select></div></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='jam2[]' id='sel1'><option>00:00</option><option>01:00</option><option>02:00</option><option>03:00</option><option>04:00</option><option>05:00</option><option>06:00</option><option>07:00</option><option>08:00</option><option>09:00</option><option>10:00</option><option>11:00</option><option>12:00</option><option>13:00</option><option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option><option>18:00</option><option>19:00</option><option>20:00</option><option>21:00</option><option>22:00</option><option>23:00</option></select></div></div><div class='col-sm-1'></div><div class='col-sm-2'><div class='form-group'><input type='text' class='form-control' name='harga[]' id='usr'></div></div><div class='col-sm-1'><button class='btn btn-primary' onclick='hapusElemen(\"#srow" + idf + "\"); return false;'><span class='glyphicon glyphicon-minus'></span></button></div></div>";
    		$("#divHarga").append(stre);	
    		idf = (idf-1) + 2;
    		document.getElementById("idf").value = idf;
		}
	function hapusElemen(idf) {
    		$(idf).remove();
		}
</script>
</body>
</html>
   