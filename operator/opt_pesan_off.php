<div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Pesan Offline (By Operator)</h4>
        <hr class="w3-clear">
        
          <div class="w3-row-padding" style="margin:0 -16px">
            <?php
						$sql = "SELECT max(id_book) as terakhir from transaksi";
						$hasil = mysqli_query($koneksi,$sql);
						$data = mysqli_fetch_array($hasil);
						$lastID = $data['terakhir'];
						$lastNoUrut = substr($lastID, 3, 9);
						$nextNoUrut = $lastNoUrut + 1;
						$nextID = "KB".sprintf("%08s",$nextNoUrut);
						?>
                       
                      	
                        <form class="form-horizontal form-label-left" action="trans_save.php" method="post">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID; ?>" readonly>
         <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $username; ?>" readonly>                     
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select class="form-control form-control col-md-4 col-xs-6" name="no_lap" id="no_lap">
                               <?php 
                               $p = mysqli_query($koneksi, "select * from lapangan where username = '$username'");
                               while ($o = mysqli_fetch_array($p)) {
							   	echo "<option>$o[no_lap]</option>";
							   
							   }
                               ?>
                               </select>
                               <input type="text" id="id_lap" name="id_lap" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Lapangan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="jenis_rumput" name="jenis_rumput" required="required" class="form-control col-md-7 col-xs-12"  readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Per Jam<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="harga" name="harga" required="required" class="form-control col-md-7 col-xs-12" readonly>
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
                              <button type="submit" class="btn btn-success">Lanjutkan  <i class="fa fa-arrow-right"></i></button>
                            </div>
                          </div>
                        </form>

                      </div>

          
          </div>
        </div>
        
        
        </div>

        </div>
      </div>
      
    <!-- jQuery -->
      
    