<?php
require ("koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
	$sql = "select * from member where username_member = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <link rel="shortcut icon" href="assets/images/Goputsalgaji.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GO Futsal || Pemesanan</title>
    <!-- Custom Theme Style -->
    
    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
	  <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
  	body { 
			padding-top: 60px;
			background-color:#CCC;
	}
	.container {
		background-color:#FFF;
		}
	
	</style>
    
    
  </head>
  <body>
  <?php
  include "navbar.php";
    include "member_login.php";
    include "opt_login.php";
     ?>
        <!-- page content -->
        <div class="container">
        <br>
        <div class="panel panel-default">
          <div class="panel-heading">Pemesanan Lapangan</div>
          <div class="panel-body">
          <h4>Pesan Lapangan Anda Dan Segera Lakukan Pembayaran </h4>
          <hr>
          
          <?php
		  // membuat kode urut otomatis sebagai ID booking
						$sql = "SELECT max(id_book) as terakhir from transaksi";
						$hasil = mysqli_query($koneksi,$sql);
						$data = mysqli_fetch_array($hasil);
						$lastID = $data['terakhir'];
						$lastNoUrut = substr($lastID, 3, 9);
						$nextNoUrut = $lastNoUrut + 1;
						$nextID = "KB".sprintf("%08s",$nextNoUrut);
						?>
                        <?php 
						$id_lap = $_REQUEST['id_lap'];
						$sel = mysqli_query($koneksi, "select lapangan.*, operator.alamat_futsal, operator.kota, operator.nama_futsal from lapangan inner join operator on (lapangan.username=operator.username) where id_lap = '$id_lap'");
						$pilih = mysqli_fetch_array($sel);
						//memanggil data dari database yang memiliki id_lap sesuai yang dipilih oleh member
						?>
                        
                      	
                        <form class="form-horizontal form-label-left" method="post">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID; ?>" readonly>
                              <input type="hidden" id="first-name" required="required" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $sql_sel['username_member']; ?>" readonly>
                              <input type="hidden" id="id_lap" name="id_lap" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['id_lap']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Futsal<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['nama_futsal'];?>, <?php echo $pilih['alamat_futsal']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['no_lap']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['jenis_rumput']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Per Jam<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="Rp. <?php echo $pilih['harga']; ?>,00" readonly>
                            </div>
                          </div>
                          
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Metode Pembayaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="jenis_bayar" required value="cod"> &nbsp; COD &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="jenis_bayar" required value="transfer"> Transfer
                                </label>
                              </div>
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

                      </div>
                      <?php 
						//require "koneksi.php";
						if(isset($_POST['lanjut'])){
						$id_book = $_POST['id_book'];
						$username = $_POST['username'];
						$id_lap = $_POST['id_lap'];						//variabel yang berisi inputan yang diisi oleh member pada form transaksi
						$tanggal_main = $_POST['tanggal_main'];
						$jam_mulai = $_POST['jam_mulai'];
						$durasi = $_POST['durasi'];
						//penambahan pada jam mulai dan durasi
						$jamdur = $durasi + $jam_mulai;
						$jam_berakhir = $jamdur.":00:00";
						//echo $jam_berakhir;
						//$now=date('Y-m-d h:i:s', strtotime('4 hours', strtotime($tgl)));
						$tanggal = date('Y-m-d', time()+60*60*6); //variabel dengan nilai date/tanggal sekarang
						$jam = date('H:i:s', time()+60*60*6); ////variabel dengan nilai time/jam sekarang
						$tanggaljam = date('Y-m-d H:i:s', time()+60*60*6); //variabel dengan nilai datetime sekarang
						$tgljam = $tanggal_main." ".$jam_mulai;
						
						if(strtotime($tgljam)-strtotime($tanggaljam) > 43200){ //jika main lebih dari 12 jam
							$bayarakhir= date('Y-m-d H:i:s', time()+60*60*12); // maka bayar akhir 6 jam dari waktu pesan
							} else { // jika tidak
							$bayarakhir= date('Y-m-d H:i:s', time()+60*60*9); // maka bayar akhir 3 jam dari waktu pesan
								}
						
						$jenis_bayar = $_POST['jenis_bayar'];
						$total = $_POST['total_harga'];
						if($jenis_bayar == 'transfer'){ // jika jenis bayar transfer
						$status = "Menunggu Transfer"; // maka status Menunggu Transfer
						}else { //jika tidak
						$status = "Menunggu Pembayaran"; //maka status menjadi Menunggu pembayaran
							}
						//cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
						$cek1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
						//cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
						$cek2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai')  order by tgl_book"));
						
						if($cek1 > 0){ //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
							echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>";	
						}elseif($cek2 > 0){ //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
							echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
						}elseif($tanggal_main == $tanggal && $jam_mulai < $jam){ // cek tanggal main = tanggal sekarang dan jam mulai kurang dari jam sekarang
							echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
						}elseif($tanggal_main < $tanggal){ // cek tanggal main kurang dari tanggal sekarang
							echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
						}elseif(strtotime($tgljam) - strtotime($tanggaljam) <= 10800){ // cek apakah waktu pesan kurang dari 3 jam dari waktu bermain
							echo "<script> alert(\"Waktu minimal pemesanan adalah 3 jam\");</script>";
						}else{ //jika tidak maka transaksi dapat dilanjutkan
							$simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$username','$id_lap',NOW(),'$bayarakhir','$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");

if($simpan & $jenis_bayar=='transfer'){ //jika simpan data berhasil dan jenis bayar = transfer 
	echo "<script> alert(\"Silakan Lakukan Pembayaran\"); window.location = \"trans_upload_bayar.php?kd=$id_book\"; </script>";
	} elseif($jenis_bayar=='cod') { // dan jika jenis bayar cod
	echo "<script> alert(\"Segera Lakukan Pembayaran Kepada Operator Futsal Yang Dituju\"); window.location = \"index.php\"; </script>";
		} else { //dan jika tidak
		echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";		
			}
							}
						}
						
						?>
						
					

          
          </div>
        </div>
        
        
        </div>

    <!-- jQuery -->
    <script src="admin/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="admin/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="admin/assets/vendors/nprogress/nprogress.js"></script>
  <!-- jQuery Smart Wizard -->
    <script src="admin/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="admin/assets/build/js/custom.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/min/moment.min.js"></script>
    <script src="admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

		<script src="assets/js/moment.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
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
    <script>
		$(function() {
			$("#durasi").change(function(){
				var durasi = $("#durasi option:selected").val();
				var id_lap = $("#id_lap").val();
				

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

</body>
</html>
<?php 
}else {
    echo "<script> alert(\"Silakan Login Sebagai Member\"); window.location = \"index.php\" </script>";
  }
?>
   