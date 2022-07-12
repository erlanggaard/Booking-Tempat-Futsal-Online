<?php
require ("../koneksi.php");
$id_lap = $_GET['id_lap'];
$sql = "select * from lapangan where id_lap = '$id_lap'";
$query_sel = mysqli_query($koneksi, $sql);
$sql_res = mysqli_fetch_array($query_sel);
?>

  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Harga Lapangan</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" name="modal_popup" action="simpan_harga.php" method="post">
          <div class="form-group">
          <div class="col-sm-4"></div>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="id_lap" id="id_lap" placeholder="Kode Lapangan" value="<?php echo $sql_res['id_lap']; ?>" readonly>
            </div>
          </div>
          
            <div class="row">
                <div class="col-sm-4">Tambah Harga</div>
                <div class="col-sm-8"></div>
              </div>  
              <hr class="clear" />
			<div class="row">
            	<div class="col-sm-1"></div>
                <div class="col-sm-1">
                      <label for="sel1">Hari</label>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-1"><label for="sel1">Jam</label></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-1"><label for="sel1">Harga</label></div>
              </div>
              
    		<div class="row">
            	<input id="idf" value="1" type="hidden" />
            	<div class="col-sm-1"></div>
                <div class="col-sm-1">
                	<div class="form-group">
                      <select class="form-control" name="hari1[]" id="sel1">
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jum'at</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                      </select>
                    </div>
                </div>
                <div class="col-sm-1">
                	<div class="form-group">
                      <select class="form-control" name="hari2[]" id="sel1">
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jum'at</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                      </select>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-1">
                	<div class="form-group">
                      <select class="form-control" name="jam1[]" id="sel1">
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
                
                
                <div class="col-sm-1">
                	<div class="form-group">
                      <select class="form-control" name="jam2[]" id="sel1">
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
                
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                	<div class="form-group">
                      <input type="text" class="form-control" name="harga[]" id="usr">
                    </div>
                </div>
                <div class="col-sm-1"><button class="btn btn-primary" onclick="tambahharga(); return false;"><span class="glyphicon glyphicon-plus"></span></button></div>
                </div>
                
              
			
              
              
              <div class="row" id="divHarga">
					<input id="idf" value="1" type="hidden" />
                </div>
                
              
              
              <div class="row">
              	<div class="col-sm-1"></div>
                <div class="col-sm-2">
					<button type="submit" class="btn btn-danger">Simpan</button>
                </div>
                
              </div>
		</form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>

  </div>
  
  


