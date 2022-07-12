<?php
  require ("../koneksi.php");
  simpan_harga();
  function simpan_harga()
			{
				if(isset($_POST['harga']))
					{
						$harga=$_POST['hari1'];
						reset($harga);
						while (list($key, $value) = each($harga)) 
							{	
								$id = $_POST['id_lap'];
								$hari = $_POST['hari1'][$key]."-".$_POST['hari2'][$key];
								$jam = $_POST['jam1'][$key]."-".$_POST['jam2'][$key];;
								$harga = $_POST['harga'][$key];
								//$simpan = mysqli_query($koneksi,"insert into harga values('$id','$hari','$jam','$harga')");
                                //if($simpan){
                                echo "$id, $hari";
                                //}
							}
						}		
			}
		
  ?>