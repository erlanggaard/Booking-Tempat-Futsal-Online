<div id="tambahadm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Admin</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Username</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="id" id="pwd" placeholder="Username">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Nama</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="nama" id="pwd" placeholder="Nama Admin">
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="email" id="pwd" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Foto</label>
            <div class="col-sm-8">
             <label class="btn btn-info" for="my-file-selector2">
                      <input id="my-file-selector2" name="foto" type="file" style="display:none;" onchange="$('#upload-file-foto').html($(this).val());">
                      Upload
                  </label>
                  
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div>
             <span class='label label-danger col-sm-8' id="upload-file-foto"></span>
            </div>
          </div>
          

              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
                </div>
                <div class="col-sm-4"></div>
              </div>

    </form>
		<?php
			require ("../koneksi.php"); //menyisipkan file koneksi untuk konek ke database
			if(isset($_POST['submit'])){ //ketika tombol submit ditekan pada form
             $id = $_POST['id'];
             $nama = $_POST['nama'];
             $email = $_POST['email'];
             $password = $_POST['password'];
			 //menyimpan inputan admin ke dalam variabel
             $foto = $_FILES['foto']['name'];
             $lokasi=$_FILES['foto']['tmp_name'];
			//meyimpan file foto ke dalam variabel
             copy ($lokasi,"images/".$foto);
			 //menyimpan file foto ke dalam folder
             $sql = "insert into admin values ('$id','$nama','$email','$password','$foto')";
             $query = mysqli_query($koneksi,$sql);
			//menyimpan data ke dalam tabel di database
            }
			
			?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>

  </div>
</div>
