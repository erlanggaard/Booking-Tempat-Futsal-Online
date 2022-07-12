<?php
require ("../koneksi.php");
$id_lap = $_GET['id_lap'];
$sql = "select * from lapangan where id_lap = '$id_lap'";
$query_sel = mysqli_query($koneksi, $sql);
$sql_res = mysqli_fetch_array($query_sel);
?>

  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Lapangan</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" name="modal_popup" action="lap_pro_edit.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Kode Lapangan</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="id_lap" id="id_lap" placeholder="Kode Lapangan" value="<?php echo $sql_res['id_lap']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Jenis Lapangan</label>
            <div class="col-sm-8">
              <select class="form-control" name="jenis_rumput">
                <option>--- Pilih Jenis Lapangan ---</option>
            	 <option value="sintetis" <?php if($sql_res['jenis_rumput']=="sintetis"){echo "selected";} ?>>Sintetis</option>
                <option value="beton/semen" <?php if($sql_res['jenis_rumput']=="beton/semen"){echo "selected";} ?>>Beton/Semen</option>
                        </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Harga</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="harga" id="pwd" placeholder="Harga" value="<?php echo $sql_res['harga']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Nomor Lapangan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="pwd" name="no_lap" placeholder="Nomor Lapangan" value="<?php echo $sql_res['no_lap']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Foto</label>
            <div class="col-sm-8">
             <img src="assets/foto_lap/<?php echo $sql_res['foto'] ?>" width="100" height="100"><br/> 
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div class="col-sm-8">
             <label class="btn btn-info" for="my-file-selectoredit">
             <input id="my-file-selectoredit" name="foto" type="file" style="display:none;" onchange="$('#upload-file-foto-edit').html($(this).val());">
                      Upload
                  </label>
                  <p style="font-size:9px;">* Ukuran file maksimal kurang dari 2 MB</p>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div class="col-sm-8">
             <span class='label label-danger ' id="upload-file-foto-edit"></span>
            </div>
          </div>
          

              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary btn-block" name="edit">Submit</button>
                </div>
                <div class="col-sm-4"></div>
              </div>

    </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>

  </div>

