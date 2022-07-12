<?php
require ("../koneksi.php");
$id = $_GET['id_book'];
$sql = "select * from transaksi where id_book = '$id'";
$query_sel = mysqli_query($koneksi, $sql);
$sql_res = mysqli_fetch_array($query_sel);

$r = mysqli_fetch_array(mysqli_query($koneksi, "select * from bayar_cod where id_book='$id'"));
if($r > 0){
$sisa = $r['jumlah_bayar']-$r['bayar'];
}else{
$sisa = $sql_res['total_harga'];
}
?>

  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bayar Lapangan</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" name="modal_popup" action="opt_pro_bayar.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Kode Booking</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="id_book" placeholder="Kode Lapangan" value="<?php echo $sql_res['id_book']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Jumlah Harga</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="jumlah_harga" placeholder="Kode Lapangan" value="<?php echo $sql_res['total_harga']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Bayar</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="bayar" placeholder="Kurang <?php echo $sisa; ?>" value="">
            </div>
          </div>
              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary btn-block" name="edit">Simpan</button>
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

