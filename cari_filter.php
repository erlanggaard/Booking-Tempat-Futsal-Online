<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Search</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <style>
  	body{ 
			padding-top: 40px;
			background-color:#CCC;	
	 }
    .modal-title {
      color: #424e5e;
    }
    a {
      color: #870000;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
	  margin-top:50px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
    }
  }
  </style>
</head>
<body>
  <?php
  include "navbar.php";
    include "member_login.php";
    include "opt_login.php";
     ?>

        <!-- Page Container -->
    <div class="container w3-content" style="max-width:1400px;margin-top:20px">
      <!-- The Grid -->
      <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
          <!-- Profile -->
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container" style="padding-bottom:10px">
             <h4 class="w3-center">Filter</h4>
             <form action="cari_filter.php?filter" method="get">
             <select class="w3-select" name="harga">
              <option value="0-1000000" selected>Pilih Harga</option>
              <option value="0-100000">0-100000</option>
              <option value="100001-125000">100000-125000</option>
              <option value="125000-200000">125000-200000</option>
            </select>
            <select class="w3-select" name="lokasi">
              <option value="" selected>Pilih Lokasi</option>
              <option value="jember">Jember</option>
            </select>
            <select class="w3-select" name="jenis">
              <option value="" selected>Jenis Lapangan</option>
              <option value="sintetis">sintetis</option>
              <option value="Beton/Semen">Beton/Semen</option>
            </select>
            <div style="padding-top:10px;">
            <button type="submit" name="filter" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-search"></i>Cari</button>
         	</div>
            </form>
            </div>
            
          </div>
          <br>
    
        <!-- End Left Column -->
        </div>
        
          <!-- Middle Column -->
        <div class="w3-col m9" style="margin-top:-10px;">
           
        <?php 
		include ("koneksi.php");
		$batas = 3;
		$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
	
		if ( empty( $pg ) ) {
		$posisi = 0;
		$pg = 1;
		} else {
		$posisi = ( $pg - 1 ) * $batas;
		}
		
		
        if(isset($_POST['cari'])){ //jika search dilakukan maka menjalankan query bagian ini
			if(!($_REQUEST['mencari'] == '')){ // jika form cari tidak kosong
				$cari = $_REQUEST['mencari']; //variabel berisi inputan dari search
			$sql = "select lapangan.*, operator.alamat_futsal, operator.kota, operator.nama_futsal from lapangan inner join operator on (lapangan.username=operator.username) where nama_futsal like '%$cari%' limit $posisi, $batas"; //query memilih data dari tabel lapangan dan operator yang memiliki nama tempat futsal mirip dengan yang dicari 
			}else{ // jika form cari kosong
				$sql = "select lapangan.*, operator.alamat_futsal, operator.kota, operator.nama_futsal from lapangan inner join operator on (lapangan.username=operator.username) where nama_futsal like '%%' limit $posisi, $batas"; //query memilih data dari tabel lapangan dan operator yang memiliki nama tempat futsal mirip dengan yang dicari
				}
				
		} elseif(isset($_GET['filter'])){ //jika tombol filter yang ditekan maka akan menjalankan query ini
			$harga = $_REQUEST['harga']; // variabel harga
			$pecah = (explode("-",$harga)); //memecah varibel harga 
			$lokasi = $_REQUEST['lokasi']; //variabel dengan isi lokasi
			$jenis = $_REQUEST['jenis']; //variabel dengan isi jenis lapangan
			$sql = "select lapangan.*, operator.alamat_futsal, operator.kota, operator.nama_futsal from lapangan inner join operator on (lapangan.username=operator.username) where (kota like '%$lokasi%') and (harga between '$pecah[0]' and '$pecah[1]') and (jenis_rumput like '%$jenis%') limit $posisi, $batas"; 
			//query memilih data pada tabel lapangan dan operator yang berada di kota, harga diantara, dan jenis lapangan yang telah dipilih oleh member
		} else { //jika filter dan search tidak dilakukan
			$sql = "select lapangan.*, operator.alamat_futsal, operator.kota, operator.nama_futsal from lapangan inner join operator on (lapangan.username=operator.username) limit $posisi, $batas";	
			//akan memilih semua data yang berada di table lapangan
		}
			$mencari = mysqli_query($koneksi,$sql);
			$no = 1+$posisi;
			while($r = mysqli_fetch_array($mencari)){ 
		?>
        
        
   
    
          <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px; margin-top:10px;"><br>
         
              <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half">
                  <img src="operator/assets/foto_lap/<?php echo $r['foto']; ?>" style="width:100%; height:100%; object-fit: contain;" alt="Northern Lights" class="w3-margin-bottom w3-half">
                </div>
                <form action="transaksi.php" method="post">
                <input type="hidden" name="id_lap" value="<?php echo $r['id_lap']; ?>">
                <div class="w3-half">
                  <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?php echo $r['nama_futsal']; ?><br><br>
                  <i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;<?php echo $r['alamat_futsal']; ?><br><br>
                  <i class="fa fa-list-alt" aria-hidden="true"></i> Lapangan Nomor&nbsp;<?php echo $r['no_lap']; ?><br><br>
                  <i class="fa fa-life-ring" aria-hidden="true"></i> Lapangan <?php echo $r['jenis_rumput']; ?><br><br>
                  <i class="fa fa-tags" aria-hidden="true"></i> Rp. <?php echo $r['harga']; ?> per jam<br><br><br><br>
                  
              </div>
              <div class="w3-right">

            <button type="submit" class="w3-btn w3-teal w3-margin-bottom"><i class="glyphicon glyphicon-book"></i>  Pesan</button>
            </form>
            </div>
            </div>
            
            
          </div>
			
        
        <?php
    $no++;
    }
    ?>
    <?php
    //hitung jumlah data
    $jml_data = mysqli_num_rows(mysqli_query($koneksi,$sql));
	if($jml_data == 0 ){
		echo "<h4 align='center'>Data tidak ditemukan..</h4>";
		}else{
    //Jumlah halaman
    $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

    //Navigasi ke sebelumnya
    if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<li><a href='?pg=$link' aria-label='previous'>
            <span aria-hidden='true'>&laquo;</span>
          </a></li>";
    } else {
    $prev = "<li class='disabled'><a href='' aria-label='previous'>
            <span aria-hidden='true'>&laquo;</span>
          </a></li>";
    }

    //Navigasi nomor
    $nmr = '';
    for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
    $nmr .= "<li class='active'><a href='#'>$i <span class='sr-only'>(current)</span></a></li>";
    } else {
    $nmr .= "<li><a href='?pg=$i'>$i</a></li>";
    }
    }

    //Navigasi ke selanjutnya
    if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = "<li><a href='?pg=$link' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
          </a></li>";
    } else {
    $next = "<li class='disabled'><a href='' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
          </a></li>";
    } ?> 
	<nav aria-label="Page navigation" class="w3-center">
      <ul class="pagination">
        <?php echo $prev; ?>
        
         <?php echo $nmr; ?>
       
          <?php echo $next; ?>
        
      </ul>
    </nav>
	<?php
		}
    //Tampilkan navigasi
    //echo $prev . $nmr . $next;
    ?>
    
    
    
    	<!-- End Middle Column -->
        </div>
      <!-- End Grid -->
      </div>
    
    <!-- End Page Container -->
    </div>
    <br>
       
           </div>
         </div><br><br>

<?php include ("footer.php"); ?>
</body>
</html>
